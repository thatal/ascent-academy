<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use  App\Notifications\StudentResetPassword;

class Student extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function approvedList()
    // {
    //     return $this->hasMany('App\Models\ApprovedList', 'student_id', 'id');
    // }
    public function application()
    {
        return $this->hasMany('App\Models\Application', 'student_id', 'id');
    }
    public function admittedStudent()
    {
        return $this->hasOne('App\Models\AdmittedStudent', 'application_id', 'id');
    }
    public function sendPasswordResetNotification($token) {
        $this->notify(new StudentResetPassword($token));
    }
}
