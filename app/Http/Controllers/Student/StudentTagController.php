<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class StudentTagController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.tag.index', compact('academic_years', 'sections'));
    }

    public function view($id)
    {
        $student = Student::find($id);

        return view($this->backendTemplate['template']['path_name'].'.academic.tag.view', compact('student'));
    }


    public function downloadCard($id){

        $student = Student::find($id);

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.tag.download-pdf', compact('student'))->setOptions(['defaultFont' => 'SolaimanLipi','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4');
        return $pdf->download('student-'.$student->id_no.'-tag.pdf');
    }

    public function Alldownload(Request $request)
    {

        $student_id = $request->student_id;

        $students = Student::whereIn('id', $student_id)->get();
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.tag.download-pdf', compact('students'))->setOptions(['defaultFont' => 'SolaimanLipi','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4');
        return $pdf->download('student-'.'123'.'-tag.pdf');
    }
}
