<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use App\Models\AdmissionReceipt;
use App\Models\Course;
use App\Models\Semester;

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
        $fee_type = $request->get("fee_type");
    	$online_payments = OnlinePayment::with('application.course','application.semester');
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
        if($fee_type=='1'){
    		$online_payments = $online_payments->whereNull('temp_receipt_id');
        }
        if($fee_type=='2'){
    		$online_payments = $online_payments->whereNotNull('temp_receipt_id');
    	}
        if($status=='1'){
            $online_payments = $online_payments->where('status',1);
        }
        if($status=='0'){
            $online_payments = $online_payments->where('status',0);
        }
        $clone_online_payments = clone $online_payments;
        $online_payments = $online_payments->paginate();
        $clone_online_payments = $clone_online_payments->get();
        $total_amount = 0;
        foreach ($clone_online_payments as $key => $clone_online_payment) {
            $total_amount += $clone_online_payment->amount;
        }
    	return view('admin.report.application-fee-collection',compact('online_payments','total_amount'));
    }

    public function receipt(Request $request)
    {
        $from = $request->get("from");
    	$to = $request->get("to");
    	$mobile_no = $request->get("mobile_no");
    	$application_id = $request->get("application_id");
    	$student_id = $request->get("student_id");
    	$course_id = $request->get("course_id");
    	$semester_id = $request->get("semester_id");
        $receipts = AdmissionReceipt::with('application.course','application.semester','collections');
        if($from){
    		$receipts = $receipts->whereDate('created_at','>=',$from);
    	}
    	if($to){
    		$receipts = $receipts->whereDate('created_at','<=',$to);
    	}
    	if($mobile_no){
    		$receipts = $receipts->whereHas('application',function($query) use ($mobile_no){
    			$query->where('mobile_no',$mobile_no);
    		});
        }
        if($course_id){
    		$receipts = $receipts->whereHas('application',function($query) use ($course_id){
    			$query->where('course_id',$course_id);
    		});
    	}
        if($semester_id){
    		$receipts = $receipts->whereHas('application',function($query) use ($semester_id){
    			$query->where('semester_id',$semester_id);
    		});
    	}
    	if($application_id){
    		$receipts = $receipts->where('application_id',$application_id);
    	}
    	if($student_id){
    		$receipts = $receipts->where('student_id',$student_id);
        }
        $clone_receipts = clone $receipts;
        $receipts = $receipts->paginate();
        $clone_receipts = $clone_receipts->get();
        $total_amount = 0;
        foreach ($clone_receipts as $key => $clone_receipt) {
            $total_amount += $clone_receipt->total;
        }
        $courses = Course::get();
        $semesters = Semester::get();
        return view('admin.report.receipt',compact('receipts','total_amount','courses','semesters'));
    }
}
