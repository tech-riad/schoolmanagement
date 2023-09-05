<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Traits\FileSaver;

class EventController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();

       
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.event.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);

        $event = new Event();

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$event,'image','event');
        }

        $event->title       = $request->title;
        $event->event_date  = $request->event_date;
        $event->slug        = Str::slug($request->title);
        $event->description = $request->description;

        if($request->status == 1){
            $event->status  = true;
        }else{
            $event->status  = false;
        }

        $event->save();
        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.event.create', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $event = Event ::find($id);
        if(@$request['image']){

            $this->uploadFileLinode($request['image'],$event,'image','event');
            
        }else{
            $event->image = $event->image;
        }

        $event->title=$request->title;
        $event->event_date=$request->event_date;
        $event->slug=Str::slug($request->slug);
        $event->description=$request->description;

        if($request->status == 1){
            $event->status  = true;
        }else{
            $event->status  = false;
        }

        $event->save();

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        @unlink(public_path('uploads/eventimages/'.$event->image));
        $event->delete();

        return redirect()->route('event.index')->with('success', 'event Updated Successfully!');
    }
}
