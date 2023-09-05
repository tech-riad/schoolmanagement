<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function expenseReport(){
        
        return view($this->backendTemplate['template']['path_name'].'.accountsmanagement.reports.expense-report.index');
    }
}
