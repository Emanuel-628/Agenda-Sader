-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2021 a las 21:30:11
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int(11) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `pacienteId` varchar(250) DEFAULT NULL,
  `pago` varchar(250) DEFAULT NULL,
  `tratamiento` varchar(250) DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `fecha_prox` varchar(20) DEFAULT NULL,
  `fecha_pago` varchar(20) DEFAULT NULL,  
  `asistio` varchar(20) DEFAULT NULL,  
  `foto` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `Pacientes` (
  `id` int(11) NOT NULL,
  `pacienteId` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Volcado de datos para la tabla `eventoscalendar`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Pacientes`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

ALTER TABLE `Pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
