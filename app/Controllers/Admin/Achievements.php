<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AchievementModel;

class Achievements extends BaseController
{
    protected $achievementModel;

    public function __construct()
    {
        $this->achievementModel = new AchievementModel();
    }

    public function index()
    {
        $data = [
            'achievements' => $this->achievementModel->orderBy('date', 'DESC')->findAll(),
            'title'        => 'Manajemen Prestasi'
        ];

        return view('admin/achievements/index', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title'    => 'required',
            'date'     => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->achievementModel->save($this->request->getPost());
        return redirect()->to('/admin/achievements')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function update($id)
    {
        if (!$this->validate([
            'title'    => 'required',
            'date'     => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->achievementModel->update($id, $this->request->getPost());
        return redirect()->to('/admin/achievements')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->achievementModel->delete($id);
        return redirect()->to('/admin/achievements')->with('success', 'Prestasi berhasil dihapus');
    }
}
