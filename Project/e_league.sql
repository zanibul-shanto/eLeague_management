-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 10:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_league`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `name`, `email`, `password`) VALUES
(1, 'Shanto', 'shanto@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `Sponsor_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `company_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`Sponsor_name`, `country`, `company_type`) VALUES
('Gigabyte', 'BD', 'digital goods'),
('MSI', 'BD', 'Digital Goods'),
('Smart Tech', 'BD', 'Digital Goods'),
('Thurmaltech', 'IND', 'Digital Goods'),
('UCC', 'BD', 'Digital Shop');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_name` varchar(50) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `game_type` varchar(50) NOT NULL,
  `tournament_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_name`, `game_name`, `country`, `game_type`, `tournament_name`) VALUES
('Cancerous9', 'Mlbb', 'bd', 'Moba', 'null'),
('MRCZ', 'Valorant', 'BD', 'FPS', ''),
('Ninjas', 'R6S', 'USA', 'RPG', ''),
('Red ViperZ', 'CSGO', 'BD', 'FPS', 'null'),
('Zeus', 'Valorant', 'BD', 'Battle royal', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `tournament_name` varchar(50) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `prize` int(11) NOT NULL,
  `sponsor_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `Id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `team_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`Id`, `name`, `email`, `password`, `age`, `gender`, `date_of_birth`, `team_name`) VALUES
(1, 'Zanibul', 'shanto26@gmail.com', '12345', 21, 'M', '2000-01-26', 'MRCZ'),
(4, 'Zanibul', 'zanibul@gmail.com', '12345', 21, 'M', '2000-01-26', 'Red ViperZ');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `tournament_name` varchar(50) NOT NULL,
  `sponsor_name` varchar(50) NOT NULL,
  `first_pos` varchar(50) NOT NULL,
  `second_pos` varchar(50) NOT NULL,
  `theird_pos` varchar(50) NOT NULL,
  `forth_pos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`Sponsor_name`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_name`),
  ADD UNIQUE KEY `team_name` (`team_name`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`tournament_name`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `team_name` (`team_name`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD KEY `tournament_name` (`tournament_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tournament`
--
ALTER TABLE `tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`tournament_name`) REFERENCES `team` (`team_name`);

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`team_name`) REFERENCES `team` (`team_name`);

--
-- Constraints for table `winners`
--
ALTER TABLE `winners`
  ADD CONSTRAINT `winners_ibfk_1` FOREIGN KEY (`tournament_name`) REFERENCES `team` (`team_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
