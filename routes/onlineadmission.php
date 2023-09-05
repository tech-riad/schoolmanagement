<?php


use App\Http\Controllers\OnlineAdmission\OnlineAdmissionController;
use App\Http\Controllers\OnlineAdmission\SubjectController;
use App\Http\Controllers\OnlineAdmission\MarksSetupController;
use App\Http\Controllers\OnlineAdmission\MarksInputController;
use App\Http\Controllers\OnlineAdmission\AdmissionResultController;

use Illuminate\Support\Facades\Route;




Route::group(['as'=>'online-admission.','prefix'=>'online-admission'],function(){


    
        Route::get('/index',[OnlineAdmissionController::class,'index'])->name('index');
        Route::post('/store',[OnlineAdmissionController::class,'store'])->name('store');
        Route::get('/create',[OnlineAdmissionController::class,'create'])->name('create');
        Route::get('/edit/{id}',[OnlineAdmissionController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[OnlineAdmissionController::class,'show'])->name('show');
        Route::post('/update/{id}',[OnlineAdmissionController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[OnlineAdmissionController::class,'destroy'])->name('destroy');
   

        Route::group(['as'=>'add-subject.','prefix'=>'add-subject'],function(){
            Route::get('/index',[SubjectController::class,'index'])->name('index');
            Route::post('/store',[SubjectController::class,'store'])->name('store');
            Route::get('/create',[SubjectController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SubjectController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SubjectController::class,'show'])->name('show');
            Route::post('/update/{id}',[SubjectController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SubjectController::class,'destroy'])->name('destroy');
        });

        
        Route::group(['as'=>'marks-setup.','prefix'=>'marks-setup'],function(){
            Route::get('/index',[MarksSetupController::class,'index'])->name('index');
            Route::post('/store',[MarksSetupController::class,'store'])->name('store');
            Route::get('/create',[MarksSetupController::class,'create'])->name('create');
            Route::get('/edit/{id}',[MarksSetupController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[MarksSetupController::class,'show'])->name('show');
            Route::post('/update/{id}',[MarksSetupController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[MarksSetupController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'marks-input.','prefix'=>'marks-input'],function(){
            Route::get('/',[MarksInputController::class,'index'])->name('index');
            Route::post('/store',[MarksInputController::class,'store'])->name('store');
            Route::get('/create',[MarksInputController::class,'create'])->name('create');
            Route::get('/edit/{id}',[MarksInputController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[MarksInputController::class,'show'])->name('show');
            Route::post('/update/{id}',[MarksInputController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[MarksInputController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'admission-result.','prefix'=>'admission-result'],function(){
            Route::get('/',[AdmissionResultController::class,'index'])->name('index');
            Route::post('/store',[AdmissionResultController::class,'store'])->name('store');
            Route::get('/create',[AdmissionResultController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AdmissionResultController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AdmissionResultController::class,'show'])->name('show');
            Route::post('/update/{id}',[AdmissionResultController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AdmissionResultController::class,'destroy'])->name('destroy');
        });

    });




