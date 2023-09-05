<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
   
    public function index()
    {
        $menus = Menu::latest('id')->get();
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.index', compact('menus'));
    }


    public function create()
    {
        
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.create');
    }


    public function store(Request $request){
        $this->validate($request,[
           'name' => 'required|unique:menus|min:3',
           'description' => 'nullable|min:3',
        ]);

        Menu::create([
           'name'=> Str::slug($request->name),
           'description'=> $request->description,
        ]);
        //notification
        $notification = array(
            'message' =>'Menu Added',
            'alert-type' =>'success'
        );
        return redirect()->route('menu.index')->with($notification);
    }

    public function edit($id){

        $menu = Menu::find($id);
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.create',compact('menu'));
    }
    public function update(Request $request,$id){
        $menu = Menu::find($id);
        $this->validate($request,[
            'name' => 'required|unique:menus,name,'.$menu->id,
            'description' => 'nullable|min:3',

        ]);

        $menu->name = Str::slug($request->name);
        $menu->description =$request->description;
        $menu->update();
        //notification
        $notification = array(
            'message' =>'Menu Update',
            'alert-type' =>'success'
        );
        return redirect()->route('menu.index')->with($notification);
    }

    public function delete($id){

        $menu = Menu::find($id);
        if ($menu->deleteable){
            $menu->delete();
        }
        else{
               //notification
                $notification = array(
                    'message' =>'Menu Cannot Delete',
                    'alert-type' =>'error'
                );
                return back()->with($notification);
        }
        //notification
        $notification = array(
            'message' =>'Menu Deleted',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }
}
