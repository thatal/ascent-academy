<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlinePayment extends Model
{
    use SoftDeletes;
    protected $guarded = [
        'id'
    ];
    // protected $with = ['application','student'];

    public function application()
    {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }
}
