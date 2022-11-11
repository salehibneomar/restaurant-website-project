<?php

use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\HomePageMenuItemsController;
use App\Http\Controllers\Frontend\HomePageMenuTypesController;
use App\Http\Controllers\Frontend\SiteInformationController;
use Illuminate\Support\Facades\Route;

Route::get('/site/informations', [SiteInformationController::class, 'index']);
Route::get('/contact/socials', [ContactPageController::class, 'index']);
Route::get('/home/menu/types', [HomePageMenuTypesController::class, 'index']);
Route::get('/home/{type}/{type_id}/menus', [HomePageMenuItemsController::class, 'index']);
Route::get('/menu/items/{id}', [HomePageMenuItemsController::class, 'show']);