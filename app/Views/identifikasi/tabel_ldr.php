<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/style.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/public/assets/img/rat.ico" type="image/x-icon">


    <title>Tabel Kategori Resiko</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h3><i>Tabel Dampak Resiko</i></h3>
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <th>Level</th>
                        <th>Dampak</th>
                        <th>Jumlah Kerugian Negara</th>
                        <th>Penurunan Reputasi</th>
                        <th>Penurunan Kinerja</th>
                        <th>Gangguan Terhadap Pelayanan</th>
                        <th>Jumlah Tuntutan Hukum</th>
                    </thead>
                    <tbody>
                        <?php foreach ($levelDampak as $levelDampak) : ?>
                            <tr>
                                <td><?= $levelDampak['level']; ?></td>
                                <td><?= $levelDampak['dampak']; ?></td>
                                <td><?= $levelDampak['jumlah_kerugian_negara']; ?></td>
                                <td><?= $levelDampak['penurunan_reputasi']; ?></td>
                                <td><?= $levelDampak['penurunan_kinerja']; ?></td>
                                <td><?= $levelDampak['gangguan_terhadap_pelayanan']; ?></td>
                                <td><?= $levelDampak['jumlah_tuntutan_hukum']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>