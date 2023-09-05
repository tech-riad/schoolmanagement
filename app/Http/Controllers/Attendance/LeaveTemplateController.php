<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\Models\LeaveTemplate;
use Illuminate\Http\Request;

class LeaveTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = LeaveTemplate::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.application.index',compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:leave_templates',
            'application'   => 'required'
        ]);

        LeaveTemplate::create([
            'title'         => $request->title,
            'application'   => $request->application
        ]);

        //notification
        $notification = array(
            'message' =>'Added Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->route('attendance.leavetemplate.index')->with($notification);
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
        $template  = LeaveTemplate::find($id);
        return view($this->backendTemplate['template']['path_name'].'.attendance.leavemanagement.application.create',compact('template'));
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
        $request->validate([
            'title'         => 'required',
            'application'   => 'required'
        ]);

        LeaveTemplate::find($id)->update([
            'title'         => $request->title,
            'application'   => $request->application
        ]);

        //notification
        $notification = array(
            'message' =>'Update Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->route('attendance.leavetemplate.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = LeaveTemplate::find($id);
        $template->delete();
        //notification
        $notification = array(
            'message' =>'Deleted Successfully ',
            'alert-type' =>'success'
        );
    
        return redirect()->back()->with($notification);
    }
}
