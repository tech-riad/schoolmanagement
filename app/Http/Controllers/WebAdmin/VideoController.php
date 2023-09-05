<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $video = Video::all();

        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate .'.webadmin.video.index', compact('video','backendTemplate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = Video::all();
        // dd($video);
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate .'.webadmin.video.create',compact('videos'));
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
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
        ]);

        $video = new video();


        if(@$request['thumbnail']){
            $this->uploadFileLinode($request['thumbnail'],$video,'thumbnail','video');
        }

        $video->date=date('Y-m-d', strtotime($request->date));
        $video->title=$request->title;
        $video->code=$request->code;
        $video->type=$request->type;

        $video->description=$request->description;

        if( $request->status == 1){
            $video->status = true;
        }else{
            $video->status = false;
        }




        $video->save();


        return redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        $video = Video::find($id);
        return view($backendTemplate .'.webadmin.video.create', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $video = Video::find($id);

        if(@$request['thumbnail']){
            $this->uploadFileLinode($request['thumbnail'],$video,'thumbnail','video');
        }else{
            $video->thumbnail = $video->thumbnail;
        }

        $video->date = $request->date;
        $video->title = $request->title;

        $video->code = $request->code;
        $video->type = $request->type;

        $video->description = $request->description;

        if( $request->status == 1){
            $video->status = true;
        }else{
            $video->status = false;
        }




        $video->save();


        return redirect()->route('video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id);
        @unlink(public_path('uploads/videothumbnail/'.$video->thumbnail));
        $video->delete();

        return redirect()->route('video.index')->with('success', 'video Updated Successfully!');
    }
}
