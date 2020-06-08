<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppliedStream extends Model
{
	use SoftDeletes;

    protected $guarded = [
        'id'
    ];
    public function stream()
    {
        return $this->belongsTo('App\Models\Stream', 'stream_id')->withTrashed();
    }

    public static $rules = [
        'uuid'          => "required",
        'student_id'    => "required|exists:students,id",
        'application_id' => "required|exists:applications,id",
        'stream_id'     => "required|exists:streams,id",
    ];
}
