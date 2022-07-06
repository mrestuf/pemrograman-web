-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 05:50 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail`
--

CREATE TABLE `tbdetail` (
  `id_detail` varchar(6) NOT NULL,
  `id_produk` varchar(6) NOT NULL,
  `no_pesanan` varchar(6) NOT NULL,
  `qty` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbdetail`
--

INSERT INTO `tbdetail` (`id_detail`, `id_produk`, `no_pesanan`, `qty`, `subtotal`) VALUES
('DTL001', 'MK01', 'PES001', 3, 69000),
('DTL002', 'MK02', 'PES003', 1, 20000),
('DTL003', 'MK01', 'PES004', 1, 23000);

-- --------------------------------------------------------

--
-- Table structure for table `tbmeja`
--

CREATE TABLE `tbmeja` (
  `no_meja` char(3) NOT NULL,
  `kapasitas_meja` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbmeja`
--

INSERT INTO `tbmeja` (`no_meja`, `kapasitas_meja`) VALUES
('A01', 4),
('A02', 2),
('A03', 2),
('A04', 2),
('B01', 4),
('B02', 4),
('B03', 4),
('B04', 4),
('C01', 8),
('C02', 8),
('C03', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbpesanan`
--

CREATE TABLE `tbpesanan` (
  `no_pesanan` varchar(6) NOT NULL,
  `no_meja` char(3) NOT NULL,
  `tgl_pesanan` date NOT NULL,
  `total` int(100) NOT NULL,
  `tgl_selesai_pesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpesanan`
--

INSERT INTO `tbpesanan` (`no_pesanan`, `no_meja`, `tgl_pesanan`, `total`, `tgl_selesai_pesanan`) VALUES
('PES001', 'A01', '2022-01-19', 69000, '2022-01-19'),
('PES002', 'A01', '2022-01-19', 0, NULL),
('PES003', 'A01', '2022-01-20', 20000, NULL),
('PES004', 'A01', '2022-01-24', 23000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE `tbproduk` (
  `id_produk` varchar(6) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok` int(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`id_produk`, `nama_produk`, `gambar_produk`, `stok`, `harga`) VALUES
('MK01', 'Nasi Goreng', 'nasi.jpg', 100, 23000),
('MK02', 'Mie Goreng', 'mie.jpg', 100, 20000),
('MK03', 'Sate Ayam', 'sate1.jpg', 100, 25000),
('MK04', 'EsKrim Oreo', 'oreo.jpg', 100, 19000),
('MK07', 'Sate', 'sate.jpg', 25, 20000),
('MN01', 'Boba Gula Aren', 'bolu.jpg', 50, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbdetail`
--
ALTER TABLE `tbdetail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `no_pesanan` (`no_pesanan`);

--
-- Indexes for table `tbmeja`
--
ALTER TABLE `tbmeja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `tbpesanan`
--
ALTER TABLE `tbpesanan`
  ADD PRIMARY KEY (`no_pesanan`),
  ADD KEY `no_meja` (`no_meja`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
