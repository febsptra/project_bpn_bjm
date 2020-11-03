<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data pengukuran</li>
            </ol>
        </nav>
        <h2 class="h4"> <i class="fas fa-file-import"></i> Data Surat Hasil Pengukuran</h2>
        <p class="mb-0">Berikut Seluruh Data Hasil Pengukuran Tanah.</p>
    </div>
    <button type="button" class="btn btn-primary pull-right mr-5" data-toggle="modal" data-target="#cetak"><i class="fas fa-print"></i> Cetak</button>
</div>
<div class="row">
    <div class="col-12 col-xl-12">
        <?php echo $this->session->flashdata('berhasil') ?>
        <div class="card border-primary">
            <div class="card-body bg-white shadow-sm mb-4">
                <div class="tab-content" id="tabcontent1">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
                        <h2 class="h5"><i class="fas fa-drafting-compass"></i> Data Hasil Pengukuran Tanah</h2>
                        <br>
                        <div class="table-responsive">
                            <table id="example" class="table table-hovered table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nomor pengukuran</th>
                                        <th>Nomor permohonan</th>
                                        <th>Nama Petugas</th>
                                        <th>Tgl pengukuran</th>
                                        <th>Surat Hasil Permohonan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($hasil_pengukuran as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $row->no_pengukuran ?>
                                            </td>
                                            <td>
                                                <?php echo $row->no_permohonan ?>
                                            </td>
                                            <td>
                                                <div href="#" class="d-flex align-items-center">
                                                    <div class="d-block"><span class="font-weight-bold"><?php echo $row->nama_petugas ?></span>
                                                        <div class="small text-gray"><span>No HP : <?php echo $row->no_hp_petugas ?></span></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo date_indo($row->tgl_pengukuran) ?></td>
                                            <td class="text-center"><?php if ($row->status == "Belum Dibuat") { ?>
                                                    <form action="<?php echo base_url() ?>admin/hasil_permohonan/buat_surat" method="get">
                                                        <input type="hidden" name="no_permohonan" value="<?php echo $row->no_permohonan ?>">
                                                        <input type="hidden" name="jns_permohonan" value="<?php echo $row->jns_permohonan ?>">
                                                        <button class="btn btn-primary btn-sm mt-2" type="submit"><i class="fas fa-plus"></i> Buat Surat Hasil Permohonan</button>
                                                    </form>
                                                <?php } else { ?>
                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fas fa-check"></i> Surat Hasil Sudah Dibuat</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <form action="<?php echo base_url() ?>report/surat_hasil_pengukuran/" method="get">
                                                        <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modal-peng-<?php echo $row->no_hasil_pengukuran ?>"><i class="fas fa-info"></i> Detail Hasil</button>
                                                        <input type="hidden" name="no_permohonan" value="<?php echo $row->no_permohonan ?>">
                                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-print"></i> Cetak</button>
                                                    </form>
                                                </div>
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


<?php foreach ($hasil_pengukuran as $row) : ?>
    <div class="modal fade" id="modal-peng-<?php echo $row->no_hasil_pengukuran ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="fas fa-info"></i> Detail Hasil Pengukuran</h6>
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
                        <p class="h5 text-danger">Data Tanah :</p>
                        Batas Utara : <?php echo $row->b_utara ?> m.<br>
                        Batas Timur : <?php echo $row->b_timur ?> m.<br>
                        Batas Barat : <?php echo $row->b_barat ?> m.<br>
                        Batas Selatan : <?php echo $row->b_selatan ?> m.<br>
                        <br><br>
                        <p class="h5 text-danger">Berkas :</p>
                        Surat Pernyataan : <a href="<?php echo base_url() . "uploads/pengukuran/hasil/" . $row->surat_pernyataan ?>" target="_blank" rel="nofollow" title="link">Lihat</a><br>
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
                <h6 class="modal-title">Cetak Data Hasil Pengukuran</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a class="btn btn-primary mb-3" href="<?php echo base_url() . 'report/arsip_hasil_pengukuran'; ?>" target="_blank" rel="nofollow">
                    <i class="fas fa-print"></i> Print Seluruh Data Hasil Pengukuran</a>
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