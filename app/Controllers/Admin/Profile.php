<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactInfoModel;

class Profile extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactInfoModel();
    }

    public function index()
    {
        $profile = $this->contactModel->first();
        
        $data = [
            'profile' => $profile,
            'title'   => 'Profil Organisasi & Pengaturan Situs'
        ];

        return view('admin/profile/index', $data);
    }

    public function update()
    {
        $profile = $this->contactModel->first();
        $data = $this->request->getPost();

        if ($profile) {
            $this->contactModel->update($profile['id'], $data);
        } else {
            $this->contactModel->save($data);
        }

        return redirect()->to('/admin/profile')->with('success', 'Profil organisasi berhasil diperbarui');
    }
}
