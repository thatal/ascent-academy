<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Fee;
use App\Models\OnlinePayment;
use App\Models\TempAdmissionCollection;
use App\Models\TempAdmissionReceipt;
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
        TempAdmissionReceipt::where('application_id',$application->id)->delete();
        TempAdmissionCollection::where('application_id',$application->id)->delete();
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
                'uid' => 'aaa',
                'student_id' => $application->student_id,
                'application_id' => $application->id,
                'total' => $total,
                'year' => date('Y'),
                'is_online' => 1
            ];
            $temp_admission_receipt = TempAdmissionReceipt::create($admission_receipt_data);
            foreach ($fee_structures as $fee_structure) {
                $data = [
                    'temp_receipt_id' => $temp_admission_receipt->id,
                    'student_id' => $application->student_id,
                    'application_id' => $application->id,
                    'fee_id' => $fee_structure->fee_id,
                    'fee_head_id' => $fee_structure->fee_head_id,
                    'is_free' => $fee_structure->is_free,
                ];
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
                array_push($datas, $data);
            }
            TempAdmissionCollection::insert($datas);
            $checksum = generateCheckSum($request, $temp_admission_receipt->id);
        } catch (Exception $e) {
            dd($e);
            DB::rollback();
            return back();
        }
        DB::commit();
        return view('student.admission.payment.fee-detail', compact('application', 'fee', 'fee_structures', 'self_ids','temp_admission_receipt','checksum'));
    }

    public function generateCheckSum($request, $temp_admission_receipt_id)
    {
        $application = Application::where('uuid', $request->application_uuid)->first();
        $application_id = $application->id;
        $amount = config('constants.application_fee');
        $redirect_url = config('constants.redirect_url');
        $merchant_id = config('constants.merchant_id');
        $checksum_key = config('constants.checksum_key');

        // $str = 'TESTME|UATTXN0001|NA|2|NA|NA|NA|INR|NA|R|NA|NA|NA|F|Andheri|Mumbai|02240920005|support@billdesk.com|NA|NA|NA|https://www.billdesk.com';

        $str = $merchant_id . '|' . $application_id . '|NA|' . $amount . '|NA|NA|NA|INR|NA|R|NA|NA|NA|F|' . $application->student_id . '|' . $application->student->email . '|' . $application->student->mobile_no . '|'.$temp_admission_receipt_id.'|NA|NA|NA|' . $redirect_url;
        // dd($str);
        $checksum = hash_hmac('sha256', $str, $checksum_key, false);
        $checksum = strtoupper($checksum);
        $checksum = $str . "|" . $checksum;
        return $checksum;
        // echo $checksum;
        // return view('student.application.make-payment', compact('application_id', 'application', 'amount', 'checksum'));
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
        // Log::info($checksum);
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
                    $application = Application::where('id', $application_id)->first();
                    if ($application->payment_status == 1) {
                        Session::flash('error', 'Payment has been already done');
                        return redirect()->route('student.application.show', $application->uuid);
                    }
                    $online_payment_data = [
                        'student_id' => $student_id,
                        'application_id' => $application_id,
                        'transaction_id' => $transaction_id,
                        'transaction_date' => $transaction_date,
                        'biller_response' => $str,
                        'amount' => $amount,
                        'code' => $code,
                    ];
                    if ($code == '0300') {
                        $online_payment_data['status'] = 1;
                        $application->payment_status = 1;
                        $application->save();
                        $message = "Payment Successfull for application ID- {$application->id}. Now you can download the application.";

                        $mobile = $application->mobile_no;

                        sendSMS($mobile, $message);
                        Session::flash('success', 'Payment successfully done');
                    } else {
                        $online_payment_data['status'] = 0;
                        Session::flash('error', 'Payment Unsuccessfull');
                    }
                    OnlinePayment::create($online_payment_data);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
            Session::flash('error', 'Something went wrong');
            return redirect()->route('student.application.index');
        }
        DB::commit();
        if ($code == '0300') {
            Session::flash('success', 'Payment successfully done. Now You can download your application');
            return redirect()->route('student.application.show', $application->uuid);
        } else {
            Session::flash('error', 'Payment unsuccessfull. Try again later');
            return redirect()->route('student.application.show', $application->uuid);
        }
    }

    public function paymentReceipt(Request $request, Application $application)
    {
        return view('student.admission.payment-receipt', compact('application'));
    }
}
