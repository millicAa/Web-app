-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 08:48 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradska`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(1000) NOT NULL,
  `performerName` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventName`, `performerName`, `date`) VALUES
(1, 'Magicni utorak', 'Petar Mitic & Tamara Dragic', '2017-02-21'),
(2, 'Veliko gostovanje cetvrtak', 'Dejan Matic', '2017-02-23'),
(3, 'Petak - Acko Petrovic & Ivana Milenkovic', 'Acko Petrovic & Ivana Milenkovic', '2017-02-24'),
(4, 'Subota - Peca Petakovic & Marijana Jukic', 'Peca Petakovic & Marijana Jukic', '2017-02-25'),
(5, 'Nedelja i svi smo tu ', 'Zile Hram & Jelena Gajic', '2017-02-26'),
(6, 'Lucky monday', 'Misa Laguna', '2017-02-27'),
(7, 'Garavi Sokak Utorak', 'Garavi sokak', '2017-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateOfReservation` date NOT NULL,
  `reservationOnName` varchar(255) NOT NULL,
  `phoneNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `typeID`, `eventID`, `userID`, `dateOfReservation`, `reservationOnName`, `phoneNumber`) VALUES
(1, 1, 5, 1, '2017-02-23', 'Opaca', '0653535656'),
(2, 1, 1, 1, '2017-02-22', 'jovana', '065 322313'),
(4, 2, 1, 3, '2017-02-22', 'Opaca', '0873131'),
(5, 2, 4, 3, '2017-02-22', 'Mirko', '065 221221'),
(6, 1, 5, 3, '2017-02-22', 'Gavra', '065 431 0400'),
(7, 2, 7, 3, '2017-02-22', 'Mladen', '065 223211'),
(8, 2, 5, 1, '2017-02-22', 'Milica', '065433223');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(1000) NOT NULL,
  `capacity` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`typeID`, `typeName`, `capacity`) VALUES
(1, 'Separe', '12 ljudi'),
(2, 'Visoko sedenje', '8 ljudi'),
(3, 'Barski sto', '6 ljudi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(30) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `password`, `isAdmin`) VALUES
(1, 'Jovana Medic', 'jovana', 'jovana', 1),
(3, 'Milos', 'opaca', 'opaca', 0),
(4, 'proba', 'proba', 'proba', 0),
(5, 'proba 123', 'proba 123', 'proba 123', 0),
(6, 'proba api', 'prova', 'a;mg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `typeID` (`typeID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`typeID`) REFERENCES `type` (`typeID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`eventID`) REFERENCES `event` (`eventID`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
