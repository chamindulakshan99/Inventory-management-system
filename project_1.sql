-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 09:27 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tp` int(12) NOT NULL,
  `role` varchar(15) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `tp`, `role`, `password`) VALUES
(2, 'UOJ DCS', 'masteradmin', 'masteradmin@gmial.com', 123456789, 'masteradmin', '$2y$10$5P6qDcZmUGrDP3v8jc9EIu/R9TuwmqVzmsJgvFGO9GygDTARzJQTK'),
(11, 'Chamindu Lakshan', 'admin', '123@gmail', 123456789, 'admin', '$2y$10$N3AKeDaNEVneb4fIN/YZAeFc62j0VOWNO2epfBX6AtlchVrbICuQq');

-- --------------------------------------------------------

--
-- Table structure for table `f_invoice`
--

CREATE TABLE `f_invoice` (
  `invoice_id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `f_date` date NOT NULL,
  `f_price` float NOT NULL,
  `f_quantity` int(11) NOT NULL,
  `f_folio_number` varchar(50) NOT NULL,
  `f_description` varchar(400) NOT NULL,
  `f_supplier_name` varchar(150) NOT NULL,
  `f_supplier_tt` int(15) NOT NULL,
  `f_srn` int(11) NOT NULL,
  `f_type` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_invoice`
--

INSERT INTO `f_invoice` (`invoice_id`, `f_name`, `f_date`, `f_price`, `f_quantity`, `f_folio_number`, `f_description`, `f_supplier_name`, `f_supplier_tt`, `f_srn`, `f_type`, `location`) VALUES
(4, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS'),
(6, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS'),
(7, 'Test_1', '2023-08-26', 321, 6, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaa', 'asdfe', 123, 321, '', 'DCS'),
(9, 'Chamindu', '2023-08-31', 0, 4, 'UOJ/CSC/123/1-3', 'lkjklk', 'Chamidu', 0, 0, '', 'CUL 3&45');

-- --------------------------------------------------------

--
-- Table structure for table `f_items`
--

CREATE TABLE `f_items` (
  `invoice_id` int(11) NOT NULL,
  `f_set_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_items`
--

INSERT INTO `f_items` (`invoice_id`, `f_set_id`, `location`, `working`) VALUES
(9, 1, 'CUL 3&45', 'yes'),
(9, 2, 'CUL 3&45', 'yes'),
(9, 3, 'CUL 3&45', 'yes'),
(9, 4, 'CUL 3&45', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `folio_number` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `supplier_tt` int(15) NOT NULL,
  `srn` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `name`, `date`, `price`, `quantity`, `folio_number`, `description`, `supplier_name`, `supplier_tt`, `srn`, `type`, `location`) VALUES
(108, 'Test_1234aaaaaaaa', '2023-08-18', 12330000, 10, 'UOJ/CSC/123/1-13', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'jasdljas;ldkjaslidjsaldkjsaldajsldkjasdsadasd', 123456789, 2023, '', 'CSL 3&4hhhhhh'),
(110, 'Test_1', '2023-08-31', 0, 0, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(111, 'Test_1', '0000-00-00', 0, 2, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(112, 'Test_1', '0000-00-00', 0, 2, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(113, 'Test_1', '0000-00-00', 0, 2, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(114, 'Test_1', '0000-00-00', 0, 2, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(115, 'Test_1', '2023-08-02', 0, 2, 'UOJ/CSC/123/1-11', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 0, 0, 'desktop', 'CUL 3&45'),
(116, 'Test_22', '2023-08-28', 123, 3, 'UOJ/CSC/123/1-26', 'aaaaaaaaaaaa', 'Chamidu', 123, 1234, 'electronic', 'CUL 3&45'),
(117, 'Chamindu', '2023-08-28', 1233, 2, 'UOJ/CSC/123/1-10', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asdfe', 1234, 0, 'electronic', 'DCS'),
(118, 'aaaa', '2023-08-26', 0, 2, 'UOJ/CSC/123/1-20', '', '', 0, 0, 'laptop', ''),
(119, 'bbbbb', '0000-00-00', 0, 12, 'UOJ/CSC/123/1-3', '', '', 0, 0, 'electronic', ''),
(120, 'Test_211', '2026-10-31', 123, 2, 'UOJ/CSC/123/1-3222', 'aaaaaaa', '123', 123, 123, 'laptop', '123'),
(121, 'Test_1', '2023-08-26', 12, 2, 'UOJ/CSC/123/1-3', '', '', 0, 0, 'laptop', 'CSL 3&4'),
(122, 'Test_1', '2023-08-26', 12, 2, 'UOJ/CSC/123/1-3', '', '', 0, 0, 'laptop', 'CSL 3&4'),
(123, 'Test_1', '2023-08-26', 12, 2, 'UOJ/CSC/123/1-3', '', '', 0, 0, 'laptop', 'CSL 3&4'),
(124, 'Test_22', '0000-00-00', 0, 2, 'UOJ/CSC/123/1-3', '', '', 0, 0, 'electronic', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item` varchar(50) NOT NULL,
  `serial_number` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`invoice_id`, `set_id`, `category`, `item`, `serial_number`, `location`, `working`) VALUES
(116, 1, 'electronic', 'Serial_number', 'asas', 'CUL 3&45', 'yes'),
(116, 2, 'electronic', 'Serial_number', 'chamindu', 'CUL 3&45', 'yes'),
(116, 3, 'electronic', 'Serial_number', '6', 'CUL 3&45', 'yes'),
(117, 1, 'electronic', 'Serial_number', 'asas', 'DCS', 'yes'),
(117, 2, 'electronic', 'Serial_number', '123', 'DCS', 'No'),
(118, 1, 'laptop', 'Model_number', 'qwe', '', 'yes'),
(118, 1, 'laptop', 'Serial_number', 'asas', '', 'yes'),
(118, 2, 'laptop', 'Model_number', 'qwe', '', 'yes'),
(118, 2, 'laptop', 'Serial_number', '4', '', 'yes'),
(119, 1, 'electronic', 'Serial_number', 'ad', 'CSL 3&4', 'no'),
(119, 2, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 3, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 4, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 5, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 6, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 7, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 8, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 9, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 10, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 11, 'electronic', 'Serial_number', '', '', 'yes'),
(119, 12, 'electronic', 'Serial_number', '', '', 'yes'),
(120, 1, 'laptop', 'Model_number', 'qweeeeeeee', '123', 'Noo'),
(120, 1, 'laptop', 'Serial_number', '-', '1235676868', 'No'),
(120, 2, 'laptop', 'Model_number', '2', '123', 'yes'),
(120, 2, 'laptop', 'Serial_number', 'asd', '123', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `o_invoice`
--

CREATE TABLE `o_invoice` (
  `invoice_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `folio_number` varchar(50) NOT NULL,
  `description` varchar(400) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `supplier_tt` int(15) NOT NULL,
  `srn` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `o_invoice`
--

INSERT INTO `o_invoice` (`invoice_id`, `name`, `date`, `price`, `quantity`, `folio_number`, `description`, `supplier_name`, `supplier_tt`, `srn`, `location`) VALUES
(15, 'Test_1aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '0000-00-00', 1234, 123, 'UOJ/CSC/123/1-3', '1231aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Chamidu', 2147483647, 0, 'CUL 3&45aaa'),
(16, 'Chamindu', '2023-08-31', 320, 3, 'UOJ/CSC/123/1-20', 'ljijljojlkjljlk', 'Chamidu', 4563121, 321, 'CUL 3&45');

-- --------------------------------------------------------

--
-- Table structure for table `o_items`
--

CREATE TABLE `o_items` (
  `invoice_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `working` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `o_items`
--

INSERT INTO `o_items` (`invoice_id`, `set_id`, `serial_number`, `location`, `working`) VALUES
(16, 1, '1234', 'CUL 3&45', 'yes'),
(16, 2, 'model1234', 'CUL 3&45', 'yes'),
(16, 3, '', 'CUL 3&45', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `f_invoice`
--
ALTER TABLE `f_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `f_items`
--
ALTER TABLE `f_items`
  ADD PRIMARY KEY (`invoice_id`,`f_set_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `o_invoice`
--
ALTER TABLE `o_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `o_items`
--
ALTER TABLE `o_items`
  ADD KEY `invoice_id` (`invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `f_invoice`
--
ALTER TABLE `f_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `o_invoice`
--
ALTER TABLE `o_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `f_items`
--
ALTER TABLE `f_items`
  ADD CONSTRAINT `f_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `f_invoice` (`invoice_id`);

--
-- Constraints for table `o_items`
--
ALTER TABLE `o_items`
  ADD CONSTRAINT `o_items_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `o_invoice` (`invoice_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
