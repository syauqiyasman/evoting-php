<?php

namespace App\Controllers;

use App\Models\KetuaModel;
use CodeIgniter\RESTful\ResourceController;

class Ketua extends ResourceController
{
    public function __construct()
    {
        $this->KetuaModel = new KetuaModel();
    }

    public function index()
    {
        return $this->respond($this->KetuaModel->ketuaGet());
    }

    // ...
}
