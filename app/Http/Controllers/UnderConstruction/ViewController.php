<?php

namespace App\Http\Controllers\UnderConstruction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        return view('underconstructionView');
    }


    public function expired(){
        return view('expired');
    }
    public function underReview(){
        return view('underrivew');
    }
}
