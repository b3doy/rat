<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2><u>Edit Data Penerapan Manajemen Resiko</u></h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/pmr'); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <form action="<?= base_url('/pmr/update/' . $pmr['id']); ?>" class="mt-3" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-6">
                <input type="number" name="tahun" id="tahun" class="form-control <?= ($validasi->hasError('tahun')) ? 'is-invalid' : ''; ?>" value="<?= $pmr['tahun']; ?>" autofocus>
                <div id="tahun" class="invalid-feedback">
                    <?= $validasi->getError('tahun'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kld" class="col-sm-2 col-form-label">K / L / D</label>
            <div class="col-sm-6">
                <input type="text" name="kld" class="form-control" id="kld" value="<?= $pmr['kld']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_unit" class="col-sm-2 col-form-label">Nama Unit</label>
            <div class="col-sm-6">
                <input type="text" name="nama_unit" class="form-control" id="nama_unit" value="<?= $pmr['nama_unit']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_mr_eselon" class="col-sm-2 col-form-label">Level MR (Eselon)</label>
            <div class="col-sm-6">
                <select name="level_mr_eselon" class="form-control <?= ($validasi->hasError('level_mr_eselon')) ? 'is-invalid' : ''; ?>" id="level_mr_eselon">
                    <option value="">----- Silahkan Pilih Lever MR (Eselon) -----</option>
                    <option value="Eselon I">Eselon I</option>
                    <option value="Eselon II">Eselon II</option>
                    <option value="Eselon III">Eselon III</option>
                    <option value="Eselon IV">Eselon IV</option>
                    <option value="<?= $pmr['level_mr_eselon']; ?>" selected><?= $pmr['level_mr_eselon']; ?></option>
                </select>
                <div id="level_mr_eselon" class="invalid-feedback">
                    <?= $validasi->getError('level_mr_eselon'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="nama_level_unit" class="col-sm-2 col-form-label">Nama Level Unit</label>
            <div class="col-sm-6">
                <input type="text" name="nama_level_unit" id="nama_level_unit" class="form-control <?= ($validasi->hasError('nama_level_unit')) ? 'is-invalid' : ''; ?>" value="<?= $pmr['nama_level_unit']; ?>">
                <div id="nama_level_unit" class="invalid-feedback">
                    <?= $validasi->getError('nama_level_unit'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="ruang_lingkup_penerapan" class="col-sm-2 col-form-label">Ruang Lingkup Penerapan</label>
            <div class="col-sm-6">
                <textarea name="ruang_lingkup_penerapan" id="ruang_lingkup_penerapan" class="form-control <?= ($validasi->hasError('ruang_lingkup_penerapan')) ? 'is-invalid' : ''; ?>"><?= $pmr['ruang_lingkup_penerapan']; ?></textarea>
                <div id="ruang_lingkup_penerapan" class="invalid-feedback">
                    <?= $validasi->getError('ruang_lingkup_penerapan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
            <div class="col-sm-6">
                <input type="number" name="periode" id="periode" class="form-control <?= ($validasi->hasError('periode')) ? 'is-invalid' : ''; ?>" value="<?= $pmr['periode']; ?>">
                <div id="periode" class="invalid-feedback">
                    <?= $validasi->getError('periode'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="output" class="col-sm-2 col-form-label">Output</label>
            <div class="col-sm-6">
                <input type="text" name="output" id="output" class="form-control <?= ($validasi->hasError('output')) ? 'is-invalid' : ''; ?>" value="<?= $pmr['output']; ?>">
                <div id="output" class="invalid-feedback">
                    <?= $validasi->getError('output'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="data_sudah_benar" class="col-sm-2 col-form-label">Apakah Input Data Sudah Benar?</label>
            <div class="col-sm-6">
                <select name="data_sudah_benar" id="data_sudah_benar" class="form-control <?= ($validasi->hasError('data_sudah_benar')) ? 'is-invalid' : ''; ?>">
                    <option value="">----- Silahkan Pilih -----</option>
                    <option value="Iya">Iya</option>
                    <option value="Tidak">Tidak</option>
                    <option value="<?= $pmr['data_sudah_benar']; ?>" selected><?= $pmr['data_sudah_benar']; ?></option>
                </select>
                <div id="data_sudah_benar" class="invalid-feedback">
                    <?= $validasi->getError('data_sudah_benar'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $pmr['id']; ?>">
        <input type="hidden" name="user_id" value="<?= $pmr['user_id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Update Data</button>
    </form>
</div>

<?= $this->endSection(); ?>