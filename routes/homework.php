<?php

use App\Http\Controllers\HomeWork\HomeWorkController;
use App\Http\Controllers\HomeWork\NoticeController;


use Illuminate\Support\Facades\Route;




Route::group(['as'=>'home-work.','prefix'=>'home-work'],function(){


    
        Route::get('/',[HomeWorkController::class,'index'])->name('index');
        Route::post('/store',[HomeWorkController::class,'store'])->name('store');
        Route::get('/create',[HomeWorkController::class,'create'])->name('create');
        Route::get('/edit/{id}',[HomeWorkController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[HomeWorkController::class,'show'])->name('show');
        Route::post('/update/{id}',[HomeWorkController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[HomeWorkController::class,'destroy'])->name('destroy');
   

        Route::group(['as'=>'home-work-notice.','prefix'=>'notice'],function(){
            Route::get('/',[NoticeController::class,'index'])->name('index');
            Route::post('/store',[NoticeController::class,'store'])->name('store');
            Route::get('/create',[NoticeController::class,'create'])->name('create');
            Route::get('/edit/{id}',[NoticeController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[NoticeController::class,'show'])->name('show');
            Route::post('/update/{id}',[NoticeController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[NoticeController::class,'destroy'])->name('destroy');
        });

        
       

    });




