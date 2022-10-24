<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluasiModel extends Model
{
    protected $table = 'evaluasi';
    protected $allowedFields = [
        'prioritas_resiko', 'no_reg_resiko', 'kejadian', 'level_kemungkinan_sebelumnya',
        'level_dampak_sebelumnya', 'level_resiko_sebelumnya', 'tingkat_level_resiko_sebelumnya',
        'level_kemungkinan_harapan', 'level_dampak_harapan', 'level_resiko_harapan',
        'tingkat_level_resiko_harapan', 'level_kemungkinan_actual', 'level_dampak_actual',
        'level_resiko_actual', 'tingkat_level_resiko_actual', 'trend_resiko', 'deviasi_resiko',
        'rekomendasi', 'user_id', 'pmr_id', 'identifikasi_id', 'mitigasi_id'
    ];
    protected $useTimestamps = true;

    public function getEvaluasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getEvaluasiThead()
    {
        return $this->db->table('evaluasi')->select('id')->get()->getRow();
    }

    public function getKolomEvaluasi($id)
    {
        return $this->db->table('evaluasi')->select('*')->where('pmr_id', $id)->get()->getResultArray();
    }
}
