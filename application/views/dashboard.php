<section class="section-header bg-primary text-white pb-7 pb-lg-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h4>Hallo, <?php echo $this->session->userdata('nama') ?> ! Selamat Datang Di Website</h4>
                <h1 class="display-3 mb-4">Badan Pertanahan Nasional</h1>
                <p class="lead">Alamat: Jl. Pramuka, Pemurus Luar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70249. Telepon: (0511) 4281303</p>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
<section class="section section-lg line-bottom-light">
    <div class="container mt-n8 mt-sm-n9 mt-lg-n12 z-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-white border-light shadow-soft flex-lg-row no-gutters p-4">
                    <a href="./blog-post.html" class="col-12 col-lg-6">
                        <img src="<?php echo base_url() ?>/assets/img/logo.png" alt="" class="card-img-top card-img">
                    </a>
                    <div class="card-body py-4 p-lg-5"><a href="./blog-post.html" class="mb-3 d-block">
                            <h2>Apa itu Badan Pertanahan Nasional?</h2>
                        </a>
                        <p class="mb-3">Badan Pertanahan Nasional (disingkat BPN) adalah lembaga pemerintah nonkementerian di Indonesia yang mempunyai tugas melaksanakan tugas pemerintahan di bidang Pertanahan sesuai dengan ketentuan peraturan perundang-undangan. BPN dahulu dikenal dengan sebutan Kantor Agraria. BPN diatur melalui Peraturan Presiden Nomor 20 Tahun 2015.</p>
                        <div class="d-flex align-items-center"><img class="avatar avatar-sm rounded-circle" src="<?php echo base_url() ?>/uploads/avatar/avatar-0.jpg" alt="">
                            <h6 class="text-muted small ml-2 mb-0">BPN Banjarmasin</h6>
                            <h6 class="text-muted small font-weight-normal mb-0 ml-auto"><time datetime="2019-04-25">21 February, 2020</time></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>
</div>
</div>
</div>
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
<script src="<?php echo base_url() ?>assets/js/jquery-3.5.1.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</body>

</html>