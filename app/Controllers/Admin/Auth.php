<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        return view('admin/login');
    }

    public function login()
    {
        $session = session();
        $model = new AdminModel();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        $admin = $model->where('username', $username)->first();
        
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                if ($admin['isActive']) {
                    $session->set([
                        'adminId'    => $admin['id'],
                        'adminName'  => $admin['username'],
                        'adminRole'  => $admin['role'],
                        'isLoggedIn' => true,
                    ]);
                    return redirect()->to('/admin');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Akun Anda sedang dinonaktifkan.');
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->withInput()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}
