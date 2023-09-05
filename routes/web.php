<?php

use App\Helper\Helper;
use App\Http\Controllers\Academic\SessionController;
use App\Http\Controllers\Academic\GeneralGradeController;
use App\Http\Controllers\Academic\GroupController;
use App\Http\Controllers\Academic\InsClassController;
use App\Http\Controllers\Academic\SectionController;
use App\Http\Controllers\Academic\ShiftController;
use App\Http\Controllers\Academic\SubjectController;
use App\Http\Controllers\Academic\TestGradeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdmissionGradeController;
use App\Http\Controllers\Attendance\TeachersAttendanceController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SoftwareSettings\SystemThemeController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ClassSubjectController;


use App\Http\Controllers\MenuController;
use App\Http\Controllers\OnlineExam\OnlineExamController;
use App\Http\Controllers\Parentportal\Dairytask\ClassRoutineController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoutineManagement\ClassRoutine;
use App\Http\Controllers\RoutineManagement\ExamRoutine;
use App\Http\Controllers\SearchResultController;


use App\Http\Controllers\Admin\HomeWorkController;
use App\Http\Controllers\SoftwareSettings\IdcardThemeController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\QuestionManagement\QuestionManagementController;
use App\Http\Controllers\Settings\SBCPaymentGatewayController;
use App\Http\Controllers\ShurjopayIntigrationController;
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Teacher\TeacherAuthController;

use App\Http\Controllers\UnderConstruction\ViewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebAdmin\PageController;
use App\Http\Controllers\WebsiteController;
use App\Models\AdmissionGrade;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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





//Student Login
Route::post('/student/login',[StudentAuthController::class,'login'])->name('student.login');
Route::post('/teacher/login',[TeacherAuthController::class,'login'])->name('teacher.login');

Auth::routes(['register' => false, 'login' =>false]);

Route::get('/underconstruction',[ViewController::class,'index'])->name('unc_message');
//Route::get('/expired',[ViewController::class,'expired'])->name('expired');
Route::get('/pay-now',[ViewController::class,'expired'])->name('pay-now');

Route::get('/under-review',[ViewController::class,'underReview'])->name('under-review');

Route::get('/setup-edteco',[InstallController::class,'install'])->name('install');
//Route::get('/setup-sms',[InstallController::class,'autoSMSSetting'])->name('sms-setting');

//new setup routes
//Route::get('/setup-class',[InstallController::class,'createSessionClass'])->name('class-setup');
//Route::get('/setup-student',[InstallController::class,'createStudents'])->name('student-setup');
//Route::get('/setup-edteco-menu',[InstallController::class,'menuSetup'])->name('menu-setup');
//Route::get('/setup-edteco-academic',[InstallController::class,'academicSetup'])->name('academic-setup');
//Route::get('/setup-edteco-social',[InstallController::class,'createSocialLink']);
//Route::get('/setup-edteco-glance',[InstallController::class,'createAtAGlance']);
//Route::get('/setup-chart-of-account',[InstallController::class,'createChartOfAccount']);
//Route::get('/setup-fees',[InstallController::class,'createFeeType']);
//Route::get('/setup-subject',[InstallController::class,'createSubject']);
//Route::get('/setup-admin-template',[InstallController::class,'createAdminTemplate']);
//Route::get('/setup-front-section',[InstallController::class,'createFrontSection']);

// Admin Menu Setup
Route::get('/setup-edteco-admin-menu',[InstallController::class,'adminMenuSetup'])->name('admin-menu-setup');
//change language
Route::get('/change-lang',[LanguageController::class,'changeLang'])->name('change-lang');
Route::get('/expired-check',[WebsiteController::class,'expiredCheck'])->name('expired-check');
Route::get('/expired-day-count',[WebsiteController::class,'expiredDayCount'])->name('expired-day-count');


 Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('domain-check');

    Route::group(['as'=>'session.','prefix'=>'/academic/session/'],function(){
        Route::get('/index',[SessionController::class,'index'])->name('index');
        Route::post('/store',[SessionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SessionController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[SessionController::class,'show'])->name('show');
        Route::post('/update/{id}',[SessionController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[SessionController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'web-admin.','prefix'=>'/academic/web-admin/'],function(){
        Route::get('/index',[SessionController::class,'index'])->name('index');
        Route::post('/store',[SessionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SessionController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[SessionController::class,'show'])->name('show');
        Route::post('/update/{id}',[SessionController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[SessionController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'classes.','prefix'=>'/academic/class'],function(){
        Route::get('/index',[InsClassController::class,'index'])->name('index');
        Route::post('/store',[InsClassController::class,'store'])->name('store');
        Route::get('/edit/{id}',[InsClassController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[InsClassController::class,'show'])->name('show');
        Route::post('/update/{id}',[InsClassController::class,'update'])->name('update');
        Route::any('/{id}/destroy',[InsClassController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'shift.','prefix'=>'/academic/shift'],function(){
        Route::get('/index/',[ShiftController::class,'index'])->name('index');
        Route::post('/store',[ShiftController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ShiftController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ShiftController::class,'show'])->name('show');
        Route::post('/update/{id}',[ShiftController::class,'update'])->name('update');
        Route::any('/{id}/destroy',[ShiftController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'category.','prefix'=>'/academic/class/category'],function(){
        Route::get('/index/{id}',[CategoryController::class,'index'])->name('index');
        Route::post('/store',[CategoryController::class,'store'])->name('store');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[CategoryController::class,'show'])->name('show');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
        Route::any('/{id}/destroy',[CategoryController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'section.','prefix'=>'/academic/class/section'],function(){
        Route::get('/index/{id}',[SectionController::class,'index'])->name('index');
        Route::post('/store',[SectionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[SectionController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[SectionController::class,'show'])->name('show');
        Route::post('/update/{id}',[SectionController::class,'update'])->name('update');
        Route::any('/{id}/destroy',[SectionController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'group.','prefix'=>'/academic/class/group'],function(){
        Route::get('/index/{id}',[GroupController::class,'index'])->name('index');
        Route::post('/store',[GroupController::class,'store'])->name('store');
        Route::get('/edit/{id}',[GroupController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[GroupController::class,'show'])->name('show');
        Route::post('/update/{id}',[GroupController::class,'update'])->name('update');
        Route::any('/{id}/destroy',[GroupController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'genGrade.','prefix'=>'/academic/class/general-grade'],function(){
        Route::get('/index/{id}',[GeneralGradeController::class,'index'])->name('index');
        Route::get('/{id}/create',[GeneralGradeController::class,'create'])->name('create');
        Route::post('/store',[GeneralGradeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[GeneralGradeController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[GeneralGradeController::class,'show'])->name('show');
        Route::post('/update/{id}',[GeneralGradeController::class,'update'])->name('update');
        Route::post('/{id}/destroy',[GeneralGradeController::class,'destroy'])->name('destroy');
    });

    Route::group(['as'=>'testGrade.','prefix'=>'/academic/class/test-grade'],function(){
        Route::get('/index/{id}',[TestGradeController::class,'index'])->name('index');
        Route::get('/{id}/create',[TestGradeController::class,'create'])->name('create');
        Route::post('/store',[TestGradeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[TestGradeController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TestGradeController::class,'show'])->name('show');
        Route::post('/update/{id}',[TestGradeController::class,'update'])->name('update');
        Route::post('/{id}/destroy',[TestGradeController::class,'destroy'])->name('destroy');
    });

    // Route::group(['as'=>'addGrade.','prefix'=>'/academic/class/admission-grade'],function(){
    //     Route::get('/index/{id}',[AdmissionGradeController::class,'index'])->name('index');
    //     Route::get('/{id}/create',[AdmissionGradeController::class,'create'])->name('create');
    //     Route::post('/store',[AdmissionGradeController::class,'store'])->name('store');
    //     Route::get('/edit/{id}',[AdmissionGradeController::class,'edit'])->name('edit');
    //     Route::get('/{id}/show',[AdmissionGradeController::class,'show'])->name('show');
    //     Route::put('/update/{id}',[AdmissionGradeController::class,'update'])->name('update');
    //     Route::post('/{id}/destroy',[AdmissionGradeController::class,'destroy'])->name('destroy');
    // });

    Route::group(['as'=>'subject.','prefix'=>'/academic/class/subject'],function(){
        Route::get('/index/{id}',[SubjectController::class,'index'])->name('index');
        Route::get('/list/{id}',[SubjectController::class,'list'])->name('list');
        Route::post('/store',[SubjectController::class,'store'])->name('store');
        Route::post('/add',[SubjectController::class,'subjectAdd'])->name('subjectAdd');
        Route::get('/edit/{id}',[SubjectController::class,'edit'])->name('edit');
        Route::post('/update',[SubjectController::class,'update'])->name('update');
        Route::any('/destroy/{id}',[SubjectController::class,'destroy'])->name('destroy');
        Route::get('/delete/{id}',[SubjectController::class,'delete'])->name('delete');

        Route::get('/delete-class-subject/{id}',[SubjectController::class,'deleteClassSubject'])->name('delete-class-subject');
        //ajax routes
        Route::get('/get-subjects',[SubjectController::class,'getSubjects'])->name('get-subjects');
        Route::get('/get-subjects-by-type',[SubjectController::class,'getSubjectsByType'])->name('get-subjects-by-type');
    });


     Route::group(['as'=>'subject-type.','prefix'=>'/academic/class/subject-type'],function() {

         Route::get('/index',[\App\Http\Controllers\Academic\SubjectTypeController::class,'index'])->name('index');
         Route::get('/create',[\App\Http\Controllers\Academic\SubjectTypeController::class,'create'])->name('create');
         Route::post('/store',[\App\Http\Controllers\Academic\SubjectTypeController::class,'store'])->name('store');
         Route::any('/edit/{id}',[\App\Http\Controllers\Academic\SubjectTypeController::class,'edit'])->name('edit');
         Route::any('/update/{id}',[\App\Http\Controllers\Academic\SubjectTypeController::class,'update'])->name('update');
         Route::any('/destroy/{id}',[\App\Http\Controllers\Academic\SubjectTypeController::class,'destroy'])->name('destroy');
     });



    Route::group(['as'=>'teacher.','prefix'=>'/teacher/'],function(){
        Route::get('/index',[TeacherController::class,'index'])->name('index');
        Route::get('/create',[TeacherController::class,'create'])->name('create');
        Route::post('/store',[TeacherController::class,'store'])->name('store');
        Route::get('/edit/{id}',[TeacherController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TeacherController::class,'show'])->name('show');
        Route::post('/update/{id}',[TeacherController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[TeacherController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'classroutine.','prefix'=>'/routine/class'],function(){
        Route::get('/index',[ClassRoutine::class,'index'])->name('index');
        Route::post('/store',[ClassRoutine::class,'store'])->name('store');
        Route::get('/create',[ClassRoutine::class,'create'])->name('create');
        Route::get('/edit/{id}',[ClassRoutine::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ClassRoutine::class,'show'])->name('show');
        Route::post('/update/{id}',[ClassRoutine::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ClassRoutine::class,'destroy'])->name('destroy');

        //ajax route
        Route::get('/subject',[ClassRoutine::class,'getSubjects'])->name('subject');
        Route::post('/get-routine',[ClassRoutine::class,'getRoutine'])->name('get-routine');
    });


    Route::group(['as'=>'examroutine.','prefix'=>'/routine/exam'],function(){
        Route::get('/index',[ExamRoutine::class,'index'])->name('index');
        Route::post('/store',[ExamRoutine::class,'store'])->name('store');
        Route::get('/create',[ExamRoutine::class,'create'])->name('create');
        Route::get('/edit/{id}',[ExamRoutine::class,'edit'])->name('edit');
        Route::get('/{id}/show',[ExamRoutine::class,'show'])->name('show');
        Route::post('/update/{id}',[ExamRoutine::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ExamRoutine::class,'destroy'])->name('destroy');

        //ajax route
        Route::get('/group/{id}',[ExamRoutine::class,'getGroup'])->name('group');
        Route::get('/subject',[ExamRoutine::class,'getSubjects'])->name('subject');
    });

    Route::group(['as'=>'attendance.','prefix'=>'/attendance'],function(){
        Route::get('/index',[TeachersAttendanceController::class,'index'])->name('index');
        Route::post('/store',[TeachersAttendanceController::class,'store'])->name('store');
        Route::get('/create',[TeachersAttendanceController::class,'create'])->name('create');
        Route::get('/edit/{id}',[TeachersAttendanceController::class,'edit'])->name('edit');
        Route::get('/{id}/show',[TeachersAttendanceController::class,'show'])->name('show');
        Route::post('/update/{id}',[TeachersAttendanceController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[TeachersAttendanceController::class,'destroy'])->name('destroy');
    });


    Route::group(['as'=>'question.','prefix'=>'/question'],function(){
        Route::get('/index',[QuestionManagementController::class,'index'])->name('index');
        Route::get('/show/{id}',[QuestionManagementController::class,'show'])->name('show');
        Route::get('/mcq-index',[QuestionManagementController::class,'mcqindex'])->name('mcqindex');
        Route::get('/mcq-show/{id}',[QuestionManagementController::class,'mcqshow'])->name('mcqshow');
    });



    Route::group(['as'=>'homework.','prefix'=>'homework'],function(){

        Route::get('/',[HomeWorkController::class,'index'])->name('index');

    });

    Route::get('search-result',[SearchResultController::class,'result'])->name('search-result');

    Route::get('/get-district/{id}',[AddressController::class,'getDistrictByDivisionId'])->name('getDistrictByDivisionId');
    Route::get('/get-upazila/{id}',[AddressController::class,'getUpazilaByDistrictId'])->name('getUpazilaByDistrictId');


    //Software Settings Routes
    Route::group(['as'=>'software-settings.','prefix'=>'software-settings'],function (){
        Route::get('/import-data',[\App\Http\Controllers\InstallController::class,'importData'])->name('import-data');

        Route::group(['as'=>'system-theme.','prefix'=>'system-theme/'],function () {

            Route::get('/',[SystemThemeController::class,'index'])->name('index');
            Route::get('/themeUpdate/{id}',[SystemThemeController::class,'theamUpdate'])->name('theamUpdate');

        });

        Route::group(['as'=>'idcardtheme.','prefix'=>'theme/idcard'],function(){

            Route::get('/',[IdcardThemeController::class,'index'])->name('index');
            Route::get('/themeUpdate/{id}',[IdcardThemeController::class,'theamUpdate'])->name('theamUpdate');
            Route::get('/demo-front/{id}',[IdcardThemeController::class,'demoDownloadFront'])->name('demoDownloadFront');
            Route::get('/demo-back/{id}',[IdcardThemeController::class,'demoDownloadBack'])->name('demoDownloadBack');

        });

    });



    require (base_path('routes/academic.php'));
    require (base_path('routes/branch.php'));
    require (base_path('routes/student.php'));
    require (base_path('routes/designation.php'));
    // require (base_path('routes/cms.php'));
    require (base_path('routes/attendance.php'));

    require (base_path('routes/teacher.php'));
    require (base_path('routes/institute.php'));
    require (base_path('routes/webadmin.php'));
    require (base_path('routes/accounts.php'));
    require (base_path('routes/onlineexam.php'));
    require (base_path('routes/onlineadmission.php'));
    require (base_path('routes/homework.php'));
    require (base_path('routes/sms.php'));
    require (base_path('routes/pushnotification.php'));
    require (base_path('routes/digitalclassroom.php'));
    require (base_path('routes/reportmanagement.php'));
    require (base_path('routes/hostelmanagement.php'));
    require (base_path('routes/librarymanagement.php'));
    require (base_path('routes/inventorymanagement.php'));
    require (base_path('routes/transport.php'));
    require (base_path('routes/exammanagement.php'));
    require (base_path('routes/routinemanagement.php'));
    require (base_path('routes/role-management.php'));
});




require (base_path('routes/chartofaccount.php'));

// Frontend Routes
require (base_path('routes/website.php'));
Route::get('/pages/{slug}', [PageController::class, 'show'])->name('page.show');


require (base_path('routes/studentportal.php'));
require (base_path('routes/teacherpanel.php'));

//online payment
Route::get('/pay-with-shurjo', [ShurjopayIntigrationController::class, 'getAccessToken'])->name('pay-with-shurjo');
Route::get('/success-url', [ShurjopayIntigrationController::class, 'verifyPayment'])->name('successUrl');
Route::get('/cancel-url', [ShurjopayIntigrationController::class, 'cancelPayment'])->name('cancel-url-shurjo');
Route::get('/success-payment', [ShurjopayIntigrationController::class, 'paymentSuccess'])->name('success-payment');


//sbc payment gateway controller
Route::get('/pay-with-sbg',[SBCPaymentGatewayController::class,'getAccessToken'])->name('sbg-get-access-token');
Route::get('/transaction-verify',[SBCPaymentGatewayController::class,'transactionVerify'])->name('sbg-transaction-verify');


Route::get('/php-info',function(){
    echo phpinfo();
});

Route::get('/getgroup',[WebsiteController::class, 'getGroup'])->name('getGroup');

Route::get('/getstudent',[WebsiteController::class, 'getStudent'])->name('getStudent');


Route::get('/queue-clear', function () {
    Artisan::call('queue:clear', [
       '--force' => true
    ]);
});
