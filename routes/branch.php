<?php

use App\Http\Controllers\Teacher\BranchController;
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

Route::controller(BranchController::class)
    ->prefix('/teacher/branch')
    ->group(function () {
        Route::get('/', 'index')->name('branch.index');
        Route::get('/create','create')->name('branch.create');
        Route::post('/store', 'store')->name('branch.store');
        Route::get('/{id}', 'edit')->name('branch.edit');
        Route::post('/update', 'update')->name('branch.update');
    });
