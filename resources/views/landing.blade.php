<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GClassy - E-learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
        }

        /* Header Styles */
        .header {
            background-color: #6f42c1;
            padding: 50px 0;
            color: white;
            text-align: center;
        }

        .header h1 {
            font-size: 3rem;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #6f42c1;
            padding: 15px;
        }

        .navbar-nav a {
            color: white;
            font-size: 1.2rem;
            margin-right: 20px;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            color: #6f42c1;
        }

        .card-text {
            color: #555;
        }

        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 30px 0;
            text-align: center;
            margin-top: 40px;
        }

        .footer p {
            margin: 0;
            color: #333;
        }

        .footer input[type="email"] {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
        }

        .footer button {
            padding: 10px 20px;
            background-color: #6f42c1;
            border: none;
            color: white;
        }

        .footer button:hover {
            background-color: #5a2b91;
        }

        .role-dashboard {
            padding: 30px;
            background-color: #f8f9fa;
            margin-top: 20px;
        }

        .role-dashboard h3 {
            color: #6f42c1;
        }
    </style>
</head>
<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="#">GClassy</a>
            <div class="navbar-nav ml-auto">
                <a class="nav-link text-white" href="#">Beranda</a>
                <a class="nav-link text-white" href="#">Kelas</a>
                <a class="nav-link text-white" href="login.blade">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="header">
        <h1>Pilihan Cerdas untuk Masa Depan Pendidikan</h1>
        <p>Selamat datang di GClassy, platform pembelajaran daring yang dirancang untuk membantu siswa belajar lebih fleksibel, terstruktur, dan menyenangkan.</p>
        <button class="btn btn-primary">Cari Kelas</button>
    </div>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Mata Pelajaran</h2>
        <div class="row">
            <!-- Loop through classes -->
            @foreach ($kelas as $kls)
            <div class="col-md-4">
                <div class="card mb-3 shadow">
                    <img src="{{ asset('images/' . $kls->gambar) }}" class="card-img-top" alt="{{ $kls->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kls->nama }}</h5>
                        <p class="card-text">Tingkat: {{ $kls->tingkatan }}</p>
                        <p class="card-text">Guru: {{ $kls->guru->name ?? '-' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>Berlangganan buletin kami</p>
        <form action="#" method="post">
            <input type="email" placeholder="Alamat Email" required>
            <button type="submit">Kirim</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>