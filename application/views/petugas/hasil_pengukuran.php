<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                <li class="breadcrumb-item"><a href="#">BPN Banjarmasin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hasil pengukuran</li>
            </ol>
        </nav>
        <h2 class="h4"> <i class="fas fa-file-import"></i> Data Surat Hasil Pengukuran</h2>
        <p class="mb-0">Berikut Seluruh Data Hasil Pengukuran Tanah.</p>
    </div>
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
                                        <th>Surat pengukuran</th>
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