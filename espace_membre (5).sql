-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 11 jan. 2019 à 12:21
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
-- Structure de la table `forum_categorie`
--

DROP TABLE IF EXISTS `forum_categorie`;
CREATE TABLE IF NOT EXISTS `forum_categorie` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cat_ordre` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_ordre` (`cat_ordre`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum_categorie`
--

INSERT INTO `forum_categorie` (`cat_id`, `cat_nom`, `cat_ordre`) VALUES
(1, 'Général', 30),
(2, 'Jeux-Vidéos', 20),
(4, 'Capteurs', 15),
(5, 'Contact', 40);

-- --------------------------------------------------------

--
-- Structure de la table `forum_forum`
--

DROP TABLE IF EXISTS `forum_forum`;
CREATE TABLE IF NOT EXISTS `forum_forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_desc` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_last_post_id` int(11) NOT NULL,
  `forum_topic` mediumint(8) NOT NULL,
  `forum_post` mediumint(8) NOT NULL,
  `auth_view` tinyint(4) NOT NULL,
  `auth_post` tinyint(4) NOT NULL,
  `auth_topic` tinyint(4) NOT NULL,
  `auth_annonce` tinyint(4) NOT NULL,
  `auth_modo` tinyint(4) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum_forum`
--

INSERT INTO `forum_forum` (`forum_id`, `forum_cat_id`, `forum_name`, `forum_desc`, `forum_ordre`, `forum_last_post_id`, `forum_topic`, `forum_post`, `auth_view`, `auth_post`, `auth_topic`, `auth_annonce`, `auth_modo`) VALUES
(1, 1, 'Présentation', 'Nouveau sur le forum? Venez vous présenter ici !', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Les News', 'Les news du site sont ici', 50, 34, 8, 8, 1, 2, 2, 3, 4),
(3, 1, 'Discussions générales', 'Ici on peut parler de tout sur tous les sujets', 40, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 2, 'Capteurs', 'Parlez ici des capteurs ainsi que des problèmes liés aux capteurs', 60, 33, 7, 7, 0, 0, 0, 0, 0),
(5, 2, 'Authentification', 'Problèmes de connexions', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 3, 'Connexion', 'Connexion', 60, 8, 3, 3, 0, 0, 0, 0, 0),
(7, 3, 'Délires', 'Décrivez ici tous vos délires les plus fous', 50, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 'Astuces', 'Voir les astuces liées aux connectiques', 50, 30, 3, 3, 1, 2, 2, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `forum_membres`
--

DROP TABLE IF EXISTS `forum_membres`;
CREATE TABLE IF NOT EXISTS `forum_membres` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_pseudo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_mdp` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_msn` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_siteweb` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_signature` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_localisation` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `membre_inscrit` int(11) NOT NULL,
  `membre_derniere_visite` int(11) NOT NULL,
  `membre_rang` tinyint(4) DEFAULT '2',
  `membre_post` int(11) NOT NULL,
  PRIMARY KEY (`membre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum_membres`
--

INSERT INTO `forum_membres` (`membre_id`, `membre_pseudo`, `membre_mdp`, `membre_email`, `membre_msn`, `membre_siteweb`, `membre_avatar`, `membre_signature`, `membre_localisation`, `membre_inscrit`, `membre_derniere_visite`, `membre_rang`, `membre_post`) VALUES
(1, 'paulo92isep', 'pauld', 'pauldevillers10@gmail.com', 'paulo92', 'domisep', 'Ne possède pas d\'avatar', 'paul92', 'Paris', 12, 23, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_mp`
--

DROP TABLE IF EXISTS `forum_mp`;
CREATE TABLE IF NOT EXISTS `forum_mp` (
  `mp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mp_expediteur` int(11) NOT NULL,
  `mp_receveur` int(11) NOT NULL,
  `mp_titre` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_text` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `mp_time` int(11) NOT NULL,
  `mp_lu` enum('0','1') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE IF NOT EXISTS `forum_post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_createur` int(11) NOT NULL,
  `post_texte` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `post_time` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_forum_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `forum_post`
--

INSERT INTO `forum_post` (`post_id`, `post_createur`, `post_texte`, `post_time`, `topic_id`, `post_forum_id`) VALUES
(32, 0, 'sa bug!:O', 1544448628, 0, 0),
(31, 0, 'Bonjour:D', 1544448440, 0, 0),
(33, 0, 'dsqdsq', 1544449759, 0, 4),
(34, 35, 'Bonjour', 1544451782, 0, 2),
(35, 34, 'Bonjour je m\'appelle Minh Nam', 1544692937, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

DROP TABLE IF EXISTS `forum_topic`;
CREATE TABLE IF NOT EXISTS `forum_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `topic_titre` char(60) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_createur` int(11) NOT NULL,
  `topic_vu` mediumint(8) NOT NULL,
  `topic_time` int(11) NOT NULL,
  `topic_genre` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `topic_last_post` int(11) NOT NULL,
  `topic_first_post` int(11) NOT NULL,
  `topic_post` mediumint(8) NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_last_post` (`topic_last_post`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 1, 'Chevet Gauche', 1),
(2, 1, 'Chevet Droit', 1),
(3, 0, 'Dressing', 1),
(4, 1, 'Plafond', 2),
(5, 1, 'Lit 1', 2),
(6, 0, 'Lit 2', 2),
(7, 1, 'Plafond', 3),
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
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mail`, `motdepasse`, `confirmkey`, `confirme`, `nom`, `prenom`, `admin`) VALUES
(36, 'Hugo', 'hugo.ghesquiere@isep.fr', '948671729b6bec289730e25186aac08f7537d108', '41102211581183', 1, 'Ghesquiere', 'Hugo', 0),
(34, 'cava', 'cava@gmail.com', '1bfbdf35b1359fc6b6f93893874cf23a50293de5', '40805831879295', 1, 'cava', 'cava', 0),
(40, 'MinhNam', 'nguyen.minhnam@hotmail.fr', '948671729b6bec289730e25186aac08f7537d108', '77660185261730', 1, 'Nguyen', 'MinhNam', 1),
(37, 'Ilda', 'salut@gmail.com', '948671729b6bec289730e25186aac08f7537d108', '75486102400783', 1, 'Bihorac', 'Ilda', 0),
(41, 'Minh', 'nguyen.minhnam78280@gmail.com', '948671729b6bec289730e25186aac08f7537d108', '21093934643130', 1, 'Nguyen', 'Minh', 0);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID` int(20) NOT NULL,
  `Question` longtext NOT NULL,
  `Reponse` longtext NOT NULL,
  `Date_publication` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID`, `Question`, `Reponse`, `Date_publication`) VALUES
(1, 'Comment ajouter un capteur ?', 'Pour ajouter un capteur allez dans l\'onglet profil et appuyer sur \'ajouter capteur\'.', '2018-11-20'),
(2, 'Mot de passe oubliÃ©', ' Appuyer sur \'mot de passe oubliÃ©\'; nous vous envoyons un mail.', '2018-11-18'),
(3, 'Quelle application tÃ©lÃ©charger pour contrÃ´ler ses capteurs Ã  distance ?', 'L\'application domisep est disponible sur Android (Ã  partir de android 4) comme sur iOS.', '2018-11-17'),
(4, 'l\'application fonctionne t-elle sans connexion internet ?', 'Non malheureusement une connexion internet est nÃ©cessaire. ', '2018-11-17'),
(5, 'Un capteur est dÃ©fectueux, comment les changer?', 'Vous avez 2 possibilitÃ©s, soit vous commandez un nouveau capteur sur notre catalogue et vous le changer seul, soit vous faites appel aux services techniques pour qu\'ils vous l\'installent. ', '2018-10-03'),
(6, 'Pourquoi la lumiÃ¨re ne s\'allume plus. Comment faire?', 'Le problÃ¨me peut venir de l\'ampoule : vÃ©rifier que celle-ci est fonctionnelle.\r\n    Si le problÃ¨me persiste, changer l\'ampoule.', '2018-10-23');

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
