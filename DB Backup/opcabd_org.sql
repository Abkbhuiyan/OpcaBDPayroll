-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 07:10 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opcabd_org`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_code` varchar(25) NOT NULL,
  `brance_name` varchar(60) DEFAULT NULL,
  `establish_date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `employee_id` varchar(25) NOT NULL,
  `employee_namee` varchar(100) NOT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `highest_education_level` varchar(30) DEFAULT NULL,
  `image` varchar(120) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`employee_id`, `employee_namee`, `father_name`, `mother_name`, `address`, `phone_no`, `email`, `highest_education_level`, `image`, `password`, `blood_group`) VALUES
('opcabdemp01', 'System Admin', NULL, NULL, NULL, NULL, 'jehadfeni@gmail.com', 'BSC', NULL, 'jeh@d2990', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_gratuity`
--

CREATE TABLE `employee_gratuity` (
  `gratuity_id` int(5) NOT NULL,
  `gratuity_amount` double DEFAULT NULL,
  `deposite_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_job_details`
--

CREATE TABLE `employee_job_details` (
  `id` int(11) NOT NULL,
  `branch_code` varchar(25) DEFAULT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `job_status` varchar(50) DEFAULT NULL,
  `job_parmanent_date` date DEFAULT NULL,
  `designantion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_pf`
--

CREATE TABLE `employee_pf` (
  `pf_id` int(5) DEFAULT NULL,
  `deposit_date` datetime DEFAULT NULL,
  `deposited_amount` double DEFAULT NULL,
  `deposit_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gratuity_details`
--

CREATE TABLE `gratuity_details` (
  `gratuity_id` int(5) NOT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `gratuity_approved_date` date DEFAULT NULL,
  `first_balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_allowance`
--

CREATE TABLE `monthly_allowance` (
  `allowance_id` int(11) NOT NULL,
  `allowance_name` varchar(100) DEFAULT NULL,
  `amount` int(5) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `prefered_employee` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provident_fund`
--

CREATE TABLE `provident_fund` (
  `pf_id` int(5) NOT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `pf_start_date` date DEFAULT NULL,
  `pf_status` varchar(50) DEFAULT NULL,
  `comment` text NOT NULL,
  `first_balance` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_code`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_gratuity`
--
ALTER TABLE `employee_gratuity`
  ADD PRIMARY KEY (`gratuity_id`);

--
-- Indexes for table `employee_job_details`
--
ALTER TABLE `employee_job_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`branch_code`),
  ADD KEY `fk2` (`employee_id`);

--
-- Indexes for table `employee_pf`
--
ALTER TABLE `employee_pf`
  ADD KEY `fk4` (`pf_id`);

--
-- Indexes for table `gratuity_details`
--
ALTER TABLE `gratuity_details`
  ADD PRIMARY KEY (`gratuity_id`),
  ADD KEY `fk5` (`employee_id`);

--
-- Indexes for table `monthly_allowance`
--
ALTER TABLE `monthly_allowance`
  ADD PRIMARY KEY (`allowance_id`);

--
-- Indexes for table `provident_fund`
--
ALTER TABLE `provident_fund`
  ADD PRIMARY KEY (`pf_id`) USING BTREE,
  ADD KEY `fk3` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_job_details`
--
ALTER TABLE `employee_job_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `monthly_allowance`
--
ALTER TABLE `monthly_allowance`
  MODIFY `allowance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provident_fund`
--
ALTER TABLE `provident_fund`
  MODIFY `pf_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_job_details`
--
ALTER TABLE `employee_job_details`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`branch_code`) REFERENCES `branches` (`branch_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`employee_id`) REFERENCES `employee_details` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employee_pf`
--
ALTER TABLE `employee_pf`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`pf_id`) REFERENCES `provident_fund` (`pf_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gratuity_details`
--
ALTER TABLE `gratuity_details`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`employee_id`) REFERENCES `employee_details` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `provident_fund`
--
ALTER TABLE `provident_fund`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`employee_id`) REFERENCES `employee_details` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
