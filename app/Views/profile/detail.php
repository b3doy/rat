<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">
    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center judul">Profile / Identifikasi Resiko</h1>
        </div>
        <div class="col-md-2">
            <h6 class="text-right">Form 2</h6>
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
        <div class="card">
            <table class="table-bordered table-hover table-sm table-font">
                <thead id="ver">
                    <tr>
                        <th rowspan="2">Sasaran organisasi</th>
                        <th colspan="5">Resiko</th>
                        <th colspan="2">Sistem Pengendalian Yang Ada</th>
                        <th rowspan="2">Level Kemungkinan</th>
                        <th rowspan="2">Level Dampak</th>
                        <th rowspan="2">Besaran / Level Resiko</th>
                    </tr>
                    <tr>
                        <th>No Reg</th>
                        <th>Kejadian</th>
                        <th>Kategori</th>
                        <th>Penyebab</th>
                        <th>Dampak</th>
                        <th>Uraian Sistem Pengendalian</th>
                        <th>Efektivitas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($identifikasi as $identifikasi) : ?>
                        <tr>
                            <td><?= $identifikasi['sasaran_organisasi'] ?></td>
                            <td><?= $identifikasi['mitigasi_no_reg_resiko'] ?></td>
                            <td><?= $identifikasi['kejadian'] ?></td>
                            <td><?= $identifikasi['kategori_resiko'] ?></td>
                            <td><?= $identifikasi['penyebab'] ?></td>
                            <td><?= $identifikasi['dampak'] ?></td>
                            <td><?= $identifikasi['uraian_spi'] ?></td>
                            <td><?= $identifikasi['efektivitas'] ?></td>
                            <td><?= $identifikasi['level_kemungkinan'] ?></td>
                            <td><?= $identifikasi['level_dampak'] ?></td>
                            <td><?= $identifikasi['tingkat_level_resiko'] ?></td>
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