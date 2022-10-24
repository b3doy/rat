<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-3">
    <!-- Brand Logo -->
    <a class="brand-link bg-transparent">
        <img src="<?= base_url(); ?>/public/assets/img/logo.png" alt="RAT Logo" class="elevation-2" id="logo-rat">
        <span class="brand-text font-weight-light text-md">Risk Assessment Tools</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-pills nav-sidebar user-panel mt-3 flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-user-tie fa-2x"></i>
                    <p>
                        <?= user()->fullname; ?>
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="dropdown-item nav-link" data-toggle="modal" data-target="#logoutModal">
                            <i class="nav-icon fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- <div class="dropdown-divider"></div> -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('/home'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-home text-primary"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <!-- USER MANAGEMENT MENU -->
                <?php if (in_groups('Administrator')) : ?>
                    <li class="nav-item user-panel">
                        <a href="<?= base_url('/user'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users text-success"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                <?php endif; ?>

                <!-- LEVEL UNIT MENU -->
                <li class="nav-header text-primary"><b>LEVEL UNIT</b></li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="far fa-circle text-primary nav-icon"></i>
                        <p>Parameter Level Unit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/pmr'); ?>" class="nav-link">
                        <i class="fas fa-tasks text-primary nav-icon"></i>
                        <p>Level Unit Penerapan <br> Manajemen Resiko</p>
                    </a>
                </li>
                </li>

                <!-- DAFTAR NAMA UNIT MENU -->
                <!-- <li class="nav-item user-panel">
                    <a href="<?= base_url('/dnu'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Daftar Nama Unit
                        </p>
                    </a>
                </li> -->

                <!-- SASARAN ORGANISASI MENU -->
                <li class="nav-item">
                    <a href="<?= base_url('/saron'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-bullseye text-danger"></i>
                        <p>
                            Sasaran Organisasi
                        </p>
                    </a>
                </li>

                <!-- STRUKTUR MANAJEMEN RESIKO MENU -->
                <li class="nav-item">
                    <a href="<?= base_url('/smr'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-grip-vertical text-info"></i>
                        <p>
                            Struktur Manajemen <br> Resiko
                        </p>
                    </a>
                </li>

                <!-- STAKEHOLDER MENU -->
                <li class="nav-item user-panel">
                    <a href="<?= base_url('/stakeholder'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>
                            Stakeholder
                        </p>
                    </a>
                </li>

                <!-- RESIKO MENU -->
                <li class="nav-header text-danger"><b>RESIKO</b></li>
                <li class="nav-item">
                    <a href="<?= base_url('/identifikasi'); ?>" class="nav-link">
                        <i class="nav-icon fab fa-searchengin text-danger"></i>
                        <p class="text">Profile / Identifikasi Resiko</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/mitigasi'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-scroll text-warning"></i></i>
                        <p>Mitigasi Resiko</p>
                    </a>
                </li>
                <li class="nav-item user-panel">
                    <a href="<?= base_url('/evaluasi'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-swatchbook text-success"></i>
                        <p>Evaluasi, Pemantauan <br> dan Review Proses <br> Pengelolaan Resiko</p>
                    </a>
                </li>

                <!-- PELAPORAN MENU -->
                <li class="nav-header text-info"><b>PELAPORAN</b></li>
                <li class="nav-item">
                    <a href="<?= base_url('/piagam'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-certificate text-info"></i>
                        <p class="text">Piagam Management <br> Resiko</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/profile'); ?>" class="nav-link">
                        <i class="nav-icon fab fa-periscope text-danger"></i>
                        <p>Profile Resiko</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/grafik_resiko'); ?>" class="nav-link">
                        <i class="fas fa-chart-line text-info nav-icon"></i>
                        <p>Grafik Peta Resiko</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/rtp'); ?>" class="nav-link">
                        <i class="far fa-list-alt text-warning nav-icon"></i>
                        <p>Mitigasi Resiko / RTP</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/monev'); ?>" class="nav-link">
                        <i class="fas fa-th-list text-success nav-icon"></i>
                        <p>Monev MR</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/grafik_mitigasi'); ?>" class="nav-link">
                        <i class="fas fa-chart-bar text-info nav-icon"></i>
                        <p>Grafik Peta Mitigasi</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <div class="dropdown-divider"></div>

        <!-- footer -->

        <footer class="sticky-footer bg-transparent user-panel">
            <div class="container">
                <div class="copyright text-left">
                    <span style="color:lightgrey;font-size:11px">Copyright &copy; R.A.T-1.0 <?= date('Y'); ?></span>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.sidebar -->
</aside>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Keluar Dari Sistem?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Logout" Jika Anda Tetap Ingin Keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>