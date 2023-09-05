<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\FeesType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsFeesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feesType = FeesType::all();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.feestype.index',compact('feesType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.feestype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feesType = new FeesType ();
        $feesType->created_by=Auth::user()->id;
        $feesType->type=$request->type;
        
       

        $feesType->save();
        
       
        return redirect()->route('feestype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeesType  $feesType
     * @return \Illuminate\Http\Response
     */
    public function show(FeesType $feesType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeesType  $feesType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feesType = FeesType::find($id);
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.feestype.create', compact('feesType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeesType  $feesType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feesType = FeesType ::find($id);
        
        $feesType = new FeesType ();
        $feesType->created_by=Auth::user()->id;
        $feesType->type=$request->type;
        
       

        $feesType->save();
        
       
        return redirect()->route('feestype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeesType  $feesType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feesType = FeesType::find($id);
        
        $feesType->delete();

        return redirect()->route('feestype.index');
    }
}
