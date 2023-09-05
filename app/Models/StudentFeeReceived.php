<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentFeeReceived extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();
        });
    }

    public function fee_received_details()
    {
        return $this->hasMany(StudentFeeReceivedDetail::class);
    }

    public function transaction()
    {

        return $this->morphOne(Transaction::class, 'source');
    }
}
