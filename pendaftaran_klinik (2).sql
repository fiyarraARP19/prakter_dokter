-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2024 at 07:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `Dokter`
--

CREATE TABLE `Dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `id_poli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dokter`
--

INSERT INTO `Dokter` (`id`, `nama_dokter`, `alamat`, `id_poli`) VALUES
(1, 'Michael', 'sdsds', 1),
(2, 'jaja', '', 1),
(3, 'jannah', 'ss', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari_jam` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_dokter`, `hari_jam`) VALUES
(1, 1, 'jumat, 16.00 s/d 18.00'),
(2, 2, 'sabtu, 15.00 - 17.00'),
(3, 2, 'senin, 09.00 - 12.00'),
(4, 3, 'rabu, 12.00 - 15.00'),
(6, 1, 'rabu, 12.00 s/d 14.00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` int(3) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `updateLogin` date DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `email`, `username`, `password`, `status`, `nama`, `updateLogin`, `id_pasien`) VALUES
(1, '', 'admin', 'admin', '1', 'ADMIN', '2024-06-21', 0),
(2, '', 'pasien', 'pasien', '2', 'john', '2024-06-12', 1),
(3, '', 'boss', 'boss', '3', 'boss', '2024-06-18', 0),
(4, '', 'jaja', 'jaja', '2', 'jaja', '2024-06-18', 5),
(5, '', 'yaya', 'yaya', '1', 'yaya', NULL, 0),
(6, 'ss@gmail.com', 'aja', 'aja', '2', 'jajaaa', '2024-06-18', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `tempat_lahir_pasien` varchar(100) DEFAULT NULL,
  `tanggal_lahir_pasien` date DEFAULT NULL,
  `alamat_pasien` text DEFAULT NULL,
  `jk_pasien` varchar(10) DEFAULT NULL,
  `status_perkawinan_pasien` varchar(10) DEFAULT NULL,
  `pekerjaan_pasien` varchar(50) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_time` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nik`, `nama_pasien`, `tempat_lahir_pasien`, `tanggal_lahir_pasien`, `alamat_pasien`, `jk_pasien`, `status_perkawinan_pasien`, `pekerjaan_pasien`, `created_time`, `created_by`, `updated_time`, `updated_by`) VALUES
(1, '23232', 'dasdas', 'Palembang', '2024-06-02', 'dadsa', 'Laki-laki', 'Menikah', 'dadas', '2024-06-09 11:06:24', 'admin', '2024-06-18 11:06:53', 'admin'),
(2, '1234', 'john', 'palembang', '2024-06-13', 'sds', 'Laki-laki', 'Menikah', 'sds', '2024-06-12 12:06:46', 'admin', NULL, NULL),
(5, '3212312121212112', 'jaja', 'Palembang', '2024-06-03', 'sdsdd', 'Perempuan', 'Janda', 'sdsd', '2024-06-15 01:06:06', 'jaja', '2024-06-15 02:06:49', 'jaja'),
(6, '2323323233232323', 'jajaaa', 'Palembang', '2024-06-18', 'ssa', 'Perempuan', 'Janda', 'dada', '2024-06-18 08:06:22', 'aja', '2024-06-18 08:06:58', 'aja');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `status` int(2) NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `no_urut`, `tanggal_pendaftaran`, `id_pasien`, `id_poli`, `id_dokter`, `id_jadwal`, `keluhan`, `status`, `created_time`, `created_by`) VALUES
(8, 1, '2024-06-14', 1, 1, 1, 1, 'ssss', 1, '2024-06-12 02:06:18', 'admin'),
(9, 1, '2024-06-12', 5, 2, 3, 4, 'ss', 2, '2024-06-15 02:06:16', 'jaja'),
(10, 1, '2024-06-19', 6, 2, 3, 4, 'sakit pinggang', 1, '2024-06-18 08:06:19', 'aja');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int(11) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(1, 'Poli Anak', 'sdsds'),
(2, 'poli umum', 'poli umum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Dokter`
--
ALTER TABLE `Dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Dokter`
--
ALTER TABLE `Dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
