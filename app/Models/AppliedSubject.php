<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppliedSubject extends Model
{
	use SoftDeletes;
	
    protected $guarded = [
        'id'
    ];

    protected $with = ['subject'];
    
    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
}
