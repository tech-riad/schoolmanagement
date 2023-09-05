<?php

namespace App\Http\Controllers\Student;

use App\Exports\ExportStudent;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\Category;
use App\Models\ClassSubject;
use App\Models\District;
use App\Models\Division;
use App\Models\Gender;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Institution;
use App\Models\InstitutionPackage;
use App\Models\MeritStudent;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Session as StdSession;
use App\Models\Shift;
use App\Models\Student;
use App\Models\StudentSubjectAssign;
use App\Models\StudentUser;
use App\Models\SubjectType;
use App\Models\Upazila;
use App\Traits\FileSaver;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function dashboard(){
        $backendTemplate = $this->backendTemplate['template']['path_name'];
        $sessions = \App\Models\Session::all();
        return view($backendTemplate.'.student.dashboard.index',compact('sessions'));
    }

    public function getSectionsBySession(Request $request){
        $session   =  StdSession::with('section')->find($request->session_id);
        $sections  =  $session->section->map(function ($item) {
            return [
                'id'            => $item->id,
                'name'          => $item->name,
                'shift'         => $this->getShiftById($item->shift_id),
                'class'         => $this->getClassById($item->ins_class_id),
                'student_count' => $this->studentCount($item->id)
            ];
        });
        return $sections->chunk(5);

    }

    public function studentCount($sectionId){
        $students = Student::where('section_id',$sectionId)->get();
        return $students->count();
    }
    public function index()
    {
        $academic_years = StdSession::all();
        $sections       = Section::where('institute_id', Helper::getInstituteId())->get();
        $table_number   = 0;
        $gender         = Gender::all();
        $religion       = Religion::all();


        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.student.index', compact('academic_years', 'sections', 'table_number', 'gender', 'religion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\olicy  $olicy
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
     * @param  \App\Models\olicy  $olicy
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $institute      = Institution::with('package')->find(Helper::getInstituteId());
        $studentLimit   = $institute->package->student;

        $student        = Student::get();
        $ourStudent     = $student->count();

        if($ourStudent > $studentLimit){
            //notification
            $notification = array(
                'message' =>'Student Out Of Limit',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }

        if($request->check){

            foreach ($request->check as $key => $val) {

                $data = Admission::find($val);
                $student   = new Student();
                $studentId = Helper::studentIdGenerate($data['session_id'], $data['class_id']);
                // return $studentId;

                $student->id_no         = $studentId;
                $student->session_id    = $data['session_id'];
                $student->class_id      = $data['class_id'];
                $student->shift_id      = $data['shift_id'];
                $student->section_id    = $data['section_id'];
                $student->category_id   = $data['category_id'];
                $student->group_id      = $data['group_id'];
                $student->roll_no       = $data['roll_no'];
                $student->name          = $data['name'];
                $student->gender        = $data['gender'];
                $student->religion      = $data['religion'];
                $student->father_name   = $data['father_name'];
                $student->mother_name   = $data['mother_name'];
                $student->mobile_number = $data['mobile_number'];
                $student->save();

                //create student User
                StudentUser::create([
                    'institute_id' => Helper::getInstituteId(),
                    'student_id'   => $student->id,
                    'id_no'        => $student->id_no,
                    'name'         => $data['name'],
                    'password'     => Hash::make($data['mobile_number'])
                ]);

                //dd($studentId);
                Admission::where('id', $data['id'])->delete();
            }
        }
        else{
            //notification
            $notification = array(
                'message' =>'Student Not Select',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notification);
        }


        return redirect()->route('student.list')->with('success', 'Students added successfully.');
    }


    public function list(Request $request)
    {
        $academic_years  = StdSession::all();
        $sections        = Section::all();

        $counts          = Student::selectRaw("count(*) as count,session_id, institute_id, class_id, shift_id, section_id")
                            ->groupBy('session_id', 'institute_id','class_id','shift_id','section_id')
                            ->with('session','ins_class', 'section','shift')->get();

        $backendTemplate = $this->backendTemplate['template']['path_name'] ;

        return view($backendTemplate.'.student.studentlist', compact('academic_years', 'sections', 'counts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $religions     = Religion::all();
        $genders       = Gender::all();
        $blood_groups  = Helper::blood_groups();
        $student       = Student::findOrfail($id);
        $divisions     = Division::all();
        $districts     = District::all();
        $upazilas      = Upazila::all();

        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.student.profile_update', compact('student', 'religions', 'genders', 'blood_groups','divisions','districts','upazilas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request;
        $student = Student::find($id);

        $data = $request->all();
        if (@$data['photo']){

            $this->uploadFileLinode($data['photo'],$student,'photo','student');

            return response()->json([
                'data' => $student,
                'status' => 200,
                'message' => 'Update Successfully'
            ]);

        }else{
            $student->update([
                'name'                  => $data['name'],
                'email'                 => $data['email'],
                'mobile_number'         => $data['mobile_number'],
                'religion'              => $data['religion'],
                'gender'                => $data['gender'],
                'dob'                   => $data['dob'],
                'blood_group'           => $data['blood_group'],
                'father_name'           => $data['father_name'],
                'father_nid_no'         => $data['father_nid'],
                'father_passport_no'    => $data['father_passport'],
                'father_nationality'    => $data['father_nationality'],
                'father_religion'       => $data['father_religion'],
                'father_profession'     => $data['father_profession'],
                'mother_name'           => $data['mother_name'],
                'mother_nid_no'         => $data['mother_nid'],
                'mother_passport_no'    => $data['mother_passport'],
                'mother_nationality'    => $data['mother_nationality'],
                'mother_religion'       => $data['mother_religion'],
                'mother_profession'     => $data['mother_profession'],
                'guardien_name'         => $data['guardien_name'],
                'guardien_nid_no'       => $data['guardien_nid'],
                'guardien_passport_no'  => $data['guardien_passport'],
                'guardien_nationality'  => $data['guardien_nationality'],
                'guardien_religion'     => $data['guardien_religion'],
                'guardien_profession'   => $data['guardien_profession'],
                'division_id'           => $data['division_id'],
                'district_id'           => $data['district_id'],
                'upazila_id'            => $data['upazila_id'],
            ]);

             //notification
            $notification = array(
                'message' =>'Student Profile Update Successfully ',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notification);


        }
    }


    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        //notification
        $notification = array(
            'message' =>'Student Delete Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function getClasses(Request $request){
        $classes = InsClass::where('session_id',$request->session_id)->get();
        return $classes;
    }


    public function getCategoriesGroups(Request $request){
        $data['categories'] = Category::where('ins_class_id',$request->class_id)->get();
        $data['groups'] = Group::where('ins_class_id',$request->class_id)->get();
        return $data;
    }


    public function getGroups(Request $request){

    }


    public function getShiftbyClass($class_id)
    {
        return Shift::where('ins_class_id', $class_id)->get();
    }

    public function getCatSecGro($class_id, $shift_id)
    {
        // dd('d');
        $data['category'] = Category::where('ins_class_id', $class_id)->where('shift_id', $shift_id)->get();
        $data['section'] = Section::where('ins_class_id', $class_id)->where('shift_id', $shift_id)->get();
        $data['group'] = Group::where('ins_class_id', $class_id)->where('shift_id', $shift_id)->get();
        return $data;
    }


    public function getStudents(Request $request)
    {
        $data = $request->all();


        $query = Admission::with('ins_class');

        if ($data['session_id']) {
            $query->where('session_id', $data['session_id']);
        }

        if ($data['class_id']) {
            $query->where('class_id', $data['class_id']);
        }

        if ($data['shift_id']) {
            $query->where('shift_id', $data['shift_id']);
        }

        if ($data['category_id']) {
            $query->where('category_id', $data['category_id']);
        }

        if ($data['section_id']) {
            $query->where('section_id', $data['section_id']);
        }

        if ($data['group_id']) {
            $query->where('group_id', $data['group_id']);
        }

        $students = $query->get();

        return response()->json($students);
    }


    public function getAdmitedStudents(Request $request)
    {
        $data = $request->all();
        $sessionId = $request->academic_year_id;

        $search = [];
        $classItems = [];

        $query = Student::with('ins_class', 'section','student_user','shift','group','category');

        if ($sessionId) {
            $query->where('session_id', $sessionId);
            $search['session'] = StdSession::find($sessionId)->title;
        }

        if ($data['class_id']) {
            $query->where('class_id', $data['class_id']);
            $search['class'] = InsClass::find($data['class_id'])->name;
        }

        if ($data['shift_id']) {
            $query->where('shift_id', $data['shift_id']);
            $search['shift'] = Shift::find($data['shift_id'])->name;
        }

        if ($data['category_id']) {
            $query->where('category_id', $data['category_id']);
            $search['category'] = Category::find($data['category_id'])->name;
        }

        if ($data['section_id']) {
            $query->where('section_id', $data['section_id']);
            $search['section'] = Section::find($data['section_id'])->name;
        }

        if ($data['group_id']) {
            $query->where('group_id', $data['group_id']);
            $search['group'] = Group::find($data['group_id'])->name;
        }

        // if (isset($request->student_roll)) {
        //     if ($data['student_roll']) {
        //         $query->where('roll_no', $data['student_roll']);
        //     }
        // }


        // get shift section category group by class id
        if ($data['class_id']) {
            $classItems['shiftbyclass'] = Shift::where('ins_class_id',$data['class_id'])->get();
        }

        if ($data['class_id']) {
            $classItems['sectionbyclass'] = Section::with('shift')->where('ins_class_id',$data['class_id'])->get();
        }

        if ($data['class_id']) {
            $classItems['groupbyclass'] = Group::with('shift')->where('ins_class_id',$data['class_id'])->get();
        }

        if ($data['class_id']) {
            $classItems['categorybyclass'] = Category::with('shift')->where('ins_class_id',$data['class_id'])->get();
        }

        // DB::enableQueryLog();
        $meritStudent = MeritStudent::with('student')->get();
        $response['students']       = $query->orderBy('class_id')->orderBy('shift_id')->orderBy('section_id')->orderBy('roll_no')->get();
        $response['search']         = $search;
        $response['searchItems']    = $request->all();
        $response['meritstudent']   = $meritStudent;
        $response['classItems']     = $classItems;
        // dd(DB::getQueryLog());
        session()->put('students', $response['students']);

        return response()->json($response);
    }


    public function exportStudents()
    {
        return Excel::download(new ExportStudent, 'students.xlsx');
    }

    public function exportpdfStudents(Request $request)
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        $students = Student::whereIn('id', $request->student_ids)->orderBy('roll_no', 'asc')->get();
        $class = InsClass::find($request->class_id);

        $pdf = Pdf::loadView($backendTemplate.'.student.student-list-pdf', compact('students','class'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->set_paper('A4', 'portrait');
        return $pdf->download('student-list'.$students->count().'.pdf');
    }

    public function getClassShift(Request $request)
    {
        $section = Section::find($request->section_id);
        $data['class_id'] = $section->ins_class_id;
        $data['shift_id'] = $section->shift_id;

        return response()->json($data);
    }


    public function getSections(Request $request)
    {
        $session   =  StdSession::with('section')->find($request->session_id);
        $sections  =  $session->section->map(function ($item) {
            return [
                'id'    => $item->id,
                'name'  => $item->name,
                'shift' => $this->getShiftById($item->shift_id),
                'class' => $this->getClassById($item->ins_class_id),
            ];
        });
        return $sections;
    }


    public function getShiftById($id)
    {
        $shift = Shift::find($id);
        return $shift->name;
    }

    public function getClassById($id)
    {
        $class = InsClass::find($id);
        return $class->name;
    }


    public function createUser($id){
        $student = Student::find($id);

        StudentUser::create([
            'institute_id' => Helper::getInstituteId(),
            'student_id'   => $student->id,
            'id_no'        => $student->id_no,
            'name'         => $student->name,
            'password'     => Hash::make($student->mobile_number)
        ]);
        //notification
        $notification = array(
            'message' =>'Student User Create Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function getitembyshiftid($id)
    {
        $shiftId = $id;

        $data = [];

        if($shiftId){
            $data['categories'] = Category::where('shift_id',$shiftId)->get();
            $data['sections']   = Section::where('shift_id',$shiftId)->get();
            $data['groups']     = Group::where('shift_id',$shiftId)->get();
        }

        return $data;

    }


    public function changePassword(Request $request){
        $student = StudentUser::where('student_id',$request->student_id)->first();

        $student->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'data' => $student,
            'status' => 200,
            'message' => 'Update Successfully'
        ]);
    }


    public  function getStudentsWithSubjects(Request $request){

        $data      = $request->all();

        $sessionId = $request->academic_year_id;


        $query = Student::with('ins_class');

        if ($sessionId) {
            $query->where('session_id', $sessionId);
        }

        if ($data['class_id']) {
            $query->where('class_id', $data['class_id']);
        }


        if ($data['shift_id']) {
            $query->where('shift_id', $data['shift_id']);
        }

        if ($data['category_id']) {
            $query->where('category_id', $data['category_id']);
        }

        if ($data['section_id']) {
            $query->where('section_id', $data['section_id']);
        }

        if ($data['group_id']) {
            $query->where('group_id', $data['group_id']);
        }

        $response['students'] = $query->get();

        $commonSubject = SubjectType::where('is_common',1)->first();
        $response['commonSubjects'] = ClassSubject::with('subject')->where('ins_class_id',$data['class_id'])
                                        ->whereHas("subjectType",function($query) use($commonSubject){
                                            $query->where('id',$commonSubject->id);
                                        })
                                        ->get();

        $subjectTypes = SubjectType::where('is_common',0)->get();

        $subjectTypeData = [];
        foreach ($subjectTypes as $type){
            $subjectTypeData[$type->name] = ClassSubject::with('subject')
                                            ->where('ins_class_id',$request->class_id)
                                            ->where('subject_type_id',$type->id)
                                            ->get()->map(function ($item) use($type){
                                                return [
                                                    'id'         => $item->id,
                                                    'subject'    => $item->subject
                                                ];
                                            });
        }

        $response['subjectTypes'] = $subjectTypeData;

        return $response;
    }



    public function getStudentsWithAssignSubjects(Request $request){

        $data      = $request->all();

        $subjectAssigns = StudentSubjectAssign::with('student')->whereHas('student',function ($q) use($request){
                                $q->where('class_id',$request->class_id);
                            })->get()->unique('student_id')->map(function ($item){
                                return [
                                    'id'              => $item->id,
                                    'id_no'           => $item->student->id_no,
                                    'student_name'    => $item->student->name,
                                    'roll_no'         => $item->student->roll_no,
                                    'regularSubjects' => $this->getRegularSubjects($item->student->id),
                                    'otherSubjects'   => $this->getOtherSubjects($item->student->id),
                                ];
                            });





        return response()->json($subjectAssigns);
    }

    public function getRegularSubjects($studentId){

        $student = Student::find($studentId);
        $classSubjects = ClassSubject::with('subject')->where('ins_class_id',$student->class_id)
                            ->whereHas('subjectType',function ($query){
                                $query->where('is_common',1);
                            })
                            ->get();
        return $classSubjects;
    }

    public function getOtherSubjects($studentId){

        $student = Student::find($studentId);

        $studentSubjects = StudentSubjectAssign::with('classSubjects')->where('student_id',$studentId)->get();

        $subjectTypes = SubjectType::where('is_common',0)->get();

        $subjectTypeData = [];
        foreach ($subjectTypes as $type){
            $subjectTypeData[$type->name] = StudentSubjectAssign::with('classSubjects','classSubjects.subject')->where('subject_type_id',$type->id)->where('student_id',$studentId)->get();
        }

        return $subjectTypeData;

    }


    public function getSubjectChecked(Request $request){
        $studentSubjectAssign = StudentSubjectAssign::where('class_subject_id',$request->class_subject_id)->where('student_id',$request->student_id)->get();
        if($studentSubjectAssign->count() > 0){
            return true;
        }
        else{
            return false;
        }
    }

}
