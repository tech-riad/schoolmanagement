<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubjectAssign extends Model
{
    use HasFactory;
    protected $guarded =['id'];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function classSubjects(){
        return $this->belongsTo(ClassSubject::class,'class_subject_id','id');
    }
}
