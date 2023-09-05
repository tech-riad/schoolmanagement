<?php

namespace App\Http\Controllers\TeacherPanel;

use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\McqChapter;
use App\Models\McqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MCQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = McqChapter::where('teacher_id',Auth::user()->teacher_id)->orderBy('id','DESC')->get();
        return view('teacherpanel.question.mcq.index',compact('chapters'));
    }


    public function getSubjectListById($id)
    {
        return InsClass::with('subjects')->find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = InsClass::all();
        return view('teacherpanel.question.mcq.create',compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $questions = $request->question;
        
        $chapter = McqChapter::create([
            'ins_class_id'  => $request->class_id,
            'teacher_id'    => Auth::user()->teacher_id,
            'subject_id'    => $request->subject_id,
            'name'          => $request->chapter_name
        ]);


        foreach ($questions as $key => $value) {
            $option = new McqQuestion();
            $option->chapter_id = $chapter->id;
            $option->question   = $request->question[$key];
            $option->option1    = $request->option1[$key];
            $option->option2    = $request->option2[$key];
            $option->option3    = $request->option3[$key];
            $option->option4    = $request->option4[$key];
            $option->answer     = $request->answer[$key];
            $option->save();
        }


        $notification = array(
            'message' =>' MCQ Question Created ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.question.mcqquestion.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $chapter = McqChapter::find($id);
        $classes = InsClass::all();
        return view('teacherpanel.question.mcq.create',compact('chapter','classes'));
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
        $questions = $request->question;
        
        $chapter = McqChapter::find($id);
        $chapter->update([
            'ins_class_id'  => $request->class_id ?? $chapter->ins_class_id,
            'teacher_id'    => Auth::user()->teacher_id,
            'subject_id'    => $request->subject_id ?? $chapter->subject_id,
            'name'          => $request->chapter_name ?? $chapter->name
        ]);

        $oldQuestions = McqQuestion::where('chapter_id',$chapter->id)->get();

        foreach ($oldQuestions as $key => $item) {
            $item->delete();
        }

        foreach ($questions as $key => $value) {
            if($request->question[$key] != ''){
                $option = new McqQuestion();
                $option->chapter_id = $chapter->id;
                $option->question   = $request->question[$key];
                $option->option1    = $request->option1[$key];
                $option->option2    = $request->option2[$key];
                $option->option3    = $request->option3[$key];
                $option->option4    = $request->option4[$key];
                $option->answer     = $request->answer[$key];
                $option->save();
            }
        }


        $notification = array(
            'message' =>' MCQ Question Created ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.question.mcqquestion.index')->with($notification);
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
