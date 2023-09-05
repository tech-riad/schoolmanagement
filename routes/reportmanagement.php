<?php


use App\Http\Controllers\ReportManagement\StudentListReportController;
use App\Http\Controllers\ReportManagement\TeacherListController;
use App\Http\Controllers\ReportManagement\ResultReportController;
use App\Http\Controllers\ReportManagement\AttendanceReportController;
use App\Http\Controllers\ReportManagement\AdmitCardController;
use App\Http\Controllers\ReportManagement\SeatPlanController;
use App\Http\Controllers\ReportManagement\ClassRoutineController;
use App\Http\Controllers\ReportManagement\ExamRoutineController;
use App\Http\Controllers\ReportManagement\SlipController;


use Illuminate\Support\Facades\Route;




Route::group(['as'=>'report-management.','prefix'=>'report-management'],function(){
        
        Route::group(['as'=>'student-list.','prefix'=>'student-list'],function(){
            Route::get('/',[StudentListReportController::class,'index'])->name('index');
            Route::post('/store',[StudentListReportController::class,'store'])->name('store');
            Route::get('/create',[StudentListReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[StudentListReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[StudentListReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[StudentListReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[StudentListReportController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'teacher-list.','prefix'=>'teacher-list'],function(){
            Route::get('/',[TeacherListController::class,'index'])->name('index');
            Route::post('/store',[TeacherListController::class,'store'])->name('store');
            Route::get('/create',[TeacherListController::class,'create'])->name('create');
            Route::get('/edit/{id}',[TeacherListController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[TeacherListController::class,'show'])->name('show');
            Route::post('/update/{id}',[TeacherListController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[TeacherListController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'result-report.','prefix'=>'result-report'],function(){
            Route::get('/',[ResultReportController::class,'index'])->name('index');
            Route::post('/store',[ResultReportController::class,'store'])->name('store');
            Route::get('/create',[ResultReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ResultReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ResultReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[ResultReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ResultReportController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'attendance-report.','prefix'=>'attendance-report'],function(){
            Route::get('/',[AttendanceReportController::class,'index'])->name('index');
            Route::post('/store',[AttendanceReportController::class,'store'])->name('store');
            Route::get('/create',[AttendanceReportController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AttendanceReportController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AttendanceReportController::class,'show'])->name('show');
            Route::post('/update/{id}',[AttendanceReportController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AttendanceReportController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'admit-card.','prefix'=>'admit-card'],function(){
            Route::get('/',[AdmitCardController::class,'index'])->name('index');
            Route::post('/store',[AdmitCardController::class,'store'])->name('store');
            Route::get('/create',[AdmitCardController::class,'create'])->name('create');
            Route::get('/edit/{id}',[AdmitCardController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[AdmitCardController::class,'show'])->name('show');
            Route::post('/update/{id}',[AdmitCardController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[AdmitCardController::class,'destroy'])->name('destroy');
        });
        
        Route::group(['as'=>'seat-plan.','prefix'=>'seat-plan'],function(){
            Route::get('/',[SeatPlanController::class,'index'])->name('index');
            Route::post('/store',[SeatPlanController::class,'store'])->name('store');
            Route::get('/create',[SeatPlanController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SeatPlanController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SeatPlanController::class,'show'])->name('show');
            Route::post('/update/{id}',[SeatPlanController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SeatPlanController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'class-routine.','prefix'=>'class-routine'],function(){
            Route::get('/',[ClassRoutineController::class,'index'])->name('index');
            Route::post('/store',[ClassRoutineController::class,'store'])->name('store');
            Route::get('/create',[ClassRoutineController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ClassRoutineController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ClassRoutineController::class,'show'])->name('show');
            Route::post('/update/{id}',[ClassRoutineController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ClassRoutineController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'exam-routine.','prefix'=>'exam-routine'],function(){
            Route::get('/',[ExamRoutineController::class,'index'])->name('index');
            Route::post('/store',[ExamRoutineController::class,'store'])->name('store');
            Route::get('/create',[ExamRoutineController::class,'create'])->name('create');
            Route::get('/edit/{id}',[ExamRoutineController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[ExamRoutineController::class,'show'])->name('show');
            Route::post('/update/{id}',[ExamRoutineController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[ExamRoutineController::class,'destroy'])->name('destroy');
        });
        Route::group(['as'=>'slip.','prefix'=>'slip'],function(){
            Route::get('/',[SlipController::class,'index'])->name('index');
            Route::post('/store',[SlipController::class,'store'])->name('store');
            Route::get('/create',[SlipController::class,'create'])->name('create');
            Route::get('/edit/{id}',[SlipController::class,'edit'])->name('edit');
            Route::get('/{id}/show',[SlipController::class,'show'])->name('show');
            Route::post('/update/{id}',[SlipController::class,'update'])->name('update');
            Route::post('/destroy/{id}',[SlipController::class,'destroy'])->name('destroy');
        });
        

       
        
       

    });




