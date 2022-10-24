<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentifikasiModel extends Model
{
    protected $table = 'identifikasi';
    protected $allowedFields = [
        'no_identifikasi', 'sasaran_organisasi', 'kejadian', 'kategori_resiko',
        'penyebab', 'dampak', 'uraian_spi', 'efektivitas',
        'level_kemungkinan', 'level_dampak', 'level_resiko',
        'tingkat_level_resiko', 'prioritas_resiko', 'no_reg_resiko',
        'keputusan_mitigasi', 'user_id', 'pmr_id'
    ];
    protected $useTimestamps = true;

    public function getIdentifikasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->find($id);
    }

    public function getIdentifikasiThead()
    {
        return $this->db->table('identifikasi')->select('id')->get()->getRow();
    }

    public function getIdentifikasiTable()
    {
        return $this->db->table('identifikasi')->select('*')->get()->getResult();
    }

    public function getIdentifikasiKejadian($id)
    {
        return $this->db->table('identifikasi')->select('*')->join('pmr', 'pmr.id = identifikasi.pmr_id')->where('pmr_id', $id)->get()->getResultArray();
    }

    public function setNoRegResiko($id)
    {
        return $this->db->table('identifikasi')->selectMax('no_identifikasi')->where('pmr_id', $id)->get()->getRowArray()['no_identifikasi'];
    }

    public function getKolomIdentifikasi($id)
    {
        return $this->db->table('identifikasi')->select('identifikasi.*, mitigasi_no_reg_resiko')->join('mitigasi', 'mitigasi.identifikasi_id = identifikasi.id')->where('identifikasi.pmr_id', $id)->groupBy('no_identifikasi')->get()->getResultArray();
    }

    public function getIdentifikasiEvaluasi($id)
    {
        return $this->db->table('identifikasi')->select('identifikasi.*, evaluasi.no_reg_resiko as ev_no_reg, evaluasi.kejadian as ev_kejadian')->join('evaluasi', 'evaluasi.identifikasi_id = identifikasi.id')->where('identifikasi.pmr_id', $id)->get()->getResultArray();
    }
}
