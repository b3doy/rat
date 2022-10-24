<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">

    <div class="row">
        <div class="col-md-10">
            <h1 class="text-center judul">Grafik Peta Mitigasi</h1>
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

            <div id="petaSebelumMitigasi" class="col-md-10 peta"></div>

            <div id="petaHarapan" class="col-md-10 peta mt-5"></div>

            <div class="col-md-2">

            </div>
        </div>

    </div>

    <div class="card-body">
        <table class="table-bordered table-hover table-sm table-font">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">No. Reg</th>
                    <th rowspan="2">Kejadian</th>
                    <th colspan="4">Sebelum Mitigasi</th>
                    <th colspan="4">Harapan Setelah Mitigasi</th>
                </tr>
                <tr>
                    <th>Level Kemungkinan</th>
                    <th>Level Dampak</th>
                    <th colspan="2">Besaran / Level Resiko</th>
                    <th>Level Kemungkinan</th>
                    <th>Level Dampak</th>
                    <th colspan="2">Besaran / Level Resiko</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evaluasi as $evaluasi) : ?>
                    <tr>
                        <td class="text-center"><?= $evaluasi['no_reg_resiko'] ?></td>
                        <td><?= $evaluasi['kejadian'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_kemungkinan_sebelumnya'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_dampak_sebelumnya'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_resiko_sebelumnya'] ?></td>
                        <td><?= $evaluasi['tingkat_level_resiko_sebelumnya'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_kemungkinan_harapan'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_dampak_harapan'] ?></td>
                        <td class="text-center"><?= $evaluasi['level_resiko_harapan'] ?></td>
                        <td><?= $evaluasi['tingkat_level_resiko_harapan'] ?></td>
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
    // Grafik Peta Resiko Sebelum Mitigasi

    Highcharts.chart('petaSebelumMitigasi', {
        chart: {
            type: 'scatter',
            zoomType: 'xy',
            chartWidth: 50,
        },
        title: {
            text: 'Grafik Sebelum Mitigasi'
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
            endOnTick: false,
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
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: ''
                }
            }
        },
        series: [{
                name: 'Level Resiko Sebelum Mitigasi',
                color: 'rgba(44, 252, 3, .5)',
                data: [<?php foreach ($level_resiko as $resiko_sebelum_mitigasi) { ?>[<?= $dampak_sebelum_mitigasi[] = $resiko_sebelum_mitigasi['level_dampak_sebelumnya']; ?>, <?= $kemungkinan_sebelum_mitigasi[] = $resiko_sebelum_mitigasi['level_kemungkinan_sebelumnya']; ?>],

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
            }

        ]
    });

    // GRAFIK Peta Resiko Harapan

    Highcharts.chart('petaHarapan', {
        chart: {
            type: 'scatter',
            zoomType: 'xy',
            chartWidth: 50,
        },
        title: {
            text: 'Grafik Harapan Setelah Mitigasi'
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
            endOnTick: false,
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
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: ''
                }
            }
        },
        series: [{
                name: 'Level Resiko Harapan Setelah Mitigasi',
                color: 'rgba(119, 152, 191, .5)',
                data: [<?php foreach ($level_resiko as $resiko_harapan) { ?>[<?= $dampak_harapan[] = $resiko_harapan['level_dampak_harapan']; ?>, <?= $kemungkinan_harapan[] = $resiko_harapan['level_kemungkinan_harapan']; ?>],

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
            }

        ]
    });
</script>


<?= $this->endSection(); ?>