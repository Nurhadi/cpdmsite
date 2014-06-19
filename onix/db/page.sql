-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2014 at 12:36 PM
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
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `title`, `keywords`, `description`, `content`) VALUES
(0000001, 'News Dental Zone', 'news dental zone, news klinik gigi bandung', 'kumpulan berita atau news klinik gigi dental zone bandung', '<p>konten deskripsi berita dental zone bandung</p>'),
(0000002, 'Profile', 'profile dokter gigi bandung, daftar dokter gigi di dental zone', 'Merupakan daftar informasi atau profile dari dokter gigi yang terdapat di dental zone bandung', '<p>Candy canes biscuit caramels topping gingerbread fruitcake apple pie \nicing. Powder jelly beans sugar plum halvah fruitcake. I love carrot \ncake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé \ncaramels.</p>'),
(0000003, 'Treatment', 'treatment dokter gigi bandung, pelayanan dental zone bandung', 'Merupakan kumpulan treatment dokter gigi dental zone bandung', '<p>Candy canes biscuit caramels topping gingerbread fruitcake apple pie icing. Powder jelly beans sugar plum halvah fruitcake. I love carrot cake brownie biscuit carrot cake. Chupa chups ice cream pastry soufflé caramels.</p>'),
(0000004, 'About Us', 'tentang klinik gigi bandung, tentang dental zone bandung', 'informasi tentang klinik gigi bandung', '<p>merupakan isi dari tentang kami halaman klinik gigi bandung</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
