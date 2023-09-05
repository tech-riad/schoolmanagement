<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Models\InsClass;
use App\Models\TestGrade;
use Illuminate\Http\Request;

class TestGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_name = InsClass::find($id);
        $test_grades = TestGrade::where('ins_class_id',$id)->get();
        return view($this->backendTemplate['template']['path_name'].'.class_config.testGrade',compact('test_grades','id','class_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $class_name = InsClass::find($id);
        return view($this->backendTemplate['template']['path_name'].'.create_test_grade',compact('class_name','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $request->validate([
            'ins_class_id'  => 'required',
            'range_from'    => 'required',
            'range_to'      => 'required',
            'gpa_name'      => 'required',
            'gpa_point'     => 'required',
        ]);

        foreach ($request->range_from as $key => $value) {
            TestGrade::create([
                'ins_class_id'  => $request->ins_class_id,
                'range_from'    => $request->range_from[$key],
                'range_to'      => $request->range_to[$key],
                'gpa_name'      => $request->gpa_name[$key],
                'gpa_point'     => $request->gpa_point[$key],
                'comment'       => $request->comment[$key],
            ]);
        }


        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestGrade  $testGrade
     * @return \Illuminate\Http\Response
     */
    public function show(TestGrade $testGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestGrade  $testGrade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = TestGrade::findOrfail($id);
        return $grade;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestGrade  $testGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'range_from'    => 'required',
            'range_to'      => 'required',
            'gpa_name'      => 'required',
            'gpa_point'     => 'required',
        ]);
        
    
        TestGrade::findOrfail($request->grade_id)->update([
            'range_from'    => $request->range_from,
            'range_to'      => $request->range_to,
            'gpa_name'      => $request->gpa_name,
            'gpa_point'     => $request->gpa_point,
            'comment'       => $request->comment,
        ]);
    
        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestGrade  $testGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TestGrade::findOrfail($id)->delete();
        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
