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
use App\Models\Course;
use App\Models\Fee;
use App\Models\Subject;
use DB, Log, Session, Exception;
use App\Models\AppliedSubject;
use Illuminate\Support\Str;

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

    public function subjectAllocationEdit(Request $request)
    {
        $application = collect();
        $courses = Course::get();
        $applied_course = [];
        $applied_subs = [];
        $stream_wise_subjects = [];
        $categories = [];
        if($request->has('uid')){
            $admitted_student = AdmittedStudent::where('uid',$request->uid)
                                    ->where('course_id',$request->course_id)
                                    ->where('stream_id',$request->stream_id)
                                    ->where('semester_id',$request->semester_id)
                                    ->first();
            if(!$admitted_student){
                $request->session()->flash('error', 'Student Not Found');
                return back();
            }
            $application = Application::find($admitted_student->application_id);
            if($application)
                return view('admin.miscellaneous.subject-allocation.edit',compact('application','courses','applied_course','applied_subs','stream_wise_subjects','categories'));
            else
                return view('admin.miscellaneous.subject-allocation.edit',compact('courses','applied_course','applied_subs','stream_wise_subjects','categories'));
        }
        return view('admin.miscellaneous.subject-allocation.edit',compact('courses','applied_course','applied_subs','stream_wise_subjects','categories'));
    }

    public function subjectAllocationUpdate(Request $request)
    {
        $application = Application::find($request->application_id);
        if(auth()->guard('admin')->check()){
            $view = 'admin.admission.receipt';
            $by = 'Admin';
            $guard = 'admin';
            $by_id  = auth()->guard('admin')->id();
            $by_username  = auth()->guard('admin')->user()->username;
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.admission.receipt';
            $by = 'Staff';
            $guard = 'staff';
            $by_id  = auth()->guard('staff')->id();
            $by_username  = auth()->guard('staff')->user()->username;
        }
        DB::beginTransaction();
        try {
            $application->with_practical = $request->get("practical");
            $application->save();
            $prev_subjects = $application->appliedSubjects->pluck('subject_id')->toArray();

            $subjects_changed = array_diff($prev_subjects,$request->subjects);
            $application->appliedSubjects()->whereIn('subject_id',$subjects_changed)->delete();
            $application->load('appliedSubjects');
            $subjects_not_deleted = $application->appliedSubjects->pluck('subject_id')->toArray();

            // dump($request->subjects, $subjects_not_deleted);

            $new_subjects = array_diff($request->subjects, $subjects_not_deleted);
            foreach($new_subjects as $new_subject){
                $subject = Subject::find($new_subject);
                $data = [
                    'uuid' => (String)Str::uuid(),
                    'application_id' => $application->id,
                    'student_id' => $application->student_id,
                    'subject_id' => $subject->id,
                    'is_compulsory' => $subject->is_compulsory,
                    'is_major' => $subject->is_major,
                    'preference' => 0,
                    'allocated_by_id' => $by_id,
                    'allocated_by' => $by,
                ];
                AppliedSubject::create($data);
            }
            $application->load('appliedSubjects');
            // dump($application->appliedSubjects->pluck('subject_id')->toArray());
            $fee = Fee::where('course_id', $application->course_id)
            ->where('semester_id', $application->semester_id)
            ->where('stream_id', $application->appliedStream->stream_id)
            ->where('gender', $application->gender)
            ->where('practical', $application->with_practical)
            ->where('year', $application->year)
            ->first();
            // foreach($fee->feeStructures as $feeStructure){
            //     dump($feeStructure->feeHead->name, $feeStructure->amount);
            // }
            $fee_structures = collect();
            if ($fee) {
                $fee_structures = $fee->feeStructures;
            }
            $data = getFeeStructure($application, $fee_structures);
            $fee_structures = $data['fee_structures'];
            $self_ids = $data['self_ids'];

            $datas = collect();
            $total = 0;
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
                foreach ($fee_structures as $fee_structure) {
                    $data = [
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
                    $datas->push($data);
                }
                $diff_collection = $this->diffInCollection($application, $application->collections->toArray(),$datas);
                $need_to_collect = $diff_collection['need_to_collect'];
                $need_to_return = $diff_collection['need_to_return'];
                if(count($need_to_collect)){
                    $admission_collection_datas = $datas->whereIn('fee_head_id',$need_to_collect);
                    $total = 0;
                    $data = [];
                    foreach($admission_collection_datas as $admission_collection_data){
                        if ($application->free_admission == 'yes') {
                            if (in_array($admission_collection_data['fee_head_id'], $self_ids)) {
                                $data['free_amount'] = 0;
                                $data['amount'] = $admission_collection_data['amount'];
                                $data['is_free'] = 0;
                            } else {
                                $data['free_amount'] = $admission_collection_data['amount'];
                                $data['amount'] = 0;
                                $data['is_free'] = 1;
                            }
                        } else {
                            $data['free_amount'] = 0;
                            $data['amount'] = $admission_collection_data['amount'];
                            $data['is_free'] = 0;
                        }
                        $total += $data['amount'];
                    }
                    $admission_receipt_data = [
                        'uid' => $application->admittedStudent->uid,
                        'student_id' => $application->student_id,
                        'application_id' => $application->id,
                        'pay_method' => 'Cash',
                        'total' => $total,
                        'year' => date('Y'),
                    ];
                    $admission_receipt = AdmissionReceipt::create($admission_receipt_data);
                    foreach($admission_collection_datas as $admission_collection_data){
                        $admission_collection_data['receipt_id'] = $admission_receipt->id;
                        AdmissionCollection::create($admission_collection_data);
                    }
                }
                // dd($admission_receipt);
        } catch (Exception $e) {
            dd($e);
            Session::flash('error','Something went wrong');
            DB::rollback();
            return back();
        }
        DB::commit();
        if(isset($admission_receipt)){
            $receipt_count = AdmissionReceipt::withTrashed()->where('year',date('Y'))->count();
            $receipt_no  = str_pad($receipt_count, 4,"0000", STR_PAD_LEFT);
            $receipt_no = date('y').'-'.$receipt_no;
            $admission_receipt->receipt_no = $receipt_no;
            $admission_receipt->save();
        }
        Session::flash('successfull','Admission Successfull');
        return back();
    }

    protected function diffInCollection($application, $prev_collections, $new_collections)
    {
        $need_to_collect = [];
        $need_to_return = [];
        foreach($prev_collections as $aV){
            $aTmp1[] = $aV['fee_head_id'];
        }

        foreach($new_collections as $aV){
            $aTmp2[] = $aV['fee_head_id'];
        }

        $collect_heads = array_diff($aTmp2,$aTmp1);
        $return_heads = array_diff($aTmp1,$aTmp2);
        // for practical
        $aTmp1 = [];
        foreach($prev_collections as $aV){
            if($application->semester_id==1){
                if($aV['fee_head_id']==19){
                    $aTmp1[] = $aV['amount'];
                }
            }else{
                if($aV['fee_head_id']==17){
                    $aTmp1[] = $aV['amount'];
                }
            }
        }
        $aTmp2 = [];
        foreach($new_collections as $aV){
            if($application->semester_id==1){
                if($aV['fee_head_id']==19){
                    $aTmp2[] = $aV['amount'];
                }
            }else{
                if($aV['fee_head_id']==17){
                    $aTmp2[] = $aV['amount'];
                }
            }
        }
        if($aTmp1[0] > $aTmp2[0]){
            if($application->free_admission!='yes')
                array_push($need_to_return, 17);
        }elseif($aTmp1[0] < $aTmp2[0]){
            array_push($need_to_collect, 17);
        }
        // end for practical
        if(count($need_to_return)){
            dd('Rupam has not wrote this part(need to return)', $need_to_return, $prev_collections, $new_collections);
        }
        if(count($return_heads)){
            dd('Rupam has not wrote this part(return head)', $return_heads, $prev_collections, $new_collections);
        }elseif(count($collect_heads)){
            foreach($collect_heads as $collect_head){
                array_push($need_to_collect, $collect_head);
            }
        }
        return [
            'need_to_collect' => $need_to_collect,
            'need_to_return' => $need_to_return,
        ];
    }
}
