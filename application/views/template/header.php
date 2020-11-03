<!DOCTYPE html>
<html lang="en">

<head>
    <title>BPN BANJARMASIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="title" content="Rocket - Transactions">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Rocket is a premium SaaS Bootstrap 4 Dashboard template featuring over 27 presentational and technical pages including pricing, support, team, careers and many more.">
    <meta name="keywords" content="bootstrap, bootstrap template, saas website template, saas bootstrap template, saas bootstrap 4 template, saas bootstrap theme, saas bootstrap 4 theme, dashboard, saas dashboard, themesberg">
    <link rel="canonical" href="https://themes.getbootstrap.com/product/rocket/">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/rocket">
    <meta property="og:title" content="Rocket - Transactions">
    <meta property="og:description" content="Rocket is a premium SaaS Bootstrap 4 Dashboard template featuring over 27 presentational and technical pages including pricing, support, team, careers and many more.">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/rocket/rocket-preview.jpg">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/rocket">
    <meta property="twitter:title" content="Rocket - Transactions">
    <meta property="twitter:description" content="Rocket is a premium SaaS Bootstrap 4 Dashboard template featuring over 27 presentational and technical pages including pricing, support, team, careers and many more.">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/rocket/rocket-preview.jpg">
    <link rel="apple-touch-icon" sizes="120x120" href="https://demo.themesberg.com/bootstrap/rocket/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://demo.themesberg.com/bootstrap/rocket/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://demo.themesberg.com/bootstrap/rocket/assets/img/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link type="text/css" href="<?php echo base_url() ?>assets/css/all.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() ?>assets/css/prism.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jqvmap.min.css">
    <link type="text/css" href="<?php echo base_url() ?>assets/css/rocket.css" rel="stylesheet">
    <link type="text/css" href="<?php echo base_url() ?>assets/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="preloader bg-soft flex-column justify-content-center align-items-center">
        <img class="loader-element" src="https://demo.themesberg.com/bootstrap/rocket/assets/img/brand/dark.svg" height="50" alt="Rocket logo">
    </div>
    <nav class="navbar navbar-dark navbar-theme-primary col-12 d-md-none">
        <a class="navbar-brand mr-lg-5" href="https://demo.themesberg.com/bootstrap/rocket/index.html">
            <img class="navbar-brand-dark" src="https://demo.themesberg.com/bootstrap/rocket/assets/img/brand/light.svg" alt="Pixel logo">
            <img class="navbar-brand-light" src="https://demo.themesberg.com/bootstrap/rocket/assets/img/brand/dark.svg" alt="Pixel Logo Dark">
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <?php
    $hm_menunggu = $this->m_bpn->hm_menunggu();
    $hgb_menunggu = $this->m_bpn->hgb_menunggu();
    $pengukuran = $this->m_bpn->pengukuran();
    $hasil_pengukuran = $this->m_bpn->hasil_pengukuran();

    $total_permohonan = $hm_menunggu->total + $hgb_menunggu->total;
    ?>
    <div class="container-fluid bg-soft">
        <div class="row">
            <div class="col-12">
                <nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse px-4">
                    <div class="sidebar-sticky pt-4 mx-auto">
                        <div class="user-card d-flex align-items-center justify-content-between justify-content-md-center pb-4">
                            <div class="d-flex align-items-center">
                                <div class="user-avatar lg-avatar mr-4">
                                    <img src="<?php echo base_url() ?>uploads/avatar/<?php echo $this->session->userdata('foto') ?>" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                                </div>
                                <div class="d-block">
                                    <h2 class="h6"><?php echo $this->session->userdata('nama') ?></h2>
                                    <a href="<?php echo base_url() ?>auth/logout" class="btn btn-secondary btn-xs">
                                        <span class="mr-2">
                                            <span class="fas fa-sign-out-alt"></span>
                                        </span>Sign Out
                                    </a>
                                </div>
                            </div>
                            <div class="collapse-close d-md-none">
                                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                        <ul class="nav flex-column mt-4">
                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(1) == "dashboard") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>dashboard" class="nav-link">
                                        <span class="sidebar-icon">
                                            <span class="fas fa-home"></span>
                                        </span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(2) == "tabel_user") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>admin/tabel_user" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-users-cog"></span>
                                            </span>Master Data User</span>
                                    </a>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(2) == "tabel_dd") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>admin/tabel_dd" class="nav-link">
                                        <span class="sidebar-icon">
                                            <span class="fas fa-street-view"></span>
                                        </span>
                                        <span>Master Data Diri </span>
                                    </a>
                                </li>
                                <li role="separator" class="dropdown-divider border-blue"></li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(2) == "permohonan") {
                                    echo "active";
                                } ?>">
                                    <a class="nav-link collapsed d-flex justify-content-between align-items-center" href="#permohonan" data-toggle="collapse" data-target="#permohonan">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-hand-holding-usd"></span>
                                            </span>Permohonan</span>
                                        <?php if ($total_permohonan > "0") { ?>
                                            <span class="badge badge-lg badge-secondary ml-2">
                                                <?php echo ($total_permohonan) ?>
                                            </span>
                                        <?php } ?>
                                        <span class="link-arrow">
                                            <span class="fas fa-chevron-right"></span>
                                        </span>
                                    </a>
                                    <div class="multi-level collapse" role="list" id="permohonan" aria-expanded="false">
                                        <ul class="flex-column nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>admin/permohonan/data_hm">
                                                    <span class="fas fa-address-card"></span>
                                                    <span>HM</span>
                                                    <?php if ($hm_menunggu->total > "0") { ?>
                                                        <span class="badge badge-lg badge-secondary ml-2">
                                                            <?php echo ($hm_menunggu->total) ?>
                                                        </span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>admin/permohonan/data_hgb">
                                                    <span class="fas fa-building"></span>
                                                    <span>HGB</span>
                                                    <?php if ($hgb_menunggu->total > "0") { ?>
                                                        <span class="badge badge-lg badge-secondary ml-2">
                                                            <?php echo ($hgb_menunggu->total) ?>
                                                        </span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(2) == "pengukuran") {
                                    echo "active";
                                } ?>">
                                    <a class="nav-link collapsed d-flex justify-content-between align-items-center" href="#pengukuran" data-toggle="collapse" data-target="#pengukuran">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-map-marked-alt"></span>
                                            </span>Pengukuran</span>
                                        <?php if ($hasil_pengukuran->total > "0") { ?>
                                            <span class="badge badge-lg badge-secondary ml-2">
                                                <?php echo ($hasil_pengukuran->total) ?>
                                            </span>
                                        <?php } ?>
                                        <span class="link-arrow">
                                            <span class="fas fa-chevron-right"></span>
                                        </span>
                                    </a>
                                    <div class="multi-level collapse" role="list" id="pengukuran" aria-expanded="false">
                                        <ul class="flex-column nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>admin/pengukuran/pengukuran">
                                                    <span class="fas fa-copy"></span>
                                                    <span>Data Peng.</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>admin/pengukuran/hasil">
                                                    <span class="fas fa-crop-alt"></span>
                                                    <span>Hasil Peng.</span>
                                                    <?php if ($hasil_pengukuran->total > "0") { ?>
                                                        <span class="badge badge-lg badge-secondary ml-2">
                                                            <?php echo ($hasil_pengukuran->total) ?>
                                                        </span>
                                                    <?php } ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(2) == "hasil_permohonan") {
                                    echo "active";
                                } ?>
                                ">
                                    <a href="<?php echo base_url() ?>admin/hasil_permohonan" class="nav-link">
                                        <span class="sidebar-icon">
                                            <span class="fas fa-street-view"></span>
                                        </span>
                                        <span>Hasil Permohonan </span>
                                    </a>
                                </li>
                            <?php } else if ($this->session->userdata('level') == 'petugas') { ?>
                                <!-- SIDEBAR PETUGAS -->
                                <li class="nav-item
                                <?php if ($this->uri->segment(1) == "dashboard") {
                                    echo "active";
                                } ?> ">
                                    <a href="<?php echo base_url() ?>dashboard" class="nav-link">
                                        <span class="sidebar-icon">
                                            <span class="fas fa-home"></span>
                                        </span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(2) == "pengukuran") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>petugas/pengukuran" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-crop-alt"></span>
                                            </span>Pengukuran</span>
                                        <?php if ($pengukuran->total > "0") { ?>
                                            <span class="badge badge-lg badge-secondary ml-2">
                                                <?php echo ($pengukuran->total) ?>
                                            </span>
                                        <?php } ?>
                                    </a>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(2) == "hasil_pengukuran") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>petugas/hasil_pengukuran" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-pencil-ruler"></span>
                                            </span>Hasil Pengukuran
                                        </span>
                                    </a>
                                </li>

                            <?php } else if ($this->session->userdata('level') == 'pemohon') { ?>
                                <!-- SIDEBAR PEMOHON -->
                                <li class="nav-item 
                                <?php if ($this->uri->segment(1) == "dashboard") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>dashboard" class="nav-link">
                                        <span class="sidebar-icon">
                                            <span class="fas fa-home"></span>
                                        </span>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item
                                <?php if ($this->uri->segment(1) == "Isi_Data_diri") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>Isi_Data_diri" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-user-edit"></span>
                                            </span>Data Diri</span>
                                    </a>
                                </li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(1) == "edit_profile") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>edit_profile" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-user-cog"></span>
                                            </span>Edit Profile</span>
                                    </a>
                                </li>
                                <li role="separator" class="dropdown-divider border-blue"></li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(2) == "hm" || $this->uri->segment(2) == "hgb") {
                                    echo "active";
                                } ?>">
                                    <a class="nav-link collapsed d-flex justify-content-between align-items-center" href="#submenu-app" data-toggle="collapse" data-target="#submenu-app">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-hand-holding-usd"></span>
                                            </span>Ajukan</span>
                                        <span class="link-arrow">
                                            <span class="fas fa-chevron-right"></span>
                                        </span>
                                    </a>
                                    <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
                                        <ul class="flex-column nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>permohonan/hm">
                                                    <span class="sidebar-icon">
                                                        <span class="fas fa-file-import"></span>
                                                    </span>HM</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo base_url() ?>permohonan/hgb">
                                                    <span class="sidebar-icon">
                                                        <span class="fas fa-clipboard-list"></span>
                                                    </span>HGB</span></a>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(2) == "riwayat_permohonan") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>permohonan/riwayat_permohonan/" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <i class="fas fa-folder-open"></i></span>
                                        </span>Riwayat Permohonan</span>
                                    </a>
                                </li>
                                <li class="nav-item 
                                <?php if ($this->uri->segment(2) == "hasil_permohonan") {
                                    echo "active";
                                } ?>">
                                    <a href="<?php echo base_url() ?>permohonan/hasil_permohonan/" class="nav-link d-flex align-items-center justify-content-between">
                                        <span>
                                            <span class="sidebar-icon">
                                                <span class="fas fa-landmark"></span>
                                            </span>Hasil Permohonan</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <!-- <li role="separator" class="dropdown-divider border-blue"></li>
                            <li class="nav-item">
                                <a href="https://demo.themesberg.com/bootstrap/rocket/index.html" class="nav-link d-flex align-items-center">
                                    <span class="sidebar-icon">
                                        <img src="https://demo.themesberg.com/bootstrap/rocket/assets/img/brand/light.svg" height="26" width="26" alt="Rocket Logo">
                                    </span>
                                    <span>Rocket Overview</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://themesberg.com/docs/rocket/getting-started/quick-start/" target="_blank" class="nav-link">
                                    <span class="sidebar-icon">
                                        <span class="fas fa-book"></span>
                                    </span>
                                    <span>Documentation
                                        <span class="badge badge-md badge-secondary ml-2">v2.0</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://themesberg.com" target="_blank" class="nav-link d-flex align-items-center">
                                    <span class="sidebar-icon">
                                        <img src="https://demo.themesberg.com/bootstrap/rocket/assets/img/themesberg.svg" height="20" width="20" class="mr-1" alt="Themesberg Logo">
                                    </span>
                                    <span>Themesberg</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </nav>
                <main class="content">