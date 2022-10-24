<?php

namespace App\Controllers;

use App\Models\IdentifikasiModel;
use App\Models\PmrModel;

class GrafikResiko extends BaseController
{
    protected $pmrModel, $identifikasiModel;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->identifikasiModel = new IdentifikasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Grafik Peta Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('grafik_resiko/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => "Grafik Peta Resiko",
            'pmr'           => $this->pmrModel->getPmr($id),
            'identifikasi'  => $this->identifikasiModel->getIdentifikasiEvaluasi($id),
            'level_resiko'  => $this->identifikasiModel->getIdentifikasiEvaluasi($id),
        ];
        return view('grafik_resiko/detail', $data);
    }
}
