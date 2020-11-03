<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Permohonan</li>
            </ol>
        </nav>
        <h2 class="h4"> <i class="fas fa-file-import"></i> Data Permohonan HM (Hak Milik)</h2>
        <p class="mb-0">Berikut Data pengajuan surat permohonan Hak Milik.</p>
    </div>
    <button type="button" class="btn btn-primary pull-right mr-5" data-toggle="modal" data-target="#cetak"><i class="fas fa-print"></i> Cetak</button>
</div>

<div class="row">
    <div class="col-12 col-xl-12">
        <div class="nav-wrapper position-relative mb-2">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Menunggu Diverifikasi</h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">
                        <h2 class="h5"><i class="far fa-clock"></i> Proses Pengukuran</h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">
                        <h2 class="h5"><i class="fas fa-check"></i> Selesai</h2>
                    </a>
                </li>
            </ul>
        </div>
        <?php echo $this->session->flashdata('berhasil') ?>
        <div class="card border-primary">
            <div class="card-body bg-white shadow-sm mb-4">
                <div class="tab-content" id="tabcontent1">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                        <h2 class="h5"><i class="fas fa-file-alt"></i> Pengajuan Permohonan HM (Hak Milik)</h2>
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
                                                <h4><span class="badge badge-secondary"><?php echo $row->status ?></span></h4>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-hm<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                <a class="btn btn-success btn-sm" href="<?php echo base_url() . "admin/permohonan/data_hm/verifikasi/" . $row->no ?>"><i class="fas fa-check"></i> Verifikasi</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . "report/surat_hm/index/" . $row->no ?>"><i class="fas fa-print"></i> Cetak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                        <h2 class="h5"><i class="far fa-clock"></i> Pengajuan Permohonan HM (Hak Milik).</h2>
                        <small class="text-danger">*yang sudah diverifikasi & Akan/Sedang Proses Pengukuran.</small>
                        <br><br>
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
                                    foreach ($permohonan_hm_diverifikasi as $row) : ?>
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
                                                <h4><span class="badge badge-primary"><?php echo $row->status ?></span></h4>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-hm<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                <a class="btn btn-primary btn-sm" href="<?php echo base_url() . "admin/pengukuran/pengukuran/pengukuran_hm/" . $row->no ?>"><i class="fas fa-plus-circle"></i> Buat Surat Pengukuran</a>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . "report/surat_hm/index/" . $row->no ?>"><i class="fas fa-print"></i> Cetak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                        <h2 class="h5"><i class="fas fa-check"></i> Pengajuan Permohonan HM (Hak Milik).</h2>
                        <small class="text-success"><b>*yang sudah Selesai Diproses.</b></small>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example3" class="table table-hovered" style="width:100%">
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
                                    foreach ($permohonan_hm_selesai as $row) : ?>
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
                                                <h4><span class="badge badge-success"><?php echo $row->status ?></span></h4>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-hm<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . "report/surat_hm/index/" . $row->no ?>"><i class="fas fa-print"></i> Cetak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
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
                        Luas Tanah : <?php echo $row->luas_tanah ?> m<sup>2</sup><br>
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

<?php foreach ($permohonan_hm_diverifikasi as $row) : ?>
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
                        Luas Tanah : <?php echo $row->luas_tanah ?> m<sup>2</sup><br>
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

<?php foreach ($permohonan_hm_selesai as $row) : ?>
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
                        Luas Tanah : <?php echo $row->luas_tanah ?> m<sup>2</sup><br>
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

<div class="modal fade" id="cetak" tabindex="-1" role="dialog" aria-labelledby="cetak" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Cetak Data HM</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a class="btn btn-primary mb-3" href="<?php echo base_url() . 'report/arsip_hm'; ?>" target="_blank" rel="nofollow">
                    <i class="fas fa-print"></i> Print Seluruh Data Permohonan HM</a>
                <br>
                <p>
                    -- Atau --
                </p>
                <!-- CARI Data -->
                <form class="form-validate" method="get" action="<?php echo base_url() . 'admin/data_penjualan/print_cari'; ?>" target="_blank" rel="nofollow">
                    <div class="form-row">
                        <div class="col-4">
                            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required data-msg="Mohon Masukan Tanggal Awal." required>
                        </div>
                        <label for="colFormLabel" class="col-form-label">Sampai</label>
                        <div class="col-4">
                            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required data-msg="Mohon Masukan Tanggal Akhir." required>
                        </div>
                        <button type="submit" class="btn btn-primary ml-3"><i class="fas fa-print"></i> Print</button>
                    </div>
                </form>
                <!-- END CARI Data -->
                <br>
            </div>
        </div>
    </div>
</div>