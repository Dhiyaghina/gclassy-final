<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Mengambil semua kelas yang diajarkan oleh guru yang sedang login
        $kelas = Kelas::where('guru_id', auth()->id())->get();

        return view('guru.dashboard', compact('kelas'));

    }

    public function showKelas($id)
    {
        // Menampilkan kelas yang dipilih oleh guru
        $kelas = Kelas::where('id', $id)
              ->where('guru_id', auth()->id())
              ->firstOrFail();


        return view('guru.kelas', compact('kelas'));
    }

    public function tugasKelas($id)
{
    // Ambil data kelas beserta tugas dan materi
    $kelas = Kelas::with('tugasMateri.lampiran')
                  ->where('id', $id)
                  ->where('guru_id', auth()->id())
                  ->firstOrFail();

    return view('guru.kelas_tugas', compact('kelas'));
}

}
