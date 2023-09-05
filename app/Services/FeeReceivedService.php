<?php

namespace App\Services;

use App\Models\Fees;
use App\Models\StudentFeeReceived;
use App\Models\StudentFees;
use Illuminate\Http\Request;

class FeeReceivedService{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /*
    |--------------------------------------------------------------------------
    | GET REGULAR FEES SUM
    |--------------------------------------------------------------------------
    */
    public function getRegularFees($student)
    {
        $fees = Fees::where('class_id', $student->class_id)
                ->where('category_id', $this->request->category_id)
                ->where('month', $this->request->month)
                ->sum('total_amount');
        return $fees;
    }
    /*
    |--------------------------------------------------------------------------
    | GET STUDENT FEES SUM
    |--------------------------------------------------------------------------
    */
    public function getStudentFees($student)
    {
        $fees = StudentFees::where('student_id', $student->id)->where('month', $this->request->month)->sum('total_amount');
        return $fees;
    }
    /*
    |--------------------------------------------------------------------------
    | Check Student Payment Status
    |--------------------------------------------------------------------------
    */
    public function checkPaymentStatus($student)
    {
        $year = date('Y');
        $feeReceived = StudentFeeReceived::where('year',$year)->where('student_id',$student->id)->where('month',$this->request->month)->get();
        if($feeReceived->count() > 0){
            return "Paid";
        }
        else{
            return "Unpaid";
        }
    }
}

