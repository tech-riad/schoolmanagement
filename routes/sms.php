<?php

use App\Http\Controllers\SMS\SmsManagementController;
use App\Http\Controllers\SMS\TeacherSmsController;
use App\Http\Controllers\SMS\ResultSmsController;
use App\Http\Controllers\SMS\StudentSmsController;
use App\Http\Controllers\SMS\AddContactController;
use App\Http\Controllers\SMS\SmsController;
use App\Http\Controllers\SMS\TemplateController;
use App\Http\Controllers\SMS\SmsReportController;
use App\Http\Controllers\SMS\SmsOrderController;

use Illuminate\Support\Facades\Route;

Route::group(['as'=>'sms.','prefix'=>'sms'],function(){

        Route::get('/',[SmsManagementController::class,'index'])->name('index');
        Route::any('/sms-history',[SmsManagementController::class,'smshistory'])->name('smshistory');
        Route::get('/sms-history/delete/{id}',[SmsManagementController::class,'historydelete'])->name('historydelete');

        Route::group(['as'=>'teachers-sms.','prefix'=>'teachers-sms'],function(){
            Route::get('/',[TeacherSmsController::class,'index'])->name('index');
            Route::post('/store',[TeacherSmsController::class,'store'])->name('store');
            Route::get('/create',[TeacherSmsController::class,'create'])->name('create');
            Route::get('/edit/{id}',[TeacherSmsController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[TeacherSmsController::class,'show'])->name('show');
            Route::post('/update/{id}',[TeacherSmsController::class,'update'])->name('update');
            Route::any('/destroy/{id}',[TeacherSmsController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'students-sms.','prefix'=>'students-sms'],function(){
            Route::get('/',[StudentSmsController::class,'index'])->name('index');
            Route::post('/store',[StudentSmsController::class,'store'])->name('store');
            Route::get('/create',[StudentSmsController::class,'create'])->name('create');
            Route::get('/edit/{id}',[StudentSmsController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[StudentSmsController::class,'show'])->name('show');
            Route::post('/update/{id}',[StudentSmsController::class,'update'])->name('update');
            Route::any('/destroy/{id}',[StudentSmsController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'result-sms.','prefix'=>'result-sms'],function(){
            Route::get('/',[ResultSmsController::class,'index'])->name('index');
            Route::post('/store',[ResultSmsController::class,'store'])->name('store');
            Route::get('/create',[ResultSmsController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ResultSmsController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ResultSmsController::class,'show'])->name('show');
            Route::post('/update/{id}',[ResultSmsController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ResultSmsController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'contact.','prefix'=>'contact'],function(){
            Route::get('/',[AddContactController::class,'index'])->name('index');
            Route::post('/store',[AddContactController::class,'store'])->name('store');
            Route::get('/create',[AddContactController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AddContactController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AddContactController::class,'show'])->name('show');
            Route::post('/update/{id}',[AddContactController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AddContactController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'template.','prefix'=>'template'],function(){
            Route::get('/',[TemplateController::class,'index'])->name('index');
            Route::get('/create',[TemplateController::class,'create'])->name('create');
            Route::post('/store',[TemplateController::class,'store'])->name('store');
            Route::get('/edit/{id}',[TemplateController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[TemplateController::class,'show'])->name('show');
            Route::any('/update/{id}',[TemplateController::class,'update'])->name('update');
            Route::any('/destroy/{id}',[TemplateController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'orders.','prefix'=>'orders'],function(){
            Route::get('/',[SmsOrderController::class,'index'])->name('index');
            Route::post('/store',[SmsOrderController::class,'store'])->name('store');

            Route::get('/create',[SmsOrderController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SmsOrderController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SmsOrderController::class,'show'])->name('show');
            Route::post('/update/{id}',[SmsOrderController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SmsOrderController::class,'destroy'])->name('destroy');

        });


        Route::group(['as'=>'sms-report.','prefix'=>'sms-report'],function(){
            Route::get('/',[SmsReportController::class,'index'])->name('index');
            Route::post('/store',[SmsReportController::class,'store'])->name('store');
            Route::get('/create',[SmsReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SmsReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SmsReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[SmsReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SmsReportController::class,'destroy'])->name('destroy');
        });


        Route::get('/portal',[SmsController::class,'index'])->name('portal');
        Route::post('/send/student-sms',[SmsController::class,'studentsendsms'])->name('student.sendsms');
        Route::post('/send/teacher-sms',[SmsController::class,'teachersendsms'])->name('teacher.sendsms');
        Route::post('/send/staff-sms',[SmsController::class,'staffsendsms'])->name('staff.sendsms');
        Route::post('/send/comittee-sms',[SmsController::class,'comitteesendsms'])->name('comittee.sendsms');
    });




