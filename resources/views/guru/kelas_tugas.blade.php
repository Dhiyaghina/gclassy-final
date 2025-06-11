@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tugas & Materi Kelas: {{ $kelas->nama }}</h2>

    <!-- Tombol Navigasi -->
    <div class="row mb-4">
        <div class="col-md-3">
            <a href="{{ route('guru.kelas.show', $kelas->id) }}" class="btn btn-outline-secondary w-100">Forum</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('guru.kelas.tugas', $kelas->id) }}" class="btn btn-secondary w-100">Tugas Kelas</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-secondary w-100">Orang</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-outline-secondary w-100">Nilai</a>
        </div>
    </div>

    <!-- Form Buat Tugas -->
    <button onclick="toggleForm('tugas')" class="btn btn-primary">Buat Tugas</button>
    <button onclick="toggleForm('materi')" class="btn btn-info">Buat Materi</button>

    <form method="POST" action="{{ route('guru.tugas-materi.store', $kelas->id) }}" enctype="multipart/form-data" id="form-tugas" class="mt-3" style="display: none;">
        @csrf
        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
        <input type="hidden" name="tipe" value="tugas">

        <label>Judul*</label>
        <input type="text" name="judul" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2"></textarea>

        <label>Lampiran File</label>
        <input type="file" name="lampiran_file[]" multiple class="form-control mb-2">

        <label>Lampiran Link</label>
        <input type="text" name="lampiran_link[]" class="form-control mb-2">

        <label>Poin</label>
        <input type="number" name="poin" class="form-control mb-2">

        <label>Deadline</label>
        <input type="datetime-local" name="deadline" class="form-control mb-2">

        <button type="submit" class="btn btn-success">Unggah Tugas</button>
    </form>

    <!-- Form Buat Materi -->
    <form method="POST" action="{{ route('guru.tugas-materi.store', $kelas->id) }}" enctype="multipart/form-data" id="form-materi" class="mt-3" style="display: none;">
        @csrf
        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
        <input type="hidden" name="tipe" value="materi">

        <label>Judul*</label>
        <input type="text" name="judul" class="form-control mb-2" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control mb-2"></textarea>

        <label>Lampiran File</label>
        <input type="file" name="lampiran_file[]" multiple class="form-control mb-2">

        <label>Lampiran Link</label>
        <input type="text" name="lampiran_link[]" class="form-control mb-2">

        <button type="submit" class="btn btn-success">Unggah Materi</button>
    </form>

    <!-- Riwayat -->
    <hr>
    <h4>Riwayat Tugas & Materi</h4>
    @foreach($kelas->tugasMateri as $item)
        <div class="card my-3">
            <div class="card-body">
                <h5>{{ ucfirst($item->tipe) }}: {{ $item->judul }}</h5>
                <p>{{ $item->deskripsi }}</p>
                <ul>
                    @foreach($item->lampiran as $lampiran)
                        <li>
                            @if($lampiran->tipe == 'file')
                                <a href="{{ asset('storage/'.$lampiran->isi) }}" target="_blank">Unduh File</a>
                            @else
                                <a href="{{ $lampiran->isi }}" target="_blank">Lihat Link</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
                @if($item->tipe == 'tugas')
                    <p>Poin: {{ $item->poin }} | Deadline: {{ \Carbon\Carbon::parse($item->deadline)->format('d M Y H:i') }}</p>
                @endif
            </div>
        </div>
    @endforeach
</div>
<ul>
    @foreach($item->lampiran as $lampiran)
        <li>
            @if($lampiran->tipe == 'file')
                <a href="{{ asset('storage/'.$lampiran->isi) }}" target="_blank">Unduh File</a>
            @else
                <a href="{{ $lampiran->isi }}" target="_blank">Lihat Link</a>
            @endif
        </li>
    @endforeach
</ul>

<script>
function toggleForm(tipe) {
    document.getElementById('form-tugas').style.display = (tipe === 'tugas') ? 'block' : 'none';
    document.getElementById('form-materi').style.display = (tipe === 'materi') ? 'block' : 'none';
}
</script>
@endsection
