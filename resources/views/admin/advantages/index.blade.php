@extends('layouts.admin')

@section('title', 'Keunggulan')
@section('breadcrumb', 'Keunggulan & Mengapa Memilih Kami')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-shield-halved text-primary"></i>
            <span>Daftar Keunggulan Kami</span>
        </h6>
        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addAdvantageModal">
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Keunggulan</span>
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 80px;">Ikon</th>
                        <th>Judul Keunggulan</th>
                        <th>Deskripsi</th>
                        <th style="width: 80px;">Urutan</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($advantages as $index => $adv)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                    <i class="{{ $adv->icon_class }} fs-5"></i>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $adv->title }}</div>
                                <code class="small text-muted">{{ $adv->icon_class }}</code>
                            </td>
                            <td>
                                <span class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $adv->description }}</span>
                            </td>
                            <td>{{ $adv->sort_order }}</td>
                            <td>
                                @if($adv->is_active)
                                    <span class="badge bg-success-subtle text-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#editAdvModal{{ $adv->id }}" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form id="delete-adv-{{ $adv->id }}" action="{{ route('admin.advantages.destroy', $adv->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-adv-{{ $adv->id }}', 'keunggulan {{ $adv->title }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Keunggulan -->
                        <div class="modal fade" id="editAdvModal{{ $adv->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <form action="{{ route('admin.advantages.update', $adv->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit Keunggulan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Judul Keunggulan <span class="text-danger">*</span></label>
                                                <input type="text" name="title" class="form-control" value="{{ $adv->title }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold">Deskripsi Singkat</label>
                                                <textarea name="description" class="form-control" rows="3">{{ $adv->description }}</textarea>
                                            </div>
                                            <div class="row g-2 mb-3">
                                                <div class="col-8">
                                                    <label class="form-label fw-semibold">Class Ikon FontAwesome <span class="text-danger">*</span></label>
                                                    <input type="text" name="icon_class" class="form-control" value="{{ $adv->icon_class }}" required>
                                                    <small class="text-muted">Cth: fa-solid fa-certificate, fa-solid fa-user-check</small>
                                                </div>
                                                <div class="col-4">
                                                    <label class="form-label fw-semibold">Urutan</label>
                                                    <input type="number" name="sort_order" class="form-control" value="{{ $adv->sort_order }}">
                                                </div>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_active" id="activeAdvEdit{{ $adv->id }}" {{ $adv->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label fw-semibold" for="activeAdvEdit{{ $adv->id }}">Tampilkan di Landing Page</label>
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

<!-- Modal Tambah Keunggulan -->
<div class="modal fade" id="addAdvantageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.advantages.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus text-primary me-2"></i>Tambah Keunggulan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Judul Keunggulan <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: GARANSI RESMI 2 BULAN" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi Singkat</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Penjelasan singkat keunggulan..."></textarea>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-8">
                            <label class="form-label fw-semibold">Class Ikon FontAwesome <span class="text-danger">*</span></label>
                            <input type="text" name="icon_class" class="form-control" value="fa-solid fa-award" required>
                            <small class="text-muted">Gunakan class FontAwesome 6</small>
                        </div>
                        <div class="col-4">
                            <label class="form-label fw-semibold">Urutan</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="activeAdvAdd" checked>
                        <label class="form-check-label fw-semibold" for="activeAdvAdd">Tampilkan di Landing Page</label>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4"><i class="fa-solid fa-floppy-disk me-1"></i> Tambah Keunggulan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

