<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostModel;

class News extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data = [
            'posts' => $this->postModel->orderBy('createdAt', 'DESC')->findAll(),
            'title' => 'Manajemen Berita'
        ];

        return view('admin/news/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Berita Baru',
            'categories' => ['news', 'article', 'announcement']
        ];

        return view('admin/news/form', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'title'    => 'required|min_length[5]|max_length[255]',
            'content'  => 'required',
            'category' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->postModel->save([
            'title'    => $this->request->getPost('title'),
            'content'  => $this->request->getPost('content'),
            'category' => $this->request->getPost('category'),
            'image'    => $this->request->getPost('image') ?: null,
        ]);

        return redirect()->to('/admin/news')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = $this->postModel->find($id);

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'      => 'Edit Berita',
            'post'       => $post,
            'categories' => ['news', 'article', 'announcement']
        ];

        return view('admin/news/form', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'title'    => 'required|min_length[5]|max_length[255]',
            'content'  => 'required',
            'category' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->postModel->update($id, [
            'title'    => $this->request->getPost('title'),
            'content'  => $this->request->getPost('content'),
            'category' => $this->request->getPost('category'),
            'image'    => $this->request->getPost('image') ?: null,
        ]);

        return redirect()->to('/admin/news')->with('success', 'Berita berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/admin/news')->with('success', 'Berita berhasil dihapus');
    }
}
