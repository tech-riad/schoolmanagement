<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\StudentLeaveapplication;
use App\Models\TeacherLeaveaplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function approvedApplication()
    {
        $studentapplications = StudentLeaveapplication::where('status','approve')->get();
        $teacherapplications = TeacherLeaveaplication::where('status','approve')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.approvelist.index',compact('teacherapplications','studentapplications'));
    }

    public function rejectedApplication()
    {
        $studentapplications = StudentLeaveapplication::where('status','reject')->get();
        $teacherapplications = TeacherLeaveaplication::where('status','reject')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.rejectlist.index',compact('teacherapplications','studentapplications'));
    }

}
