-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 07-10-2019 a las 00:30:16
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pokemons_pablo_sanchez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Generacion`
--

CREATE TABLE `Generacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Generacion`
--

INSERT INTO `Generacion` (`id`, `descripcion`) VALUES
(1, 'primera generacion'),
(2, 'segunda generacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Genero`
--

CREATE TABLE `Genero` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Genero`
--

INSERT INTO `Genero` (`id`, `descripcion`) VALUES
(1, 'macho'),
(2, 'hembra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pokemon`
--

CREATE TABLE `Pokemon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `habilidad` varchar(255) NOT NULL,
  `habilidad_oculta` varchar(255) NOT NULL,
  `generacion_id` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pokemon`
--

INSERT INTO `Pokemon` (`id`, `nombre`, `tipo_id`, `genero_id`, `habilidad`, `habilidad_oculta`, `generacion_id`, `imagen`) VALUES
(11, 'Vignette', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/a/a9/Pidgeot.png/revision/latest/scale-to-width-down/1000?cb=20141214190416'),
(12, 'Bulbasaur', 2, 1, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/4/43/Bulbasaur.png/revision/latest?cb=20170120032346'),
(13, 'Ivysaur', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/8/86/Ivysaur.png/revision/latest?cb=20140207202404'),
(14, 'Charmander', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/5/56/Charmander.png/revision/latest?cb=20140207202456'),
(15, 'Squirtle', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/e/e3/Squirtle.png/revision/latest?cb=20160309230820'),
(16, 'Caterpie', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/0/05/Caterpie.png/revision/latest?cb=20170615202446'),
(17, 'Weedle', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/d/d6/Weedle.png/revision/latest?cb=20080723091802'),
(18, 'Metapod', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/6/6b/Metapod.png/revision/latest?cb=20080723091759'),
(19, 'Fearow', 1, 2, 'ninguna', 'ninguna', 2, 'https://vignette.wikia.nocookie.net/es.pokemon/images/4/41/Fearow.png/revision/latest?cb=20170617014432');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo`
--

CREATE TABLE `Tipo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tipo`
--

INSERT INTO `Tipo` (`id`, `descripcion`) VALUES
(1, 'planta'),
(2, 'veneno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `email`, `contraseña`, `rol`) VALUES
(1, 'pds.gomez@gmail.com', '123456', 'admin'),
(2, 'maryan.pascucci@gmail.com', '123456', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Generacion`
--
ALTER TABLE `Generacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Genero`
--
ALTER TABLE `Genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD PRIMARY KEY (`id`) USING HASH,
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `generacion_id` (`generacion_id`) USING BTREE,
  ADD KEY `genero_id` (`genero_id`) USING BTREE;

--
-- Indices de la tabla `Tipo`
--
ALTER TABLE `Tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Pokemon`
--
ALTER TABLE `Pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Pokemon`
--
ALTER TABLE `Pokemon`
  ADD CONSTRAINT `fk_genero_id` FOREIGN KEY (`genero_id`) REFERENCES `Genero` (`id`),
  ADD CONSTRAINT `genero_id` FOREIGN KEY (`generacion_id`) REFERENCES `Generacion` (`id`),
  ADD CONSTRAINT `tipo_id` FOREIGN KEY (`tipo_id`) REFERENCES `Tipo` (`id`);