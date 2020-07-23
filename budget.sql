-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 02, 2020 at 05:12 PM
-- Server version: 10.4.10-MariaDB
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
-- Database: `budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount_spent` int(20) NOT NULL,
  `bill` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` bigint(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'Priya Pal', 'priya@xyz.com', 'd2dd904c638eba54d4782bf25c08bbf7', 8727058547),
(2, 'Deepak Shah', 'deeps@xyz.com', '0ac4d145a64722892be25b20f532fde1', 9927058547),
(3, 'Deepak Singh', 'deepsh@xyz.com', 'd2dd904c638eba54d4782bf25c08bbf7', 9927052134);

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

DROP TABLE IF EXISTS `users_group`;
CREATE TABLE IF NOT EXISTS `users_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `total_amount_spent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id`, `plan_id`, `name`, `total_amount_spent`) VALUES
(1, 1, 'Priya Pal', 400),
(2, 1, 'Manisha Singh', 400),
(3, 1, 'Prakash Pai', 400),
(4, 2, 'Priya Pal', 100),
(5, 2, 'Manisha Singh', 0),
(6, 3, 'Deepak Shah', 0),
(7, 3, 'Meena Pawar', 0),
(8, 3, 'Kriti Singhania', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users_plan`
--

DROP TABLE IF EXISTS `users_plan`;
CREATE TABLE IF NOT EXISTS `users_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `initial_budget` int(11) NOT NULL,
  `no_of_people` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_plan`
--

INSERT INTO `users_plan` (`id`, `user_id`, `title`, `start_date`, `end_date`, `initial_budget`, `no_of_people`) VALUES
(1, 1, 'Trip to Goa', '2019-03-02', '2019-03-11', 4000, 3),
(2, 1, 'Trip to Manali', '2019-04-02', '2019-04-22', 400, 2),
(3, 2, 'Mumbai Trip', '2017-03-02', '2017-03-08', 5000, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `users_group` (`id`);

--
-- Constraints for table `users_group`
--
ALTER TABLE `users_group`
  ADD CONSTRAINT `users_group_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `users_plan` (`id`);

--
-- Constraints for table `users_plan`
--
ALTER TABLE `users_plan`
  ADD CONSTRAINT `users_plan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
