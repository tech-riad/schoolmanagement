<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\AcademicSetting;
use App\Models\Exam;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\TransferCertificate;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransferCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t_students = TransferCertificate::latest()->get();
        return view($this->backendTemplate['template']['path_name'].'.academic.transfer-certificate.list',compact('t_students'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        $exams          = Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.transfer-certificate.index',compact('academic_years','sections','exams'));
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
        $check_student_id   = $request->check;
        $students = Student::whereIn('id',$check_student_id)->get();

        foreach ($students as $key => $student) {
            $t = new TransferCertificate();
            $t->session = $student->session->title;
            $t->class   = $student->ins_class->name;
            $t->shift = $student->shift->name??'';
            $t->group = $student->group->name;
            $t->dob = $student->dob;
            $t->religion = $student->religion;
            $t->mobile_number = $student->mobile_number;
            $t->father_name = $student->father_name;
            $t->mother_name = $student->mother_name;
            $t->email = $student->email;
            $t->roll_no = $student->roll_no;
            $t->name = $student->name;
            $t->photo = $student->photo;
            $t->gender = $student->gender;
            $t->blood_group = $student->blood_group;
            $t->save();

            $student->delete();
        }

        return redirect()->route('academic.transfer-certificate.index');
    }


    public function view($id)
    {
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
        $student = TransferCertificate::find($id);
        return view($this->backendTemplate['template']['path_name'].'.academic.transfer-certificate.view',compact('student','template'));
    }


    public function downloadPdf($id)
    {
        $student = TransferCertificate::find($id);
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.transfer-certificate.download-pdf', compact('student','template'))->setOptions(['defaultFont' => 'Nikosh','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4','landscape');
        return $pdf->download('student-'.$student->id.'-transfer-certificate.pdf');
    }


    public function Alldownload(Request $request)
    {
        $student_id = $request->student_id;
        $students = Student::whereIn('id', $student_id)->get();
        $template = AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.transfer-certificate.download-pdf', compact('students','template'))->setOptions(['defaultFont' => 'Nikosh','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4','landscape');
        return $pdf->download('student-'.'123'.'-transfer-certificate.pdf');
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
        //
    }
}
