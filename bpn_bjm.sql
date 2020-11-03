-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 09.47
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpn_bjm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diri`
--

CREATE TABLE `data_diri` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_diri`
--

INSERT INTO `data_diri` (`id_user`, `nama`, `no_ktp`, `tgl_lahir`, `alamat`, `jenis_kelamin`, `no_hp`, `level`) VALUES
(2, 'Hadi', '115225664', '2020-10-01', 'Jl.Manggis Timur Barat Rt.02 Rw.06 No.14', 'Laki-laki', '081351339559', 'petugas'),
(3, 'Febry Saputra', '445636115', '2020-10-10', 'Jl.Rawa Bening Gg.Kertak baru Rt.01 No.255', 'Laki-laki', '081351339559', 'pemohon'),
(4, 'Stephani', '115226559', '2020-10-07', 'Jl.Kayu tangi No.16 Rw.09 Rt.09', 'Perempuan', '081351339559', 'pemohon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_pengukuran`
--

CREATE TABLE `hasil_pengukuran` (
  `no_hasil_pengukuran` int(11) NOT NULL,
  `no_pengukuran` varchar(25) NOT NULL,
  `no_permohonan` varchar(25) NOT NULL,
  `jns_permohonan` varchar(30) NOT NULL,
  `tgl_pengukuran` date NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `no_ktp_petugas` varchar(25) NOT NULL,
  `no_hp_petugas` varchar(15) NOT NULL,
  `b_utara` varchar(10) NOT NULL,
  `b_timur` varchar(10) NOT NULL,
  `b_barat` varchar(10) NOT NULL,
  `b_selatan` varchar(10) NOT NULL,
  `surat_pernyataan` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_permohonan`
--

CREATE TABLE `hasil_permohonan` (
  `no_surat` int(11) NOT NULL,
  `no_permohonan` varchar(25) NOT NULL,
  `jns_permohonan` varchar(30) NOT NULL,
  `no_pengukuran` varchar(25) NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `no_ktp_pemohon` varchar(30) NOT NULL,
  `no_hp_pemohon` varchar(15) NOT NULL,
  `tgl_hasil` date NOT NULL DEFAULT current_timestamp(),
  `hasil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengukuran`
--

CREATE TABLE `pengukuran` (
  `no` int(11) NOT NULL,
  `no_pengukuran` varchar(20) NOT NULL,
  `tgl_pengukuran` date NOT NULL DEFAULT current_timestamp(),
  `no_permohonan` varchar(20) NOT NULL,
  `jns_permohonan` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_tanah` text NOT NULL,
  `desa_kel` text NOT NULL,
  `kecamatan` text NOT NULL,
  `luas_tanah` varchar(10) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_hgb`
--

CREATE TABLE `permohonan_hgb` (
  `no` int(11) NOT NULL,
  `no_permohonan` varchar(20) NOT NULL,
  `jns_permohonan` varchar(30) NOT NULL,
  `tgl_permohonan` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_tanah` text NOT NULL,
  `desa_kel` text NOT NULL,
  `kecamatan` text NOT NULL,
  `luas_tanah` text NOT NULL,
  `formulir_pemohon` text NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `daftar_perusahaan` text NOT NULL,
  `surat_izin_penggunaan` text NOT NULL,
  `bukti_pemasukan` text NOT NULL,
  `surat_bebas_sengketa` text NOT NULL,
  `surat_tanah_dikuasai` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_hm`
--

CREATE TABLE `permohonan_hm` (
  `no` int(11) NOT NULL,
  `no_permohonan` varchar(20) NOT NULL,
  `jns_permohonan` varchar(30) NOT NULL,
  `tgl_permohonan` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_ktp` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_tanah` text NOT NULL,
  `desa_kel` text NOT NULL,
  `kecamatan` text NOT NULL,
  `luas_tanah` varchar(10) NOT NULL,
  `akta_jb` text NOT NULL,
  `ktp` text NOT NULL,
  `kk` text NOT NULL,
  `girik` text NOT NULL,
  `surat_bebas_sengketa` text NOT NULL,
  `surat_riwayat_tanah` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'UserAdmin', 'admin@gmail.com', 'admin', 'avatar-6.jpg'),
(2, 'petugas', 'petugas', 'Hadi', 'petugas@gmail.com', 'petugas', 'avatar-3.jpg'),
(3, 'pemohon', 'pemohon', 'Febry Saputra', 'pemohon@gmail.com', 'pemohon', 'pemohon.jpg'),
(4, 'pemohon2', 'pemohon2', 'Stephani', 'pemohon@gmail.com', 'pemohon', 'pemohon.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `hasil_pengukuran`
--
ALTER TABLE `hasil_pengukuran`
  ADD PRIMARY KEY (`no_hasil_pengukuran`);

--
-- Indeks untuk tabel `hasil_permohonan`
--
ALTER TABLE `hasil_permohonan`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indeks untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `permohonan_hgb`
--
ALTER TABLE `permohonan_hgb`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `permohonan_hm`
--
ALTER TABLE `permohonan_hm`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_pengukuran`
--
ALTER TABLE `hasil_pengukuran`
  MODIFY `no_hasil_pengukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `hasil_permohonan`
--
ALTER TABLE `hasil_permohonan`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `permohonan_hgb`
--
ALTER TABLE `permohonan_hgb`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `permohonan_hm`
--
ALTER TABLE `permohonan_hm`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
