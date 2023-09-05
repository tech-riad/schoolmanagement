<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\SmsTemplates;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $smstemplates = SmsTemplates::all();
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.template.index',compact('smstemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.template.create');
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
            'title'     =>  'required',
            'message'   =>  'required'
        ]);

        SmsTemplates::create([
            'title'         => $request->title,
            'designation'   => $request->designation,
            'message'       => $request->message
        ]);

        //notification
        $notification = array(
            'message' =>'Sms Template Added',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
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
        $template = SmsTemplates::find($id);
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.template.create',compact('template'));
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
            'title'     =>  'required',
            'message'   =>  'required'
        ]);

        SmsTemplates::find($id)->update([
            'title'         => $request->title,
            'designation'   => $request->designation,
            'message'       => $request->message
        ]);

        //notification
        $notification = array(
            'message' =>'Sms Template Updated',
            'alert-type' =>'success'
        );

        return redirect()->route('sms.template.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $template = SmsTemplates::find($id);
        $template->delete();

         //notification
         $notification = array(
            'message' =>'Sms Template Deleted',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
}
