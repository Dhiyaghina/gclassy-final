<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa | GClassy</title>
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
            color: #6D28D9;
            font-size: 24px;
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
            color: white;
            background: #6D28D9;
            padding: 12px 20px;
            border-radius: 12px;
            display: inline-block;
            margin-top: 15px;
            font-weight: 500;
        }

        .logout {
            margin-top: 40px;
            display: inline-block;
            background: #EF4444;
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 500;
        }

        .logout:hover {
            background: #DC2626;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>GClassy</h1>
        <a class="logout" href="../logout.php">Logout</a>
    </div>

    <div class="dashboard-container">
        <div class="welcome">
            Selamat datang,  👋
        </div>

        <div class="cards">
            <div class="card">
                <h3>Lihat Materi</h3>
                <p>Akses materi pembelajaran yang telah tersedia</p>
                <a href="../materi/list.php">Akses</a>
            </div>

            <div class="card">
                <h3>Kumpulkan Tugas</h3>
                <p>Upload hasil tugas yang sudah dikerjakan</p>
                <a href="../tugas/kumpul.php">Akses</a>
            </div>

            <div class="card">
                <h3>Kelas Tambahan</h3>
                <p>Daftar kelas premium untuk pembelajaran ekstra</p>
                <a href="../kelas/daftar.php">Akses</a>
            </div>
        </div>
    </div>

</body>
</html>
