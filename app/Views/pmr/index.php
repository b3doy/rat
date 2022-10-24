<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-7">
            <h2><u>Level Unit Penerapan Manajemen Resiko</u></h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/pmr/create') ?>" class="btn btn-success btn-xs mt-2"><i class="fa fa-plus-circle"></i> Input Data</a>
        </div>
    </div>
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
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-hover table-borderless mt-5">
                <?php if ($pmrThead != null) : ?>
                    <thead>
                        <tr>
                            <th>Nama Unit</th>
                            <th>Nama Level Unit</th>
                            <th>#</th>
                        </tr>
                    </thead>
                <?php endif; ?>
                <tbody>
                    <?php foreach ($pmr as $pmr) : ?>
                        <?php if (user()->id == $pmr['user_id']) : ?>
                            <tr>
                                <td><?= $pmr['nama_unit']; ?></td>
                                <td><?= $pmr['nama_level_unit']; ?></td>
                                <td>
                                    <a href="<?= base_url('/pmr/' . $pmr['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-book"></i> Detail</a>
                                </td>
                            </tr>
                    <?php endif;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>