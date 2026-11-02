# Dokumen Desain UI/UX Landing Page
**Project:** Website Jasa Service AC  
**Konsep Visual:** Clean, Fresh Modernism with Subtle Glassmorphism (Pragmatic & User-Friendly)  
**Warna Dominan:** Biru Muda (*Light Blue / Sky Blue*) & Frosted White  
**Standar Ikon:** FontAwesome 6 Free (`fa-solid`, `fa-brands`, `fa-regular`)  
**Responsivitas:** 100% Responsif (Mobile, Tablet, Desktop, Wide Screen)  

---

## 1. Filosofi Desain: Subtle Glassmorphism (Bukan Gimmick AI)

Desain memadukan estetika modern **Glassmorphism** (efek kaca buram / *frosted glass*) dengan prinsip keterbacaan tinggi (*high readability*) dan kenyamanan pengguna (*user-friendly*). 

> **Prinsip Utama:** Efek kaca hanya digunakan sebagai penambah kedalaman (*depth & elevation*), **bukan** efek transparan ekstrem yang membuat teks kabur. Informasi harga, deskripsi pengerjaan, dan tombol WhatsApp tetap berstatus solid, kontras tinggi, dan langsung siap diklik oleh pelanggan.

### Karakteristik Kaca Pragmatis:
* **Frosted Surface:** `background: rgba(255, 255, 255, 0.82)` dengan `backdrop-filter: blur(12px) saturate(160%)`.
* **Delicate Border Glow:** `border: 1px solid rgba(255, 255, 255, 0.65)` dengan pantulan cahaya atas `border-top: 1px solid rgba(255, 255, 255, 0.95)`.
* **Ambient Mesh Shadow:** `box-shadow: 0 10px 30px -5px rgba(2, 132, 199, 0.10)`.
* **Sharp Contrast:** Seluruh teks menggunakan `#0F172A` (Heading) dan `#334155` (Body Text) sehingga lulus standar aksesibilitas WCAG AA (kontras > 7:1).

---

## 2. Panduan Palet Warna (Color Palette)

| Kategori Warna | Kode Hex / RGBA | Deskripsi & Penerapan |
|---|---|---|
| **Primary (Sky Blue)** | `#0284C7` / `#38BDF8` | Aksen tombol utama, garis aktif navbar, sorotan harga, icon badge. |
| **Glass Surface (Frosted)** | `rgba(255, 255, 255, 0.82)` | Kartu layanan, search bar, card ulasan, floating chat container. |
| **Glass Secondary (Ice Glass)**| `rgba(224, 242, 254, 0.55)` | Highlight badge garansi, kartu promo khusus, ambient glow. |
| **Dark Navy (Text & Footer)** | `#0F172A` / `#1E293B` | Teks judul utama (*sharp contrast*) dan footer berwibawa. |
| **Accent Gold (Rating & Badge)**| `#F59E0B` | Bintang rating testimoni dan pita penawaran khusus. |
| **Action Green (WhatsApp CTA)** | `#22C55E` / `#25D366` | Tombol pesan instan & floating widget (solid, tanpa blur agar mencolok). |
| **Neutral Body Text** | `#334155` | Paragraf penjelasan, checklist servis, ulasan pengguna. |
| **Ambient Background Glow** | `#E0F2FE` (Opacity 40%) | Lingkaran gradasi lembut di balik kartu untuk efek refraksi kaca yang elegan. |

---

## 3. Tipografi (Typography)

* **Font Utama:** `Plus Jakarta Sans` atau `Poppins` (Google Fonts).
* **Hierarki Font:**
  * **H1 (Hero Headline):** 40px - 50px (Desktop), 28px - 32px (Mobile), Weight: 700 (Bold).
  * **H2 (Section Title):** 28px - 34px (Desktop), 22px - 26px (Mobile), Weight: 700 (Bold).
  * **H3 (Card Title / Sub-section):** 18px - 22px, Weight: 600 (Semi-bold).
  * **Body Text:** 15px - 16px (Desktop), 14px (Mobile), Weight: 400 - 500, Line Height: 1.6.
  * **Badges / Price Tag:** 13px - 15px, Weight: 700.

---

## 4. Sistem Responsivitas & Breakpoints

* **Mobile (`< 768px`):** Tata letak kolom tunggal fluid, padding kaca 16px, tombol chat WhatsApp mudah dijangkau satu jempol.
* **Tablet (`768px - 1024px`):** Grid 2 kolom seimbang, drawer samping navigasi kaca.
* **Desktop (`≥ 1024px`):** Grid 3 - 4 kolom simetris, sticky navbar frosted glass penuh dengan garis bawah aktif.

---

## 5. Rincian Desain Komponen & Section

### 5.1. Header & Sticky Glass Navbar
* **Visual:** Bilah kaca melayang (*floating glass pill navbar*) saat di-scroll:
  * `background: rgba(255, 255, 255, 0.85)`
  * `backdrop-filter: blur(16px)`
  * `border: 1px solid rgba(255, 255, 255, 0.7)`
  * `box-shadow: 0 4px 25px rgba(2, 132, 199, 0.08)`
* **Navigasi Menu Ringkas:** **Beranda**, **Layanan**, **Promo**, **Keunggulan**, **Tentang**, **Artikel**, **Testimoni**, **Kontak**.
* **Indikator Aktif (Animated Underline):** Garis lengkung biru muda 3px (`#0284C7`) berpindah halus di bawah menu aktif seiring posisi scroll pengguna.
* **CTA Button Kanan:** Tombol solid biru muda `<i class="fa-solid fa-phone"></i> Hubungi Kami` (tidak dibuat transparan agar langsung menarik pandangan).
* **Versi Mobile:** Tombol hamburger `<i class="fa-solid fa-bars"></i>` yang membuka drawer panel kaca buram dari sisi kanan.

---

### 5.2. Hero Slider dengan Glass Floating Badges
* **Visual Banner:** Carousel gambar resolusi tinggi dengan pencahayaan bersih.
* **Overlay Teks:** Gradasi gelap lembut di sisi kiri agar teks headline putih terbaca tajam tanpa silau.
* **Floating Glass Pill Badges:**
  * Di atas banner, terdapat kapsul kaca melayang:  
    `<i class="fa-solid fa-certificate text-warning"></i> Garansi Resmi 2 Bulan`  
    `<i class="fa-solid fa-location-dot text-primary"></i> Khusus Area Duren Sawit & Jaktim`
* **Tombol Aksi Utama:**
  * Tombol 1 (Solid Green): `<i class="fa-brands fa-whatsapp"></i> Pesan Teknisi Sekarang`.
  * Tombol 2 (Glass Outline): `<i class="fa-solid fa-tags"></i> Cek Tarif Layanan`.

---

### 5.3. Section Keunggulan (Glass Card Grid)
* **Background:** Latar belakang putih dengan bulatan gradasi biru es halus (*ambient ice glow*) yang tampak samar di balik kaca.
* **Struktur Kartu (Grid 4 Kolom):**
  * Kartu kaca `rgba(255, 255, 255, 0.78)` dengan border tipis dan bayangan lembut.
  * Lingkaran ikon biru muda bergradasi: `fa-solid fa-certificate`, `fa-solid fa-user-check`, `fa-solid fa-screwdriver-wrench`, `fa-solid fa-clock-fast`.
  * Judul keunggulan tebal & keterangan singkat yang jelas.
  * Efek Hover: Kartu sedikit terangkat 6px dengan kilauan border atas kaca.

---

### 5.4. Layanan & Tarif (Glass Search & Pricing Cards)
* **Search Bar Kaca (Glass Capsule):**
  * Desain kapsul horizontal di tengah:
    * `background: rgba(255, 255, 255, 0.90)`
    * `border: 2px solid rgba(2, 132, 199, 0.20)`
    * `backdrop-filter: blur(8px)`
  * Ikon `<i class="fa-solid fa-magnifying-glass text-primary"></i>`.
  * Filter instan tanpa refresh untuk kata kunci (*cuci, freon, bocor, overhaul, bongkar*).
* **Tampilan Card Layanan:**
  * Header kartu: Gambar ilustrasi tajam (Cuci AC, Overhaul, Bongkar Pasang, Isi Freon, dll).
  * Badge Garansi Menempel: Kapsul kaca biru safir berlabel `<i class="fa-solid fa-certificate"></i> GARANSI 2 BULAN`.
  * Judul Layanan: Teks tebal ukuran 20px warna `#0F172A`.
  * Estimasi Biaya: Teks harga kontras biru tua (cth: *Mulai Rp 75.000*).
  * Checklist Pengerjaan: Poin rapi dengan ikon centang `<i class="fa-solid fa-circle-check text-primary"></i>`.
  * **Tombol Order WhatsApp (Solid Standout):** Tombol hijau cerah `<i class="fa-brands fa-whatsapp"></i> Pesan Layanan Ini` yang langsung memicu draft chat WhatsApp terisi otomatis.

---

### 5.5. Section Promo Menarik
* **Visual Card:** Kartu kaca dengan aksen pita merah/emas di sudut.
* **Konten:** Banner visual promo, nama diskon, masa berlaku dengan ikon `<i class="fa-solid fa-calendar-days"></i>`, dan tombol klaim via WhatsApp.

---

### 5.6. Section Statistik Pencapaian
* **Visual:** Baris kontainer biru tua navy berpadu dengan 4 kartu metrik kaca transparan (*dark glass effect*):
  * `background: rgba(255, 255, 255, 0.08)`
  * `backdrop-filter: blur(10px)`
  * `border: 1px solid rgba(255, 255, 255, 0.15)`
* **Angka Animasi:** Teks angka putih berkilau 44px dengan ikon `<i class="fa-solid fa-users"></i>`, `<i class="fa-solid fa-user-gear"></i>`, `<i class="fa-solid fa-face-smile"></i>`, `<i class="fa-solid fa-snowflake"></i>`.

---

### 5.7. Section Tentang Kami & Visi Misi
* **Layout 2 Kolom:**
  * Kiri: Foto armada teknisi dalam bingkai rounded 20px dengan ornamen bayangan kaca.
  * Kanan: Card kaca informatif berisi profil perusahaan dan visi misi terformat Summernote yang mudah dibaca dengan jarak antar baris lega.

---

### 5.8. Section Testimoni Pelanggan
* **Layout:** Carousel kartu kaca (*Glass Card Slider*).
* **Elemen Card:**
  * Ikon kutip samar di sudut kartu: `<i class="fa-solid fa-quote-left text-primary opacity-25"></i>`.
  * Deretan 5 bintang kuning menyala `<i class="fa-solid fa-star text-warning"></i>`.
  * Teks ulasan pengerjaan teknisi yang jujur.
  * Foto profil, nama pelanggan, dan keterangan domisili (cth: *Bpk. Hendra - Duren Sawit*).

---

### 5.9. Section Artikel Edukatif
* **Grid 3 Kolom Kartu Kaca:**
  * Cover gambar 16:9 dengan sudut melengkung.
  * Tanggal posting `<i class="fa-solid fa-calendar"></i>`.
  * Judul artikel & cuplikan ringkas.
  * Baris interaksi bawah: Likes `<i class="fa-solid fa-heart text-danger"></i>` dan Komentar `<i class="fa-solid fa-comments text-primary"></i>`.
* **Modal Baca Artikel (Glass Backdrop):**
  * Modal membaca dengan latar belakang backdrop buram 16px, menampilkan isi lengkap Summernote dan form kirim komentar.

---

### 5.10. Section Lokasi Google Maps & Kontak
* **Peta Responsif:** Embed peta Google Maps menyorot area Duren Sawit, Jakarta Timur.
* **Floating Glass Contact Box:** Kotak kontak melayang di atas peta dengan alamat, nomor WhatsApp, jam operasional, dan tombol petunjuk arah.

---

### 5.11. WhatsApp Floating Widget Overlay (Glass Chat Popup)
* **Floating Action Button:** Tombol bulat hijau melayang di kanan bawah dengan ikon `<i class="fa-brands fa-whatsapp fa-2xl"></i>`.
* **Popup Chat Window (Frosted Glass Container):**
  * Header: Kaca gradasi hijau-biru dengan avatar CS, status online, dan tombol tutup `<i class="fa-solid fa-xmark"></i>`.
  * Body Percakapan: Gelembung chat putih solid di atas latar kaca lembut yang menyapa ramah.
  * Tombol Pilihan Instan (Quick Pills):
    * `<i class="fa-solid fa-circle-question"></i> Info Harga Cuci AC`
    * `<i class="fa-solid fa-snowflake"></i> AC Bocor / Tidak Dingin`
    * `<i class="fa-solid fa-calendar-check"></i> Booking Teknisi Hari Ini`
  * Input Chat & Tombol Kirim: `<i class="fa-solid fa-paper-plane"></i>`.

---

### 5.12. Footer & Hidden Admin Portal
* **Visual:** Navy gelap berkelas (`#0F172A`).
* **Konten:** Logo, link navigasi cepat, layanan utama, kontak Duren Sawit, dan link sosial media:
  * `<i class="fa-brands fa-instagram"></i>`
  * `<i class="fa-brands fa-facebook-f"></i>`
  * `<i class="fa-brands fa-youtube"></i>`
  * `<i class="fa-brands fa-tiktok"></i>`
* **Akses Login Tersembunyi:** Tanda titik micro atau ikon gembok kecil tanpa label yang mengarahkan ke form login admin panel.
