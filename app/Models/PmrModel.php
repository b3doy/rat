<?php

namespace App\Models;

use CodeIgniter\Model;

class PmrModel extends Model
{
    protected $table = 'pmr';
    protected $allowedFields = [
        'tahun', 'kld', 'nama_unit', 'level_mr_eselon',
        'nama_level_unit', 'ruang_lingkup_penerapan',
        'periode', 'output', 'data_sudah_benar', 'user_id'
    ];
    protected $useTimestamps = true;

    public function getPmr($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getPmrThead()
    {
        return $this->db->table('pmr')->select('id')->get()->getRow();
    }

    public function getPmrSidebar($id)
    {
        return $this->db->table('pmr')->select('pmr.id')->join('saron', 'saron.pmr_id = pmr.id')->where('pmr.id', '$id')->get()->getRowArray();
    }
}
