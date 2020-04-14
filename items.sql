-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 13:22
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
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`ID`, `Nom`, `Description`, `Immediat`, `Enchere`, `Meilleure`, `Photo1`, `Photo2`, `Photo3`, `Video`, `ID_vendeur`) VALUES
(3, 'CHAISE', 'CHAISE', '', '', '', '', '', '', '', 0),
(4, '', '', '', '', '', '', '', '', '', 0),
(5, 'zertyhj', '', '', '', '', '', '', '', '', 0),
(6, 'table', 'sympa', 'ImmÃ©diate', 'EnchÃ¨re', '', '<img src=upload//DCTS2542.JPG', '', '', '', 0),
(7, 'tableau', '15eme siecle', 'Immediate', '', '', '<img src=upload//DOCF7429.JPG', '', '', '', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
