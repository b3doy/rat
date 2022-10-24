<?php

namespace App\Controllers;

use App\Models\LevelDampakModel;
use App\Models\LevelKemungkinanModel;
use App\Models\PmrModel;
use App\Models\SaronModel;
use App\Models\SmrModel;
use App\Models\StakeholderModel;

class Piagam extends BaseController
{
    protected $pmrModel, $saronModel, $smrModel, $stakeholderModel,
        $levelKemungkinanModel, $levelDampakModel;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->saronModel = new SaronModel();
        $this->smrModel = new SmrModel();
        $this->stakeholderModel = new StakeholderModel();
        $this->levelKemungkinanModel = new LevelKemungkinanModel();
        $this->levelDampakModel = new LevelDampakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Piagam Manajemen Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('piagam/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => "Piagam Manajemen Resiko",
            'pmr'           => $this->pmrModel->getPmr($id),
            'saron'         => $this->saronModel->getKolomSaron($id),
            'smr'           => $this->smrModel->getKolomSmr($id),
            'stakeholder'   => $this->stakeholderModel->getKolomStakeholder($id),
            'kemungkinan'   => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'dampak'        => $this->levelDampakModel->getLevelDampak(),
        ];
        return view('piagam/detail', $data);
    }
}
