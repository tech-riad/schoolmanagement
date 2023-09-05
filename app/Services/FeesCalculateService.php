<?php

namespace App\Services;

use App\Models\Fees;
use App\Models\StudentFees;

class FeesCalculateService{


    public function regular_fees($student,$month){

        $fees = Fees::with('feeDetails')->where('class_id', $student->class_id)
                ->where('category_id', $student->category_id)
                ->where('month', $month)
                ->get();
        return $fees;

    }


    public function student_fees($student,$month){
        $fees = StudentFees::with('feeDetails')->where('student_id', $student->id)->where('month',$month)->get();
        return $fees;
    }

}
