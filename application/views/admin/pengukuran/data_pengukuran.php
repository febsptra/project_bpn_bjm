<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data pengukuran</li>
            </ol>
        </nav>
        <h2 class="h4"> <i class="fas fa-file-import"></i> Data Surat Pengukuran</h2>
        <p class="mb-0">Berikut Seluruh Data Pengukuran Tanah.</p>
    </div>
    <button type="button" class="btn btn-primary pull-right mr-5" data-toggle="modal" data-target="#cetak"><i class="fas fa-print"></i> Cetak</button>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="nav-wrapper position-relative mb-2">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">
                        <h2 class="h5"><i class="far fa-clock"></i> Menunggu</h2>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">
                        <h2 class="h5"><i class="fas fa-check"></i> Selesai</h2>
                    </a>
                </li>
            </ul>
        </div>
        <?php echo $this->session->flashdata('gagal') ?>
        <?php echo $this->session->flashdata('berhasil') ?>
        <?php echo $this->session->flashdata('sms_sukses') ?>
        <?php echo $this->session->flashdata('sms_gagal') ?>
        <div class="card border-primary">
            <div class="card-body bg-white shadow-sm mb-4">
                <div class="tab-content" id="tabcontent1">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                        <h2 class="h5"><i class="far fa-clock"></i> Data Pengukuran Tanah</h2>
                        <br>
                        <div class="table-responsive">
                            <table id="example" class="table table-hovered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nomor pengukuran</th>
                                        <th>Nomor permohonan</th>
                                        <th>Nama</th>
                                        <th>Tgl pengukuran</th>
                                        <th>Status</th>
                                        <th>Surat pengukuran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pengukuran as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->no_pengukuran ?>
                                            </td>
                                            <td>
                                                <?php echo $row->no_permohonan ?>
                                            </td>
                                            <td>
                                                <div href="#" class="d-flex align-items-center">
                                                    <div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
                                                        <div class="small text-gray"><span>No KTP : <?php echo $row->no_ktp ?></span></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo date_indo($row->tgl_pengukuran) ?></td>
                                            <td>
                                                <h4><span class="badge badge-secondary"><?php echo $row->status ?></span></h4>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-peng-<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . "report/surat_pengukuran/index/" . $row->no ?>"><i class="fas fa-print"></i> Cetak</a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
                        <h2 class="h5"><i class="fas fa-check"></i> Data Pengukuran Tanah.</h2>
                        <small class="text-danger"><b>*yang sudah selesai.</b></small>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hovered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nomor pengukuran</th>
                                        <th>Nomor permohonan</th>
                                        <th>Nama</th>
                                        <th>Tgl pengukuran</th>
                                        <th>Status</th>
                                        <th>Surat Pengukuran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pengukuran_selesai as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->no_pengukuran ?>
                                            </td>
                                            <td>
                                                <?php echo $row->no_permohonan ?>
                                            </td>
                                            <td>
                                                <div href="#" class="d-flex align-items-center">
                                                    <div class="d-block"><span class="font-weight-bold"><?php echo $row->nama ?></span>
                                                        <div class="small text-gray"><span>No KTP : <?php echo $row->no_ktp ?></span></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo date_indo($row->tgl_pengukuran) ?></td>
                                            <td>
                                                <h4><span class="badge badge-primary"><?php echo $row->status ?></span></h4>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-peng-sel-<?php echo $row->no ?>"><i class="fas fa-info"></i> Detail</button>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url() . "report/surat_pengukuran/index/" . $row->no ?>"><i class="fas fa-print"></i> Cetak</a>
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


<?php foreach ($pengukuran as $row) : ?>
    <div class="modal fade" id="modal-peng-<?php echo $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-info"></i> Detail Pengukuran</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p class="h5 text-danger">Keterangan Pengukuran :</p>
                        Nomor Pengukuran : <?php echo $row->no_pengukuran ?><br>
                        Tgl Pengukuran : <?php echo $row->tgl_pengukuran ?><br>
                        Nomor Permohonan : <?php echo $row->no_permohonan ?><br><br>
                        <p class="h5 text-danger">Data Pemohon :</p>
                        Nama : <?php echo $row->nama ?><br>
                        No KTP : <?php echo $row->no_ktp ?><br>
                        No HP : <?php echo $row->no_hp ?><br><br>
                        <p class="h5 text-danger">Data Tanah :</p>
                        Letak Tanah (Alamat) : <?php echo $row->alamat_tanah ?><br>
                        Desa / Kelurahan : <?php echo $row->desa_kel ?><br>
                        Kecamatan : <?php echo $row->kecamatan ?><br>
                        Luas Tanah : <?php echo $row->luas_tanah ?> m<sup>2</sup>.<br>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($pengukuran_selesai as $row) : ?>
    <div class="modal fade" id="modal-peng-sel-<?php echo $row->no ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-info"></i> Detail Pengukuran</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <p class="h5 text-danger">Keterangan Pengukuran :</p>
                        Nomor Pengukuran : <?php echo $row->no_pengukuran ?><br>
                        Tgl Pengukuran : <?php echo $row->tgl_pengukuran ?><br>
                        Nomor Permohonan : <?php echo $row->no_permohonan ?><br><br>
                        <p class="h5 text-danger">Data Pemohon :</p>
                        Nama : <?php echo $row->nama ?><br>
                        No KTP : <?php echo $row->no_ktp ?><br>
                        No HP : <?php echo $row->no_hp ?><br><br>
                        <p class="h5 text-danger">Data Tanah :</p>
                        Letak Tanah (Alamat) : <?php echo $row->alamat_tanah ?><br>
                        Desa / Kelurahan : <?php echo $row->desa_kel ?><br>
                        Kecamatan : <?php echo $row->kecamatan ?><br>
                        Luas Tanah : <?php echo $row->luas_tanah ?> m<sup>2</sup>.<br>
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
                <h6 class="modal-title">Cetak Data Pengukuran</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a class="btn btn-primary mb-3" href="<?php echo base_url() . 'report/arsip_pengukuran'; ?>" target="_blank" rel="nofollow">
                    <i class="fas fa-print"></i> Print Seluruh Data Pengukuran</a>
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