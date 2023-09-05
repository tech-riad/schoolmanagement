<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class SeatPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_years = Session::all();
        $sections       = Section::all();
        $exams          = Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.seat-plan.index',compact('academic_years','sections','exams'));
    }


    public function view($id,$exam_id)
    {
        $student = Student::find($id);
        $exam    = Exam::find($exam_id);
        return view($this->backendTemplate['template']['path_name'].'.academic.seat-plan.view', compact('student','exam'));
    }


    public function allView(Request $request)
    {
        $student_id = $request->student_id;
        $exam_id = $request->exam_id;

        $student_ids = Student::whereIn('id', $student_id)->get();
        $exam        = Exam::find($exam_id);
        return view($this->backendTemplate['template']['path_name'].'.academic.seat-plan.view', compact('student_ids','exam'));
    }

    public function downloadCard($id,$exam_id){

        $student = Student::find($id);
        $exam    = Exam::find($exam_id);

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.seat-plan.download-pdf', compact('student','exam'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4');
        return $pdf->download('seat-plan-'.$student->id_no.'-download-pdf.pdf');
    }


    public function Alldownload(Request $request)
    {
        $student_id  = $request->student_id;
        $exam_id     = $request->exam_id;
        $students    = Student::whereIn('id', $student_id)->get();
        $exam        = Exam::find($exam_id);

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.seat-plan.download-pdf', compact('students','exam'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4');
        return $pdf->download('seat-plan-'.'123'.'-download-pdf.pdf');
        // return view('academic.seat-plan.download-pdf', compact('students','exam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
