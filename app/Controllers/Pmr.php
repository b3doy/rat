<?php

namespace App\Controllers;

use App\Models\PmrModel;
use CodeIgniter\Config\Services as ConfigServices;
use Config\Services;

class Pmr extends BaseController
{
    protected $pmrModel, $validation;

    public function __construct()
    {
        $this->pmrModel = new PmrModel();
        $this->validation = new Services;
    }

    public function index()
    {
        $data = [
            'title'    => 'Penerapan Manajemen Resiko',
            'pmr'      => $this->pmrModel->getPmr(),
            'pmrThead' => $this->pmrModel->getPmrThead()
        ];
        return view('pmr/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Penerapan Manajemen Resiko',
            'pmr'   => $this->pmrModel->getPmr($id)
        ];
        return view('pmr/detail', $data);
    }

    public function create()
    {
        $data = [
            'title'    => 'Input Data Penerapan MR',
            'pmr'      => $this->pmrModel->getPmr(),
            'validasi' => Services::validation()
        ];
        return view('pmr/create', $data);
    }

    public function save()
    {
        // Validasi Input
        if (!$this->validate([
            'tahun' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'level_mr_eselon' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'nama_level_unit' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'ruang_lingkup_penerapan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'periode' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'output' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'data_sudah_benar' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
        ])) {
            return redirect()->to(base_url('/pmr/create'))->withInput();
        };
        $sql = $this->pmrModel->save([
            'tahun'                     => $this->request->getVar('tahun'),
            'kld'                       => $this->request->getVar('kld'),
            'nama_unit'                 => $this->request->getVar('nama_unit'),
            'level_mr_eselon'           => $this->request->getVar('level_mr_eselon'),
            'nama_level_unit'           => $this->request->getVar('nama_level_unit'),
            'ruang_lingkup_penerapan'   => $this->request->getVar('ruang_lingkup_penerapan'),
            'periode'                   => $this->request->getVar('periode'),
            'output'                    => $this->request->getVar('output'),
            'data_sudah_benar'          => $this->request->getVar('data_sudah_benar'),
            'user_id'                   => $this->request->getVar('user_id'),
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Penerapan Manajemen Resiko Berhasil Disimpan dan Ditambahkan!');
            return redirect()->to(base_url('/pmr'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Penerapan Manajemen Resiko !!!');
            return redirect()->to(base_url('/pmr'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'     => 'Edit Data Penerapan Manajemen Resiko',
            'pmr'       => $this->pmrModel->getPmr($id),
            'validasi'  => Services::validation()
        ];
        return view('pmr/edit', $data);
    }

    public function update($id)
    {
        // Validasi Input
        if (!$this->validate([
            'tahun' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'level_mr_eselon' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'nama_level_unit' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'ruang_lingkup_penerapan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'periode' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'output' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
            'data_sudah_benar' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi!']
            ],
        ])) {
            return redirect()->to(base_url('/pmr/edit/' . $this->pmrModel->getPmr($id)['id']))->withInput();
        };
        $sql = $this->pmrModel->save([
            'tahun'                     => $this->request->getVar('tahun'),
            'kld'                       => $this->request->getVar('kld'),
            'nama_unit'                 => $this->request->getVar('nama_unit'),
            'level_mr_eselon'           => $this->request->getVar('level_mr_eselon'),
            'nama_level_unit'           => $this->request->getVar('nama_level_unit'),
            'ruang_lingkup_penerapan'   => $this->request->getVar('ruang_lingkup_penerapan'),
            'periode'                   => $this->request->getVar('periode'),
            'output'                    => $this->request->getVar('output'),
            'data_sudah_benar'          => $this->request->getVar('data_sudah_benar'),
            'id'                        => $id,
            'user_id'                   => $this->request->getVar('user_id'),
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Penerapan Manajemen Resiko Berhasil Di-UPDATE !');
            return redirect()->to(base_url('/pmr'));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Melakukan UPDATE Data Penerapan Manajemen Resiko !!!');
            return redirect()->to(base_url('/pmr'));
        }
    }

    public function delete($id)
    {
        $sql = $this->pmrModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Penerapan Manajemen Resiko Berhasil Di-HAPUS !');
            return redirect()->to(base_url('/pmr'));
        } else {
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Penerapan Manajemen Resiko !!!');
            return redirect()->to(base_url('/pmr'));
        }
    }
}
