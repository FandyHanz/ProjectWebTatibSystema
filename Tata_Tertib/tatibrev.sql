-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 05:30 AM
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
-- Database: `tatibrev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `no_telp` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `no_telp` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_matakulisah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dpa`
--

CREATE TABLE `dpa` (
  `id_dpa` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `no_telp` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `id_matakuliah` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `id_admin` varchar(50) NOT NULL,
  `id_prodi` varchar(50) NOT NULL,
  `id_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_prodi` varchar(50) NOT NULL,
  `id_matakuliah` varchar(50) NOT NULL,
  `id_dpa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(500) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `id_dpa` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `status` varchar(500) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `no_telp` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nama_ayah` varchar(500) NOT NULL,
  `no_telp_ayah` varchar(500) NOT NULL,
  `nama_ibu` varchar(500) NOT NULL,
  `no_telp_ibu` varchar(500) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `id_dosen` varchar(50) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_mahasiswa`
--

CREATE TABLE `pelanggaran_mahasiswa` (
  `id_pelanggaran` varchar(5) NOT NULL,
  `nama_pelanggaran` varchar(500) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `kategori` varchar(500) NOT NULL,
  `status_pelanggaran` varchar(500) NOT NULL,
  `lampiran` blob NOT NULL,
  `nim` varchar(500) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `id_dpa` varchar(50) NOT NULL,
  `id_admin` varchar(50) NOT NULL,
  `id_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_tendik`
--

CREATE TABLE `pelanggaran_tendik` (
  `id` varchar(5) NOT NULL,
  `nama_pelanggaran` varchar(500) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `lampiran` blob NOT NULL,
  `nip` varchar(500) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_prodi` varchar(50) NOT NULL,
  `id_admin` varchar(50) NOT NULL,
  `id_mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(50) NOT NULL,
  `id_jurusan` varchar(50) NOT NULL,
  `id_admin` varchar(50) NOT NULL,
  `id_dosen` varchar(50) NOT NULL,
  `nama` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_jurusan` (`id_jurusan`,`id_matakulisah`),
  ADD KEY `role` (`role`),
  ADD KEY `id_matakulisah` (`id_matakulisah`);

--
-- Indexes for table `dpa`
--
ALTER TABLE `dpa`
  ADD PRIMARY KEY (`id_dpa`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_admin` (`id_admin`,`id_prodi`,`id_dosen`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`,`id_prodi`),
  ADD KEY `id_matakuliah` (`id_matakuliah`),
  ADD KEY `id_dpa` (`id_dpa`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `jurusan` (`jurusan`,`prodi`,`kelas`,`id_dpa`),
  ADD KEY `role` (`role`),
  ADD KEY `id_dpa` (`id_dpa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_jurusan` (`id_jurusan`,`id_prodi`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `pelanggaran_mahasiswa`
--
ALTER TABLE `pelanggaran_mahasiswa`
  ADD PRIMARY KEY (`id_pelanggaran`),
  ADD KEY `id_jurusan` (`id_jurusan`,`id_kelas`,`id_dpa`,`id_admin`,`id_prodi`),
  ADD KEY `id_dpa` (`id_dpa`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pelanggaran_tendik`
--
ALTER TABLE `pelanggaran_tendik`
  ADD KEY `id_jurusan` (`id_jurusan`,`id_prodi`,`id_admin`,`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_admin` (`id_admin`,`id_dosen`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `dosen_ibfk_3` FOREIGN KEY (`id_matakulisah`) REFERENCES `matakuliah` (`id_matakuliah`);

--
-- Constraints for table `dpa`
--
ALTER TABLE `dpa`
  ADD CONSTRAINT `dpa_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `dpa_ibfk_2` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `dpa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`nip`),
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `jurusan_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `kelas_ibfk_3` FOREIGN KEY (`id_matakuliah`) REFERENCES `matakuliah` (`id_matakuliah`),
  ADD CONSTRAINT `kelas_ibfk_4` FOREIGN KEY (`id_dpa`) REFERENCES `dpa` (`id_dpa`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_dpa`) REFERENCES `dpa` (`id_dpa`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD CONSTRAINT `matakuliah_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `matakuliah_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `matakuliah_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `pelanggaran_mahasiswa`
--
ALTER TABLE `pelanggaran_mahasiswa`
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_3` FOREIGN KEY (`id_dpa`) REFERENCES `dpa` (`id_dpa`),
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`nip`),
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_5` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_6` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pelanggaran_tendik`
--
ALTER TABLE `pelanggaran_tendik`
  ADD CONSTRAINT `pelanggaran_tendik_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `pelanggaran_tendik_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pelanggaran_tendik_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`nip`),
  ADD CONSTRAINT `pelanggaran_tendik_ibfk_4` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`nip`),
  ADD CONSTRAINT `prodi_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `prodi_ibfk_4` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
