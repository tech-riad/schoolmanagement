<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsOrder extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function package(){
        return $this->belongsTo(SellerSmsPackage::class,'seller_sms_package_id','id');
    }
}
