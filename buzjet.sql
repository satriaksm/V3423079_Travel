-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Okt 2024 pada 11.27
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buzjet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `id` int NOT NULL,
  `nama_destinasi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`id`, `nama_destinasi`, `deskripsi`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Bukit Monkrang', 'Bukit yang terletak dekat dengan gunung Lawu yang beralamatkan lorem ipsum', 'GYQrXAjXcAEZ5Ou.jpg', '2024-10-08 05:51:59', '2024-10-08 05:51:59'),
(2, 'Gunung Slamet', 'salah satu dari 3S jawa tengah', '2.jpg', '2024-10-08 06:14:05', '2024-10-08 06:14:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id` int NOT NULL,
  `nama_hotel` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id`, `nama_hotel`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Hotel Dika', 'Ngangkruk rt04/01', '2024-10-08 06:03:29', '2024-10-08 06:03:29'),
(2, 'Hotel Kelaz', 'lorem ipsum', '2024-10-08 06:14:23', '2024-10-08 06:14:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `deskripsi` text,
  `harga` int NOT NULL,
  `id_hotel` int DEFAULT NULL,
  `id_transport` int DEFAULT NULL,
  `id_destination` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama_paket`, `deskripsi`, `harga`, `id_hotel`, `id_transport`, `id_destination`, `created_at`, `updated_at`) VALUES
(1, 'Trip Monkrang', '123', 100000123, 1, 1, 1, '2024-10-08 06:41:10', '2024-10-08 06:41:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transport`
--

CREATE TABLE `transport` (
  `id` int NOT NULL,
  `nama_transport` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transport`
--

INSERT INTO `transport` (`id`, `nama_transport`, `created_at`, `updated_at`) VALUES
(1, 'Bus', '2024-10-08 06:03:35', '2024-10-08 06:03:35'),
(3, 'Elf', '2024-10-08 06:14:39', '2024-10-08 06:14:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'dikagans', '$2y$10$6A6nA9s0TNaT3xguIpq1VeF.QgRFMZS8DdEYucFcY6o6xGFi/UvyO', 'satriaksm.20@gmail.com', 'male', '2024-10-08 04:25:25', '2024-10-08 04:25:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`id_hotel`),
  ADD KEY `transport_id` (`id_transport`),
  ADD KEY `destination_id` (`id_destination`);

--
-- Indeks untuk tabel `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `hotel` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `paket_ibfk_3` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
