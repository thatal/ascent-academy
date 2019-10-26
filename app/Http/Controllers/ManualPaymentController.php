<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdmissionCollection;
use App\Models\AdmissionReceipt;
use App\Models\AdmittedStudent;
use App\Models\Application;
use App\Models\OnlinePayment;
use App\Models\TempAdmissionCollection;
use App\Models\TempAdmissionReceipt;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;
use Session;

class ManualPaymentController extends Controller
{
    public function admissionPayment(Request $request)
    {
        $rules = [
            "temp_id"        => "required|exists:temp_admission_receipts,id",
            "application_id" => "required|exists:applications,id",
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $error) {
                dump(collect($error)->implode(","));
            }
            dd("Application Stopped.");
        }
        $temp_id        = $request->get("temp_id");
        $application_id = $request->get("application_id");

        try {
            $temp_receipt = TempAdmissionReceipt::find($temp_id);
            if (!$temp_receipt) {
                return "temp_admission_receipts temp id not exists or deleted is not null";
            }
            $temp_receipt = TempAdmissionReceipt::where("id", $temp_id)->where("application_id", $application_id)->get();
            if (!$temp_receipt->count()) {
                return "Combination of application id and temp id not found.";
            }
            // $res_data         = explode('|', $str);
            // $application_id   = $res_data[1];
            // $transaction_id   = $res_data[2];
            // $amount           = $res_data[4];
            // $transaction_date = $res_data[13];
            // $code             = $res_data[14];
            // $student_id       = $res_data[16];
            // $temp_receipt_id  = $res_data[19];
            $application = Application::where('id', $application_id)->first();
            if ($application->payment_status == 3) {
                return "Payment has been already done";
                Session::flash('error', 'Payment has been already done');
                return redirect()->route('student.application.show', $application->uuid);
            }
            $student_id = $application->student_id;

            $application->payment_status       = 3;
            $application->status               = 4;
            $application->admission_done_by    = 'Manual';
            $application->admission_done_by_id = 0;
            $application->selected_category_id = $application->category_id;
            $application->save();

            $receipt               = $this->moveFromTempToOriginal($request, $temp_id);
            $admitted_student_data = [
                'application_id'       => $application_id,
                'course_id'            => $application->course_id,
                'stream_id'            => $application->appliedStream->stream_id,
                'semester_id'          => $application->semester_id,
                'student_id'           => $student_id,
                'uid'                  => $application->tempUid->uid,
                'year'                 => date('Y'),
                'admission_done_by'    => 'Manual',
                'admission_done_by_id' => 0,
            ];
            AdmittedStudent::create($admitted_student_data);
            $message = "Payment Successfull for application ID- {$application->id}. Now you can download the receipt.";
            $mobile  = $application->mobile_no;

            // sendSMS($mobile, $message);
        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            return "Something went wrong";
            Session::flash('error', 'Something went wrong');
            return redirect()->route('student.application.index');
        }
        DB::commit();
        if (true) {
            $receipt_count       = AdmissionReceipt::withTrashed()->where('year', date('Y'))->count();
            $receipt_no          = str_pad($receipt_count, 4, "0000", STR_PAD_LEFT);
            $receipt_no          = date('y') . '-' . $receipt_no;
            $receipt->receipt_no = $receipt_no;
            $receipt->save();
            return "Payment successfully done. Now You can download your application";
            saveLogs(auth()->id(), auth()->user()->mobile_no, 'Student', "Receipt generated with receipt id  {$receipt->id} and receipt no {$receipt_no}");
            Session::flash('success', 'Payment successfully done. Now You can download your application');
            return redirect()->route('student.admission.payment-receipt', $application->uuid);
        } else {
            return "Payment unsuccessfull";
            Session::flash('error', 'Payment unsuccessfull. Try again later');
            return redirect()->route('student.application.index', $application->uuid);
        }
    }

    private function moveFromTempToOriginal($request, $temp_receipt_id)
    {
        $temp_receipt               = TempAdmissionReceipt::find($temp_receipt_id);
        $receipt_data               = $temp_receipt->only(['uid', 'student_id', 'application_id', 'total', 'year', 'is_online']);
        $receipt_data['pay_method'] = 'Online';
        $receipt                    = AdmissionReceipt::create($receipt_data);
        $temp_collections           = TempAdmissionCollection::where('temp_receipt_id', $temp_receipt_id)
            ->select(['student_id', 'application_id', 'fee_head_id', 'fee_id', 'amount', 'free_amount', 'is_free'])
            ->get();
        $collection_datas = $temp_collections->toArray();
        foreach ($collection_datas as $key => $collection_data) {
            $collection_datas[$key]['receipt_id'] = $receipt->id;
            $collection_datas[$key]['created_at'] = date('Y-m-d H:i:s');
            $collection_datas[$key]['updated_at'] = date('Y-m-d H:i:s');
        }
        $collections = AdmissionCollection::insert($collection_datas);
        return $receipt;
    }

    public function examinationPayment(Request $request)
    {
        try {
            $application_id = $request->get("application_id");
            $rules = [
                "application_id" => "required|exists:applications,id",
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                foreach ($validator->errors()->toArray() as $error) {
                    dump(collect($error)->implode(","));
                }
                dd("Application Stopped.");
            }
            $transaction_id   = "MANUAL";
            $application      = Application::with("admittedStudentLatest")->where('id', $application_id)->first();
            $receipts = $application->examinationFeeReceipt;
            if($receipts->count()){
                return "Examination Fee Already Paid.";
            }
            if (/* $code == '0300' */ true) {

                $with_practical = false;
                $stream_id      = $application->appliedStream->stream_id;
                $with_practical = $application->exam_practical;

                $fees = $application->feeStructure($with_practical, $stream_id);
                if(!$fees){
                    return "Fee Structure not Generated.";
                }
                $amount = $fees->feeStructures->sum('amount');
                $receipt_data = [
                    "pay_method"     => "Online",
                    "uid"            => $application->admittedStudentLatest->uid,
                    "student_id"     => $application->student_id,
                    "application_id" => $application->id,
                    "transaction_id" => $transaction_id,
                    "total"          => $amount,
                    "year"           => date("Y"),
                    "is_online"      => true,
                    "type"           => "examination",
                    "colletion_done_by"=> "manual",
                ];

                $receipt = AdmissionReceipt::create($receipt_data);
                foreach ($fees->feeStructures as $fee_key => $fee) {
                    $admission_collection_data = [
                        'student_id'     => $application->student_id,
                        'application_id' => $application->id,
                        'fee_head_id'    => $fee->fee_head_id,
                        'fee_id'         => $fee->fee_id,
                        'amount'         => $fee->amount,
                        'is_free'        => 0,
                        'free_amount'    => 0,
                    ];
                    // $admission_collection_data['free_amount'] = 0;

                    $receipt->collections()->create($admission_collection_data);
                }

                // AdmissionCollection::create($admission_collection_data);

                $message = "Payment Successfull for application ID- {$application->id}. Now you can download the receipt.";
                $mobile  = $application->mobile_no;
                // sendSMS($mobile, $message);
            }
            DB::commit();
            if (/* $code == '0300' */ true) {
                $receipt_count       = AdmissionReceipt::withTrashed()->where('year', date('Y'))->count();
                $receipt_no          = str_pad($receipt_count, 4, "0000", STR_PAD_LEFT);
                $receipt_no          = date('y') . '-' . $receipt_no;
                $receipt->receipt_no = $receipt_no;
                $receipt->save();
                return "Payment successfully done. Now You can take a print out of payment receipt.";
                // saveLogs(auth()->id(), auth()->user()->mobile_no ?? null, 'Student', "Receipt generated with receipt id  {$receipt->id} and receipt no {$receipt_no}");
                // Session::flash('success', 'Payment successfully done. Now You can take a print out of payment receipt.');
                // return redirect()->route('student.admission.examination-fee-payment-receipt', $application->uuid);
            } else {
                return "Payment unsuccessfull";
                // Session::flash('error', 'Payment unsuccessfull. Try again later');
                // return redirect()->route('student.application.index', $application->uuid);
            }
            // saveLogs(auth()->id(), auth()->user()->mobile_no ?? null, 'Student', "Payment response for application id {$application->id} with code {$code}");

        } catch (Exception $e) {
            // dd($e);
            DB::rollback();
            Log::error($e);
            return "Something went wrong";
            // Session::flash('error', 'Something went wrong');
            // return redirect()->route('student.application.index');
        }
    }
}
