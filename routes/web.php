<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Route with Authentication and Verification Middleware
Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard'); // Use index method to load posts

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Post Routes
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // List all posts

    // Comment Routes
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Like Routes
    Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('likes.store');
});

// Include additional routes from auth.php
require __DIR__.'/auth.php';
