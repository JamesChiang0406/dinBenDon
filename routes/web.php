<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Front\homePageController;
use App\Http\Controllers\Front\listController;
use App\Http\Controllers\Front\loginController;
use App\Http\Controllers\Front\restaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homePageController::class, ('homePage')]);
Route::get('/login', [loginController::class, ('loginPage')]);
Route::post('/login', [loginController::class, ('login')]);
Route::get('/logout', [loginController::class, ('logout')]);
Route::get('/list', [listController::class, ('choosedListPage')]);
Route::post('/list/choose/{id}', [listController::class, ('choooseThis')]);
Route::post('/list/cancel/{id}', [listController::class, ('cancelThis')]);
Route::get("/add", [restaurantController::class, ('addRestaurantPage')]);
Route::post("/add", [restaurantController::class, ('addNewRestaurant')]);
Route::get("/edit", [restaurantController::class, ('editRestaurantPage')]);
Route::post("/edit/{id}", [restaurantController::class, ('updateRestaurant')]);



// 管理員專頁
Route::get('/admin', [adminController::class, ('restaurantListPage')]);
Route::post('/admin/restaurant/edit/{id}', [adminController::class, ('updateRestaurant')]);
Route::post('/admin/restaurant/delete', [adminController::class, ('deleteRestaurant')]);
Route::get('/admin/login', [adminController::class, ('loginPage')]);
Route::post('/admin/login', [loginController::class, ('login')]);
Route::get('/admin/logout', [loginController::class, ('logout')]);
Route::get('/admin/students', [adminController::class, ('studentListPage')]);
Route::post('/admin/student/edit/{id}', [adminController::class, ('updateStudent')]);
