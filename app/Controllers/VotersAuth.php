<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VoterModel;

class VotersAuth extends BaseController
{
    public function __construct()
    {
        $this->VoterModel = new VoterModel();
    }

    public function login()
    {
        if (!$this->validate([
            'username' => 'required|is_not_unique[voters.username]',
            'password'  => 'required',

        ])) {
            return redirect()->to(base_url('/'))->withInput();
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $voter = $this->VoterModel->where('username', $username)->first();

        if ($password !== $voter->password) {
            session()->setFlashdata('gagal', 'Login gagal');
            return redirect()->to(base_url('/'))->withInput();
        } else {
            if ($voter->status < 1) {
                session()->set('votedVoter', $voter->id_voter);
                return redirect()->to(base_url('/response'));
            } else {
                session()->set('voterlogin', $voter->id_voter);
                return redirect()->to(base_url('/vote'));
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
