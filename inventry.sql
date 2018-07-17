-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2018 at 02:07 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventry`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_details`
--

CREATE TABLE `car_details` (
  `car_id` int(11) NOT NULL,
  `manu_id` int(11) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `reg_no` varchar(255) DEFAULT NULL,
  `year` date DEFAULT NULL,
  `note` text,
  `img_one` varchar(255) DEFAULT NULL,
  `img_two` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_details`
--

INSERT INTO `car_details` (`car_id`, `manu_id`, `model_name`, `quantity`, `color`, `reg_no`, `year`, `note`, `img_one`, `img_two`, `created_at`) VALUES
(1, 1, 'Acura NSX', '5', 'Acura Logo White', 'ACU-2912', '2018-07-15', 'Acura holds the distinction of being the first Japanese automotive luxury brand. The creation of Acura coincided with the introduction of a JDM Honda dealership sales channel called Honda Clio which sold luxury vehicles joining previously established Honda Verno followed by Honda Primo the following year. In its first few years of existence, Acura was among the best-selling luxury marques in the US. Though sales were down in the mid-to-late 1990 the brand experienced a revival in early 2000 due to drastic redesigns and the introductions of new models.', 'Acura-Symbol-2-500x298.jpg', NULL, '2018-07-15 11:34:58'),
(2, 1, 'Acura Legend', '10', 'White', 'ACU-02', '2018-07-15', 'Acura holds the distinction of being the first Japanese automotive luxury brand.The creation of Acura coincided with the introduction of a JDM Honda dealership sales channel called Honda Clio which sold luxury vehicles joining previously established Honda Verno followed by Honda Primo the following year.', 'images (4).jpg', NULL, '2018-07-15 11:44:19'),
(3, 4, 'Audi TT', '5', 'Red', 'AUDI-10', '2018-07-15', 'Audi AG is a German automobile manufacturer that designs, engineers, produces, markets and distributes luxury vehicles. Audi is a member of the Volkswagen Group and has its roots at Ingolstadt, Bavaria, Germany. Audi-branded vehicles are produced in nine production facilities worldwide.\r\n\r\nThe origins of the company are complex, going back to the early 20th century and the initial enterprises (Horch and the Audiwerke) founded by engineer August Horch; and two other manufacturers (DKW and Wanderer) leading to the foundation of Auto Union in 1932. The modern era of Audi essentially began in the 1960 when Auto Union was acquired by Volkswagen from Daimler-Benz. After relaunching the Audi brand with the 1965 introduction of the Audi F103 series, Volkswagen merged Auto Union with NSU Motorenwerke in 1969, thus creating the present day form of the company.', 'images (10).jpg', NULL, '2018-07-15 11:47:51'),
(4, 5, 'Ford Mustang', '5', 'Yellow', 'FORD-01', '2018-07-15', 'Ford introduced methods for large-scale manufacturing of cars and large-scale management of an industrial workforce using elaborately engineered manufacturing sequences typified by moving assembly lines by 1914, these methods were known around the world as Fordism. Fords former UK subsidiaries Jaguar and Land Rover, acquired in 1989 and 2000 respectively.', 'download (2).jpg', NULL, '2018-07-15 11:52:32'),
(5, 4, 'Audi TT', '10', 'Black', 'AUDI-1010', '2018-07-15', 'The Audi TT is a 2-door compact sports car marketed by Volkswagen Group subsidiary Audi since 1998. It is assembled by the Audi subsidiary Audi Hungaria Motor Kft. in Gyor, Hungary, using bodyshells manufactured and painted at Audi Ingolstadt plant for the first two generations and parts made entirely by the Hungarian factory for the third generation.', 'images (9).jpg', NULL, '2018-07-15 11:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `manufacturer_name`, `created_at`) VALUES
(1, 'Acura', '2018-07-12 18:08:16'),
(4, 'Audi', '2018-07-12 18:14:32'),
(5, 'Ford', '2018-07-12 18:38:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_details`
--
ALTER TABLE `car_details`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_details`
--
ALTER TABLE `car_details`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
