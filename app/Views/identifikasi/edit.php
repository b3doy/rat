<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            <h2>Edit Data Profile / Identifikasi Resiko</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/identifikasi/detail/' . $identifikasi['pmr_id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <!-- Form Tambah Data -->
    <form action="<?= base_url('/identifikasi/update/' . $identifikasi['id']); ?>" class="mt-3 ml-3" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="sasaran_organisasi" class="col-sm-2 col-form-label">Sasaran Organisasi</label>
            <div class="col-sm-6">
                <select name="sasaran_organisasi" id="sasaran_organisasi" class="form-control <?= ($validasi->hasError('sasaran_organisasi')) ? 'is-invalid' : ''; ?>">
                    <option value="<?= $identifikasi['sasaran_organisasi']; ?>" selected><?= $identifikasi['sasaran_organisasi']; ?></option>
                    <option value="">----- Silahkan Pilih Sasaran Organisasi -----</option>
                    <?php foreach ($saron as $saron) : ?>
                        <option value="<?= $saron['daftar_sasaran']; ?>"><?= $saron['daftar_sasaran']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="sasaran_organisasi" class="invalid-feedback">
                    <?= $validasi->getError('sasaran_organisasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kejadian" class="col-sm-2 col-form-label">Kejadian</label>
            <div class="col-sm-6">
                <textarea name="kejadian" id="kejadian" class="form-control <?= ($validasi->hasError('kejadian')) ? 'is-invalid' : ''; ?>"><?= $identifikasi['kejadian']; ?></textarea>
                <div id="kejadian" class="invalid-feedback">
                    <?= $validasi->getError('kejadian'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kategori_resiko" class="col-sm-2 col-form-label">Kategori Resiko</label>
            <div class="col-sm-6">
                <select name="kategori_resiko" id="kategori_resiko" class="form-control <?= ($validasi->hasError('kategori_resiko')) ? 'is-invalid' : ''; ?>" onchange="resiko()">
                    <option value="<?= $identifikasi['kategori_resiko']; ?>" selected><?= $identifikasi['kategori_resiko']; ?></option>
                    <option value="">----- Silahkan Pilih Kategori Resiko -----</option>
                    <?php foreach ($kategoriResiko as $katres) : ?>
                        <option value="<?= $katres['kategori_resiko']; ?>"><?= $katres['kategori_resiko']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="kategori_resiko" class="invalid-feedback">
                    <?= $validasi->getError('kategori_resiko'); ?>
                </div>
                <small><a href="<?= base_url('/identifikasi/tabel_kr'); ?>" target="_blank">Lihat Detail Kategori Resiko</a></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="penyebab" class="col-sm-2 col-form-label">Penyebab</label>
            <div class="col-sm-6">
                <textarea name="penyebab" id="penyebab" class="form-control <?= ($validasi->hasError('penyebab')) ? 'is-invalid' : ''; ?>"><?= $identifikasi['penyebab']; ?></textarea>
                <div id="penyebab" class="invalid-feedback">
                    <?= $validasi->getError('penyebab'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="dampak" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-6">
                <textarea name="dampak" id="dampak" class="form-control <?= ($validasi->hasError('dampak')) ? 'is-invalid' : ''; ?>"><?= $identifikasi['dampak']; ?></textarea>
                <div id="dampak" class="invalid-feedback">
                    <?= $validasi->getError('dampak'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="uraian_spi" class="col-sm-2 col-form-label">Uraian SPI</label>
            <div class="col-sm-6">
                <textarea name="uraian_spi" id="uraian_spi" class="form-control <?= ($validasi->hasError('uraian_spi')) ? 'is-invalid' : ''; ?>"><?= $identifikasi['uraian_spi']; ?></textarea>
                <div id="uraian_spi" class="invalid-feedback">
                    <?= $validasi->getError('uraian_spi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="efektivitas" class="col-sm-2 col-form-label">Efektivitas</label>
            <div class="col-sm-6">
                <input type="text" name="efektivitas" id="efektivitas" class="form-control <?= ($validasi->hasError('efektivitas')) ? 'is-invalid' : ''; ?>" value="<?= $identifikasi['efektivitas']; ?>">
                <div id="efektivitas" class="invalid-feedback">
                    <?= $validasi->getError('efektivitas'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_kemungkinan" class="col-sm-2 col-form-label">Level Kemungkinan</label>
            <div class="col-sm-6">
                <select name="level_kemungkinan" id="level_kemungkinan" class="form-control <?= ($validasi->hasError('level_kemungkinan')) ? 'is-invalid' : ''; ?>" onchange="resiko()">
                    <option value="<?= $identifikasi['level_kemungkinan']; ?>" selected><?= $identifikasi['level_kemungkinan']; ?></option>
                    <option value="">----- Silahkan Pilih Level Kemungkinan Resiko -----</option>
                    <?php foreach ($levelKemungkinan as $levelMungkin) : ?>
                        <option value="<?= $levelMungkin['level']; ?>"><?= $levelMungkin['level']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="level_kemungkinan" class="invalid-feedback">
                    <?= $validasi->getError('level_kemungkinan'); ?>
                </div>
                <small><a href="<?= base_url('/identifikasi/tabel_lkr'); ?>" target="_blank">Lihat Detail Level Kemungkinan Resiko</a></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_dampak" class="col-sm-2 col-form-label">Level Dampak</label>
            <div class="col-sm-6">
                <select name="level_dampak" id="level_dampak" class="form-control <?= ($validasi->hasError('level_dampak')) ? 'is-invalid' : ''; ?>" onchange="resiko()">
                    <option value="<?= $identifikasi['level_dampak']; ?>" selected><?= $identifikasi['level_dampak']; ?></option>
                    <option value="">----- Silahkan Pilih Level Kemungkinan Resiko -----</option>
                    <?php foreach ($levelDampak as $levelDampak) : ?>
                        <option value="<?= $levelDampak['level']; ?>"><?= $levelDampak['level']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="level_dampak" class="invalid-feedback">
                    <?= $validasi->getError('level_dampak'); ?>
                </div>
                <small><a href="<?= base_url('/identifikasi/tabel_ldr'); ?>" target="_blank">Lihat Detail Level Dampak Resiko</a></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_resiko" class="col-sm-2 col-form-label">Level Resiko</label>
            <div class="col-sm-3">
                <input type="text" name="level_resiko" id="level_resiko" class="form-control <?= ($validasi->hasError('level_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $identifikasi['level_resiko']; ?>" readonly>
                <div id="level_resiko" class="invalid-feedback">
                    <?= $validasi->getError('level_resiko'); ?>
                </div>
            </div>
            <div class="col-sm-3 row">
                <input type="text" name="tingkat_level_resiko" id="tingkat_level_resiko" class="form-control" value="<?= $identifikasi['tingkat_level_resiko']; ?>" readonly>
                <input type="hidden" name="prioritas_resiko" id="prioritas_resiko">
                <input type="hidden" name="no_reg_resiko" id="no_reg_resiko">
            </div>
        </div>
        <div class="form-group row">
            <label for="keputusan_mitigasi" class="col-sm-2 col-form-label">Keputusan Mitigasi</label>
            <div class="col-sm-6">
                <select name="keputusan_mitigasi" id="keputusan_mitigasi" class="form-control <?= ($validasi->hasError('keputusan_mitigasi')) ? 'is-invalid' : ''; ?>">
                    <option value="<?= $identifikasi['keputusan_mitigasi']; ?>" selected><?= $identifikasi['keputusan_mitigasi']; ?></option>
                    <option value="">----- Silahkan Pilih Keputusan Mitigasi -----</option>
                    <option value="Iya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                <div id="keputusan_mitigasi" class="invalid-feedback">
                    <?= $validasi->getError('keputusan_mitigasi'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $identifikasi['pmr_id']; ?>">
        <input type="hidden" name="id" value="<?= $identifikasi['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Update Data</button>
    </form>
</div>
<?= $this->endSection(); ?>