-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 05:32 PM
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
-- Database: `db_apps_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id`, `nama`, `nidn`, `tanggal_masuk`, `jabatan`, `status`) VALUES
(1, 'Robbert', '2016010407', '2016-01-04', 'Dosen tetap', 'Aktif'),
(7, 'Alexander', '6046020403', '2025-06-24', 'Dosen Tetap', 'Aktif'),
(8, 'Emily', '8236120409', '2025-06-25', 'Dosen Tetap', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nidn` varchar(50) DEFAULT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `nominal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `nama`, `nidn`, `jabatan`, `tanggal_gaji`, `nominal`) VALUES
(3, 'Robbert', '2016010407', 'Dosen tetap', '2025-06-24', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `status` enum('Aktif','Non Aktif','Lulus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nama`, `nim`, `angkatan`, `jurusan`, `semester`, `status`) VALUES
(2, 'Jhon Doe', '44676352', 2021, 'Manajemen Informatika', '5', 'Lulus'),
(3, 'Alice', '2322678', 2025, 'Teknik Informatika', '4', 'Non Aktif'),
(5, 'Steve Jobs', '23226524', 2022, 'Sistem Informasi', '4', 'Aktif'),
(6, 'Robbert', '89234577', 2024, 'Teknik Informatika', '3', 'Aktif'),
(10, 'Antonio', '77244521', 2025, 'Rekayasa Perangkat Lunak', '1', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mk`
--

CREATE TABLE `tb_mk` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mk`
--

INSERT INTO `tb_mk` (`id`, `kode_mk`, `mata_kuliah`, `sks`) VALUES
(2, '12237', 'Kalkulus', 2),
(5, '23548', 'Pemrograman Java 2', 3),
(6, '23548', 'Grafika Komputer', 3),
(7, '12323', 'Rekayasa Perangkat Lunak', 4),
(8, '6753', 'Database Management System', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `nama_pembayaran` varchar(100) DEFAULT NULL,
  `pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id`, `nim`, `nama`, `angkatan`, `jurusan`, `semester`, `tgl_bayar`, `nama_pembayaran`, `pembayaran`) VALUES
(19, '44676352', 'Jhon Doe', '2022', 'Manajemen Informatika', '1', '2025-06-22', 'Registrasi', '200000'),
(20, '44676352', 'Jhon Doe', '2022', 'Manajemen Informatika', '1', '2025-06-23', 'UKT', '2400000'),
(21, '23226524', 'Steve Jobs', '2021', 'Sistem Informasi', '1', '2025-06-23', 'Registrasi', '200000'),
(23, '23226524', 'Steve Jobs', '2021', 'Sistem Informasi', '1', '2025-06-23', 'UKT', '2400000'),
(24, '23226524', 'Steve Jobs', '2021', 'Sistem Informasi', '1', '2025-06-24', 'UKT', '2400000'),
(25, '23226524', 'Steve Jobs', '2021', 'Sistem Informasi', '2', '2025-06-25', 'Registrasi', '200000'),
(32, '44676352', 'Jhon Doe', '2021', 'Manajemen Informatika', '1', '2025-06-27', 'UKT', '2400000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Monica', 'super', '123', 'superadmin'),
(3, 'Admin', 'Admin', 'admin123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `nidn_2` (`nidn`),
  ADD KEY `nidn_3` (`nidn`),
  ADD KEY `idx_nidn` (`nidn`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gaji_dosen` (`nidn`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`),
  ADD KEY `nim_2` (`nim`),
  ADD KEY `nim_3` (`nim`);

--
-- Indexes for table `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kode_mk` (`kode_mk`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_mahasiswa` (`nim`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_mk`
--
ALTER TABLE `tb_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `fk_gaji_dosen` FOREIGN KEY (`nidn`) REFERENCES `tb_dosen` (`nidn`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `fk_pembayaran_mahasiswa` FOREIGN KEY (`nim`) REFERENCES `tb_mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
