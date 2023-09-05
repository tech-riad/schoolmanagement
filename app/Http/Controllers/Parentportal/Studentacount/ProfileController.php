<?php

namespace App\Http\Controllers\Parentportal\Studentacount;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Gender;
use App\Models\Religion;
use App\Models\Student;
use App\Models\StudentUser;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $religions     = Religion::all();
        $genders       = Gender::all();
        $blood_groups  = Helper::blood_groups();
        $student       = Student::findOrfail(Auth::guard('student')->user()->student_id);
        $divisions     = Division::all();
        $districts     = District::all();
        $upazilas      = Upazila::all();

        return view('parentportal.profile.index',compact('student', 'religions', 'genders', 'blood_groups','divisions','districts','upazilas'));
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
       // return $request;
        $student = Student::find($id);

        $data = $request->all();

        if (@$data['photo']) {

            $imageName = 'image_' . time() . '.' . $data['photo']->extension();
            $destinationPath = 'uploads/students/';
            $data['photo']->move(public_path($destinationPath), $imageName);

            $image = $destinationPath . $imageName;

            $student->update([
                'photo' => $image
            ]);

            return response()->json([
                'data' => $student,
                'status' => 200,
                'message' => 'Update Successfully'
            ]);
        }

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


    public function changePassword(Request $request){

        $oldPassword = $request->old_password;
        $studentUser = StudentUser::find(Auth::guard('student')->user()->id);


        if(Hash::check($oldPassword, $studentUser->password)){
            $studentUser->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Password Changed'
            ]);
        }
        else{
            return response()->json([
                'status' => 401,
                'message' => 'Old Password Not Matched'
            ]);
        }
    }
}
