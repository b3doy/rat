<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-transparent">
    <!-- Left navbar links -->
    <div class="bg-images">
        <div class="row">
            <div class="col-md-1 nav-item">
                <a class="nav-link text-dark mt-3" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </div>
            <div class="col-md-1" style="margin-left:-60px;">
                <img src="<?= base_url(); ?>/public/assets/img/kemenag.png" id="logo-nav" alt="Kemenag RI">
            </div>
            <div class="col-md-5 mr-auto mt-4">
                <a href="https://kemenag.go.id" target="_blank" class="text-decoration-none text-dark font-weight-bold">
                    <h2><b>Kementerian Agama RI</b></h2>
                </a>
            </div>
            <div class="col-md-4 rapat" style="margin-right: -60px;">
                <h4 class="mt-4"><?= user()->unit_kerja; ?></h4>
            </div>
            <div class="col-md-1 rapat">
                <a class="nav-link text-dark mt-3" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- /.navbar -->