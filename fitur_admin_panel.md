# Dokumen Spesifikasi Fitur Admin Panel
**Project:** Website Jasa Service AC  
**Modul:** Back-Office Content Management System (CMS)  
**Tujuan:** Pengelolaan konten landing page, moderasi artikel & komentar, serta konfigurasi identitas bisnis secara terpusat  
**Standar Ikon:** FontAwesome 6 Free (`fa-solid`, `fa-brands`, `fa-regular`)  
**Standar Tabel:** DataTables (Responsive, Pagination, Live Search & Sorting)  
**Standar Dialog & Notifikasi:** SweetAlert2 (`Swal.fire`)  

---

## 1. Modul Autentikasi & Keamanan (Authentication & Security)

### 1.1. Hidden Login Portal
* **URL Rahasia:** Alamat akses form login tidak menggunakan link standar `/login` atau `/admin`, melainkan URL kustom yang ditentukan (misal: `/auth-kelola-ac` atau `/panel-teknisi-ac`).
* **Sembunyi dari Publik:** Tidak ada tautan teks mencolok "Login Admin" pada navigasi publik landing page. Akses dibuka melalui URL langsung atau gesture/trigger tersembunyi pada footer.

### 1.2. Keamanan Sesi & Notifikasi Auth
* **Enkripsi Password:** Password disimpan menggunakan hashing modern (`bcrypt` / `Argon2`).
* **Proteksi Sesi:** Session timeout otomatis setelah masa inaktivitas (misal: 120 menit).
* **CSRF Protection:** Setiap form input wajib menyertakan token CSRF untuk mencegah serangan Cross-Site Request Forgery.
* **Integrasi SweetAlert2:**
  * Login Berhasil: SweetAlert2 Toast hijau *"Login Berhasil! Mengalihkan ke Dashboard..."*.
  * Login Gagal: SweetAlert2 modal peringatan *"Username atau password yang Anda masukkan salah!"*.
  * Logout: Konfirmasi SweetAlert2 *"Apakah Anda yakin ingin keluar dari sistem?"*.

---

## 2. Modul Dashboard

* **Ikon Menu:** `<i class="fa-solid fa-gauge"></i> Dashboard`
* **Metrik Utama (Stat Cards):**
  * Total Layanan aktif: `<i class="fa-solid fa-wrench"></i>`
  * Total Promo berjalan: `<i class="fa-solid fa-tag"></i>`
  * Total Artikel terbit: `<i class="fa-solid fa-newspaper"></i>`
  * Total Komentar masuk: `<i class="fa-solid fa-comments"></i>`
* **Mini DataTables Aktivitas:**
  * Menampilkan 5 komentar artikel terbaru dengan pencarian dan pagination DataTables mini.
  * Tombol aksi cepat: Approve / Hapus komentar langsung dengan konfirmasi SweetAlert2.
* **Aksi Cepat:**
  * Modal update instan no. WhatsApp darurat dengan notifikasi SweetAlert2.
  * Buka landing page di tab baru: `<i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Web`.

---

## 3. Modul Slider

* **Ikon Menu:** `<i class="fa-solid fa-images"></i> Slider`
* **Integrasi DataTables:**
  * Menampilkan daftar banner slider dalam format DataTables responsif.
  * Fitur: Pencarian judul slide, filter status, pengurutan, dan paging.
* **Fitur CRUD Penuh:**
  * **Tambah Slider:** Form modal upload gambar, judul, deskripsi, CTA, dan link.
  * **Edit Slider:** Update data dan gambar slide.
  * **Hapus Slider:** Wajib melalui konfirmasi SweetAlert2 (`Swal.fire` warning) sebelum data dihapus permanen.
  * **Toggle Status:** Ubah aktif/non-aktif dengan feedback SweetAlert2 Toast.
* **Notifikasi Sistem:** SweetAlert2 Toast muncul setiap kali operasi simpan/update/hapus berhasil.

---

## 4. Modul Layanan

* **Ikon Menu:** `<i class="fa-solid fa-wrench"></i> Layanan`
* **Integrasi DataTables:**
  * Tabel seluruh layanan AC dikelola penuh dengan DataTables responsif.
  * Fitur: Search box real-time (*Cuci, Overhaul, Freon, Bongkar Pasang*), sorting harga, dan pagination.
* **Daftar Layanan Standar:**
  1. Servis AC Berkala
  2. Cuci AC Rutin
  3. Overhaul (Cuci Besar)
  4. Bongkar / Pasang AC
  5. Perbaikan Kebocoran
  6. Vacum & Flushing
  7. Isi & Tambah Freon (R22/R32/R410A)
* **Atribut Data Layanan:**
  * Foto / Ikon pengerjaan.
  * Nama Layanan & Range Tarif (cth: *Mulai Rp 75.000*).
  * Badge Garansi: `<i class="fa-solid fa-certificate"></i> GARANSI 2 BULAN` (default: Aktif).
  * Deskripsi pengerjaan.
  * Draft teks pesan WhatsApp otomatis.
* **Integrasi SweetAlert2:**
  * Konfirmasi Hapus: SweetAlert2 modal merah *"Apakah Anda yakin ingin menghapus layanan ini?"*.
  * Notifikasi Sukses: SweetAlert2 Toast hijau setelah penambahan / pembaruan tarif.

---

## 5. Modul Promo

* **Ikon Menu:** `<i class="fa-solid fa-tag"></i> Promo`
* **Integrasi DataTables:**
  * Tabel promo menggunakan DataTables dengan preview cover, periode tanggal, dan status.
* **Fitur CRUD Promo:**
  * Upload poster banner promo, judul penawaran, syarat & ketentuan, dan masa berlaku.
  * Konfirmasi Hapus Data via SweetAlert2.
  * Feedback SweetAlert2 Toast saat data promo tersimpan.

---

## 6. Modul Keunggulan

* **Ikon Menu:** `<i class="fa-solid fa-shield-halved"></i> Keunggulan`
* **Integrasi DataTables:**
  * Tabel keunggulan (Garansi 2 Bulan, Teknisi Berpengalaman, dll) dikelola via DataTables dengan opsi sorting urutan.
* **Fitur CRUD:**
  * Pemilihan kelas ikon FontAwesome (`fa-solid fa-certificate`, `fa-solid fa-screwdriver-wrench`, dll).
  * Konfirmasi SweetAlert2 saat menghapus item keunggulan.
  * Notifikasi sukses SweetAlert2 saat data diperbarui.

---

## 7. Modul Tentang & Visi

* **Ikon Menu:** `<i class="fa-solid fa-building"></i> Tentang & Visi`
* **Tab 1 - Profil Tentang Kami:**
  * Upload foto profil armada teknisi di Duren Sawit.
  * Summernote Rich Text Editor: Mengelola deskripsi profil, standar pengerjaan higienis, dan SOP kerja.
* **Tab 2 - Visi & Misi:**
  * Summernote Rich Text Editor: Mengelola butir visi dan misi perusahaan bergaransi 2 bulan.
* **Integrasi SweetAlert2:**
  * Tombol Simpan memicu SweetAlert2 Toast sukses *"Profil dan Visi Misi berhasil diperbarui!"*.

---

## 8. Modul Statistik

* **Ikon Menu:** `<i class="fa-solid fa-chart-line"></i> Statistik`
* **Pengaturan Angka Metrik Dinamis:**
  * Total Pelanggan: Nilai (`5000+`) & Label.
  * Teknisi Profesional: Nilai (`20+`) & Label.
  * Tingkat Kepuasan: Nilai (`99.2%`) & Label.
  * Unit AC Ditangani: Nilai (`12000+`) & Label.
* **Integrasi SweetAlert2:**
  * Notifikasi SweetAlert2 Toast sukses saat angka statistik disimpan.

---

## 9. Modul Testimoni

* **Ikon Menu:** `<i class="fa-solid fa-star"></i> Testimoni`
* **Integrasi DataTables:**
  * Tabel ulasan pelanggan menggunakan DataTables lengkap dengan filter pencarian nama atau rating bintang.
* **Fitur CRUD Testimoni:**
  * Upload foto pelanggan, nama & domisili, rating bintang 1 - 5, dan teks ulasan.
  * **Hapus Testimoni:** Dialog konfirmasi SweetAlert2 peringatan sebelum data dihapus.
  * **Notifikasi Sukses:** SweetAlert2 Toast saat testimoni baru berhasil ditambahkan.

---

## 10. Modul Artikel

* **Ikon Menu:** `<i class="fa-solid fa-newspaper"></i> Artikel`
* **Integrasi DataTables:**
  * Tabel daftar artikel menggunakan DataTables dengan pencarian cepat, sortir tanggal, dan jumlah like/komentar.
* **Fitur CRUD Artikel:**
  * Judul artikel, upload thumbnail cover, excerpt ringkas, dan konten lengkap via Summernote WYSIWYG.
  * Konfirmasi SweetAlert2 saat menghapus artikel (otomatis menghapus file gambar fisik dari server).
  * Notifikasi SweetAlert2 Toast saat artikel dipublikasikan atau disimpan sebagai draft.

---

## 11. Modul Komentar

* **Ikon Menu:** `<i class="fa-solid fa-comments"></i> Komentar`
* **Integrasi DataTables:**
  * Tabel komentar pengunjung artikel menggunakan DataTables dengan pencarian pengirim, filter per artikel, dan tanggal.
* **Aksi Moderasi dengan SweetAlert2:**
  * **Hapus Komentar:** Mengklik tombol hapus merah memicu dialog konfirmasi `Swal.fire`:
    ```javascript
    Swal.fire({
      title: 'Hapus Komentar?',
      text: 'Komentar spam atau tidak pantas ini akan dihapus permanen!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#EF4444',
      cancelButtonColor: '#64748B',
      confirmButtonText: '<i class="fa-solid fa-trash"></i> Ya, Hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        // Eksekusi AJAX hapus komentar
        Swal.fire('Terhapus!', 'Komentar berhasil dihapus.', 'success');
      }
    });
    ```
  * **Toggle Status (Tampilkan / Sembunyikan):** Perubahan status diiringi SweetAlert2 Toast konfirmasi instan.

---

## 12. Modul Pengaturan

* **Ikon Menu:** `<i class="fa-solid fa-gear"></i> Pengaturan`
* **12.1. Identitas & Logo:**
  * Nama Website / Brand.
  * Upload Logo Website (otomatis update navbar atas dan footer).
  * Upload Favicon (.ico / .png).
* **12.2. Kontak & Alamat:**
  * Nomor WhatsApp Utama: `<i class="fa-brands fa-whatsapp"></i> +6287869346820`.
  * Nomor Telepon: `<i class="fa-solid fa-phone"></i>`.
  * Alamat Lengkap: `<i class="fa-solid fa-location-dot"></i> Duren Sawit, Kec. Duren Sawit, Kota Jakarta Timur, DKI Jakarta`.
* **12.3. Peta Lokasi:**
  * Input kode iframe embed Google Maps.
* **12.4. Integrasi Media Sosial:**
  * Instagram: `<i class="fa-brands fa-instagram"></i>`
  * Facebook: `<i class="fa-brands fa-facebook-f"></i>`
  * YouTube: `<i class="fa-brands fa-youtube"></i>`
  * TikTok: `<i class="fa-brands fa-tiktok"></i>`
* **Integrasi SweetAlert2:**
  * Tombol Simpan memicu SweetAlert2 modal/toast sukses *"Pengaturan website berhasil diperbarui!"*.

---

## 13. Struktur Entitas Basis Data (Database Schema Blueprint)

1. `users / admins`: `id, username, email, password, full_name, avatar, created_at, updated_at`
2. `settings`: `id, site_name, site_logo, site_favicon, whatsapp_number, phone_number, address, google_maps_iframe, instagram_url, facebook_url, youtube_url, tiktok_url, updated_at`
3. `sliders`: `id, image_path, title, subtitle, cta_text, cta_link, sort_order, is_active, created_at`
4. `services`: `id, name, price_range, description, image_path, has_warranty, sort_order, is_active, created_at`
5. `promos`: `id, title, description, image_path, start_date, end_date, is_active, created_at`
6. `advantages`: `id, title, description, icon_class, sort_order, is_active, created_at`
7. `company_profiles`: `id, about_image, about_content, vision_mission_content, updated_at`
8. `statistics`: `id, stat_key, stat_value, stat_label, sort_order, updated_at`
9. `testimonials`: `id, client_name, client_role_location, client_photo, rating, review_text, is_active, created_at`
10. `articles`: `id, title, slug, excerpt, content, cover_image, likes_count, views_count, created_at, updated_at`
11. `comments`: `id, article_id, author_name, author_email, comment_text, is_approved, created_at`
