<?php

namespace App\Controllers;

use App\Libraries\Lib;
use App\Models\IdentifikasiModel;
use App\Models\KategoriResikoModel;
use App\Models\LevelDampakModel;
use App\Models\LevelKemungkinanModel;
use App\Models\PmrModel;
use App\Models\SaronModel;
use Config\Services;

class Identifikasi extends BaseController
{
    protected $identifikasiModel, $pmrModel, $kategoriResikoModel,
        $levelKemungkinanModel, $levelDampakModel, $saronModel, $lib;

    public function __construct()
    {
        $this->identifikasiModel = new IdentifikasiModel();
        $this->pmrModel = new PmrModel();
        $this->kategoriResikoModel = new KategoriResikoModel();
        $this->levelKemungkinanModel = new LevelKemungkinanModel();
        $this->levelDampakModel = new LevelDampakModel();
        $this->saronModel = new SaronModel();
        $this->lib = new Lib;
    }

    public function index()
    {
        $data = [
            'title'     => 'Profile / Identifikasi Resiko',
            'pmr'       => $this->pmrModel->getPmr(),
        ];
        return view('identifikasi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'                => 'Profile / Identifikasi Resiko',
            'pmr'                  => $this->pmrModel->getPmr($id),
            'identifikasi'         => $this->identifikasiModel->getIdentifikasi(),
            'identifikasiThead'    => $this->identifikasiModel->getIdentifikasiThead()
        ];
        return view('identifikasi/detail', $data);
    }

    public function identifikasiTable()
    {
        $pmr_id = $this->request->getVar('pmr_id');
        $list = $this->identifikasiModel->getIdentifikasi();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($pmr_id == $list['pmr_id']) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list['sasaran_organisasi'];
                $row[] = $list['kejadian'];
                $row[] = $list['kategori_resiko'];
                $row[] = $list['penyebab'];
                $row[] = $list['dampak'];
                $row[] = $list['uraian_spi'];
                $row[] = $list['efektivitas'];
                $row[] = $list['level_kemungkinan'];
                $row[] = $list['level_dampak'];
                $row[] = $list['level_resiko'];
                $row[] = $list['tingkat_level_resiko'];
                $row[] = $list['keputusan_mitigasi'];
                $row[] = '<button class="badge badge-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data">
                            <a href="' . base_url('/identifikasi/edit/' .  $list['id']) . '" class="text-decoration-none" role="button"><i class="fa fa-edit"></i> </a>
                     </button>
                     ||
                     <form action="' . base_url('/identifikasi/' .  $list['id']) . '" method="post" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <?= csrf_field(); ?>
                        <button type="submit" class="badge badge-danger" onclick="return confirm(\'Anda Akan Yakin Menghapus Data Ini?\')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data">
                           <i class="fa fa-trash"></i>
                        </button>
                     </form>';

                $data[] = $row;
            }
        }
        $output = ['data' => $data];
        echo json_encode($output);
    }

    public function tabel_kr()
    {
        $data = [
            'kategoriResiko' => $this->kategoriResikoModel->getKategoriResiko(),
        ];
        return view('identifikasi/tabel_kr', $data);
    }

    public function tabel_lkr()
    {
        $data = [
            'levelKemungkinan' => $this->levelKemungkinanModel->getLevelKemungkinan(),
        ];
        return view('identifikasi/tabel_lkr', $data);
    }

    public function tabel_ldr()
    {
        $data = [
            'levelDampak' => $this->levelDampakModel->getLevelDampak(),
        ];
        return view('identifikasi/tabel_ldr', $data);
    }

    public function create($id)
    {
        $data = [
            'title'                => 'Profile / Identifikasi Resiko',
            'pmr'                  => $this->pmrModel->getPmr($id),
            'identifikasi'         => $this->identifikasiModel->getIdentifikasi(),
            'kategoriResiko'       => $this->kategoriResikoModel->getKategoriResiko(),
            'levelKemungkinan'     => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'          => $this->levelDampakModel->getLevelDampak(),
            'validasi'             => Services::validation(),
            'saron'                => $this->saronModel->getKolomSaron($id),
            'lib'                  => $this->lib->noRegResiko($id),
        ];
        return view('identifikasi/create', $data);
    }

    public function save($id)
    {
        // Validasi
        if (!$this->validate([
            'sasaran_organisasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'kejadian' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'kategori_resiko' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'penyebab' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'dampak' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'uraian_spi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'efektivitas' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_kemungkinan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_dampak' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->identifikasiModel->save([
            'sasaran_organisasi'    => $this->request->getVar('sasaran_organisasi'),
            'kejadian'              => $this->request->getVar('kejadian'),
            'kategori_resiko'       => $this->request->getVar('kategori_resiko'),
            'penyebab'              => $this->request->getVar('penyebab'),
            'dampak'                => $this->request->getVar('dampak'),
            'uraian_spi'            => $this->request->getVar('uraian_spi'),
            'efektivitas'           => $this->request->getVar('efektivitas'),
            'level_kemungkinan'     => $this->request->getVar('level_kemungkinan'),
            'level_dampak'          => $this->request->getVar('level_dampak'),
            'level_resiko'          => $this->request->getVar('level_resiko'),
            'tingkat_level_resiko'  => $this->request->getVar('tingkat_level_resiko'),
            'prioritas_resiko'      => $this->request->getVar('prioritas_resiko'),
            'no_reg_resiko'         => $this->request->getVar('no_reg_resiko'),
            'keputusan_mitigasi'    => $this->request->getVar('keputusan_mitigasi'),
            'no_identifikasi'       => $this->request->getVar('no_identifikasi'),
            'user_id'               => $this->request->getVar('user_id'),
            'pmr_id'                => $id,
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Profile / Identifikasi Resiko Berhasil Disimpan dan Ditambahkan!');
            return redirect()->to(base_url('/identifikasi/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Profile / Identifikasi Resiko !!!');
            return redirect()->to(base_url('/identifikasi/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'                => 'Edit Profile / Identifikasi Resiko',
            'identifikasi'         => $this->identifikasiModel->getIdentifikasi($id),
            'kategoriResiko'       => $this->kategoriResikoModel->getKategoriResiko(),
            'levelKemungkinan'     => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'          => $this->levelDampakModel->getLevelDampak(),
            'validasi'             => Services::validation(),
            'saron'                => $this->saronModel->getKolomSaron($id),
        ];
        return view('identifikasi/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi
        if (!$this->validate([
            'sasaran_organisasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'kejadian' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'kategori_resiko' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'penyebab' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'dampak' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'uraian_spi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'efektivitas' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_kemungkinan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_dampak' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->identifikasiModel->save([
            'sasaran_organisasi'    => $this->request->getVar('sasaran_organisasi'),
            'kejadian'              => $this->request->getVar('kejadian'),
            'kategori_resiko'       => $this->request->getVar('kategori_resiko'),
            'penyebab'              => $this->request->getVar('penyebab'),
            'dampak'                => $this->request->getVar('dampak'),
            'uraian_spi'            => $this->request->getVar('uraian_spi'),
            'efektivitas'           => $this->request->getVar('efektivitas'),
            'level_kemungkinan'     => $this->request->getVar('level_kemungkinan'),
            'level_dampak'          => $this->request->getVar('level_dampak'),
            'level_resiko'          => $this->request->getVar('level_resiko'),
            'tingkat_level_resiko'  => $this->request->getVar('tingkat_level_resiko'),
            'prioritas_resiko'      => $this->request->getVar('prioritas_resiko'),
            'no_reg_resiko'         => $this->request->getVar('no_reg_resiko'),
            'keputusan_mitigasi'    => $this->request->getVar('keputusan_mitigasi'),
            'user_id'               => $this->request->getVar('user_id'),
            'pmr_id'                => $pmr_id,
            'id'                    => $id
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Profile / Identifikasi Resiko Berhasil Di-UPDATE!');
            return redirect()->to(base_url('/identifikasi/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal MENGUPDATE Data Profile / Identifikasi Resiko !!!');
            return redirect()->to(base_url('/identifikasi/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->identifikasiModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Profile / Identifikasi Resiko Berhasil Di-HAPUS !');
            return redirect()->back();
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Profile / Identifikasi Resiko !!!');
            return redirect()->back();
        }
    }
}
