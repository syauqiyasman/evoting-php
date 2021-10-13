<?php

namespace App\Models;

use CodeIgniter\Model;

class WakilModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'wakil';
    protected $primaryKey           = 'id_wakil';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ["name", "id_class", "visi", "misi", "image"];

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

    public function wakilPost($params, $image)
    {
        $this->save([
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
            'image' => $image,
        ]);
    }

    public function wakilGet()
    {
        return $this->db->table('wakil')->join('classes', 'classes.id_class = wakil.id_class')->orderBy('wakil.id_class ASC')->get()->getResult();
    }

    public function wakilGetId($id)
    {
        return $this->where(['id_wakil' => $id])->join('classes', 'classes.id_class = wakil.id_class')->first();
    }

    public function wakilPut($params, $id)
    {
        $this->save([
            'id_wakil' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
        ]);
    }

    public function wakilPutImage($params, $image, $id)
    {
        $this->save([
            'id_wakil' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
            'image' => $image,
        ]);
    }
}
