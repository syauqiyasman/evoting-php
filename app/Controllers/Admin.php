<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        if ($this->AdminModel->first() === null) {
            return view('/register', $data);
        }

        return view('/admin', $data);
    }

    public function register()
    {
        if (!$this->validate([
            'username' => 'required',
            'password'  => 'required',
            'confirm' => 'required|matches[password]'

        ])) {
            return redirect()->to(base_url('/admin'))->withInput();
        }

        $this->AdminModel->adminRegister($this->request->getPost());
        session()->set('login', "New Admin");
        return redirect()->to(base_url('/dashboard'));
    }

    public function login()
    {
        if (!$this->validate([
            'username' => 'required|is_not_unique[admins.username]',
            'password'  => 'required',

        ])) {
            return redirect()->to(base_url('/admin'))->withInput();
        }

        $username = $this->request->getPost('username');
        $inputPassword = $this->request->getPost('password');
        $admin = $this->AdminModel->where('username', $username)->first();
        $password = password_verify($inputPassword, $admin->password);

        if (!$password) {
            session()->setFlashdata('gagal', 'Login gagal');
            return redirect()->to(base_url('/admin'))->withInput();
        } else {
            session()->set('login', $admin->id);
            return redirect()->to(base_url('/dashboard/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/admin'));
    }
}
