<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Caste;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Stream;
use App\Models\Subject;
use App\Models\AppliedSubject;
use App\Models\AppliedStream;
use App\Models\ApprovedList;
use App\Models\RejectedList;
use App\Models\Student;
use App\Models\Reservation;
use App\Models\Fee;
use App\Models\FeeHead;
use App\Models\AdmissionCollection;
use App\Models\AdmissionReceipt;
use App\Models\AdmittedStudent;
use App\Events\ApplicationAdmissionComplete;
use DB, Session, Log, Exception, Str, Excel, PDF, Validator, Image, Redirect;

trait AdmissionTrait
{

    public function create(Request $request, Application $application)
    {
        if(auth()->guard('admin')->check()){
            $guard = 'admin';
        }elseif(auth()->guard('staff')->check()){
            $guard = 'staff'; 
        }
        if($application->status != 3){
            return redirect()->route($guard.".application.index")->with("error", "Subject not yet allocated");
        }
        $fee = Fee::where('course_id',$application->course_id)
                ->where('semester_id',$application->semester_id)
                ->where('stream_id',$application->appliedStream->stream_id)
                ->where('gender',$application->gender)
                ->where('practical',$application->with_practical)
                ->where('year',$application->year)
                ->first();
        $fee_structures = collect();
        if($fee){
            $fee_structures = $fee->feeStructures;
        }

        if(auth()->guard('admin')->check()){
            $view = 'admin.admission.create'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.admission.create'; 
        }
        return view($view,compact('application','fee','fee_structures'));
    }

    public function store(Request $request, Application $application)
    {/*dd($request->all());*/

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

        if($application->status == 4){
            return redirect()->route($guard.".application.index")->with("error", "Student already admitted.");
        }
        DB::beginTransaction();
        try {
            
            $application->admission_done_by = $by;
            $application->admission_done_by_id = $by_id;
            $application->status = 4;
            // if student has no uid
            $uid = $this->getUid($application);
            if(!$application->admittedStudent()->exists()){
                $admitted_student_data = [
                    'uid' => $uid,
                    'application_id' => $application->id,
                    'course_id' => $application->course_id,
                    'stream_id' => $application->appliedStream->stream_id,
                    'semester_id' => $application->semester_id,
                    'student_id' => $application->student_id,
                    'admission_done_by' => $by,
                    'admission_done_by_id' => $by_id,
                    'year' => date('Y'),
                ];
                $application->admittedStudent()->create($admitted_student_data);
                $application->save();
            }
            $admission_receipt_data = [
                'uid' => $uid,
                'student_id' => $application->student_id,
                'application_id' => $application->id,
                'pay_method' => $request->pay_method,
                'colletion_done_by' => $by,
                'colletion_done_by_id' => $by_id,
                'total' => $request->has('free_total')?$request->free_total: $request->total,
                'year' => date('Y'),
                'transaction_id' => $request->get("transaction_id"),
            ];
            $admission_receipt = AdmissionReceipt::create($admission_receipt_data);
            foreach ($request->fee_head_ids as $key => $value) {
                $admission_collection_data = [
                    'receipt_id' => $admission_receipt->id,
                    'student_id' => $application->student_id,
                    'application_id' => $application->id,
                    'fee_head_id' => $request->fee_head_ids[$key],
                    'fee_id' => $request->fee_ids[$key],
                    'amount' => $request->amounts[$key],
                    'is_free' => $request->is_frees[$key]
                ];
                if(array_key_exists($key, $request->is_frees)){
                    if($request->is_frees[$key]==1)
                        $admission_collection_data['free_amount'] = $request->free_amounts[$key];
                    else 
                        $admission_collection_data['free_amount'] = 0;
                }else{
                    $admission_collection_data['free_amount'] = 0; 
                }/*dump($admission_collection_data);*/
                AdmissionCollection::create($admission_collection_data);
            }

            // reject application of that student as admission done
            Application::where('student_id',$application->student_id)
                        ->where('status','<',3)
                        ->update(['status'=>6]);

            saveLogs($by_id, $by_username, $by, "Admission done for {$application->id}");
            
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);
            Session::flash('error','Something went wrong');
            return back();
        }/*dd('a');*/
        DB::commit();
        $receipt_count = AdmissionReceipt::where('year',date('Y'))->count();
        $receipt_no  = str_pad($receipt_count, 4,"0000", STR_PAD_LEFT);
        $receipt_no = date('y').'-'.$receipt_no;
        $admission_receipt->receipt_no = $receipt_no;
        $admission_receipt->save();
        event(new ApplicationAdmissionComplete("Application No {$application->id}'s Admission Procedure Is Complete",[],getSeatDetails()));
        Session::flash('successfull','Admission Successfull');
        return redirect()->route($view,$application->uuid);
    }

    public function getUid($application)
    {
        $year = date('y');
        $stream_name = $application->appliedStream->stream->name;
        $course_name = $application->course->name;
        $count  = Application::where('course_id',$application->course_id)
                            ->where('semester_id',$application->semester_id)
                            ->whereHas('appliedStream',function($query) use ($application){
                                $query->where('stream_id',$application->appliedStream->stream_id);
                            })
                            ->where('status',4)
                            ->count() + 1;
        $uid  = str_pad($count, 4,"0000", STR_PAD_LEFT);
        // $uid = $year.$stream_name[0].$course_name[0].$uid;
		$uid = $year.'C'.$course_name[0].$uid;
        return $uid;
    }

    public function receipt(Request $request, Application $application)
    {
        if(auth()->guard('admin')->check()){
            $view = 'admin.admission.receipt'; 
        }elseif(auth()->guard('staff')->check()){
            $view = 'staff.admission.receipt'; 
        }
        // $collections = AdmissionCollection::where('application_id',$application->id)->get();
        return view($view,compact('application','fees'));
    }

}