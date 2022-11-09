<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuTypesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteInformationController;
use App\Http\Controllers\SocialMediaController;
use Illuminate\Support\Facades\Route;



require __DIR__.'/auth.php';


Route::middleware('auth', 'check_status')->group(function(){
    Route::get('/dashboard', 
    [DashboardController::class, 'index'])->name('dashboard');

    Route::name('siteinformation.')
    ->controller(SiteInformationController::class)
    ->middleware('role:admin')
    ->group(function(){
        Route::get('/site-information', 'index')->name('read');
        Route::get('/site-information-edit', 'edit')->name('edit');
        Route::post('/site-information-update', 'update')->name('update');
    });

    Route::name('site.')
    ->controller(SiteInformationController::class)
    ->group(function(){
        Route::get('/site-banner', 'banner')->name('banner');
        Route::post('/site-banner-update', 'bannerUpdate')->name('banner.update');
        Route::get('/site-icon', 'icon')->name('icon');
        Route::post('/site-icon-update', 'iconUpdate')->name('icon.update');
    });

    Route::name('profile.')
    ->controller(ProfileController::class)
    ->group(function(){
        Route::get('/profile', 'index')->name('read');
        Route::get('/profile-edit', 'edit')->name('edit');
        Route::post('/profile-update', 'update')->name('update');
        Route::get('/profile-password-edit', 'editPassword')->name('pass.edit');
        Route::post('/profile-password-update', 'updatePassword')->name('pass.update');
    });

    Route::name('socialmedia.')
    ->controller(SocialMediaController::class)
    ->group(function(){
        Route::get('/social-media', 'index')->name('read');
        Route::get('/social-media-add', 'create')->name('create');
        Route::post('/social-media-store', 'store')->name('store');
        Route::get('/social-media-delete/{id}', 'destroy')->name('destroy');
    });

    Route::name('menu.')
    ->group(function(){

        Route::name('types.')
        ->controller(MenuTypesController::class)
        ->group(function(){
            Route::get('/menu-types', 'index')->name('read');
            Route::get('/menu-types-create', 'create')->name('create');
            Route::post('/menu-types-store', 'store')->name('store');
            Route::get('/menu-types-edit/{id}', 'edit')->name('edit');
            Route::post('/menu-types-update/{id}', 'update')->name('update');
        });

        Route::controller(MenuController::class)
        ->group(function(){
            Route::get('/menus/{type}', 'index')->name('read');
            Route::get('/menu-create/{type}', 'create')->name('create');
            Route::post('/menu-store/{type}', 'store')->name('store');
            Route::get('/menu-delete/{type}/{id}', 'destroy')->name('destroy');
            Route::get('/menu-edit/{type}/{id}', 'edit')->name('edit');
            Route::post('/menu-update/{type}/{id}', 'update')->name('update');
            Route::get('/menu-view/{type}/{id}', 'show')->name('show');
        });
    });

    Route::name('editor.')
    ->controller(EditorController::class)
    ->middleware('role:admin')
    ->group(function(){
        Route::get('/editors', 'index')->name('read');
        Route::get('/editor-add', 'create')->name('create');
        Route::post('/editor-store', 'store')->name('store');
        Route::get('/edtitor-edit/{id}', 'edit')->name('edit');
        Route::post('/edtitor-update/{id}', 'update')->name('update');
    });
    
    
});