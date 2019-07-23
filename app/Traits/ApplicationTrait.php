<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\AdmittedStudent;
use App\Models\Caste;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\AppliedSubject;
use App\Models\AppliedStream;
use App\Models\ApprovedList;
use App\Models\RejectedList;
use App\Models\Student;
use App\Models\Reservation;
use App\Exports\ApplicationExport;
use App\Models\EditedApplication;
use App\Models\EditedAppliedSubject;
use App\Models\EditedAppliedStream;
use App\Events\ApplicationEdited;
use App\Http\Controllers\Common\ApplicationController as CommonApplicationController;
use DB, Session, Log, Exception, Str, Excel, PDF, Validator, Image, Redirect;

trait ApplicationTrait
{
    public function applicationList($request,$paginate)
    {
        $course                 = $request->get("course");
        $semester               = $request->get("semester");
        $stream                 = $request->get("stream");
        $preference             = $request->get("preference");
        $year                   = $request->get("year");
        $from_percentage        = $request->get("from_percentage");
        $to_percentage          = $request->get("to_percentage");
        $caste                  = $request->get("caste");
        $category               = $request->get("category");
        $status                 = $request->get("status");
        $order_by_percentage    = $request->get("order_by_percentage");
        $application_no         = $request->get("application_no");
        $registration_no         = $request->get("registration_no");
        $board                  = $request->get("board");
        $limit                  = $request->get("limit");

        $boards = Application::where('is_confirmed',1)->get()->pluck('last_board_or_university')->unique()->toArray();
        $castes = Caste::get();
        $courses = Course::get();
        $semesters = collect();
        $streams = collect();
        $selected_stream = null;
        if($semester){
            $semesters = Semester::where('id',$semester)->get();
        }elseif($course){
            $semesters = Semester::where('course_id',$course)->get();
        }
        if($stream){
            $streams = Stream::where('id',$stream)->get();
        }elseif($course){
            $streams = Stream::where('course_id',$course)->get();
        }

        $years = Application::select('year')->distinct()->get();
        $reservations = '';

        $applications = Application::where('is_confirmed',1)->where('payment_status',1);
        if($application_no){
            $applications = $applications->where('id',$application_no);
        }
        if($registration_no){
            $applications = $applications->where('student_id',$registration_no);
        }
        if($course){
            $applications = $applications->where('course_id',$course);
        }
        if($semester){
            $applications = $applications->where('semester_id',$semester);
        }
        if($stream){
            $applications = $applications->whereHas('appliedStream',function($query) use ($stream){
                $query->where('stream_id',$stream);
            });
            $reservations = Reservation::where('stream_id',$stream)->get();
            $selected_stream = Stream::find($stream);
        }
        if($board){
            $applications = $applications->where('last_board_or_university','like',$board);
        }
        if($preference){
            $applications = $applications->whereHas('appliedSubjects',function($query) use ($preference){
                $query->where('preference',$preference);
            });
        }
        if($year){
            $applications = $applications->where('year',$year);
        }
        if($from_percentage){
            $applications = $applications->where('percentage','>=',$from_percentage);
        }
        if($to_percentage){
            $applications = $applications->where('percentage','<=',$to_percentage);
        }
        if($order_by_percentage){
            $applications = $applications->orderBy('all_total_marks',$order_by_percentage);
        }
        if($caste){
            $applications = $applications->where('caste_id',$caste);
        }
        if($status){
            if($status=='pending')
                $applications = $applications->where('status',0);
            if($status=='verified')
                $applications = $applications->where('status',1);
            elseif($status=='on-hold')
                $applications = $applications->where('status',2);
            elseif($status=='subject-allocated')
                $applications = $applications->where('status',3);
            elseif($status=='admission-done')
                $applications = $applications->where('status',4);
            elseif($status=='rejected')
                $applications = $applications->where('status',5);
            elseif($status=='already-admitted')
                $applications = $applications->where('status',6);
            elseif($status=='rejected-as-no-seat')
                $applications = $applications->where('status',7);
            // elseif($status=='selected')
            //     $applications = $applications->where('status',3);
        }
        if($category){
            if($category=='co-curricular')
                $applications = $applications->where('co_curricular',1);
            elseif($category=='differently-abled')
                $applications = $applications->where('differently_abled',1);
        }
        if($paginate){
            $applications = $applications->paginate($limit);
        }else{
            $applications = $applications->get();
        }
        $data = [
            'applications' => $applications,
            'courses' => $courses,
            'castes' => $castes,
            'semesters' => $semesters,
            'streams' => $streams,
            'years' => $years,
            'reservations' => $reservations,
            'selected_stream' => $selected_stream,
            'boards' => $boards,
        ];
        return $data;
    }
    public function index(Request $request)
    {   
        $data = $this->applicationList($request,'paginate');
        $applications = $data['applications'];
        $courses = $data['courses'];
        $castes = $data['castes'];
        $semesters = $data['semesters'];
        $streams = $data['streams'];
        $years = $data['years'];
        $reservations = $data['reservations'];
        $selected_stream = $data['selected_stream'];
        $boards = $data['boards'];
        if(auth()->guard('admin')->check()){
            $view = 'admin.application.index'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.index'; 
        }
        return view($view,compact('applications','castes','courses','semesters','streams','years','reservations','selected_stream','boards'));
    }

    public function indexExport(Request $request)
    {
        $data = $this->applicationList($request,'');
        $applications = $data['applications'];
        $courses = $data['courses'];
        $castes = $data['castes'];
        $semesters = $data['semesters'];
        $streams = $data['streams'];
        $years = $data['years'];
        $reservations = $data['reservations'];
        return Excel::download(new ApplicationExport($applications), 'applications.xlsx');
    }

    public function show(Application $application)
    {
        $appliedSubjects = null;
        $preferences = null;
        if($application->appliedSubjects->where('preference','!=',0)->count()){
            $preferences = $application->appliedSubjects->groupBy('preference');
        }else{
            $appliedSubjects = $application->appliedSubjects;
        }
        if(auth()->guard('admin')->check()){
            $view = 'admin.application.show'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.show'; 
        }
        return view($view,compact('application','appliedSubjects','preferences'));
    }

    public function edit(Application $application)
    {   /*event(new ApplicationEdited('Application Edited',$application,getSeatDetails()));*/
        $castes = Caste::get();
        $courses = Course::get();
        $semesters = Semester::where('course_id',$application->course_id)->get();
        $streams = Stream::where('course_id',$application->course_id)->get();
        $applied_course= $application->course->name;
        $applied_stream = $application->appliedStream->stream->name;
        $applied_subs = $application->appliedSubjects->pluck('id')->toArray();

        $all_subjects = Subject::get();
        $stream_wise_subjects = [];
        $all_subjects->each(function($subject, $key) use (&$stream_wise_subjects){
            $stream_wise_subjects[$subject->stream_id][$subject->subject_no][] = [
                "id"    => $subject->id,
                "name"  => $subject->name,
                "pr"    => $subject->subject_no,
                "major" => $subject->is_major,
                "cm"    => $subject->is_compulsory,
            ];
        });

        if(auth()->guard('admin')->check()){
            $view = 'admin.application.edit'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.edit'; 
        }
        return view($view,compact('application','castes','courses','semesters','streams','applied_stream','applied_course','applied_subs', 'stream_wise_subjects'));
    }

    public function update(Request $request, Application $application)
    {
        if(auth()->guard('admin')->check()){
            $view = 'admin.application.show'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.show'; 
        }
        
        // Log::info($request->all());
        // dd($request->all());
        $path = 'public/uploads/'.auth()->id().'/';
        // $docs = $this->storeDocs($request);
        DB::beginTransaction();
        try {
            $application_data = [
                // 'uuid'              => (String) Str::uuid(),
                // 'student_id'        => $application->student_id,
                'course_id'         => $request->course_id,
                'semester_id'       => $request->semester_id,
                'fullname'          => ucwords($request->fullname),
                'mobile_no'         => $request->mobile_no,
                'email'             => $request->email,
                'free_admission'    => $request->free_admission,
                'last_board_or_university_state'    => $request->last_board_or_university_state,
                'gender'            => $request->gender,
                'dob'               => $request->dob,
                'fathers_name'      => $request->fathers_name,
                'mothers_name'      => $request->mothers_name,
                'annual_income'     => $request->annual_income,
                'religion'          => $request->religion,
                'caste_id'          => $request->caste_id,

                'present_vill_or_town' => $request->present_vill_or_town,
                'present_city'          => $request->present_city,
                'present_state'     => $request->present_state,
                'present_district'  => $request->present_district,
                'present_pin'       => $request->present_pin,
                'present_nationality' => $request->present_nationality,

                'permanent_vill_or_town' => $request->permanent_vill_or_town,
                'permanent_city'    => $request->permanent_city,
                'permanent_state'   => $request->permanent_state,
                'permanent_district' => $request->permanent_district,
                'permanent_pin'     => $request->permanent_pin,
                'permanent_nationality' => $request->permanent_nationality,
                
                'last_board_or_university' => ( $request->other_board_university ? $request->other_board_university:  $request->last_board_or_university),
                'last_exam_roll'    => $request->last_exam_roll,
                'last_exam_no'      => $request->last_exam_no,
                'sub_1_name'        => $request->sub_1_name,
                'sub_1_total'       => $request->sub_1_total,
                'sub_1_score'       => $request->sub_1_score,
                
                'sub_2_name'        => $request->sub_2_name,
                'sub_2_total'       => $request->sub_2_total,
                'sub_2_score' => $request->sub_2_score,
                
                'sub_3_name' => $request->sub_3_name,
                'sub_3_total' => $request->sub_3_total,
                'sub_3_score' => $request->sub_3_score,

                'sub_4_name' => $request->sub_4_name,
                'sub_4_total' => $request->sub_4_total,
                'sub_4_score' => $request->sub_4_score,


                'sub_5_name' => $request->sub_5_name,
                'sub_5_total' => $request->sub_5_total,
                'sub_5_score' => $request->sub_5_score,


                'sub_6_name' => $request->sub_6_name,
                'sub_6_total' => $request->sub_6_total,
                'sub_6_score' => $request->sub_6_score,

                'total_marks_according_marksheet' => $request->total_marks_according_marksheet,
                'all_total_marks' => $request->all_total_marks,
                
                'percentage' => $request->percentage,
                // 'year' => date('Y'),
                'blood_group' => $request->blood_group,
                // 'passport' => $path.$docs['passport_name'],
                // 'sign' => $path.$docs['sign_name'],
                
            ];
            // if ($application_data['passport'] != "") {
            //     unset($application_data["passport"]);
            // }
            // if ($application_data['sign'] != "") {
            //     unset($application_data["sign"]);
            // }
/*            $attachment_data = [
                
                'marksheet' => ($docs['marksheet_name'])? $path.$docs['marksheet_name'] : '',
                'pass_certificate' => ($docs['pass_certificate_name'])? $path.$docs['pass_certificate_name'] : '',
                'caste_certificate' => ($docs['caste_certificate_name'])? $path.$docs['caste_certificate_name'] : '',
                'gap_certificate' => ($docs['gap_certificate'])? $path.$docs['gap_certificate'] : '',
                'co_curricular_certificate' => ($docs['co_curricular_certificate'])? $path.$docs['co_curricular_certificate'] : '',
                'differently_abled_certificate' => ($docs['differently_abled_certificate'])? $path.$docs['differently_abled_certificate'] : '',
                'income_certificate' => ($docs['income_certificate'])? $path.$docs['income_certificate'] : '',
                'image_of_tree_plantation' => ($docs['image_of_tree_plantation'])? $path.$docs['image_of_tree_plantation'] : '',
            ];*/
            
            if ($request->co_curricular) {
                $application_data['co_curricular'] = 1;
            }else{
                $application_data['co_curricular'] = 0;
            }
            if ($request->differently_abled) {
                $application_data['differently_abled'] = 1;
            }else{
                $application_data['differently_abled'] = 0;
            }
            if (strtolower($request->gap) == "yes") {
                $application_data['is_gap'] = 1;
            }else{
                $application_data['is_gap'] = 0;
            }

            $application_rules  = Application::$rules;
            $validator = Validator::make( $application_data, $application_rules);
            if ($validator->fails()) {
                // dump($request->all());
                // dd($validator->errors());
                return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
            }
            // dd($request->all());
            $edited_data = \Arr::except($application->toArray(), ["applied_major_subjects","applied_subjects","applied_stream", "student", "course", "semester", "caste", "attachments", "receipt", "admitted_student", "payment_receipt"]);
            if(auth()->guard('admin')->check()){
                $user_id = auth()->guard('admin')->id(); 
                $username = auth()->guard('admin')->user()->username; 
                $guard = 'Admin'; 
            }elseif(auth()->guard('staff')->check()){
                $user_id = auth()->guard('staff')->id(); 
                $username = auth()->guard('staff')->user()->username; 
                $guard = 'Staff'; 
            }
            $edited_data["edited_by_id"] = $user_id;
            $edited_data["edited_by"] = $guard;
            $edited_data["created_at"] = date('Y-m-d H:i:s');
            $edited_data["updated_at"] = date('Y-m-d H:i:s');
            $edited_data["dob"]        = dateFormat($application->dob, "Y-m-d");
            $application->update($application_data);
            $application->appliedStream()->delete();
            EditedApplication::create($edited_data);
            // $application->appliedSubjects()->delete();
            // $application->save();
            
            /*$file_validation_rule = Application::$file_rules;
            $file_validation_rule["marksheet"] = str_replace("required|", "", $file_validation_rule["marksheet"]);
            $validator = Validator::make( $request->all(), $file_validation_rule);
            if ($validator->fails()) {
                return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
            }*/
/*
            $attachment_create_data = [];
            foreach ($attachment_data as $doc_name => $attachment_path) {
                if ($attachment_path != '') {
                    $attachment_create_data[] = [
                        "student_id"        => auth()->id(),
                        "application_id"    => $application->id,
                        "doc_name"          => $doc_name,
                        "path"              => $attachment_path,
                        "created_at"        => date("Y-m-d H:i:s"),
                        "updated_at"        => date("Y-m-d H:i:s")
                    ];
                    $needed_to_delete_file[]= $doc_name;
                }
            }
            if (sizeof($attachment_create_data)) {
                // Delete attachment which is uploaded again on edits
                Attachment::where("student_id", auth()->id())
                            ->where("application_id", $application->id)
                            ->whereIn("doc_name", $needed_to_delete_file)
                            ->delete();
                Attachment::insert($attachment_create_data);   
            }*/


            $this->createOnlyStream($request, $application);
            // $this->createStreamAndSubject($request, $application);
            saveLogs($user_id, $username, $guard, "Application edited by {$guard} with id {$user_id} for {$application->id}");

        } catch (Exception $e) {
            Log::error($e);
            // dd($e);
            DB::rollback();
            Session::flash('error','Something Went Wrong');
            return back();
        }
        DB::commit();
        event(new ApplicationEdited("Application No {$application->id} Has Been Edited",$application,getSeatDetails()));
        Session::flash("success", "Application successfully updated.");
        return redirect()->route($view,[$application->uuid]);
    
    }

    public function storeDocs($request)
    {
        
        $destinationPath = public_path('uploads/'.auth()->id());
        $passport_name = '';
        $sign_name = '';
        $marksheet_name = '';
        $pass_certificate_name = '';
        $caste_certificate_name = '';
        if (request()->hasFile('passport')) {
            $passport = request()->file('passport');
            $passport_name = date('dmYHis')."-passport." . $passport->getClientOriginalExtension();
            $passport->move($destinationPath."/", $passport_name);    
        }
        if (request()->hasFile('sign')) {
            $sign = request()->file('sign');
            $sign_name = date('dmYHis')."-sign." . $sign->getClientOriginalExtension();
            $sign->move($destinationPath."/", $sign_name);    
        }
        if (request()->hasFile('marksheet')) {
            $marksheet = request()->file('marksheet');
            $marksheet_name = date('dmYHis')."-marksheet." . $marksheet->getClientOriginalExtension();
            // $marksheet->move($destinationPath, $marksheet_name);    

            // update code with Image compression
            $marksheet_image = Image::make($marksheet);
            // save file as jpg with medium quality
            $marksheet_image->save($destinationPath."/".$marksheet_name, 60);
            $marksheet_image->destroy();
        }
        if (request()->hasFile('pass_certificate')) {
            $pass_certificate = request()->file('pass_certificate');
            $pass_certificate_name = date('dmYHis')."-pass_certificate." . $pass_certificate->getClientOriginalExtension();
            // $pass_certificate->move($destinationPath, $pass_certificate_name);   

            // update code with Image compression
            $pass_certificate_image = Image::make($pass_certificate);
            // save file as jpg with medium quality
            $pass_certificate_image->save($destinationPath."/".$pass_certificate_name, 60); 
            $pass_certificate_image->destroy();
        }
        if (request()->hasFile('caste_certificate')) {
            $caste_certificate = request()->file('caste_certificate');
            $caste_certificate_name = date('dmYHis')."-caste_certificate." . $caste_certificate->getClientOriginalExtension();
            // $caste_certificate->move($destinationPath, $caste_certificate_name);

            // update code with Image compression
            $caste_certificate_image = Image::make($caste_certificate);
            // save file as jpg with medium quality
            $caste_certificate_image->save($destinationPath."/".$caste_certificate_name, 60);
            $caste_certificate_image->destroy();
        }
        $gap_certificate_name = "";
        if (request()->hasFile('gap_certificate')) {
            $gap_certificate = request()->file('gap_certificate');
            $gap_certificate_name = date('dmYHis')."-gap_certificate." . $gap_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $gap_certificate_name);

            // update code with Image compression
            $gap_certificate_image = Image::make($gap_certificate);
            // save file as jpg with medium quality
            $gap_certificate_image->save($destinationPath."/".$gap_certificate_name, 60);
            $gap_certificate_image->destroy();
        }
        $co_curricular_certificate_name = "";
        if (request()->hasFile('co_curricular_certificate')) {
            $co_curricular_certificate = request()->file('co_curricular_certificate');
            $co_curricular_certificate_name = date('dmYHis')."-co_curricular_certificate." . $co_curricular_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $co_curricular_certificate_name);

            // update code with Image compression
            $co_curricular_certificate_image = Image::make($co_curricular_certificate);
            // save file as jpg with medium quality
            $co_curricular_certificate_image->save($destinationPath."/".$co_curricular_certificate_name, 60);
            $co_curricular_certificate_image->destroy();
        }
        $differently_abled_name = "";
        if (request()->hasFile('differently_abled')) {
            $differently_abled = request()->file('differently_abled');
            $differently_abled_name = date('dmYHis')."-differently_abled." . $differently_abled->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $differently_abled_name);

            // update code with Image compression
            $differently_abled_image = Image::make($differently_abled);
            // save file as jpg with medium quality
            $differently_abled_image->save($destinationPath."/".$differently_abled_name, 60);
            $differently_abled_image->destroy();
        }
        $income_certificate_name = "";
        if (request()->hasFile('income_certificate')) {
            $income_certificate = request()->file('income_certificate');
            $income_certificate_name = date('dmYHis')."-income_certificate." . $income_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $income_certificate_name);

            // update code with Image compression
            $income_certificate_image = Image::make($income_certificate);
            // save file as jpg with medium quality
            $income_certificate_image->save($destinationPath."/".$income_certificate_name, 60);
            $income_certificate_image->destroy();
        }
        $image_of_tree_plantation_name = "";
        if (request()->hasFile('image_of_tree_plantation')) {
            $image_of_tree_plantation = request()->file('image_of_tree_plantation');
            $image_of_tree_plantation_name = date('dmYHis')."-image_of_tree_plantation." . $image_of_tree_plantation->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $image_of_tree_plantation_name);

            // update code with Image compression
            $image_of_tree_plantation_image = Image::make($image_of_tree_plantation);
            // save file as jpg with medium quality
            $image_of_tree_plantation_image->save($destinationPath."/".$image_of_tree_plantation_name, 60);
            $image_of_tree_plantation_image->destroy();
        }
        return [
            'passport_name' => $passport_name,
            'sign_name' => $sign_name,
            'marksheet_name' => $marksheet_name,
            'pass_certificate_name' => $pass_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'gap_certificate'        => $gap_certificate_name,
            'co_curricular_certificate'        => $co_curricular_certificate_name,
            'differently_abled_certificate'        => $differently_abled_name,
            'income_certificate'        => $income_certificate_name,
            'image_of_tree_plantation'  => $image_of_tree_plantation_name,
        ];
    
    }

    private function createOnlyStream($request, $application) {
        $applied_stream_data = [
            'uuid'          => (String) Str::uuid(),
            'student_id'    => $application->student_id,
            'application_id' => $application->id,
            'stream_id'     => $request->stream_id
        ];
        $stream_rules = AppliedStream::$rules;
        // AppliedStream::create($applied_stream_data);
        $validator = Validator::make($applied_stream_data, $stream_rules);
        if($validator->fails()){
            Log::error($validator->errors());
            return Redirect::back()->withInput()->withErrors($validator)->send();
        }
        AppliedStream::create($applied_stream_data);
    }

    public function verify(Request $request, Application $application)
    {
        if($application->status==1){
            Session::flash('error','Application has been already verified');
            return back();
        }
        $application->status = 1;
        if(auth()->guard('admin')->check()){
            $application->verified_by = "Admin";
            $application->verified_by_id = auth()->guard('admin')->id();
            $user_id = auth()->guard('admin')->id(); 
            $username = auth()->guard('admin')->user()->username; 
            $guard = 'Admin'; 
        }elseif(auth()->guard('staff')->check()){
            $application->verified_by = "Staff";
            $application->verified_by_id = auth()->guard('staff')->id();
            $user_id = auth()->guard('staff')->id(); 
            $username = auth()->guard('staff')->user()->username; 
            $guard = 'Staff'; 
        }
        $application->save();
        saveLogs($user_id, $username, $guard, "Application approved for {$application->id}");
        Session::flash('success','Verified Successfully');
        return back();
    }

    public function onHold(Request $request, Application $application)
    {
        if($application->status==2){
            Session::flash('error','Application has been already verified');
            return back();
        }
        $application->status = 2;
        if(auth()->guard('admin')->check()){
            $application->verified_by = "Admin";
            $application->verified_by_id = auth()->guard('admin')->id();
            $user_id = auth()->guard('admin')->id(); 
            $username = auth()->guard('admin')->user()->username; 
            $guard = 'Admin'; 
        }elseif(auth()->guard('staff')->check()){
            $application->verified_by = "Staff";
            $application->verified_by_id = auth()->guard('staff')->id();
            $user_id = auth()->guard('staff')->id(); 
            $username = auth()->guard('staff')->user()->username; 
            $guard = 'Staff'; 
        }
        $application->on_hold_reason = $request->reason;
        $application->save();
        saveLogs($user_id, $username, $guard, "Application put on hold for {$application->id}");
        Session::flash('success','Put On Hold Successfully');
        return back();
    }
    public function reject(Request $request, Application $application)
    {
        if($application->status==5){
            Session::flash('error','Application has been already rejected');
            return back();
        }
        $application->status = 5;
        if(auth()->guard('admin')->check()){
            $application->rejected_by = "Admin";
            $application->rejected_by_id = auth()->guard('admin')->id();
            $user_id = auth()->guard('admin')->id(); 
            $username = auth()->guard('admin')->user()->username; 
            $guard = 'Admin'; 
        }elseif(auth()->guard('staff')->check()){
            $application->rejected_by = "Staff";
            $application->rejected_by_id = auth()->guard('staff')->id();
            $user_id = auth()->guard('staff')->id(); 
            $username = auth()->guard('staff')->user()->username; 
            $guard = 'Staff'; 
        }
        $application->rejection_reason = $request->reason;
        $application->save();
        saveLogs($user_id, $username, $guard, "Application rejected for {$application->id}");
        Session::flash('success','Rejected Successfully');
        return back();
    }

    // public function select(Request $request, Application $application)
    // {
    //     $application->status = 3;
    //     $application->selection_done_by = "Admin";
    //     $application->selection_done_by_id = auth()->guard('admin')->id();
    //     $application->selection_caste_id = $request->category;
    //     $application->save();
    //     if(auth()->guard('admin')->check()){
    //         $user_id = auth()->guard('admin')->id(); 
    //         $username = auth()->guard('admin')->user()->username; 
    //         $guard = 'Admin'; 
    //     }elseif(auth()->guard('staff')->check()){
    //         $user_id = auth()->guard('staff')->id(); 
    //         $username = auth()->guard('staff')->user()->username; 
    //         $guard = 'Staff'; 
    //     }
    //     saveLogs($user_id, $username, $guard, "Application selected for {$application->id}");
    //     Session::flash('success','Selected Successfully');
    //     return back();
    // }

    public function downloadApplication(Request $request, Application $application)
    {
        if($application->payment_status=1 && $application->is_confirmed=1){
            $common_application = new CommonApplicationController();
            $pdf = $common_application->downloadApplication($request,$application);
            return $pdf->stream('Darrang-Application.pdf');
        }else{
            return back();
        }
    }

    public function liveMeritList(Request $request)
    {
        $data = $this->applicationList($request,'');
        $applications = $data['applications'];
        $courses = $data['courses'];
        $castes = $data['castes'];
        $semesters = $data['semesters'];
        $streams = $data['streams'];
        $years = $data['years'];
        $reservations = $data['reservations'];
        $selected_stream = $data['selected_stream'];
        $boards = $data['boards'];
        if(auth()->guard('admin')->check()){
            $view = 'admin.application.live-merit-list'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.live-merit-list'; 
        }
        return view($view,compact('applications','castes','courses','semesters','streams','years','reservations','selected_stream','boards'));
    }

    public function liveSeatAvailable(Request $request)
    {
        $stream                 = $request->get("stream");
        $is_major = 0;
        $reservations = collect();
        $majors = collect();
        $major_names = collect();
        if(in_array($stream, [4,6,8])){
            $reservations = Reservation::where('stream_id',$stream)->get();
            $majors = $reservations->groupBy('major_id');
            $major_names = Subject::where('stream_id',$stream)->get();
            $is_major = 1;
        }else{
            $reservations = Reservation::where('stream_id',$stream)->get();
        }
        if(auth()->guard('admin')->check()){
            $view = 'admin.application.live-seat-available'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.application.live-seat-available'; 
        }
        $seat_details = getSeatDetails();
        return view($view,compact('reservations','majors','is_major','major_names','seat_details'));
    }

    public function icard()
    {
            if(auth()->guard('admin')->check()){
                $view = 'admin.i-card.create'; 
            }elseif(auth()->guard('staff')->check()){
                $view = 'staff.i-card.create'; 
            }
            return view($view);
    }

    public function showIcard(Request $request)
    {
            $uid = $request->uid;
            $admitted_student = AdmittedStudent::where('uid',$uid)->with('application.appliedStream.stream')->first();
            if(isset($admitted_student)){
     
                if(auth()->guard('admin')->check()){
                    $view = 'admin.i-card.create'; 
                }elseif(auth()->guard('staff')->check()){
                    $view = 'staff.i-card.create'; 
                }
                return view($view,compact('admitted_student'));
            }
            else
                return Redirect::back()->withInput()->withErrors(['No Record Found']);
            //$application = Application::where()
            // if(auth()->guard('admin')->check()){
            //     $view = 'admin.i-card.create'; 
            // }elseif(auth()->guard('staff')->check()){
            //     $view = 'staff.i-card.create'; 
            // }
           // return view($view);
    }

}