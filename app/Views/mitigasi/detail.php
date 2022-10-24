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
            <h2 class="ml-3"><u>Mitigasi Resiko / Rencana Tindak Pengendalian (RTP)</u></h2>
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
            <a href="<?= base_url('/mitigasi/choose/' . $pmr['id']) ?>" class="btn btn-outline-success btn-sm mx-3"><i class="fa fa-plus-circle"></i> Input Data</a>

            <a href="<?= base_url('/mitigasi'); ?>" class="btn btn-sm btn-outline-dark">
                <i class="fa fa-undo"></i> Kembali Ke Menu Sebelumnya</a>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <div class="table-responsive mt-3">
                <table class="table-sm table-bordered table-hover text-xs" id="mitigasiTable">
                    <?php if ($mitigasiThead != null) : ?>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kejadian</th>
                                <th>Prioritas Resiko</th>
                                <th>No Reg Resiko</th>
                                <th>Opsi Mitigasi</th>
                                <th>Keg. Pengendalian Tambahan</th>
                                <th>Target</th>
                                <th>Jadwal Implementasi</th>
                                <th>Penanggung Jawab</th>
                                <th>Level Kemungkinan</th>
                                <th>Level Dampak</th>
                                <th>Besaran Resiko</th>
                                <th>Level Resiko</th>
                                <th>Mitigasi Dilaksanakan</th>
                                <th>Capaian Target</th>
                                <th>Pilihan#Aksi</th>
                            </tr>
                        </thead>
                    <?php endif; ?>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    table = $('#mitigasiTable').DataTable({
        "order": [],
        "processing": true,
        "serverside": true,
        "ajax": {
            "url": "<?= base_url('/mitigasi/mitigasiTable'); ?>",
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