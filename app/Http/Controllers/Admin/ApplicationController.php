<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\EditedApplication;
use App\Models\Caste;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\AppliedSubject;
use App\Models\EditedAppliedSubject;
use App\Models\AppliedStream;
use App\Models\EditedAppliedStream;
use App\Models\ApprovedList;
use App\Models\RejectedList;
use App\Models\Student;
use App\Models\Reservation;
use App\Exports\ApplicationExport;
use App\Http\Controllers\Common\ApplicationController as CommonApplicationController;
use App\Traits\ApplicationTrait;
use DB, Session, Log, Exception, Str, Excel, PDF, Validator, Image, Redirect;

class ApplicationController extends Controller
{
    use ApplicationTrait;

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
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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

    

    // public function admission(Request $request, Application $application)
    // {

    //     DB::beginTransaction();
    //     try {
    //         $application->status = 1;
    //         $application->save();
    //         $year = date('y');
    //         $stream_name = $application->appliedStream->stream->name;
    //         $course_name = $application->course->name;
    //         $uid  = ApprovedList::where('course_id',$application->course_id)
    //                             ->where('semester_id',$application->semester_id)
    //                             ->where('stream_id',$application->stream_id)
    //                             ->count() + 1;
    //         $uid  = str_pad($uid, 4,"0000", STR_PAD_LEFT);
    //         $uid = $year.$stream_name[0].$course_name[0].$uid;
    //         $approved_list_data = [
    //             'uuid' => (String) Str::uuid(),
    //             'uid' => $year.$stream_name[0].$course_name[0].$uid,
    //             'student_id' => $application->student_id,
    //             'application_id' => $application->id,
    //             'course_id' => $application->course_id,
    //             'semester_id' => $application->semester_id,
    //             'stream_id' => $application->appliedStream->stream_id,
    //             'approved_by' => 'Admin',
    //             'approved_by_id' => auth()->guard('admin')->id(),
    //             'category' => $request->category,
    //             'year' => date('Y')
    //         ];
    //         ApprovedList::create($approved_list_data);
    //         $student = Student::find($application->student_id);
    //         $student->uid = $uid;
    //         $student->save();
            
    //     } catch (Exception $e) {
    //         DB::rollback();
    //         Log::error($e);
    //         Session::flash('error','Something Went Wrong');
    //         return back();
    //     }
    //     DB::commit();
    //     Session::flash('success','Approved Successfully');
    //     return back();
    // }

    // public function rejectOld(Request $request, Application $application)
    // {
    //     DB::beginTransaction();
    //     try {

    //         $application->status = 2;
    //         $application->save();
    //         $rejected_list_data = [
    //             'uuid' => (String) Str::uuid(),
    //             'student_id' => $application->student_id,
    //             'application_id' => $application->id,
    //             'course_id' => $application->course_id,
    //             'semester_id' => $application->semester_id,
    //             'stream_id' => $application->appliedStream->stream_id,
    //             'reason' => $request->reason,
    //             'rejected_by' => 'Admin',
    //             'rejected_by_id' => auth()->guard('admin')->id(),
    //             'year' => date('Y')
    //         ];
    //         RejectedList::create($rejected_list_data);
            
    //     } catch (Exception $e) {dd($e);
    //         DB::rollback();
    //         Session::flash('error','Something Went Wrong');
    //         return back();
    //     }
    //     DB::commit();
    //     Session::flash('success','Rejected Successfully');
    //     return back();
    // }
    

    
}
