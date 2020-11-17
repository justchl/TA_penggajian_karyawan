-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 05:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `status_kehadiran` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `masuk` time NOT NULL,
  `pulang` time NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `NIK`, `status_kehadiran`, `tanggal`, `masuk`, `pulang`, `keterangan`) VALUES
(3, '23421', 'hadir', '2020-11-14', '16:12:48', '00:12:48', 'shit'),
(6, '23421', 'hadir', '2020-11-14', '10:00:00', '12:00:00', 'ngedate'),
(7, '23421', 'alpha', '2020-11-14', '00:00:00', '00:00:00', 'muput'),
(8, '23421', 'hadir', '2020-11-14', '10:00:00', '12:00:00', 'ngedate'),
(9, '23421', 'alpha', '2020-11-14', '00:00:00', '00:00:00', 'muput');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
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
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `NIK` varchar(20) NOT NULL,
  `nama_karyawan` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `agama` varchar(15) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `golongan` varchar(50) NOT NULL,
  `pendidikan` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_pernikahan` varchar(20) DEFAULT NULL,
  `status_kerja` varchar(20) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `id_sidik_jari` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`NIK`, `nama_karyawan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `jabatan`, `golongan`, `pendidikan`, `no_telp`, `alamat`, `status_pernikahan`, `status_kerja`, `foto`, `id_sidik_jari`, `id_user`) VALUES
('13123456', 'yudist', 'dps', '2020-05-12', 'Laki-laki', 'Hindu', 'Rektor', 'Penata Tk I/III d', 'S3', '43545', 'jalan ratih no 11 sedang, abs, badung', 'Belum Kawin', 'Tetap', '168710481.jpg', '', 1),
('23421', 'jik dewa', 'tabanan', '2020-02-13', 'Laki-laki', 'Hindu', 'Wakil Rektor', 'Penata Tk I/III d', 'D4 / S1', '08123123', 'badung, bali', 'Belum Kawin', 'Kontrak', NULL, '002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `hak_akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `hak_akses`) VALUES
(1, 'admin'),
(2, 'karyawan'),
(3, 'sekretaris 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `nilai_tunjangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tunjangan`
--

INSERT INTO `tb_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `nilai_tunjangan`) VALUES
(3, 'Uang Makan', '550000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
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
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level_akses`, `status`) VALUES
(1, 'yudistira', 'admin', '4297f44b13955235245b2497399d7a93', 1, 1),
(5, 'ulan trisnayanthi', 'molen', '4297f44b13955235245b2497399d7a93', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `NIK` (`NIK`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `NIK` (`NIK`),
  ADD KEY `tunjangan` (`tunjangan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`NIK`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level_akses` (`level_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tb_karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `tb_karyawan` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_gaji_ibfk_2` FOREIGN KEY (`tunjangan`) REFERENCES `tb_tunjangan` (`id_tunjangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`level_akses`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
