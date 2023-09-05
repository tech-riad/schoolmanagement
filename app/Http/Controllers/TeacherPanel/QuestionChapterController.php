<?php

namespace App\Http\Controllers\TeacherPanel;

use App\Http\Controllers\Controller;
use App\Models\ChapterQuestion;
use App\Models\InsClass;
use App\Models\QuestionChapter;
use App\Models\Session;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapters = QuestionChapter::where('teacher_id',Auth::user()->teacher_id)->orderBy('id','DESC')->get();
        return view('teacherpanel.question.theory.index',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = InsClass::all();
        return view('teacherpanel.question.theory.create',compact('classes'));
    }


    public function getSubjectListById($id)
    {
        return InsClass::with('subjects')->find($id);
    }


    public function selectSubject(Request $request)
    {
        $data = [];
        $data['items']   = $request->all();
        $data['subject'] = Subject::find($request->subject);
        $data['class']   = InsClass::find($request->class);

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $chapter = QuestionChapter::create([
            'teacher_id'    => Auth::user()->teacher_id,
            'ins_class_id'  => $request->class_id,
            'subject_id'    => $request->subject_id,
            'name'          => $request->chapter_name
        ]);

        foreach ($request->question as $key => $val) {
            $question = new ChapterQuestion();
            $question->chapter_id   = $chapter->id;
            $question->question     = $request->question[$key];
            $question->option1      = $request->option1[$key];
            $question->option2      = $request->option2[$key];
            $question->option3      = $request->option3[$key];
            $question->option4      = $request->option4[$key];
            $question->save();
        }

        $notification = array(
            'message' =>' Question Created ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.question.index')->with($notification);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = InsClass::all();
        $chapter = QuestionChapter::find($id);
        return view('teacherpanel.question.theory.create',compact('classes','chapter'));
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
        $chapter = QuestionChapter::find($id);
        $chapter->update([
            'teacher_id'    => Auth::user()->teacher_id,
            'ins_class_id'  => $request->class_id ?? $chapter->ins_class_id,
            'subject_id'    => $request->subject_id ?? $chapter->subject_id,
            'name'          => $request->chapter_name ?? $chapter->name
        ]);

        $oldquestions = ChapterQuestion::where('chapter_id',$chapter->id)->get();
        foreach ($oldquestions as $key => $oldquestion) {
            $oldquestion->delete();
        }

        foreach ($request->question as $key => $val){
            if($request->question[$key] != '' && $request->option1[$key] != '' && $request->option2[$key] != '' && $request->option3[$key] != '' && $request->option4[$key] != ''){
                $question = new ChapterQuestion();
                $question->chapter_id   = $chapter->id;
                $question->question     = $request->question[$key];
                $question->option1      = $request->option1[$key];
                $question->option2      = $request->option2[$key];
                $question->option3      = $request->option3[$key];
                $question->option4      = $request->option4[$key];
                $question->save();
            }
        }
        
        
        $notification = array(
            'message' =>' Question Updated ',
            'alert-type' =>'success'
        );
        return redirect()->route('teacherpanel.question.index')->with($notification);
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
