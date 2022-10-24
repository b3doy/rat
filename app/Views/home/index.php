<?php

echo $this->extend('layout/template');
echo $this->section('page-content');

?>
<div class="container">
    <div class="jumbotron bg-transparent">
        <div class="row justify-content-center ml-5">
            <div class="col text-center">
                <h1>
                    <?php

                    $user = user()->fullname;

                    date_default_timezone_set("Asia/Jakarta");

                    $b = time();
                    $hour = date("G", $b);

                    if ($hour >= 0 && $hour <= 11) {
                        echo "Selamat Pagi " . $user;
                    } elseif ($hour >= 12 && $hour <= 14) {
                        echo "Selamat Siang " . $user;
                    } elseif ($hour >= 15 && $hour <= 17) {
                        echo "Selamat Sore " . $user;
                    } elseif ($hour >= 17 && $hour <= 18) {
                        echo "Selamat Petang " . $user;
                    } elseif ($hour >= 19 && $hour <= 23) {
                        echo "Selamat Malam " . $user;
                    }

                    ?>
                </h1>
                <br>
                <h2>Selamat Datang di Risk Assessment Tools</h2>
                <h3>(RAT-1.0)</h3>
                <p>Version 1.0</p>
                <hr>
                <p>Silahkan Memilih Menu di Sebelah Kiri Untuk Melanjutkan</p>
                <p>Semoga Hari Anda Menyenangkan</p>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>