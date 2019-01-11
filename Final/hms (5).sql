-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 09:06 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin1', '20-05-2011 12:22:29 AM');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cmp_address` varchar(255) NOT NULL,
  `cmp_phone` varchar(255) NOT NULL,
  `cmp_email` varchar(255) NOT NULL,
  `cmp_website` varchar(255) NOT NULL,
  `cmp_supplierName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `cmp_address`, `cmp_phone`, `cmp_email`, `cmp_website`, `cmp_supplierName`) VALUES
(10, 'SBL', 'fdgdf', '', 'f@gmail.com', 'dfg1', 'rahul'),
(11, 'homeo', 'vikash nagar', '1234', 'gmail.', 'www.', 'mukesh'),
(12, 'cipla', 'delhi', '34534', 'dih.com', 'dlf', 'asutosh');

-- --------------------------------------------------------

--
-- Table structure for table `inner_stock_dtl`
--

CREATE TABLE `inner_stock_dtl` (
  `id` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `variant` varchar(50) NOT NULL,
  `sale_date` date DEFAULT NULL,
  `tot_qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inner_stock_dtl`
--

INSERT INTO `inner_stock_dtl` (`id`, `medicineId`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `description`, `cmp`, `variant`, `sale_date`, `tot_qty`) VALUES
(83, 43, 'disprin', 'Tab', '3', '1 stick', '10 tabs', 'AFR2', '2018-11-01', '2018-11-03', 16, 'pain', 'SBL', 'loose', '2018-11-25', '25');

-- --------------------------------------------------------

--
-- Table structure for table `medicine-type`
--

CREATE TABLE `medicine-type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine-type`
--

INSERT INTO `medicine-type` (`id`, `name`) VALUES
(3, 'Tab'),
(4, 'Syrup'),
(5, 'Caps'),
(7, 'Powder');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_dtl`
--

CREATE TABLE `medicine_dtl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `tot_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `variant` varchar(50) NOT NULL,
  `purchase_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_dtl`
--

INSERT INTO `medicine_dtl` (`id`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `tot_price`, `description`, `cmp`, `variant`, `purchase_date`) VALUES
(43, 'disprin', 'Tab', '1', '1 stick', '10 tabs', 'AFR2', '2018-11-01', '2018-11-03', 16, 16, 'pain', 'SBL', 'loose', '2018-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_dtl1`
--

CREATE TABLE `medicine_dtl1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `tot_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `purchase_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_dtl1`
--

INSERT INTO `medicine_dtl1` (`id`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `tot_price`, `description`, `cmp`, `purchase_date`) VALUES
(24, 'crocin', 'Tab', '10', '1 stick', '10 caps', 'AFR2', '2011-05-12', '2011-05-19', 70, 700, 'headeck', 'cmp1', '2011-05-19 19:44:13'),
(25, 'paracitamall', 'Tab', '14', '1 stick', '10 caps', 'gsdfgw4', '2011-05-10', '2011-05-12', 16, 224, 'fever', 'sb1', '2011-05-19 19:45:37'),
(26, 'corex', 'Syrup', '45', '100 CH', '100 ml', 'dde33', '2011-05-14', '2011-05-16', 170, 7650, 'cough', 'cipla', '2011-05-19 19:47:24'),
(27, 'alex', 'Syrup', '25', '30CH', '100 ml', 'AFR212', '2011-05-19', '2011-05-20', 270, 6750, 'cough', 'homeo', '2011-05-19 19:48:19'),
(28, 'proteen -x', 'Powder', '14', '30CH', '30 ml', 'batct', '2011-05-19', '2011-05-21', 170, 2380, 'health', 'SBL', '2011-05-19 19:50:34'),
(29, 'Endura Mass', 'Powder', '4', '1 jar', '1 kg', 'dde33', '2011-05-05', '2011-05-28', 370, 1480, 'test', 'SBL', '2011-05-19 19:04:33'),
(30, 'DuroCell', 'Powder', '14', '1 jar', '1 kg', 'batct', '2011-05-27', '2011-05-28', 270, 3780, 'test', 'cmp1', '2011-05-19 19:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullName`, `address`, `gender`, `email`, `regDate`, `updationDate`, `phoneNo`) VALUES
(68, 'Raju', 'Indira Nagar Luknow', 'male', 'raju@gmail.com', '2011-05-19 18:50:28', '', '98897876763'),
(69, 'Rakesh', 'Vikash Nagar Lucknow', 'male', 'Rakesh@gmail.com', '2011-05-19 18:51:21', '', '8987867670');

-- --------------------------------------------------------

--
-- Table structure for table `patientbilldtl`
--

CREATE TABLE `patientbilldtl` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientbilldtl`
--

INSERT INTO `patientbilldtl` (`id`, `patient_id`, `bill_no`, `bill_date`, `total_price`) VALUES
(14, 68, 1, '2018-11-27', '3'),
(15, 69, 15, '2018-11-27', '3');

-- --------------------------------------------------------

--
-- Table structure for table `patientmedicinedtl`
--

CREATE TABLE `patientmedicinedtl` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `medicineName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL,
  `tot_price` decimal(10,0) NOT NULL,
  `bill_no` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patientmedicinedtl`
--

INSERT INTO `patientmedicinedtl` (`id`, `patient_id`, `medicineId`, `medicineName`, `quantity`, `unitPrice`, `tot_price`, `bill_no`, `date`) VALUES
(160, 68, 43, 'disprin', 2, 16, '3', 1, '2018-11-27'),
(161, 69, 43, 'disprin', 2, 16, '3', 15, '2018-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `primaryunit`
--

CREATE TABLE `primaryunit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creationDate` varchar(255) DEFAULT NULL,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `primaryunit`
--

INSERT INTO `primaryunit` (`id`, `name`, `creationDate`, `updationDate`) VALUES
(10, '100 CH', '21-10-2018 09:55:11 AM', '21-10-2018 01:26:34 PM'),
(11, '30CH', '21-10-2018 09:57:11 AM', NULL),
(12, '200CH', '21-10-2018 09:57:38 AM', NULL),
(13, '1M', '21-10-2018 09:57:53 AM', NULL),
(14, '1 stick', '19-05-2011 08:51:25 PM', NULL),
(15, '1 jar', '19-05-2011 09:01:52 PM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_dtl`
--

CREATE TABLE `purchase_dtl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `tot_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `variant` varchar(50) NOT NULL,
  `purchase_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_dtl`
--

INSERT INTO `purchase_dtl` (`id`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `tot_price`, `description`, `cmp`, `variant`, `purchase_date`) VALUES
(44, 'disprin', 'Tab', '10', '1 stick', '10 tabs', 'AFR2', '2018-11-01', '2018-11-03', 16, 160, 'pain', 'SBL', 'loose', '2018-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_dtl1`
--

CREATE TABLE `purchase_dtl1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `tot_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `purchase_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_dtl1`
--

INSERT INTO `purchase_dtl1` (`id`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `tot_price`, `description`, `cmp`, `purchase_date`) VALUES
(24, 'crocin', 'Tab', '10', '1 stick', '10 caps', 'AFR2', '2011-05-12', '2011-05-19', 70, 700, 'headeck', 'cmp1', '2011-05-19 19:44:13'),
(25, 'paracitamall', 'Tab', '14', '1 stick', '10 caps', 'gsdfgw4', '2011-05-10', '2011-05-12', 16, 224, 'fever', 'sb1', '2011-05-19 19:45:37'),
(26, 'corex', 'Syrup', '45', '100 CH', '100 ml', 'dde33', '2011-05-14', '2011-05-16', 170, 7650, 'cough', 'cipla', '2011-05-19 19:47:24'),
(27, 'alex', 'Syrup', '25', '30CH', '100 ml', 'AFR212', '2011-05-19', '2011-05-20', 270, 6750, 'cough', 'homeo', '2011-05-19 19:48:19'),
(28, 'proteen -x', 'Powder', '14', '30CH', '30 ml', 'batct', '2011-05-19', '2011-05-21', 170, 2380, 'health', 'SBL', '2011-05-19 19:50:34'),
(29, 'Endura Mass', 'Powder', '4', '1 jar', '1 kg', 'dde33', '2011-05-05', '2011-05-28', 370, 1480, 'test', 'SBL', '2011-05-19 19:04:33'),
(30, 'DuroCell', 'Powder', '14', '1 jar', '1 kg', 'batct', '2011-05-27', '2011-05-28', 270, 3780, 'test', 'cmp1', '2011-05-19 19:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `sale_dtl`
--

CREATE TABLE `sale_dtl` (
  `id` int(11) NOT NULL,
  `medicineId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `unit_first` varchar(255) NOT NULL,
  `unit_second` varchar(255) NOT NULL,
  `batch no` varchar(255) NOT NULL,
  `mfd` date NOT NULL,
  `exp` date NOT NULL,
  `unit_price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `cmp` varchar(255) NOT NULL,
  `variant` varchar(50) NOT NULL,
  `sale_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_dtl`
--

INSERT INTO `sale_dtl` (`id`, `medicineId`, `name`, `type`, `quantity`, `unit_first`, `unit_second`, `batch no`, `mfd`, `exp`, `unit_price`, `description`, `cmp`, `variant`, `sale_date`) VALUES
(19, 43, 'disprin', 'Tab', '9', '1 stick', '10 tabs', 'AFR2', '2018-11-01', '2018-11-03', 16, 'pain', 'SBL', 'loose', '2018-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `secondaryunit`
--

CREATE TABLE `secondaryunit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creationDate` varchar(255) DEFAULT NULL,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secondaryunit`
--

INSERT INTO `secondaryunit` (`id`, `name`, `creationDate`, `updationDate`) VALUES
(7, '100 ml', NULL, '06-10-2018 06:58:50 PM'),
(10, '30 ml', NULL, '21-10-2018 01:28:18 PM'),
(11, '450 ml', NULL, NULL),
(12, '100 CHH', NULL, NULL),
(14, '1000 ml', NULL, NULL),
(16, '10 caps', '19-05-2011 08:51:58 PM', NULL),
(17, '10 tabs', '19-05-2011 10:07:06 PM', NULL),
(18, '1 kg', '19-05-2011 09:02:01 PM', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `creationDate` date NOT NULL,
  `updationDate` date NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `second_name`, `phone`, `creationDate`, `updationDate`, `type`) VALUES
(25, 'Deepu Homoeo Hall', '', '0', '0000-00-00', '0000-00-00', 'projectName'),
(30, '14/939-B, Vikash Nagar Lucknow', '15/809,Vikash Nagar Lucknow', '9415426789', '0000-00-00', '2018-10-26', 'address');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `creationDate` date NOT NULL,
  `updationDate` date NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `second_name`, `phone`, `creationDate`, `updationDate`, `type`) VALUES
(25, 'Deepu Homoeo Hall', '', 0, '0000-00-00', '0000-00-00', 'projectName'),
(30, '14/939-B, Vikash Nagar Lucknow                                                                                                                                                                                                                                 ', '15/809,Vikash Nagar Lucknow                                                                                                                                                                                                                                    ', 2147483647, '0000-00-00', '0000-00-00', 'address');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inner_stock_dtl`
--
ALTER TABLE `inner_stock_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine-type`
--
ALTER TABLE `medicine-type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_dtl`
--
ALTER TABLE `medicine_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_dtl1`
--
ALTER TABLE `medicine_dtl1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientbilldtl`
--
ALTER TABLE `patientbilldtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientmedicinedtl`
--
ALTER TABLE `patientmedicinedtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `primaryunit`
--
ALTER TABLE `primaryunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_dtl`
--
ALTER TABLE `purchase_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_dtl1`
--
ALTER TABLE `purchase_dtl1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_dtl`
--
ALTER TABLE `sale_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secondaryunit`
--
ALTER TABLE `secondaryunit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `inner_stock_dtl`
--
ALTER TABLE `inner_stock_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `medicine-type`
--
ALTER TABLE `medicine-type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `medicine_dtl`
--
ALTER TABLE `medicine_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `medicine_dtl1`
--
ALTER TABLE `medicine_dtl1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `patientbilldtl`
--
ALTER TABLE `patientbilldtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `patientmedicinedtl`
--
ALTER TABLE `patientmedicinedtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `primaryunit`
--
ALTER TABLE `primaryunit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `purchase_dtl`
--
ALTER TABLE `purchase_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `purchase_dtl1`
--
ALTER TABLE `purchase_dtl1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `sale_dtl`
--
ALTER TABLE `sale_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `secondaryunit`
--
ALTER TABLE `secondaryunit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
