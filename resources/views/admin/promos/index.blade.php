@extends('layouts.admin')

@section('title', 'Promo')
@section('breadcrumb', 'Promo Menarik')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-tag text-primary"></i>
            <span>Daftar Promo & Penawaran</span>
        </h6>
        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addPromoModal">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Promo</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 120px;">Banner</th>
                        <th>Nama Promo</th>
                        <th>Periode</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promos as $index => $promo)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($promo->image_path)
                                    <img src="{{ $promo->image_path }}" alt="Promo" class="rounded object-fit-cover shadow-sm" style="width: 100px; height: 60px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 100px; height: 60px;">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $promo->title }}</div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $promo->description }}</small>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="fa-solid fa-calendar-days me-1 text-primary"></i>
                                    {{ $promo->start_date ? \Carbon\Carbon::parse($promo->start_date)->format('d M Y') : 'Sekarang' }} - 
                                    {{ $promo->end_date ? \Carbon\Carbon::parse($promo->end_date)->format('d M Y') : 'Seterusnya' }}
                                </small>
                            </td>
                            <td>
                                @if($promo->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editPromoModal{{ $promo->id }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form id="delete-promo-{{ $promo->id }}" action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-promo-{{ $promo->id }}', 'promo {{ $promo->title }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Promo -->
                        <div class="modal fade" id="editPromoModal{{ $promo->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit Promo</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label fw-semibold">Nama / Judul Promo <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" class="form-control" value="{{ $promo->title }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-semibold">Deskripsi Singkat Promo</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $promo->description }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Ganti Banner Promo</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label fw-semibold">Tanggal Mulai</label>
                                                    <input type="date" name="start_date" class="form-control" value="{{ $promo->start_date }}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="form-label fw-semibold">Tanggal Selesai</label>
                                                    <input type="date" name="end_date" class="form-control" value="{{ $promo->end_date }}">
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-switch mt-2">
                                                        <input class="form-check-input" type="checkbox" name="is_active" id="activeEditPromo{{ $promo->id }}" {{ $promo->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-semibold" for="activeEditPromo{{ $promo->id }}">Aktifkan Promo di Landing Page</label>
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

<!-- Modal Tambah Promo -->
<div class="modal fade" id="addPromoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Promo Menarik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nama / Judul Promo <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Contoh: Paket Cuci 3 Unit Hemat 20%" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi Singkat Promo</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Syarat dan ketentuan promo menarik..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Banner Promo</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Tanggal Selesai</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="activeAddPromo" checked>
                                <label class="form-check-label fw-semibold" for="activeAddPromo">Aktifkan Promo di Landing Page</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Tambah Promo</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

