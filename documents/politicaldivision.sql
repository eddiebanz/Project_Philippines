-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2015 at 07:14 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `politicaldivision`
--

CREATE TABLE IF NOT EXISTS `politicaldivision` (
  `_id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ISOCode` char(10) NOT NULL,
  `capital` varchar(50) NOT NULL,
  `dateFounded` date NOT NULL,
  `region_id` int(5) NOT NULL,
  `numMunicipality` int(5) NOT NULL,
  `numCity` int(5) NOT NULL,
  `numBarangay` int(5) NOT NULL,
  `calendar_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `politicaldivision`
--

INSERT INTO `politicaldivision` (`_id`, `countryCode`, `Name`, `ISOCode`, `capital`, `dateFounded`, `region_id`, `numMunicipality`, `numCity`, `numBarangay`, `calendar_id`) VALUES
(36, 'PH', 'Ilocos Norte', 'PH-ILN', 'Laoag', '1818-01-01', 1, 21, 2, 557, ''),
(37, 'PH', 'Ilocos Sur', 'PH-ILS', 'Vigan', '1572-01-01', 1, 32, 2, 768, ''),
(41, 'PH', 'La Union', 'PH-LUN', 'San Fernando', '1850-03-02', 1, 19, 1, 576, ''),
(61, 'PH', 'Pangasinan', 'PH-PAN', 'Lingayen', '1580-04-05', 1, 44, 4, 1, ''),
(11, 'PH', 'Batanes', 'PH-BTN', 'Basco', '1909-01-01', 2, 6, 0, 29, ''),
(18, 'PH', 'Cagayan', 'PH-CAG', 'Tuguegarao', '1581-01-01', 2, 28, 1, 820, ''),
(39, 'PH', 'Isabela', 'PH-ISA', 'Ilagan', '1856-05-01', 2, 34, 3, 1, ''),
(56, 'PH', 'Nueva Vizcaya', 'PH-NUV', 'Bayombong', '1839-05-24', 2, 15, 0, 275, ''),
(63, 'PH', 'Quirino', 'PH-QUI', 'Cabarroguis', '1966-06-18', 2, 6, 0, 132, ''),
(8, 'PH', 'Aurora', 'PH-AUR', 'Baler', '1979-08-13', 3, 8, 0, 151, ''),
(10, 'PH', 'Bataan', 'PH-BAN', 'Balanga', '1754-01-01', 3, 11, 1, 237, ''),
(17, 'PH', 'Bulacan', 'PH-BUL', 'Malolos', '1578-08-15', 3, 21, 3, 569, ''),
(55, 'PH', 'Nueva Ecija', 'PH-NUE', 'Palayan', '1705-01-01', 3, 27, 5, 849, ''),
(60, 'PH', 'Pampanga', 'PH-PAM', 'San Fernando', '1571-12-11', 3, 19, 3, 538, ''),
(76, 'PH', 'Tarlac', 'PH-TAR', 'Tarlac City', '1873-03-28', 3, 17, 1, 511, ''),
(78, 'PH', 'Zambales', 'PH-ZMB', 'Iba', '1578-01-01', 3, 13, 1, 247, ''),
(12, 'PH', 'Batangas', 'PH-BTG', 'Batangas City', '1581-12-08', 4, 31, 3, 1, ''),
(24, 'PH', 'Cavite', 'PH-CAV', 'Imus', '1614-01-01', 4, 17, 6, 829, ''),
(42, 'PH', 'Laguna', 'PH-LAG', 'Santa Cruz', '1571-07-28', 4, 24, 6, 674, ''),
(62, 'PH', 'Quezon', 'PH-QUE', 'Lucena', '1901-03-02', 4, 39, 2, 1, ''),
(64, 'PH', 'Rizal', 'PH-RIZ', 'Antipolo', '1901-06-11', 4, 13, 1, 188, ''),
(47, 'PH', 'Marinduque', 'PH-MAD', 'Boac', '1920-02-21', 16, 6, 0, 218, ''),
(57, 'PH', 'Occidental Mindoro', 'PH-MDC', 'Mamburao', '1950-06-13', 16, 11, 0, 162, ''),
(58, 'PH', 'Oriental Mindoro', 'PH-MDR', 'Calapan', '1950-06-13', 16, 14, 1, 426, ''),
(59, 'PH', 'Palawan', 'PH-PLW', 'Puerto Princesa', '1917-03-10', 16, 23, 1, 433, ''),
(65, 'PH', 'Romblon', 'PH-ROM', 'Romblon', '1917-03-10', 16, 17, 0, 219, ''),
(9, 'PH', 'Basilan', 'PH-BAS', 'Isabela', '1973-12-27', 14, 11, 2, 255, ''),
(44, 'PH', 'Lanao del Sur', 'PH-LAS', 'Marawi', '1959-07-04', 14, 39, 1, 1, ''),
(46, 'PH', 'Maguindanao', 'PH-MAG', 'Shariff Aguak', '1973-11-22', 14, 36, 1, 545, ''),
(73, 'PH', 'Sulu', 'PH-SLU', 'Jolo', '1917-03-10', 14, 19, 0, 410, ''),
(77, 'PH', 'Tawi-Tawi', 'PH-TAW', 'Bongao', '1973-09-11', 14, 11, 0, 203, ''),
(1, 'PH', 'Abra', 'PH-ABR', 'Bangued', '1917-03-10', 15, 27, 0, 303, ''),
(7, 'PH', 'Apayao', 'PH-APA', 'Kabugao', '1995-02-14', 15, 7, 0, 133, ''),
(13, 'PH', 'Benguet', 'PH-BEN', 'La Trinidad', '1966-06-16', 15, 13, 1, 269, ''),
(35, 'PH', 'Ifugao', 'PH-IFU', 'Lagawe', '1966-06-18', 15, 11, 0, 175, ''),
(40, 'PH', 'Kalinga', 'PH-KAL', 'Tabuk', '1995-02-14', 15, 7, 1, 152, ''),
(51, 'PH', 'Mountain Province', 'PH-MOU', 'Bontoc', '1967-04-07', 15, 10, 0, 144, ''),
(79, 'PH', 'Zamboanga del Norte', 'PH-ZAN', 'Dipolog', '1952-06-06', 9, 25, 2, 691, ''),
(80, 'PH', 'Zamboanga del Sur', 'PH-ZAS', 'Pagadian', '1952-06-06', 9, 26, 2, 779, ''),
(81, 'PH', 'Zamboanga Sibugay', 'PH-ZSI', 'Ipil', '2001-02-22', 9, 16, 0, 389, ''),
(82, 'PH', 'Metro Manila', 'PH-00', 'Manila', '0521-01-01', 17, 1, 16, 1, ''),
(52, 'PH', 'Negros Occidental', 'PH-NEC', 'Bacolod', '1905-03-04', 18, 19, 13, 662, ''),
(53, 'PH', 'Negros Oriental', 'PH-NER', 'Dumaguete', '1890-01-01', 18, 20, 6, 557, ''),
(5, 'PH', 'Albay', 'PH-ALB', 'Legazpi', '1917-03-10', 5, 15, 3, 720, ''),
(19, 'PH', 'Camarines Norte', 'PH-CAN', 'Daet', '1917-03-10', 5, 12, 0, 282, ''),
(20, 'PH', 'Camarines Sur', 'PH-CAS', 'Pili', '1917-03-10', 5, 35, 2, 1, ''),
(23, 'PH', 'Catanduanes', 'PH-CAT', 'Virac', '1945-09-26', 5, 11, 0, 315, ''),
(48, 'PH', 'Masbate', 'PH-MAS', 'Masbate City', '1917-03-10', 5, 20, 1, 550, ''),
(69, 'PH', 'Sorsogon', 'PH-SOR', 'Sorsogon City', '1894-10-17', 5, 14, 1, 541, ''),
(4, 'PH', 'Aklan', 'PH-AKL', 'Kalibo', '1956-04-25', 6, 17, 0, 327, ''),
(6, 'PH', 'Antique', 'PH-ANT', 'San Josede Buenavista', '1917-03-10', 6, 18, 0, 590, ''),
(22, 'PH', 'Capiz', 'PH-CAP', 'Roxas', '1917-03-10', 6, 16, 1, 473, ''),
(34, 'PH', 'Guimaras', 'PH-GUI', 'Jordan', '1992-05-22', 6, 5, 0, 98, ''),
(38, 'PH', 'Iloilo', 'PH-ILI', 'Iloilo City', '1904-04-14', 6, 42, 2, 1, ''),
(15, 'PH', 'Bohol', 'PH-BOH', 'Tagbilaran', '1854-01-01', 7, 47, 1, 1, ''),
(25, 'PH', 'Cebu', 'PH-CEB', 'Cebu City', '1565-04-27', 7, 44, 9, 1, ''),
(68, 'PH', 'Siquijor', 'PH-SIG', 'Siquijor', '1971-09-17', 7, 6, 0, 134, ''),
(14, 'PH', 'Biliran', 'PH-BIL', 'Naval', '1992-05-11', 8, 8, 0, 132, ''),
(33, 'PH', 'Eastern Samar', 'PH-EAS', 'Borongan', '1965-06-19', 8, 22, 1, 597, ''),
(45, 'PH', 'Leyte', 'PH-LEY', 'Tacloban', '1917-03-10', 8, 40, 3, 1, ''),
(54, 'PH', 'Northern Samar', 'PH-NSA', 'Catarman', '1965-06-19', 8, 24, 0, 569, ''),
(66, 'PH', 'Samar', 'PH-WSA', 'Catbalogan', '1965-06-19', 8, 24, 2, 951, ''),
(71, 'PH', 'Southern Leyte', 'PH-SLE', 'Maasin', '1959-05-22', 8, 18, 1, 500, ''),
(16, 'PH', 'Bukidnon', 'PH-BUK', 'Malaybalay', '1914-09-01', 10, 20, 2, 464, ''),
(21, 'PH', 'Camiguin', 'PH-CAM', 'Mambajao', '1966-06-18', 10, 5, 0, 58, ''),
(43, 'PH', 'Lanao del Norte', 'PH-LAN', 'Tubod', '1959-07-04', 10, 22, 1, 506, ''),
(49, 'PH', 'Misamis Occidental', 'PH-MSC', 'Oroquieta', '1929-11-08', 10, 14, 3, 490, ''),
(50, 'PH', 'Misamis Oriental', 'PH-MSR', 'Cagayan de Oro', '1929-11-08', 10, 23, 3, 504, ''),
(26, 'PH', 'Compostela Valley', 'PH-COM', 'Nabunturan', '1998-01-31', 11, 11, 0, 237, ''),
(28, 'PH', 'Davao del Norte', 'PH-DAV', 'Tagum', '1967-05-08', 11, 8, 3, 223, ''),
(29, 'PH', 'Davao del Sur', 'PH-DAS', 'Digos', '1967-05-08', 11, 9, 2, 414, ''),
(30, 'PH', 'Davao Occidental', '', 'Malita', '2013-10-28', 11, 5, 0, 105, ''),
(31, 'PH', 'Davao Oriental', 'PH-DAO', 'Mati', '1967-05-08', 11, 10, 1, 183, ''),
(27, 'PH', 'Cotabato', 'PH-NCO', 'Kidapawan', '1967-05-08', 12, 17, 1, 543, ''),
(67, 'PH', 'Sarangani', 'PH-SAR', 'Alabel', '1992-03-16', 12, 7, 0, 141, ''),
(70, 'PH', 'South Cotabato', 'PH-SCO', 'Koronadal', '1966-06-18', 12, 10, 2, 225, ''),
(72, 'PH', 'Sultan Kudarat', 'PH-SUK', 'Isulan', '1973-11-22', 12, 11, 1, 249, ''),
(2, 'PH', 'Agusan del Norte', 'PH-AGN', 'Cabadbaran', '1967-06-17', 13, 10, 2, 252, ''),
(3, 'PH', 'Agusan del Sur', 'PH-AGS', 'Prosperidad', '1967-06-17', 13, 13, 1, 314, ''),
(32, 'PH', 'Dinagat Islands', 'PH-DIN', 'San Jose', '2006-12-02', 13, 7, 0, 100, ''),
(74, 'PH', 'Surigao del Norte', 'PH-SUN', 'Surigao', '1960-06-16', 13, 20, 1, 335, ''),
(75, 'PH', 'Surigao del Sur', 'PH-SUR', 'Tandag', '1960-06-16', 13, 17, 2, 309, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
