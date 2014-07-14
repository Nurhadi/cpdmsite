-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2014 at 12:37 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpdmsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_izin`
--

CREATE TABLE IF NOT EXISTS `surat_izin` (
  `id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `admin_id` int(7) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `surat_izin`
--

INSERT INTO `surat_izin` (`id`, `title`, `filename`, `created_at`, `admin_id`) VALUES
(0000001, 'Testing', 'materi-statistik2.pdf', '2014-07-15 05:14:05', 0000001);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
