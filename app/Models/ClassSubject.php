<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class ClassSubject extends Pivot
{
    use HasFactory;

    // protected $fillable = ['ins_class_id','subject_id'];

    protected $table = 'class_subjects';
    protected $guarded = ['id'];


    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function subjectType(){
        return $this->belongsTo(SubjectType::class);
    }

}
