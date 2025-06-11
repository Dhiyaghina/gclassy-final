<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasMateriController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'kelas_id' => 'required|exists:kelas,id',
        'tipe' => 'required|in:tugas,materi',
        'judul' => 'required|string',
        'deskripsi' => 'nullable|string',
        'poin' => 'nullable|integer',
        'deadline' => 'nullable|date',
        'lampiran_file.*' => 'nullable|file|max:10240',
        'lampiran_link.*' => 'nullable|url',
    ]);

    $tugas = TugasMateri::create([
        'kelas_id' => $request->kelas_id,
        'tipe' => $request->tipe,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'poin' => $request->poin,
        'deadline' => $request->deadline,
    ]);

    // Handle file uploads
    if ($request->hasFile('lampiran_file')) {
        foreach ($request->file('lampiran_file') as $file) {
            $path = $file->store('lampiran');
            $tugas->lampiran()->create([
                'tipe' => 'file',
                'isi' => $path,
            ]);
        }
    }

    // Handle links
    if ($request->lampiran_link) {
        foreach ($request->lampiran_link as $link) {
            $tugas->lampiran()->create([
                'tipe' => 'link',
                'isi' => $link,
            ]);
        }
    }

    return redirect()->back()->with('success', 'Berhasil disimpan.');
}

}
