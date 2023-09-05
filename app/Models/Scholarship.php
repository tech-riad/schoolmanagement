<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }


    public function fees_type(){
        return $this->belongsTo(FeesType::class);
    }
}
