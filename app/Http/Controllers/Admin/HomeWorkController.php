<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsClass;
use App\Models\Section;
use App\Models\Session;
use Illuminate\Http\Request;

class HomeWorkController extends Controller
{
    public function index()
    {
        $academic_years = Session::all();
        $sections = Section::all();
        return view($this->backendTemplate['template']['path_name'].'.homework.index',compact('academic_years','sections'));
    }
}
