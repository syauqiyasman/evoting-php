<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'classes';
    protected $primaryKey           = 'id_class';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['class'];

    // Dates
    protected $useTimestamps        = false;
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

    public function classGet()
    {
        return $this->findAll();
    }

    public function classPost($params)
    {
        $this->save([
            'class' => $params['class']
        ]);
    }

    public function classGetId($id)
    {
        return $this->where(['id_class' => $id])->first();
    }

    public function classPut($params, $id)
    {
        $this->save([
            'id_class' => $id,
            'class' => $params['class']
        ]);
    }
}
