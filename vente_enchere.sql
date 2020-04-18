-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 12:46
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
  `ID_Vente` int(11) NOT NULL,
  `ID_Item` int(11) NOT NULL,
  `Date_lim` date NOT NULL,
  `Fin` text NOT NULL,
  `Prix_min` int(11) NOT NULL,
  `Enchere_max` int(11) NOT NULL,
  `Enchere_min` int(11) NOT NULL,
  `ID_Encherisseur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vente_enchere`
--

INSERT INTO `vente_enchere` (`ID_Vente`, `ID_Item`, `Date_lim`, `Fin`, `Prix_min`, `Enchere_max`, `Enchere_min`, `ID_Encherisseur`) VALUES
(2, 33, '2020-04-28', 'Non', 104, 120, 0, 19),
(3, 41, '2020-07-09', 'Non', 550, 551, 0, 0),
(10, 42, '2020-04-12', 'Oui', 500, 1000, 200, 18),
(10, 42, '2020-04-12', 'Oui', 500, 1000, 200, 18);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
