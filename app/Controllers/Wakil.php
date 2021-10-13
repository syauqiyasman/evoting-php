<?php

namespace App\Controllers;

use App\Models\WakilModel;
use CodeIgniter\RESTful\ResourceController;

class Wakil extends ResourceController
{
    public function __construct()
    {
        $this->WakilModel = new WakilModel();
    }

    public function index()
    {
        return $this->respond($this->WakilModel->wakilGet());
    }

    // ...
}
