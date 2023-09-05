<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class NumberSheetController extends Controller
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
        return view($this->backendTemplate['template']['path_name'].'.academic.number-sheet.index', compact('academic_years', 'sections','exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $academic_years = Session::all(); 
    //     $sections       = Section::all();
    //     $exams          = Exam::all();
    //     return view('academic.number-sheet.create', compact('academic_years', 'sections','exams'));
    // }

    public function subjectByClassId($id)
    {
        $subjects = InsClass::with('subjects')->findOrfail($id);
        return $subjects;
    }

    public function downloadCard(Request $request)
    {
        
        $class      = InsClass::find($request->class);
        $exam       = Exam::find($request->exam);
        $session    = $request->session;
        $subject    = $request->subject_name;
        $student = new Student();
        

        if($class){
            $student = $student->where('class_id',$class->id);  
        }
        if($request->category){
            $student = $student->where('category_id',$request->category);
        }
        if($request->section){
            $student = $student->where('section_id',$request->section);
        }
        if($request->group){
            $student = $student->where('group_id',$request->group);
        }
        if($request->shift){
            $student = $student->where('shift_id',$request->shift);
        }
        
        $students = $student->get();

        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.number-sheet.pdf-download', compact('class','students','exam','session','subject'))->setOptions(['defaultFont' => 'Kalpurush','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->setPaper('A4');
        return $pdf->download('student-'.$class.$request->category.'-number-sheet.pdf');
        return view($this->backendTemplate['template']['path_name'].'.academic.number-sheet.pdf-download', compact('class','students','exam','session'));
        
    }


    // public function view()
    // {
    //     return view('academic.number-sheet.view');
    // }

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
