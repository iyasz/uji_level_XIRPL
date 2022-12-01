-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 02:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_adm` varchar(255) NOT NULL,
  `email_adm` varchar(255) NOT NULL,
  `username_adm` varchar(255) NOT NULL,
  `password_adm` varchar(255) NOT NULL,
  `telepon_adm` varchar(255) NOT NULL,
  `alamat_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama_adm`, `email_adm`, `username_adm`, `password_adm`, `telepon_adm`, `alamat_adm`) VALUES
(1, 'iyasz tampan', 'elaina wangy', 'arisu wangy', 'awdawd', '9292929', 'kahuripan mas'),
(4, 'elaina', 'zakama', 'iyasssssssssssssss', '23dwe3', '03453', 'lord'),
(6, 'arisu', 'adwda@mdwad.com', 'arisu sakayanagi', 'arisu', '0932832', 'KM'),
(7, 'aki adagaki', 'aki@gamil.com', 'akiCHan', 'awdoooo', '096237273', 'popororo'),
(8, 'kei shirogane', 'kei@gmail.com', 'keikuun', 'awdawd', '09322', 'jalan raya'),
(9, 'awd', 'awd', 'awd', 'awd', 'awdaw', 'awdawd');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `jenis_brg` varchar(55) NOT NULL,
  `harga_brg` varchar(255) NOT NULL,
  `stok_brg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_brg`, `jenis_brg`, `harga_brg`, `stok_brg`) VALUES
(1, 'Ciki Jaguar', 'Makanan', '1000', '-242226'),
(4, 'Harga diri', 'Makanan', '9990000', '175'),
(5, 'Oky Jelly drink', 'Minuman', '1000', '191'),
(6, 'Kolek', 'Makanan', '2000', '-242226'),
(7, 'Aqua', 'Minuman', '1000', '198'),
(8, 'Elaine', 'Minuman', '2000', '178'),
(9, 'CIki RIng', 'Makanan', '2000', '-484650'),
(10, 'pisang molen', 'Makanan', '2000', '190'),
(11, 'kencing anime', 'Minuman', '90000', '175'),
(12, 'Le mineral', 'Minuman', '2000', '-242229'),
(13, 'Melon ', 'Makanan', '20000', '198');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_transaksi`
--

CREATE TABLE `tabel_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_total` varchar(255) NOT NULL,
  `tgl_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_transaksi`
--

INSERT INTO `tabel_transaksi` (`id_transaksi`, `id_admin`, `id_barang`, `jumlah`, `harga_total`, `tgl_transaksi`) VALUES
(1, 8, 12, 15, '1350000', '2022-12-12'),
(2, 8, 4, 15, '149850000', '2022-12-23'),
(3, 8, 8, 14, '28000', '2022-12-29'),
(4, 8, 8, 6, '12000', '2022-12-13'),
(5, 8, 5, 5, '5000', '2022-12-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `tblbrg` (`id_barang`),
  ADD KEY `tbladm` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_barang`
--
ALTER TABLE `tabel_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_transaksi`
--
ALTER TABLE `tabel_transaksi`
  ADD CONSTRAINT `tbladm` FOREIGN KEY (`id_admin`) REFERENCES `tabel_admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbrg` FOREIGN KEY (`id_barang`) REFERENCES `tabel_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
