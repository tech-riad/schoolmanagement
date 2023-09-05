<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\SmsHistory;
use Illuminate\Http\Request;

class SmsManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.index');
    }

    public function smshistory(Request $request)
    {
        $histories = SmsHistory::with('source');

        if($request->type != 'all'){
            $histories = $histories->where('source_type',$request->type);
        }
        $histories = $histories->get();

        return view($this->backendTemplate['template']['path_name'].'.smsmanagement.history.index',compact('histories'));
    }

    public function historydelete($id)
    {
        $history = SmsHistory::find($id);
        $history->delete();

        //notification
        $notification = array(
            'message' =>'But trouble to send SMS! Contact Admin for userid and password',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
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
        //
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
        //
    }
}
