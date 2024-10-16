-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2024 pada 16.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_tugas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_tugas`
--

CREATE TABLE `list_tugas` (
  `Id_Tugas` int(50) NOT NULL,
  `Judul` char(225) DEFAULT NULL,
  `Deskripsi` varchar(225) DEFAULT NULL,
  `Status` char(20) DEFAULT NULL,
  `Tenggat_Waktu` date DEFAULT NULL,
  `Prioritas` char(20) DEFAULT NULL,
  `Kategori` char(20) DEFAULT NULL,
  `Penugasan` char(20) DEFAULT NULL,
  `Tanggal_Pengerjaan` date DEFAULT NULL,
  `Catatan` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `list_tugas`
--

INSERT INTO `list_tugas` (`Id_Tugas`, `Judul`, `Deskripsi`, `Status`, `Tenggat_Waktu`, `Prioritas`, `Kategori`, `Penugasan`, `Tanggal_Pengerjaan`, `Catatan`) VALUES
(1, 'Pemweb', 'Tugas 1', 'Selesai', '2024-03-27', 'Tinggi', 'Sekolah', 'Individu', '2024-03-25', 'Segera dikerjakan'),
(2, 'RPL', 'Tugas Use Case diagram', 'Sedang Dikerjakan', '2024-03-29', 'Sedang', 'Sekolah', 'Individu', '2024-03-27', 'mengerjakan sesuai aplikasi yang akan di buat'),
(3, 'Desain Antarmuka', 'Tugas Prototype', 'Belum Selesai', '2024-03-31', 'Rendah', 'Sekolah', 'Individu', '2024-03-29', 'Membuat prototype di figma');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `list_tugas`
--
ALTER TABLE `list_tugas`
  ADD PRIMARY KEY (`Id_Tugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
