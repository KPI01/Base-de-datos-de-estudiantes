-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 11:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estudiantes`
--

-- --------------------------------------------------------

--
-- Table structure for table `informacion`
--

CREATE TABLE `informacion` (
  `id` int(11) NOT NULL,
  `cedula` varchar(12) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(35) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `carrera` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `informacion`
--

INSERT INTO `informacion` (`id`, `cedula`, `nombre`, `apellido`, `ciudad`, `telefono`, `correo`, `carrera`) VALUES
(1, '28219444', 'Jorge', 'Ramirez', 'Maracay', '04243206225', 'jorgelurd11@gmail.com', 'Ingenieria de Sistemas'),
(2, '28219445', 'Luis', 'Duran', 'Barquisimeto', '04243206229', 'jorgelurd11@outlook.com', 'Ingenieria Electrica'),
(3, '26425334', 'Gabriela', 'Ramirez', 'Valencia', '04141202129', 'gabriellaaard@outlook.com', 'Odontologia'),
(4, '26356974', 'Andrea', 'Toro', 'San Cristobal', '04163202562', 'andreatoro@hotmail.com', 'Medicina'),
(5, '26321586', 'Victor', 'Ruiz', 'Caracas', '04266229355', 'victorruiz@gmail.com', 'Psicologia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informacion`
--
ALTER TABLE `informacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
