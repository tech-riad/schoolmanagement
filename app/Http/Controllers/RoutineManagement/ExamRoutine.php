<?php

namespace App\Http\Controllers\RoutineManagement;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamRoutine as ModelsExamRoutine;
use App\Models\ExamRoutineInstruction;
use App\Models\ExamRoutineSubject;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Session;
use Illuminate\Http\Request;

class ExamRoutine extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routines = ModelsExamRoutine::with('subjects')->get();
        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.examroutine.index',compact('routines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academic_years = Session::all();
        $classes        = InsClass::all();
        $exams          = Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.examroutine.create',compact('academic_years','classes','exams'));
    }


    public function getGroup($id)
    {
        $groups = Group::where('ins_class_id',$id)->get();
        return response()->json($groups);
    }

    public function getSubjects(Request $request)
    {
        $data = $request->all();
        $class = InsClass::with('subjects')->find($request->class_id)->toArray();
        return response()->json($class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $data = $request->all();

        $exam = new ModelsExamRoutine();
        $exam->ins_class_id = $data['class_id'];
        $exam->session_id   = $data['session_id'];
        $exam->exam_id      = $data['exam_id'];
        $exam->start_date   = $data['st_date'];
        $exam->end_date     = $data['ed_date'];
        $exam->instruction  = $data['instruction'];
        $exam->save();

        foreach ($data['subject_id'] as $key => $value) {
            $sub = new ExamRoutineSubject();
            $sub->exam_routine_id = $exam->id;
            $sub->date = $data['date'][$key];
            $sub->subject_id = $data['subject_id'][$key];
            $sub->room = $data['room'][$key];
            $sub->start_time = $data['start_time'][$key];
            $sub->end_time = $data['end_time'][$key];
            $sub->save();
        }

        return redirect()->route('examroutine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $routine =  ModelsExamRoutine::find($id);
        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.examroutine.view',compact('routine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routine =  ModelsExamRoutine::find($id);
        $academic_years = Session::all();
        $classes        = InsClass::all();
        $exams          = Exam::all();
        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.examroutine.edit',compact('routine','academic_years','classes','exams'));
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
        $data = $request->all();

        $exam = ModelsExamRoutine::find($id);
        $exam->ins_class_id = $data['class_id'];
        $exam->session_id   = $data['academic_year_id'];
        $exam->exam_id      = $data['exam_id'];
        $exam->start_date   = $data['st_date'];
        $exam->end_date     = $data['ed_date'];
        $exam->instruction  = $data['instruction'];
        $exam->save();

        $subject =  ExamRoutineSubject::where('exam_routine_id',$exam->id)->delete();

        foreach ($data['subject_id'] as $key => $value) {
            $sub = new ExamRoutineSubject();
            $sub->exam_routine_id = $exam->id;
            $sub->date = $data['date'][$key];
            $sub->subject_id = $data['subject_id'][$key];
            $sub->room = $data['room'][$key];
            $sub->start_time = $data['start_time'][$key];
            $sub->end_time = $data['end_time'][$key];
            $sub->save();
        }

        return redirect()->route('examroutine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = ModelsExamRoutine::find($id);
        $ins =  ExamRoutineInstruction::where('exam_routine_id',$id);
        $sub =  ExamRoutineSubject::where('exam_routine_id',$id);
        // $ins->delete();
        // $sub->delete();
        $routine->delete();

        return redirect()->route('examroutine.index');
    }
}
