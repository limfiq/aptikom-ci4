<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index(): string
    {
        $category = $this->request->getGet('category');

        $builder = $this->postModel->where('status', 'published')->orderBy('createdAt', 'DESC');
        if ($category) {
            $builder->where('category', $category);
        }

        $posts = $builder->findAll();

        // Daftar kategori unik untuk filter
        $categories = $this->postModel
            ->select('category')
            ->where('status', 'published')
            ->distinct()
            ->findAll();

        return view('news_list', [
            'posts'      => $posts,
            'categories' => array_column($categories, 'category'),
            'active_cat' => $category,
        ]);
    }

    public function read($slug): string
    {
        $post = $this->postModel->where('slug', $slug)->where('status', 'published')->first();

        if (!$post) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Berita lainnya (kecuali yang sedang dibaca)
        $related = $this->postModel
            ->where('status', 'published')
            ->where('id !=', $post['id'])
            ->where('category', $post['category'])
            ->orderBy('createdAt', 'DESC')
            ->findAll(3);

        return view('news_detail', [
            'post'    => $post,
            'related' => $related,
        ]);
    }

    // Backward-compat: route lama /news/(:num) dialihkan ke read by id
    public function detail($id): string
    {
        $post = $this->postModel->where('status', 'published')->find((int) $id);

        if (!$post) {
            throw PageNotFoundException::forPageNotFound();
        }

        return redirect()->to('/news/read/' . ($post['slug'] ?: $post['id']));
    }
}
