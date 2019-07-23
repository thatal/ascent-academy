<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Subject;
use App\Traits\SubjectAllocationTrait;
use DB, Session, Log, Exception, Validator;

class SubjectAllocationController extends Controller
{
    use SubjectAllocationTrait;
    
}
