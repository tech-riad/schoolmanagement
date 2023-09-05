<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class InsClass extends Model
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

    protected $table = 'ins_classes';

    // public function subjects()
    // {
    //     return $this->hasMany(ClassSubject::class, 'ins_class_id')
    //         ->join('subjects', 'subjects.id', 'subject_id')
    //         ->select('subjects.sub_name', 'subjects.sub_code', 'subjects.id');
    // }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class,'class_subjects','ins_class_id')->using(ClassSubject::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class,'class_id');
    }
}
