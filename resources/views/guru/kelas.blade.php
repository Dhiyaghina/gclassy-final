<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas Matematika - GClassy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Google Sans', 'Roboto', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f9f9f9;
            color: #3c4043;
            overflow-x: hidden;
        }

        /* Header/Navbar */
        .navbar-custom {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 8px 0;
            border-bottom: 1px solid #e8eaed;
        }

        .navbar-brand {
            font-size: 22px;
            font-weight: 400;
            color: #5f6368 !important;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-brand img {
            width: 32px;
            height: 32px;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            min-height: calc(100vh - 64px);
            position: fixed;
            left: 0;
            top: 64px;
            z-index: 1000;
            border-right: 1px solid #e8eaed;
            overflow-y: auto;
            transition: transform 0.3s ease;
        }

        .sidebar.collapsed {
            transform: translateX(-280px);
        }

        .sidebar-item {
            padding: 12px 24px 12px 24px;
            color: #3c4043;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.2s ease;
            font-size: 14px;
            border-radius: 0 25px 25px 0;
            margin-right: 12px;
        }

        .sidebar-item:hover {
            background-color: #f1f3f4;
            color: #1a73e8;
            text-decoration: none;
        }

        .sidebar-item.active {
            background-color: #e8f0fe;
            color: #1a73e8;
            font-weight: 500;
        }

        .sidebar-item i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            background: #f9f9f9;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Class Header */
        .header {
            background: linear-gradient(135deg, #4285f4 0%, #34a853 100%);
            position: relative;
            overflow: hidden;
            min-height: 240px;
            display: flex;
            align-items: flex-end;
            padding: 24px;
            color: white;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 400px;
            height: 100%;
            background: url('{{ asset('images/' . $kelas->gambar) }}') no-repeat center;
            background-size: cover;
            opacity: 0.3;
            transform: skewX(-10deg);
            transform-origin: top right;
        }

        .header-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            width: 100%;
        }

        .class-title {
            font-size: 36px;
            font-weight: 400;
            margin-bottom: 4px;
            line-height: 1.2;
        }

        .class-section {
            font-size: 16px;
            opacity: 0.9;
            margin-bottom: 4px;
        }

        .class-teacher {
            font-size: 16px;
            opacity: 0.9;
        }

        .customize-btn {
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            backdrop-filter: blur(10px);
            transition: all 0.2s ease;
        }

        .customize-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            text-decoration: none;
        }

        /* Navigation Tabs */
        .nav-tabs-custom {
            background: white;
            border-bottom: 1px solid #e8eaed;
            margin: 0;
            display: flex;
            padding: 0 24px;
            transition: padding-left 0.3s ease;
        }

        .nav-tabs-custom.with-sidebar {
            padding-left: 304px;
        }

        .nav-tab {
            padding: 16px 24px;
            text-decoration: none;
            color: #5f6368;
            font-size: 14px;
            font-weight: 500;
            border-bottom: 3px solid transparent;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-tab:hover {
            color: #1a73e8;
            text-decoration: none;
        }

        .nav-tab.active {
            color: #1a73e8;
            border-bottom-color: #1a73e8;
        }

        /* Content Area */
        .content-container {
            padding: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Class Code Card */
        .class-code-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.3), 0 4px 8px 3px rgba(60,64,67,0.15);
            padding: 16px;
            margin-bottom: 24px;
            width: 300px;
        }

        .class-code-title {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 8px;
        }

        .class-code {
            font-size: 24px;
            font-weight: 400;
            color: #1a73e8;
            letter-spacing: 2px;
        }

        /* Class Mendatang Card */
        .class-mendatang-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.3), 0 4px 8px 3px rgba(60,64,67,0.15);
            padding: 16px;
            margin-bottom: 24px;
            width: 300px;
        }

        .class-mendatang-title {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 8px;
        }

        .class-mendatang {
            font-size: 14px;
            color:rgb(139, 141, 143);
            margin-bottom: 2px;
        }

        .class-mendatang-judul {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 8px;
        }

        /* Announcement Card */
        .announcement-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(60,64,67,0.3), 0 4px 8px 3px rgba(60,64,67,0.15);
            margin-bottom: 16px;
            overflow: hidden;
        }

        .announcement-header {
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .teacher-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #1a73e8;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            font-size: 16px;
        }

        .announcement-content {
            padding: 0 16px 16px;
            color: #3c4043;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Profile Menu */
        .profile-dropdown {
            position: relative;
        }

        .profile-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #1a73e8;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
        }

        .profile-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            min-width: 200px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            border-radius: 8px;
            z-index: 1000;
            margin-top: 8px;
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
            color: #3c4043;
            font-size: 14px;
            transition: background-color 0.2s ease;
            cursor: pointer;
        }

        .profile-menu-item:hover {
            background-color: #f8f9fa;
            color: #d93025;
        }

        .profile-menu-item i {
            margin-right: 12px;
            font-size: 16px;
        }

        /* Logout Modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-content-custom {
            background: white;
            border-radius: 12px;
            padding: 24px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }

        .modal-overlay.show .modal-content-custom {
            transform: scale(1);
        }

        .modal-header-custom {
            margin-bottom: 24px;
        }

        .modal-icon {
            width: 60px;
            height: 60px;
            background: #fef7e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .modal-icon i {
            font-size: 24px;
            color: #f9ab00;
        }

        .modal-title-custom {
            font-size: 20px;
            font-weight: 500;
            color: #3c4043;
            margin-bottom: 8px;
        }

        .modal-message {
            color: #5f6368;
            font-size: 14px;
            line-height: 1.4;
        }

        .modal-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .btn-custom {
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-cancel {
            background: #f8f9fa;
            color: #3c4043;
        }

        .btn-cancel:hover {
            background: #e8eaed;
        }

        .btn-logout {
            background: #d93025;
            color: white;
        }

        .btn-logout:hover {
            background: #b52d20;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.collapsed {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-content.expanded {
                margin-left: 0;
            }

            .class-header-content {
                padding: 24px;
            }

            .class-header-content.with-sidebar {
                padding-left: 24px;
            }

            .nav-tabs-custom {
                padding-left: 24px;
            }

            .nav-tabs-custom.with-sidebar {
                padding-left: 24px;
            }

            .class-title {
                font-size: 28px;
            }
        }

        /* Hamburger menu */
        .menu-toggle {
            background: none;
            border: none;
            padding: 8px;
            border-radius: 50%;
            color: #5f6368;
            transition: background-color 0.2s ease;
        }

        .menu-toggle:hover {
            background-color: #f1f3f4;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-btn {
            background: none;
            border: none;
            padding: 8px;
            border-radius: 50%;
            color: #5f6368;
            transition: background-color 0.2s ease;
        }

        .navbar-btn:hover {
            background-color: #f1f3f4;
        }

        /* Sidebar overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 768px) {
            .sidebar {
                z-index: 1001;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (untuk mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <button class="btn btn-light me-3" type="button" id="sidebarToggle">
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
            <div class="col-md-2 sidebar" id="sidebar">
                <div class="py-3">
                    <a href="#" class="sidebar-item active">
                        <i class="bi bi-house"></i>
                        <span>Beranda</span>
                    </a>
                    <a href="#" class="sidebar-item">
                        <i class="bi bi-clipboard-check"></i>
                        <span>Untuk diperiksa</span>
                    </a>
                    <a href="#" class="sidebar-item">
                        <i class="bi bi-archive"></i>
                        <span>Kelas yang diarsipkan</span>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content" id="mainContent">
                <!-- Class Header -->
                <div class="header">
                <div class="header-content">
                    <div class="class-title">{{ $kelas->nama }}</div>
                    <div class="teacher-name">{{ $kelas->guru->name }}</div>
                </div>
            </div>
            

                <!-- Navigation Tabs -->
                <div class="nav-tabs-custom with-sidebar" id="navTabs">
                    <a href="#" class="nav-tab active">Forum</a>
                    <a href="#" class="nav-tab">Tugas kelas</a>
                    <a href="#" class="nav-tab">Orang</a>
                    <a href="#" class="nav-tab">Nilai</a>
                </div>

                <!-- Content -->
                <div class="content-container">
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Announcement Input -->
                            <div class="announcement-card">
                                <div class="announcement-header">
                                    <div class="profile-avatar" onclick="toggleProfileMenu()">
                                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div style="color: #5f6368; font-size: 16px; cursor: pointer;">
                                        Umumkan sesuatu kepada kelas Anda
                                    </div>
                                </div>
                            </div>

                            <!-- History Announcement -->
                            <div class="announcement-card">
                                <div class="announcement-header">
                                    <div class="profile-avatar" onclick="toggleProfileMenu()">
                                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <div>
                                        <div style="font-weight: 500; color: #3c4043;">{{ $kelas->guru->name }} memposting materi baru</div>
                                        <div style="font-size: 12px; color: #5f6368;">Hari ini</div>
                                    </div>
                                    <div class="ms-auto">
                                        <button class="navbar-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="announcement-content">
                                    Selamat datang di kelas Matematika Kelas XII. Mari belajar bersama dengan semangat!
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <!-- Class Code -->
                            <div class="class-code-card">
                                <div class="class-code-title">Kode kelas</div>
                                <div class="class-code">udt3tcbl</div>
                                <button class="btn btn-link p-0 mt-2" style="font-size: 12px; text-decoration: none;">
                                    <i class="bi bi-files"></i>
                                </button>
                            </div>
                            <div class="class-mendatang-card">
                                <div class="class-mendatang-title">Mendatang</div>
                                <div class="class-mendatang">Tenggat : Minggu</div>
                                <div class="class-mendatang-judul">Tugas Pertemuan 1</div>
                            </div>
                        </div>
                        
                    </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Variables
        let sidebarVisible = true;
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const classHeaderContent = document.getElementById('classHeaderContent');
        const navTabs = document.getElementById('navTabs');

        // Check if mobile
        function isMobile() {
            return window.innerWidth <= 768;
        }

        // Toggle sidebar
        function toggleSidebar() {
            if (isMobile()) {
                // Mobile behavior
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            } else {
                // Desktop behavior
                sidebarVisible = !sidebarVisible;
                
                if (sidebarVisible) {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    classHeaderContent.classList.add('with-sidebar');
                    navTabs.classList.add('with-sidebar');
                } else {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                    classHeaderContent.classList.remove('with-sidebar');
                    navTabs.classList.remove('with-sidebar');
                }
            }
        }

        // Sidebar toggle event
        document.getElementById('sidebarToggle').addEventListener('click', toggleSidebar);

        // Close sidebar when clicking overlay (mobile only)
        sidebarOverlay.addEventListener('click', function() {
            if (isMobile()) {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (isMobile()) {
                // Reset to mobile state
                sidebar.classList.remove('collapsed', 'show');
                mainContent.classList.remove('expanded');
                sidebarOverlay.classList.remove('show');
                classHeaderContent.classList.remove('with-sidebar');
                navTabs.classList.remove('with-sidebar');
            } else {
                // Reset to desktop state
                sidebarOverlay.classList.remove('show');
                if (sidebarVisible) {
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    classHeaderContent.classList.add('with-sidebar');
                    navTabs.classList.add('with-sidebar');
                } else {
                    sidebar.classList.add('collapsed');
                    mainContent.classList.add('expanded');
                    classHeaderContent.classList.remove('with-sidebar');
                    navTabs.classList.remove('with-sidebar');
                }
            }
        });

        // Profile menu functions
        function toggleProfileMenu() {
            const menu = document.getElementById('profileMenu');
            menu.classList.toggle('show');
        }

        // Logout functions
        function logout() {
            // Close dropdown menu
            const menu = document.getElementById('profileMenu');
            menu.classList.remove('show');
            
            // Show confirmation modal
            const modal = document.getElementById('logoutModal');
            modal.classList.add('show');
        }

        function cancelLogout() {
            // Close modal
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('show');
        }

        function confirmLogout() {
            // Close modal
            const modal = document.getElementById('logoutModal');
            modal.classList.remove('show');
            
            // Simulate logout (in real app, this would submit a form or make an API call)
            alert('Logout berhasil! (Simulasi)');
            // window.location.href = '/login'; // Redirect to login page
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const profileDropdown = document.querySelector('.profile-dropdown');
            const profileMenu = document.getElementById('profileMenu');
            const logoutModal = document.getElementById('logoutModal');
            
            // Close profile menu if clicked outside
            if (!profileDropdown.contains(event.target)) {
                profileMenu.classList.remove('show');
            }
            
            // Close logout modal if clicked on overlay
            if (event.target === logoutModal) {
                logoutModal.classList.remove('show');
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const profileMenu = document.getElementById('profileMenu');
                const logoutModal = document.getElementById('logoutModal');
                
                profileMenu.classList.remove('show');
                logoutModal.classList.remove('show');
                
                // Close sidebar on mobile
                if (isMobile()) {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                }
            }
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (isMobile()) {
                classHeaderContent.classList.remove('with-sidebar');
                navTabs.classList.remove('with-sidebar');
            }
        });
    </script>
</body>
</html>