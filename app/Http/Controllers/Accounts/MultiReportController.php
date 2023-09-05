<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Helper\Helper;
use App\Models\Category;
use App\Models\Fees;
use App\Models\Section;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentFees;
use App\Models\TransactionDetail;
use App\Services\FeeReceivedService;
use App\Services\FeesCalculateService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MultiReportController extends Controller {

    private $service;
    private $feesCalculate;

    public function __construct(FeeReceivedService $feeReceivedService, FeesCalculateService $feesCalculateService) {
        parent::__construct();
        $this->service = $feeReceivedService;
    }

    public function multi_report_input() {
        $data['sessions'] = Session::all();
        $data['report_types']['balance_sheet'] = 'Balance Sheet';
        $data['report_types']['cash_and_bank'] = 'Cash and Bank';
        $data['report_types']['fund_details_list'] = 'Fund Details List';
        $data['report_types']['fund_transaction_summary'] = 'Fund Transaction Summary';
        $data['report_types']['income_statement'] = 'Income Statement';
        $data['report_types']['ledger_summary'] = 'Ledger Summary';
        $data['report_types']['trail_balance'] = 'Trail Balance';

        return view($this->backendTemplate['template']['path_name'] . '.accountsmanagement.reports.multi-report-input', $data);
    }

    public function multi_report_output(Request $request) {
        $data['from_date'] = $request->from_date;
        $data['to_date'] = $request->to_date;
        $data['report_type'] = $request->report_type;
        $data['start_date'] = date("l, F j, Y", strtotime($request->from_date));
        $data['end_date'] = date("l, F j, Y", strtotime($request->to_date));
        $data['date_table'] = '<td scope="col">From</td><td scope="col" ><b>' . $data['start_date'] . '</b></td><td scope="col">To</td><td scope="col" ><b>' . $data['end_date'] . '</b></td>';

        if ($request->report_type == 'balance_sheet') {
            $data['title'] = 'Balance Sheet';
            $value = $this->balance_sheet_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'cash_and_bank') {
            $data['title'] = 'Cash And Bank Book';
            $value = $this->cash_and_bank_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'fund_details_list') {
            $data['title'] = 'Fund Details List';
            $value = $this->fund_details_list_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'fund_transaction_summary') {
            $data['title'] = 'Fund Transaction Summary';
            $value = $this->fund_transaction_summary_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'income_statement') {
            $data['title'] = 'Income Statement';
            $value = $this->income_statement_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'ledger_summary') {
            $data['title'] = 'Ledger Summary';
            $value = $this->ledger_summary_output($request->from_date, $request->to_date);
        } else if ($request->report_type == 'trail_balance') {
            $data['title'] = 'Trail Balance';
            $value = $this->trail_balance_output($request->from_date, $request->to_date);
        }
        $data['head'] = $value['head'];

        return response()->json($data);
    }

    private function balance_sheet_output($from_date, $to_date) {
        $data['head'] = "<th>Leadger</th><th>Debit Amount</th><th>Credit Amount</th>";
        return $data;
    }

    private function cash_and_bank_output($from_date, $to_date) {
        $data['head'] = "<th>Leadger</th><th>Debit Amount</th><th>Credit Amount</th>";
        return $data;
    }

    private function fund_details_list_output($from_date, $to_date) {
        $data['head'] = "<th>Trn Date</th><th>Voucher ID</th><th>Fund Name</th><th>Amount In</th><th>Amount Out</th>";
        return $data;
    }

    private function fund_transaction_summary_output($from_date, $to_date) {
        $data['head'] = "<th>Fund Name</th><th>Amount In</th><th>Amount Out</th><th>Remainning Balance</th>";
        return $data;
    }

    private function income_statement_output($from_date, $to_date) {
        $data['head'] = "<th>Leadger</th><th>Debit Amount</th><th>Credit Amount</th>";
        return $data;
    }

    private function ledger_summary_output($from_date, $to_date) {
        $data['head'] = "<th>Leadger</th><th>Debit Amount</th><th>Credit Amount</th>";
        return $data;
    }

    private function trail_balance_output($from_date, $to_date) {
        $data['head'] = "<th>Leadger</th><th>Debit Amount</th><th>Credit Amount</th>";
        return $data;
    }

}
