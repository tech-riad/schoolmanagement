<?php

namespace App\Http\Controllers\Attendance;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AbsentsmsSetting;
use App\Models\Attendance;
use App\Models\Branch;
use App\Models\DelaysmsSetting;
use App\Models\Designation;
use App\Models\EarlysmsSetting;
use App\Models\PresentsmsSetting;
use App\Models\StockSms;
use App\Models\Teacher;
use App\Models\TeacherTimesetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TeachersAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::where('source_type','App\Models\Teacher')->orderBy('date','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.teacher.index',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $branches = Branch::all();
        $teachers = Teacher::where('type','teacher')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.teacher.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (!empty($data['check'])){
            foreach ($data['check'] as $key => $val) {
                $teacher  = Teacher::find($data['teacher_id'][$val]);
                $teachersSettingTime = TeacherTimesetting::where('teacher_id',$teacher->id)->first();

                $attend_status = 'attend_status' . $data['teacher_id'][$val];

                $teacher->attendance()->where('date', $data['date'])->where('source_id', $teacher->id)->delete();

                if(isset($teachersSettingTime)){
                    $teacher->attendance()->updateOrCreate([
                        'date'       => $data['date'],
                        'finger_id'  => $teacher->finger_id ?? rand(1000, 2000),
                        'in_time'    => $data['in_time'][$val],
                        'out_time'   => $data['out_time'][$val],
                        'status'     => $data[$attend_status]
                    ]);
                }else{
                    //notification
                    $notification = array(
                        'message' =>"Please set teacher's time first",
                        'alert-type' =>'error'
                    );
                    return redirect()->back()->with($notification);
                }
                

                $stock_sms = Helper::smsBalance();
                $stock_sms = $stock_sms->total_balance;

                $teachersAttendanceTime  = $teacher->attendance()->where('date', $data['date'])->where('source_id', $teacher->id)->first();
                $teachersDelaySms        = DelaysmsSetting::orderBy('id','DESC')->first();
                $teachersEarlySms        = EarlysmsSetting::orderBy('id','DESC')->first();
                $teachersPresentsms      = PresentsmsSetting::orderBy('id','DESC')->first();
                $teachersAbsentsms       = AbsentsmsSetting::orderBy('id','DESC')->first();

                //diff minute beetween two times
                $teachersSettingTimeIntime     = Carbon::parse($teachersSettingTime->in_time);
                $teachersAttendanceTimeIntime  = Carbon::parse($teachersAttendanceTime->in_time);

                // calculation Delay time
                $delayTime = $teachersAttendanceTimeIntime->diffInMinutes($teachersSettingTimeIntime);

                // delay sms replace string
                $delaysmscontent= $teachersDelaySms->content;
                $replace        = [":Name", ":Time", ":Designation", ":Date", ":Delay"];
                $replaceItem    = [$teacher->name, date('h:i A', strtotime($teachersAttendanceTime->in_time)), $teacher->designation->title, $data['date'], $delayTime];
                $delaysmsContent= str_replace($replace, $replaceItem, $delaysmscontent);

                
                if($teachersAttendanceTimeIntime > $teachersSettingTimeIntime){
                    if($teachersDelaySms->status == true && $teacher->mobile_number && $teachersAttendanceTime->status == 'present'){
                        if($stock_sms > 0){
                             Helper::sd_send_sms_api('88'.$teacher->mobile_number, $delaysmsContent);
                        }
                    }
                }


                // calculation Early time
                $earlyTime = $teachersSettingTimeIntime->diffInMinutes($teachersAttendanceTimeIntime);

                // early sms replace string
                $earlysmscontent    = $teachersEarlySms->content;
                $replace            = [":Name", ":Time", ":Designation", ":Date", ":Early"];
                $replaceItem        = [$teacher->name, date('h:i A', strtotime($teachersAttendanceTime->in_time)), $teacher->designation->title, $data['date'], $earlyTime];
                $earlysmsContent    = str_replace($replace, $replaceItem, $earlysmscontent);


                if($teachersSettingTimeIntime > $teachersAttendanceTimeIntime){
                    if($teachersEarlySms->status == true && $teacher->mobile_number && $teachersAttendanceTime->status == 'present'){
                        if($stock_sms > 0 ){
                            Helper::sd_send_sms_api('88'.$teacher->mobile_number, $earlysmsContent);
                        }
                    }
                }


                if($teachersAttendanceTimeIntime > $teachersSettingTimeIntime){
                    $status = 'Delay : '.$delayTime;
                }else{
                    $status = 'Early : '.$earlyTime;
                }

                // present sms replace string
                $presentsmscontent= $teachersPresentsms->content;
                $replace            = [":Name", ":Time", ":Designation", ":Date", ":Status"];
                $replaceItem        = [$teacher->name, date('h:i A', strtotime($teachersAttendanceTime->in_time)), $teacher->designation->title, $data['date'], $status];
                $presentsmsContent  = str_replace($replace, $replaceItem, $presentsmscontent);

                if($teachersPresentsms->status == true && $teacher->mobile_number && $teachersAttendanceTime->status == 'present'){
                    if($stock_sms > 0 ){
                        Helper::sd_send_sms_api('88'.$teacher->mobile_number, $presentsmsContent);
                    }
                }

                
                // absent sms replace string
                $absentsmscontent   = $teachersAbsentsms->content;
                $replace            = [":Name", ":Designation", ":Date"];
                $replaceItem        = [$teacher->name, $teacher->designation->title, $data['date']];
                $absentSmsContent   = str_replace($replace, $replaceItem, $absentsmscontent);

                if($teachersAbsentsms->status == true && $teacher->mobile_number && $teachersAttendanceTime->status == 'absent'){
                    if($stock_sms > 0 ){
                        Helper::sd_send_sms_api('88'.$teacher->mobile_number, $absentSmsContent);
                    }
                }

            }
        
            //notification
            $notification = array(
                'message' =>'Data Submit Successfully',
                'alert-type' =>'success'
            );
            return redirect()->route('attendance.teacher.index')->with($notification);
        } else {
            return redirect()->back()->with('message', 'No Student Select!');
        }
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
    public function update(Request $request, $id)
    {
        //
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

    public function getTeachers(Request $request)
    {
        $data = $request->all();
        
        $query = new Teacher();
        $item = [];
        $item['data'] = $data;
        if ($data['teacher_id'] != 'teachers' && $data['teacher_id'] != 'staffs'){
            $item['teachers'] = array($query->find($data['teacher_id']));
        }elseif($data['teacher_id'] == 'teachers'){
            $item['teachers'] =  $query::with('designation')->where('type','teacher')->get();
        }else{
            $item['teachers'] =  $query::with('designation')->where('type','staff')->get();
        }

        return response()->json($item);
    }


    public function report()
    {
        $teachers = Teacher::all();
        $designations = Designation::all();
        return view($this->backendTemplate['template']['path_name'].'.attendance.teacher.report', compact('teachers', 'designations'));
    }

    public function getTeacherByDesignation(Request $request){
        return Teacher::with('designation')->where('designation_id',$request->designation_id)->get();
    }

    public function getTeacherByType($type)
    {   
        $data = [];
        $data['type'] = $type;
        $data['teachers'] = Teacher::where('type',$type)->get();
        return $data;
    }


    public function getTeacherAttendance(Request $request){
         $data = $request->all();
        // dd($data);
        if($data['teacher_id']){
            $attendances = Teacher::find($data['teacher_id'])->attendance()->whereBetween('date', [$data['from_date'], $data['to_date']])->with('source')->get();
            return $attendances;
        }
        else{
            $attendances = Attendance::where('source_type','App\Models\Teacher')->whereBetween('date', [$data['from_date'], $data['to_date']])->with('source')->get();
            return $attendances;
        }
    }
}
