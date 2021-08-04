-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2018 a las 02:02:52
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_proyecto`
--
CREATE DATABASE `bd_proyecto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_proyecto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE IF NOT EXISTS `consultas` (
  `nro_consulta` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `telefono` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `asunto` varchar(20) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`nro_consulta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`nro_consulta`, `nombre`, `telefono`, `email`, `asunto`, `consulta`, `estado`) VALUES
(1, 'Federico', 99166578, 'fedemed@gmail.com', 'gran pagina', 'Que buena que esta la pagina, como hiciste??', 'Leida'),
(2, 'Luciano', 98180300, 'lucianogalusso@gmail.com', 'hola', 'hola mundo', 'Leida'),
(3, 'Francisco', 99191983, 'francra@gmail.com', 'lolxd', 'la pro pagina', 'Leida'),
(4, 'Luciano ', 98180300, 'lucianogalusso@gmail.com', 'prueba', 'prueba de consulta', 'Leida'),
(6, 'Leandro Garcia', 9451335, 'leagarcia@gmail.com', 'ayuda', 'Hay una cosa que no entiendo, me podes llamar al celular?', 'No leida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encomiendas`
--

CREATE TABLE IF NOT EXISTS `encomiendas` (
  `nro_encomienda` int(2) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `ciudad_origen` varchar(40) NOT NULL,
  `ciudad_destino` varchar(40) NOT NULL,
  `nombre_desp` varchar(40) NOT NULL,
  `nombre_dest` varchar(40) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  PRIMARY KEY (`nro_encomienda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `encomiendas`
--

INSERT INTO `encomiendas` (`nro_encomienda`, `fecha`, `ciudad_origen`, `ciudad_destino`, `nombre_desp`, `nombre_dest`, `estado`, `tipo`, `observaciones`) VALUES
(1, '2018-03-08 00:00:00', 'Berlin', 'Montevideo', 'Luciano Galusso', 'Francisco Galusso', 'Pendiente', 'otro', 'un cargamento raro'),
(2, '2018-03-12 12:09:42', 'Munich', 'Montevideo', 'Ralph Lahser', 'Leandro Garcia', 'Pendiente', 'sobre', ''),
(3, '2018-03-01 16:53:00', 'Soriano', 'Canelones', 'Gerardo Martinez', 'Matias Da Silva', 'Pendiente', 'paquete', 'Mucho cuidado'),
(4, '2018-03-02 17:23:00', 'Buenos Aiires', 'Mendoza', 'Anakin Lopez', 'Luke Azadian', 'Pendiente', 'sobre', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` int(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `email`, `contrasena`, `tipo`) VALUES
(28928917, 'Martin Perez', 'svhbjasv@gmail.com', '3e1de4cc449edaa61dbe80b78853a7a7', ''),
(32158461, 'Leandro Garcia', 'vav@gmail.com', '530987d9e511e9ff21e8dde9d7791fcc', ''),
(45327258, 'Laura Dimisa', 'bzdb@gmail.com', '819fad732d166e627559fa7443ac20ad', 'recep2018'),
(51561582, 'lorenzo lopez', 'lop@gmail.com', '9a9c933853ec22a209c7cb6cb04ebee8', 'admin2018'),
(51561615, 'Leonardo perez', 'perezleo@gmail.com', '530987d9e511e9ff21e8dde9d7791fcc', 'recep2018'),
(51932005, 'Federico Galusso', 'fedemed@gmail.com', '7d11810cf99c74a1f3fa22c3879ea39d', 'admin2018'),
(51932064, 'Luciano Galusso', 'lucianogalusso@gmail.com', '203e35baf056ddd899d8c47fd971bc52', 'admin2018');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
