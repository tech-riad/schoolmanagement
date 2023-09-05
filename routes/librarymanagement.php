<?php


use App\Http\Controllers\LibraryManagement\BookListController;
use App\Http\Controllers\LibraryManagement\LibraryStaffController;


use Illuminate\Support\Facades\Route;




Route::group(['as'=>'library.','prefix'=>'library'],function(){
        
        Route::group(['as'=>'book-list.','prefix'=>'book-list'],function(){
            Route::get('/',[BookListController::class,'index'])->name('index');
            Route::post('/store',[BookListController::class,'store'])->name('store');
            Route::get('/create',[BookListController::class,'create'])->name('create');
            Route::get('/edit/{id}',[BookListController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[BookListController::class,'show'])->name('show');
            Route::post('/update/{id}',[BookListController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[BookListController::class,'destroy'])->name('destroy');
        });
       
        Route::group(['as'=>'staff-list.','prefix'=>'staff-list'],function(){
            Route::get('/',[LibraryStaffController::class,'index'])->name('index');
            Route::post('/store',[LibraryStaffController::class,'store'])->name('store');
            Route::get('/create',[LibraryStaffController::class,'create'])->name('create');
            Route::get('/edit/{id}',[LibraryStaffController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[LibraryStaffController::class,'show'])->name('show');
            Route::post('/update/{id}',[LibraryStaffController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[LibraryStaffController::class,'destroy'])->name('destroy');
        });
       

       
        
       

    });




