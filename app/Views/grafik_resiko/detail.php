<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">

    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center judul">Grafik Peta Resiko</h1>
        </div>
    </div>


    <div class="container mt-5">

        <table class="table-borderless table-hover table-sm">
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?= $pmr['tahun'] ?></td>
            </tr>
            <tr>
                <td>K / L / D</td>
                <td>:</td>
                <td><?= $pmr['kld'] ?></td>
            </tr>
            <tr>
                <td>Nama Unit</td>
                <td>:</td>
                <td><?= $pmr['nama_unit'] ?></td>
            </tr>
            <tr>
                <td>Level MR (Eselon)</td>
                <td>:</td>
                <td><?= $pmr['level_mr_eselon'] ?></td>
            </tr>
            <tr>
                <td>Nama Level Unit</td>
                <td>:</td>
                <td><?= $pmr['nama_level_unit'] ?></td>
            </tr>
        </table>

        <div class="card-body mt-5 row">
            <div id="petaResiko" class="col-md-10 peta"></div>
            <div class="col-md-2">

            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table-bordered table-hover table-sm table-font">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">No. Reg</th>
                    <th colspan="4">Resiko</th>
                    <th rowspan="2" colspan="2">Besaran / Level Resiko Identifikasi</th>
                </tr>
                <tr>
                    <th>Kejadian</th>
                    <th>Kategori</th>
                    <th>Penyebab</th>
                    <th>Dampak</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($identifikasi as $identifikasi) : ?>
                    <tr>
                        <td class="text-center"><?= $identifikasi['ev_no_reg'] ?></td>
                        <td><?= $identifikasi['ev_kejadian'] ?></td>
                        <td><?= $identifikasi['kategori_resiko'] ?></td>
                        <td><?= $identifikasi['penyebab'] ?></td>
                        <td><?= $identifikasi['dampak'] ?></td>
                        <td class="text-right"><?= $identifikasi['level_resiko'] ?></td>
                        <td><?= $identifikasi['tingkat_level_resiko'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="container ttd mt-5">
        <div class="footer">
            <div class="row">
                <div class="col-sm-4">
                    <p>Disiapkan oleh</p>
                    <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                    <br>
                    <br>
                    <p>_______________________</p>
                </div>
                <div class="col-sm-4">
                    <p>Diperiksa oleh</p>
                    <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                    <br>
                    <br>
                    <p>_______________________</p>
                </div>
                <div class="col-sm-4">
                    <p>Ditetapkan oleh</p>
                    <p><small>Tanggal, <?= date('d-m-Y') ?> </small></p>
                    <br>
                    <br>
                    <p>_______________________</p>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="noprint card-footer">
    <input type="button" class="btn btn-success" value="Print" onclick="window.print()">
</div>




<script src="<?= base_url(); ?>/public/assets/js/highcharts.js"></script>

<script>
    Highcharts.chart('petaResiko', {
        chart: {
            type: 'scatter',
            zoomType: 'xy',
            chartWidth: 50,
        },
        title: {
            text: 'Level Resiko'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            title: {
                enabled: true,
                text: 'Level Dampak',
            },
            step: 1,
            tickInterval: 1,
            startOnTick: true,
            endOnTick: false,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: 'Level Kemungkinan'
            },
            ticks: {
                min: 0,
                max: 6,
                maxTicksLimit: 10
            },
            step: 1,
            tickInterval: 1,
            endOnTick: false
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: 10,
            y: 5,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.chart.backgroundColor,
            borderWidth: 1
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 7,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(255,255,255)'
                        }
                    }
                },
                // states: {
                //     hover: {
                //         marker: {
                //             enabled: false
                //         }
                //     }
                // },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: ''
                }
            }
        },
        series: [{
                name: 'Level Resiko Identifikasi',
                color: 'rgba(44, 252, 3, .5)',
                data: [
                    <?php

                    foreach ($level_resiko as $level_resiko) { ?>[<?= $dampakSebelumnya[] = $level_resiko['level_dampak']; ?>, <?= $kemungkinanSebelumnya[] = $level_resiko['level_kemungkinan']; ?>],

                    <?php  } ?>
                ]
            },
            {
                name: '',
                color: 'rgba(255, 255, 255, .5)',
                data: [
                    [6, 6],
                    [0.1, 0.1]
                ]
            },

        ]
    });
</script>

<?= $this->endSection(); ?>