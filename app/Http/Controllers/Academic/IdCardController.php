<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AcademicSetting;
use App\Models\Designation;
use App\Models\InsClass;
use App\Models\Institution;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class IdCardController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.id-card.index', compact('academic_years', 'sections'));
    }


    public function view($id)
    {
        $ins_idcardTheam = Institution::find(Helper::getInstituteId())->first();
        $student = Student::find($id);

        if($ins_idcardTheam->idcard_theam_id == 1){
            return view($this->backendTemplate['template']['path_name'].'.academic.id-card.view1', compact('student'));
        }elseif ($ins_idcardTheam->idcard_theam_id == 2) {
            return view($this->backendTemplate['template']['path_name'].'.academic.id-card.view2', compact('student'));
        }elseif ($ins_idcardTheam->idcard_theam_id == 3) {
            return view($this->backendTemplate['template']['path_name'].'.academic.id-card.view3', compact('student'));
        }
    }


    public function downloadCard($id)
    {
        $student = Student::find($id);
        $ins_idcardTheam = Institution::find(Helper::getInstituteId())->first();

        if($ins_idcardTheam->idcard_theam_id == 1){
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-1', compact('student'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 2) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-2', compact('student'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 3) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-3', compact('student'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }
        $pdf->set_paper('letter', 'portrait');
        return $pdf->download('student-' . $student->id_no . '-id-card.pdf');
    }


    public function allDownload(Request $request)
    {
        $student_id = $request->student_id;
        $students   = Student::whereIn('id', $student_id)->get();
        $ins_idcardTheam = Institution::find(Helper::getInstituteId())->first();

        if($ins_idcardTheam->idcard_theam_id == 1){
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-1', compact('students'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 2) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-2', compact('students'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 3) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-3', compact('students'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }

        $pdf->set_paper('letter', 'portrait');
        return $pdf->download('id-card-front'.'.pdf');
    }

    public function backDownload(Request $request){

        $student_id      = $request->student_id;
        $students        = Student::whereIn('id', $student_id)->get();
        $designation     = Designation::with('teachers')->where('title','Head Teacher')->first();
        $ins_idcardTheam = Institution::find(Helper::getInstituteId())->first();
        $settings        = AcademicSetting::all();

        if($ins_idcardTheam->idcard_theam_id == 1){
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-1',compact('students','designation','settings'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 2) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-2',compact('students','designation','settings'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($ins_idcardTheam->idcard_theam_id == 3) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-3',compact('students','designation','settings'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }
        $pdf->set_paper('letter', 'portrait');

        return $pdf->download('id-card-back'.'.pdf');
    }
}
