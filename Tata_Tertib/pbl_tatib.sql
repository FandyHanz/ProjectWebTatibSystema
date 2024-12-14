-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 09:48 AM
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
-- Database: `pbl_tatib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama`, `password`, `status`, `role`) VALUES
('123', 'admin123', 'admin123', 'Admin JTI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `foto_profile` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `password`, `nama`, `status`, `no_telp`, `email`, `role`, `id_kelas`, `foto_profile`) VALUES
('010600101', 'OKD', 'Test', 'aktif', '8192393', 'halo@mail.com', 2, 2, ''),
('010900101', 'OKD', 'Test', 'aktif', '8192393', 'halo@mail.com', 2, 3, ''),
('0909090', '09090909090', '1', '1', '1', '1', 3, NULL, 0x53637265656e73686f7420283135292e706e67),
('111111111', 'password', 'Rizqis', 'aktif', '08977627800', 'dosen@Mail.com', 2, 2, 0x53637265656e73686f74202831292e706e67),
('111111112', 'password', 'Rizqis', 'aktif', '08977627800', 'dosen@Mail.com', 2, 2, 0x53637265656e73686f74202831292e706e67),
('11111119', 'password', 'Rizqis', 'aktif', '08977627800', 'dosen@Mail.com', 2, 2, 0x53637265656e73686f74202831292e706e67),
('12345', 'rizqi2005', 'Rizqi', 'aktif', '08993945716', 'rfrizqifauzan@gmail.com', 3, NULL, 0x53637265656e73686f74202836292e706e67),
('12345601', 'password123', 'Dr. Andi Kusuma', 'Aktif', '08123456789', 'andi.kusuma@example.com', 2, 1, ''),
('12345602', 'password123', 'Prof. Rina Setiawan', 'Aktif', '08123456788', 'rina.setiawan@example.com', 2, 2, ''),
('12345603', 'password123', 'Ir. Siti Nurhaliza', 'Aktif', '08123456787', 'siti.nurhaliza@example.com', 2, 3, ''),
('12345604', 'password123', 'Dr. Agus Santoso', 'Aktif', '08123456786', 'agus.santoso@example.com', 2, 4, ''),
('12345605', 'password123', 'Prof. Bambang Wicaksono', 'Nonaktif', '08123456785', 'bambang.wicaksono@example.com', 3, NULL, ''),
('12345606', 'password123', 'Dr. Lina Wijaya', 'Aktif', '08123456784', 'lina.wijaya@example.com', 3, NULL, ''),
('12345607', 'password123', 'Prof. Herman Syahputra', 'Nonaktif', '08123456783', 'herman.syahputra@example.com', 3, NULL, ''),
('12345608', 'password123', 'Dr. Farah Oktavia', 'Aktif', '08123456782', 'farah.oktavia@example.com', 3, NULL, ''),
('12345609', 'password123', 'Prof. Rudi Hartono', 'Nonaktif', '08123456781', 'rudi.hartono@example.com', 3, NULL, ''),
('810292', 'Perno', 'heiii', 'Aktif', '812', 'ej@idjasd', 2, 1, 0x53637265656e73686f74202833292e706e67),
('Rizqi', '67890', '08993945716', '5656', 'rfrizqifauzan@gmail.com', 'Aktif', 2, 2, 0x53637265656e73686f74202834292e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `foto_profile` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `password`, `nama`, `status`, `no_telp`, `email`, `role`, `foto_profile`) VALUES
('98765401', 'password123', 'Aliyah Putri', 'Aktif', '08123456790', 'aliyah.putri@example.com', 3, ''),
('98765402', 'password123', 'Bagus Ramadhan', 'Aktif', '08123456791', 'bagus.ramadhan@example.com', 3, ''),
('98765403', 'password123', 'Citra Dewi', 'Nonaktif', '08123456792', 'citra.dewi@example.com', 3, ''),
('98765404', 'password123', 'Dhani Fadillah', 'Aktif', '08123456793', 'dhani.fadillah@example.com', 3, ''),
('98765405', 'password123', 'Erwin Saputra', 'Nonaktif', '08123456794', 'erwin.saputra@example.com', 3, ''),
('98765406', 'password123', 'Fajar Ananda', 'Aktif', '08123456795', 'fajar.ananda@example.com', 3, ''),
('98765407', 'password123', 'Gita Permata', 'Aktif', '08123456796', 'gita.permata@example.com', 3, ''),
('98765408', 'password123', 'Hendra Kurniawan', 'Nonaktif', '08123456797', 'hendra.kurniawan@example.com', 3, ''),
('98765409', 'password123', 'Intan Sari', 'Aktif', '08123456798', 'intan.sari@example.com', 3, ''),
('98765410', 'password123', 'Joko Waluyo', 'Nonaktif', '08123456799', 'joko.waluyo@example.com', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `id_prodi`) VALUES
(1, 'TI-1A', 1),
(2, 'TI-1B', 1),
(3, 'SIB-1A', 2),
(4, 'SIB-1B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_kelas` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `no_telp_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp_ibu` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `foto_profile` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `password`, `id_kelas`, `status`, `nama`, `no_telp`, `email`, `alamat`, `nama_ayah`, `no_telp_ayah`, `nama_ibu`, `no_telp_ibu`, `role`, `foto_profile`) VALUES
('12345606', 'password6', 2, 'aktif', 'Mahasiswa Enam', '081234567896', 'mhs6@example.com', 'Alamat 6', 'Ayah Enam', '081234567901', 'Ibu Enam', '081234567902', 4, ''),
('12345607', 'password7', 3, 'aktif', 'Mahasiswa Tujuh', '081234567897', 'mhs7@example.com', 'Alamat 7', 'Ayah Tujuh', '081234567903', 'Ibu Tujuh', '081234567904', 4, ''),
('12345608', 'password8', 4, 'aktif', 'Mahasiswa Delapan', '081234567898', 'mhs8@example.com', 'Alamat 8', 'Ayah Delapan', '081234567905', 'Ibu Delapan', '081234567906', 4, ''),
('4545454545', '54545454', 2, '0', 'Fandy Wahyu Hanzura', '08993945716', 'molkasalkei26@gmail.com', 'ijn', 'aaru', '345678', 'masa', '87654', 4, ''),
('78878787', '56567', 1, '0', 'yandex', '08993945716', 'fhuzkan24@gmail.com', 'kulim komplek pelangi indah', 'arono', '0987654322', 'idono', '0987654321', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL,
  `nama_pelanggaran` varchar(50) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `kategori`) VALUES
(3, 'Merokok', 1),
(4, 'Bertengkar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_dosen`
--

CREATE TABLE `pelanggaran_dosen` (
  `id_pelanggaran_dosen` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_selesai` mediumblob NOT NULL,
  `sanksi` varchar(50) NOT NULL,
  `lampiran` mediumblob NOT NULL,
  `tanggal_lapor` date NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_mahasiswa`
--

CREATE TABLE `pelanggaran_mahasiswa` (
  `id_pelanggaran_mhs` int(11) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `lampiran` mediumblob NOT NULL,
  `status_pelanggaran` varchar(50) NOT NULL,
  `bukti_selesai` mediumblob NOT NULL,
  `tanggal_lapor` date DEFAULT NULL,
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggaran_mahasiswa`
--

INSERT INTO `pelanggaran_mahasiswa` (`id_pelanggaran_mhs`, `id_pelanggaran`, `deskripsi`, `lampiran`, `status_pelanggaran`, `bukti_selesai`, `tanggal_lapor`, `nim`) VALUES
(2, 3, 'amdasdm', '', '1', 0x61646173, NULL, '12345608'),
(8, 3, 'Deskripsi pelanggaran 6', '', '4', 0x42756b74692036, NULL, '12345606'),
(9, 3, 'Deskripsi pelanggaran 7', '', '3', 0x42756b74692037, NULL, '12345607'),
(10, 3, 'Deskripsi pelanggaran 8', '', '3', 0x42756b74692038, NULL, '12345608');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran_tendik`
--

CREATE TABLE `pelanggaran_tendik` (
  `id_pelanggaran_tendik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `bukti_selesai` mediumblob NOT NULL,
  `sanksi` varchar(50) NOT NULL,
  `lampiran` blob NOT NULL,
  `tanggal_lapor` date DEFAULT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama`) VALUES
(1, 'D-IV Teknik Informatika'),
(2, 'D-IV Sistem Informasi Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama`) VALUES
(1, 'admin'),
(2, 'dpa'),
(3, 'tendik'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id` int(11) NOT NULL,
  `id_pelanggaran_mhs` int(11) NOT NULL,
  `sanksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `role` (`role`,`id_kelas`),
  ADD KEY `fk_id_kelas` (`id_kelas`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `role` (`role`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `pelanggaran_dosen`
--
ALTER TABLE `pelanggaran_dosen`
  ADD PRIMARY KEY (`id_pelanggaran_dosen`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `pelanggaran_mahasiswa`
--
ALTER TABLE `pelanggaran_mahasiswa`
  ADD PRIMARY KEY (`id_pelanggaran_mhs`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_pelanggaran` (`id_pelanggaran`);

--
-- Indexes for table `pelanggaran_tendik`
--
ALTER TABLE `pelanggaran_tendik`
  ADD PRIMARY KEY (`id_pelanggaran_tendik`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggaran_mhs` (`id_pelanggaran_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  MODIFY `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggaran_dosen`
--
ALTER TABLE `pelanggaran_dosen`
  MODIFY `id_pelanggaran_dosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggaran_mahasiswa`
--
ALTER TABLE `pelanggaran_mahasiswa`
  MODIFY `id_pelanggaran_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggaran_tendik`
--
ALTER TABLE `pelanggaran_tendik`
  MODIFY `id_pelanggaran_tendik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `pelanggaran_dosen`
--
ALTER TABLE `pelanggaran_dosen`
  ADD CONSTRAINT `pelanggaran_dosen_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`);

--
-- Constraints for table `pelanggaran_mahasiswa`
--
ALTER TABLE `pelanggaran_mahasiswa`
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_2` FOREIGN KEY (`id_pelanggaran`) REFERENCES `pelanggaran` (`id_pelanggaran`),
  ADD CONSTRAINT `pelanggaran_mahasiswa_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `pelanggaran_tendik`
--
ALTER TABLE `pelanggaran_tendik`
  ADD CONSTRAINT `pelanggaran_tendik_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `karyawan` (`nip`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
