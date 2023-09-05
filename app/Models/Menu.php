<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=['id'];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();

        });
    }

    protected $table='institute_menus';

    public function menuItems(){

        return $this->hasMany(MenuItem::class)->doesntHave('parent')->orderBy('order');
    }
}
