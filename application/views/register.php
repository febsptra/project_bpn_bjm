<!DOCTYPE html>
<html lang="en">

<head>
    <title>REGISTER AKUN BPN Banjarmasin</title>
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
    <main>
        <div class="preloader bg-soft flex-column justify-content-center align-items-center"><img class="loader-element" src="<?php echo base_url() ?>/assets/img/dark.svg" height="50" alt="Rocket logo"></div>
        <section class="vh-100 bg-soft d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center form-bg-image" data-background="<?php echo base_url() ?>/assets/img/signin.svg">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="signin-inner mt-3 mt-lg-0 bg-white shadow-soft border border-light rounded p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-4 mt-md-0">
                                <h1 class="mb-3 h3">BPN Banjarmasin</h1>
                                <p class="text-gray">Silahkan isi data dibawah untuk mendaftar akun.</p>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>
                            <form method="post" action="<?php echo base_url() ?>auth/kirim_daftar" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="far fa-user"></i></span></div>
                                        <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="far fa-user"></i></span></div>
                                        <input type="email" class="form-control" placeholder="Masukan email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="far fa-user"></i></span></div>
                                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="fas fa-unlock-alt"></i></span></div>
                                        <input class="form-control" placeholder="Password" type="password" name="password" required>
                                        <div class="input-group-append"><span class="input-group-text"><i class="far fa-eye"></i></span></div>
                                    </div>
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend"><span class="input-group-text">
                                                <i class="fas fa-unlock-alt"></i></span></div>
                                        <input type="password" class="form-control" id="input-password-confirm" placeholder="Ulangi Password" required>
                                    </div>
                                    <div class="input-group mt-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto">
                                        <label class="custom-file-label" for="customFile">Upload Foto Profile</label>
                                    </div>
                                </div>
                                <div class="mt-3"><button type="submit" class="btn btn-block btn-primary">Sign
                                        in</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/headroom.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/countUp.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.countdown.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/js/smooth-scroll.polyfills.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/js/prism.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chartist.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/chartist-plugin-tooltip.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/js/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url() ?>assets/js/rocket.js">
    </script>
    <!-- Fontawesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>