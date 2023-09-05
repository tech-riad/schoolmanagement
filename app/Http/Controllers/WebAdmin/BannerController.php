<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\FileSaver;

class BannerController extends Controller
{
    use FileSaver;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ($this->backendTemplate['template']['path_name'] .'.webadmin.banner.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagetitle' => 'required',
            'description' => 'required',
        ]);

        $banner = new Banner();

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$banner,'image','banner',1200,700);
        }

        $banner->imagetitle     = $request->imagetitle;
        $banner->slug           = Str::slug($request->imagetitle);
        $banner->description    = $request->description;
        $banner->sl_no          = $request->sl_no;

        if( $request->status == 1){
            $banner->status = true;
        }else{
            $banner->status = false;
        }

        $banner->save();

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return array('success'=> 200, 'data'=>$banner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $banner = Banner::find($id);
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.banner.create', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $banner = Banner::find($id);
        if(@$request['image']){
            $this->uploadFileLinode($request['image'], $banner,'image','banner',1200,700);
        }

        // dd($banner, $request->all());
        $banner->imagetitle=$request->imagetitle;
        $banner->slug=Str::slug($request->imagetitle);
        $banner->description=$request->description;
        $banner->sl_no=$request->sl_no;

        if( $request->status == 1){
            $banner->status = true;
        }else{
            $banner->status = false;
        }

        $banner->save();


        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        @unlink(public_path('uploads/bannerimages/'.$banner->image));
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner Updated Successfully!');
    }
}
