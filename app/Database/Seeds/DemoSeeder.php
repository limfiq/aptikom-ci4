<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // ─── 1. POSTS (Berita) ────────────────────────────────────────────
        $this->db->table('posts')->insertBatch([
            [
                'title'     => 'APTIKOM Jatim Selenggarakan Seminar Nasional Transformasi Digital 2026',
                'slug'      => 'aptikom-seminar-nasional-transformasi-digital-2026',
                'content'   => '<p>APTIKOM Jatim kembali menyelenggarakan Seminar Nasional Transformasi Digital yang diikuti oleh lebih dari 500 peserta dari seluruh perguruan tinggi anggota. Seminar ini menghadirkan pembicara dari industri teknologi terkemuka di Indonesia.</p><p>Acara berlangsung selama dua hari di Jakarta Convention Center dan membahas topik-topik strategis seperti kecerdasan buatan, komputasi awan, dan keamanan siber.</p>',
                'excerpt'   => 'APTIKOM Jatim menyelenggarakan Seminar Nasional Transformasi Digital dengan 500+ peserta dari seluruh perguruan tinggi anggota.',
                'image'     => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80',
                'category'  => 'Kegiatan',
                'status'    => 'published',
                'createdAt' => $now,
                'updatedAt' => $now,
            ],
            [
                'title'     => 'Pembaruan Panduan Kurikulum OBE untuk Program Studi Informatika',
                'slug'      => 'pembaruan-panduan-kurikulum-obe-informatika',
                'content'   => '<p>APTIKOM Jatim menerbitkan panduan kurikulum terbaru berbasis Outcome-Based Education (OBE) yang disesuaikan dengan kebutuhan industri dan standar internasional tahun 2026. Panduan ini menjadi acuan bagi seluruh program studi informatika di Indonesia.</p><p>Dokumen ini dapat diunduh melalui portal resmi APTIKOM Jatim dan mencakup template silabus, rubrik penilaian, serta panduan implementasi OBE.</p>',
                'excerpt'   => 'APTIKOM Jatim menerbitkan panduan kurikulum OBE terbaru yang menjadi acuan bagi seluruh program studi informatika di Indonesia.',
                'image'     => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?auto=format&fit=crop&w=800&q=80',
                'category'  => 'Publikasi',
                'status'    => 'published',
                'createdAt' => date('Y-m-d H:i:s', strtotime('-3 days')),
                'updatedAt' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
        ]);

        // ─── 2. EVENTS (Kegiatan) ─────────────────────────────────────────
        $this->db->table('events')->insertBatch([
            [
                'title'       => 'Konferensi Nasional Informatika APTIKOM Jatim 2026',
                'date'        => date('Y-m-d', strtotime('+30 days')),
                'location'    => 'Bali Nusa Dua Convention Center',
                'type'        => 'Konferensi',
                'description' => 'Konferensi tahunan yang mempertemukan akademisi, peneliti, dan praktisi di bidang informatika dari seluruh Indonesia. Akan ada sesi presentasi makalah, panel diskusi, dan pameran inovasi teknologi.',
                'link'        => 'https://aptikom.org/konferensi-2026',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'title'       => 'Workshop Akreditasi Program Studi Informatika LAMDIK',
                'date'        => date('Y-m-d', strtotime('+14 days')),
                'location'    => 'Zoom Meeting (Daring)',
                'type'        => 'Workshop',
                'description' => 'Workshop intensif membahas persiapan akreditasi program studi informatika berdasarkan instrumen LAMDIK terbaru. Peserta akan mendapatkan panduan langkah demi langkah dalam menyusun borang akreditasi.',
                'link'        => 'https://aptikom.org/workshop-akreditasi',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
        ]);

        // ─── 3. BANNERS ───────────────────────────────────────────────────
        $this->db->table('banners')->insertBatch([
            [
                'title'           => 'Asosiasi Pendidikan Tinggi Informatika dan Komputer (APTIKOM Jatim)',
                'subtitle'        => 'Membangun talenta digital Indonesia yang unggul dan berdaya saing global melalui kolaborasi dan standar mutu pendidikan tinggi informatika.',
                'image'           => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80',
                'backgroundImage' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=1920&q=80',
                'buttonText'      => 'Bergabung Sekarang',
                'buttonLink'      => 'https://dias.aptikom.org/',
                'link'            => 'https://dias.aptikom.org/',
                'isActive'        => 1,
                'order'           => 1,
                'createdAt'       => $now,
                'updatedAt'       => $now,
            ],
            [
                'title'           => 'Konferensi Nasional Informatika APTIKOM Jatim 2026',
                'subtitle'        => 'Daftarkan diri Anda sekarang dan bergabung bersama ratusan akademisi dan praktisi terbaik di bidang informatika.',
                'image'           => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80',
                'backgroundImage' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1920&q=80',
                'buttonText'      => 'Daftar Sekarang',
                'buttonLink'      => '/events',
                'link'            => '/events',
                'isActive'        => 1,
                'order'           => 2,
                'createdAt'       => $now,
                'updatedAt'       => $now,
            ],
        ]);

        // ─── 4. ACHIEVEMENTS (Prestasi) ───────────────────────────────────
        $this->db->table('achievements')->insertBatch([
            [
                'title'       => 'Penghargaan Best Association Award 2025',
                'category'    => 'Penghargaan',
                'date'        => '2025-11-15',
                'description' => 'APTIKOM Jatim menerima penghargaan Best Higher Education Association dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi atas kontribusi luar biasa dalam pengembangan standar kurikulum informatika nasional.',
                'image'       => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=800&q=80',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'title'       => '1000 Program Studi Informatika Terakreditasi Unggul',
                'category'    => 'Capaian',
                'date'        => '2025-08-01',
                'description' => 'APTIKOM Jatim berhasil mendampingi lebih dari 1.000 program studi informatika seluruh Indonesia untuk mencapai akreditasi Unggul melalui program klinik mutu dan pendampingan intensif.',
                'image'       => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&w=800&q=80',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
        ]);

        // ─── 5. PARTNERS (Mitra) ──────────────────────────────────────────
        $this->db->table('partners')->insertBatch([
            [
                'name'         => 'Kemendikbudristek',
                'logo'         => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Kemdikbud_logo.svg/1200px-Kemdikbud_logo.svg.png',
                'website'      => 'https://kemdikbud.go.id',
                'displayOrder' => 1,
                'isActive'     => 1,
                'createdAt'    => $now,
                'updatedAt'    => $now,
            ],
            [
                'name'         => 'Google for Education',
                'logo'         => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png',
                'website'      => 'https://edu.google.com',
                'displayOrder' => 2,
                'isActive'     => 1,
                'createdAt'    => $now,
                'updatedAt'    => $now,
            ],
        ]);

        // ─── 6. BOARD MEMBERS (Pengurus) ──────────────────────────────────
        $this->db->table('board_members')->insertBatch([
            [
                'name'        => 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.',
                'position'    => 'Ketua Umum',
                'image'       => 'https://randomuser.me/api/portraits/men/60.jpg',
                'description' => 'Guru Besar Ilmu Komputer Universitas Indonesia. Memimpin APTIKOM Jatim sejak 2018 dan telah berhasil meningkatkan kualitas pendidikan informatika nasional.',
                'order'       => 1,
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'name'        => 'Dr. Rina Wulandari, M.Kom.',
                'position'    => 'Sekretaris Jenderal',
                'image'       => 'https://randomuser.me/api/portraits/women/45.jpg',
                'description' => 'Dosen senior di bidang Sistem Informasi, Universitas Gadjah Mada. Bertanggung jawab atas koordinasi operasional dan administrasi APTIKOM Jatim.',
                'order'       => 2,
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
        ]);

        // ─── 7. INDIVIDUAL MEMBERS (Anggota Individu) ─────────────────────
        $this->db->table('individual_members')->insertBatch([
            [
                'employeeNumber' => 'NPP-2026-001',
                'name'           => 'Dr. Budi Santoso, M.T.',
                'affiliation'    => 'Institut Teknologi Bandung',
                'studyProgram'   => 'Teknik Informatika',
                'role'           => 'Dosen',
                'province'       => 'Jawa Barat',
                'validityPeriod' => '2026-12-31',
                'createdAt'      => $now,
                'updatedAt'      => $now,
            ],
            [
                'employeeNumber' => 'NPP-2026-002',
                'name'           => 'Dr. Siti Rahayu, M.Cs.',
                'affiliation'    => 'Universitas Gadjah Mada',
                'studyProgram'   => 'Sistem Informasi',
                'role'           => 'Dosen',
                'province'       => 'DI Yogyakarta',
                'validityPeriod' => '2026-12-31',
                'createdAt'      => $now,
                'updatedAt'      => $now,
            ],
        ]);

        // ─── 8. MEMBER INSTITUTIONS (Anggota Instansi) ────────────────────
        $this->db->table('member_institutions')->insertBatch([
            [
                'name'      => 'Institut Teknologi Bandung',
                'type'      => 'PTN',
                'province'  => 'Jawa Barat',
                'logo'      => 'https://upload.wikimedia.org/wikipedia/id/thumb/b/b0/Institut_Teknologi_Bandung_logo.svg/1200px-Institut_Teknologi_Bandung_logo.svg.png',
                'website'   => 'https://www.itb.ac.id',
                'createdAt' => $now,
                'updatedAt' => $now,
            ],
            [
                'name'      => 'Universitas Gadjah Mada',
                'type'      => 'PTN',
                'province'  => 'DI Yogyakarta',
                'logo'      => 'https://upload.wikimedia.org/wikipedia/id/thumb/7/7c/UGM_logo.svg/1200px-UGM_logo.svg.png',
                'website'   => 'https://www.ugm.ac.id',
                'createdAt' => $now,
                'updatedAt' => $now,
            ],
        ]);

        // ─── 9. DOCUMENTS (Panduan & Edaran) ──────────────────────────────
        $this->db->table('documents')->insertBatch([
            [
                'title'       => 'Panduan Kurikulum OBE Program Studi Informatika 2026',
                'category'    => 'Panduan',
                'fileUrl'     => 'https://drive.google.com/file/d/sample1',
                'size'        => '2.4 MB',
                'description' => 'Panduan lengkap implementasi kurikulum berbasis Outcome-Based Education (OBE) untuk program studi Informatika, Sistem Informasi, dan Teknik Komputer.',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
            [
                'title'       => 'Edaran Digitalisasi Administrasi Akademik No. 04/APTIKOM Jatim/2026',
                'category'    => 'Edaran',
                'fileUrl'     => 'https://drive.google.com/file/d/sample2',
                'size'        => '856 KB',
                'description' => 'Surat edaran resmi mengenai standar digitalisasi administrasi akademik untuk seluruh perguruan tinggi anggota APTIKOM Jatim.',
                'createdAt'   => $now,
                'updatedAt'   => $now,
            ],
        ]);

        // ─── 10. CONTACT INFO (Profil Organisasi) ─────────────────────────
        $this->db->table('contact_info')->insert([
            'officeName'   => 'APTIKOM Jatim',
            'address'      => 'Jl. AMIKOM No. 1, Condongcatur',
            'city'         => 'Sleman, Yogyakarta',
            'province'     => 'Daerah Istimewa Yogyakarta',
            'postalCode'   => '55283',
            'phone'        => '+62 274 884201',
            'email'        => 'sekretariat@aptikom.org',
            'weekdayHours' => 'Senin – Jumat: 08.00 – 16.00 WIB',
            'weekendHours' => 'Sabtu – Minggu: Tutup',
            'latitude'     => '-7.75466',
            'longitude'    => '110.40712',
            'facebook'     => 'https://facebook.com/aptikom',
            'twitter'      => 'https://twitter.com/aptikom',
            'instagram'    => 'https://instagram.com/aptikom',
            'linkedin'     => 'https://linkedin.com/company/aptikom',
            'createdAt'    => $now,
            'updatedAt'    => $now,
        ]);

        // ─── 11. CONTACT MESSAGES ─────────────────────────────────────────
        $this->db->table('contact_messages')->insertBatch([
            [
                'name'      => 'Ahmad Fauzi',
                'email'     => 'ahmad.fauzi@univ.ac.id',
                'subject'   => 'Pertanyaan Keanggotaan Institusi',
                'message'   => 'Salam hormat. Kami dari Universitas Nusantara ingin mendaftarkan institusi kami sebagai anggota APTIKOM Jatim. Mohon informasi mengenai prosedur dan persyaratan pendaftaran.',
                'isRead'    => 0,
                'createdAt' => $now,
                'updatedAt' => $now,
            ],
            [
                'name'      => 'Dewi Lestari',
                'email'     => 'dewi.lestari@prodi.ac.id',
                'subject'   => 'Informasi Seminar Nasional',
                'message'   => 'Kami tertarik untuk berpartisipasi dalam Seminar Nasional APTIKOM Jatim 2026. Bisakah kami mendapatkan informasi lebih lanjut mengenai pendaftaran abstrak dan jadwal presentasi?',
                'isRead'    => 0,
                'createdAt' => date('Y-m-d H:i:s', strtotime('-1 day')),
                'updatedAt' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ],
        ]);

        echo "✅ DemoSeeder selesai! Semua tabel telah diisi dengan data contoh.\n";
    }
}
