<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentMigrateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('student.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\olicy  $olicy
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
     * @param  \App\Models\olicy  $olicy
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
