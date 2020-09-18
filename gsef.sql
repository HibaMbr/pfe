-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2020 at 03:13 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsef`
--

-- --------------------------------------------------------

--
-- Table structure for table `preinscrit`
--

DROP TABLE IF EXISTS `preinscrit`;
CREATE TABLE IF NOT EXISTS `preinscrit` (
  `matricule` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dateN` date NOT NULL,
  `lieuN` text NOT NULL,
  `adresse` text NOT NULL,
  `niveauEtu` varchar(100) NOT NULL,
  `telephone` int(12) NOT NULL,
  `formation` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` text NOT NULL,
  `disponibilité` text NOT NULL,
  PRIMARY KEY (`matricule`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preinscrit`
--

INSERT INTO `preinscrit` (`matricule`, `nom`, `prenom`, `gender`, `dateN`, `lieuN`, `adresse`, `niveauEtu`, `telephone`, `formation`, `email`, `occupation`, `disponibilité`) VALUES
(36, 'Khadidja', 'DOUMIR', 'melle', '2000-03-21', 'bir mourad rais', 'oued tarfa', 'université', 674740580, 'Windows Initiation', 'jijidoumir@gmail.com', 'nothing', 'samedi_9:00, samedi_13:30, samedi_17:00'),
(37, 'baskerville', 'jiji', 'melle', '2000-03-21', 'bir mourad rais', 'oued tarfa', 'hohohoho', 664452483, 'Windows Initiation', 'doumirhala@gmail.com', 'nothing', 'dimanche_9:00, mardi_9:00, dimanche_13:30, mardi_13:30, dimanche_17:00, mardi_17:00');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `row_id` text NOT NULL,
  `fname` text NOT NULL,
  `fdate` text NOT NULL,
  `fhour` text NOT NULL,
  `fhref` text NOT NULL,
  `fimg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `row_id`, `fname`, `fdate`, `fhour`, `fhref`, `fimg`) VALUES
(1, 'ghjffdzdnbs', 'HTML5 Beginner', 'Dimanche & Lundi', '15h a 17h', 'Developpement/HTML', 'html5'),
(2, '6dnbivsj1l5', 'CSS3 Beginner', 'Lundi 16-12-2019', '13H30', 'Developpement/CSS', 'css3'),
(3, 'u0i4121mkd', 'JavaScript Beginner', 'Samedi le 30-11-2019', '9H30', 'Developpement/JavaScript', 'js');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(3, 'Admin', '$2y$10$yA3bymgGjJScW19irrZsSu7n00jc8pRQmKA4QkTmrZVn2vEi5NEce', '2020-08-09 14:12:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
