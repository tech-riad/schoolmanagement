<?php

namespace App\Http\Controllers\WebAdmin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Sociallink;
use Illuminate\Http\Request;

class SociallinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sociallink = Sociallink::all();
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.webadmin.sociallink.index', compact('sociallink'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
       
        return view ($backendTemplate.'.webadmin.sociallink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sociallink = new Sociallink();

        $sociallink->facebook=$request->facebook;
        $sociallink->linkedin=$request->linkedin;
        $sociallink->twitter=$request->twitter;
        $sociallink->youtube=$request->youtube;


        $sociallink->save();


        return redirect()->route('sociallink.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function show(Sociallink $sociallink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {   
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        $sociallink = Sociallink::where('institute_id',Helper::getInstituteId())->first();
        return view($backendTemplate.'.webadmin.sociallink.create', compact('sociallink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sociallink = Sociallink::find($id);

        $sociallink->facebook=$request->facebook;
        $sociallink->linkedin=$request->linkedin;
        $sociallink->twitter=$request->twitter;
        $sociallink->youtube=$request->youtube;


        $sociallink->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sociallink  $sociallink
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sociallink = Sociallink::find($id);

        $sociallink->delete();

        return redirect()->route('sociallink.index')->with('success', 'sociallink Updated Successfully!');
    }
}
