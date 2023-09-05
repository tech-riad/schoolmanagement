<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use App\Traits\FileSaver;

class NewsController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.news.index', compact('news'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.news.create');
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

        $news = new News();

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$news,'image','news');
        }


        $news->title = $request->title;
        $news->published_date=date('Y-m-d', strtotime($request->published_date));
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;

        if($request->status == 1){
            $news->status  = true;
        }else{
            $news->status  = false;
        }

        $news->save();
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.news.create', compact('news'));
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
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news = News ::find($id);

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$news,'image','news');
        }

        $news->title=$request->title;
        $news->published_date=$request->published_date;
        $news->slug=Str::slug($request->slug);
        $news->description=$request->description;

        if($request->status == 1){
            $news->status  = true;
        }else{
            $news->status  = false;
        }

        $news->save();

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        @unlink(public_path('uploads/newsimages/'.$news->image));
        $news->delete();

        return redirect()->route('news.index')->with('success', 'news Updated Successfully!');
    }
}
