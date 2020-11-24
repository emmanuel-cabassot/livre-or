-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 nov. 2020 à 13:18
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `livreor`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES
(1, 'J\'adore vos articles.', 1, '2020-11-21 00:00:00'),
(2, 'Sujets intéressants', 2, '2020-11-23 00:00:00'),
(3, 'lorem ipsum', 2, '2020-11-23 00:00:00'),
(4, 'lorem ipsum jcoircnocoiqncom', 5, '2020-11-23 00:00:00'),
(5, 'BLA BLA BLA', 3, '2020-11-24 00:00:00'),
(6, 'moi', 3, '2020-11-24 00:00:00'),
(7, 'moi', 3, '2020-11-24 00:00:00'),
(8, 'moi', 3, '2020-11-24 00:00:00'),
(9, 'Bonjour, chacha', 3, '2020-11-24 00:00:00'),
(10, 'Merci', 3, '2020-11-24 00:00:00'),
(11, 'Bonjour,vjojojm', 3, '2020-11-24 00:59:49'),
(12, 'Celui qui accepte le mal sans lutter contre lui coopÃ¨re avec lui.\r\n', 16, '2020-11-24 01:32:40'),
(13, 'Exige beaucoup de toi-mÃªme et attends peu des autres. Ainsi beaucoup dennuis te seront Ã©pargnÃ©s.\r\n\r\n', 13, '2020-11-24 01:37:13');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'Manu', '0000'),
(2, 'Chamois', '0000'),
(3, 'Mirabelle', '0000'),
(16, 'manuelle', '0000'),
(6, 'Lou', '0000'),
(7, 'pppp', '0000'),
(8, 'louuu', '0000'),
(9, 'MOI', '0000'),
(12, 'sacha', '2003'),
(13, 'admin', '0000');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
