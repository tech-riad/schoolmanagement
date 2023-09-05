<?php

namespace App\Http\Controllers\TeacherPanel;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\LeaveTemplate;
use App\Models\TeacherLeaveaplication;
use App\Models\TeacherLeavesmsSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TeacherLeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = TeacherLeaveaplication::where('teacher_user_id',Auth::user()->id)->get();
        return view('teacherpanel.leaveapplication.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = LeaveTemplate::all();
        return view('teacherpanel.leaveapplication.create',compact('templates'));
    }

    public function getTemplateById($id)
    {
        return LeaveTemplate::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to_date'       => 'required',
            'from_date'     => 'required',
            'application'   => 'required',
            'template_id'   => 'required'
        ]);

        // get from and to date
        $from_date = Carbon::parse(date('Y-m-d', strtotime($request->from_date))); 
        $to_date = Carbon::parse(date('Y-m-d', strtotime($request->to_date))); 
            
        // get total number of days between from and to date
        $shift_difference = $from_date->diffInDays($to_date);
        $shift_difference = $shift_difference + 1;

       $teacherApplication = TeacherLeaveaplication::create([
            'teacher_user_id'   => Auth::user()->id,
            'template_id'       => $request->template_id,
            'to_date'           => $request->to_date,
            'from_date'         => $request->from_date,
            'application'       => $request->application,
            'total_day'         => $shift_difference,
        ]);


        // Teachers Leave Application! 
        // Md Shozib Hossen ( Asst. Teacher) 
        // 5 Days ( 12 May to 17 May, 2023)
        // Sick Leave
        //(Please Approved My Application)

        $leavesmscontent = TeacherLeavesmsSetting::orderBy('id','DESC')->first();

        $teacher             = $teacherApplication->teacher_user->teacher;
        $teacher_name        = $teacher->name;
        $teacher_designation = $teacher->designation->title;
        $leave_days          = $teacherApplication->total_day.' Days '.'('. $teacherApplication->to_date.' to '.$teacherApplication->from_date.'),'. $teacherApplication->application.'.';
        
        // sms replace string
        $smscontent     = $leavesmscontent->content;
        $replace        = [":Name", ":Designation", ":Days"];
        $replaceItem    = [$teacher_name, $teacher_designation, $leave_days];
        $smsContent     = str_replace($replace, $replaceItem, $smscontent);

        $stock_sms = Helper::smsBalance();
        $stock_sms = $stock_sms->total_balance;

        if($leavesmscontent->status == true && $leavesmscontent->number){
            if($stock_sms > 0){
                Helper::sd_send_sms_api('88'.$leavesmscontent->number, $smsContent);
            }
        }


        $notification = array(
            'message' =>' Application Submited ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.application.index')->with($notification);
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
        $templates = LeaveTemplate::all();
        $application = TeacherLeaveaplication::find($id);
        return view('teacherpanel.leaveapplication.create',compact('templates','application'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'to_date'       => 'required',
            'from_date'     => 'required',
            'application'   => 'required',
            'template_id'   => 'required'
        ]);

        // get from and to date
        $from_date = Carbon::parse(date('Y-m-d', strtotime($request->from_date))); 
        $to_date = Carbon::parse(date('Y-m-d', strtotime($request->to_date))); 
            
        // get total number of minutes between from and to date
        $shift_difference = $from_date->diffInDays($to_date);

        TeacherLeaveaplication::find($id)->update([
            'template_id'       => $request->template_id,
            'to_date'           => $request->to_date,
            'from_date'         => $request->from_date,
            'application'       => $request->application,
            'total_day'         => $shift_difference,
        ]);

        $notification = array(
            'message' =>' Application Updated ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.application.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = TeacherLeaveaplication::find($id);
        $application->delete();

        $notification = array(
            'message' =>' Application Deleted ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
