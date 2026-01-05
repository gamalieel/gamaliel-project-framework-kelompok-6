<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgresProyekController;
use App\Models\Proyek;
use App\Models\ProgressProyek;
use App\Models\TahapanProyek;

Route::get('/', function () {
    $stats = [
        'proyek'   => Proyek::count(),
        'tahapan'  => TahapanProyek::count(),
        'progress' => ProgressProyek::count(),
    ];

    return view('welcome', compact('stats'));
});

Route::get('/guest', function () {
    return view('guest');
});

Route::get('/poseify', function () {
    return response()->file(public_path('Poseify/index.html'));
});

Route::get('/admin', function () {
    return view('admin.volt-dashboard');
});

Route::resource('proyek', ProyekController::class);

Route::resource('tahapan_proyek', TahapanProyekController::class);
Route::resource('progres_proyek', ProgresProyekController::class);

// Halaman login
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.action');

