<?php

namespace App\Http\Controllers\Attendance;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentAbsentsmsSetting;
use App\Models\StudentDelaysmsSetting;
use App\Models\StudentEarlysmsSetting;
use App\Models\StudentPresentsmsSetting;
use App\Models\StudentTimesetting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::where('source_type','App\Models\Student')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.student.index',compact('attendance'));
    }

    public function create()
    {
        $academic_years = Session::all();
        $classes        = InsClass::all();
        $sections       = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.attendance.student.create', compact('academic_years','sections', 'classes'));
    }


    public function store(Request $request)
    {
       $data = $request->all();
        // return $data;
        if (!empty($data['check'])){
            foreach($data['check'] as $key => $val){

                $student = Student::find($data['student_id'][$val]);

                $studentsSettingTime  = StudentTimesetting::where('ins_class_id',$student->ins_class->id)->first();

                $attend_status = 'attend_status' . $data['student_id'][$val];

                $student->attendance()->where('date',$data['date'])->where('source_id',$student->id)->delete();

                if(isset($studentsSettingTime)){
                    $student->attendance()->updateOrCreate([
                        'date'       => $data['date'],
                        'finger_id'  => $student->finger_id ?? 00,
                        'in_time'    => $data['in_time_input'][$val],
                        'out_time'   => $data['out_time_input'][$val],
                        'status'     => $data[$attend_status]
                    ]);
                }else{
                    //notification
                    $notification = array(
                        'message' =>"Please set student's time first",
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
                }
                

                $stock_sms = Helper::smsBalance();
                $stock_sms = $stock_sms->total_balance;

                $studentsAttendance  = $student->attendance()->where('date',$data['date'])->where('source_id', $student->id)->first();
                $studentsDelaySms        = StudentDelaysmsSetting::orderBy('id','DESC')->first();
                $studentsEarlySms        = StudentEarlysmsSetting::orderBy('id','DESC')->first();
                $studentspresentSms      = StudentPresentsmsSetting::orderBy('id','DESC')->first();
                $studentsabsentSms       = StudentAbsentsmsSetting::orderBy('id','DESC')->first();

                //diff minute beetween two times
                $studentsSettingTime     = Carbon::parse($studentsSettingTime->in_time);
                $studentsAttendanceTime  = Carbon::parse($studentsAttendance->in_time);

                // calculation Delay time
                $delayTime = $studentsAttendanceTime->diffInMinutes($studentsSettingTime);

                // delay sms replace string
                $delaysmscontent= $studentsDelaySms->content;
                $replace        = [":Name", ":Time",":Date", ":Delay"];
                $replaceItem    = [$student->name, date('h:i A', strtotime($studentsAttendanceTime)),$data['date'], $delayTime];
                $delaysmsContent= str_replace($replace, $replaceItem, $delaysmscontent);


                if($studentsAttendanceTime > $studentsSettingTime){
                    if($studentsDelaySms->status == true && $student->mobile_number && $studentsAttendance->status == 'present'){
                        if($stock_sms > 0){
                             Helper::sd_send_sms_api('88'.$student->mobile_number, $delaysmsContent);
                        }
                    }
                }

                // calculation Early time
                $earlyTime = $studentsSettingTime->diffInMinutes($studentsAttendanceTime);

                // early sms replace string
                $earlysmscontent    = $studentsEarlySms->content;
                $replace            = [":Name", ":Time", ":Date", ":Early"];
                $replaceItem        = [$student->name, date('h:i A', strtotime($studentsAttendanceTime)), $data['date'], $earlyTime];
                $earlysmsContent    = str_replace($replace, $replaceItem, $earlysmscontent);


                if($studentsSettingTime > $studentsAttendanceTime){
                    if($studentsEarlySms->status == true && $student->mobile_number && $studentsAttendance->status == 'present'){
                        if($stock_sms > 0 ){
                            Helper::sd_send_sms_api('88'.$student->mobile_number, $earlysmsContent);
                        }
                    }
                }


                if($studentsAttendanceTime > $studentsSettingTime){
                    $status = 'Delay : '.$delayTime;
                }else{
                    $status = 'Early : '.$earlyTime;
                }


                // present sms replace string
                $presentsmscontent  = $studentspresentSms->content;
                $replace            = [":Name", ":Time", ":Date", ":Status"];
                $replaceItem        = [$student->name, date('h:i A', strtotime($studentsAttendanceTime)), $data['date'], $status];
                $smsContent         = str_replace($replace, $replaceItem, $presentsmscontent);


                if($studentspresentSms->status == true && $student->mobile_number && $studentsAttendance->status == 'present'){
                    if($stock_sms > 0 ){
                        Helper::sd_send_sms_api('88'.$student->mobile_number, $smsContent);
                    }
                }


                // present sms replace string
                $absentsmscontent   = $studentsabsentSms->content;
                $replace            = [":Name",":Date",];
                $replaceItem        = [$student->name, $data['date']];
                $smsContent         = str_replace($replace, $replaceItem, $absentsmscontent);

                if($studentsabsentSms->status == true && $student->mobile_number && $studentsAttendance->status == 'absent'){
                    if($stock_sms > 0 ){
                        Helper::sd_send_sms_api('88'.$student->mobile_number, $smsContent);
                    }
                }


            }

            return redirect()->route('attendance.student.index')->with('message','Data Create Successfully');

        }else{
            return redirect()->back()->with('message','No Student Select!');
        }
    }


    public function report(){
        $students = Student::all();
        return view($this->backendTemplate['template']['path_name'].'.attendance.student.report',compact('students'));
    }


    public function getStudentStatus(Request $request){

        $data = $request->all();

        if($data['student_id']){
            $attendances = Student::find($data['student_id'])->attendance()->whereBetween('date', [$data['from_date'], $data['to_date']])->with('source')->get();
            return $attendances;
        }
        else{
            $attendances = Attendance::where('source_type','App\Models\Student')->whereBetween('date', [$data['from_date'], $data['to_date']])->with('source')->get();
            return $attendances;
        }
    }
}
