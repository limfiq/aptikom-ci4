<?php

namespace App\Controllers;

use App\Models\ContactMessageModel;
use App\Models\ContactInfoModel;

class Contact extends BaseController
{
    public function index(): string
    {
        $orgProfileModel = new \App\Models\OrganizationProfileModel();
        // Ambil profil organisasi dari database; fallback ke default jika kosong
        $info = $orgProfileModel->first() ?? [
            'name'         => 'APTIKOM Jatim',
            'fullName'     => 'Asosiasi Pendidikan Tinggi Informatika dan Komputer Jawa Timur',
            'address'      => 'Jl. AMIKOM No. 1, Condongcatur, Depok',
            'city'         => 'Yogyakarta',
            'province'     => 'Daerah Istimewa Yogyakarta',
            'postalCode'   => '55283',
            'phone'        => '+62 274 884201',
            'email'        => 'sekretariat@aptikom.org',
            'weekdayHours' => 'Senin – Jumat: 08:00 – 16:00',
            'weekendHours' => 'Sabtu – Minggu: Tutup',
            'latitude'     => '-7.75466',
            'longitude'    => '110.40712',
            'facebook'     => '',
            'twitter'      => '',
            'instagram'    => '',
            'linkedin'     => '',
        ];

        return view('contact', ['info' => $info]);
    }

    public function submit()
    {
        // ─── Honeypot: bot akan mengisi field "website" yang tersembunyi ────────────────
        if (!empty($this->request->getPost('website'))) {
            // Bot terdeteksi — diam-diam berhasil dari sudut pandang bot, tapi tidak disimpan
            return redirect()->to('/contact')->with('success', 'Pesan Anda berhasil dikirim!');
        }

        // ─── Validation (Anti SQL Injection: CI4 Query Builder pakai prepared statement) ───
        $rules = [
            'name'    => [
                'label' => 'Nama',
                'rules' => 'required|min_length[3]|max_length[100]|alpha_space',
            ],
            'email'   => [
                'label' => 'Email',
                'rules' => 'required|valid_email|max_length[150]',
            ],
            'subject' => [
                'label' => 'Subjek',
                'rules' => 'required|min_length[5]|max_length[200]',
            ],
            'message' => [
                'label' => 'Pesan',
                'rules' => 'required|min_length[10]|max_length[2000]',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ─── Sanitize: strip tags sebelum simpan ──────────────────────────────────────────
        $model = new ContactMessageModel();
        $saved = $model->insert([
            'name'    => strip_tags($this->request->getPost('name',    FILTER_SANITIZE_SPECIAL_CHARS)),
            'email'   => strip_tags($this->request->getPost('email',   FILTER_SANITIZE_EMAIL)),
            'subject' => strip_tags($this->request->getPost('subject', FILTER_SANITIZE_SPECIAL_CHARS)),
            'message' => strip_tags($this->request->getPost('message', FILTER_SANITIZE_SPECIAL_CHARS)),
            'isRead'  => 0,
        ]);

        if ($saved) {
            return redirect()->to('/contact')->with('success', 'Pesan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
        }

        return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
    }
}
