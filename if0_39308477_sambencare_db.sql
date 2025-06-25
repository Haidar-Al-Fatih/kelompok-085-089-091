-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql213.byetcluster.com
-- Generation Time: Jun 25, 2025 at 04:40 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_39308477_sambencare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('menunggu','diproses','selesai','ditolak') DEFAULT 'menunggu',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `description`, `location`, `photo`, `status`, `created_at`) VALUES
(3, 4, 'Ada tanah yang tidak rata di depan kuburan, jadinya ganggu orang lewat', 'Di depan kuburan', 'assets/img/68565364b733a.png', 'ditolak', '2025-06-21 06:38:28'),
(4, 4, 'Jalanannya banyak yang retak, jadinya pakai motor rada ngeri. Tolong diperbaiki!!!', 'Di depan warung Pak Eko', 'assets/img/685654dd088ce.png', 'diproses', '2025-06-21 06:44:45'),
(5, 4, 'Ada pohon tumbang, jadinya ngalangin jalan, kabel juga ada yang rusak!!!', 'Di jalanan dekat gapura desa.', 'assets/img/6856550bd3006.png', 'selesai', '2025-06-21 06:45:31'),
(6, 4, 'Ada kabel putus, jadinya bahaya banget pak!!!', 'Di depan rumah nomor 09.', 'assets/img/68565533bc2f5.png', 'selesai', '2025-06-21 06:46:11'),
(7, 4, 'Jalanannya banyak yang berlubang nih, jadinya bahaya banget, apalagi kalau hujan, jadi makin bahaya!', 'Di depan aula desa.', 'assets/img/6856555bd6c81.png', 'diproses', '2025-06-21 06:46:51'),
(8, 4, 'Ini lampu di lapangan voli rusak pak, jadinya saya mau ngajak yang lain buat main voli jadinya ga bisa pas malam-malam. Tolong segera diperbaiki ya!!!!!!!!!!!!!!!!!!!!!', 'DI lapangan voli', 'assets/img/6856559b874a4.png', 'selesai', '2025-06-21 06:47:55'),
(10, 6, 'Ada pohon tumbang, nimpa motor', 'Saluran irigasi depan lapangan bola', 'assets/img/685a5196750f7.png', 'diproses', '2025-06-24 07:19:50'),
(11, 7, 'Ini ko banyak manusia moralnya pada rusak ya pak, tolong dong pak ditangani dengan serius pendidikan moral senagai manusia yang benerr, apa jangan jangan bapak moralnya juga kena adududu bercanda pak', 'Maguwo Banguntapan', 'assets/img/685a5308362ee.jpeg', 'menunggu', '2025-06-24 07:26:00'),
(12, 8, 'jalan rusak. tolong diperbaiki', 'jalan dekat masjid', 'assets/img/685a56440d1b4.jpeg', 'menunggu', '2025-06-24 07:39:48'),
(13, 4, 'ada poho tumbang COY', 'Dekat masjid', 'assets/img/685a5f1e02f35.png', 'menunggu', '2025-06-24 08:17:34'),
(17, 9, 'Pohon tumbang di tengah jalan', 'jalan desa', 'assets/img/685ae67d86603.jpeg', 'selesai', '2025-06-24 17:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `no_telp`, `password`, `role`, `created_at`) VALUES
(4, 'Haidar Al Fatih', '085173218006', 'haidar321', 'user', '2025-06-21 06:31:52'),
(5, 'Admin', '0123456789', 'admin123', 'admin', '2025-06-21 06:36:09'),
(6, 'Budiono Siregar', '098522441253', 'BudiUhuy321', 'user', '2025-06-24 06:32:25'),
(7, 'Rangga Mukti Riko WR', '085771747500', 'Rangga@123', 'user', '2025-06-24 07:23:47'),
(8, 'Faris', '085123456789', 'okegas', 'user', '2025-06-24 07:30:10'),
(9, 'Rifki Alfaris', '081329372116', 'haidar12345', 'user', '2025-06-24 17:35:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
