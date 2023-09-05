<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Models\Group;
use App\Models\InsClass;
use App\Models\Shift;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_name = InsClass::find($id);
        $shifts = Shift::where('ins_class_id',$id)->get();
        $groups = Group::where('ins_class_id',$id)->get();
        return view($this->backendTemplate['template']['path_name'].'.class_config.group',compact('shifts','groups','id','class_name'));
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
        $group = new Group;
        $group->name = $request->name;
        $group->ins_class_id = $request->ins_class_id;
        $group->shift_id = $request->shift_id;
       // $group->section_id = $request->section_id;
        $group->save();

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::with('section','shift')->findOrfail($id);
        return response()->json($group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request->all();
        // Group::findOrfail($request->group_id)->update([
        //     'shift_id'  => $request->shift_id,
        //     'section_id'=> $request->section_id,
        //     'name'      => $request->name
        // ]);

        $group = Group::findOrfail($request->group_id);

        $group->shift_id    = $request->shift_id;
       // $group->section_id  = $request->section_id;
        $group->name  = $request->name;
        $group->save();

        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::findOrfail($id)->delete();

        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
}
