<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - {{ $setting->site_name ?? 'Jasa Service AC' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $setting->site_favicon ?? asset('assets/images/hero_illustration.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- DataTables Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Summernote Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #0284C7;
            --primary-hover: #0369A1;
            --primary-light: #E0F2FE;
            --sidebar-bg: #0F172A;
            --sidebar-hover: #1E293B;
            --bg-light: #F8FAFC;
            --text-dark: #0F172A;
            --text-muted: #64748B;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        #sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            min-height: 100vh;
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1040;
            overflow-y: auto;
        }

        #sidebar.collapsed {
            width: 78px;
        }

        #sidebar.collapsed .sidebar-text,
        #sidebar.collapsed .sidebar-header-text {
            display: none;
        }

        #sidebar.collapsed .sidebar-brand-icon {
            margin: 0 auto;
        }

        .sidebar-brand {
            padding: 20px 20px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            color: #FFFFFF;
            text-decoration: none;
        }

        .sidebar-brand img {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            object-fit: cover;
        }

        .sidebar-menu {
            padding: 16px 12px;
            list-style: none;
            margin: 0;
        }

        .sidebar-item {
            margin-bottom: 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 10px 16px;
            border-radius: 8px;
            color: #94A3B8;
            text-decoration: none;
            font-weight: 500;
            font-size: 14.5px;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            width: 20px;
            font-size: 16px;
            text-align: center;
        }

        .sidebar-link:hover {
            color: #FFFFFF;
            background: var(--sidebar-hover);
        }

        .sidebar-link.active {
            color: #FFFFFF;
            background: var(--primary);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.35);
        }

        /* Main Content Wrapper */
        #main-content {
            margin-left: 260px;
            transition: all 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #main-content.expanded {
            margin-left: 78px;
        }

        /* Topbar */
        .admin-topbar {
            height: 64px;
            background: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .btn-toggle-sidebar {
            background: #F1F5F9;
            border: none;
            color: #475569;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-toggle-sidebar:hover {
            background: #E2E8F0;
            color: var(--primary);
        }

        /* Content Body */
        .admin-container {
            padding: 24px;
            flex: 1;
        }

        .card {
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
        }

        .card-header {
            background: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            padding: 16px 20px;
            border-top-left-radius: 12px !important;
            border-top-right-radius: 12px !important;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-weight: 700;
            font-size: 16px;
            margin: 0;
            color: var(--text-dark);
        }

        /* Buttons & Forms */
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        /* DataTables Custom Styling */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, 
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: var(--primary) !important;
            color: #fff !important;
            border-color: var(--primary) !important;
            border-radius: 6px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 6px;
            border: 1px solid #CBD5E1;
            padding: 5px 12px;
        }

        .dataTables_wrapper .dataTables_length select {
            border-radius: 6px;
            border: 1px solid #CBD5E1;
            padding: 5px 8px;
        }

        /* Mobile Overlay */
        .sidebar-backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            z-index: 1035;
        }

        @media (max-width: 991.98px) {
            #sidebar {
                margin-left: -260px;
            }

            #sidebar.show-mobile {
                margin-left: 0;
            }

            #main-content {
                margin-left: 0 !important;
            }

            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Mobile Backdrop -->
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- Sidebar -->
    <nav id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('assets/images/hero_illustration.jpg') }}" alt="Logo" class="sidebar-brand-icon">
            <div class="sidebar-header-text">
                <div class="fw-bold fs-6 text-white text-truncate" style="max-width: 170px;">{{ $setting->site_name ?? 'Service AC' }}</div>
                <small class="text-info" style="font-size: 11px;">Admin Panel</small>
            </div>
        </a>

        <ul class="sidebar-menu">
            <li class="sidebar-item">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.sliders.index') }}" class="sidebar-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images"></i>
                    <span class="sidebar-text">Slider</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-wrench"></i>
                    <span class="sidebar-text">Layanan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.promos.index') }}" class="sidebar-link {{ request()->routeIs('admin.promos.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tag"></i>
                    <span class="sidebar-text">Promo</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.advantages.index') }}" class="sidebar-link {{ request()->routeIs('admin.advantages.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span class="sidebar-text">Keunggulan</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.company_profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.company_profile.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-building"></i>
                    <span class="sidebar-text">Tentang & Visi</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.statistics.index') }}" class="sidebar-link {{ request()->routeIs('admin.statistics.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="sidebar-text">Statistik</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-star"></i>
                    <span class="sidebar-text">Testimoni</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.articles.index') }}" class="sidebar-link {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span class="sidebar-text">Artikel</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.comments.index') }}" class="sidebar-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-comments"></i>
                    <span class="sidebar-text">Komentar</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-gear"></i>
                    <span class="sidebar-text">Profil Admin</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gear"></i>
                    <span class="sidebar-text">Pengaturan</span>
                </a>
            </li>
            
            <li class="sidebar-item mt-4 pt-3 border-top border-secondary border-opacity-25">
                <a href="javascript:void(0)" onclick="confirmLogout()" class="sidebar-link text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span class="sidebar-text">Keluar</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div id="main-content">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn-toggle-sidebar" id="sidebarToggle" title="Toggle Sidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="fw-semibold text-muted d-none d-sm-block">
                    @yield('breadcrumb', 'Dashboard')
                </div>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary d-flex align-items-center gap-2">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span class="d-none d-md-inline">Lihat Web</span>
                </a>

                <div class="dropdown">
                    <button class="btn btn-light d-flex align-items-center gap-2 border-0 bg-transparent py-1 px-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span class="fw-semibold text-dark d-none d-md-inline" style="font-size: 14px;">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        <i class="fa-solid fa-chevron-down text-muted" style="font-size: 11px;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                        <li><a class="dropdown-item py-2" href="{{ route('admin.profile.index') }}"><i class="fa-solid fa-user-pen me-2 text-primary"></i>Edit Profil & Password</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('admin.settings.index') }}"><i class="fa-solid fa-gear me-2 text-muted"></i>Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="javascript:void(0)" onclick="confirmLogout()"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Body Content -->
        <main class="admin-container">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs5.min.js"></script>

    <script>
        // Global SweetAlert Toast Setup
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        @if(session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: "{{ session('error') }}",
                confirmButtonColor: '#0284C7'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: '<ul class="text-start mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
                confirmButtonColor: '#0284C7'
            });
        @endif

        // Global Delete Confirmation
        function confirmDelete(formId, itemName = 'data ini') {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Hapus ${itemName}? Tindakan ini tidak dapat dibatalkan!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonColor: '#64748B',
                confirmButtonText: '<i class="fa-solid fa-trash me-1"></i> Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger px-4',
                    cancelButton: 'btn btn-secondary px-4'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }

        // Global Logout Confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: 'Apakah Anda yakin ingin keluar dari sistem admin?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0284C7',
                cancelButtonColor: '#64748B',
                confirmButtonText: '<i class="fa-solid fa-right-from-bracket me-1"></i> Keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        // Sidebar Toggle Handler
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');

        sidebarToggle.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show-mobile');
                sidebarBackdrop.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
                mainContent.classList.toggle('expanded');
            }
        });

        sidebarBackdrop.addEventListener('click', function() {
            sidebar.classList.remove('show-mobile');
            sidebarBackdrop.classList.remove('show');
        });

        // Initialize DataTables globally
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari data...",
                    lengthMenu: "Tampil _MENU_ baris",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    infoEmpty: "Tidak ada data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    zeroRecords: "Data tidak ditemukan",
                    paginate: {
                        first: "Awal",
                        last: "Akhir",
                        next: '<i class="fa-solid fa-chevron-right"></i>',
                        previous: '<i class="fa-solid fa-chevron-left"></i>'
                    }
                }
            });

            // Initialize Summernote
            $('.summernote').summernote({
                height: 250,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
    @stack('scripts')
</body>
</html>

