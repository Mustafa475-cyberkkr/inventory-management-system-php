-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 يونيو 2025 الساعة 13:32
-- إصدار الخادم: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youstoredb`
--

-- --------------------------------------------------------

--
-- بنية الجدول `prudacts`
--

CREATE TABLE `prudacts` (
  `P_Id` int(11) NOT NULL,
  `P_Name` varchar(50) NOT NULL,
  `P_BarCode` varchar(50) NOT NULL,
  `P_Amount` varchar(50) NOT NULL,
  `P_Note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `prudacts`
--

INSERT INTO `prudacts` (`P_Id`, `P_Name`, `P_BarCode`, `P_Amount`, `P_Note`) VALUES
(2, '  nnr', '  1234', '2002', '232'),
(3, '   nnr', '1234', '2002', '232');

-- --------------------------------------------------------

--
-- بنية الجدول `selling`
--

CREATE TABLE `selling` (
  `S_Id` int(11) NOT NULL,
  `S_Name` varchar(50) NOT NULL,
  `S_Price` varchar(50) NOT NULL,
  `S_Discount` varchar(50) NOT NULL,
  `S_Amount` varchar(50) NOT NULL,
  `S_U_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `selling`
--

INSERT INTO `selling` (`S_Id`, `S_Name`, `S_Price`, `S_Discount`, `S_Amount`, `S_U_Id`) VALUES
(2, 'mlc', '200', '10%', '222', '2222');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `U_Id` int(11) NOT NULL,
  `U_Name` varchar(50) NOT NULL,
  `U_Phone` varchar(50) NOT NULL,
  `U_UserName` varchar(50) NOT NULL,
  `U_Password` varchar(20) NOT NULL,
  `U_State` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`U_Id`, `U_Name`, `U_Phone`, `U_UserName`, `U_Password`, `U_State`) VALUES
(1, 'mmr', '777777777', 'admen@emil.com', 'admen@emil.com', 'aas'),
(3, 'mmrmm', '777778555', 'admen@emil.com', 'admen@emil.com', 'aas'),
(4, 'admen@emil.com', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prudacts`
--
ALTER TABLE `prudacts`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `selling`
--
ALTER TABLE `selling`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prudacts`
--
ALTER TABLE `prudacts`
  MODIFY `P_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `selling`
--
ALTER TABLE `selling`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
