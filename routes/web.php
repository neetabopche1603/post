<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view-add-post', [App\Http\Controllers\PostController::class, 'viewAddPost'])->name('viewAddPost');

Route::post('/add-post', [App\Http\Controllers\PostController::class, 'addPost'])->name('addPost');

Route::post('/add-comment/{id}', [App\Http\Controllers\PostController::class, 'addComment'])->name('addComment');

Route::get('/user-Post',[App\Http\Controllers\PostController::class,'userPost'])->name('userPost');

Route::get('/edit-post/{id}',[App\Http\Controllers\PostController::class,'editPost'])->name('editPost');

Route::post('/update-post',[App\Http\Controllers\PostController::class,'updatePost'])->name('updatePost');

Route::get('/delete-post/{id}',[App\Http\Controllers\PostController::class,'deletePost'])->name('deletePost');

