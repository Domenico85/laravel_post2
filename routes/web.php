<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureIsCorrectUser;

//Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//Read
Route::get('/posts/index', [PostController::class, 'index'])->name('posts_index');
Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('post_show');

//Create
Route::get('/post/create', [PostController::class, 'create'])->name('post_create');
Route::post('/post/store', [PostController::class, 'store'])->name('post_store');

//Update
Route::put('/post/update/{post}', [PostController::class, 'update'])->name('post_update')->middleware(EnsureIsCorrectUser::class);

//Delete
Route::delete('/post/delete/{post}' , [PostController::class, 'destroy'])->name('post_delete');

//ErrorPage
Route::get('/error-page', [PublicController::class, 'errorpage'])->name('errorpage')->middleware(EnsureIsCorrectUser::class);

//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profiles.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profiles.update');
});