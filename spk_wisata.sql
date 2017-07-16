-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 03:25 AM
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
  `id_alternatif` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `global` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `prioritas_kriteria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`, `prioritas_kriteria`) VALUES
(4, 'fasilitas', '0.00'),
(5, 'jum_pengunjung', '0.00'),
(6, 'transportasi', '0.00'),
(7, 'infrastruktur', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `subkriteria_id` int(11) NOT NULL,
  `kriteria_id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `prioritas_subkriteria` decimal(10,2) NOT NULL,
  `perkalian` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `fasilitas` varchar(1) NOT NULL,
  `jml_pengunjung` varchar(1) NOT NULL,
  `transportasi` varchar(1) NOT NULL,
  `infrastruktur` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `keterangan`, `fasilitas`, `jml_pengunjung`, `transportasi`, `infrastruktur`) VALUES
(3, 'Pantai Lamsat', 'x', 'y', '5', '3', '1', '0'),
(4, 'Tugu Libra', 'x', 'y', '1', '2', '2', '1'),
(5, 'Patung hati Kudus Ye', 'y', 'x', '2', '2', '1', '1'),
(6, 'TN Wasur', 'x', 'y', '3', '3', '2', '2'),
(7, 'Danau Rawa Biru', 'i', 'j', '1', '1', '2', '2'),
(8, 'Tugu Perbatasan Saba', 'p', 'p', '3', '3', '0', '0'),
(9, 'Lotus Garden', 'ww', 'ww', '1', '1', '2', '2'),
(10, 'Sentra jagung', 'oo', 'oo', '2', '3', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`),
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
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kriteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `subkriteria_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD CONSTRAINT `alternatif_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `subkriteria_ibfk_2` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
