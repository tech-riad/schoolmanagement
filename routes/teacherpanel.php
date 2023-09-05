<?php
use App\Http\Controllers\TeacherPanel\TeacherPanelController;
use App\Http\Controllers\TeacherPanel\HomeWorkController;
use App\Http\Controllers\TeacherPanel\MCQController;
use App\Http\Controllers\TeacherPanel\QuestionChapterController;
use App\Http\Controllers\TeacherPanel\TeacherLeaveApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'teacherpanel', 'as' => 'teacherpanel.', 'middleware' => 'auth:teacher'], function () {


    Route::get('/', [TeacherPanelController::class, 'index'])->name('index');



    Route::group(['as' => 'homework.', 'prefix' => 'homework'], function () {

        Route::get('/', [HomeWorkController::class, 'index'])->name('index');
        Route::get('/create', [HomeWorkController::class, 'create'])->name('create');
        Route::post('/store', [HomeWorkController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [HomeWorkController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [HomeWorkController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [HomeWorkController::class, 'destroy'])->name('destory');
        
    });

    Route::group(['as' => 'application.', 'prefix' => 'leave-application'], function () {
        Route::get('/', [TeacherLeaveApplicationController::class, 'index'])->name('index');
        Route::get('/create', [TeacherLeaveApplicationController::class, 'create'])->name('create');
        Route::post('/store', [TeacherLeaveApplicationController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TeacherLeaveApplicationController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [TeacherLeaveApplicationController::class, 'update'])->name('update');
        Route::any('/delete/{id}', [TeacherLeaveApplicationController::class, 'destroy'])->name('destory');

        // ajax route
        Route::get('/template-details/{id}', [TeacherLeaveApplicationController::class, 'getTemplateById']);
        
    });


    Route::group(['as' => 'question.', 'prefix' => 'question'], function () {
        Route::get('/', [QuestionChapterController::class, 'index'])->name('index');
        Route::get('/create', [QuestionChapterController::class, 'create'])->name('create');
        Route::post('/store', [QuestionChapterController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [QuestionChapterController::class, 'edit'])->name('edit');
        Route::get('/show/{id}', [QuestionChapterController::class, 'show'])->name('show');
        Route::put('/update/{id}', [QuestionChapterController::class, 'update'])->name('update');
        Route::any('/delete/{id}', [QuestionChapterController::class, 'destroy'])->name('destory');

        // ajax route
        Route::get('/subject-select', [QuestionChapterController::class, 'selectSubject'])->name('select_sub');
        Route::get('/subject-list/{id}', [QuestionChapterController::class, 'getSubjectListById']);



        Route::group(['as' => 'mcqquestion.', 'prefix' => 'mcq-question'], function () {
            Route::get('/', [MCQController::class, 'index'])->name('index');
            Route::get('/create', [MCQController::class, 'create'])->name('create');
            Route::post('/store', [MCQController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [MCQController::class, 'edit'])->name('edit');
            Route::get('/show/{id}', [MCQController::class, 'show'])->name('show');
            Route::put('/update/{id}', [MCQController::class, 'update'])->name('update');
            Route::any('/delete/{id}', [MCQController::class, 'destroy'])->name('destory');
    
            // ajax route
            Route::get('/subject-select', [MCQController::class, 'selectSubject'])->name('select_sub');
            Route::get('/subject-list/{id}', [MCQController::class, 'getSubjectListById']);
        });
    });

});
