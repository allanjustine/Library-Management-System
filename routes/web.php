<?php

use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\LibraryBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login',[SiteController::class, 'login']);
Route::post('/register',[SiteController::class, 'register']);
Route::get('/register',[SiteController::class, 'registerForm']);

Route::group(['middleware'=>'auth'], function(){

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create',[UserController::class,'create']);
    Route::post('/users',[UserController::class, 'store']);
    Route::get('/users', [UserController::class,'index']);

    Route::get('/borrowers/create', [BorrowerController::class,'create']);
    Route::get('/borrowers/edit/{id}', [BorrowerController::class,'edit']);
    Route::get('/borrowers/delete/{id}', [BorrowerController::class,'delete']);
    Route::get('/borrowers/view/{id}', [BorrowerController::class,'view']);
    Route::delete('/borrowers/{borrower}', [BorrowerController::class,'destroy']);
    Route::put('/borrowers/{borrower}', [BorrowerController::class,'update']);
    Route::get('/borrowers', [BorrowerController::class,'index']);
    Route::post('/borrowers', [BorrowerController::class,'store']);

    Route::get('/book-lists/create', [LibraryBookController::class,'create']);
    Route::get('/book-lists/edit/{id}', [LibraryBookController::class,'edit']);
    Route::put('/book-lists/{libraryBook}', [LibraryBookController::class,'update']);
    Route::get('/book-lists/delete/{id}', [LibraryBookController::class,'delete']);
    Route::delete('/book-lists/{libraryBook}', [LibraryBookController::class,'destroy']);
    Route::get('/book-lists', [LibraryBookController::class,'index']);
    Route::post('/book-lists', [LibraryBookController::class,'store']);
});


