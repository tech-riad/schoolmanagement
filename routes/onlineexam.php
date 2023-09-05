<?php


use App\Http\Controllers\OnlineExam\OnlineExamController;
use App\Http\Controllers\OnlineExam\QuestionController;
use App\Http\Controllers\OnlineExam\McqController;
use App\Http\Controllers\OnlineExam\CreateEventController;
use App\Http\Controllers\OnlineExam\ResultReportController;
use Illuminate\Support\Facades\Route;




Route::group(['as'=>'online-exam.','prefix'=>'online-exam'],function(){


    
        Route::get('/index',[OnlineExamController::class,'index'])->name('index');
        Route::post('/store',[OnlineExamController::class,'store'])->name('store');
        Route::get('/create',[OnlineExamController::class,'create'])->name('create');
        Route::get('/edit/{id}',[OnlineExamController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[OnlineExamController::class,'show'])->name('show');
        Route::post('/update/{id}',[OnlineExamController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[OnlineExamController::class,'destroy'])->name('destroy');
   

        Route::group(['as'=>'mcq.','prefix'=>'mcq'],function(){
            Route::get('/index',[McqController::class,'index'])->name('index');
            Route::post('/store',[McqController::class,'store'])->name('store');
            Route::get('/create',[McqController::class,'create'])->name('create');
            Route::get('/edit/{id}',[McqController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[McqController::class,'show'])->name('show');
            Route::post('/update/{id}',[McqController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[McqController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'question.','prefix'=>'question'],function(){
            Route::get('/index',[QuestionController::class,'index'])->name('index');
            Route::post('/store',[QuestionController::class,'store'])->name('store');
            Route::get('/create',[QuestionController::class,'create'])->name('create');
            Route::get('/edit/{id}',[QuestionController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[QuestionController::class,'show'])->name('show');
            Route::post('/update/{id}',[QuestionController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[QuestionController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'event.','prefix'=>'event'],function(){
            Route::get('/index',[CreateEventController::class,'index'])->name('index');
            Route::post('/store',[CreateEventController::class,'store'])->name('store');
            Route::get('/create',[CreateEventController::class,'create'])->name('create');
            Route::get('/edit/{id}',[CreateEventController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[CreateEventController::class,'show'])->name('show');
            Route::post('/update/{id}',[CreateEventController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[CreateEventController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'result-report.','prefix'=>'result-report'],function(){
            Route::get('/index',[ResultReportController::class,'index'])->name('index');
            Route::post('/store',[ResultReportController::class,'store'])->name('store');
            Route::get('/create',[ResultReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ResultReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ResultReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[ResultReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ResultReportController::class,'destroy'])->name('destroy');
        });

    });




