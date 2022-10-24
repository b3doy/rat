<?php

namespace App\Models;

use CodeIgniter\Model;

class SaronModel extends Model
{
    protected $table = 'saron';
    protected $allowedFields = [
        'daftar_sasaran', 'indikator', 'user_id', 'pmr_id'
    ];
    protected $useTimestamps = true;

    public function getSaron($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getSaronThead()
    {
        return $this->db->table('saron')->select('id')->get()->getRow();
    }

    public function getKolomSaron($id)
    {
        return $this->db->table('saron')->select('*')->where('pmr_id', $id)->get()->getResultArray();
    }
}
