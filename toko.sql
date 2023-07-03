-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 03:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(10) UNSIGNED NOT NULL,
  `login_id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `harga` int(10) UNSIGNED DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `login_id`, `nama`, `harga`, `foto`, `deskripsi`) VALUES
(12, 3, 'nahida ', 500, 'GenshinImpact_Nahida_CloseUp-1024x576-1.png', 'nahida dah tua'),
(13, 3, 'redbull', 20000, 'red-bull-rb16b1.jpg', 'brberberberbrebbb bletak bletak duarrr');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `kategori` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `kategori`) VALUES
(1, 'Ricardo', 'Ricardo@gmail.com', '123', 'user'),
(3, 'nopal', 'nopal@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `barang_FKIndex1` (`login_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SELECT barang.nama as 'nama', barang.harga as 'harga', barang.foto as 'foto', keranjang.jumlah as 'jumlah' FROM barang JOIN keranjang ON barang.idbarang = keranjang.idbarang WHERE keranjang.id = 1
```
SELECT * FROM keranjang WHERE id = 1
```
query mencari barang terbayar
SELECT login.username as 'pembeli',login.alamat as 'alamat', barang.nama as 'barang', barang.harga as 'harga', keranjang.jumlah as 'jumlah',transaksi.bukti_bayar as 'bukti' 
FROM login JOIN barang ON login.id = barang.login_id JOIN keranjang ON barang.idbarang = keranjang.idbarang JOIN transaksi ON keranjang.id_keranjang = transaksi.id_keranjang WHERE keranjang.terbayar = 1 AND barang.login_id = 1
```
```
```
```
```

SELECT transaksi.id_pembeli as 'pembeli', transaksi.id_penjual as 'penjual', transaksi.bukti_bayar as 'bukti' FROM transaksi WHERE penjual_id = 1




SELECT transaksi.id_keranjang as id_keranjang,transaksi.id_penjual as id_penjual,transaksi.bukti_bayar as bukti_bayar from transaksi















