-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2013 at 03:46 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_listings`
--

CREATE TABLE IF NOT EXISTS `job_listings` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `JobTitle` varchar(255) CHARACTER SET hp8 DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `CompName` varchar(255) DEFAULT NULL,
  `Details` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3644 ;

--
-- Dumping data for table `job_listings`
--

INSERT INTO `job_listings` (`id`, `JobTitle`, `Country`, `CompName`, `Details`) VALUES
(3584, 'Front-end Developer', 'Greenland', 'Ice', '.net, html, css, photoshop'),
(3585, 'Developer', 'France', 'Edges', 'LAMP'),
(3586, 'Developer', 'France', 'Sharzt', 'html, css, php'),
(3587, 'Developer', 'Germany', 'Knorz', 'html, css, .net'),
(3589, 'Front-end Developer', 'England', 'INDZINE', 'HTML, CSS Designer that can put up with Jerry.'),
(3619, 'Junior Designer', 'UK', 'freelance', 'photoshop'),
(3634, 'Developer', 'Ireland', 'none', 'none'),
(3643, 'UI Developer', 'eng', 'Gingerblue', 'html5/css3/JavaScript'),
(3636, 'Developer', 'England', 'Rouge', 'HTML, CSS, HTML5, jQuery'),
(3641, 'Designer', 'sdf', 'sfg', 'sfg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
