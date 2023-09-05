<?php

namespace App\Http\Controllers\Teacher;

use App\Helper\Helper;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{

    public function index(){
        $branches = Branch::all();
        return view($this->backendTemplate['template']['path_name'].'.teachers.branch.index',compact('branches'));
    }

    public function create(){
        return view($this->backendTemplate['template']['path_name'].'.teachers.branch.create');
    }

    public function store(Request $request){
        $branch =  new Branch;
        $branch->title = $request->title;
        $branch->save();

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('branch.index')
                        ->with($notification);


    }

    public function edit($id){
        $branch = Branch::find($id);
        return view($this->backendTemplate['template']['path_name'].'.teachers.branch.edit',compact('branch'));
    }

    public function update (Request $request){
        $id = $request->id;
        $branch = Branch::find($id);
        $branch->title = $request->title;
        $branch->save();
        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('branch.index')
                        ->with($notification);


    }
}
