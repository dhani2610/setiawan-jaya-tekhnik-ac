@extends('layouts.admin')

@section('title', 'Tulis Artikel')
@section('breadcrumb', 'Artikel / Tambah')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-plus text-primary"></i>
            <span>Tulis Artikel Baru</span>
        </h6>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali
        </a>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: 5 Tanda Freon AC Anda Mulai Habis" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Ringkasan Singkat (Excerpt)</label>
                        <textarea name="excerpt" class="form-control" rows="2" placeholder="Cuplikan ringkas untuk kartu artikel di landing page..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konten Lengkap (Summernote WYSIWYG) <span class="text-danger">*</span></label>
                        <textarea name="content" class="summernote" required></textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border p-3 mb-3">
                        <label class="form-label fw-semibold">Cover Thumbnail Gambar</label>
                        <input type="file" name="cover_image" class="form-control mb-2" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WebP (Rasio 16:9 disarankan)</small>
                    </div>

                    <div class="card bg-light border p-3 mb-4">
                        <label class="form-label fw-semibold mb-2">Status Publikasi</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="publishCheck" checked>
                            <label class="form-check-label fw-semibold" for="publishCheck">Langsung Terbitkan</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Publikasikan Artikel</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

