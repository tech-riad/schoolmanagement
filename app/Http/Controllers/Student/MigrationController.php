<?php

namespace App\Http\Controllers\Student;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentArchive;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $classes = InsClass::all();
        return view($this->backendTemplate['template']['path_name'].'.student.migration.index',compact('academic_years','classes'));
    }


    public function store(Request $request){


        foreach($request->check as $val){

            $student  = Student::find($request->student_id[$val])->toArray();
            $student['type'] = 'migration';
            $archive  = StudentArchive::create($student);

            if($archive){

                $student['id_no'] = Helper::studentIdGenerate($request->academic_year_id2,$request->class_id2);

                $student['session_id']  = $request->academic_year_id2;
                $student['class_id']    = $request->class_id2;
                $student['shift_id']    = $request->shift_id2;
                $student['category_id'] = $request->category_id2;
                $student['section_id']  = $request->section_id2;
                $student['group_id']    = $request->group_id2;

                $student = Student::create($student);

                if($student){
                    Student::find($request->student_id[$val])->delete();
                }
            }
        }

        //notification
        $notification = array(
            'message' =>'Student Migrate Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);

    }
}
