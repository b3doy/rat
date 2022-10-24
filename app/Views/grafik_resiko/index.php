<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="container mt-3">
    <h2><u>Grafik Peta Resiko</u></h2>

    <h6 class=""><b>Daftar Nama Unit :</b></h6>
    <div class="row">
        <div class="col-lg-9">
            <table class="table table-borderless table-hover">
                <?php foreach ($pmr as $pmr) : ?>
                    <?php if (user()->id == $pmr['user_id']) : ?>
                        <tr>
                            <td><?= $pmr['tahun']; ?></td>
                            <td><?= $pmr['nama_level_unit']; ?></td>
                            <td><?= $pmr['level_mr_eselon']; ?></td>
                            <td>
                                <a href="<?= base_url('/grafik_resiko/' . $pmr['id']); ?>" class="btn btn-info btn-xs"><i class="fa fa-book"></i> Detail Pelaporan</a>
                            </td>
                        </tr>
                <?php endif;
                endforeach; ?>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>