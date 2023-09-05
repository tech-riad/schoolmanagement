<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Institutephoto;
use Illuminate\Http\Request;

class InstitutephotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutephoto = Institutephoto::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.institutephoto.index', compact('institutephoto'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.institutephoto.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',



        ]);

        $institutephoto = new institutephoto();
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/institutephoto'), $imageName);
            $institutephoto->image=$imageName;
        }

        $institutephoto->title=$request->title;
        $institutephoto->sl_no=$request->sl_no;
        if($request->status == 1){
            $institutephoto->status  = true;
        }else{
            $institutephoto->status  = false;
        }




        $institutephoto->save();


        return redirect()->route('institutephoto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Institutephoto  $institutephoto
     * @return \Illuminate\Http\Response
     */
    public function show(Institutephoto $institutephoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Institutephoto  $institutephoto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institutephoto = Institutephoto::find($id);
        
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.institutephoto.create', compact('institutephoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Institutephoto  $institutephoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $institutephoto = Institutephoto ::find($id);
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/institutephoto'), $imageName);
            $institutephoto->image=$imageName;
        }

        $institutephoto->title=$request->title;
        $institutephoto->sl_no=$request->sl_no;
        if($request->status == 1){
            $institutephoto->status  = true;
        }else{
            $institutephoto->status  = false;
        }




        $institutephoto->save();


        return redirect()->route('institutephoto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Institutephoto  $institutephoto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $institutephoto = Institutephoto::find($id);
        @unlink(public_path($institutephoto->image));
        $institutephoto->delete();

        return redirect()->route('institutephoto.index')->with('success', 'Institutephoto Updated Successfully!');
    }
}
