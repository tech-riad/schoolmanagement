<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\Session as StdSession;
use App\Models\StudentSubjectAssign;
use App\Models\SubjectType;
use Illuminate\Http\Request;

class StudentSubjectAssignController extends Controller
{
    public  function  index(){
        $academic_years  = StdSession::all();
        $subjectTypes    = SubjectType::where('is_common',0)->get();
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;

        return view($backendTemplate.'.student.subject-assign.index',compact('academic_years','subjectTypes'));
    }

    public  function  create(){
        $academic_years  = StdSession::all();
        $subjectTypes    = SubjectType::where('is_common',0)->get();
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.student.subject-assign.create',compact('academic_years','subjectTypes'));
    }

    public function store(Request $request){

        $data =  $request->all();

        $resultArray = array_filter($data, function($key) {
            return strpos($key, 'class_subject_id-') === 0;
        }, ARRAY_FILTER_USE_KEY);

        $studentIds = [];
        foreach ($resultArray as $key => $array){
            array_push($studentIds,trim($key,'class_subject_id-'));
        }

        foreach ($studentIds as $studentId){

            StudentSubjectAssign::where('student_id',$studentId)->delete();
            $req = 'class_subject_id-'.$studentId;

            foreach ($request->$req as $classSubjectId){
                $classSubject = ClassSubject::find($classSubjectId);
                StudentSubjectAssign::create([
                    'student_id'        =>   $studentId,
                    'class_subject_id'  =>   $classSubjectId,
                    'subject_type_id'   =>   $classSubject->subject_type_id
                ]);
            }
        }

        //notification
        $notification = array(
            'message' =>'Data Save Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
