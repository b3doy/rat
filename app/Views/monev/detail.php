<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">
    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center judul">Evaluasi, Pemantauan dan Review Proses Mananajemen Resiko</h1>
        </div>
        <div class="col-md-2">
            <h6 class="text-right">Form 4</h6>
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
                        <th colspan="4">Level Resiko Sebelum Mitigasi</th>
                        <th colspan="4">Level Resiko Harapan</th>
                        <th colspan="4">Level Resiko Actual</th>
                        <th rowspan="2">Trend Resiko</th>
                        <th rowspan="2">Deviasi</th>
                        <th rowspan="2">Rekomendasi</th>
                    </tr>
                    <tr>
                        <th>Level Kemungkinan</th>
                        <th>Level Dampak</th>
                        <th colspan="2">Besaran / Level Resiko</th>
                        <th>Level Kemungkinan</th>
                        <th>Level Dampak</th>
                        <th colspan="2">Besaran / Level Resiko</th>
                        <th>Level Kemungkinan</th>
                        <th>Level Dampak</th>
                        <th colspan="2">Besaran / Level Resiko</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($evaluasi as $evaluasi) : ?>
                        <tr>
                            <td><?= $evaluasi['prioritas_resiko'] ?></td>
                            <td><?= $evaluasi['no_reg_resiko'] ?></td>
                            <td><?= $evaluasi['level_kemungkinan_sebelumnya'] ?></td>
                            <td><?= $evaluasi['level_dampak_sebelumnya'] ?></td>
                            <td><?= $evaluasi['level_resiko_sebelumnya'] ?></td>
                            <td><?= $evaluasi['tingkat_level_resiko_sebelumnya'] ?></td>
                            <td><?= $evaluasi['level_kemungkinan_harapan'] ?></td>
                            <td><?= $evaluasi['level_dampak_harapan'] ?></td>
                            <td><?= $evaluasi['level_resiko_harapan'] ?></td>
                            <td><?= $evaluasi['tingkat_level_resiko_harapan'] ?></td>
                            <td><?= $evaluasi['level_kemungkinan_actual'] ?></td>
                            <td><?= $evaluasi['level_dampak_actual'] ?></td>
                            <td><?= $evaluasi['level_resiko_actual'] ?></td>
                            <td><?= $evaluasi['tingkat_level_resiko_actual'] ?></td>
                            <td><?= $evaluasi['trend_resiko'] ?></td>
                            <td><?= $evaluasi['deviasi_resiko'] ?></td>
                            <td><?= $evaluasi['rekomendasi'] ?></td>
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