-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2024 at 05:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE asah_otak;

USE asah_otak;


--
-- Database: `asah_otak`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_kata`
--



CREATE TABLE `master_kata` (
  `id` int(11) NOT NULL,
  `kata` varchar(255) NOT NULL,
  `clue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_kata`
--

INSERT INTO `master_kata` (`id`, `kata`, `clue`) VALUES
(1, 'LEMARI', 'Aku tempat menyimpan pakaian?'),
(2, 'TELEVISI', 'Aku alat untuk menonton acara?'),
(3, 'KURSI', 'Aku tempat untuk duduk?'),
(4, 'KASUR', 'Aku tempat untuk tidur?'),
(5, 'PIRING', 'Aku alat untuk makan?'),
(6, 'PALU', 'Aku alat untuk memalu?');

-- --------------------------------------------------------

--
-- Table structure for table `point_game`
--

CREATE TABLE `point_game` (
  `id_point` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `total_point` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `point_game`
--

INSERT INTO `point_game` (`id_point`, `nama_user`, `total_point`, `tanggal`, `waktu_selesai`) VALUES
(1, 'Anonymous', 60, '2024-05-30', '15:14:17'),
(2, 'Anonymous', -12, '2024-05-30', '15:24:02'),
(3, 'USER', 50, '2024-05-30', '15:24:50'),
(4, 'RAHMAN', -12, '2024-05-30', '15:32:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kata`
--
ALTER TABLE `master_kata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point_game`
--
ALTER TABLE `point_game`
  ADD PRIMARY KEY (`id_point`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kata`
--
ALTER TABLE `master_kata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `point_game`
--
ALTER TABLE `point_game`
  MODIFY `id_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
