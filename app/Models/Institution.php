<?php

namespace App\Models;

use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Institution extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'institutes';

    public function package()
    {
        return $this->belongsTo(InstitutionPackage::class,'institution_package_id','id');
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

//    public  function  template(){
//        return $this->belongsTo(InstitutionTemplate::class,'institution_id', 'id')
//            ->leftjoin('ins_templates', 'ins_templates.id', 'institution_template.template_id')->first();
//    }

    public  function  backendTemplate(){
        return $this->belongsToMany(BackendTemplate::class,'backend_template_institution');
    }
}
