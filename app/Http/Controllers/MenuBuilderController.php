<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Messages;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{
    public function index($id){
        $menu = Menu::find($id);
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.builder',compact('menu'));
    }

    public function order(Request $request,$id){
        $menuItemOrder = json_decode($request->get('order'));
        $this->ordermenu($menuItemOrder,null);
    }

    private function ordermenu(array $menuItems, $parentId){
        foreach ($menuItems as $index => $item){
            $menuItem = MenuItem::findOrFail($item->id);

            $menuItem->update([
               'order'     => $index+1,
               'parent_id' => $parentId
            ]);
            if(isset($item->children)){
                $this->ordermenu($item->children,$menuItem->id);
            }
        }
    }


    public function itemCreate($id){
        $menu = Menu::find($id);
        $messages = Messages::where('status',1)->get();
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.item.create',compact('menu','messages'));
    }

    public function itemStore(Request $request,$id){

        $this->validate($request,[
            'title' => 'required|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
        ]);
        $menu = Menu::find($id);

        $menu->menuItems()->create([
            'title'=> $request->title,
            'url'=> $request->url,
            'target'=> $request->target,
        ]);
        //notification
        $notification = array(
            'message' =>'Menu Item Added',
            'alert-type' =>'success'
        );
        return redirect()->route('menu.builder',$menu->id)->with($notification);
    }

    public function itemEdit($id,$itemId){

        $menu = Menu::find($id);
        $messages = Messages::where('status',1)->get();
        $menuItem = MenuItem::where('menu_id',$menu->id)->findOrFail($itemId);
        return view($this->backendTemplate['template']['path_name'].'.webadmin.menu.item.create',compact('menu','menuItem','messages'));
    }
    public function itemUpdate(Request $request,$id,$itemId){

        $this->validate($request,[
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
        ]);

        $menu = Menu::find($id);

        MenuItem::where('menu_id',$menu->id)->findOrfail($itemId)->update([
            'title'=> $request->title,
            'url'=> $request->url,
            'target'=> $request->target,
        ]);
        //notification
        $notification = array(
            'message' =>'Menu Item Updated',
            'alert-type' =>'success'
        );
        return redirect()->route('menu.builder',$menu->id)->with($notification);
    }

    public function itemDelete($id,$itemId){
        MenuItem::where('menu_id',$id)->findOrfail($itemId)->delete();
        //notification
        $notification = array(
            'message' =>'Menu Item Deleted',
            'alert-type' =>'success'
        );
        return back()->with($notification);
    }
}
