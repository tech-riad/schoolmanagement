<?php

namespace App\Models;

use App\Helper\Helper;
use App\Traits\FeesStatus;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Fees extends Model
{

    use HasFactory,FeesStatus;

    protected $guarded=[''];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();

        });
    }

    protected $appends = [
        'status'
    ];

    public function getStatusAttribute()
     {
        //dd($this->attributes);
        return $this->regularfees($this->attributes['id'],$this->attributes['month'],$this->attributes['year']);
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function feesType()
    {
        return $this->belongsTo(FeesType::class,'fees_type_id');
    }
    public function details()
    {
        return $this->hasMany(FeesDetail::class,'fees_id');
    }
    public function session()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
    public function class()
    {
        return $this->belongsTo(InsClass::class,'class_id');
    }
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function  feeDetails()
    {
        return $this->morphMany(FeesDetail::class, 'source');
    }

    public function transactionDetail()
    {
        return $this->morphOne(TransactionDetail::class, 'source');
    }

    public function  fees_received_details()
    {
        return $this->morphOne(StudentFeeReceivedDetail::class, 'source');
    }
}
