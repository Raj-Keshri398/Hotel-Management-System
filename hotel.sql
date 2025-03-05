-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2025 at 01:28 AM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `invoiceno` varchar(20) DEFAULT NULL,
  `bookingid` varchar(20) DEFAULT NULL,
  `guestid` varchar(20) DEFAULT NULL,
  `roomno` varchar(20) DEFAULT NULL,
  `roomcharge` varchar(30) DEFAULT NULL,
  `deppayment` varchar(30) DEFAULT NULL,
  `servicecharge` varchar(30) DEFAULT NULL,
  `staydays` varchar(30) DEFAULT NULL,
  `foodchg` varchar(20) DEFAULT NULL,
  `totpayment` varchar(30) DEFAULT NULL,
  `paymentdate` varchar(20) DEFAULT NULL,
  `paymentmode` varchar(20) DEFAULT NULL,
  `chkindate` varchar(20) DEFAULT NULL,
  `chkoutdate` varchar(20) DEFAULT NULL,
  `chkintime` varchar(20) DEFAULT NULL,
  `chkouttime` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`invoiceno`, `bookingid`, `guestid`, `roomno`, `roomcharge`, `deppayment`, `servicecharge`, `staydays`, `foodchg`, `totpayment`, `paymentdate`, `paymentmode`, `chkindate`, `chkoutdate`, `chkintime`, `chkouttime`) VALUES
('I-009', 'B003', 'A-12345', '101', '3000', '1000', '500', '5', '3000', '18500', '25/11/2023', 'Debit-Card', '20/11/2023', '25/11/2023', '2:00Am', '9:00Am'),
('I-0032', 'B001', 'A-123', '102', '1000', '100', '0', '2', '0', '4000', '17/10/2023', 'PhonePay', '15/10/2023', '17/10/2023', '9:00AM', '10:00AM'),
('I-098', 'B002', 'A-123456', '101', '3000', '1000', '500', '1', '500', '4000', '13/09/2023', 'Cash', '12/09/2023', '13/09/2023', '3:00PM', '12:00PM'),
('I007', 'B0123', 'A-1234567', '102', '1000', '100', '0', '5', '0', '5000', '17/4/2023', 'Cash', '13/4/2023', '18/4/2023', '2:00PM', '9:00AM'),
('I0978', 'B004', '345', '102', '1000', '0', '0', '4', '0', '4000', '21/10/2023', 'GOOGLE-PAY', '17/10/2023', '21/10/2023', '5:00PM', '12:00PM'),
('I0234', 'B006', 'A-1234', '102', '1000', '0', '500', '5', '1000', '6500', '27/11/2023', 'cash', '22/11/2023', '27/11/2023', '9:00AM', '12:00AM'),
('I0975', 'B034', 'A-123', '101', '3000', '1000', '1000', '1', '1000', '5000', '16/10/2023', 'cash', '15/10/2023', '16/10/2023', '9:00', '12:00PM'),
('I-0876', 'B008', 'A-123', '101', '3000', '1000', '500', '2', '1500', '8000', '27/11/2023', 'Cash', '25/11/2023', '27/11/2023', '2:00PM', '12:00PM'),
('I-6543', 'B007', 'A-123', '101', '3000', '1000', '500', '2', '1000', '7500', '29/11/2023', 'Cash', '27/11/2023', '29/11/2023', '!2:00Pm', '1:00Pm'),
('67', 'B003', '456', '101', '3000', '1000', '1000', '2', '1000', '8000', '12/11/2023', 'Cash', '12/09/2023', '12/11/2023', '2:00PM', '3:00Pm'),
('I009', 'B001', '2345', '102', '1000', '1000', '1000', '5', '2000', '8000', '09-03-2024', 'Offline', '04-03-2024', '09-03-2024', '5:00pm', '12:00pm'),
('I001', 'B001', '2345', '101', '5000', '2000', '1000', '2', '2000', '13000', '15/04/2024', 'Cash', '13/04/2024', '15/04/2024', '7:00am', '12:00PM'),
('123456', 'Select', '1234', '102', '1000', '0', '1000', '2', '1000', '4000', '25/05/2024', 'Cash', '23/05/2024', '25/05/2024', '12:00am', '11:00pm'),
('I0089', 'Select', '123456', '102', '1000', '0', '1000', '3', '3000', '7000', '08-06-2024', 'Cash', '04-06-2024', '08-06-2024', '10:16AM', '9:00Am');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` varchar(20) DEFAULT NULL,
  `hotelcode` varchar(20) DEFAULT NULL,
  `guestid` varchar(20) DEFAULT NULL,
  `roomno` varchar(20) DEFAULT NULL,
  `deppayment` varchar(30) DEFAULT NULL,
  `roomchg` varchar(20) DEFAULT NULL,
  `checkindate` varchar(20) DEFAULT NULL,
  `checkoutdate` varchar(20) DEFAULT NULL,
  `checkintime` varchar(20) DEFAULT NULL,
  `checkouttime` varchar(20) DEFAULT NULL,
  `numofadult` varchar(20) DEFAULT NULL,
  `numofchild` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `hotelcode`, `guestid`, `roomno`, `deppayment`, `roomchg`, `checkindate`, `checkoutdate`, `checkintime`, `checkouttime`, `numofadult`, `numofchild`) VALUES
('B001', '012', '2345', '101', '2000', '5000', '13/04/2024', '15/04/2024', '7:00am', '12:00PM', '2', '2'),
('B003', '012', '1234', '102', '0', '1000', '23/05/2024', '08-06-2024', '12:00am', '9:00Am', '2', '0'),
('B023', '012', '123456', '102', '0', '1000', '04-06-2024', '08-06-2024', '10:16AM', '9:00Am', '2', '0'),
('B013', '012', 'G001', '101', '1000', '3000', '23/06/2024', '0', '12:00AM', '0', '2', '0'),
('6 ', '012', ' ', 'Select', 'bh', '', '', '', '', '', '', ''),
('46', '012', '67', '102', '100', '1000', '14-1-2025', '0', '12:00', '0', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeid` varchar(20) DEFAULT NULL,
  `hotelcode` varchar(20) DEFAULT NULL,
  `roleid` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeid`, `hotelcode`, `roleid`, `firstname`, `lastname`, `dob`, `gender`, `phoneno`, `email`, `password`, `salary`) VALUES
('2', '012', '1', 'Rani ', 'kumari', '12/08/1997', 'Female', '12345', 'rani@gmail.com', '12345', '12000');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id_type` varchar(20) DEFAULT NULL,
  `guestidno` varchar(20) DEFAULT NULL,
  `guesttit` varchar(20) DEFAULT NULL,
  `firstname` varchar(40) DEFAULT NULL,
  `lastname` varchar(40) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id_type`, `guestidno`, `guesttit`, `firstname`, `lastname`, `gender`, `dob`, `phoneno`, `email`, `address`, `city`, `country`) VALUES
('Aadhar card', '12345', 'MR', 'amit', 'kumar', 'Male', '12/08/1987', '12345', 'keshri', 'saraihhh', 'vasali', 'india'),
('Aadhar card', '1234', 'MR', 'Prince', 'Kumar', 'Male', '12/08/1999', '8227874217', 'prince234@gamil.com', 'abc', 'patna', 'india'),
('Aadhar card', '5555555555555', 'MR', '56', '666', '', 'hg', 'j', 'uj', 'hyj', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelcode` varchar(20) DEFAULT NULL,
  `hotelname` varchar(40) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `numberofroom` varchar(20) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `star_rating` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelcode`, `hotelname`, `address`, `postcode`, `city`, `country`, `numberofroom`, `phone_no`, `star_rating`) VALUES
('012', 'Grand', 'CDA', '800024', 'Patna', 'India', '12', '123457', '4');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `logid` varchar(100) DEFAULT NULL,
  `logpwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`logid`, `logpwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `onlinebooking`
--

CREATE TABLE `onlinebooking` (
  `your_name` varchar(30) DEFAULT NULL,
  `mobile_num` varchar(20) DEFAULT NULL,
  `aadhar_num` varchar(20) DEFAULT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `booking_date` varchar(20) DEFAULT NULL,
  `booking_time` varchar(20) DEFAULT NULL,
  `num_of_people` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onlinebooking`
--

INSERT INTO `onlinebooking` (`your_name`, `mobile_num`, `aadhar_num`, `room_type`, `booking_date`, `booking_time`, `num_of_people`) VALUES
('vhv', '77668', '7878678', 'Non-Ac', 'jh', 'bnm', '8768'),
('yht', '6545645645', '46', 'Non-Ac', '6444', '66666', '3');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` varchar(20) DEFAULT NULL,
  `roletitle` varchar(20) DEFAULT NULL,
  `roledescription` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `roletitle`, `roledescription`) VALUES
('1', 'food', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomno` varchar(10) DEFAULT NULL,
  `roomtype` varchar(40) DEFAULT NULL,
  `roomcharge` varchar(30) DEFAULT NULL,
  `hotelcode` varchar(20) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `roomstatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomno`, `roomtype`, `roomcharge`, `hotelcode`, `description`, `status`, `roomstatus`) VALUES
('102', 'Non-Ac', '1000', 'H-12', 'Single-Bed', 'Book', 'Cleaned'),
('101', 'AC', '3000', 'H-12', 'Double-Bed', 'Book', 'Cleaned'),
('105', 'Non-ac', '2000', 'H-12', 'Single-Bed', 'Unbook', 'Cleaned');

-- --------------------------------------------------------

--
-- Table structure for table `roomstatus`
--

CREATE TABLE `roomstatus` (
  `roomno` varchar(30) DEFAULT NULL,
  `rmtype` varchar(40) DEFAULT NULL,
  `roomstatus` varchar(30) DEFAULT NULL,
  `roleid` varchar(20) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomstatus`
--

INSERT INTO `roomstatus` (`roomno`, `rmtype`, `roomstatus`, `roleid`, `date`, `time`) VALUES
('101', 'Ac', 'Uncleaned', 'R001', '22/11/2023', '2:00PM'),
('102', 'Non-Ac', 'Cleaned', 'R002', '18/4/2023', '12:00PM'),
('102', 'Non-Ac', 'Unleaned', 'R001', '22/10/2023', '5:00PM'),
('102', 'Non-Ac', 'Cleaned', 'R002', '27/11/2023', '5:00PM'),
('101', 'Ac', 'Cleaned', 'R002', '17/11/2023', '2:00'),
('101', 'Ac', 'Cleaned', 'R001', '27/11/2023', '2:00PM'),
('101', 'Ac', 'Cleaned', 'R002', '29/11/2023', '2:00Pm'),
('101', 'Ac', 'Cleaned', '102', '11/12/2023', '5:00PM'),
('102', 'Non-Ac', 'Cleaned', 'R002', '28/12/2023', '6:00'),
('101', '', '', '', '', ''),
('102', 'Non-Ac', 'Cleaned', 'R001', '09-03-2024', '2:00pm'),
('101', 'AC', 'Cleaned', 'R001', '15/04/2024', '2:00PM'),
('102', 'Non-Ac', 'Cleaned', 'R001', '25/05/2024', '4:00pm'),
('102', 'Non-Ac', 'Cleaned', 'R001', '08-06-2024', '02:00PM');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
