<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Subject;
use App\Models\Caste;
use App\Models\Category;
use App\Models\AppliedSubject;
// use App\Traits\SubjectAllocationTrait;
use App\Events\ApplicationSubjectAllocated;
use App\Events\ApplicationSubjectEdited;
use DB, Session, Log, Exception, Validator,Str;

trait SubjectAllocationTrait {

    public function create(Request $request, Application $application) {
        if(auth()->guard('admin')->check()){
            $view = 'admin.subject-allocation.create';
            $guard = "admin";
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.subject-allocation.create';
            $guard = "staff";
        }
        if($application->status == 3){
            return redirect()->route($guard.".application.index")->with("error", "Subject is already allocated for selected candidate.");
        }
        $seat_details = getSeatDetails($application->appliedStream->stream_id, $application->semester_id);
        $categories = Category::get();/*dd($seat_details);*/
        return view($view, compact('application', 'seat_details','categories'));
    }
    public function store(Request $request, Application $application)
    {

        $current_date_time = date("Y-m-d H:i:s");
        if(auth()->guard('admin')->check()){
            $view   = 'admin.application.show';
            $guard  = 'admin';
        }elseif(auth()->guard('staff')->check()){
            $view   = 'staff.application.show';
            $guard  = 'staff';
        }

        if($application->status == 3){
            return redirect()->route($guard.".application.index")->with("error", "Subject is already allocated for selected candidate.");
        }
        $validation_rules = $this->allocationValidationRules($application);
        if(sizeof($validation_rules)){
            $validator = Validator::make($request->all(), $validation_rules);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }
        $applied_subject_data = [];
        if($request->subjects){
            foreach ($request->subjects as $index => $subject_id) {
                $subject_obj = null;
                if($subject_id != "NA"){
                    $subject_obj = Subject::findOrFail($subject_id);
                }
                if($subject_obj){
                    $major = null;
                    $is_seat_available = 1;
                    if(in_array($application->appliedStream->stream_id,[4,6,8])){
                        if($subject_obj->is_major==1){
                            $major = $subject_obj->id;
                            $is_seat_available = checkSeatAvailability($request, $application, $major);
                        }
                    }else{
                        $is_seat_available = checkSeatAvailability($request, $application, $major);
                    }
                    if(!$is_seat_available){
                        Session::flash('error','Seat Already Full');
                        return back();
                    }
                    $applied_subject_data[] = [
                        'uuid'              => (String) Str::uuid(),
                        "student_id"        => $application->student_id,
                        "application_id"    => $application->id,
                        "subject_id"        => $subject_obj->id,
                        "is_compulsory"     => $subject_obj->is_compulsory,
                        "is_major"          => $subject_obj->is_major,
                        "preference"        => 0,
                        "created_at"        => $current_date_time,
                        "updated_at"        => $current_date_time,
                        "allocated_by_id"   => auth()->user()->id,
                        "allocated_by"      => ucwords($guard),
                    ];
                }
            }
        }
        // dump($applied_subject_data);
        // dd("Halt Here.");
        // status 3 = subject allocated next step is edit/ payment (admission)
        DB::beginTransaction();
        try {
            $free_admission_log = [
                "application_id"    => $application->id,
                "old_free_admission"    => $application->free_admission,
            ];
            $application->status         = 3;
            $application->selected_category_id = $request->get("category");
            $application->selected_category_reason = $request->get("reason");
            $application->with_practical = $request->get("practical");
            $application->free_admission = $request->get("free_admission");
            $free_admission_log["new_free_admission"]    = $application->free_admission;
            if(sizeof($applied_subject_data)){
                AppliedSubject::insert($applied_subject_data);
            }
            $application->save();
            \Log::info($free_admission_log);

            saveLogs(auth()->guard($guard)->id(), auth()->guard($guard)->user()->username, ucwords($guard), "Subject allocation done for {$application->id}");

        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            Session::flash('error','Something went wrong');
            return back();
        }
        DB::commit();
        event(new ApplicationSubjectAllocated("Application No {$application->id}'s Subject Allocation Is Complete",$application,getSeatDetails()));
        Session::flash('success','Subjects allocated successfully.');
        return redirect()->route($view, $application->uuid);
    }
    public function edit(Application $application) {

        $current_date_time = date("Y-m-d H:i:s");
        if(auth()->guard('admin')->check()){
            $view   = 'admin.subject-allocation.edit';
            $guard  = 'admin';
        }elseif(auth()->guard('staff')->check()){
            $view   = 'staff.subject-allocation.edit';
            $guard  = 'staff';
        }

        if($application->status != 3){
            return redirect()->route($guard.".application.index")->with("error", "Subject allocation edit option is not available.");
        }
        $categories = Category::get();
        return view($view, compact("application","categories"));
    }
    public function update(Request $request, Application $application) {
        if($application->status != 3){
            return redirect()->route($guard.".application.index")->with("error", "Editing of subject allocation is not availbale.");
        }

        $current_date_time = date("Y-m-d H:i:s");
        if(auth()->guard('admin')->check()){
            $view   = 'admin.application.show';
            $guard  = 'admin';
        }elseif(auth()->guard('staff')->check()){
            $view   = 'staff.application.show';
            $guard  = 'staff';
        }

        $validation_rules = $this->allocationValidationRules($application);
        if(sizeof($validation_rules)){
            $validator = Validator::make($request->all(), $validation_rules);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }
        }
        $applied_subject_data = [];
        if ($request->subjects) {
            foreach ($request->subjects as $index => $subject_id) {
                $subject_obj = null;
                if($subject_id != "NA"){
                    $subject_obj = Subject::findOrFail($subject_id);
                }
                if($subject_obj){
                    $major = null;
                    $is_seat_available = 1;
                    if(in_array($application->appliedStream->stream_id,[4,6,8])){
                        if($subject_obj->is_major==1){
                            $major = $subject_obj->id;
                            $is_seat_available = checkSeatAvailability($request, $application, $major);
                        }
                    }else{
                        $is_seat_available = checkSeatAvailability($request, $application, $major);
                    }
                    if(!$is_seat_available){
                        Session::flash('error','Seat Already Full');
                        return back();
                    }
                    $applied_subject_data[] = [
                        'uuid'              => (String) Str::uuid(),
                        "student_id"        => $application->student_id,
                        "application_id"    => $application->id,
                        "subject_id"        => $subject_obj->id,
                        "is_compulsory"     => $subject_obj->is_compulsory,
                        "is_major"          => $subject_obj->is_major,
                        "preference"        => 0,
                        "created_at"         => $current_date_time,
                        "updated_at"        => $current_date_time,
                        "allocated_by_id"   => auth()->user()->id,
                        "allocated_by"      => ucwords($guard),
                    ];
                }
            }
        }
        DB::beginTransaction();
        try {

            $free_admission_log = [
                "edited"                => true,
                "application_id"        => $application->id,
                "old_free_admission"    => $application->free_admission,
            ];
            $application->status         = 3;
            $application->with_practical = $request->get("practical");
            $application->selected_category_id = $request->get("category");
            $application->selected_category_reason = $request->get("reason");
            $application->free_admission = $request->get("free_admission");
            $free_admission_log["new_free_admission"]    = $application->free_admission;
            $application->appliedSubjects()->delete();
            if(sizeof($applied_subject_data)){
                AppliedSubject::insert($applied_subject_data);
            }
            // dd($application);
            $application->save();

            saveLogs(auth()->guard($guard)->id(), auth()->guard($guard)->user()->username, ucwords($guard), "Subject allocation editing done for {$application->id}");

        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            Session::flash('error','Something went wrong');
            return back();
        }
        DB::commit();
        event(new ApplicationSubjectEdited("Application No {$application->id}'s Allocated Subject Is Changed",$application,getSeatDetails()));
        Session::flash('success','Allocated subjects edited successfully.');
        return redirect()->route($view, $application->uuid);
    }
    public function show(Application $application) {
        $current_date_time = date("Y-m-d H:i:s");
        if(auth()->guard('admin')->check()){
            $view   = 'admin.subject-allocation.show';
            $guard  = 'admin';
        }elseif(auth()->guard('staff')->check()){
            $view   = 'staff.subject-allocation.show';
            $guard  = 'staff';
        }
        return view($view, compact("application"));
    }
    public function allocationValidationRules($application) {
        $validation_rules = [];
        if ($application->course_id == 1  && $application->semester_id == 1) {
            // HS First year
            $validation_rules = [
                "subjects"      => "required|array|size:6",
                "subjects.*"    => "required",
            ];
        } else if($application->course_id == 2 && in_array($application->appliedStream->stream_id, [4,6,8])) {
            // Degree with Major sub
            $validation_rules = [
                "subjects"      => "required|array",
                "subjects.*"    => "required",
            ];
        }

        return $validation_rules;
    }
}
