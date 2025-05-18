<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware(['auth']);
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware(['auth']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts', [PostController::class, 'showAllposts'])->name('posts.posts')->middleware('auth');
Route::get('/users', [PostController::class, 'showAllusers'])->name('users.users')->middleware('auth');
Route::get('/users/{user}/posts', [PostController::class, 'showUserPosts'])->name('users.showByUser')->middleware('auth');
Route::patch('/posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore')->middleware('auth');
Route::delete('/posts/force-delete/{post}', [PostController::class, 'forceDelete'])->name('posts.forceDelete')->middleware('auth');
Route::get('/posts/deleted/bin', [PostController::class, 'showTrashed'])->name('posts.bin')->middleware('auth');
Route::get('users/{user}', [PostController::class, 'showUser'])->name('users.show')->middleware('auth');
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
