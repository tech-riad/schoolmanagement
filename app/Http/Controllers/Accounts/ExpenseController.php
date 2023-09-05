<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;

use App\Models\ChartofAccount;
use App\Models\Expense;
use App\Models\ExpenseDetail;
use App\Services\TransactionService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::latest('id')->get();
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.expense.index', compact('expenses'));
    }
    public function create()
    {
        $expense       = ChartofAccount::where('acc_code', 'expenditure')->first();
        $expenditures  = ChartofAccount::where('parent_id', $expense->id)->get();

        $mode          = ChartofAccount::where('acc_code', 'current-asset')->first();
        $modes         = ChartofAccount::where('parent_id', $mode->id)->get();

        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.expense.create', compact('expenditures', 'modes'));
    }


    public function store(Request $request)
    {


        $debit_amount  = array_sum($request->debit_amount);
        $credit_amount = array_sum($request->credit_amount);

        if ($debit_amount != $credit_amount) {
            return redirect()->back()->with('error', 'Debit and Credit are not equal!');;
        }

        $expense = Expense::create([
            'date' => $request->date,
            'details' => $request->details,
            'total_amount' => $debit_amount
        ]);

        foreach ($request->debit_amount as $key => $debit_amount) {

            $expenseDetails = ExpenseDetail::create([
                'expense_id'           => $expense->id,
                'chart_of_account_id'  => $request->chart_of_account_id[$key],
                'debit'                => $debit_amount ?? 0,
                'credit'               => $request->credit_amount[$key] ?? 0
            ]);
            //expense transaction make
            $transaction = new TransactionService($expenseDetails);
            $transaction->expenseMake();
        }
        return redirect()->route('expense.index');
    }


    public function expenseDetails(Request $request)
    {

        $expenseDetails = ExpenseDetail::with('chart_of_account')->where('expense_id', $request->expense_id)->get();
        return response()->json($expenseDetails);
    }


    public function downloadInvoice($id)
    {
        $expense_details = ExpenseDetail::with('chart_of_account')->where('expense_id', $id)->get();
        $pdf = Pdf::loadView($this->backendTemplate['template']['path_name'].'.accountsmanagement.expense.invoice', compact('expense_details'))->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('expense.pdf');
    }
}
