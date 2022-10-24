<?= $this->extend('auth/layouts/templates'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="login-box">
                <!-- /.login-logo -->
                <div class="card card-outline card-success my-5">
                    <div class="text-center">
                        <h1 class="h4 mt-4" style="color: black;"><b>RAT 1.0</b></h1>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg" style="color: black;">Silahkan Login Untuk Memulai</p>
                        <?= view('Myth\Auth\Views\_message_block') ?>
                        <form action="<?= base_url('login') ?>" method="POST" class="user">
                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.login') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" name="tahun" class="form-control form-control-user <?php if (session('errors.tahun')) : ?>is-invalid<?php endif ?>" placeholder="Tahun">
                                <div class="invalid-feedback">
                                    <?= session('errors.tahun') ?>
                                </div>
                            </div>
                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <?= lang('Auth.rememberMe') ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <button type="submit" class="btn btn-success btn-user btn-block"><?= lang('Auth.loginAction') ?></button>
                        </form>
                        <hr>
                        <?php if ($config->activeResetter) : ?>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('forgot') ?>">Lupa Password ?</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.login-box -->
        </div>
    </div>


</div>

<?= $this->endSection(); ?>