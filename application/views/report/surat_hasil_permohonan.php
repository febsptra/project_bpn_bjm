<!DOCTYPE html>
<html>

<head>
    <title>SURAT HASIL PERMOHONAN</title>

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
        <h5 class="text-center serif"><b><u>SURAT HASIL PERMOHONAN</u></b><br>
            <?= $permohonan['no_permohonan']; ?>
        </h5>
        <br><br>
        Berdasarkan Keputusan Badan Pertanahan Nasional Kota Banjarmasin menyatakan bahwa :
        <h5 class="serif">
            <br>NO. PERMOHONAN : <?= $permohonan['no_permohonan']; ?>
            <br>TANGGAL PERMOHONAN : <?= date_indo($permohonan['tgl_permohonan']) ?>
            <br>JENIS PERMOHONAN :
            <?php $jenis = $permohonan['jns_permohonan'];
            if ($jenis == "hm") { ?>
                HM (Hak Milik)
            <?php } elseif ($jenis == "hgb") { ?>
                HGB (Hak Guna Bangunan)
            <?php } ?>
        </h5>
        <br>
        <h5 class="serif">Data Diri Pemohon</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Nama </td>
                <td>
                    : <?= $permohonan['nama']; ?>
                </td>
            </tr>
            <tr>
                <td>No KTP </td>
                <td>
                    : <?= $permohonan['no_ktp']; ?>
                </td>
            </tr>
            <tr>
                <td>Tgl Lahir </td>
                <td>
                    : <?= $permohonan['tgl_lahir']; ?>
                </td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td>
                    : <?= $permohonan['alamat']; ?>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin </td>
                <td>
                    : <?= $permohonan['jenis_kelamin']; ?>
                </td>
            </tr>
            <tr>
                <td>No HP </td>
                <td>
                    : <?= $permohonan['no_hp']; ?>
                </td>
            </tr>
        </table>
        <h5 class="serif">Tanah Yang Dimohon</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Letak Tanah </td>
                <td>
                    : <?= $permohonan['alamat_tanah']; ?>
                </td>
            </tr>
            <tr>
                <td>Desa/Kelurahan </td>
                <td>
                    : <?= $permohonan['desa_kel']; ?>
                </td>
            </tr>
            <tr>
                <td>Kecamatan </td>
                <td>
                    : <?= $permohonan['kecamatan']; ?>
                </td>
            </tr>
            <tr>
                <td>Luas Tanah </td>
                <td>
                    : <?= $permohonan['luas_tanah']; ?> m<sup>2</sup>.
                </td>
            </tr>
        </table>
        <h5 class="serif">Hasil Pengukuran</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Batas Utara </td>
                <td>
                    : <?= $hasil_pengukuran['b_utara']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Timur </td>
                <td>
                    : <?= $hasil_pengukuran['b_timur']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Barat </td>
                <td>
                    : <?= $hasil_pengukuran['b_barat']; ?> m<sup>2</sup>.
                </td>
            </tr>
            <tr>
                <td>Batas Selatan </td>
                <td>
                    : <?= $hasil_pengukuran['b_selatan']; ?> m<sup>2</sup>.
                </td>
            </tr>
        </table>
        <br><br>
        <h3 class="text-center serif"><b><u>TELAH MEMENUHI PERSYARATAN</u></b></h3>
        <h5 class="text-center serif">
            Demikian pertimbangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya
        </h5>
        <br><br><br>
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