<?php

namespace App\Models;

use CodeIgniter\Model;

class MitigasiModel extends Model
{
    protected $table = 'mitigasi';
    protected $allowedFields = [
        'mitigasi_kejadian', 'mitigasi_prioritas_resiko', 'mitigasi_no_reg_resiko',
        'opsi_mitigasi', 'keg_pengendalian_tambahan', 'target', 'jadwal_implementasi',
        'penanggung_jawab', 'mitigasi_level_kemungkinan', 'mitigasi_level_dampak',
        'mitigasi_level_resiko', 'mitigasi_tingkat_level_resiko', 'mitigasi_dilaksanakan',
        'capaian_target', 'user_id', 'pmr_id', 'identifikasi_id',
    ];
    protected $useTimestamps = true;

    public function getMitigasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getMitigasiThead()
    {
        return $this->db->table('mitigasi')->select('id')->get()->getRow();
    }

    public function getMitigasiKejadian($id)
    {
        return $this->db->table('mitigasi')->select('*')->join('pmr', 'pmr.id = mitigasi.pmr_id')->where('pmr_id', $id)->get()->getResultArray();
    }

    public function getKolomMitigasi($id)
    {
        return $this->db->table('mitigasi')->select('*')->where('pmr_id', $id)->get()->getResultArray();
    }
}
