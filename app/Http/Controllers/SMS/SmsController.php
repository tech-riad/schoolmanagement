<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use App\Models\SmsTemplates;
use App\Models\Student;
use App\Models\Teacher;
use App\Helper\Helper;
use Illuminate\Http\Request;


class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates      = SmsTemplates::all();
        $academic_years = Session::all();
        $classes        = InsClass::all();
        $shifts         = Shift::all();
        $sections       = Section::all();
        $groups         = Group::all();

        $teachers       = Teacher::where('type', 'teacher')->get();
        $staffs         = Teacher::where('type', 'staff')->get();
        $committies     = Teacher::where('type', 'committee')->get();

        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.sms.index',compact('templates','academic_years','classes','shifts','sections','groups','teachers','staffs','committies'));
    }


    public function studentsendsms(Request $request)
    {
        $student_ids = $request->check;
        $template = SmsTemplates::where('id',$request->template_id)->first();

        if($request->template_id && $request->sms_content){
            foreach ($student_ids as $key => $id) {
                $student = Student::find($id);

                if (Helper::sd_send_sms_api('88'.$student->mobile_number, $request->sms_content)) {
                    // -----------------------------------------------
                    // Student SMS History
                    // -----------------------------------------------
                    $student->smshistory()->create([
                        'title'         => $template->title,
                        'description'   => $request->sms_content,
                    ]);

                    //notification
                    $notification = array(
                        'message' =>'SMS Send Successfully',
                        'alert-type' =>'success'
                    );

                } else {
                    //notification
                    $notification = array(
                        'message' =>'Not Enough SMS',
                        'alert-type' =>'error'
                    );
                }
            }
        }else{
            //notification
            $notification = array(
                'message' =>'Please Select SMS Template',
                'alert-type' =>'error'
            );
        }

        return redirect()->back()->with($notification);
    }


    public function teachersendsms(Request $request)
    {

        $teacher_ids = $request->check;
        $template = SmsTemplates::where('id',$request->template_id)->first();

        if($request->template_id && $request->sms_content){
            foreach ($teacher_ids as $key => $id) {
                $teacher = Teacher::find($id);

                if (Helper::sd_send_sms_api('88'.$teacher->mobile_number, $request->sms_content)) {
                    // -----------------------------------------------
                    // teacher SMS History
                    // -----------------------------------------------
                    $teacher->smshistory()->create([
                        'title'         => $template->title,
                        'description'   => $request->sms_content,
                    ]);

                    //notification
                    $notification = array(
                        'message' =>'SMS Send Successfully',
                        'alert-type' =>'success'
                    );

                } else {
                    //notification
                    $notification = array(
                        'message' =>'Not Enough SMS',
                        'alert-type' =>'error'
                    );
                }
            }
        }else{
             //notification
             $notification = array(
                'message' =>'Please Select SMS Template',
                'alert-type' =>'error'
            );
        }
        return redirect()->back()->with($notification);
    }



    public function staffsendsms(Request $request)
    {
        $staff_ids = $request->check;
        $template = SmsTemplates::where('id',$request->template_id)->first();

        if($request->template_id && $request->sms_content){
            foreach ($staff_ids as $key => $id){

                $staff = Teacher::find($id);

                if (Helper::sd_send_sms_api('88'.$staff->mobile_number, $request->sms_content)) {

                    // -----------------------------------------------
                    // staff SMS History
                    // -----------------------------------------------
                    $staff->smshistory()->create([
                        'title'         => $template->title,
                        'description'   => $request->sms_content,
                    ]);

                    //notification
                    $notification = array(
                        'message' =>'SMS Send Successfully',
                        'alert-type' =>'success'
                    );

                } else {
                    //notification
                    $notification = array(
                        'message' =>'Not Enough SMS',
                        'alert-type' =>'error'
                    );
                }
            }
        }else{
            //notification
            $notification = array(
                'message' =>'Please Select SMS Template',
                'alert-type' =>'error'
            );
        }
        return redirect()->back()->with($notification);
    }



    public function comitteesendsms(Request $request)
    {

        $committee_ids = $request->check;
        $template = SmsTemplates::where('id',$request->template_id)->first();

        if($request->template_id && $request->sms_content){
            foreach ($committee_ids as $key => $id){

                $committee = Teacher::find($id);

                if (Helper::sd_send_sms_api('88'.$committee->mobile_number, $request->sms_content)) {

                    // -----------------------------------------------
                    // staff SMS History
                    // -----------------------------------------------
                    $committee->smshistory()->create([
                        'title'         => $template->title,
                        'description'   => $request->sms_content,
                    ]);

                    //notification
                    $notification = array(
                        'message' =>'SMS Send Successfully',
                        'alert-type' =>'success'
                    );

                } else {
                    //notification
                    $notification = array(
                        'message' =>'Not Enough SMS',
                        'alert-type' =>'error'
                    );
                }
            }
        }else{
            //notification
            $notification = array(
                'message' =>'Please Select SMS Template',
                'alert-type' =>'error'
            );
        }
        return redirect()->back()->with($notification);
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
}
