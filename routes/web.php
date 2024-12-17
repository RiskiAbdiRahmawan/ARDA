<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\DriverController;
use App\Http\Controllers\Admin\KonsumsiBBMController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RiwayatPemakaianController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\Manager\DashboardManagerController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ManagerMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/dashboard',[DashboardAdminController::class,'index'])->middleware([AdminMiddleware::class])->name('admin.dashboard');
Route::get('/manager/dashboard',[DashboardManagerController::class,'index'])->middleware(ManagerMiddleware::class)->name('manager.dashboard');
Route::resource('kendaraans', KendaraanController::class)->middleware(AdminMiddleware::class);
// Route::get('/users/list', [UserController::class, 'list'])->name('users.list');
Route::resource('users', UsersController::class)->middleware(AdminMiddleware::class);
Route::resource('drivers', DriverController::class)->middleware(AdminMiddleware::class);
Route::resource('konsumsiBBM', KonsumsiBBMController::class)->middleware(AdminMiddleware::class);
Route::resource('pemesanans', PemesananController::class);
// Rute tambahan untuk manager persetujuan
Route::get('pemesanans/setuju-manager1/{id}', [PemesananController::class, 'setujuManager1'])->name('pemesanans.setuju-manager1')->middleware(ManagerMiddleware::class);
Route::get('pemesanans/tolak-manager1/{id}', [PemesananController::class, 'tolakManager1'])->name('pemesanans.tolak-manager1')->middleware(ManagerMiddleware::class);

Route::get('pemesanans/setuju-manager2/{id}', [PemesananController::class, 'setujuManager2'])->name('pemesanans.setuju-manager2')->middleware(ManagerMiddleware::class);
Route::get('pemesanans/tolak-manager2/{id}', [PemesananController::class, 'tolakManager2'])->name('pemesanans.tolak-manager2')->middleware(ManagerMiddleware::class);
Route::get('/riwayat-pemakaian', [RiwayatPemakaianController::class, 'index'])->name('riwayatPemakaian');
Route::get('/export/pemesanan', [ExportController::class, 'exportPemesanan'])->name('export.pemesanan');
Route::resource('logs', LogController::class);