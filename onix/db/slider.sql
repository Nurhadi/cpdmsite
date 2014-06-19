-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 02:40 PM
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
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `slider_id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(50) NOT NULL,
  `slider_path` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_id` int(7) unsigned zerofill NOT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_path`, `status`, `date_created`, `admin_id`) VALUES
(0000003, 'Praktik Dokter Gigi', 'assets/uploads/slider/IMG_0088.jpeg', 'Active', '2014-04-19 10:38:11', 0000001),
(0000004, 'Praktik Dokter Gigi', 'assets/uploads/slider/IMG_8775.jpeg', 'Active', '2014-04-19 10:38:29', 0000001),
(0000005, 'Slider Example 1', 'assets/uploads/slider/slider-example-31.jpg', 'Active', '2014-04-20 13:00:33', 0000001),
(0000006, 'Slider Example 2', 'assets/uploads/slider/slider-example-2.jpg', 'Active', '2014-04-20 13:00:02', 0000001),
(0000008, 'Slider Example 3', 'assets/uploads/slider/slider-example-1.jpg', 'Active', '2014-04-20 13:30:51', 0000001);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
