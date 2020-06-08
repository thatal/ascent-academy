<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use PDF;

class ApplicationController extends Controller
{
    public function downloadApplication($request, $application)
    {
    	$appliedSubjects = null;
        $preferences = null;
        if($application->appliedSubjects->where('preference','!=',0)->count()){
            $preferences = $application->appliedSubjects->groupBy('preference');
        }else{
            $appliedSubjects = $application->appliedSubjects;
        }
        // return view('common.application.pdf' ,compact('application','appliedSubjects','preferences'));
    	$pdf = PDF::loadView('common.application.pdf' ,compact('application','appliedSubjects','preferences'));
        return $pdf;
    }
}
