<?php

namespace App\Models;

use CodeIgniter\Model;

class KetuaModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ketua';
    protected $primaryKey           = 'id_ketua';
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

    public function ketuaPost($params, $image)
    {
        $this->save([
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
            'image' => $image,
        ]);
    }

    public function ketuaGet()
    {
        return $this->db->table('ketua')->join('classes', 'classes.id_class = ketua.id_class')->orderBy('ketua.id_class ASC')->get()->getResult();
    }

    public function ketuaGetId($id)
    {
        return $this->where(['id_ketua' => $id])->join('classes', 'classes.id_class = ketua.id_class')->first();
    }

    public function ketuaPut($params, $id)
    {
        $this->save([
            'id_ketua' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
        ]);
    }

    public function ketuaPutImage($params, $image, $id)
    {
        $this->save([
            'id_ketua' => $id,
            'name' => $params['name'],
            'id_class' => $params['class'],
            'visi' => $params['visi'],
            'misi' => $params['misi'],
            'image' => $image,
        ]);
    }
}
