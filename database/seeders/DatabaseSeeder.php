<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Promo;
use App\Models\Advantage;
use App\Models\CompanyProfile;
use App\Models\Statistic;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@serviceac.com'],
            [
                'name' => 'Administrator AC',
                'password' => Hash::make('admin123'),
            ]
        );

        // 2. Settings
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Jasa Service AC',
                'site_logo' => '/storage/settings/logo.jpg',
                'site_favicon' => '/storage/settings/favicon.jpg',
                'whatsapp_number' => '+62 878-6934-6820',
                'phone_number' => '+62 878-6934-6820',
                'address' => 'Duren Sawit, Kec. Duren Sawit, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia',
                'google_maps_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31729.839841804705!2d106.89785863920364!3d-6.233400512808463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f33923c8a77d%3A0x673dbb1d034b75fe!2sKec.%20Duren%20Sawit%2C%20Kota%20Jakarta%20Timur%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'instagram_url' => 'https://instagram.com/jasaserviceac',
                'facebook_url' => 'https://facebook.com/jasaserviceac',
                'youtube_url' => 'https://youtube.com/@jasaserviceac',
                'tiktok_url' => 'https://tiktok.com/@jasaserviceac',
            ]
        );

        // 3. Sliders
        Slider::truncate();
        Slider::create([
            'title' => 'Jasa Service AC Terpercaya & Bergaransi 2 Bulan',
            'subtitle' => 'Solusi perbaikan, cuci higienis, bongkar pasang, dan isi freon AC profesional di area Duren Sawit & seluruh Jakarta Timur.',
            'image_path' => '/storage/sliders/slide1.jpg',
            'cta_text' => 'Hubungi Kami',
            'cta_link' => '#kontak',
            'sort_order' => 1,
            'is_active' => true,
        ]);
        Slider::create([
            'title' => 'Cuci AC Bersih Higienis, Dingin Maksimal Hemat Listrik',
            'subtitle' => 'Pembersihan mendalam evaporator dan kondensor dengan peralatan steam berstandar industri. Bebas jamur, bau apek, dan hemat listrik.',
            'image_path' => '/storage/sliders/slide2.jpg',
            'cta_text' => 'Lihat Layanan',
            'cta_link' => '#layanan',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        // 4. Services
        Service::truncate();
        $services = [
            [
                'name' => 'Servis AC',
                'price_range' => 'Rp 75.000 - Rp 120.000',
                'description' => 'Pengecekan komprehensif kelistrikan, arus kompresor, saringan udara, dan optimasi efisiensi pendinginan ruangan.',
                'image_path' => '/storage/services/service1.jpg',
                'has_warranty' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Cuci AC',
                'price_range' => 'Rp 65.000 - Rp 95.000',
                'description' => 'Pembersihan total evaporator indoor, kondensor outdoor, talang drainase air, serta semprotan antibakteri higienis.',
                'image_path' => '/storage/services/service2.jpg',
                'has_warranty' => true,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Overhaul (Cuci Besar)',
                'price_range' => 'Rp 150.000 - Rp 250.000',
                'description' => 'Penurunan unit indoor/outdoor untuk pembersihan menyeluruh kerak lumut, minyak oli membandel, dan peremajaan sistem.',
                'image_path' => '/storage/services/service3.jpg',
                'has_warranty' => true,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Bongkar / Pasang',
                'price_range' => 'Rp 150.000 - Rp 350.000',
                'description' => 'Jasa bongkar unit lama, pemasangan unit baru, relokasi antar ruangan/rumah, dan perapihan instalasi pipa tembaga.',
                'image_path' => '/storage/services/service4.jpg',
                'has_warranty' => true,
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Perbaikan Kebocoran',
                'price_range' => 'Rp 125.000 - Rp 275.000',
                'description' => 'Solusi tuntas AC menetes/bocor air di dalam ruangan, perbaikan sambungan nepel, hingga pengelasan kebocoran freon.',
                'image_path' => '/storage/services/service5.jpg',
                'has_warranty' => true,
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Vacum & Flashing',
                'price_range' => 'Rp 100.000 - Rp 200.000',
                'description' => 'Pengosongan uap air dan udara dalam pipa menggunakan pompa vakum standar dan pembersihan kotoran oli pipa via flushing nitrogen.',
                'image_path' => '/storage/services/service6.jpg',
                'has_warranty' => true,
                'sort_order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Isi Freon',
                'price_range' => 'Rp 120.000 - Rp 250.000',
                'description' => 'Pengisian freon murni berkualitas tinggi tipe R22, R32, maupun R410A sesuai takaran tekanan PSI pabrikan kompresor.',
                'image_path' => '/storage/services/service7.jpg',
                'has_warranty' => true,
                'sort_order' => 7,
                'is_active' => true,
            ],
        ];
        foreach ($services as $srv) {
            Service::create($srv);
        }

        // 5. Promos
        Promo::truncate();
        Promo::create([
            'title' => 'Paket Cuci 3 Unit Hemat 20%',
            'description' => 'Diskon khusus pengerjaan cuci AC serentak minimal 3 unit dalam satu lokasi perumahan atau kantor area Duren Sawit & sekitarnya.',
            'image_path' => '/storage/promos/promo1.jpg',
            'start_date' => now()->startOfMonth(),
            'end_date' => now()->endOfMonth()->addMonth(),
            'is_active' => true,
        ]);
        Promo::create([
            'title' => 'Paket Cuci Bersih + Isi Freon R32/R410A',
            'description' => 'Hemat hingga Rp 50.000 untuk paket kombinasi pembersihan unit indoor outdoor plus penambahan tekanan freon optimal.',
            'image_path' => '/storage/promos/promo2.jpg',
            'start_date' => now()->startOfMonth(),
            'end_date' => now()->endOfMonth()->addMonth(),
            'is_active' => true,
        ]);

        // 6. Advantages
        Advantage::truncate();
        $advantages = [
            [
                'title' => 'GARANSI RESMI 2 BULAN',
                'description' => 'Seluruh pekerjaan servis, cuci, perbaikan bocor, dan spare part kami lindungi dengan garansi resmi 2 bulan tanpa ribet.',
                'icon_class' => 'fa-solid fa-certificate',
                'sort_order' => 1,
            ],
            [
                'title' => 'Teknisi Profesional & Ramah',
                'description' => 'Tim teknisi berpengalaman, bersertifikasi keahlian pendingin, sopan, berseragam rapi, dan menjaga kebersihan rumah Anda.',
                'icon_class' => 'fa-solid fa-user-check',
                'sort_order' => 2,
            ],
            [
                'title' => 'Peralatan Standar Industri',
                'description' => 'Menggunakan mesin steam jet cleaner bertekanan tinggi terukur, manifold gauge presisi, pompa vakum, dan flushing nitrogen.',
                'icon_class' => 'fa-solid fa-screwdriver-wrench',
                'sort_order' => 3,
            ],
            [
                'title' => 'Harga Transparan & Jujur',
                'description' => 'Estimasi biaya disampaikan secara terbuka di awal pengerjaan. Tanpa biaya tersembunyi dan tidak ada rekayasa kerusakan.',
                'icon_class' => 'fa-solid fa-hand-holding-dollar',
                'sort_order' => 4,
            ],
            [
                'title' => 'Respon Cepat Jakarta Timur',
                'description' => 'Panggilan teknisi standby siap meluncur cepat ke perumahan, apartemen, ruko, dan perkantoran di kawasan Duren Sawit & sekitarnya.',
                'icon_class' => 'fa-solid fa-bolt',
                'sort_order' => 5,
            ],
        ];
        foreach ($advantages as $adv) {
            Advantage::create($adv);
        }

        // 7. Company Profile
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'about_image' => '/storage/company/about.jpg',
                'about_content' => '<p><strong>Jasa Service AC</strong> adalah penyedia layanan perawatan, perbaikan, dan instalasi sistem pendingin ruangan terkemuka yang berpusat di Duren Sawit, Jakarta Timur. Berbekal pengalaman bertahun-tahun melayani ribuan pelanggan rumah tangga, instansi perkantoran, dan tempat usaha komersial, kami berkomitmen memberikan standar pelayanan teknis terbaik.</p><p>Setiap pengerjaan dilakukan oleh tim teknisi berpengalaman dan bersertifikasi yang mengutamakan kebersihan, ketelitian, serta kejujuran dalam pengetesan sistem refrigerasi. Kami percaya bahwa kenyamanan udara sejuk yang sehat berawal dari sistem pendingin yang dirawat dengan benar dan higienis.</p>',
                'vision_mission_content' => '<h4>Visi Kami</h4><p>Menjadi mitra penyedia solusi pendingin ruangan nomor 1 yang paling dipercaya di Jakarta Timur dengan keunggulan kualitas pengerjaan, transparansi, dan garansi pasti.</p><h4>Misi Kami</h4><ul><li>Memberikan pelayanan servis AC tepat waktu, higienis, dan berstandar keamanan tinggi.</li><li>Menjaga kejujuran dan transparansi biaya tanpa rekayasa kerusakan teknis.</li><li>Menjamin kepuasan pelanggan dengan jaminan purna jual <strong>Garansi 2 Bulan</strong> pada setiap pengerjaan.</li><li>Membantu pelanggan menghemat konsumsi energi listrik melalui pendinginan unit yang efisien dan optimal.</li></ul>',
            ]
        );

        // 8. Statistics
        Statistic::truncate();
        $stats = [
            ['stat_key' => 'clients', 'stat_value' => '5.000+', 'stat_label' => 'Pelanggan Puas', 'icon_class' => 'fa-solid fa-users', 'sort_order' => 1],
            ['stat_key' => 'technicians', 'stat_value' => '20+', 'stat_label' => 'Teknisi Tersertifikasi', 'icon_class' => 'fa-solid fa-user-gear', 'sort_order' => 2],
            ['stat_key' => 'satisfaction', 'stat_value' => '99.2%', 'stat_label' => 'Tingkat Kepuasan', 'icon_class' => 'fa-solid fa-face-smile', 'sort_order' => 3],
            ['stat_key' => 'units', 'stat_value' => '12.000+', 'stat_label' => 'Unit AC Ditangani', 'icon_class' => 'fa-solid fa-snowflake', 'sort_order' => 4],
        ];
        foreach ($stats as $st) {
            Statistic::create($st);
        }

        // 9. Testimonials
        Testimonial::truncate();
        $testimonials = [
            [
                'client_name' => 'Ibu Sarah Amelia',
                'client_role_location' => 'Perumahan Duren Sawit, Jakarta Timur',
                'client_photo' => '/storage/testimonials/testi1.jpg',
                'rating' => 5,
                'review_text' => 'Pelayanan sangat memuaskan! Teknisi datang tepat waktu, seragam rapi, dan pengerjaan cuci AC tidak membuat lantai kotor atau becek. AC kamar langsung dingin sejuk tanpa bau lagi. Ditambah ada garansi 2 bulan jadi tenang banget.',
                'is_active' => true,
            ],
            [
                'client_name' => 'Bpk. Hendra Gunawan',
                'client_role_location' => 'Ruko Klender, Jakarta Timur',
                'client_photo' => '/storage/testimonials/testi2.jpg',
                'rating' => 5,
                'review_text' => 'AC kantor yang tadinya bocor air dan sering trip MCB langsung teratasi setelah dioverhaul cuci besar oleh tim ini. Pengecekan tekanan freon juga jujur apa adanya tanpa ada biaya tersembunyi. Sangat profesional!',
                'is_active' => true,
            ],
            [
                'client_name' => 'Ibu Kartika Sari',
                'client_role_location' => 'Pondok Kelapa, Jakarta Timur',
                'client_photo' => '/storage/testimonials/testi3.jpg',
                'rating' => 5,
                'review_text' => 'Respon admin di WhatsApp sangat ramah dan gerak cepat. Begitu booking pagi, siang teknisi sudah sampai ke rumah. Pemasangan AC baru rapi dan jalurnya estetik. Pasti langganan terus di sini.',
                'is_active' => true,
            ],
        ];
        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // 10. Articles
        Comment::truncate();
        Article::truncate();

        $art1 = Article::create([
            'title' => '5 Tanda Freon AC Mulai Habis dan Harus Segera Diisi Ulang',
            'slug' => '5-tanda-freon-ac-mulai-habis-dan-harus-segera-diisi-ulang',
            'excerpt' => 'Kenali tanda-tanda awal kekurangan freon seperti hembusan udara yang kurang dingin, pipa es membeku, hingga kompresor berisik.',
            'content' => '<p>Freon atau refrigeran adalah zat pendingin utama yang bersirkulasi di dalam sistem AC. Dalam kondisi sistem tertutup yang normal tanpa kebocoran, freon sebenarnya tidak akan habis. Namun seiring waktu, sambungan nepel atau pipa yang bergetar dapat memicu kebocoran halus.</p><h4>1. Hembusan Angin Tidak Dingin</h4><p>Meskipun remote AC diatur ke suhu 18°C dengan kipas maksimal, udara yang keluar hanya terasa seperti angin kipas biasa tanpa hawa sejuk.</p><h4>2. Muncul Bunga Es pada Pipa Tembaga</h4><p>Periksa unit outdoor Anda. Jika pipa tembaga kecil diselimuti gumpalan es putih, ini merupakan indikator kuat tekanan freon di bawah standar PSI yang semestinya.</p><h4>3. Tagihan Listrik Meningkat Drastis</h4><p>Kompresor AC akan terus bekerja ekstra keras tanpa henti untuk mencapai suhu target pada thermostat, sehingga konsumsi daya listrik melonjak.</p><p>Jika Anda mengalami gejala ini, segera hubungi teknisi bergaransi kami untuk pengecekan manifold gauge dan perbaikan kebocoran sebelum kompresor mengalami aus permanen.</p>',
            'cover_image' => '/storage/articles/art1.jpg',
            'likes_count' => 38,
            'views_count' => 245,
            'is_published' => true,
        ]);

        Comment::create([
            'article_id' => $art1->id,
            'author_name' => 'Dimas Pratama',
            'author_email' => 'dimas@gmail.com',
            'comment_text' => 'Artikel sangat bermanfaat! Kemarin pipa AC saya memang membeku es, setelah diisi freon teknisi dari sini langsung dingin normal kembali.',
            'is_approved' => true,
        ]);

        $art2 = Article::create([
            'title' => 'Pentingnya Cuci AC Rutin Setiap 3 Bulan Sekali untuk Kesehatan',
            'slug' => 'pentingnya-cuci-ac-rutin-setiap-3-bulan-sekali-untuk-kesehatan',
            'excerpt' => 'Filter dan evaporator yang kotor menyimpan debu, jamur, dan bakteri penyebab alergi saluran pernapasan. Ketahui manfaat cuci berkala.',
            'content' => '<p>Banyak pemilik rumah yang menunda cuci AC sampai unit benar-benar tidak dingin atau meneteskan air. Padahal, cuci AC rutin setiap 3 bulan sekali memberikan manfaat berlipat bagi kesehatan penghuni rumah dan keawetan mesin.</p><h4>Menghindari Bakteri & Jamur</h4><p>Kelembapan pada kisi-kisi evaporator indoor adalah tempat berkembang biak yang ideal bagi spora jamur dan bakteri Legionella. Udara yang dihirup setiap hari bisa memicu batuk, bersin, dan alergi.</p><h4>Mencegah Kebocoran Air (AC Menetes)</h4><p>Lendir dan lumut yang mengendap pada talang pembuangan akan menyumbat selang drainase, sehingga air meluap dan menetes ke plafon atau dinding kamar.</p>',
            'cover_image' => '/storage/articles/art2.jpg',
            'likes_count' => 52,
            'views_count' => 312,
            'is_published' => true,
        ]);

        $art3 = Article::create([
            'title' => 'Cara Mengatur Suhu AC Agar Hemat Listrik dan Ruangan Tetap Sejuk',
            'slug' => 'cara-mengatur-suhu-ac-agar-hemat-listrik-dan-ruangan-tetap-sejuk',
            'excerpt' => 'Trik cerdas mengatur temperatur thermostat antara 24°C - 26°C dengan mode fan otomatis untuk menghemat pengeluaran bulanan Anda.',
            'content' => '<p>Seringkali orang langsung menyetel AC ke suhu 16°C dengan harapan ruangan cepat dingin. Padahal kebiasaan ini membuat kompresor bekerja 100% tanpa henti dan memicu pemborosan listrik yang sangat besar.</p><p>Suhu ideal kenyamanan tropis adalah antara 24°C hingga 26°C. Selisih 1°C saja dapat menghemat konsumsi energi hingga 6-10%. Padukan juga dengan timer mati otomatis saat dini hari saat suhu udara luar sudah mulai sejuk.</p>',
            'cover_image' => '/storage/articles/art3.jpg',
            'likes_count' => 45,
            'views_count' => 420,
            'is_published' => true,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
