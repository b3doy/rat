<?php

namespace App\Controllers;

use App\Models\IdentifikasiModel;
use App\Models\PmrModel;

class Profile extends BaseController
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
            'title' => 'Laporan Profile / Identifikasi Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('profile/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => "Laporan Profile / Identifikasi Resiko",
            'pmr'           => $this->pmrModel->getPmr($id),
            'identifikasi'  => $this->identifikasiModel->getKolomIdentifikasi($id),
        ];
        return view('profile/detail', $data);
    }
}
