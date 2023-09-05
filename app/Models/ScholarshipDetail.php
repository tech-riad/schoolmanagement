<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function fees(){
        return $this->belongsTo(Fees::class);
    }

}
