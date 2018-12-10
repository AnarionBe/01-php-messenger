-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le :  lun. 10 déc. 2018 à 08:09
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `messenger`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversationParticipation`
--

CREATE TABLE `conversationParticipation` (
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastLogin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `conversationParticipation`
--

INSERT INTO `conversationParticipation` (`subject`, `user`, `lastLogin`) VALUES
('coucou', 'Anarion', '2018-12-06'),
('coucou', 'Laura', '2018-12-07'),
('tdf', 'Anarion', '2018-12-07'),
('tdf', 'Laura', '2018-12-07'),
('tdf', 'Reka', '2018-12-07'),
('test', 'Anarion', '2018-12-05'),
('test', 'Laura', '2018-12-07');

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`subject`, `author`) VALUES
('coucou', 'Anarion'),
('tdf', 'Anarion'),
('test', 'Anarion');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) NOT NULL,
  `author` varchar(255) COLLATE utf8_bin NOT NULL,
  `conversation` varchar(255) COLLATE utf8_bin NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `author`, `conversation`, `message`, `hour`) VALUES
(4, 'Anarion', 'test', 'yrdy', '2018-12-06 11:00:42'),
(5, 'Anarion', 'test', '😔❤️', '2018-12-06 11:34:30'),
(6, 'Anarion', 'test', '❤️', '2018-12-06 11:36:23'),
(7, 'Anarion', 'coucou', 'papouilles', '2018-12-06 13:04:12'),
(8, 'Anarion', 'coucou', 'gfdg', '2018-12-06 13:16:50'),
(9, 'Anarion', 'coucou', 'gfdg', '2018-12-06 13:16:53'),
(10, 'Anarion', 'coucou', 'gdfgdfg', '2018-12-06 13:16:58'),
(11, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:24'),
(12, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:28'),
(13, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:30'),
(14, 'Anarion', 'coucou', 'gfdgqwcfdx', '2018-12-06 14:18:33'),
(15, 'Anarion', 'coucou', 'gfdgcxw', '2018-12-06 14:18:36'),
(16, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:39'),
(17, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:42'),
(18, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:46'),
(19, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:48'),
(20, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:18:51'),
(21, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:01'),
(22, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:05'),
(23, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:09'),
(24, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:14'),
(25, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:16'),
(26, 'Anarion', 'coucou', 'gfd', '2018-12-06 14:19:20'),
(27, 'Anarion', 'coucou', 'fds', '2018-12-06 14:19:55'),
(28, 'Anarion', 'coucou', 'fds', '2018-12-06 14:19:58'),
(29, 'Anarion', 'coucou', '❤️', '2018-12-07 08:33:06'),
(30, 'Anarion', 'coucou', '💋', '2018-12-07 08:33:58'),
(31, 'Anarion', 'coucou', '😂', '2018-12-07 08:34:09'),
(32, 'Anarion', 'coucou', '😘', '2018-12-07 08:34:14'),
(33, 'Anarion', 'coucou', '🙊', '2018-12-07 08:54:54'),
(34, 'Anarion', 'test', 'gfdsgdfg😍bvch', '2018-12-07 10:08:00'),
(35, 'Laura', 'coucou', 'Test', '2018-12-07 15:24:10'),
(36, 'Laura', 'tdf', 'Tu pourrais mettre des vrais titres à tes convers!', '2018-12-07 15:25:48'),
(37, 'Anarion', 'tdf', 'Je boude\r\n', '2018-12-07 15:33:51'),
(38, 'Reka', 'tdf', 'Way bonjou là\r\n', '2018-12-07 15:35:58'),
(39, 'Laura', 'tdf', 'Raconte ce que tu sais !', '2018-12-07 15:36:12'),
(40, 'Anarion', 'tdf', 'YEAH\r\nCA FONCTIONE PTIN', '2018-12-07 15:36:25'),
(41, 'Reka', 'tdf', 'LOL', '2018-12-07 15:36:58'),
(42, 'Reka', 'tdf', 'PUTE', '2018-12-07 15:37:33'),
(43, 'Laura', 'tdf', 'CONNARD\r\n', '2018-12-07 15:37:44'),
(44, 'Anarion', 'tdf', 'love les pilous❤️', '2018-12-07 15:38:00'),
(45, 'Reka', 'tdf', 'Alors', '2018-12-07 15:38:21'),
(46, 'Reka', 'tdf', 'lhistoire cest que', '2018-12-07 15:38:56'),
(47, 'Anarion', 'tdf', '🙈🙈🙈🙈🙈🙈🙈😡😉😃😏😢dqsd', '2018-12-07 15:41:14'),
(48, 'Anarion', 'tdf', '\'&quot;\'', '2018-12-07 15:46:07'),
(49, 'Reka', 'tdf', 'Twoooo coooool des gui&quot;&quot;&quot;&quot;met', '2018-12-07 15:46:27'),
(50, 'Anarion', 'tdf', 'fdgfdg', '2018-12-07 15:46:57');

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `reactions`
--

INSERT INTO `reactions` (`id`, `message`, `user`) VALUES
(2, 28, 'Anarion'),
(5, 7, 'Anarion'),
(6, 13, 'Anarion'),
(7, 4, 'Anarion'),
(8, 5, 'Anarion'),
(9, 6, 'Anarion'),
(10, 34, 'Anarion'),
(11, 49, 'Laura'),
(12, 44, 'Laura'),
(13, 14, 'Anarion'),
(14, 15, 'Anarion');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`email`, `pseudo`, `password_hash`, `firstname`, `lastname`) VALUES
('dominiquebosman02@gmail.com', 'Reka', '$2y$12$Uc9JYQFU0iT.QCrfDTtSSOus4elQPZP07Yey8lqPrtgoy.FHRHPgC', 'Dominique', 'Bosman'),
('l.delduca@hotmail.com', 'Laura', '$2y$12$KCoY2oDuGQgDPVoH99IUUe7UlA23xCkffV65IFdtqjZdKWxZGj3jy', 'Laura', 'Del'),
('marcodb.debona@gmail.com', 'Anarion', '$2y$12$fCzk8t4MkAHJeAkfxmDUp.73zY.RVZaQQIpyl8bEzaKnUtmLroob6', 'Marco', 'De Bona');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversationParticipation`
--
ALTER TABLE `conversationParticipation`
  ADD PRIMARY KEY (`subject`,`user`),
  ADD KEY `fk_user` (`user`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`subject`),
  ADD KEY `fk_conv_author` (`author`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_author` (`author`),
  ADD KEY `fk_conv` (`conversation`);

--
-- Index pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message` (`message`),
  ADD KEY `fk_user_emote` (`user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `conversationParticipation`
--
ALTER TABLE `conversationParticipation`
  ADD CONSTRAINT `fk_conversation` FOREIGN KEY (`subject`) REFERENCES `conversations` (`subject`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user`) REFERENCES `users` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `fk_conv_author` FOREIGN KEY (`author`) REFERENCES `users` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author`) REFERENCES `users` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_conv` FOREIGN KEY (`conversation`) REFERENCES `conversations` (`subject`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reactions`
--
ALTER TABLE `reactions`
  ADD CONSTRAINT `fk_message` FOREIGN KEY (`message`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `fk_user_emote` FOREIGN KEY (`user`) REFERENCES `users` (`pseudo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
