<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\InsClass;
use App\Models\Shift;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $class_name = InsClass::find($id);
        $categories = Category::where('ins_class_id',$id)->get();
        $shifts = Shift::where('ins_class_id',$id)->get();
        return view($this->backendTemplate['template']['path_name'].'.class_config.category',compact('categories','id','shifts','class_name'));
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
        $category = new Category;
        $category->shift_id = $request->shift_id;
        $category->name = $request->name;
        $category->ins_class_id = $request->ins_class_id;
        $category->save();
        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::with('shift')->findOrfail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request->all();
        $category = Category::findOrfail($request->category_id)->update([
            'shift_id'  => $request->shift_id,
            'name'      => $request->name
        ]);

        $notification = array(
            'message' =>'Update Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrfail($id)->delete();

        $notification = array(
            'message' =>'Delete Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }
}
