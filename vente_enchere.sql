-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 09:42
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
-- Structure de la table `vente_enchere`
--

DROP TABLE IF EXISTS `vente_enchere`;
CREATE TABLE IF NOT EXISTS `vente_enchere` (
  `ID_Vente` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Item` int(11) NOT NULL,
  `Date_lim` varchar(200) NOT NULL,
  `Prix_min` int(11) NOT NULL,
  `Enchere_max` int(11) DEFAULT 0,
  `Fin` varchar(200) NOT NULL,
  `Enchere_min` int(11) NOT NULL,
  `ID_Encherisseur` int(11) NOT NULL,
  PRIMARY KEY (`ID_Vente`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
