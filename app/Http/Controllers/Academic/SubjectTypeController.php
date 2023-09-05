<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\Subject;
use App\Models\SubjectType;
use Illuminate\Http\Request;

class SubjectTypeController extends Controller
{
    public  function  index()
    {


        $subjectTypes = SubjectType::all();
        return view($this->backendTemplate['template']['path_name'].'.class_config.subject-type.index',compact('subjectTypes'));
    }

    public function  create(){

        return view($this->backendTemplate['template']['path_name'].'.class_config.subject-type.create');
    }

    public function store(Request $request )
    {
        // dd($request->all());
        $subjecttype = new SubjectType();

        $subjecttype-> name        = $request->name;
        $subjecttype->is_common    =  $request->is_common;

        $subjecttype->save();
        $notifications = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('subject-type.index')->with($notifications);
    }

    public function edit($id)
    {
        $subjecttype = SubjectType::find($id);

        return view($this->backendTemplate['template']['path_name'].'.class_config.subject-type.create',compact('subjecttype'));

    }
    public function update(Request $request, $id)
    {
        $subjecttype = SubjectType::find($id);

        $subjecttype-> name        = $request->name;
        $subjecttype->is_common    =  $request->is_common;

        $subjecttype->save();
        $notifications = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('subject-type.index')->with($notifications);
    }

    public function destroy($id)
    {
        $type = SubjectType::find($id);

        if($type->subjects->count() > 0){
            $notifications = array(
                'message' =>'Already Have Subject',
                'alert-type' =>'error'
            );
            return redirect()->back()->with($notifications);
        }
        else{
            $type->delete();

            $notifications = array(
                'message' =>'Type Delete Successfully',
                'alert-type' =>'success'
            );
            return redirect()->back()->with($notifications);
        }


    }
}
