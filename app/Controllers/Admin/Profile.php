<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrganizationProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new OrganizationProfileModel();
    }

    public function index()
    {
        $profile = $this->profileModel->first();
        
        $data = [
            'profile' => $profile,
            'title'   => 'Profil Organisasi & Pengaturan Situs'
        ];

        return view('admin/profile/index', $data);
    }

    public function update()
    {
        $profile = $this->profileModel->first();
        $data = $this->request->getPost();

        if ($profile) {
            $this->profileModel->update($profile['id'], $data);
        } else {
            $this->profileModel->save($data);
        }

        return redirect()->to('/admin/profile')->with('success', 'Profil organisasi berhasil diperbarui');
    }
}
