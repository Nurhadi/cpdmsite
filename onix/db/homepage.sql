-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 02:41 PM
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
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `homepage_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_address` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image_founder_1` varchar(100) NOT NULL,
  `image_founder_2` varchar(100) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`homepage_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`homepage_id`, `logo`, `title`, `keywords`, `description`, `slider_title`, `slider_description`, `content`, `image_address`, `address`, `phone`, `image_founder_1`, `image_founder_2`, `facebook`, `twitter`, `latitude`, `longitude`, `updated_at`) VALUES
(0000001, 'assets/images/dental-zone.jpg', 'Dental Zone', 'klinik gigi bandung, dokter gigi bandung, dental zone bandung', 'dental zone merupakan sebuah tempat praktek klinik gigi yang berada di pusat kota bandung.', 'DENTAL ZONE', 'Croissant jujubes pudding oat cake lemon drops. ', '<p>Candy canes biscuit caramels topping gingerbread fruitcake apple pie \nicing. Powder jelly beans sugar plum halvah fruitcake. I love carrot \ncake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé \ncaramels.</p>', 'assets/uploads/slider-example-12.jpg', 'Candy canes biscuit caramels topping gingerbread fruitcake apple pie icing. Powder jelly beans sugar plum halvah fruitcake. I love carrot cake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé caramels.', '123456 - (022) 321654', 'assets/uploads/doctor-21.png', 'assets/uploads/doctor-11.png', 'http://facebook.com/kllinikgigibandung', 'http://twitter.com/klinikgigibandung', '-6.909279', '107.619977', '2014-04-22 11:40:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
