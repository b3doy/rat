<?php
echo $this->extend('layout/template');
echo $this->section('page-content')
?>

<div class="container">
    <div class="card bg-transparent mr-5">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2><u>Level Unit Penerapan Manajemen Resiko</u></h2>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('/pmr'); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-borderless">
                <tr>
                    <td>K / L / D</td>
                    <td>:</td>
                    <th><?= $pmr['kld']; ?></th>
                </tr>
                <tr>
                    <td>Nama Unit</td>
                    <td>:</td>
                    <th><?= $pmr['nama_unit']; ?></th>
                </tr>
                <tr>
                    <td>Level Manajemen Resiko (Eselon)</td>
                    <td>:</td>
                    <th><?= $pmr['level_mr_eselon']; ?></th>
                </tr>
                <tr>
                    <td>Nama Level Unit</td>
                    <td>:</td>
                    <th><?= $pmr['nama_level_unit']; ?></th>
                </tr>
                <tr>
                    <td>Ruang Lingkup Penerapan</td>
                    <td>:</td>
                    <th><?= $pmr['ruang_lingkup_penerapan']; ?></th>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td>:</td>
                    <th><?= $pmr['periode']; ?></th>
                </tr>
                <tr>
                    <td>Output</td>
                    <td>:</td>
                    <th><?= $pmr['output']; ?></th>
                </tr>
            </table>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('/pmr/edit/' . $pmr['id']); ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>

            <form action="<?= base_url('/pmr/' . $pmr['id']); ?>" method="POST" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <?= csrf_field(); ?>
                <button type="submit" class="btn btn-sm btn-danger mx-3" onclick="return confirm('Anda Yakin Akan Menghapus Data Ini?')"><i class="fa fa-trash"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>