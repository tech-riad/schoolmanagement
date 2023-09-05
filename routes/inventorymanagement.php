<?php


use App\Http\Controllers\InventoryManagement\AssetController;
use App\Http\Controllers\InventoryManagement\AssetTypeController;
use App\Http\Controllers\InventoryManagement\InventoryItemController;



use Illuminate\Support\Facades\Route;




Route::group(['as'=>'inventory.','prefix'=>'inventory'],function(){
        
        Route::group(['as'=>'asset.','prefix'=>'asset'],function(){
            Route::get('/',[AssetController::class,'index'])->name('index');
            Route::post('/store',[AssetController::class,'store'])->name('store');
            Route::get('/create',[AssetController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AssetController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AssetController::class,'show'])->name('show');
            Route::post('/update/{id}',[AssetController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AssetController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'asset-type.','prefix'=>'asset-type'],function(){
            Route::get('/',[AssetTypeController::class,'index'])->name('index');
            Route::post('/store',[AssetTypeController::class,'store'])->name('store');
            Route::get('/create',[AssetTypeController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AssetTypeController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AssetTypeController::class,'show'])->name('show');
            Route::post('/update/{id}',[AssetTypeController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AssetTypeController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'item-list.','prefix'=>'item-list'],function(){
            Route::get('/',[InventoryItemController::class,'index'])->name('index');
            Route::post('/store',[InventoryItemController::class,'store'])->name('store');
            Route::get('/create',[InventoryItemController::class,'create'])->name('create');
            Route::get('/edit/{id}',[InventoryItemController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[InventoryItemController::class,'show'])->name('show');
            Route::post('/update/{id}',[InventoryItemController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[InventoryItemController::class,'destroy'])->name('destroy');
        });
       
        

       
        
       

    });




