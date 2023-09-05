<?php


use App\Http\Controllers\DigitalClassRoom\DigitalClassroomController;
use App\Http\Controllers\DigitalClassRoom\SMSSendController;





use Illuminate\Support\Facades\Route;




Route::group(['as'=>'digital-class-room.','prefix'=>'digital-class-room'],function(){
        
        Route::group(['as'=>'class-room.','prefix'=>'class-room'],function(){
            Route::get('/',[DigitalClassroomController::class,'index'])->name('index');
            Route::post('/store',[DigitalClassroomController::class,'store'])->name('store');
            Route::get('/create',[DigitalClassroomController::class,'create'])->name('create');
            Route::get('/edit/{id}',[DigitalClassroomController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[DigitalClassroomController::class,'show'])->name('show');
            Route::post('/update/{id}',[DigitalClassroomController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[DigitalClassroomController::class,'destroy'])->name('destroy');
        });

        
        Route::group(['as'=>'sms.','prefix'=>'sms'],function(){
            Route::get('/',[SMSSendController::class,'index'])->name('index');
            Route::post('/store',[SMSSendController::class,'store'])->name('store');
            Route::get('/create',[SMSSendController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SMSSendController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SMSSendController::class,'show'])->name('show');
            Route::post('/update/{id}',[SMSSendController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SMSSendController::class,'destroy'])->name('destroy');
        });
        

       
        
       

    });




