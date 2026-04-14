<?php

namespace App\Controllers;

use App\Models\ContactInfoModel;

class About extends BaseController
{
    public function index(): string
    {
        $profileModel = new \App\Models\OrganizationProfileModel();
        $profile = $profileModel->first();
        
        // If profile doesn't exist, use default values
        if (!$profile) {
            $profile = [
                'name'               => 'APTIKOM Jatim',
                'fullName'           => 'Asosiasi Pendidikan Tinggi Informatika dan Komputer Jawa Timur',
                'abbreviation'       => 'APTIKOM Jatim',
                'establishedDate'    => '2000-11-20',
                'legalStatus'        => 'Perkumpulan Terdaftar',
                'registrationNumber' => 'AHU-0000000.AH.01.07.TAHUN 2026',
                'totalMembers'       => 25000,
                'totalInstitutions'  => 850,
                'chairperson'        => 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.',
                'secretary'          => 'Dr. Husni Teja Sukmana, S.T., M.Sc.',
                'treasurer'          => 'Prof. Dr. Ema Utami, S.Si, M.Kom',
                'history'            => "Data sejarah belum tersedia.",
                'vision'             => 'Data visi belum tersedia.',
                'mission'            => 'Data misi belum tersedia.',
                'goals'              => '',
                'objectives'         => '',
                'structure'          => '',
                'logo'               => null,
                'email'              => 'sekretariat@aptikom.org',
                'phone'              => '',
                'address'            => '',
                'city'               => '',
                'province'           => '',
                'postalCode'         => '',
                'website'            => '',
                'facebook'           => '#',
                'twitter'            => '#',
                'instagram'          => '#',
                'linkedin'           => '#',
                'youtube'            => '#',
            ];
        }

        return view('about', ['profile' => $profile]);
    }
}
