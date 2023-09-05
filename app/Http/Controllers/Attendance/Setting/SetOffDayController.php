<?php

namespace App\Http\Controllers\Attendance\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setoffday;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SetOffDayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offdays = Setoffday::orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.attendance.setting.setoffday.index',compact('offdays'));
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
        $request->validate([
            'title' => 'required'
        ]);

        //diff minute beetween two times
        $start_date = Carbon::parse($request->start_date);
        $end_date   = Carbon::parse($request->end_date);
        // calculation total days
        $total = $start_date->diffInDays($end_date);
        $total = $total + 1;

        Setoffday::create([
            'title'         => $request->title,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'total_days'    => $total,
        ]);

        //notification
        $notification = array(
            'message' =>'Set Off Day Successfully',
            'alert-type' =>'success'
        );
        return redirect()->route('attendance.setoffday.index')->with($notification);

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
        return Setoffday::find($id);
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
            'title' => 'required'
        ]);

        //diff minute beetween two times
        $start_date = Carbon::parse($request->start_date);
        $end_date   = Carbon::parse($request->end_date);
        // calculation total days
        $total = $start_date->diffInDays($end_date);
        $total = $total + 1;

        Setoffday::find($request->id)->update([
            'title'         => $request->title,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'total_days'    => $total,
        ]);

        //notification
        $notification = array(
            'message' =>'Set Off Day Update Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setoffday::find($id)->delete();

        //notification
        $notification = array(
            'message' =>'Set Off Day Delete Successfully',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
