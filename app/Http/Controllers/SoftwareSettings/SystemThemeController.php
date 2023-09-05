<?php

namespace App\Http\Controllers\SoftwareSettings;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\InsTemplate;
use App\Models\Institution;
use App\Models\InstitutionTemplate;
use Illuminate\Http\Request;

class SystemThemeController extends Controller
{
    public  function  index(){
        $templates = InsTemplate::all();
        $ins_template = InstitutionTemplate::where('institution_id',Helper::getInstituteId())->first();
        return view($this->backendTemplate['template']['path_name'].'.software-settings.system-theme.index',compact('templates','ins_template'));
    }

    public function theamUpdate($id)
    {

       $ins_theme =  InstitutionTemplate::where('institution_id',Helper::getInstituteId())->first();

        if($ins_theme){
            $ins_theme->delete();
        }

        InstitutionTemplate::updateOrcreate([
            'institution_id' => Helper::getInstituteId(),
            'template_id' => $id,
        ]);

        
    }
}
