<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'results';
    protected $primaryKey           = 'id_result';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'object';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['id_ketua', 'id_wakil'];

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

    public function resultPost($id_ketua, $id_wakil)
    {
        $this->save([
            'id_ketua' => $id_ketua,
            'id_wakil' => $id_wakil,
        ]);
    }

    public function resultKetuaGet()
    {
        return $this->db->table('results')
            ->select('results.id_ketua, COUNT(results.id_ketua) AS count, ketua.name AS ketua_name')
            ->join('ketua', 'ketua.id_ketua = results.id_ketua')
            ->groupBy('id_ketua')
            ->get()->getResult();
    }

    public function resultWakilGet()
    {
        return $this->db->table('results')
            ->select('results.id_wakil, COUNT(results.id_wakil) AS count, wakil.name AS wakil_name')
            ->join('wakil', 'wakil.id_wakil = results.id_wakil')
            ->groupBy('id_wakil')
            ->get()->getResult();
    }
}
