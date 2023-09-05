<?php

namespace App\Http\Controllers\Parentportal\Fees;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentFeeReceived;
use App\Models\StudentFeeReceivedDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parentportal.fees.financialstatement.index');
    }

    public function getFinancialReport(Request $request){
        $studentId = $request->student_id;
        $from      = $request->from_date;
        $to        = $request->to_date;

        $student  = Student::where('id_no',$studentId)->first();
        $payments = StudentFeeReceived::where('student_id',$student->id)->whereBetween('date',[$from,$to])->get();

        return response()->json($payments);
    }


    public function getTransactionDetails(Request $request){

        $feeRecId = $request->fee_received_id;
        $details  = StudentFeeReceivedDetail::with('source')->where('student_fee_received_id',$feeRecId)->get();
        return $details;
    }



    public function downloadPdf($id){

        $student = Student::find(Auth::guard('student')->user()->student_id);
        $details = StudentFeeReceivedDetail::with('source')->where('student_fee_received_id',$id)->get();

        $data = [];
        foreach($details as $detail){
            $data = $detail->source;
        }
        $feeDetails = $data->feeDetails;

        $pdf = Pdf::loadView('parentportal.fees.financialstatement.invoice',compact('student','feeDetails'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('financial-statement.pdf');



    }
}
