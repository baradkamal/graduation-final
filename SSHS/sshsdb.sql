-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 08:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sshsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `City_Id` int(4) NOT NULL,
  `State_Id` int(2) NOT NULL,
  `City_Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE `complaint_master` (
  `Complaint_id` int(4) NOT NULL,
  `Complaint_sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_master`
--

INSERT INTO `complaint_master` (`Complaint_id`, `Complaint_sub`) VALUES
(1, 'text complaint'),
(11, 'Water leakage'),
(12, 'Electricity issues'),
(13, 'Maintenance problem'),
(14, 'Security issues'),
(15, 'Noise pollution'),
(16, 'Parking issues'),
(17, 'Garbage disposal iss'),
(18, 'Unauthorized constru'),
(19, 'Illegal parking'),
(20, 'Non-functional lift'),
(21, 'Elevator breakdown'),
(22, 'Intercom not working'),
(23, 'Damage to property');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_transaction`
--

CREATE TABLE `complaint_transaction` (
  `C_id` int(4) NOT NULL,
  `Complaint_id` int(3) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Complaint_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User_id` int(4) NOT NULL,
  `Complaint_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint_transaction`
--

INSERT INTO `complaint_transaction` (`C_id`, `Complaint_id`, `Description`, `Complaint_time`, `User_id`, `Complaint_Status`) VALUES
(23, 11, 'there is water leakage in user flat ', '2023-03-25 17:21:41', 41, 2),
(24, 13, 'dfdgdf', '2023-03-26 08:13:35', 41, 2),
(25, 14, 'this is tesing date 20-03', '2023-03-25 17:13:48', 41, 0),
(26, 15, 'this is tesing ', '2023-03-25 08:12:12', 44, 1),
(28, 12, 'Not properly working', '2023-03-25 17:49:12', 47, 2),
(29, 21, 'Not working properly ', '2023-03-25 08:28:31', 41, 1),
(31, 1, 'this is test', '2023-03-26 11:34:40', 44, 1),
(32, 11, 'is there water leakage issue in house', '2023-03-26 11:35:49', 44, 1),
(33, 18, 'in our housing society Unauthorized construction ', '2023-03-26 12:54:03', 44, 1),
(34, 17, 'for garbage issue', '2023-03-27 04:54:32', 47, 1),
(35, 14, 'security purpose', '2023-03-27 06:08:46', 44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `Contact_id` int(4) NOT NULL,
  `Contact_name` varchar(50) NOT NULL,
  `Contact_type` varchar(20) NOT NULL,
  `Contact_number` varchar(20) NOT NULL,
  `Contact_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`Contact_id`, `Contact_name`, `Contact_type`, `Contact_number`, `Contact_email`) VALUES
(1, 'John Doe', 'Chairman', '9876543210', 'john.doe@example.com'),
(2, 'Jane Smith', 'Secretary', '8765432109', 'jane.smith@example.com'),
(3, 'Bob Johnson', 'Security', '7654321098', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guest_master`
--

CREATE TABLE `guest_master` (
  `Guest_Details_id` int(4) NOT NULL,
  `Guest_Type` varchar(10) NOT NULL,
  `Guest_Fname` varchar(15) NOT NULL,
  `Guest_Mname` varchar(20) NOT NULL,
  `Guest_Lname` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_master`
--

INSERT INTO `guest_master` (`Guest_Details_id`, `Guest_Type`, `Guest_Fname`, `Guest_Mname`, `Guest_Lname`) VALUES
(1, 'Type1', 'John', 'Doe', 'Smith'),
(2, 'New', 'kamal', '', ''),
(3, 'New', 'kamal', '', ''),
(4, 'New', 'kama rajendrajb', '', ''),
(5, 'New', 'kama rajendrajb', '', ''),
(6, 'New', 'jalpa', '', ''),
(7, 'New', 'kama', 'rajendrajbhai', 'barad'),
(8, 'New', 'nirali', 'joshi', ''),
(9, 'New', 'jalpa', 'ram', 'gohil'),
(10, 'New', 'kama', 'rajendrajbhai', 'barad'),
(11, 'New', 'jalpa', 'gohil', ''),
(12, 'New', 'deshal', 'dave', ''),
(13, 'New', 'kapil', '', ''),
(14, 'New', 'deshal', '', ''),
(15, 'New', 'harshal', '', ''),
(16, 'New', 'harshal', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guest_transaction`
--

CREATE TABLE `guest_transaction` (
  `Guest_id` int(4) NOT NULL,
  `Guest_details_id` int(4) NOT NULL,
  `Entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Exit_time` datetime NOT NULL,
  `pin` int(4) NOT NULL,
  `House_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest_transaction`
--

INSERT INTO `guest_transaction` (`Guest_id`, `Guest_details_id`, `Entry_time`, `Exit_time`, `pin`, `House_no`) VALUES
(1, 1, '2023-03-07 04:30:00', '2023-03-07 12:00:00', 1234, 101),
(2, 2, '2023-03-08 14:57:31', '0000-00-00 00:00:00', 0, 208),
(3, 4, '2023-03-08 16:01:59', '0000-00-00 00:00:00', 2, 208),
(4, 5, '2023-03-09 21:31:28', '2023-03-10 03:01:28', 3, 208),
(5, 6, '2023-03-22 12:45:51', '2023-03-22 18:15:51', 4, 67),
(6, 7, '2023-03-19 19:29:41', '2023-03-20 00:59:41', 5, 201),
(7, 8, '2023-03-19 19:29:28', '2023-03-20 00:59:28', 6, 208),
(8, 9, '2023-03-09 21:25:52', '2023-03-10 02:55:52', 7, 67),
(9, 10, '2023-03-09 21:23:45', '2023-03-10 02:53:45', 11, 201),
(10, 11, '2023-03-09 21:05:51', '2023-03-10 02:35:51', 12, 67),
(11, 12, '2023-03-09 20:32:58', '2023-03-10 02:02:58', 15, 102),
(12, 13, '2023-03-09 20:32:33', '2023-03-10 02:02:33', 16, 55),
(13, 14, '2023-03-26 19:33:16', '2023-03-27 01:03:16', 17, 24),
(14, 15, '2023-03-27 05:10:15', '2023-03-27 10:40:15', 70, 202),
(15, 16, '2023-03-27 05:09:45', '0000-00-00 00:00:00', 81, 202);

-- --------------------------------------------------------

--
-- Table structure for table `house_link`
--

CREATE TABLE `house_link` (
  `House_no` int(4) NOT NULL,
  `User_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `house_master`
--

CREATE TABLE `house_master` (
  `House_No` int(4) NOT NULL,
  `Ward_No` int(4) NOT NULL,
  `Flat_No` int(4) NOT NULL,
  `Floor_No` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_master`
--

INSERT INTO `house_master` (`House_No`, `Ward_No`, `Flat_No`, `Floor_No`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 1, 2),
(4, 1, 1, 2),
(5, 1, 1, 3),
(6, 1, 1, 3),
(7, 1, 1, 4),
(8, 1, 1, 4),
(9, 1, 1, 5),
(10, 1, 1, 5),
(11, 1, 2, 1),
(12, 1, 2, 1),
(13, 1, 2, 2),
(14, 1, 2, 2),
(15, 1, 2, 3),
(16, 1, 2, 3),
(17, 1, 2, 4),
(18, 1, 2, 4),
(19, 1, 2, 5),
(20, 1, 2, 5),
(21, 1, 3, 1),
(22, 1, 3, 1),
(23, 1, 3, 2),
(24, 1, 3, 2),
(25, 1, 3, 3),
(26, 1, 3, 3),
(27, 1, 3, 4),
(28, 1, 3, 4),
(29, 1, 3, 5),
(30, 1, 3, 5),
(31, 1, 4, 1),
(32, 1, 4, 1),
(33, 1, 4, 2),
(34, 1, 4, 2),
(35, 1, 4, 3),
(36, 1, 4, 3),
(37, 1, 4, 4),
(38, 1, 4, 4),
(39, 1, 4, 5),
(40, 1, 4, 5),
(41, 1, 5, 1),
(42, 1, 5, 1),
(43, 1, 5, 2),
(44, 1, 5, 2),
(45, 1, 5, 3),
(46, 1, 5, 3),
(47, 1, 5, 4),
(48, 1, 5, 4),
(49, 1, 5, 5),
(50, 1, 5, 5),
(51, 2, 1, 1),
(52, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notice_master`
--

CREATE TABLE `notice_master` (
  `Notice_id` int(3) NOT NULL,
  `Notice_sub` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_master`
--

INSERT INTO `notice_master` (`Notice_id`, `Notice_sub`) VALUES
(4, 'this is 1'),
(5, 'society meeting'),
(6, 'Annual general meeti'),
(7, '31stparty');

-- --------------------------------------------------------

--
-- Table structure for table `notice_transaction`
--

CREATE TABLE `notice_transaction` (
  `N_id` int(4) NOT NULL,
  `Notice_id` int(3) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Notice_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User_id` int(4) NOT NULL,
  `Notice_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice_transaction`
--

INSERT INTO `notice_transaction` (`N_id`, `Notice_id`, `Description`, `Notice_time`, `User_id`, `Notice_Status`) VALUES
(4, 4, 'this is testing one', '2023-03-22 18:01:30', 41, 1),
(5, 5, 'about conustruction', '2023-03-25 08:33:32', 41, 1),
(6, 6, 'for general purpose', '2023-03-27 04:57:32', 41, 1),
(7, 7, 'party planning', '2023-03-27 05:36:05', 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_booking_transaction`
--

CREATE TABLE `property_booking_transaction` (
  `Booking_id` int(4) NOT NULL,
  `User_id` int(4) DEFAULT NULL,
  `Property_id` int(3) NOT NULL,
  `Booking_time` timestamp NULL DEFAULT NULL,
  `Booking_end_time` timestamp NULL DEFAULT NULL,
  `Booking_Description` varchar(100) NOT NULL,
  `P_booking_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_booking_transaction`
--

INSERT INTO `property_booking_transaction` (`Booking_id`, `User_id`, `Property_id`, `Booking_time`, `Booking_end_time`, `Booking_Description`, `P_booking_Status`) VALUES
(23, 44, 11, '2023-03-26 05:58:00', '2023-04-02 20:12:00', 'booking for testing', 0),
(24, 44, 10, '2023-03-25 06:30:00', '2023-03-25 20:04:00', 'book for function', 0),
(25, 44, 11, '2023-03-28 11:15:00', '2023-03-31 11:15:00', 'book for Family vacation', 0),
(27, 44, 9, '2023-03-26 11:15:00', '2023-03-27 11:15:00', 'Birthday Party', 0),
(28, 47, 19, '2023-03-28 14:00:00', '2023-03-26 19:00:00', 'party', 0),
(29, 47, 12, '2023-03-27 01:04:00', '2023-03-27 01:11:00', 'exercise', 0),
(30, 44, 13, '2023-03-28 08:09:00', '2023-03-28 09:10:00', 'play games', 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_master`
--

CREATE TABLE `property_master` (
  `Property_id` int(2) NOT NULL,
  `Property_Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_master`
--

INSERT INTO `property_master` (`Property_id`, `Property_Name`) VALUES
(9, 'Common Area'),
(10, 'Garden'),
(11, 'Swimming Pool'),
(12, 'Gymnasium'),
(13, 'Clubhouse'),
(14, 'Playground'),
(15, 'Lawn Tennis Cou'),
(16, 'Basketball Cour'),
(17, 'Squash Court'),
(18, 'Indoor Games Ro'),
(19, 'Party Hall'),
(20, 'Jogging Track'),
(21, 'Children Play A'),
(22, 'Amphitheatre');

-- --------------------------------------------------------

--
-- Table structure for table `register_master`
--

CREATE TABLE `register_master` (
  `Register_id` int(4) NOT NULL,
  `Register_Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_master`
--

INSERT INTO `register_master` (`Register_id`, `Register_Type`) VALUES
(2, 'Society Registration'),
(3, 'Society Bylaws'),
(4, 'Society Meeting Minu'),
(5, 'Society Account Book'),
(6, 'Society Audit Report'),
(7, 'Maintenance Register'),
(8, 'Security Register'),
(9, 'Complaints Register'),
(10, 'Visitor Register'),
(11, 'Minutes of General M');

-- --------------------------------------------------------

--
-- Table structure for table `register_transaction`
--

CREATE TABLE `register_transaction` (
  `R_id` int(4) NOT NULL,
  `Register_id` int(3) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `File` varchar(255) DEFAULT NULL,
  `Register_Upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `User_id` int(4) DEFAULT NULL,
  `Register_Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_transaction`
--

INSERT INTO `register_transaction` (`R_id`, `Register_id`, `Description`, `File`, `Register_Upload_time`, `User_id`, `Register_Status`) VALUES
(2, 4, '640', NULL, '2023-03-24 08:45:03', NULL, 1),
(3, 3, '640', NULL, '2023-03-24 08:45:03', NULL, 1),
(4, 3, '640', NULL, '2023-03-24 08:45:03', NULL, 1),
(6, 3, '0', NULL, '2023-03-24 08:45:03', NULL, 1),
(7, 3, '0', NULL, '2023-03-24 08:45:03', NULL, 1),
(8, 2, '0', NULL, '2023-03-24 08:45:03', NULL, 1),
(9, 2, '640', NULL, '2023-03-24 08:45:03', NULL, 1),
(10, 2, '640', NULL, '2023-03-10 19:49:38', 41, 1),
(11, 2, '640', NULL, '2023-03-10 19:57:13', 41, 1),
(12, 2, '640', NULL, '2023-03-10 19:58:03', 41, 1),
(13, 2, '640', NULL, '2023-03-10 19:58:22', 41, 1),
(14, 2, '640', NULL, '2023-03-10 20:01:00', 41, 1),
(15, 4, '640', NULL, '2023-03-10 20:03:42', 41, 1),
(16, 4, '415063', NULL, '2023-03-24 08:45:03', NULL, 1),
(17, 4, '0', '9488a249_Your paragraph text.jpg', '2023-03-24 08:45:03', NULL, 1),
(18, 10, '0', '79c60e10_logo3.jpg', '2023-03-10 20:20:06', 41, 1),
(19, 5, '0', 'cb29bf41_SoftwareTestingAllUnit.pps.pdf', '2023-03-10 20:24:16', 41, 1),
(20, 5, '0', '6bdc8e64_SoftwareTestingAllUnit.pps.pdf', '2023-03-10 20:28:33', 41, 1),
(21, 5, '0', '04185b06_SoftwareTestingAllUnit.pps.pdf', '2023-03-10 20:29:00', 41, 1),
(22, 5, '0', '20fed2bf_SoftwareTestingAllUnit.pps.pdf', '2023-03-10 20:29:07', 41, 1),
(23, 5, '0', '313a6f7e_SECUSOC.png', '2023-03-24 08:45:03', NULL, 1),
(24, 5, '0', 'e7edd06a_SECUSOC.png', '2023-03-24 08:45:03', NULL, 1),
(25, 7, '0', 'bfe7e582_2-removebg-preview.png', '2023-03-24 08:45:03', NULL, 1),
(26, 7, 'sdfsdf', 'b85bc7b2_2-removebg-preview.png', '2023-03-24 08:45:03', NULL, 1),
(27, 10, 'this is testing file so user create ', 'b5a023a5_tmp69hrfquq.png', '2023-03-10 22:11:25', 41, 1),
(29, 9, 'this is vender report', '3e15ea2d_BCA Sem-VI Dt.05-04-2023.pdf', '2023-03-22 09:11:06', 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `Role_id` int(4) NOT NULL,
  `Role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`Role_id`, `Role_name`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Security');

-- --------------------------------------------------------

--
-- Table structure for table `staff_link`
--

CREATE TABLE `staff_link` (
  `Staff_id` int(4) NOT NULL,
  `House_no` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_master`
--

CREATE TABLE `staff_master` (
  `Staff_details_id` int(4) NOT NULL,
  `Staff_type` varchar(10) NOT NULL,
  `Staff_Fname` varchar(15) NOT NULL,
  `Staff_Mname` varchar(20) NOT NULL,
  `Staff_Lname` varchar(15) NOT NULL,
  `Staff_Mobile_no` int(10) NOT NULL,
  `PassCode` int(4) NOT NULL,
  `Staff_AdharNo` int(12) NOT NULL,
  `Staff_Designation` varchar(10) NOT NULL,
  `Address` varchar(70) NOT NULL,
  `Alternate_Address` varchar(70) NOT NULL,
  `Address_Area` varchar(10) NOT NULL,
  `City_Id` int(4) NOT NULL,
  `Emergancy_Contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_master`
--

INSERT INTO `staff_master` (`Staff_details_id`, `Staff_type`, `Staff_Fname`, `Staff_Mname`, `Staff_Lname`, `Staff_Mobile_no`, `PassCode`, `Staff_AdharNo`, `Staff_Designation`, `Address`, `Alternate_Address`, `Address_Area`, `City_Id`, `Emergancy_Contact_no`) VALUES
(1, 'Maintenanc', 'kamal', 'rajendrabhai', 'barad', 2147483647, 1234, 2147483647, 'graduation', 'ahemdabad', '0', '0', 382721, 2147483647),
(2, 'Gardeners', 'dev', 'rameshbhai', 'patel', 2147483647, 12345, 2147483647, 'Post gradu', 'ahemdabad', 'kalol', 'subhsukra', 382721, 2147483647),
(3, 'Accountant', 'sundar', 'tarak', 'patel', 2147483647, 123456, 2147483647, 'Post gradu', 'ahemdabad', '0', '0', 382721, 2147483647),
(4, 'Maintenanc', 'sundar', 'prakash', 'darbar', 2147483647, 55555, 2147483647, 'Post gradu', 'ahemdabad', '0', '0', 382721, 2147483647),
(5, 'Clerk', 'dev', 'rameshbhai', 'patel', 2147483647, 77777, 2147483647, 'Post gradu', 'ahemdabad', '0', '0', 382721, 2147483647),
(6, 'Maintenanc', 'sundar', 'prakash', 'darbar', 2147483647, 85648, 2147483647, 'graduation', 'ahemdabad', '0', '0', 382721, 2147483647),
(7, 'Clerk', 'kamal', 'rajendrabhai', 'barad', 2147483647, 4565, 2147483647, 'Post gradu', 'ahemdabad', '0', '0', 382721, 2147483647),
(8, 'Maintenanc', 'bhaveshpuri', 'sukhdevpur', 'puri', 2147483647, 44856, 2147483647, 'phd', 'ahemdabad', '0', '0', 382721, 2147483647),
(9, 'Clerk', 'sundar', 'prakash', 'darbar', 2147483647, 666585, 2147483647, 'phd', 'ahemdabad', '0', '0', 382721, 2147483647),
(10, 'Clerk', 'sundar', 'prakash', 'darbar', 2147483647, 666585, 2147483647, 'phd', 'ahemdabad', '0', '0', 382721, 2147483647),
(11, 'Gardeners', 'sundar', 'prakash', 'darbar', 2147483647, 12365, 2147483647, 'graduation', 'ahemdabad', '0', '0', 382721, 2147483647),
(12, 'Maintenanc', 'sundar', 'prakash', 'darbar', 2147483647, 665231, 2147483647, 'Post gradu', 'ahemdabad', '0', '0', 382721, 2147483647),
(13, 'Gardeners', 'kartik', 'manish', 'goenka', 2147483647, 100001, 2147483647, 'B.com', 'ahmedabad', '0', '0', 39007, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `staff_transaction`
--

CREATE TABLE `staff_transaction` (
  `Staff_id` int(4) NOT NULL,
  `Staff_details_id` int(4) NOT NULL,
  `Entry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Exit_time` datetime NOT NULL,
  `House_no` int(4) NOT NULL,
  `Staff_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_transaction`
--

INSERT INTO `staff_transaction` (`Staff_id`, `Staff_details_id`, `Entry_time`, `Exit_time`, `House_no`, `Staff_status`) VALUES
(1, 1, '2023-03-26 14:41:15', '0000-00-00 00:00:00', 208, 1),
(2, 1, '2023-03-26 14:42:01', '0000-00-00 00:00:00', 24, 1),
(3, 4, '2023-03-26 19:33:24', '2023-03-27 01:03:24', 80, 1),
(4, 13, '2023-03-27 01:46:10', '0000-00-00 00:00:00', 205, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `State_id` int(4) NOT NULL,
  `State_Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `User_id` int(4) NOT NULL,
  `User_Type` varchar(8) NOT NULL,
  `House_no` int(3) NOT NULL,
  `User_Fname` varchar(15) NOT NULL,
  `User_Mname` varchar(25) NOT NULL,
  `User_Lname` varchar(15) NOT NULL,
  `User_Mobile_no` bigint(20) DEFAULT NULL,
  `Username` varchar(20) NOT NULL,
  `Passward` varchar(16) NOT NULL,
  `User_Email` varchar(30) NOT NULL,
  `User_Address` varchar(70) NOT NULL,
  `Alternate_Address` varchar(70) NOT NULL,
  `City_Id` varchar(5) NOT NULL,
  `User_Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`User_id`, `User_Type`, `House_no`, `User_Fname`, `User_Mname`, `User_Lname`, `User_Mobile_no`, `Username`, `Passward`, `User_Email`, `User_Address`, `Alternate_Address`, `City_Id`, `User_Status`) VALUES
(15, 'Admin', 1001, 'ila', 'rajendrabhai', 'barad', 2147483647, 'ila', 'kamal@123', 'kamal@google.com', 'kalol ravidas society k', 'kalol ravidas society www', 'kalol', 1),
(41, 'Member', 208, 'jalpa', 'gohil', 'gohil', 9727936761, 'jalpa', 'jalpa', 'jalpa@gmail.com', 'jalpa umiya college', 'ahemdabad', '38271', 0),
(43, 'Admin', 80, 'admin', 'a', 'a', 9715265854, 'Admin', 'Admin@_123', 'admin@gmail.com', 'ahemdabad vastrapur', 'ahemdabad vastrapur', '38354', 1),
(44, 'Member', 81, 'member', 'b', 'b', 9715265854, 'Member', 'Member@_123', 'member@gmail.com', 'ahemdabad ranip', 'ranip', '38354', 1),
(45, 'Security', 82, 'Security', 'c', 'c', 9715265854, 'Security', 'Security@_123', 'Security@gmail.com', 'ahmedabad india', 'ahmedabad gujarat', '38354', 1),
(46, 'Member', 78, 'nirali', 'joshi', 'A', 9898235685, 'Nirali024', 'Nirali@_123', 'nirali@gmail.com', 'vastrapur', 'surat', '38276', 1),
(47, 'Member', 7, 'Nirali', 'Alpeshkumar', 'Joshi', 6353634972, 'Nir123', 'Nir@123ali', 'nir@gmail.com', 'Satellite', 'Surat', '38001', 0),
(48, 'admin', 97, 'this', 'is', 'tesing', 4656068565, 'tesingk', 'testing@123', 'tesing@gmail.com', 'tesing address', 'anoehre', '38272', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_master`
--

CREATE TABLE `vendor_master` (
  `Vendor_id` int(4) NOT NULL,
  `Vendor_name` varchar(50) NOT NULL,
  `Vendor_type` varchar(20) NOT NULL,
  `Vendor_contact` varchar(20) NOT NULL,
  `Vendor_email` varchar(50) DEFAULT NULL,
  `Vendor_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor_master`
--

INSERT INTO `vendor_master` (`Vendor_id`, `Vendor_name`, `Vendor_type`, `Vendor_contact`, `Vendor_email`, `Vendor_address`) VALUES
(1, 'ABC Plumbing', 'Plumber', '9876543210', 'abcplumbing@example.com', '123 Main Street'),
(2, 'XYZ Electric', 'Electrician', '8765432109', 'xyzelectric@example.com', '456 Broad Avenue'),
(3, 'PQR Housekeeping', 'Housekeeping', '7654321098', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`City_Id`),
  ADD KEY `State_id_fk` (`State_Id`);

--
-- Indexes for table `complaint_master`
--
ALTER TABLE `complaint_master`
  ADD PRIMARY KEY (`Complaint_id`);

--
-- Indexes for table `complaint_transaction`
--
ALTER TABLE `complaint_transaction`
  ADD PRIMARY KEY (`C_id`),
  ADD KEY `complaint_m_fk` (`Complaint_id`),
  ADD KEY `user_mas_fk` (`User_id`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`Contact_id`);

--
-- Indexes for table `guest_master`
--
ALTER TABLE `guest_master`
  ADD PRIMARY KEY (`Guest_Details_id`);

--
-- Indexes for table `guest_transaction`
--
ALTER TABLE `guest_transaction`
  ADD PRIMARY KEY (`Guest_id`),
  ADD KEY `Guest_fk` (`Guest_details_id`);

--
-- Indexes for table `house_link`
--
ALTER TABLE `house_link`
  ADD KEY `house_fk` (`House_no`),
  ADD KEY `user_fk` (`User_id`);

--
-- Indexes for table `house_master`
--
ALTER TABLE `house_master`
  ADD PRIMARY KEY (`House_No`);

--
-- Indexes for table `notice_master`
--
ALTER TABLE `notice_master`
  ADD PRIMARY KEY (`Notice_id`);

--
-- Indexes for table `notice_transaction`
--
ALTER TABLE `notice_transaction`
  ADD PRIMARY KEY (`N_id`),
  ADD KEY `notice_m_fk` (`Notice_id`),
  ADD KEY `user_m_fk` (`User_id`);

--
-- Indexes for table `property_booking_transaction`
--
ALTER TABLE `property_booking_transaction`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `property_fk` (`Property_id`),
  ADD KEY `user_pro_fk` (`User_id`);

--
-- Indexes for table `property_master`
--
ALTER TABLE `property_master`
  ADD PRIMARY KEY (`Property_id`);

--
-- Indexes for table `register_master`
--
ALTER TABLE `register_master`
  ADD PRIMARY KEY (`Register_id`);

--
-- Indexes for table `register_transaction`
--
ALTER TABLE `register_transaction`
  ADD PRIMARY KEY (`R_id`),
  ADD KEY `register_fk` (`Register_id`),
  ADD KEY `new_r_user_fk` (`User_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`Role_id`);

--
-- Indexes for table `staff_link`
--
ALTER TABLE `staff_link`
  ADD KEY `Staff_tra_fk` (`Staff_id`),
  ADD KEY `House_mas_fk` (`House_no`);

--
-- Indexes for table `staff_master`
--
ALTER TABLE `staff_master`
  ADD PRIMARY KEY (`Staff_details_id`);

--
-- Indexes for table `staff_transaction`
--
ALTER TABLE `staff_transaction`
  ADD PRIMARY KEY (`Staff_id`),
  ADD KEY `Staff_fk` (`Staff_details_id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`State_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `vendor_master`
--
ALTER TABLE `vendor_master`
  ADD PRIMARY KEY (`Vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `City_Id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint_master`
--
ALTER TABLE `complaint_master`
  MODIFY `Complaint_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `complaint_transaction`
--
ALTER TABLE `complaint_transaction`
  MODIFY `C_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `Contact_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest_master`
--
ALTER TABLE `guest_master`
  MODIFY `Guest_Details_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `guest_transaction`
--
ALTER TABLE `guest_transaction`
  MODIFY `Guest_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `house_master`
--
ALTER TABLE `house_master`
  MODIFY `House_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `notice_master`
--
ALTER TABLE `notice_master`
  MODIFY `Notice_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notice_transaction`
--
ALTER TABLE `notice_transaction`
  MODIFY `N_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `property_booking_transaction`
--
ALTER TABLE `property_booking_transaction`
  MODIFY `Booking_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `property_master`
--
ALTER TABLE `property_master`
  MODIFY `Property_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register_master`
--
ALTER TABLE `register_master`
  MODIFY `Register_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `register_transaction`
--
ALTER TABLE `register_transaction`
  MODIFY `R_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `Role_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `staff_master`
--
ALTER TABLE `staff_master`
  MODIFY `Staff_details_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff_transaction`
--
ALTER TABLE `staff_transaction`
  MODIFY `Staff_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `State_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `User_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `vendor_master`
--
ALTER TABLE `vendor_master`
  MODIFY `Vendor_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint_transaction`
--
ALTER TABLE `complaint_transaction`
  ADD CONSTRAINT `complaint_m_fk` FOREIGN KEY (`Complaint_id`) REFERENCES `complaint_master` (`Complaint_id`),
  ADD CONSTRAINT `user_mas_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`);

--
-- Constraints for table `guest_transaction`
--
ALTER TABLE `guest_transaction`
  ADD CONSTRAINT `Guest_fk` FOREIGN KEY (`Guest_details_id`) REFERENCES `guest_master` (`Guest_Details_id`);

--
-- Constraints for table `house_link`
--
ALTER TABLE `house_link`
  ADD CONSTRAINT `House_fk` FOREIGN KEY (`House_no`) REFERENCES `house_master` (`House_No`),
  ADD CONSTRAINT `User_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`);

--
-- Constraints for table `notice_transaction`
--
ALTER TABLE `notice_transaction`
  ADD CONSTRAINT `notice_m_fk` FOREIGN KEY (`Notice_id`) REFERENCES `notice_master` (`Notice_id`),
  ADD CONSTRAINT `user_m_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`);

--
-- Constraints for table `property_booking_transaction`
--
ALTER TABLE `property_booking_transaction`
  ADD CONSTRAINT `property_fk` FOREIGN KEY (`Property_id`) REFERENCES `property_master` (`Property_id`),
  ADD CONSTRAINT `user_pro_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`) ON DELETE CASCADE;

--
-- Constraints for table `register_transaction`
--
ALTER TABLE `register_transaction`
  ADD CONSTRAINT `new_r_user_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `r_user_fk` FOREIGN KEY (`User_id`) REFERENCES `user_master` (`User_id`),
  ADD CONSTRAINT `register_fk` FOREIGN KEY (`Register_id`) REFERENCES `register_master` (`Register_id`);

--
-- Constraints for table `staff_link`
--
ALTER TABLE `staff_link`
  ADD CONSTRAINT `House_mas_fk` FOREIGN KEY (`House_no`) REFERENCES `house_master` (`House_No`),
  ADD CONSTRAINT `Staff_tra_fk` FOREIGN KEY (`Staff_id`) REFERENCES `staff_transaction` (`Staff_id`);

--
-- Constraints for table `staff_transaction`
--
ALTER TABLE `staff_transaction`
  ADD CONSTRAINT `Staff_fk` FOREIGN KEY (`Staff_details_id`) REFERENCES `staff_master` (`Staff_details_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
