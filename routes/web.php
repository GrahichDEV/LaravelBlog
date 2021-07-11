<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs');
Route::post('/blogs', [BlogsController::class, 'store'])->name('newBlog');
Route::post('/delBlog', [BlogsController::class, 'del'])->name('delBlog');

Route::get('/', function () {
    return view('home');
})->name('home');
