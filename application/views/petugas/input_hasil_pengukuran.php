<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengukuran</li>
            </ol>
        </nav>
        <h2 class="h4">Surat Pengukuran Tanah</h2>
        <p class="mb-0">Silahkan ini data dibawah untuk membuat surat pengukuran tanah.</p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card border-primary">
            <div class="card-header bg-primary shadow-sm">
                <h2 class="text-light"><i class="fas fa-file-import"></i> Pembuatan Surat Pengukuran Tanah</h2>
            </div>
            <div class="card-body bg-white border-primary shadow-sm mb-4">

                <form action="<?php echo base_url() ?>petugas/pengukuran/kirim_hasil_pengukuran" method="POST" enctype="multipart/form-data">
                    <h4>No Pengukuran : <?= $pengukuran['no_pengukuran']; ?></h4>
                    <h4>No Permohonan : <?= $pengukuran['no_permohonan']; ?></h4>
                    Tgl Pengukuran : <?= $pengukuran['tgl_pengukuran']; ?><br><br>
                    <p class="h5 text-danger">Data Tanah :</p>
                    Letak Tanah (Alamat) : <?= $pengukuran['alamat_tanah']; ?><br>
                    Desa / Kelurahan : <?= $pengukuran['desa_kel']; ?><br>
                    Kecamatan : <?= $pengukuran['kecamatan']; ?><br>
                    Luas Tanah : <?= $pengukuran['luas_tanah']; ?> m<sup>2</sup>.<br>
                    <br>
                    <p class="h5 text-danger">Petugas (Pengukur) :</p>
                    <div class="row">
                        <input type="hidden" id="no_pengukuran" name="no_pengukuran" type="text" value="<?= $pengukuran['no_pengukuran']; ?>" readonly>
                        <input type="hidden" id="tgl_pengukuran" name="tgl_pengukuran" type="text" value="<?= $pengukuran['tgl_pengukuran']; ?>" readonly>
                        <input type="hidden" id="no_permohonan" name="no_permohonan" type="text" value="<?= $pengukuran['no_permohonan']; ?>" readonly>
                        <input type="hidden" id="jns_permohonan" name="jns_permohonan" type="text" value="<?= $pengukuran['jns_permohonan']; ?>" readonly>
                        <div class="col-md-4">
                            <div class="form-group"><label>Nama Petugas :</label>
                                <input class="form-control" id="nama_petugas" name="nama_petugas" type="text" value="<?= $data_diri['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>No KTP :</label>
                                <input class="form-control" id="no_ktp_petugas" name="no_ktp_petugas" type="number" value="<?= $data_diri['no_ktp']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"><label>No HP :</label>
                                <input class="form-control" id="no_hp_petugas" name="no_hp_petugas" type="number" value="<?= $data_diri['no_hp']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <p class="h5 text-danger">Hasil Pengukuran :</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Utara</label>
                                <input class="form-control" id="b_utara" name="b_utara" type="number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Timur</label>
                                <input class="form-control" id="b_timur" name="b_timur" type="number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Barat</label>
                                <input type="number" class="form-control" id="b_barat" name="b_barat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Selatan</label>
                                <input type="number" class="form-control" id="b_selatan" name="b_selatan" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="surat_pernyataan" class="custom-file-input" id="surat_pernyataan" required>
                                <label class="custom-file-label" for="customFile">Surat Pernyataan</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>