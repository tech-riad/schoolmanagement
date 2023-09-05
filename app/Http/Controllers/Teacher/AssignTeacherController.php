<?php


namespace App\Http\Controllers\Teacher;


use App\Http\Controllers\Controller;

use App\Helper\Helper;
use App\Models\{AssignTeacher, AssignTeacherSbuject, AssignTeacherSubject, Category, Group, Session, InsClass, Section, Subject, Teacher};
use Illuminate\Http\Request;
use DB;

class AssignTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign_teacher = AssignTeacher::with(['teacher', 'ins_class', 'shift', 'section'])->latest()->get();

        $teachers = Teacher::where('type', 'teacher')->get();

        $sections  = Section::where('institute_id', Helper::getInstituteId())->get();

        return view($this->backendTemplate['template']['path_name'].'.teachers.teacher.assign_teacher', [
            'sections' => $sections,
            'teachers' => $teachers,
            'assign_teacher' => $assign_teacher,
        ]);
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
        $data['teacher_id'] = $request->teacher_id;
        $data['section_id'] = $request->section_id;
        $section = Section::find($data['section_id']);

        $data['class_id']   = $section->ins_class_id;
        $data['shift_id']   = $section->shift_id;

        $exists = AssignTeacher::where('teacher_id', $data['teacher_id'])->orWhere('section_id', $data['section_id'])->get();

        if ($exists->count() > 0) {

            $notification = array(
                'message' => 'Teacher Already Assigned',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        } else {
            AssignTeacher::create($data);
        }

        //notification
        $notification = array(
            'message' => 'Teacher Assigned',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignTeacher  $assignTeacher
     * @return \Illuminate\Http\Response
     */
    public function show(AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignTeacher  $assignTeacher
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignTeacher  $assignTeacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignTeacher $assignTeacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignTeacher  $assignTeacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignTeacher $assignTeacher)
    {
        //
    }


    public function subject()
    {
        $teachers   = Teacher::where('type', 'teacher')->get();
        $sessions   = Session::all();
        $sections  = Section::where('institute_id', Helper::getInstituteId())->get();
        $assign_teachers = Teacher::with('subjects', 'sections')->where('type', 'teacher')->get();
        return view($this->backendTemplate['template']['path_name'].'.teachers.teacher.assign_subject', compact('assign_teachers', 'sessions', 'teachers', 'sections', 'sections'));
    }

    public function subjectStore(Request $request)
    {
        $request->validate([
            'subject_id' => 'required'
        ]);

        $data = $request->all();
        $data['section_id'] = $request->section_id;

        $section = Section::find($data['section_id']);
        $data['class_id']   = $section->ins_class_id;
        $data['shift_id']   = $section->shift_id;

        AssignTeacherSubject::where('teacher_id', $data['teacher_id'])->where('section_id', $data['section_id'])->delete();
        foreach ($request->subject_id as $key => $value) {

            $assign_teacher_subject                     = new AssignTeacherSubject();
            $assign_teacher_subject->teacher_id         = $request->teacher_id;
            $assign_teacher_subject->session_id         = $data['session_id'];
            $assign_teacher_subject->category_id        = $data['category_id'];
            $assign_teacher_subject->section_id         = $section->id;
            $assign_teacher_subject->subject_id         = $value;
            $assign_teacher_subject->save();
        }
        $notification = array(
            'message' => 'Successfull ',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function getSections(Request $request)
    {
        $assign_teachers = AssignTeacher::with('ins_class', 'shift', 'section')
            ->where('teacher_id', $request->teacher_id)
            ->get();
        return $assign_teachers;
    }

    public function getSubjects(Request $request)
    {
        $section = Section::find($request->section_id);
        $class   = InsClass::find($section->ins_class_id);
        $data['subjects'] = $class->subjects;
        $data['categories'] = Category::where('ins_class_id', $section->ins_class_id)->where('shift_id', $section->shift_id)->get();
        $data['groups'] = Group::where('ins_class_id', $section->ins_class_id)->where('shift_id', $section->shift_id)->get();
        return $data;
    }
}
