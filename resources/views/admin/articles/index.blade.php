@extends('layouts.admin')

@section('title', 'Artikel')
@section('breadcrumb', 'Artikel & Blog Edukasi')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-newspaper text-primary"></i>
            <span>Daftar Artikel & Tips AC</span>
        </h6>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
            <i class="fa-solid fa-plus"></i>
            <span>Tulis Artikel Baru</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle datatable w-100">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th style="width: 100px;">Cover</th>
                        <th>Judul Artikel</th>
                        <th style="width: 100px;">Interaksi</th>
                        <th style="width: 120px;">Tanggal</th>
                        <th style="width: 90px;">Status</th>
                        <th style="width: 110px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $index => $art)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($art->cover_image)
                                    <img src="{{ $art->cover_image }}" alt="Cover" class="rounded object-fit-cover shadow-sm" style="width: 80px; height: 50px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="width: 80px; height: 50px;">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $art->title }}</div>
                                <small class="text-muted text-truncate d-inline-block" style="max-width: 320px;">{{ $art->excerpt }}</small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="text-danger small fw-semibold" title="Total Likes">
                                        <i class="fa-solid fa-heart me-1"></i>{{ $art->likes_count }}
                                    </span>
                                    <span class="text-primary small fw-semibold" title="Total Komentar">
                                        <i class="fa-solid fa-comments me-1"></i>{{ $art->comments_count }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <small class="text-muted">{{ $art->created_at->format('d M Y') }}</small>
                            </td>
                            <td>
                                @if($art->is_published)
                                    <span class="badge bg-success-subtle text-success">Terbit</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form id="delete-art-{{ $art->id }}" action="{{ route('admin.articles.destroy', $art->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('delete-art-{{ $art->id }}', 'artikel {{ $art->title }}')" class="btn btn-sm btn-outline-danger" title="Hapus">
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

