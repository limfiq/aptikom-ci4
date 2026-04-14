<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DocumentModel;

class Documents extends BaseController
{
    protected $documentModel;

    public function __construct()
    {
        $this->documentModel = new DocumentModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Dokumen & Panduan',
            'documents' => $this->documentModel->orderBy('createdAt', 'DESC')->findAll(),
        ];

        return view('admin/documents/index', $data);
    }

    public function store()
    {
        $data = [
            'title'       => $this->request->getPost('title'),
            'category'    => $this->request->getPost('category'),
            'fileUrl'     => $this->request->getPost('fileUrl'),
            'size'        => $this->request->getPost('size'),
            'description' => $this->request->getPost('description'),
        ];

        $this->documentModel->save($data);

        return redirect()->to('/admin/documents')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    public function update($id)
    {
        $data = [
            'title'       => $this->request->getPost('title'),
            'category'    => $this->request->getPost('category'),
            'fileUrl'     => $this->request->getPost('fileUrl'),
            'size'        => $this->request->getPost('size'),
            'description' => $this->request->getPost('description'),
        ];

        $this->documentModel->update($id, $data);

        return redirect()->to('/admin/documents')->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->documentModel->delete($id);
        return redirect()->to('/admin/documents')->with('success', 'Dokumen berhasil dihapus.');
    }
}
