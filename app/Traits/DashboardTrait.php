<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Caste;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\AppliedSubject;
use App\Models\AppliedStream;
use App\Models\ApprovedList;
use App\Models\RejectedList;
use App\Models\Student;
use App\Models\Reservation;
use App\Exports\ApplicationExport;
use App\Http\Controllers\Common\ApplicationController as CommonApplicationController;
use DB, Session, Log, Exception, Str, Excel, PDF;

trait DashboardTrait
{
    public function index()
    {
    	$total_student = Student::where('is_otp_verified',1)->count();
    	$total_application = Application::where('payment_status',1)->count();
    	$total_verified_application = Application::where('status',1)->count();
    	$total_rejected_application = Application::where('status',2)->count();
        if(auth()->guard('admin')->check()){
            $view = 'admin.dashboard.index'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.dashboard.index'; 
        }
        return view($view,compact('total_student','total_application','total_verified_application','total_rejected_application'));
    }
}