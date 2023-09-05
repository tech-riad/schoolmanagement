<?php

use App\Http\Controllers\WebAdmin\AtaglanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Website\Student_listController;

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

// Route::controller(WebsiteController::class)
//     ->name('front.')
//     ->group(function () {
//         Route::get('/', 'index');
//         Route::post('/test', 'store');
//         Route::get('/{id}', 'show');
//         Route::put('/{id}', 'update');
//     });
    // Student List
    Route::get('/',[WebsiteController::class,'index'])->name('index');


    Route::group(['as'=>'web.'],function(){

        // website submenu item

        Route::get('page/students-list',[WebsiteController::class,'student_list'])->name('student_list');
        Route::get('page/merit-students-list',[WebsiteController::class,'merit_student_list'])->name('merit_student_list');
        Route::get('/page/staff',[WebsiteController::class,'staff_list'])->name('staff_list');
        Route::get('page/governing-body',[WebsiteController::class,'governing_body'])->name('governing_body');
        Route::get('page/at_a_glance',[WebsiteController::class,'at_a_glance'])->name('at_a_glance');
        Route::get('page/teachers',[WebsiteController::class,'teacher_list'])->name('teacher_list');
        Route::get('page/staff-list',[WebsiteController::class,'staff_list'])->name('staff_list');
        Route::get('page/class-routine',[WebsiteController::class,'getRoutine'])->name('getRoutine');
        Route::any('page/exam-routine',[WebsiteController::class,'exam_routine'])->name('exam_routine');
        Route::get('page/syllabus-booklist',[WebsiteController::class,'book_list'])->name('book_list');
        Route::get('page/result',[WebsiteController::class,'result'])->name('result');
        Route::get('page/notice',[WebsiteController::class,'notice'])->name('notice');
        Route::get('/page/digital-content',[WebsiteController::class,'digital_content'])->name('digital_content');
        Route::get('/page/hand-book',[WebsiteController::class,'hand_book'])->name('hand_book');
        Route::get('/page/home-work',[WebsiteController::class,'home_work'])->name('home_work');
        Route::get('/page/class-notice',[WebsiteController::class,'class_note'])->name('class_note');
        Route::get('/page/other-downloads',[WebsiteController::class,'other_download'])->name('other_download');
        Route::get('/page/gallery',[WebsiteController::class,'gallery'])->name('gallery');
        Route::get('/page/contact-us',[WebsiteController::class,'contact_us'])->name('contact_us');
        Route::post('/page/contact-us/store',[WebsiteController::class,'contact_us_store'])->name('message_store');


        Route::get('/page/{slug}',[WebsiteController::class,'Message'])->name('message');
        // ajax route


        // website submenu item

        Route::get('/notice/{id}',[WebsiteController::class,'noticeShow'])->name('noticeShow');
        Route::get('/event/{id}',[WebsiteController::class,'eventShow'])->name('eventShow');
        Route::get('/about/at-a-glance',[WebsiteController::class,'at_a_glance'])->name('at_a_glance');
        Route::get('/about/school-history',[WebsiteController::class,'school_history'])->name('school_history');
        Route::get('/about/why-study',[WebsiteController::class,'why_study'])->name('why_study');
        Route::get('/about/infrastructure',[WebsiteController::class,'infrastructure'])->name('infrastructure');
        Route::get('/about/achievement',[WebsiteController::class,'achievement'])->name('achievement');
        Route::get('/about/news',[WebsiteController::class,'news'])->name('news');
        Route::get('/co-curriculam/sport',[WebsiteController::class,'sport'])->name('sport');
        Route::get('/co-curriculam/scout',[WebsiteController::class,'scout'])->name('scout');
        Route::get('/co-curriculam/tour',[WebsiteController::class,'tour'])->name('tour');

        Route::get('/glance',[WebsiteController::class,'webindex'])->name('webindex');

        Route::get('/sociallink/{id}',[WebsiteController::class,'sociallink'])->name('sociallink');


        // website principal message
        Route::get('/message/{id}',[WebsiteController::class,'Messages'])->name('messages');

    });




    //


    // Contact Us Form Route

