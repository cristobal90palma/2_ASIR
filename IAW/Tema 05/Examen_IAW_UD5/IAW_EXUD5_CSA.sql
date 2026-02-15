-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2026 at 09:22 AM
-- Server version: 8.0.44-0ubuntu0.24.04.2
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `IAW_EXUD5_CSA`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `dni` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `ciclo` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `ciclo`) VALUES
('12345678W', 'Jose', 'Martinez Gutierrez', 'Calle Lerida 26', 123456789, 'pepe1997@gmail.com', 'DAM'),
('48920818W', 'Cristobal', 'Suarez Abad', 'Calle Cabo 16', 616235786, 'cristobal2590@gmail.com', 'ASIR');

-- --------------------------------------------------------

--
-- Table structure for table `ciclo`
--

CREATE TABLE `ciclo` (
  `siglas` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `grado` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `año` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ciclo`
--

INSERT INTO `ciclo` (`siglas`, `nombre`, `grado`, `año`) VALUES
('ASIR', 'Administracion de Sistemas Informaticos y Redes', 'superior', 2006),
('DAM', 'Desarrollo de Aplicaciones Multiplataforma', 'superior', 2008);

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` int NOT NULL,
  `nombre` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `curso` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `horas_semana` int NOT NULL,
  `ciclo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `nombre`, `curso`, `horas_semana`, `ciclo`) VALUES
(1, 'Implantacion de Aplicaciones Web', '2º ASIR', 4, 'ASIR'),
(2, 'Servicios de Red e Internet', '2º ASIR', 5, 'ASIR'),
(3, 'Administración de Sistemas Gestores de Bases de Datos', '2º ASIR', 4, 'ASIR'),
(4, 'Acceso a Datos', '2º DAM', 5, 'DAM'),
(5, 'Sistemas de gestión empresarial', '2º DAM', 6, 'DAM'),
(6, 'Programación multimedia y dispositivos móviles', '2º DAM', 4, 'DAM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `ciclo` (`ciclo`);

--
-- Indexes for table `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`siglas`);

--
-- Indexes for table `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`),
  ADD KEY `ciclo` (`ciclo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ciclo`) REFERENCES `ciclo` (`siglas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`ciclo`) REFERENCES `ciclo` (`siglas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
