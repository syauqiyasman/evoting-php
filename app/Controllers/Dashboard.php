<?php

namespace App\Controllers;

use App\Models\ClassModel;
use App\Models\KetuaModel;
use App\Models\ResultModel;
use App\Models\VoterModel;
use App\Models\WakilModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->VoterModel = new VoterModel();
        $this->ClassModel = new ClassModel();
        $this->KetuaModel = new KetuaModel();
        $this->WakilModel = new WakilModel();
        $this->ResultModel = new ResultModel();
    }

    public function index()
    {
        return view('/dashboard/index');
    }

    public function candidates()
    {
        $data = [
            'ketua' => $this->KetuaModel->ketuaGet(),
            'wakil' => $this->WakilModel->wakilGet(),
        ];
        return view('/dashboard/candidates', $data);
    }

    public function voters()
    {
        $data = [
            'voters' => $this->VoterModel->voterGet()
        ];
        return view('/dashboard/voters', $data);
    }

    public function addvoters()
    {
        $data = [
            'classes' => $this->ClassModel->classGet(),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/addvoters', $data);
    }

    public function editvoters($id)
    {
        $data = [
            'voter' => $this->VoterModel->voterGetId($id),
            'classes' => $this->ClassModel->classGet(),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/editvoters', $data);
    }

    public function addcandidates()
    {
        $data = [
            'classes' => $this->ClassModel->classGet(),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/addcandidates', $data);
    }

    public function editcandidatesketua($id)
    {
        $data = [
            'ketua' => $this->KetuaModel->ketuaGetId($id),
            'classes' => $this->ClassModel->classGet(),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/editcandidates-ketua', $data);
    }

    public function editcandidateswakil($id)
    {
        $data = [
            'wakil' => $this->WakilModel->wakilGetId($id),
            'classes' => $this->ClassModel->classGet(),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/editcandidates-wakil', $data);
    }


    public function result()
    {
        $data = [
            'resultsCount' => $this->ResultModel->countAll(),
            'votersCount' => $this->VoterModel->countAll(),
            'ketuaCount' => $this->ResultModel->resultKetuaGet(),
            'wakilCount' => $this->ResultModel->resultWakilGet(),
        ];
        return view('/dashboard/result', $data);
    }

    public function classes()
    {
        $data = [
            'classes' => $this->ClassModel->classGet(),
        ];

        return view('/dashboard/classes', $data);
    }

    public function addclasses()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('/dashboard/addclasses', $data);
    }

    public function editclasses($id)
    {
        $data = [
            'class' => $this->ClassModel->classGetId($id),
            'validation' => \Config\Services::validation()
        ];
        return view('/dashboard/editclasses', $data);
    }
}
