<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AssignTeacher extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id = Helper::getInstituteId();

        });
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }


    public function ins_class()
    {
        return $this->belongsTo(InsClass::class,'class_id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->using(AssignTeacherSubject::class);;
    }
}
