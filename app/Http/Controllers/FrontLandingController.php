<?php

namespace App\Http\Controllers;

use App\Models\FrontLanding;
use Illuminate\Http\Request;

class FrontLandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
     * @param  \App\Models\FrontLanding  $frontLanding
     * @return \Illuminate\Http\Response
     */
    public function show(FrontLanding $frontLanding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontLanding  $frontLanding
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontLanding $frontLanding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontLanding  $frontLanding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontLanding $frontLanding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontLanding  $frontLanding
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontLanding $frontLanding)
    {
        //
    }
}
