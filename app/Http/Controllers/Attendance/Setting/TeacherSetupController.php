<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.teachersetup.index');
    }


    public function getTeacherByType($type)
    {   
        $data = [];
        $data['type'] = $type;
        $data['teachers'] = Teacher::where('type',$type)->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all()) ;
        foreach ($request->check as $key => $v) {
            $teacher = Teacher::find($v);

            if($request->finger_id[$v] != ''){

                $teacher->update([
                    'finger_id' => $request->finger_id[$v],
                ]);

            }else{
                //notification
                $notification = array(
                    'message' =>'Please Enter Finger ID',
                    'alert-type' =>'error'
                );

                return redirect()->back()->with($notification);
            }
            
        }

        //notification
        $notification = array(
            'message' =>'Teacher Finger ID Update Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
