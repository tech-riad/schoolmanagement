<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ExamRoutine extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected static function booted()
    {
        static::addGlobalScope(new InstituteScope);
        static::creating(function ($item) {
            $item->institute_id =  Helper::getInstituteId();

        });
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'exam_routine_subjects')->withPivot('date','start_time','end_time','room');
    }


    public function class()
    {
        return $this->belongsTo(InsClass::class,'ins_class_id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
