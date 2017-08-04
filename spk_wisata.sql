-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2017 at 12:59 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(11) NOT NULL,
  `Periode` varchar(30) NOT NULL,
  `prioritas_global` decimal(10,2) DEFAULT NULL,
  `alternatif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `Periode`, `prioritas_global`, `alternatif`) VALUES
('A0009', '01 August 2017 ', NULL, 'Pantai Lamsat'),
('A001', 'Des 2016', '0.14', 'Pantai Lamsat'),
('A0010', '01 August 2017 ', NULL, 'Tugu Libra'),
('A0011', '01 August 2017 ', NULL, 'Patung HKY'),
('A0012', '01 August 2017 ', NULL, 'TN Wasur'),
('A0013', '01 August 2017 ', NULL, 'Danau Rawa Biru'),
('A0014', '01 August 2017 ', NULL, 'TP Sabang-MRQ'),
('A0015', '01 August 2017 ', NULL, 'Lotus Garden'),
('A0016', '01 August 2017 ', NULL, 'Sentra Jagung'),
('A002', '', '0.14', 'Tugu Libra'),
('A003', '', '0.14', 'Patung HKY'),
('A004', '', '0.14', 'TN Wasur'),
('A005', '', '0.14', 'Danau Rawa Biru'),
('A006', '', '0.00', 'TP Sabang-MRQ'),
('A007', '', '0.00', 'Lotus Garden'),
('A008', '', '0.03', 'Sentra jagung');

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
('10', 'Fasilitas', '0.55'),
('7', 'Jumlah Pengunjung', '0.26'),
('8', 'Transportasi', '0.15'),
('K0006', 'Infrastruktur', '0.05');

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
('1', 'Pantai Lamsat', 'Jalan Ndorem Buti', 'Garis pantai terpanjang di kota Merauke', 3, 2, 3, 3),
('10', 'Tugu Libra', 'Jalan Brawijaya', 'Taman kota merauke', 3, 3, 2, 4),
('3', 'Patung HKY', 'Jalan Mopah Baru', 'Patung yang dibangun untuk memperingati masuknya Misionaris Hati Kudus YESUS (MSC) ke 105 tahun di Tanah Marind', 3, 2, 2, 4),
('4', 'TN Wasur', 'Jalan Wasur Km 12', 'Hutan lindung ', 3, 2, 3, 1),
('5', 'Danau Rawa Biru', 'Jalan Rawa Biru Km 40', 'Rawa yang menyerupai danau dengan dikelilingi padang savana', 2, 2, 3, 1),
('6', 'TP Sabang-MRQ', 'Jalan Sota, Trans Papua', 'Tugu Perbatasan antara Indonesia dan PNG', 4, 3, 3, 1),
('7', 'Lotus Garden', 'Jalan Semangga jaya', 'Taman di dalam hutan rawa', 4, 3, 3, 2),
('8', 'Sentra Jagung', 'Jalan Poros Semangga, Kampung ', 'Rumah makan jagung', 3, 3, 3, 4);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
