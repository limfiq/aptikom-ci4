<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PartnerModel;

class Partners extends BaseController
{
    protected $partnerModel;

    public function __construct()
    {
        $this->partnerModel = new PartnerModel();
    }

    public function index()
    {
        $data = [
            'partners' => $this->partnerModel->orderBy('name', 'ASC')->findAll(),
            'title'    => 'Manajemen Mitra'
        ];

        return view('admin/partners/index', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'name' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->partnerModel->save($this->request->getPost());
        return redirect()->to('/admin/partners')->with('success', 'Mitra berhasil ditambahkan');
    }

    public function update($id)
    {
        if (!$this->validate([
            'name' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->partnerModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/partners')->with('success', 'Mitra berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->partnerModel->delete($id);
        return redirect()->to('/admin/partners')->with('success', 'Mitra berhasil dihapus');
    }
}
