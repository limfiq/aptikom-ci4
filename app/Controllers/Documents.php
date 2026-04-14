<?php

namespace App\Controllers;

class Documents extends BaseController
{
    public function index(): string
    {
        // Mock data for Documents
        $allDocs = [
            [
                'id' => 1,
                'title' => 'Panduan Kurikulum Perguruan Tinggi Informatika 2024',
                'category' => 'Panduan Kurikulum',
                'size' => '2.4 MB',
                'fileUrl' => '#',
                'updatedAt' => '2024-03-01 10:00:00'
            ],
            [
                'id' => 2,
                'title' => 'Instrumen Akreditasi LAM INFOKOM v1.2',
                'category' => 'Panduan Kurikulum',
                'size' => '1.8 MB',
                'fileUrl' => '#',
                'updatedAt' => '2024-02-15 14:30:00'
            ],
            [
                'id' => 3,
                'title' => 'Surat Edaran Pelaksanaan RAKORNAS 2024',
                'category' => 'Surat Edaran',
                'size' => '450 KB',
                'fileUrl' => '#',
                'updatedAt' => '2024-03-10 09:15:00'
            ],
            [
                'id' => 4,
                'title' => 'SK Penetapan Pengurus APTIKOM Jatim Wilayah',
                'category' => 'Surat Keputusan',
                'size' => '1.2 MB',
                'fileUrl' => '#',
                'updatedAt' => '2024-01-20 11:45:00'
            ],
            [
                'id' => 5,
                'title' => 'Materi Sosialisasi Akreditasi Unggul',
                'category' => 'Panduan Kurikulum',
                'size' => '5.6 MB',
                'fileUrl' => '#',
                'updatedAt' => '2024-02-28 16:20:00'
            ],
            [
                'id' => 6,
                'title' => 'Template Proposal Hibah Riset APTIKOM Jatim',
                'category' => 'Lainnya',
                'size' => '320 KB',
                'fileUrl' => '#',
                'updatedAt' => '2024-03-05 08:30:00'
            ]
        ];

        // Group documents by category (Replicating Next.js logic)
        $categories = array_unique(array_column($allDocs, 'category'));
        $groupedDocuments = [];

        foreach ($categories as $cat) {
            $items = array_filter($allDocs, function($doc) use ($cat) {
                return $doc['category'] === $cat;
            });

            // Sort items within category by updatedAt DESC
            usort($items, function($a, $b) {
                return strtotime($b['updatedAt']) - strtotime($a['updatedAt']);
            });

            $groupedDocuments[] = [
                'category' => $cat,
                'items' => $items
            ];
        }

        return view('documents', ['sections' => $groupedDocuments]);
    }
}
