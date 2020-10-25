-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `blurb` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `bahasa_id` int(11) DEFAULT NULL,
  `gambar_nama` varchar(255) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `nama`, `genre_id`, `blurb`, `stok`, `penulis`, `rating`, `bahasa_id`, `gambar_nama`, `harga_beli`, `harga_jual`, `diskon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'The Life-Changing Magic of Tidying Up: The Japanese Art of Decluttering and Organizing', 2, 'Despite constant efforts to declutter your home, do papers still accumulate like snowdrifts and clothes pile up like a tangled mess of noodles?', 20, 'Marie Kondo', 2, 1, '1.jpg', 44000, 53998, 0, 1, '2020-10-24 18:16:38', '2020-10-24 18:16:38', NULL),
(2, 'The Life-Changing Magic of Tidying Up: The Japanese Art of Decluttering and Organizing 4', 1, 'coba update', 20, NULL, 2, NULL, '2.jpg', 44000, 53998, 5, 1, '2020-10-24 18:40:01', '2020-10-24 18:46:50', NULL),
(3, 'The Life-Changing Magic of Tidying Up: The Japanese Art of Decluttering and Organizing 4', 1, NULL, 20, NULL, 2, NULL, NULL, 44000, 53998, 5, 0, '2020-10-24 18:43:17', '2020-10-24 18:47:28', NULL),
(4, 'The Life-Changing Magic of Tidying Up: The Japanese Art of Decluttering and Organizing 4', 1, NULL, 20, NULL, 2, NULL, NULL, 44000, 53998, 5, 0, '2020-10-24 18:46:02', '2020-10-24 18:47:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `nama`, `status`) VALUES
(1, 'Fantasy2', 0),
(2, 'Non-fiction', 1),
(3, 'Fiction', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `password_user` varchar(150) NOT NULL,
  `alamat_user` varchar(150) DEFAULT NULL,
  `telepon_user` varchar(13) DEFAULT NULL,
  `poin` int(11) DEFAULT NULL,
  `role_user` varchar(1) NOT NULL COMMENT '0=Admin\r\n1=User',
  `status_member` varchar(1) NOT NULL COMMENT '0=NonMember\r\n1=Member',
  `status_user` varchar(1) NOT NULL COMMENT '0=TidakAktif\r\n1=Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email_user`, `password_user`, `alamat_user`, `telepon_user`, `poin`, `role_user`, `status_member`, `status_user`) VALUES
(1, 'stefanie', 'stefanieangelina.sa@gmail.com', '$2y$10$2r93dqyg6oe0b4gZmT.QPetRYbnnPjRtabvl3fVoGL5eFBsQjek6i', 'Kapasari 51', '089529134567', NULL, '0', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
