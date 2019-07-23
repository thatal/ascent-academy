<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use DB, Session, Exception, Log, Str;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate();
        return view('admin.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'uuid' => (String) Str::uuid(),
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];
        Staff::create($data);
        Session::flash('success','Created Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Staff $staff)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Staff $staff)
    {
        return view('admin.staff.edit',compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $data = [
            'name' => $request->name,
            'username' => $request->username,
        ];
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $staff->update($data);
        $staff->save();
        Session::flash('success','Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
