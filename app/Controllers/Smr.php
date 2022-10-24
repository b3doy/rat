<?php

namespace App\Controllers;

use App\Models\PmrModel;
use App\Models\SmrModel;
use Config\Services;

class Smr extends BaseController
{
    protected $smrModel, $pmrModel;

    public function __construct()
    {
        $this->smrModel = new SmrModel();
        $this->pmrModel = new PmrModel();
    }

    public function index()
    {
        $data = [
            'title'     => 'Struktur Manajemen Resiko',
            'smr'       => $this->smrModel->getSmr(),
            'pmr'       => $this->pmrModel->getPmr()
        ];
        return view('smr/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'     => 'Struktur Manajemen Resiko',
            'smr'       => $this->smrModel->getSmr(),
            'smrThead'  => $this->smrModel->getSmrThead(),
            'pmr'       => $this->pmrModel->getPmr($id)
        ];
        return view('smr/detail', $data);
    }

    public function create($id)
    {
        $data = [
            'title'     => 'Input Data Struktur Manajemen Resiko',
            'validasi'  => Services::validation(),
            'pmr'       => $this->pmrModel->getPmr($id),
            'smr'       => $this->smrModel->getSmr()
        ];
        return view('smr/create', $data);
    }

    public function save($id)
    {
        // Validasi Dulu Inputannya
        if (!$this->validate([
            'nama'  => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ],
            'jabatan' => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ]
        ])) {
            return redirect()->to(base_url('/smr/create/' . $id))->withInput();
        }
        $sql = $this->smrModel->save([
            'nama'      => $this->request->getVar('nama'),
            'jabatan'   => $this->request->getVar('jabatan'),
            'user_id'   => $this->request->getVar('user_id'),
            'pmr_id'    => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Struktur Manajemen Resiko Berhasil Disimpan dan Ditambahkan !');
            return redirect()->to(base_url('/smr/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Struktur Manajemen Resiko !!!');
            return redirect()->to(base_url('/smr/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Data Struktur Manajemen Resiko',
            'smr'       => $this->smrModel->getSmr($id),
            'validasi'  => Services::validation(),
        ];
        return view('smr/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi
        if (!$this->validate([
            'nama'  => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ],
            'jabatan' => [
                'rules'     => 'required',
                'errors'    => 'Form {field} harus diisi !'
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->smrModel->save([
            'nama'      => $this->request->getVar('nama'),
            'jabatan'   => $this->request->getVar('jabatan'),
            'user_id'   => $this->request->getVar('user_id'),
            'pmr_id'    => $pmr_id,
            'id'        => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Struktur Manajemen Resiko Berhasil Di-UPDATE !');
            return redirect()->to(base_url('/smr/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal MENGUPDATE  Data Struktur Manajemen Resiko !!!');
            return redirect()->to(base_url('/smr/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->smrModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Struktur Manajemen Resiko Berhasil Di-HAPUS !');
            return redirect()->back();
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Struktur Manajemen Resiko !!!');
            return redirect()->back();
        }
    }
}
