<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\KetuaModel;
use App\Models\ResultModel;
use App\Models\VoterModel;
use App\Models\WakilModel;

class Application extends BaseController
{
    public function __construct()
    {
        $this->VoterModel = new VoterModel();
        $this->ResultModel = new ResultModel();
        $this->KetuaModel = new KetuaModel();
        $this->WakilModel = new WakilModel();
        $this->AdminModel = new AdminModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];

        if ($this->AdminModel->first() === null) {
            return view('/register', $data);
        }

        return view('application/login', $data);
    }


    public function vote()
    {
        $data = [
            'ketua' => $this->KetuaModel->ketuaGet(),
            'wakil' => $this->WakilModel->wakilGet(),
        ];

        return view('application/vote', $data);
    }

    public function votePost($id)
    {
        $id_ketua = $this->request->getPost('id_ketua');
        $id_wakil = $this->request->getPost('id_wakil');

        $voter = $this->VoterModel->voterGetId($id);

        if ($voter->status < 1) {
            session()->remove('voterlogin');
            return redirect()->to(base_url('/curang'));
        }

        $this->db->transStart();
        $this->VoterModel->resultPost($id);
        $this->ResultModel->resultPost($id_ketua, $id_wakil);
        $this->db->transComplete();

        session()->remove('voterlogin');
        session()->set('votedVoter', $id);
        return redirect()->to(base_url('/response'));
    }

    public function response()
    {
        return view('application/response');
    }
}
