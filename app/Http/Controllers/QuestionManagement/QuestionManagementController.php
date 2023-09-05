<?php

namespace App\Http\Controllers\QuestionManagement;

use App\Http\Controllers\Controller;
use App\Models\McqChapter;
use App\Models\QuestionChapter;
use Illuminate\Http\Request;

class QuestionManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = QuestionChapter::all();
        return view($this->backendTemplate['template']['path_name'].'.questionmanagement.question.index',compact('chapters'));
    }


    public function mcqindex()
    {
        $chapters = McqChapter::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.questionmanagement.mcq.index',compact('chapters'));
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
        return QuestionChapter::with('questions','ins_class','subject')->find($id);
    }

    public function mcqshow($id)
    {
        return McqChapter::with('questions','ins_class','subject')->find($id);
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
