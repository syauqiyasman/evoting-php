<?php

namespace App\Models;

use CodeIgniter\Model;

class VoterModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'voters';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["name", "username", "password", "id_class"];

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
        return $this->findAll();
    }

    public function voterGetId($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function voterPut($params, $id)
    {
        $this->save([
            'id' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'username' => $params['username'],
            'password' => $params['password'],
        ]);
    }

    public function voterDelete()
    {
        //
    }
}
