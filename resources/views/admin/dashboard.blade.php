@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat Card 1 -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #E0F2FE 0%, #BAE6FD 100%);">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-primary fw-semibold mb-1">Layanan Aktif</h6>
                    <h2 class="fw-bold text-dark mb-0">{{ $totalServices }}</h2>
                    <small class="text-muted">Total jasa tersedia</small>
                </div>
                <div class="rounded-circle bg-white text-primary p-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="fa-solid fa-wrench fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-warning-emphasis fw-semibold mb-1">Promo Berjalan</h6>
                    <h2 class="fw-bold text-dark mb-0">{{ $totalPromos }}</h2>
                    <small class="text-muted">Diskon & penawaran</small>
                </div>
                <div class="rounded-circle bg-white text-warning p-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="fa-solid fa-tag fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #DCFCE7 0%, #BBF7D0 100%);">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-success fw-semibold mb-1">Total Artikel</h6>
                    <h2 class="fw-bold text-dark mb-0">{{ $totalArticles }}</h2>
                    <small class="text-muted">Artikel & tips terbit</small>
                </div>
                <div class="rounded-circle bg-white text-success p-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 56px; height: 56px;">
                    <i class="fa-solid fa-newspaper fa-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 border-0 shadow-sm" style="background: linear-gradient(135deg, #F3E8FF 0%, #E9D5FF 100%);">
            <div class="card-body d-flex align-items-center justify-content-between p-4">
                <div>
                    <h6 class="text-purple fw-semibold mb-1" style="color: #7E22CE;">Komentar Masuk</h6>
                    <h2 class="fw-bold text-dark mb-0">{{ $totalComments }}</h2>
                    <small class="text-muted">Tanggapan pembaca</small>
                </div>
                <div class="rounded-circle bg-white p-3 shadow-sm d-flex align-items-center justify-content-center" style="width: 56px; height: 56px; color: #7E22CE;">
                    <i class="fa-solid fa-comments fa-xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Quick WhatsApp Update -->
    <div class="col-lg-4">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="card-title mb-0 d-flex align-items-center gap-2">
                    <i class="fa-brands fa-whatsapp text-success fs-5"></i>
                    <span>Quick Update WhatsApp</span>
                </h6>
            </div>
            <div class="card-body p-4">
                <p class="text-muted small mb-3">
                    Ubah nomor WhatsApp admin penerima pesanan secara instan untuk tombol pesan dan widget chat di landing page.
                </p>
                <form action="{{ route('admin.quick_whatsapp') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Nomor WhatsApp Tujuan</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light text-success border-end-0"><i class="fa-brands fa-whatsapp"></i></span>
                            <input type="text" name="whatsapp_number" class="form-control" value="{{ $setting->whatsapp_number ?? '+62 878-6934-6820' }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Nomor
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Recent Comments Table -->
    <div class="col-lg-8">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h6 class="card-title mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-comment-dots text-primary"></i>
                    <span>Komentar Terbaru</span>
                </h6>
                <a href="{{ route('admin.comments.index') }}" class="btn btn-sm btn-light text-primary fw-semibold">
                    Semua Komentar <i class="fa-solid fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0 datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Pengirim</th>
                                <th>Artikel Terkait</th>
                                <th>Pesan</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentComments as $comment)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $comment->author_name }}</div>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-inline-block text-secondary" style="max-width: 150px;">
                                            {{ $comment->article->title ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-truncate d-inline-block text-muted" style="max-width: 200px;">
                                            {{ $comment->comment_text }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($comment->is_approved)
                                            <span class="badge bg-success-subtle text-success">Tayang</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary">Disembunyikan</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <form id="delete-comment-{{ $comment->id }}" action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('delete-comment-{{ $comment->id }}', 'komentar dari {{ $comment->author_name }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada komentar masuk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

