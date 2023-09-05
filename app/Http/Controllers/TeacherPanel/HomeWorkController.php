<?php

namespace App\Http\Controllers\TeacherPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\InsClass;
use App\Models\Homework;
use App\Models\Section;

class HomeWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homework = Homework::all();
        // dd($homework);
        return view('teacherpanel.homework.index',compact('homework'));
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
        return view('teacherpanel.homework.create',compact('academic_years','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'mimes:doc,pdf,docx,zip,jpg,png,jpeg',

                ]);


        $files = $request->filename;

        $subimages = [];
        foreach($files as $file){
            $name='file_'.time().$file->getClientOriginalName();
            $destinationPath = '/uploads/teacherpanel/homework/files/';
            $file->move(public_path($destinationPath), $name);
            array_push($subimages,$destinationPath.$name);
        }


        $homework= new Homework();
        $homework->filename=json_encode($subimages);

        $homework->content           = $request->content;
        $homework->title             = $request->title;
        $homework->session_id        = $request->academic_year_id;
        $homework->class_id          = $request->class_id;
        $homework->shift_id          = $request->shift_id;
        $homework->section_id        = $request->section_id;
        $homework->category_id       = $request->category_id;
        $homework->group_id          = $request->group_id;
        $homework->published_date    = $request->published_date;
        $homework->submit_date       = $request->submit_date;

        $homework-> save();

        $notification = array(
            'message' =>' Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.homework.index')->with($notification);
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
        $homework = Homework::findOrFail($id);
        $academic_years = Session::all();
        $classes = InsClass::all();

        return view('teacherpanel.homework.create',compact('homework','academic_years','classes'));
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
        $this->validate($request,[


            'filename.*' => 'mimes:doc,pdf,docx,zip,jpg,png,jpeg',

            ]);

    $homework=Homework::find($id);

    $files = $request->filename;



    $subimages= [];

    if (is_array($files) || is_object($subimages))
{
    foreach ($files as $file)
    {

            $name='file_'.time().$file->getClientOriginalName();
            $destinationPath = '/uploads/teacherpanel/homework/files/';
            $file->move(public_path($destinationPath), $name);
            array_push($subimages,$destinationPath.$name);


    }
}

    $homework->filename=json_encode($subimages);

    $homework->content           = $request->content;
    $homework->title             = $request->title;
    $homework->session_id        = $request->academic_year_id;
    $homework->class_id          = $request->class_id;
    $homework->shift_id          = $request->shift_id;
    $homework->section_id        = $request->section_id;
    $homework->category_id       = $request->category_id;
    $homework->group_id          = $request->group_id;
    $homework->published_date    = $request->published_date;
    $homework->submit_date       = $request->submit_date;

    $homework-> save();

    $notification = array(
        'message' =>'Update Successfull ',
        'alert-type' =>'success'
    );
    return redirect()->route('teacherpanel.homework.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $homework = Homework::find($id);
        @unlink(public_path('/uploads/teacherpanel/homework/files/'.$homework->filename));
        $homework->delete();

        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('teacherpanel.homework.index')->with($notification);
    }
}
