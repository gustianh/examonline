<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrasi</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo site_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?php echo site_url('assets/css/sb-admin-2.css'); ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SMA NEGERI 1 CILEUNGSI <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($level == '1') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen
            </div>

            <!-- Manajemen User -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePengguna" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengguna</span>
                </a>
                <div id="collapsePengguna" class="collapse" aria-labelledby="headingPengguna"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengguna:</h6>
                        <a class="collapse-item" href="<?php echo site_url('operator'); ?>">Operator</a>
                        <a class="collapse-item" href="<?php echo site_url('guru'); ?>">Guru</a>
                        <a class="collapse-item" href="<?php echo site_url('siswa'); ?>">Siswa</a>
                    </div>
                </div>
            </li>

            <!-- Pelajaran -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePelajaran"
                    aria-expanded="true" aria-controls="collapsePelajaran">
                    <i class="fas fa-fw fa-book-reader"></i>
                    <span>Pelajaran</span>
                </a>
                <div id="collapsePelajaran" class="collapse" aria-labelledby="headingPelajaran"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pelajaran:</h6>
                        <a class="collapse-item" href="<?php echo site_url('mapel'); ?>">Mata Pelajaran</a>
                        <a class="collapse-item" href="<?php echo site_url('kelas'); ?>">Kelas</a>
                        <a class="collapse-item" href="<?php echo site_url('rombel'); ?>">Rombongan Belajar</a>
                    </div>
                </div>
            </li>

            <!-- Soal -->
            <?php if ($level == '1' || $level == '2') { ?>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSoal" aria-expanded="true"
                    aria-controls="collapseSoal">
                    <i class="fas fa-fw fa-sticky-note"></i>
                    <span>Soal</span>
                </a>
                <div id="collapseSoal" class="collapse" aria-labelledby="headingSoal" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bank Soal:</h6>
                        <a class="collapse-item" href="<?php echo site_url('soal'); ?>">Soal</a>
                        <a class="collapse-item" href="<?php echo site_url('paket_soal'); ?>">Paket Soal</a>
                    </div>
                </div>
            </li>
            <?php }} ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <?php if ($level == '1'|| $level == '2'|| $level == '3') { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Fitur
            </div>

            <!-- Ujian -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUjian" aria-expanded="true"
                    aria-controls="collapseUjian">
                    <i class="fas fa-fw fa-diagnoses"></i>
                    <span>Ujian</span>
                </a>
                <div id="collapseUjian" class="collapse" aria-labelledby="headingUjian" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ujian:</h6>
                        <a class="collapse-item" href="<?= site_url('ujian'); ?>">Ujian</a>
                        <?php if ($level == '1'|| $level == '2') { ?>
                        <a class="collapse-item" href="<?= site_url('hasil_ujian'); ?>">Hasil Ujian</a>
                        <?php } ?>
                        <a class="collapse-item" href="<?= site_url('siswa/cetak_kartu'); ?>">Cetak Kartu</a>
                    </div>
                </div>
            </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <h6 class="mb-0">Selamat datang di SMAN 1 Cileungsi!</h6>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->username;?></span>
                                <img class="img-profile rounded-circle"
                                    src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo site_url('login/logout'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->
