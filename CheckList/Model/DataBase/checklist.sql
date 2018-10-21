-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 21 Octobre 2018 à 19:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `checklist`
--

-- --------------------------------------------------------

--
-- Structure de la table `check_list`
--

CREATE TABLE IF NOT EXISTS `check_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A1488C997E3C61F9` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `item_list`
--

CREATE TABLE IF NOT EXISTS `item_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dataType` longtext COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  `hidden` tinyint(1) NOT NULL,
  `creationDate` datetime NOT NULL,
  `delDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CF8BCE33DAE168B` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `submit_item`
--

CREATE TABLE IF NOT EXISTS `submit_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submit` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FDD337336F330DF` (`item_list_id`),
  KEY `IDX_2FDD3373A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ipAdress` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `check_list`
--
ALTER TABLE `check_list`
  ADD CONSTRAINT `FK_A1488C997E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `FK_8CF8BCE33DAE168B` FOREIGN KEY (`list_id`) REFERENCES `check_list` (`id`);

--
-- Contraintes pour la table `submit_item`
--
ALTER TABLE `submit_item`
  ADD CONSTRAINT `FK_2FDD3373A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2FDD337336F330DF` FOREIGN KEY (`item_list_id`) REFERENCES `item_list` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
