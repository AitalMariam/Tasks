-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2018 at 10:21 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `checklist`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_list`
--

DROP TABLE IF EXISTS `check_list`;
CREATE TABLE IF NOT EXISTS `check_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A1488C997E3C61F9` (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `check_list`
--

INSERT INTO `check_list` (`id`, `owner_id`, `title`, `creationDate`) VALUES
(20, 1, 'Travel to JAPAN', '2018-11-02 17:12:38'),
(30, 1, 'Test', '2018-11-02 21:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `item_answer`
--

DROP TABLE IF EXISTS `item_answer`;
CREATE TABLE IF NOT EXISTS `item_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` text NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_answer_ibfk_1` (`item_id`),
  KEY `item_answer_ibfk_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_answer`
--

INSERT INTO `item_answer` (`id`, `answer`, `item_id`, `user_id`) VALUES
(91, 'YES', 57, 1),
(92, 'YES', 58, 1),
(93, '', 59, 1),
(94, '100$/day', 60, 1),
(95, 'YES', 57, 2),
(96, 'YES', 58, 2),
(97, 'California', 59, 2),
(98, '80$/2days', 60, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
CREATE TABLE IF NOT EXISTS `item_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `item_order` int(50) DEFAULT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `dataType` longtext COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  `creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CF8BCE33DAE168B` (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id`, `list_id`, `item_order`, `title`, `description`, `dataType`, `required`, `creationDate`) VALUES
(57, 20, 1, 'Buy Tickets', NULL, 'checkbox', 1, '2018-11-02 17:12:54'),
(58, 20, 2, 'Reserve  hotel', NULL, 'checkbox', 1, '2018-11-02 17:13:09'),
(59, 20, 3, 'What is the name of reserved hotel', NULL, 'longdata', 0, '2018-11-02 17:13:40'),
(60, 20, 4, 'What is ther Price of reserved hotel', 'Price per Day', 'shortdata', 1, '2018-11-02 17:14:02'),
(66, 30, 2, 'Test alert', NULL, 'checkbox', 1, '2018-11-03 19:23:53'),
(69, 30, 1, 'teeesrrr', NULL, 'shortdata', 1, '2018-11-03 19:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `submit_item`
--

DROP TABLE IF EXISTS `submit_item`;
CREATE TABLE IF NOT EXISTS `submit_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submitDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ipAdress` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FDD337336F330DF` (`list_id`),
  KEY `IDX_2FDD3373A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `submit_item`
--

INSERT INTO `submit_item` (`id`, `list_id`, `user_id`, `submitDate`, `ipAdress`) VALUES
(25, 20, 1, '2018-11-02 17:14:57', '::1'),
(26, 20, 2, '2018-11-02 18:48:20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `email`, `password`) VALUES
(1, 'user', 'omar errabaany', 'omar2014s@live.fr', '123'),
(2, 'user', 'user 1', 'test@gmail.com', 'test'),
(3, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(4, 'admin', 'admin 2', 'admin2@gmail.com', 'test');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_list`
--
ALTER TABLE `check_list`
  ADD CONSTRAINT `FK_A1488C997E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_answer`
--
ALTER TABLE `item_answer`
  ADD CONSTRAINT `item_answer_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `FK_8CF8BCE33DAE168B` FOREIGN KEY (`list_id`) REFERENCES `check_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `submit_item`
--
ALTER TABLE `submit_item`
  ADD CONSTRAINT `FK_2FDD337336F330DF` FOREIGN KEY (`list_id`) REFERENCES `check_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2FDD3373A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
