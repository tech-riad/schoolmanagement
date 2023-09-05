<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AcademicSetting;
use App\Models\AssignTeacher;
use App\Models\Exam;
use App\Models\ExamRoutine;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdmitCardController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        $exams          = Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.admit-card.index', compact('academic_years', 'sections', 'exams'));
    }


    public function view($id, $exam_id, $session)
    {
        
        $student    = Student::find($id);
        $class_id   = $student->ins_class->id;
       // return $class_id;
        $exam       = Exam::find($exam_id);
        $session    = Session::find($session);
        $template   = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();


        $routine = new ExamRoutine();
        $routine = $routine->with('subjects')->where('ins_class_id', $class_id);
        $routine = $routine->where('session_id', $session->id);
        $routine = $routine->where('exam_id', $exam->id);
        $routine = $routine->first();

        $assign_teacher = AssignTeacher::where('class_id',$class_id)->first();

        if(isset($assign_teacher)){
            $assign_teacher_signature = $assign_teacher->teacher->signature_image;
        }else{
            $assign_teacher_signature = '';
        }
        
        return view($this->backendTemplate['template']['path_name'].'.academic.admit-card.view', compact('student', 'exam', 'session', 'routine','template','assign_teacher_signature'));
    }


    public function downloadCard($id, $exam_id, $session)
    {

        $student    = Student::find($id);
        $class_id   = $student->ins_class->id;
        $exam       = Exam::find($exam_id);
        $session    = Session::find($session);
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();

        $routine = new ExamRoutine();
        $routine = $routine->with('subjects')->where('ins_class_id', $class_id);
        $routine = $routine->where('session_id', $session->id);
        $routine = $routine->where('exam_id', $exam->id);
        $routine = $routine->first();

        if(isset($assign_teacher)){
            $assign_teacher_signature = $assign_teacher->teacher->signature_image;
        }else{
            $assign_teacher_signature = '';
        }
        
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.admit-card.download-pdf', compact('student', 'exam', 'session', 'routine','template','assign_teacher_signature'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('a4');
        return $pdf->download('student-' . $student->count() . '-admit-card.pdf');
    }


    public function allDownload(Request $request)
    {
        $student_id = $request->student_id;
        $exam_id    = $request->exam_id;
        $class_id   = $request->class_id;

        $students   = Student::whereIn('id', $student_id)->get();
        $exam       = Exam::find($exam_id);
        $session    = Session::find($request->session_id);
        $template   = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();

        $routine = new ExamRoutine();
        $routine = $routine->with('subjects')->where('ins_class_id', $class_id);
        $routine = $routine->where('session_id', $session->id);
        $routine = $routine->where('exam_id', $exam->id);
        $routine = $routine->first();

        if(isset($assign_teacher)){
            $assign_teacher_signature = $assign_teacher->teacher->signature_image;
        }else{
            $assign_teacher_signature = '';
        }
        
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.admit-card.download-pdf', compact('students', 'exam', 'session', 'routine','template','assign_teacher_signature'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('A4');
        return $pdf->download('student-' . $students->count() . '-admit-card.pdf');
    }
}
