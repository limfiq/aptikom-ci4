<?php

namespace App\Controllers;

class Journals extends BaseController
{
    public function index(): string
    {
        // Mock data for Journal
        $journals = [
            [
                'id' => 1,
                'title' => 'JOIV : International Journal on Informatics Visualization',
                'publisher' => 'APTIKOM Jatim',
                'rank' => 'Sinta 1 / Scopus Q2',
                'link' => 'http://joiv.org/index.php/joiv'
            ],
            [
                'id' => 2,
                'title' => 'Jurnal RESTI (Rekayasa Sistem dan Teknologi Informasi)',
                'publisher' => 'Ikatan Ahli Informatika Indonesia (IAII)',
                'rank' => 'Sinta 1',
                'link' => 'http://jurnal.iaii.or.id/'
            ],
            [
                'id' => 3,
                'title' => 'IAES International Journal of Artificial Intelligence (IJ-AI)',
                'publisher' => 'IAES',
                'rank' => 'Scopus Q2',
                'link' => 'http://ijai.iaescore.com/'
            ],
            [
                'id' => 4,
                'title' => 'Jurnal Informatika',
                'publisher' => 'Program Studi Informatika - Universitas Ahmad Dahlan',
                'rank' => 'Sinta 2',
                'link' => 'http://journal.uad.ac.id/index.php/jurnal_informatika'
            ],
            [
                'id' => 5,
                'title' => 'Journal of ICT Research and Applications',
                'publisher' => 'ITB Press',
                'rank' => 'Sinta 2 / Scopus Q4',
                'link' => 'https://journals.itb.ac.id/index.php/jictra'
            ]
        ];

        return view('journals', ['journals' => $journals]);
    }
}
