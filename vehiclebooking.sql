-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 06:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `name`, `phone`, `email`, `destination`, `departure_date`, `vehicle_id`) VALUES
(1, 'John Elton', '01532645642', 'john@gmail.com', 'karwan bazar', '2018-12-01', 2),
(2, 'Dibyo Dofadar', '01754698524', 'dibyo@gmail.com', 'Uttora', '2018-11-17', 2),
(3, 'Shafqat Hasan', '01754698521', 'shafqat@gmail.com', 'Adabor ', '2018-11-21', 4),
(4, 'Martho Park', '01523698745', 'martho@gmail.com', 'Gazipur', '2018-12-21', 3),
(5, 'Rayeed Amin', '0156987458', 'rayeed@gmail.com', 'kakrail', '2018-11-27', 2),
(7, 'Hasnat Abdullah', '01534953967', 'hasnat@gmail.com ', ' Jhigatola ', '2018-12-01', 3),
(8, 'Arnob Hasan', '01536987456', 'arnob@gmail.com ', ' Dhanmondi', '2018-12-03', 6),
(9, 'Abdul Baten', '01532645897', 'abdul@gmail.com ', ' Jatrabari', '2018-12-12', 2),
(10, 'Karim Shikdar', '01754698545', 'karim@gmail.com ', ' Rampura', '2018-12-05', 1),
(12, 'Halim Miya ', '01754698542', 'halim@gmail.com ', ' Rampura', '2018-12-05', 3),
(13, 'Young Sheldon', '01546987458', 'sheldon@gmail.com ', ' Mohakhali, dhaka', '2018-12-30', 3),
(14, 'Aslam vai', '01942042015', 'aslam@gmail.com ', ' Lalbag', '2018-12-30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `garage_id` int(11) NOT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `gphone` varchar(11) DEFAULT NULL,
  `gaddress` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`garage_id`, `gname`, `gphone`, `gaddress`) VALUES
(1, 'Trivedi-Tripathi Garage', '01956482347', 'Malibag, Dhaka.'),
(2, 'Kaleen Vaia Garages', '01725648579', 'Khilgaon, Dhaka'),
(3, 'Patwary Garages and Co.', '01812564857', 'Purana Paltan, Dhaka'),
(4, 'Jowardar Garage and Foundation', '01534569875', 'Badda, Dhaka'),
(5, 'Mark Brothers Garage', '01754985642', 'Farmgate, Dhaka'),
(6, 'Karim Garage', '01748945871', 'Demra, Dhaka'),
(7, 'Mridha Garage ltd.', '01754698547', 'Kakrail, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `employee_id` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `labor_time` int(11) DEFAULT NULL,
  `garage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`employee_id`, `ename`, `rate`, `labor_time`, `garage_id`) VALUES
(1, 'Towshik Taj', 250, 8, 2),
(2, 'Partho Gomes', 200, 10, 2),
(3, 'Zahan Khan', 225, 15, 3),
(4, 'Kalam Miya', 180, 17, 4),
(5, 'Aslam Talukdar', 185, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` int(11) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `ppday` int(11) DEFAULT NULL,
  `garage_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `model`, `ppday`, `garage_id`) VALUES
(1, 'Toyota Corolla Axio', 1500, 2),
(2, 'Toyota Probox', 1200, 1),
(3, 'Toyota Land Cruiser Prado', 3500, 2),
(4, 'Toyota Premio ', 1800, 3),
(5, 'Toyota Allion', 1700, 4),
(6, 'Tata Nano', 1000, 3),
(7, 'Hundai sonata', 1800, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`garage_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `garage_id` (`garage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `garage`
--
ALTER TABLE `garage`
  MODIFY `garage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`garage_id`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`garage_id`) REFERENCES `garage` (`garage_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
