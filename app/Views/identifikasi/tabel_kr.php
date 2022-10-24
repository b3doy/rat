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
                <h3><i>Tabel Kategori Resiko</i></h3>
                <table class="table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <th>Kategori</th>
                        <th>Reg</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <?php foreach ($kategoriResiko as $katres) : ?>
                            <tr>
                                <td><?= $katres['kategori_resiko']; ?></td>
                                <td><?= $katres['reg']; ?></td>
                                <td><?= $katres['keterangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>