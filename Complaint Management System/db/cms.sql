-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 04:17 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
CREATE TABLE admin (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(250) NOT NULL,
  password VARCHAR(250) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO admin (username, password) VALUES 
('admin1', MD5('password1')),
('admin2', MD5('password2')),
('admin3', MD5('password3'));

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `stateDescription` tinytext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `complaintType` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `noc` varchar(255) NOT NULL,
  `complaintDetails` mediumtext NOT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE tblcomplaints 
MODIFY COLUMN complaintNumber INT(11) NOT NULL AUTO_INCREMENT,
ADD PRIMARY KEY (complaintNumber);
-- Table structure for state
CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(255) NOT NULL,
  `stateDescription` tinytext NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------
INSERT INTO `state` (`stateName`, `stateDescription`, `postingDate`, `updationDate`) 
VALUES 
('Accra', 'Capital city of Ghana', CURRENT_TIMESTAMP, '2024-09-01'),
('Kumasi', 'The second-largest city in Ghana', CURRENT_TIMESTAMP, '2024-09-02'),
('Tamale', 'The largest city in the Northern Region of Ghana', CURRENT_TIMESTAMP, '2024-09-03'),
('Sekondi-Takoradi', 'Capital of the Western Region and a key port city', CURRENT_TIMESTAMP, '2024-09-04'),
('Cape Coast', 'Capital of the Central Region and a historic city', CURRENT_TIMESTAMP, '2024-09-05'),
('Koforidua', 'Capital of the Eastern Region', CURRENT_TIMESTAMP, '2024-09-06'),
('Ho', 'Capital of the Volta Region', CURRENT_TIMESTAMP, '2024-09-07'),
('Bolgatanga', 'Capital of the Upper East Region', CURRENT_TIMESTAMP, '2024-09-08'),
('Wa', 'Capital of the Upper West Region', CURRENT_TIMESTAMP, '2024-09-09'),
('Sunyani', 'Capital of the Bono Region', CURRENT_TIMESTAMP, '2024-09-10'),
('Techiman', 'Capital of the Bono East Region', CURRENT_TIMESTAMP, '2024-09-11'),
('Goaso', 'Capital of the Ahafo Region', CURRENT_TIMESTAMP, '2024-09-12'),
('Sefwi Wiawso', 'Capital of the Western North Region', CURRENT_TIMESTAMP, '2024-09-13'),
('Dambai', 'Capital of the Oti Region', CURRENT_TIMESTAMP, '2024-09-14'),
('Damongo', 'Capital of the Savannah Region', CURRENT_TIMESTAMP, '2024-09-15'),
('Nalerigu', 'Capital of the North East Region', CURRENT_TIMESTAMP, '2024-09-16');

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:43', '', 0),
(2, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:14:50', '08-05-2020 07:44:51 PM', 1),
(3, 1, 'john@gmail.com', 0x3a3a3100000000000000000000000000, '2020-05-08 14:16:30', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `address` tinytext,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(1, 'John Smith', 'john@gmail.com', '202cb962ac59075b964b07152d234b70', 9999999999, NULL, NULL, NULL, NULL, NULL, '2020-05-08 14:10:50', '2020-05-08 14:16:22', 1);

---- Dummy data for category
INSERT INTO `category` (`categoryName`, `categoryDescription`, `creationDate`, `updationDate`) 
VALUES 
('Technology', 'Issues related to tech devices and services', CURRENT_TIMESTAMP, '2024-09-01'),
('Healthcare', 'Complaints related to medical services', CURRENT_TIMESTAMP, '2024-09-02'),
('Education', 'Issues related to education and institutions', CURRENT_TIMESTAMP, '2024-09-03');

-- Dummy data for complaintremark
INSERT INTO `complaintremark` (`complaintNumber`, `status`, `remark`, `remarkDate`) 
VALUES 
(1, 'Resolved', 'Issue was resolved by support team', CURRENT_TIMESTAMP),
(2, 'Pending', 'Awaiting response from department', CURRENT_TIMESTAMP),
(3, 'In Progress', 'Case is being reviewed', CURRENT_TIMESTAMP);

-- Dummy data for state
INSERT INTO `state` (`stateName`, `stateDescription`, `postingDate`, `updationDate`) 
VALUES 
('California', 'State in the USA', CURRENT_TIMESTAMP, '2024-09-01'),
('Texas', 'State in the USA', CURRENT_TIMESTAMP, '2024-09-02'),
('New York', 'State in the USA', CURRENT_TIMESTAMP, '2024-09-03');

-- Dummy data for subcategory
INSERT INTO `subcategory` (`categoryid`, `subcategory`, `creationDate`, `updationDate`) 
VALUES 
(1, 'Mobile Phones', CURRENT_TIMESTAMP, '2024-09-01'),
(2, 'Hospitals', CURRENT_TIMESTAMP, '2024-09-02'),
(3, 'Schools', CURRENT_TIMESTAMP, '2024-09-03');

-- Dummy data for tblcomplaints
INSERT INTO `tblcomplaints` (`userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`) 
VALUES 
(1, 1, 'Mobile Phones', 'Technical', 'California', 'No', 'The phone is malfunctioning.', NULL, CURRENT_TIMESTAMP, 'Open', '2024-09-01 10:00:00'),
(2, 2, 'Hospitals', 'Service', 'Texas', 'Yes', 'Poor service in the hospital.', NULL, CURRENT_TIMESTAMP, 'Closed', '2024-09-02 12:00:00'),
(3, 3, 'Schools', 'Administration', 'New York', 'No', 'Administrative issues at the school.', NULL, CURRENT_TIMESTAMP, 'In Progress', '2024-09-03 14:00:00');

-- Indexes for dumped tables
--
ALTER TABLE tblcomplaints 
ADD `audioFile` VARCHAR(255) NULL;

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
