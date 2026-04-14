<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrganizationProfileSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name'               => 'APTIKOM Jatim',
            'fullName'           => 'Asosiasi Pendidikan Tinggi Informatika dan Komputer Jawa Timur',
            'abbreviation'       => 'APTIKOM Jatim',
            'establishedDate'    => '2000-11-20',
            'legalStatus'        => 'Perkumpulan Terdaftar',
            'registrationNumber' => 'AHU-0000000.AH.01.07.TAHUN 2026',
            'email'              => 'sekretariat@aptikom.org',
            'phone'              => '081234567890',
            'address'            => 'Jl. Ketintang No. 156',
            'city'               => 'Surabaya',
            'province'           => 'Jawa Timur',
            'postalCode'         => '60231',
            'website'            => 'https://jatim.aptikom.org',
            'facebook'           => 'https://facebook.com/aptikomjatim',
            'twitter'            => 'https://twitter.com/aptikomjatim',
            'instagram'          => 'https://instagram.com/aptikomjatim',
            'linkedin'           => 'https://linkedin.com/company/aptikomjatim',
            'youtube'            => 'https://youtube.com/aptikomjatim',
            'chairperson'        => 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.',
            'secretary'          => 'Dr. Husni Teja Sukmana, S.T., M.Sc.',
            'treasurer'          => 'Prof. Dr. Ema Utami, S.Si, M.Kom',
            'totalMembers'       => 25000,
            'totalInstitutions'  => 850,
            'history'            => "APTIKOM Jatim didirikan untuk menjawab tantangan perkembangan teknologi informasi yang semakin pesat di Indonesia. Para pendiri menyadari perlunya sebuah wadah yang dapat menyatukan perguruan tinggi di bidang informatika untuk saling berkolaborasi.\n\nBeberapa dekade selanjutnya, APTIKOM Jatim berhasil mendorong standar akreditasi dan integrasi kompetensi digital ke seluruh pelosok tanah air.",
            'vision'             => 'Menjadi wadah berhimpunnya perguruan tinggi informatika dan komputer yang unggul dan berdaya saing global.',
            'mission'            => '<ul><li>Meningkatkan kualitas sumber daya manusia di bidang informatika.</li><li>Mendorong kegiatan riset dan inovasi.</li><li>Memperkuat kolaborasi antar anggota dan pihak industri.</li></ul>',
            'goals'              => '<ul><li>Menyusun standar kurikulum nasional berbasis OBE.</li><li>Memfasilitasi akreditasi internasional bagi program studi.</li></ul>',
            'objectives'         => 'Meningkatkan indeks daya saing talenta digital Indonesia secara global.',
            'structure'          => '<ul><li>Dewan Penasihat</li><li>Ketua Umum</li><li>Sekretaris Jenderal</li><li>Bendahara</li><li>Divisi-Divisi Program Kerja</li></ul>',
            'latitude'           => '-7.75466',
            'longitude'          => '110.40712',
            'weekdayHours'       => 'Senin – Jumat: 08:00 – 16:00',
            'weekendHours'       => 'Sabtu – Minggu: Tutup',
        ];

        $model = new \App\Models\OrganizationProfileModel();
        
        // Clear existing data
        $model->truncate();
        
        // Insert new data
        $model->insert($data);

        // Seed Achievements
        $achievementModel = new \App\Models\AchievementModel();
        $achievementModel->truncate();
        $achievementModel->insert([
            'title'       => 'Juara 1 Kompetisi Inovasi Nasional',
            'description' => 'Anggota APTIKOM Jatim berhasil meraih juara pertama dalam ajang kompetisi inovasi teknologi tingkat nasional.',
            'date'        => '2023-11-20',
            'category'    => 'Penghargaan Nasional',
            'image'       => 'https://images.unsplash.com/photo-1579389083046-e3df9c2b3325?auto=format&fit=crop&q=80',
            'order'       => 1,
        ]);
        $achievementModel->insert([
            'title'       => 'Sertifikasi Internasional Terbanyak',
            'description' => 'Jawa Timur mencatatkan rekor sebagai pengelola sertifikasi kompetensi IT terbanyak di Indonesia tahun 2023.',
            'date'        => '2023-08-15',
            'category'    => 'Sertifikasi',
            'image'       => 'https://images.unsplash.com/photo-1567427018141-0584f1ea1b8a?auto=format&fit=crop&q=80',
            'order'       => 2,
        ]);
        $achievementModel->insert([
            'title'       => 'Kolaborasi Riset Institusi Teraktif',
            'description' => 'Kerja sama riset antar kampus di Jawa Timur mendapat apresiasi sebagai kolaborasi paling produktif.',
            'date'        => '2023-05-10',
            'category'    => 'Riset',
            'image'       => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80',
            'order'       => 3,
        ]);

        // Seed Partners
        $partnerModel = new \App\Models\PartnerModel();
        $partnerModel->truncate();
        $partners = [
            ['name' => 'Microsoft', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg', 'website' => 'https://microsoft.com'],
            ['name' => 'Google', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg', 'website' => 'https://google.com'],
            ['name' => 'Cisco', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/0/08/Cisco_logo_blue_2016.svg', 'website' => 'https://cisco.com'],
            ['name' => 'AWS', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg', 'website' => 'https://aws.amazon.com'],
            ['name' => 'Intel', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/7/7d/Intel_logo_%282020%29.svg', 'website' => 'https://intel.com'],
            ['name' => 'IBM', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/5/51/IBM_logo.svg', 'website' => 'https://ibm.com'],
        ];

        foreach ($partners as $p) {
            $partnerModel->insert($p);
        }
    }
}
