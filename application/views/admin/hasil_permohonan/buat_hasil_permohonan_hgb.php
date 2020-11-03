<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hasil Permohonan</li>
            </ol>
        </nav>
        <h2 class="h4">Pembuatan Surat Hasil Permohonan HGB</h2>
        <p class="mb-0">Silahkan ini data dibawah untuk membuat surat hasil permohonan.</p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card border-primary">
            <div class="card-header bg-primary shadow-sm">
                <h2 class="text-light"><i class="fas fa-file-import"></i> Pembuatan Surat Hasil Permohonan HGB (HAK GUNA BANGUNAN)</h2>
            </div>
            <div class="card-body bg-white border-primary shadow-sm mb-4">
                <form action="<?php echo base_url() ?>admin/hasil_permohonan/kirim" method="POST" enctype="multipart/form-data">
                    <p class="h5 text-danger">Mengenai Diri Pemohon :</p>
                    <h5><?= $permohonan['nama']; ?></h5>
                    No KTP : <?= $permohonan['no_ktp']; ?><br>
                    Alamat : <?= $permohonan['alamat']; ?><br>
                    No HP : <?= $permohonan['no_hp']; ?><br>
                    <br>
                    <h5>No Permohonan : <?= $permohonan['no_permohonan']; ?></h5>
                    <h5>Jenis Permohonan : HM (HAK MILIK)</h5>
                    <h5>No Pengukuran : <?= $pengukuran['no_pengukuran']; ?></h5>
                    <br>
                    <p class="h5 text-danger">Letak Tanah Yang Dimohon :</p>
                    <div class="row">
                        <input name="no_pengukuran" type="hidden" value="<?= $pengukuran['no_pengukuran']; ?>" readonly>
                        <input name="tgl_pengukuran" type="hidden" value="<?= $pengukuran['tgl_pengukuran']; ?>" required>
                        <input type="hidden" id="no_permohonan" name="no_permohonan" value="<?= $permohonan['no_permohonan']; ?>" readonly>
                        <input type="hidden" id="jns_permohonan" name="jns_permohonan" value="<?= $permohonan['jns_permohonan']; ?>" readonly>
                        <input type="hidden" id="nama" name="nama" value="<?= $permohonan['nama']; ?>" required>
                        <input type="hidden" id="no_ktp" name="no_ktp" value="<?= $permohonan['no_ktp']; ?>" required>
                        <input type="hidden" name="no_hp" value="<?= $permohonan['no_hp']; ?>">
                        <div class="col-md-12">
                            <div class="form-group"><label>Letak Tanah (Alamat)</label>
                                <input class="form-control" id="alamat_tanah" name="alamat_tanah" type="text" value="<?= $permohonan['alamat_tanah']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Desa/Kelurahan</label>
                                <input class="form-control" id="desa_kel" name="desa_kel" type="text" value="<?= $permohonan['desa_kel']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Kecamatan</label>
                                <input type="text" class="form-control flatpickr-input" id="kecamatan" name="kecamatan" value="<?= $permohonan['kecamatan']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-group"><label>Luas Tanah (Meter Persegi/m<sup>2</sup>.)</label>
                                <input type="number" class="form-control flatpickr-input" id="luas_tanah" name="luas_tanah" value="<?= $permohonan['luas_tanah']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Utara (Meter/m)</label>
                                <input class="form-control" id="desa_kel" name="desa_kel" type="text" value="<?= $pengukuran['b_utara']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Timur (Meter/m)</label>
                                <input type="text" class="form-control flatpickr-input" id="kecamatan" name="kecamatan" value=" <?= $pengukuran['b_timur']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Barat (Meter/m)</label>
                                <input class="form-control" id="desa_kel" name="desa_kel" type="text" value="<?= $pengukuran['b_barat']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label>Batas Selatan (Meter/m)</label>
                                <input type="text" class="form-control flatpickr-input" id="kecamatan" name="kecamatan" value="<?= $pengukuran['b_selatan']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                    <p class="h5 text-danger">Berkas Terlampir :</p>
                    Formulir Permohonan : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['formulir_pemohon'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    KTP : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['ktp'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Kartu Keluarga : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['kk'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Daftar Perusahaan : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $permohonan['daftar_perusahaan'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Surat Izin Penggunaan tanah : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['surat_izin_penggunaan'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Bukti Pembayaran Uang Pemasukan Pendaftaraan : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['bukti_pemasukan'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Surat Bebas Sengketa : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['surat_bebas_sengketa'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Surat Pernyataan Tanah Dikuasai Secara Fisik : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $permohonan['surat_tanah_dikuasai'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    Surat Pernyataan Hasil Pengukuran: <a href="<?php echo base_url() . "uploads/pengukuran/hasil/" . $pengukuran['surat_pernyataan'] ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                    <br>
                    <!-- <div class="form-group">
                        <label><b class="h3 text-danger">Hasil :</b></label>
                        <select class="custom-select" id="hasil" name="hasil">
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div> -->
                    <button type="submit" class="btn btn-secondary mt-3"><i class="fas fa-paper-plane"></i> BUAT SURAT</button>
                </form>
            </div>
        </div>
    </div>
</div>