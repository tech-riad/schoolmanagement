<?php

namespace App\Http\Controllers\Ins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Institute\InstituteInterface;

class InstitutionController extends Controller
{
    protected $institute;

    public function __construct(InstituteInterface $instituteInterface)
    {
        $this->institute = $instituteInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->institute->index();
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
        return $this->institute->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\olicy  $olicy
     * @param  \{{ namespacedModel }}  ${{ modelVariable }}
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->institute->show($id);
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
    public function update($id)
    {
        return $this->institute->update($id, request()->all());
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
