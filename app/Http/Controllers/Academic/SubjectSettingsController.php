<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectSettingsController extends Controller
{
    public function index(){

        $sub      = Subject::get();
        $subjects = $sub->sortBy('order');

        return view($this->backendTemplate['template']['path_name'].'.academic.setting.subject.index',compact('subjects'));

    }

    public function orderSubject(Request $request){

        $order = $request->order;
        $subjects = Subject::all();

        foreach($subjects as $subject){
            $id = $subject->id;

            foreach($request->order as $order){
                if($order['id'] == $id){
                    $subject->update([
                        'order' => $order['position']
                    ]);
                }
            }
        }

        return response()->json(['status'=>202]);
    }
}
