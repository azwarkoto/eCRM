-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 12:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Manajer','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'ari', 'fc292bd7df071858c2d0f955545673c1', 'Admin'),
(2, 'andi', 'fc292bd7df071858c2d0f955545673c1', 'Manajer'),
(4, 'munkaris88', 'fc292bd7df071858c2d0f955545673c1', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `id_barang` int(9) NOT NULL,
  `kode_barang` varchar(35) NOT NULL,
  `nama_barang` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`id_barang`, `kode_barang`, `nama_barang`) VALUES
(10, 'B01', 'Meja'),
(11, 'B02', 'Kursi'),
(12, 'B03', 'Laptop'),
(13, 'B04', 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ruangan`
--

CREATE TABLE `daftar_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(15) NOT NULL,
  `nama_ruangan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_ruangan`
--

INSERT INTO `daftar_ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`) VALUES
(7, 'A01', 'Ruangan Manager (KABAG)'),
(8, 'A02', 'Ruangan Supervisor (KASIE)');

-- --------------------------------------------------------

--
-- Table structure for table `detail_aset`
--

CREATE TABLE `detail_aset` (
  `id_detail_aset` int(9) NOT NULL,
  `nama_ruangan` varchar(35) NOT NULL,
  `nama_aset` varchar(35) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_identifikasi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_ruangan`
--

CREATE TABLE `fasilitas_ruangan` (
  `id_fasilitas_ruangan` int(9) NOT NULL,
  `id_barang` int(9) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `jumlah` int(9) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `no_identifikasi` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas_ruangan`
--

INSERT INTO `fasilitas_ruangan` (`id_fasilitas_ruangan`, `id_barang`, `id_ruangan`, `jumlah`, `tgl_masuk`, `no_identifikasi`) VALUES
(21, 12, 7, 90, '2019-01-01', ''),
(22, 13, 7, 0, '2019-01-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(9) NOT NULL,
  `id_ruangan` int(9) NOT NULL,
  `id_barang` int(9) NOT NULL,
  `no_identifikasi` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_diperbaiki` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_ruangan`, `id_barang`, `no_identifikasi`, `keterangan`, `tgl_diperbaiki`, `tgl_selesai`, `foto`) VALUES
(35, 7, 12, 'A01 / B03 / 13 / GA / 2019', '45633', '2012-11-11', '2012-02-02', 'foto_1551567067.png'),
(36, 7, 12, 'A01 / B03 / 2 / GA / 2019', '121', '2014-01-01', '2014-01-01', 'foto_1551511751.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `detail_aset`
--
ALTER TABLE `detail_aset`
  ADD PRIMARY KEY (`id_detail_aset`);

--
-- Indexes for table `fasilitas_ruangan`
--
ALTER TABLE `fasilitas_ruangan`
  ADD PRIMARY KEY (`id_fasilitas_ruangan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id_barang` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `daftar_ruangan`
--
ALTER TABLE `daftar_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_aset`
--
ALTER TABLE `detail_aset`
  MODIFY `id_detail_aset` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas_ruangan`
--
ALTER TABLE `fasilitas_ruangan`
  MODIFY `id_fasilitas_ruangan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_ruangan`
--
ALTER TABLE `fasilitas_ruangan`
  ADD CONSTRAINT `fasilitas_ruangan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `daftar_barang` (`id_barang`),
  ADD CONSTRAINT `fasilitas_ruangan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `daftar_ruangan` (`id_ruangan`);

--
-- Constraints for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD CONSTRAINT `perawatan_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `daftar_barang` (`id_barang`),
  ADD CONSTRAINT `perawatan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `daftar_ruangan` (`id_ruangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
