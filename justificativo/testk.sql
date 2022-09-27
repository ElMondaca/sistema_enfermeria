-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2019 a las 16:37:26
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `rut_alumno` varchar(255) NOT NULL,
  `n_alumno` varchar(255) NOT NULL,
  `app_alumno` varchar(255) NOT NULL,
  `apm_alumno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`rut_alumno`, `n_alumno`, `app_alumno`, `apm_alumno`) VALUES
('1-1', 'Prueba 1', 'Apellido P', 'Apellido M'),
('1-2', 'Prueba 2', 'Apellido P', 'Apellido M'),
('1-3', 'Prueba 3', 'Apellido P', 'Apellido M'),
('1-4', 'Prueba 4', 'Apellido P', 'Apellido M'),
('10.555.666-9', 'Prueba', 'Apellido M', 'Apellido P'),
('17.722.208-9', 'Jorge', 'Mondaca', 'Fabrega'),
('17.772.008-9', 'Jorge', 'Fabrega', 'Mondaca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL,
  `n_alumno` varchar(255) NOT NULL,
  `n_nivel` int(11) NOT NULL,
  `n_emisor` int(11) NOT NULL,
  `diagnostico` varchar(255) NOT NULL,
  `reposo` int(5) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_entrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `certificado`
--

INSERT INTO `certificado` (`id_certificado`, `n_alumno`, `n_nivel`, `n_emisor`, `diagnostico`, `reposo`, `fecha_emision`, `fecha_entrega`) VALUES
(4, '1-3', 2, 5, 'Reservado', 6, '2019-07-22', '2019-07-24'),
(5, '10.555.666-9', 4, 8, 'Reservado', 5, '2019-07-22', '2019-07-24'),
(6, '17.722.208-9', 10, 9, 'Flojera', 10, '2019-07-22', '2019-07-24'),
(7, '17.722.208-9', 2, 8, 'asdasdas', 20, '2019-07-17', '2019-07-26'),
(8, '17.722.208-9', 7, 4, 'Prueba3', 20, '2019-07-15', '2019-07-24'),
(9, '17.772.008-9', 10, 2, 'Reservado', 15, '2019-07-29', '2019-07-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_certificado`
--

CREATE TABLE `detalle_certificado` (
  `id_detalle` int(11) NOT NULL,
  `actividad` varchar(255) NOT NULL,
  `unidad` varchar(255) NOT NULL,
  `det_profesor` varchar(255) NOT NULL,
  `fecha_justificada` date NOT NULL,
  `det_certificado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_certificado`
--

INSERT INTO `detalle_certificado` (`id_detalle`, `actividad`, `unidad`, `det_profesor`, `fecha_justificada`, `det_certificado`) VALUES
(1, 'Experiencia clinica', 'Proceso Enfermería I', 'Profesor 1', '2019-07-28', 6),
(2, 'Evaluación', 'Proceso Enfermería I', 'Profesor 1', '2019-07-29', 6),
(3, 'Clase', 'Filosofia', 'Profesor 1', '2019-07-30', 6),
(4, 'Evaluaci&oacute;n', 'Biologia', 'Profesor 1', '2019-07-31', 6),
(5, 'Clase', 'Filosofia', 'Profesor 1', '2019-07-28', 6),
(7, 'Clase', 'Filosofia', 'Profesor 2', '2019-07-30', 6),
(8, 'Experiencia cl&iacute;nica', 'Filosofia', 'Profesor 2', '2019-07-31', 8),
(10, 'Evaluaci&oacute;n', 'Filosofia', 'Profesor 3', '2019-07-29', 8),
(18, 'Clase', 'Filosofia', 'Profesor 2', '2019-07-23', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emisor`
--

CREATE TABLE `emisor` (
  `id_emisor` int(11) NOT NULL,
  `n_emisor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emisor`
--

INSERT INTO `emisor` (`id_emisor`, `n_emisor`) VALUES
(1, 'Hospital San Pablo'),
(2, 'Hospital La Serena'),
(3, 'Clinica Elqui'),
(4, 'Hospital Ovalle'),
(5, 'Centro de salud familiar (CESFAM)'),
(6, 'SAPU'),
(7, 'Depto Salud Estudiantil'),
(8, 'Consulta Privada'),
(9, 'Direccion de Escuela'),
(10, 'Otro centro de salud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `n_nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `n_nivel`) VALUES
(1, '1er Nivel'),
(2, '2do Nivel'),
(3, '3er Nivel'),
(4, '4to Nivel'),
(5, '5to Nivel'),
(6, '6to Nivel'),
(7, '7mo Nivel'),
(8, '8vo Nivel'),
(9, '9no Nivel'),
(10, '10mo Nivel');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`rut_alumno`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`),
  ADD KEY `rut_alumno` (`n_alumno`),
  ADD KEY `id_emisor` (`n_emisor`),
  ADD KEY `id_nivel` (`n_nivel`);

--
-- Indices de la tabla `detalle_certificado`
--
ALTER TABLE `detalle_certificado`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_certificado` (`det_certificado`);

--
-- Indices de la tabla `emisor`
--
ALTER TABLE `emisor`
  ADD PRIMARY KEY (`id_emisor`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `detalle_certificado`
--
ALTER TABLE `detalle_certificado`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `emisor`
--
ALTER TABLE `emisor`
  MODIFY `id_emisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`n_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificado_ibfk_2` FOREIGN KEY (`n_emisor`) REFERENCES `emisor` (`id_emisor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `certificado_ibfk_3` FOREIGN KEY (`n_alumno`) REFERENCES `alumno` (`rut_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_certificado`
--
ALTER TABLE `detalle_certificado`
  ADD CONSTRAINT `detalle_certificado_ibfk_1` FOREIGN KEY (`det_certificado`) REFERENCES `certificado` (`id_certificado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
