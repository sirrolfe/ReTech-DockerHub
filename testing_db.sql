-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 20, 2023 at 03:39 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ChosenLocations`
--

CREATE TABLE `ChosenLocations` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `StoreName` varchar(255) DEFAULT NULL,
  `StoreAddress` varchar(255) DEFAULT NULL,
  `DateChosen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ChosenLocations`
--

INSERT INTO `ChosenLocations` (`ID`, `UserID`, `StoreName`, `StoreAddress`, `DateChosen`) VALUES
(1, 2, 'MALK7 COMPUTER SERVICES', 'Jl. Seha No.8e, RT.6/RW.10, Grogol Sel., Kota Jakarta Selatan', '2023-06-20 03:19:35'),
(2, 2, 'MALK7 COMPUTER SERVICES', 'Jl. Seha No.8e, RT.6/RW.10, Grogol Sel., Kota Jakarta Selatan', '2023-06-20 03:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `UserEWaste`
--

CREATE TABLE `UserEWaste` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `EWasteType` varchar(100) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `UserEWaste`
--

INSERT INTO `UserEWaste` (`ID`, `UserID`, `EWasteType`, `Quantity`, `Points`) VALUES
(1, 2, 'Laptop', 1, 15),
(2, 2, 'Battery', 1, 2),
(3, 2, 'Cables', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `PasswordHash` varbinary(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `FullName`, `Email`, `PhoneNumber`, `City`, `PasswordHash`) VALUES
(1, 'Alexander Purnomo', 'igamingneogt@gmail.com', '082157488911', 'Samarinda', 0x243279243130246630597463695074756c7138512f49767571363164652f753347632e7a657039633350713835376458573558334b456a334e395575),
(2, 'Mathew Imanuel', 'mathew.sin@binus.ac.id', '081234567890', 'Jakarta', 0x2432792431302476364c684e6846744d3776794c38544a52455649432e79703257556e7947563470577337583571396d4c41634b3951504c4d565257);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ChosenLocations`
--
ALTER TABLE `ChosenLocations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `UserEWaste`
--
ALTER TABLE `UserEWaste`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ChosenLocations`
--
ALTER TABLE `ChosenLocations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `UserEWaste`
--
ALTER TABLE `UserEWaste`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `UserEWaste`
--
ALTER TABLE `UserEWaste`
  ADD CONSTRAINT `UserEWaste_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `Users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
