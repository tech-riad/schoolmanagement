<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getDistrictByDivisionId($id)
    {
        $districts = Division::with('districts')->where('id',$id)->first();
        return response()->json($districts);
    }
    
    public function getUpazilaByDistrictId($id)
    {
        $upazilas = District::with('upazilas')->where('id',$id)->first();
        return response()->json($upazilas);
    }
}
