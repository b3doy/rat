<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-10">
            <h2>Edit Data Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko</h2>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('/evaluasi/detail/' . $evaluasi['pmr_id']); ?>" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali Ke Menu Sebelumnya"><i class="fa fa-undo"></i> </a>
        </div>
    </div>

    <!-- Form Tambah Data -->
    <form action="<?= base_url('/evaluasi/update/' . $evaluasi['id']); ?>" class="mt-3 ml-3" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="prioritas_resiko" class="col-sm-2 col-form-label">Prioritas Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="prioritas_resiko" id="prioritas_resiko" class="form-control <?= ($validasi->hasError('prioritas_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['prioritas_resiko']; ?>" readonly>
                <div id="prioritas_resiko" class="invalid-feedback">
                    <?= $validasi->getError('prioritas_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_reg_resiko" class="col-sm-2 col-form-label">No Reg Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="no_reg_resiko" id="no_reg_resiko" class="form-control <?= ($validasi->hasError('no_reg_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['no_reg_resiko']; ?>" readonly>
                <div id="no_reg_resiko" class="invalid-feedback">
                    <?= $validasi->getError('no_reg_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="kejadian" class="col-sm-2 col-form-label">Kejadian</label>
            <div class="col-sm-6">
                <textarea name="kejadian" id="kejadian" class="form-control <?= ($validasi->hasError('kejadian')) ? 'is-invalid' : ''; ?>" readonly><?= $evaluasi['kejadian']; ?></textarea>
                <div id="kejadian" class="invalid-feedback">
                    <?= $validasi->getError('kejadian'); ?>
                </div>
            </div>
        </div>
        <br>

        <!-- Level Resiko Sebelumnya -->
        <p style="margin-left: -15px;"><b><u>Level Resiko Sebelumnya : </u></b></p>
        <div class="form-group row">
            <label for="level_kemungkinan_sebelumnya" class="col-sm-2 col-form-label">Level Kemungkinan</label>
            <div class="col-sm-6">
                <input type="text" name="level_kemungkinan_sebelumnya" id="level_kemungkinan_sebelumnya" class="form-control <?= ($validasi->hasError('level_kemungkinan_sebelumnya')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_kemungkinan_sebelumnya']; ?>" readonly>
                <div id="level_kemungkinan_sebelumnya" class="invalid-feedback">
                    <?= $validasi->getError('level_kemungkinan_sebelumnya'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_dampak_sebelumnya" class="col-sm-2 col-form-label">Level Dampak</label>
            <div class="col-sm-6">
                <input type="text" name="level_dampak_sebelumnya" id="level_dampak_sebelumnya" class="form-control <?= ($validasi->hasError('level_dampak_sebelumnya')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_dampak_sebelumnya']; ?>" readonly>
                <div id="level_dampak_sebelumnya" class="invalid-feedback">
                    <?= $validasi->getError('level_dampak_sebelumnya'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_resiko_sebelumnya" class="col-sm-2 col-form-label">Besaran / Level Resiko</label>
            <div class="col-sm-3">
                <input type="text" name="level_resiko_sebelumnya" id="level_resiko_sebelumnya" class="form-control <?= ($validasi->hasError('level_resiko_sebelumnya')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_resiko_sebelumnya']; ?>" readonly>
                <div id="level_resiko_sebelumnya" class="invalid-feedback">
                    <?= $validasi->getError('level_resiko_sebelumnya'); ?>
                </div>
            </div>
            <div class="col-sm-3 row">
                <input type="text" name="tingkat_level_resiko_sebelumnya" id="tingkat_level_resiko_sebelumnya" class="form-control" value="<?= $evaluasi['tingkat_level_resiko_sebelumnya']; ?>" readonly>
            </div>
        </div>
        <br>

        <!-- Level Resiko Harapan -->
        <p style="margin-left: -15px;"><b><u>Level Resiko Harapan : </u></b></p>
        <div class="form-group row">
            <label for="level_kemungkinan_harapan" class="col-sm-2 col-form-label">Level Kemungkinan</label>
            <div class="col-sm-6">
                <input type="text" name="level_kemungkinan_harapan" id="level_kemungkinan_harapan" class="form-control <?= ($validasi->hasError('level_kemungkinan_harapan')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_kemungkinan_harapan']; ?>" readonly>
                <div id="level_kemungkinan_harapan" class="invalid-feedback">
                    <?= $validasi->getError('level_kemungkinan_harapan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_dampak_harapan" class="col-sm-2 col-form-label">Level Dampak</label>
            <div class="col-sm-6">
                <input type="text" name="level_dampak_harapan" id="level_dampak_harapan" class="form-control <?= ($validasi->hasError('level_dampak_harapan')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_dampak_harapan']; ?>" readonly>
                <div id="level_dampak_harapan" class="invalid-feedback">
                    <?= $validasi->getError('level_dampak_harapan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_resiko_harapan" class="col-sm-2 col-form-label">Besaran / Level Resiko</label>
            <div class="col-sm-3">
                <input type="text" name="level_resiko_harapan" id="level_resiko_harapan" class="form-control <?= ($validasi->hasError('level_resiko_harapan')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_resiko_harapan']; ?>" readonly>
                <div id="level_resiko_harapan" class="invalid-feedback">
                    <?= $validasi->getError('level_resiko_harapan'); ?>
                </div>
            </div>
            <div class="col-sm-3 row">
                <input type="text" name="tingkat_level_resiko_harapan" id="tingkat_level_resiko_harapan" class="form-control" value="<?= $evaluasi['tingkat_level_resiko_harapan']; ?>" readonly>
            </div>
        </div>
        <br>

        <!-- Level Resiko Actual -->
        <p style="margin-left: -15px;"><b><u>Level Resiko Actual : </u></b></p>
        <div class="form-group row">
            <label for="level_kemungkinan_actual" class="col-sm-2 col-form-label">Level Kemungkinan</label>
            <div class="col-sm-6">
                <select name="level_kemungkinan_actual" id="level_kemungkinan_actual" class="form-control" onchange="risk()">
                    <option value="">----- Silahkan Pilih Level Kemungkinan Actual -----</option>
                    <option value="<?= $evaluasi['level_kemungkinan_actual']; ?>" selected><?= $evaluasi['level_kemungkinan_actual']; ?></option>
                    <?php foreach ($levelKemungkinan as $levelMungkin) : ?>
                        <option value="<?= $levelMungkin['level']; ?>"><?= $levelMungkin['level']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="level_kemungkinan_actual" class="invalid-feedback">
                    <?= $validasi->getError('level_kemungkinan_actual'); ?>
                </div>
                <small><a href="<?= base_url('/identifikasi/tabel_lkr'); ?>" target="_blank">Lihat Detail Level Kemungkinan Resiko</a></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_dampak_actual" class="col-sm-2 col-form-label">Level Dampak</label>
            <div class="col-sm-6">
                <select name="level_dampak_actual" id="level_dampak_actual" class="form-control" onchange="risk()">
                    <option value="">----- Silahkan Pilih Level Dampak Actual -----</option>
                    <option value="<?= $evaluasi['level_dampak_actual']; ?>" selected><?= $evaluasi['level_dampak_actual']; ?></option>
                    <?php foreach ($levelDampak as $levelDampak) : ?>
                        <option value="<?= $levelDampak['level']; ?>"><?= $levelDampak['level']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="level_dampak_actual" class="invalid-feedback">
                    <?= $validasi->getError('level_dampak_actual'); ?>
                </div>
                <small><a href="<?= base_url('/identifikasi/tabel_ldr'); ?>" target="_blank">Lihat Detail Level Dampak Resiko</a></small>
            </div>
        </div>
        <div class="form-group row">
            <label for="level_resiko_actual" class="col-sm-2 col-form-label">Besaran / Level Resiko</label>
            <div class="col-sm-3">
                <input type="text" name="level_resiko_actual" id="level_resiko_actual" class="form-control <?= ($validasi->hasError('level_resiko_actual')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['level_resiko_actual']; ?>" readonly>
                <div id="level_resiko_actual" class="invalid-feedback">
                    <?= $validasi->getError('level_resiko_actual'); ?>
                </div>
            </div>
            <div class="col-sm-3 row">
                <input type="text" name="tingkat_level_resiko_actual" id="tingkat_level_resiko_actual" class="form-control" value="<?= $evaluasi['tingkat_level_resiko_actual']; ?>" readonly>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="trend_resiko" class="col-sm-2 col-form-label">Trend Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="trend_resiko" id="trend_resiko" class="form-control <?= ($validasi->hasError('trend_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['trend_resiko']; ?>" readonly>
                <div id="trend_resiko" class="invalid-feedback">
                    <?= $validasi->getError('trend_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="deviasi_resiko" class="col-sm-2 col-form-label">Deviasi Resiko</label>
            <div class="col-sm-6">
                <input type="text" name="deviasi_resiko" id="deviasi_resiko" class="form-control <?= ($validasi->hasError('deviasi_resiko')) ? 'is-invalid' : ''; ?>" value="<?= $evaluasi['deviasi_resiko']; ?>" readonly>
                <div id="deviasi_resiko" class="invalid-feedback">
                    <?= $validasi->getError('deviasi_resiko'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi</label>
            <div class="col-sm-6">
                <textarea name="rekomendasi" id="rekomendasi" class="form-control <?= ($validasi->hasError('rekomendasi')) ? 'is-invalid' : ''; ?>"><?= $evaluasi['rekomendasi']; ?></textarea>
                <div id="rekomendasi" class="invalid-feedback">
                    <?= $validasi->getError('rekomendasi'); ?>
                </div>
            </div>
        </div>

        <input type="hidden" name="user_id" value="<?= user()->id; ?>">
        <input type="hidden" name="pmr_id" value="<?= $evaluasi['pmr_id']; ?>">
        <input type="hidden" name="identifikasi_id" value="<?= $evaluasi['identifikasi_id']; ?>">
        <input type="hidden" name="mitigasi_id" value="<?= $evaluasi['mitigasi_id']; ?>">
        <input type="hidden" name="id" value="<?= $evaluasi['id']; ?>">
        <button type="submit" class="btn btn-success mb-5"><i class="fa fa-paper-plane"></i> Simpan Data</button>
    </form>
</div>
<?= $this->endSection(); ?>