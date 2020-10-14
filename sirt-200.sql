-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2019 pada 04.49
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirt-200`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buat_iuran`
--

CREATE TABLE `buat_iuran` (
  `id_b_iuran` int(100) NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `jenis_iuran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(200) NOT NULL,
  `no_ktp` varchar(200) DEFAULT NULL,
  `foto_ktp` varchar(200) DEFAULT NULL,
  `foto_kk` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `no_ktp`, `foto_ktp`, `foto_kk`) VALUES
(25, '123456', NULL, NULL),
(26, '1234567', NULL, NULL),
(27, '12345678', NULL, NULL),
(28, '123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungan`
--

CREATE TABLE `hubungan` (
  `id_hubungan` int(200) NOT NULL,
  `no_parent` int(100) DEFAULT NULL,
  `no_child` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran`
--

CREATE TABLE `iuran` (
  `id_iuran` int(200) NOT NULL,
  `no_ktp` varchar(200) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `id_b_iuran` int(11) NOT NULL,
  `besaran` int(10) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `via` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keu` int(200) NOT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `nama_item` varchar(200) DEFAULT NULL,
  `nominal` varchar(200) DEFAULT NULL,
  `peruntukan` varchar(100) NOT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `tgl` datetime DEFAULT NULL,
  `via` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(200) NOT NULL,
  `nama_laporan` varchar(200) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  `dari` date DEFAULT NULL,
  `ke` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(200) NOT NULL,
  `rt` int(100) DEFAULT NULL,
  `no_ktp` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `sex` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `no_rumah` varchar(200) NOT NULL,
  `foto` text NOT NULL,
  `no_kontak` varchar(200) NOT NULL,
  `hubungan` varchar(100) NOT NULL,
  `email_warga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `rt`, `no_ktp`, `nama_lengkap`, `sex`, `tgl_lahir`, `pendidikan`, `agama`, `pekerjaan`, `no_rumah`, `foto`, `no_kontak`, `hubungan`, `email_warga`) VALUES
(1, 1, '327', 'Samsul', 'Pria', '1989-03-17', 'S1', 'Islam', 'Karyawan Swasta', 'N2 17', '', '1234567', 'Kepala Keluarga', ''),
(27, 9, '123456', 'Hamzah', 'Pria', '1974-02-06', 'S1', 'Islam', 'PNS', 'Blok N1 No 1', '', '123456', 'Kepala Keluarga', ''),
(28, 9, '1234567', 'Herman', 'Pria', '1977-02-06', 'S1', 'Islam', 'Wirausaha', 'Blok N1 No 2', '', '1234567', 'Kepala Keluarga', ''),
(29, 9, '12345678', 'Maman', 'Pria', '1987-02-06', 'SMA', 'Islam', 'Karyawan Swasta', 'Blok N1 No 3', '12345678_foto', '12345678', 'Kepala Keluarga', 'maman@maman.com'),
(30, 9, '123456789', 'Mamat', 'Pria', '1985-02-06', 'SMP', 'Islam', 'Wirausaha', 'Blok N1 No 4', '123456789_foto', '123456789', 'Kepala Keluarga', 'mamat@mamat.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rt`
--

CREATE TABLE `rt` (
  `id_rt` int(10) NOT NULL,
  `nama_rt` varchar(20) DEFAULT NULL,
  `ketua` int(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `pass_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rt`
--

INSERT INTO `rt` (`id_rt`, `nama_rt`, `ketua`, `email`, `pass_email`) VALUES
(9, 'RT 1', NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_set` int(2) NOT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(100) DEFAULT NULL,
  `komplek` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_set`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `komplek`, `logo`) VALUES
(1, '12', 'Leuwi Singa', 'Cilodrok', 'Karek Anyar', 'Jawa Barat', '123456', 'Kampung Alim Rugi', 'logo1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(200) NOT NULL,
  `rt` int(10) DEFAULT NULL,
  `dari` varchar(100) DEFAULT NULL,
  `perihal` varchar(100) DEFAULT NULL,
  `tgl_pengajuan` datetime DEFAULT NULL,
  `nomor_surat` varchar(100) DEFAULT NULL,
  `tgl_penerbitan` datetime DEFAULT NULL,
  `no_urut` int(200) NOT NULL,
  `status` int(2) NOT NULL,
  `keperluan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `no_ktp` varchar(200) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `no_ktp`, `password`, `role`, `status`, `last_login`) VALUES
(1, 'admin', '327', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, '2019-02-06 10:41:37'),
(18, '123456', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'rw', 1, '2019-02-06 10:45:25'),
(19, '1234567', '1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'Ketua', 1, '2019-02-06 10:45:44'),
(20, '12345678', '12345678', '25d55ad283aa400af464c76d713c07ad', 'Bendahara', 1, NULL),
(21, '123456789', '123456789', '25f9e794323b453885f5181f1b624d0b', 'Sekretaris', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buat_iuran`
--
ALTER TABLE `buat_iuran`
  ADD PRIMARY KEY (`id_b_iuran`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `hubungan`
--
ALTER TABLE `hubungan`
  ADD PRIMARY KEY (`id_hubungan`);

--
-- Indeks untuk tabel `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keu`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_set`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buat_iuran`
--
ALTER TABLE `buat_iuran`
  MODIFY `id_b_iuran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `hubungan`
--
ALTER TABLE `hubungan`
  MODIFY `id_hubungan` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id_iuran` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keu` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `rt`
--
ALTER TABLE `rt`
  MODIFY `id_rt` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_set` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
