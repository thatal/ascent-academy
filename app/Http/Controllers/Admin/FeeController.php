<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Course;
use App\Models\Stream;
use App\Models\Semester;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use DB, Session, Log, Str, Validator;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $course                 = $request->get("course");
        $semester               = $request->get("semester");
        $stream                 = $request->get("stream");
        // $fee_head               = $request->get("fee_head");
        $gender                 = $request->get("gender");
        $practical              = $request->get("practical");
        $financial_year         = $request->get("financial_year");

        $fees = new Fee();
        if($course){
            $fees = $fees->where('course_id',$course);
        }
        if($semester){
            $fees = $fees->where('semester_id',$semester);
        }
        if($stream){
            $fees = $fees->where('stream_id',$stream);
        }
        // if($fee_head){
        //     $fees = $fees->where('fee_head_id',$fee_head);
        // }
        if($gender){
            $fees = $fees->where('gender',$gender);
        }
        if($practical){
            $fees = $fees->where('practical',$practical);
        }
        if($financial_year){
            $fees = $fees->where('financial_year',$financial_year);
        }
        $fees = $fees->paginate();
        $courses = Course::get();
        $streams = Stream::get();
        $semesters = Semester::get();
        $fee_heads = FeeHead::get();
        $financial_years = Fee::select('financial_year')->distinct()->get();
        return view('admin.fee.index',compact('courses','streams','semesters','fee_heads','financial_years','fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::get();
        $streams = Stream::get();
        $semesters = Semester::get();
        $fee_heads = FeeHead::get();
        $fees = Fee::get();
        return view('admin.fee.create',compact('courses','streams','semesters','fee_heads','fees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $if_exists = Fee::where('course_id',$request->course_id)
                    ->where('stream_id',$request->stream_id)
                    ->where('semester_id',$request->semester_id)
                    ->where('gender',$request->gender)
                    ->where('practical',$request->practical)
                    ->where('financial_year',$request->financial_year)
                    ->count();
        if($if_exists){
            Session::flash('error','Fee Structure Already Exists.');
            return back();
        }
        $validator = Validator::make($request->all(), Fee::$rules);
        if($validator->fails()){
            Log::error($validator->errors());
            Session::flash("error", "Whoops! looks like you have missed something. Please verify and try again later.");
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::begintransaction();
        try {
            $fee_data = [
                'uuid'          => (String) Str::uuid(),
                'course_id'     => $request->course_id,
                'stream_id'     => $request->stream_id,
                'semester_id'   => $request->semester_id,
                'gender'        => $request->gender,
                'practical'     => $request->practical,
                'financial_year' => $request->financial_year,
                'year'          => $request->year,
            ];
            $fee = Fee::create($fee_data);
            foreach ($request->is_required as $key => $required_status) {
                if ($required_status) {
                    $data = [
                        'fee_id' => $fee->id,
                        'fee_head_id'   => $request->fee_heads[$key],
                        'amount'        => (isset($request->amounts[$key]) ? $request->amounts[$key] : 0),
                        'is_free'       => array_key_exists($key, $request->is_free) ? $request->is_free[$key]: 0,
                    ];
                    $fee_structure = FeeStructure::create($data);
                }
                
            }
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error','Something Went Wrong');
            return back();
        }
        DB::commit();
        saveLogs(auth()->guard('admin')->id(), auth()->guard('admin')->user()->username, 'Admin', "Fee created for {$request->course_id},{$request->stream_id},{$request->semester_id},{$request->gender},{$request->practical},{$request->financial_year}");
        Session::flash('success','Fee structure successfully created.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        $courses = Course::get();
        $streams = Stream::get();
        $semesters = Semester::get();
        $fee_heads = FeeHead::get();
        $fees = Fee::get();
        return view('admin.fee.edit',compact('fee','courses','streams','semesters','fee_heads','fees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $validator = Validator::make($request->all(), Fee::$rules);
        if($validator->fails()){
            Log::error($validator->errors());
            Session::flash("error", "Whoops! looks like you have missed something. Please verify and try again later.");
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        DB::begintransaction();
        try {
            $fee_data = [
                'course_id'     => $request->course_id,
                'stream_id'     => $request->stream_id,
                'semester_id'   => $request->semester_id,
                'gender'        => $request->gender,
                'practical'     => $request->practical,
                'financial_year' => $request->financial_year,
                'year'          => $request->year,
            ];
            $fee->update($fee_data);
            $fee->feeStructures()->delete();
            $fee->save();
            foreach ($request->is_required as $key => $required_status) {
                if ($required_status) {
                    $data = [
                        'fee_id' => $fee->id,
                        'fee_head_id'   => $request->fee_heads[$key],
                        'amount'        => (isset($request->amounts[$key]) ? $request->amounts[$key] : 0),
                        'is_free'       => array_key_exists($key, $request->is_free) ? $request->is_free[$key]: 0,
                    ];
                    $fee_structure = FeeStructure::create($data);
                }
                
            }
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error','Something Went Wrong');
            return back();
        }
        DB::commit();
        saveLogs(auth()->guard('admin')->id(), auth()->guard('admin')->user()->username, 'Admin', "Fee updated for {$request->course_id},{$request->stream_id},{$request->semester_id},{$request->gender},{$request->practical},{$request->financial_year}");
        Session::flash('success','Fee structure successfully updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
