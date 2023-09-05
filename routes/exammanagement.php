<?php

use App\Http\Controllers\ExamManagement\ExamManagementController;
use App\Http\Controllers\ExamManagement\MarksController;
use App\Http\Controllers\ExamManagement\UpdateMarksController;
use App\Http\Controllers\ExamManagement\DeleteMarksController;
use App\Http\Controllers\ExamManagement\ClassTestController;
use App\Http\Controllers\ExamManagement\ReportController;
use App\Http\Controllers\ExamManagement\TabulationSheetController;
use App\Http\Controllers\ExamManagement\TranscriptController;
use App\Http\Controllers\ExamManagement\AverageReportController;
use App\Http\Controllers\ExamManagement\ClassTestReportController;
use App\Http\Controllers\ExamManagement\ExamStartUpController;
use App\Http\Controllers\ExamManagement\MarksConfigureController;
use App\Http\Controllers\ExamManagement\MarksSheetConfigureController;
use App\Http\Controllers\ExamManagement\DateConfigureController;
use App\Http\Controllers\ExamManagement\GpaController;
use App\Http\Controllers\ExamManagement\AttandanceController;
use App\Http\Controllers\ExamManagement\TranscriptDesignController;
use App\Http\Controllers\ExamManagement\RemarksConfigureController;
use App\Http\Controllers\ExamManagement\SubMarksDistController;
use App\Http\Controllers\ExamManagement\SubMarksDistTypeController;

use App\Models\SubMarksDist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::group(['as'=>'exam-management.','prefix'=>'exam-management'],function(){

//ajax routes
Route::get('/get-subjects-by-class',[ExamManagementController::class,'getSubjects'])->name('get-subjects');

Route::group(['as' => 'dashboard.','prefix' => 'dashboard'],function (){
    Route::get('/index',[\App\Http\Controllers\ExamManagement\ExamDashboardController::class,'index'])->name('index');
});

Route::group(['as'=>'exam.','prefix'=>'exam'],function(){
    Route::get('/index',[ExamManagementController::class,'index'])->name('index');
    Route::get('/list',[ExamManagementController::class,'examList'])->name('examList');
    Route::post('/store',[ExamManagementController::class,'store'])->name('store');
    Route::get('/create',[ExamManagementController::class,'create'])->name('create');
    Route::get('/edit/{id}',[ExamManagementController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[ExamManagementController::class,'show'])->name('show');
    Route::post('/update/{id}',[ExamManagementController::class,'update'])->name('update');
    Route::get('/destroy/{id}',[ExamManagementController::class,'destroy'])->name('destroy');
});


Route::group(['as'=>'transcript.','prefix'=>'/transcript'],function(){
    Route::get('/index',[TranscriptController::class,'index'])->name('index');
    Route::get('/{id}/{exam_id}/view',[TranscriptController::class,'view'])->name('view');
    // Route::get('/create',[TranscriptController::class,'create'])->name('create');
    // Route::get('/download-tag/{id}',[TranscriptController::class,'downloadCard'])->name('download');
    // Route::post('/all-student-tag',[TranscriptController::class,'Alldownload'])->name('alldownload');
    // // ajax route
    // Route::get('/subjectbyclassid/{id}',[TranscriptController::class,'subjectByClassId']);
});



Route::group(['as'=>'marks.','prefix'=>'marks'],function(){

    Route::get('/index',[MarksController::class,'index'])->name('index');
    Route::get('/create',[MarksController::class,'create'])->name('create');
    Route::post('/store',[MarksController::class,'store'])->name('store');

    Route::post('/download-excel',[MarksController::class,'downloadExcel'])->name('download-excel');
    //ajax routes
    Route::get('/get-subjects',[MarksController::class,'getSubjects'])->name('get-subjects');
    Route::get('/get-students',[MarksController::class,'getStudents'])->name('get-students');
    Route::get('/get-marks',[MarksController::class,'getMarks'])->name('get-marks');

});
Route::group(['as'=>'update-marks.','prefix'=>'update-marks'],function(){
    Route::get('/index',[UpdateMarksController::class,'index'])->name('index');
    Route::get('/list',[UpdateMarksController::class,'examList'])->name('examList');
    Route::post('/store',[UpdateMarksController::class,'store'])->name('store');
    Route::get('/create',[UpdateMarksController::class,'create'])->name('create');
    Route::get('/edit/{id}',[UpdateMarksController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[UpdateMarksController::class,'show'])->name('show');
    Route::post('/update/{id}',[UpdateMarksController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[UpdateMarksController::class,'destroy'])->name('destroy');
});
Route::group(['as'=>'delete-marks.','prefix'=>'delete-marks'],function(){
    Route::get('/index',[DeleteMarksController::class,'index'])->name('index');
    Route::get('/list',[DeleteMarksController::class,'examList'])->name('examList');
    Route::post('/store',[DeleteMarksController::class,'store'])->name('store');
    Route::get('/create',[DeleteMarksController::class,'create'])->name('create');
    Route::get('/edit/{id}',[DeleteMarksController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[DeleteMarksController::class,'show'])->name('show');
    Route::post('/update/{id}',[DeleteMarksController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[DeleteMarksController::class,'destroy'])->name('destroy');
});
Route::group(['as'=>'marks-input.','prefix'=>'marks-input'],function(){
    Route::get('/index',[ClassTestController::class,'index'])->name('index');
    Route::get('/list',[ClassTestController::class,'examList'])->name('examList');
    Route::post('/store',[ClassTestController::class,'store'])->name('store');
    Route::get('/create',[ClassTestController::class,'create'])->name('create');
    Route::get('/edit/{id}',[ClassTestController::class,'edit'])->name('edit');
    Route::get('/{id}/show',[ClassTestController::class,'show'])->name('show');
    Route::post('/update/{id}',[ClassTestController::class,'update'])->name('update');
    Route::post('/destroy/{id}',[ClassTestController::class,'destroy'])->name('destroy');
});

// Report Menu
Route::group(['as'=>'report.','prefix'=>'report'],function(){
    Route::group(['as'=>'class-position.','prefix'=>'class-position'],function(){
        Route::get('/index',[ReportController::class,'index'])->name('index');
        Route::get('/list',[ReportController::class,'examList'])->name('examList');
        Route::post('/store',[ReportController::class,'store'])->name('store');
        Route::get('/create',[ReportController::class,'create'])->name('create');
        Route::get('/edit/{id}',[ReportController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ReportController::class,'show'])->name('show');
        Route::post('/update/{id}',[ReportController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ReportController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'transcript.','prefix'=>'transcript'],function(){
        Route::get('/',[TranscriptController::class,'index'])->name('index');
        Route::get('/list',[TranscriptController::class,'examList'])->name('examList');
        Route::post('/store',[TranscriptController::class,'store'])->name('store');
        Route::get('/create',[TranscriptController::class,'create'])->name('create');
        Route::get('/edit/{id}',[TranscriptController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TranscriptController::class,'show'])->name('show');
        Route::post('/update/{id}',[TranscriptController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[TranscriptController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'tabulation-sheet.','prefix'=>'tabulation-sheet'],function(){
        Route::get('/',[TabulationSheetController::class,'index'])->name('index');
        Route::get('/list',[TabulationSheetController::class,'examList'])->name('examList');
        Route::post('/store',[TabulationSheetController::class,'store'])->name('store');
        Route::get('/create',[TabulationSheetController::class,'create'])->name('create');
        Route::get('/edit/{id}',[TabulationSheetController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TabulationSheetController::class,'show'])->name('show');
        Route::post('/update/{id}',[TabulationSheetController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[TabulationSheetController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'average-report.','prefix'=>'average-report'],function(){
        Route::get('/',[AverageReportController::class,'index'])->name('index');
        Route::get('/list',[AverageReportController::class,'examList'])->name('examList');
        Route::post('/store',[AverageReportController::class,'store'])->name('store');
        Route::get('/create',[AverageReportController::class,'create'])->name('create');
        Route::get('/edit/{id}',[AverageReportController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[AverageReportController::class,'show'])->name('show');
        Route::post('/update/{id}',[AverageReportController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[AverageReportController::class,'destroy'])->name('destroy');
    });
    Route::group(['as'=>'test-report.','prefix'=>'test-report'],function(){
        Route::get('/',[ClassTestReportController::class,'index'])->name('index');
        Route::get('/list',[ClassTestReportController::class,'examList'])->name('examList');
        Route::post('/store',[ClassTestReportController::class,'store'])->name('store');
        Route::get('/create',[ClassTestReportController::class,'create'])->name('create');
        Route::get('/edit/{id}',[ClassTestReportController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ClassTestReportController::class,'show'])->name('show');
        Route::post('/update/{id}',[ClassTestReportController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ClassTestReportController::class,'destroy'])->name('destroy');
    });
});

Route::group(['as'=>'setting.','prefix'=>'setting'],function(){

    Route::group(['as'=>'exam-start-up.','prefix'=>'exam-start-up'],function(){
        Route::get('/',[ExamStartUpController::class,'index'])->name('index');
        Route::get('/list',[ExamStartUpController::class,'examList'])->name('examList');
        Route::post('/store',[ExamStartUpController::class,'store'])->name('store');
        Route::get('/create',[ExamStartUpController::class,'create'])->name('create');
        Route::get('/edit/{id}',[ExamStartUpController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ExamStartUpController::class,'show'])->name('show');
        Route::post('/update/{id}',[ExamStartUpController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ExamStartUpController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'marks-configure.','prefix'=>'marks-configure'],function(){
        Route::get('/',[MarksConfigureController::class,'index'])->name('index');
        Route::get('/list',[MarksConfigureController::class,'examList'])->name('examList');
        Route::post('/store',[MarksConfigureController::class,'store'])->name('store');
        Route::get('/create',[MarksConfigureController::class,'create'])->name('create');
        Route::get('/edit/{id}',[MarksConfigureController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[MarksConfigureController::class,'show'])->name('show');
        Route::post('/update/{id}',[MarksConfigureController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[MarksConfigureController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'marks-sheet-configure.','prefix'=>'marks-sheet-configure'],function(){
        Route::get('/',[MarksSheetConfigureController::class,'index'])->name('index');
        Route::get('/list',[MarksSheetConfigureController::class,'examList'])->name('examList');
        Route::post('/store',[MarksSheetConfigureController::class,'store'])->name('store');
        Route::get('/create',[MarksSheetConfigureController::class,'create'])->name('create');
        Route::get('/edit/{id}',[MarksSheetConfigureController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[MarksSheetConfigureController::class,'show'])->name('show');
        Route::post('/update/{id}',[MarksSheetConfigureController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[MarksSheetConfigureController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'remarks-configure.','prefix'=>'remarks-configure'],function(){
        Route::get('/',[RemarksConfigureController::class,'index'])->name('index');
        Route::get('/list',[RemarksConfigureController::class,'examList'])->name('examList');
        Route::post('/store',[RemarksConfigureController::class,'store'])->name('store');
        Route::get('/create',[RemarksConfigureController::class,'create'])->name('create');
        Route::get('/edit/{id}',[RemarksConfigureController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[RemarksConfigureController::class,'show'])->name('show');
        Route::post('/update/{id}',[RemarksConfigureController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[RemarksConfigureController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'date-configure.','prefix'=>'date-configure'],function(){
        Route::get('/',[DateConfigureController::class,'index'])->name('index');
        Route::get('/list',[DateConfigureController::class,'examList'])->name('examList');
        Route::post('/store',[DateConfigureController::class,'store'])->name('store');
        Route::get('/create',[DateConfigureController::class,'create'])->name('create');
        Route::get('/edit/{id}',[DateConfigureController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[DateConfigureController::class,'show'])->name('show');
        Route::post('/update/{id}',[DateConfigureController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[DateConfigureController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'gpa-grading.','prefix'=>'gpa-grading'],function(){
        Route::get('/',[GpaController::class,'index'])->name('index');
        Route::get('/list',[GpaController::class,'examList'])->name('examList');
        Route::post('/store',[GpaController::class,'store'])->name('store');
        Route::get('/create',[GpaController::class,'create'])->name('create');
        Route::get('/edit/{id}',[GpaController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[GpaController::class,'show'])->name('show');
        Route::post('/update/{id}',[GpaController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[GpaController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'attandance-count.','prefix'=>'attandance-count'],function(){
        Route::get('/',[AttandanceController::class,'index'])->name('index');
        Route::get('/list',[AttandanceController::class,'examList'])->name('examList');
        Route::post('/store',[AttandanceController::class,'store'])->name('store');
        Route::get('/create',[AttandanceController::class,'create'])->name('create');
        Route::get('/edit/{id}',[AttandanceController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[AttandanceController::class,'show'])->name('show');
        Route::post('/update/{id}',[AttandanceController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[AttandanceController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'transcript-design.','prefix'=>'transcript-design'],function(){
        Route::get('/',[TranscriptDesignController::class,'index'])->name('index');
        Route::get('/list',[TranscriptDesignController::class,'examList'])->name('examList');
        Route::post('/store',[TranscriptDesignController::class,'store'])->name('store');
        Route::get('/create',[TranscriptDesignController::class,'create'])->name('create');
        Route::get('/edit/{id}',[TranscriptDesignController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TranscriptDesignController::class,'show'])->name('show');
        Route::post('/update/{id}',[TranscriptDesignController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[TranscriptDesignController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'marks-dist-type.','prefix'=>'marks-dist-type'],function(){
        Route::get('/',[SubMarksDistTypeController::class,'index'])->name('index');
        Route::get('/create',[SubMarksDistTypeController::class,'create'])->name('create');
        Route::post('/store',[SubMarksDistTypeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SubMarksDistTypeController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[SubMarksDistTypeController::class,'show'])->name('show');
        Route::post('/update/{id}',[SubMarksDistTypeController::class,'update'])->name('update');
        Route::any('/destroy/{id}',[SubMarksDistTypeController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'marks-dist.','prefix'=>'marks-dist'],function(){
        Route::get('/',[SubMarksDistController::class,'index'])->name('index');
        Route::get('/create',[SubMarksDistController::class,'create'])->name('create');
        Route::post('/store',[SubMarksDistController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SubMarksDistController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[SubMarksDistController::class,'show'])->name('show');
        Route::post('/update/{id}',[SubMarksDistController::class,'update'])->name('update');
        Route::any('/destroy/{id}',[SubMarksDistController::class,'destroy'])->name('destroy');
    });

});


});


Route::get('/get-subjectbyclassid', [SubMarksDistController::class,'getsubjectByClass'])->name('get-subjects-by-class');

