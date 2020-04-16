-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 16 avr. 2020 à 08:27
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testpiscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text NOT NULL,
  `Description` text NOT NULL,
  `Immediat` text NOT NULL,
  `Enchere` text NOT NULL,
  `Meilleure` text NOT NULL,
  `Photo1` text NOT NULL,
  `Photo2` text NOT NULL,
  `Photo3` text NOT NULL,
  `Video` text NOT NULL,
  `ID_vendeur` int(11) NOT NULL,
  `Categorie` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID`, `Nom`, `Description`, `Immediat`, `Enchere`, `Meilleure`, `Photo1`, `Photo2`, `Photo3`, `Video`, `ID_vendeur`, `Categorie`) VALUES
(32, 'mario encore', 'toile ancienne', '', 'Enchere', '', 'upload//jpg.jpg', '', '', '', 3, ''),
(33, 'autre photo', 'test', '', 'Enchere', '', 'upload//GPPT0434.jpg', '', '', '', 3, ''),
(38, 'Autre mario', 'salut', '', '', 'Meilleure', 'upload//profil.jpg', '', '', '', 3, ''),
(41, 'Link', 'Link > Mario', 'Immediate', 'Enchere', '', 'upload//link.jpg ', '', '', '', 4, 'Accessoire VIP'),
(42, 'test', 'test', 'Immediate', '', '', 'upload//broche2.jpg', '', '', '', 4, 'Ferraille ou TrÃ©sor');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
