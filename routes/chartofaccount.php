<?php

use App\Http\Controllers\Accounts\ChartofAccountController ;




use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth']], function() {

Route::group(['as'=>'chart-of-account.','prefix'=>'chart-of-account'],function(){



        Route::get('/',[ChartofAccountController::class,'index'])->name('index');
        Route::post('/store',[ChartofAccountController::class,'store'])->name('store');
        Route::get('/create',[ChartofAccountController::class,'create'])->name('create');
        Route::get('/edit/{id}',[ChartofAccountController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ChartofAccountController::class,'show'])->name('show');
        Route::post('/update/{id}',[ChartofAccountController::class,'update'])->name('update');
        Route::get('/destroy/{id}',[ChartofAccountController::class,'destroy'])->name('destroy');

        Route::post('/order',[ChartofAccountController::class,'order'])->name('order');





    });

});

Route::get('getparent/{level}',[ChartofAccountController::class,'getParent'])->name('getparent');


