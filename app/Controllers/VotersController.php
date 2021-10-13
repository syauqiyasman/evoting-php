<?php

namespace App\Controllers;

use \App\Models\VoterModel;

class VotersController extends BaseController
{
    public function __construct()
    {
        $this->VoterModel = new VoterModel();
    }

    public function addvoters()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[voters.username]',
                'errors' => [
                    'required' => 'Masukkan username',
                    'is_unique' => 'Username tidak tersedia'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan password'
                ]
            ],
            'confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password',
                    'matches' => 'Password tidak sesuai',
                ]
            ],
        ])) {
            return redirect()->to(base_url('/dashboard/voters/add'))->withInput();
        }

        $this->VoterModel->voterPost($this->request->getPost());
        return redirect()->to(base_url('/dashboard/voters'));
    }

    public function updatevoters($id)
    {
        if ($this->request->getPost('password') === "") {
            if (!$this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Masukkan nama',
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[voters.username,id_voter,' . $id . ']',
                    'errors' => [
                        'required' => 'Masukkan username',
                        'is_unique' => 'Username tidak tersedia'
                    ]
                ],
                'confirm' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Password tidak sesuai',
                    ]
                ],
            ])) {
                return redirect()->to(base_url("/dashboard/voters/$id/edit"))->withInput();
            }
            $this->VoterModel->voterPutWithoutPassword($this->request->getPost(), $id);
            return redirect()->to(base_url('/dashboard/voters'));
        }

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[voters.username,id_voter,' . $id . ']',
                'errors' => [
                    'required' => 'Masukkan username',
                    'is_unique' => 'Username tidak tersedia'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan password',
                ]
            ],
            'confirm' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi password',
                    'matches' => 'Password tidak sesuai',
                ]
            ],
        ])) {
            return redirect()->to(base_url("/dashboard/voters/$id/edit"))->withInput();
        }
        $this->VoterModel->voterPut($this->request->getPost(), $id);
        return redirect()->to(base_url('/dashboard/voters'));
    }

    public function deletevoters()
    {
        $this->VoterModel->delete($this->request->getPost('_delete_'));
        return redirect()->to(base_url('/dashboard/voters'));
    }
}
