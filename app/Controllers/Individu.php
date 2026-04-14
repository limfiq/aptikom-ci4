<?php

namespace App\Controllers;

class Individu extends BaseController
{
    public function index(): string
    {
        // Mock data for IndividualMember
        $members = [
            [
                'id' => 1,
                'employeeNumber' => 'APT-2024-001',
                'name' => 'Prof. Dr. Ir. Zainal A. Hasibuan, MLS., Ph.D.',
                'affiliation' => 'Universitas Indonesia',
                'studyProgram' => 'Ilmu Komputer',
                'role' => 'Dosen / Peneliti',
                'province' => 'DKI Jakarta',
                'validityPeriod' => '2026-12-31'
            ],
            [
                'id' => 2,
                'employeeNumber' => 'APT-2024-002',
                'name' => 'Dr. Husni Teja Sukmana, S.T., M.Sc.',
                'affiliation' => 'UIN Syarif Hidayatullah Jakarta',
                'studyProgram' => 'Teknik Informatika',
                'role' => 'Dosen',
                'province' => 'Banten',
                'validityPeriod' => '2026-12-31'
            ],
            [
                'id' => 3,
                'employeeNumber' => 'APT-2024-003',
                'name' => 'Prof. Dr. Ema Utami, S.Si, M.Kom',
                'affiliation' => 'Universitas Amikom Yogyakarta',
                'studyProgram' => 'Informatika',
                'role' => 'Dosen',
                'province' => 'DI Yogyakarta',
                'validityPeriod' => '2025-06-30'
            ],
            [
                'id' => 4,
                'employeeNumber' => 'APT-2024-004',
                'name' => 'Dr. Ir. Budi Setiawan',
                'affiliation' => 'Institut Teknologi Bandung',
                'studyProgram' => 'Teknik Elektro',
                'role' => 'Dosen',
                'province' => 'Jawa Barat',
                'validityPeriod' => '2027-01-15'
            ],
            [
                'id' => 5,
                'employeeNumber' => 'APT-2024-005',
                'name' => 'Bambang Sudarsono, M.Kom',
                'affiliation' => 'Universitas Bina Nusantara',
                'studyProgram' => 'Sistem Informasi',
                'role' => 'Praktisi',
                'province' => 'DKI Jakarta',
                'validityPeriod' => '2024-12-31'
            ],
            [
                'id' => 6,
                'employeeNumber' => 'APT-2024-006',
                'name' => 'Siti Nurhaliza, M.T.',
                'affiliation' => 'Telkom University',
                'studyProgram' => 'Teknik Komputer',
                'role' => 'Dosen',
                'province' => 'Jawa Barat',
                'validityPeriod' => '2026-08-20'
            ],
            [
                'id' => 7,
                'employeeNumber' => 'APT-2024-007',
                'name' => 'Andi Wijaya, S.Kom',
                'affiliation' => 'Google Indonesia',
                'studyProgram' => 'Software Engineering',
                'role' => 'Praktisi',
                'province' => 'DKI Jakarta',
                'validityPeriod' => '2026-05-10'
            ],
            [
                'id' => 8,
                'employeeNumber' => 'APT-2024-008',
                'name' => 'Diana Putri, M.Cs',
                'affiliation' => 'Universitas Gadjah Mada',
                'studyProgram' => 'Teknologi Informasi',
                'role' => 'Dosen',
                'province' => 'DI Yogyakarta',
                'validityPeriod' => '2025-11-25'
            ],
            [
                'id' => 9,
                'employeeNumber' => 'APT-2024-009',
                'name' => 'Rizky Ramadhan',
                'affiliation' => 'Institut Teknologi Sepuluh Nopember',
                'studyProgram' => 'Sistem Informasi',
                'role' => 'Mahasiswa',
                'province' => 'Jawa Timur',
                'validityPeriod' => '2025-02-28'
            ],
            [
                'id' => 10,
                'employeeNumber' => 'APT-2024-010',
                'name' => 'Dr. Maria Ulfa',
                'affiliation' => 'Universitas Hasanuddin',
                'studyProgram' => 'Teknik Informatika',
                'role' => 'Dosen',
                'province' => 'Sulawesi Selatan',
                'validityPeriod' => '2026-10-15'
            ],
            [
                'id' => 11,
                'employeeNumber' => 'APT-2024-011',
                'name' => 'Taufik Hidayat, M.Kom',
                'affiliation' => 'Politeknik Negeri Jakarta',
                'studyProgram' => 'Teknik Multimedia Digital',
                'role' => 'Dosen',
                'province' => 'Jawa Barat',
                'validityPeriod' => '2026-03-01'
            ],
            [
                'id' => 12,
                'employeeNumber' => 'APT-2024-012',
                'name' => 'Anita Permata, Ph.D',
                'affiliation' => 'Universitas Diponegoro',
                'studyProgram' => 'Informatika',
                'role' => 'Peneliti',
                'province' => 'Jawa Tengah',
                'validityPeriod' => '2027-04-12'
            ]
        ];

        return view('individu', ['members' => $members]);
    }
}
