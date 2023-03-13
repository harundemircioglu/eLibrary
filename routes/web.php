<?php

use App\Http\Controllers\Admin\IslemController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\LibraryController;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\UserController;
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


//ANASAYFA

Route::get('/',[IndexController::class,'index'])->name('index');

Auth::routes();



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




// ADMIN

//HOME
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index']);

//LOGIN
Route::get('/admin/login',[AdminLoginController::class,'login']);

//REGISTER
Route::get('/admin/register',[AdminLoginController::class,'register']);

//PROFILE
Route::get('admin/profile',[IslemController::class,'profile']);

//PASSWORD SETTINGS
Route::get('admin/password-settings',[IslemController::class,'passwordSettings']);

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

//LOGIN SAYFASI
Route::get('/login',[UserLoginController::class,'login'])->name('login');

//USER LOGIN
Route::post('/loginUser',[UserController::class,'login'])->name('userLogin');

//REGISTER SAYFASI
Route::get('/register',[UserLoginController::class,'register'])->name('register');

//USER REGISTER
Route::post('/userRegister',[UserController::class,'register'])->name('userRegister');

//LOGOUT
Route::get('/logout',[UserLoginController::class,'logout'])->name('logout');

//PROFİLE
Route::get('/profile/{id}',[UserController::class,'profile'])->name('profile');

//MY LIBRARIES
Route::get('/profile/{id}/myLibraries',[LibraryController::class,'myLibraries'])->name('myLibraries');

//ADD LIBRARY
Route::post('/addLibrary',[LibraryController::class,'addLibrary'])->name('addLibrary');

//LIBRARY DETAIL
Route::get('/profile/myLibraries/{id}',[LibraryController::class,'libraryDetails'])->name('libraryDetails');

//USER UPDATE
Route::post('/updateUser/{id}',[UserController::class,'update'])->name('updateUser');

//KİTAP DETAY
Route::get('/book/{id}',[BookController::class,'bookDetail'])->name('bookDetail');

//KİTABI KÜTÜPHANEYE EKLE
Route::post('/addUserLibraryBook',[BookController::class,'addUserLibraryBook'])->name('addUserLibraryBook');
