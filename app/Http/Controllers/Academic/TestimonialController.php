<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AcademicSetting;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ViewErrorBag;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TestimonialController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.testimonial.index', compact('academic_years', 'sections'));
    }

    public function view($id)
    {
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
        $student = Student::find($id);
        return view($this->backendTemplate['template']['path_name'].'.academic.testimonial.view', compact('student','template'));
    }


    public function downloadCard($id){

        $student = Student::find($id);
        
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.testimonial.download-pdf', compact('student','template'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4','landscape');
        return $pdf->download('student-'.$student->id_no.'-testimonial.pdf');
    }

    public function allDownload(Request $request)
    {
        $student_id = $request->student_id;
        $students   = Student::whereIn('id', $student_id)->get();
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.testimonial.download-pdf', compact('students','template'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4','landscape');
        return $pdf->download('student-'.'123'.'-testimonial.pdf');
    }
}
