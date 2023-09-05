<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\TeacherTimesetting;
use Illuminate\Http\Request;

class TeacherTimeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = TeacherTimesetting::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.teacher.create',compact('teachers'));
    }

    public function getTeachers(Request $request)
    {
        if($request->teachers_id[0] == 'all'){
           return $teachers = Teacher::with('designation')->get();
        }else{
          return $teachers = Teacher::with('designation')->whereIn('id',$request->teachers_id)->get();
        }

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
            'teacher_id'    => 'required',
            'check'         => 'required',
            'in_time'       => 'required',
            'out_time'      => 'required',
            'max_delay_time'=> 'required',
            'max_early_time'=> 'required',
        ]);


        foreach ($request->check as $key => $value) {
          $teacher =  TeacherTimesetting::where('teacher_id',$request->teacher_id[$value])->first();
          if($teacher){ $teacher->delete(); }

            TeacherTimesetting::create([
                'teacher_id'        => $request->teacher_id[$value],
                'in_time'           => $request->in_time[$value],
                'out_time'          => $request->out_time[$value],
                'max_delay_time'    => $request->max_delay_time[$value],
                'max_early_time'    => $request->max_early_time[$value],
            ]);
        }

        //notification
        $notification = array(
            'message' =>'Added Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->route('attendance.teachertime.index')->with($notification);
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
        TeacherTimesetting::find($id)->delete();
        //notification
        $notification = array(
            'message' =>'Deleted Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->back()->with($notification);
    }
}
