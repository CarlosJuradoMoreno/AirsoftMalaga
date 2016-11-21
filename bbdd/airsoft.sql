-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2016 a las 10:54:20
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `airsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos`
--

CREATE TABLE `campos` (
  `Id_Campo` int(11) NOT NULL,
  `Nombre_Campo` varchar(250) NOT NULL,
  `Tam_Campo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campos`
--

INSERT INTO `campos` (`Id_Campo`, `Nombre_Campo`, `Tam_Campo`) VALUES
(1, 'Bateria 16', 30),
(2, 'Minerva Combat', 40),
(3, 'TBA', 30),
(4, 'Ciudad del Airsoft', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `Id_Jugador` int(11) NOT NULL,
  `Nombre_Jugador` varchar(250) NOT NULL,
  `Replica_Jugador` varchar(250) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Nombre_Usuario` varchar(255) NOT NULL,
  `Pass_Usuario` varchar(255) NOT NULL,
  `Tipo_Usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`Id_Jugador`, `Nombre_Jugador`, `Replica_Jugador`, `Edad`, `Nombre_Usuario`, `Pass_Usuario`, `Tipo_Usuario`) VALUES
(3, 'pepe', 'm4', 32, 'pepe', 'passPepe', 'cliente'),
(28, '', '', 99991, 'carlos', 'passCarlos', 'admin'),
(33, 'javi', '', 0, 'eljavi', 'passJavi', 'cliente'),
(34, '', '', 0, 'alex', 'passAlex', 'cliente'),
(35, 'elnuevo', 'm2', 27, 'cliente', 'nuevoCliente', 'cliente'),
(36, '', '', 0, 'arroyo', 'arroyito', 'cliente'),
(37, '', '', 0, 'Manuelete', '1234', 'cliente'),
(38, '', '', 0, 'Manuelete', '1234', 'cliente'),
(41, '', '', 0, 'manuelete', 'manolo', 'cliente'),
(42, '', '', 0, 'moi', 'moise', 'cliente'),
(43, '', '', 0, 'moisee', 'moi', 'cliente'),
(44, 'moisesese', 'cuchicllo', 30, 'elmoi', 'mois', 'cliente'),
(45, 'caelose', 'puÃ±os', 23, 'elcarlo', '123', 'cliente'),
(52, 'admin1', 'none', 213, 'admin2', '1234', 'admin'),
(53, 'arroyo', 'karate', 99, 'arroyo', '1234', 'cliente'),
(54, 'aase', 'qwea', 22, 'isabel', '1234', 'cliente'),
(55, '', '', 0, 'usuariocliente', '1234', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador_partida`
--

CREATE TABLE `jugador_partida` (
  `Jugador` int(11) NOT NULL,
  `Partida` int(11) NOT NULL,
  `Id_Jugador_Partida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador_partida`
--

INSERT INTO `jugador_partida` (`Jugador`, `Partida`, `Id_Jugador_Partida`) VALUES
(3, 1, 5),
(44, 1, 7),
(45, 2, 12),
(54, 4, 14),
(55, 2, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `Campo` int(11) NOT NULL,
  `Id_Partida` int(11) NOT NULL,
  `tamaño` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`Campo`, `Id_Partida`, `tamaño`) VALUES
(2, 1, 60),
(1, 2, 30),
(3, 3, 20),
(4, 4, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`Id_Campo`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`Id_Jugador`);

--
-- Indices de la tabla `jugador_partida`
--
ALTER TABLE `jugador_partida`
  ADD PRIMARY KEY (`Id_Jugador_Partida`),
  ADD UNIQUE KEY `Jugador_2` (`Jugador`),
  ADD KEY `Jugador` (`Jugador`),
  ADD KEY `Partida` (`Partida`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`Id_Partida`),
  ADD KEY `Id_Campo` (`Campo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campos`
--
ALTER TABLE `campos`
  MODIFY `Id_Campo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `Id_Jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `jugador_partida`
--
ALTER TABLE `jugador_partida`
  MODIFY `Id_Jugador_Partida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `Id_Partida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugador_partida`
--
ALTER TABLE `jugador_partida`
  ADD CONSTRAINT `jugador_partida_ibfk_1` FOREIGN KEY (`Jugador`) REFERENCES `jugador` (`Id_Jugador`) ON DELETE CASCADE,
  ADD CONSTRAINT `jugador_partida_ibfk_2` FOREIGN KEY (`Partida`) REFERENCES `partida` (`Id_Partida`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`Campo`) REFERENCES `campos` (`Id_Campo`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
