@extends('layouts.admin')

@section('title', 'Tentang & Visi')
@section('breadcrumb', 'Tentang Kami & Visi Misi')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-building text-primary"></i>
            <span>Kelola Profil Tentang Kami & Visi Misi</span>
        </h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.company_profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nav Tabs -->
            <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold" id="about-tab" data-bs-toggle="tab" data-bs-target="#about-tab-pane" type="button" role="tab">
                        <i class="fa-solid fa-circle-info me-2 text-primary"></i>Tentang Kami
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision-tab-pane" type="button" role="tab">
                        <i class="fa-solid fa-bullseye me-2 text-primary"></i>Visi & Misi
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="profileTabContent">
                <!-- Tab Tentang Kami -->
                <div class="tab-pane fade show active" id="about-tab-pane" role="tabpanel">
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Foto Profil Perusahaan / Teknisi</label>
                            <div class="mb-3 text-center">
                                @if($profile->about_image)
                                    <img src="{{ $profile->about_image }}" alt="About" class="img-fluid rounded-3 shadow-sm border" style="max-height: 220px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/images/hero_illustration.jpg') }}" alt="About" class="img-fluid rounded-3 shadow-sm border" style="max-height: 220px; object-fit: cover;">
                                @endif
                            </div>
                            <input type="file" name="about_image" class="form-control" accept="image/*">
                            <small class="text-muted">Format: JPG, PNG, WebP (Rasio 4:3 atau 16:9)</small>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Konten Tentang Kami (Summernote WYSIWYG) <span class="text-danger">*</span></label>
                            <textarea name="about_content" class="summernote" required>{{ $profile->about_content }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Tab Visi Misi -->
                <div class="tab-pane fade" id="vision-tab-pane" role="tabpanel">
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Konten Visi & Misi Perusahaan (Summernote WYSIWYG) <span class="text-danger">*</span></label>
                        <textarea name="vision_mission_content" class="summernote" required>{{ $profile->vision_mission_content }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-3 border-top d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Profil & Visi Misi</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

