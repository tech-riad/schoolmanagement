<?php

use App\Http\Controllers\MenuBuilderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WebAdmin\BannerController;
use App\Http\Controllers\WebAdmin\InstitutephotoController;
use App\Http\Controllers\WebAdmin\AtaglanceController;
use App\Http\Controllers\WebAdmin\AboutschoolController;
use App\Http\Controllers\WebAdmin\ColorController;
use App\Http\Controllers\WebAdmin\ContactUsController;
use App\Http\Controllers\WebAdmin\EventController;
use App\Http\Controllers\WebAdmin\SociallinkController;
use App\Http\Controllers\WebAdmin\PageController;
use App\Http\Controllers\WebAdmin\GetintouchController;
use App\Http\Controllers\WebAdmin\MessagesController;
use App\Http\Controllers\WebAdmin\NoticeController;
use App\Http\Controllers\WebAdmin\NewsController;
use App\Http\Controllers\WebAdmin\SchoolInfoController;
use App\Http\Controllers\WebAdmin\VideoController;

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
// Route::get('/gallery', [InstitutephotoController::class, 'gallery'])->name('gallery');

Route::group(['prefix' => '/webadmin'], function () {

    //install
    Route::get('/import-data',[\App\Http\Controllers\InstallController::class,'importData'])->name('import-data');
    Route::post('/data-seed',[\App\Http\Controllers\InstallController::class,'dataSeed'])->name('data-seed');


    // Banner
    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::any('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::any('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destory');
    // Institute Photo
    Route::get('/institutephoto', [InstitutephotoController::class, 'index'])->name('institutephoto.index');

    Route::get('/institutephoto/create', [InstitutephotoController::class, 'create'])->name('institutephoto.create');
    Route::post('/institutephoto/store', [InstitutephotoController::class, 'store'])->name('institutephoto.store');
    Route::get('/institutephoto/edit/{id}', [InstitutephotoController::class, 'edit'])->name('institutephoto.edit');
    Route::any('/institutephoto/update/{id}', [InstitutephotoController::class, 'update'])->name('institutephoto.update');
    Route::any('/institutephoto/delete/{id}', [InstitutephotoController::class, 'destroy'])->name('institutephoto.destory');
    // At A glance
    Route::get('/ataglance', [AtaglanceController::class, 'edit'])->name('ataglance.edit');
    Route::any('/ataglance/update/{id}', [AtaglanceController::class, 'update'])->name('ataglance.update');
    Route::any('/ataglance/delete/{id}', [AtaglanceController::class, 'destroy'])->name('ataglance.destory');
    // AboutschoolController
    Route::get('/aboutschool', [AboutschoolController::class, 'index'])->name('aboutschool.index');
    Route::get('/aboutschool/create', [AboutschoolController::class, 'create'])->name('aboutschool.create');
    Route::post('/aboutschool/store', [AboutschoolController::class, 'store'])->name('aboutschool.store');
    Route::get('/aboutschool/edit/{id}', [AboutschoolController::class, 'edit'])->name('aboutschool.edit');
    Route::any('/aboutschool/update/{id}', [AboutschoolController::class, 'update'])->name('aboutschool.update');
    Route::any('/aboutschool/delete/{id}', [AboutschoolController::class, 'destroy'])->name('aboutschool.destory');
    // Social Link
    // Route::get('/sociallink', [SociallinkController::class, 'index'])->name('sociallink.index');
    // Route::get('/sociallink/create', [SociallinkController::class, 'create'])->name('sociallink.create');
    // Route::post('/sociallink/store', [SociallinkController::class, 'store'])->name('sociallink.store');
    Route::get('/sociallink', [SociallinkController::class, 'edit'])->name('sociallink.edit');
    Route::any('/sociallink/update/{id}', [SociallinkController::class, 'update'])->name('sociallink.update');
    Route::any('/sociallink/delete/{id}', [SociallinkController::class, 'destroy'])->name('sociallink.destory');
    // Social Link
    Route::get('/page', [PageController::class, 'index'])->name('page.index');
    Route::get('/page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/page/store', [PageController::class, 'store'])->name('page.store');
    Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
    Route::any('/page/update/{id}', [PageController::class, 'update'])->name('page.update');
    Route::any('/page/delete/{id}', [PageController::class, 'destroy'])->name('page.destory');
    Route::get('/page/{page}/show', [PageController::class, 'adminshow'])->name('page.admin.show');


    // Get In Touch
    // Route::get('/getintouch', [GetintouchController::class, 'index'])->name('getintouch.index');
    // Route::get('/getintouch/create', [GetintouchController::class, 'create'])->name('getintouch.create');
    // Route::post('/getintouch/store', [GetintouchController::class, 'store'])->name('getintouch.store');
    Route::get('/getintouch', [GetintouchController::class, 'edit'])->name('getintouch.edit');
    Route::any('/getintouch/update/{id}', [GetintouchController::class, 'update'])->name('getintouch.update');
    Route::any('/getintouch/delete/{id}', [GetintouchController::class, 'destroy'])->name('getintouch.destory');
    // Event
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::any('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
    Route::any('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.destory');
    // Video
    Route::get('/video', [VideoController::class, 'index'])->name('video.index');
    Route::get('/video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::any('/video/update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::any('/video/delete/{id}', [VideoController::class, 'destroy'])->name('video.destory');

    // News
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/edit/{news}', [NewsController::class, 'edit'])->name('news.edit');
    Route::any('/news/update/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::any('/news/destroy/{news}', [NewsController::class, 'destroy'])->name('newses.destroy');
    // Notice
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/create', [NoticeController::class, 'create'])->name('notice.create');
    Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/edit/{notice}', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::any('/notice/update/{notice}', [NoticeController::class, 'update'])->name('notice.update');
    Route::any('/notice/destroy/{notice}', [NoticeController::class, 'destroy'])->name('notice.destroy');


    Route::get('/message', [MessagesController::class, 'index'])->name('message.index');
    Route::get('/message/create', [MessagesController::class, 'create'])->name('message.create');
    Route::post('/message/store', [MessagesController::class, 'store'])->name('message.store');
    Route::get('/message/edit/{messages}', [MessagesController::class, 'edit'])->name('message.edit');
    Route::any('/message/update/{messages}', [MessagesController::class, 'update'])->name('message.update');
    // Route::post('/notice/destroy/{notice}',[MessagesController::class,'destroy'])->name('notice.destroy');
    Route::any('/message/destroy/{messages}', [MessagesController::class, 'destroy'])->name('message.destroy');

    // ajax route

    Route::get('/message/slug/{id}', [MessagesController::class, 'messageSlugGet'])->name('page.show');

    //School Info Route here
    Route::get('/info', [SchoolInfoController::class, 'index'])->name('info.index');
    Route::post('/info/update/{id}', [SchoolInfoController::class, 'update'])->name('info.update');

    //Menu Management
    Route::group(['as' => 'menu.', 'prefix' => '/menu'], function () {

        Route::get('/index', [MenuController::class, 'index'])->name('index');
        Route::get('/create', [MenuController::class, 'create'])->name('create');
        Route::post('/store', [MenuController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->name('delete');

    });

    // Contact Us
    Route::group(['as' => 'contact-us.', 'prefix' => '/contact-us'], function () {

        Route::get('/index', [ContactUsController::class, 'index'])->name('index');
        Route::get('/create', [ContactUsController::class, 'create'])->name('create');
        Route::post('/store', [ContactUsController::class, 'store'])->name('store');
        Route::any('/edit/{id}', [ContactUsController::class, 'edit'])->name('edit');
        Route::get('/update', [ContactUsController::class, 'update'])->name('update');
        Route::any('/delete/{id}', [ContactUsController::class, 'destroy'])->name('destroy');

    });

    Route::group(['as'=>'menu.','prefix'=>'menu/{id}'],function(){


        Route::get('builder',[MenuBuilderController::class, 'index'])->name('builder');
        Route::get('item/create',[MenuBuilderController::class, 'itemCreate'])->name('item.create');
        Route::post('item/store',[MenuBuilderController::class, 'itemStore'])->name('item.store');

        Route::get('item/{itemId}/edit',[MenuBuilderController::class, 'itemEdit'])->name('item.edit');
        Route::post('item/{itemId}/update',[MenuBuilderController::class, 'itemUpdate'])->name('item.update');
        Route::get('item/{itemId}/delete',[MenuBuilderController::class, 'itemDelete'])->name('item.delete');
        //Menus Order
        Route::post('order',[MenuBuilderController::class, 'order'])->name('order');

    });
//Color
    Route::group(['as' => 'color.', 'prefix' => '/color'], function () {

        Route::get('/index', [ColorController::class, 'index'])->name('index');
        Route::get('/edit/{id}',[ColorController::class,'edit'])->name('edit');
        Route::post('/update',[ColorController::class,'update'])->name('update');

    });
});
