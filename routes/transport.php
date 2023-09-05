<?php


use App\Http\Controllers\TransportManagement\ListOfTransportController;
use App\Http\Controllers\TransportManagement\TransportRootController;
use App\Http\Controllers\TransportManagement\TransportBookingController;


use Illuminate\Support\Facades\Route;




Route::group(['as'=>'transport.','prefix'=>'transport'],function(){
        
        Route::group(['as'=>'list-of-transport.','prefix'=>'list-of-transport'],function(){
            Route::get('/',[ListOfTransportController::class,'index'])->name('index');
            Route::post('/store',[ListOfTransportController::class,'store'])->name('store');
            Route::get('/create',[ListOfTransportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ListOfTransportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ListOfTransportController::class,'show'])->name('show');
            Route::post('/update/{id}',[ListOfTransportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ListOfTransportController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'transport-root.','prefix'=>'transport-root'],function(){
            Route::get('/',[TransportRootController::class,'index'])->name('index');
            Route::post('/store',[TransportRootController::class,'store'])->name('store');
            Route::get('/create',[TransportRootController::class,'create'])->name('create');
            Route::get('/edit/{id}',[TransportRootController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[TransportRootController::class,'show'])->name('show');
            Route::post('/update/{id}',[TransportRootController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[TransportRootController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'booking-list.','prefix'=>'booking-list'],function(){
            Route::get('/',[TransportBookingController::class,'index'])->name('index');
            Route::post('/store',[TransportBookingController::class,'store'])->name('store');
            Route::get('/create',[TransportBookingController::class,'create'])->name('create');
            Route::get('/edit/{id}',[TransportBookingController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[TransportBookingController::class,'show'])->name('show');
            Route::post('/update/{id}',[TransportBookingController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[TransportBookingController::class,'destroy'])->name('destroy');
        });

       
        
       

    });




