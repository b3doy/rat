<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2>Input Data Sasaran Organisasi</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/saron/detail/' . $pmr['id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <form action="<?= base_url('/saron/save/' . $pmr['id']); ?>" class="mt-3 ml-3" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="daftar_sasaran" class="col-sm-2 col-form-label">Daftar Sasaran</label>
            <div class="col-sm-6">
                <textarea name="daftar_sasaran" id="daftar_sasaran" class="form-control <?= ($validasi->hasError('daftar_sasaran')) ? 'is-invalid' : ''; ?>"><?= old('daftar_sasaran'); ?></textarea>
                <div id="daftar_sasaran" class="invalid-feedback">
                    <?= $validasi->getError('daftar_sasaran'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="indikator" class="col-sm-2 col-form-label">Indikator</label>
            <div class="col-sm-6">
                <input type="text" name="indikator" id="indikator" class="form-control <?= ($validasi->hasError('indikator')) ? 'is-invalid' : ''; ?>" value="<?= old('indikator'); ?>">
                <div id="indikator" class="invalid-feedback">
                    <?= $validasi->getError('indikator'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $pmr['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Simpan Data</button>
    </form>
</div>

<?= $this->endSection(); ?>