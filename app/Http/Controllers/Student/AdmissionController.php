<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Fee;
use App\Models\OnlinePayment;
use App\Models\TempAdmissionCollection;
use App\Models\TempAdmissionReceipt;
use App\Models\AdmissionCollection;
use App\Models\AdmissionReceipt;
use App\Models\AdmittedStudent;
use DB;
use Exception;
use Illuminate\Http\Request;
use Log;
use Session;

class AdmissionController extends Controller
{

    public function feeDetail(Request $request)
    {
        $application = Application::where('uuid', $request->application_uuid)->first();
        $temp_receipts = TempAdmissionReceipt::where('application_id',$application->id)
                            ->wheredoesntHave('onlinePayment',function($q){
                                    $q->where('status',1);
                                })
                            ->get();
        $receipts = $application->receipts;
        $fee = Fee::where('course_id', $application->course_id)
            ->where('semester_id', $application->semester_id)
            ->where('stream_id', $application->appliedStream->stream_id)
            ->where('gender', $application->gender)
            ->where('practical', $application->with_practical)
            ->where('year', $application->year)
            ->first();
        $fee_structures = collect();
        if ($fee) {
            $fee_structures = $fee->feeStructures;
        }
        $data = getFeeStructure($application, $fee_structures);
        $fee_structures = $data['fee_structures'];
        $self_ids = $data['self_ids'];

        $datas = [];
        $total = 0;
        DB::beginTransaction();
        try {
            foreach ($fee_structures as $fee_structure) {
                if ($application->free_admission == 'yes') {
                    if (in_array($fee_structure->fee_head_id, $self_ids)) {
                        $data['free_amount'] = 0;
                        $data['amount'] = $fee_structure->amount;
                    } else {
                        $data['free_amount'] = $fee_structure->amount;
                        $data['amount'] = 0;
                    }
                } else {
                    $data['free_amount'] = 0;
                    $data['amount'] = $fee_structure->amount;
                }
                $total += $data['amount'];
            }

            $admission_receipt_data = [
                'uid' => $application->tempUid->uid,
                'student_id' => $application->student_id,
                'application_id' => $application->id,
                'total' => $total,
                'year' => date('Y'),
                'is_online' => 1
            ];
            if(!$temp_receipts->count()){
                $temp_receipt = TempAdmissionReceipt::create($admission_receipt_data);
                foreach ($fee_structures as $fee_structure) {
                    $data = [
                        'temp_receipt_id' => $temp_receipt->id,
                        'student_id' => $application->student_id,
                        'application_id' => $application->id,
                        'fee_id' => $fee_structure->fee_id,
                        'fee_head_id' => $fee_structure->fee_head_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                    if ($application->free_admission == 'yes') {
                        if (in_array($fee_structure->fee_head_id, $self_ids)) {
                            $data['free_amount'] = 0;
                            $data['amount'] = $fee_structure->amount;
                            $data['is_free'] = 0;
                        } else {
                            $data['free_amount'] = $fee_structure->amount;
                            $data['amount'] = 0;
                            $data['is_free'] = 1;
                        }
                    } else {
                        $data['free_amount'] = 0;
                        $data['amount'] = $fee_structure->amount;
                        $data['is_free'] = 0;
                    }
                    $total += $data['amount'];
                    array_push($datas, $data);
                }
                TempAdmissionCollection::insert($datas);
                saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Temp fee structure created for application id {$application->id} with temp receipt id {$temp_receipt->id}");
                $temp_receipts = TempAdmissionReceipt::where('application_id',$application->id)
                                ->wheredoesntHave('onlinePayment',function($q){
                                        $q->where('status',1);
                                    })
                                ->get();
            }
            // dd('2nd',$temp_receipts);
        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            return back();
        }
        DB::commit();
        return view('student.admission.payment.fee-detail', compact('application', 'fee', 'fee_structures', 'self_ids','temp_receipts','receipts'));
    }



    public function paymentResponse(Request $request)
    {
        $msg = $request->msg;
        Log::info($msg);
        $checksum_key = config('constants.checksum_key');

        $checksum_value = substr(strrchr($msg, "|"), 1); //Last check sum value
        // Log::info($checksum_value);
        $str = str_replace("|" . $checksum_value, "", $msg); //string replace : with empy space
        // Log::info($str);
        $checksum = hash_hmac('sha256', $str, $checksum_key, false);
        Log::info($checksum);
        DB::beginTransaction();
        try {
            if ($checksum_value == strtoupper($checksum)) {
                if ($msg != '') {

                    $res_data = explode('|', $str);
                    $application_id = $res_data[1];
                    $transaction_id = $res_data[2];
                    $amount = $res_data[4];
                    $transaction_date = $res_data[13];
                    $code = $res_data[14];
                    $student_id = $res_data[16];
                    $temp_receipt_id = $res_data[19];
                    $res_data = explode('|', $str);
                    $application = Application::where('id', $application_id)->first();
                    if ($application->payment_status == 3) {
                        Session::flash('error', 'Payment has been already done');
                        return redirect()->route('student.application.show', $application->uuid);
                    }
                    $online_payment_data = [
                        'student_id' => $student_id,
                        'application_id' => $application_id,
                        'temp_receipt_id' => $temp_receipt_id,
                        'transaction_id' => $transaction_id,
                        'transaction_date' => $transaction_date,
                        'biller_response' => $str,
                        'amount' => $amount,
                        'code' => $code,
                    ];
                    if ($code == '0300') {
                        $online_payment_data['status'] = 1;
                        $application->payment_status = 3;
                        $application->status = 4;
                        $application->admission_done_by = 'Student';
                        $application->admission_done_by_id = auth()->id();
                        $application->selected_category_id = $application->category_id;
                        $application->save();

                        $receipt = $this->moveFromTempToOriginal($request, $temp_receipt_id);
                        $admitted_student_data = [
                            'application_id' => $application_id,
                            'course_id' => $application->course_id,
                            'stream_id' => $application->appliedStream->stream_id,
                            'semester_id' => $application->semester_id,
                            'student_id' => $student_id,
                            'uid' => $application->tempUid->uid,
                            'year' => date('Y'),
                            'admission_done_by' => 'Student',
                            'admission_done_by_id' => auth()->id(),
                        ];
                        AdmittedStudent::create($admitted_student_data);
                        $message = "Payment Successfull for application ID- {$application->id}. Now you can download the receipt.";
                        $mobile = $application->mobile_no;

                        sendSMS($mobile, $message);
                    } else {
                        $online_payment_data['status'] = 0;
                    }
                    OnlinePayment::create($online_payment_data);
                    saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Payment response for application id {$application->id} with code {$code}");
                }
            }
        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            Session::flash('error', 'Something went wrong');
            return redirect()->route('student.application.index');
        }
        DB::commit();
        if ($code == '0300') {
            $receipt_count = AdmissionReceipt::withTrashed()->where('year',date('Y'))->count();
            $receipt_no  = str_pad($receipt_count, 4,"0000", STR_PAD_LEFT);
            $receipt_no = date('y').'-'.$receipt_no;
            $receipt->receipt_no = $receipt_no;
            $receipt->save();
            saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Receipt generated with receipt id  {$receipt->id} and receipt no {$receipt_no}");
            Session::flash('success', 'Payment successfully done. Now You can download your application');
            return redirect()->route('student.admission.payment-receipt', $application->uuid);
        } else {
            Session::flash('error', 'Payment unsuccessfull. Try again later');
            return redirect()->route('student.application.index', $application->uuid);
        }
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

    public function paymentReceipt(Request $request, Application $application)
    {
        $receipts = $application->paymentReciept;
        // $temp_receipts = $application->tempReceipts()->where(function($query){
        //     $query->doesntHave('onlinePayment',function($query){
        //         $query->where('status',1);
        //     });
        // })->get();
        return view('student.admission.payment.payment-receipt', compact('application','receipts'));
    }

    public function paymentReceiptExaminationFee(Request $request, Application $application)
    {
        $with_practical = false;
        $stream_id      = $application->appliedStream->stream_id;
        $with_practical = $application->exam_practical;

        $fees = $application->feeStructure($with_practical, $stream_id);
        $receipts = $application->examinationFeeReceipt;
        return view('student.admission.payment.examination-fee-payment-receipt', compact('application','receipts', "fees"));
    }

    public function paymentResponseExamination(Request $request)
    {
        $msg = $request->msg;
        // dump($msg);
        Log::info($msg);
        $checksum_key = config('constants.checksum_key');

        $checksum_value = substr(strrchr($msg, "|"), 1); //Last check sum value
        // Log::info($checksum_value);
        $str = str_replace("|" . $checksum_value, "", $msg); //string replace : with empy space
        // Log::info($str);
        $checksum = hash_hmac('sha256', $str, $checksum_key, false);
        Log::info($checksum);
        DB::beginTransaction();
        // dump(strtoupper($checksum));
        // dd($checksum_value);
        $code = "099";
        try {
            if ($checksum_value == strtoupper($checksum)) {
                if ($msg != '') {

                    $res_data         = explode('|', $str);
                    $application_id   = $res_data[1];
                    $transaction_id   = $res_data[2];
                    $amount           = $res_data[4];
                    $transaction_date = $res_data[13];
                    $code             = $res_data[14];
                    $student_id       = $res_data[16];
                    $temp_receipt_id  = $res_data[19];
                    $res_data         = explode('|', $str);
                    $application      = Application::with("admittedStudentLatest")->where('id', $application_id)->first();

                    $online_payment_data = [
                        'student_id'       => $student_id,
                        'application_id'   => $application_id,
                        'temp_receipt_id'  => str_replace("EXAM","",$temp_receipt_id),
                        'transaction_id'   => $transaction_id,
                        'transaction_date' => $transaction_date,
                        'biller_response'  => $str,
                        'amount'           => $amount,
                        'code'             => $code,
                    ];

                    if ($code == '0300') {
                        $online_payment_data['status'] = 1;

                        $receipt_data = [
                            "pay_method"     => "Online",
                            "uid"            => $application->admittedStudentLatest->uid,
                            "student_id"     => $application->student_id,
                            "application_id" => $application->id,
                            "transaction_id" => $transaction_id,
                            "total"          => $amount,
                            "year"           => date("Y"),
                            "colletion_done_by"=> "Student",
                            "is_online"      => true,
                            "type"           => "examination",
                        ];

                        $receipt = AdmissionReceipt::create($receipt_data);

                        $with_practical = false;
                        $stream_id      = $application->appliedStream->stream_id;
                        $with_practical = $application->exam_practical;

                        $fees = $application->feeStructure($with_practical, $stream_id);
                        foreach($fees->feeStructures as $fee_key => $fee){
                            $admission_collection_data = [
                                'student_id'     => $application->student_id,
                                'application_id' => $application->id,
                                'fee_head_id'    => $fee->fee_head_id,
                                'fee_id'         => $fee->fee_id,
                                'amount'         => $fee->amount,
                                'is_free'        => 0,
                                'free_amount'    => 0
                            ];
                                // $admission_collection_data['free_amount'] = 0;

                            $receipt->collections()->create($admission_collection_data);
                        }

                        // AdmissionCollection::create($admission_collection_data);

                        $message = "Payment Successfull for application ID- {$application->id}. Now you can download the receipt.";
                        $mobile = $application->mobile_no;
                        sendSMS($mobile, $message);
                    } else {
                        $online_payment_data['status'] = 0;
                    }
                    OnlinePayment::create($online_payment_data);
                    DB::commit();
                    if ($code == '0300') {
                        $receipt_count = AdmissionReceipt::withTrashed()->where('year',date('Y'))->count();
                        $receipt_no  = str_pad($receipt_count, 4,"0000", STR_PAD_LEFT);
                        $receipt_no = date('y').'-'.$receipt_no;
                        $receipt->receipt_no = $receipt_no;
                        $receipt->save();
                        saveLogs(auth()->id() ?? $application->student_id, auth()->user()->mobile_no ?? null, 'Student', "Receipt generated with receipt id  {$receipt->id} and receipt no {$receipt_no}");
                        Session::flash('success', 'Payment successfully done. Now You can take a print out of payment receipt.');
                        return redirect()->route('student.admission.examination-fee-payment-receipt', $application->uuid);
                    } else {
                        Session::flash('error', 'Payment unsuccessfull. Try again later');
                        return redirect()->route('student.application.index', $application->uuid);
                    }
                    saveLogs(auth()->id() ?? $application->student_id, auth()->user()->mobile_no ?? null, 'Student', "Payment response for application id {$application->id} with code {$code}");
                }
            }
        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            Session::flash('error', 'Something went wrong');
            return redirect()->route('student.application.index');
        }
    }
}
