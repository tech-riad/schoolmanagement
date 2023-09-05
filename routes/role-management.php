<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'role-management','as' => 'role-management.'],function (){

    Route::group(['prefix' => 'roles','as' => 'roles.'],function (){
        Route::get('/index',[\App\Http\Controllers\RoleController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\RoleController::class,'create'])->name('create');
        Route::post('/store',[\App\Http\Controllers\RoleController::class,'store'])->name('store');
        Route::get('/show/{id}',[\App\Http\Controllers\RoleController::class,'show'])->name('show');
        Route::get('/edit/{id}',[\App\Http\Controllers\RoleController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[\App\Http\Controllers\RoleController::class,'update'])->name('update');
        Route::get('/delete/{id}',[\App\Http\Controllers\RoleController::class,'delete'])->name('delete');
    });

    Route::group(['prefix' => 'users','as' => 'users.'],function (){
        Route::get('/index',[\App\Http\Controllers\UserController::class,'index'])->name('index');
        Route::get('/create',[\App\Http\Controllers\UserController::class,'create'])->name('create');
        Route::post('/store',[\App\Http\Controllers\UserController::class,'store'])->name('store');
        Route::get('/edit/{id}',[\App\Http\Controllers\UserController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[\App\Http\Controllers\UserController::class,'update'])->name('update');
        Route::get('/delete/{id}',[\App\Http\Controllers\UserController::class,'delete'])->name('delete');
    });

});
