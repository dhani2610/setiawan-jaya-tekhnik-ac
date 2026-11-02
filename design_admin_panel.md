# Dokumen Desain UI/UX Admin Panel
**Project:** Website Jasa Service AC  
**Tipe Aplikasi:** Back-office Content Management System (CMS)  
**Karakter Visual:** Modern Dashboard, Clean, Ergonomis, Berorientasi Produktivitas  
**Aksen Warna:** Biru Muda (*Sky Blue*) & Slate Navy  
**Icon Pack:** FontAwesome 6 Free (`fa-solid`, `fa-brands`, `fa-regular`)  
**Library Tabel:** DataTables (Responsive, Client & Server-side Ready)  
**Library Alert & Notifikasi:** SweetAlert2 (`Swal.fire`)  
**Responsivitas:** 100% Responsif (Desktop, Laptop, Tablet, Smartphone)  

---

## 1. Konsep & Standar Interaksi Sistem

Admin Panel dirancang khusus untuk memudahkan pengelola bisnis jasa service AC mengontrol seluruh konten landing page secara mandiri tanpa menyentuh kode program. Desain mengadopsi standar dasbor modern dengan tata letak modular, tipografi bersih, dan kontras warna yang nyaman untuk mata saat bekerja lama.

* **Mode Akses:** Tersembunyi dari publik (*hidden login page*).
* **Navigasi Utama:** Sidebar vertikal sebelah kiri yang fleksibel (dapat di-minimize pada layar besar dan berubah menjadi offcanvas drawer pada layar tablet/ponsel).
* **Standar Ikon:** Menggunakan FontAwesome 6 secara konsisten di seluruh sidebar, tombol aksi, badge, dan modal.
* **Standar Tabel (DataTables):** Seluruh tampilan data berbasis tabel (Slider, Layanan, Promo, Keunggulan, Testimoni, Artikel, Komentar) **wajib menggunakan DataTables** dengan fitur pencarian real-time, pengurutan kolom, pagination, dan responsif seluler.
* **Standar Notifikasi & Konfirmasi (SweetAlert2):** Semua aksi sistem (tambah data, update data, hapus data, ubah status) menggunakan dialog interaktif `Swal.fire`.

---

## 2. Palet Warna Admin Panel (Color Scheme)

| Peran | Hex Code | Penggunaan |
|---|---|---|
| **Sidebar Background** | `#0F172A` / `#1E293B` | Navy gelap berkelas untuk kontras menu dan navigasi. |
| **Sidebar Menu Active** | `#0284C7` (Sky Blue) | Background menu yang sedang aktif dengan teks putih. |
| **Main Content Background**| `#F8FAFC` | Latar belakang area kerja yang sejuk dan bersih. |
| **Card / Surface** | `#FFFFFF` | Kontainer data table, form input, dan widget metrik. |
| **Primary Accent** | `#0284C7` | Tombol simpan, badge utama, pagination aktif. |
| **Success Accent** | `#10B981` | Status aktif, tombol tambah data baru, notifikasi sukses SweetAlert2. |
| **Warning Accent** | `#F59E0B` | Tombol edit data, dialog konfirmasi peringatan SweetAlert2. |
| **Danger Accent** | `#EF4444` | Tombol hapus data, confirm button dialog SweetAlert2. |
| **Text Primary** | `#0F172A` | Judul halaman, label tabel, angka statistik. |
| **Text Muted** | `#64748B` | Sub-label, placeholder, timestamp riwayat. |

---

## 3. Standar Komponen DataTables & SweetAlert2

### 3.1. Spesifikasi Standar DataTables
Seluruh tabel di Admin Panel dikonfigurasi dengan standar visual DataTables modern:
* **Fitur Utama DataTables:**
  * **Search Box:** Pencarian instan per kata kunci dengan ikon `<i class="fa-solid fa-magnifying-glass"></i>` dan placeholder *"Cari data..."*.
  * **Entries Selector:** Pilihan tampilan data (10, 25, 50, 100 baris per halaman).
  * **Sorting Kolom:** Indikator urutan naik/turun (`fa-sort`, `fa-sort-up`, `fa-sort-down`) pada header kolom.
  * **Pagination Styling:** Tombol nomor halaman bernuansa biru muda (`#0284C7`) dengan efek hover lembut.
  * **Info Status:** Teks informasi baris (cth: *"Menampilkan 1 sampai 10 dari 25 data"*).
  * **Responsif:** Kolom otomatis menyusut atau membentuk child-row accordion pada layar ponsel/tablet (*DataTables Responsive Extension*).
  * **Empty State:** Desain khusus saat data kosong dengan ikon `<i class="fa-solid fa-box-open"></i>` dan pesan *"Belum ada data tersedia"*.

### 3.2. Spesifikasi Standar SweetAlert2 (`Swal.fire`)
Seluruh notifikasi dan aksi dialog menggunakan SweetAlert2 dengan styling seragam:

1. **Dialog Konfirmasi Hapus Data (Delete Confirmation):**
```javascript
Swal.fire({
  title: 'Apakah Anda yakin?',
  text: 'Data yang dihapus tidak dapat dipulihkan kembali!',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#EF4444',
  cancelButtonColor: '#64748B',
  confirmButtonText: '<i class="fa-solid fa-trash"></i> Ya, Hapus!',
  cancelButtonText: '<i class="fa-solid fa-xmark"></i> Batal',
  reverseButtons: true,
  customClass: {
    popup: 'rounded-4 shadow-lg',
    confirmButton: 'btn btn-danger px-4',
    cancelButton: 'btn btn-secondary px-4'
  }
}).then((result) => {
  if (result.isConfirmed) {
    // Eksekusi proses hapus data via AJAX / Form Submit
  }
});
```

2. **Toast Notifikasi Sukses (Action Success Toast):**
```javascript
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true
});

Toast.fire({
  icon: 'success',
  title: 'Data berhasil disimpan!'
});
```

3. **Notifikasi Gagal / Error Validasi:**
```javascript
Swal.fire({
  icon: 'error',
  title: 'Gagal Menyimpan!',
  text: 'Harap periksa kembali field input yang wajib diisi.',
  confirmButtonColor: '#0284C7'
});
```

4. **Konfirmasi Ubah Status / Toggle:**
```javascript
Swal.fire({
  title: 'Ubah Status Data?',
  text: 'Status tampilan di landing page akan diperbarui.',
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#0284C7',
  cancelButtonColor: '#64748B',
  confirmButtonText: '<i class="fa-solid fa-check"></i> Ya, Perbarui!',
  cancelButtonText: 'Batal'
});
```

---

## 4. Struktur Layout & Navigasi Sidebar

```
+-------------------------------------------------------------------------------------------------+
|  [Logo & Brand]  | Topbar: [fa-bars] [Breadcrumb]             [fa-arrow-up-right Web] [Avatar]  |
+------------------+------------------------------------------------------------------------------+
|  fa-gauge        |                                                                              |
|  Dashboard       |                                                                              |
|  fa-images       |                                                                              |
|  Slider          |                                                                              |
|  fa-wrench       |                                                                              |
|  Layanan         |                                                                              |
|  fa-tag          |                                                                              |
|  Promo           |                                                                              |
|  fa-shield-halved|                                                                              |
|  Keunggulan      |                              AREA KONTEN UTAMA                               |
|  fa-building     |                   (Cards, DataTables, Summernote Form, dll)                  |
|  Tentang & Visi  |                                                                              |
|  fa-chart-line   |                                                                              |
|  Statistik       |                                                                              |
|  fa-star         |                                                                              |
|  Testimoni       |                                                                              |
|  fa-newspaper    |                                                                              |
|  Artikel         |                                                                              |
|  fa-comments     |                                                                              |
|  Komentar        |                                                                              |
|  fa-gear         |                                                                              |
|  Pengaturan      |                                                                              |
|  fa-power-off    |                                                                              |
|  Keluar          |                                                                              |
+------------------+------------------------------------------------------------------------------+
```

---

## 5. Desain Komponen Utama

### 5.1. Sidebar Navigasi Responsif
* **Desktop (`≥ 1024px`):** Lebar tetap 260px. Terdapat toggle mini-sidebar (lebar 70px, hanya ikon FontAwesome dengan tooltip).
* **Tablet & Mobile (`< 1024px`):** Sidebar tersembunyi secara default. Saat ikon `<i class="fa-solid fa-bars"></i>` di topbar ditekan, sidebar muncul meluncur dari sisi kiri (*smooth offcanvas slide*) disertai *backdrop overlay*.
* **Daftar Menu Sidebar Ringkas:**
  1. `<i class="fa-solid fa-gauge"></i> Dashboard`
  2. `<i class="fa-solid fa-images"></i> Slider`
  3. `<i class="fa-solid fa-wrench"></i> Layanan`
  4. `<i class="fa-solid fa-tag"></i> Promo`
  5. `<i class="fa-solid fa-shield-halved"></i> Keunggulan`
  6. `<i class="fa-solid fa-building"></i> Tentang & Visi`
  7. `<i class="fa-solid fa-chart-line"></i> Statistik`
  8. `<i class="fa-solid fa-star"></i> Testimoni`
  9. `<i class="fa-solid fa-newspaper"></i> Artikel`
  10. `<i class="fa-solid fa-comments"></i> Komentar`
  11. `<i class="fa-solid fa-gear"></i> Pengaturan`
  12. `<i class="fa-solid fa-right-from-bracket text-danger"></i> Keluar`

---

### 5.2. Topbar Navigasi
* **Tinggi:** 64px dengan background putih dan border bawah tipis (`#E2E8F0`).
* **Fitur Topbar:**
  * Tombol Toggle Sidebar: `<i class="fa-solid fa-bars"></i>`
  * Breadcrumb navigasi (misal: *Dashboard / Artikel / Edit*).
  * Tombol Pratinjau: `<i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Web` (membuka landing page di tab baru).
  * Profil Dropdown: Avatar, Nama Admin, tautan profil `<i class="fa-solid fa-user-gear"></i>`, dan logout dengan konfirmasi SweetAlert2.

---

## 6. Rincian Desain Antarmuka Per Halaman

### 6.1. Halaman Login (Hidden Auth Portal)
* **Desain:** Tampilan minimalis terpusat (*centered card*) berlatar gradasi biru muda lembut ke putih.
* **Elemen:**
  * Logo Service AC dengan teks judul "Administrator".
  * Input Username / Email dengan ikon `<i class="fa-solid fa-envelope"></i>`.
  * Input Password dengan ikon `<i class="fa-solid fa-lock"></i>` dan toggle mata `<i class="fa-solid fa-eye"></i>` / `<i class="fa-solid fa-eye-slash"></i>`.
  * Tombol Login: `<i class="fa-solid fa-right-to-bracket"></i> Masuk`.
  * Feedback Login: SweetAlert2 Toast saat login berhasil / error alert saat password salah.

---

### 6.2. Halaman Dashboard
* **Baris Widget Statistik (4 Metrik Card):**
  1. Layanan Aktif: `<i class="fa-solid fa-wrench"></i>` (Aksen Biru Muda `#0284C7`).
  2. Promo Berjalan: `<i class="fa-solid fa-tag"></i>` (Aksen Oranye `#F59E0B`).
  3. Total Artikel: `<i class="fa-solid fa-newspaper"></i>` (Aksen Hijau `#10B981`).
  4. Komentar Masuk: `<i class="fa-solid fa-comments"></i>` (Aksen Ungu `#8B5CF6`).
* **Tabel Aktivitas Terbaru (DataTables):**
  * Mini DataTables untuk 5 komentar artikel terbaru.
  * Dilengkapi tombol aksi langsung moderasi: Approve `<i class="fa-solid fa-check"></i>` atau Hapus `<i class="fa-solid fa-trash"></i>` dengan konfirmasi SweetAlert2.

---

### 6.3. Halaman Slider (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tambah Slider` (membuka modal form).
* **Tabel Slider (DataTables):**
  * Kolom: No, Pratinjau Gambar (Thumbnail 16:9), Judul Utama, Subheadline, Teks CTA, Urutan, Status Toggle, Aksi.
* **Aksi Interaktif:**
  * Toggle Status: Konfirmasi SweetAlert2 status aktif/non-aktif slide.
  * Tombol Edit: Modal edit data dengan notifikasi sukses SweetAlert2 saat tersimpan.
  * Tombol Hapus: Dialog peringatan SweetAlert2 dengan tombol hapus merah.

---

### 6.4. Halaman Layanan (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tambah Layanan`.
* **Tabel Layanan (DataTables):**
  * Kolom: No, Foto/Ikon, Nama Layanan, Range Harga, Badge Garansi (2 Bulan), Urutan, Status, Aksi.
  * Fitur DataTables: Pencarian cepat nama layanan (*Cuci, Overhaul, Freon, Bongkar Pasang*).
* **Aksi Interaktif:**
  * Tombol Edit `<i class="fa-solid fa-pen-to-square"></i>`: Membuka modal edit.
  * Tombol Hapus `<i class="fa-solid fa-trash"></i>`: Memunculkan `Swal.fire` konfirmasi hapus. Notifikasi sukses muncul setelah data terhapus dari database.

---

### 6.5. Halaman Promo (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tambah Promo`.
* **Tabel Promo (DataTables):**
  * Kolom: No, Banner Promo, Judul Promo, Deskripsi Ringkas, Periode Mulai/Selesai, Status, Aksi.
* **Aksi Interaktif:**
  * Notifikasi SweetAlert2 saat promo baru berhasil ditambahkan atau diperbarui.
  * Konfirmasi `Swal.fire` saat menghapus banner promo.

---

### 6.6. Halaman Keunggulan (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tambah Keunggulan`.
* **Tabel Keunggulan (DataTables):**
  * Kolom: No, Ikon FontAwesome, Judul Keunggulan, Keterangan Singkat, Posisi Urutan, Aksi.
* **Aksi Interaktif:**
  * Konfirmasi hapus dan notifikasi sukses penyimpanan via SweetAlert2.

---

### 6.7. Halaman Tentang & Visi (Summernote & SweetAlert2)
* **Tab Navigasi:**
  * Tab 1: `<i class="fa-solid fa-circle-info"></i> Profil Tentang Kami` (Upload foto armada teknisi, Summernote Rich Text Editor).
  * Tab 2: `<i class="fa-solid fa-bullseye"></i> Visi & Misi` (Summernote Editor khusus poin visi & misi).
* **Aksi Simpan:**
  * Tombol `<i class="fa-solid fa-floppy-disk"></i> Simpan Profil & Visi Misi`.
  * Memunculkan SweetAlert2 Toast sukses *"Profil dan Visi Misi berhasil diperbarui!"*.

---

### 6.8. Halaman Statistik (Form & SweetAlert2)
* **Form Konfigurasi Nilai:**
  * Input Nilai & Label: Total Pelanggan (`5000+`), Teknisi (`20+`), Kepuasan (`99.2%`), Unit AC (`12000+`).
* **Aksi Simpan:**
  * Tombol Simpan dengan notifikasi SweetAlert2 Toast sukses.

---

### 6.9. Halaman Testimoni (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tambah Testimoni`.
* **Tabel Testimoni (DataTables):**
  * Kolom: No, Foto Pelanggan, Nama & Domisili, Rating Bintang (`fa-solid fa-star text-warning`), Cuplikan Ulasan, Status Tampil, Aksi.
* **Aksi Interaktif:**
  * Konfirmasi hapus ulasan dengan dialog SweetAlert2 peringatan.
  * Modal input ulasan baru dengan rating bintang klik dan notifikasi simpan berhasil.

---

### 6.10. Halaman Artikel (DataTables & SweetAlert2)
* **Header Card:** Tombol `<i class="fa-solid fa-plus"></i> Tulis Artikel Baru`.
* **Tabel Artikel (DataTables):**
  * Kolom: No, Cover Thumbnail, Judul Artikel, Total Likes (`fa-solid fa-heart text-danger`), Total Komentar (`fa-solid fa-comments text-primary`), Tanggal Terbit, Status, Aksi.
* **Editor Artikel:**
  * Input Judul, Upload Cover, Excerpt, Konten Summernote WYSIWYG.
  * SweetAlert2 konfirmasi saat menyimpan draft atau mempublikasikan artikel.
  * SweetAlert2 konfirmasi hapus artikel beserta thumbnail-nya.

---

### 6.11. Halaman Komentar (DataTables & SweetAlert2 Moderasi)
* **Tabel Komentar (DataTables):**
  * Kolom: No, Nama Pengirim, Alamat Email, Judul Artikel Terkait, Pesan Komentar, Tanggal Kirim, Status Tampil, Aksi.
  * Fitur DataTables: Filter berdasarkan artikel atau pencarian nama pengirim.
* **Aksi Moderasi Komentar:**
  * **Hapus Komentar:** Mengklik tombol `<i class="fa-solid fa-trash text-danger"></i>` memicu dialog konfirmasi `Swal.fire`:
    > *"Hapus komentar dari [Nama Pengirim]? Tindakan ini bersifat permanen."*
    Setelah dikonfirmasi, komentar dihapus via AJAX dan SweetAlert2 menampilkan notifikasi sukses tanpa perlu reload halaman penuh.
  * **Status Tampil (Approve / Hide):** Mengubah status dengan feedback toast instan SweetAlert2.

---

### 6.12. Halaman Pengaturan (Form CMS & SweetAlert2)
* **Panel Tab Pengaturan:**
  1. Identitas & Logo (Nama web, Logo navbar/footer, Favicon).
  2. Kontak & Alamat (Nomor WhatsApp `+6287869346820`, No Telp, Alamat Duren Sawit).
  3. Peta Google Maps (Input iframe embed).
  4. Media Sosial (Instagram, Facebook, YouTube, TikTok).
* **Aksi Simpan:**
  * Tombol `<i class="fa-solid fa-floppy-disk"></i> Simpan Pengaturan`.
  * Menampilkan dialog SweetAlert2 sukses *"Pengaturan website berhasil diperbarui!"*.
