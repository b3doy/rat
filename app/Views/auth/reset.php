<?= $this->extend('auth/layouts/templates'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 offset-sm-3">

            <div class="login-box">
                <div class="card card-outline card-success">
                    <div class="card-header text-center">
                        <h2 class="card-header">Reset Password</h2>
                    </div>
                    <div class="card-body">

                        <?= view('Myth\Auth\Views\_message_block') ?>

                        <p><?= lang('Auth.enterCodeEmailPassword') ?></p>

                        <form action="<?= base_url('reset-password') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="token"><?= lang('Auth.token') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.token') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password">
                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pass_confirm">Ulangi Password Baru</label>
                                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                                <div class="invalid-feedback">
                                    <?= session('errors.pass_confirm') ?>
                                </div>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-success btn-block"><?= lang('Auth.resetPassword') ?></button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>