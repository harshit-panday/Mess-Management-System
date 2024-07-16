<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Models\Admin;
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

    Route::group(['middleware'=> ['auth:web']],function(){
        Route::get('profile',[AccountController::class,'profile'])->name('account.profile');
        Route::get('logout',[AccountController::class,'logout'])->name('account.logout');

    });
});



Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/AdminRegister',[AdminController::class,'AdminRegister'])->name('admin.AdminRegister');
    Route::post('admin/AdminRegister',[AdminController::class,'AdminProcessRegister'])->name('admin.AdminProcessRegister');
    Route::get('admin/adminLogin',[AdminController::class,'login'])->name('admin.adminLogin');
    Route::post('admin/adminLogin',[AdminController::class,'adminAuthenticate'])->name('admin.adminAuthenticate');
    Route::get('admin/adminProfile',[AdminController::class,'adminProfile'])->name('admin.adminProfile');
    Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

});



Route::get('admin/AdminRegister',[AdminController::class,'AdminRegister'])->name('admin.AdminRegister');
Route::post('admin/AdminRegister',[AdminController::class,'AdminProcessRegister'])->name('admin.AdminProcessRegister');
Route::get('admin/adminLogin',[AdminController::class,'login'])->name('admin.adminLogin');
Route::post('admin/adminLogin',[AdminController::class,'adminAuthenticate'])->name('admin.adminAuthenticate');
Route::get('admin/adminProfile',[AdminController::class,'adminProfile'])->name('admin.adminProfile');
Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');


Route::controller(AdminController::class)->group(function(){
    Route::get('/products','index')->name('products.index');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit','edit')->name('products.edit');
    Route::put('/products/{product}','update')->name('products.update');
    Route::delete('/products/{product}','destroy')->name('products.destroy');    
});





Route::get('/users',[AccountController::class,'loadAllUsers'])->name('user');
Route::get('/add/user',[AccountController::class,'loadAddUserForm']);

Route::post('/add/user',[AccountController::class,'AddUser'])->name('AddUser');

Route::get('/edit/{id}',[AccountController::class,'loadEditForm']);
Route::get('/delete/{id}',[AccountController::class,'deleteUser']);

Route::post('/edit/user',[AccountController::class,'EditUser'])->name('EditUser');

