<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/login',[LoginController::class,'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('proses_login');
// Route::post('/manager/login', [LoginController::class, 'login'])->middleware('guest')->name('proses_login');