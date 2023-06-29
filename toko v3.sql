-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 03:00 PM
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
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `login_id`, `nama`, `harga`, `foto`, `deskripsi`) VALUES
(1, 1, 'sebasitaon vettel', 213, 'foto_barang/477023-download (1).jpg', 'sdfadfa'),
(2, 1, 'Maulana Fred', 9000, 'foto_barang/959216-WhatsApp Image 2023-06-23 at 12.41.29 PM.jpeg', 'warga porwo dadi asli'),
(3, 1, 'Maulana Fred', 20000, 'foto_barang/789990-images (1).jpg', 'barang bagus dan keren');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `idbarang` int(10) UNSIGNED NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `idbarang`, `id`, `jumlah`) VALUES
(22, 1, 1, 1),
(23, 1, 1, 2),
(24, 1, 2, 6),
(25, 2, 2, 6),
(26, 1, 1, 2),
(27, 2, 1, 1),
(28, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `alamat` text NOT NULL,
  `rekening` int(11) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `kategori`, `alamat`, `rekening`, `bank`, `hp`) VALUES
(1, 'Ricardo', 'Ricardo@gmail.com', '123', NULL, '', 0, '', 0),
(2, 'nopal', 'naufalhanief48@gmail', '123', NULL, '', 0, '', 0),
(3, 'maulana', 'maulana@gmail.com', '123', NULL, 'purwodadi', 0, '', 123),
(4, 'root', 'ramdika@gmail.com', '', NULL, 'depok', 2147483647, 'BRI', 2147483647),
(5, 'root', 'ramdika@gmail.com', '', NULL, 'depok', 2147483647, 'bank jateng', 2147483647),
(6, 'rehan', 'rehan@gmail.com', '', NULL, 'baki', 2147483647, 'bri', 2147483647),
(7, 'iksan', 'iksan@gmail.com', '123', NULL, 'purwodadi', 31231231, 'bri', 8191919),
(8, 'rizal', 'rizal@gmail.com', '', 'user', 'pati', 312312321, 'bri', 91828282),
(9, 'maul', 'maul@gmail.com', '', NULL, 'purowodadi', 2147483647, 'bri ', 81919191),
(10, 'klee', 'rehan@gmail.com', '123', NULL, 'clomadu', 2131231, 'bri', 12312312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `id` (`login_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id` (`id`),
  ADD KEY `idbarang` (`idbarang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
