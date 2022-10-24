<?= $this->extend('auth/layouts/templates'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 offset-sm-3">
            <div class="login-box">
                <div class="card card-outline card-success">
                    <div class="card-header text-center">
                        <h2 class="card-header">Lupa Password?</h2>
                    </div>
                    <div class="card-body">
                        <p class="login-box-msg">Isikan email anda dibawah ini, kami akan memberikan instruksi untuk reset password anda</p>
                        <form action="<?= base_url('forgot') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>

                            <br>

                            <button type="submit" class="btn btn-success btn-block">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>