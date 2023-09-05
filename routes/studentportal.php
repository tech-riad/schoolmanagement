<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Parentportal\ParentPortalController;
use App\Http\Controllers\Parentportal\Studentacount\StudentAccountController;
use App\Http\Controllers\Parentportal\Studentacount\ProfileController;
use App\Http\Controllers\Parentportal\Studentacount\AdmitsCardsController;
use App\Http\Controllers\Parentportal\Studentacount\AtdanceController;
use App\Http\Controllers\Parentportal\Fees\FeesController;
use App\Http\Controllers\Parentportal\Fees\FinancialStatementController;
use App\Http\Controllers\Parentportal\Fees\FeesPaymentController;
use App\Http\Controllers\Parentportal\Aplication\AplicationController;
use App\Http\Controllers\Parentportal\Dairytask\DairyAndTaskController;
use App\Http\Controllers\Parentportal\Dairytask\AcademicCalenderController;
use App\Http\Controllers\Parentportal\Dairytask\MyDairyAndTaskController;
use App\Http\Controllers\Parentportal\Dairytask\ClassRoutineController;
use App\Http\Controllers\Parentportal\Dairytask\OnlineClassRoutineController;
use App\Http\Controllers\Parentportal\Leaveapplication\StudentLeaveApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'/student-portal','middleware' => 'auth:student'],function(){

    Route::get('/', [ParentPortalController::class,'index'])->name('parentportal');
// Student Info
    Route::get('/studentinfo', [StudentAccountController::class, 'index'])->name('studentinfo.index');
// Fees
    Route::get('/fees', [FeesController::class, 'index'])->name('fees.index');
// Application
    Route::get('/aplication', [AplicationController::class, 'index'])->name('aplication.index');
// Dairy And Task
    Route::get('/dairyandtask', [DairyAndTaskController::class, 'index'])->name('dairyandtask.index');



   /* <-----------Student Info Menu Bar Route Start ---------------->*/
//    Profile
   Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
   Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('student.profile.update');
   Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('student-portal.change-password');

   Route::get('/get-district/{id}',[AddressController::class,'getDistrictByDivisionId'])->name('studen.getDistrictByDivisionId');
   Route::get('/get-upazila/{id}',[AddressController::class,'getUpazilaByDistrictId'])->name('studen.getUpazilaByDistrictId');
//    Admit Card
   Route::get('/admitcards', [AdmitsCardsController::class, 'index'])->name('admitcards.index');
//    Attandance
   Route::get('/attandance', [AtdanceController::class, 'index'])->name('attandance.index');




/* <-----------Fees Menu Bar Route Start ---------------->*/
//   Financial Statement
Route::get('/financial-statement', [FinancialStatementController::class, 'index'])->name('financial-statement.index');
Route::get('/download-report/{id}', [FinancialStatementController::class, 'downloadPdf'])->name('financial-statement.download-pdf');
Route::get('get-financial-statement',[FinancialStatementController::class, 'getFinancialReport'])->name('financial-statement.report');
Route::get('get-transaction-details',[FinancialStatementController::class, 'getTransactionDetails'])->name('get-transaction-details');

// Fees
Route::get('/fees-payment', [FeesPaymentController::class, 'index'])->name('fees-payment.index');
Route::post('/fees-payment', [FeesPaymentController::class, 'store'])->name('fees-payment.store');
//ajax routes
Route::get('/get-fees', [FeesPaymentController::class, 'getFees'])->name('student.get-fees');
Route::get('/get-fees-details', [FeesPaymentController::class, 'feeDetails'])->name('student.fees.details');

// Academic Calender
Route::get('/academic-calender', [AcademicCalenderController::class, 'index'])->name('academic-calender.index');


// Dairy & Task
Route::get('/dairy-task', [MyDairyAndTaskController::class, 'index'])->name('dairy-task.index');

// Class Routine
Route::get('/class-routine', [ClassRoutineController::class, 'index'])->name('class-routine.index');


// Online Class Routine
Route::get('/online-class-routine', [OnlineClassRoutineController::class, 'index'])->name('online-class-routine.index');


Route::group(['as' => 'studentleaveapplication.', 'prefix' => 'leave-application'], function () {
    Route::get('/', [StudentLeaveApplicationController::class, 'index'])->name('index');
    Route::get('/create', [StudentLeaveApplicationController::class, 'create'])->name('create');
    Route::post('/store', [StudentLeaveApplicationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [StudentLeaveApplicationController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [StudentLeaveApplicationController::class, 'update'])->name('update');
    Route::any('/delete/{id}', [StudentLeaveApplicationController::class, 'destroy'])->name('destory');

    // ajax route
    Route::get('/template-details/{id}', [StudentLeaveApplicationController::class, 'getTemplateById']);
    
});

});
