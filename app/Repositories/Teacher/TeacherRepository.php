<?php

namespace App\Repositories\Teacher;

use App\Helper\Helper;
use App\Models\Teacher;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Experience;
use App\Models\Qualification;
use App\Models\TeacherUser;
use App\Traits\FileSaver;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherRepository implements TeacherInterface
{
    use FileSaver;

    public $backendTemplate;
    function __construct()
    {
        $this->backendTemplate  = collect(app()->make('backend-template')->getTemplate())->toArray() ;
        
    }

    const backendTemplate = [
        'template' => [
            'path_name' => '%PATH_NAME%',
        ],
    ];

    public function index()
    {
        // TODO: Implement index() method.
        // return Teacher::all();
        $teachers = Teacher::with(
            [
                'designation:id,title',
                'branch:id,title'
            ]
        )
        ->where('type','teacher')->get();

        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);


        return view($backendTemplate['template']['path_name'].'.teachers.teacher.index', compact('teachers'))->with('backendTemplate', $backendTemplate);
    }

    public function create()
    {
        $branches = Branch::all();
        $designations = Designation::all();
        $table_number = 1;

        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);
        return view($backendTemplate['template']['path_name'].'.teachers.teacher.create', compact('branches', 'designations', 'table_number'))->with('backendTemplate', $backendTemplate);
    }

    public function store(array $data)
    {

        if (!empty($data['check'])) {

            $count_array = count($data['check']);
            for ($i = 0; $i < $count_array; $i++) {
                $teacher = Teacher::create([
                                'id_no'          => Helper::generateTeacherId(),
                                'name'           => $data['name'][$i],
                                'gender'         => $data['gender'][$i],
                                'type'           => "teacher",
                                'mobile_number'  => $data['mobile_number'][$i],
                                'designation_id' => $data['designation_id'][$i],
                                'branch_id'      => $data['branch_id'][$i],
                            ]);
            
                //Create Teacher User
                TeacherUser::create([
                    'institute_id' => Helper::getInstituteId(),
                    'teacher_id'   => $teacher->id,
                    'id_no'        => $teacher->id_no,
                    'name'         => $data['name'][$i],
                    'password'     => Hash::make($data['mobile_number'][$i])
                ]);
            }
        } else {
            return redirect()->route('teacher.index');
        }


        return redirect()->route('teacher.index')
            ->with('success', 'Teacher update successfully.');
    }


    public function getNumberOfTable(array $data)
    {

        $table_number = $data['table_number'];
        $branches = Branch::all();
        $designations = Designation::all();

        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);
        return view($backendTemplate['template']['path_name'].'.teachers.teacher.create', compact('branches', 'designations', 'table_number'))->with('backendTemplate', $backendTemplate);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
        $teacher       = Teacher::find($id);
        $branches      = Branch::all();
        $designations  = Designation::all();
        $blood_groups  = Helper::blood_groups();

        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);
        return view($backendTemplate['template']['path_name'].'.teachers.teacher.profile_update', compact('branches', 'designations', 'teacher', 'blood_groups'))->with('backendTemplate', $backendTemplate);
    }

    public function show($id)
    {
        // TODO: Implement edit() method.
        // return Teacher::find($id);
        $teacher = Teacher::find($id);
        return response()->json([
            'data' => $teacher,
            'status' => '200',
            'message' => 'success'

        ]);
    }

    public function updateSignature(array $data)
    {
        $teacher = Teacher::find($data['id']);

        if (@$data['signature_image']){
            
            $this->uploadFileLinode($data['signature_image'],$teacher,'signature_image','teacher');
            
            return response()->json([
                        'data' => $teacher,
                        'status' => 200,
                        'message' => 'Update Successfully'
                    ]);
        }

    }

    public function updatephoto(array $data)
    {
        $teacher = Teacher::find($data['id']);

        if (@$data['photo']){
            
            $this->uploadFileLinode($data['photo'],$teacher,'photo','teacher');
            
            return response()->json([
                    'data' => $teacher,
                    'status' => 200,
                    'message' => 'Update Successfully'
                ]);
        }
    }

    public function update(array $data)
    {
        $teacher = Teacher::find($data['id']);
        $teacher->update([
            'name'          => $data['name'],
            'father_name'   => $data['father_name'],
            'mother_name'   => $data['mother_name'],
            'gender'        => $data['gender'],
            'email'         => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'joining_date'  => $data['joining_date'],
            'designation_id'=> $data['designation'],
            'nid'           => $data['nid'],
            'date_of_birth' => $data['date_of_birth'],
            'blood_group'   => $data['blood_group'],
            'present_address'=> $data['present_address'],
            'permanent_address'=> $data['permanent_address'],
            'nationality'   => $data['nationality'],
        ]);


        
        Experience::where('teacher_id', $teacher->id)->delete();

        foreach ($data['org_name'] as $key =>  $val) {
            $experience                   = new Experience();
            $experience->teacher_id       = $teacher->id;
            $experience->org_name         = $data['org_name'][$key];
            $experience->address          = $data['address'][$key];
            $experience->org_type         = $data['org_type'][$key];
            $experience->position         = $data['position'][$key];
            $experience->responsibilities = $data['responsibilities'][$key];
            $experience->duration         = $data['duration'][$key];
            $experience->save();
        }


        Qualification::where('teacher_id', $teacher->id)->delete();

        foreach ($data['exam_title'] as $key =>  $val) {
            $qualification                   = new Qualification();
            $qualification->teacher_id       = $teacher->id;
            $qualification->exam_title       = $data['exam_title'][$key];
            $qualification->year             = $data['year'][$key];
            $qualification->university       = $data['university'][$key];
            $qualification->gpa              = $data['gpa'][$key];
            $qualification->save();
        }

        $notification = array(
            'message' =>'Teacher Update Successfully ',
            'alert-type' =>'success'
        );

        return redirect()->route('teacher.index')->with($notification);

    }



    public function destroy($id)
    {
        // TODO: Implement destroy() method.
        return Teacher::destroy($id);
    }

    public function uploadcreate()
    {

        $backendTemplate = static::backendTemplate;
        $backendTemplate['template']['path_name'] = str_replace('%PATH_NAME%', $this->backendTemplate['template']['path_name'], $backendTemplate['template']['path_name']);

        return view($backendTemplate['template']['path_name'].'.teachers.teacher.upload_teacher')->with('backendTemplate', $backendTemplate);
    }

}
