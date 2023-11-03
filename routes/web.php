<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\book\BookController;
use App\Http\Controllers\Admin\User\UserController as UserUserController;
use App\Http\Controllers\BookController as ControllersBookController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//GET

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/search/{book_name}', [MainController::class, 'search']);

Route::get('/login', [MainController::class, 'login'])->name('login');

Route::get('/register', [MainController::class, 'register'])->name('register');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/book/{bookId}', [ControllersBookController::class, 'bookDetails'])->name('bookDetails');

Route::get('/profile/{userId}', [UserController::class, 'profile'])->middleware('auth');

Route::get('/my-libraries/{userId}', [LibraryController::class, 'myLibraries'])->middleware('auth')->name('myLibraries');

Route::get('/edit-library/{libraryId}', [LibraryController::class, 'editLibrary'])->name('editLibrary');

Route::get('/my-libraries/library/{libraryId}', [LibraryController::class, 'libraryDetail'])->middleware('auth')->name('libraryDetails');

Route::get('/my-libraries/library/{libraryId}/deleteShowBook/{bookId}', [ControllersBookController::class, 'selectDeleteBook']);

//POST

Route::post('/login-user', [UserController::class, 'login']);

Route::post('/register-user', [UserController::class, 'signin'])->name('register-user');

Route::post('/update-profile/{userId}', [UserController::class, 'updateProfile'])->name('updateProfile');

Route::post('/update-password/{userId}', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::post('/new-library', [LibraryController::class, 'addNewLibrary'])->name('addNewLibrary');

Route::post('/add-book-in-library', [LibraryController::class, 'addBookInLibrary'])->name('addBookInLibrary');

Route::post('/update-library/{libraryId}', [LibraryController::class, 'updateLibrary'])->name('updateLibrary');

Route::post('/delete-library/{libraryId}', [LibraryController::class, 'deleteLibrary'])->name('deleteLibrary');

Route::post('/delete/library/{library_id}/book/{book_id}', [ControllersBookController::class, 'deleteBookInLibrary']);

/*ADMIN SECTION*/

Route::get('/admin/login', [AdminController::class, 'login']);

Route::get('/admin/home', [AdminController::class, 'home'])->name('home');

Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

Route::post('/admin-login', [AdminController::class, 'loginAdmin']);

/*ADMIN / USER SECTION*/

Route::get('/admin/user', [UserUserController::class, 'user'])->name('user');

Route::get('/admin/user/new-user', [UserUserController::class, 'newUser'])->name('newUser');

Route::get('/admin/user/all-user', [UserUserController::class, 'allUser'])->name('allUser');

Route::get('/admin/user/all-user/{user_email}', [UserUserController::class, 'search_user']);

Route::get('/admin/user/all-user/edit-user/{userId}', [UserUserController::class, 'editUser']);

Route::get('/admin/user/all-user/delete-user/{userId}', [UserUserController::class, 'editUser']);

Route::post('/add-user', [UserUserController::class, 'addUser']);

Route::post('/update-user/{userId}', [UserUserController::class, 'updateUser']);

Route::post('/delete-user/{userId}', [UserUserController::class, 'deleteUser']);

/*ADMIN / BOOK SECTION*/

Route::get('/admin/book', [BookController::class, 'book'])->name('book');

Route::get('/admin/book/new-book', [BookController::class, 'newBook'])->name('newBook');

Route::get('/admin/book/all-book', [BookController::class, 'allBook'])->name('allBook');

Route::get('/admin/book/all-book/{book_name}', [BookController::class, 'search_book']);

Route::post('/add-book', [BookController::class, 'addBook']);
