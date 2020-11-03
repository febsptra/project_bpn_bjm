<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Diri</li>
            </ol>
        </nav>
        <h2 class="h4"> <i class="fas fa-file-import"></i> Riwayat Permohonan</h2>
        <p class="mb-0">Berikut Data Riwayat dari pengajuan permohonan atas nama <?php echo $this->session->userdata('nama') ?>.</p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="nav-wrapper position-relative mb-2">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Riwayat Pengajuan Permohonan HM (Hak Milik)</h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Riwayat Pengajuan Permohonan HGB (Hak Guna Bangunan)</h2>
                    </a>
                </li>
            </ul>
        </div>
        <?php echo $this->session->flashdata('hm_berhasil') ?>
        <?php echo $this->session->flashdata('hgb_berhasil') ?>
        <div class="card border-primary">
            <div class="card-body bg-white shadow-sm mb-4">
                <div class="tab-content" id="tabcontent1">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Riwayat Pengajuan Permohonan HM (Hak Milik)</h2>
                        <?php
                        $where = array('id_user' => $this->session->userdata('id_user'));
                        $cek_data = $this->m_bpn->get_where($where, 'permohonan_hm')->row_array();
                        if (empty($cek_data)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-inner--text">
                                    Anda belum pernah mengajukan Permohonan HM! <a href="<?php echo base_url() ?>permohonan/hm" class="alert-link">Ajukan Permohonan.</a>
                                </span>
                            </div>
                        <?php } else { ?>
                            <br>
                            <div class="table-responsive">
                                <table id="example" class="table table-hovered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nomor Permohonan</th>
                                            <th>Nama</th>
                                            <th>Tgl Permohonan</th>
                                            <th>Status</th>
                                            <th>Surat Permohonan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($permohonan_hm as $row) : ?>
                                            <tr>
                                                <td>
                                                    <div class="text-center"><?php echo $row->no_permohonan ?></div>
                                                </td>
                                                <td>
                                                    <div href="#" class="d-flex align-items-center">
                                                        <div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
                                                            <div class="small text-gray"><span>No KTP : <?php echo $row->no_ktp ?></span></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $row->tgl_permohonan ?></td>
                                                <td>
                                                    <?php if ($row->status == 'Menunggu') { ?>
                                                        <h4><span class="badge badge-warning"><?php echo $row->status ?></span></h4>
                                                    <?php } else if ($row->status == 'Pengukuran') { ?>
                                                        <h4><span class="badge badge-primary"><?php echo $row->status ?></span></h4>
                                                    <?php } else if ($row->status == 'Selesai') { ?>
                                                        <h4><span class="badge badge-success"><?php echo $row->status ?></span></h4>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-hm<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                    <a class="btn btn-secondary btn-sm" href="#"><i class="fas fa-print"></i> Cetak</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Hasil Pengajuan Permohonan HGB (Hak Guna Bangunan)</h2>
                        <?php
                        $where = array('id_user' => $this->session->userdata('id_user'));
                        $cek_data = $this->m_bpn->get_where($where, 'permohonan_hgb')->row_array();
                        if (empty($cek_data)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <span class="alert-inner--text">
                                    Anda belum pernah mengajukan Permohonan HGB! <a href="<?php echo base_url() ?>permohonan/hgb" class="alert-link">Ajukan Permohonan.</a>
                                </span>
                            </div>
                        <?php } else { ?>
                            <br>
                            <div class="table-responsive">
                                <table id="example2" class="table table-hovered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nomor Permohonan</th>
                                            <th>Nama</th>
                                            <th>Tgl Permohonan</th>
                                            <th>Status</th>
                                            <th>Surat Permohonan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($permohonan_hgb as $row) : ?>
                                            <tr>
                                                <td>
                                                    <div class="text-center"><?php echo $row->no_permohonan ?></div>
                                                </td>
                                                <td>
                                                    <div href="#" class="d-flex align-items-center">
                                                        <div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
                                                            <div class="small text-gray"><span>No KTP : <?php echo $row->no_ktp ?></span></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $row->tgl_permohonan ?></td>
                                                <td>
                                                    <?php if ($row->status == 'Menunggu') { ?>
                                                        <h4><span class="badge badge-warning"><?php echo $row->status ?></span></h4>
                                                    <?php } else if ($row->status == 'Pengukuran') { ?>
                                                        <h4><span class="badge badge-primary"><?php echo $row->status ?></span></h4>
                                                    <?php } else if ($row->status == 'Selesai') { ?>
                                                        <h4><span class="badge badge-success"><?php echo $row->status ?></span></h4>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-hgb<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                    <a class="btn btn-secondary btn-sm" href="#"><i class="fas fa-print"></i> Cetak</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php foreach ($permohonan_hm as $row) : ?>
    <div class="modal fade" id="modal-hm<?php echo $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-info"></i> Detail Permohonan HM</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p class="h5 text-danger">Data Diri Pemohon :</p>
                        <h5><?php echo $row->nama ?></h5>
                        No KTP : <?php echo $row->no_ktp ?><br>
                        Alamat : <?php echo $row->alamat ?><br>
                        No HP : <?php echo $row->no_hp ?><br>
                        Tgl Lahir : <?php echo $row->no_hp ?><br>
                        Jenis Kelamin : <?php echo $row->no_hp ?><br>
                        <br><br>
                        <p class="h5 text-danger">Data Tanah :</p>
                        Letak Tanah (Alamat) : <?php echo $row->alamat_tanah ?><br>
                        Desa / Kelurahan : <?php echo $row->desa_kel ?><br>
                        Kecamatan : <?php echo $row->kecamatan ?><br>
                        Luas Tanah : <?php echo $row->luas_tanah ?><br>
                        <br><br>
                        <p class="h5 text-danger">Berkas :</p>
                        Akta Jual Beli Tanah : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->akta_jb ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        KTP : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->ktp ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Kartu Keluarga : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->kk ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Girik : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->girik ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Surat Pernyataan Bebas Sengketa : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->surat_bebas_sengketa ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Surat Keterangan Riwayat tanah : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->surat_riwayat_tanah ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($permohonan_hgb as $row) : ?>
    <div class="modal fade" id="modal-hgb<?php echo $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Terms of Service</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p class="h5 text-danger">Data Diri Pemohon :</p>
                        <h5><?php echo $row->nama ?></h5>
                        No KTP : <?php echo $row->no_ktp ?><br>
                        Alamat : <?php echo $row->alamat ?><br>
                        No HP : <?php echo $row->no_hp ?><br>
                        Tgl Lahir : <?php echo $row->no_hp ?><br>
                        Jenis Kelamin : <?php echo $row->no_hp ?><br>
                        <br><br>
                        <p class="h5 text-danger">Data Tanah :</p>
                        Letak Tanah (Alamat) : <?php echo $row->alamat_tanah ?><br>
                        Desa / Kelurahan : <?php echo $row->desa_kel ?><br>
                        Kecamatan : <?php echo $row->kecamatan ?><br>
                        Luas Tanah : <?php echo $row->luas_tanah ?><br>
                        <br><br>
                        <p class="h5 text-danger">Berkas :</p>
                        Formulir Permohonan : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->formulir_pemohon ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        KTP : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->ktp ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Kartu Keluarga : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->kk ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Daftar Perusahaan : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $row->daftar_perusahaan ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Surat Izin Penggunaan tanah : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->surat_izin_penggunaan ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Bukti Pembayaran Uang Pemasukan Pendaftaraan : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->bukti_pemasukan ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Surat Bebas Sengketa : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->surat_bebas_sengketa ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        Surat Pernyataan Tanah Dikuasai Secara Fisik : <a href="<?php echo base_url() . "uploads/permohonan/hgb/" . $row->surat_tanah_dikuasai ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>