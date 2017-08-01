-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 04:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_wisata`
--
CREATE DATABASE IF NOT EXISTS `spk_wisata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `spk_wisata`;

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(11) NOT NULL,
  `periode` varchar(30) DEFAULT NULL,
  `prioritas_global` decimal(10,2) DEFAULT NULL,
  `alternatif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `periode`, `prioritas_global`, `alternatif`) VALUES
('008', '', '0.00', '1'),
('1', '', '0.00', 'Pantai Lamsat'),
('2', '', '0.00', 'Tugu Libra'),
('3', '', '0.00', 'Patung hati Kudus Ye'),
('4', '', '0.00', 'TN Wasur'),
('5', '', '0.00', 'Danau Rawa Biru'),
('6', '', '0.00', 'Tugu Perbatasan Saba'),
('7', '', '0.00', 'Lotus Garden'),
('8', '', '0.00', 'Sentra jagung'),
('A0010', NULL, NULL, 'Sentra jagung'),
('A0011', NULL, '0.00', 'Sentra jagung'),
('A0012', NULL, '0.00', 'Pantai Lamsat'),
('A0013', NULL, '0.00', 'Tugu Libra'),
('A0014', NULL, '0.00', 'Patung hati Kudus Ye'),
('A0015', NULL, '0.00', 'TN Wasur'),
('A0016', NULL, '0.00', 'Danau Rawa Biru'),
('A0017', NULL, '0.00', 'Tugu Perbatasan Saba'),
('A0018', NULL, '0.14', 'Sentra jagung'),
('A0019', NULL, '0.14', 'Pantai Lamsat'),
('A0020', NULL, '0.14', 'Tugu Libra'),
('A0021', NULL, '0.14', 'Patung hati Kudus Ye'),
('A0022', NULL, '0.14', 'TN Wasur'),
('A0023', NULL, '0.14', 'Danau Rawa Biru'),
('A0024', NULL, '0.14', 'Tugu Perbatasan Saba'),
('A0025', '01 August 2017 ', '0.14', 'Sentra jagung'),
('A0026', '01 August 2017 ', '0.14', 'Pantai Lamsat'),
('A0027', '01 August 2017 ', '0.14', 'Tugu Libra'),
('A0028', '01 August 2017 ', '0.14', 'Patung hati Kudus Ye'),
('A0029', '01 August 2017 ', '0.14', 'TN Wasur'),
('A0030', '01 August 2017 ', '0.14', 'Danau Rawa Biru'),
('A0031', '01 August 2017 ', '0.14', 'Tugu Perbatasan Saba');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kriteria`
--

CREATE TABLE `detail_kriteria` (
  `id_detail_kriteria` int(11) NOT NULL,
  `id_kriteria` varchar(11) NOT NULL,
  `id_wisata` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` varchar(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `prioritas_kriteria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`, `prioritas_kriteria`) VALUES
('10', 'Inprastruktur', '0.25'),
('7', 'Fasilitas', '0.25'),
('8', 'Jumlah_Pengunjung', '0.25'),
('K0006', 'Transportasi', '0.25');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `subkriteria_id` varchar(11) NOT NULL,
  `kriteria_id` varchar(11) NOT NULL,
  `id_alternatif` varchar(11) NOT NULL,
  `prioritas_subkriteria` decimal(10,2) NOT NULL,
  `perkalian` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`subkriteria_id`, `kriteria_id`, `id_alternatif`, `prioritas_subkriteria`, `perkalian`) VALUES
('1', '7', '1', '0.13', '0.06'),
('10', '8', '3', '0.13', '0.03'),
('11', 'K0006', '3', '0.13', '0.02'),
('12', '10', '3', '0.13', '0.01'),
('13', '7', '4', '0.13', '0.06'),
('14', '8', '4', '0.13', '0.03'),
('15', 'K0006', '4', '0.13', '0.02'),
('16', '10', '4', '0.13', '0.01'),
('17', '7', '5', '0.13', '0.06'),
('18', '8', '5', '0.13', '0.03'),
('19', 'K0006', '5', '0.13', '0.02'),
('2', '8', '1', '0.13', '0.03'),
('20', '10', '5', '0.13', '0.01'),
('21', '7', '6', '0.13', '0.06'),
('22', '8', '6', '0.13', '0.03'),
('23', 'K0006', '6', '0.13', '0.02'),
('24', '10', '6', '0.13', '0.01'),
('25', '7', '7', '0.13', '0.06'),
('26', '8', '7', '0.13', '0.03'),
('27', 'K0006', '7', '0.13', '0.02'),
('28', '10', '7', '0.13', '0.01'),
('29', '7', '8', '0.13', '0.06'),
('3', 'K0006', '1', '0.13', '0.02'),
('30', '8', '8', '0.13', '0.03'),
('31', 'K0006', '8', '0.13', '0.02'),
('32', '10', '8', '0.13', '0.01'),
('4', '10', '1', '0.13', '0.01'),
('5', '7', '2', '0.13', '0.06'),
('6', '8', '2', '0.13', '0.03'),
('7', 'K0006', '2', '0.13', '0.02'),
('8', '10', '2', '0.13', '0.01'),
('9', '7', '3', '0.13', '0.06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(2, 'ngadimin', '5449ccea16d1cc73990727cd835e45b5');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` varchar(11) NOT NULL,
  `nama_wisata` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `fasilitas` int(11) NOT NULL,
  `jml_pengunjung` int(11) NOT NULL,
  `transportasi` int(11) NOT NULL,
  `infrastruktur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `keterangan`, `fasilitas`, `jml_pengunjung`, `transportasi`, `infrastruktur`) VALUES
('', 'deso', 'wisoto', 'mulyo', 2, 3, 2, 4),
('10', 'Sentra jagung', 'oo', 'oo', 0, 0, 0, 0),
('3', 'Pantai Lamsat', 'x', 'y', 0, 0, 0, 0),
('4', 'Tugu Libra', 'x', 'y', 0, 0, 0, 0),
('5', 'Patung hati Kudus Ye', 'y', 'x', 0, 0, 0, 0),
('6', 'TN Wasur', 'x', 'y', 0, 0, 0, 0),
('7', 'Danau Rawa Biru', 'i', 'j', 0, 0, 0, 0),
('8', 'Tugu Perbatasan Saba', 'p', 'p', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD PRIMARY KEY (`id_detail_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kriteria_id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`subkriteria_id`),
  ADD KEY `kriteria_id` (`kriteria_id`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD CONSTRAINT `detail_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_kriteria_ibfk_3` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subkriteria_ibfk_4` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
