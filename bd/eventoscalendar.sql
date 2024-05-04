
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sader`
--

CREATE TABLE `eventoscalendar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) DEFAULT NULL,
  `pacienteId` int DEFAULT NULL,
  `pago` varchar(250) DEFAULT NULL,
  `tratamiento` varchar(250) DEFAULT NULL,
  `observacion` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `fecha_prox` varchar(20) DEFAULT NULL,
  `fecha_pago` varchar(20) DEFAULT NULL,  
  `asistio` varchar(20) DEFAULT NULL,
   PRIMARY KEY (`id`),
   FOREIGN KEY (pacienteId) REFERENCES Pacientes(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `Pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `paciente` varchar(250) DEFAULT NULL,
  `foto` blob,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `eventoscalendar`
  ADD UNIQUE KEY `unique_paciente` (`pacienteId`);



COMMIT;
