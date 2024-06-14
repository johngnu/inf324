-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 03:11:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jhon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pcondicional`
--

CREATE TABLE `pcondicional` (
  `procesoactual` varchar(50) DEFAULT NULL,
  `psi` varchar(50) DEFAULT NULL,
  `pno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pcondicional`
--

INSERT INTO `pcondicional` (`procesoactual`, `psi`, `pno`) VALUES
('P7', 'P8', 'P9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `flujo` varchar(20) NOT NULL,
  `procesoactual` varchar(20) NOT NULL,
  `procesosiguiente` varchar(50) NOT NULL,
  `pantalla` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`flujo`, `procesoactual`, `procesosiguiente`, `pantalla`, `rol`) VALUES
('F1', 'P1', 'P2', 'presentacion', 'cliente'),
('F1', 'P2', 'P3', 'actualizanombre', 'cliente'),
('F1', 'P3', 'P4', 'certificadomedico', 'cliente'),
('F1', 'P4', 'P5', 'antecedentes', 'cliente'),
('F1', 'P5', 'P6', 'aprobacion', 'cliente'),
('F1', 'P6', 'P7', 'pago', 'cliente'),
('F1', 'P7', '', 'validar', 'administrador'),
('F1', 'P8', '', 'aprobado', 'cliente'),
('F1', 'P9', '', 'negado', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `nro` int(11) DEFAULT NULL,
  `flujo` varchar(5) NOT NULL,
  `procesoactual` varchar(50) DEFAULT NULL,
  `fechainicio` datetime DEFAULT NULL,
  `fechafin` datetime DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`nro`, `flujo`, `procesoactual`, `fechainicio`, `fechafin`, `usuario`) VALUES
(1, 'F1', 'P1', '2024-06-04 09:36:17', '2024-06-04 09:36:19', 1),
(1, 'F1', 'P2', '2024-06-04 09:36:19', '2024-06-04 09:36:21', 1),
(1, 'F1', 'P3', '2024-06-04 09:36:21', '2024-06-04 09:36:26', 1),
(1, 'F1', 'P4', '2024-06-04 09:36:26', '2024-06-04 09:36:31', 1),
(1, 'F1', 'P5', '2024-06-04 09:36:31', '2024-06-04 09:36:34', 1),
(1, 'F1', 'P6', '2024-06-04 09:36:34', '2024-06-04 09:36:39', 1),
(1, 'F1', 'P7', '2024-06-04 09:36:39', '2024-06-04 09:36:59', 1),
(1, 'F1', 'P9', '2024-06-04 09:36:59', NULL, 1),
(2, 'F1', 'P1', '2024-06-04 09:39:31', '2024-06-04 09:39:33', 1),
(2, 'F1', 'P2', '2024-06-04 09:39:33', '2024-06-04 09:39:35', 1),
(2, 'F1', 'P3', '2024-06-04 09:39:35', '2024-06-04 09:39:52', 1),
(2, 'F1', 'P4', '2024-06-04 09:39:52', '2024-06-04 09:39:56', 1),
(2, 'F1', 'P5', '2024-06-04 09:39:56', '2024-06-04 09:40:02', 1),
(2, 'F1', 'P6', '2024-06-04 09:40:02', '2024-06-04 09:40:05', 1),
(2, 'F1', 'P7', '2024-06-04 09:40:05', '2024-06-04 09:40:21', 1),
(2, 'F1', 'P8', '2024-06-04 09:40:21', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
