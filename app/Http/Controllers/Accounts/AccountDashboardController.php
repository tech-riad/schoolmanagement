<?php

namespace App\Http\Controllers\Accounts;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Fees;
use App\Models\Scholarship;
use App\Models\ScholarshipDetail;
use App\Models\Session;
use App\Models\StudentFeeReceived;
use App\Models\StudentFees;
use Illuminate\Http\Request;

class AccountDashboardController extends Controller
{
    public function index(){

        $data['todayOfflineCollection'] = StudentFeeReceived::whereDate('date',date('Y-m-d'))->where('status',1)->where('payment_type','offline')->sum('total');
        $data['todayOnlineCollection']  = StudentFeeReceived::whereDate('date',date('Y-m-d'))->where('status',1)->where('payment_type','online')->sum('total');
        $data['todayTotalCollection']   = StudentFeeReceived::whereDate('date',date('Y-m-d'))->where('status',1)->sum('total');
        $data['todayExpense']           = Expense::whereDate('date',date('Y-m-d'))->sum('total_amount');



        $data['sessions']               = Session::all();
        $data['months']                 = Helper::months();

        //total dues calculation
        $currentMonth     = date('n');
        $currentYear      = date('Y');

        $regularFees              = Fees::where('year',$currentYear)->where('month','=',$currentMonth)->sum('total_amount');
        $studentFees              = StudentFees::where('year',$currentYear)->where('month','=',$currentMonth)->sum('total_amount');
        $data['totalPayable']     = $regularFees + $studentFees;

        $totalCollection          = StudentFeeReceived::where('year',$currentYear)->where('month','<=',$currentMonth)->sum('total');
        $data['totalDue']         = $data['totalPayable'] - $totalCollection;
        //scholarship income & Expense
        $data['totalScholarship'] = ScholarshipDetail::where('year',$currentYear)->where('month','<=',$currentMonth)->sum('discount');
        $data['totalIncome']      = StudentFeeReceived::where('year',$currentYear)->where('month','<=',$currentMonth)->where('status',1)->sum('total');
        $data['totalExpense']     = Expense::whereYear('date',$currentYear)->whereMonth('date',$currentMonth)->sum('total_amount');

        $data['currentMonth']     = $currentMonth;
        $data['currentYear']      = $currentYear;
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.dashboard.index',$data);
    }



    public function getDashboardData(Request $request){

        if($request->session_id && $request->month){
            $session = Session::find($request->session_id);
            $year    = $session->title;
            $month   = $request->month;
            //total Payable
            $regularFees              = Fees::where('year',$year)->where('month','=',$month)->sum('total_amount');
            $studentFees              = StudentFees::where('year',$year)->where('month','=',$month)->sum('total_amount');
            $data['totalPayable']     = $regularFees + $studentFees;
            //total dues
            $totalCollection          = StudentFeeReceived::where('year',$year)->where('month','<=',$month)->sum('total');
            $data['totalDue']         = $data['totalPayable'] - $totalCollection;
            //total scholarship
            $data['totalScholarship'] = ScholarshipDetail::where('year',$year)->where('month','<=',$month)->sum('discount');
            //total income & Expense
            $data['totalIncome']      = StudentFeeReceived::where('year',$year)->where('month','<=',$month)->where('status',1)->sum('total');
            $data['totalExpense']     = Expense::whereYear('date',$year)->whereMonth('date',$month)->sum('total_amount');
        }

        if($request->session_id){
            $session = Session::find($request->session_id);
            $year    = $session->title;
            //total_payable
            $regularFees              = Fees::where('year',$year)->sum('total_amount');
            $studentFees              = StudentFees::where('year',$year)->sum('total_amount');
            $data['totalPayable']     = $regularFees + $studentFees;
            //total dues
            $totalCollection          = StudentFeeReceived::where('year',$year)->sum('total');
            $data['totalDue']         = $data['totalPayable'] - $totalCollection;
            //total scholarship
            $data['totalScholarship'] = ScholarshipDetail::where('year',$year)->sum('discount');
            //total income & Expense
            $data['totalIncome']      = StudentFeeReceived::where('year',$year)->where('status',1)->sum('total');
            $data['totalExpense']     = Expense::whereYear('date',$year)->sum('total_amount');
        }

        if($request->month){
            //total_payable
            $regularFees              = Fees::where('month',$request->month)->sum('total_amount');
            $studentFees              = StudentFees::where('month',$request->month)->sum('total_amount');
            $data['totalPayable']     = $regularFees + $studentFees;
            //total dues
            $totalCollection          = StudentFeeReceived::where('month',$request->month)->sum('total');
            $data['totalDue']         = $data['totalPayable'] - $totalCollection;
            //total scholarship
            $data['totalScholarship'] = ScholarshipDetail::where('month',$request->month)->sum('discount');
            //total income & Expense
            $data['totalIncome']      = StudentFeeReceived::where('month',$request->month)->where('status',1)->sum('total');
            $data['totalExpense']     = Expense::whereMonth('date',$request->month)->sum('total_amount');
        }

        $array = [];
        foreach($data as $key => $amount){
            $array[$key] = Helper::convertNumberFormat($amount);
        }

        return $array;
    }


}
