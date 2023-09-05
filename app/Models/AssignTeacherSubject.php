<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class AssignTeacherSubject extends Pivot
{
    use HasFactory;
    protected $guarded=['id'];
   

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function class()
    {
        return $this->belongsTo(InsClass::class, 'class_id', 'id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
