<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];
    protected $with = ['appliedSubjects','appliedMajorSubjects','appliedStream.stream','student','course','semester','caste','attachments','receipts','admittedStudent','paymentReceipt'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getDobAttribute($date)
    {
        return date('d-m-Y',strtotime($date));
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function semester()
    {
        return $this->belongsTo('App\Models\Semester', 'semester_id');
    }
    public function caste()
    {
        return $this->belongsTo('App\Models\Caste', 'caste_id');
    }
    public function appliedSubjects()
    {
        return $this->hasMany('App\Models\AppliedSubject', 'application_id', 'id');
    }
    public function appliedMajorSubjects()
    {
        return $this->hasOne('App\Models\AppliedSubject', 'application_id', 'id')->where('is_major',1);
    }
    public function appliedStream()
    {
        return $this->hasOne('App\Models\AppliedStream', 'application_id', 'id');
    }
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment', 'application_id', 'id');
    }
    public function receipts()
    {
        return $this->hasMany('App\Models\AdmissionReceipt', 'application_id', 'id');
    }
    public function collections()
    {
        return $this->hasMany('App\Models\AdmissionCollection', 'application_id', 'id');
    }
    public function admittedStudent()
    {
        return $this->hasOne('App\Models\AdmittedStudent', 'application_id', 'id');
    }
    public function paymentReceipt()
    {
        return $this->hasOne('App\Models\OnlinePayment', 'application_id', 'id')->where('status',1);
    }
    public function tempUid()
    {
        return $this->hasOne('App\Models\TempUid', 'application_id', 'id');
    }


    public static $rules = [
        'course_id'         => 'required|exists:courses,id',
        'semester_id'       => 'required|exists:semesters,id',
        'fullname'          => 'required|max:100|min:5',
        'email'             => 'required|max:100|min:5',
        'mobile_no'         => 'required|digits:10',
        'other_board_university' => 'max:255',
        'free_admission'    => 'nullable|in:yes,no',
        'last_board_or_university_state'    => 'required|max:255|min:1',

        'gender'            => "required|in:Male,Female,Transgender",
        'dob'               => "required|date_format:Y-m-d",
        'fathers_name'      => 'required|max:100|min:5',
        'mothers_name'      => 'required|max:100|min:5',
        'annual_income'     => 'required|numeric',
        'religion'          => 'required|max:100',
        'caste_id'          => 'required|exists:castes,id',

        'present_vill_or_town'  => 'required|max:255|min:1',
        'present_city'          => 'required|max:255|min:1',
        'present_state'         => 'required|max:255|min:1',
        'present_district'      => 'required|max:255|min:1',
        'present_pin'           => 'required|digits:6|numeric',
        'present_nationality'   => 'required|max:255|min:1',

        'permanent_vill_or_town'    => 'required|max:255|min:1',
        'permanent_city'            => 'required|max:255|min:1',
        'permanent_state'           => 'required|max:255|min:1',
        'permanent_district'        => 'required|max:255|min:1',
        'permanent_pin'             => 'required|digits:6|numeric',
        // 'permanent_nationality'     => 'required|max:255|min:1',

        'last_board_or_university'  => 'required|max:100|min:1',
        'last_exam_roll'            => 'required|max:100|min:1',
        'last_exam_no'          => 'required|max:100|min:1',
        'sub_1_name'            => 'required|max:100|min:1',
        'sub_1_total'           => 'required|between:0,100|numeric',
        'sub_1_score'           => 'required|between:0,100|numeric',

        'sub_2_name'            => 'required|max:100|min:1',
        'sub_2_total'           => 'required|between:0,100|numeric',
        'sub_2_score'           => 'required|between:0,100|numeric',

        'sub_3_name'            => 'required|max:100|min:1',
        'sub_3_total'           => 'required|between:0,100|numeric',
        'sub_3_score'           => 'required|between:0,100|numeric',

        'sub_4_name'            => 'required|max:100|min:1',
        'sub_4_total'           => 'required|between:0,100|numeric',
        'sub_4_score'           => 'required|between:0,100|numeric',


        'sub_5_name'            => 'required|max:100|min:1',
        'sub_5_total'           => 'required|between:0,100|numeric',
        'sub_5_score'           => 'required|between:0,100|numeric',


        'sub_6_name'            => 'required|max:100|min:1',
        'sub_6_total'           => 'required|between:0,100|numeric',
        'sub_6_score'           => 'required|between:0,100|numeric',

        'all_total_marks'       => 'required|numeric',

        'percentage'            => 'required|numeric',
        'blood_group'           => 'required',
        'total_marks_according_marksheet'           => 'required|numeric',
    ];
     public static $file_rules = [
        // files
        // 'passport'              => "image|required|mimes:jpeg,jpg,png|max:100|dimensions:max_width=200,max_height=250",
        // 'sign'                  => "image|required|mimes:jpeg,jpg,png|max:100|dimensions:max_width=200,max_height=150",
        'marksheet'             => "image|required|mimes:jpeg,jpg,png|max:1024",
        'pass_certificate'      => "image|mimes:jpeg,jpg,png|max:1024",
        'caste_certificate'     => "image|mimes:jpeg,jpg,png|max:1024",
        'gap_certificate'       => "image|mimes:jpeg,jpg,png|max:1024",
        'income_certificate'    => "image|mimes:jpeg,jpg,png|max:1024",
        'co_curricular_certificate'=> "image|mimes:jpeg,jpg,png|max:1024",
        'differently_abled_certificate'=> "image|mimes:jpeg,jpg,png|max:1024",
        'image_of_tree_plantation'=> "image|mimes:jpeg,jpg,png|max:1024",
    ];
}
