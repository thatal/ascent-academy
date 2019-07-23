<?php

namespace App\Http\Controllers\Admin;

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
use App\Models\Fee;
use App\Models\FeeHead;
use App\Models\AdmissionCollection;
use App\Models\AdmissionReceipt;
use App\Models\AdmittedStudent;
use App\Traits\AdmissionTrait;
use DB, Session, Log, Exception, Str, Excel, PDF;

class AdmissionController extends Controller
{
    use AdmissionTrait;

    
    

    
}
