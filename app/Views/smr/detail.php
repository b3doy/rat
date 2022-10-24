<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">

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
            <h2><u>Struktur Manajemen Resiko</u></h2>
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
                <div class="col">
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
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Menampilkan Tabel Struktur Manajemen Resiko-->

    <a href="<?= base_url('/smr/create/' . $pmr['id']) ?>" class="btn btn-outline-success btn-sm mt-2 mx-3">
        <i class="fa fa-plus-circle"></i>
        Input Data
    </a>

    <a href="<?= base_url('/smr'); ?>" class="btn btn-sm btn-outline-dark mt-2">
        <i class="fa fa-undo"></i>
        Kembali Ke Menu Sebelumnya
    </a>

    <div class="row">
        <div class="col">
            <table class="table table-hover mt-2">
                <?php if ($smrThead != null) : ?>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                <?php endif; ?>
                <tbody>
                    <?php $no = 0;
                    foreach ($smr as $smr) :  ?>
                        <?php if ($pmr['id'] == $smr['pmr_id']) : $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $smr['nama']; ?></td>
                                <td><?= $smr['jabatan']; ?></td>
                                <td>
                                    <button class="badge badge-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data">
                                        <a href="<?= base_url('/smr/edit/' .  $smr['id']); ?>" class="text-decoration-none" role="button"><i class="fa fa-edit"></i> </a>
                                    </button>
                                    ||
                                    <form action="<?= base_url('/smr/' .  $smr['id']); ?>" method="post" class="d-inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <?= csrf_field(); ?>
                                        <button type="submit" class="badge badge-danger" onclick="return confirm('Anda Akan Yakin Menghapus Data Ini?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>