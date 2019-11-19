-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 19 nov. 2019 à 19:24
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
-- Base de données :  `troclamo`
--
CREATE DATABASE IF NOT EXISTS `troclamo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `troclamo`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deletedcommentaires`
--

DROP TABLE IF EXISTS `deletedcommentaires`;
CREATE TABLE IF NOT EXISTS `deletedcommentaires` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vente_id` int(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `date` int(15) NOT NULL,
  `deleter_user_id` int(255) NOT NULL,
  `deleter_date` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deletedvente`
--

DROP TABLE IF EXISTS `deletedvente`;
CREATE TABLE IF NOT EXISTS `deletedvente` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `date` int(15) NOT NULL,
  `deleter_user_id` int(255) NOT NULL,
  `deleter_date` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `classe` varchar(7) NOT NULL,
  `date` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `perm` int(1) NOT NULL,
  `liquide` int(1) NOT NULL,
  `rollon` int(1) NOT NULL,
  `crypto` int(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(5) NOT NULL,
  `date` int(15) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vente_commentaires`
--

DROP TABLE IF EXISTS `vente_commentaires`;
CREATE TABLE IF NOT EXISTS `vente_commentaires` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vente_id` int(255) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `date` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
