<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        $page = Page::all();
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.webadmin.page.index', compact('page','news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view($backendTemplate.'.webadmin.page.create');
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
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|unique:pages',
            'content'   => 'required',
        ]);

        $page = new Page();
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/pageimages'), $imageName);
            $page->image=$imageName;
        }

        $page->title=$request->title;
        $page->slug=Str::slug($request->title);
        $page->content=$request->content;

        $page->save();


        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $page = Page::where('slug',$slug)->first();
       return view('website.page',compact('page'));
    }

    public function adminshow(Page $page)
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        return view( $backendTemplate.'.webadmin.page.show',compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $backendTemplate = $this->backendTemplate['template']['path_name'] ;
        $page = Page::find($id);
        return view( $backendTemplate.'.webadmin.page.create', compact('page','backendTemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $page = Page ::find($id);
        if($request->image){
            $imageName = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/pageimages'), $imageName);
            $page->image=$imageName;
        }

        $page->title=$request->title;
        $page->slug=Str::slug($request->slug);
        $page->content=$request->content;
        $page->save();


        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        @unlink(public_path('uploads/pageimages/'.$page->image));
        $page->delete();

        return redirect()->route('page.index')->with('success', 'Page Updated Successfully!');
    }
}
