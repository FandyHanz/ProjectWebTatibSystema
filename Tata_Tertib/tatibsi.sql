-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tatibsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_diri_mahasiswa`
--

CREATE TABLE `data_diri_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nim` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nama_ayah` varchar(500) NOT NULL,
  `nama_ibu` varchar(500) NOT NULL,
  `no_telp_ayah` varchar(500) NOT NULL,
  `no_telp_ibu` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `no_telp_mahasiswa` varchar(500) NOT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_diri_tendik`
--

CREATE TABLE `data_diri_tendik` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nip` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `no_telp` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` varchar(50) NOT NULL,
  `nip_dpa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_diri_mahasiswa`
--
ALTER TABLE `data_diri_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `kelas_2` (`kelas`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `data_diri_tendik`
--
ALTER TABLE `data_diri_tendik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_diri_mahasiswa`
--
ALTER TABLE `data_diri_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_diri_tendik`
--
ALTER TABLE `data_diri_tendik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_diri_mahasiswa`
--
ALTER TABLE `data_diri_mahasiswa`
  ADD CONSTRAINT `data_diri_mahasiswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `data_diri_mahasiswa_ibfk_2` FOREIGN KEY (`level`) REFERENCES `level` (`id`);

--
-- Constraints for table `data_diri_tendik`
--
ALTER TABLE `data_diri_tendik`
  ADD CONSTRAINT `data_diri_tendik_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
