<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ContactMessageModel;

class Messages extends BaseController
{
    protected $messageModel;

    public function __construct()
    {
        $this->messageModel = new ContactMessageModel();
    }

    public function index()
    {
        // Tandai semua sebagai sudah dibaca saat halaman dibuka
        $data = [
            'messages' => $this->messageModel->orderBy('createdAt', 'DESC')->findAll(),
            'title'    => 'Pesan Masuk',
            'unread'   => $this->messageModel->where('isRead', 0)->countAllResults(),
        ];

        return view('admin/messages/index', $data);
    }

    public function read($id)
    {
        $this->messageModel->update($id, ['isRead' => 1]);
        $msg = $this->messageModel->find($id);
        if (!$msg) {
            return redirect()->to('/admin/messages')->with('error', 'Pesan tidak ditemukan.');
        }
        return view('admin/messages/detail', ['msg' => $msg, 'title' => 'Detail Pesan']);
    }

    public function delete($id)
    {
        $this->messageModel->delete($id);
        return redirect()->to('/admin/messages')->with('success', 'Pesan berhasil dihapus.');
    }

    public function markAllRead()
    {
        $this->messageModel->where('isRead', 0)->set(['isRead' => 1])->update();
        return redirect()->to('/admin/messages')->with('success', 'Semua pesan telah ditandai dibaca.');
    }
}
