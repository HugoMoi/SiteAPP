-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 16 jan. 2019 à 14:54
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
-- Base de données :  `espace_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `captor`
--

DROP TABLE IF EXISTS `captor`;
CREATE TABLE IF NOT EXISTS `captor` (
  `CaptorID` int(11) NOT NULL AUTO_INCREMENT,
  `CaptorName` text COLLATE utf8_unicode_520_ci NOT NULL,
  `RoomID` int(11) NOT NULL,
  PRIMARY KEY (`CaptorID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `captor`
--

INSERT INTO `captor` (`CaptorID`, `CaptorName`, `RoomID`) VALUES
(1, 'Capteur de LuminositÃ©', 1);

-- --------------------------------------------------------

--
-- Structure de la table `catalogue`
--

DROP TABLE IF EXISTS `catalogue`;
CREATE TABLE IF NOT EXISTS `catalogue` (
  `ID` int(11) NOT NULL,
  `nom` text CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1 NOT NULL,
  `prix` float NOT NULL,
  `image` text CHARACTER SET latin1 NOT NULL,
  `poids` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Déchargement des données de la table `catalogue`
--

INSERT INTO `catalogue` (`ID`, `nom`, `description`, `prix`, `image`, `poids`) VALUES
(1, 'capteur de mouvement', 'Ce capteur de mouvement est un capteur infrarouge passif d\'une portée de 10 m et d\'angle de vue de 102°. Il est parfaitement adapté pour surveiller une maison.', 10, 'capteur_mouvement.jpg', 349),
(2, 'capteur de fumée', 'capteur classique qui détecte la fumée en cas d\'incendie.', 7, 'capteur_fumee.jpg', 210),
(3, 'capteur de fenêtre et porte', 'Idéal pour sécuriser votre maison. Si on force vos fenêtres ou vos portes, l\'alarme se déclenche.', 8, 'capteur_fenetre&porte.png', 257);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'capteur'),
(2, 'connexion'),
(3, 'Autre catégorie'),
(4, 'je sais pas'),
(5, 'rrrr');

-- --------------------------------------------------------

--
-- Structure de la table `dbstatistique`
--

DROP TABLE IF EXISTS `dbstatistique`;
CREATE TABLE IF NOT EXISTS `dbstatistique` (
  `id_stat` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `temperature` double DEFAULT NULL,
  `humite` double DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_stat`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dbstatistique`
--

INSERT INTO `dbstatistique` (`id_stat`, `date`, `temperature`, `humite`, `id_client`) VALUES
(1, '2019-01-01', 15, 45, 34),
(2, '2019-01-02', 17, 55, 34),
(3, '2019-01-03', 19, 48, 34),
(4, '2019-01-04', 18, 56, 34),
(5, '2019-01-05', 14, 67, 34),
(6, '2019-01-06', 17, 44, 34),
(7, '2019-01-07', 13, 34, 34),
(8, '2019-01-08', 19, 45, 34),
(9, '2019-01-09', 10, 23, 34),
(10, '2019-01-10', 6, 35, 34),
(11, '2019-01-11', 4, 45, 34),
(12, '2019-01-12', 2, 67, 34),
(13, '2019-01-13', 6, 46, 34),
(14, '2019-02-01', 35, 75, 34),
(15, '2019-02-02', 38, 84, 34),
(16, '2019-02-03', 2, 39, 34),
(17, '2019-02-04', 36, 27, 34),
(18, '2019-02-05', 27, 36, 34),
(19, '2019-02-06', 6, 67, 34),
(20, '2019-02-07', 63, 40, 34),
(21, '2019-02-08', 37, 29, 34),
(22, '2019-02-09', 26, 19, 34),
(23, '2019-02-10', 17, 74, 34),
(24, '2019-02-11', 30, 89, 34),
(25, '2019-02-12', 37, 54, 34),
(26, '2019-02-13', 26, 45, 34);

-- --------------------------------------------------------

--
-- Structure de la table `lamp`
--

DROP TABLE IF EXISTS `lamp`;
CREATE TABLE IF NOT EXISTS `lamp` (
  `LampID` int(11) NOT NULL AUTO_INCREMENT,
  `LampCondition` tinyint(1) DEFAULT '0',
  `LampName` varchar(256) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LampID`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lamp`
--

INSERT INTO `lamp` (`LampID`, `LampCondition`, `LampName`, `RoomID`) VALUES
(1, 1, 'Chevet Gauche', 1),
(2, 1, 'Chevet Droit', 1),
(3, 0, 'Dressing', 1),
(4, 0, 'Plafond', 2),
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
(21, 0, 'Lumière', 10),
(34, 0, 'Lustre', NULL),
(33, 0, 'Lustre', NULL),
(32, 0, 'Lustre', NULL),
(31, 0, 'Lustre', NULL),
(29, NULL, 'az', NULL),
(30, 0, 'Lustre', NULL),
(35, 0, 'Lustre', NULL),
(36, 0, 'Lustre', NULL),
(37, 0, 'Lustre', NULL),
(38, 0, 'Lustre', NULL),
(39, 0, 'Lustre', NULL),
(40, 0, 'Lustre', NULL),
(41, 0, 'Lustre', NULL),
(42, 0, 'Lustre', NULL),
(43, 0, 'Lustre', NULL),
(44, 0, 'Lustre', 12);

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
  `adresse` text NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` text NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirme`, `nom`, `prenom`, `adresse`, `codepostal`, `ville`, `admin`) VALUES
(28, 'hjr', 'hashleyjr@gmail.com', 'fde90d3e864627939f2fbbd87df25364b9a7aa6c', '43748383363355', 1, '', '', '', 0, '', 0),
(33, 'MinhNam', 'nguyen.minhnam@hotmail.fr', 'f001f2e438738807d3079bffaf66519b9d0f26c7', '72986763380639', 1, 'Nguyen', 'MinhNam', '', 0, '', 1),
(34, 'hugo', 'hugo.gh@gmail.com', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '87991336415118', 1, 'Ghesquiere', 'hugo', '', 0, '', 1),
(35, 'moi', 'fgfgf@hj.hg', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '15212935311390', 1, 'fbgg', 'hig', '', 0, '', 0),
(36, 'azer', 'azer@gh.fg', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '34447931529142', 0, 'azer', 'azer', '', 0, '', 0),
(38, 'gggg', 'fhg@gh.df', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '35785474548927', 0, 'pngggg', 'ggg', '', 0, '', 0),
(39, 'zzz', 'fhg@gh.ds', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '77420401056588', 0, 'zz', 'zz', 'ed', 78000, 'VERSAILLES', 0),
(40, 'zzzS', 'fhg@gh.dE', '782dd27ea8e3b4f4095ffa38eeb4d20b59069077', '52592858193076', 0, 'zz', 'zz', 'ff', 78000, 'VERSAILLES', 0);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_message` datetime DEFAULT NULL,
  `reponse` text NOT NULL,
  `pseudo` text NOT NULL,
  `id_topic` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `date_message`, `reponse`, `pseudo`, `id_topic`) VALUES
(1, '2018-12-20 09:10:25', 'Tu peux essayer de le renvoyer si vrm il marche plus...', 'charlie', 1),
(2, '2018-12-20 12:23:00', 'Vérifie le niveau de batterie avant.', 'charlie', 1),
(4, '2018-12-21 10:27:07', 'maintenant c\'est bon', 'hugo', 1),
(7, '2018-12-21 16:43:11', 'aaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaa aaaaaaaa aaaaaaaaaaa aaaaaaaaaa aaaaaaazzzzzzzzzzzzzzz zzzzzzzzzz zzzzzzzz zzzzzzzzzz zzzzzzzzzz zzzzzzzzzzzzzzzdddd dddddddddddddd ddddddddddddddddd dddddddddd ddddddddddddddddd ddddddddd ddddzzzzz zzzzzzzzzzzzzz zzzzzzzzzzzzzz zzzzzzzzzzzz rrrrrrrrrrrrrr\r\nrrrrrrrrrrrrrrrrrrrrrr rrrrrrrrr rrrrrr rrr\r\nr   rrrr', 'hugo', 1),
(8, '2018-12-21 16:48:39', 'on essaie voir si Ã§a passe Ã  la ligne avec cette longue phrase. Ã§a veut dire qu\'il faut Ã©crire beacoup pour pas grand chose.............................................................flemme ', 'Minh', 3),
(9, '2018-12-21 16:49:52', ' on essaie voir si Ã§a passe Ã  la ligne avec cette longue phrase. Ã§a veut dire qu\'il faut Ã©crire beacoup pour pas grand chose.............................................................flemme ', 'Minh', 3),
(10, '2018-12-22 09:45:41', 'kldjhipbf', 'dfdg', 1),
(20, '2018-12-24 16:32:42', 'Bonjour Marie,\r\n\r\nDonnez nous plus de détail sur votre problème svp .', 'freddy', 33),
(12, '2018-12-22 10:12:44', 'redirection ?', 'ok', 10),
(13, '2018-12-22 10:12:54', 'ca marche', 'c\'est bon', 10),
(14, '2018-12-22 10:27:12', 'Bonsoir,', '', 1),
(15, '2018-12-22 10:28:57', 'Bonsoir,\r\nJe crois que la mise en page fonctionne plutôt bien. Voyez par vous même.', 'yeees', 1),
(16, '2018-12-22 10:33:24', 'ssss\r\nssss\r\nssfgttt*\r\n\r\nessay', 'zz', 1),
(19, '2018-12-24 15:33:01', 'mvc', 'ggg', 1),
(21, '2018-12-24 16:33:50', 'Je n\'ai plus mon mot de passe...', 'Marie', 33),
(22, '2018-12-26 19:56:07', 'test session\r\n', 'hugo', 1),
(23, '2018-12-26 21:05:55', 'ok', 'hugo', 1),
(24, '2018-12-26 21:22:54', 'rrr', 'hugo', 1),
(25, '2019-01-07 11:35:39', 'coucou\r\n', 'hugo', 1),
(26, '2019-01-14 11:00:21', 'Manges le ', 'hugo', 4);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Question` longtext NOT NULL,
  `Reponse` longtext NOT NULL,
  `Date_publication` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID`, `Question`, `Reponse`, `Date_publication`) VALUES
(1, 'Comment ajouter un capteur ?', 'Pour ajouter un capteur allez dans l\'onglet profil et appuyer sur \'ajouter capteur\'.', '2018-11-20'),
(2, 'Mot de passe oublié', ' Appuyer sur \'mot de passe oublié\'; nous vous envoyons un mail.', '2018-11-18'),
(3, 'Quelle application télécharger pour contrôler ses capteurs à distance ?', 'L\'application domisep est disponible sur Android (à  partir de android 4) comme sur iOS.', '2018-11-17'),
(4, 'l\'application fonctionne t-elle sans connexion internet ?', 'Non malheureusement une connexion internet est nécessaire. ', '2018-11-17'),
(5, 'Un capteur est défectueux, comment le changer?', 'Vous avez 2 possibilités, soit vous commandez un nouveau capteur sur notre catalogue et vous le changer seul, soit vous faites appel aux services techniques pour qu\'ils vous l\'installent. ', '2018-10-03'),
(6, 'La lumière ne s\'allume plus. Comment faire?', 'Le problème peut venir de l\'ampoule : vérifier que celle-ci est fonctionnelle.\r\n    Si le problÃ¨me persiste, changer l\'ampoule.', '2018-10-23'),
(7, 'Je ne sais pas quels capteurs choisir ni où les placer...', 'Contactez nous via la page \'Nous contacter\' et nous vous conseillerons dans les plus brefs dÃ©lais.', NULL),
(8, 'essay', 'je sais pas', NULL),
(9, 'MVC test', 'sss', NULL),
(10, 'MVC test', 'sss', NULL),
(11, 'MVC 2', 'ss', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` int(11) NOT NULL AUTO_INCREMENT,
  `RoomName` varchar(256) NOT NULL,
  `RoomTempState` int(11) NOT NULL DEFAULT '0',
  `RoomTemp` int(11) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `RoomTempReq` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`RoomID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `RoomTempState`, `RoomTemp`, `MemberID`, `RoomTempReq`) VALUES
(1, 'Chambres Parents', 1, 18, 34, 0),
(2, 'Chambres Enfants', 0, 20, 34, 0),
(3, 'Chambres Invités', 0, 19, 34, 0),
(12, 'Salon', 1, NULL, 34, 0),
(5, 'Salle de Bain Enfants', 0, NULL, 0, 0),
(6, 'Séjour', 0, 20, 0, 0),
(7, 'Bureau', 0, NULL, 0, 0),
(8, 'Toilette', 0, NULL, 0, 0),
(9, 'Buanderie', 0, NULL, 0, 0),
(10, 'Hall', 0, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `date_topic` datetime NOT NULL,
  `author` text NOT NULL,
  `nbrMessage` int(11) DEFAULT NULL,
  `pseudo_dernier` text,
  `id_categorie` int(11) NOT NULL,
  `Question` text NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `titre`, `date_topic`, `author`, `nbrMessage`, `pseudo_dernier`, `id_categorie`, `Question`) VALUES
(1, 'pb pour connecter mon capteur', '2018-12-26 00:00:00', 'moi', 1, 'Kev', 1, 'comment faire pour reconnecter un capteur?'),
(2, 'Problème de connexion', '2018-12-12 18:39:48', 'marie', 0, 'zaer', 2, 'Je n\'arrive plus à me connecter.... J\'ai besoin d\'aide svp.'),
(3, 'capteur de lumière', '2018-12-02 12:23:00', 'zooma', 0, 'zerty', 1, 'Bonjour,\r\nComment faire pour faire un pré-réglage sur l\'application?'),
(4, 'mon chien déclanche l\'alarme...', '2018-12-21 21:09:28', 'Patrick', NULL, NULL, 1, 'J\'ai un souci car mon chien déclenche souvent l\'alarme, auriez vous des conseils?'),
(5, 'on teste la redircetion', '2018-12-22 09:59:12', 'ee', NULL, NULL, 4, 'ca marche ?'),
(6, 'essay 3', '2018-12-22 10:06:32', 'ty', NULL, NULL, 4, 'fer'),
(7, 'Je n\'arrive pas à me connecter', '2018-12-24 16:28:48', 'Marie', NULL, NULL, 2, 'Depuis quelques jours je ne peux plus me connecter... '),
(8, 'Mvc final', '2018-12-24 14:50:08', 'toto', NULL, NULL, 1, 'dac'),
(9, 'avec session', '2018-12-26 18:27:48', 'hugo', NULL, NULL, 2, 'ouais'),
(10, 'dd', '2018-12-26 18:28:50', 'dd', NULL, NULL, 2, 'dd'),
(11, 'essay3', '2018-12-26 19:49:10', 'hugo', NULL, NULL, 2, 'dd'),
(12, 'heure local', '2018-12-26 21:08:44', 'hugo', NULL, NULL, 5, 'et en plus c\'est à l\'heure 21h08');

-- --------------------------------------------------------

--
-- Structure de la table `window`
--

DROP TABLE IF EXISTS `window`;
CREATE TABLE IF NOT EXISTS `window` (
  `WindowID` int(11) NOT NULL AUTO_INCREMENT,
  `WindowCondition` tinyint(1) DEFAULT NULL,
  `WindowName` varchar(256) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  PRIMARY KEY (`WindowID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `window`
--

INSERT INTO `window` (`WindowID`, `WindowCondition`, `WindowName`, `RoomID`) VALUES
(2, 0, 'FenÃªtre 1', 2),
(3, 1, 'FenÃªtre 2', 2),
(4, 0, 'Fenêtre', 3),
(5, 0, 'Fenêtre', 4),
(6, 0, 'Fenêtre', 5),
(7, 0, 'Fenêtre', 6),
(8, 0, 'Baie Vitrée', 6),
(9, 0, 'Fenêtre', 7),
(10, 0, 'Fenêtre', 10),
(12, NULL, 'FenÃªtre', 1),
(13, NULL, 'Baie Vitrée', NULL),
(14, NULL, 'Balcon', NULL),
(15, NULL, 'Baie Vitrée', NULL),
(16, NULL, 'Balcon', NULL),
(17, NULL, 'Baie Vitrée', NULL),
(18, NULL, 'Balcon', NULL),
(19, NULL, 'Baie Vitrée', NULL),
(20, NULL, 'Balcon', NULL),
(21, NULL, 'Baie Vitrée', NULL),
(22, NULL, 'Balcon', NULL),
(23, NULL, 'Baie Vitrée', NULL),
(24, NULL, 'Balcon', NULL),
(25, NULL, 'Baie Vitrée', NULL),
(26, NULL, 'Balcon', NULL),
(27, NULL, 'Baie Vitrée', NULL),
(28, NULL, 'Balcon', NULL),
(29, NULL, 'Baie Vitrée', NULL),
(30, NULL, 'Balcon', NULL),
(31, NULL, 'Baie Vitrée', NULL),
(32, NULL, 'Balcon', NULL),
(33, NULL, 'Baie Vitrée', NULL),
(34, NULL, 'Balcon', NULL),
(35, NULL, 'Baie Vitrée', NULL),
(36, NULL, 'Balcon', NULL),
(37, NULL, 'Baie Vitrée', NULL),
(38, NULL, 'Balcon', NULL),
(39, NULL, 'Balcon', NULL),
(40, NULL, 'Balcon', NULL),
(41, NULL, 'Baie Vitrée', 12),
(42, NULL, 'Balcon', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
