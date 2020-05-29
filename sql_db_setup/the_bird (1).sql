-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 29, 2020 at 10:18 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_bird`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_num` int(11) NOT NULL AUTO_INCREMENT,
  `user_num` int(11) NOT NULL,
  `message` varchar(168) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message_path` varchar(168) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_num`),
  KEY `user_num` (`user_num`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_num`, `user_num`, `message`, `message_path`) VALUES
(19, 14, 'Had a great ride with the family today!', 'message_img/jetsons-1170x780.jpg'),
(20, 15, 'Had a good time putting it to old #GeorgeJetson on the golf course today.  #GoodTimes #Golfing #SpacelySprockets', 'message_img/Golf1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_num` int(11) NOT NULL AUTO_INCREMENT,
  `email_one` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass_one` varchar(125) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_path` varchar(125) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_num`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_num`, `email_one`, `pass_one`, `fname`, `lname`, `address`, `city`, `state`, `zip`, `image_path`) VALUES
(11, 'martin.dwyer@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Martin', 'Dwyer', '168 16th Ave SW', 'Cedar Rapids', 'IA', '52404', 'avi/profile1520x1286-230x195.png'),
(12, 'fred@flintstones.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Fred', 'Flintstone', '', 'Bedrock', 'AZ', '99999', 'avi/The_Flintstones_-_Character_Profile_Image_-_Fred_Flintstone.png'),
(13, 'barney@flintstones.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Barney', 'Rubble', '', 'Bedrock', 'AZ', '99999', 'avi/Barney_Rubble.png'),
(14, 'george@jetsons.com', '81dc9bdb52d04dc20036dbd8313ed055', 'George', 'Jetson', '', 'Orbit City', 'CA', '99999', 'avi/e1hGwQfn.jpg'),
(15, 'cosmo@sprockets.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Cosmo', 'Spacely', '', 'Orbit City', 'CA', '99999', 'avi/Cosmo_Spacely.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_num`) REFERENCES `users` (`user_num`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
