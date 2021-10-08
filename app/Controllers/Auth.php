<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Auth extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('index', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_not_unique[admins.username]',
                'errors' => [
                    'required' => 'Login gagal',
                    'is_not_unique' => 'Login gagal',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Login gagal',
                ]
            ],
        ])) {
            return redirect()->to(base_url('/'))->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $adminmodel = new AdminModel();
        $account_info = $adminmodel->where('username', $username)->first();

        if ($password !== $account_info->password) {
            return redirect()->to(base_url('/'));
        } else {
            return redirect()->to(base_url('/dashboard/'));
        }
    }
}
