<!DOCTYPE html>
<html>

<head>
    <title>SURAT HASIL KEPUTUSAN</title>

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
        <h5 class="text-center serif"><b><u>SURAT HASIL PENGUKURAN</u></b><br>
            <?= $data['no_pengukuran']; ?>
        </h5>
        <p>
            <h5 class="serif">
                <br>Tanggal Pengukuran : <?= date_indo($data['tgl_pengukuran']) ?>
                <br>No Permohonan : <?= $data['no_permohonan']; ?>
                <br>Jenis Permohonan :
                <?php $jenis = $data['jns_permohonan'];
                if ($jenis == "hm") { ?>
                    HM (Hak Milik)
                <?php } elseif ($jenis == "hgb") { ?>
                    HGB (Hak Guna Bangunan)
                <?php } ?>

            </h5>
        </p>
        <br><br>
        <h5 class="serif">PETUGAS YANG MENGUKUR</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Nama </td>
                <td>
                    : <?= $data['nama_petugas']; ?>
                </td>
            </tr>
            <tr>
                <td>No KTP </td>
                <td>
                    : <?= $data['no_ktp_petugas']; ?>
                </td>
            </tr>
            <tr>
                <td>No HP </td>
                <td>
                    : <?= $data['no_hp_petugas']; ?>
                </td>
            </tr>
        </table>
        <br><br>
        <h5 class="serif">LETAK TANAH</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Alamat </td>
                <td>
                    : <?= $data2['alamat_tanah']; ?>
                </td>
            </tr>
            <tr>
                <td>Desa/Kelurahan </td>
                <td>
                    : <?= $data2['desa_kel']; ?>
                </td>
            </tr>
            <tr>
                <td>Kecamatan </td>
                <td>
                    : <?= $data2['kecamatan']; ?>
                </td>
            </tr>
            <tr>
                <td>Luas Tanah </td>
                <td>
                    : <?= $data2['luas_tanah']; ?> m<sup>2</sup>.
                </td>
            </tr>
        </table>
        <br><br>
        <h5 class="serif">Hasil Pengukuran</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Batas Utara </td>
                <td>
                    : <?= $data['b_utara']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Timur </td>
                <td>
                    : <?= $data['b_timur']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Barat </td>
                <td>
                    : <?= $data['b_barat']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Selatan </td>
                <td>
                    : <?= $data['b_selatan']; ?> m<sup>2</sup>.
                </td>
            </tr>
        </table>
        <br><br>
        <h5 class="serif">BERKAS TERLAMPIR</h5>
        <table class="table table-sm serif">
            <tr>
                <td width="400px">Surat Pernyatan </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/pengukuran/hasil/" . $data['surat_pernyataan']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
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