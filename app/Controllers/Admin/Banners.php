<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class Banners extends BaseController
{
    protected $bannerModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        $data = [
            'banners' => $this->bannerModel->orderBy('order', 'ASC')->findAll(),
            'title'   => 'Manajemen Banner (Hero Section)'
        ];

        return view('admin/banners/index', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title'    => 'required',
            'subtitle' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['isActive'] = $this->request->getPost('isActive') ? 1 : 0;
        
        $this->bannerModel->save($data);
        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil ditambahkan');
    }

    public function update($id)
    {
        if (!$this->validate([
            'title'    => 'required',
            'subtitle' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $data['isActive'] = $this->request->getPost('isActive') ? 1 : 0;

        $this->bannerModel->update($id, $data);
        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->bannerModel->delete($id);
        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil dihapus');
    }
}
