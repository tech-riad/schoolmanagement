<?php
use App\Http\Controllers\RoutineManagement\TimeSettingController;
use App\Http\Controllers\RoutineManagement\SetDesignController;





use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['as'=>'routine.','prefix'=>'routine'],function(){

Route::group(['as'=>'time-setting.','prefix'=>'time-setting'],function(){
    
    Route::get('/',[TimeSettingController::class,'index'])->name('index');
    Route::get('/create',[TimeSettingController::class,'create'])->name('create');
    Route::post('/store',[TimeSettingController::class,'store'])->name('store');
    Route::get('/edit/{id}',[TimeSettingController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[TimeSettingController::class,'show'])->name('show');
    Route::post('/update/{id}',[TimeSettingController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[TimeSettingController::class,'destroy'])->name('destroy');


});
Route::group(['as'=>'set-design.','prefix'=>'set-design'],function(){
    Route::get('/',[SetDesignController::class,'index'])->name('index');
    Route::get('/list',[SetDesignController::class,'examList'])->name('examList');
    Route::post('/store',[SetDesignController::class,'store'])->name('store');
    Route::get('/create',[SetDesignController::class,'create'])->name('create');
    Route::get('/edit/{id}',[SetDesignController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[SetDesignController::class,'show'])->name('show');
    Route::post('/update/{id}',[SetDesignController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[SetDesignController::class,'destroy'])->name('destroy');


});


});
