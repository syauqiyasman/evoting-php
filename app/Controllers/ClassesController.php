<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClassModel;

class ClassesController extends BaseController
{
    public function __construct()
    {
        $this->ClassModel = new ClassModel();
    }

    public function addClasses()
    {
        if (!$this->validate([
            'class' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/dashboard/classes/add'))->withInput();
        }

        $this->ClassModel->classPost($this->request->getPost());
        return redirect()->to(base_url('/dashboard/classes'));
    }

    public function updateclasses($id)
    {
        if (!$this->validate([
            'class' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas'
                ]
            ],
        ])) {
            return redirect()->to(base_url("/dashboard/classes/$id/edit"))->withInput();
        }
        $this->ClassModel->classPut($this->request->getPost(), $id);
        return redirect()->to(base_url('/dashboard/classes'));
    }

    public function deleteclasses()
    {
        $this->ClassModel->delete($this->request->getPost('_delete_'));
        return redirect()->to(base_url('/dashboard/classes'));
    }
}
