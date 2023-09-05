<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();

        });
    }

    public function frontsection(){
        return $this->belongsTo(FrontSection::class,'front_section_id','id');
    }
  
}
