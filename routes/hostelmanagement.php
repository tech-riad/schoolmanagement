<?php


use App\Http\Controllers\HostelManagement\HostelManagementController;
use App\Http\Controllers\HostelManagement\StaffController;
use App\Http\Controllers\HostelManagement\RoomController;






use Illuminate\Support\Facades\Route;




Route::group(['as'=>'hostel-management.','prefix'=>'hostel-management'],function(){
        
        Route::group(['as'=>'student-list.','prefix'=>'student-list'],function(){
            Route::get('/',[HostelManagementController::class,'index'])->name('index');
            Route::post('/store',[HostelManagementController::class,'store'])->name('store');
            Route::get('/create',[HostelManagementController::class,'create'])->name('create');
            Route::get('/edit/{id}',[HostelManagementController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[HostelManagementController::class,'show'])->name('show');
            Route::post('/update/{id}',[HostelManagementController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[HostelManagementController::class,'destroy'])->name('destroy');
        });

        Route::group(['as'=>'staff-list.','prefix'=>'staff-list'],function(){
            Route::get('/',[StaffController::class,'index'])->name('index');
            Route::post('/store',[StaffController::class,'store'])->name('store');
            Route::get('/create',[StaffController::class,'create'])->name('create');
            Route::get('/edit/{id}',[StaffController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[StaffController::class,'show'])->name('show');
            Route::post('/update/{id}',[StaffController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[StaffController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'room-list.','prefix'=>'room-list'],function(){
            Route::get('/',[RoomController::class,'index'])->name('index');
            Route::post('/store',[RoomController::class,'store'])->name('store');
            Route::get('/create',[RoomController::class,'create'])->name('create');
            Route::get('/edit/{id}',[RoomController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[RoomController::class,'show'])->name('show');
            Route::post('/update/{id}',[RoomController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[RoomController::class,'destroy'])->name('destroy');
        });

        
        
        

       
        
       

    });




