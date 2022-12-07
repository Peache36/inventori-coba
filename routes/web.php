<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\UserController;
use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('auth.login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get("/dashboard", [DashboardController::class, 'index'])->name('dashborard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::resource("/barang", BarangController::class);
    Route::resource("/barang-masuk", BarangMasukController::class);
    Route::resource("/barang-keluar", BarangKeluarController::class);
    Route::resource("/user", UserController::class);
    Route::resource("/riwayat", RiwayatController::class);
    Route::resource("/opname", OpnameController::class);
});
