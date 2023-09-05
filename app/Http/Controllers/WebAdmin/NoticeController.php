<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $notices = Notice::all();
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $request->validate([
            
            'title' => 'required',
            'content' => 'required',
        ]);
        $notice = new Notice();
        $notice->title      = $request->title;
        $notice->slug       = Str::slug($request->title);
        $notice->content    = $request->content;
        
        if($notice->status == 1){
            $notice->status = true;
        }else{
            $notice->status = false;
        }

        $notice->save();

        return redirect()->route('notice.index')->with('success','Notice created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.notice.create', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
       // return $request;
        $notice->title      = $request->title;
        $notice->slug       = Str::slug($request->title);
        $notice->content    = $request->content;
        
        if($request->status == 1){
            $notice->status = true;
        }else{
            $notice->status = false;
        }

        $notice->save();

        return redirect()->route('notice.index')->with('success','Notice created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->back()->with('success','Brand deleted successfully!');
    }
}
