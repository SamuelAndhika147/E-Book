<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
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

//Role User
Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard-user', [UserController::class, 'dashboardUser']);
    Route::get('/read/{id}', [UserController::class, 'readBook']);
    Route::get('/download/{id}', [BookController::class, 'downloadBook']);
});

//Role Admin
Route::middleware('isAdmin')->group(function(){
    Route::get('/dashboard', [UserController::class, 'dashboard']);

    //Edit Users
    Route::get('/user', [UserController::class, 'user']);
    Route::get('/edit/{id}', [UserController::class, 'edit']);
    Route::patch('/update/{id}', [UserController::class, 'update']);
    Route::delete('/destroy/{id}', [UserController::class, 'destroy']);

    // Create Book
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/post-book', [BookController::class, 'store']);
    Route::get('/edit-book/{id}', [BookController::class, 'edit']);
    Route::patch('/update-book/{id}', [BookController::class, 'update']);
    Route::delete('/destroy-book/{id}', [BookController::class, 'destroy']);

    // Create Category
    Route::get('/category', [UserController::class, 'category']);
    Route::post('/post-category', [UserController::class, 'postCategory']);
    Route::delete('/destroy-category/{id}', [UserController::class, 'destroyCategory']);
});

//Landing, Register, Login, and 404 Page
Route::get('/', [UserController::class, 'index']);
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/post-register', [UserController::class, 'postRegister']);
Route::post('/post-login', [UserController::class, 'postLogin']);
Route::get('/404', [UserController::class, 'notFound']);


