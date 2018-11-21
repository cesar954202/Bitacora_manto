-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2018 a las 09:58:33
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitacoramanto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `id_incidente` int(11) NOT NULL,
  `habitacion` varchar(30) NOT NULL,
  `objeto` varchar(30) NOT NULL,
  `servicio` varchar(40) NOT NULL,
  `date_1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `comentario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`id_incidente`, `habitacion`, `objeto`, `servicio`, `date_1`, `id_usuario`, `comentario`) VALUES
(1, '1919', 'chapa', 'Cambio de baterias', '2018-09-07 16:04:39', 2, 'Ok jesus jauregui'),
(2, '1919', 'chapa', 'Apertura', '2018-09-07 16:04:39', 2, 'Ok jesus jauregui'),
(3, '1425', 'chapa', 'Cambio de baterias', '2018-09-18 14:44:54', 2, 'Reinstalacion.'),
(4, '1425', 'chapa', 'Reprogramacion', '2018-09-18 14:44:54', 2, 'Reinstalacion.'),
(5, '1426', 'chapa', 'Cambio de baterias', '2018-09-18 14:45:13', 2, 'Reinstalacion'),
(6, '1426', 'chapa', 'Reprogramacion', '2018-09-18 14:45:13', 2, 'Reinstalacion'),
(7, '1111', 'chapa', 'Cambio de baterias', '2018-09-18 20:04:06', 3, 'cilindor estaba da;ado'),
(8, '1112', 'chapa', 'Cambio de baterias', '2018-09-18 20:20:10', 3, 'cambio de bateria'),
(9, '1112', 'chapa', 'Reprogramacion', '2018-09-18 20:20:11', 3, 'cambio de bateria'),
(10, '1414', 'chapa', 'Cambio de baterias', '2018-09-18 20:22:42', 3, 'baterias infladas'),
(11, '1414', 'chapa', 'Apertura', '2018-09-18 20:22:42', 3, 'baterias infladas'),
(12, '2005', 'chapa', 'Cambio de baterias', '2018-09-21 17:37:16', 17, 'Ok vericando cable hacia pilas'),
(13, '2103', 'chapa', 'Apertura', '2018-09-22 19:10:56', 2, 'Se realiza apertura se espera a manto pRa cambio d'),
(14, '2129', 'chapa', 'Reprogramacion', '2018-09-28 19:03:35', 2, 'Se reprograma por que se abre sin lalve'),
(15, '1804', 'chapa', 'Apertura', '2018-10-02 15:42:37', 2, 'Se realiza apertura en espera de cambio de bateria'),
(16, '1804', 'chapa', 'Cambio de baterias', '2018-10-03 15:19:27', 2, 'Se realzia cambio de baterias por Jesus Jauregui'),
(17, '2233', 'chapa', 'Cambio de baterias', '2018-10-03 15:19:58', 2, 'Cambio de baterias por Jesus Jauregui'),
(18, '2233', 'chapa', 'Apertura', '2018-10-03 15:19:58', 2, 'Cambio de baterias por Jesus Jauregui'),
(19, '2026', 'caja', 'Apertura', '2018-10-03 15:20:49', 2, 'Se realiza apertura habitacion vacia'),
(20, '2233', 'chapa', 'Reprogramacion', '2018-10-03 15:30:41', 2, 'Por cambio de baterias pierde programacion'),
(21, '1834', 'chapa', 'Apertura', '2018-10-04 17:57:11', 2, 'En espera cambio de baterias'),
(22, '1823', 'chapa', 'Reprogramacion', '2018-10-04 17:57:38', 2, 'Se reprograma ya que no marcaba ninguna luz'),
(23, '1919', 'chapa', 'Cambio de baterias', '2018-10-11 14:36:47', 2, 'Se realiza cambio de baterias por Alan'),
(24, '1919', 'chapa', 'Apertura', '2018-10-11 14:36:47', 2, 'Se realiza cambio de baterias por Alan'),
(25, '1919', 'chapa', 'Reprogramacion', '2018-10-11 14:36:47', 2, 'Se realiza cambio de baterias por Alan'),
(26, '1823', 'chapa', 'Cambio de baterias', '2018-10-16 17:48:06', 2, 'Se reemplazan baterias.'),
(27, '1823', 'chapa', 'Apertura', '2018-10-16 17:48:06', 2, 'Se reemplazan baterias.'),
(28, '1823', 'chapa', 'Reprogramacion', '2018-10-16 17:48:06', 2, 'Se reemplazan baterias.'),
(29, '23', 'chapa', 'Reprogramacion', '2018-10-16 17:50:03', 2, 'Reprogramacion chapa de entarda del club piso 23'),
(30, '2126', 'caja', 'Reprogramacion', '2018-10-25 14:03:32', 2, 'Se instala caja de seguridad en la habitacion.'),
(31, '1222', 'chapa', 'Cambio de baterias', '2018-11-01 14:26:02', 17, 'Se cambia'),
(32, '1000', 'chapa', 'Cambio de baterias', '2018-11-01 14:26:46', 17, 'Ok'),
(33, '1116', 'chapa', 'Cambio de baterias', '2018-11-01 14:27:23', 17, 'Ok'),
(34, '1825', 'chapa', 'Cambio de baterias', '2018-11-17 19:53:55', 17, 'Ok');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `tipo`) VALUES
(1, 'ADMIN', 'pr3s1d3nt3', 0),
(2, 'CESAR_SANCHEZ', '123', 0),
(3, 'CARLOS_PACHECO', '111', 0),
(4, 'ENRIQUE_CRUZ', '123', 1),
(5, 'CESAR_CISNEROS', '123', 1),
(6, 'DANIEL_LANDA', '123', 1),
(7, 'GERARDO_GARCIA', '123', 1),
(8, 'JESUS_JAUREGUI', '123', 1),
(9, 'RICARDO_CORTES', '123', 1),
(10, 'ALAN_RODRIGUEZ', '123', 1),
(11, 'DESDIER_OLIVA', '123', 1),
(12, 'JOSE_SORIA', '123', 1),
(13, 'JOSE_ESCOBAR', '123', 1),
(14, 'MARCOS_LOPEZ', '123', 1),
(15, 'ANTONIO_MORALES', '123', 1),
(16, 'CARLOS_BERNAL', '123', 1),
(17, 'HECTOR_FLORES', '123', 1),
(18, 'ANTONIO_CHAVEZ', '123', 1),
(19, 'MIGUEL_MERCADO', '123', 1),
(20, 'JOSE_DIAZ', '123', 1),
(21, 'FAUSTO_ADAILE', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`id_incidente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `id_incidente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
