@extends('layouts.admin')

@section('title', 'Slider')
@section('breadcrumb', 'Slider')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-images text-primary"></i>
            <span>Daftar Slider Banner</span>
        </h6>
        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addSliderModal">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Slider</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 140px;">Banner</th>
                        <th>Judul & Subtitle</th>
                        <th>CTA Button</th>
                        <th style="width: 80px;">Urutan</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $index => $slider)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ $slider->image_path }}" alt="Banner" class="rounded object-fit-cover shadow-sm" style="width: 120px; height: 65px;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $slider->title }}</div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $slider->subtitle }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="fa-solid fa-link me-1 text-primary"></i>{{ $slider->cta_text }}
                                </span>
                            </td>
                            <td>{{ $slider->sort_order }}</td>
                            <td>
                                @if($slider->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editSliderModal{{ $slider->id }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form id="delete-slider-{{ $slider->id }}" action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-slider-{{ $slider->id }}', 'slide ini')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Slider -->
                        <div class="modal fade" id="editSliderModal{{ $slider->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit Slider</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label fw-semibold">Judul Banner <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-semibold">Subtitle / Deskripsi</label>
                                                    <textarea name="subtitle" class="form-control" rows="2">{{ $slider->subtitle }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Ganti Gambar Banner</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Urutan Tampil</label>
                                                    <input type="number" name="sort_order" class="form-control" value="{{ $slider->sort_order }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Teks Tombol CTA</label>
                                                    <input type="text" name="cta_text" class="form-control" value="{{ $slider->cta_text }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Link Tombol CTA</label>
                                                    <input type="text" name="cta_link" class="form-control" value="{{ $slider->cta_link }}">
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-switch mt-2">
                                                        <input class="form-check-input" type="checkbox" name="is_active" id="activeEdit{{ $slider->id }}" {{ $slider->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-semibold" for="activeEdit{{ $slider->id }}">Tampilkan di Landing Page</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Slider -->
<div class="modal fade" id="addSliderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Slider Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Judul Banner <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Jasa Service AC Terpercaya & Bergaransi 2 Bulan" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Subtitle / Deskripsi</label>
                            <textarea name="subtitle" class="form-control" rows="2" placeholder="Penjelasan singkat keunggulan atau tawaran"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Gambar Banner <span class="text-danger">*</span></label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format: JPG, PNG, WebP (Rasio 16:9 disarankan)</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Urutan Tampil</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Teks Tombol CTA</label>
                            <input type="text" name="cta_text" class="form-control" value="Hubungi Kami">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Link Tombol CTA</label>
                            <input type="text" name="cta_link" class="form-control" value="#kontak">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="activeAdd" checked>
                                <label class="form-check-label fw-semibold" for="activeAdd">Tampilkan di Landing Page</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Tambah Slider</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

