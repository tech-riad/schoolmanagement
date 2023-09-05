<?php


use App\Http\Controllers\PushNotification\SendNotificationController;
use App\Http\Controllers\PushNotification\NotificationReportController;

use Illuminate\Support\Facades\Route;




Route::group(['as'=>'push-notification.','prefix'=>'push-notification'],function(){
        
        Route::group(['as'=>'send-notification.','prefix'=>'send-notification'],function(){
            Route::get('/',[SendNotificationController::class,'index'])->name('index');
            Route::post('/store',[SendNotificationController::class,'store'])->name('store');
            Route::get('/create',[SendNotificationController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SendNotificationController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SendNotificationController::class,'show'])->name('show');
            Route::post('/update/{id}',[SendNotificationController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SendNotificationController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'report.','prefix'=>'report'],function(){
            Route::get('/',[NotificationReportController::class,'index'])->name('index');
            Route::post('/store',[NotificationReportController::class,'store'])->name('store');
            Route::get('/create',[NotificationReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[NotificationReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[NotificationReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[NotificationReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[NotificationReportController::class,'destroy'])->name('destroy');
        });

       
        
       

    });




