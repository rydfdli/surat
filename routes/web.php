<?php

use App\Models\Disposisi;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $suratMasukCount = SuratMasuk::count();
        $suratKeluarCount = SuratKeluar::count();
        $disposisiCount = Disposisi::count();
        return view('dashboard', compact('suratMasukCount', 'suratKeluarCount', 'disposisiCount'));
    });
    
    Route::get('/dashboard', function () {
        $suratMasukCount = SuratMasuk::count();
        $suratKeluarCount = SuratKeluar::count();
        $disposisiCount = Disposisi::count();
        return view('dashboard', compact('suratMasukCount', 'suratKeluarCount', 'disposisiCount'));
    })->name('dashboard');
    
    Route::resource('surat-masuk', SuratMasukController::class);
    Route::resource('surat-masuk.disposisi', DisposisiController::class)->shallow();
    Route::resource('surat-keluar', SuratKeluarController::class);
    Route::resource('disposisi', DisposisiController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingController::class);

    Route::get('laporan/surat-masuk', [ReportController::class, 'suratMasuk'])->name('reports.surat-masuk');
    Route::get('laporan/surat-keluar', [ReportController::class, 'suratKeluar'])->name('reports.surat-keluar');
    Route::get('laporan/disposisi', [ReportController::class, 'disposisi'])->name('reports.disposisi');


});

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::post('login', [UserController::class, 'login'])->name('login.action');
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');

// Route::post('logout', [UserController::class, 'logout'])->name('logout');