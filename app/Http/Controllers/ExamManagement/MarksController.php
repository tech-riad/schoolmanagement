<?php

namespace App\Http\Controllers\ExamManagement;

use App\Exports\MarksInputExport;
use App\Http\Controllers\Controller;
use App\Models\ClassSubject;
use App\Models\InsClass;
use App\Models\Session;
use App\Models\Exam;
use App\Models\Student;
use App\Models\StudentMarksInput;
use App\Models\StudentMarksInputDetail;
use App\Models\StudentSubjectAssign;
use App\Models\Subject;
use App\Models\SubMarksDist;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class MarksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.marks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $academic_years = Session::all();
        $exams=Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.marks.create',compact('academic_years'),compact('exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marks = StudentMarksInput::with('details')->where('class_id',$request->class_id)->where('subject_id',$request->subject_id)->get();
        //delete marks
        if($marks){
            foreach ($marks as $mark){
                if($mark->details){
                    foreach ($mark->details as $detail){
                        $detail->delete();
                    }
                }
                $mark->delete();
            }
        }


        $marksInput = StudentMarksInput::create([
            'class_id'   => $request->class_id,
            'subject_id' => $request->subject_id
        ]);

        foreach ($request->student_id as $studentId){

            $req            = "mark_dist_detail-".$studentId;
            $markDistDetail = "mark_dist_details_id-".$studentId;

            foreach ($request->$req as $key =>  $marks){
                StudentMarksInputDetail::create([
                   'student_id'                => $studentId,
                   'student_marks_input_id'    => $marksInput->id,
                   'sub_marks_dist_details_id' => $request->$markDistDetail[$key],
                   'marks' => $marks ?? 0,

                ]);
            }

        }
        //notification
        $notification = array(
            'message' =>'Marks Input Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);

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

    public function getSubjects(Request $request){
        $classSubjects = ClassSubject::with('subject')
                            ->where('ins_class_id',$request->class_id)
                            ->get()
                            ->map(function ($item) use($request){
                            return [
                                'id'       => $item->subject->id,
                                'sub_name' => $item->subject->sub_name,
                                'status'   => $this->getSubjectStatus($request->class_id,$item->subject->id)
                            ];
                        });
        return $classSubjects;
    }


    public function getSubjectStatus($classId,$subjectId){
        $inputMarks = StudentMarksInput::where('class_id',$classId)->where('subject_id',$subjectId)->first();
        if($inputMarks){
            return "done";
        }
        else{
            return "pending";
        }
    }
    public function getStudents(Request $request){

        $classSubject = ClassSubject::where('ins_class_id',$request->class_id)->where('subject_id',$request->subject_id)->first();
        $subjectAssigns = StudentSubjectAssign::where('class_subject_id',$classSubject->id)->get();

        $studentIds = [];
        if($subjectAssigns->count() > 0){
            foreach($subjectAssigns as $subAssign){
                array_push($studentIds,$subAssign->student_id);
            }
        }
        else{
            $students = Student::where('class_id',$request->class_id)->get();
            foreach ($students as $student){
                array_push($studentIds,$student->id);
            }
        }

        $data['students'] = Student::whereIn('id',$studentIds)->get()->map(function ($item) use($request){
                                return [
                                    'id'      => $item->id,
                                    'name'    => $item->name,
                                    'id_no'   => $item->id_no,
                                    'roll_no' => $item->roll_no,
                                    'mark_dists' => $this->getMarkDistsDetails($request->class_id,$request->subject_id)
                                ];
                            });

        $markDist = SubMarksDist::with('details','details.subMarkDistType')
                    ->where('class_id',$request->class_id)
                    ->where('subject_id',$request->subject_id)
                    ->first();

        if($markDist){
            $data['mark_dists'] = $markDist->details;
        }
        else{
            $data['mark_dists'] = null;
        }

        return $data;
    }

    public function getMarkDistsDetails($classId,$subjectId){
        $markDist = SubMarksDist::with('details','details.subMarkDistType')->where('class_id',$classId)->where('subject_id',$subjectId)->first();

        if($markDist){
            return $markDist->details;
        }
        else{
            return null;
        }
    }

    public function getMarks(Request $request){

        $marksInput = StudentMarksInput::with('details')
                    ->where('class_id',$request->class_id)
                    ->where('subject_id',$request->subject_id)
                    ->first();

        if ($marksInput){
            return response()->json($marksInput->details);
        }
        else{
            return null;
        }
    }


    public function downloadExcel(Request $request){

        $classSubject = ClassSubject::where('ins_class_id',$request->class_id)->where('subject_id',$request->subject_id)->first();
        $subjectAssigns = StudentSubjectAssign::where('class_subject_id',$classSubject->id)->get();

        $studentIds = [];
        if($subjectAssigns->count() > 0){
            foreach($subjectAssigns as $subAssign){
                array_push($studentIds,$subAssign->student_id);
            }
        }
        else{
            $students = Student::where('class_id',$request->class_id)->get();
            foreach ($students as $student){
                array_push($studentIds,$student->id);
            }
        }

        $data['students'] = Student::whereIn('id',$studentIds)->get()->map(function ($item) use($request){
            return [
                'id'      => $item->id,
                'name'    => $item->name,
                'id_no'   => $item->id_no,
                'roll_no' => $item->roll_no
            ];
        });

        $markDist = SubMarksDist::with('details','details.subMarkDistType')
                    ->where('class_id',$request->class_id)
                    ->where('subject_id',$request->subject_id)
                    ->first();

        if($markDist){
            $data['mark_dists'] = $markDist->details;
        }
        else{
            $data['mark_dists'] = null;
        }

        $class   = InsClass::find($request->class_id);
        $subject = Subject::find($request->subject_id);

        return Excel::download(new MarksInputExport($data), $class->name.'-'.$subject->sub_name.'.xlsx');
    }
}
