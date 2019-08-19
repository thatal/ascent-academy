<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Subject;
use App\Models\AdmittedStudent;
use App\Models\Stream;
use App\Models\AppliedSubject;
use App\Models\EditedApplication;
use DB, Log, Exception, Excel;

class TestController extends Controller
{
    public function percentageCorrection() {
        $all_application = Application::all();
        $logs = [];

        DB::beginTransaction();
        foreach ($all_application as $key => $application) {

            $edited_data = \Arr::except($application->toArray(), ["applied_subjects","applied_stream", "student", "course", "semester", "caste", "attachments", "receipt", "admitted_student", "payment_receipt"]);
            // degree 5 subject calculation
            $compulsory_subjects_score  = 0;
            $other_subjects_score           = [];
            $compulsory_subjects_score  = $application->sub_1_score + $application->sub_2_score;
            $other_subjects_score[$application->sub_3_name]     = $application->sub_3_score;
            $other_subjects_score[$application->sub_4_name]     = $application->sub_4_score;
            $other_subjects_score[$application->sub_5_name]     = $application->sub_5_score;
            $other_subjects_score[$application->sub_6_name]     = $application->sub_6_score;
            $minimum_score = min($other_subjects_score);

            if($application->course_id == 2){

                if($application->sub_1_total == 100){

                    $total = $compulsory_subjects_score + array_sum($other_subjects_score) - $minimum_score;
                    $percentage = ($total/5);
                    $corrected_total = (int)$total;
                    if($total != $application->all_total_marks){
                        // dumpp($application->id);
                        // dumpp("Old % ".$application->percentage);
                        // dumpp("NEW % ".$percentage);
                        // dumpp("OLD TOTAL ".$total." --- ".$application->all_total_marks." --- ".$application->total_marks_according_marksheet);
                        // dumpp("NEW TOTAL ".$corrected_total);
                        // echo "-----------";
                    }else{
                        if (round($percentage,2) != $application->percentage || $application->all_total_marks != $corrected_total) {
                            $logs[] = [
                                "application_id"    => $application->id,
                                "old_percentage"    => $application->percentage,
                                "new_percentage"    => $percentage,
                                "old_total"         => $application->all_total_marks,
                                "new_total"         => $corrected_total,
                            ];

                            $application->percentage        = round($percentage, 2);
                            $application->all_total_marks   = $corrected_total;
                        }
                    }
                }else{
                    // cgpa calculation
                    // dump($application->id);
                    $total = $compulsory_subjects_score + array_sum($other_subjects_score) - $minimum_score;
                    $percentage = ($total*9.5)/5;
                    $corrected_total = (int)($total*9.5);
                    dumpp($application->all_total_marks);
                    dumpp($corrected_total);
                    if (round($percentage,2) != $application->percentage || $application->all_total_marks != $corrected_total) {
                        $logs[] = [
                            "application_id"    => $application->id,
                            "old_percentage"    => $application->percentage,
                            "new_percentage"    => $percentage,
                            "old_total"         => $application->all_total_marks,
                            "new_total"         => $corrected_total,
                        ];
                        $application->percentage        = round($percentage, 2);
                        $application->all_total_marks   = $corrected_total;
                    }

                }
            }else if($application->course_id == 1){
                // hs sub 6, 5 calculation
                $na     = '';
                $total  = $compulsory_subjects_score;
                $subject_counter = 2;

                // percentage calculation
                if($application->sub_1_total == 100){
                    // percentage calculation
                    foreach ($other_subjects_score as $subject_name => $score) {
                        $na = str_replace(".", "", $subject_name);
                        if(strtolower($na) != "na"){
                            $total           += $score;
                            $subject_counter ++;
                        }
                    }
                    $percentage = ($total/$subject_counter);
                    $corrected_total = (int)($percentage * 6);
                    if (round($percentage,2) != $application->percentage || $application->all_total_marks != $corrected_total) {
                        $logs[] = [
                            "application_id"    => $application->id,
                            "old_percentage"    => $application->percentage,
                            "new_percentage"    => $percentage,
                            "old_total"         => $application->all_total_marks,
                            "new_total"         => $corrected_total,
                        ];

                        $application->percentage        = round($percentage, 2);
                        $application->all_total_marks   = $corrected_total;
                    }
                }else{
                    // cgpa calculation
                    foreach ($other_subjects_score as $subject_name => $score) {
                        $na = str_replace(".", "", $subject_name);
                        if(strtolower($na) != "na"){
                            $total           += $score;
                            $subject_counter ++;
                        }
                    }

                    $total = $total * 9.5;
                    $percentage = ($total/$subject_counter);
                    $corrected_total = (int)($percentage * 6);

                    if (round($percentage,2) != $application->percentage || $application->all_total_marks != $corrected_total) {
                        $logs[] = [
                            "application_id"    => $application->id,
                            "old_percentage"    => $application->percentage,
                            "new_percentage"    => $percentage,
                            "old_total"         => $application->all_total_marks,
                            "new_total"         => $corrected_total,
                        ];

                        $application->percentage        = round($percentage, 2);
                        $application->all_total_marks   = $corrected_total;
                    }
                }
                // cgpa calculation
            }
            // $edited_data = $application->toArray();
            $edited_data["created_at"] = null;
            $edited_data["updated_at"] = null;
            $edited_data["dob"]        = dateFormat($application->dob, "Y-m-d");
            // dump($application);
            // dump($edited_data);
            try {
                if($application->isDirty()){
                    $application->save();
                    EditedApplication::create($edited_data);
                }

            } catch (\Exception $e) {
                DB::rollback();
            }
        }
        DB::commit();
        // dumpp($logs);
        Log::info(json_encode($logs));
    }

    public function addCategory()
    {
        $applications = Application::whereDate('created_at','2019-01-05 00:00:00')->get();
        DB::beginTransaction();
        try {
            foreach ($applications as $key => $application) {
                if($application->caste_id==2 || $application->caste_id==6){
                    $application->category_id = 2;
                }else{
                    $application->category_id = $application->caste_id;
                }
                $application->save();
            }
        } catch (Exception $e) {
            dd($e);
        }

        DB::commit();
        dd('Successfull');

    }
    public function report_calculation() {
        return $this->subject_wise_student();
        $stream_id = 2;
        $total_collection = AddmitedStudent::whereHas("application");
    }
    public function subject_wise_student() {
        $stream_id = 2;// for science major
        $stream_ids = [2];
        $semester_ids = [2];
        // $is_major = 1; // 1= yes , 0 = no
        $selected_subuject_list = Subject::whereIn("stream_id", $stream_ids)->distinct("name")->orderBy("name", "ASC")->get()->groupBy("is_major")->values()->all();
  //    $major_subject_list = ($selected_subuject_list[1] ?? []);
  //    $non_major_subject_list = $selected_subuject_list[0];
  //    // for major subjects
  //    $major_list_student = AppliedSubject::with("subject", "application")->where("is_major", $is_major)
        //                  ->where(function($query) use ($major_subject_list, $stream_id, $is_major){
        //                      if(sizeof($major_subject_list) == 0){
        //                          $query->
        //                      }
        //                      foreach ($major_subject_list as $index => $subject) {
        //                          $query->orWhereHas("subject", function($sub_query) use ($subject, $stream_id, $is_major){
        //                              return $sub_query->where("name", "LIKE", "%{$subject->name}%")
        //                              ->where("is_major", $is_major);
        //                          });
        //                      }
        //                      return $query;
        //                  })
        //                  ->whereHas("application",  function($sub_sub_query) use ($stream_id){
        //                      return $sub_sub_query->whereHas("appliedStream", function($sub2_query) use ($stream_id){
        //                          return $sub2_query->where("stream_id", $stream_id);
        //                      });
        //                  })->get();
        // $major_list_student = $major_list_student->groupBy(function($item, $key){
        //  return $item->subject->name;
        // });
        // $major_wise_report = [];
        // $major_list_student->each(function($item, $subject_name) use(&$major_wise_report){
        //  $major_wise_report[$subject_name] = $item->count();
        // });
        // dump($major_wise_report);
        // dump($major_list_student);
        //      dump($selected_subuject_list);
        $stream = Stream::withTrashed()->find($stream_id);
        $header_string = $stream->name;
        $admitted_students_major_subjects = AdmittedStudent::with("application.appliedMajorSubjects.subject", "application.appliedSubjects", "application.appliedStream.stream")
                ->whereIn("stream_id", $stream_ids)
                ->whereIn("semester_id", $semester_ids)
                ->whereHas("application", function($query){
                    return $query->has("appliedMajorSubjects", ">", 0);
                })
                ->get();
        $subject_wise_admitted_student = $admitted_students_major_subjects->groupBy(function($item, $key){
            return $item->application->appliedMajorSubjects->subject->name;
        });
        $student_list_subjects_wise = [];
        $subject_wise_student   = [];
        $subject_wise_admitted_student_major = [];
        $subject_wise_admitted_student->each(function($item,$key) use (&$subject_wise_admitted_student_major, $header_string, &$subject_wise_student){
            $subject_wise_admitted_student_major[$key] = $item->count();
            foreach ($item as $index => $admitted_student) {
                $subject_wise_student[] = [
                    "Type"              => "Major",
                    "Subject"           => $key,
                    "Subject ID"        => $admitted_student->application->appliedMajorSubjects->subject->id,
                    "Application No"    => $admitted_student->application_id,
                    "Applicant Name"    => $admitted_student->application->fullname,
                    "UUID"              => $admitted_student->uid,
                    "Stream"            => $admitted_student->application->appliedStream->stream->name,
                    "Semester"          => $admitted_student->semester->name,
                ];
            }
        });
        $subject_wise_admitted_student_non_major = [];
        $admitted_students_non_major_subjects = AdmittedStudent::with("application.appliedMajorSubjects.subject", "application.appliedSubjects")
                ->whereIn("stream_id", $stream_ids)
                ->whereIn("semester_id", $semester_ids)
                ->whereHas("application", function($query){
                    return $query->has("appliedSubjects", ">", 0);
                })
                ->get();
        $admitted_students = [];
        foreach ($admitted_students_non_major_subjects as $key => $admitted_student) {
            foreach ($admitted_student->application->appliedSubjects as $key => $subject) {
                if($subject->is_major){
                    continue;
                }
                $subject_wise_student[] = [
                    "Type"              => "Non Major",
                    "Subject"           => $subject->subject->name,
                    "Subject ID"        => $subject->subject->id,
                    "Application No"    => $admitted_student->application_id,
                    "Applicant Name"    => $admitted_student->application->fullname,
                    "UUID"              => $admitted_student->uid,
                    "Stream"            => $admitted_student->application->appliedStream->stream->name,
                    "Semester"          => $admitted_student->semester->name,
                ];
                if(isset($subject_wise_admitted_student_non_major[ucwords(trim($subject->subject->name))])){
                    $subject_wise_admitted_student_non_major[ucwords(trim($subject->subject->name))] +=1;
                }else{
                    $subject_wise_admitted_student_non_major[ucwords(trim($subject->subject->name))] =1;
                }
            }
        }

        $admitted_student_stream = AdmittedStudent::where("stream_id", $stream_id)->count();
        dumpp($admitted_students_major_subjects->count() + $admitted_students_non_major_subjects->count());
        dumpp($header_string);
        ksort($subject_wise_admitted_student_major);
        ksort($subject_wise_admitted_student_non_major);
        dumpp(json_encode($subject_wise_admitted_student_major));
        dumpp(json_encode($subject_wise_admitted_student_non_major));
        dumpp($admitted_student_stream);
        dumpp("All admited Student");
        dumpp(json_encode($subject_wise_student));
        // dumpp(json_encode($admitted_students));
        // return Excel::download(new ApplicationExport($applications), 'applications.xlsx');
    }

    public function library_reports() {
        $session = 2019;
        $admitted_students = AdmittedStudent::with("application.course","application.caste", "application.appliedStream.stream", "admission_receipts")
                ->where("year", $session)->get();
        $admitted_studetns_grouped = $admitted_students->groupBy("course_id")->transform(function($item, $key){
            return $item->groupBy('stream_id');
        });
        $return_json = [];
        foreach ($admitted_studetns_grouped as $course_id => $grouped_course_wise) {
            foreach ($grouped_course_wise as $course_id => $stream_wise_record) {
                $stream_wise_record_sorted = $stream_wise_record->sortBy(function($item, $Key){
                    $item->application->fullname;
                });
                foreach ($stream_wise_record_sorted as $key => $record) {
                    $record = (object)$record;
                    $return_json[] = [
                        "Category"              => "",
                        "Course_Designation"    => $this->getCourseDesignation($record->application),
                        "Institute"             => "Darrang College",
                        "Department"            => $record->application->appliedStream->stream->name,
                        "MemberFirstName"       => explode(" ",$record->application->fullname)[0],
                        "MemberLastName"        => explode(" ",$record->application->fullname)[1],
                        "PermanentAddress"      => $this->getPermanentAddress($record->application),
                        "PermanentCity"         => $record->application->permanent_city,
                        "PermanentPinCode"      => $record->application->permanent_pin,
                        "TempAddress"           => $this->getTemporaryAddress($record->application),
                        "TempCity"              => $record->application->present_city,
                        "TempPinCode"           => $record->application->present_pin,
                        "Phone"                 => $record->application->mobile_no,
                        "Email"                 => $record->application->email,
                        "MemberType"            => $record->application->caste->name,
                        "Remark"                => 0,
                        "MemberID"              => $record->uid,
                        "ValidFrom"             => "",
                        "ValidTo"               => "",
                        "EntryDate"             => "",
                        "Gender"                => $record->application->gender,
                        "MemberYear"            => "",
                        "DateOfBirth"           => dateFormat($record->application->dob, "d/m/Y"),
                        "MemberCode"            => "",
                    ];
                }
            }
        }
        echo(json_encode($return_json));
    }

    public function getPermanentAddress($application) {
        $address = "";
        $address .= $application->permanent_vill_or_town;
        $address .= ", ".$application->permanent_city;
        $address .= ", ".$application->permanent_district;
        $address .= ", ".$application->permanent_state;
        $address .= "-".$application->permanent_pin;
        return $address;
    }
    public function getTemporaryAddress($application) {
        $address = "";
        $address .= $application->present_vill_or_town;
        $address .= ", ".$application->present_city;
        $address .= ", ".$application->present_district;
        $address .= ", ".$application->present_state;
        $address .= "-".$application->present_pin;
        return $address;
    }
    public function getCourseDesignation($application) {
        return $application->appliedStream->stream->abbreviation;
        $course = "";
        if(strtoupper(trim($application->course->name)) == "HIGHER SECONDARY"){
            $course = "H.S";
            return $course." (".$application->appliedStream->stream->name.")";
        }else{
            $course = "";
            $stream = "";
            if(stripos($application->appliedStream->stream->name, "Arts") !== false){
                $course = "B.A";
            }
            if(stripos($application->appliedStream->stream->name, "Science") !== false){
                $course = "B.Sc.";
            }
            if(stripos($application->appliedStream->stream->name, "commerce") !== false){
                $course = "B.Com.";
            }
            if(stripos($application->appliedStream->stream->name, "Honours") !== false){
                 $course .="(Honours)";
            }
            if(stripos($application->appliedStream->stream->name, "Honours") !== false){
                 $course .="(Regular)";
            }
        }

    }

}
//
