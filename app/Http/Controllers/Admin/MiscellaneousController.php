<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use App\Models\Application;
use App\Models\TempAdmissionReceipt;
use App\Models\TempAdmissionCollection;
use App\Models\AdmissionReceipt;
use App\Models\AdmissionCollection;
use App\Models\AdmittedStudent;
use DB, Log, Session, Exception;

class MiscellaneousController extends Controller
{
    public function ApplicationFeeCreate(Request $request)
    {
        return view('admin.miscellaneous.online-application-fee.create');
    }

    public function ApplicationFeeStore(Request $request)
    {
        DB::beginTransaction();
        try{
            $application = Application::find($request->application_id);
            if($application->payment_status==1){
                Session::flash('error','Payment Already Updated');
                return back();
            }
            $online_payment_data = [
                'student_id' => $request->student_id,
                'application_id' => $request->application_id,
                'transaction_id' => $request->transaction_id,
                'transaction_date' => $request->transaction_date,
                'biller_response' => $request->biller_response,
                'amount' => $request->amount,
                'code' => $request->code,
                'status' => 1
            ];
            OnlinePayment::create($online_payment_data);
            $application->payment_status = 1;
            $application->save();
        }catch(Exception $e){
            DB::rollback();
            dd($e);
        }
        saveLogs(auth('admin')->id(), auth('admin')->user()->username, 'Admin', "Application payment manually done for {$application->id}");
        DB::commit();
        Session::flash('success','Payment Updated Successfully');
        return back();
    }

    public function AdmissionFeeCreate(Request $request)
    {
        return view('admin.miscellaneous.online-admission-fee.create');
    }

    public function AdmissionFeeStore(Request $request)
    {
        try{
            $temp_receipt = TempAdmissionReceipt::find($request->temp_receipt_id);
            $amount = $temp_receipt->total;
            $application = Application::where('id', $request->application_id)->first();
            if ($application->payment_status == 3) {
                Session::flash('error', 'Payment has been already done');
                return redirect()->route('student.application.show', $application->uuid);
            }
            $online_payment_data = [
                'student_id' => $request->student_id,
                'application_id' => $request->application_id,
                'temp_receipt_id' => $request->temp_receipt_id,
                'transaction_id' => $request->transaction_id,
                'transaction_date' => $request->transaction_date,
                'biller_response' => $request->biller_response,
                'amount' => $amount,
                'code' => $request->code,
                'status' => 1
            ];

            $application->payment_status = 3;
            $application->status = 4;
            $application->admission_done_by = 'Student';
            $application->admission_done_by_id = $request->student_id;
            $application->selected_category_id = $application->category_id;
            $application->save();

            $receipt = $this->moveFromTempToOriginal($request, $request->temp_receipt_id);
            $admitted_student_data = [
                'application_id' => $request->application_id,
                'course_id' => $application->course_id,
                'stream_id' => $application->appliedStream->stream_id,
                'semester_id' => $application->semester_id,
                'student_id' => $request->student_id,
                'uid' => $application->tempUid->uid,
                'year' => date('Y'),
                'admission_done_by' => 'Student',
                'admission_done_by_id' => $request->student_id,
            ];
            AdmittedStudent::create($admitted_student_data);

            OnlinePayment::create($online_payment_data);
            saveLogs(auth()->id(), auth()->user()->username, 'Admin', "Payment response for application id {$application->id} manually updated");
        }catch(Exception $e){
            dd($e);
        }
        $receipt_count = AdmissionReceipt::where('year',date('Y'))->count();
        $receipt_no  = str_pad($receipt_count, 4,"0000", STR_PAD_LEFT);
        $receipt_no = date('y').'-'.$receipt_no;
        $receipt->receipt_no = $receipt_no;
        $receipt->save();
        saveLogs(auth()->id(), auth()->user()->username, 'Admin', "Receipt generated with receipt id  {$receipt->id} and receipt no {$receipt_no}");
        $message = "Payment Successfull for application ID- {$application->id}. Now you can download the receipt.";
        $mobile = $application->mobile_no;
        sendSMS($mobile, $message);
        Session::flash('success', 'Payment successfully done.');
        return back();

    }
    private function moveFromTempToOriginal($request, $temp_receipt_id)
    {
        $temp_receipt = TempAdmissionReceipt::find($temp_receipt_id);
        $receipt_data = $temp_receipt->only(['uid', 'student_id', 'application_id','total','year','is_online']);
        $receipt_data['pay_method'] = 'Online';
        $receipt = AdmissionReceipt::create($receipt_data);
        $temp_collections = TempAdmissionCollection::where('temp_receipt_id',$temp_receipt_id)
                            ->select(['student_id','application_id', 'fee_head_id', 'fee_id','amount','free_amount','is_free'])
                            ->get();
        $collection_datas = $temp_collections->toArray();
        foreach ($collection_datas as $key => $collection_data) {
            $collection_datas[$key]['receipt_id']= $receipt->id;
            $collection_datas[$key]['created_at']= date('Y-m-d H:i:s');
            $collection_datas[$key]['updated_at']= date('Y-m-d H:i:s');
        }
        $collections = AdmissionCollection::insert($collection_datas);
        return $receipt;
    }
}
