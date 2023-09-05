<?php

use App\Http\Controllers\Teacher\AssignTeacherController;
use App\Http\Controllers\Teacher\BirthDayWishController;
use App\Http\Controllers\Teacher\CommitteeController;
use App\Http\Controllers\Teacher\IdCardController;
use App\Http\Controllers\Teacher\StaffController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'teacher.', 'prefix' => '/teacher/'], function () {

    Route::get('/index', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::post('/store', [TeacherController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
    Route::get('/{id}/show', [TeacherController::class, 'show'])->name('show');
    Route::any('/update/{id}', [TeacherController::class, 'update'])->name('update');
    Route::any('/destroy/{id}', [TeacherController::class, 'destroy'])->name('destroy');
    Route::post('/update/signature/{id}', [TeacherController::class, 'updatesignature'])->name('updateSignature');
    Route::post('/update/photo/{id}', [TeacherController::class, 'updatephoto'])->name('updatephoto');
    //create teacher User
    Route::get('/create-teacher-user/{id}',[TeacherController::class,'createUser'])->name('create.user');


    Route::get('/teacher/upload-create', [TeacherController::class, 'uploadcreate'])->name('upload.create');
    Route::post('/teacher/upload-store', [TeacherController::class, 'uploadStore'])->name('upload.store');

    Route::get('/export-teachers', [TeacherController::class, 'exportTeachers'])->name('export');
    Route::post('/export/pdf-teachers',[TeacherController::class, 'exportpdfTeachers'])->name('exportpdf');

    Route::group(['as'=>'id-card.','prefix'=>'/id-card'],function(){

        Route::get('/index',[IdCardController::class,'index'])->name('index');
        Route::get('/view/{id}',[IdCardController::class,'view'])->name('view');
        Route::get('/download-card/{id}',[IdCardController::class,'downloadCard'])->name('download');

    });

    Route::group(['as' => 'birthday-wish.', 'prefix' => '/birthday-wish/'], function () {

        Route::any('/index', [BirthDayWishController::class, 'index'])->name('index');
        Route::any('/send-sms', [BirthDayWishController::class, 'sendMessage'])->name('sendMessage');
    });

Route::group(['as' => 'assign_teacher.', 'prefix' => 'assign_teacher'], function () {


    Route::get('/index', [AssignTeacherController::class, 'index'])->name('index');
    Route::post('/store', [AssignTeacherController::class, 'store'])->name('store');

    Route::get('/subject', [AssignTeacherController::class, 'subject'])->name('subject');
    Route::post('/subject-store', [AssignTeacherController::class, 'subjectStore'])->name('subject-store');

    //Ajax Routes
    Route::get('/get-teacher-section',[AssignTeacherController::class, 'getSections'])->name('get-teacher-section');
    Route::get('/get-class-subjects',[AssignTeacherController::class, 'getSubjects'])->name('get-class-subjects');

});

    Route::group(['as' => 'committee.', 'prefix' => '/committee/'], function () {

        Route::get('/index', [CommitteeController::class, 'index'])->name('index');
        Route::get('/create', [CommitteeController::class, 'create'])->name('create');
        Route::post('/store', [CommitteeController::class, 'store'])->name('store');
        Route::any('/delete/{id}', [CommitteeController::class, 'destroy'])->name('destroy');
    
        Route::post('/get/number/of/table',[CommitteeController::class, 'getNumberOfTable'])->name('get_number_of.table');
        Route::get('/export-committee', [CommitteeController::class, 'exportCommittee'])->name('export');
    });
Route::group(['as' => 'staff.', 'prefix' => '/staff/'], function () {

    Route::get('/index', [StaffController::class, 'index'])->name('index');

    Route::get('/staffShow', [StaffController::class, 'staffShow'])->name('staffShow');

    Route::get('/create', [StaffController::class, 'create'])->name('create');
    Route::post('/store', [StaffController::class, 'store'])->name('store');

    Route::post('/get/number/of/table',[StaffController::class, 'getNumberOfTable'])->name('get_number_of.table');
    Route::get('/export-staffs', [StaffController::class, 'exportStaffs'])->name('export');
});
});


Route::group(['as' => 'committee.', 'prefix' => '/committee/'], function () {

    Route::get('/index', [CommitteeController::class, 'index'])->name('index');
    Route::get('/create', [CommitteeController::class, 'create'])->name('create');
    Route::post('/store', [CommitteeController::class, 'store'])->name('store');
    Route::any('/delete/{id}', [CommitteeController::class, 'destroy'])->name('destroy');

    Route::post('/get/number/of/table',[CommitteeController::class, 'getNumberOfTable'])->name('get_number_of.table');
    Route::get('/export-committee', [CommitteeController::class, 'exportCommittee'])->name('export');
});









