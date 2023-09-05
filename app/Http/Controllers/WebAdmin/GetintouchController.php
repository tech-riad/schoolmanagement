<?php

namespace App\Http\Controllers\WebAdmin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Getintouch;
use Illuminate\Http\Request;

class GetintouchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getintouch = Getintouch::all();

        return view($this->backendTemplate['template']['path_name'] .'.webadmin.getintouch.index', compact('getintouch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.getintouch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getintouch = new Getintouch();

        $getintouch->phone=$request->phone;
        $getintouch->email=$request->email;
        $getintouch->address=$request->address;
        $getintouch->save();


        return redirect()->route('getintouch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Getintouch  $getintouch
     * @return \Illuminate\Http\Response
     */
    public function show(Getintouch $getintouch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Getintouch  $getintouch
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
        $getintouch = Getintouch::where('institute_id',Helper::getInstituteId())->first();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.getintouch.create', compact('getintouch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\  $getintouch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $getintouch = Getintouch::find($id);

        $getintouch->phone=$request->phone;
        $getintouch->email=$request->email;
        $getintouch->address=$request->address;
        $getintouch->save();


        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Getintouch  $getintouch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getintouch = Getintouch::find($id);

        $getintouch->delete();

        return redirect()->route('getintouch.index')->with('success', 'getintouch Updated Successfully!');
    }
}
