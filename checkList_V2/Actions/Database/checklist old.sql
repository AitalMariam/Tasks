-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 26, 2018 at 05:33 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `check_list`
--

INSERT INTO `check_list` (`id`, `owner_id`, `title`, `creationDate`) VALUES
(78, 2, 'Shopping ', '2018-10-26 00:00:00');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_answer`
--

INSERT INTO `item_answer` (`id`, `answer`, `item_id`, `user_id`) VALUES
(22, 'no', 97, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
CREATE TABLE IF NOT EXISTS `item_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `dataType` longtext COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  `creationDate` datetime NOT NULL,
  `delDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8CF8BCE33DAE168B` (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`id`, `list_id`, `title`, `description`, `dataType`, `required`, `creationDate`, `delDate`) VALUES
(97, 78, 'Buy 10 eggs', 'I need 10 eggs to make some cup cake :)', 'checkbox', 1, '2018-10-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `submit_item`
--

DROP TABLE IF EXISTS `submit_item`;
CREATE TABLE IF NOT EXISTS `submit_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `submit` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ipAdress` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2FDD337336F330DF` (`item_list_id`),
  KEY `IDX_2FDD3373A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', 'aomkjwdkj'),
(2, 'test', 'test@gmail.com', 'test'),
(3, 'test', 'mariamaital98@gmail.com', 'mariamaital98@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_list`
--
ALTER TABLE `check_list`
  ADD CONSTRAINT `FK_A1488C997E3C61F9` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `FK_8CF8BCE33DAE168B` FOREIGN KEY (`list_id`) REFERENCES `check_list` (`id`);

--
-- Constraints for table `submit_item`
--
ALTER TABLE `submit_item`
  ADD CONSTRAINT `FK_2FDD337336F330DF` FOREIGN KEY (`item_list_id`) REFERENCES `item_list` (`id`),
  ADD CONSTRAINT `FK_2FDD3373A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
