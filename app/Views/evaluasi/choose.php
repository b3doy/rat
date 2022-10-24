<?php
echo $this->extend('layout/template');
echo $this->section('page-content');

?>

<div class="container mt-3">
    <h2><u>Evaluasi, Pemantauan dan Review Proses Pengelolaan Resiko</u></h2>
    <h5 class="my-5">Silahkan Pilih Terlebih Dahulu Kejadian dari Profile Resiko dan Mitigasi Resiko</h5>

    <form action="<?= base_url('/evaluasi/create/' . $pmr['id']); ?>" method="get" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="kejadian" class="col-sm-2 col-form-label">Kejadian</label>
            <div class="col-sm-6">
                <select name="kejadian" id="kejadian" class="form-control dynamic <?= ($validasi->hasError('kejadian')) ? 'is-invalid' : ''; ?>" required>
                    <option value="">----- Silahkan Pilih Kejadian -----</option>

                    <?php

                    foreach ($mitigasi as $mitigasi) {
                        $ket = "";
                        if (isset($_GET['kejadian'])) {
                            $kejadian = $_GET['kejadian'];
                            $pilihKejadian = trim($kejadian);

                            if ($pilihKejadian == $mitigasi->kejadian) {
                                $ket = "selected";
                            }
                        }

                    ?>
                        <option <?= $ket; ?> value="<?= $mitigasi['mitigasi_kejadian']; ?>"><?= $mitigasi['mitigasi_no_reg_resiko'] . ' - ' . $mitigasi['mitigasi_kejadian']; ?></option>


                    <?php } ?>

                </select>
                <div id="kejadian" class="invalid-feedback">
                    <?= $validasi->getError('kejadian'); ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-check-double"></i> Pilih</button>
        <a href="<?= base_url('/evaluasi/' . $pmr['id']); ?>" class="btn btn-secondary"><i class="fa fa-undo"></i> Batal</a>
    </form>
</div>
<?= $this->endSection(); ?>