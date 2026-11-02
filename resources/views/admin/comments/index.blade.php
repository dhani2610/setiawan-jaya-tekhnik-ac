@extends('layouts.admin')

@section('title', 'Komentar')
@section('breadcrumb', 'Moderasi Komentar Artikel')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-comments text-primary"></i>
            <span>Daftar Komentar Artikel</span>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Pengirim</th>
                        <th>Artikel Terkait</th>
                        <th>Pesan Komentar</th>
                        <th style="width: 110px;">Tanggal</th>
                        <th style="width: 100px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $index => $comm)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $comm->author_name }}</div>
                                <small class="text-muted">{{ $comm->author_email ?? '-' }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border text-truncate d-inline-block" style="max-width: 180px;">
                                    {{ $comm->article->title ?? 'Artikel Telah Dihapus' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-secondary">{{ $comm->comment_text }}</span>
                            </td>
                            <td>
                                <small class="text-muted">{{ $comm->created_at->format('d M Y H:i') }}</small>
                            </td>
                            <td>
                                @if($comm->is_approved)
                                    <span class="badge bg-success-subtle text-success">Tayang</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Disembunyikan</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.comments.toggle', $comm->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm {{ $comm->is_approved ? 'btn-outline-secondary' : 'btn-outline-success' }} me-1" title="{{ $comm->is_approved ? 'Sembunyikan' : 'Tayangkan' }}">
                                        <i class="fa-solid {{ $comm->is_approved ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                    </button>
                                </form>

                                <form id="delete-comm-{{ $comm->id }}" action="{{ route('admin.comments.destroy', $comm->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-comm-{{ $comm->id }}', 'komentar dari {{ $comm->author_name }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

