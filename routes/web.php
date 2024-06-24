<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix'=>'account'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('register',[AccountController::class,'register'])->name('account.register');
        Route::post('register',[AccountController::class,'processRegister'])->name('account.processRegister');
        Route::get('login',[AccountController::class,'login'])->name('account.login');  
        Route::post('login',[AccountController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile'])->name('account.profile');
        Route::get('logout',[AccountController::class,'logout'])->name('account.logout');

    });
});

Route::get('admin/AdminRegister',[AdminController::class,'AdminRegister'])->name('admin.AdminRegister');
Route::post('admin/AdminRegister',[AdminController::class,'AdminProcessRegister'])->name('admin.AdminProcessRegister');
Route::get('admin/adminLogin',[AdminController::class,'login'])->name('admin.adminLogin');
Route::post('admin/adminLogin',[AdminController::class,'adminAuthenticate'])->name('admin.adminAuthenticate');
Route::get('admin/adminProfile',[AdminController::class,'adminProfile'])->name('admin.adminProfile');
