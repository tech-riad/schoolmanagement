<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FeesDetail extends Model
{
    use HasFactory;
    protected $fillable = ['fees_id','head','amount'];
    protected $guarded=['id'];

    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id = Helper::getInstituteId();
        });
    }

    public function source()
    {
        return $this->morphTo();
    }

}
