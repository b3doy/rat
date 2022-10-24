<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url(); ?>/public/assets/img/logo1.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/my.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/plugins/sweetalert2/sweetalert2.min.css">

    <script src="<?= base_url(); ?>/public/assets/js/jquery-3.0.6.js"></script>
    <script src="<?= base_url(); ?>/public/assets/datatables/datatables.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <title><?= $title; ?></title>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse sidebar-closed">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?= base_url(); ?>/public/assets/img/kemenag.png" alt="KEMENAG" height="60" width="60">
    </div> -->

    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- Topbar -->
        <?= $this->include('layout/topbar'); ?>
        <!-- End of Topbar -->

        <!-- Sidebar -->
        <?= $this->include('layout/sidebar'); ?>
        <!-- End of Sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-transparent">
            <div class="container-fluid pt-5">
                <div class="row">
                    <div class="col">
                        <?= $this->renderSection('page-content'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?= $this->include('layout/footer'); ?>
        <!-- End of Footer -->
    </div>
    <!-- End of Page Wrapper -->


    <!-- <script src="<?= base_url(); ?>/public/assets/plugins/jquery-ui/jquery-ui.min.css"></script> -->
    <script src="<?= base_url(); ?>/public/assets/js/jquery.maskMoney.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/sparklines/sparkline.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/adminlte.min.js"></script>
    <!-- <script src="<?= base_url(); ?>/public/assets/js/pages/dashboard.js"></script> -->
    <script src="<?= base_url(); ?>/public/assets/js/sum.js"></script>
    <script src="<?= base_url(); ?>/public/assets/js/my.js"></script>


</body>

</html>