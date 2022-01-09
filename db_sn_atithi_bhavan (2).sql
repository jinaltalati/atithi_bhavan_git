-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sn_atithi_bhavan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `salt` varchar(256) NOT NULL,
  `forgot_pwd_salt` varchar(50) DEFAULT NULL,
  `profile_image` varchar(256) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2 COMMENT '1- Admin , 2-Instructor',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `code`, `email`, `password`, `salt`, `forgot_pwd_salt`, `profile_image`, `role_id`, `status`, `created`, `modified`) VALUES
(1, 'Main', 'Admin', 'MA', 'admin@gmail.com', 'd4a7a97d7f7bf392042954bc1648603b', '672753424786604096', '', 'user-avatar.jpg', 1, 'Active', '2014-09-12 00:00:00', '2021-12-27 15:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `members` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `deposite` int(11) NOT NULL,
  `donate_deposite` enum('no','yes') NOT NULL DEFAULT 'no',
  `payment_mode` varchar(255) NOT NULL,
  `reference_by` text NOT NULL,
  `total_payment` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `status` enum('Booked','Checkout') NOT NULL DEFAULT 'Booked',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `building_id`, `room_id`, `room_type`, `customer_name`, `address`, `email`, `mobile`, `members`, `charge`, `deposite`, `donate_deposite`, `payment_mode`, `reference_by`, `total_payment`, `check_in`, `check_out`, `status`, `created`, `modified`) VALUES
(1, 1, 6, 'A.C', 'jinal', 'abc', 'talatijinal8@gmail.com', '8849214672', 4, 1000, 300, 'no', 'cash', '', 1300, '2021-12-27 00:00:00', '2021-12-27 15:22:19', 'Checkout', '2021-12-27 15:17:07', '2021-12-27 15:22:19'),
(2, 1, 4, 'A.C', 'jinal', 'abc', 'talatijinal8@gmail.com', '9099481078', 4, 1000, 300, 'no', 'cash', '', 1300, '2021-12-27 00:00:00', '2021-12-27 15:24:04', 'Checkout', '2021-12-27 15:23:31', '2021-12-27 15:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(255) UNSIGNED NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `building_name`, `created`, `modified`) VALUES
(1, 'KasthBhanjan', '2021-12-26', '2021-12-26 06:16:13'),
(2, 'Swaminarayan-A', '2021-12-26', '2021-12-26 06:16:29'),
(3, 'Anjani Jayo', '2021-12-26', '2021-12-26 14:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6c279f5ccb6975727639dd630aea5f14', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 Edg/', 1640617738, 'a:8:{s:9:\"user_data\";s:0:\"\";s:8:\"redirect\";s:8:\"building\";s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:4:\"Main\";s:10:\"user_lname\";s:5:\"Admin\";s:10:\"user_email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";s:1:\"1\";s:9:\"logged_in\";b:1;}'),
('b3dadc13ad3c905fbf8e8c01ce4c199e', '0.0.0.0', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Mobil', 1640617857, 'a:7:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:4:\"Main\";s:10:\"user_lname\";s:5:\"Admin\";s:10:\"user_email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";s:1:\"1\";s:9:\"logged_in\";b:1;}'),
('1ae2d302170baa0feb64c77f13579c29', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 Edg/', 1640619070, 'a:8:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:4:\"Main\";s:10:\"user_lname\";s:5:\"Admin\";s:10:\"user_email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";s:1:\"1\";s:9:\"logged_in\";b:1;s:8:\"redirect\";s:15:\"booking/add/1/6\";}'),
('270217765865a49d6d9b68a09e9c9ccf', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 Edg/', 1640672299, 'a:8:{s:9:\"user_data\";s:0:\"\";s:8:\"redirect\";s:15:\"booking/add/1/6\";s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:4:\"Main\";s:10:\"user_lname\";s:5:\"Admin\";s:10:\"user_email\";s:15:\"admin@gmail.com\";s:7:\"role_id\";s:1:\"1\";s:9:\"logged_in\";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(255) UNSIGNED NOT NULL,
  `floor_name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `floor_name`, `created`, `modified`) VALUES
(1, 'Ground Floor', '2021-12-26', '2021-12-26 06:16:49'),
(2, 'First Floor', '2021-12-26', '2021-12-26 06:17:01'),
(3, 'Second Floor', '2021-12-26', '2021-12-26 06:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(255) UNSIGNED NOT NULL,
  `building_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_type` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `charge` int(11) NOT NULL,
  `deposite` int(11) NOT NULL,
  `status` enum('Available','In Cleaning','Booked') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `building_id`, `room_name`, `created`, `modified`, `room_type`, `capacity`, `charge`, `deposite`, `status`) VALUES
(4, 1, '101', '2021-12-26', '2021-12-27 15:24:40', 'A.C', 4, 1000, 300, 'Available'),
(5, 1, '102', '2021-12-26', '2021-12-27 15:24:28', 'A.C', 4, 1000, 300, 'Available'),
(6, 1, '103', '2021-12-26', '2021-12-27 15:22:38', 'A.C', 4, 1000, 300, 'Available'),
(7, 2, '101', '2021-12-26', '2021-12-27 06:56:05', 'A.C', 4, 1000, 300, 'Available'),
(8, 3, '101', '2021-12-26', '2021-12-27 06:56:20', 'A.C', 4, 1000, 300, 'Available'),
(9, 3, '102', '2021-12-26', '2021-12-27 06:56:33', 'A.C', 4, 1001, 300, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
