<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;

class ReportController extends Controller
{
    public function applicationFeeCollection(Request $request)
    {
    	$from = $request->get("from");
    	$to = $request->get("to");
    	$mobile_no = $request->get("mobile_no");
    	$application_id = $request->get("application_id");
    	$student_id = $request->get("student_id");
        $status = $request->get("status");
    	$online_payments = OnlinePayment::with('application');
    	if($from){
    		$online_payments = $online_payments->whereDate('created_at','>=',$from);
    	}
    	if($to){
    		$online_payments = $online_payments->whereDate('created_at','<=',$to);
    	}
    	if($mobile_no){
    		$online_payments = $online_payments->whereHas('application',function($query) use ($mobile_no){
    			$query->where('mobile_no',$mobile_no);
    		});
    	}
    	if($application_id){
    		$online_payments = $online_payments->where('application_id',$application_id);
    	}
    	if($student_id){
    		$online_payments = $online_payments->where('student_id',$student_id);
    	}
        if($status=='1'){
            $online_payments = $online_payments->where('status',1);
        }
        if($status=='0'){
            $online_payments = $online_payments->where('status',0);
        }
    	$online_payments = $online_payments->paginate(200);
    	return view('admin.report.application-fee-collection',compact('online_payments'));
    }
}
