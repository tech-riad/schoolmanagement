<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MeritStudent;
use App\Models\Section;
use App\Models\Session;
use Illuminate\Http\Request;

class MeritStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meritStudents = MeritStudent::all();
        return view($this->backendTemplate['template']['path_name'].'.student.merit_student.index',compact('meritStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academic_years = Session::all();
        $sections = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.student.merit_student.create',compact('academic_years','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'unique:merit_students'
        ]);

        foreach ($request->check as $key => $value) {
          $student =  MeritStudent::create([
                'student_id'  => $value,
                'position'    => $request->position[$value]
            ]);
        }

        $notification = array(
            'message' =>'Students added successfully',
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
