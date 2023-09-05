<?php

use App\Http\Controllers\Teacher\DesignationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can add more routes...
|
*/

Route::controller(DesignationController::class)
    ->prefix('/teacher/designation')
    ->group(function () {
        Route::get('/', 'index')->name('designation.index');
        Route::get('/create','create')->name('designation.create');
        Route::post('/store', 'store')->name('designation.store');
        Route::get('/{id}', 'edit')->name('designation.edit');
        Route::post('/update', 'update')->name('designation.update');
    });
