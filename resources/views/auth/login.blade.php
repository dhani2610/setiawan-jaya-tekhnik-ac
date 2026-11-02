<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - SETIAWAN JAYA TEKHNIK AC</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/settings/favicon.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #E0F2FE 0%, #F8FAFC 50%, #BAE6FD 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(2, 132, 199, 0.12);
            width: 100%;
            max-width: 440px;
            padding: 40px 32px;
            position: relative;
        }

        .btn-primary {
            background: #0284C7;
            border-color: #0284C7;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-primary:hover:not(:disabled) {
            background: #0369A1;
            border-color: #0369A1;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
        }

        .btn-primary:disabled {
            background: #0284C7;
            border-color: #0284C7;
            opacity: 0.85;
            cursor: not-allowed;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #CBD5E1;
            padding: 12px 14px;
        }

        .form-control:focus {
            border-color: #0284C7;
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15);
        }

        /* Loading Overlay */
        #loginOverlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(6px);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.25s ease-in-out;
        }

        #loginOverlay.active {
            display: flex !important;
            opacity: 1;
        }

        .loader-box {
            background: #ffffff;
            border-radius: 20px;
            padding: 28px 32px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 320px;
            width: 90%;
            animation: pulseCard 1.8s infinite ease-in-out;
        }

        @keyframes pulseCard {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
    </style>
</head>
<body>

    <!-- Fullscreen Modern Loader Overlay -->
    <div id="loginOverlay">
        <div class="loader-box">
            <div class="spinner-border text-primary mb-3" style="width: 3.2rem; height: 3.2rem; border-width: 0.28em;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <h6 class="fw-bold text-dark mb-1">Memproses Masuk...</h6>
            <p class="text-muted small mb-0">Sedang memverifikasi akun dan menyiapkan dashboard Anda</p>
        </div>
    </div>

    <div class="login-card">
        <div class="text-center mb-4">
            <img src="{{ asset('storage/settings/logo.jpg') }}" alt="Logo" class="rounded-circle shadow-sm mb-3" style="width: 72px; height: 72px; object-fit: cover; border: 2px solid #38BDF8;">
            <h4 class="fw-bold text-dark mb-1">Administrator</h4>
            <p class="text-muted small mb-0">SETIAWAN JAYA TEKHNIK AC</p>
        </div>

        <form action="{{ route('login') }}" method="POST" id="loginForm">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold small text-muted">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', 'admin@serviceac.com') }}" required autofocus placeholder="nama@email.com">
                </div>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold small text-muted">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control border-start-0 border-end-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" value="admin123" required placeholder="Masukkan password">
                    <button class="input-group-text bg-light border-start-0 text-muted" type="button" id="togglePassword">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                    <label class="form-check-label small text-muted" for="remember">
                        Ingat Saya
                    </label>
                </div>
                <a href="{{ route('home') }}" class="small text-decoration-none text-primary fw-semibold">
                    <i class="fa-solid fa-arrow-left me-1"></i> Ke Website
                </a>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3 d-flex align-items-center justify-content-center gap-2" id="btnLogin">
                <i class="fa-solid fa-right-to-bracket" id="btnLoginIcon"></i>
                <span id="btnLoginText">Masuk Sekarang</span>
            </button>
        </form>

        <div class="text-center text-muted small mt-4 pt-3 border-top">
            <span class="text-secondary">&copy; {{ date('Y') }} SETIAWAN JAYA TEKHNIK AC</span>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const loginForm = document.getElementById('loginForm');
        const btnLogin = document.getElementById('btnLogin');
        const btnLoginIcon = document.getElementById('btnLoginIcon');
        const btnLoginText = document.getElementById('btnLoginText');
        const loginOverlay = document.getElementById('loginOverlay');

        togglePassword.addEventListener('click', function() {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });

        // Form Submit Loading Feedback
        loginForm.addEventListener('submit', function() {
            // Disable button and show spinner inside button
            btnLogin.disabled = true;
            btnLoginIcon.className = 'spinner-border spinner-border-sm';
            btnLoginText.textContent = 'Memproses Masuk...';

            // Show full modern overlay
            loginOverlay.classList.add('active');
        });

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                confirmButtonColor: '#0284C7'
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal Masuk',
                text: 'Email atau password yang Anda masukkan salah.',
                confirmButtonColor: '#0284C7'
            });
        @endif
    </script>
</body>
</html>

