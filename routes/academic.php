<?php

use App\Http\Controllers\Academic\SessionController;
use App\Http\Controllers\Academic\SectionController;
use App\Http\Controllers\Academic\InsClassController;
use App\Http\Controllers\Academic\ShiftController;
use App\Http\Controllers\{
    CategoryController,
    TeacherAttendanceController,

};
use App\Http\Controllers\Academic\AdmitCardController;
use App\Http\Controllers\Academic\IdCardController;
use App\Http\Controllers\Academic\NumberSheetController;
use App\Http\Controllers\Academic\SeatPlanController;
use App\Http\Controllers\Academic\TestimonialController;
use App\Http\Controllers\Academic\TransferCertificateController;
use App\Http\Controllers\Academic\AcademicSettingController;
use App\Http\Controllers\Academic\GroupController;
use App\Http\Controllers\Student\StudentTagController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register your routes
|
*/

Route::controller(SessionController::class)
    ->prefix('/academic/')
    ->name('session.')
    ->group(function () {

        Route::get('/sessions', 'index')->name('index');
        Route::post('/sessions', 'store')->name('store');
        Route::get('/sessions/{id}', 'show')->name('show');
        Route::put('/sessions/{id}', 'update');
        Route::delete('/sessions/{id}', 'destroy');
});


Route::controller(InsClassController::class)
    ->prefix('/academic/')
    ->name('classes.')
    ->group(function () {
        Route::get('/classes', 'index')->name('index');
        Route::post('/classes', 'store')->name('store');
        Route::get('/classes/{id}', 'show')->name('show');
        Route::put('/classes/{id}', 'update');
        Route::delete('/classes/{id}', 'destroy');
});




Route::controller(ShiftController::class)
    ->prefix('/academic/')
    ->name('shift.')
    ->group(function () {
        Route::post('/shift', 'store')->name('store');
});

Route::controller(CategoryController::class)
    ->prefix('/academic/')
    ->name('category.')
    ->group(function () {
        Route::post('/category', 'store')->name('store');
});

Route::controller(SectionController::class)
    ->prefix('/academic/')
    ->name('section.')
    ->group(function () {
        Route::post('/section', 'store')->name('store');
});

Route::controller(GroupController::class)
    ->prefix('/academic/')
    ->name('group.')
    ->group(function () {
        Route::post('/group', 'store')->name('store');
});


//academic routes
Route::group(['as'=>'academic.','prefix'=>'/academic'],function(){


    Route::group(['as' => 'subject.','prefix' => 'subject'],function (){

        Route::get('/',[\App\Http\Controllers\Academic\SubjectSettingsController::class,'index'])->name('index');

        //ajax routes
        Route::get('/order-subject',[\App\Http\Controllers\Academic\SubjectSettingsController::class,'orderSubject'])->name('order-subject');
    });

    Route::group(['as'=>'setting.','prefix'=>'/setting'],function(){
        Route::get('/',[AcademicSettingController::class,'edit'])->name('edit');
        Route::put('/update/{id}',[AcademicSettingController::class,'update'])->name('update');

    });

    Route::group(['as'=>'id-card.','prefix'=>'/id-card'],function(){

        Route::get('/index',[IdCardController::class,'index'])->name('index');
        Route::get('/view/{id}',[IdCardController::class,'view'])->name('view');
        Route::get('/download-card/{id}',[IdCardController::class,'downloadCard'])->name('download');
        Route::post('/all-idcard',[IdCardController::class,'allDownload'])->name('alldownload');
        Route::post('/idcard-back',[IdCardController::class,'backDownload'])->name('back-download');

    });

    Route::group(['as'=>'admit-card.','prefix'=>'/admit-card'],function(){

        Route::get('/index',[AdmitCardController::class,'index'])->name('index');
        Route::get('/view/{id}/{exam_id}/{session}',[AdmitCardController::class,'view'])->name('view');
        Route::get('/download-admit/{id}/{exam_id}/{session}',[AdmitCardController::class,'downloadCard'])->name('download');
        Route::post('/all-admit',[AdmitCardController::class,'allDownload'])->name('alldownload');

    });

    Route::group(['as'=>'seat-plan.','prefix'=>'/seat-plan'],function(){

        Route::get('/index',[SeatPlanController::class,'index'])->name('index');
        Route::get('/view/{id}/{exam_id}',[SeatPlanController::class,'view'])->name('view');
        Route::get('/download-card/{id}/{exam_id}',[SeatPlanController::class,'downloadCard'])->name('download');
        Route::post('/all-download',[SeatPlanController::class,'Alldownload'])->name('alldownload');
        Route::post('/all-view',[SeatPlanController::class,'allView'])->name('allview');

    });

    Route::group(['as'=>'transfer-certificate.','prefix'=>'/transfer-certificate'],function(){

        Route::get('/index',[TransferCertificateController::class,'index'])->name('index');
        Route::get('/create',[TransferCertificateController::class,'create'])->name('create');
        Route::get('/view/{id}',[TransferCertificateController::class,'view'])->name('view');
        Route::post('/store',[TransferCertificateController::class,'store'])->name('store');
        Route::get('/download-transfer-certificate/{id}',[TransferCertificateController::class,'downloadPdf'])->name('downloadPdf');
        Route::post('/all-transfer',[TransferCertificateController::class,'Alldownload'])->name('alldownload');

    });

    Route::group(['as'=>'testimonial.','prefix'=>'/testimonial'],function(){

        Route::get('/index',[TestimonialController::class,'index'])->name('index');
        Route::get('/view/{id}',[TestimonialController::class,'view'])->name('view');
        Route::get('/download-testimonial/{id}',[TestimonialController::class,'downloadCard'])->name('download');
        Route::post('/all-testimonial',[TestimonialController::class,'Alldownload'])->name('alldownload');

    });

    Route::group(['as'=>'student-tag.','prefix'=>'/student-tag'],function(){

        Route::get('/index',[StudentTagController::class,'index'])->name('index');
        Route::get('/view/{id}',[StudentTagController::class,'view'])->name('view');
        Route::get('/download-tag/{id}',[StudentTagController::class,'downloadCard'])->name('download');
        Route::post('/all-student-tag',[StudentTagController::class,'Alldownload'])->name('alldownload');

    });


    Route::group(['as'=>'number-sheet.','prefix'=>'/number-sheet'],function(){

        Route::get('/index',[NumberSheetController::class,'index'])->name('index');
        // ajax route
        Route::get('/subjectbyclassid/{id}',[NumberSheetController::class,'subjectByClassId']);
        Route::post('/download-sheet/',[NumberSheetController::class,'downloadCard'])->name('download');

    });

});




    // Route::group(['as' => 'academic.', 'prefix' => 'academic'], function () {

    //     Route::group(['as' => 'id-card.', 'prefix' => 'id-card'], function () {

    //         Route::get('/index', [IdCardController::class, 'index'])->name('index');


    //     });
    // });
