@extends('layouts.admin')

@section('title', 'Testimoni')
@section('breadcrumb', 'Testimoni Pelanggan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-star text-primary"></i>
            <span>Daftar Ulasan & Testimoni Pelanggan</span>
        </h6>
        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Testimoni</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 70px;">Foto</th>
                        <th>Nama & Domisili</th>
                        <th style="width: 120px;">Rating</th>
                        <th>Isi Ulasan</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $index => $testi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($testi->client_photo)
                                    <img src="{{ $testi->client_photo }}" alt="Client" class="rounded-circle object-fit-cover shadow-sm" style="width: 44px; height: 44px;">
                                @else
                                    <div class="rounded-circle bg-light text-muted d-flex align-items-center justify-content-center fw-bold" style="width: 44px; height: 44px;">
                                        {{ substr($testi->client_name, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $testi->client_name }}</div>
                                <small class="text-muted">{{ $testi->client_role_location }}</small>
                            </td>
                            <td>
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testi->rating)
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @else
                                        <i class="fa-regular fa-star text-muted"></i>
                                    @endif
                                @endfor
                            </td>
                            <td>
                                <span class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $testi->review_text }}</span>
                            </td>
                            <td>
                                @if($testi->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editTestiModal{{ $testi->id }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form id="delete-testi-{{ $testi->id }}" action="{{ route('admin.testimonials.destroy', $testi->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-testi-{{ $testi->id }}', 'testimoni {{ $testi->client_name }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Testimoni -->
                        <div class="modal fade" id="editTestiModal{{ $testi->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.testimonials.update', $testi->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit Testimoni</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Nama Pelanggan <span class="text-danger">*</span></label>
                                                <input type="text" name="client_name" class="form-control" value="{{ $testi->client_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Domisili / Lokasi</label>
                                                <input type="text" name="client_role_location" class="form-control" value="{{ $testi->client_role_location }}" placeholder="Contoh: Duren Sawit, Jakarta Timur">
                                            </div>
                                            <div class="row g-2 mb-3">
                                                <div class="col-6">
                                                    <label class="form-label fw-semibold">Rating Bintang (1 - 5)</label>
                                                    <select name="rating" class="form-select">
                                                        <option value="5" {{ $testi->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                                                        <option value="4" {{ $testi->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (4 Bintang)</option>
                                                        <option value="3" {{ $testi->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (3 Bintang)</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label fw-semibold">Ganti Foto</label>
                                                    <input type="file" name="client_photo" class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Isi Ulasan Testimoni <span class="text-danger">*</span></label>
                                                <textarea name="review_text" class="form-control" rows="3" required>{{ $testi->review_text }}</textarea>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_active" id="activeTestiEdit{{ $testi->id }}" {{ $testi->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold" for="activeTestiEdit{{ $testi->id }}">Tampilkan di Landing Page</label>
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

<!-- Modal Tambah Testimoni -->
<div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Testimoni Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Pelanggan <span class="text-danger">*</span></label>
                        <input type="text" name="client_name" class="form-control" placeholder="Contoh: Ibu Sarah" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Domisili / Lokasi</label>
                        <input type="text" name="client_role_location" class="form-control" placeholder="Contoh: Duren Sawit, Jakarta Timur">
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Rating Bintang</label>
                            <select name="rating" class="form-select">
                                <option value="5" selected>⭐⭐⭐⭐⭐ (5 Bintang)</option>
                                <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                                <option value="3">⭐⭐⭐ (3 Bintang)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Foto Pelanggan</label>
                            <input type="file" name="client_photo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Isi Ulasan Testimoni <span class="text-danger">*</span></label>
                        <textarea name="review_text" class="form-control" rows="3" placeholder="Ulasan kepuasan servis AC dan garansi..." required></textarea>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="activeTestiAdd" checked>
                        <label class="form-check-label fw-semibold" for="activeTestiAdd">Tampilkan di Landing Page</label>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Tambah Testimoni</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

