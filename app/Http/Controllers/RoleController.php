<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
//    function __construct()
//    {
//         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
//         $this->middleware('permission:role-create', ['only' => ['create','store']]);
//         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
//    }


    public function index(Request $request)
    {
        $roles = Role::with('permissions')->orderBy('id','DESC')->get();
        return view($this->backendTemplate['template']['path_name'].'.role-management.roles.index',compact('roles'));
    }


    public function create()
    {
        $permissions = Permission::get();
        return view($this->backendTemplate['template']['path_name'].'.role-management.roles.create',compact('permissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:institute_roles,name',
            'permissions' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        $notification = array(
            'message' =>'Role Create Successfully ',
            'alert-type' =>'success'
        );
        return redirect()->route('role-management.roles.index')->with($notification);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
//        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
//            ->where("role_has_permissions.role_id",$id)
//            ->get();

        return view($this->backendTemplate['template']['path_name'].'.roles.show',compact('role'));
    }


    public function edit($id)
    {
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::get();
        return view($this->backendTemplate['template']['path_name'].'.role-management.roles.create',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permissions' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('role-management.roles.index')->with($notification);
    }

    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();

        $notification = array(
            'message' =>'Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('roles.index')
                        ->with($notification);
    }

    public function delete($id){
        $role = Role::find($id);
        $role->delete();

        $notification = array(
            'message' =>'Role Delete Succesfully',
            'alert-type' =>'success'
        );
        return redirect()->back()
            ->with($notification);

    }
}
