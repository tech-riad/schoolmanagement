<?php

namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;

use App\Models\InsClass;
use App\Models\Shift;
use App\Models\Category;
use App\Models\Section;
use App\Models\Group;
use App\Http\Requests\StoreInsClassRequest;
use App\Http\Requests\UpdateInsClassRequest;
use App\Models\AdmissionGrade;
use App\Models\ClassSubject;
use App\Models\GeneralGrade;
use App\Models\Session;
use App\Models\TestGrade;
use Illuminate\Http\Request;

class InsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sessions = Session::all();
        $classes = InsClass::orderBy('id','ASC')->get();
        return view($this->backendTemplate['template']['path_name'].'.insclass',compact('classes','sessions'));
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


    public function store(Request $request)
    {
        $request->validate([
            'name'  =>'required',
        ]);

       $class = InsClass::create([
            'session_id'    => $request->session_id,
            'name'          => $request->name,
            'code'          => rand(10,5000),
        ]);

       $shift = Shift::create([
            'ins_class_id'  => $class->id,
            'name'          => 'Day'
        ]);

        Category::create([
            'ins_class_id'  => $class->id,
            'shift_id'      => $shift->id,
            'name'          => 'BN Version'
        ]);

        Section::create([
            'ins_class_id'  => $class->id,
            'shift_id'      => $shift->id,
            'name'          => 'A'
        ]);

        Group::create([
            'ins_class_id'  => $class->id,
            'shift_id'      => $shift->id,
            'name'          => 'Common'
        ]);

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('classes.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InsClass  $insClass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $shifts     = Shift::where('ins_class_id',$id)->get();
        $class      = InsClass::where('id',$id)->first();
        $class_name = InsClass::find($id);

        return view($this->backendTemplate['template']['path_name'].'.class-config')->with([
            'id'         => $id,
            'class_name' => $class_name,
            'class'      => $class,
            'shifts'     => $shifts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InsClass  $insClass
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = InsClass::with('session')->findOrfail($id);
        return response()->json($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInsClassRequest  $request
     * @param  \App\Models\InsClass  $insClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InsClass $insClass)
    {
       // return $request->all();
        InsClass::findOrfail($request->class_id)->update([
            'name'  => $request->name,
        ]);

        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('classes.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InsClass  $insClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InsClass::findOrfail($id)->delete();

        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('classes.index')->with($notification);
    }
}
