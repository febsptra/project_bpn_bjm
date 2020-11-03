<!DOCTYPE html>
<html>

<head>
    <title>SURAT PERMOHONAN HGB</title>

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

        @media print {
            body {
                font-size: 11px;
                font-family: "Times New Roman", Times, serif;
            }

            .tandatangan {
                text-align: center;
                float: left;
            }

            .tandatangan2 {
                text-align: center;
                float: right;
            }
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
        <h5 class="text-center serif"><b><u>SURAT PERMOHONAN HGB (HAK GUNA BANGUNAN)</u></b><br>
            <?= $data['no_permohonan']; ?>
        </h5>
        <br>
        <br>
        <h5 class="serif">DATA DIRI PEMOHON</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Nama </td>
                <td>
                    : <?= $data['nama']; ?>
                </td>
            </tr>
            <tr>
                <td>No KTP </td>
                <td>
                    : <?= $data['no_ktp']; ?>
                </td>
            </tr>
            <tr>
                <td>Tgl Lahir </td>
                <td>
                    : <?= $data['tgl_lahir']; ?>
                </td>
            </tr>
            <tr>
                <td>Alamat </td>
                <td>
                    : <?= $data['alamat']; ?>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin </td>
                <td>
                    : <?= $data['jenis_kelamin']; ?>
                </td>
            </tr>
            <tr>
                <td>No HP </td>
                <td>
                    : <?= $data['no_hp']; ?>
                </td>
            </tr>
        </table>
        <br><br>
        <h5 class="serif">TANAH YANG DIMOHON</h5>
        <table class="table table-sm serif" style="width:100%">
            <tr>
                <td width="400px">Letak Tanah </td>
                <td>
                    : <?= $data['alamat_tanah']; ?>
                </td>
            </tr>
            <tr>
                <td>Desa/Kelurahan </td>
                <td>
                    : <?= $data['desa_kel']; ?>
                </td>
            </tr>
            <tr>
                <td>Kecamatan </td>
                <td>
                    : <?= $data['kecamatan']; ?>
                </td>
            </tr>
            <tr>
                <td>Luas Tanah </td>
                <td>
                    : <?= $data['luas_tanah']; ?> m<sup>2</sup>.
                </td>
            </tr>
        </table>
        <br><br>
        <h5 class="serif">BERKAS TERLAMPIR</h5>
        <table class="table table-sm serif">
            <tr>
                <td width="400px">Formulir Permohonan </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['formulir_pemohon']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>KTP </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['ktp']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Kartu Keluarga </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['kk']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Daftar Perusahaan </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['daftar_perusahaan']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Surat Izin Penggunaan tanah </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['surat_izin_penggunaan']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Bukti Pembayaran Uang Pemasukan Pendaftaraan </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['bukti_pemasukan']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Surat Bebas Sengketa </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['surat_bebas_sengketa']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
                </td>
            </tr>
            <tr>
                <td>Surat Pernyataan Tanah Dikuasai Secara Fisik </td>
                <td>
                    : <a href="<?php echo base_url() . "uploads/permohonan/hm/" . $data['surat_tanah_dikuasai']; ?>" target="_blank" rel="nofollow" title="link" class="text-dark">Ada</a>
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