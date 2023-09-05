<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\StudentTimesetting;
use Illuminate\Http\Request;

class StudentTimeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = StudentTimesetting::orderBy('id','ASC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.student.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = InsClass::all();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.student.create',compact('classes'));
    }


    public function getClasses(Request $request)
    {
        return InsClass::whereIn('id',$request->ins_class_id)->get();
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        foreach ($request->check as $key => $value){
            $classes = StudentTimesetting::where('ins_class_id',$request->ins_class_id[$value])->first();
            if($classes){ $classes->delete();}

            StudentTimesetting::create([
                'ins_class_id'  => $request->ins_class_id[$value],
                'in_time'       => $request->in_time[$value],
                'out_time'      => $request->out_time[$value],
                'max_delay_time'=> $request->max_delay_time[$value],
                'max_early_time'=> $request->max_early_time[$value],
            ]);
        }

        //notification
        $notification = array(
            'message' =>'Added Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->route('attendance.studenttime.index')->with($notification);
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
        StudentTimesetting::find($id)->delete();
        //notification
        $notification = array(
            'message' =>'Deleted Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->back()->with($notification);
    }
}
