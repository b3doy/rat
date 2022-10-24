<?php

namespace App\Controllers;

use App\Models\PmrModel;
use App\Models\SaronModel;
use Config\Services;

class Saron extends BaseController
{
    protected $saronModel, $pmrModel;

    public function __construct()
    {
        $this->saronModel = new SaronModel();
        $this->pmrModel = new PmrModel();
    }

    public function index()
    {
        $data = [
            'title'      => 'Sasaran Organisasi',
            'pmr'        => $this->pmrModel->getPmr()
        ];
        return view('saron/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'      => 'Detail Sasaran Organisasi',
            'saron'      => $this->saronModel->getSaron(),
            'saronThead' => $this->saronModel->getSaronThead(),
            'pmr'        => $this->pmrModel->getPmr($id),
        ];
        return view('saron/detail', $data);
    }

    public function create($id)
    {
        $data = [
            'title'     => 'Input Data Sasaran Organisasi',
            'saron'     => $this->saronModel->getSaron(),
            'pmr'       => $this->pmrModel->getPmr($id),
            'validasi'  => Services::validation(),
        ];
        return view('saron/create', $data);
    }

    public function save($id)
    {
        // Validasi Input
        if (!$this->validate([
            'daftar_sasaran' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'indikator' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ]
        ])) {
            return redirect()->to(base_url('/saron/create/' . $id))->withInput();
        }
        $sql = $this->saronModel->save([
            'daftar_sasaran'    => $this->request->getVar('daftar_sasaran'),
            'indikator'         => $this->request->getVar('indikator'),
            'user_id'           => $this->request->getVar('user_id'),
            'pmr_id'            => $id,
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Sasaran Organisasi Berhasil Disimpan dan Ditambahkan!');
            return redirect()->to(base_url('/saron/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Sasaran Organisasi !!!');
            return redirect()->to(base_url('/saron/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Sasaran Organisasi',
            'saron'     => $this->saronModel->getSaron($id),
            'validasi'  => Services::validation(),
        ];
        return view('saron/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi Dulu
        if (!$this->validate([
            'daftar_sasaran' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'indikator' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ]
        ])) {
            return redirect()->to(base_url('/saron/edit/' . $id))->withInput();
        }
        $sql = $this->saronModel->save([
            'daftar_sasaran'    => $this->request->getVar('daftar_sasaran'),
            'indikator'         => $this->request->getVar('indikator'),
            'user_id'           => $this->request->getVar('user_id'),
            'pmr_id'            => $this->request->getVar('pmr_id'),
            'id'                => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Sasaran Organisasi Berhasil Di-UPDATE !');
            return redirect()->to(base_url('/saron/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal MENGUPDATE  Data Sasaran Organisasi !!!');
            return redirect()->to(base_url('/saron/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->saronModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Sasaran Organisasi Berhasil Di-HAPUS !');
            return redirect()->back();
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Sasaran Organisasi !!!');
            return redirect()->back();
        }
    }
}
