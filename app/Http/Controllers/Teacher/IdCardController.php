<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Designation;
use App\Models\Session;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    public function index()
    {

        $designations  = Designation::all();
        $branches      = Branch::all();
        return view($this->backendTemplate['template']['path_name'].'.teachers.id-card.index', compact('designations', 'branches'));
    }


    public function view($id)
    {
        $teacher = Teacher::find($id);
        return view($this->backendTemplate['template']['path_name'].'.teachers.id-card.view', compact('teacher'));
    }


    public function downloadCard($id){

        $teacher = Teacher::find($id);
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.teachers.id-card.download-pdf', compact('teacher'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('teacher-'.$teacher->id_no.'-id-card.pdf');
    }
}
