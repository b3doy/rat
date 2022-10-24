<?php

namespace App\Controllers;

use App\Models\EvaluasiModel;
use App\Models\IdentifikasiModel;
use App\Models\LevelDampakModel;
use App\Models\LevelKemungkinanModel;
use App\Models\MitigasiModel;
use App\Models\PmrModel;
use Config\Services;

class Evaluasi extends BaseController
{
    protected $evaluasiModel, $mitigasiModel, $identifikasiModel, $pmrModel, $db,
        $levelKemungkinanModel, $levelDampakModel;

    public function __construct()
    {
        $this->evaluasiModel = new EvaluasiModel();
        $this->mitigasiModel = new MitigasiModel();
        $this->identifikasiModel = new IdentifikasiModel();
        $this->pmrModel = new PmrModel();
        $this->db = db_connect();
        $this->levelKemungkinanModel = new LevelKemungkinanModel();
        $this->levelDampakModel = new LevelDampakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko',
            'pmr'   => $this->pmrModel->getPmr(),
        ];
        return view('evaluasi/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title'         => 'Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko',
            'pmr'           => $this->pmrModel->getPmr($id),
            'evaluasi'      => $this->evaluasiModel->getEvaluasi(),
            'evaluasiThead' => $this->evaluasiModel->getEvaluasiThead(),
        ];
        return view('evaluasi/detail', $data);
    }

    public function evaluasiTable()
    {
        $pmr_id = $this->request->getVar('pmr_id');
        $list = $this->evaluasiModel->getEvaluasi();
        $data = [];
        $no = 0;
        foreach ($list as $list) {
            if ($pmr_id == $list['pmr_id']) {
                $row = [];
                $row[] = $list['prioritas_resiko'];
                $row[] = $list['no_reg_resiko'];
                $row[] = $list['kejadian'];
                $row[] = $list['level_kemungkinan_sebelumnya'];
                $row[] = $list['level_dampak_sebelumnya'];
                $row[] = $list['level_resiko_sebelumnya'];
                $row[] = $list['tingkat_level_resiko_sebelumnya'];
                $row[] = $list['level_kemungkinan_harapan'];
                $row[] = $list['level_dampak_harapan'];
                $row[] = $list['level_resiko_harapan'];
                $row[] = $list['tingkat_level_resiko_harapan'];
                $row[] = $list['level_kemungkinan_actual'];
                $row[] = $list['level_dampak_actual'];
                $row[] = $list['level_resiko_actual'];
                $row[] = $list['tingkat_level_resiko_actual'];
                $row[] = $list['trend_resiko'];
                $row[] = $list['deviasi_resiko'];
                $row[] = $list['rekomendasi'];
                $row[] = '<button class="badge badge-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data">
                            <a href="' . base_url('/evaluasi/edit/' .  $list['id']) . '" class="text-decoration-none" role="button"><i class="fa fa-edit"></i> </a>
                     </button>
                     ||
                     <form action="' . base_url('/evaluasi/' .  $list['id']) . '" method="post" class="d-inline">
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
            'title'     => 'Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko',
            'pmr'       => $this->pmrModel->getPmr($id),
            'validasi'  => Services::validation(),
            'mitigasi'  => $this->mitigasiModel->getMitigasiKejadian($id),
        ];
        return view('evaluasi/choose', $data);
    }

    public function create($id)
    {
        $kejadian = $this->request->getVar('kejadian');
        $mitigasi = $this->db->table('mitigasi')->select('*')->join('identifikasi', 'identifikasi.id = mitigasi.identifikasi_id')->where('mitigasi_kejadian', $kejadian)->get()->getRowArray();
        $evaluasi = $this->db->table('evaluasi')->select('no_reg_resiko')->where('mitigasi_id', $mitigasi['id'])->get()->getRowArray();


        $data = [
            'title'             => 'Input Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko',
            'mitigasi'          => $mitigasi,
            'pmr'               => $this->pmrModel->getPmr($id),
            'validasi'          => Services::validation(),
            'levelKemungkinan'  => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'       => $this->levelDampakModel->getLevelDampak(),
            'evaluasi'          => $evaluasi,
        ];
        return view('evaluasi/create', $data);
    }

    public function save($id)
    {
        // Validasi Dulu
        if (!$this->validate([
            'level_kemungkinan_actual' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_dampak_actual' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'rekomendasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        // Simpan Data Ke Database:
        $sql = $this->evaluasiModel->save([
            'prioritas_resiko'                  => $this->request->getVar('prioritas_resiko'),
            'no_reg_resiko'                     => $this->request->getVar('no_reg_resiko'),
            'kejadian'                          => $this->request->getVar('kejadian'),
            'level_kemungkinan_sebelumnya'      => $this->request->getVar('level_kemungkinan_sebelumnya'),
            'level_dampak_sebelumnya'           => $this->request->getVar('level_dampak_sebelumnya'),
            'level_resiko_sebelumnya'           => $this->request->getVar('level_resiko_sebelumnya'),
            'tingkat_level_resiko_sebelumnya'   => $this->request->getVar('tingkat_level_resiko_sebelumnya'),
            'level_kemungkinan_harapan'         => $this->request->getVar('level_kemungkinan_harapan'),
            'level_dampak_harapan'              => $this->request->getVar('level_dampak_harapan'),
            'level_resiko_harapan'              => $this->request->getVar('level_resiko_harapan'),
            'tingkat_level_resiko_harapan'      => $this->request->getVar('tingkat_level_resiko_harapan'),
            'level_kemungkinan_actual'          => $this->request->getVar('level_kemungkinan_actual'),
            'level_dampak_actual'               => $this->request->getVar('level_dampak_actual'),
            'level_resiko_actual'               => $this->request->getVar('level_resiko_actual'),
            'tingkat_level_resiko_actual'       => $this->request->getVar('tingkat_level_resiko_actual'),
            'trend_resiko'                      => $this->request->getVar('trend_resiko'),
            'deviasi_resiko'                    => $this->request->getVar('deviasi_resiko'),
            'rekomendasi'                       => $this->request->getVar('rekomendasi'),
            'user_id'                           => $this->request->getVar('user_id'),
            'pmr_id'                            => $id,
            'identifikasi_id'                   => $this->request->getVar('identifikasi_id'),
            'mitigasi_id'                       => $this->request->getVar('mitigasi_id'),
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko Berhasil Disimpan dan Ditambahkan!');
            return redirect()->to(base_url('/evaluasi/detail/' . $id));
        } else {
            session()->setFlashData('pesanGagal', 'Gagal Menyimpan dan Menambahkan Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko !!!');
            return redirect()->to(base_url('/evaluasi/detail/' . $id));
        }
    }

    public function edit($id)
    {
        $data = [
            'title'             => 'Input Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko',
            'evaluasi'          => $this->evaluasiModel->getEvaluasi($id),
            'validasi'          => Services::validation(),
            'levelKemungkinan'  => $this->levelKemungkinanModel->getLevelKemungkinan(),
            'levelDampak'       => $this->levelDampakModel->getLevelDampak(),
        ];
        return view('evaluasi/edit', $data);
    }

    public function update($id)
    {
        $pmr_id = $this->request->getVar('pmr_id');
        // Validasi Dulu
        if (!$this->validate([
            'level_kemungkinan_actual' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'level_dampak_actual' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
            'rekomendasi' => [
                'rules'  => 'required',
                'errors' => ['required' => 'form {field} harus diisi !']
            ],
        ])) {
            return redirect()->back()->withInput();
        }
        // Simpan Data Ke Database:
        $sql = $this->evaluasiModel->save([
            'prioritas_resiko'                  => $this->request->getVar('prioritas_resiko'),
            'no_reg_resiko'                     => $this->request->getVar('no_reg_resiko'),
            'kejadian'                          => $this->request->getVar('kejadian'),
            'level_kemungkinan_sebelumnya'      => $this->request->getVar('level_kemungkinan_sebelumnya'),
            'level_dampak_sebelumnya'           => $this->request->getVar('level_dampak_sebelumnya'),
            'level_resiko_sebelumnya'           => $this->request->getVar('level_resiko_sebelumnya'),
            'tingkat_level_resiko_sebelumnya'   => $this->request->getVar('tingkat_level_resiko_sebelumnya'),
            'level_kemungkinan_harapan'         => $this->request->getVar('level_kemungkinan_harapan'),
            'level_dampak_harapan'              => $this->request->getVar('level_dampak_harapan'),
            'level_resiko_harapan'              => $this->request->getVar('level_resiko_harapan'),
            'tingkat_level_resiko_harapan'      => $this->request->getVar('tingkat_level_resiko_harapan'),
            'level_kemungkinan_actual'          => $this->request->getVar('level_kemungkinan_actual'),
            'level_dampak_actual'               => $this->request->getVar('level_dampak_actual'),
            'level_resiko_actual'               => $this->request->getVar('level_resiko_actual'),
            'tingkat_level_resiko_actual'       => $this->request->getVar('tingkat_level_resiko_actual'),
            'trend_resiko'                      => $this->request->getVar('trend_resiko'),
            'deviasi_resiko'                    => $this->request->getVar('deviasi_resiko'),
            'rekomendasi'                       => $this->request->getVar('rekomendasi'),
            'user_id'                           => $this->request->getVar('user_id'),
            'pmr_id'                            => $pmr_id,
            'identifikasi_id'                   => $this->request->getVar('identifikasi_id'),
            'mitigasi_id'                       => $this->request->getVar('mitigasi_id'),
            'id'                                => $id,
        ]);
        if ($sql) {
            session()->setFlashData('pesanBerhasil', 'Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko Berhasil Di-UPDATE!');
            return redirect()->to(base_url('/evaluasi/detail/' . $pmr_id));
        } else {
            session()->setFlashData('pesanGagal', 'GAGAL MENGUPDATE Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko !!!');
            return redirect()->to(base_url('/evaluasi/detail/' . $pmr_id));
        }
    }

    public function delete($id)
    {
        $sql = $this->evaluasiModel->delete($id);
        if ($sql) {
            session()->setFlashData('pesanHapusBerhasil', 'Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko Berhasil di-HAPUS !');
            return redirect()->back();
        } else {
            session()->setFlashData('pesanHapusGagal', 'GAGAL MENGHAPUS Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko !!!');
            return redirect()->back();
        }
    }
}
