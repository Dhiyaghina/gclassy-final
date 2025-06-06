<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;

Route::get('/', function () {
    $kelas = Kelas::all(); // Ambil semua data kelas
    return view('landing', compact('kelas'));
})->name('dashboard');// nama route tetap 'dashboard' agar tidak error

Route::get('/kelas', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        return $role === 'siswa'
            ? redirect()->route('kelas.siswa')
            : redirect()->route('kelas.guru');
    }
    return redirect()->route('login');
})->name('kelas');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Tambahkan route dashboard siswa dan guru
Route::get('/siswa/dashboard', function () {
    return view('siswa.dashboard');
})->name('kelas.siswa');

Route::get('/guru/dashboard', function () {
    return view('guru.dashboard');
})->name('kelas.guru');

