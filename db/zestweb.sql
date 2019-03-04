-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2019 at 05:19 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zestweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

--
-- Dumping data for table `announcement`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(255) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `contents` longtext NOT NULL,
  `created` datetime NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `isDelete` varchar(255) DEFAULT NULL,
  `isClosed` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `isComponent` varchar(255) DEFAULT NULL,
  `componentFile` varchar(255) DEFAULT NULL,
  `componentVersion` varchar(255) DEFAULT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `community`
--
-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(255) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `scontent` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `isDelete` varchar(255) DEFAULT NULL,
  `slug` varchar(7) NOT NULL,
  `token` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `name`, `value`) VALUES
(1, 'status', 'online'),
(2, 'name', ''),
(3, 'email', ''),
(4, 'description', ''),
(5, 'keywords', ''),
(6, 'gmeta', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salts` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `ip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `ban` varchar(255) DEFAULT 'NULL',
  `status` varchar(255) NOT NULL DEFAULT 'running',
  `close` varchar(255) DEFAULT 'NULL',
  `created` int(255) NOT NULL,
  `lastOnline` int(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `pImg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
