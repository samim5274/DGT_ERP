-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 02:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgtdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendence`
--

CREATE TABLE `tb_attendence` (
  `Id` int(11) NOT NULL,
  `E_Id` int(11) NOT NULL,
  `A_Date` date NOT NULL,
  `A_Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bankdetail`
--

CREATE TABLE `tb_bankdetail` (
  `Id` int(11) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `AccountHolderName` varchar(255) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bankdetail`
--

INSERT INTO `tb_bankdetail` (`Id`, `AccountNumber`, `AccountHolderName`, `Remark`) VALUES
(1, 'DBBL348763', 'Shamim Hossain', NULL),
(2, 'CBL4873639484', 'Shamim Hossain', NULL),
(3, 'FSIB937463836483', 'Biswajit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_banktobanktransectiondetail`
--

CREATE TABLE `tb_banktobanktransectiondetail` (
  `Id` int(11) NOT NULL,
  `FromAccount` varchar(255) DEFAULT NULL,
  `ToAccount` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `EId` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_banktobanktransectiondetail`
--

INSERT INTO `tb_banktobanktransectiondetail` (`Id`, `FromAccount`, `ToAccount`, `Date`, `Amount`, `EId`, `Remark`) VALUES
(1, 'CBL4873639484', 'DBBL348763', '2024-02-07', 500000, 2, '!Nothing'),
(2, 'DBBL348763', 'FSIB937463836483', '2024-02-07', 100000, 11, '!Nothing'),
(3, 'FSIB937463836483', 'CBL4873639484', '2024-02-07', 120000, 15, ''),
(4, 'DBBL348763', 'FSIB937463836483', '2024-02-07', 50000, 16, ''),
(5, 'DBBL348763', 'CBL4873639484', '2024-02-07', 30000, 17, ''),
(6, 'DBBL348763', 'FSIB937463836483', '2024-02-07', 600000, 16, ''),
(7, 'FSIB937463836483', 'DBBL348763', '2024-02-07', 70000, 2, ''),
(8, 'FSIB937463836483', 'DBBL348763', '2024-02-07', 5000, 1, '!Nothing'),
(9, 'DBBL348763', 'CBL4873639484', '2024-02-07', 10000, 1, ''),
(10, 'CBL4873639484', 'DBBL348763', '2024-02-08', 50000, 2, ''),
(11, 'FSIB937463836483', 'CBL4873639484', '2024-02-08', 30000, 11, ''),
(12, 'DBBL348763', 'FSIB937463836483', '2024-02-08', 10000, 13, ''),
(13, 'CBL4873639484', 'DBBL348763', '2024-02-08', 1, 1, ''),
(14, 'DBBL348763', 'FSIB937463836483', '2024-02-08', 10000, 11, ''),
(15, 'DBBL348763', 'CBL4873639484', '2024-02-08', 500000, 11, ''),
(16, 'DBBL348763', 'CBL4873639484', '2024-02-08', 500000, 16, ''),
(17, 'CBL4873639484', 'DBBL348763', '2024-02-08', 1000000, 17, ''),
(18, 'DBBL348763', 'CBL4873639484', '2024-02-08', 500000, 14, ''),
(19, 'FSIB937463836483', 'CBL4873639484', '2024-02-08', 1000000, 2, ''),
(20, 'FSIB937463836483', 'CBL4873639484', '2024-02-08', 5000000, 18, ''),
(21, 'CBL4873639484', 'DBBL348763', '2024-02-09', 1000000, 11, ''),
(22, 'FSIB937463836483', 'CBL4873639484', '2024-02-10', 5000000, 18, ''),
(23, 'CBL4873639484', 'DBBL348763', '2024-02-11', 500000, 18, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_catagoryinfo`
--

CREATE TABLE `tb_catagoryinfo` (
  `Id` int(11) NOT NULL,
  `C_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_catagoryinfo`
--

INSERT INTO `tb_catagoryinfo` (`Id`, `C_Name`) VALUES
(1, 'Genarel'),
(2, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dailyexpenses`
--

CREATE TABLE `tb_dailyexpenses` (
  `Id` int(11) NOT NULL,
  `EId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `PurposeId` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dailyexpenses`
--

INSERT INTO `tb_dailyexpenses` (`Id`, `EId`, `Date`, `Amount`, `PurposeId`, `Remark`) VALUES
(1, 1, '2024-02-08', 500, 2, NULL),
(2, 2, '2024-02-08', 600, 2, 'Done!'),
(3, 11, '2024-02-08', 1000, 1, '!Nothing'),
(4, 2, '2024-02-08', 3000, 6, ''),
(5, 15, '2024-02-08', 5000, 3, ''),
(6, 16, '2024-02-08', 1200, 5, ''),
(7, 11, '2024-02-09', 1200, 6, ''),
(8, 2, '2024-02-10', 450, 1, ''),
(9, 11, '2024-02-10', 500, 2, ''),
(10, 16, '2024-02-10', 1500, 6, ''),
(11, 2, '2024-02-11', 5500, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dasignation_info`
--

CREATE TABLE `tb_dasignation_info` (
  `Id` int(11) NOT NULL,
  `D_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_dasignation_info`
--

INSERT INTO `tb_dasignation_info` (`Id`, `D_Name`) VALUES
(1, 'MD'),
(2, 'Manager'),
(3, 'Executive'),
(4, 'Merchandiser'),
(5, 'Technical'),
(6, 'QC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE `tb_department` (
  `dep_id` int(11) NOT NULL,
  `dep_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`dep_id`, `dep_Name`) VALUES
(1, 'HR & Admin'),
(2, 'Quality (QC)'),
(3, 'Merchandiser');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dipositandwithdrawdetail`
--

CREATE TABLE `tb_dipositandwithdrawdetail` (
  `Id` int(11) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `TransectionType` int(11) DEFAULT NULL,
  `EId` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dipositandwithdrawdetail`
--

INSERT INTO `tb_dipositandwithdrawdetail` (`Id`, `AccountNumber`, `Amount`, `Date`, `TransectionType`, `EId`, `Remark`) VALUES
(1, 'DBBL348763', 10000000, '2024-02-07', 1, 1, NULL),
(2, 'CBL4873639484', 1200000, '2024-02-06', 2, 1, NULL),
(3, 'FSIB937463836483', 15000000, '2024-02-05', 1, 1, NULL),
(4, 'DBBL348763', 10000000, '2024-02-07', 1, 2, NULL),
(5, 'CBL4873639484', 1200000, '2024-02-06', 2, 11, NULL),
(6, 'FSIB937463836483', 15000000, '2024-02-05', 1, 15, NULL),
(7, 'DBBL348763', 10000000, '2024-02-07', 2, 12, NULL),
(8, 'CBL4873639484', 1200000, '2024-02-06', 1, 16, NULL),
(9, 'FSIB937463836483', 15000000, '2024-02-05', 2, 17, NULL),
(10, 'DBBL348763', 50000, '2024-02-07', 1, 2, '!Nothing'),
(11, 'CBL4873639484', 80000, '2024-02-07', 1, 11, ''),
(12, 'FSIB937463836483', 1200000, '2024-02-07', 1, 17, ''),
(13, 'DBBL348763', 2000, '2024-02-07', 1, 17, ''),
(14, 'CBL4873639484', 200000, '2024-02-07', 2, 2, '!Nothing'),
(15, 'FSIB937463836483', 50000, '2024-02-07', 2, 11, '!Done'),
(16, 'DBBL348763', 80000, '2024-02-07', 2, 17, ''),
(17, 'FSIB937463836483', 10000, '2024-02-07', 2, 14, ''),
(18, 'DBBL348763', 10000, '2024-02-07', 2, 15, ''),
(19, 'DBBL348763', 10000, '2024-02-07', 2, 2, ''),
(20, 'DBBL348763', 2500, '2024-02-07', 2, 2, ''),
(21, 'CBL4873639484', 5000, '2024-02-07', 2, 12, 'What!'),
(22, 'DBBL348763', 10000, '2024-02-07', 2, 2, ''),
(23, 'DBBL348763', 1000, '2024-02-07', 2, 12, ''),
(24, 'DBBL348763', 5000, '2024-02-07', 1, 1, 'Bank to bank transfer diposit.'),
(25, 'FSIB937463836483', 5000, '2024-02-07', 2, 1, 'Bank to bank transfer withdraw.'),
(26, 'DBBL348763', 10000, '2024-02-08', 1, 2, ''),
(27, 'CBL4873639484', 15000, '2024-02-08', 1, 14, ''),
(28, 'FSIB937463836483', 12000, '2024-02-08', 1, 11, ''),
(29, 'DBBL348763', 3000, '2024-02-08', 1, 15, ''),
(30, 'DBBL348763', 20000, '2024-02-08', 2, 2, ''),
(31, 'FSIB937463836483', 25000, '2024-02-08', 2, 13, ''),
(32, 'CBL4873639484', 50000, '2024-02-08', 2, 2, ''),
(33, 'DBBL348763', 5000, '2024-02-08', 2, 17, ''),
(34, 'DBBL348763', 1, '2024-02-08', 1, 1, 'Bank to bank transfer diposit.'),
(35, 'CBL4873639484', 1, '2024-02-08', 2, 1, 'Bank to bank transfer withdraw.'),
(36, 'FSIB937463836483', 10000, '2024-02-08', 1, 11, 'Bank to bank transfer diposit.'),
(37, 'DBBL348763', 10000, '2024-02-08', 2, 11, 'Bank to bank transfer withdraw.'),
(38, 'DBBL348763', 500, '2024-02-08', 1, 14, ''),
(39, 'CBL4873639484', 500, '2024-02-08', 1, 14, ''),
(40, 'CBL4873639484', 100000, '2024-02-08', 1, 13, ''),
(41, 'CBL4873639484', 1000000, '2024-02-08', 1, 11, ''),
(42, 'CBL4873639484', 500000, '2024-02-08', 1, 16, ''),
(43, 'CBL4873639484', 240499, '2024-02-08', 2, 1, ''),
(45, 'CBL4873639484', 500000, '2024-02-08', 1, 11, 'Bank to bank transfer diposit.'),
(46, 'DBBL348763', 500000, '2024-02-08', 2, 11, 'Bank to bank transfer withdraw.'),
(47, 'CBL4873639484', 500000, '2024-02-08', 1, 16, 'Bank to bank transfer diposit.'),
(48, 'DBBL348763', 500000, '2024-02-08', 2, 16, 'Bank to bank transfer withdraw.'),
(49, 'DBBL348763', 1000000, '2024-02-08', 1, 17, 'Bank to bank transfer diposit.'),
(50, 'CBL4873639484', 1000000, '2024-02-08', 2, 17, 'Bank to bank transfer withdraw.'),
(51, 'CBL4873639484', 500000, '2024-02-08', 1, 14, 'Bank to bank transfer diposit.'),
(52, 'DBBL348763', 500000, '2024-02-08', 2, 14, 'Bank to bank transfer withdraw.'),
(53, 'CBL4873639484', 1000000, '2024-02-08', 1, 2, 'Bank to bank transfer diposit.'),
(54, 'FSIB937463836483', 1000000, '2024-02-08', 2, 2, 'Bank to bank transfer withdraw.'),
(55, 'CBL4873639484', 300000, '2024-02-08', 2, 18, ''),
(56, 'CBL4873639484', 1200000, '2024-02-08', 2, 11, ''),
(57, 'CBL4873639484', 5000000, '2024-02-08', 1, 18, 'Bank to bank transfer diposit.'),
(58, 'FSIB937463836483', 5000000, '2024-02-08', 2, 18, 'Bank to bank transfer withdraw.'),
(59, 'DBBL348763', 1, '2024-02-08', 2, 1, ''),
(60, 'CBL4873639484', 10000, '2024-02-09', 1, 11, ''),
(61, 'CBL4873639484', 12000, '2024-02-09', 2, 15, ''),
(62, 'DBBL348763', 1000000, '2024-02-09', 1, 11, 'Bank to bank transfer diposit.'),
(63, 'CBL4873639484', 1000000, '2024-02-09', 2, 11, 'Bank to bank transfer withdraw.'),
(64, 'CBL4873639484', 20000, '2024-02-10', 1, 15, ''),
(65, 'FSIB937463836483', 10000, '2024-02-10', 2, 17, ''),
(66, 'CBL4873639484', 5000000, '2024-02-10', 1, 18, 'Bank to bank transfer diposit.'),
(67, 'FSIB937463836483', 5000000, '2024-02-10', 2, 18, 'Bank to bank transfer withdraw.'),
(68, 'FSIB937463836483', 100000, '2024-02-11', 1, 14, ''),
(69, 'CBL4873639484', 50000, '2024-02-11', 2, 2, ''),
(70, 'DBBL348763', 500000, '2024-02-11', 1, 18, 'Bank to bank transfer diposit.'),
(71, 'CBL4873639484', 500000, '2024-02-11', 2, 18, 'Bank to bank transfer withdraw.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employeeinfo`
--

CREATE TABLE `tb_employeeinfo` (
  `Id` int(11) NOT NULL,
  `E_Name` varchar(255) NOT NULL,
  `E_Designation` varchar(255) DEFAULT NULL,
  `E_Username` varchar(255) NOT NULL,
  `E_DOB` date DEFAULT NULL,
  `E_Gender` varchar(255) DEFAULT NULL,
  `E_Email` varchar(255) DEFAULT NULL,
  `E_Password` varchar(255) DEFAULT NULL,
  `E_Phone` int(11) DEFAULT NULL,
  `E_Status` int(11) DEFAULT NULL,
  `E_FatherName` varchar(255) DEFAULT NULL,
  `E_MotherName` varchar(255) DEFAULT NULL,
  `E_PresentAddress` varchar(255) DEFAULT NULL,
  `E_PermanentAddress` varchar(255) DEFAULT NULL,
  `E_EmargencyPhone` int(11) DEFAULT NULL,
  `E_Nationality` varchar(255) DEFAULT NULL,
  `E_MarritalStatus` varchar(255) DEFAULT NULL,
  `E_Religion` varchar(255) DEFAULT NULL,
  `E_NID` int(11) DEFAULT NULL,
  `E_OfficeId` int(11) DEFAULT NULL,
  `E_JoinDate` date DEFAULT NULL,
  `E_BloodGroup` varchar(255) DEFAULT NULL,
  `E_Image` varchar(255) DEFAULT NULL,
  `E_EvaluationPermission` int(11) DEFAULT NULL,
  `E_dep_id` int(11) DEFAULT NULL,
  `E_AccountPermittion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_employeeinfo`
--

INSERT INTO `tb_employeeinfo` (`Id`, `E_Name`, `E_Designation`, `E_Username`, `E_DOB`, `E_Gender`, `E_Email`, `E_Password`, `E_Phone`, `E_Status`, `E_FatherName`, `E_MotherName`, `E_PresentAddress`, `E_PermanentAddress`, `E_EmargencyPhone`, `E_Nationality`, `E_MarritalStatus`, `E_Religion`, `E_NID`, `E_OfficeId`, `E_JoinDate`, `E_BloodGroup`, `E_Image`, `E_EvaluationPermission`, `E_dep_id`, `E_AccountPermittion`) VALUES
(1, 'Shamim Hossain', 'Assis.IT Office', 'samim', '2001-12-31', 'Male', 'asdf@gmail.com', 's', 1321224660, 1, 'Jamsher Ali', 'Sofiya Begum', 'House#32, Road#10, Sector#4, Uttara Model Town, Dhaka-1230', 'House#32, Road#10, Sector#4, Uttara Model Town, Dhaka-1230', 1795347454, 'Bangladesh', 'Un-marrid', 'Islam', 1234567890, 53, '2023-05-08', 'A+', 'samim2.jpg', 1, 1, 1),
(2, 'Indrojit Mondol', 'Assis.Account', 'mondol', '2001-11-15', 'Male', 'asdf@gmail.com', 'asdf', 1321224660, 1, '', '', '', '', 1321233456, 'Bangladesh', 'Un-marrid', 'Hindo', 1234567890, 56, '2023-11-15', 'A+', 'indrojit2.jpg', 1, 1, 1),
(11, 'Abdula Al Mamun', 'Executive', 'mamun', '1973-07-11', 'Male', 'mamun@deegautex.com', 'm', 2147483647, 1, 'Ahmed Ali', 'Mrs.Begum', 'Dhaka', 'Dhaka', 2147483647, 'Bangladeshi', 'Married', 'Islam', 23452345, 23, '2021-02-09', 'A+', 'IMG-656ee2b7c6c5d2.62760445.jpg', 1, 2, 0),
(12, 'Dipu Dash', 'Manager', 'dipu', '1988-06-14', 'Male', 'dipu@deegautex.com', 'd', 1234567890, 1, 'Dash', 'Dash', 'Dhaka', 'Barishal', 123456789, 'Bangladeshi', 'Married', 'Hindu', 12345678, 1, '2019-03-05', 'A+', 'indrojit2.jpg', 1, 3, 1),
(13, 'Abdula Malek', 'Executive', 'malek', '1990-01-01', 'Male', 'malek@deegautex.com', 'm', 12345678, 1, 'Ali', 'Begum', 'Dhaka', 'Dhaka', 12345678, 'Bangladeshi', 'Married', 'Islam', 1234567, 23, '2023-12-05', 'A+', 'samim2.jpg', 0, 2, 0),
(14, 'Shofik Ahmed', 'Merchandiser', 'shofik1234', '1984-06-05', 'Male', 'shofik@deegautex.com', 's', 123456789, 1, 'Ahmed Ali', 'Begum', 'Uttara, Dhaka', 'Uttara, Dhaka', 123456789, 'Bangladeshi', 'Married', 'Islam', 1234567, 34, '2021-02-08', 'A+', 'IMG-65c32bf5ada4b8.48758109.jpg', NULL, NULL, NULL),
(15, 'Nayeem Zilani', 'Merchandiser', 'nayeem', '1980-05-05', 'Male', 'nayeem@deegautex.com', 'n', 1234567890, 1, 'Ali Ahmed', 'Begum', 'Mirpur, Dhaka', 'Mirpur, Dhaka', 1234567890, 'Bangladeshi', 'Married', 'Islam', 76543, 45, '2022-02-01', 'A+', 'IMG-65c32ce2821fb8.85141900.jpg', NULL, NULL, NULL),
(16, 'Shakil Ahmed', 'Executive', 'shakil56', '1990-03-03', 'Male', 'shakil@deegautex.com', 's', 2345678, 1, 'Ahmed Ali', 'Begum', 'Uttara, Dhaka', 'Uttara, Dhaka', 23456789, 'Bangladeshi', 'Married', 'Islam', 2345678, 46, '2022-02-02', 'A+', 'IMG-65c32d58e521b7.06113097.jpg', NULL, NULL, NULL),
(17, 'Maria ', 'Merchandiser', 'maria23', '1990-03-04', 'Female', 'maria@deegautex.com', 'm', 12345678, 1, 'Ali', 'Begum', 'Gulshan, Dhaka', 'Gulshan, Dhaka', 345678, 'Bangladeshi', 'Un-married', 'Hindu', 234567, 47, '2022-02-01', 'A+', 'IMG-65c32db7eb3e71.33401382.png', NULL, NULL, NULL),
(18, 'Mizanur Rahman', 'Executive', 'mizan', '1997-06-10', 'Male', 'mizan@deegautex.com', 'm', 12345678, 1, 'Ahmed Ali', 'Begum', 'Uttara, Dhaka', 'Uttara, Dhaka', 123456789, 'Bangladeshi', 'Un-married', 'Islam', 765432, 56, '2023-07-01', 'A+', 'IMG-65c4908fa7a172.76777879.jpg', NULL, NULL, NULL),
(19, 'Proshanto Shen', 'Manager', 'proshant', '1986-10-14', 'Male', 'proshant@deegautex.com', 'p', 123654987, 1, 'Mondol', 'Dash', 'Dhaka', 'Dhaka', 321654987, 'Bangladeshi', 'Married', 'Hindu', 32165487, 25, '2021-02-02', 'A+', 'IMG-65c910f60d0a17.35136736.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluation`
--

CREATE TABLE `tb_evaluation` (
  `id` int(11) NOT NULL,
  `skill_Id` int(11) DEFAULT NULL,
  `mark_Id` int(11) DEFAULT NULL,
  `mark` varchar(10) DEFAULT NULL,
  `employee_Id` int(11) DEFAULT NULL,
  `E_date` date DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_evaluation`
--

INSERT INTO `tb_evaluation` (`id`, `skill_Id`, `mark_Id`, `mark`, `employee_Id`, `E_date`, `comment`) VALUES
(1, NULL, 5, '5', 0, '0000-00-00', 'Best attendance '),
(2, NULL, 4, '4', 0, '2024-01-31', 'Very good punctuality for workplease.'),
(3, NULL, 19, '3', 2, '2024-01-31', 'Work Motivation not good.'),
(4, NULL, 18, '4', 0, '2024-01-31', 'Nice!'),
(5, NULL, 17, '2', 0, '2024-01-31', 'Very Good!'),
(6, NULL, 5, '4', 1, '2024-01-31', 'Good!'),
(7, NULL, 8, '2', 1, '2024-01-31', '2'),
(8, NULL, 15, '2', 1, '2024-01-31', 'Cool'),
(9, NULL, 2, '3', 0, '2024-01-31', '3'),
(10, NULL, 7, '4', 2, '2024-01-31', 'Cool'),
(11, NULL, 14, '4.4', 2, '2024-01-31', 'Good!'),
(12, NULL, 7, '3.3', 2, '2024-01-31', 'Good!'),
(13, NULL, 1, '3', 12, '2024-01-31', 'Good!'),
(14, NULL, 2, '3.5', 12, '2024-01-31', 'Good!'),
(15, NULL, 3, '2', 12, '2024-01-31', 'Good!'),
(16, NULL, 6, '3', 12, '2024-01-31', 'Good!'),
(17, NULL, 1, '4', 2, '2024-01-31', 'Good Accuracy.'),
(18, NULL, 8, '4', 2, '2024-01-31', 'Good!'),
(19, NULL, 1, '4', 11, '2024-01-31', 'Nice accuracy, Neatness and time liness of work !'),
(20, NULL, 2, '3', 11, '2024-01-31', 'Good for this section.'),
(21, NULL, 3, '2.5', 11, '2024-01-31', 'Good for this section.'),
(22, NULL, 5, '5', 11, '2024-01-31', 'Good for this section. Good for this section. Good for this section.'),
(23, NULL, 6, '4', 11, '2024-01-31', 'No!'),
(24, NULL, 8, '2.5', 11, '2024-01-31', 'Very good for this section.'),
(25, NULL, 15, '2', 11, '2024-01-31', 'Not good but try to learing.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mark`
--

CREATE TABLE `tb_mark` (
  `id` int(11) NOT NULL,
  `skill_Id` int(11) DEFAULT NULL,
  `Analysis_Name` varchar(255) DEFAULT NULL,
  `Mark` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_mark`
--

INSERT INTO `tb_mark` (`id`, `skill_Id`, `Analysis_Name`, `Mark`) VALUES
(1, 1, 'Accuracy,Neatness and timeliness of work', NULL),
(2, 1, 'Adherence to duties and procedures in job Description and Work instructions', NULL),
(3, 1, 'Synchronization with organizations/functional goals', NULL),
(4, 1, 'Punctuality to workplace', NULL),
(5, 1, 'Attendance', NULL),
(6, 1, 'Dose the employee stay busy, look for things to do, takes initiatives at workplace', NULL),
(7, 1, 'Submits reports on time and meets deadlines', NULL),
(8, 1, 'Skill an dability to perform job satisfactoriliy', NULL),
(9, 1, 'Shown interest in learning and improving', NULL),
(10, 1, 'Problem solving ability', NULL),
(11, 2, 'Responds and contributes to team efforts', NULL),
(12, 2, 'Responds positively to suggestions and instructions and criticism', NULL),
(13, 2, 'Keeps supervisor informed of all details', NULL),
(14, 2, 'Adapts well to changing circumstances', NULL),
(15, 2, 'Language proficiency(English)', NULL),
(16, 2, 'Seeks feedback to improve', NULL),
(17, 3, 'Aspirant to climb up the ladder, accepts challenges, new responsibilities and roles', NULL),
(18, 3, 'Innovatiove thiking - cortribution to organizations and functions and personal growth', NULL),
(19, 3, 'Work motivation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_moneysentandreceived`
--

CREATE TABLE `tb_moneysentandreceived` (
  `Id` int(11) NOT NULL,
  `SEId` int(11) DEFAULT NULL,
  `REId` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `TransectionType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_moneysentandreceived`
--

INSERT INTO `tb_moneysentandreceived` (`Id`, `SEId`, `REId`, `date`, `Amount`, `Remark`, `TransectionType`) VALUES
(1, 1, 11, '2024-02-01', 1200, 'Bazar', 1),
(2, 1, 2, '2024-02-01', 1500, 'Other !', 1),
(3, 1, 11, '2024-02-01', 1500, 'Bazar', 1),
(4, 1, 13, '2024-02-01', 4500, 'IT Product', 1),
(5, 1, 13, '2024-02-01', 1000, 'Convince Bill', 1),
(6, 2, 1, '2024-02-01', 15000, 'Withdraw', 2),
(7, 11, 1, '2024-02-01', 12000, 'Bank Withdraw!', 2),
(8, 13, 1, '2024-02-01', 10000, 'Wastes paper sale ! ', 2),
(9, 11, 1, '2024-02-01', 3000, 'Nothing', 2),
(10, 12, 1, '2024-02-01', 35000, 'Bank', 2),
(11, 1, 11, '2024-02-03', 1200, '', 1),
(12, 1, 12, '2024-02-03', 1600, '', 1),
(13, 1, 1, '2024-02-03', 1900, '', 1),
(14, 1, 2, '2024-02-03', 3000, '', 1),
(15, 1, 13, '2024-02-03', 4500, '', 1),
(16, 2, 1, '2024-02-03', 4600, '', 2),
(17, 12, 1, '2024-02-03', 3000, '', 2),
(18, 11, 1, '2024-02-03', 2500, '', 2),
(19, 13, 1, '2024-02-03', 4000, '', 2),
(20, 12, 1, '2024-02-03', 5000, '', 2),
(21, 1, 2, '2024-02-05', 4500, '!Nothing', 1),
(22, 11, 1, '2024-02-05', 4000, '!nothing', 2),
(23, 1, 1, '2024-02-05', 1200, '', 1),
(24, 1, 11, '2024-02-05', 3000, '', 1),
(25, 1, 12, '2024-02-05', 3500, '', 1),
(26, 1, 2, '2024-02-05', 6000, '', 1),
(27, 1, 13, '2024-02-05', 8000, '', 1),
(28, 1, 1, '2024-02-05', 5700, '', 2),
(29, 2, 1, '2024-02-05', 7000, '', 2),
(30, 12, 1, '2024-02-05', 4000, '', 2),
(31, 13, 1, '2024-02-05', 1000, '', 2),
(32, 11, 1, '2024-02-05', 4500, '', 2),
(33, 1, 2, '2024-02-06', 1200, '', 1),
(34, 1, 11, '2024-02-06', 5000, '', 1),
(35, 1, 12, '2024-02-06', 10000, '', 1),
(36, 1, 13, '2024-02-06', 3000, '', 1),
(37, 1, 1, '2024-02-06', 6400, '', 1),
(38, 1, 1, '2024-02-06', 2000, '', 2),
(39, 2, 1, '2024-02-06', 1200, '', 2),
(40, 11, 1, '2024-02-06', 2500, '', 2),
(41, 12, 1, '2024-02-06', 4000, '', 2),
(42, 13, 1, '2024-02-06', 600, '', 2),
(43, 1, 17, '2024-02-07', 1500, '', 1),
(44, 1, 16, '2024-02-07', 5000, '', 1),
(45, 1, 15, '2024-02-07', 500, '', 1),
(46, 1, 14, '2024-02-07', 3000, '', 1),
(47, 1, 13, '2024-02-07', 500, '', 1),
(48, 1, 11, '2024-02-07', 10000, '', 1),
(49, 17, 1, '2024-02-07', 700, '', 2),
(50, 16, 1, '2024-02-07', 5000, '', 2),
(51, 15, 1, '2024-02-07', 800, '', 2),
(52, 13, 1, '2024-02-07', 1000, '', 2),
(53, 11, 1, '2024-02-07', 2000, '', 2),
(54, 2, 1, '2024-02-07', 2000, '', 2),
(55, 14, 1, '2024-02-07', 4000, '', 2),
(56, 1, 2, '2024-02-07', 500, '', 1),
(57, 2, 1, '2024-02-07', 500, '', 2),
(58, 1, 1, '2024-02-07', 4000, '', 2),
(59, 1, 11, '2024-02-08', 500, '', 1),
(60, 1, 2, '2024-02-08', 5000, '', 1),
(61, 1, 15, '2024-02-08', 1000, '', 1),
(62, 1, 17, '2024-02-08', 4000, '', 1),
(63, 1, 13, '2024-02-08', 2000, '', 1),
(64, 2, 1, '2024-02-08', 500, '', 2),
(65, 11, 1, '2024-02-08', 1000, '', 2),
(66, 13, 1, '2024-02-08', 1200, '', 2),
(67, 16, 1, '2024-02-08', 2000, '', 2),
(68, 17, 1, '2024-02-08', 500, '', 2),
(69, 1, 16, '2024-02-08', 1000, '', 1),
(70, 1, 13, '2024-02-08', 1200, '', 1),
(71, 16, 1, '2024-02-08', 500, '', 2),
(72, 1, 2, '2024-02-09', 1000, '', 1),
(73, 13, 1, '2024-02-09', 2500, '', 2),
(74, 1, 2, '2024-02-10', 10000, '', 1),
(75, 13, 1, '2024-02-10', 10000, '', 2),
(76, 1, 15, '2024-02-11', 1000, '', 1),
(77, 17, 1, '2024-02-11', 2500, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_productinfo`
--

CREATE TABLE `tb_productinfo` (
  `Id` int(11) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_Cat_Id` int(11) NOT NULL,
  `P_Price` int(11) NOT NULL,
  `P_Remark` varchar(255) NOT NULL,
  `P_Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_productinfo`
--

INSERT INTO `tb_productinfo` (`Id`, `P_Name`, `P_Cat_Id`, `P_Price`, `P_Remark`, `P_Image`) VALUES
(1, 'Brother printer ink (Black)', 2, 5, 'N/A', 'IMG-655efa7f46dad7.14144431.jpeg'),
(2, 'Brother printer ink (Black)', 1, 900, 'N/A', 'IMG-655efcc8bf6aa7.95112502.jpg'),
(3, 'Brother printer ink (Black)', 2, 900, 'N/A', 'IMG-655efdc33e80e9.84223718.jpg'),
(4, 'Epson L416 printer Yellow Ink', 2, 600, 'N/A', 'IMG-65642fcf4ed952.98173823.jpg'),
(5, 'Epson L416 printer Yellow Ink', 2, 3500, 'N/A', 'IMG-65643741443dc2.90480797.jpg'),
(6, 'Epson L416 printer Yellow Ink', 2, 400, 'N/A', 'IMG-65646c704cb946.34291557.png'),
(7, 'Brother printer ink (Black)', 1, 900, 'N/A', 'IMG-65646c82e2db80.75638468.jpg'),
(8, 'A4 Off set paper 1rim', 1, 450, 'N/A', 'IMG-65646f70db7548.70340191.jpg'),
(9, 'Management Ring File B2B', 1, 70, 'N/A', 'IMG-6564703159cc47.45718605.jpg'),
(10, 'Ball Pen Black', 1, 4, 'N/A', 'IMG-6565a8c75dc777.85862740.png'),
(11, 'Gam Tep', 1, 35, 'N/A', 'IMG-656d6754a19ac7.90385396.png'),
(12, 'Management Ring File B2B', 1, 1, 'N/A', 'IMG-65c5dfd4a94069.38991440.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_purpose`
--

CREATE TABLE `tb_purpose` (
  `Id` int(11) NOT NULL,
  `P_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_purpose`
--

INSERT INTO `tb_purpose` (`Id`, `P_Name`) VALUES
(1, 'Entertainment'),
(2, 'Evening Food'),
(3, 'Internet'),
(4, 'Tea & Coffee'),
(5, 'Utiliti Bill'),
(6, 'Fual & Gas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_salaryinfo`
--

CREATE TABLE `tb_salaryinfo` (
  `Id` int(11) NOT NULL,
  `EId` int(11) DEFAULT NULL,
  `BasicSalary` int(11) DEFAULT NULL,
  `HouseRent` int(11) DEFAULT NULL,
  `MedicalCost` int(11) DEFAULT NULL,
  `Transport` int(11) DEFAULT NULL,
  `VAT` int(11) DEFAULT NULL,
  `ProvedentFound` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_salaryinfo`
--

INSERT INTO `tb_salaryinfo` (`Id`, `EId`, `BasicSalary`, `HouseRent`, `MedicalCost`, `Transport`, `VAT`, `ProvedentFound`) VALUES
(1, 1, 15000, 3750, 3750, 3750, 1050, 1050),
(2, 2, 18000, 4500, 4500, 4500, 1260, 1260),
(3, 11, 28000, 8400, 8400, 8400, 2240, 2240),
(4, 12, 100000, 70000, 70000, 70000, 15000, 15000),
(5, 13, 31000, 12400, 12400, 12400, 2790, 2790),
(6, 14, 45000, 22500, 22500, 22500, 4500, 4500),
(7, 15, 70000, 49000, 49000, 49000, 10500, 10500),
(8, 16, 22000, 5500, 5500, 5500, 1540, 1540),
(9, 17, 35000, 14000, 14000, 14000, 3150, 3150),
(10, 18, 18500, 4625, 4625, 4625, 1295, 1295),
(12, 19, 120000, 0, 0, 0, 18000, 18000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_salarysheet`
--

CREATE TABLE `tb_salarysheet` (
  `Id` int(11) NOT NULL,
  `SalaryId` int(11) DEFAULT NULL,
  `EId` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `MonthYear` varchar(255) DEFAULT NULL,
  `OvertimeH` int(11) DEFAULT NULL,
  `OvertimeM` int(11) DEFAULT NULL,
  `AbsentD` int(11) DEFAULT NULL,
  `AbsentDeductM` int(11) DEFAULT NULL,
  `Advance` int(11) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_salarysheet`
--

INSERT INTO `tb_salarysheet` (`Id`, `SalaryId`, `EId`, `Date`, `MonthYear`, `OvertimeH`, `OvertimeM`, `AbsentD`, `AbsentDeductM`, `Advance`, `Bonus`) VALUES
(1, 12, 19, '2024-02-12', '202402', 24, 13846, 2, 9231, 1000, 500),
(4, 1, 1, '2024-02-12', '202402', 24, 1731, 2, 1154, 2000, 200);

-- --------------------------------------------------------

--
-- Table structure for table `tb_salarysheet_old`
--

CREATE TABLE `tb_salarysheet_old` (
  `Id` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `EId` int(11) DEFAULT NULL,
  `BasicSalary` int(11) DEFAULT NULL,
  `HouseRent` int(11) DEFAULT NULL,
  `MedicalCost` int(11) DEFAULT NULL,
  `Transport` int(11) DEFAULT NULL,
  `OvertimeH` int(11) DEFAULT NULL,
  `OvertimeM` int(11) DEFAULT NULL,
  `AbsentD` int(11) DEFAULT NULL,
  `AbsentDedusctM` int(11) DEFAULT NULL,
  `VAT` int(11) DEFAULT NULL,
  `ProvidentFound` int(11) DEFAULT NULL,
  `Advance` int(11) DEFAULT NULL,
  `Remark` varchar(255) DEFAULT NULL,
  `Bonus` int(11) DEFAULT NULL,
  `MonthYear` int(11) DEFAULT NULL,
  `TotalSalary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_salarysheet_old`
--

INSERT INTO `tb_salarysheet_old` (`Id`, `Date`, `EId`, `BasicSalary`, `HouseRent`, `MedicalCost`, `Transport`, `OvertimeH`, `OvertimeM`, `AbsentD`, `AbsentDedusctM`, `VAT`, `ProvidentFound`, `Advance`, `Remark`, `Bonus`, `MonthYear`, `TotalSalary`) VALUES
(1, '2024-02-10', 1, 8000, 800, 800, 800, 24, 923, 2, 615, 400, 400, 2500, 'Salary done!', 1600, 202402, 9008),
(2, '2024-02-10', 2, 15000, 3750, 3750, 3750, 26, 1875, 1, 577, 1050, 1050, 1000, 'Salary done!', 500, 202402, 24948),
(4, '2024-02-10', 12, 80000, 56000, 56000, 56000, 0, 0, 0, 0, 12000, 12000, 10000, '', 0, 202402, 214000),
(6, '2024-02-10', 14, 45000, 22500, 22500, 22500, 0, 0, 2, 3462, 4500, 4500, 1000, '', 0, 202402, 99038),
(7, '2024-02-10', 15, 50000, 25000, 25000, 25000, 0, 0, 1, 1923, 5000, 5000, 0, '', 0, 202402, 113077),
(8, '2024-02-10', 16, 22000, 5500, 5500, 5500, 15, 1587, 0, 0, 1540, 1540, 1000, '', 1200, 202402, 37207),
(9, '2024-02-10', 17, 28000, 8400, 8400, 8400, 18, 2423, 1, 1077, 2240, 2240, 3000, '', 700, 202402, 47766),
(10, '2024-02-10', 18, 18500, 4625, 4625, 4625, 29, 2579, 0, 0, 1295, 1295, 1500, '', 850, 202402, 31714),
(13, '2024-02-11', 13, 40000, 16000, 16000, 16000, 32, 6154, 2, 3077, 3600, 3600, 1500, '', 500, 202402, 82877),
(14, '2024-02-11', 11, 28000, 8400, 8400, 8400, 24, 3231, 1, 1077, 2240, 2240, 5000, '', 500, 202402, 46374),
(15, '2024-02-12', 19, 25000, 6250, 6250, 6250, 2, 240, 2, 1923, 1750, 1750, 2000, '', 2000, 202402, 38567);

-- --------------------------------------------------------

--
-- Table structure for table `tb_skill`
--

CREATE TABLE `tb_skill` (
  `id` int(11) NOT NULL,
  `skill_Name` varchar(255) DEFAULT NULL,
  `gread` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_skill`
--

INSERT INTO `tb_skill` (`id`, `skill_Name`, `gread`) VALUES
(1, 'Functionak Skill', 50),
(2, 'Interpersonal Skill', 25),
(3, 'Leadership Skill', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_in`
--

CREATE TABLE `tb_stock_in` (
  `Id` int(11) NOT NULL,
  `P_Id` int(11) NOT NULL,
  `E_Id` int(11) NOT NULL,
  `SI_Date` date NOT NULL,
  `SI_QTY` int(11) NOT NULL,
  `SI_Remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_stock_in`
--

INSERT INTO `tb_stock_in` (`Id`, `P_Id`, `E_Id`, `SI_Date`, `SI_QTY`, `SI_Remark`) VALUES
(1, 2, 1, '2023-11-27', 5, 'N/A'),
(2, 2, 1, '2023-11-27', 5, 'N/A'),
(5, 7, 1, '2023-11-27', 7, 'N/A'),
(6, 8, 1, '2023-11-27', 4, 'N/A'),
(7, 9, 1, '2023-11-27', 12, 'N/A'),
(8, 4, 1, '2023-11-27', 4, 'N/A'),
(9, 7, 1, '2023-11-27', 7, ''),
(10, 9, 1, '2023-11-28', 6, 'N/A'),
(11, 10, 1, '2023-11-28', 24, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_out`
--

CREATE TABLE `tb_stock_out` (
  `Id` int(11) NOT NULL,
  `P_Id` int(11) NOT NULL,
  `E_Id` int(11) NOT NULL,
  `ER_Id` int(11) NOT NULL,
  `SO_Date` date NOT NULL,
  `SO_QTY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_stock_out`
--

INSERT INTO `tb_stock_out` (`Id`, `P_Id`, `E_Id`, `ER_Id`, `SO_Date`, `SO_QTY`) VALUES
(1, 8, 1, 2, '2023-11-28', 2),
(2, 9, 1, 2, '2023-11-28', 2),
(3, 10, 1, 1, '2023-11-28', 1),
(4, 6, 1, 1, '2023-11-28', 1),
(5, 3, 1, 1, '2023-11-28', 1),
(6, 2, 1, 2, '2023-11-28', 2),
(7, 10, 1, 1, '2023-11-28', 1),
(8, 8, 2, 1, '2023-11-28', 2),
(9, 8, 1, 2, '2023-11-28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_attendence`
--
ALTER TABLE `tb_attendence`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_bankdetail`
--
ALTER TABLE `tb_bankdetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_banktobanktransectiondetail`
--
ALTER TABLE `tb_banktobanktransectiondetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_catagoryinfo`
--
ALTER TABLE `tb_catagoryinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_dailyexpenses`
--
ALTER TABLE `tb_dailyexpenses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_dasignation_info`
--
ALTER TABLE `tb_dasignation_info`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_department`
--
ALTER TABLE `tb_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tb_dipositandwithdrawdetail`
--
ALTER TABLE `tb_dipositandwithdrawdetail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_employeeinfo`
--
ALTER TABLE `tb_employeeinfo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `E_dep_id` (`E_dep_id`);

--
-- Indexes for table `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_Id` (`skill_Id`),
  ADD KEY `mark_Id` (`mark_Id`);

--
-- Indexes for table `tb_mark`
--
ALTER TABLE `tb_mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_Id` (`skill_Id`);

--
-- Indexes for table `tb_moneysentandreceived`
--
ALTER TABLE `tb_moneysentandreceived`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_productinfo`
--
ALTER TABLE `tb_productinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_purpose`
--
ALTER TABLE `tb_purpose`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_salaryinfo`
--
ALTER TABLE `tb_salaryinfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_salarysheet`
--
ALTER TABLE `tb_salarysheet`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_salarysheet_old`
--
ALTER TABLE `tb_salarysheet_old`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_skill`
--
ALTER TABLE `tb_skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock_in`
--
ALTER TABLE `tb_stock_in`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tb_stock_out`
--
ALTER TABLE `tb_stock_out`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_attendence`
--
ALTER TABLE `tb_attendence`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bankdetail`
--
ALTER TABLE `tb_bankdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_banktobanktransectiondetail`
--
ALTER TABLE `tb_banktobanktransectiondetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_catagoryinfo`
--
ALTER TABLE `tb_catagoryinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_dailyexpenses`
--
ALTER TABLE `tb_dailyexpenses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_dasignation_info`
--
ALTER TABLE `tb_dasignation_info`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_department`
--
ALTER TABLE `tb_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dipositandwithdrawdetail`
--
ALTER TABLE `tb_dipositandwithdrawdetail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tb_employeeinfo`
--
ALTER TABLE `tb_employeeinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_mark`
--
ALTER TABLE `tb_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_moneysentandreceived`
--
ALTER TABLE `tb_moneysentandreceived`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_productinfo`
--
ALTER TABLE `tb_productinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_purpose`
--
ALTER TABLE `tb_purpose`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_salaryinfo`
--
ALTER TABLE `tb_salaryinfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_salarysheet`
--
ALTER TABLE `tb_salarysheet`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_salarysheet_old`
--
ALTER TABLE `tb_salarysheet_old`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_skill`
--
ALTER TABLE `tb_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_stock_in`
--
ALTER TABLE `tb_stock_in`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_stock_out`
--
ALTER TABLE `tb_stock_out`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_employeeinfo`
--
ALTER TABLE `tb_employeeinfo`
  ADD CONSTRAINT `tb_employeeinfo_ibfk_1` FOREIGN KEY (`E_dep_id`) REFERENCES `tb_department` (`dep_id`);

--
-- Constraints for table `tb_evaluation`
--
ALTER TABLE `tb_evaluation`
  ADD CONSTRAINT `tb_evaluation_ibfk_1` FOREIGN KEY (`skill_Id`) REFERENCES `tb_skill` (`id`),
  ADD CONSTRAINT `tb_evaluation_ibfk_2` FOREIGN KEY (`mark_Id`) REFERENCES `tb_mark` (`id`);

--
-- Constraints for table `tb_mark`
--
ALTER TABLE `tb_mark`
  ADD CONSTRAINT `tb_mark_ibfk_1` FOREIGN KEY (`skill_Id`) REFERENCES `tb_skill` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
