<?php
echo $this->extend('layout/template');
echo $this->section('page-content');
?>

<div class="card">
    <div class="row">
        <div class="col-md-11">
            <h1 class="text-center mt-2 ml-5">PIAGAM MANAJEMEN RESIKO</h1>
        </div>
        <div class="col-md-1">
            <h6 class="text-right">Form 1</h6>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">1. PARAMETER PENERAPAN MANAJEMEN RESIKO</h6>
                <table class="table-borderless table-hover table-sm table-earning">
                    <tr>
                        <td>Tahun</td>
                        <td>:</td>
                        <td><?= $pmr['tahun']; ?></td>
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
                    <tr>
                        <td>Ruang Lingkup</td>
                        <td>:</td>
                        <td><?= $pmr['ruang_lingkup_penerapan'] ?></td>
                    </tr>
                    <tr>
                        <td>Periode</td>
                        <td>:</td>
                        <td><?= $pmr['periode'] ?></td>
                    </tr>
                    <tr>
                        <td>Keluaran</td>
                        <td>:</td>
                        <td><?= $pmr['output'] ?></td>
                    </tr>
                </table>
            </div>

            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">2. SASARAN ORGANISASI</h6>
                <table class="table table-hover table-sm table-bordered table-font">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th colspan="2" class="text-center">Daftar Sasaran</th>
                            <th rowspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <th>Uraian</th>
                            <th>Indikator</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($saron as $saron) : $no++; ?>
                            <tr>
                                <td class="text-right"><?= $no ?></td>
                                <td><?= $saron['daftar_sasaran'] ?></td>
                                <td><?= $saron['indikator'] ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">3. STRUKTUR MANAJEMEN RESIKO</h6>
                <table class="table table-hover table-sm table-bordered table-font">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($smr as $smr) : $no++; ?>
                            <tr>
                                <td class="text-right"><?= $no; ?></td>
                                <td><?= $smr['nama'] ?></td>
                                <td><?= $smr['jabatan'] ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">4. DAFTAR PEMANGKU KEPENTINGAN (STAKEHOLDER)</h6>
                <table class="table table-hover table-sm table-bordered table-font">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Stakeholder</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($stakeholder as $stakeholder) : $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $stakeholder['stakeholder'] ?></td>
                                <td><?= $stakeholder['keterangan'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">5. KRITERIA RESIKO</h6>
                <P class="text-success"><u>A. Kriteria Kemungkinan</u></P>
                <table class="table table-hover table-sm table-bordered table-font">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Kemungkinan</th>
                            <th>Probabilitas</th>
                            <th>Frekuensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kemungkinan as $kemungkinan) : ?>
                            <tr>
                                <td><?= $kemungkinan['level']; ?></td>
                                <td><?= $kemungkinan['kemungkinan']; ?></td>
                                <td><?= $kemungkinan['persentase_transaksi_satu_periode']; ?></td>
                                <td><?= $kemungkinan['kemungkinan_jml_frekuensi_suatu_periode_5_tahun']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- </div> -->

                <!-- <div class="card-body border-bottom" style="margin-top: 12%;"> -->
                <P class="text-success mt-3"><u>B. Kriteria Dampak</u></P>
                <table class="table table-hover table-sm table-bordered table-font">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Level Dampak</th>
                            <th>Kerugian Negara</th>
                            <th>Penurunan Reputasi</th>
                            <th>Penurunan kinerja</th>
                            <th>Gangguan Terhadap Pelayanan</th>
                            <th>Jumlah Tuntutan Hukum</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dampak as $dampak) : ?>
                            <tr>
                                <td><?= $dampak['level']; ?></td>
                                <td><?= $dampak['dampak']; ?></td>
                                <td><?= $dampak['jumlah_kerugian_negara']; ?></td>
                                <td><?= $dampak['penurunan_reputasi']; ?></td>
                                <td><?= $dampak['penurunan_kinerja']; ?></td>
                                <td><?= $dampak['gangguan_terhadap_pelayanan']; ?></td>
                                <td><?= $dampak['jumlah_tuntutan_hukum']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="card-body border-bottom">
                <h6 class="text-primary font-weight-bold">6. MATRIKS ANALISIS RESIKO UNTUK MENENTUKAN LEVEL DAN PRIORITAS RESIKO</h6>
                <table class="table table-hover table-bordered table-sm table-font">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="3" colspan="3" id="ver" class="bg-darkblue">Matriks Analisis Resiko 5x5</th>
                            <th colspan="5" class="bg-lightblue">Level Dampak</th>
                        </tr>
                        <tr class="bg-lightblue">
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                        <tr class="bg-lightblue">
                            <th>Tidak Signifikan</th>
                            <th>Minor</th>
                            <th>Moderat</th>
                            <th>Signifikan</th>
                            <th>Sangat Signifikan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th rowspan="5" id="ver" class="bg-lightblue">Level Kemungkinan</th>
                            <th class="bg-lightblue">5</th>
                            <th class="bg-lightblue">Hampir Pasti Terjadi</th>
                            <td class="bg-yellow">17</td>
                            <td class="bg-yellow">10</td>
                            <td class="bg-orange">6</td>
                            <td class="bg-red">3</td>
                            <td class="bg-red">1</td>
                        </tr>
                        <tr>
                            <th class="bg-lightblue">4</th>
                            <th class="bg-lightblue">Sering Terjadi</th>
                            <td class="bg-lightgreen">20</td>
                            <td class="bg-yellow">13</td>
                            <td class="bg-orange">8</td>
                            <td class="bg-orange">4</td>
                            <td class="bg-red">2</td>
                        </tr>
                        <tr>
                            <th class="bg-lightblue">3</th>
                            <th class="bg-lightblue">Kadang Terjadi</th>
                            <td class="bg-lightgreen">22</td>
                            <td class="bg-yellow">15</td>
                            <td class="bg-yellow">11</td>
                            <td class="bg-orange">7</td>
                            <td class="bg-orange">5</td>
                        </tr>
                        <tr>
                            <th class="bg-lightblue">2</th>
                            <th class="bg-lightblue">Jarang Terjadi</th>
                            <td class="bg-green">24</td>
                            <td class="bg-lightgreen">19</td>
                            <td class="bg-yellow">14</td>
                            <td class="bg-yellow">12</td>
                            <td class="bg-yellow">9</td>
                        </tr>
                        <tr>
                            <th class="bg-lightblue">1</th>
                            <th class="bg-lightblue">Hampir Tidak Terjadi</th>
                            <td class="bg-green">25</td>
                            <td class="bg-green">23</td>
                            <td class="bg-lightgreen">21</td>
                            <td class="bg-lightgreen">18</td>
                            <td class="bg-yellow">16</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered table-hover table-sm table-font">
                    <thead class="text-center thead-dark">
                        <tr>
                            <th>Tingkatan</th>
                            <th>Level Resiko</th>
                            <th>Prioritas Resiko</th>
                            <th>Besaran Resiko</th>
                            <th>Warna</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td rowspan="3" id="ver">5</td>
                            <td rowspan="3" id="ver">Sangat Tinggi</td>
                            <td>1</td>
                            <td>25</td>
                            <td class="bg-red"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>24</td>
                            <td class="bg-red"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>23</td>
                            <td class="bg-red"></td>
                        </tr>
                        <tr>
                            <td rowspan="5" id="ver">4</td>
                            <td rowspan="5" id="ver">Tinggi</td>
                            <td>4</td>
                            <td>22</td>
                            <td class="bg-orange"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>21</td>
                            <td class="bg-orange"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>20</td>
                            <td class="bg-orange"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>19</td>
                            <td class="bg-orange"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>18</td>
                            <td class="bg-orange"></td>
                        </tr>
                        <tr>
                            <td rowspan="9" id="ver">3</td>
                            <td rowspan="9" id="ver">Sedang</td>
                            <td>9</td>
                            <td>17</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>16</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>15</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>14</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>13</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>12</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>11</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>10</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>9</td>
                            <td class="bg-yellow"></td>
                        </tr>
                        <tr>
                            <td rowspan="5" id="ver">2</td>
                            <td rowspan="5" id="ver">Rendah</td>
                            <td>18</td>
                            <td>8</td>
                            <td class="bg-lightgreen"></td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td>7</td>
                            <td class="bg-lightgreen"></td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td>6</td>
                            <td class="bg-lightgreen"></td>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td>5</td>
                            <td class="bg-lightgreen"></td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td>4</td>
                            <td class="bg-lightgreen"></td>
                        </tr>
                        <tr>
                            <td rowspan="3" id="ver">1</td>
                            <td rowspan="3" id="ver">Sangat Rendah</td>
                            <td>23</td>
                            <td>3</td>
                            <td class="bg-green"></td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td>2</td>
                            <td class="bg-green"></td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td>1</td>
                            <td class="bg-green"></td>
                        </tr>
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
    </div>
</div>

<div class="noprint card-footer">
    <button class="btn btn-outline-success" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
</div>
<?= $this->endSection(); ?>