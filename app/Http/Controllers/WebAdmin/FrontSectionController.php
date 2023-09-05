<?php

namespace App\Http\Controllers\WebAdmin;

use App\Http\Controllers\Controller;
use App\Models\FrontSection;
use Illuminate\Http\Request;

class FrontSectionController extends Controller
{
    public function index(){
        $frontsection = FrontSection::all();
        return view($this->backendTemplate['template']['path_name'] .'.webadmin.color.create');
    }
}
