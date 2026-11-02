<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('meta_title', ($setting->site_name ?? 'Jasa Service AC') . ' - Spesialis Cuci & Service AC Garansi 2 Bulan Jakarta Timur')</title>
    
    <!-- Meta SEO & Search Engines -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $setting->site_name ?? 'Jasa Service AC' }}">
    <meta name="description" content="@yield('meta_description', 'Jasa service AC, cuci AC higienis, overhaul cuci besar, perbaikan bocor, bongkar pasang, dan isi freon R32/R410A di Duren Sawit & sekitarnya Jakarta Timur. Garansi resmi 2 bulan, teknisi profesional.')">
    <meta name="keywords" content="service ac jakarta timur, service ac duren sawit, cuci ac duren sawit, overhaul ac jakarta, isi freon r32, isi freon r410a, perbaikan ac bocor, garansi ac 2 bulan, teknisi ac panggilan">
    <meta name="theme-color" content="#0284C7">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook / WhatsApp Preview -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $setting->site_name ?? 'Jasa Service AC' }}">
    <meta property="og:title" content="@yield('meta_title', ($setting->site_name ?? 'Jasa Service AC') . ' - Spesialis Cuci & Service AC Garansi 2 Bulan Jakarta Timur')">
    <meta property="og:description" content="@yield('meta_description', 'Jasa service AC, cuci AC higienis, overhaul, perbaikan bocor, isi freon R32/R410A bergaransi resmi 2 bulan.')">
    <meta property="og:image" content="@yield('meta_image', asset($setting->site_logo ?? 'storage/sliders/slide1.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('meta_title', ($setting->site_name ?? 'Jasa Service AC') . ' - Spesialis Cuci & Service AC Garansi 2 Bulan')">
    <meta name="twitter:description" content="@yield('meta_description', 'Jasa service AC, cuci AC higienis, overhaul, perbaikan bocor, isi freon R32/R410A bergaransi 2 bulan.')">
    <meta name="twitter:image" content="@yield('meta_image', asset($setting->site_logo ?? 'storage/sliders/slide1.jpg'))">

    <!-- Local SEO Geo Meta (Jakarta Timur) -->
    <meta name="geo.region" content="ID-JK">
    <meta name="geo.placename" content="Jakarta Timur, Duren Sawit">
    <meta name="geo.position" content="-6.233401;106.897859">
    <meta name="ICBM" content="-6.233401, 106.897859">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $setting->site_favicon ?? asset('storage/settings/favicon.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary: #0284C7;
            --primary-hover: #0369A1;
            --primary-light: #E0F2FE;
            --accent-cyan: #38BDF8;
            --accent-neon: #0EA5E9;
            --secondary: #0F172A;
            --dark-card: #0F172A;
            --text-dark: #0F172A;
            --text-body: #334155;
            --text-muted: #64748B;
            --glass-bg: rgba(255, 255, 255, 0.90);
            --glass-border: rgba(255, 255, 255, 0.85);
            --glass-shadow: 0 12px 35px -8px rgba(2, 132, 199, 0.08);
        }

        html {
            scroll-behavior: smooth;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-dark);
            background-color: #F8FAFC;
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            margin: 0;
            padding: 0;
        }

        main {
            flex: 1 0 auto;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        /* Fixed Ambient Glowing Background Orbs Container (Prevents any mobile/page overflow) */
        .ambient-orbs-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            pointer-events: none;
            z-index: 0;
        }

        .ambient-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.55;
            pointer-events: none;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #BAE6FD 0%, rgba(186, 230, 253, 0) 70%);
            top: 5%;
            left: -100px;
        }

        .orb-2 {
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, #E0F2FE 0%, rgba(224, 242, 254, 0) 70%);
            top: 45%;
            right: -100px;
        }

        .orb-3 {
            width: 380px;
            height: 380px;
            background: radial-gradient(circle, #BFDBFE 0%, rgba(191, 219, 254, 0) 70%);
            bottom: 5%;
            left: 10%;
        }

        /* Glassmorphic Navbar */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.90);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(224, 242, 254, 0.8);
            box-shadow: 0 4px 25px rgba(2, 132, 199, 0.06);
            transition: all 0.3s ease;
        }

        .navbar-brand img {
            height: 44px;
            width: 44px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #BAE6FD;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 800;
            color: #0F172A;
            letter-spacing: -0.3px;
        }

        @media (max-width: 575.98px) {
            .brand-title {
                font-size: 14.5px;
                letter-spacing: -0.2px;
            }
        }

        .nav-link {
            font-weight: 600;
            color: #334155 !important;
            padding: 8px 15px !important;
            position: relative;
            transition: all 0.25s ease;
            font-size: 14.5px;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }

        /* Active underline indicator */
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #0284C7, #38BDF8);
            border-radius: 4px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-50%);
        }

        .nav-link.active::after, .nav-link:hover::after {
            width: 70%;
        }

        /* Modern Glass Card */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--glass-border);
            border-top: 1px solid rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: var(--glass-shadow);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .glass-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 20px 40px -10px rgba(2, 132, 199, 0.16);
            border-color: rgba(56, 189, 248, 0.65);
        }

        /* Section Titles */
        .section-badge {
            background: linear-gradient(135deg, #E0F2FE 0%, #BAE6FD 100%);
            color: #0369A1;
            font-weight: 700;
            font-size: 13px;
            padding: 7px 16px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-bottom: 14px;
            border: 1px solid rgba(2, 132, 199, 0.2);
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.1);
        }

        .section-title {
            font-weight: 800;
            color: #0F172A;
            font-size: 34px;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--text-body);
            max-width: 650px;
            margin: 0 auto 40px;
            font-size: 15.5px;
            line-height: 1.7;
        }

        /* Modern Action Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
            color: #FFFFFF !important;
            border: none;
            font-weight: 700;
            border-radius: 12px;
            padding: 11px 24px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(2, 132, 199, 0.3);
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #0369A1 0%, #075985 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(2, 132, 199, 0.4);
        }

        .btn-whatsapp-custom {
            background: linear-gradient(135deg, #22C55E 0%, #16A34A 100%);
            color: #FFFFFF !important;
            border: none;
            font-weight: 700;
            border-radius: 12px;
            padding: 11px 22px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(34, 197, 94, 0.35);
        }

        .btn-whatsapp-custom:hover {
            background: linear-gradient(135deg, #16A34A 0%, #15803D 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.45);
        }

        /* WhatsApp Floating Action Button & Popup */
        .wa-floating-btn {
            position: fixed;
            bottom: 26px;
            right: 26px;
            width: 62px;
            height: 62px;
            background: #25D366;
            color: #FFFFFF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.45);
            z-index: 1050;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: pulse-wa 2s infinite;
        }

        .wa-floating-btn:hover {
            transform: scale(1.1);
            color: #FFFFFF;
        }

        @keyframes pulse-wa {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6); }
            70% { box-shadow: 0 0 0 16px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* WhatsApp Popup Box */
        .wa-chat-popup {
            position: fixed;
            bottom: 100px;
            right: 26px;
            width: 360px;
            max-width: calc(100vw - 48px);
            background: #FFFFFF;
            border-radius: 22px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.22);
            z-index: 1050;
            overflow: hidden;
            display: none;
            border: 1px solid #E2E8F0;
            animation: slideUp 0.3s ease;
        }

        .wa-chat-popup.active {
            display: block;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .wa-popup-header {
            background: linear-gradient(135deg, #0284C7 0%, #0369A1 100%);
            color: #FFFFFF;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .wa-popup-body {
            padding: 20px;
            background: #F8FAFC;
        }

        .wa-chat-bubble {
            background: #FFFFFF;
            border-radius: 14px;
            border-top-left-radius: 2px;
            padding: 12px 14px;
            color: #334155;
            font-size: 13.5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            margin-bottom: 14px;
            line-height: 1.5;
        }

        .wa-quick-btn {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            padding: 9px 14px;
            font-size: 13px;
            font-weight: 600;
            color: #1E293B;
            width: 100%;
            text-align: left;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s;
        }

        .wa-quick-btn:hover {
            background: #E0F2FE;
            border-color: #38BDF8;
            color: var(--primary);
            transform: translateX(3px);
        }

        /* ================= HIGH CONTRAST ULTRA-MODERN FOOTER ================= */
        .footer-ultra {
            background: #070D1A;
            color: #E2E8F0;
            padding-top: 72px;
            padding-bottom: 28px;
            position: relative;
            border-top: 1px solid rgba(56, 189, 248, 0.25);
        }

        .footer-ultra::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #38BDF8, #0284C7, transparent);
        }

        .footer-title {
            color: #FFFFFF;
            font-size: 17px;
            font-weight: 800;
            margin-bottom: 20px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
            letter-spacing: -0.2px;
        }

        .footer-title::after {
            content: '';
            display: block;
            width: 28px;
            height: 3px;
            background: #38BDF8;
            border-radius: 3px;
        }

        .footer-desc {
            color: #CBD5E1 !important;
            font-size: 14px;
            line-height: 1.75;
        }

        .footer-link {
            color: #CBD5E1 !important;
            text-decoration: none;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            font-size: 14.5px;
            font-weight: 500;
        }

        .footer-link:hover {
            color: #38BDF8 !important;
            transform: translateX(5px);
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 16px;
        }

        .footer-contact-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(2, 132, 199, 0.2);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: #38BDF8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .footer-contact-text {
            color: #E2E8F0 !important;
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-contact-text a {
            color: #38BDF8 !important;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-contact-text a:hover {
            text-decoration: underline;
        }

        .social-btn {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #FFFFFF;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .social-btn:hover {
            background: #0284C7;
            border-color: #38BDF8;
            color: #FFFFFF;
            transform: translateY(-4px);
            box-shadow: 0 6px 15px rgba(2, 132, 199, 0.4);
        }

        .footer-bottom-text {
            color: #94A3B8 !important;
            font-size: 13.5px;
        }

        .secret-admin-dot {
            color: #1E293B;
            text-decoration: none;
            cursor: default;
            transition: color 0.3s;
        }
        .secret-admin-dot:hover {
            color: #475569;
        }
    </style>
    @stack('styles')
</head>
<body data-bs-spy="scroll" data-bs-target="#mainNavbar" data-bs-offset="100">

    <!-- Ambient Orbs (Fixed & Isolated, never causing scrollbars) -->
    <div class="ambient-orbs-wrapper">
        <div class="ambient-orb orb-1"></div>
        <div class="ambient-orb orb-2"></div>
        <div class="ambient-orb orb-3"></div>
    </div>

    <!-- Navigation Header -->
    <nav class="navbar navbar-expand-lg navbar-glass sticky-top py-3" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-decoration-none" href="{{ route('home') }}">
                @if($setting->site_logo)
                    <img src="{{ $setting->site_logo }}" alt="Logo" class="shadow-sm">
                @else
                    <img src="{{ asset('storage/settings/logo.jpg') }}" alt="Logo" class="shadow-sm">
                @endif
                <span class="brand-title text-dark">
                    {{ $setting->site_name ?? 'SETIAWAN JAYA TEKHNIK AC' }}
                </span>
            </a>

            <!-- Mobile Hamburger -->
            <button class="navbar-toggler border-0 p-2 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-4 text-dark"></i>
            </button>

            <!-- Navbar Links (Concise 4 Menus Only: Beranda, Layanan, Artikel, Kontak) -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 py-2 py-lg-0 gap-lg-3">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}#hero">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles.*') ? 'active text-primary' : '' }}" href="{{ route('articles.index') }}">
                            Artikel
                            <span class="badge bg-primary-subtle text-primary ms-1" style="font-size: 10px;">Tips</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#kontak">Kontak</a>
                    </li>
                </ul>

                <!-- CTA Button -->
                <div class="d-flex align-items-center gap-2">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin SETIAWAN JAYA TEKHNIK AC, saya ingin booking jadwal teknisi untuk service/cuci AC di area Duren Sawit & sekitarnya.') }}" target="_blank" class="btn btn-primary-custom d-flex align-items-center gap-2">
                        <i class="fa-solid fa-phone"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Slot -->
    <main>
        @yield('content')
    </main>

    <!-- WhatsApp Floating Action Button & Popup Overlay -->
    <div class="wa-floating-btn" id="waToggleBtn" title="Chat WhatsApp Sekarang">
        <i class="fa-brands fa-whatsapp"></i>
    </div>

    <!-- WhatsApp Chat Popup -->
    <div class="wa-chat-popup" id="waChatPopup">
        <div class="wa-popup-header">
            <div class="d-flex align-items-center gap-2">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/hero_illustration.jpg') }}" alt="CS" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                    <span class="position-absolute bottom-0 end-0 bg-success border border-white rounded-circle p-1"></span>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold fs-6">Admin Service AC</h6>
                    <small class="opacity-75" style="font-size: 11px;">Online • Siap Melayani</small>
                </div>
            </div>
            <button type="button" class="btn-close btn-close-white" id="waCloseBtn" aria-label="Close"></button>
        </div>

        <div class="wa-popup-body">
            <div class="wa-chat-bubble">
                Halo Bapak/Ibu! Butuh layanan service, cuci rutin, atau perbaikan AC bergaransi 2 bulan hari ini? Silakan pilih bantuan cepat di bawah:
            </div>

            <div class="mb-3">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo, saya ingin tanya biaya cuci AC untuk area Duren Sawit.') }}" target="_blank" class="wa-quick-btn text-decoration-none">
                    <i class="fa-solid fa-circle-question text-primary"></i>
                    <span>Tanya Biaya Cuci AC</span>
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo, AC saya meneteskan air / tidak dingin. Mohon info teknisi.') }}" target="_blank" class="wa-quick-btn text-decoration-none">
                    <i class="fa-solid fa-triangle-exclamation text-warning"></i>
                    <span>AC Bocor Air / Kurang Dingin</span>
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo, saya ingin booking jadwal teknisi service AC hari ini.') }}" target="_blank" class="wa-quick-btn text-decoration-none">
                    <i class="fa-solid fa-calendar-check text-success"></i>
                    <span>Booking Teknisi Hari Ini</span>
                </a>
            </div>

            <form action="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}" method="GET" target="_blank" id="waCustomForm">
                <div class="input-group">
                    <input type="text" name="text" class="form-control form-control-sm" placeholder="Tulis pesan..." required style="border-radius: 8px 0 0 8px;">
                    <button class="btn btn-success btn-sm px-3" type="submit" style="border-radius: 0 8px 8px 0;">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ================= ULTRA HIGH-CONTRAST MODERN FOOTER ================= -->
    <footer class="footer-ultra">
        <div class="container">
            <div class="row g-4 mb-5">
                <!-- Col 1: Brand & Garansi -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        @if($setting->site_logo)
                            <img src="{{ $setting->site_logo }}" alt="Logo" style="height: 44px; width: 44px; border-radius: 10px; object-fit: cover; border: 2px solid #38BDF8;">
                        @else
                            <img src="{{ asset('assets/images/hero_illustration.jpg') }}" alt="Logo" style="height: 44px; width: 44px; border-radius: 10px; object-fit: cover; border: 2px solid #38BDF8;">
                        @endif
                        <div>
                            <h5 class="text-white fw-bold mb-0 fs-5">{{ $setting->site_name ?? 'SETIAWAN JAYA TEKHNIK AC' }}</h5>
                            <small class="text-info" style="font-size: 11.5px;">Air Conditioner Repair & Maintenance</small>
                        </div>
                    </div>
                    <p class="footer-desc mb-4">
                        Pusat layanan pemeliharaan, servis berkala, overhaul cuci besar, dan perbaikan AC berstandar industri dengan jaminan pasti <strong>Garansi Resmi 2 Bulan</strong>.
                    </p>
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-3" style="background: rgba(2, 132, 199, 0.18); border: 1px solid rgba(56, 189, 248, 0.45);">
                        <i class="fa-solid fa-certificate text-warning fs-5"></i>
                        <span class="text-white small fw-bold">GARANSI 2 BULAN PENUH</span>
                    </div>
                </div>

                <!-- Col 2: Navigasi Cepat -->
                <div class="col-lg-2 col-md-6">
                    <div class="footer-title">Navigasi</div>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('home') }}#hero" class="footer-link"><i class="fa-solid fa-chevron-right text-info" style="font-size: 10px;"></i> Beranda</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-chevron-right text-info" style="font-size: 10px;"></i> Layanan & Tarif</a></li>
                        <li><a href="{{ route('articles.index') }}" class="footer-link"><i class="fa-solid fa-chevron-right text-info" style="font-size: 10px;"></i> Artikel & Tips</a></li>
                        <li><a href="{{ route('home') }}#kontak" class="footer-link"><i class="fa-solid fa-chevron-right text-info" style="font-size: 10px;"></i> Kontak Kami</a></li>
                    </ul>
                </div>

                <!-- Col 3: Layanan Populer -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-title">Layanan Kami</div>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-wrench text-info" style="font-size: 11px;"></i> Servis AC Berkala</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-soap text-info" style="font-size: 11px;"></i> Cuci AC Higienis</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-arrows-spin text-info" style="font-size: 11px;"></i> Overhaul (Cuci Besar)</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-truck-ramp-box text-info" style="font-size: 11px;"></i> Bongkar / Pasang AC</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-droplet text-info" style="font-size: 11px;"></i> Perbaikan Kebocoran</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-wind text-info" style="font-size: 11px;"></i> Vacum & Flashing Pipa</a></li>
                        <li><a href="{{ route('home') }}#layanan" class="footer-link"><i class="fa-solid fa-snowflake text-info" style="font-size: 11px;"></i> Isi & Tambah Freon</a></li>
                    </ul>
                </div>

                <!-- Col 4: Kontak & Social Media (Ultra Visible) -->
                <div class="col-lg-3 col-md-6">
                    <div class="footer-title">Hubungi Kami</div>

                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="footer-contact-text">
                            {{ $setting->address }}
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <div class="footer-contact-icon" style="background: rgba(34, 197, 94, 0.2); border-color: rgba(34, 197, 94, 0.4); color: #22C55E;">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <div class="footer-contact-text">
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}" target="_blank">
                                {{ $setting->whatsapp_number }}
                            </a>
                            <div class="text-white-50 small">Respon Cepat via WhatsApp</div>
                        </div>
                    </div>

                    <div class="footer-contact-item">
                        <div class="footer-contact-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="footer-contact-text">
                            Setiap Hari: 08.00 - 20.00 WIB
                            <div class="text-white-50 small">Termasuk Hari Libur / Tanggal Merah</div>
                        </div>
                    </div>

                    <h6 class="text-white fw-bold small mt-4 mb-2">Ikuti Media Sosial:</h6>
                    <div class="d-flex align-items-center gap-2">
                        @if($setting->instagram_url)
                            <a href="{{ $setting->instagram_url }}" target="_blank" class="social-btn" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if($setting->facebook_url)
                            <a href="{{ $setting->facebook_url }}" target="_blank" class="social-btn" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if($setting->youtube_url)
                            <a href="{{ $setting->youtube_url }}" target="_blank" class="social-btn" title="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                        @if($setting->tiktok_url)
                            <a href="{{ $setting->tiktok_url }}" target="_blank" class="social-btn" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright & Discreet Admin Access -->
            <div class="pt-4 border-top border-secondary border-opacity-25 d-flex flex-column flex-sm-row align-items-center justify-content-between gap-2">
                <p class="footer-bottom-text mb-0">
                    &copy; {{ date('Y') }} <span class="text-white fw-semibold">{{ $setting->site_name ?? 'Jasa Service AC' }}</span>. Seluruh Hak Cipta Dilindungi<a href="{{ route('login') }}" class="secret-admin-dot" title="Akses Admin">.</a>
                </p>
                <div class="footer-bottom-text text-white-50">
                    Layanan Service & Cuci AC Terpercaya Duren Sawit & Jakarta Timur
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // WhatsApp Popup Toggle
        const waToggleBtn = document.getElementById('waToggleBtn');
        const waChatPopup = document.getElementById('waChatPopup');
        const waCloseBtn = document.getElementById('waCloseBtn');

        waToggleBtn.addEventListener('click', function() {
            waChatPopup.classList.toggle('active');
        });

        waCloseBtn.addEventListener('click', function() {
            waChatPopup.classList.remove('active');
        });

        // Close when clicking outside
        document.addEventListener('click', function(e) {
            if (!waChatPopup.contains(e.target) && !waToggleBtn.contains(e.target)) {
                waChatPopup.classList.remove('active');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
