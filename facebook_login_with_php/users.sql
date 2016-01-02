-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2014 at 06:34 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `social_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Twitter',
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_token` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Twitter',
  `oauth_secret` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Twitter',
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Google',
  `gpluslink` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Google',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `username`, `fname`, `lname`, `email`, `gender`, `locale`, `oauth_token`, `oauth_secret`, `picture`, `gpluslink`, `created`, `modified`) VALUES
(6, 'twitter', '2154325140', 'wallpapersms', 'WallpaperSms', '', '', '', 'en-gb', '2154325140-oiEqF7TY23DpDQscFp4HeDd2dGGzOb2pVyYTdDv', 'WvO5L23W1okibpic2kumjKdJ1Y2SVH6VwByg9BVIciRq6', '', '', '2014-08-16 05:39:24', '2014-08-16 05:39:24'),
(7, 'facebook', '724997897561213', '', 'Nitya', 'Maity', 'nityamaity87@gmail.com', 'male', 'en_US', '', '', '', '', '2014-08-16 05:46:52', '2014-08-16 05:47:32'),
(8, 'google', '106806324668748974384', '', 'Frisoer', 'Soedal', 'frisoersoedal@gmail.com', 'female', 'en', '', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/106806324668748974384', '2014-08-16 08:09:54', '2014-08-16 08:11:18');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
