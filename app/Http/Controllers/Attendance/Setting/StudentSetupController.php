<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['academic_years'] = Session::all();
        $data['classes']        = InsClass::all();
        $data['shifts']         = Shift::all();
        $data['sections']       = Section::all();
        $data['groups']         = Group::all();
        $data['categories']     = Category::all();
        $data['genders']        = Gender::all();
        $data['religions']      = Religion::all();
        
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.studentsetup.index')->with($data);
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
        foreach ($request->check as $key => $v) {
            $student = Student::find($v);

            if($request->finger_id[$v] != ''){

                $student->update([
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
            'message' =>'Student Finger ID Set Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

}
