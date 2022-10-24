<?php

namespace App\Controllers;

use App\Models\EvaluasiModel;
use App\Models\IdentifikasiModel;
use App\Models\PmrModel;

class GrafikMitigasi extends BaseController
{
    protected $pmrModel, $identifikasiModel, $evaluasiModel;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->identifikasiModel = new IdentifikasiModel();
        $this->evaluasiModel = new EvaluasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Grafik Peta Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('grafik_mitigasi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => "Grafik Peta Resiko",
            'pmr'           => $this->pmrModel->getPmr($id),
            'identifikasi'  => $this->identifikasiModel->getIdentifikasiEvaluasi($id),
            'evaluasi'      => $this->evaluasiModel->getKolomEvaluasi($id),
            'level_resiko'  => $this->evaluasiModel->getKolomEvaluasi($id),
        ];
        return view('grafik_mitigasi/detail', $data);
    }
}
