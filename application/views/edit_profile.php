<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <h2 class="h4">Edit Profile</h2>
        <p class="mb-0">Silahkan Edit Profile akun login anda.</p>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-4">Data Profile Akun</h2>
            <div class="lg-avatar text-center">
                <img src="<?php echo base_url() ?>uploads/avatar/<?php echo $this->session->userdata('foto') ?>" class="card-img-top rounded-circle border-white" alt="Bonnie Green" style="width:200px; height:200px;">
            </div>
            <br>
            <form action="<?php echo base_url() . 'edit_profile/simpan'; ?>" method="POST" enctype="multipart/form-data">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="foto">
                    <label class="custom-file-label" for="customFile"><?php echo $this->session->userdata('foto') ?></label>
                </div>
                <hr>
                <?php echo $this->session->flashdata('gagal') ?>
                <?php echo $this->session->flashdata('berhasil') ?>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('username') ?>" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $this->session->userdata('nama') ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata('email') ?>" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-unlock-alt"></i></span></div>
                        <input type="password" class="form-control" name="password" id="input-password-confirm" value="<?php echo $this->session->userdata('password') ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-unlock-alt"></i></span></div>
                        <input class="form-control" name="konfirmasi_password" id="konfirmasi_password" placeholder="Masukan Konfirmasi Password" type="password" required>
                    </div>
                </div>
                <div class="mt-3"><button type="submit" class="btn btn-primary">Simpan</button></div>
            </form>
        </div>
    </div>
</div>