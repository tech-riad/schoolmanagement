<?php

namespace App\Http\Controllers\Parentportal\Leaveapplication;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\LeaveTemplate;
use App\Models\StudentLeaveapplication;
use App\Models\StudentLeavesmsSetting;
use App\Models\TeacherLeaveaplication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentLeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = StudentLeaveapplication::where('student_user_id',Auth::id())->get();
        return view('parentportal.leaveapplication.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = LeaveTemplate::all();
        return view('parentportal.leaveapplication.create',compact('templates'));
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
        
        // get total number of minutes between from and to date
        $shift_difference = $from_date->diffInDays($to_date);

        if($from_date == $to_date){
            $shift_difference = 1;
        }

       $studentApplication = StudentLeaveapplication::create([
            'student_user_id'   => Auth::user()->id,
            'template_id'       => $request->template_id,
            'to_date'           => $request->to_date,
            'from_date'         => $request->from_date,
            'application'       => $request->application,
            'total_day'         => $shift_difference,
        ]);


        $leavesmscontent = StudentLeavesmsSetting::orderBy('id','DESC')->first();

        $student       = $studentApplication->student_user->student;
        $student_name  = $student->name;
        $student_class = $student->ins_class->name.'-'.$student->shift->name.'-'.$student->section->name;
        $leave_days    = $studentApplication->total_day.' Days '.'('. $studentApplication->to_date.' to '.$studentApplication->from_date.'),'. $studentApplication->application.'.';
        
        // sms replace string
        $smscontent     = $leavesmscontent->content;
        $replace        = [":Name", ":Class", ":Days"];
        $replaceItem    = [$student_name, $student_class, $leave_days];
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
        return redirect()->route('studentleaveapplication.index')->with($notification);
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
        $application = StudentLeaveapplication::find($id);
        return view('parentportal.leaveapplication.create',compact('templates','application'));
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

        if($from_date == $to_date){
            $shift_difference = 1;
        }


        StudentLeaveapplication::find($id)->update([
            'student_user_id'   => Auth::user()->id,
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
        return redirect()->route('studentleaveapplication.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = StudentLeaveapplication::find($id);
        $application->delete();

        $notification = array(
            'message' =>' Application Deleted ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
