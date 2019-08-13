<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmittedStudent extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];
    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id','id');
    }
    public function semester()
    {
        return $this->belongsTo('App\Models\Semester', 'semester_id');
    }
}
