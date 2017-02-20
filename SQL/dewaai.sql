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
-- Database: `dewaai`
--

-- --------------------------------------------------------

--
-- Table structure for table `boats`
--

CREATE TABLE `boats` (
  `id` int(10) unsigned NOT NULL,
  `courses_id` int(10) unsigned NOT NULL,
  `boat_name` varchar(255) NOT NULL,
  `boottype` enum('Draak','Bm','Schouw') NOT NULL,
  `averij` varchar(45) DEFAULT 'false',
  `capacity` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `level` enum('beginner','advanced') NOT NULL DEFAULT 'beginner',
  `price` decimal(18,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `description`, `level`, `price`, `start_date`, `end_date`) VALUES
(5, 'Schouw cursus', 'Onze gevorderdencursus wordt gegeven met draken. Dit zijn minder stabiel boten dan de BM-ers. Je leert hier met een spinaker te zeilen en, bij sterke wind, te zeilen met een trapeze. Je leert hier ook wat te doen indien een noodsituatie ontstaat.', 'beginner', '491.91', '2015-12-16', '2015-09-09'),
(11, 'Beginnerscursus', 'Beginnerscursus		', 'beginner', '396.90', '2016-05-29', '2016-06-05'),
(13, 'Gevorderdencursus', 'Gevorderdencursus', 'advanced', '496.90', '2016-05-29', '2016-06-05'),
(14, 'Waddentocht', 'Waddentocht', 'beginner', '596.90', '2016-05-29', '2016-06-05'),
(15, 'Beginnerscursus', 'Beginnerscursus', 'beginner', '496.90', '2016-06-05', '2016-06-12'),
(16, 'Gevorderdencursus', 'Gevorderdencursus', 'advanced', '496.90', '2016-06-05', '2016-06-12'),
(17, 'Waddentocht', 'Waddentocht', 'beginner', '596.90', '2016-06-05', '2016-06-12'),
(18, 'Waddentocht', 'Waddentocht', 'beginner', '696.90', '2016-06-12', '2016-06-19'),
(19, 'Gevorderdencursus', 'Gevorderdencursus', 'advanced', '596.90', '2016-06-12', '2016-06-19'),
(20, 'Beginnerscursus', 'Beginnerscursus', 'beginner', '496.90', '2016-06-12', '2016-06-19'),
(22, 'Gevorderdencursus', 'Gevorderdencursus', 'beginner', '596.90', '2016-06-19', '2016-06-26'),
(23, 'Waddentocht', 'Waddentocht', 'beginner', '696.90', '2016-06-19', '2016-06-26'),
(27, 'Beginnerscursus', 'Beginnerscursus', 'beginner', '696.90', '2016-06-19', '2016-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `user_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`user_id`, `course_id`, `created_at`) VALUES
(15, 5, NULL),
(13, 5, NULL),
(18, 5, NULL),
(18, 5, NULL),
(18, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('beginner','advanced') NOT NULL DEFAULT 'beginner',
  `role` enum('customer','instructor') NOT NULL DEFAULT 'customer',
  `first_name` varchar(255) NOT NULL,
  `insertion` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `telephone` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `level`, `role`, `first_name`, `insertion`, `last_name`, `address`, `postal_code`, `city`, `telephone`) VALUES
(1, 'brenninkmeijer@dewaai.nl', '64959e8c09a9c49d03cb5dcd806f1ab6', 'advanced', 'instructor', 'Jan', '', 'bren', 'Willemskade 18', '7773TJ', 'Hoogeveen', 12345),
(13, 'thomas@gmail.com', '96bacec1fecb55f44c519138a98a529e', 'beginner', 'customer', 'Thomas', NULL, 'Loon', NULL, NULL, NULL, NULL),
(15, 'test@test2.nl', 'c06db68e819be6ec3d26c6038d8e8d1f', 'beginner', 'customer', 'Gert', '', 'alfa', 'straatnaam 106', '7775AK', 'Hardenberg', 61122311),
(17, 'ervaren@dewaai.nl', '1439d18df458261be5c19ef7ec834da0', 'advanced', 'customer', 'ervaren', NULL, 'ervaren', NULL, NULL, NULL, NULL),
(18, 'thomas@gmail.nl', '96bacec1fecb55f44c519138a98a529e', 'beginner', 'customer', 'Tom', '', 'test', 'Albertstr 15', '8882 RJ', 'Delft', 1234567890),
(20, 'beheerder500@gmail.com', 'a4cb7e003696830aebaa4a5fa3f089d3', 'beginner', 'instructor', 'beheerder', NULL, 'Beheerder2', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boats`
--
ALTER TABLE `boats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_boats_courses1_idx` (`courses_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD KEY `courses_users.user_id` (`user_id`),
  ADD KEY `courses_users.course_id` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boats`
--
ALTER TABLE `boats`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boats`
--
ALTER TABLE `boats`
  ADD CONSTRAINT `fk_boats_courses1` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `courses_users.course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `courses_users.user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
