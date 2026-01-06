<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KontraktorController;
use App\Http\Controllers\LokasiProyekController;
use App\Http\Controllers\ProgresProyekController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;
use App\Models\ProgressProyek;
use App\Models\Proyek;
use App\Models\TahapanProyek;
use Illuminate\Support\Facades\Route;

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

// Read-only routes - index and show only
Route::get('proyek', [ProyekController::class, 'index'])->name('proyek.index');
Route::get('proyek/{proyek}', [ProyekController::class, 'show'])->name('proyek.show');

Route::get('tahapan_proyek', [TahapanProyekController::class, 'index'])->name('tahapan_proyek.index');
Route::get('tahapan_proyek/{tahapan_proyek}', [TahapanProyekController::class, 'show'])->name('tahapan_proyek.show');

Route::get('progres_proyek', [ProgresProyekController::class, 'index'])->name('progres_proyek.index');
Route::get('progres_proyek/{progres_proyek}', [ProgresProyekController::class, 'show'])->name('progres_proyek.show');

Route::get('kontraktor', [KontraktorController::class, 'index'])->name('kontraktor.index');
Route::get('kontraktor/{kontraktor}', [KontraktorController::class, 'show'])->name('kontraktor.show');

Route::get('lokasi', [LokasiProyekController::class, 'index'])->name('lokasi.index');
Route::get('lokasi/{lokasi}', [LokasiProyekController::class, 'show'])->name('lokasi.show');

// Halaman login
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.action');
