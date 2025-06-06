<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin | GClassy</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f7fa;
        }

        .navbar {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .navbar h1 {
            color: #DC2626;
            font-size: 24px;
        }

        .logout {
            background: #EF4444;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
        }

        .logout:hover {
            background: #DC2626;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        .welcome {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #1F2937;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            padding: 30px 20px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card a {
            text-decoration: none;
            color: #fff;
            background: #6D28D9;
            padding: 12px 20px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 15px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Admin | GClassy</h1>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </div>

    <div class="dashboard-container">
        <div class="welcome">
            <p>Selamat datang, {{ auth()->user()->name }}</p>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Kelola Guru</h3>
                <p>Tambahkan, ubah, atau hapus data guru</p>
                <a href="../admin/dosen.php">Akses</a>
            </div>

            <div class="card">
                <h3>Kelola Pegawai</h3>
                <p>Kelola data pegawai & jabatan</p>
                <a href="../admin/pegawai.php">Akses</a>
            </div>

            <div class="card">
                <h3>Kelola Akses Kelas Premium</h3>
                <p>Aktifkan, nonaktifkan, atau pantau kelas berbayar</p>
                <a href="../admin/premium.php">Akses</a>
            </div>
        </div>
    </div>

</body>
</html>
