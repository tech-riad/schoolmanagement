<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class TeacherUser extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
