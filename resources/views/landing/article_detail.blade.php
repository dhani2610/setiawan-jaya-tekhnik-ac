@extends('layouts.app')

@section('meta_title', $article->title . ' - ' . ($setting->site_name ?? 'Jasa Service AC'))
@section('meta_description', Str::limit(strip_tags($article->excerpt ?? $article->content), 160))
@section('meta_image', asset($article->cover_image ?? 'storage/sliders/slide1.jpg'))
@section('og_type', 'article')

@section('content')

<!-- Breadcrumb -->
<section class="py-3 bg-light border-bottom">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('articles.index') }}" class="text-decoration-none text-muted">Artikel</a></li>
                <li class="breadcrumb-item active text-truncate text-primary" style="max-width: 280px;" aria-current="page">{{ $article->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Article Content -->
<section class="py-5">
    <div class="container py-2">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                <article class="glass-card p-4 p-md-5 mb-5" style="border-radius: 24px;">
                    <!-- Badge & Date -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
                        <span class="badge bg-primary px-3 py-2 rounded-pill">
                            <i class="fa-solid fa-newspaper me-1"></i> Tips & Panduan
                        </span>
                        <span class="text-muted small">
                            <i class="fa-solid fa-calendar me-1"></i>{{ $article->created_at->format('d F Y') }}
                        </span>
                        <span class="text-muted small">
                            <i class="fa-solid fa-eye me-1"></i>{{ $article->views_count }} dilihat
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="fw-extrabold text-dark mb-4 fs-2" style="line-height: 1.35;">
                        {{ $article->title }}
                    </h1>

                    <!-- Cover Image -->
                    @if($article->cover_image)
                        <div class="mb-4 text-center">
                            <img src="{{ $article->cover_image }}" class="img-fluid rounded-4 shadow-sm w-100 object-fit-cover" style="max-height: 420px;" alt="{{ $article->title }}">
                        </div>
                    @endif

                    <!-- Content (Summernote HTML) -->
                    <div class="prose-content text-dark mb-5" style="line-height: 1.85; font-size: 16px;">
                        {!! $article->content !!}
                    </div>

                    <!-- Like Section -->
                    <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between mb-5 border">
                        <span class="small text-muted fw-semibold">Suka dengan tips artikel ini?</span>
                        <button type="button" class="btn btn-outline-danger btn-sm d-flex align-items-center gap-2 px-3 py-2 rounded-pill" id="btnLikeDetail">
                            <i class="fa-solid fa-heart"></i>
                            <span id="detailLikesCount">{{ $article->likes_count }}</span> Suka
                        </button>
                    </div>

                    <!-- Komentar Section -->
                    <div class="border-top pt-4">
                        <h4 class="fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-comments text-primary"></i>
                            <span>Komentar Pembaca ({{ $article->comments->count() }})</span>
                        </h4>

                        <!-- Comments List -->
                        <div class="mb-4" id="commentsContainer">
                            @forelse($article->comments as $comment)
                                <div class="p-3 bg-white border rounded-3 mb-3 shadow-sm">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-size: 13px;">
                                                {{ substr($comment->author_name, 0, 1) }}
                                            </div>
                                            <strong class="text-dark fs-6">{{ $comment->author_name }}</strong>
                                        </div>
                                        <small class="text-muted" style="font-size: 11.5px;">
                                            <i class="fa-solid fa-clock me-1"></i>{{ $comment->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <p class="text-secondary small mb-0 ps-4">{{ $comment->comment_text }}</p>
                                </div>
                            @empty
                                <p class="text-muted small fst-italic">Belum ada komentar pada artikel ini. Jadilah yang pertama memberikan tanggapan!</p>
                            @endforelse
                        </div>

                        <!-- Form Tulis Komentar -->
                        <div class="card bg-light border p-4 rounded-4">
                            <h5 class="fw-bold mb-3">Tinggalkan Komentar</h5>
                            <form id="detailCommentForm">
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" id="detailAuthorName" class="form-control" placeholder="Nama Anda" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Alamat Email (Opsional)</label>
                                        <input type="email" id="detailAuthorEmail" class="form-control" placeholder="email@contoh.com">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-semibold">Isi Komentar <span class="text-danger">*</span></label>
                                        <textarea id="detailCommentText" class="form-control" rows="3" placeholder="Tuliskan pendapat atau pertanyaan Anda..." required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary-custom d-inline-flex align-items-center gap-2">
                                    <i class="fa-solid fa-paper-plane"></i>
                                    <span>Kirim Komentar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    <!-- Booking CTA Banner -->
                    <div class="card border-0 text-white p-4 shadow-lg text-center mb-4" style="background: linear-gradient(135deg, #0284C7 0%, #0F172A 100%); border-radius: 20px;">
                        <i class="fa-solid fa-snowflake fs-1 text-info mb-3"></i>
                        <h5 class="fw-bold text-white mb-2">Butuh Service AC Cepat?</h5>
                        <p class="text-light opacity-90 small mb-4">
                            Panggil teknisi terpercaya ke rumah atau kantor Anda sekarang juga dengan <strong>Garansi 2 Bulan</strong>.
                        </p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin Jasa Service AC, saya ingin booking teknisi service AC.') }}" target="_blank" class="btn btn-whatsapp-custom w-100 py-2">
                            <i class="fa-brands fa-whatsapp fs-5 me-1"></i>
                            <span>Pesan via WhatsApp</span>
                        </a>
                    </div>

                    <!-- Related Articles -->
                    @if($relatedArticles->count() > 0)
                        <div class="glass-card p-4" style="border-radius: 20px;">
                            <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                                <i class="fa-solid fa-bookmark text-primary"></i>
                                <span>Artikel Lainnya</span>
                            </h6>
                            <div class="d-flex flex-column gap-3">
                                @foreach($relatedArticles as $rel)
                                    <div class="d-flex align-items-center gap-3 pb-3 border-bottom">
                                        <img src="{{ $rel->cover_image ?? asset('assets/images/hero_illustration.jpg') }}" class="rounded-3 object-fit-cover shadow-sm flex-shrink-0" style="width: 65px; height: 65px;" alt="Rel">
                                        <div>
                                            <h6 class="mb-1" style="font-size: 13.5px; line-height: 1.4;">
                                                <a href="{{ route('articles.show', $rel->slug) }}" class="text-dark fw-bold text-decoration-none">
                                                    {{ $rel->title }}
                                                </a>
                                            </h6>
                                            <small class="text-muted d-block" style="font-size: 11px;">
                                                <i class="fa-solid fa-calendar me-1"></i>{{ $rel->created_at->format('d M Y') }}
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    const articleId = {{ $article->id }};

    // Like Action
    document.getElementById('btnLikeDetail').addEventListener('click', function() {
        fetch(`/artikel/${articleId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById('detailLikesCount').textContent = data.likes_count;
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Terima kasih atas apresiasi Anda!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });

    // Comment Submit
    document.getElementById('detailCommentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const authorName = document.getElementById('detailAuthorName').value.trim();
        const authorEmail = document.getElementById('detailAuthorEmail').value.trim();
        const commentText = document.getElementById('detailCommentText').value.trim();

        if (!authorName || !commentText) return;

        fetch(`/artikel/${articleId}/comment`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                author_name: authorName,
                author_email: authorEmail,
                comment_text: commentText
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Komentar Terkirim!',
                    text: data.message,
                    confirmButtonColor: '#0284C7'
                });

                const container = document.getElementById('commentsContainer');
                const newComment = document.createElement('div');
                newComment.className = 'p-3 bg-white border rounded-3 mb-3 shadow-sm';
                newComment.innerHTML = `
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-size: 13px;">
                                ${data.data.author_name.charAt(0)}
                            </div>
                            <strong class="text-dark fs-6">${data.data.author_name}</strong>
                        </div>
                        <small class="text-muted" style="font-size: 11.5px;">
                            <i class="fa-solid fa-clock me-1"></i>Baru saja
                        </small>
                    </div>
                    <p class="text-secondary small mb-0 ps-4">${data.data.comment_text}</p>
                `;
                container.prepend(newComment);

                document.getElementById('detailCommentForm').reset();
            }
        });
    });
</script>
@endpush

