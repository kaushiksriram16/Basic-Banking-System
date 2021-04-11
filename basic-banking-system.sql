-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 12:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basic-banking-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(20) NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `current_balance` double DEFAULT 0,
  `contact_no` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `email`, `current_balance`, `contact_no`) VALUES
(22621, 'Sushant Misra', 'sushra@gmail.com', 17000, 4655434810),
(22622, 'Seema Naidu', 'seemaidu@gmail.com', 6000.29, 8804485890),
(22623, 'Niyati Moti Sing', 'niyatng@gmail.com', 6000.02, 1565168541),
(22624, 'Sai Prakash', 'saibash@gmail.com', 18000, 913403877),
(22625, 'Shashank Keer', 'shaser@gmail.com', 7200, 5886098353),
(22626, 'Hina Jain', 'hinajin@gmail.com', 6400.8, 1296756205),
(22627, 'Pradeep Vicky Bassi', 'pradeessi@gmail.com', 7690, 3988586611),
(22628, 'Aarushi Aurora', 'aarushora@gmail.com', 2500, 5637279359),
(22629, 'Aarti Prasad', 'aartiad@gmail.com', 6000, 5840400064),
(22630, 'Vijay Gopal', 'vijay12@gmail.com', 5000, 267753772),
(22631, 'Main User', 'mainuser@gmail.com', 27000, 6454356775);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(20) NOT NULL,
  `date` datetime NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `date`, `sender_id`, `receiver_id`, `amount`) VALUES
(34, '2021-04-09 14:02:15', 22631, 22626, 3000),
(38, '2021-04-09 15:18:11', 22631, 22624, 10000),
(39, '2021-04-09 15:21:12', 22631, 22621, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_no` (`contact_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `foreign_key_senderid` (`sender_id`),
  ADD KEY `foreign_key_receiverid` (`receiver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `foreign_key_receiverid` FOREIGN KEY (`receiver_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_senderid` FOREIGN KEY (`sender_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
