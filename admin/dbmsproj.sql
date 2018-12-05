-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 05:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmsproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `PNR` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `seat_no` varchar(5) DEFAULT NULL,
  `reserve_status` varchar(5) DEFAULT NULL,
  `u_id` varchar(255) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `train_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PNR`, `p_name`, `age`, `gender`, `seat_no`, `reserve_status`, `u_id`, `status_id`, `train_id`) VALUES
(1234567890, 'abcd', 24, 'M', '1', 'CNF', 'abc@gamil.com', 1, 1234),
(1234567892, 'Mrinal', 21, 'M', '65', 'CNF', 'mrinal.snk@gmail.com', 4, 12859);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `arr_time` time DEFAULT NULL,
  `depart_time` time DEFAULT NULL,
  `stop_no` int(4) DEFAULT NULL,
  `station_id` int(11) DEFAULT NULL,
  `train_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`arr_time`, `depart_time`, `stop_no`, `station_id`, `train_id`) VALUES
('10:05:00', '10:05:00', 1, 1, 4971),
('10:05:00', '10:05:00', 2, 2, 4971),
('10:05:00', '10:05:00', 3, 3, 4971),
('10:05:00', '10:05:00', 1, 1, 16205),
('10:05:00', '10:05:00', 2, 2, 16205),
('10:05:00', '10:05:00', 3, 3, 16205),
('10:05:00', '10:05:00', 1, 1, 12284),
('10:05:00', '10:05:00', 2, 2, 12284),
('10:05:00', '10:05:00', 3, 3, 12284),
('10:05:00', '10:05:00', 1, 1, 12859),
('10:05:00', '10:05:00', 2, 2, 12859),
('10:05:00', '10:05:00', 3, 3, 12859),
('10:05:00', '10:05:00', 1, 1, 12951),
('10:05:00', '10:05:00', 2, 2, 12951),
('10:05:00', '10:05:00', 3, 3, 12951);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_id`, `station_name`) VALUES
(1, 'borivali'),
(2, 'Baroda'),
(3, 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `train_type` varchar(25) NOT NULL,
  `avail_class` varchar(10) NOT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `t_name`, `train_type`, `avail_class`, `status_id`) VALUES
(4971, 'garibrath', 'Express', 'SL', 1),
(12284, 'duronto', 'AC superfast', 'AC', 3),
(12859, 'geetanjali', 'express', 'SL', 4),
(12951, 'rajdhani', 'Superfast', 'SL', 5),
(16205, 'mysoreexp', 'Express', 'SL', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trainstatus`
--

CREATE TABLE `trainstatus` (
  `status_id` int(11) NOT NULL,
  `wait_seat` int(3) DEFAULT NULL,
  `avail_seat` int(3) DEFAULT NULL,
  `booked_seat` int(3) DEFAULT NULL,
  `train_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainstatus`
--

INSERT INTO `trainstatus` (`status_id`, `wait_seat`, `avail_seat`, `booked_seat`, `train_id`) VALUES
(1, 2, 0, 72, 4971),
(2, 0, 5, 67, 16205),
(3, 5, 0, 72, 12284),
(4, 0, 8, 64, 12859),
(5, 10, 0, 72, 12951);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `secques` varchar(50) NOT NULL,
  `secans` varchar(50) NOT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pwd`, `secques`, `secans`, `Email`) VALUES
(1, 'xxxxxxxx', 'fgfgf', 'gfgfgfy', 'mrinal.snk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`PNR`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`);

--
-- Indexes for table `trainstatus`
--
ALTER TABLE `trainstatus`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `PNR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234567893;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `train_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16206;

--
-- AUTO_INCREMENT for table `trainstatus`
--
ALTER TABLE `trainstatus`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
