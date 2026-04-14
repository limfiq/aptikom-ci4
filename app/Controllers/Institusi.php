<?php

namespace App\Controllers;

class Institusi extends BaseController
{
    public function index(): string
    {
        // Mock data for MemberInstitution
        $members = [
            [
                'id' => 1,
                'name' => 'Universitas Indonesia',
                'type' => 'Universitas',
                'province' => 'Jawa Barat',
                'logo' => 'UI',
                'address' => 'Kampus UI Depok',
                'email' => 'info@ui.ac.id',
                'phone' => '021-123456',
                'website' => 'https://ui.ac.id'
            ],
            [
                'id' => 2,
                'name' => 'Institut Teknologi Bandung',
                'type' => 'Institut',
                'province' => 'Jawa Barat',
                'logo' => 'ITB',
                'address' => 'Jl. Ganesha No. 10, Bandung',
                'email' => 'info@itb.ac.id',
                'phone' => '022-765432',
                'website' => 'https://itb.ac.id'
            ],
            [
                'id' => 3,
                'name' => 'Universitas Gadjah Mada',
                'type' => 'Universitas',
                'province' => 'DI Yogyakarta',
                'logo' => 'UGM',
                'address' => 'Bulaksumur, Yogyakarta',
                'email' => 'info@ugm.ac.id',
                'phone' => '0274-567890',
                'website' => 'https://ugm.ac.id'
            ],
            [
                'id' => 4,
                'name' => 'Institut Teknologi Sepuluh Nopember',
                'type' => 'Institut',
                'province' => 'Jawa Timur',
                'logo' => 'ITS',
                'address' => 'Kampus ITS Sukolilo, Surabaya',
                'email' => 'info@its.ac.id',
                'phone' => '031-5947274',
                'website' => 'https://its.ac.id'
            ],
            [
                'id' => 5,
                'name' => 'Universitas Bina Nusantara',
                'type' => 'Universitas',
                'province' => 'DKI Jakarta',
                'logo' => 'BINUS',
                'address' => 'Jl. K. H. Syahdan No. 9, Jakarta',
                'email' => 'info@binus.ac.id',
                'phone' => '021-5345830',
                'website' => 'https://binus.ac.id'
            ],
            [
                'id' => 6,
                'name' => 'Telkom University',
                'type' => 'Universitas',
                'province' => 'Jawa Barat',
                'logo' => 'TEL-U',
                'address' => 'Jl. Telekomunikasi No. 1, Bandung',
                'email' => 'info@telkomuniversity.ac.id',
                'phone' => '022-7564108',
                'website' => 'https://telkomuniversity.ac.id'
            ],
            [
                'id' => 7,
                'name' => 'Universitas Diponegoro',
                'type' => 'Universitas',
                'province' => 'Jawa Tengah',
                'logo' => 'UNDIP',
                'address' => 'Jl. Prof. Soedarto, SH, Tembalang, Semarang',
                'email' => 'info@undip.ac.id',
                'phone' => '024-7460020',
                'website' => 'https://undip.ac.id'
            ],
            [
                'id' => 8,
                'name' => 'Universitas Brawijaya',
                'type' => 'Universitas',
                'province' => 'Jawa Timur',
                'logo' => 'UB',
                'address' => 'Jl. Veteran, Malang',
                'email' => 'info@ub.ac.id',
                'phone' => '0341-551611',
                'website' => 'https://ub.ac.id'
            ],
            [
                'id' => 9,
                'name' => 'Universitas Hasanuddin',
                'type' => 'Universitas',
                'province' => 'Sulawesi Selatan',
                'logo' => 'UNHAS',
                'address' => 'Jl. Perintis Kemerdekaan KM. 10, Makassar',
                'email' => 'info@unhas.ac.id',
                'phone' => '0411-586200',
                'website' => 'https://unhas.ac.id'
            ],
            [
                'id' => 10,
                'name' => 'Politeknik Negeri Jakarta',
                'type' => 'Politeknik',
                'province' => 'Jawa Barat',
                'logo' => 'PNJ',
                'address' => 'Kampus UI Depok',
                'email' => 'info@pnj.ac.id',
                'phone' => '021-7270036',
                'website' => 'https://pnj.ac.id'
            ],
            [
                'id' => 11,
                'name' => 'Universitas Amikom Yogyakarta',
                'type' => 'Universitas',
                'province' => 'DI Yogyakarta',
                'logo' => 'AMIKOM',
                'address' => 'Jl. Ring Road Utara, Condongcatur, Sleman',
                'email' => 'info@amikom.ac.id',
                'phone' => '0274-884201',
                'website' => 'https://amikom.ac.id'
            ],
            [
                'id' => 12,
                'name' => 'Universitas Gunadarma',
                'type' => 'Universitas',
                'province' => 'Jawa Barat',
                'logo' => 'UG',
                'address' => 'Jl. Margonda Raya No. 100, Depok',
                'email' => 'info@gunadarma.ac.id',
                'phone' => '021-78881112',
                'website' => 'https://gunadarma.ac.id'
            ]
        ];

        return view('institusi', ['members' => $members]);
    }
}
