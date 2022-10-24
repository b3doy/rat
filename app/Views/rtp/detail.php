<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">
    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center judul">Mitigasi Resiko / Rencana Tindak Pengendalian (RTP)</h1>
        </div>
        <div class="col-md-2">
            <h6 class="text-right">Form 3</h6>
        </div>
    </div>

    <div class="container mt-5">

        <table class="table-borderless table-hover table-sm">
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $pmr['tahun'] ?></td>
            </tr>
            <tr>
                <td>K / L / D</td>
                <td>:</td>
                <td><?= $pmr['kld'] ?></td>
            </tr>
            <tr>
                <td>Nama Unit</td>
                <td>:</td>
                <td><?= $pmr['nama_unit'] ?></td>
            </tr>
            <tr>
                <td>Level MR (Eselon)</td>
                <td>:</td>
                <td><?= $pmr['level_mr_eselon'] ?></td>
            </tr>
            <tr>
                <td>Nama Level Unit</td>
                <td>:</td>
                <td><?= $pmr['nama_level_unit'] ?></td>
            </tr>
        </table>
        <div class="card mt-5">
            <table class="table-bordered table-hover table-sm table-font">
                <thead id="ver">
                    <tr>
                        <th rowspan="2">Prioritas Resiko</th>
                        <th rowspan="2">No. Reg Resiko</th>
                        <th rowspan="2">Opsi Mitigasi</th>
                        <th colspan="4">Rencana Mitigasi Resiko</th>
                        <th colspan="4">Level Resiko Harapan</th>
                        <th colspan="2">Realisasi Mitigasi Resiko</th>
                    </tr>
                    <tr>
                        <th>Kegiatan Pengendalian Tambahan</th>
                        <th>Target</th>
                        <th>Jadwal Implementasi</th>
                        <th>Penanggung Jawab</th>
                        <th>Level Kemungkinan</th>
                        <th>Level Dampak</th>
                        <th colspan="2">Besaran Level Resiko</th>
                        <th>Dilaksanakan?</th>
                        <th>Capaian Target</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mitigasi as $mitigasi) : ?>
                        <tr>
                            <td><?= $mitigasi['mitigasi_prioritas_resiko'] ?></td>
                            <td><?= $mitigasi['mitigasi_no_reg_resiko'] ?></td>
                            <td><?= $mitigasi['opsi_mitigasi'] ?></td>
                            <td><?= $mitigasi['keg_pengendalian_tambahan'] ?></td>
                            <td><?= $mitigasi['target'] ?></td>
                            <td><?= $mitigasi['jadwal_implementasi'] ?></td>
                            <td><?= $mitigasi['penanggung_jawab'] ?></td>
                            <td><?= $mitigasi['mitigasi_level_kemungkinan'] ?></td>
                            <td><?= $mitigasi['mitigasi_level_dampak'] ?></td>
                            <td><?= $mitigasi['mitigasi_level_resiko'] ?></td>
                            <td><?= $mitigasi['mitigasi_tingkat_level_resiko'] ?></td>
                            <td><?= $mitigasi['mitigasi_dilaksanakan'] ?></td>
                            <td><?= $mitigasi['capaian_target'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <div class="container ttd mt-5">
                <div class="footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>Disiapkan oleh</p>
                            <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                            <br>
                            <br>
                            <p>_______________________</p>
                        </div>
                        <div class="col-sm-4">
                            <p>Diperiksa oleh</p>
                            <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                            <br>
                            <br>
                            <p>_______________________</p>
                        </div>
                        <div class="col-sm-4">
                            <p>Ditetapkan oleh</p>
                            <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                            <br>
                            <br>
                            <p>_______________________</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="noprint card-footer">
    <input type="button" class="btn btn-success" value="Print" onclick="window.print()">
</div>

<?= $this->endSection(); ?>