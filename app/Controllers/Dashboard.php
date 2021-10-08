<?php

namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\VoterModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->VoterModel = new VoterModel();
        $this->ClassModel = new ClassModel();
    }

    public function index()
    {
        return view('/dashboard/index');
    }

    public function candidates()
    {
        return view('/dashboard/candidates');
    }

    public function voters()
    {
        $data = [
            'voters' => $this->VoterModel->voterGet()
        ];
        return view('/dashboard/voters', $data);
    }

    public function result()
    {
        return view('/dashboard/result');
    }

    public function addvoters()
    {
        $data = [
            'classes' => $this->ClassModel->classGet()
        ];
        return view('/dashboard/addvoters', $data);
    }

    public function editvoters($id)
    {
        $data = [
            'voter' => $this->VoterModel->voterGetId($id),
            'classes' => $this->ClassModel->classGet()
        ];
        return view('/dashboard/editvoters', $data);
    }
}
