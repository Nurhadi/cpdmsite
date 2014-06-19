-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2014 at 05:18 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onix`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `promo` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(7) unsigned zerofill NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `keywords`, `description`, `thumbnail`, `content`, `promo`, `created_at`, `admin_id`) VALUES
(0000002, 'Testing News 1', 'testing news 1', 'testing news 1 containing news about testing 1', 'assets/uploads/news/slider-example-3.jpg', '<p>testing news 1 containing news about testing 1</p>', 0, '2014-04-21 11:42:37', 0000001),
(0000003, 'Testing News 2', 'testing news 2', 'testing news 2 containing news about testing 2', 'assets/uploads/news/slider-example-2.jpg', '<p>testing news 2 containing news about testing 2</p>', 0, '2014-04-21 11:42:40', 0000001),
(0000005, 'Testing News 3', 'testing news 3', 'testing news 3 containing news about testing 3', 'assets/uploads/news/slider-example-1.jpg', '<p>testing news 3 containing news about testing 3</p>', 0, '2014-04-21 11:42:43', 0000001);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
