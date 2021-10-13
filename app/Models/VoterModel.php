<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class VoterModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'voters';
    protected $primaryKey           = 'id_voter';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["name", "username", "password", "id_class", "status", "voted_at"];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];



    public function voterPost($params)
    {
        $this->save([
            'name' => $params['name'],
            'id_class' => $params['class'],
            'username' => $params['username'],
            'password' => $params['password'],
        ]);
    }

    public function voterGet()
    {
        return $this->table('voters')->join('classes', 'classes.id_class = voters.id_class')->orderBy('voters.id_class ASC')->get()->getResult();
    }

    public function voterGetId($id)
    {
        return $this->where(['id_voter' => $id])->join('classes', 'classes.id_class = voters.id_class')->first();
    }

    public function voterPut($params, $id)
    {
        $this->save([
            'id_voter' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'username' => $params['username'],
            'password' => $params['password'],
        ]);
    }

    public function voterPutWithoutPassword($params, $id)
    {
        $this->save([
            'id_voter' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'username' => $params['username'],
        ]);
    }

    public function resultPost($id)
    {
        $this->save([
            'id_voter' => $id,
            'status' => 0,
            'voted_at' => new Time('now', 'Asia/Jakarta', 'id'),
        ]);
    }
}
