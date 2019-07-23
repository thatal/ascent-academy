<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
	use SoftDeletes;
	
    protected $guarded = [
        'id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
    public function stream()
    {
        return $this->belongsTo('App\Models\Stream', 'stream_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function major()
    {
        return $this->belongsTo('App\Models\Subjects', 'major_id');
    }
}
