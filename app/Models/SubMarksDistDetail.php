<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMarksDistDetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function subMarkDistType(){
        return $this->belongsTo(SubMarksDistType::class,'sub_marks_dist_type_id','id');
    }
}
