<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <h2><u>Mitigasi Resiko / Rencana Tindak Pengendalian (RTP)</u></h2>
    <h5 class="my-5">Silahkan Pilih Terlebih Dahulu Kejadian dari Profile Resiko</h5>

    <form action="<?= base_url('/mitigasi/create/' . $pmr['id']); ?>" method="get" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kejadian" class="col-sm-2 col-form-label">Kejadian</label>
            <div class="col-sm-6">
                <select name="kejadian" id="kejadian" class="form-control dynamic <?= ($validasi->hasError('kejadian')) ? 'is-invalid' : ''; ?>" required>
                    <option value="">----- Silahkan Pilih -----</option>

                    <?php

                    foreach ($identifikasi as $identifikasi) {
                        $ket = "";
                        if (isset($_GET['kejadian'])) {
                            $kejadian = $_GET['kejadian'];
                            $pilihKejadian = trim($kejadian);

                            if ($pilihKejadian == $identifikasi->kejadian) {
                                $ket = "selected";
                            }
                        }

                    ?>
                        <option <?= $ket; ?> value="<?= $identifikasi['kejadian']; ?>"><?= $identifikasi['kejadian']; ?></option>


                    <?php } ?>

                </select>
                <div id="kejadian" class="invalid-feedback">
                    <?= $validasi->getError('kejadian'); ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-check-double"></i> Pilih</button>
        <a href="<?= base_url('/mitigasi/' . $pmr['id']); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Batal</a>
    </form>
</div>
<?= $this->endSection(); ?>