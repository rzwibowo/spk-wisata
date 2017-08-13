-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Agu 2017 pada 06.31
-- Versi Server: 10.1.24-MariaDB
-- PHP Version: 7.1.6

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
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(11) NOT NULL,
  `periode` varchar(30) DEFAULT NULL,
  `prioritas_global` decimal(10,2) DEFAULT NULL,
  `alternatif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `periode`, `prioritas_global`, `alternatif`) VALUES
('A0001', '13 August 2017 ', '0.30', 'Sentra jagungqqq'),
('A0002', '13 August 2017 ', '0.21', 'efeddd'),
('A0003', '13 August 2017 ', '0.19', 'Tugu Libra'),
('A0004', '13 August 2017 ', '0.09', 'Patung hati Kudus Ye'),
('A0005', '13 August 2017 ', '0.09', 'TN Wasur'),
('A0006', '13 August 2017 ', '0.08', 'Danau Rawa Biru'),
('A0007', '13 August 2017 ', '0.05', 'Tugu Perbatasan Saba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kriteria`
--

CREATE TABLE `detail_kriteria` (
  `id_detail_kriteria` int(11) NOT NULL,
  `id_kriteria` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kriteria`
--

INSERT INTO `detail_kriteria` (`id_detail_kriteria`, `id_kriteria`, `nama`, `nilai`) VALUES
(17, 'K0001', 'Mobil', 1),
(18, 'K0001', 'motor', 2),
(19, 'K0002', 'Klinik', 5),
(20, 'K0002', 'Pom Bengsin', 4),
(21, 'K0002', 'Jalan Raya', 3),
(24, 'K0003', 'banyak', 5),
(25, 'K0003', 'Sedikit', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kriteria_wisata`
--

CREATE TABLE `detail_kriteria_wisata` (
  `id_detail_kriteria_wisata` int(11) NOT NULL,
  `id_wisata` varchar(11) NOT NULL,
  `id_kriteria` varchar(11) NOT NULL,
  `id_detailkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kriteria_id` varchar(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `prioritas_kriteria` decimal(10,2) NOT NULL,
  `multiselect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kriteria_id`, `nama_kriteria`, `prioritas_kriteria`, `multiselect`) VALUES
('K0001', 'Kendaraan', '0.61', 1),
('K0002', 'Insprastruktur', '0.27', 1),
('K0003', 'Kriteria 3', '0.12', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkriteria`
--

CREATE TABLE `subkriteria` (
  `subkriteria_id` varchar(11) NOT NULL,
  `kriteria_id` varchar(11) NOT NULL,
  `id_alternatif` varchar(11) NOT NULL,
  `prioritas_subkriteria` decimal(10,2) NOT NULL,
  `perkalian` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `subkriteria`
--

INSERT INTO `subkriteria` (`subkriteria_id`, `kriteria_id`, `id_alternatif`, `prioritas_subkriteria`, `perkalian`) VALUES
('S0001', 'K0001', 'A0001', '0.28', '0.17'),
('S0002', 'K0002', 'A0001', '0.33', '0.09'),
('S0003', 'K0003', 'A0001', '0.31', '0.04'),
('S0004', 'K0001', 'A0002', '0.22', '0.13'),
('S0005', 'K0002', 'A0002', '0.21', '0.06'),
('S0006', 'K0003', 'A0002', '0.19', '0.02'),
('S0007', 'K0001', 'A0003', '0.22', '0.13'),
('S0008', 'K0002', 'A0003', '0.13', '0.04'),
('S0009', 'K0003', 'A0003', '0.16', '0.02'),
('S0010', 'K0001', 'A0004', '0.08', '0.05'),
('S0011', 'K0002', 'A0004', '0.09', '0.02'),
('S0012', 'K0003', 'A0004', '0.11', '0.01'),
('S0013', 'K0001', 'A0005', '0.07', '0.04'),
('S0014', 'K0002', 'A0005', '0.12', '0.03'),
('S0015', 'K0003', 'A0005', '0.10', '0.01'),
('S0016', 'K0001', 'A0006', '0.08', '0.05'),
('S0017', 'K0002', 'A0006', '0.07', '0.02'),
('S0018', 'K0003', 'A0006', '0.08', '0.01'),
('S0019', 'K0001', 'A0007', '0.05', '0.03'),
('S0020', 'K0002', 'A0007', '0.04', '0.01'),
('S0021', 'K0003', 'A0007', '0.05', '0.01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(2, 'ngadimin', '5449ccea16d1cc73990727cd835e45b5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` varchar(11) NOT NULL,
  `nama_wisata` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama_wisata`, `alamat`, `keterangan`) VALUES
('10', 'Sentra jagungqqq', 'oo', 'oo'),
('3', 'efeddd', 'sdsd', 'sdsd'),
('4', 'Tugu Libra', 'x', 'y'),
('5', 'Patung hati Kudus Ye', 'y', 'x'),
('6', 'TN Wasur', 'x', 'y'),
('7', 'Danau Rawa Biru', 'i', 'j'),
('8', 'Tugu Perbatasan Saba', 'p', 'p');

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
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `detail_kriteria_wisata`
--
ALTER TABLE `detail_kriteria_wisata`
  ADD PRIMARY KEY (`id_detail_kriteria_wisata`),
  ADD KEY `id_wisata` (`id_wisata`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
-- AUTO_INCREMENT for table `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  MODIFY `id_detail_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `detail_kriteria_wisata`
--
ALTER TABLE `detail_kriteria_wisata`
  MODIFY `id_detail_kriteria_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kriteria`
--
ALTER TABLE `detail_kriteria`
  ADD CONSTRAINT `detail_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kriteria_wisata`
--
ALTER TABLE `detail_kriteria_wisata`
  ADD CONSTRAINT `detail_kriteria_wisata_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_kriteria_wisata_ibfk_2` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`kriteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subkriteria_ibfk_4` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
