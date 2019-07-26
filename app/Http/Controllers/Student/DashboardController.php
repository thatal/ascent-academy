<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Student;
use Illuminate\Http\Request;
use DB,Session;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $applications = Application::where('student_id',auth()->id())->paginate();
    //     return view('student.dashboard.index',compact('applications'));
    // }
    public function personalInfoEdit()
    {
        $application = Application::where('student_id', auth()->id())->first();
        return view('student.dashboard.personal-info', compact('application'));
    }
    public function personalInfoUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $application = Application::where('student_id', auth()->id())->first();
            $data = [
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
            ];
            Application::where('student_id', auth()->id())->update($data);
            $data['password'] = bcrypt($request->mobile_no);
            $data['is_person_info_updated'] = 1;
            Student::where('id', auth()->id())->update($data);
        } catch (\Exception $th) {
            DB::rollback();
            Session::flash('error','Something went wrong');
            return back();
        }
        DB::commit();
        Session::flash('success','Successfully Updated');
        return  redirect()->route('student.application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
