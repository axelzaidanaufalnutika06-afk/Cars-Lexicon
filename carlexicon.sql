-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql305.byetcluster.com
-- Waktu pembuatan: 10 Jan 2026 pada 05.05
-- Versi server: 11.4.9-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40846311_carlexicon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(31, 'coba', 'coba', '20260110095824.jpg', '2026-01-10 09:58:24', 'admin'),
(32, 'cobaa', 'cobaa', '20260110095843.jpg', '2026-01-10 09:58:43', 'admin'),
(33, 'cobaaa', 'cobaaa', '20260110095853.jpg', '2026-01-10 09:58:53', 'admin'),
(34, 'cobaaaa', 'cobaaaa', '20260110095904.jpg', '2026-01-10 09:59:04', 'admin'),
(35, 'cobaaaaa', 'cobaaaaa', '20260110095918.jpg', '2026-01-10 09:59:18', 'admin'),
(36, 'cobaaaaaa', 'cobaaaaaa', '20260110095931.jpg', '2026-01-10 09:59:31', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`, `tanggal`, `username`) VALUES
(7, '20260110100101.jpg', '2026-01-10 10:01:01', 'admin'),
(8, '20260110100106.jpg', '2026-01-10 10:01:06', 'admin'),
(9, '20260110100113.jpg', '2026-01-10 10:01:13', 'admin'),
(10, '20260110100120.jpg', '2026-01-10 10:01:20', 'admin'),
(11, '20260110100128.jpg', '2026-01-10 10:01:28', 'admin'),
(12, '20260110100134.jpg', '2026-01-10 10:01:34', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', ''),
(15, 'axel', 'ee5ac388e99f25a5520db01e44c92b29', '20260110100353.jpg'),
(16, 'axelzn', 'e10adc3949ba59abbe56e057f20f883e', '20260110100407.jpg'),
(17, 'danny', '21232f297a57a5a743894a0e4a801fc3', '20260110100421.jpg'),
(18, 'axell', 'd260956ad520dc3cee8f91c58f669cd6', '20260110100437.jpg'),
(19, 'axelznn', 'db9c39e2be6b38850e1f7a7d1dd359fa', '20260110100453.jpg'),
(20, 'axelll', 'c349a9a698c9aa387df0da1154a323c1', '20260110100504.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
