<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('roles')->get();

        return view($this->backendTemplate['template']['path_name'].'.role-management.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view($this->backendTemplate['template']['path_name'].'.role-management.users.create',compact('roles'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'roles' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );

        return redirect()->route('role-management.users.index')
                        ->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view($this->backendTemplate['template']['path_name'].'.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view($this->backendTemplate['template']['path_name'].'.users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('users.index')
                        ->with($notification );
    }


    public function delete($id)
    {
        User::find($id)->delete();

        $notification = array(
            'message' =>'Action Successfull ',
            'alert-type' =>'success'
        );
        return redirect()->route('role-management.users.index')
                        ->with($notification);
    }
}
