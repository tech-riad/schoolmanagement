<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;

use App\Models\InsClass;
use App\Models\Section;
use App\Models\Shift;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_name = InsClass::find($id);
        $shifts = Shift::where('ins_class_id',$id)->get();
        $sections = Section::where('ins_class_id',$id)->get();
        return view($this->backendTemplate['template']['path_name'].'.class_config.section',compact('shifts','sections','id','class_name'));
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
        $section = new Section;
        $section->ins_class_id = $request->ins_class_id;
        $section->shift_id = $request->shift_id;
        $section->name = $request->name;
        $section->save();

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::with('shift')->findOrfail($id);
        return response()->json($section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Section::findOrfail($request->section_id)->update([
        //     'shift_id'  => $request->shift_id,
        //     'name'      => $request->name
        // ]);
        $section = Section::findOrfail($request->section_id);
        $section->shift_id = $request->shift_id;
        $section->name = $request->name;
        $section->save();

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::findOrfail($id)->delete();

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
