<?php

namespace App\Traits;

use App\Models\StudentFeeReceived;
use Illuminate\Support\Facades\Auth;

trait FeesStatus
{


    public function regularfees($id, $month, $year)
    {
        if(Auth::guard('student')->check()){
            $feeReceived = StudentFeeReceived::where('student_id',Auth::guard('student')->user()->student_id)->where('month', $month)->where('year', $year)->whereHas('fee_received_details', function ($q) use ($id) {
                return $q->where('source_type', 'App\Models\Fees')->where('source_id', $id);
            })->get();
        }
        else{
            $feeReceived = StudentFeeReceived::where('month', $month)->where('year', $year)->whereHas('fee_received_details', function ($q) use ($id) {
                return $q->where('source_type', 'App\Models\Fees')->where('source_id', $id);
            })->get();
        }


        if ($feeReceived->count() > 0) {
            return "paid";
        } else {
            return "unpaid";
        }
    }


    public function studentfees($id, $month, $year)
    {
        if(Auth::guard('student')->check()){
            $feeReceived = StudentFeeReceived::where('student_id',Auth::guard('student')->user()->student_id)->where('month', $month)->where('year', $year)->whereHas('fee_received_details', function ($q) use ($id) {
                return $q->where('source_type', 'App\Models\StudentFees')->where('source_id', $id);
            })->get();
        }
        else{
            $feeReceived = StudentFeeReceived::where('month', $month)->where('year', $year)->whereHas('fee_received_details', function ($q) use ($id) {
                return $q->where('source_type', 'App\Models\StudentFees')->where('source_id', $id);
            })->get();
        }


        if ($feeReceived->count() > 0) {
            return "paid";
        } else {
            return "unpaid";
        }
    }
}
