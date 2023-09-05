<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\SchoolInfo;
use Illuminate\Http\Request;

class SchoolInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        $info = SchoolInfo::orderBy('id','desc')->first();
        return view($backendTemplate .'.webadmin.schoolInfo.create',compact('info', 'backendTemplate'));
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
       //dd($request->all());
       $request->validate([
            'name'          => 'required',
            'eiin_no'       => 'required',
            'founded_at'    => 'required',
            'address'       => 'required',
            'about'         => 'required',
            'logo'          => 'sometimes',
            'school_photo'  => 'sometimes',
            'favicon'       => 'sometimes',
       ]);


        $info = SchoolInfo::findOrfail($id);

        if($request->logo){
            $imageName      = 'image_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/schoolInfo/'), $imageName);
            $info->logo    =$imageName;
        }else{
            $info->logo = $info->logo;
        }

        if($request->school_photo){
            $imageName      = 'image_'.time().'.'.$request->school_photo->extension();
            $request->school_photo->move(public_path('uploads/schoolInfo/'), $imageName);
            $info->school_photo    =$imageName;
        }else{
            $info->school_photo = $info->school_photo;
        }

        if($request->favicon){
            $imageName      = 'image_'.time().'.'.$request->favicon->extension();
            $request->favicon->move(public_path('uploads/schoolInfo/'), $imageName);
            $info->favicon    =$imageName;
        }else{
            $info->favicon = $info->favicon;
        }


        $info->name         = $request->name;
        $info->name         = $request->name;
        $info->eiin_no      = $request->eiin_no;
        $info->founded_at   = $request->founded_at;
        $info->about        = $request->about;
        $info->address      = $request->address;
        $info->googlemap      = $request->googlemap;
        $info->save();

        return redirect()->back();
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
