-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2016 at 03:25 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snow`
--
DROP DATABASE IF EXISTS `snow`;
CREATE DATABASE `snow`;
USE `snow`;

-- --------------------------------------------------------
--
-- Table structure for table `courses`
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `level` enum('beginner','intermediate','advanced') NOT NULL DEFAULT 'beginner',
  `price` decimal(18,2) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `active` BOOLEAN NOT NULL DEFAULT TRUE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Table structure for table `gear`
CREATE TABLE `gear` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` enum('Safety','Food','Boards and Skis','Comms','Misc') DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `broken` BOOLEAN NOT NULL DEFAULT FALSE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('beginner','intermediate','advanced') NOT NULL DEFAULT 'beginner',
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `firstname` varchar(255) NOT NULL,
  `infix` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `active` BOOLEAN NOT NULL DEFAULT TRUE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--
-- Table structure for table `bookings`
CREATE TABLE `bookings` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
--
-- Table structure for table `gear_assignments`
CREATE TABLE `gear_assignments` (
  `id` int(10) unsigned NOT NULL,
  `gear_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

-- Indexes for table `courses`
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `gear`
ALTER TABLE `gear`
  ADD PRIMARY KEY (`id`);

-- Indexes for table `bookings`
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings.user_id` (`user_id`),
  ADD KEY `bookings.course_id` (`course_id`);

-- Indexes for table `gear_assignments`
ALTER TABLE `gear_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gear_assignments.gear_id` (`gear_id`),
  ADD KEY `gear_assignments.course_id` (`course_id`);

-- --------------------------------------------------------
--
-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `gear`
ALTER TABLE `gear`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;

-- AUTO_INCREMENT for table `courses`
ALTER TABLE `courses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;

-- AUTO_INCREMENT for table `bookings`
ALTER TABLE `bookings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;

-- AUTO_INCREMENT for table `gear_assignments`
ALTER TABLE `gear_assignments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;

-- --------------------------------------------------------
--
-- Constraints for dumped tables
--

-- Constraints for table `bookings`
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings.course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `bookings.user_id`   FOREIGN KEY (`user_id`)   REFERENCES `users` (`id`);

-- Constraints for table `gear_assignments`
ALTER TABLE `gear_assignments`
  ADD CONSTRAINT `gear_assignments.course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `gear_assignments.gear_id`   FOREIGN KEY (`gear_id`)   REFERENCES `gear` (`id`);

-- --------------------------------------------------------
--
-- Dumping data for tables
--

-- Dumping data for table `courses`
INSERT INTO `courses` (`id`, `coursename`, `description`, `level`, `price`, `startdate`, `enddate`) VALUES
(11, 'Skiing Course', 'Skiing Course    ', 'beginner', '396.90', '2017-05-29', '2017-06-05'),
(13, 'Snowboarding Course', 'Snowboarding Course', 'advanced', '496.90', '2017-05-29', '2017-06-05'),
(14, 'Cross Country Tours', 'Cross Country Tours', 'beginner', '596.90', '2017-05-29', '2017-06-05'),
(15, 'Skiing Course', 'Skiing Course', 'beginner', '496.90', '2017-06-05', '2017-06-12'),
(16, 'Snowboarding Course', 'Snowboarding Course', 'advanced', '496.90', '2017-06-05', '2017-06-12'),
(17, 'Cross Country Tours', 'Cross Country Tours', 'beginner', '596.90', '2017-06-05', '2017-06-12'),
(18, 'Cross Country Tours', 'Cross Country Tours', 'beginner', '696.90', '2017-06-12', '2017-06-19'),
(19, 'Snowboarding Course', 'Snowboarding Course', 'advanced', '596.90', '2017-06-12', '2017-06-19'),
(20, 'Skiing Course', 'Skiing Course', 'beginner', '496.90', '2017-06-12', '2017-06-19'),
(22, 'Snowboarding Course', 'Snowboarding Course', 'beginner', '596.90', '2017-06-19', '2017-06-26'),
(23, 'Cross Country Tours', 'Cross Country Tours', 'beginner', '696.90', '2017-06-19', '2017-06-26'),
(27, 'Skiing Course', 'Skiing Course', 'beginner', '696.90', '2017-06-19', '2017-06-26');

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `email`, `password`, `level`, `role`, `firstname`, `infix`, `lastname`, `address`, `postcode`, `city`, `phone`) VALUES
(1, 'admin@mail.nl', '0192023a7bbd73250516f069df18b500', 'beginner', 'admin', 'Admin', NULL, 'Adminlast', NULL, NULL, NULL, NULL),
(2, 'user@mail.nl', '6ad14ba9986e3615423dfca256d04e3f', 'beginner', 'customer', 'User', NULL, 'Userlast', NULL, NULL, NULL, NULL),
(3, 'feller@snow.nl', '64959e8c09a9c49d03cb5dcd806f1ab6', 'advanced', 'admin', 'Hans', '', 'Feller', 'Willemskade 18', '7773TJ', 'Hoogeveen', 12345),
(13, 'thomas@gmail.com', '96bacec1fecb55f44c519138a98a529e', 'advanced', 'customer', 'Tomba', 'La', 'Bomba', NULL, NULL, NULL, NULL),
(15, 'gert@test2.nl', 'c06db68e819be6ec3d26c6038d8e8d1f', 'intermediate', 'customer', 'Gert', NULL, 'Langehelling', 'Straatnaam 106', '7775AK', 'Hardenberg', 61122311),
(17, 'ervaren@snow.nl', '1439d18df458261be5c19ef7ec834da0', 'advanced', 'customer', 'ervaren', NULL, 'ervaren', NULL, NULL, NULL, NULL),
(18, 'thomas@gmail.nl', '96bacec1fecb55f44c519138a98a529e', 'beginner', 'customer', 'Tom', 'van der', 'Tomcat', 'Karelstraat 15', '8882 RJ', 'Delft', 1234567890),
(20, 'beheer500@gmail.com', 'a4cb7e003696830aebaa4a5fa3f089d3', 'beginner', 'admin', 'Bennie', NULL, 'Bang', NULL, NULL, NULL, NULL);

-- Dumping data for table `gear`
INSERT INTO `gear` (`id`, `name`, `description`, `category`, `number`, `broken` ) VALUES
(1, 'Snowboard 180cm', 'Snowboard Burton Easyrider with Flow bindings', 'Boards and Skis', 4, 'FALSE'),
(2, 'Lawinepieper', 'Lawinepieper met responder', 'Safety', 12, 'FALSE');

-- Dumping data for table `bookings`
INSERT INTO `bookings` (`id`, `user_id`, `course_id`, `created_at`) VALUES
(1, 1, 16, NULL),
(2, 1, 17, NULL),
(3, 15, 11, NULL),
(4, 13, 15, NULL),
(5, 17, 16, NULL),
(6, 18, 16, NULL),
(7, 18, 17, NULL),
(8, 13, 23, NULL);

-- Dumping data for table `gear_assignments`
INSERT INTO `gear_assignments` (`id`, `gear_id`, `course_id`, `created_at`) VALUES
(1, 1, 16, NULL),
(2, 2, 17, NULL);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
