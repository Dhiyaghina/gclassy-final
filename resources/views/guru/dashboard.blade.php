<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - GClassy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .class-card {
            width: 300px;
            height: 240px;
            border-radius: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
            flex-shrink: 0;
            text-decoration: none;
            color: inherit;
        }

        .class-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            text-decoration: none;
            color: inherit;
        }

        .card-header-custom {
            height: 140px;
            position: relative;
            border-radius: 16px 16px 0 0;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .gradient-overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.6) 100%);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .default-gradient {
            background: linear-gradient(135deg, #4285f4 0%, #34a853 50%, #ea4335 100%);
        }

        .profile-photo {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 3px solid white;
            position: absolute;
            bottom: -24px;
            right: 16px;
            object-fit: cover;
            background-color: #4285f4;
        }

        .profile-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 3px solid white;
            position: absolute;
            bottom: -24px;
            right: 16px;
            background-color: #4285f4;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .scroll-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 20px;
            scroll-behavior: smooth;
        }

        .scroll-container::-webkit-scrollbar {
            height: 8px;
        }

        .scroll-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .scroll-container::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .menu-dots {
            position: absolute;
            top: 12px;
            right: 12px;
            color: white;
            background: rgba(255,255,255,0.2);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .menu-dots:hover {
            background: rgba(255,255,255,0.3);
        }

        .class-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
            position: absolute;
            top: 16px;
            left: 16px;
            right: 60px;
            line-height: 1.2;
        }

        .teacher-name {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.9);
            position: absolute;
            bottom: 16px;
            left: 16px;
            right: 80px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }

        .card-body-custom {
            padding: 20px 16px 16px 16px;
            background: white;
            border-radius: 0 0 16px 16px;
        }

        .footer-icons {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
            padding-top: 12px;
            border-top: 1px solid #e9ecef;
        }

        .footer-icons i {
            color: #6c757d;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .footer-icons i:hover {
            color: #4285f4;
        }

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .sidebar {
            background: white;
            min-height: calc(100vh - 76px);
            border-right: 1px solid #e9ecef;
            transition: transform 0.3s ease;
            z-index: 1000;
        }

        .sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-item {
            padding: 12px 20px;
            color: #5f6368;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 0 24px 24px 0;
            margin-right: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-item:hover, .sidebar-item.active {
            background-color: #e8f0fe;
            color: #1a73e8;
            text-decoration: none;
        }

        .main-content {
            background: #f8f9fa;
            min-height: calc(100vh - 76px);
        }

        .add-class-card {
            width: 300px;
            height: 240px;
            border: 2px dashed #4285f4;
            background: transparent;
            border-radius: 16px;
            transition: all 0.3s ease;
            cursor: pointer;
            flex-shrink: 0;
        }

        .add-class-card:hover {
            border-color: #1a73e8;
            background-color: rgba(66, 133, 244, 0.05);
            transform: translateY(-2px);
        }
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-avatar:hover {
            background-color: #0056b3;
        }

        .profile-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            min-width: 150px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            z-index: 1000;
            margin-top: 5px;
            /* Awalnya tersembunyi */
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .profile-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .profile-menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
            border-radius: 8px;
        }

        .profile-menu-item:hover {
            background-color: #f8f9fa;
            color: #dc3545;
        }

        .profile-menu-item i {
            margin-right: 8px;
        }

        /* Demo content */
        .demo-content {
            margin-top: 40px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        /* Modal Logout Confirmation */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }

        .modal-content-custom {
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transform: scale(0.7);
            transition: transform 0.3s ease;
        }

        .modal-overlay.show .modal-content-custom {
            transform: scale(1);
        }

        .modal-header-custom {
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #fff3cd;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: #856404;
            font-size: 24px;
        }

        .modal-title-custom {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 0 0 10px 0;
        }

        .modal-message {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 25px;
        }

        .btn-custom {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 100px;
        }

        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
            transform: translateY(-1px);
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
        }

        .btn-logout:hover {
            background-color: #c82333;
            transform: translateY(-1px);
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 76px;
                left: 0;
                width: 250px;
                height: calc(100vh - 76px);
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button class="btn btn-light me-3" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <div class="d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;" class="me-1">
                    <span class="fw-bold text-dark">GClassy</span>
                </div>
            </div>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light">
                    <i class="bi bi-plus-lg"></i>
                </button>
                <button class="btn btn-light">
                    <i class="bi bi-grid-3x3-gap"></i>
                </button>
                <div class="profile-dropdown">
                    <div class="profile-avatar" onclick="toggleProfileMenu()">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <div class="profile-menu" id="profileMenu">
                        <div class="profile-menu-item" onclick="logout()">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <div class="py-3">
                    <a href="/guru/dashboard" class="sidebar-item active">
                        <i class="bi bi-house"></i>
                        <span>Beranda</span>
                    </a>
                    <!-- <a href="#" class="sidebar-item">
                        <i class="bi bi-book"></i>
                        <span>Mengajar</span>
                    </a> -->
                    <a href="#" class="sidebar-item">
                        <i class="bi bi-clipboard-check"></i>
                        <span>Untuk diperiksa</span>
                    </a>
                    <a href="#" class="sidebar-item">
                        <i class="bi bi-archive"></i>
                        <span>Kelas yang diarsipkan</span>
                    </a>
                    <!-- <a href="#" class="sidebar-item">
                        <i class="bi bi-gear"></i>
                        <span>Setelan</span>
                    </a> -->
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <div class="p-4">
                    <h4 class="mb-4 fw-bold">Kelas yang Anda Ajar</h4>
                    
                    <!-- Classes Container -->
                    <div class="scroll-container">
                        @foreach ($kelas as $k)
                        <a href="{{ route('guru.kelas', $k->id) }}" class="class-card shadow-sm">
                            <div class="card-header-custom" 
                                 @if($k->gambar)
                                 style="background-image: url('{{ asset('images/' . $k->gambar) }}');"
                                 @endif
                            >
                                {{-- Default gradient jika tidak ada gambar --}}
                                @if(!$k->gambar)
                                <div class="default-gradient position-absolute w-100 h-100"></div>
                                @endif
                                
                                {{-- Overlay untuk readability --}}
                                <div class="gradient-overlay"></div>
                                
                                {{-- Menu dots --}}
                                <button class="menu-dots" onclick="event.preventDefault(); event.stopPropagation(); showMenu({{ $k->id }})">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                
                                {{-- Class title --}}
                                <div class="class-title">{{ $k->nama }}</div>
                                
                                {{-- Teacher name --}}
                                <div class="teacher-name">{{ $k->guru->name }}</div>
                                
                            </div>
                            <div class="card-body-custom">
                                <div class="footer-icons">
                                    <i class="bi bi-folder" title="Buka Materi"></i>
                                </div>
                            </div>
                        </a>
                        @endforeach

                        <!-- Add New Class Card -->
                        <!-- <div class="add-class-card d-flex align-items-center justify-content-center text-center" onclick="showCreateClassModal()">
                            <div>
                                <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center mb-3 mx-auto" style="width: 60px; height: 60px;">
                                    <i class="bi bi-plus-lg text-primary fs-3"></i>
                                </div>
                                <h6 class="fw-bold text-primary mb-2">Buat Kelas</h6>
                                <p class="text-muted small mb-0">Tambah kelas baru</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Logout -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal-content-custom">
            <div class="modal-header-custom">
                <div class="modal-icon">
                    <i class="bi bi-question-circle"></i>
                </div>
                <h3 class="modal-title-custom">Konfirmasi Logout</h3>
                <p class="modal-message">Apakah Anda yakin ingin keluar dari akun ini?</p>
            </div>
            <div class="modal-buttons">
                <button class="btn-custom btn-cancel" onclick="cancelLogout()">Tidak</button>
                <button class="btn-custom btn-logout" onclick="confirmLogout()">Ya, Keluar</button>
            </div>
        </div>
    </div>

    <!-- Form Logout (hidden) -->
    <form id="logout-form" action="/logout" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <!-- Menu Modal -->
    <div class="modal fade" id="classMenuModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-pencil me-2"></i>Edit Kelas
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-gear me-2"></i>Pengaturan
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <i class="bi bi-people me-2"></i>Kelola Siswa
                        </a>
                        <hr class="my-0">
                        <a href="#" class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-archive me-2"></i>Arsipkan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentClassId = null;
        const classMenuModal = new bootstrap.Modal(document.getElementById('classMenuModal'));

        function showMenu(classId) {
            currentClassId = classId;
            classMenuModal.show();
        }

        // Menampilkan menu profil saat avatar diklik
        function toggleProfileMenu() {
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('show');
        }

        // Fungsi logout yang sudah diperbarui dengan modal
        function logout() {
            // Tutup dropdown menu
            const menu = document.getElementById('profileMenu');
            menu.classList.remove('show');
            
            // Tampilkan modal konfirmasi
            const modal = document.getElementById('logoutModal');
            modal.classList.add('show');
        }

        function cancelLogout() {
            // Tutup modal dan kembali ke halaman
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('show');
            document.getElementById('logout-form').submit();
        }

        function confirmLogout() {
            // Tutup modal
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('show');
            
            // PENTING: Submit form logout Laravel (ini yang sebenarnya diperlukan)
            document.getElementById('logout-form').submit();
        }


        // Tutup menu ketika mengklik di luar area
        document.addEventListener('click', function(event) {
            const dropdown = document.querySelector('.profile-dropdown');
            const menu = document.getElementById('profileMenu');
            const modal = document.getElementById('logoutModal');
            
            if (!dropdown.contains(event.target)) {
                menu.classList.remove('show');
            }
            
            // Tutup modal ketika klik di luar modal content
            if (event.target === modal) {
                modal.classList.remove('show');
            }
        });

        // Tutup menu dengan tombol Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const menu = document.getElementById('profileMenu');
                const modal = document.getElementById('logoutModal');
                menu.classList.remove('show');
                modal.classList.remove('show');
            }
        });

        // Sidebar toggle function (untuk membuka dan menutup sidebar)
        document.querySelector('.btn-light.me-3').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('collapsed');
        });

        // Handle scroll dengan mouse wheel
        document.querySelector('.scroll-container').addEventListener('wheel', function(e) {
            if (e.deltaY !== 0) {
                e.preventDefault();
                this.scrollLeft += e.deltaY;
            }
        });

        // Handle menu actions
        document.querySelectorAll('#classMenuModal .list-group-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.textContent.trim();
                
                switch(action) {
                    case 'Edit Kelas':
                        alert('Fitur edit kelas akan segera tersedia!');
                        break;
                    case 'Pengaturan':
                        alert('Fitur pengaturan kelas akan segera tersedia!');
                        break;
                    case 'Kelola Siswa':
                        alert('Fitur kelola siswa akan segera tersedia!');
                        break;
                    case 'Arsipkan':
                        if(confirm('Apakah Anda yakin ingin mengarsipkan kelas ini?')) {
                            alert('Fitur arsip kelas akan segera tersedia!');
                        }
                        break;
                }
                
                classMenuModal.hide();
            });
        });
    </script>
</body>
</html>