<?php

namespace App\Models;

use App\Helper\Helper;
use App\Scopes\InstituteScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Website extends Model
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

    public function period()
    {
        return $this->belongsTo(PeriodTime::class, 'period_time_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function insclass(){
        return $this->belongsTo(InsClass::class,'ins_class_id','id');
    }
    public function sociallink(){
        return $this->belongsTo(Sociallink::class,'sociallink_id','id');
    }

    public function frontsection(){
        return $this->belongsTo(FrontSection::class,'front_section_id','id');
    }


}
