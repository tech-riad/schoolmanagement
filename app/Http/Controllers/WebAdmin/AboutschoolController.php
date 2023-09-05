<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Aboutschool;
use Illuminate\Http\Request;

class AboutschoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $aboutschool = Aboutschool::all();

        return view($this->backendTemplate['template']['path_name'] .'.webadmin.aboutschool.index', compact('aboutschool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.aboutschool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aboutschool = new Aboutschool();

        $aboutschool->content=$request->content;
        $aboutschool->link=$request->link;

        $aboutschool->save();


        return redirect()->route('aboutschool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aboutschool  $aboutschool
     * @return \Illuminate\Http\Response
     */
    public function show(Aboutschool $aboutschool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutschool  $aboutschool
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $aboutschool = Aboutschool::find($id);
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.aboutschool.create', compact('aboutschool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutschool  $aboutschool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aboutschool = Aboutschool::find($id);
        $aboutschool->content     =$request->content;
        $aboutschool->link        =$request->link;

        $aboutschool->save();


        return redirect()->route('aboutschool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutschool  $aboutschool
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $aboutschool = Aboutschool::find($id);

        $aboutschool->delete();

        return redirect()->route('aboutschool.index')->with('success', 'Aboutschool Updated Successfully!');
    }
}
