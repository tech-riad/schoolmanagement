<?php

namespace App\Services;

use App\Models\ChartofAccount;

class TransactionService
{

    public $source;

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function expenseMake()
    {
        $this->source->transaction()->create([
            'date'                => date('Y-m-d'),
            'chart_of_account_id' => $this->source->chart_of_account_id,
            'debit'               => $this->source->debit,
            'credit'              => $this->source->credit
        ]);
    }

    public function feeReceived()
    {
        $debitAccount  = ChartofAccount::where('acc_code','cash')->first();
        $creditAccount = ChartofAccount::where('acc_code','student-fees')->first();

        $this->debitEntry($debitAccount->id, $this->source->total);
        $this->creditEntry($creditAccount->id, $this->source->total);
    }



    public function debitEntry($chartOfAccount, $amount)
    {
        $this->source->transaction()->create([
            'date'                => date('Y-m-d'),
            'chart_of_account_id' => $chartOfAccount,
            'debit'               => $amount,
            'credit'              => 0
        ]);
    }


    public function creditEntry($chartOfAccount, $amount)
    {

        $this->source->transaction()->create([
            'date'                => date('Y-m-d'),
            'chart_of_account_id' => $chartOfAccount,
            'debit'               => 0,
            'credit'              => $amount
        ]);
    }
}
