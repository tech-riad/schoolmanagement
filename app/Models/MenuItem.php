<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MenuItem extends Model
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

    public function menu(){

        return $this->belongsTo(Menu::class);
    }

    public function childs(){

        return $this->hasMany(MenuItem::class,'parent_id','id');
    }
    public function parent(){

        return $this->belongsTo(MenuItem::class,'parent_id','id');
    }
}
