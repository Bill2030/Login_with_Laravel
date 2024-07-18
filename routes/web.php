<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class,'login'])->name('user.login');
Route::post('/login', [AuthManager::class,'loginpost'])->name('login.post');
Route::get('/registration', [AuthManager::class,'registration'])->name('user.register');
Route::post('/registration', [AuthManager::class,'registrationpost'])->name('register.post');
