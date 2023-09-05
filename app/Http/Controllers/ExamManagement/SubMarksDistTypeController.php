<?php

namespace App\Http\Controllers\ExamManagement;

use App\Http\Controllers\Controller;

use App\Models\SubMarksDistType;
use Illuminate\Http\Request;

class SubMarksDistTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types= SubMarksDistType::all();
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.sub_marks_dist_type.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.sub_marks_dist_type.create');
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
           'title' => 'required',
           'details' => 'required'
        ]);

        $types = new SubMarksDistType();

        $types->title           = $request->title;
        $types->details         = $request->details;

        $types->save();

        $notification = array(
            'message' =>'Create Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('exam-management.setting.marks-dist-type.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMarksDistType  $subMarksDistType
     * @return \Illuminate\Http\Response
     */
    public function show(SubMarksDistType $subMarksDistType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMarksDistType  $subMarksDistType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = SubMarksDistType::find($id);

        return view($this->backendTemplate['template']['path_name'].'.exammanagement.sub_marks_dist_type.create',compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMarksDistType  $subMarksDistType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $types = SubMarksDistType::find($id);


        $types->title           = $request->title;
        $types->details         = $request->details;

        $types->save();

        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('exam-management.setting.marks-dist-type.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMarksDistType  $subMarksDistType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMarksDistType $subMarksDistType , $id)
    {
        $types = SubMarksDistType::find($id);

        $types->delete();

        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'Danger'
        );

        return redirect()->route('exam-management.setting.marks-dist-type.index')->with($notification);

    }
}
