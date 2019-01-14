-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2019 at 04:09 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `myDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbStatistique`
--

CREATE TABLE `dbStatistique` (
  `date` date DEFAULT NULL,
  `temperature` double DEFAULT NULL,
  `humite` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dbStatistique`
--

INSERT INTO `dbStatistique` (`date`, `temperature`, `humite`) VALUES
('2019-01-01', 15, 45),
('2019-01-02', 17, 55),
('2019-01-03', 19, 48),
('2019-01-04', 18, 56),
('2019-01-05', 14, 67),
('2019-01-06', 17, 44),
('2019-01-07', 13, 34),
('2019-01-08', 19, 45),
('2019-01-09', 10, 23),
('2019-01-10', 6, 35),
('2019-01-11', 4, 45),
('2019-01-12', 2, 67),
('2019-01-13', 6, 46),
('2019-02-01', 35, 75),
('2019-02-02', 38, 84),
('2019-02-03', 2, 39),
('2019-02-04', 36, 27),
('2019-02-05', 27, 36),
('2019-02-06', 6, 67),
('2019-02-07', 63, 40),
('2019-02-08', 37, 29),
('2019-02-09', 26, 19),
('2019-02-10', 17, 74),
('2019-02-11', 30, 89),
('2019-02-12', 37, 54),
('2019-02-13', 26, 45);
