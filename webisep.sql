-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 déc. 2018 à 12:09
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `webisep`
--

-- --------------------------------------------------------

--
-- Structure de la table `lamp`
--

DROP TABLE IF EXISTS `lamp`;
CREATE TABLE IF NOT EXISTS `lamp` (
  `LampID` int(11) NOT NULL,
  `LampCondition` tinyint(1) DEFAULT NULL,
  `LampName` varchar(256) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LampID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lamp`
--

INSERT INTO `lamp` (`LampID`, `LampCondition`, `LampName`, `RoomID`) VALUES
(22, 1, 'Plafond', 1),
(1, 0, 'Chevet Gauche', 1),
(2, 1, 'Chevet Droit', 1),
(3, 0, 'Dressing', 1),
(4, 1, 'Plafond', 2),
(5, 1, 'Lit 1', 2),
(6, 0, 'Lit 2', 2),
(7, 0, 'Plafond', 3),
(8, 0, 'Chevet Gauche', 3),
(9, 0, 'Chevet Droit', 3),
(10, 0, 'Lavabo', 4),
(11, 0, 'Douche', 4),
(12, 0, 'Lavabo', 5),
(13, 0, 'Douche', 5),
(14, 1, 'Cuisine', 6),
(15, 1, 'Table à Manger', 6),
(16, 1, 'Salon', 6),
(17, 0, 'Plafond', 7),
(18, 0, 'Table', 7),
(19, 0, 'Lumière', 8),
(20, 0, 'Lumière', 9),
(21, 0, 'Lumière', 10);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirme` int(1) NOT NULL DEFAULT '0',
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirme`, `nom`, `prenom`) VALUES
(28, 'hjr', 'hashleyjr@gmail.com', 'fde90d3e864627939f2fbbd87df25364b9a7aa6c', '43748383363355', 0, '', ''),
(33, 'MinhNam', 'nguyen.minhnam@hotmail.fr', 'f001f2e438738807d3079bffaf66519b9d0f26c7', '72986763380639', 1, 'Nguyen', 'MinhNam');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(256) NOT NULL,
  `RoomTemp` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `RoomTemp`, `id`) VALUES
(1, 'Chambres Parents', 18, 0),
(2, 'Chambres Enfants', 20, 0),
(3, 'Chambres Invités', 19, 0),
(4, 'Salle de Bain Parents', NULL, 0),
(5, 'Salle de Bain Enfants', NULL, 0),
(6, 'Séjour', 20, 0),
(7, 'Bureau', NULL, 0),
(8, 'Toilette', NULL, 0),
(9, 'Buanderie', NULL, 0),
(10, 'Hall', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `window`
--

DROP TABLE IF EXISTS `window`;
CREATE TABLE IF NOT EXISTS `window` (
  `WindowID` int(11) NOT NULL,
  `WindowCondition` tinyint(1) DEFAULT NULL,
  `WindowName` varchar(256) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  PRIMARY KEY (`WindowID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `window`
--

INSERT INTO `window` (`WindowID`, `WindowCondition`, `WindowName`, `RoomID`) VALUES
(1, 0, 'Fenêtre', 1),
(2, 1, 'Fenêtre 1', 2),
(3, 1, 'Fenêtre 2', 2),
(4, 0, 'Fenêtre', 3),
(5, 0, 'Fenêtre', 4),
(6, 0, 'Fenêtre', 5),
(7, 1, 'Fenêtre', 6),
(8, 0, 'Baie Vitrée', 6),
(9, 0, 'Fenêtre', 7),
(10, 0, 'Fenêtre', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
