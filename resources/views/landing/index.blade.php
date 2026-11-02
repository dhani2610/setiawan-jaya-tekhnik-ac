@extends('layouts.app')

@section('content')

<!-- ================= 1. HERO BANNER SLIDER (FULL PAGE & VIBRANT) ================= -->
<section id="hero" class="position-relative overflow-hidden hero-slider-section">
    <div id="heroCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="6500">
        <!-- Indicators -->
        <div class="carousel-indicators mb-4">
            @foreach($sliders as $idx => $slide)
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $idx }}" class="{{ $idx === 0 ? 'active' : '' }}" aria-label="Slide {{ $idx + 1 }}"></button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner h-100">
            @foreach($sliders as $idx => $slide)
                <div class="carousel-item {{ $idx === 0 ? 'active' : '' }} hero-slide h-100 position-relative">
                    <!-- High-Res Background Image -->
                    <img src="{{ $slide->image_path }}" class="d-block w-100 h-100 object-fit-cover position-absolute top-0 start-0 hero-slide-img" alt="{{ $slide->title }}">
                    
                    <!-- Modern Glass Scrim Overlay (Bright, Vibrant, Not Pitch Dark) -->
                    <div class="hero-slide-overlay"></div>

                    <div class="container position-relative py-5 my-auto" style="z-index: 2;">
                        <div class="row align-items-center justify-content-between g-4">
                            <!-- Left: Hero Text & CTA in High-Contrast Glass Container -->
                            <div class="col-lg-7 col-xl-7">
                                <div class="hero-content-box p-3 p-md-4 rounded-4" style="background: rgba(11, 19, 36, 0.55); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.15); box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);">
                                    <!-- Floating Pill Badges -->
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        <span class="badge px-3 py-2 rounded-pill text-white fw-bold shadow-sm" style="background: #0284C7; border: 1px solid #38BDF8; font-size: 12.5px;">
                                            <i class="fa-solid fa-certificate text-warning me-1"></i> Garansi Resmi 2 Bulan Penuh
                                        </span>
                                        <span class="badge px-3 py-2 rounded-pill text-white fw-semibold shadow-sm" style="background: rgba(15, 23, 42, 0.75); border: 1px solid rgba(255, 255, 255, 0.3); font-size: 12.5px;">
                                            <i class="fa-solid fa-location-dot text-info me-1"></i> Area Duren Sawit & Jakarta Timur
                                        </span>
                                    </div>

                                    <h1 class="text-white fw-extrabold hero-title mb-3 lh-sm text-shadow-strong">
                                        {{ $slide->title }}
                                    </h1>
                                    <p class="text-light hero-subtitle mb-4 fw-medium text-shadow-medium" style="opacity: 0.95; color: #F1F5F9 !important;">
                                        {{ $slide->subtitle }}
                                    </p>

                                    <div class="d-flex flex-wrap gap-3 hero-btns">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin SETIAWAN JAYA TEKHNIK AC, saya ingin booking teknisi service/cuci AC hari ini.') }}" target="_blank" class="btn btn-whatsapp-custom d-flex align-items-center justify-content-center gap-2 px-4 py-3 shadow-lg">
                                            <i class="fa-brands fa-whatsapp fs-5"></i>
                                            <span>Pesan Teknisi Sekarang</span>
                                        </a>
                                        <a href="{{ $slide->cta_link }}" class="btn btn-outline-light border-2 px-4 py-3 rounded-3 fw-bold text-white d-flex align-items-center justify-content-center gap-2 shadow" style="background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(8px);">
                                            <i class="fa-solid fa-tags text-info"></i>
                                            <span>{{ $slide->cta_text }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Right: Desktop Glass Highlights Card -->
                            <div class="col-lg-5 col-xl-4 d-none d-lg-block">
                                <div class="glass-card p-4 text-white shadow-lg" style="background: rgba(15, 23, 42, 0.65); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(56, 189, 248, 0.4); border-radius: 24px;">
                                    <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom border-light border-opacity-10">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: rgba(2, 132, 199, 0.35); border: 1px solid #38BDF8; color: #38BDF8;">
                                            <i class="fa-solid fa-clock-rotate-left fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold fs-6">Respon Cepat & Tepat</div>
                                            <small class="text-white-50">Teknisi tiba 30-45 menit</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3 mb-3 pb-3 border-bottom border-light border-opacity-10">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: rgba(34, 197, 94, 0.3); border: 1px solid #22C55E; color: #4ADE80;">
                                            <i class="fa-solid fa-shield-check fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold fs-6">Pasti Garansi 2 Bulan</div>
                                            <small class="text-white-50">Klaim mudah via WhatsApp</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: rgba(245, 158, 11, 0.3); border: 1px solid #F59E0B; color: #FBBF24;">
                                            <i class="fa-solid fa-screwdriver-wrench fs-5"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold fs-6">Peralatan Standar Pabrik</div>
                                            <small class="text-white-50">Pembersihan higienis & rapi</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Controls (Hidden on Mobile) -->
        <button class="carousel-control-prev d-none d-lg-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-none d-lg-flex" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- ================= 2. KEUNGGULAN (MENGAPA MEMILIH KAMI) ================= -->
<section id="keunggulan" class="py-5 my-2 position-relative">
    <div class="container py-3">
        <div class="text-center">
            <div class="section-badge">
                <i class="fa-solid fa-star"></i> Mengapa Memilih Kami
            </div>
            <h2 class="section-title">Kualitas Terjamin & Bergaransi Nyata</h2>
            <p class="section-subtitle">
                Kami mengutamakan kejujuran teknis, kerapihan pengerjaan, dan jaminan purna jual pasti demi kenyamanan udara sejuk di hunian Anda.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($advantages as $adv)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="glass-card p-4 h-100 d-flex flex-column" style="border-top: 3px solid #0284C7;">
                        <div class="rounded-3 d-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 56px; height: 56px; background: linear-gradient(135deg, #0284C7 0%, #38BDF8 100%); color: #FFFFFF;">
                            <i class="{{ $adv->icon_class }} fs-4"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2 fs-5">{{ $adv->title }}</h5>
                        <p class="text-secondary small mb-0 flex-grow-1" style="line-height: 1.65;">
                            {{ $adv->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= 3. LAYANAN & ESTIMASI HARGA (WITH REAL-TIME SEARCH) ================= -->
<section id="layanan" class="py-5 position-relative" style="background: rgba(240, 249, 255, 0.7);">
    <div class="container py-3">
        <div class="text-center">
            <div class="section-badge">
                <i class="fa-solid fa-wrench"></i> Layanan & Tarif
            </div>
            <h2 class="section-title">Layanan Service AC & Estimasi Biaya</h2>
            <p class="section-subtitle">
                Temukan layanan pendingin ruangan yang sesuai kebutuhan Anda. Tarif transparan tanpa biaya tersembunyi dengan jaminan Garansi 2 Bulan.
            </p>

            <!-- Real-Time Search Bar -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6">
                    <div class="glass-card p-2 d-flex align-items-center shadow-sm" style="border-radius: 50px;">
                        <span class="ps-3 pe-2 text-primary">
                            <i class="fa-solid fa-magnifying-glass fs-5"></i>
                        </span>
                        <input type="text" id="serviceSearchInput" class="form-control border-0 bg-transparent shadow-none" placeholder="Cari layanan... (cth: cuci, freon, bocor, overhaul)">
                        <button type="button" class="btn btn-sm btn-primary-custom rounded-pill px-3" id="btnResetSearch">
                            Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Cards Grid -->
        <div class="row g-4" id="servicesContainer">
            @foreach($services as $srv)
                <div class="col-12 col-md-6 col-lg-4 service-card-item" data-keywords="{{ strtolower($srv->name . ' ' . $srv->description) }}">
                    <div class="glass-card h-100 d-flex flex-column overflow-hidden position-relative" style="border-radius: 20px;">
                        <!-- Warranty Badge -->
                        @if($srv->has_warranty)
                            <div class="position-absolute top-0 end-0 m-3 z-2">
                                <span class="badge px-3 py-2 rounded-pill shadow-sm" style="background: rgba(15, 23, 42, 0.90); backdrop-filter: blur(8px); color: #F59E0B; border: 1px solid rgba(245, 158, 11, 0.5); font-size: 11.5px;">
                                    <i class="fa-solid fa-certificate me-1"></i> GARANSI 2 BULAN
                                </span>
                            </div>
                        @endif

                        <!-- Service Image -->
                        <div class="position-relative overflow-hidden" style="height: 200px;">
                            @if($srv->image_path)
                                <img src="{{ $srv->image_path }}" class="w-100 h-100 object-fit-cover" alt="{{ $srv->name }}">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted">
                                    <i class="fa-solid fa-screwdriver-wrench fs-1"></i>
                                </div>
                            @endif
                            <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(180deg, transparent 0%, rgba(15, 23, 42, 0.85) 100%);">
                                <span class="badge px-3 py-2 fs-6 fw-bold shadow-sm" style="background: linear-gradient(135deg, #0284C7, #0369A1);">
                                    {{ $srv->price_range }}
                                </span>
                            </div>
                        </div>

                        <!-- Service Body -->
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h5 class="fw-bold text-dark mb-2 fs-5">{{ $srv->name }}</h5>
                            <p class="text-secondary small mb-4 flex-grow-1" style="line-height: 1.65;">
                                {{ $srv->description }}
                            </p>

                            <!-- Direct WhatsApp Order Button -->
                            @php
                                $waText = "Halo Admin Jasa Service AC, saya ingin memesan layanan *" . $srv->name . "* (" . $srv->price_range . ") dengan Garansi 2 Bulan. Mohon info jadwal teknisi terdekat untuk area Duren Sawit / Jakarta Timur.";
                            @endphp
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode($waText) }}" target="_blank" class="btn btn-whatsapp-custom w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                                <i class="fa-brands fa-whatsapp fs-5"></i>
                                <span>Pesan via WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- No results alert -->
        <div id="noServiceResults" class="text-center py-5 d-none">
            <div class="glass-card p-5 d-inline-block">
                <i class="fa-solid fa-magnifying-glass text-muted fs-1 mb-3"></i>
                <h5 class="fw-bold text-dark">Layanan Tidak Ditemukan</h5>
                <p class="text-muted small mb-0">Coba gunakan kata kunci lain seperti: <em>cuci, freon, bocor, overhaul</em></p>
            </div>
        </div>
    </div>
</section>

<!-- ================= 4. PROMO MENARIK (VOUCHER TICKET STYLE) ================= -->
@if($promos->count() > 0)
<section id="promo" class="py-5 my-2 position-relative">
    <div class="container py-3">
        <div class="text-center">
            <div class="section-badge">
                <i class="fa-solid fa-tag"></i> Penawaran Spesial
            </div>
            <h2 class="section-title">Promo Menarik Bulan Ini</h2>
            <p class="section-subtitle">
                Manfaatkan potongan harga dan paket hemat service AC untuk hunian rumah, kos, maupun gedung perkantoran.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($promos as $promo)
                <div class="col-12 col-lg-6">
                    <div class="glass-card overflow-hidden h-100 d-flex flex-column flex-md-row" style="border: 2px dashed rgba(2, 132, 199, 0.35); border-radius: 20px;">
                        <!-- Promo Banner -->
                        <div class="position-relative promo-banner-box">
                            <img src="{{ $promo->image_path ?? asset('assets/images/hero_illustration.jpg') }}" class="w-100 h-100 object-fit-cover" alt="{{ $promo->title }}">
                            <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2 shadow">
                                <i class="fa-solid fa-fire me-1"></i> PROMO HEMAT
                            </span>
                        </div>
                        <!-- Promo Details -->
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <div>
                                <h5 class="fw-bold text-dark mb-2 fs-5">{{ $promo->title }}</h5>
                                <p class="text-secondary small mb-3" style="line-height: 1.6;">
                                    {{ $promo->description }}
                                </p>
                                <div class="badge bg-light text-secondary border px-3 py-2 mb-3">
                                    <i class="fa-solid fa-clock me-1 text-primary"></i>
                                    <span>Berlaku: {{ $promo->end_date ? \Carbon\Carbon::parse($promo->end_date)->format('d M Y') : 'Persediaan Tersedia' }}</span>
                                </div>
                            </div>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin Jasa Service AC, saya ingin klaim penawaran promo: ' . $promo->title) }}" target="_blank" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2 fw-bold py-2 rounded-3">
                                <i class="fa-brands fa-whatsapp text-success fs-5"></i>
                                <span>Klaim Promo Sekarang</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- ================= 5. STATISTIK PENCAPAIAN (MODERN TECH DASHBOARD) ================= -->
<section id="statistik" class="py-5 position-relative text-white" style="background: radial-gradient(circle at center, #0F172A 0%, #070C18 100%); border-top: 1px solid rgba(56, 189, 248, 0.2); border-bottom: 1px solid rgba(56, 189, 248, 0.2);">
    <div class="container py-4">
        <div class="text-center mb-5">
            <span class="badge px-3 py-2 rounded-pill text-info mb-2 fw-semibold" style="background: rgba(2, 132, 199, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                <i class="fa-solid fa-chart-simple me-1"></i> PENCAPAIAN TERVERIFIKASI
            </span>
            <h2 class="fw-bold text-white fs-2 mb-2">Statistik Prestasi Layanan Kami</h2>
            <p class="text-white-50 small mb-0">Dedikasi puluhan teknisi profesional dalam menjaga kepuasan ribuan pelanggan di Jakarta Timur.</p>
        </div>

        <div class="row g-4 text-center justify-content-center">
            @foreach($statistics as $stat)
                <div class="col-6 col-lg-3">
                    <div class="p-4 rounded-4 h-100 d-flex flex-column justify-content-center" style="background: rgba(255, 255, 255, 0.04); backdrop-filter: blur(14px); border: 1px solid rgba(56, 189, 248, 0.25); box-shadow: 0 10px 30px rgba(0,0,0,0.3); transition: all 0.3s;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow" style="width: 64px; height: 64px; background: linear-gradient(135deg, rgba(2, 132, 199, 0.4), rgba(56, 189, 248, 0.1)); border: 1px solid rgba(56, 189, 248, 0.5); color: #38BDF8;">
                            <i class="{{ $stat->icon_class }} fs-4"></i>
                        </div>
                        <h2 class="display-6 fw-bold mb-1" style="background: linear-gradient(135deg, #FFFFFF 0%, #BAE6FD 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                            {{ $stat->stat_value }}
                        </h2>
                        <div class="text-light fw-semibold small mb-2">
                            {{ $stat->stat_label }}
                        </div>
                        <div>
                            <span class="badge bg-success-subtle text-success px-2 py-1" style="font-size: 10.5px;">
                                <i class="fa-solid fa-check-circle me-1"></i> Terpercaya
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= 6. TENTANG KAMI & VISI MISI ================= -->
<section id="tentang" class="py-5 my-2 position-relative">
    <div class="container py-3">
        <div class="row g-5 align-items-center">
            <!-- Left: Image -->
            <div class="col-lg-5">
                <div class="position-relative">
                    <div class="glass-card p-2 shadow-lg overflow-hidden" style="border-radius: 24px;">
                        <img src="{{ $companyProfile->about_image ?? asset('assets/images/hero_illustration.jpg') }}" class="img-fluid rounded-4 w-100 object-fit-cover" style="max-height: 480px;" alt="Tentang Kami">
                    </div>
                    <!-- Floating Stat Badge -->
                    <div class="glass-card position-absolute bottom-0 end-0 m-3 p-3 shadow-lg d-none d-sm-flex align-items-center gap-3" style="border-radius: 16px; background: rgba(255, 255, 255, 0.95);">
                        <div class="rounded-circle bg-primary text-white p-2 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                            <i class="fa-solid fa-shield-halved fs-5"></i>
                        </div>
                        <div>
                            <div class="fw-bold text-dark fs-6">Garansi Resmi 2 Bulan</div>
                            <small class="text-muted">Pasti Aman & Bebas Cemas</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Content Summernote -->
            <div class="col-lg-7">
                <div class="section-badge">
                    <i class="fa-solid fa-building"></i> Profil Perusahaan
                </div>
                <h2 class="section-title mb-4">Solusi Pendingin Ruangan Terpercaya</h2>

                <div class="text-secondary mb-4 prose-content" style="line-height: 1.8;">
                    {!! $companyProfile->about_content ?? '<p>Penyedia jasa service AC profesional di Duren Sawit dan sekitarnya.</p>' !!}
                </div>

                <!-- Visi & Misi Card -->
                <div class="glass-card p-4 mt-4" style="background: rgba(240, 249, 255, 0.85); border: 1px solid rgba(2, 132, 199, 0.25);">
                    <div class="prose-content text-secondary" style="line-height: 1.75;">
                        {!! $companyProfile->vision_mission_content ?? '<h4>Visi & Misi</h4><p>Menjadi mitra pendingin ruangan terbaik dengan garansi pasti.</p>' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= 7. TESTIMONI PELANGGAN ================= -->
<section id="testimoni" class="py-5 position-relative" style="background: rgba(240, 249, 255, 0.7);">
    <div class="container py-3">
        <div class="text-center">
            <div class="section-badge">
                <i class="fa-solid fa-comments"></i> Testimoni
            </div>
            <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
            <p class="section-subtitle">
                Kepercayaan dan kepuasan pelanggan adalah bukti nyata standar kerja profesional dan ketulusan pelayanan teknisi kami.
            </p>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($testimonials as $testi)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="glass-card p-4 h-100 d-flex flex-column justify-content-between" style="border-radius: 20px;">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <!-- Star Rating -->
                                <div class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testi->rating)
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star text-muted"></i>
                                        @endif
                                    @endfor
                                </div>
                                <span class="badge bg-success-subtle text-success small" style="font-size: 11px;">
                                    <i class="fa-solid fa-circle-check me-1"></i> Terverifikasi
                                </span>
                            </div>
                            <p class="text-secondary mb-4" style="line-height: 1.7; font-size: 14.5px;">
                                "{{ $testi->review_text }}"
                            </p>
                        </div>

                        <div class="d-flex align-items-center gap-3 pt-3 border-top">
                            @if($testi->client_photo)
                                <img src="{{ $testi->client_photo }}" alt="{{ $testi->client_name }}" class="rounded-circle object-fit-cover shadow-sm" style="width: 48px; height: 48px; border: 2px solid #38BDF8;">
                            @else
                                <div class="rounded-circle bg-primary-subtle text-primary fw-bold d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                    {{ substr($testi->client_name, 0, 1) }}
                                </div>
                            @endif
                            <div>
                                <h6 class="fw-bold text-dark mb-0 fs-6">{{ $testi->client_name }}</h6>
                                <small class="text-muted">{{ $testi->client_role_location }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= 8. ARTIKEL TEASER & LINK HALAMAN KHUSUS ================= -->
<section id="artikel" class="py-5 my-2 position-relative">
    <div class="container py-3">
        <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-4">
            <div>
                <div class="section-badge">
                    <i class="fa-solid fa-newspaper"></i> Blog & Tips Edukasi
                </div>
                <h2 class="section-title mb-1">Tips & Panduan Perawatan AC</h2>
                <p class="text-muted mb-0">Informasi bermanfaat menjaga performa AC tetap dingin dan hemat listrik.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('articles.index') }}" class="btn btn-primary-custom d-inline-flex align-items-center gap-2">
                    <span>Lihat Semua Artikel</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">
            @foreach($articles as $art)
                <div class="col-12 col-md-6 col-lg-4">
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
                                        <i class="fa-solid fa-comments me-1"></i>{{ $art->comments->count() }}
                                    </span>
                                </div>
                                <a href="{{ route('articles.show', $art->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    Baca <i class="fa-solid fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ================= 9. LOKASI, PETA & KONTAK ================= -->
<section id="kontak" class="py-5 position-relative" style="background: rgba(240, 249, 255, 0.7);">
    <div class="container py-3">
        <div class="text-center">
            <div class="section-badge">
                <i class="fa-solid fa-location-dot"></i> Lokasi & Kontak
            </div>
            <h2 class="section-title">Kunjungi Workshop Atau Hubungi Kami</h2>
            <p class="section-subtitle">
                Teknisi kami siap dipanggil ke perumahan, ruko, apartemen, maupun gedung kantor di seluruh kawasan Duren Sawit & Jakarta Timur.
            </p>
        </div>

        <div class="row g-4 align-items-stretch">
            <!-- Left: Info Kontak -->
            <div class="col-12 col-lg-5">
                <div class="glass-card p-4 p-md-5 h-100 d-flex flex-column justify-content-between" style="border-radius: 20px;">
                    <div>
                        <h4 class="fw-bold text-dark mb-4">Informasi Operasional</h4>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-primary-subtle text-primary p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="fa-solid fa-location-dot fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Alamat Workshop</h6>
                                <p class="text-secondary small mb-0">{{ $setting->address }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-success-subtle text-success p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="fa-brands fa-whatsapp fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">WhatsApp Booking</h6>
                                <p class="text-secondary small mb-0">{{ $setting->whatsapp_number }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3 mb-4">
                            <div class="rounded-circle bg-info-subtle text-info p-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                <i class="fa-solid fa-clock fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Jam Layanan</h6>
                                <p class="text-secondary small mb-0">Senin - Minggu: 08.00 - 20.00 WIB (Buka Setiap Hari)</p>
                            </div>
                        </div>
                    </div>

                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp_number ?? '+6287869346820') }}?text={{ urlencode('Halo Admin Jasa Service AC, saya ingin konsultasi kerusakan AC saya.') }}" target="_blank" class="btn btn-whatsapp-custom w-100 d-flex align-items-center justify-content-center gap-2 py-3">
                        <i class="fa-brands fa-whatsapp fs-5"></i>
                        <span>Chat WhatsApp Sekarang</span>
                    </a>
                </div>
            </div>

            <!-- Right: Google Maps Embed -->
            <div class="col-12 col-lg-7">
                <div class="glass-card p-2 h-100 overflow-hidden shadow-sm" style="min-height: 380px; border-radius: 20px;">
                    @if($setting->google_maps_iframe)
                        <div class="w-100 h-100 rounded-3 overflow-hidden" style="min-height: 380px;">
                            {!! $setting->google_maps_iframe !!}
                        </div>
                    @else
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center text-muted rounded-3" style="min-height: 380px;">
                            <i class="fa-solid fa-map-location-dot fs-1 me-2"></i> Peta Lokasi Belum Dikonfigurasi
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    /* Full Page Hero Slider - Perfectly Vertically Centered & Bright */
    .hero-slider-section {
        min-height: calc(100vh - 78px);
        width: 100%;
        position: relative;
        overflow: hidden;
        background-color: #0c1527;
    }

    #heroCarousel,
    #heroCarousel .carousel-inner {
        min-height: calc(100vh - 78px);
        height: 100%;
    }

    #heroCarousel .carousel-item.active,
    #heroCarousel .carousel-item {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        min-height: calc(100vh - 78px) !important;
        height: 100% !important;
        position: relative;
    }

    /* Bright, crisp, high-res photo with subtle zoom animation */
    .hero-slide-img {
        opacity: 0.95;
        filter: brightness(1.04) contrast(1.02);
        transition: transform 9s ease;
    }

    .carousel-item.active .hero-slide-img {
        transform: scale(1.04);
    }

    /* Modern Frosted Scrim Overlay - Balances Image Clarity with Text Contrast */
    .hero-slide-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(11, 19, 36, 0.78) 0%, rgba(11, 19, 36, 0.50) 50%, rgba(2, 132, 199, 0.10) 100%);
        pointer-events: none;
    }

    .hero-title {
        font-size: clamp(28px, 4.2vw, 48px);
        line-height: 1.22;
        letter-spacing: -0.5px;
    }

    .hero-subtitle {
        font-size: clamp(15px, 1.8vw, 18px);
        line-height: 1.65;
        max-width: 620px;
    }

    .text-shadow-strong {
        text-shadow: 0 2px 14px rgba(0, 0, 0, 0.85);
    }

    .text-shadow-medium {
        text-shadow: 0 1px 8px rgba(0, 0, 0, 0.75);
    }

    /* Promo Banner Responsiveness - Full Width on Mobile */
    .promo-banner-box {
        width: 240px;
        min-height: 220px;
        flex-shrink: 0;
    }

    @media (max-width: 991.98px) {
        .hero-slider-section,
        #heroCarousel,
        #heroCarousel .carousel-inner,
        #heroCarousel .carousel-item.active,
        #heroCarousel .carousel-item {
            min-height: calc(100vh - 72px) !important;
        }

        .hero-slide-overlay {
            background: linear-gradient(180deg, rgba(11, 19, 36, 0.80) 0%, rgba(11, 19, 36, 0.60) 60%, rgba(2, 132, 199, 0.15) 100%);
        }
    }

    @media (max-width: 767.98px) {
        #heroCarousel .carousel-item.active,
        #heroCarousel .carousel-item {
            min-height: calc(100vh - 72px) !important;
            padding: 24px 0 45px !important;
        }

        .hero-content-box {
            background: rgba(11, 19, 36, 0.75) !important;
            padding: 20px 18px !important;
            border-radius: 18px !important;
        }

        .hero-title {
            font-size: 24px !important;
            line-height: 1.25 !important;
        }

        .hero-subtitle {
            font-size: 14px !important;
            line-height: 1.55 !important;
            margin-bottom: 20px !important;
        }

        .hero-btns {
            flex-direction: column !important;
            gap: 10px !important;
            width: 100% !important;
        }

        .hero-btns .btn {
            width: 100% !important;
        }

        .promo-banner-box {
            width: 100% !important;
            height: 220px !important;
            min-height: 220px !important;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Real-Time Search Filter for Services
    const serviceSearchInput = document.getElementById('serviceSearchInput');
    const serviceCards = document.querySelectorAll('.service-card-item');
    const noResults = document.getElementById('noServiceResults');
    const btnResetSearch = document.getElementById('btnResetSearch');

    function filterServices() {
        const query = serviceSearchInput.value.toLowerCase().trim();
        let matches = 0;

        serviceCards.forEach(card => {
            const keywords = card.getAttribute('data-keywords');
            if (keywords.includes(query)) {
                card.classList.remove('d-none');
                matches++;
            } else {
                card.classList.add('d-none');
            }
        });

        if (matches === 0) {
            noResults.classList.remove('d-none');
        } else {
            noResults.classList.add('d-none');
        }
    }

    serviceSearchInput.addEventListener('input', filterServices);

    btnResetSearch.addEventListener('click', function() {
        serviceSearchInput.value = '';
        filterServices();
    });
</script>
@endpush
