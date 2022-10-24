<?php

namespace App\Models;

use CodeIgniter\Model;

class StakeholderModel extends Model
{
    protected $table = 'stakeholder';
    protected $allowedFields = [
        'stakeholder', 'keterangan', 'user_id', 'pmr_id'
    ];
    protected $useTimestamps = true;

    public function getStakeholder($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getStakeholderThead()
    {
        return $this->db->table('stakeholder')->select('id')->get()->getRow();
    }

    public function getKolomStakeholder($id)
    {
        return  $this->db->table('stakeholder')->select('*')->join('pmr', 'pmr.id = stakeholder.pmr_id')->where('pmr_id', $id)->get()->getResultArray();
    }
}
