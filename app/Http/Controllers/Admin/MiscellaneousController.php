<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlinePayment;
use App\Models\Application;
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
                Session::flash('Error','Payment Already Updated');
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
}
