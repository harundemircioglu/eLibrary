<?php

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

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('admin/login',[AdminLoginController::class,'login']);

Route::get('admin/register',[AdminLoginController::class,'register']);

//USER

Route::get('login',[UserLoginController::class,'login'])->name('login');

Route::get('register',[UserLoginController::class,'register'])->name('register');

