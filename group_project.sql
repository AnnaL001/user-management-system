-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 05:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_type` enum('Administrator','Super Administrator','Author') DEFAULT NULL,
  `userId` int(30) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `access_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_type`, `userId`, `full_name`, `email`, `phone_number`, `username`, `password`, `access_time`, `address`) VALUES
('Author', 33, 'Donald', ' ajm@gmako.com', 999999, NULL, '', '2017-06-27 08:57:29', '  1234'),
('Super Administrator', 1, 'Kkhali', ' aj@email.cop', 566699, 'aj    ', '12345678', '2017-06-26 05:49:00', '     3447'),
('Administrator', 38, 'Roy Murwa', ' roy@gmail.com', 3444, 'jw', '1325naftal', '2017-06-27 20:36:21', ' 777'),
('Author', 53, 'aadada', 'dssdasdasa@ddd.com', 33333, '', '', '2017-07-06 23:51:00', '33333'),
('Author', 55, 'aadada', 'dssdasdasa@ddd.com', 33333, '', '', '2017-07-06 23:51:50', '33333'),
('Administrator', 51, 'Collins', 'ajm@gmako.com', 4444, 'col', '123456789', '2017-07-06 22:41:29', '2222'),
('Administrator', 66, 'dffffffa', 'ajm@gmako.com', 22222, 'aaaa', '123456789', '2017-07-07 00:40:50', 'dssdggsg'),
('Author', 61, 'oy Murwa', 'ajm@gmako.com', 2222, NULL, NULL, '2017-07-07 00:12:21', '22222'),
('Author', 62, 'oy Murwa', 'ajm@gmako.com', 2222, NULL, NULL, '2017-07-07 00:12:24', '22222'),
('Author', 63, 'rOY ', 'ajm@gmako.com', 33333, NULL, NULL, '2017-07-07 00:13:28', '33'),
('Author', 64, 'rOY ', 'ajm@gmako.com', 33333, NULL, NULL, '2017-07-07 00:14:53', '33'),
('Author', 65, 'aJ', 'ajm@gmako.com', 11111, NULL, NULL, '2017-07-07 00:15:12', '1111'),
('Administrator', 67, 'uyrtuuy', 'ajm@gmako.com', 4444, '11', '123456789', '2017-07-07 01:14:27', 'hkiioi'),
('Author', 69, 'juneV', 'June@gmail.com', 723541678, NULL, NULL, '2017-07-07 03:03:47', '765LONDON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
