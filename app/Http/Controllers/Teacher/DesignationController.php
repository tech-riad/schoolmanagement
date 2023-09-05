<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index(){
        $designations = Designation::all();
        return view($this->backendTemplate['template']['path_name'].'.teachers.designation.index',compact('designations'));
    }

    public function create(){
        return view($this->backendTemplate['template']['path_name'].'.teachers.designation.create');
    }

    public function store(Request $request){
        $designation = new Designation;
        $designation->title = $request->title;
         $designation->save();

         $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('designation.index')
                        ->with($notification);

    }

    public function edit($id){
        $designation = Designation::find($id);
        return view($this->backendTemplate['template']['path_name'].'.teachers.designation.edit',compact('designation'));

    }

    public function update(Request $request){
        $id = $request->id;
        $designation = Designation::find($id);
        $designation->title = $request->title;
        $designation->save();

        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('designation.index')
                        ->with($notification);
    }
}
