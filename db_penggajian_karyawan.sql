-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2020 pada 17.08
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian_karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `status_kehadiran` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` time NOT NULL,
  `pulang` time NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` varchar(30) NOT NULL,
  `tunjangan_pendidikan` varchar(50) NOT NULL,
  `tambahan` varchar(30) NOT NULL,
  `potongan` varchar(30) NOT NULL,
  `lembur` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(40) NOT NULL,
  `nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `NIK` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `golongan` int(11) NOT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_pernikahan` varchar(20) DEFAULT NULL,
  `status_kerja` varchar(20) DEFAULT NULL,
  `masa_kerja` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `id_sidik_jari` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `hak_akses`) VALUES
(1, 'admin'),
(2, 'karyawan'),
(3, 'sekretaris 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `nilai_tunjangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tunjangan`
--

INSERT INTO `tb_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `nilai_tunjangan`) VALUES
(3, 'Uang Makan', '550000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_akses` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level_akses`, `status`) VALUES
(1, 'yudistira', 'admin', '4297f44b13955235245b2497399d7a93', 1, 1),
(5, 'ulan trisnayanthi', 'molen', '4297f44b13955235245b2497399d7a93', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `NIK` (`NIK`);

--
-- Indeks untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `tunjangan` (`tunjangan`);

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`NIK`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `golongan` (`golongan`);

--
-- Indeks untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level_akses` (`level_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tb_karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tb_karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_gaji_ibfk_2` FOREIGN KEY (`tunjangan`) REFERENCES `tb_tunjangan` (`id_tunjangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`level_akses`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
