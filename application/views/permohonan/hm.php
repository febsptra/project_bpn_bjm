<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ajukan Permohonan</li>
            </ol>
        </nav>
        <h2 class="h4">Pengajuan Permohonan HM</h2>
        <p class="mb-0">Silahkan data dibawah untuk mengajukan surat permohonan.</p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card border-primary">
            <div class="card-header bg-primary shadow-sm">
                <h2 class="text-light"><i class="fas fa-file-import"></i> Pengajuan Permohonan HM (Hak Milik)</h2>
            </div>
            <div class="card-body bg-white border-primary shadow-sm mb-4">
                <?php
                $where = array('id_user' => $this->session->userdata('id_user'));
                $cek_data = $this->m_bpn->get_where($where, 'data_diri')->row_array();
                if (empty($cek_data)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="alert-inner--text">
                            Anda belum mengisi data diri. Harap isi Data diri terlebih dahulu! <a href="<?php echo base_url() ?>isi_data_diri" class="alert-link">Isi data diri.</a>
                        </span>
                    </div>
                <?php } else { ?>
                    <form action="<?php echo base_url() ?>permohonan/hm/kirim" method="POST" enctype="multipart/form-data">
                        <p class="h5 text-danger">Data Diri Pemohon :</p>
                        <h5><?= $data_diri['nama']; ?></h5>
                        No KTP : <?= $data_diri['no_ktp']; ?><br>
                        Alamat : <?= $data_diri['alamat']; ?><br>
                        No HP : <?= $data_diri['no_hp']; ?><br>
                        <br><br>

                        <!-- MEMBUAT BULAN ROMAWI -->
                        <?php
                        $array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                        $bln = $array_bln[date('m')];
                        ?>
                        <!-- END -->

                        <p class="h5 text-danger">Data tanah :</p>
                        <div class="row">
                            <input type="hidden" id="no_permohonan" name="no_permohonan" value="HM/<?php echo random_string('numeric', 4) . '/' . date('d') . '/' . $bln . '/' . date('Y') ?>" readonly>
                            <input type="hidden" id="nama" name="nama" type="text" value="<?= $data_diri['nama']; ?>" required>
                            <input type="hidden" id="no_ktp" name="no_ktp" type="text" value="<?= $data_diri['no_ktp']; ?>" required>
                            <input type="hidden" id="tgl_lahir" name="tgl_lahir" value="<?= $data_diri['tgl_lahir']; ?>">
                            <input type="hidden" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data_diri['jenis_kelamin']; ?>">
                            <input type="hidden" id="alamat" name="alamat" type="text" value="<?= $data_diri['alamat']; ?>">
                            <input type="hidden" name="no_hp" type="number" value="<?= $data_diri['no_hp']; ?>">
                            <div class="col-md-12">
                                <div class="form-group"><label>Letak Tanah (Alamat)</label>
                                    <input class="form-control" id="alamat_tanah" name="alamat_tanah" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label>Desa/Kelurahan</label>
                                    <input class="form-control" id="desa_kel" name="desa_kel" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label>Kecamatan</label>
                                    <input type="text" class="form-control flatpickr-input" id="kecamatan" name="kecamatan" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-group"><label>Luas Tanah</label>
                                    <input type="number" class="form-control flatpickr-input" id="luas_tanah" name="luas_tanah" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label class="h5 text-danger">Upload Berkas : </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="akta_jb" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Akta Jual Beli Tanah</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="ktp" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">KTP</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="kk" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Kartu Keluarga</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="girik" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Girik</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="surat_bebas_sengketa" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Surat Pernyataan tanah Bebas Sengketa</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="surat_riwayat_tanah" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Surat Ket. Riwayat Tanah</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>