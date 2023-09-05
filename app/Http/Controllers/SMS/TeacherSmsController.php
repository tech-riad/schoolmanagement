<?php

namespace App\Http\Controllers\SMS;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\TeacherSms;
use Illuminate\Http\Request;

class TeacherSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.teacherssms.index');
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
        if (Helper::sd_send_sms_api('8801301393735', $request->message)) {
            return back()->with(['success' => "SMS send successful!"]);
        } else {
            return back()->with(['success' => "But trouble to send SMS! Contact Admin for userid and password"]);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sms = TeacherSms::find($id);
        $sms->delete();

        //notification
        $notification = array(
            'message' =>'SMS Delete Successfully',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }
}
