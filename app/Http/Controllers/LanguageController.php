<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public  function  changeLang(Request $request){
        session()->put('locale', $request->lang);
        return response()->json(['status'=>200]);
    }
}
