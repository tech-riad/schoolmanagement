<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Exam;
use App\Models\Gender;
use App\Models\Group;
use App\Models\InsClass;
use App\Models\Religion;
use App\Models\Section;
use App\Models\Session;
use App\Models\Shift;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

class StudentProfileUpdateController extends Controller
{
    use FileSaver;

    public function index()
    {
        $academic_years = Session::all();
        $classes        = InsClass::all();
        $shifts         = Shift::all();
        $sections       = Section::all();
        $groups         = Group::all();
        $categories     = Category::all();
        $genders        = Gender::all();
        $religions      = Religion::all();
        return view($this->backendTemplate['template']['path_name'].'.student.update-profile.index',compact('academic_years','classes','shifts','sections','groups','categories','genders','religions'));
    }


    public function update(Request $request)
    {
        // return $request;
        foreach ($request->check as $key => $v) {
            $student = Student::find($v);

            $student->update([
                'name'              => $request->name[$v],
                'roll_no'           => $request->roll_no[$v],
                'father_name'       => $request->father_name[$v],
                'mother_name'       => $request->mother_name[$v],
                'mobile_number'     => $request->mobile_number[$v],
                'email'             => $request->email[$v],
                'religion'          => $request->religion[$v],
                'gender'            => $request->gender[$v],
                'blood_group'       => $request->blood_group[$v],
                'dob'               => $request->dob[$v],
                'shift_id'          => $request->shift_id[$v] ?? null,
                'group_id'          => $request->group_id[$v] ?? null,
                'section_id'        => $request->section_id[$v] ?? null,
                'category_id'       => $request->category_id[$v] ?? null
            ]);
        }

        //notification
        $notification = array(
            'message' =>'Student Profile Update Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);

    }

    public function imageUpdate(Request $request,$id)
    {
        $student = Student::find($id);

        if (@$request['photo']) {

            // $imageName = 'image_' . time() . '.' . $request['photo']->extension();
            // $destinationPath = 'uploads/students/';
            // $request['photo']->move(public_path($destinationPath), $imageName);
            $this->uploadFileLinode($request['photo'],$student,'photo','student');


            // $image = $destinationPath . $imageName;

            // $student->update([
            //     'photo' => $image
            // ]);

            return response()->json([
                'data'    => $student,
                'status'  => 200,
                'message' => 'Update Successfully'
            ]);
        }
    }
}
