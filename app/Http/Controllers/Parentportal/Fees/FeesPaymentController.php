<?php

namespace App\Http\Controllers\Parentportal\Fees;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Fees;
use App\Models\Student;
use App\Models\StudentFeeReceived;
use App\Models\StudentFeeReceivedDetail;
use App\Models\StudentFees;
use App\Services\FeesService;
use App\Services\SBLPaymentGatewayService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeesPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $months = Helper::months();
        return view('parentportal.fees.feespayment.index', compact('months'));
    }


    public function store(Request $request)
    {

        $studentFeeReceived = StudentFeeReceived::create([
            'date'          => date("Y-m-d"),
            'student_id'    => Auth::guard('student')->user()->student_id,
            'month'         => $request->month,
            'year'          => $request->year,
            'total'         => $request->total_amount,
            'payment_type'  => 'online',
            'status'        => 0,
        ]);

        $fees_types = explode(',', $request->fees_type[0]);
        $fees_ids   = explode(',', $request->fees_id[0]);


        foreach ($fees_types as $key => $feesType) {
            if ($feesType == "reg-fee") {
                $regFee = Fees::find($fees_ids[$key]);
                $regFee->fees_received_details()->create([
                    'student_fee_received_id' => $studentFeeReceived->id,
                    'amount' => $regFee->total_amount
                ]);
            }
            else{
                $stdFee = StudentFees::find($fees_ids[$key]);
                $stdFee->fees_received_details()->create([
                    'student_fee_received_id' => $studentFeeReceived->id,
                    'amount' => $stdFee->total_amount
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | CALL PAYMENT GATEWAY SERVICE WITH PERAMITER INVOICENO & AMOUNT //dev-sajid007
        |--------------------------------------------------------------------------
        */

        $paymentGateway = new SBLPaymentGatewayService($studentFeeReceived->id,$request->total_amount);
        return $paymentGateway->getAccessToken();
    }

    public function feeDetails(Request $request)
    {

        $id   = $request->id;
        $type = $request->type;

        if ($type == 'reg-fee') {
            $fees = Fees::find($id);
            return $fees->feeDetails;
        }
        $fees = StudentFees::find($id);
        return $fees->feeDetails;
    }


    public function getFees(Request $request)
    {

        $month = $request->month;
        $year  = $request->year;

        $studentId = Auth::guard('student')->user()->student_id;
        
        /*
        |--------------------------------------------------------------------------
        | MAKE A NEW SERVICE FOR GET ALL FEES INFO //dev-sajid007
        |--------------------------------------------------------------------------
        */
        $feesService         = new FeesService($studentId);
        $data['regFees']     = $feesService->getRegularFeesByMonth($month, $year);
        $data['studentFees'] = $feesService->getStudentFeesByMonth($month, $year);
        return $data;
    }
}
