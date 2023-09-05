<?php

namespace App\Http\Controllers\Teacher;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\SmsHistory;
use App\Models\Teacher;
use App\Models\TeacherSms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthDayWishController extends Controller
{
    public function index(Request $request){

        $date    = $request->dob;
        $month  = Carbon::parse($request->dob)->month;
        $day    = Carbon::parse($request->dob)->day;

        $teachers = new Teacher();
        $teachers = $teachers->whereMonth('date_of_birth', '=', $month);
        $teachers = $teachers->whereDay('date_of_birth', '=', $day);
        $teachers = $teachers->get();

        return view($this->backendTemplate['template']['path_name'].'.teachers.birthday-wish.index',compact('teachers','date'));
    }

    public function sendMessage(Request $request){

        foreach ($request->teacher_id as $key => $id) {

            $teacher = Teacher::find($id);
            $name    = $teacher->name;
            $number  = $teacher->mobile_number;

            $message = $request->message;
            $find = ':NAME';
            $newMessage = str_replace($find, $name, $message);


            if (Helper::sd_send_sms_api('88'.$number, $newMessage)) {
                
                // -----------------------------------------------
                // Teacher SMS History
                // -----------------------------------------------
                $teacher->smshistory()->create([
                    'title'         => 'Teacher Birthday Wish',
                    'description'   => $newMessage
                ]);

                //notification
                $notification = array(
                    'message'    =>'SMS Send Successfully',
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
