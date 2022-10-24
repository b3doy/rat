<?php

namespace App\Controllers;

use App\Models\PmrModel;
use App\Models\StakeholderModel;
use Config\Services;

class Stakeholder extends BaseController
{
    protected $stakeholderModel, $pmrModel;

    public function __construct()
    {
        $this->stakeholderModel = new StakeholderModel();
        $this->pmrModel = new PmrModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Stakeholder',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('stakeholder/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'             => 'Stakeholder',
            'stakeholder'       => $this->stakeholderModel->getStakeholder(),
            'stakeholderThead'  => $this->stakeholderModel->getStakeholderThead(),
            'pmr'               => $this->pmrModel->getPmr($id)
        ];
        return view('stakeholder/detail', $data);
    }

    public function create($id)
    {
        $data = [
            'title'         => 'Input Data Stakeholder',
            'validasi'      => Services::validation(),
            'stakeholder'   => $this->stakeholderModel->getStakeholder(),
            'pmr'           => $this->pmrModel->getPmr($id),
        ];
        return view('stakeholder/create', $data);
    }

    public function save($id)
    {
        // Validasi
        if (!$this->validate([
            'stakeholder'  => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ],
        ])) {
            return redirect()->to(base_url('/stakeholder/create/' . $id))->withInput();
        }
        $sql = $this->stakeholderModel->save([
            'stakeholder'   => $this->request->getVar('stakeholder'),
            'keterangan'    => $this->request->getVar('keterangan'),
            'user_id'       => $this->request->getVar('user_id'),
            'pmr_id'        => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Stakeholder Berhasil Disimpan dan Ditambahkan !');
            return redirect()->to(base_url('/stakeholder/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Stakeholder !!!');
            return redirect()->to(base_url('/stakeholder/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Data Stakeholder',
            'stakeholder'   => $this->stakeholderModel->getStakeholder($id),
            'validasi'      => Services::validation(),
        ];
        return view('stakeholder/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi
        if (!$this->validate([
            'stakeholder'  => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->stakeholderModel->save([
            'stakeholder'   => $this->request->getVar('stakeholder'),
            'keterangan'    => $this->request->getVar('keterangan'),
            'user_id'       => $this->request->getVar('user_id'),
            'pmr_id'        => $pmr_id,
            'id'            => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Stakeholder Berhasil Di-UPDATE !');
            return redirect()->to(base_url('/stakeholder/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal MENGUPDATE Data Stakeholder !!!');
            return redirect()->to(base_url('/stakeholder/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->stakeholderModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Stakeholder Berhasil Di-HAPUS !');
            return redirect()->back();
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Stakeholder !!!');
            return redirect()->back();
        }
    }
}
