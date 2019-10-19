<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fee extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];
    protected $with = ['course','semester','stream'];
    public static $rules = [
        "course_id"     => "required|exists:courses,id",
        "semester_id"   => "required|exists:semesters,id",
        "stream_id"     => "required|exists:streams,id",
        'gender'        => "required|in:Male,Female,Transgender",
        "fee_heads.*"   => "required|exists:fee_heads,id",
        "amount.*"      => "required|numeric|min:0",
        'practical'     => "required|in:1,0",
        'type'          => "required|in:admission,examination",
        'is_free.*'     => "required|in:1,0",
    ];
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function semester()
    {
        return $this->belongsTo('App\Models\Semester', 'semester_id');
    }
    public function stream()
    {
        return $this->belongsTo('App\Models\Stream', 'stream_id');
    }
    public function feeStructures()
    {
        return $this->hasMany('App\Models\FeeStructure', 'fee_id', 'id');
    }
}
