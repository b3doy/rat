<?php

namespace App\Controllers;

use App\Models\MitigasiModel;
use App\Models\PmrModel;

class Rtp extends BaseController
{
    protected $pmrModel, $mitigasiModel;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->mitigasiModel = new MitigasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Mitigasi Resiko (RTP)',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('rtp/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'     => "Laporan Mitigasi Resiko (RTP)",
            'pmr'       => $this->pmrModel->getPmr($id),
            'mitigasi'  => $this->mitigasiModel->getKolomMitigasi($id),
        ];
        return view('rtp/detail', $data);
    }
}
