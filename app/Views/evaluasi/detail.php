<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="card bg-transparent">
    <!-- Menampilkan Notifikasi Alert -->
    <div class="row">
        <div class="col-md-7">
            <?php if (session()->getFlashData('pesanBerhasil')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?= session()->getFlashData('pesanBerhasil'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (session()->getFlashData('pesanGagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> <?= session()->getFlashData('pesanGagal'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (session()->getFlashData('pesanHapusBerhasil')) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <?= session()->getFlashData('pesanHapusBerhasil'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (session()->getFlashData('pesanHapusGagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> <?= session()->getFlashData('pesanHapusGagal'); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- End Menampilkan Notifikasi Alert -->

    <!-- Menampilkan Data Penerapan Manajeman Resiko -->
    <div class="row">
        <div class="col">
            <h2 class="ml-3"><u>Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko</u></h2>
            <div class="row">
                <div class="col-md-4">
                    <table class="table-sm table-borderless table-hover ml-3">
                        <tr>
                            <td>Periode</td>
                            <td>:</td>
                            <td><?= $pmr['periode']; ?></td>
                        </tr>
                        <tr>
                            <td>K / L / D</td>
                            <td>:</td>
                            <td><?= $pmr['kld']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Unit</td>
                            <td>:</td>
                            <td><?= $pmr['nama_unit']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table-sm table-borderless table-hover ml-3">
                        <tr>
                            <td>Level MR (Eselon)</td>
                            <td>:</td>
                            <td><?= $pmr['level_mr_eselon']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Level Unit</td>
                            <td>:</td>
                            <td><?= $pmr['nama_level_unit']; ?></td>
                        </tr>
                        <input type="hidden" name="pmr_id" id="pmr_id" value="<?= $pmr['id']; ?>">
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Menampilkan Tabel Profile / Identifikasi Resiko-->

    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url('/evaluasi/choose/' . $pmr['id']) ?>" class="btn btn-outline-success btn-sm mx-3"><i class="fa fa-plus-circle"></i> Input Data</a>

            <a href="<?= base_url('/evaluasi'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-undo"></i> Kembali Ke Menu Sebelumnya</a>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="table-responsive mt-3">
                <table class="table-sm table-bordered table-hover text-xs" id="evaluasiTable">

                    <thead>
                        <tr>
                            <!-- <th rowspan="2">No</th> -->
                            <th rowspan="2">Prioritas Resiko</th>
                            <th rowspan="2">No Reg Resiko</th>
                            <th rowspan="2">Kejadian</th>
                            <th colspan="4">Level Resiko Sebelumnya</th>
                            <th colspan="4">Level Resiko Harapan</th>
                            <th colspan="4">Level Resiko Actual</th>
                            <th rowspan="2">Trend Resiko</th>
                            <th rowspan="2">Deviasi Resiko</th>
                            <th rowspan="2">Rekomendasi</th>
                            <th rowspan="2">Pilihan#Aksi</th>
                        </tr>
                        <tr>
                            <th>Level Kemungkinan</th>
                            <th>Level Dampak</th>
                            <th>Besaran</th>
                            <th>Level Resiko</th>
                            <th>Level Kemungkinan</th>
                            <th>Level Dampak</th>
                            <th>Besaran</th>
                            <th>Level Resiko</th>
                            <th>Level Kemungkinan</th>
                            <th>Level Dampak</th>
                            <th>Besaran</th>
                            <th>Level Resiko</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    table = $('#evaluasiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/evaluasi/evaluasiTable'); ?>",
            "type": "POST",
            "data": {
                pmr_id: $('#pmr_id').val()
            }
        },
        "columnDefs": [{
            "targets": [0],
            "orderable": false
        }]
    });
</script>

<?= $this->endSection(); ?>