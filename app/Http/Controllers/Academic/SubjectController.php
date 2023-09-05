<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Models\ClassSubject;
use App\Models\InsClass;
use App\Models\Subject;
use App\Models\SubjectType;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
        $subjects = Subject::all();
        //dd($subjects);
        $subjectTypes = SubjectType::get()->map(function ($item) use($id){
            return [
                'id' => $item->id,
                'name' => $item->name,
                'count' => $this->subjectCount($item->id,$id)
            ];
        });

        return view ($this->backendTemplate['template']['path_name'].'.subject.index', compact('subjectTypes','subjects','id'));
    }

    public function subjectCount($id,$classId){
        return ClassSubject::where('ins_class_id',$classId)->where('subject_type_id',$id)->count();
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
        $subject = new Subject();
        $subject->sub_name=$request->name;
        $subject->sub_code=$request->code;

        $subject->save();

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    public function subjectAdd(Request $request)
    {
       $data = $request->all();
       $subjectIds = [];
       foreach ($data as $key => $item){
           $subjectId = explode('-',$key);
           if(count($subjectId) == 2){
               array_push($subjectIds,$subjectId[1]);
           }
       }

       foreach ($subjectIds as $subjectId){

           $sub       = "subject_id-".$subjectId;
           $subTypeId = explode('-',$request->$sub);

           ClassSubject::updateOrCreate([
               'subject_id' => $subjectId
           ],
               [
                    'ins_class_id'    => $request->class_id,
                    'subject_id'      => $subjectId,
                    'subject_type_id' => $subTypeId[0]
               ]);
       }

//       foreach ($request->subject_id as $key => $sub_id) {
//            $classSubject = new ClassSubject();
//            $classSubject->ins_class_id = $request->class_id;
//            $classSubject->subject_id   = $request->subject_id[$key];
//            $classSubject->save();
//       }

       $notification = array(
        'message' =>'Action Successfull',
        'alert-type' =>'success'
    );

       return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list($id)
    {
        $subjects = InsClass::with('subjects')->find($id);

        $subjectTypes = SubjectType::orderBy('id','DESC')->get();
        $subjectTypeData = [];
        foreach ($subjectTypes as $type){
            $subjectTypeData[$type['name']] = ClassSubject::with('subject')->where('subject_type_id',$type->id)
                                                ->where('ins_class_id',$id)
                                                ->get();
        }

        $class_name = InsClass::findOrfail($id);
        return view($this->backendTemplate['template']['path_name'].'.subject.list',compact('subjectTypeData','id','class_name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::findOrfail($id);
        return response()->json($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        Subject::findOrfail($request->sub_id)->update([
            'sub_name'  => $request->name,
            'sub_code'  => $request->code,
            'type'      => $request->type
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ClassSubject::where('subject_id',$id)->delete();
      $subject = Subject::findOrfail($id)->delete();

      $notification = array(
        'message' =>'Action Successfull ',
        'alert-type' =>'success'
    );
      return response()->json($subject)->with($notification);
    }

    public function delete($id){
        $subject = Subject::find($id);

        if ($subject){
            $subject->delete();
        }

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }


    public  function  getSubjects(Request $request)
    {
        $subjects = Subject::get()->map(function ($item) use($request){
            return [
                'id'       => $item->id,
                'sub_name' => $item->sub_name,
                'sub_code' => $item->sub_code,
                'order'    => $item->order,
                'type_id'  => $this->getTypeId($request->class_id,$item->id),
                'checked'  => $this->subjectChecked($request->class_id,$item->id)
            ];
        });
//        $subs             = $subjects->sortBy('order');
        $subs = [];
        $subsOrders = $subjects->sortBy('order');
        foreach ($subsOrders as $sub){
            array_push($subs,$sub);
        }
        $data['subjects'] = collect($subs)->chunk(3);
        $data['subjects_types'] = SubjectType::all();

        return response()->json($data);
    }




    public  function  getSubjectsByType(Request $request)
    {

       $subjectType = SubjectType::with('subjects')->find($request->type_id);

       $ss = $subjectType->subjects->map(function ($item) use($request){
                   return [
                       'id'       => $item->id,
                       'sub_name' => $item->sub_name,
                       'sub_code' => $item->sub_code,
                       'type_id'  => $this->getTypeId($request->class_id,$item->id),
                       'checked'  => $this->subjectChecked($request->class_id,$item->id)
                   ];
               });

       $data['subjects']       = $ss->chunk(3);
       $data['subjects_types'] = SubjectType::all();

       return $data;
    }

    public function subjectChecked($classId,$subId){
        $classSubject = ClassSubject::where('ins_class_id',$classId)->where('subject_id',$subId)->first();
        if($classSubject){
            return true;
        }
        else{
            return  false;
        }
    }
    public function getTypeId($classId,$subId){
        $classSubject = ClassSubject::where('ins_class_id',$classId)->where('subject_id',$subId)->first();
        if($classSubject){
            return $classSubject->subject_type_id;
        }
        else{
            return  null;
        }
    }

    public function deleteClassSubject($id){
        $classSubject = ClassSubject::find($id);
        $classSubject->delete();
        //notification
        $notification = array(
            'message' =>'Subject Assign Delete Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
