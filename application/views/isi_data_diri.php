<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
            </ol>
        </nav>
        <h2 class="h4">Isi Data Diri</h2>
        <p class="mb-0">Berikut adalah Data diri anda.</p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card card-body bg-white border-light shadow-sm mb-4">
            <h2 class="h5 mb-4">Informasi Data Diri</h2>
            <?php echo $this->session->flashdata('berhasil') ?>
            <?php
            $where = array('id_user' => $this->session->userdata('id_user'));
            $cek_data = $this->m_bpn->get_where($where, 'data_diri')->row_array();
            if (empty($cek_data)) { ?>
                <form action="<?php echo base_url() ?>isi_data_diri/simpan" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label>Nama Lengkap</label>
                                <input class="form-control" id="nama" name="nama" type="text" placeholder="Isi nama lengkap sesuai dengan KTP..." required></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label>No. KTP</label>
                                <input class="form-control" id="no_ktp" type="text" placeholder="Isi nomor KTP.." required></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label>Tgl Lahir</label>
                                <input type="date" class="form-control flatpickr-input" id="tgl_lahir" name="tgl_lahir" data-toggle="date" required></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label>Jenis Kelamin</label>
                                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option disabled="disabled" selected="selected">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select></div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group"><label>Alamat</label>
                                <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Isi alamat sekarang.." required></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group"><label>No. HP</label>
                                <input class="form-control" name="no_hp" type="number" placeholder="+62 ... ..." required></div>
                        </div>
                    </div>
                    <div class="mt-3"><button type="submit" class="btn btn-primary">Simpan</button></div>
                </form>
            <?php } else { ?>
                <?php foreach ($data_diri as $row) : ?>
                    <form action="<?php echo base_url() ?>isi_data_diri/edit" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group"><label>Nama Lengkap</label>
                                    <input class="form-control" id="nama" name="nama" type="text" value="<?php echo $row->nama ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group"><label>No. KTP</label>
                                    <input class="form-control" id="no_ktp" name="no_ktp" type="text" value="<?php echo $row->no_ktp ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group"><label>Tgl Lahir</label>
                                    <input type="date" class="form-control flatpickr-input" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row->tgl_lahir ?>" data-toggle="date" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group"><label>Jenis Kelamin</label>
                                    <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                        <option selected="selected" value="<?php echo $row->jenis_kelamin ?>"><?php echo $row->jenis_kelamin ?></option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group"><label>Alamat</label>
                                    <input class="form-control" id="alamat" name="alamat" type="text" value="<?php echo $row->alamat ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group"><label>No. HP</label>
                                    <input class="form-control" name="no_hp" type="number" value="<?php echo $row->no_hp ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            <?php } ?>
        </div>
    </div>
</div>