<?php

namespace App\Http\Controllers\SoftwareSettings;
use App\Http\Controllers\Controller;

use App\Helper\Helper;
use App\Models\IdcardTheam;
use App\Models\Institution;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IdcardThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theams     = IdcardTheam::all();
        $institute = Institution::find(Helper::getInstituteId())->first();
        
        return view($this->backendTemplate['template']['path_name'].'.software-settings.idcard-theme.edit',compact('theams','institute'));
    }

    public function theamUpdate($id)
    {
        $institute = Institution::find(Helper::getInstituteId())->first();
        $institute->update([
            'idcard_theam_id' => $id
        ]);

        return $institute;
    }

    public function demoDownloadFront($id)
    {
        $idcardTheam = $id;

       if($idcardTheam == 1){
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-1')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($idcardTheam == 2) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-2')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($idcardTheam == 3) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-front-3')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }

        $pdf->set_paper('letter', 'portrait');
        return $pdf->download('front-' . 1001 . '-id-card.pdf');
    }

    public function demoDownloadBack($id)
    {
        $idcardTheam = $id;

       if($idcardTheam == 1){
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-1')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($idcardTheam == 2) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-2')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }elseif ($idcardTheam == 3) {
            $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.academic.id-card.download-pdf-back-3')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        }

        $pdf->set_paper('letter', 'portrait');
        return $pdf->download('back-' . 1001 . '-id-card.pdf');
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
    public function edit($id)
    {
        //
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
        //
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
