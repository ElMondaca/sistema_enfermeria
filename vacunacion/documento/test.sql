-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 04:56:03
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `rut_alumno` varchar(255) NOT NULL,
  `n_alumno` varchar(255) NOT NULL,
  `app_alumno` varchar(255) NOT NULL,
  `apm_alumno` varchar(255) NOT NULL,
  `tel_alumno` varchar(255) NOT NULL,
  `mail_alumno` varchar(255) NOT NULL,
  `estado_alumno` varchar(255) NOT NULL,
  `ingreso_alumno` varchar(255) NOT NULL,
  `rni_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`rut_alumno`, `n_alumno`, `app_alumno`, `apm_alumno`, `tel_alumno`, `mail_alumno`, `estado_alumno`, `ingreso_alumno`, `rni_alumno`) VALUES
('1-1', 'Nombre 1', 'Apellido P', 'Apellido M', '+569999999', '', 'Alumno Regular', '2015', 5345345),
('1-2', 'Nombre 2', 'Apellido M', 'Apellido P', '+569888888', 'prueba2@userena.cl', 'Alumno Regular', '2016', 999999),
('1-3', 'Nombre 3', 'Apellido A', 'Apellido C', '+596978797', 'prueba3@userena.cl', 'Alumno Regular', '2015', 123123123),
('1-4', 'Nombre 4', 'Apellido C', 'Apellido B', '+569456456', 'prueba4@userena.cl', 'Alumno Regular', '2016', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int(11) NOT NULL,
  `n_asignatura` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `n_asignatura`) VALUES
(1, 'Fundamentos teoricos de Enfermeria'),
(2, 'Filosofia'),
(3, 'Interaccion Humana'),
(4, 'Psicologia General'),
(5, 'Biologia'),
(6, 'Matematicas'),
(7, 'Quimica General'),
(8, 'Anatomia Humana'),
(9, 'Proceso de Enfermeria'),
(10, 'Ciencias de la Salud Comunitaria'),
(11, 'Socio Antropologia'),
(12, 'Psicologia evolutiva'),
(13, 'Enfermeria Psicosocial'),
(14, 'Fisica'),
(15, 'Bioquimica'),
(16, 'Histologia y embriologia'),
(17, 'Anatomia II'),
(18, 'Fisiologia'),
(19, 'Microbiologia y parasitologia'),
(20, 'Proceso de Enfermeria I'),
(21, 'Administracion en Enfermeria'),
(22, 'Estadistica de la Salud'),
(23, 'Higiene y primeros auxilios'),
(24, 'Educacion para el autocuidado'),
(25, 'Psicologia social'),
(26, 'Proceso de Enfermeria psicosocial'),
(27, 'Fisiopatologia'),
(28, 'Farmacologia'),
(29, 'Proceso de Enfermeria II'),
(30, 'Administracion y liderazgo en Enfermeria'),
(31, 'Enfermeria en salud Comunitaria I'),
(32, 'Administracion en Enfermeria'),
(33, 'Enfermeria de la mujer'),
(34, 'Proceso de enfermeria de la mujer'),
(35, 'Enfermeria en salud mental'),
(36, 'Proceso de enfermeria en salud mental'),
(37, 'Enfermeria del adulto'),
(38, 'Proceso de enfermeria del adulto'),
(39, 'Proceso de enfermeria en salud comunitaria I'),
(40, 'Enfermeria en adulto II'),
(41, 'Proceso de enfermeria del adulto II'),
(42, 'Enfermeria en emergencias y desastres'),
(43, 'Enfermeria en salud comunitaria II'),
(44, 'Enfermeria en epidemiologia'),
(45, 'Proceso de enfermeria del niño'),
(46, 'Proceso de enfermeria del adolescente'),
(47, 'Administracion y liderazgo en enfermeria'),
(48, 'Bioetica'),
(49, 'Investigacion en enfermeria'),
(50, 'Enfermeria del nino y del adolescente'),
(51, 'Enfermeria en salud ocupacional'),
(52, 'Investigacion en Enfermeria'),
(53, 'Proceso de enfermeria rural'),
(54, 'Proceso de enfermeria en emergencias'),
(55, 'Internado profesional '),
(56, 'Internado profesional II');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura_impartida`
--

CREATE TABLE `asignatura_impartida` (
  `id_detalle` int(11) NOT NULL,
  `det_docente` varchar(255) NOT NULL,
  `det_asignatura` int(11) NOT NULL,
  `ded_horaria` varchar(255) NOT NULL,
  `jornada_docente` varchar(255) NOT NULL,
  `año_colab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignatura_impartida`
--

INSERT INTO `asignatura_impartida` (`id_detalle`, `det_docente`, `det_asignatura`, `ded_horaria`, `jornada_docente`, `año_colab`) VALUES
(1, '15.333.666-9', 15, 'Completa', 'Media Jornada', 2012),
(2, '15.333.666-9', 4, 'Completa', 'Media Jornada', 2013),
(12, '15.333.666-9', 1, '321', 'Jornada Completa', 2014);

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
(18, '1-4', 1, 5, 'Intoxicación alimenticia', 10, '2021-04-23', '2021-04-26'),
(19, '1-1', 3, 3, 'Intoxicación alimenticia', 10, '2021-04-23', '2021-04-26'),
(20, '1-1', 2, 3, 'Intoxicación alimenticia', 10, '2021-04-19', '2021-04-26'),
(21, '1-1', 1, 3, 'Intoxicación alimenticia', 10, '2021-04-27', '2021-05-05');

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
(1, 'Laboratorio', 'Filosofia', '17.722.208-9', '2021-04-26', 19),
(32, 'Clase', 'Filosofia', '4.303.616-6', '2021-05-27', 19),
(33, 'Laboratorio', 'Fundamentos teoricos de Enfermeria', '17.722.208-9', '2021-05-24', 21),
(34, 'Clase', 'Biologia', '15.333.666-9', '2021-05-26', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `rut_docente` varchar(255) NOT NULL,
  `n_docente` varchar(255) NOT NULL,
  `app_docente` varchar(255) NOT NULL,
  `apm_docente` varchar(255) NOT NULL,
  `ingreso_docente` varchar(255) NOT NULL,
  `mail_docente` varchar(255) NOT NULL,
  `depto_docente` varchar(255) NOT NULL,
  `estado_docente` varchar(255) NOT NULL,
  `titulo_docente` varchar(255) NOT NULL,
  `grado_academico` varchar(255) NOT NULL,
  `jerar_docente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`rut_docente`, `n_docente`, `app_docente`, `apm_docente`, `ingreso_docente`, `mail_docente`, `depto_docente`, `estado_docente`, `titulo_docente`, `grado_academico`, `jerar_docente`) VALUES
('15.333.666-9', 'Prueba prueba', 'prueba', 'prueba', '2016', 'prueba@userena.cl', 'Enfermería', 'Inactivo', 'Enfermero', 'Doctorado', 'Profesor Titular'),
('17.722.208-9', 'Jorge', 'Mondaca', 'Docente', '2015', 'jmondaca@userena.cl', 'Biología', 'Activo', 'Biología', 'gradoaca', 'jerarquia'),
('4.303.616-6', 'Docente Prueba', 'Paterno', 'Materno', '2017', 'docentep@userena.cl', 'Matemáticas', 'Activo', 'Profesor de Estado en Matemáticas', 'Licenciado', 'Profesor Titular');

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
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `obs_entrega` varchar(255) NOT NULL,
  `det_prestamo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`id_entrega`, `fecha_entrega`, `obs_entrega`, `det_prestamo`) VALUES
(3, '2021-04-29', 'asdasd', 3),
(4, '2021-05-10', 'sin cables', 4),
(5, '2021-05-10', 'Sin sus accesorios', 5),
(6, '2021-05-27', 'se entrega equipo con todos sus accesorios', 6),
(7, '2021-06-09', 'se entrega equipo con todos sus accesorios', 8),
(8, '2021-05-27', 'se entrega equipo con todos sus accesorios', 7),
(9, '2021-06-07', 'se entrega equipo con todos sus accesorios', 9),
(10, '2021-06-07', 'se entrega equipo con todos sus accesorios', 10),
(11, '2021-06-04', 'se entrega equipo con todos sus accesorios', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `n_equipo` varchar(255) NOT NULL,
  `det_equipo` varchar(255) NOT NULL,
  `tipo_equipo` varchar(255) NOT NULL,
  `observ_equipo` varchar(255) NOT NULL,
  `estado_equipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `n_equipo`, `det_equipo`, `tipo_equipo`, `observ_equipo`, `estado_equipo`) VALUES
(27469, 'Notebook HP', '240 G6', 'Informático', 'Donación de Oficina de Acreditación', 'Guardado'),
(27554, 'Impresora Epson', 'Multifuncional L380, ecotank', 'Impresión', 'Donados', 'Guardado'),
(27558, 'Proyector Epson', 'Powerlite s27', 'Informático', 'Donación Oficina de Acreditación', 'Guardado'),
(27969, 'Televisor', 'LG 55\"', 'Equipamiento', 'Proceso autoevaluación carrera de Enfermería', 'Guardado');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo2`
--

CREATE TABLE `prestamo2` (
  `id_prestamo` int(11) NOT NULL,
  `det_equipo` int(11) NOT NULL,
  `det_alumno` varchar(255) NOT NULL,
  `det_docente` varchar(255) NOT NULL,
  `det_actividad` varchar(255) NOT NULL,
  `asig_actividad` varchar(255) NOT NULL,
  `dir_actividad` varchar(255) NOT NULL,
  `contacto_est` varchar(255) NOT NULL,
  `tel_estudiante` varchar(255) NOT NULL,
  `observ_prestamo` varchar(255) NOT NULL,
  `fecha_solcitud` date NOT NULL,
  `estado_prestamo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo2`
--

INSERT INTO `prestamo2` (`id_prestamo`, `det_equipo`, `det_alumno`, `det_docente`, `det_actividad`, `asig_actividad`, `dir_actividad`, `contacto_est`, `tel_estudiante`, `observ_prestamo`, `fecha_solcitud`, `estado_prestamo`) VALUES
(3, 27554, '1-2', '17.722.208-9', 'dgdg', 'Asignatura 2', 'dfgdfg', 'asdasdasdasdasd', '', 'dfgdfg', '2021-04-27', 'Entregado'),
(4, 27469, '1-3', '17.722.208-9', 'dasd', 'Asignatura 1', 'asdasd', 'asdasdasdasdasd', '', 'gdgdfgdfg', '2021-05-04', 'Entregado'),
(5, 27469, '1-1', '17.722.208-9', 'fghfgh', 'Asignatura 1', 'fghfgh', 'gfhfghgf', '', 'se entrega equipo con todos sus accesorios', '2021-05-04', 'Entregado'),
(6, 27469, '1-3', '17.722.208-9', 'Clases', 'Asignatura 3', 'Matta 147', 'mondaca.jorge.l2@gmail.com', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-05-24', 'Entregado'),
(7, 27469, '1-1', '17.722.208-9', 'Clases', 'Asignatura 2', 'Matta 147', 'jmondaca@userena.cl', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-05-26', 'Entregado'),
(8, 27969, '1-1', '17.722.208-9', 'Clases', 'Asignatura 2', 'Matta 147', 'mondaca.jorge.l2@gmail.com', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-05-25', 'Entregado'),
(9, 27469, '1-1', '17.722.208-9', 'Clases', 'Asignatura 2', 'Matta 147', 'mondaca.jorge.l2@gmail.com', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-05-31', 'Entregado'),
(10, 27469, '1-1', '15.333.666-9', 'Clases', 'Asignatura 1', 'Matta 147', 'mondaca.jorge.l2@gmail.com', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-05-31', 'Entregado'),
(11, 27469, '1-1', '15.333.666-9', 'Clases', 'Asignatura 2', 'Matta 147', 'mondaca.jorge.l2@gmail.com', ' 56978806430', 'se entrega equipo con todos sus accesorios', '2021-06-01', 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacuna`
--

CREATE TABLE `vacuna` (
  `id_vacuna` int(11) NOT NULL,
  `n_vacuna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacuna`
--

INSERT INTO `vacuna` (`id_vacuna`, `n_vacuna`) VALUES
(1, 'Hepatitis B 1ra Dosis'),
(2, 'Hepatitis B 2da Dosis'),
(3, 'Hepatitis B 3ra Dosis'),
(4, 'Influenza'),
(5, 'Hepatitis A'),
(6, 'SRP20-24 AÑOS'),
(7, 'Covid 1era Dosis'),
(8, 'Covid 2da Dosis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunacion2`
--

CREATE TABLE `vacunacion2` (
  `id_vacunacion` int(11) NOT NULL,
  `det_vacuna` int(11) NOT NULL,
  `det_alumno` varchar(255) NOT NULL,
  `fecha_vacunacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunacion2`
--

INSERT INTO `vacunacion2` (`id_vacunacion`, `det_vacuna`, `det_alumno`, `fecha_vacunacion`) VALUES
(1, 1, '1-1', '2021-05-03'),
(2, 2, '1-1', '2021-05-17'),
(3, 1, '1-2', '2021-05-26'),
(4, 3, '1-2', '2021-07-28'),
(5, 2, '1-2', '2021-06-14'),
(7, 3, '1-1', '2021-05-31'),
(8, 1, '1-3', '2021-05-31'),
(9, 2, '1-1', '2021-06-16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`rut_alumno`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `asignatura_impartida`
--
ALTER TABLE `asignatura_impartida`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `det_docente` (`det_docente`),
  ADD KEY `det_asignatura` (`det_asignatura`);

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
  ADD KEY `id_certificado` (`det_certificado`),
  ADD KEY `det_profesor` (`det_profesor`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`rut_docente`);

--
-- Indices de la tabla `emisor`
--
ALTER TABLE `emisor`
  ADD PRIMARY KEY (`id_emisor`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `det_prestamo` (`det_prestamo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `prestamo2`
--
ALTER TABLE `prestamo2`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `det_equipo` (`det_equipo`),
  ADD KEY `det_alumno` (`det_alumno`),
  ADD KEY `det_docente` (`det_docente`);

--
-- Indices de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  ADD PRIMARY KEY (`id_vacuna`);

--
-- Indices de la tabla `vacunacion2`
--
ALTER TABLE `vacunacion2`
  ADD PRIMARY KEY (`id_vacunacion`),
  ADD KEY `det_vacuna` (`det_vacuna`),
  ADD KEY `det_alumno` (`det_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `asignatura_impartida`
--
ALTER TABLE `asignatura_impartida`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detalle_certificado`
--
ALTER TABLE `detalle_certificado`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `emisor`
--
ALTER TABLE `emisor`
  MODIFY `id_emisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `prestamo2`
--
ALTER TABLE `prestamo2`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `vacuna`
--
ALTER TABLE `vacuna`
  MODIFY `id_vacuna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vacunacion2`
--
ALTER TABLE `vacunacion2`
  MODIFY `id_vacunacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignatura_impartida`
--
ALTER TABLE `asignatura_impartida`
  ADD CONSTRAINT `asignatura_impartida_ibfk_1` FOREIGN KEY (`det_docente`) REFERENCES `docente` (`rut_docente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignatura_impartida_ibfk_2` FOREIGN KEY (`det_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `detalle_certificado_ibfk_1` FOREIGN KEY (`det_certificado`) REFERENCES `certificado` (`id_certificado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_certificado_ibfk_2` FOREIGN KEY (`det_profesor`) REFERENCES `docente` (`rut_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`det_prestamo`) REFERENCES `prestamo2` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo2`
--
ALTER TABLE `prestamo2`
  ADD CONSTRAINT `prestamo2_ibfk_1` FOREIGN KEY (`det_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo2_ibfk_2` FOREIGN KEY (`det_alumno`) REFERENCES `alumno` (`rut_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo2_ibfk_3` FOREIGN KEY (`det_docente`) REFERENCES `docente` (`rut_docente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vacunacion2`
--
ALTER TABLE `vacunacion2`
  ADD CONSTRAINT `vacunacion2_ibfk_1` FOREIGN KEY (`det_vacuna`) REFERENCES `vacuna` (`id_vacuna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vacunacion2_ibfk_2` FOREIGN KEY (`det_alumno`) REFERENCES `alumno` (`rut_alumno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
