-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 fév. 2021 à 09:21
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `api_rest_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(10) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `telephone`) VALUES
(1, 'Binet', 'Bryan', '0624563146'),
(2, 'Derimay', 'Corentin', '0645789425'),
(3, 'Aurousseau', 'Florian', '0798463249'),
(4, 'Freville', 'Robbin', '0654234578'),
(5, 'Zmuda', 'Robin', '0234578965'),
(6, 'Trespalle', 'Jimmy', '032145785'),
(7, 'Loubatiere', 'Esteban', '0789453246'),
(8, 'Hesters', 'Theophile', '0632489756'),
(9, 'Bertrand', 'Theo', '0645289437'),
(10, 'Sanson', 'Antoine', '0642789425'),
(11, 'Dardat', 'Axel', '0645789425'),
(12, 'Morel', 'Mathias', '0789425368'),
(13, 'Laurent', 'Leo', '0147532259'),
(14, 'Claudon', 'Yann', '0457812249'),
(15, 'Breugnot', 'Nicolas', '0314758944'),
(16, 'Michel', 'Maxime', '0611442579'),
(17, 'Aoulini', 'Romain', '0245789543'),
(18, 'Thomas', 'Nicolas', '0642155796'),
(19, 'Vincent', 'Dimitry', '0642115789'),
(20, 'Texier', 'Joris', '0245778966');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
