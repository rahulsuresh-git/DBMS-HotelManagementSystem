-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2018 at 02:34 PM
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
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `uid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`uid`, `email`, `pass`) VALUES
(9, 'b@b.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(24, 'a@a.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `uid` int(5) NOT NULL,
  `bookid` varchar(10) NOT NULL,
  `totalnights` int(11) NOT NULL,
  `totalcost` bigint(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`uid`, `bookid`, `totalnights`, `totalcost`, `timestamp`) VALUES
(9, 'GP606785', 7, 910000, '2018-10-06 12:15:28'),
(24, 'GP822066', 1, 32000, '2018-10-06 12:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `uid` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`uid`, `name`, `address`, `email`, `contact`, `age`, `gender`, `nationality`) VALUES
(9, 'Test', 'Chennai', 'b@b.com', '12312321312', 20, 'F', 'American'),
(24, 'Rahul', 'daa', 'a@a.com', '23112321312', 21, 'M', 'Indian');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uid` int(5) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `rooms` int(10) NOT NULL,
  `adult` int(10) NOT NULL,
  `child` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`uid`, `checkin`, `checkout`, `type`, `rooms`, `adult`, `child`, `status`) VALUES
(9, '2018-10-02 05:25:00', '2018-10-09 09:45:00', 'Presidential Suite', 2, 3, 2, 'CONFIRMED'),
(24, '2018-10-01 05:25:00', '2018-11-01 18:45:00', 'Double Deluxe', 1, 3, 2, 'CONFIRMED');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `type` varchar(50) NOT NULL,
  `adult` int(50) NOT NULL,
  `child` int(50) DEFAULT NULL,
  `total` int(50) NOT NULL,
  `remaining` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`type`, `adult`, `child`, `total`, `remaining`) VALUES
('Double Deluxe', 8000, 4000, 20, 20),
('Honeymoon Suite', 10000, NULL, 10, 10),
('Presidential Suite', 15000, 10000, 3, 3),
('Single Deluxe', 5000, 2500, 30, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `bookid` (`bookid`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
