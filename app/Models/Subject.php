<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id = Helper::getInstituteId() ?? Auth::user()->institute_id;
        });
    }

    public function classes(){
        // $this->hasMany(ClassSubject::class, 'subject_id')
        // ->join('ins_classes', 'ins_classes.id', 'ins_class_id');
        return $this->belongsToMany(InsClass::class,'class_subjects');
    }

    public function examRoutines()
    {
        return $this->belongsToMany(ExamRoutine::class);
    }
}
