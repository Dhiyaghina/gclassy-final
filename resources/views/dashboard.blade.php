<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GClassy - Pilihan Cerdas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Tambahan gaya custom */
        .hero {
            background-color: #fdf8f3;
            padding: 80px 0;
        }
        .btn-primary-custom {
            background-color: #ff8200;
            border: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <a class="navbar-brand fw-bold text-purple" href="#">GClassy</a>
        <div class="ms-auto">
            <a class="btn btn-outline-dark me-2" href="/">Beranda</a>
            <a class="btn btn-outline-dark me-2" href="#">Kelas</a>
            <a class="btn btn-outline-dark me-2" href="#">Our Service</a>
            <a class="btn btn-outline-dark me-2" href="#">Contact us</a>
            <a class="btn btn-primary" href="{{ route('login') }}">Masuk</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Pilihan Cerdas untuk Masa Depan Pendidikan</h1>
            <p class="lead">Belajar fleksibel, terstruktur, dan menyenangkan dengan GClassy.</p>
            <form class="d-flex justify-content-center mt-4">
                <input type="text" class="form-control w-25" placeholder="Cari kelas">
                <button type="submit" class="btn btn-primary-custom ms-2">Cari</button>
            </form>
        </div>
    </section>

    <!-- Fitur Utama -->
    <section class="container py-5 text-center">
        <div class="row">
            <div class="col-md-4"><h5>📘 Melihat Materi</h5></div>
            <div class="col-md-4"><h5>📝 Mengerjakan Tugas</h5></div>
            <div class="col-md-4"><h5>📤 Mengumpulkan Tugas</h5></div>
        </div>
    </section>

    <!-- Mata Pelajaran -->
    <section class="container py-4">
        <h3 class="text-center mb-4">Mata Pelajaran</h3>
        <div class="row">
            @foreach ($kelas as $kls)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $kls->thumbnail_url ?? 'https://via.placeholder.com/300x200' }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $kls->nama }}</h5>
                            <p class="card-text">{{ $kls->tingkatan }}</p>
                            <a href="#" class="btn btn-warning">Buka Kelas</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Daftar Guru -->
    <section class="container py-4">
        <h3 class="text-center mb-4">Daftar Guru</h3>
        <div class="row">
            @foreach ($guru as $g)
                <div class="col-md-3 mb-3 text-center">
                    <img src="{{ $g->foto ?? 'https://via.placeholder.com/150' }}" class="rounded-circle" width="100" height="100">
                    <h5>{{ $g->name }}</h5>
                    <p>{{ $g->keahlian }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-dark text-white text-center py-5">
        <h4>Berlangganan buletin kami</h4>
        <form class="d-flex justify-content-center mt-3">
            <input type="email" class="form-control w-25" placeholder="Alamat Email">
            <button type="submit" class="btn btn-primary-custom ms-2">Kirim</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4 text-muted">
        © 2025 GClassy - Semua Hak Dilindungi
    </footer>
</body>
</html>
