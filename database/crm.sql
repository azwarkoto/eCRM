-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 03:57 PM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(5) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `jenis_barang` varchar(50) DEFAULT NULL,
  `nama_ng` varchar(50) DEFAULT NULL,
  `id_karyawan` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `nama_barang`, `jenis_barang`, `nama_ng`, `id_karyawan`) VALUES
(1, 'ds', 'ds', 'fd', NULL),
(2, 'fsd', 'fs', 'r', NULL),
(3, '666', 'tte', 'rt', NULL),
(4, 'ffafafa', 'fasfa', 'fa', NULL),
(5, 'sd', 'ds', 'sd', NULL),
(6, 'sdadad', 'ast', 's', NULL),
(7, 'dsa4', 'fd', 'f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_customer`
--

CREATE TABLE `data_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(150) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `alamat_customer` text,
  `tanggal_lahir_customer` date DEFAULT NULL,
  `email_customer` varchar(150) DEFAULT NULL,
  `no_telpon_customer` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_customer`
--

INSERT INTO `data_customer` (`id_customer`, `nama_customer`, `password`, `alamat_customer`, `tanggal_lahir_customer`, `email_customer`, `no_telpon_customer`) VALUES
(1, 'asa', 'admin', 'dasda', '0000-00-00', 'eko@inti-soft.com', 9866666),
(3, 'ete', '21232f297a57a5a743894a0e4a801fc3', 'te', '0000-00-00', 'it.bprmaa@gmail.com', 5353);

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` varchar(5) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_karyawan` varchar(150) DEFAULT NULL,
  `jabatan_karyawan` varchar(100) DEFAULT NULL,
  `shift` int(5) DEFAULT NULL,
  `id_line` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `password`, `nama_karyawan`, `jabatan_karyawan`, `shift`, `id_line`) VALUES
('ID001', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin Divisi', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_laporan`
--

CREATE TABLE `data_laporan` (
  `id_laporan` int(5) NOT NULL,
  `id_karyawan` varchar(5) DEFAULT NULL,
  `id_part` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total` int(10) UNSIGNED DEFAULT NULL,
  `no_mo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detailbarang` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `id_komponen` int(5) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_faktur`
--

CREATE TABLE `detail_faktur` (
  `id_detailfaktur` int(5) NOT NULL,
  `id_faktur` int(5) DEFAULT NULL,
  `no_mo` varchar(50) DEFAULT NULL,
  `qty` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faktur_penjualan`
--

CREATE TABLE `faktur_penjualan` (
  `id_faktur` int(5) NOT NULL,
  `tgl_faktur` date DEFAULT NULL,
  `id_barang` int(5) DEFAULT NULL,
  `item` int(5) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `dibayar` int(10) DEFAULT NULL,
  `kembalian` int(10) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur_penjualan`
--

INSERT INTO `faktur_penjualan` (`id_faktur`, `tgl_faktur`, `id_barang`, `item`, `total`, `dibayar`, `kembalian`, `id_customer`) VALUES
(0, '2019-03-01', 4, 3, 3, 200000, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(5) NOT NULL,
  `nama_komponen` varchar(150) DEFAULT NULL,
  `nama_ng` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `nama_komponen`, `nama_ng`) VALUES
(0, 'Komponenku', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `id_line` int(5) NOT NULL,
  `nama_line` varchar(150) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `stopline` int(5) DEFAULT NULL,
  `id_part` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id_line`, `nama_line`, `time`, `stopline`, `id_part`) VALUES
(0, 'dsad', '00:00:00', 32, 'po01');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturing_order`
--

CREATE TABLE `manufacturing_order` (
  `no_mo` varchar(50) NOT NULL,
  `id_customer` varchar(5) DEFAULT NULL,
  `id_line` int(5) DEFAULT NULL,
  `tanggal_mo` date DEFAULT NULL,
  `total` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturing_order`
--

INSERT INTO `manufacturing_order` (`no_mo`, `id_customer`, `id_line`, `tanggal_mo`, `total`) VALUES
('', '3', 0, '2019-03-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id_material` int(5) NOT NULL,
  `nama_material` varchar(150) DEFAULT NULL,
  `satuan_material` varchar(10) DEFAULT NULL,
  `stock_material` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id_material`, `nama_material`, `satuan_material`, `stock_material`) VALUES
(1, 'Besi', 'Kg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `id_part` varchar(15) NOT NULL,
  `nama_part` varchar(150) DEFAULT NULL,
  `jenis_part` varchar(50) DEFAULT NULL,
  `cycle_time` int(5) DEFAULT NULL,
  `nama_ng` varchar(50) DEFAULT NULL,
  `id_material` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`id_part`, `nama_part`, `jenis_part`, `cycle_time`, `nama_ng`, `id_material`) VALUES
('', 'PART2', 'KAYU', 2, 'GOOD', 1),
('po01', 'sss', 'dd', 2, 'asa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `FK_data_barang_data_karyawan` (`id_karyawan`);

--
-- Indexes for table `data_customer`
--
ALTER TABLE `data_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `FK_data_karyawan_line` (`id_line`);

--
-- Indexes for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `FK_data_laporan_data_karyawan` (`id_karyawan`),
  ADD KEY `FK_data_laporan_part` (`id_part`),
  ADD KEY `FK_data_laporan_manufacturing_order` (`no_mo`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detailbarang`),
  ADD KEY `FK_detail_barang_komponen` (`id_komponen`),
  ADD KEY `FK_detail_barang_data_barang` (`id_barang`);

--
-- Indexes for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD PRIMARY KEY (`id_detailfaktur`),
  ADD KEY `FK_detail_faktur_faktur_penjualan` (`id_faktur`),
  ADD KEY `FK_detail_faktur_manufacturing_order` (`no_mo`);

--
-- Indexes for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `FK_faktur_penjualan_data_barang` (`id_barang`),
  ADD KEY `FK_faktur_penjualan_data_customer` (`id_customer`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`id_line`),
  ADD KEY `FK_line_part` (`id_part`);

--
-- Indexes for table `manufacturing_order`
--
ALTER TABLE `manufacturing_order`
  ADD PRIMARY KEY (`no_mo`),
  ADD KEY `FK_manufacturing_order_line` (`id_line`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`id_part`),
  ADD KEY `FK_part_material` (`id_material`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_customer`
--
ALTER TABLE `data_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `FK_data_barang_data_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`);

--
-- Constraints for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD CONSTRAINT `FK_data_karyawan_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id_line`);

--
-- Constraints for table `data_laporan`
--
ALTER TABLE `data_laporan`
  ADD CONSTRAINT `FK_data_laporan_data_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `data_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `FK_data_laporan_manufacturing_order` FOREIGN KEY (`no_mo`) REFERENCES `manufacturing_order` (`no_mo`),
  ADD CONSTRAINT `FK_data_laporan_part` FOREIGN KEY (`id_part`) REFERENCES `part` (`id_part`);

--
-- Constraints for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD CONSTRAINT `FK_detail_barang_data_barang` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`),
  ADD CONSTRAINT `FK_detail_barang_komponen` FOREIGN KEY (`id_komponen`) REFERENCES `komponen` (`id_komponen`);

--
-- Constraints for table `detail_faktur`
--
ALTER TABLE `detail_faktur`
  ADD CONSTRAINT `FK_detail_faktur_faktur_penjualan` FOREIGN KEY (`id_faktur`) REFERENCES `faktur_penjualan` (`id_faktur`),
  ADD CONSTRAINT `FK_detail_faktur_manufacturing_order` FOREIGN KEY (`no_mo`) REFERENCES `manufacturing_order` (`no_mo`);

--
-- Constraints for table `faktur_penjualan`
--
ALTER TABLE `faktur_penjualan`
  ADD CONSTRAINT `FK_faktur_penjualan_data_barang` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`),
  ADD CONSTRAINT `FK_faktur_penjualan_data_customer` FOREIGN KEY (`id_customer`) REFERENCES `data_customer` (`id_customer`);

--
-- Constraints for table `line`
--
ALTER TABLE `line`
  ADD CONSTRAINT `FK_line_part` FOREIGN KEY (`id_part`) REFERENCES `part` (`id_part`);

--
-- Constraints for table `manufacturing_order`
--
ALTER TABLE `manufacturing_order`
  ADD CONSTRAINT `FK_manufacturing_order_line` FOREIGN KEY (`id_line`) REFERENCES `line` (`id_line`);

--
-- Constraints for table `part`
--
ALTER TABLE `part`
  ADD CONSTRAINT `FK_part_material` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
