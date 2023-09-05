<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\StudentLeaveapplication;
use Illuminate\Http\Request;

class StudentApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = StudentLeaveapplication::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.student_application.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function getApplication($id)
    {
        $data = [];
        $data['application'] = StudentLeaveapplication::find($id);
        $data['student'] = StudentLeaveapplication::find($id)->student_user->student->with('section','ins_class','group')->first();
        // $data['designation'] = TeacherLeaveaplication::find($id)->teacher_user->teacher->designation;

        return $data;
    }


    public function approvedApplication()
    {
        $applications = StudentLeaveapplication::where('status','approve')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.approvelist.index',compact('studentapplications'));
    }

    public function rejectedApplication()
    {
        $applications = StudentLeaveapplication::where('status','reject')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.rejectlist.index',compact('studentapplications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($type, $id)
    {
        if($type == 'approve'){
            StudentLeaveapplication::find($id)->update([
                'status'        => 'approve',
                'approved_date' =>  date('Y,m,d'),
            ]);

            $notification = array(
                'message' =>' Application Approved ',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            StudentLeaveapplication::find($id)->update([
                'status'        => 'reject',
                'approved_date' =>  date('Y,m,d'),
            ]);

            $notification = array(
                'message' =>' Application Rejected ',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
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
