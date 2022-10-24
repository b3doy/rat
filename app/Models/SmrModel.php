<?php

namespace App\Models;

use CodeIgniter\Model;

class SmrModel extends Model
{
    protected $table = 'smr';
    protected $allowedFields = [
        'nama', 'jabatan', 'user_id', 'pmr_id'
    ];
    protected $useTimestamps = true;

    public function getSmr($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getSmrThead()
    {
        return $this->db->table('smr')->select('id')->get()->getRow();
    }

    public function getKolomSmr($id)
    {
        return $this->db->table('smr')->select('*')->where('pmr_id', $id)->get()->getResultArray();
    }
}
