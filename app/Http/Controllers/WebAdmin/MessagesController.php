<?php

namespace App\Http\Controllers\WebAdmin;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Messages;
use Illuminate\Support\Str;
use App\Traits\FileSaver;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Messages::where('institute_id',Helper::getInstituteId())->get();
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'designation'  => 'required',
            'title'        => 'required',
            'slug'         => 'required',
            'content'      => 'required',
            'image'        => 'required',
        ]);

        $message = new Messages();

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$message,'image','message');
        }

        $message->messager_name=$request->name;
        $message->messager_designation=$request->designation;
        $message->title=$request->title;
        $message->slug=Str::slug($request->slug);
        $message->content=$request->content;
        if($request->status == 1){
            $message->status = true ;
        }else{
            $message->status = false;
        }
        $message->save();

        return redirect()->route('message.index')->with('success','messages created successfully!');
    }


    public function messageSlugGet($id)
    {
        return Messages::find($id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $message = Messages::findOrfail($id);
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.message.create', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        $request->validate([
            'name'         => 'required',
            'designation'  => 'required',
            'title'        => 'required',
            'slug'         => 'required',
            'content'      => 'required',
        ]);


        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$messages,'image','message');
        }else{
            $messages->image = $messages->image;
        }

        $messages->messager_name=$request->name;
        $messages->messager_designation=$request->designation;
        $messages->title=$request->title;
        $messages->slug=Str::slug($request->slug);
        $messages->content=$request->content;
        if($request->status == 1){
            $messages->status = true ;
        }else{
            $messages->status = false;
        }

        $messages->save();

        return redirect()->route('message.index')->with('success','messages created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        unlink(public_path('uploads/messages/'.$messages->image));
        $messages->delete();
        return redirect()->back()->with('success','Brand deleted successfully!');
    }
}
