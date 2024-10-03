<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
