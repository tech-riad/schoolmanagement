<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class StudentUser extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guarded = ['id'];


    public function student(){
        return $this->belongsTo(Student::class);
    }
}
