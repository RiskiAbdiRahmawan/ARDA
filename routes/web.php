<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Manager\DashboardManagerController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard',[DashboardAdminController::class,'index'])->middleware([AdminMiddleware::class])->name('admin.dashboard');
Route::get('/manager/dashboard',[DashboardManagerController::class,'index'])->middleware(ManagerMiddleware::class)->name('manager.dashboard');