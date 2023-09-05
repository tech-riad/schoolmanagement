<?php

namespace App\Http\Controllers\Student;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\SmsHistory;
use App\Models\Student;
use App\Models\StudentSms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthDayWishController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->dob;
        $month = Carbon::parse($request->dob)->month;
        $day = Carbon::parse($request->dob)->day;

        $students = new Student();

        $students = $students->whereMonth('dob', '=', $month);
        $students = $students->whereDay('dob', '=', $day);
        $students = $students->get();

        return view($this->backendTemplate['template']['path_name'].'.student.birthday-wish.index',compact('students','date'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'student_id' => 'required'
        ]);
        
        foreach ($request->student_id as $key => $id) {

            $student = Student::find($id);
            $name    = $student->name;
            $number  = $student->mobile_number;

            $message = $request->message;
            $find = ':NAME';
            $newMessage = str_replace($find, $name, $message);

            if (Helper::sd_send_sms_api('88'.$number, $newMessage)) {

                // -----------------------------------------------
                // Student SMS History
                // -----------------------------------------------
                $student->smshistory()->create([
                    'title'         => 'Student Birthday Wish',
                    'description'   => $newMessage,
                ]);


                //notification
                $notification = array(
                    'message' =>'SMS Send Successfully',
                    'alert-type' =>'success'
                );

            } else {
                //notification
                $notification = array(
                    'message' =>'But trouble to send SMS! Contact Admin for userid and password',
                    'alert-type' =>'success'
                );
            }
        }
        return redirect()->back()->with($notification);
    }
}
