@extends('layouts.admin')

@section('title', 'Profil & Keamanan Akun')
@section('breadcrumb', 'Profil Administrator')

@section('content')
<div class="row g-4">
    <!-- Kolom Kiri: Ringkasan Akun -->
    <div class="col-lg-4 col-md-5">
        <div class="card border-0 shadow-sm rounded-4 text-center p-4">
            <div class="position-relative d-inline-block mx-auto mb-3">
                <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 90px; height: 90px; font-size: 38px;">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
            </div>
            
            <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill fw-semibold mb-3">
                <i class="fa-solid fa-crown me-1"></i> Super Administrator
            </span>
            <p class="text-muted small mb-3">
                <i class="fa-solid fa-envelope me-1"></i> {{ $user->email }}
            </p>

            <hr class="my-3 text-secondary opacity-25">

            <div class="text-start small text-muted">
                <div class="d-flex justify-content-between mb-2">
                    <span>Terdaftar Sejak:</span>
                    <strong class="text-dark">{{ $user->created_at ? $user->created_at->format('d M Y') : 'N/A' }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Status Akun:</span>
                    <strong class="text-success"><i class="fa-solid fa-circle-check me-1"></i> Aktif</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Hak Akses:</span>
                    <strong class="text-dark">Full Control CMS</strong>
                </div>
            </div>

            <div class="alert alert-info border-0 rounded-3 text-start small mt-4 mb-0 py-3">
                <div class="d-flex gap-2">
                    <i class="fa-solid fa-shield-halved text-info fs-5 mt-1"></i>
                    <div>
                        <strong class="text-dark d-block mb-1">Tips Keamanan</strong>
                        Gunakan kombinasi minimal 8 karakter dengan huruf besar, huruf kecil, dan angka untuk menjaga keamanan akun Anda.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Kanan: Form Edit Profil & Ganti Password -->
    <div class="col-lg-8 col-md-7">
        <!-- Form 1: Edit Informasi Profil -->
        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-id-card text-primary"></i>
                    Informasi Akun Administrator
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.profile.update_info') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold small text-muted">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required placeholder="Nama lengkap">
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold small text-muted">Alamat Email Login</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="alamat@email.com">
                        </div>
                        <small class="text-muted">Email ini digunakan sebagai username untuk login ke panel admin.</small>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-semibold">
                            <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Form 2: Ganti Password -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-key text-warning"></i>
                    Ganti Password
                </h6>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.profile.update_password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label fw-semibold small text-muted">Password Saat Ini</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" class="form-control border-start-0 border-end-0 ps-0 @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required placeholder="Masukkan password lama Anda">
                            <button class="input-group-text bg-light border-start-0 text-muted" type="button" onclick="togglePass('current_password', 'eyeCurrent')">
                                <i class="fa-solid fa-eye" id="eyeCurrent"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label fw-semibold small text-muted">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-shield-halved"></i></span>
                                <input type="password" class="form-control border-start-0 border-end-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Minimal 8 karakter">
                                <button class="input-group-text bg-light border-start-0 text-muted" type="button" onclick="togglePass('password', 'eyeNew')">
                                    <i class="fa-solid fa-eye" id="eyeNew"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold small text-muted">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-shield-check"></i></span>
                                <input type="password" class="form-control border-start-0 border-end-0 ps-0" id="password_confirmation" name="password_confirmation" required placeholder="Ulangi password baru">
                                <button class="input-group-text bg-light border-start-0 text-muted" type="button" onclick="togglePass('password_confirmation', 'eyeConfirm')">
                                    <i class="fa-solid fa-eye" id="eyeConfirm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-warning text-dark px-4 py-2 rounded-3 fw-semibold">
                            <i class="fa-solid fa-lock me-1"></i> Perbarui Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePass(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush
