<?php

namespace App\Http\Controllers\ExamManagement;

use App\Http\Controllers\Controller;

use App\Helper\Helper;
use App\Models\ClassSubject;
use App\Models\Session;
use App\Models\Subject;
use App\Models\SubMarksDist;
use App\Models\SubMarksDistDetail;
use App\Models\SubMarksDistType;
use Illuminate\Http\Request;

class SubMarksDistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_years             = Session::all();
        $types                      = SubMarksDistType::all();
        $months                     = Helper::months();
        $subjects                   = Subject::all();
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.marks_distribution.index', compact('academic_years', 'types', 'months', 'subjects'));
    }

    public function getsubjectByClass(Request $request)
    {
        $subjects = ClassSubject::with('subject')->where('ins_class_id', $request->class_id)->get();
        return $subjects;
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



        foreach ($request->subject_id as $key => $subjectId) {
            $subMarkDist =  SubMarksDist::create([
                'subject_id' => $subjectId,
                'class_id'   => $request->class_id,
                'total_mark' => $request->total_mark[$key],
                'pass_mark'  => $request->pass_mark[$key],
                'take'       => $request->take[$key],
                'grace'      => $request->grace[$key],
            ]);
            //store sub mark details
            $distTypeId = 'dist_type_id' . '_' . $subjectId;
            $mark       = 'mark' . '-' . $subjectId;
            $passMark   = 'pass_mark' . '-' . $subjectId;



            foreach ($request->$distTypeId as $key => $distTypeId) {
                SubMarksDistDetail::create([
                    'sub_marks_dist_id'      => $subMarkDist->id,
                    'sub_marks_dist_type_id' => $distTypeId,
                    'mark'                   => $request->$mark[$key],
                    'pass_mark'              => $request->$passMark[$key],
                ]);
            }
        }

        //notification
        $notification = array(
            'message' => 'Mark Distribute Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubMarksDist  $subMarksDist
     * @return \Illuminate\Http\Response
     */
    public function show(SubMarksDist $subMarksDist)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubMarksDist  $subMarksDist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $markDist = SubMarksDist::with('subject','details')->find($id);
        $types    = SubMarksDistType::all();
        return view($this->backendTemplate['template']['path_name'].'.exammanagement.marks_distribution.edit',compact('markDist','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubMarksDist  $subMarksDist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $markDist = SubMarksDist::find($id);

        $markDist->update([
            'total_mark' => $request->total_mark,
            'pass_mark'  => $request->pass_mark,
            'take'       => $request->take,
            'grace'      => $request->grace,
        ]);
        foreach ($markDist->details as $detail){
            $detail->delete();
        }

        foreach ($request->mark_dist_type_id as $key => $distTypeId){
            //dd($distTypeId);
            SubMarksDistDetail::create([
               'sub_marks_dist_id'       =>  $markDist->id,
               'sub_marks_dist_type_id' =>  $distTypeId,
               'mark'                    =>  $request->marks[$key],
               'pass_mark'               =>  $request->pass_marks[$key],
            ]);
        }
        //notification
        $notification = array(
            'message' => 'Mark Dist Update Successfully ',
            'alert-type' => 'success'
        );
        return redirect()->route('exam-management.setting.marks-dist.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubMarksDist  $subMarksDist
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMarksDist $subMarksDist)
    {
        //
    }
}
