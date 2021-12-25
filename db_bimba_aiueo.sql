-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2017 pada 06.07
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_bimba_aiueo`
--
CREATE DATABASE IF NOT EXISTS `db_bimba_aiueo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_bimba_aiueo`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(8) NOT NULL,
  `online` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `statistik`
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
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `kode_absensi` int(15) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `level` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_absensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`kode_absensi`, `tgl`, `jam`, `kode_siswa`, `status`, `keterangan`, `level`) VALUES
(1, '2017-08-31', '08:00:00', 'SWA1708002', 'Aktif', '-', ''),
(3, '2017-08-31', '13:46:58', 'SWA1708003', 'Aktif', 'rererere', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `kode_admin` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` enum('Aktif','Tidak Aktif') COLLATE latin1_general_ci NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`kode_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`kode_admin`, `username`, `password`, `telepon`, `email`, `gambar`, `status`) VALUES
('ADM02', 'a', 'a', '0234567845678', 'admin@yahoo.com', 'wifi.png', 'Aktif'),
('ADM03', 'array', 'array', '02345678923456', 'array@a.com', 'keys.jpg', 'Aktif'),
('ADM01', 'jokowi', 'jokowi', '021-11111111', 'presidenri@gmail.com', 'key.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `kode_jadwal` varchar(15) NOT NULL,
  `pertemuan` int(15) NOT NULL,
  `biaya` int(30) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kode_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`kode_jadwal`, `pertemuan`, `biaya`, `keterangan`) VALUES
('JDW1708001', 2, 150000, 'seminggu dua kali'),
('JDW1708002', 3, 200000, 'seminggu tiga kali'),
('JDW1708003', 4, 250000, 'seminggu empat kali'),
('JDW1708004', 5, 300000, 'seminggu lima kali'),
('JDW1708005', 6, 350000, 'seminggu enam kali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matapelajaran`
--

CREATE TABLE IF NOT EXISTS `tb_matapelajaran` (
  `kode_matapelajaran` varchar(15) NOT NULL,
  `nama_matapelajaran` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`kode_matapelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_matapelajaran`
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
-- Struktur dari tabel `tb_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `tb_pendaftaran` (
  `kode_pendaftaran` varchar(15) NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `tgl` date NOT NULL,
  `periode_ajaran` int(15) NOT NULL,
  `level` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  `kode_jadwal` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Proses',
  PRIMARY KEY (`kode_pendaftaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`kode_pendaftaran`, `kode_siswa`, `tgl`, `periode_ajaran`, `level`, `keterangan`, `kode_jadwal`, `status`) VALUES
('PDF1708001', 'SWA1708002', '2017-08-31', 2017, 1, '', 'JDW1708001', 'Valid'),
('PDF1708002', 'SWA1708004', '2017-08-31', 2017, 2, 'pindahan bimba citayem', 'JDW1708002', 'Valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE IF NOT EXISTS `tb_penilaian` (
  `kode_penilaian` varchar(15) NOT NULL,
  `kode_siswa` varchar(15) NOT NULL,
  `periode_ajaran` int(15) NOT NULL,
  `level` int(15) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kode_penilaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`kode_penilaian`, `kode_siswa`, `periode_ajaran`, `level`, `keterangan`) VALUES
('PNL1708001', 'SWA1708002', 2017, 1, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaiandetail`
--

CREATE TABLE IF NOT EXISTS `tb_penilaiandetail` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode_penilaian` varchar(15) NOT NULL,
  `kode_matapelajaran` varchar(15) NOT NULL,
  `nilai` int(20) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_penilaiandetail`
--

INSERT INTO `tb_penilaiandetail` (`id`, `kode_penilaian`, `kode_matapelajaran`, `nilai`, `catatan`) VALUES
(3, 'PNL1708001', 'MTP1708002', 10, 'ceecececec'),
(4, 'PNL1708001', 'MTP1708005', 23, 'sdasdasda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `kode_siswa` varchar(15) NOT NULL,
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
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`kode_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`kode_siswa`, `nama_siswa`, `jenis_kelamin`, `agama`, `tgl_lahir`, `alamat`, `telepon`, `email`, `nama_ortu`, `username`, `password`, `status`) VALUES
('SWA1708001', 'aa', 'Laki-Laki', '', '0000-00-00', 'a', 0, '', 'a', 'ss', 'ss', 'Aktif'),
('SWA1708002', 'ddd', 'Laki-Laki', 'Islam', '2000-08-12', 'd', 0, '', 'd', 'd', 'd', 'Aktif'),
('SWA1708003', 'ikhsn', 'laki - laki ', '', '2015-08-31', 'jl asem baris', 0, 'ikhsanbawel@gmail.com', 'madiana', 'ikhsan1', 'ikhsan1', 'Tidak Aktif'),
('SWA1708004', 'riski', 'Laki-Laki', '', '2009-08-31', 'jl kembang', 0, '', 'rini', 'riski', 'riski', 'Aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
