<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use DB;
use Exception;
use Illuminate\Http\Request;
use Session;
use Str;

class SelectSubjectController extends Controller
{
    public function create(Request $request, Application $application)
    {
        return view('student.application.select-subject.create', compact('application'));
    }

    public function store(Request $request, Application $application)
    {
        DB::beginTransaction();
        try {
            $applied_subject_data = [];
            if ($request->subjects) {
                foreach ($request->subjects as $index => $subject_id) {
                    if ($subject_id != "NA") {
                        $subject_obj = Subject::findOrFail($subject_id);
                        $applied_subject_data[] = [
                            'uuid' => (String) Str::uuid(),
                            "student_id" => $application->student_id,
                            "application_id" => $application->id,
                            "subject_id" => $subject_obj->id,
                            "is_compulsory" => $subject_obj->is_compulsory,
                            "is_major" => $subject_obj->is_major,
                            "preference" => 0,
                            "created_at" => date("Y-m-d H:i:s"),
                            "updated_at" => date("Y-m-d H:i:s"),
                            "allocated_by_id" => auth()->id(),
                            "allocated_by" => 'Student',
                        ];
                    }
                }
                if(sizeof($applied_subject_data)){
                    AppliedSubject::insert($applied_subject_data);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            dd($e);
        }
        DB::commit();
        Session::flash('success', 'Subject Added Successfully');
        return redirect()->route('student.application.index');
    }

    public function show(Request $request, Application $application)
    {
        return view('student.application.select-subject.show', compact('application'));
    }

    public function confirm(Request $request, Application $application)
    {
        $application->is_confirmed;
        $application->save();
        Session::flash('success', 'Subject Confirmed Successfully');
        return redirect()->route('student.application.index');
    }

    public function edit(Request $request, Application $application)
    {
        return view('student.select-subject.edit', compact('application'));
    }

    public function update(Request $request, Application $application)
    {
        DB::beginTransaction();
        try {
            $application->appliedSubjects()->delete();
            $application->save();
            $applied_subject_data = [];
            if ($request->subjects) {
                foreach ($request->subjects as $index => $subject_id) {
                    if ($subject_id != "NA") {
                        $subject_obj = Subject::findOrFail($subject_id);
                        $applied_subject_data[] = [
                            'uuid' => (String) Str::uuid(),
                            "student_id" => $application->student_id,
                            "application_id" => $application->id,
                            "subject_id" => $subject_obj->id,
                            "is_compulsory" => $subject_obj->is_compulsory,
                            "is_major" => $subject_obj->is_major,
                            "preference" => 0,
                            "created_at" => date("Y-m-d H:i:s"),
                            "updated_at" => date("Y-m-d H:i:s"),
                            "allocated_by_id" => auth()->id(),
                            "allocated_by" => 'Student',
                        ];
                    }
                }
                if(sizeof($applied_subject_data)){
                    AppliedSubject::insert($applied_subject_data);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('error', 'Something Went Wrong');
            return back();
        }
        DB::commit();
        Session::flash('success', 'Subject Added Successfully');
        return redirect()->route('student.application.index');
    }
}
