<!DOCTYPE html>
<html>

<head>
    <title>ARSIP HASIL PERMOHONAN</title>

    <link type="text/css" href="<?php echo base_url() ?>assets/css/rocket.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Carme&display=swap" rel="stylesheet">
    <style type="text/css">
        body {
            font-size: 15px !important;
            font-family: "Times New Roman", Times, serif !important;
            margin-top: 50px;
            margin: 100px;
        }

        .float-left {
            margin-right: -100px;
        }

        @page {
            size: landscape;
        }

        .tandatangan {
            text-align: center;
            float: left;
        }

        .tandatangan2 {
            text-align: center;
            float: right;
            margin-bottom: 100px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="text-center">
            <img src="<?php echo base_url() ?>assets/img/logo.png" class="float-left" width="100px" />
            <h3 class="serif"><b>BADAN PERTANAHAN NASIONAL</b></h3>
            <h4 class="serif"><b>KOTA BANJARMASIN</b></h4>
            Jl.Pramuka (Tirta Dharma) Komplek PDAM, Kota Banjarmasin, Kalimantan Selatan 70249. Telpon (0511) 4281303
        </div>
        <br>
        <hr>
        <h5 class="text-center serif"><b>LAPORAN DATA ARSIP HASIL PERMOHONAN </b></h5>
        <br>
        <b>Dicetak Tanggal : <?php echo date('d-m-Y'); ?> </b>
        <table id="example" class="table table-sm serif" style="width:100%">
            <thead>
                <tr>
                    <th>Tgl Surat</th>
                    <th>No Surat</th>
                    <th>No Permohonan</th>
                    <th>A/N</th>
                    <th class="text-center">Jenis</th>
                    <th>No Pengukuran</th>
                    <th>Hasil</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $row) : ?>
                    <tr>
                        <td>
                            <?php echo $row->tgl_hasil ?>
                        </td>
                        <td>
                            <?php echo $row->no_surat ?>
                        </td>
                        <td>
                            <?php echo $row->no_permohonan ?>
                        </td>
                        <td>
                            <div href="#" class="d-flex align-items-center">
                                <div class="d-block">
                                    <span class="font-weight-bold"><?php echo $row->nama_pemohon ?></span>
                                    <div class="small text-dark"><span>No KTP : <?php echo $row->no_ktp_pemohon ?></span></div>
                                    <div class="small text-dark"><span>No HP : <?php echo $row->no_hp_pemohon ?></span></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="text-center">
                                <?php if ($row->jns_permohonan == 'hm') { ?>
                                    HM<br>(Hak Milik)
                                <?php } else if ($row->jns_permohonan == 'hgb') { ?>
                                    HGB<br>(Hak Guna Bangunan)
                                <?php } ?>
                            </div>
                        </td>
                        <td>
                            <?php echo $row->no_pengukuran ?>
                        </td>
                        <td>
                            <?php echo $row->hasil ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br><br>
        <div class="tandatangan text-center">
            <br><br>
            <b>PETUGAS LAPANG</b>
            <br><br><br><br>
            <b>BAYU WINOTO, SP, MP</b><br>
            NIP : 19860315 201212 1 002
        </div>
        <div rowspan="4" colspan="8" class="tandatangan2 text-center">
            <b>KEPALA SEKSI PENATAAN PERTANAHAN</b><br>
            <b>KANTOR PERTANAHAN</b><br>
            <b>KOTA BANJARMASIN</b>
            <br><br><br><br>
            <b>RISMIATI MARISA, SH, MKn</b><br>
            NIP : 19740212 199603 2 001
        </div>
</body>

</html>
<script>
    window.print();
</script>