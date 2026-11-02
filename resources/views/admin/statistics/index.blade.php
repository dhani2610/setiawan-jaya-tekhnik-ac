@extends('layouts.admin')

@section('title', 'Statistik')
@section('breadcrumb', 'Statistik & Angka Pencapaian')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-chart-line text-primary"></i>
            <span>Kelola Angka Statistik Landing Page</span>
        </h6>
    </div>
    <div class="card-body p-4">
        <p class="text-muted small mb-4">
            Angka-angka pencapaian ini akan ditampilkan dengan animasi penghitung otomatis (*counter up*) saat pengunjung membuka landing page.
        </p>

        <form action="{{ route('admin.statistics.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-4">
                @foreach($statistics as $index => $stat)
                    <div class="col-md-6 col-lg-3">
                        <div class="card bg-light border p-3 h-100">
                            <input type="hidden" name="stats[{{ $index }}][id]" value="{{ $stat->id }}">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <div class="rounded-circle bg-white text-primary p-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                                    <i class="{{ $stat->icon_class }} fs-6"></i>
                                </div>
                                <span class="fw-bold text-dark">Metrik #{{ $index + 1 }}</span>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Nilai Angka <span class="text-danger">*</span></label>
                                <input type="text" name="stats[{{ $index }}][stat_value]" class="form-control" value="{{ $stat->stat_value }}" placeholder="Contoh: 5.000+" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-semibold">Label Keterangan <span class="text-danger">*</span></label>
                                <input type="text" name="stats[{{ $index }}][stat_label]" class="form-control" value="{{ $stat->stat_label }}" placeholder="Contoh: Pelanggan Puas" required>
                            </div>

                            <div class="mb-2">
                                <label class="form-label small fw-semibold">Class Ikon FontAwesome</label>
                                <input type="text" name="stats[{{ $index }}][icon_class]" class="form-control" value="{{ $stat->icon_class }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pt-4 mt-3 border-top d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Angka Statistik</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

