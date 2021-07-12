<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\FollowerController;

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Blogs
Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::post('/blogs', [BlogsController::class, 'store'])->name('newBlog');
Route::post('/delBlog', [BlogsController::class, 'del'])->name('delBlog');

// List Users
Route::get('/list/users', [UserListController::class, 'index'])->name('userList');

// Users Profile
Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile');

// Follower
Route::post('/follow/{id}', [FollowerController::class, 'follow'])->name('follow');
Route::post('/unfollow/{id}', [FollowerController::class, 'unfollow'])->name('unfollow');


Route::get('/', function () {
    return view('home');
})->name('home');
