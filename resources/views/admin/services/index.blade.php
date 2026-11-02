@extends('layouts.admin')

@section('title', 'Layanan')
@section('breadcrumb', 'Layanan & Tarif')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-wrench text-primary"></i>
            <span>Daftar Layanan & Tarif AC</span>
        </h6>
        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addServiceModal">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Layanan</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 100px;">Foto</th>
                        <th>Nama Layanan</th>
                        <th>Estimasi Tarif</th>
                        <th>Garansi</th>
                        <th style="width: 70px;">Urut</th>
                        <th style="width: 80px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $index => $service)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($service->image_path)
                                    <img src="{{ $service->image_path }}" alt="Service" class="rounded object-fit-cover shadow-sm" style="width: 75px; height: 50px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 75px; height: 50px;">
                                        <i class="fa-solid fa-screwdriver-wrench"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $service->name }}</div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 300px;">{{ $service->description }}</small>
                            </td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fw-bold" style="font-size: 13px;">
                                    {{ $service->price_range }}
                                </span>
                            </td>
                            <td>
                                @if($service->has_warranty)
                                    <span class="badge bg-warning-subtle text-warning-emphasis">
                                        <i class="fa-solid fa-certificate me-1"></i>Garansi 2 Bln
                                    </span>
                                @else
                                    <span class="badge bg-light text-muted">Tanpa Garansi</span>
                                @endif
                            </td>
                            <td>{{ $service->sort_order }}</td>
                            <td>
                                @if($service->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $service->id }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form id="delete-service-{{ $service->id }}" action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-service-{{ $service->id }}', 'layanan {{ $service->name }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Layanan -->
                        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit Layanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row g-3">
                                                <div class="col-md-7">
                                                    <label class="form-label fw-semibold">Nama Layanan <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label fw-semibold">Estimasi Tarif / Range <span class="text-danger">*</span></label>
                                                    <input type="text" name="price_range" class="form-control" value="{{ $service->price_range }}" placeholder="Contoh: Rp 75.000 - Rp 150.000" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-semibold">Deskripsi Pengerjaan</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $service->description }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Ganti Foto Ilustrasi</label>
                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                    <small class="text-muted">Biarkan kosong jika tidak diubah</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label fw-semibold">Urutan Tampil</label>
                                                    <input type="number" name="sort_order" class="form-control" value="{{ $service->sort_order }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch mt-2">
                                                        <input class="form-check-input" type="checkbox" name="has_warranty" id="warrantyEdit{{ $service->id }}" {{ $service->has_warranty ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-semibold" for="warrantyEdit{{ $service->id }}">Aktifkan Badge "GARANSI 2 BULAN"</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch mt-2">
                                                        <input class="form-check-input" type="checkbox" name="is_active" id="activeEditSrv{{ $service->id }}" {{ $service->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label fw-semibold" for="activeEditSrv{{ $service->id }}">Tampilkan di Landing Page</label>
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

<!-- Modal Tambah Layanan -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Layanan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row g-3">
                        <div class="col-md-7">
                            <label class="form-label fw-semibold">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Contoh: Cuci AC, Overhaul, Bongkar Pasang" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-semibold">Estimasi Tarif / Range <span class="text-danger">*</span></label>
                            <input type="text" name="price_range" class="form-control" placeholder="Contoh: Rp 65.000 - Rp 95.000" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Deskripsi Pengerjaan</label>
                            <textarea name="description" class="form-control" rows="3" placeholder="Poin-poin pengerjaan oleh teknisi..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Upload Foto Ilustrasi</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Urutan Tampil</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="has_warranty" id="warrantyAdd" checked>
                                <label class="form-check-label fw-semibold" for="warrantyAdd">Aktifkan Badge "GARANSI 2 BULAN"</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="activeAddSrv" checked>
                                <label class="form-check-label fw-semibold" for="activeAddSrv">Tampilkan di Landing Page</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Tambah Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

