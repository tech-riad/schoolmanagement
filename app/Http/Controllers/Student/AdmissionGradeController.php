<?php

namespace App\Http\Controllers;

use App\Models\AdmissionGrade;
use App\Models\InsClass;
use Illuminate\Http\Request;

class AdmissionGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_name = InsClass::find($id);
        $add_grades = AdmissionGrade::where('ins_class_id',$id)->get();
        return view('class_config.admissionTestGrade',compact('add_grades','id','class_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $class_name = InsClass::find($id);
        return view('create_admission_grade',compact('class_name','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //  return $request->all();
         $request->validate([
            'ins_class_id' => 'required',
            'range_from'   => 'required',
            'range_to'   => 'required',
            'gpa_name'   => 'required|unique:admission_grades',
            'gpa_point'   => 'required',
        ]);

        AdmissionGrade::create([
            'ins_class_id'  => $request->ins_class_id,
            'range_from'    => $request->range_from,
            'range_to'      => $request->range_to,
            'gpa_name'      => $request->gpa_name,
            'gpa_point'     => $request->gpa_point,
            'comment'       => $request->comment,
        ]);

        $notification = array(
            'message' =>'Created Successfully ',
            'alert-type' =>'success'
        );

        return redirect()->route('classes.show',$request->ins_class_id)->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdmissionGrade  $admissionGrade
     * @return \Illuminate\Http\Response
     */
    public function show(AdmissionGrade $admissionGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdmissionGrade  $admissionGrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = AdmissionGrade::findOrfail($id);
        return view('create_admission_grade',compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdmissionGrade  $admissionGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // return $request->all();
         $request->validate([
            'range_from'    => 'required',
            'range_to'      => 'required',
            'gpa_name'      => 'required',
            'gpa_point'     => 'required',
        ]);
    
        AdmissionGrade::findOrfail($id)->update([
            'range_from'    => $request->range_from,
            'range_to'      => $request->range_to,
            'gpa_name'      => $request->gpa_name,
            'gpa_point'     => $request->gpa_point,
            'comment'       => $request->comment,
        ]);
        $notification = array(
            'message' =>'Created Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->route('classes.show',$request->ins_class_id)->with($notification);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdmissionGrade  $admissionGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdmissionGrade::findOrfail($id)->delete();
        $notification = array(
            'message' =>'Created Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
