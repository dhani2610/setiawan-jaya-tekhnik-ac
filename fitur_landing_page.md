# Dokumen Spesifikasi Fitur Landing Page
**Project:** Website Jasa Service AC  
**Lokasi Layanan:** Duren Sawit, Kec. Duren Sawit, Kota Jakarta Timur, DKI Jakarta  
**Kontak WhatsApp:** +62 878-6934-6820  
**Garansi:** 2 Bulan  
**Standar Ikon:** FontAwesome 6 Free (`fa-solid`, `fa-brands`, `fa-regular`)  
**Skema Halaman:** Single Page Application (SPA / One Page Scroll) dengan Smooth Scrolling  

---

## 1. Ringkasan & Arsitektur Landing Page

Landing page dirancang khusus untuk meningkatkan konversi pelanggan jasa service AC rumahan, kantor, dan komersial di area Jakarta Timur dan sekitarnya. Seluruh navigasi mengarah ke anchor section pada halaman yang sama dengan transisi halus (*smooth scroll*), dilengkapi indikator menu aktif (*active indicator underline*).

Akses ke Admin Panel sengaja disembunyikan (*hidden login route*, misal: `/auth-kelola-ac` atau titik micro pada footer) agar menjaga tampilan publik tetap bersih dan profesional.

---

## 2. Rincian Fitur Per Section

### 2.1. Topbar & Header Navigasi (Sticky Navbar)
* **Logo & Brand Identity:** Menampilkan logo perusahaan dan nama website dinamis (dapat diubah melalui Admin CMS).
* **Navigasi Single Page (Label Ringkas):**
  * Beranda (`#hero`)
  * Layanan (`#layanan`)
  * Promo (`#promo`)
  * Keunggulan (`#keunggulan`)
  * Tentang (`#tentang`)
  * Artikel (`#artikel`)
  * Testimoni (`#testimoni`)
  * Kontak (`#kontak`)
* **Active State & Animated Underline:** Menu aktif berpindah otomatis berdasarkan posisi scroll pengguna (*scrollspy*) dengan animasi garis bawah warna biru muda (*sky blue*).
* **CTA Button Kanan:** Tombol mencolok berlabel `<i class="fa-solid fa-phone"></i> Hubungi Kami` yang langsung memicu popup WhatsApp / scroll ke kontak.
* **Responsive Mobile Menu:** Tombol burger `<i class="fa-solid fa-bars"></i>` yang membuka drawer menu di perangkat tablet dan mobile.

---

### 2.2. Hero Slider (CMS Driven)
* **Slider/Carousel Interaktif:** Mendukung multi-slide gambar beresolusi tinggi dengan kompresi WebP.
* **Konten Teks Dinamis:** Tiap slide memiliki:
  * Headline / Judul Utama (misal: *"Jasa Service AC Terpercaya & Bergaransi 2 Bulan"*).
  * Subheadline / Deskripsi Singkat.
  * Tombol CTA langsung: `<i class="fa-brands fa-whatsapp"></i> Hubungi Kami` dengan tautan fleksibel.
* **Navigasi Slider:** Navigasi panah kiri `<i class="fa-solid fa-chevron-left"></i>` dan kanan `<i class="fa-solid fa-chevron-right"></i>`, serta pagination dot.

---

### 2.3. Keunggulan & Mengapa Memilih Kami
* **Poin Keunggulan Utama (dengan Ikon FontAwesome):**
  * `<i class="fa-solid fa-certificate"></i> Garansi Resmi 2 Bulan`: Jaminan pengerjaan dan pergantian komponen.
  * `<i class="fa-solid fa-user-check"></i> Teknisi Profesional`: Personel berpengalaman, ramah, dan berseragam rapi.
  * `<i class="fa-solid fa-hand-holding-dollar"></i> Harga Transparan`: Tanpa biaya tersembunyi.
  * `<i class="fa-solid fa-screwdriver-wrench"></i> Peralatan Standar`: Jet cleaner tekanan tinggi, manifold gauge presisi, pompa vakum & tabung nitrogen.
  * `<i class="fa-solid fa-bolt"></i> Respon Cepat`: Jangkauan area Duren Sawit & Jakarta Timur siap tanggap.
* **Layout:** Grid kartu interaktif dengan efek hover halus.

---

### 2.4. Layanan & Tarif (Interactive Pricing Cards)
* **Fitur Pencarian Real-Time (Search Bar):**
  * Input pencarian dengan ikon `<i class="fa-solid fa-magnifying-glass"></i>`.
  * Pengunjung mengetik kata kunci (*cuci, freon, bocor, overhaul*) dan kartu layanan terfilter instan di sisi klien.
* **Daftar Layanan Tersedia:**
  1. **Servis AC Berkala:** Perawatan preventif, cek tekanan freon, arus listrik, dan kinerja kompresor.
  2. **Cuci AC Rutin:** Pembersihan filter, evaporator indoor, kondensor outdoor, dan talang pembuangan.
  3. **Overhaul (Cuci Besar):** Penurunan unit indoor/outdoor untuk pembersihan menyeluruh kerak dan lumut tebal.
  4. **Bongkar / Pasang AC:** Bongkar unit lama, pasang unit baru, dan perapihan instalasi pipa.
  5. **Perbaikan Kebocoran:** Pengelasan evaporator/kondensor bocor, ganti nepel, dan perbaikan pembuangan air.
  6. **Vacum & Flushing:** Pengosongan udara dan pembersihan residu oli pipa menggunakan pompa vakum & nitrogen.
  7. **Isi & Tambah Freon:** Freon standar R22, R32, R410A sesuai spek unit AC.
* **Badge Garansi:** Label mencolok `<i class="fa-solid fa-certificate"></i> GARANSI 2 BULAN` pada setiap card.
* **Format Card:**
  * Foto ilustrasi pengerjaan.
  * Nama layanan.
  * Estimasi harga (misal: *Rp 75.000 - Rp 150.000*).
  * Deskripsi pengerjaan.
  * **Tombol Pesan:** `<i class="fa-brands fa-whatsapp"></i> Pesan via WhatsApp` yang otomatis membuka chat dengan draft teks pemesanan.

---

### 2.5. Promo Menarik
* Menampilkan penawaran spesial dan diskon dari CMS Admin.
* **Struktur Card Promo:**
  * Banner Promo.
  * Judul Promo (misal: *"Paket Cuci 3 Unit AC Hemat 20%"*).
  * Deskripsi ringkas syarat dan ketentuan.
  * Tombol klaim: `<i class="fa-brands fa-whatsapp"></i> Klaim Promo`.

---

### 2.6. Statistik & Pencapaian (Animated Counter)
* Efek hitung angka maju saat section masuk ke viewport:
  * Total Pelanggan: `<i class="fa-solid fa-users"></i> 5.000+ Rumah & Kantor`
  * Teknisi Profesional: `<i class="fa-solid fa-user-gear"></i> 20+ Personel`
  * Tingkat Kepuasan: `<i class="fa-solid fa-face-smile"></i> 99.2% Puas`
  * Unit AC Ditangani: `<i class="fa-solid fa-snowflake"></i> 12.000+ Unit`

---

### 2.7. Tentang Kami & Visi Misi
* **Tentang Kami:**
  * Foto profil armada teknisi di Duren Sawit.
  * Konten profil terformat dari Summernote (latar belakang, komitmen, standar kebersihan).
* **Visi & Misi:**
  * Blok visi dan misi terformat Summernote dari admin panel.
  * Penekanan pada komitmen higienis, hemat listrik, pendinginan optimal, dan garansi 2 bulan.

---

### 2.8. Testimoni ("Apa Kata Pelanggan Kami")
* Slider / Grid ulasan nyata pelanggan.
* **Detail Card:**
  * Foto pelanggan / inisial avatar.
  * Nama & Domisili (misal: *Ibu Sarah - Duren Sawit, Jakarta Timur*).
  * Rating bintang: Deretan 5 ikon `<i class="fa-solid fa-star text-warning"></i>`.
  * Teks ulasan pengerjaan teknisi.

---

### 2.9. Artikel Edukasi
* Artikel tips perawatan AC, tanda freon habis, cara efisiensi daya listrik.
* **Data Card Artikel:**
  * Cover gambar thumbnail.
  * Judul & Tanggal.
  * Cuplikan teks (excerpt).
  * Indikator Like: `<i class="fa-solid fa-heart text-danger"></i>`
  * Indikator Komentar: `<i class="fa-solid fa-comments text-primary"></i>`
* **Modal / Tampilan Baca Lengkap:**
  * Isi artikel penuh format Summernote.
  * Tombol interaktif Like: `<i class="fa-solid fa-heart"></i> Like`.
  * Form komentar publik: Nama, Email, Pesan.
  * Daftar komentar pengunjung (dapat dimoderasi atau dihapus admin).

---

### 2.10. Lokasi & Google Maps
* **Embed Google Maps:** Menampilkan titik lokasi operasional:  
  *Duren Sawit, Kec. Duren Sawit, Kota Jakarta Timur, DKI Jakarta*.
* **Kotak Kontak:**
  * Alamat: `<i class="fa-solid fa-location-dot"></i> Duren Sawit, Jakarta Timur`
  * WhatsApp / Telp: `<i class="fa-solid fa-phone"></i> +62 878-6934-6820`
  * Jam Kerja: `<i class="fa-solid fa-clock"></i> Setiap Hari: 08.00 - 20.00 WIB`

---

### 2.11. WhatsApp Floating Widget Overlay
* **Floating Action Button (FAB):** Tombol hijau/biru melayang di kanan bawah dengan ikon `<i class="fa-brands fa-whatsapp fa-2xl"></i>`.
* **Popup Box Chat Interaktif:**
  * Header CS Online dengan status aktif.
  * Pesan sambutan ramah.
  * Pilihan cepat (Quick Options):
    * `<i class="fa-solid fa-circle-question"></i> Info Harga Cuci AC`
    * `<i class="fa-solid fa-triangle-exclamation"></i> AC Bocor / Kurang Dingin`
    * `<i class="fa-solid fa-calendar-check"></i> Booking Teknisi`
  * Form pesan kustom + Tombol kirim: `<i class="fa-solid fa-paper-plane"></i> Kirim`.

---

### 2.12. Footer
* Logo & Deskripsi Singkat Usaha.
* Tautan Navigasi Cepat (Single page anchors).
* Daftar Layanan Utama.
* Tautan Media Sosial:
  * Instagram: `<i class="fa-brands fa-instagram"></i>`
  * Facebook: `<i class="fa-brands fa-facebook-f"></i>`
  * YouTube: `<i class="fa-brands fa-youtube"></i>`
  * TikTok: `<i class="fa-brands fa-tiktok"></i>`
* Copyright & Hak Cipta.
* **Akses Login Admin Tersembunyi:** Tanda titik atau ikon gembok mikro tanpa label yang mengarahkan ke form login admin.
