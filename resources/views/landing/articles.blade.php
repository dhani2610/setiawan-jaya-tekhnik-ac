@extends('layouts.app')

@section('meta_title', 'Tips & Artikel Edukasi Perawatan AC - ' . ($setting->site_name ?? 'Jasa Service AC'))
@section('meta_description', 'Kumpulan artikel, tips perawatan AC rutin, cara menghemat listrik inverter, dan panduan perbaikan AC oleh teknisi profesional.')

@section('content')

<!-- Header Banner -->
<section class="py-5 position-relative text-white" style="background: radial-gradient(circle at center, #0F172A 0%, #070C18 100%); border-bottom: 1px solid rgba(56, 189, 248, 0.2);">
    <div class="container py-4 text-center">
        <span class="badge px-3 py-2 rounded-pill text-info mb-2 fw-semibold" style="background: rgba(2, 132, 199, 0.2); border: 1px solid rgba(56, 189, 248, 0.3);">
            <i class="fa-solid fa-newspaper me-1"></i> BLOG & PANDUAN TEKNIS
        </span>
        <h1 class="fw-bold display-6 mb-2">Tips & Artikel Perawatan AC</h1>
        <p class="text-white-50 small mb-4" style="max-width: 580px; margin: 0 auto;">
            Panduan lengkap merawat AC, tips menghemat listrik, dan solusi masalah teknis umum seputar pendingin ruangan.
        </p>

        <!-- Search Bar -->
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <form action="{{ route('articles.index') }}" method="GET">
                    <div class="glass-card p-2 d-flex align-items-center shadow-lg" style="background: rgba(255, 255, 255, 0.95); border-radius: 50px;">
                        <span class="ps-3 pe-2 text-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control border-0 bg-transparent shadow-none" placeholder="Cari artikel... (cth: freon, bocor, hemat listrik)">
                        <button type="submit" class="btn btn-primary-custom rounded-pill px-4">
                            Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container py-3">
        <div class="row g-4">
            <!-- Main Articles Column -->
            <div class="col-lg-8">
                @if(request('q'))
                    <div class="mb-4 d-flex align-items-center justify-content-between">
                        <span class="text-muted small">
                            Hasil pencarian untuk: <strong>"{{ request('q') }}"</strong> ({{ $articles->total() }} artikel)
                        </span>
                        <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa-solid fa-xmark me-1"></i> Reset Pencarian
                        </a>
                    </div>
                @endif

                <div class="row g-4">
                    @forelse($articles as $art)
                        <div class="col-md-6">
                            <div class="glass-card overflow-hidden h-100 d-flex flex-column" style="border-radius: 20px;">
                                <div class="position-relative" style="height: 200px;">
                                    <img src="{{ $art->cover_image ?? asset('assets/images/hero_illustration.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $art->title }}">
                                    <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-3 px-3 py-1">
                                        <i class="fa-solid fa-calendar me-1"></i>{{ $art->created_at->format('d M Y') }}
                                    </span>
                                </div>

                                <div class="p-4 d-flex flex-column flex-grow-1">
                                    <h5 class="fw-bold text-dark mb-2" style="font-size: 17px; line-height: 1.4;">
                                        <a href="{{ route('articles.show', $art->slug) }}" class="text-dark text-decoration-none">
                                            {{ $art->title }}
                                        </a>
                                    </h5>
                                    <p class="text-secondary small mb-4 flex-grow-1" style="line-height: 1.6;">
                                        {{ $art->excerpt }}
                                    </p>

                                    <div class="pt-3 border-top d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <span class="small text-danger fw-semibold">
                                                <i class="fa-solid fa-heart me-1"></i>{{ $art->likes_count }}
                                            </span>
                                            <span class="small text-primary fw-semibold">
                                                <i class="fa-solid fa-comments me-1"></i>{{ $art->comments_count }}
                                            </span>
                                        </div>
                                        <a href="{{ route('articles.show', $art->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            Baca <i class="fa-solid fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="glass-card p-5 text-center">
                                <i class="fa-solid fa-newspaper text-muted fs-1 mb-3"></i>
                                <h5 class="fw-bold text-dark">Artikel Tidak Ditemukan</h5>
                                <p class="text-muted small mb-3">Tidak ada artikel yang cocok dengan kata kunci pencarian Anda.</p>
                                <a href="{{ route('articles.index') }}" class="btn btn-primary-custom btn-sm">Lihat Semua Artikel</a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-5 d-flex justify-content-center">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="col-lg-4">
                <!-- Popular Articles -->
                <div class="glass-card p-4 mb-4" style="border-radius: 20px;">
                    <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-fire text-danger"></i>
                        <span>Artikel Populer</span>
                    </h6>
                    <div class="d-flex flex-column gap-3">
                        @foreach($popularArticles as $pop)
                            <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                                <img src="{{ $pop->cover_image ?? asset('assets/images/hero_illustration.jpg') }}" class="rounded-3 object-fit-cover shadow-sm flex-shrink-0" style="width: 65px; height: 65px;" alt="Pop">
                                <div>
                                    <h6 class="mb-1" style="font-size: 13.5px; line-height: 1.4;">
                                        <a href="{{ route('articles.show', $pop->slug) }}" class="text-dark fw-bold text-decoration-none">
                                            {{ $pop->title }}
                                        </a>
                                    </h6>
                                    <small class="text-muted d-block" style="font-size: 11px;">
                                        <i class="fa-solid fa-eye me-1"></i>{{ $pop->views_count }} pembaca
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Service AC Booking CTA Banner -->
                <div class="card border-0 text-white p-4 shadow-lg text-center" style="background: linear-gradient(135deg, #0284C7 0%, #0F172A 100%); border-radius: 20px;">
                    <i class="fa-solid fa-snowflake fs-1 text-info mb-3"></i>
                    <h5 class="fw-bold text-white mb-2">Butuh Service AC Sekarang?</h5>
                    <p class="text-light opacity-90 small mb-4">
                        Teknisi kami siap datang ke rumah & kantor Anda dengan jaminan <strong>Garansi 2 Bulan Penuh</strong>.
                    </p>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin Jasa Service AC, saya ingin booking teknisi service AC.') }}" target="_blank" class="btn btn-whatsapp-custom w-100 py-2">
                        <i class="fa-brands fa-whatsapp fs-5 me-1"></i>
                        <span>Pesan Teknisi via WA</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

