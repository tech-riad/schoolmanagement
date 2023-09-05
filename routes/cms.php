<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FooterController, CmsDashboardController, SliderController};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(CmsDashboardController::class)
    ->prefix('/cms')
    ->name('cms.')
    ->group(function () {
        Route::get('/dashboard', 'index')->name('index');
    });

Route::controller(SliderController::class)
    ->prefix('/cms')
    ->name('slider.')
    ->group(function () {
        Route::get('/slider', 'index')->name('index');
        Route::post('/slider', 'store')->name('store');
        Route::delete('/slider/{id}', 'destroy')->name('destroy');
    });
Route::controller(FooterController::class)
    ->prefix('/cms')
    ->name('footer.')
    ->group(function () {
        Route::get('/footer', 'index')->name('index');
        Route::post('/footer', 'store')->name('store');
        Route::get('/footer/{id}', 'show')->name('show');
        Route::put('/footer/{id}', 'update')->name('update');
        Route::delete('/footer/{id}', 'destroy')->name('destroy');
    });
