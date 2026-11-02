@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('breadcrumb', 'Pengaturan Website & Identitas')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white py-3">
        <h6 class="card-title mb-0 d-flex align-items-center gap-2">
            <i class="fa-solid fa-gear text-primary"></i>
            <span>Pengaturan Identitas Website, Logo & Kontak</span>
        </h6>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <!-- Identitas & Logo -->
                <div class="col-lg-6">
                    <div class="card bg-light border p-4 h-100">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-paintbrush text-primary"></i>
                            <span>Identitas & Branding</span>
                        </h6>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Website / Brand <span class="text-danger">*</span></label>
                            <input type="text" name="site_name" class="form-control" value="{{ $setting->site_name }}" required>
                            <small class="text-muted">Tampil di Navbar, Footer, dan Title Browser</small>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold">Logo Website</label>
                                @if($setting->site_logo)
                                    <div class="mb-2">
                                        <img src="{{ $setting->site_logo }}" alt="Logo" class="img-thumbnail" style="height: 60px; object-fit: contain;">
                                    </div>
                                @endif
                                <input type="file" name="site_logo" class="form-control" accept="image/*">
                                <small class="text-muted">Logo Navbar & Footer</small>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold">Favicon Browser</label>
                                @if($setting->site_favicon)
                                    <div class="mb-2">
                                        <img src="{{ $setting->site_favicon }}" alt="Favicon" class="img-thumbnail" style="width: 40px; height: 40px; object-fit: contain;">
                                    </div>
                                @endif
                                <input type="file" name="site_favicon" class="form-control" accept="image/*,.ico">
                                <small class="text-muted">Ikon tab browser (.ico/.png)</small>
                            </div>
                        </div>

                        <hr class="my-3">

                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-share-nodes text-primary"></i>
                            <span>Tautan Media Sosial</span>
                        </h6>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold">Instagram URL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-danger"><i class="fa-brands fa-instagram"></i></span>
                                <input type="url" name="instagram_url" class="form-control" value="{{ $setting->instagram_url }}" placeholder="https://instagram.com/...">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold">Facebook URL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-primary"><i class="fa-brands fa-facebook-f"></i></span>
                                <input type="url" name="facebook_url" class="form-control" value="{{ $setting->facebook_url }}" placeholder="https://facebook.com/...">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold">YouTube URL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-danger"><i class="fa-brands fa-youtube"></i></span>
                                <input type="url" name="youtube_url" class="form-control" value="{{ $setting->youtube_url }}" placeholder="https://youtube.com/@...">
                            </div>
                        </div>

                        <div class="mb-2">
                            <label class="form-label small fw-semibold">TikTok URL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white text-dark"><i class="fa-brands fa-tiktok"></i></span>
                                <input type="url" name="tiktok_url" class="form-control" value="{{ $setting->tiktok_url }}" placeholder="https://tiktok.com/@...">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kontak & Maps -->
                <div class="col-lg-6">
                    <div class="card bg-light border p-4 h-100">
                        <h6 class="fw-bold text-dark mb-3 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-address-book text-primary"></i>
                            <span>Kontak & Lokasi Kantor</span>
                        </h6>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold">Nomor WhatsApp Utama <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-success"><i class="fa-brands fa-whatsapp"></i></span>
                                    <input type="text" name="whatsapp_number" class="form-control" value="{{ $setting->whatsapp_number }}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label fw-semibold">Nomor Telepon Hotline <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-primary"><i class="fa-solid fa-phone"></i></span>
                                    <input type="text" name="phone_number" class="form-control" value="{{ $setting->phone_number }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Alamat Lengkap Workshop / Kantor <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" rows="2" required>{{ $setting->address }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kode Embed Google Maps (iframe)</label>
                            <textarea name="google_maps_iframe" class="form-control font-monospace" style="font-size: 12px;" rows="4" placeholder='<iframe src="https://www.google.com/maps/embed?..." ...></iframe>'>{{ $setting->google_maps_iframe }}</textarea>
                            <small class="text-muted">Tempelkan seluruh tag iframe dari Google Maps.</small>
                        </div>

                        @if($setting->google_maps_iframe)
                            <div class="mb-2">
                                <label class="form-label small fw-semibold">Pratinjau Peta Saat Ini:</label>
                                <div class="ratio ratio-16x9 rounded overflow-hidden border shadow-sm">
                                    {!! $setting->google_maps_iframe !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="pt-4 mt-4 border-top d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Pengaturan Website</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

