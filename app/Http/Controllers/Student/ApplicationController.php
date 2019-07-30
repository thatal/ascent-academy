<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Common\ApplicationController as CommonApplicationController;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\AppliedStream;
use App\Models\AppliedSubject;
use App\Models\Attachment;
use App\Models\Caste;
use App\Models\Course;
use App\Models\OnlinePayment;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;
use DB;
use Exception;
use Illuminate\Http\Request;
use Image;
use Log;
use Session;
use Str;
use Validator;

class ApplicationController extends Controller
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
    public function index()
    {
        $applications = Application::with('student', 'course', 'semester', 'caste', 'appliedSubjects', 'appliedStream', 'attachments', 'receipt', 'admittedStudent', 'paymentReceipt')->where('student_id', auth()->id())->paginate();
        return view('student.application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $castes = Caste::get();
        $courses = Course::with("streams", "semesters")->get();
        // $application = [];
        $applied_course = [];
        $applied_subs = [];

        $all_subjects = Subject::get();
        $stream_wise_subjects = [];
        $all_subjects->each(function ($subject, $key) use (&$stream_wise_subjects) {
            $stream_wise_subjects[$subject->stream_id][$subject->subject_no][] = [
                "id" => $subject->id,
                "name" => $subject->name,
                "pr" => $subject->subject_no,
                "major" => $subject->is_major,
                "cm" => $subject->is_compulsory,
            ];
        });
        $fullname = '';
        if (auth()->user()->application()->exists()) {
            $fullname = auth()->user()->application->first()->fullname;
        }
        return view('student.application.create', compact('castes', 'courses', 'applied_course', 'applied_subs', 'stream_wise_subjects', 'fullname'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Log::info($request->all());
        $path = 'public/uploads/' . auth()->id() . '/';
        $file_validation_rule = Application::$file_rules;
        $validator = Validator::make($request->all(), $file_validation_rule);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
        }
        $docs = $this->storeDocs($request);
        DB::beginTransaction();
        try {
            $application_data = [
                'uuid' => (String) Str::uuid(),
                'student_id' => auth()->id(),
                'course_id' => $request->course_id,
                'semester_id' => $request->semester_id,
                'fullname' => ucwords($request->fullname),
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'free_admission' => $request->free_admission,
                'last_board_or_university_state' => $request->last_board_or_university_state,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'annual_income' => $request->annual_income,
                'religion' => $request->religion,
                'caste_id' => $request->caste_id,

                'present_vill_or_town' => $request->present_vill_or_town,
                'present_city' => $request->present_city,
                'present_state' => $request->present_state,
                'present_district' => $request->present_district,
                'present_pin' => $request->present_pin,
                'present_nationality' => $request->present_nationality,

                'permanent_vill_or_town' => $request->permanent_vill_or_town,
                'permanent_city' => $request->permanent_city,
                'permanent_state' => $request->permanent_state,
                'permanent_district' => $request->permanent_district,
                'permanent_pin' => $request->permanent_pin,
                'permanent_nationality' => $request->permanent_nationality,

                'last_board_or_university' => ($request->other_board_university ? $request->other_board_university : $request->last_board_or_university),
                'last_exam_roll' => $request->last_exam_roll,
                'last_exam_no' => $request->last_exam_no,
                'sub_1_name' => $request->sub_1_name,
                'sub_1_total' => $request->sub_1_total,
                'sub_1_score' => $request->sub_1_score,

                'sub_2_name' => $request->sub_2_name,
                'sub_2_total' => $request->sub_2_total,
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
                'year' => date('Y'),
                'blood_group' => $request->blood_group,
                'passport' => $path . $docs['passport_name'],
                'sign' => $path . $docs['sign_name'],

            ];
            $attachment_data = [

                'marksheet' => ($docs['marksheet_name']) ? $path . $docs['marksheet_name'] : '',
                'pass_certificate' => ($docs['pass_certificate_name']) ? $path . $docs['pass_certificate_name'] : '',
                'caste_certificate' => ($docs['caste_certificate_name']) ? $path . $docs['caste_certificate_name'] : '',
                'gap_certificate' => ($docs['gap_certificate']) ? $path . $docs['gap_certificate'] : '',
                'co_curricular_certificate' => ($docs['co_curricular_certificate']) ? $path . $docs['co_curricular_certificate'] : '',
                'differently_abled_certificate' => ($docs['differently_abled_certificate']) ? $path . $docs['differently_abled_certificate'] : '',
                'income_certificate' => ($docs['income_certificate']) ? $path . $docs['income_certificate'] : '',
                'image_of_tree_plantation' => ($docs['image_of_tree_plantation']) ? $path . $docs['image_of_tree_plantation'] : '',
            ];

            /* 'pass_certificate_name' => $pass_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'gap_certificate'        => $gap_certificate_name,
            'co_curricular_certificate'        => $co_curricular_certificate_name,
            'differently_abled_certificate'        => $differently_abled_name,
            'income_certificate_certificate'        => $income_certificate_name,
            'income_certificate_certificate'        => $income_certificate_name,
            'image_of_tree_plantation_certificate'  => $image_of_tree_plantation_name,*/

            if ($request->co_curricular) {
                $application_data['co_curricular'] = 1;
            } else {
                $application_data['co_curricular'] = 0;
            }
            if ($request->differently_abled) {
                $application_data['differently_abled'] = 1;
            } else {
                $application_data['differently_abled'] = 0;
            }
            if (strtolower($request->gap) == "yes") {
                $application_data['is_gap'] = 1;
            } else {
                $application_data['is_gap'] = 0;
            }
            // dd($request->all());
            // validation here
            $application_rules = Application::$rules;
            if ($application_data["course_id"] == 3) {
                $application_rules["sub_1_total"] = str_replace("between:0,100", "between:0,2000", $application_rules["sub_1_total"]);
                $application_rules["sub_1_score"] = str_replace("between:0,100", "between:0,2000", $application_rules["sub_1_score"]);
            }
            Log::critical($application_rules);
            $validator = Validator::make($application_data, $application_rules);
            if ($validator->fails()) {
                Log::error($validator->errors());
                return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
            }
            $validator->sometimes('free_admission', 'required|in:yes,no|nullable', function ($input) {
                return $input->annual_income < 100000;
            });
            $validator->sometimes('other_board_university', 'required|nullable', function ($input) {
                return $input->last_board_or_university = "OTHER";
            });

            // dd("File Validate");
            $application = Application::create($application_data);
            $attachment_create_data = [];
            foreach ($attachment_data as $doc_name => $attachment_path) {
                if ($attachment_path != '') {
                    $attachment_create_data[] = [
                        "student_id" => auth()->id(),
                        "application_id" => $application->id,
                        "doc_name" => $doc_name,
                        "path" => $attachment_path,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s"),
                    ];
                }
            }
            if (sizeof($attachment_create_data)) {
                Attachment::insert($attachment_create_data);
            } else {
                return redirect()->back()->with('error', "Whoops! looks like you haven't uploaded the attachment. please try again later.")->withInput()->withErrors([]);

            }

            $this->createOnlyStream($request, $application);
            // $this->createStreamAndSubject($request, $application);

            // dd($application_data, $applied_stream_data, $applied_subjects_data);
        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            Session::flash('error', 'Something Went Wrong');
            return back();
        }
        DB::commit();
        // dd($request->all());
        saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Application created with id {$application->id}");
        Session::flash('success', 'Application Submitted Successfully');
        return redirect()->route('student.application.show', [$application->uuid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        $appliedSubjects = null;
        $preferences = null;
        if ($application->appliedSubjects->where('preference', '!=', 0)->count()) {
            $preferences = $application->appliedSubjects->groupBy('preference');
        } else {
            $appliedSubjects = $application->appliedSubjects;
        }
        return view('student.application.show', compact('application', 'appliedSubjects', 'preferences'));
    }

    public function confirm(Application $application)
    {
        if ($application->is_confirmed == 0) {
            $application->is_confirmed = 1;
            $application->save();
            Session::flash('success', 'Application confirmed successfully');
        } else {
            Session::flash('error', 'Application already confirmed');
        }
        saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Application confirmed with id {$application->id}");
        return redirect()->route('student.application.show', [$application->uuid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        if ($application->is_confirmed == 1) {
            Session::flash('error', 'Application has been already confirmed');
            return redirect()->back();
        }
        $castes = Caste::get();
        $courses = Course::with("streams", "semesters")->get();
        $semesters = Semester::where('course_id', $application->course_id)->get();
        $streams = Stream::where('course_id', $application->course_id)->get();
        $applied_course = $application->course->name;
        $applied_stream = $application->appliedStream->stream->name;
        $applied_subs = $application->appliedSubjects->pluck('subject_id')->toArray();

        $all_subjects = Subject::get();
        $stream_wise_subjects = [];
        $all_subjects->each(function ($subject, $key) use (&$stream_wise_subjects) {
            $stream_wise_subjects[$subject->stream_id][$subject->subject_no][] = [
                "id" => $subject->id,
                "name" => $subject->name,
                "pr" => $subject->subject_no,
                "major" => $subject->is_major,
                "cm" => $subject->is_compulsory,
            ];
        });
        return view('student.application.edit', compact('application', 'castes', 'courses', 'semesters', 'streams', 'applied_stream', 'applied_course', 'applied_subs', 'stream_wise_subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        // Log::info($request->all());
        // dd($request->all());
        $path = 'public/uploads/' . auth()->id() . '/';
        $file_validation_rule = Application::$file_rules;
        $file_validation_rule["marksheet"] = str_replace("required|", "", $file_validation_rule["marksheet"]);
        $validator = Validator::make($request->all(), $file_validation_rule);
        if ($validator->fails()) {
            return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
        }
        $docs = $this->storeDocs($request);
        DB::beginTransaction();
        try {
            $application_data = [
                // 'uuid'              => (String) Str::uuid(),
                'student_id' => auth()->id(),
                'course_id' => $request->course_id,
                'semester_id' => $request->semester_id,
                'fullname' => ucwords($request->fullname),
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'free_admission' => $request->free_admission,
                'last_board_or_university_state' => $request->last_board_or_university_state,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'annual_income' => $request->annual_income,
                'religion' => $request->religion,
                'caste_id' => $request->caste_id,

                'present_vill_or_town' => $request->present_vill_or_town,
                'present_city' => $request->present_city,
                'present_state' => $request->present_state,
                'present_district' => $request->present_district,
                'present_pin' => $request->present_pin,
                'present_nationality' => $request->present_nationality,

                'permanent_vill_or_town' => $request->permanent_vill_or_town,
                'permanent_city' => $request->permanent_city,
                'permanent_state' => $request->permanent_state,
                'permanent_district' => $request->permanent_district,
                'permanent_pin' => $request->permanent_pin,
                'permanent_nationality' => $request->permanent_nationality,

                'last_board_or_university' => ($request->other_board_university ? $request->other_board_university : $request->last_board_or_university),
                'last_exam_roll' => $request->last_exam_roll,
                'last_exam_no' => $request->last_exam_no,
                'sub_1_name' => $request->sub_1_name,
                'sub_1_total' => $request->sub_1_total,
                'sub_1_score' => $request->sub_1_score,

                'sub_2_name' => $request->sub_2_name,
                'sub_2_total' => $request->sub_2_total,
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
                'year' => date('Y'),
                'blood_group' => $request->blood_group,
                'passport' => $path . $docs['passport_name'],
                'sign' => $path . $docs['sign_name'],

            ];
            if ($application_data['passport'] != "") {
                unset($application_data["passport"]);
            }
            if ($application_data['sign'] != "") {
                unset($application_data["sign"]);
            }
            $attachment_data = [

                'marksheet' => ($docs['marksheet_name']) ? $path . $docs['marksheet_name'] : '',
                'pass_certificate' => ($docs['pass_certificate_name']) ? $path . $docs['pass_certificate_name'] : '',
                'caste_certificate' => ($docs['caste_certificate_name']) ? $path . $docs['caste_certificate_name'] : '',
                'gap_certificate' => ($docs['gap_certificate']) ? $path . $docs['gap_certificate'] : '',
                'co_curricular_certificate' => ($docs['co_curricular_certificate']) ? $path . $docs['co_curricular_certificate'] : '',
                'differently_abled_certificate' => ($docs['differently_abled_certificate']) ? $path . $docs['differently_abled_certificate'] : '',
                'income_certificate' => ($docs['income_certificate']) ? $path . $docs['income_certificate'] : '',
                'image_of_tree_plantation' => ($docs['image_of_tree_plantation']) ? $path . $docs['image_of_tree_plantation'] : '',
            ];

            if ($request->co_curricular) {
                $application_data['co_curricular'] = 1;
            } else {
                $application_data['co_curricular'] = 0;
            }
            if ($request->differently_abled) {
                $application_data['differently_abled'] = 1;
            } else {
                $application_data['differently_abled'] = 0;
            }
            if (strtolower($request->gap) == "yes") {
                $application_data['is_gap'] = 1;
            } else {
                $application_data['is_gap'] = 0;
            }

            $application_rules = Application::$rules;
            $validator = Validator::make($application_data, $application_rules);
            if ($validator->fails()) {
                // dump($request->all());
                // dd($validator->errors());
                return redirect()->back()->with('error', "Whoops! looks like you have missed something. Please verify and submit again.")->withInput()->withErrors($validator);
            }
            // dd($request->all());

            $application->update($application_data);
            $application->appliedStream()->delete();
            // $application->appliedSubjects()->delete();
            // $application->save();

            $attachment_create_data = [];
            foreach ($attachment_data as $doc_name => $attachment_path) {
                if ($attachment_path != '') {
                    $attachment_create_data[] = [
                        "student_id" => auth()->id(),
                        "application_id" => $application->id,
                        "doc_name" => $doc_name,
                        "path" => $attachment_path,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s"),
                    ];
                    $needed_to_delete_file[] = $doc_name;
                }
            }
            if (sizeof($attachment_create_data)) {
                // Delete attachment which is uploaded again on edits
                Attachment::where("student_id", auth()->id())
                    ->where("application_id", $application->id)
                    ->whereIn("doc_name", $needed_to_delete_file)
                    ->delete();
                Attachment::insert($attachment_create_data);
            }

            $this->createOnlyStream($request, $application);
            // $this->createStreamAndSubject($request, $application);

        } catch (Exception $e) {
            Log::error($e);
            // dd($e);
            DB::rollback();
            Session::flash('error', 'Something Went Wrong');
            return back();
        }
        DB::commit();
        Session::flash("success", "Application successfully updated.");
        return redirect()->route('student.application.show', [$application->uuid]);
    }

    public function createStreamAndSubject($request, $application)
    {
        $applied_stream_data = [
            'uuid' => (String) Str::uuid(),
            'student_id' => auth()->id(),
            'application_id' => $application->id,
            'stream_id' => $request->stream_id,
        ];
        $stream_rules = AppliedStream::$rules;
        AppliedStream::create($applied_stream_data);
        // AppliedStream::create($applied_stream_data);
        $validator = Validator::make($applied_stream_data, $stream_rules);
        if ($validator->fails()) {
            Redirect::back()->withInput()->withErrors($validator)->send();
        }
        $preference_subject = $request->get('preference_subject');
        // 3 preference subject validation
        if (sizeof((array) $preference_subject) != 3 && in_array($request->stream_id, [4, 6, 8])) {
            Session::flash('error', 'Preference subject must be 3 subject');
            Redirect::back()->withInput()->withErrors($validator)->send();
        }
        if (sizeof((array) $preference_subject)) {
            // for ($i=0; $i < sizeof($preference_subject) ; $i++) {
            foreach ($preference_subject as $preference_key => $subject_id) {
                // Major Siubject
                $subject = Subject::find($subject_id);
                if ($subject) {
                    $applied_subjects_data = [
                        'uuid' => (String) Str::uuid(),
                        'student_id' => auth()->id(),
                        'application_id' => $application->id,
                        'subject_id' => $subject_id,
                        'is_compulsory' => $subject->is_compulsory,
                        'is_major' => $subject->is_major,
                        'preference' => ($preference_key + 1),
                    ];
                    AppliedSubject::create($applied_subjects_data);
                }
                if (isset($request->subjects[$preference_key])) {
                    $other_subjects = $request->subjects[$preference_key];
                    foreach ($other_subjects as $subject_key => $subject_id) {
                        $subject = Subject::find($subject_id);
                        if ($subject) {
                            $applied_subjects_data = [
                                'uuid' => (String) Str::uuid(),
                                'student_id' => auth()->id(),
                                'application_id' => $application->id,
                                'subject_id' => $subject_id,
                                'is_compulsory' => $subject->is_compulsory,
                                'is_major' => $subject->is_major,
                                'preference' => ($preference_key + 1),
                            ];
                            AppliedSubject::create($applied_subjects_data);
                        }
                    }
                } else {
                    Session::flash('error', 'Preference ' . ($preference_key + 1) . ' optional subjects not entered.');
                    Redirect::back()->withInput()->withErrors([])->send();
                }
            }
            // }
        } else {
            foreach ($request->subjects as $subject_id) {
                $subject = Subject::find($subject_id);
                if ($subject) {
                    $applied_subjects_data = [
                        'uuid' => (String) Str::uuid(),
                        'student_id' => auth()->id(),
                        'application_id' => $application->id,
                        'subject_id' => $subject_id,
                        'is_compulsory' => $subject->is_compulsory,
                        'is_major' => $subject->is_major,
                        'preference' => 0,
                    ];
                    AppliedSubject::create($applied_subjects_data);
                }

            }
        }
/*        if($request->preference){
for ($i=1; $i <= 3 ; $i++) {
foreach ($request->{"preference_" . $i . "_subject_ids"} as $key => $subject_id) {
$subject = Subject::find($subject_id);
$applied_subjects_data = [
'uuid' => (String) Str::uuid(),
'student_id' => auth()->id(),
'application_id' => $application->id,
'subject_id' => $subject_id,
'is_compulsory' => $subject->is_compulsory,
'is_major' => $subject->is_major,
'preference' => $i
];
AppliedSubject::create($applied_subjects_data);
}
}
}else{
foreach($request->subjects as $subject_id){
$subject = Subject::find($subject_id);
$applied_subjects_data = [
'uuid' => (String) Str::uuid(),
'student_id' => auth()->id(),
'application_id' => $application->id,
'subject_id' => $subject_id,
'is_compulsory' => $subject->is_compulsory,
'is_major' => $subject->is_major,
'preference' => 0
];
AppliedSubject::create($applied_subjects_data);
}
}
 */}

    public function storeDocs($request)
    {
        $destinationPath = public_path('uploads/' . auth()->id());
        $passport_name = '';
        $sign_name = '';
        $marksheet_name = '';
        $pass_certificate_name = '';
        $caste_certificate_name = '';
        if (request()->hasFile('passport')) {
            $passport = request()->file('passport');
            $passport_name = date('dmYHis') . "-passport." . $passport->getClientOriginalExtension();
            $passport->move($destinationPath . "/", $passport_name);
        }
        if (request()->hasFile('sign')) {
            $sign = request()->file('sign');
            $sign_name = date('dmYHis') . "-sign." . $sign->getClientOriginalExtension();
            $sign->move($destinationPath . "/", $sign_name);
        }
        if (request()->hasFile('marksheet')) {
            $marksheet = request()->file('marksheet');
            $marksheet_name = date('dmYHis') . "-marksheet." . $marksheet->getClientOriginalExtension();
            // $marksheet->move($destinationPath, $marksheet_name);

            // update code with Image compression
            $marksheet_image = Image::make($marksheet);
            // save file as jpg with medium quality
            $marksheet_image->save($destinationPath . "/" . $marksheet_name, 60);
            $marksheet_image->destroy();
        }
        if (request()->hasFile('pass_certificate')) {
            $pass_certificate = request()->file('pass_certificate');
            $pass_certificate_name = date('dmYHis') . "-pass_certificate." . $pass_certificate->getClientOriginalExtension();
            // $pass_certificate->move($destinationPath, $pass_certificate_name);

            // update code with Image compression
            $pass_certificate_image = Image::make($pass_certificate);
            // save file as jpg with medium quality
            $pass_certificate_image->save($destinationPath . "/" . $pass_certificate_name, 60);
            $pass_certificate_image->destroy();
        }
        if (request()->hasFile('caste_certificate')) {
            $caste_certificate = request()->file('caste_certificate');
            $caste_certificate_name = date('dmYHis') . "-caste_certificate." . $caste_certificate->getClientOriginalExtension();
            // $caste_certificate->move($destinationPath, $caste_certificate_name);

            // update code with Image compression
            $caste_certificate_image = Image::make($caste_certificate);
            // save file as jpg with medium quality
            $caste_certificate_image->save($destinationPath . "/" . $caste_certificate_name, 60);
            $caste_certificate_image->destroy();
        }
        $gap_certificate_name = "";
        if (request()->hasFile('gap_certificate')) {
            $gap_certificate = request()->file('gap_certificate');
            $gap_certificate_name = date('dmYHis') . "-gap_certificate." . $gap_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $gap_certificate_name);

            // update code with Image compression
            $gap_certificate_image = Image::make($gap_certificate);
            // save file as jpg with medium quality
            $gap_certificate_image->save($destinationPath . "/" . $gap_certificate_name, 60);
            $gap_certificate_image->destroy();
        }
        $co_curricular_certificate_name = "";
        if (request()->hasFile('co_curricular_certificate')) {
            $co_curricular_certificate = request()->file('co_curricular_certificate');
            $co_curricular_certificate_name = date('dmYHis') . "-co_curricular_certificate." . $co_curricular_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $co_curricular_certificate_name);

            // update code with Image compression
            $co_curricular_certificate_image = Image::make($co_curricular_certificate);
            // save file as jpg with medium quality
            $co_curricular_certificate_image->save($destinationPath . "/" . $co_curricular_certificate_name, 60);
            $co_curricular_certificate_image->destroy();
        }
        $differently_abled_name = "";
        if (request()->hasFile('differently_abled')) {
            $differently_abled = request()->file('differently_abled');
            $differently_abled_name = date('dmYHis') . "-differently_abled." . $differently_abled->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $differently_abled_name);

            // update code with Image compression
            $differently_abled_image = Image::make($differently_abled);
            // save file as jpg with medium quality
            $differently_abled_image->save($destinationPath . "/" . $differently_abled_name, 60);
            $differently_abled_image->destroy();
        }
        $income_certificate_name = "";
        if (request()->hasFile('income_certificate')) {
            $income_certificate = request()->file('income_certificate');
            $income_certificate_name = date('dmYHis') . "-income_certificate." . $income_certificate->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $income_certificate_name);

            // update code with Image compression
            $income_certificate_image = Image::make($income_certificate);
            // save file as jpg with medium quality
            $income_certificate_image->save($destinationPath . "/" . $income_certificate_name, 60);
            $income_certificate_image->destroy();
        }
        $image_of_tree_plantation_name = "";
        if (request()->hasFile('image_of_tree_plantation')) {
            $image_of_tree_plantation = request()->file('image_of_tree_plantation');
            $image_of_tree_plantation_name = date('dmYHis') . "-image_of_tree_plantation." . $image_of_tree_plantation->getClientOriginalExtension();
            // $gap_certificate->move($destinationPath, $image_of_tree_plantation_name);

            // update code with Image compression
            $image_of_tree_plantation_image = Image::make($image_of_tree_plantation);
            // save file as jpg with medium quality
            $image_of_tree_plantation_image->save($destinationPath . "/" . $image_of_tree_plantation_name, 60);
            $image_of_tree_plantation_image->destroy();
        }
        return [
            'passport_name' => $passport_name,
            'sign_name' => $sign_name,
            'marksheet_name' => $marksheet_name,
            'pass_certificate_name' => $pass_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'caste_certificate_name' => $caste_certificate_name,
            'gap_certificate' => $gap_certificate_name,
            'co_curricular_certificate' => $co_curricular_certificate_name,
            'differently_abled_certificate' => $differently_abled_name,
            'income_certificate' => $income_certificate_name,
            'image_of_tree_plantation' => $image_of_tree_plantation_name,
        ];
    }

    public function makePayment(Request $request)
    {
        $application = Application::where('uuid', $request->application_uuid)->first();
        $application_id = $application->id;
        $amount = config('constants.application_fee');
        $redirect_url = config('constants.redirect_url_application');
        $merchant_id = config('constants.merchant_id');
        $checksum_key = config('constants.checksum_key');

        // $str = 'TESTME|UATTXN0001|NA|2|NA|NA|NA|INR|NA|R|NA|NA|NA|F|Andheri|Mumbai|02240920005|support@billdesk.com|NA|NA|NA|https://www.billdesk.com';

        $str = $merchant_id . '|' . $application_id . '|NA|' . $amount . '|NA|NA|NA|INR|NA|R|NA|NA|NA|F|' . $application->student_id . '|' . $application->student->email . '|' . $application->student->mobile_no . '|support@billdesk.com|NA|NA|NA|' . $redirect_url;
        // dd($str);
        $checksum = hash_hmac('sha256', $str, $checksum_key, false);
        $checksum = strtoupper($checksum);
        $checksum = $str . "|" . $checksum;
        // echo $checksum;
        return view('student.application.payment.make-payment', compact('application_id', 'application', 'amount', 'checksum'));
    }

    public function paymentResponse(Request $request)
    {

        $msg = $request->msg;
        Log::debug('application payment response ->'.$msg);
        $checksum_key = config('constants.checksum_key');

        $checksum_value = substr(strrchr($msg, "|"), 1); //Last check sum value
        // Log::info($checksum_value);
        $str = str_replace("|" . $checksum_value, "", $msg); //string replace : with empy space
        // Log::info($str);
        $checksum = hash_hmac('sha256', $str, $checksum_key, false);
        // Log::info($checksum);
        DB::beginTransaction();
        try {
            if ($checksum_value == strtoupper($checksum)) {
                if ($msg != '') {

                    $res_data = explode('|', $str);
                    $application_id = $res_data[1];
                    $transaction_id = $res_data[2];
                    $amount = $res_data[4];
                    $transaction_date = $res_data[13];
                    $code = $res_data[14];
                    $student_id = $res_data[16];
                    $application = Application::where('id', $application_id)->first();
                    if ($application->payment_status == 1) {
                        Session::flash('error', 'Payment has been already done');
                        return redirect()->route('student.application.show', $application->uuid);
                    }
                    $online_payment_data = [
                        'student_id' => $student_id,
                        'application_id' => $application_id,
                        'transaction_id' => $transaction_id,
                        'transaction_date' => $transaction_date,
                        'biller_response' => $str,
                        'amount' => $amount,
                        'code' => $code,
                    ];
                    if ($code == '0300') {
                        $online_payment_data['status'] = 1;
                        $application->payment_status = 1;
                        $application->save();
                        $message = "Payment Successfull for application ID- {$application->id}. Now you can download the application.";

                        $mobile = $application->mobile_no;

                        sendSMS($mobile, $message);
                        Session::flash('success', 'Payment successfully done');
                    } else {
                        $online_payment_data['status'] = 0;
                        Session::flash('error', 'Payment Unsuccessfull');
                    }
                    OnlinePayment::create($online_payment_data);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
            Session::flash('error', 'Something went wrong');
            return redirect()->route('student.application.index');
        }
        DB::commit();
        if ($code == '0300') {
            Session::flash('success', 'Payment successfully done. Now You can download your application');
            return redirect()->route('student.application.show', $application->uuid);
        } else {
            Session::flash('error', 'Payment unsuccessfull. Try again later');
            return redirect()->route('student.application.show', $application->uuid);
        }
    }

    public function paymentReceipt(Request $request, Application $application)
    {
        return view('student.application.payment.payment-receipt', compact('application'));
    }

    public function downloadApplication(Request $request, Application $application)
    {
        if ($application->payment_status = 1 && $application->is_confirmed = 1) {
            $common_application = new CommonApplicationController();
            $pdf = $common_application->downloadApplication($request, $application);
            return $pdf->download("Darrang-college-{$application->id}.pdf");
        } else {
            return back();
        }
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
    public function createOnlyStream($request, $application)
    {
        $applied_stream_data = [
            'uuid' => (String) Str::uuid(),
            'student_id' => auth()->id(),
            'application_id' => $application->id,
            'stream_id' => $request->stream_id,
        ];
        $stream_rules = AppliedStream::$rules;
        AppliedStream::create($applied_stream_data);
        // AppliedStream::create($applied_stream_data);
        $validator = Validator::make($applied_stream_data, $stream_rules);
        if ($validator->fails()) {
            Redirect::back()->withInput()->withErrors($validator)->send();
        }
    }
}
