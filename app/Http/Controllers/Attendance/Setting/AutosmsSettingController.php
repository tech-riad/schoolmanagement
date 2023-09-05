<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AbsentsmsSetting;
use App\Models\DelaysmsSetting;
use App\Models\EarlysmsSetting;
use App\Models\PresentsmsSetting;
use App\Models\StudentAbsentsmsSetting;
use App\Models\StudentDelaysmsSetting;
use App\Models\StudentEarlysmsSetting;
use App\Models\StudentLeavesmsSetting;
use App\Models\StudentPresentsmsSetting;
use App\Models\TeacherLeavesmsSetting;
use Illuminate\Http\Request;

class AutosmsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
    
        $data['presentSMS']         = PresentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['studentpresentSMS']  = StudentPresentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['absentSMS']          = AbsentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['studentabsentSMS']   = StudentAbsentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['delaySMS']           = DelaysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['studentdelaySMS']    = StudentDelaysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['earlySMS']           = EarlysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['studentearlySMS']    = StudentEarlysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['stuLeavesms']        = StudentLeavesmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        $data['teacherLeavesms']    = TeacherLeavesmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.autosmssetting.index')->with($data);
    }

    

    public function presentSMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = PresentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $delaySMS = PresentsmsSetting::updateOrcreate([
            'title'     => 'Teache Present SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $delaySMS,
            'status' => 200,
            'message' => 'Teacher Present SMS Updated Successfully'
        ]);

    }

    

    public function studentpresentSMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = StudentPresentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $delaySMS = StudentPresentsmsSetting::updateOrcreate([
            'title'     => 'Student Present SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $delaySMS,
            'status' => 200,
            'message' => 'Student Present SMS Updated Successfully'
        ]);

    }


    public function absentSMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = AbsentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $delaySMS = AbsentsmsSetting::updateOrcreate([
            'title'     => 'Teache Absent SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $delaySMS,
            'status' => 200,
            'message' => 'Teacher Absent SMS Updated Successfully'
        ]);

    }


    public function studentabsentSMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = StudentAbsentsmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $delaySMS = StudentAbsentsmsSetting::updateOrcreate([
            'title'     => 'Student Absent SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $delaySMS,
            'status' => 200,
            'message' => 'Student Absent SMS Updated Successfully'
        ]);

    }


    public function delaySMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = DelaysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $delaySMS = DelaysmsSetting::updateOrcreate([
            'title'     => 'Teache Delay SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $delaySMS,
            'status' => 200,
            'message' => 'Teacher Delay SMS Updated Successfully'
        ]);

    }


    public function studentdelaySMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = StudentDelaysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $studentdelaySMS = StudentDelaysmsSetting::updateOrcreate([
            'title'     => 'Student Delay SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $studentdelaySMS,
            'status' => 200,
            'message' => 'Student Delay SMS Updated Successfully'
        ]);

    }

    public function earlySMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = EarlysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $earlysms = EarlysmsSetting::updateOrcreate([
            'title'     => 'Early SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $earlysms,
            'status' => 200,
            'message' => 'Teacher Early SMS Updated Successfully'
        ]);
    }


    public function studentearlySMS(Request $request)
    {
        $request->validate([
            'content'   => 'required',
        ]);

      $sms = StudentEarlysmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

      if($sms){ $sms->delete();}

       $earlysms = StudentEarlysmsSetting::updateOrcreate([
            'title'     => 'Early SMS',
            'content'   => $request->content,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $earlysms,
            'status' => 200,
            'message' => 'Student Early SMS Updated Successfully'
        ]);
    }


    public function studentLeaveSms(Request $request)
    {
        $request->validate([
            'number'   => 'required|min:11|max:11',
        ]);

        $sms = StudentLeavesmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

       if($sms){ $sms->delete();}

       $studentLeavesms = StudentLeavesmsSetting::updateOrcreate([
            'title'     => 'Student Leave SMS',
            'content'   => $request->content,
            'number'    => $request->number,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $studentLeavesms,
            'status' => 200,
            'message' => 'Student Leave SMS Updated Successfully'
        ]);
    }


    public function teacherLeaveSms(Request $request)
    {
        $request->validate([
            'number'   => 'required|min:11|max:11',
        ]);

        $sms = TeacherLeavesmsSetting::where('institute_id',Helper::getInstituteId())->orderBy('id','DESC')->first();

       if($sms){ $sms->delete();}

       $teacherLeavesms = TeacherLeavesmsSetting::updateOrcreate([
            'title'     => 'Teacher Leave SMS',
            'content'   => $request->content,
            'number'    => $request->number,
            'status'    => $request->status == 1 ?? 0,
        ]);

        return response()->json([
            'data' => $teacherLeavesms,
            'status' => 200,
            'message' => 'Teacher Leave SMS Updated Successfully'
        ]);
    }



    public function resetTemplate($type)
    {
        if($type == 'teacher-present'){
            PresentsmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Teacher :Name (:Designation)  Present at  :Time (:Status minutes) , Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Teacher Present Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        

        if($type == 'student-present'){
            StudentPresentsmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Student :Name Present at  :Time (:Status minutes) , Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Student Present Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            
            return redirect()->back()->with($notification);
        }


        if($type == 'student-absent'){
            StudentAbsentsmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Parent, Your Child :Name is Absent Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Student Absent Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }


        if($type == 'teacher-absent'){
            AbsentsmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Teacher :Name (:Designation), You are Absent Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Teacher Absent Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        if($type == 'teacher-delay'){
            DelaysmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Teacher :Name (:Designation)  Present at  :Time (Delay : :Delay minutes) , Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Teacher Delay Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
        
        if($type == 'student-delay'){
            StudentDelaysmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Parent, Your Child (:Name) Reached Our School at :Time  (Delay : :Delay minutes), Date : :Date EDTECO School'
            ]);

            //notification
            $notification = array(
                'message' =>'Student Delay Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        if($type == 'teacher-early'){
            EarlysmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Teacher :Name (:Designation)  Present at  :Time (Early: :Early minutes) , Date : :Date Institute.  Edteco School & College.'
            ]);

            //notification
            $notification = array(
                'message' =>'Teacher Early Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        if($type == 'student-early'){
            StudentEarlysmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Parent, Your Child (:Name) Reached Our School at :Time  (Early: :Early minutes), Date : :Date EDTECO School'
            ]);

            //notification
            $notification = array(
                'message' =>'Student Early Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        if($type == 'student-leave'){
            StudentLeavesmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Parent, Your Child (:Name) Reached Our School at :Time  (Early: :Early minutes), Date : :Date EDTECO School'
            ]);

            //notification
            $notification = array(
                'message' =>'Student Leave Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }

        if($type == 'teacher-leave'){
            TeacherLeavesmsSetting::orderBy('id','DESC')->update([
                'content'   => 'Dear Parent, Your Child (:Name) Reached Our School at :Time  (Early: :Early minutes), Date : :Date EDTECO School'
            ]);

            //notification
            $notification = array(
                'message' =>'Teacher Leave Sms Template Reset Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);
        }
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
