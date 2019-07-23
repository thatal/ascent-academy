<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\SubjectAllocationTrait;
use App\Models\Application;
use DB, Session, Log, Exception;

class SubjectAllocationController extends Controller {
    use SubjectAllocationTrait;
}
