<?php

use App\Http\Controllers\Attendance\ApplicationController;
use App\Http\Controllers\Attendance\HolidayController;
use App\Http\Controllers\Attendance\LeaveTemplateController;
use App\Http\Controllers\Attendance\Setting\AutosmsSettingController;
use App\Http\Controllers\Attendance\Setting\SetOffDayController;
use App\Http\Controllers\Attendance\Setting\StudentSetupController;
use App\Http\Controllers\Attendance\Setting\StudentTimeSettingController;
use App\Http\Controllers\Attendance\Setting\TeacherSetupController;
use App\Http\Controllers\Attendance\Setting\TeacherTimeSettingController;
use App\Http\Controllers\Attendance\StaffAttendanceController;
use App\Http\Controllers\Attendance\StudentApplicationController;
use App\Http\Controllers\Attendance\StudentAttendanceController;
use App\Http\Controllers\Attendance\TeacherApplicationController;
use App\Http\Controllers\Attendance\TeachersAttendanceController;
use App\Http\Controllers\TeacherPanel\TeacherLeaveApplicationController;
use App\Models\TeacherTimesetting;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register your routes
|
*/


Route::group(['as' => 'attendance.', 'prefix' => '/attendance'], function () {
    
    Route::group(['as' => 'teacher.', 'prefix' => '/teacher'], function () {
        Route::get('/index', [TeachersAttendanceController::class, 'index'])->name('index');
        Route::get('/create', [TeachersAttendanceController::class, 'create'])->name('create');
        Route::post('/store', [TeachersAttendanceController::class, 'store'])->name('store');

        Route::get('/get-teachers-by-type/{type}',[TeachersAttendanceController::class,'getTeacherByType'])->name('get-teacher-by-type');
        Route::get('/get-teachers',[TeachersAttendanceController::class,'getTeachers'])->name('get-teachers');
        Route::get('/get-teachers-by-deg',[TeachersAttendanceController::class,'getTeacherByDesignation'])->name('get-teacher-by-designation');
        Route::get('/report', [TeachersAttendanceController::class, 'report'])->name('report');
        Route::get('/get-teacher-attendance', [TeachersAttendanceController::class, 'getTeacherAttendance'])->name('get-teacher-attendance');
    });

    Route::group(['as' => 'student.', 'prefix' => '/student'], function () {
        Route::get('/index', [StudentAttendanceController::class, 'index'])->name('index');
        Route::get('/create', [StudentAttendanceController::class, 'create'])->name('create');
        Route::post('/store', [StudentAttendanceController::class, 'store'])->name('store');

        Route::get('/report', [StudentAttendanceController::class, 'report'])->name('report');
        Route::get('/get-student-attendance', [StudentAttendanceController::class, 'getStudentStatus'])->name('get-student-attendance');
    });

    Route::group(['as' => 'holiday.', 'prefix' => '/holiday'], function () {
        Route::get('/index', [HolidayController::class, 'index'])->name('index');
        //ajax routes
        Route::get('/get-holiday', [HolidayController::class, 'getHoliday'])->name('get-holiday');
        Route::post('/post-holiday', [HolidayController::class, 'postHoliday'])->name('post-holiday');
        Route::get('/delete-holiday', [HolidayController::class, 'deleteHoliday'])->name('delete-holiday');
    });


    Route::group(['as' => 'leavetemplate.', 'prefix' => '/leave-template'], function () {
        Route::get('/index', [LeaveTemplateController::class, 'index'])->name('index');
        Route::get('/create', [LeaveTemplateController::class, 'create'])->name('create');
        Route::post('/store', [LeaveTemplateController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LeaveTemplateController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [LeaveTemplateController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [LeaveTemplateController::class, 'destroy'])->name('destroy');
    });


    Route::group(['as' => 'teacherapplication.', 'prefix' => '/teacher-application'], function () {
        Route::get('/index', [TeacherApplicationController::class, 'index'])->name('index');
        Route::get('/create', [TeacherApplicationController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [TeacherApplicationController::class, 'edit'])->name('edit');
        Route::any('/update/{type}/{id}', [TeacherApplicationController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [TeacherApplicationController::class, 'destroy'])->name('destroy');

        Route::get('/get/{id}', [TeacherApplicationController::class, 'getApplication']);
    });


    Route::group(['as' => 'studentapplication.', 'prefix' => '/student-application'], function () {
        Route::get('/index', [StudentApplicationController::class, 'index'])->name('index');
        Route::get('/create', [StudentApplicationController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [StudentApplicationController::class, 'edit'])->name('edit');
        Route::any('/update/{type}/{id}', [StudentApplicationController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [StudentApplicationController::class, 'destroy'])->name('destroy');

        Route::get('/get/{id}', [StudentApplicationController::class, 'getApplication']);
    });


    Route::group(['as' => 'applications.'], function () {
        Route::get('/approved-application', [ApplicationController::class, 'approvedApplication'])->name('approvedApplication');
        Route::get('/rejected-application', [ApplicationController::class, 'rejectedApplication'])->name('rejectedApplication');
    });


    Route::group(['as' => 'teachertime.', 'prefix' => '/teacher-time'], function () {
        Route::get('/index', [TeacherTimeSettingController::class, 'index'])->name('index');
        Route::get('/create', [TeacherTimeSettingController::class, 'create'])->name('create');
        Route::post('/store', [TeacherTimeSettingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TeacherTimeSettingController::class, 'edit'])->name('edit');
        Route::any('/update/{type}/{id}', [TeacherTimeSettingController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [TeacherTimeSettingController::class, 'destroy'])->name('destroy');

        Route::get('/get-teachers', [TeacherTimeSettingController::class, 'getTeachers'])->name('get-teachers');
    });


    Route::group(['as' => 'studenttime.', 'prefix' => '/student-time'], function () {
        Route::get('/index', [StudentTimeSettingController::class, 'index'])->name('index');
        Route::get('/create', [StudentTimeSettingController::class, 'create'])->name('create');
        Route::post('/store', [StudentTimeSettingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [StudentTimeSettingController::class, 'edit'])->name('edit');
        Route::any('/update/{type}/{id}', [StudentTimeSettingController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [StudentTimeSettingController::class, 'destroy'])->name('destroy');

        Route::get('/get-classes', [StudentTimeSettingController::class, 'getClasses'])->name('get-classes');
    });


    Route::group(['as' => 'autosmssetting.', 'prefix' => '/sms-setting'], function () {
        Route::get('/index', [AutosmsSettingController::class, 'index'])->name('index');
        Route::any('/present-sms', [AutosmsSettingController::class, 'presentSMS'])->name('present-sms');
        Route::any('/absent-sms', [AutosmsSettingController::class, 'absentSMS'])->name('absent-sms');
        Route::any('/student-present-sms', [AutosmsSettingController::class, 'studentpresentSMS'])->name('studentpresent-sms');
        Route::any('/student-absent-sms', [AutosmsSettingController::class, 'studentabsentSMS'])->name('studentabsent-sms');
        Route::any('/delay-sms', [AutosmsSettingController::class, 'delaySMS'])->name('delay-sms');
        Route::any('/student-delay-sms', [AutosmsSettingController::class, 'studentdelaySMS'])->name('student-delay-sms');
        Route::any('/early-sms', [AutosmsSettingController::class, 'earlySMS'])->name('early-sms');
        Route::any('/student-early-sms', [AutosmsSettingController::class, 'studentearlySMS'])->name('student-early-sms');
        Route::any('/student-leave-sms', [AutosmsSettingController::class, 'studentLeaveSms'])->name('student-leave-sms');
        Route::any('/teacher-leave-sms', [AutosmsSettingController::class, 'teacherLeaveSms'])->name('teacher-leave-sms');
        Route::any('/reset-template/{type}', [AutosmsSettingController::class, 'resetTemplate'])->name('reset-template');
    });


    Route::group(['as' => 'studentsetup.', 'prefix' => '/student-setup'], function () {
        Route::get('/index', [StudentSetupController::class, 'index'])->name('index');
        Route::any('/update', [StudentSetupController::class, 'update'])->name('update');
    });

    Route::group(['as' => 'teachersetup.', 'prefix' => '/teacher-setup'], function () {
        Route::get('/index', [TeacherSetupController::class, 'index'])->name('index');
        Route::any('/update', [TeacherSetupController::class, 'update'])->name('update');
        Route::get('/get-teachers-by-type/{type}',[TeacherSetupController::class,'getTeacherByType'])->name('get-teacher-by-type');
    });


    Route::group(['as' => 'setoffday.', 'prefix' => '/set-off-day'], function () {
        Route::get('/index', [SetOffDayController::class, 'index'])->name('index');
        Route::post('/store', [SetOffDayController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SetOffDayController::class, 'edit'])->name('edit');
        Route::any('/update/{id}', [SetOffDayController::class, 'update'])->name('update');
        Route::any('/destroy/{id}', [SetOffDayController::class, 'destroy'])->name('destroy');
    });

});


Route::controller(StudentAttendanceController::class)
    ->prefix('/attendance')
    ->name('StudentAttend.')
    ->group(function () {
        Route::get('/student', 'index')->name('index');
    });
