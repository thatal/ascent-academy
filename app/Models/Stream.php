<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stream extends Model
{
	use SoftDeletes;
    protected $guarded = [
        'id'
    ];

    public function subjects() {
        return $this->hasMany("App\Models\Subject", "stream_id", "id");
    }
}
