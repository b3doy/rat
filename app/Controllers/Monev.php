<?php

namespace App\Controllers;

use App\Models\EvaluasiModel;
use App\Models\PmrModel;

class Monev extends BaseController
{
    protected $pmrModel, $evaluasiModel;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->evaluasiModel = new EvaluasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Evaluasi. Pemantauan dan Review Proses Manajemen Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('monev/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'     => "Laporan Evaluasi. Pemantauan dan Review Proses Manajemen Resiko",
            'pmr'       => $this->pmrModel->getPmr($id),
            'evaluasi'  => $this->evaluasiModel->getKolomEvaluasi($id)
        ];
        return view('monev/detail', $data);
    }
}
