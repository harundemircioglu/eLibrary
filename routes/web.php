<?php

use App\Http\Controllers\Admin\IslemController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//ADMIN

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/admin/login',[AdminLoginController::class,'login']);

Route::get('/admin/register',[AdminLoginController::class,'register']);

Route::get('/admin/islemler',[IslemController::class,'index']);

Route::get('/admin/islemler/kullanici_islemleri',[IslemController::class,'kullanici_islemleri'])->name('admin.kullanici_islemleri');

Route::get('/admin/islemler/kitap_islemleri',[IslemController::class,'kitap_islemleri'])->name('admin.kitap_islemleri');

Route::post('/addUser',[IslemController::class,'addUser'])->name('addUser');

Route::get('/user_detail/{id}',[IslemController::class,'userDetail'])->name('admin.userDetail');

Route::POST('/update_user/{id}',[IslemController::class,'updateUser'])->name('admin.updateUser');

Route::get('/delete_user_show/{id}',[IslemController::class,'deleteShow'])->name('admin.deleteShow');

Route::POST('/delete_user/{id}',[IslemController::class,'deleteUser'])->name('admin.deleteUser');


//USER

Route::get('/login',[UserLoginController::class,'login'])->name('login');

Route::get('/register',[UserLoginController::class,'register'])->name('register');

