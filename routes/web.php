<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\TugasMateriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelas;

Route::get('/', function () {
    $kelas = Kelas::all(); // Ambil semua data kelas
    return view('landing', compact('kelas'));
})->name('dashboard');// nama route tetap 'dashboard' agar tidak error

// Route login
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Setelah login, arahkan berdasarkan role
Route::get('/kelas', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;

        // Redirect berdasarkan role
        if ($role === 'siswa') {
            return redirect()->route('kelas.siswa');
        } elseif ($role === 'guru') {
            return redirect()->route('guru.dashboard');
        } elseif ($role === 'admin') {
            return redirect()->route('kelas.admin');
        }
    }
    return redirect()->route('login'); // Jika belum login, arahkan ke login
})->name('kelas');

// Dashboard untuk masing-masing role
Route::get('/siswa/dashboard', function () {
    return view('siswa.dashboard');
})->name('kelas.siswa');

Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.dashboard');
Route::get('/guru/kelas/{id}', [GuruController::class, 'showKelas'])->name('guru.kelas');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('kelas.admin');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::middleware(['auth', 'role:guru'])->prefix('guru')->group(function () {
    // Route::get('/kelas', [GuruController::class, 'index'])->name('guru.dashboard');
    Route::get('guru/kelas/{id}', [GuruController::class, 'showKelas'])->name('guru.kelas.show');
    Route::get('/kelas/{id}/tugas-kelas', [GuruController::class, 'tugasKelas'])->name('guru.kelas.tugas');

    // Untuk menyimpan tugas/materi
    Route::post('/kelas/{id}/tugas-materi', [TugasMateriController::class, 'store'])->name('guru.tugas-materi.store');
});
