-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 10:02:13
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id` int(11) NOT NULL,
  `localidad` varchar(255) DEFAULT NULL,
  `recinto` varchar(255) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `localidad`, `recinto`, `direccion`) VALUES
(1, 'Sevilla', 'Sala Miarma', 'C/ Macarena 9'),
(2, 'Málaga', 'Sala Picasso', 'C/ Penélope Cruz 12'),
(3, 'Madrid', 'Fabrik', 'C/ Caudillito 24'),
(5, 'Malaga', 'Pabellón Martín Carpena', 'C/ Avenida Juarez 9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `familia` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `foto` varchar(2000) DEFAULT NULL,
  `datos` varchar(5000) DEFAULT NULL,
  `fechaCarga` datetime DEFAULT NULL,
  `lugarCarga` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `nombre`, `familia`, `marca`, `foto`, `datos`, `fechaCarga`, `lugarCarga`) VALUES
(1, 'material1', 'familiamaterial1', 'marcapolla', 'https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg', 'datos qwerty loren ipsum blablablalbablamarcogay', '0000-00-00 00:00:00', 'lugarCarga1'),
(2, 'material2', 'familiamaterial2', 'marcapolla', 'https://pbs.twimg.com/media/D6uc2kBX4AAv3xV.jpg', 'datos qwerty loren ipsum blablablalbablamarcogay', '0000-00-00 00:00:00', 'lugarCarga1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `tarjetaSanitaria` varchar(255) DEFAULT NULL,
  `nSeguridadSocial` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `comentarios` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombre`, `dni`, `tarjetaSanitaria`, `nSeguridadSocial`, `imagen`, `direccion`, `telefono`, `comentarios`) VALUES
(31, 'Julio Gómez', '74309841P', '511518314125', '512124512541', 'JulianGomez.jpg', 'C/ Doctor Vaca de Castro 5 - Genil', '656574857', ''),
(32, 'Cristina Rojas', '67141461M', '123514515124', '151771578826', 'cristinaRojas2.jpg', 'C/ Corralon de Veridaz 31', '761551164', ''),
(33, 'Pedro Hinostroza', '74516731C', '511869098175', '128651869951', '', 'C/ Aire Alta 51', '657145424', 'Profesional en equipos de sonido'),
(35, 'Jose Ignacio', '71456157C', '123657982441', '651671567145', 'joseIgnacio.jpg', 'C/ Alcala de Henares 5', '651671456', 'Proveedor de equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `rol`) VALUES
(1, 'admin', '$2a$12$r./u0nOrrhjZO1seOCaM6.xKTOKyUpQPaOA6rPkiGFr1wZkdQimCK', 'admin'),
(2, 'trabajador1', '$2a$12$r./u0nOrrhjZO1seOCaM6.xKTOKyUpQPaOA6rPkiGFr1wZkdQimCK', 'lectura'),
(4, 'felipe', '$2y$10$yaKnLMNOUGJZMCNmWjZvA.myB0B2vEnNRGWu4izD3fpbfz83.JHZq', 'empleado'),
(5, 'eduardo', '$2y$10$vdPpyGXZniJ4aP8jN0p3JeXaoiYasGoPU8qtlxtKmW8j8q0.oSMrK', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `matricula` varchar(200) DEFAULT NULL,
  `modelo` varchar(200) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `imagenItv` varchar(255) DEFAULT NULL,
  `imagenPermisoCirculacion` varchar(255) DEFAULT NULL,
  `ultimaItv` mediumtext DEFAULT NULL,
  `averias` varchar(5000) DEFAULT NULL,
  `kms` int(11) DEFAULT NULL,
  `seguro` varchar(200) DEFAULT NULL,
  `fechaSeguro` varchar(200) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `marca`, `matricula`, `modelo`, `imagen`, `imagenItv`, `imagenPermisoCirculacion`, `ultimaItv`, `averias`, `kms`, `seguro`, `fechaSeguro`, `observaciones`) VALUES
(3, 'Dacia', 'Dokker', '211-PDA', 'furgoneta1.jpg', 'itv.jpg', 'permisoCirculacion.jpg', 'LUNA', '29-01-2006', 126, 'SI TIENE', '01-01-2006', 'SI'),
(4, 'BMW', '5114-EF', '6', 'furgoneta1.jpg', 'itv.jpg', 'permisoCirculacion.jpg', '25-09-2022', 'LLANTA', 156, 'SI TIENE', '26-12-2001   ', 'ninguna'),
(5, 'Ford', 'Ranger', '5114-EFK', 'furgoneta1.jpg', 'itv.jpg', 'permisoCirculacion.jpg', 'Motor', '25-01-2007', 2000, 'SEGURO', '16-05-2010', 'ninguna'),
(6, 'Lamborghini', 'Spire VRT', 'ADM-215', 'tractorLamb.jpg', 'itv.jpg', 'permisoCirculacion.jpg', 'NINGUNA', '26-04-1992', 1200, 'SI TIENE', '17-05-2011', 'ninguna');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
