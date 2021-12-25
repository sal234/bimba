-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 25, 2021 at 04:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bimba_aiueo`
--

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE `statistik` (
  `id` int(8) NOT NULL,
  `ip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(8) NOT NULL,
  `online` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '127.0.0.1', '2014-03-17', 63, '1395034465'),
(2, '127.0.0.1', '2014-03-18', 53, '1395129935'),
(3, '127.0.0.1', '2014-03-22', 122, '1395493770'),
(4, '127.0.0.1', '2014-04-17', 50, '1397733464'),
(5, '127.0.0.1', '2014-04-18', 55, '1397839756'),
(6, '127.0.0.1', '2014-04-19', 26, '1397883619'),
(7, '127.0.0.1', '2014-05-28', 9, '1401282009'),
(8, '127.0.0.1', '2014-05-31', 39, '1401531874'),
(9, '127.0.0.1', '2014-06-03', 30, '1401783305'),
(10, '127.0.0.1', '2014-06-09', 12, '1402299670'),
(11, '127.0.0.1', '2014-06-18', 8, '1403092882'),
(12, '127.0.0.1', '2014-06-20', 1954, '1403269933'),
(13, '127.0.0.1', '2014-10-15', 86, '1413374159'),
(14, '127.0.0.1', '2014-10-22', 107, '1413951013'),
(15, '127.0.0.1', '2014-10-24', 3, '1414149898'),
(16, '127.0.0.1', '2014-11-04', 20, '1415070918'),
(17, '127.0.0.1', '2014-11-05', 46, '1415154829'),
(18, '127.0.0.1', '2014-11-11', 24, '1415666142'),
(19, '127.0.0.1', '2014-11-23', 35, '1416719646'),
(20, '127.0.0.1', '2015-01-02', 196, '1420215747'),
(21, '127.0.0.1', '2015-01-03', 24, '1420264639'),
(22, '127.0.0.1', '2015-01-06', 45, '1420511116'),
(23, '127.0.0.1', '2015-02-01', 271, '1422770430'),
(24, '::1', '2017-08-24', 100, '1503577110'),
(25, '::1', '2017-08-25', 9, '1503633839'),
(26, '::1', '2017-08-26', 2, '1503740938'),
(27, '::1', '2017-08-31', 14, '1504143117');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `kode_absensi` int(15) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`kode_absensi`, `tgl`, `jam`, `kode_siswa`, `status`, `keterangan`, `level`) VALUES
(1, '2017-08-31', '08:00:00', 'SWA1708002', 'Aktif', '-', ''),
(3, '2017-08-31', '13:46:58', 'SWA1708003', 'Aktif', 'rererere', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kode_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif'),
('ADM03', 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif'),
('ADM01', 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kode_jadwal` varchar(15) NOT NULL,
  `pertemuan` int(15) NOT NULL,
  `biaya` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`kode_jadwal`, `pertemuan`, `biaya`, `keterangan`) VALUES
('JDW1708001', 2, 150000, 'seminggu dua kali'),
('JDW1708002', 3, 200000, 'seminggu tiga kali'),
('JDW1708003', 4, 250000, 'seminggu empat kali'),
('JDW1708004', 5, 300000, 'seminggu lima kali'),
('JDW1708005', 6, 350000, 'seminggu enam kali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `kode_matapelajaran` varchar(15) NOT NULL,
  `nama_matapelajaran` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`kode_matapelajaran`, `nama_matapelajaran`, `deskripsi`) VALUES
('MTP1708001', 'Modul Baca 1A', '-'),
('MTP1708002', 'Modul Baca 1B', '-'),
('MTP1708003', 'Modul Baca 1C', '-'),
('MTP1708004', 'Modul Baca 1D', '-'),
('MTP1708005', 'Modul Baca 1E', '-'),
('MTP1708006', 'Modul Baca 1F', '-'),
('MTP1708007', 'Modul Baca 1G', '-'),
('MTP1708008', 'Modul Baca 1H', '-'),
('MTP1708009', 'Modul Baca 2', '-'),
('MTP1708010', 'Modul Baca 3', '-'),
('MTP1708011', 'Modul Baca 4', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `kode_pendaftaran` varchar(15) NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `periode_ajaran` int(15) NOT NULL,
  `level` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  `kode_jadwal` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Proses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`kode_pendaftaran`, `kode_siswa`, `tgl`, `periode_ajaran`, `level`, `keterangan`, `kode_jadwal`, `status`) VALUES
('PDF1708001', 'SWA1708002', '2017-08-31', 2017, 1, '', 'JDW1708001', 'Valid'),
('PDF1708002', 'SWA1708004', '2017-08-31', 2017, 2, 'pindahan bimba citayem', 'JDW1708002', 'Valid'),
('PDF2112001', '2112002', '2021-12-25', 2020, 1, 'test', 'JDW1708001', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `kode_penilaian` varchar(15) NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `kode_matapelajaran` varchar(15) NOT NULL,
  `periode_ajaran` int(15) NOT NULL,
  `level` int(15) NOT NULL,
  `catatan` text NOT NULL,
  `nilai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `kode_siswa` bigint(15) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telepon` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama_ortu` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`kode_siswa`, `nama_siswa`, `jenis_kelamin`, `agama`, `tgl_lahir`, `alamat`, `telepon`, `email`, `nama_ortu`, `username`, `password`, `status`) VALUES
(2112002, 'ilham', 'Laki-Laki', 'Islam', '2021-12-25', 'asdsa', 23123, 'sadsad', 'asdas', 'wqeqw', '13213', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statistik`
--
ALTER TABLE `statistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`kode_absensi`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kode_admin`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`kode_matapelajaran`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`kode_pendaftaran`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`kode_penilaian`),
  ADD KEY `kode_matapelajaran` (`kode_matapelajaran`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statistik`
--
ALTER TABLE `statistik`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `kode_absensi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`kode_matapelajaran`) REFERENCES `tb_matapelajaran` (`kode_matapelajaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
