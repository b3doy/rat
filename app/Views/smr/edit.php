<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Data Struktur Manajemen Resiko</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/smr/detail/' . $smr['pmr_id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <form action="<?= base_url('/smr/update/' . $smr['id']); ?>" class="mt-3 ml-3" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-6">
                <textarea name="nama" id="nama" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : ''; ?>"><?= $smr['nama']; ?></textarea>
                <div id="nama" class="invalid-feedback">
                    <?= $validasi->getError('nama'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-6">
                <input type="text" name="jabatan" id="jabatan" class="form-control <?= ($validasi->hasError('jabatan')) ? 'is-invalid' : ''; ?>" value="<?= $smr['jabatan']; ?>">
                <div id="jabatan" class="invalid-feedback">
                    <?= $validasi->getError('jabatan'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $smr['pmr_id']; ?>">
        <input type="hidden" name="id" value="<?= $smr['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Update Data</button>
    </form>
</div>

<?= $this->endSection(); ?>