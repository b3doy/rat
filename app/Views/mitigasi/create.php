<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-10">
            <h2>Input Data Mitigasi Resiko / Rencana Tindak Pengendalian (RTP)</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/mitigasi/detail/' . $pmr['id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>
    <!-- Form Tambah Data -->
    <form action="<?= base_url('/mitigasi/save/' . $pmr['id']); ?>" class="mt-3 ml-3" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="mitigasi_kejadian" class="col-sm-2 col-form-label">Kejadian</label>
            <div class="col-sm-6">
                <textarea name="mitigasi_kejadian" id="mitigasi_kejadian" class="form-control <?= ($validasi->hasError('mitigasi_kejadian')) ? 'is-invalid' : ''; ?>" readonly><?= $identifikasi['kejadian']; ?></textarea>
                <div id="mitigasi_kejadian" class="invalid-feedback">
                    <?= $validasi->getError('mitigasi_kejadian'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="mitigasi_prioritas_resiko" class="col-sm-2 col-form-label">Prioritas Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="mitigasi_prioritas_resiko" id="mitigasi_prioritas_resiko" class="form-control <?= ($validasi->hasError('mitigasi_prioritas_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $identifikasi['prioritas_resiko']; ?>" readonly>
                <div id="mitigasi_prioritas_resiko" class="invalid-feedback">
                    <?= $validasi->getError('mitigasi_prioritas_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="mitigasi_no_reg_resiko" class="col-sm-2 col-form-label">No Reg Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="mitigasi_no_reg_resiko" id="mitigasi_no_reg_resiko" class="form-control <?= ($validasi->hasError('mitigasi_no_reg_resiko')) ? 'is-invalid' : ''; ?>" value="<?php
                                                                                                                                                                                                        if ($mitigasi !== null) {
                                                                                                                                                                                                            if ($mitigasi['mitigasi_no_reg_resiko'] != $identifikasi['no_reg_resiko'] . $identifikasi['no_identifikasi']) {
                                                                                                                                                                                                                echo $identifikasi['no_reg_resiko'] . $identifikasi['no_identifikasi'];
                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                echo $identifikasi['no_reg_resiko'] . intval($identifikasi['no_identifikasi']) + 1;
                                                                                                                                                                                                            }
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo $identifikasi['no_reg_resiko'] . $identifikasi['no_identifikasi'];
                                                                                                                                                                                                        }
                                                                                                                                                                                                        ?>" readonly>
                <div id="mitigasi_no_reg_resiko" class="invalid-feedback">
                    <?= $validasi->getError('mitigasi_no_reg_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="opsi_mitigasi" class="col-sm-2 col-form-label">Opsi Mitigasi</label>
            <div class="col-sm-6">
                <input type="text" name="opsi_mitigasi" id="opsi_mitigasi" class="form-control <?= ($validasi->hasError('opsi_mitigasi')) ? 'is-invalid' : ''; ?>" value="<?= $identifikasi['keputusan_mitigasi']; ?>" readonly>
                <div id="opsi_mitigasi" class="invalid-feedback">
                    <?= $validasi->getError('opsi_mitigasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="keg_pengendalian_tambahan" class="col-sm-2 col-form-label">Keg. Pengendalian Tambahan</label>
            <div class="col-sm-6">
                <textarea name="keg_pengendalian_tambahan" id="keg_pengendalian_tambahan" class="form-control <?= ($validasi->hasError('keg_pengendalian_tambahan')) ? 'is-invalid' : ''; ?>" autofocus><?= old('keg_pengendalian_tambahan'); ?></textarea>
                <div id="keg_pengendalian_tambahan" class="invalid-feedback">
                    <?= $validasi->getError('keg_pengendalian_tambahan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="target" class="col-sm-2 col-form-label">Target</label>
            <div class="col-sm-6">
                <input type="text" name="target" id="target" class="form-control <?= ($validasi->hasError('target')) ? 'is-invalid' : ''; ?>" value="<?= old('target'); ?>">
                <div id="target" class="invalid-feedback">
                    <?= $validasi->getError('target'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="jadwal_implementasi" class="col-sm-2 col-form-label">Jadwal Implementasi</label>
            <div class="col-sm-6">
                <input type="text" name="jadwal_implementasi" id="jadwal_implementasi" class="form-control <?= ($validasi->hasError('jadwal_implementasi')) ? 'is-invalid' : ''; ?>" value="<?= old('jadwal_implementasi'); ?>">
                <div id="jadwal_implementasi" class="invalid-feedback">
                    <?= $validasi->getError('jadwal_implementasi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="penanggung_jawab" class="col-sm-2 col-form-label">Penanggung Jawab</label>
            <div class="col-sm-6">
                <input type="text" name="penanggung_jawab" id="penanggung_jawab" class="form-control <?= ($validasi->hasError('penanggung_jawab')) ? 'is-invalid' : ''; ?>" value="<?= old('penanggung_jawab'); ?>">
                <div id="penanggung_jawab" class="invalid-feedback">
                    <?= $validasi->getError('penanggung_jawab'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_kemungkinan" class="col-sm-2 col-form-label">Level Kemungkinan</label>
            <div class="col-sm-6">
                <select name="level_kemungkinan" id="level_kemungkinan" class="form-control <?= ($validasi->hasError('level_kemungkinan')) ? 'is-invalid' : ''; ?>" onchange="resiko()">
                    <option value="">----- Silahkan Pilih Level Kemungkinan Resiko -----</option>
                    <?php foreach ($levelKemungkinan as $levelMungkin) : ?>
                        <option value="<?= $levelMungkin['level']; ?>"><?= $levelMungkin['level']; ?></option>
                    <?php endforeach; ?>
                    <option value="<?= old('level_kemungkinan'); ?>"><?= old('level_kemungkinan'); ?></option>
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
                    <option value="">----- Silahkan Pilih Level Kemungkinan Resiko -----</option>
                    <?php foreach ($levelDampak as $levelDampak) : ?>
                        <option value="<?= $levelDampak['level']; ?>"><?= $levelDampak['level']; ?></option>
                    <?php endforeach; ?>
                    <option value="<?= old('level_dampak'); ?>"><?= old('level_dampak'); ?></option>
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
                <input type="text" name="level_resiko" id="level_resiko" class="form-control <?= ($validasi->hasError('level_resiko')) ? 'is-invalid' : ''; ?>" value="<?= old('level_resiko'); ?>" readonly>
                <div id="level_resiko" class="invalid-feedback">
                    <?= $validasi->getError('level_resiko'); ?>
                </div>
            </div>
            <div class="col-sm-3 row">
                <input type="text" name="tingkat_level_resiko" id="tingkat_level_resiko" class="form-control" value="<?= old('tingkat_level_resiko'); ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="mitigasi_dilaksanakan" class="col-sm-2 col-form-label">Mitigasi Dilaksanakan</label>
            <div class="col-sm-6">
                <select name="mitigasi_dilaksanakan" id="mitigasi_dilaksanakan" class="form-control <?= ($validasi->hasError('mitigasi_dilaksanakan')) ? 'is-invalid' : ''; ?>">
                    <option value="">----- Silahkan Pilih Keputusan Mitigasi -----</option>
                    <option value="Iya">Ya</option>
                    <option value="Tidak">Tidak</option>
                    <option value="<?= old('mitigasi_dilaksanakan'); ?>"><?= old('mitigasi_dilaksanakan'); ?></option>
                </select>
                <div id="mitigasi_dilaksanakan" class="invalid-feedback">
                    <?= $validasi->getError('mitigasi_dilaksanakan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="capaian_target" class="col-sm-2 col-form-label">Capaian Target</label>
            <div class="col-sm-6">
                <textarea name="capaian_target" id="capaian_target" class="form-control <?= ($validasi->hasError('capaian_target')) ? 'is-invalid' : ''; ?>"><?= old('capaian_target'); ?></textarea>
                <div id="capaian_target" class="invalid-feedback">
                    <?= $validasi->getError('capaian_target'); ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $pmr['id']; ?>">
        <input type="hidden" name="identifikasi_id" value="<?= $identifikasi['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Simpan Data</button>
    </form>
</div>
<?= $this->endSection(); ?>