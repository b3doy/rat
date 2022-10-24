<?php

echo $this->extend('auth/layouts/templates');
echo $this->section('content');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="register-box">
                <div class="card card-outline card-success">
                    <div class="text-center">
                        <h1 class="h4 mt-4" style="color: black;"><b>RAT 1.0</b></h1>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg" style="color: black;">Silahkan Registrasi User Baru</p>

                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= base_url('register') ?>" method="POST" class="user">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" name="fullname" placeholder="Nama Lengkap" value="<?= old('fullname') ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="unit_kerja" class="form-control form-control-user">
                                    <option value="">----- Silahkan Pilih Unit Kerja -----</option>
                                    <option value="Sekretariat Jendral">Sekretariat Jendral</option>
                                    <option value="Inspektorat Jendral">Inspektorat Jendral</option>
                                    <option value="Direktorat Jendral Pendidikan Islam">Direktorat Jendral Pendidikan Islam</option>
                                    <option value="Direktorat Jenderal Bimbingan Masyarakat Islam">Direktorat Jenderal Bimbingan Masyarakat Islam</option>
                                    <option value="Direktorat Jenderal Penyelenggara Haji dan Umrah">Direktorat Jenderal Penyelenggara Haji dan Umrah</option>
                                    <option value="Direktorat Jenderal Bimbingan Masyarakat Katolik">Direktorat Jenderal Bimbingan Masyarakat Katolik</option>
                                    <option value="Direktorat Jenderal Bimbingan Masyarakat Kristen">Direktorat Jenderal Bimbingan Masyarakat Kristen</option>
                                    <option value="Direktorat Jenderal Bimbingan Masyarakat Hindu">Direktorat Jenderal Bimbingan Masyarakat Hindu</option>
                                    <option value="Direktorat Jenderal Bimbingan Masyarakat Buddha">Direktorat Jenderal Bimbingan Masyarakat Buddha</option>
                                    <option value="Badan Litbang dan Diklat">Badan Litbang dan Diklat</option>
                                    <option value="Badan Penyelenggara Jaminan Produk Halal">Badan Penyelenggara Jaminan Produk Halal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?= session('errors.jabatan') ? 'is-invalid' : '' ?>" name="jabatan" placeholder="Jabatan" value="<?= old('jabatan') ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user <?= session('errors.telpon') ? 'is-invalid' : '' ?>" name="telpon" placeholder="No Telpon" value="<?= old('telpon') ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-user <?= session('errors.tahun') ? 'is-invalid' : '' ?>" name="tahun" placeholder="Tahun" value="<?= old('tahun') ?>">
                            </div>
                            <button type="submit" class="btn btn-success btn-user btn-block"><?= lang('Auth.register') ?></button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?>!</a>
                        </div>


                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>