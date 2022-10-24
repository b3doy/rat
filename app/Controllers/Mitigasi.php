<?php

namespace App\Controllers;

use App\Models\IdentifikasiModel;
use App\Models\KategoriResikoModel;
use App\Models\LevelDampakModel;
use App\Models\LevelKemungkinanModel;
use App\Models\MitigasiModel;
use App\Models\PmrModel;
use Config\Services;

class Mitigasi extends BaseController
{
    protected $mitigasiModel, $identifikasiModel, $pmrModel, $kategoriResikoModel,
        $levelKemungkinanModel, $levelDampakModel, $db;

    public function __construct()
    {
        $this->mitigasiModel = new MitigasiModel();
        $this->identifikasiModel = new IdentifikasiModel();
        $this->pmrModel = new PmrModel();
        $this->kategoriResikoModel = new KategoriResikoModel();
        $this->levelKemungkinanModel = new LevelKemungkinanModel();
        $this->levelDampakModel = new LevelDampakModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data = [
            'title'     => 'Mitigasi Resiko',
            'pmr'       => $this->pmrModel->getPmr()
        ];
        return view('mitigasi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => 'Mitigasi Resiko',
            'pmr'           => $this->pmrModel->getPmr($id),
            'mitigasi'      => $this->mitigasiModel->getMitigasi(),
            'mitigasiThead' => $this->mitigasiModel->getMitigasiThead(),
        ];
        return view('mitigasi/detail', $data);
    }

    public function mitigasiTable()
    {
        $pmr_id = $this->request->getVar('pmr_id');
        $list = $this->mitigasiModel->getMitigasi();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($pmr_id == $list['pmr_id']) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = $list['mitigasi_kejadian'];
                $row[] = $list['mitigasi_prioritas_resiko'];
                $row[] = $list['mitigasi_no_reg_resiko'];
                $row[] = $list['opsi_mitigasi'];
                $row[] = $list['keg_pengendalian_tambahan'];
                $row[] = $list['target'];
                $row[] = $list['jadwal_implementasi'];
                $row[] = $list['penanggung_jawab'];
                $row[] = $list['mitigasi_level_kemungkinan'];
                $row[] = $list['mitigasi_level_dampak'];
                $row[] = $list['mitigasi_level_resiko'];
                $row[] = $list['mitigasi_tingkat_level_resiko'];
                $row[] = $list['mitigasi_dilaksanakan'];
                $row[] = $list['capaian_target'];
                $row[] = '<button class="badge badge-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data">
                            <a href="' . base_url('/mitigasi/edit/' .  $list['id']) . '" class="text-decoration-none" role="button"><i class="fa fa-edit"></i> </a>
                     </button>
                     ||
                     <form action="' . base_url('/mitigasi/' .  $list['id']) . '" method="post" class="d-inline">
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

    public function choose($id)
    {
        $data = [
            'title'     => 'Mitigasi Resiko',
            'pmr'       => $this->pmrModel->getPmr($id),
            'validasi'  => Services::validation(),
            'identifikasi'  => $this->identifikasiModel->getIdentifikasiKejadian($id),
        ];
        return view('mitigasi/choose', $data);
    }

    public function create($id)
    {
        $kejadian = $this->request->getVar('kejadian');
        $identifikasi = $this->db->table('identifikasi')->select('*')->where('kejadian', $kejadian)->get()->getRowArray();
        $mitigasi = $this->db->table('mitigasi')->select('mitigasi_no_reg_resiko')->where('identifikasi_id', $identifikasi['id'])->get()->getRow();
        $data = [
            'title'             => 'Input Data Mitigasi Resiko',
            'pmr'               => $this->pmrModel->getPmr($id),
            'mitigasi'          => $mitigasi,
            'identifikasi'      => $identifikasi,
            'validasi'          => Services::validation(),
            'kategoriResiko'    => $this->kategoriResikoModel->getKategoriResiko(),
            'levelKemungkinan'  => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'       => $this->levelDampakModel->getLevelDampak(),
        ];
        return view('mitigasi/create', $data);
    }

    public function save($id)
    {
        // Validasi Dulu
        if (!$this->validate([
            'keg_pengendalian_tambahan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'target' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'jadwal_implementasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'penanggung_jawab' => [
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
            'mitigasi_dilaksanakan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'capaian_target' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->mitigasiModel->save([
            'mitigasi_kejadian'             => $this->request->getVar('mitigasi_kejadian'),
            'mitigasi_prioritas_resiko'     => $this->request->getVar('mitigasi_prioritas_resiko'),
            'mitigasi_no_reg_resiko'        => $this->request->getVar('mitigasi_no_reg_resiko'),
            'opsi_mitigasi'                 => $this->request->getVar('opsi_mitigasi'),
            'keg_pengendalian_tambahan'     => $this->request->getVar('keg_pengendalian_tambahan'),
            'target'                        => $this->request->getVar('target'),
            'jadwal_implementasi'           => $this->request->getVar('jadwal_implementasi'),
            'penanggung_jawab'              => $this->request->getVar('penanggung_jawab'),
            'mitigasi_level_kemungkinan'    => $this->request->getVar('level_kemungkinan'),
            'mitigasi_level_dampak'         => $this->request->getVar('level_dampak'),
            'mitigasi_level_resiko'         => $this->request->getVar('level_resiko'),
            'mitigasi_tingkat_level_resiko' => $this->request->getVar('tingkat_level_resiko'),
            'mitigasi_dilaksanakan'         => $this->request->getVar('mitigasi_dilaksanakan'),
            'capaian_target'                => $this->request->getVar('capaian_target'),
            'user_id'                       => $this->request->getVar('user_id'),
            'pmr_id'                        => $id,
            'identifikasi_id'               => $this->request->getVar('identifikasi_id'),
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Mitigasi Resiko Berhasil Disimpan dan Ditambahkan!');
            return redirect()->to(base_url('/mitigasi/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Mitigasi Resiko !!!');
            return redirect()->to(base_url('/mitigasi/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'             => 'Edit Data Mitigasi Resiko',
            'mitigasi'          => $this->mitigasiModel->getMitigasi($id),
            'levelKemungkinan'  => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'       => $this->levelDampakModel->getLevelDampak(),
            'validasi'          => Services::validation(),
        ];
        return view('mitigasi/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi Dulu
        if (!$this->validate([
            'keg_pengendalian_tambahan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'target' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'jadwal_implementasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'penanggung_jawab' => [
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
            'mitigasi_dilaksanakan' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'capaian_target' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        $sql = $this->mitigasiModel->save([
            'mitigasi_kejadian'             => $this->request->getVar('mitigasi_kejadian'),
            'mitigasi_prioritas_resiko'     => $this->request->getVar('mitigasi_prioritas_resiko'),
            'mitigasi_no_reg_resiko'        => $this->request->getVar('mitigasi_no_reg_resiko'),
            'opsi_mitigasi'                 => $this->request->getVar('opsi_mitigasi'),
            'keg_pengendalian_tambahan'     => $this->request->getVar('keg_pengendalian_tambahan'),
            'target'                        => $this->request->getVar('target'),
            'jadwal_implementasi'           => $this->request->getVar('jadwal_implementasi'),
            'penanggung_jawab'              => $this->request->getVar('penanggung_jawab'),
            'mitigasi_level_kemungkinan'    => $this->request->getVar('level_kemungkinan'),
            'mitigasi_level_dampak'         => $this->request->getVar('level_dampak'),
            'mitigasi_level_resiko'         => $this->request->getVar('level_resiko'),
            'mitigasi_tingkat_level_resiko' => $this->request->getVar('tingkat_level_resiko'),
            'mitigasi_dilaksanakan'         => $this->request->getVar('mitigasi_dilaksanakan'),
            'capaian_target'                => $this->request->getVar('capaian_target'),
            'user_id'                       => $this->request->getVar('user_id'),
            'identifikasi_id'               => $this->request->getVar('identifikasi_id'),
            'pmr_id'                        => $pmr_id,
            'id'                            => $id,
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Mitigasi Resiko Berhasil Di-UPDATE!');
            return redirect()->to(base_url('/mitigasi/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'GAGAL MengUPDATE Data Mitigasi Resiko !!!');
            return redirect()->to(base_url('/mitigasi/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->mitigasiModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Mitigasi Resiko Berhasil Di-HAPUS !');
            return redirect()->back();
            session()->setFlashData('pesanHapusGagal', 'Gagal MENGHAPUS Data Mitigasi Resiko !!!');
            return redirect()->back();
        }
    }
}
