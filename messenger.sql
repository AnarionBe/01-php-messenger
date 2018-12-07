-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 06, 2018 at 10:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversationParticipation`
--

CREATE TABLE `conversationParticipation` (
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `conversationParticipation`
--

INSERT INTO `conversationParticipation` (`subject`, `user`, `lastLogin`) VALUES
('test', 'Anarion', '2018-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`subject`, `author`) VALUES
('test', 'Anarion');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `conversation` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `author`, `conversation`, `message`, `hour`) VALUES
(1, 'Anarion', 'test', 'coucou', '2018-12-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `pseudo`, `password_hash`, `firstname`, `lastname`) VALUES
('marcodb.debona@gmail.com', 'Anarion', '$2y$12$fCzk8t4MkAHJeAkfxmDUp.73zY.RVZaQQIpyl8bEzaKnUtmLroob6', 'Marco', 'De Bona');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversationParticipation`
--
ALTER TABLE `conversationParticipation`
  ADD PRIMARY KEY (`subject`,`user`),
  ADD KEY `fk_user` (`user`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`subject`),
  ADD KEY `fk_conv_author` (`author`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conv` (`conversation`),
  ADD KEY `fk_author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversationParticipation`
--
ALTER TABLE `conversationParticipation`
  ADD CONSTRAINT `fk_conversation` FOREIGN KEY (`subject`) REFERENCES `conversations` (`subject`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `users` (`pseudo`);

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `fk_conv_author` FOREIGN KEY (`author`) REFERENCES `users` (`pseudo`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author`) REFERENCES `users` (`pseudo`),
  ADD CONSTRAINT `fk_conv` FOREIGN KEY (`conversation`) REFERENCES `conversations` (`subject`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
