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
                <?php echo form_open('admin/pengukuran/pengukuran/kirim'); ?>
                <!-- <form action="<?php echo base_url() ?>" method="POST" enctype="multipart/form-data"> -->
                <p class="h5 text-danger">Data Diri Pemohon :</p>
                <h5><?= $permohonan['nama']; ?></h5>
                No KTP : <?= $permohonan['no_ktp']; ?><br>
                Alamat : <?= $permohonan['alamat']; ?><br>
                No HP : <?= $permohonan['no_hp']; ?><br>
                <br>
                <h4>No Permohonan : <?= $permohonan['no_permohonan']; ?></h4>
                <?php
                $array_bln = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                $bln = $array_bln[date('m')];
                ?>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label>Nomor Pengukuran :</label>
                            <input class="form-control" id="no_pengukuran" name="no_pengukuran" type="text" value="PN/<?php echo random_string('numeric', 4) . '/' . date('d') . '/' . $bln . '/' . date('Y') ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label>Tanggal Pengukuran :</label>
                            <input class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" type="date" required>
                        </div>
                    </div>
                    <!-- </div> -->
                    <p class="h5 text-danger">Data tanah :</p>
                    <div class="row">
                        <input type="hidden" id="no_permohonan" name="no_permohonan" type="text" value="<?= $permohonan['no_permohonan']; ?>" readonly>
                        <input type="hidden" id="jns_permohonan" name="jns_permohonan" type="text" value="<?= $permohonan['jns_permohonan']; ?>" readonly>
                        <input type="hidden" id="nama" name="nama" type="text" value="<?= $permohonan['nama']; ?>" required>
                        <input type="hidden" id="no_ktp" name="no_ktp" type="text" value="<?= $permohonan['no_ktp']; ?>" required>
                        <input type="hidden" name="no_hp" type="number" value="<?= $permohonan['no_hp']; ?>">
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
                            <div class="form-group"><label>Luas Tanah (Meter/m<sup>2</sup>.)</label>
                                <input type="number" class="form-control flatpickr-input" id="luas_tanah" name="luas_tanah" value="<?= $permohonan['luas_tanah']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-paper-plane"></i> Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>