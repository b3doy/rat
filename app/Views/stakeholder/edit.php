<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Data Stakeholder</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/stakeholder/detail/' . $stakeholder['pmr_id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <form action="<?= base_url('/stakeholder/update/' . $stakeholder['id']); ?>" class="mt-3 ml-3" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="stakeholder" class="col-sm-2 col-form-label">Stakeholder</label>
            <div class="col-sm-6">
                <input type="text" name="stakeholder" id="stakeholder" class="form-control <?= ($validasi->hasError('stakeholder')) ? 'is-invalid' : ''; ?>" value="<?= $stakeholder['stakeholder']; ?>">
                <div id="stakeholder" class="invalid-feedback">
                    <?= $validasi->getError('stakeholder'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-6">
                <textarea name="keterangan" id="keterangan" class="form-control <?= ($validasi->hasError('keterangan')) ? 'is-invalid' : ''; ?>"><?= $stakeholder['keterangan']; ?></textarea>
                <div id="keterangan" class="invalid-feedback">
                    <?= $validasi->getError('keterangan'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $stakeholder['pmr_id']; ?>">
        <input type="hidden" name="id" value="<?= $stakeholder['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Update Data</button>
    </form>
</div>

<?= $this->endSection(); ?>