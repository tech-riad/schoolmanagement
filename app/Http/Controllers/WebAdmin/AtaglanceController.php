<?php

namespace App\Http\Controllers\WebAdmin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Ataglance;
use Illuminate\Http\Request;

class AtaglanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ataglance = Ataglance::all();
       

        return view($this->backendTemplate['template']['path_name'] .'.webadmin.ataglance.index', compact('ataglance'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ataglance = Ataglance::all();
       
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.ataglance.create', compact('ataglance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ataglance = new Ataglance();

        $ataglance->content = $request->content;

        $ataglance->save();


        return redirect()->route('ataglance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ataglance  $ataglance
     * @return \Illuminate\Http\Response
     */
    public function show(Ataglance $ataglance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ataglance  $ataglance
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
        $ataglance = Ataglance::where('institute_id',Helper::getInstituteId())->first();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.ataglance.edit', compact('ataglance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ataglance  $ataglance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ataglance = Ataglance ::find($id);

        $ataglance->content=$request->content;

        $ataglance->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ataglance  $ataglance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $ataglance = Ataglance::find($id);
        // dd($ataglance);

        $ataglance->delete();

        return redirect()->route('ataglance.index')->with('success', 'Ataglance Updated Successfully!');
    }
}
