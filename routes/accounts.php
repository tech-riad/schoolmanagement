<?php

use App\Http\Controllers\Accounts\AccountDashboardController;
use App\Http\Controllers\Accounts\AccountsFeesController;
use App\Http\Controllers\Accounts\AccountsFeesTypeController;
use App\Http\Controllers\Accounts\ExpenseController;
use App\Http\Controllers\Accounts\FeesSetupController;
use App\Http\Controllers\Accounts\PaymentController;
use App\Http\Controllers\Accounts\PaymentReportController;
use App\Http\Controllers\Accounts\ReportsController;
use App\Http\Controllers\Accounts\ScholershipController;

use App\Http\Controllers\Settings\PaymentGatewayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/accountsmanagement'], function () {

    Route::get('/dashboard', [AccountDashboardController::class, 'index'])->name('accountsmanagement.dashboard');
    Route::get('/get-dashboard-data',[AccountDashboardController::class, 'getDashboardData'])->name('get-dashboard-data');

    // Fees
    Route::get('/student/fees', [AccountsFeesController::class, 'studentindex'])->name('accountsmanagement.index');
    Route::get('/student/fees/create', [AccountsFeesController::class, 'studentcreate'])->name('fees.create');
    Route::post('/student/fees/store', [AccountsFeesController::class, 'studentstore'])->name('fees.store');
    Route::get('/student/fees/edit/{id}', [AccountsFeesController::class, 'studentedit'])->name('fees.edit');
    Route::put('/student/fees/update/{id}', [AccountsFeesController::class, 'studentupdate'])->name('fees.update');
    Route::post('/student/fees/delete/{id}', [AccountsFeesController::class, 'studentdestroy'])->name('fees.destory');


    Route::get('/general/fees', [AccountsFeesController::class, 'generalindex'])->name('accountsmanagement.general.index');
    Route::get('/general/fees/create', [AccountsFeesController::class, 'generalcreate'])->name('fees.general.create');
    Route::post('/general/fees/store', [AccountsFeesController::class, 'generalstore'])->name('fees.general.store');
    Route::get('/general/fees/edit/{id}', [AccountsFeesController::class, 'generaledit'])->name('fees.general.edit');
    Route::put('/general/fees/update/{id}', [AccountsFeesController::class, 'generalupdate'])->name('fees.general.update');
    Route::post('/general/fees/delete/{id}', [AccountsFeesController::class, 'generalestroy'])->name('fees.general.destory');

    //Fees Setup
    Route::get('/fees-setup',[FeesSetupController::class,'index'])->name('fees-setup');
    Route::post('/fees-setup-store',[FeesSetupController::class,'store'])->name('fees-setup.store');
    Route::get('/fees-setup-edit',[FeesSetupController::class,'edit'])->name('fees-setup.edit');
    //ajax get route
    Route::get('/get-fees-date',[FeesSetupController::class,'getFeesData'])->name('get-fees-data');


    //Payment
    Route::group(['as' => 'payment.', 'prefix' => 'payment'], function () {
        Route::get('/index', [PaymentController::class, 'index'])->name('index');
        Route::post('/store', [PaymentController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PaymentController::class, 'edit'])->name('edit');
        Route::get('/{id}/show', [PaymentController::class, 'show'])->name('show');
        Route::post('/update/{id}', [PaymentController::class, 'update'])->name('update');
        Route::post('/{id}/destroy', [PaymentController::class, 'destroy'])->name('destroy');

        //ajax routes
        Route::get('get-payments', [PaymentController::class, 'getPayments'])->name('get-payments');
        Route::post('view-payments', [PaymentController::class, 'viewPayments'])->name('view-payments');
        Route::post('store-transaction', [PaymentController::class, 'storeTransactions'])->name('store-transaction');
    });

    Route::group(['as' => 'payment-report.', 'prefix' => 'payment-report'], function () {

        Route::get('/paid', [PaymentReportController::class, 'index'])->name('index');
        Route::get('/paid-report', [PaymentReportController::class, 'paidReport'])->name('paid-report');
        Route::get('/download-report/{id}/{month}', [PaymentReportController::class, 'downloadReport'])->name('download-report');

        Route::get('/unpaid', [PaymentReportController::class, 'unpaid'])->name('unpaid');
        Route::get('/unpaid-report', [PaymentReportController::class, 'unpaidReport'])->name('unpaid-report');
    });

    Route::group(['as' => 'reports.','prefix' => 'reports'],function(){

        Route::get('/expense', [ReportsController::class, 'expenseReport'])->name('expense-report');

    });

    Route::group(['as' => 'scholarship.', 'prefix' => 'scholarship'], function () {

        Route::get('/index', [ScholershipController::class, 'index'])->name('index');
        Route::get('/create', [ScholershipController::class, 'create'])->name('create');
        Route::post('/store', [ScholershipController::class, 'store'])->name('store');

        //ajax routes
        Route::get('/fee-details', [ScholershipController::class, 'getFeeDetails'])->name('get-fee-details');
        Route::get('/scholarship-details', [ScholershipController::class, 'getScholarshipDetails'])->name('get-scholarship-details');
    });

    Route::group(['as' => 'expense.', 'prefix' => 'expense'], function () {

        Route::get('/index', [ExpenseController::class, 'index'])->name('index');
        Route::get('/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/store', [ExpenseController::class, 'store'])->name('store');
        Route::get('/download-invoice/{id}', [ExpenseController::class, 'downloadInvoice'])->name('download-invoice');

        Route::post('/get-expense-details', [ExpenseController::class, 'expenseDetails'])->name('get-expense-details');
    });

    // Fees Type
    Route::get('/feestype', [AccountsFeesTypeController::class, 'index'])->name('feestype.index');
    Route::get('/feestype/create', [AccountsFeesTypeController::class, 'create'])->name('feestype.create');
    Route::post('/feestype/store', [AccountsFeesTypeController::class, 'store'])->name('feestype.store');
    Route::get('/feestype/edit/{id}', [AccountsFeesTypeController::class, 'edit'])->name('feestype.edit');
    Route::post('/feestype/update/{id}', [AccountsFeesTypeController::class, 'update'])->name('feestype.update');
    Route::post('/feestype/delete/{id}', [AccountsFeesTypeController::class, 'destroy'])->name('feestype.destory');

    Route::get('/multi-report', [MultiReportController::class, 'multi_report_input'])->name('multi-report');
    Route::get('/multi-report-output', [MultiReportController::class, 'multi_report_output'])->name('multi-report-output');
});

Route::group(['as' => 'payment-gateway.', 'prefix' => 'payment-gateway'], function () {

    Route::get('/index', [PaymentGatewayController::class, 'index'])->name('index');

});
