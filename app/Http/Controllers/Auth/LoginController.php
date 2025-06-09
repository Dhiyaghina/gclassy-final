<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan view-nya ada
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            $request->session()->regenerate();
            $user = Auth::user();
                if ($user->role === 'siswa') {
                return redirect()->route('kelas.siswa');
                } elseif ($user->role === 'guru') {
                    return redirect()->route('kelas.guru');
                } elseif ($user->role === 'admin') {
                    return redirect()->route('kelas.admin');
                } else {
                    return redirect('/dashboard');
                }
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
