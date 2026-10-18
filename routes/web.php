<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::view('/', 'welcome')->name('beranda');

Route::view('tentang/profil-rw', 'tentang.profil-rw')->name('profil-rw');
Route::view('/profil-rt', 'tentang.profil-rt')->name('profil-rt');

Route::view('/layanan/administrasi', 'layanan.administrasi')
    ->name('administrasi');

Route::view('/layanan/pengaduan', 'layanan.pengaduan')
    ->name('pengaduan');

Route::view('/layanan/kegiatan', 'layanan.kegiatan')
    ->name('kegiatan');

Route::view('/berita', 'informasi.berita')->name('berita');

Route::view('/statistik-warga', 'informasi.statistik-warga')
    ->name('statistik-warga');

Route::view('/kas-rw', 'informasi.kas-rw')->name('kas-rw');

Route::view('/agenda', 'informasi.agenda')->name('agenda');

Route::view('/kontak', 'kontak.index')->name('kontak');

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('admin.dashboard');
