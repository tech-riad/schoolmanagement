<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\TeacherLeaveaplication;
use Illuminate\Http\Request;

class TeacherApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = TeacherLeaveaplication::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.teacher_application.index',compact('applications'));
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
        $data['application'] = TeacherLeaveaplication::find($id);
        $data['teacher'] = TeacherLeaveaplication::find($id)->teacher_user->teacher;
        $data['designation'] = TeacherLeaveaplication::find($id)->teacher_user->teacher->designation;

        return $data;
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
            TeacherLeaveaplication::find($id)->update([
                'status'        => 'approve',
                'approved_date' =>  date('Y,m,d'),
            ]);

            $notification = array(
                'message' =>' Application Approved ',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }else{
            TeacherLeaveaplication::find($id)->update([
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
