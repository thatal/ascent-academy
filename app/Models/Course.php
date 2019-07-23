<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
	use SoftDeletes;
	
    protected $guarded = [
        'id'
    ];

    public function streams(){
        return $this->hasMany("App\Models\Stream", "course_id", "id");
    }

    public function semesters(){
        return $this->hasMany("App\Models\Semester", "course_id", "id");
    }
}
