<?php

namespace App\Controllers;

use \App\Models\KetuaModel;
use \App\Models\WakilModel;

class CandidatesController extends BaseController
{
    public function __construct()
    {
        $this->KetuaModel = new KetuaModel();
        $this->WakilModel = new WakilModel();
    }

    public function addcandidates()
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama'
                ]
            ],
            'visi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan visi'
                ]
            ],
            'misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan misi'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih jabatan'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/dashboard/candidates/add'))->withInput();
        }

        $file = $this->request->getFile("image");

        if ($file->getError() === 4) {
            $image = 'profile.png';
        } else {
            $file->move('img');
            $image = $file->getName();
        }

        $jabatan = $this->request->getPost('jabatan');

        if ($jabatan === "ketua") {
            $this->KetuaModel->ketuaPost($this->request->getPost(), $image);
        } else {
            $this->WakilModel->wakilPost($this->request->getPost(), $image);
        }

        return redirect()->to(base_url('/dashboard/candidates'));
    }

    public function updateketua($id)
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama'
                ]
            ],
            'visi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan visi'
                ]
            ],
            'misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan misi'
                ]
            ],
        ])) {
            return redirect()->to(base_url("/dashboard/candidates/$id/edit-ketua"))->withInput();
        }

        $file = $this->request->getFile("image");

        if ($file->getError() === 4) {
            $this->KetuaModel->ketuaPut($this->request->getPost(), $id);
        } else {
            $file->move('img');
            $image = $file->getName();
            $this->KetuaModel->ketuaPutImage($this->request->getPost(), $image, $id);
        }

        return redirect()->to(base_url('/dashboard/candidates'));
    }

    public function updatewakil($id)
    {
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama'
                ]
            ],
            'visi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan visi'
                ]
            ],
            'misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan misi'
                ]
            ],
        ])) {
            return redirect()->to(base_url("/dashboard/candidates/$id/edit-wakil"))->withInput();
        }

        $file = $this->request->getFile("image");

        if ($file->getError() === 4) {
            $this->WakilModel->wakilPut($this->request->getPost(), $id);
        } else {
            $file->move('img');
            $image = $file->getName();
            $this->WakilModel->WakilPutImage($this->request->getPost(), $image, $id);
        }

        return redirect()->to(base_url('/dashboard/candidates'));
    }

    public function deleteketua($id)
    {
        $this->KetuaModel->delete($id);
        return redirect()->to(base_url('/dashboard/candidates'));
    }

    public function deletewakil($id)
    {
        $this->WakilModel->delete($id);
        return redirect()->to(base_url('/dashboard/candidates'));
    }
}
