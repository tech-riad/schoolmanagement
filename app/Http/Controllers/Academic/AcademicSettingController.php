<?php

namespace App\Http\Controllers\Academic;

use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Models\AcademicSetting;
use Illuminate\Http\Request;
use App\Traits\FileSaver;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AcademicSettingController extends Controller
{
    use FileSaver;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=AcademicSetting::all();
        return view($this->backendTemplate['template']['path_name'].'.academic.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $setting=AcademicSetting::where('institute_id',Helper::getInstituteId())->first();
        return view($this->backendTemplate['template']['path_name'].'.academic.setting.edit',compact('setting'));
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
           'school_name'                       => 'required',
           'admit_content'                     => 'required',
           'id_card_content'                   => 'required',
           'transfer_certificate_content'      => 'required',
           'testimonial_content'               => 'required',
           'signText'                          => 'required',
           'qrcode'                            => 'required',
       ]);

        $setting = AcademicSetting::find($id);

        if(@$request['image']){
            $this->uploadFileLinode($request['image'],$setting,'image','schoolInfo');
        }

        if(@$request['signImage']){
            $this->uploadFileLinode($request['signImage'],$setting,'signImage','schoolInfo');
        }

        if (extension_loaded('imagick')) {
            QrCode::format('png')->generate($request->qrcode, public_path('academic/qrcode/'.Helper::getInstituteId().'_qrcode.png'));
        }


        $setting->admit_content                    = $request->admit_content;
        $setting->id_card_content                  = $request->id_card_content;
        $setting->school_name                      = $request->school_name;
        $setting->testimonial_content              = $request->testimonial_content;
        $setting->transfer_certificate_content     = $request->transfer_certificate_content;
        $setting->signText                         = $request->signText;
        $setting->qrcode                           = $request->qrcode;

        $setting->save();
       //notification

        if (extension_loaded('imagick')) {
            $notification = array(
                'message' =>'Update Successfully ',
                'alert-type' =>'success'
            );
        }
        else{
            $notification = array(
                'message' =>'Update Successfully But Imagic Extension Not Loaded',
                'alert-type' =>'error'
            );
        }


        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
