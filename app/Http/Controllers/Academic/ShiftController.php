<?php
namespace App\Http\Controllers\Academic;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Section;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        // return $request->all();
        $request->validate([
            'name'  => 'required'
        ]);

        $shift = new Shift;
        $shift->ins_class_id = $request->ins_class_id;
        $shift->name = $request->name;
        $shift->save();

        Category::create([
            'ins_class_id'  => $shift->ins_class_id,
            'shift_id'      => $shift->id,
            'name'          => 'BN Version'
        ]);

        Section::create([
            'ins_class_id'  => $shift->ins_class_id,
            'shift_id'      => $shift->id,
            'name'          => 'A'
        ]);

        Group::create([
            'ins_class_id'  => $shift->ins_class_id,
            'shift_id'      => $shift->id,
            'name'          => 'Common'
        ]);

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shift = Shift::findOrfail($id);
        return response()->json($shift);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       // return $request->all();
        $shift = Shift::findOrfail($request->shift_id);
        $shift->name = $request->name;
        $shift->save();

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Shift::findOrfail($id)->delete();

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
