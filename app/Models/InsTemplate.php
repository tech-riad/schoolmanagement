<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsTemplate extends Model
{
    use HasFactory;
    protected  $table = 'ins_templates';

    protected  $guarded = ['id'];

}
