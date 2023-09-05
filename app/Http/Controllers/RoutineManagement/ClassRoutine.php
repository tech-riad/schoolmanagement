<?php

namespace App\Http\Controllers\RoutineManagement;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\PeriodTime;
use App\Models\Section;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\ClassRoutine as Routine;
use App\Models\ClassRoutine as ModelsClassRoutine;
use Illuminate\Http\Request;

class ClassRoutine extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections  = Section::where('institute_id',Helper::getInstituteId())->get();
        $groups    = Group::all();
        $subjects  = Subject::all();
        $periods   = PeriodTime::all();
        $teachers  = Teacher::all();

        $days    =  ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thusday'];

        // dd($routines);

        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.classroutine.index', compact('days', 'sections', 'groups', 'subjects', 'periods', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections  = Section::where('institute_id',Helper::getInstituteId())->get();
        $groups    = Group::all();
        $subjects  = Subject::all();
        $periods   = PeriodTime::all();
        $teachers  = Teacher::all();
        $days    =  ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thusday'];
        return view($this->backendTemplate['template']['path_name'].'.routinemanagement.classroutine.create', compact('days', 'sections', 'groups', 'subjects', 'periods', 'teachers'));
    }

    public function getSubjects(Request $request)
    {
        //  return $request->all();
        $class = InsClass::with('subjects')->find($request->class_id)->toArray();
        return $class;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Section::find($request->section_id);
        $classId = $section->ins_class_id;
        $shiftId = $section->shift_id;

        $data = $request->all();

        $array = 0;

        foreach($data['day'] as $k => $day){

            foreach($data['period_id'] as $key =>  $period){

                $subjectId = "subject_id_".$k."_".$key;
                $teacherId = "teacher_id_".$k."_".$key;
                Routine::create([
                    'class_id'       => $classId,
                    'section_id'     => $request->section_id,
                    'shift_id'       => $shiftId,
                    'group_id'       => $request->group_id,
                    'day'            => $request->day[$k],
                    'subject_id'     => $request->$subjectId[0],
                    'period_time_id' => $period[0],
                    'teacher_id'     => $request->$teacherId[0],
                ]);


            }
        }
        // //notification
        $notification = array(
            'message' => 'Routine Store Successfully ',
            'alert-type' => 'success'
        );
        return back()->with($notification);
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

    public function getRoutine(Request $request){

        $section = Section::find($request->section_id);
        $classId = $section->ins_class_id;
        $shiftId = $section->shift_id;

        $data['periods'] = PeriodTime::where('shift_id',$shiftId)->get()->toArray();


        $routines = Routine::with('subject','teacher')->where('section_id',$request->section_id)
                            ->where('class_id',$classId)
                            ->where('shift_id',$shiftId)
                            ->get()->groupBy('day');


        $data['day'] = [];
        foreach($routines as $key => $routine){

            foreach($data['periods'] as $k => $period){
                $data['day'][$key][] = $routine[$k]['subject']['sub_name'] ?? null;
            }

        }



        return $data;
    }
}
