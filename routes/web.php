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



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




// ADMIN

//HOME
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index']);

//LOGIN
Route::get('/admin/login',[AdminLoginController::class,'login']);

//REGISTER
Route::get('/admin/register',[AdminLoginController::class,'register']);

//İSLEMLER
Route::get('/admin/islemler',[IslemController::class,'index']);

//İŞLEMLER/KULLANICI İŞLEMLERŞ
Route::get('/admin/islemler/kullanici_islemleri',[IslemController::class,'kullanici_islemleri'])->name('admin.kullanici_islemleri');

//KULLANICI EKLE
Route::post('/addUser',[IslemController::class,'addUser'])->name('addUser');

//GÜNCELLENECEK OLAN KULLANCI DETAYI
Route::get('/user_detail/{id}',[IslemController::class,'userDetail'])->name('admin.userDetail');

//KULLANICI GÜNCELLE
Route::POST('/update_user/{id}',[IslemController::class,'updateUser'])->name('admin.updateUser');

//SİLİNECEK OLAN KULLANICI DETAYI
Route::get('/delete_user_show/{id}',[IslemController::class,'deleteShow'])->name('admin.deleteShow');

//KULLANICI SİL
Route::POST('/delete_user/{id}',[IslemController::class,'deleteUser'])->name('admin.deleteUser');



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//KİTAP İŞLEMLERİ
Route::get('/admin/islemler/kitap_islemleri',[IslemController::class,'kitap_islemleri'])->name('admin.kitap_islemleri');

//KİTAP EKLE
Route::post('/addBook',[IslemController::class,'addBook'])->name('addBook');

//TÜM KİTAPLAR
Route::get('/allBook',[IslemController::class,'allBook'])->name('allBook');

//GÜNCELLENECEK OLAN KİTAP DETAYI
Route::get('/showEditBook/{id}',[IslemController::class,'showEditBook'])->name('showEditBook');

//KİTAP GÜNCELLE
Route::post('/updateBook/{id}',[IslemController::class,'updateBook'])->name('updateBook');

//SİLİNECEK OLAN KİTAP DETAYI
Route::get('/showDeleteBook/{id}',[IslemController::class,'showDeleteBook'])->name('showDeleteBook');

//KİTAP SİL
Route::post('/deleteBook/{id}',[IslemController::class,'deleteBook'])->name('deleteBook');





//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////






//USER

//LOGIN
Route::get('/login',[UserLoginController::class,'login'])->name('login');

//REGISTER
Route::get('/register',[UserLoginController::class,'register'])->name('register');
