<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\FrontSection;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $color =  Color::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.color.index',compact('color'));

    }
    public function create()
    {
        $frontsection = FrontSection::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.color.create',compact('frontsection'));

    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $color = new Color();

        $color->front_section_id    = $request->front_section_id;
        $color->color               = $request->color;
        $color->background_color    = $request->background_color;

        $color->save();

        return redirect()->back();

         

    }
    public function edit($id)
    {
        $color =  Color::with('frontsection')->findOrfail($id);
        // dd($color->id);
        return response()->json($color);

    }

    public function update(Request $request, Color $color)
    {
        // dd($request->all());

        // $color = Color::find($id);


        Color::findOrfail($request->color_id)->update([
            'color'  => $request->color,
            'background_color'  => $request->background_color,
        ]);


        // $color->color                = $request->color;
        // $color->background_color     = $request->background_color;

        // $color->save();

        return redirect()->back();

    }

   
}
