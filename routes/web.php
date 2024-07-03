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