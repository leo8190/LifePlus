-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 01:05:10
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `life+`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencias`
--

CREATE TABLE `agencias` (
  `id_agencia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `agencias`
--

INSERT INTO `agencias` (`id_agencia`, `nombre`) VALUES
(1, 'primeraa'),
(2, 'Segunda'),
(3, 'Tercera'),
(4, 'Cuarta'),
(5, 'Quinta'),
(6, 'Octava'),
(7, 'Sexta'),
(8, 'lallalalaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asociado`
--

CREATE TABLE `asociado` (
  `dni` int(8) NOT NULL,
  `numero_asoc` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios_estado`
--

CREATE TABLE `cambios_estado` (
  `id_camb_estado` int(5) NOT NULL,
  `estado_act` int(5) NOT NULL,
  `estado_permitido` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cambios_estado`
--

INSERT INTO `cambios_estado` (`id_camb_estado`, `estado_act`, `estado_permitido`) VALUES
(1, 1, 41),
(2, 1, 42),
(3, 1, 43),
(4, 1, 44),
(5, 1, 45),
(6, 1, 46),
(7, 2, 1),
(8, 5, 6),
(9, 5, 1),
(10, 6, 7),
(11, 6, 8),
(12, 8, 6),
(13, 9, 10),
(14, 9, 5),
(15, 9, 11),
(16, 10, 9),
(17, 12, 5),
(18, 12, 41),
(19, 12, 42),
(20, 12, 43),
(21, 12, 44),
(22, 12, 45),
(23, 12, 46),
(24, 1, 5),
(25, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Vencido'),
(3, 'Anulado'),
(5, 'Ok.Carpeta'),
(6, 'Pendiente.Ingreso'),
(7, 'Asociado'),
(8, 'Pedido.Documentacion.Faltante'),
(9, 'Pendiente.Aud.Medica'),
(10, 'Pendiente.Pedido.Certif'),
(11, 'Cuota.Diferencial'),
(12, 'Revision.Supervisor'),
(41, 'Baja-Imposible.Contacto'),
(42, 'Baja-Error.carga.Telemarketing'),
(43, 'Baja-Error.Carga.Promotor'),
(44, 'Baja-Preexistencia'),
(45, 'Baja-Costo.Excesivo'),
(46, 'Baja-Duplicado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id_integrante` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `sexo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `id_prospecto` int(5) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `tipo_ingresante` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id_integrante`, `nombre`, `apellido`, `dni`, `sexo`, `id_prospecto`, `fecha_nacimiento`, `tipo_ingresante`) VALUES
(1, 'Melisa', 'Barrasa', 40090200, 'M', 31, '0000-00-00', 0),
(2, 'Melisa', 'Barrasa', 40090200, 'M', 32, '0000-00-00', 0),
(3, 'Juan', 'Perez', 15064234, 'M', 33, '0000-00-00', 0),
(4, 'Lalo', 'Mir', 13023593, 'M', 34, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajos`
--

CREATE TABLE `legajos` (
  `id_legajo` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `telefono` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `legajos`
--

INSERT INTO `legajos` (`id_legajo`, `nombre`, `apellido`, `email`, `dni`, `telefono`) VALUES
(2, 'Fernando', 'Figueroa', 'ffigueroa@gmail.com', 35456789, 15456123),
(4, 'Leonardo', 'Apollonio', 'leonardo@gmail.com', 33456123, 15456128),
(5, 'Panlo', 'Retero', 'poesr@gmail.com', 54654654, 5484856),
(6, 'Pablit', 'Reter', 'poesr@gmail.co', 54654651, 5484851),
(7, 'Panlo', 'Retero', 'poesr@gmail.com', 54654654, 5484856),
(8, 'Lolo', 'lopez', 'lo@gmail.com', 4565484, 468468),
(9, 'Tamara', 'Polo', 'loas@gmail.com', 45151681, 546848),
(10, 'Tamara', 'Polo', 'loas@gmail.com', 45151681, 546848),
(11, 'Tamara', 'Polo', 'loas@gmail.com', 45151681, 546848),
(12, 'Patricia', 'Paredes', 'l@gmail.com', 546848, 465484),
(30, 'Francisco', 'Doi', 'franjdoi@gmail.com', 40090118, 1140572996),
(32, 'Gabriel', 'wfqwfq', 'ascae', 2147483647, 2147483647),
(33, 'Flor', 'Ferrari', 'florferrari@outlook.com', 38023125, 1142699875),
(34, 'Leo', 'Apolonio', 'leoapolonio@yahoo.com', 35090123, 1123478643);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(5) NOT NULL,
  `id_agencia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_provincia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`id`, `id_agencia`, `nombre`, `id_provincia`) VALUES
(1, 1, 'Moron', 1),
(2, 2, 'La Matanza', 1),
(3, 3, 'San Salvador de Jujuy', 8),
(4, 1, 'Hurlingham', 1),
(5, 3, 'Tilcara', 8),
(6, 2, 'CABA', 1),
(7, 3, 'Resistencia', 5),
(8, 5, 'Ushuaia', 9),
(9, 5, 'Bariloche', 16),
(10, 5, 'Rio Gallegos', 11),
(11, 5, 'Trelew', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(5) NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_prospecto` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectos`
--

CREATE TABLE `prospectos` (
  `id_prospectos` int(5) NOT NULL,
  `vendedor` int(5) NOT NULL,
  `estado_actual` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `dni` int(8) NOT NULL,
  `fecha_alta` date NOT NULL,
  `sexo` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `localidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `prospectos`
--

INSERT INTO `prospectos` (`id_prospectos`, `vendedor`, `estado_actual`, `nombre`, `apellido`, `email`, `dni`, `fecha_alta`, `sexo`, `localidad`) VALUES
(1, 1, 5, 'Diego Armando', 'Maradona', 'eldiegote@gmail.com', 14276579, '2018-11-05', 'M', 1),
(2, 1, 1, 'Mercedes', 'Luna', 'mluna@gmail.com', 28109339, '2018-11-09', 'F', 1),
(3, 2, 2, 'Nadia', 'Gonzalez', 'ngonzal@gmail.com', 32115562, '2018-06-22', 'F', 4),
(4, 1, 1, 'Julio', 'Tevez', 'tevezl@gmail.com', 92113562, '2018-06-17', 'M', 4),
(5, 1, 6, 'Jorge', 'Lopez', 'jorgelop@gmail.com', 29332225, '2018-01-10', 'M', 3),
(6, 1, 1, 'Carlos', 'Ochoa', 'ochoacarlos@gmail.com', 31222225, '2018-03-10', 'M', 3),
(7, 2, 2, 'Lucas', 'Gallardo', 'lucas@gmail.com', 31666862, '2017-12-02', 'M', 3),
(8, 2, 2, 'Maria', 'Velazquez', 'velazquezm@gmail.com', 21667862, '2017-11-02', 'F', 3),
(12, 1, 1, 'Fran', 'doi', 'fernando.umb@gmail.com', 40090118, '2018-11-07', 'M', 1),
(13, 0, 1, 'Leonardo', 'Diaz', 'leo@gmail.com', 45123456, '2018-11-14', 'M', 0),
(14, 0, 11, 'Pablo', 'Resin', 'pablo@gmail.com', 30154123, '2018-11-14', 'M', 0),
(15, 0, 9, 'Araceli', 'Diazes', 'ara@gmail.com', 33456781, '2018-11-14', 'F', 0),
(16, 0, 5, 'Claudio', 'Vazquez', 'clau@gmail.com', 45194875, '2018-11-14', 'F', 0),
(17, 0, 1, 'Pedro', 'Martinez', 'pedro@gmail.com', 45194623, '2018-11-14', 'M', 0),
(18, 0, 1, 'Patricia', 'Rolon', 'pato@hotmail.com', 12456364, '2018-11-15', 'F', 0),
(19, 0, 1, 'Roberta', 'Suarezz', 'roberta@gmail.com', 20456154, '2018-11-15', 'F', 0),
(20, 0, 1, 'Tamara', 'Pamela', 'lasi@gmail.com', 456151, '2018-11-15', 'F', 0),
(21, 0, 1, 'Polo', 'Desito', 'polo@gmail.com', 1545484, '2018-11-15', 'M', 0),
(22, 0, 1, 'Julio ', 'Raul', 'julio@gmail.com', 5465465, '2018-11-15', 'M', 0),
(23, 0, 1, 'Paula', 'Sulo', 'paula@gmail.com', 5465485, '2018-11-15', 'F', 0),
(24, 0, 1, 'Fernando', 'Diaz', 'fer@gmail.com', 33456456, '2018-11-15', 'M', 0),
(25, 0, 1, 'Patricia', 'Jaime', 'patri@gmail.com', 4564654, '2018-11-15', 'F', 0),
(26, 0, 1, 'Ernesto', 'Lopez', 'ern@hotmail.com', 54651651, '2018-11-15', 'M', 0),
(27, 0, 1, 'Pablo', 'Paredes', 'pablopar@gmail.com', 56468468, '2018-11-15', 'M', 0),
(28, 0, 1, 'Suarez', 'Solan', 'lop@eee.com', 456456, '2018-11-15', 'M', 0),
(29, 0, 1, 'Lionel', 'Messi', 'lio10@gmail.com', 20156874, '2018-11-20', 'M', 0),
(30, 0, 1, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 0),
(31, 0, 1, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 0),
(32, 0, 1, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 0),
(33, 0, 1, 'Juan', 'Perez', 'juancito@gmail.com', 15064234, '2018-11-27', 'M', 0),
(34, 0, 1, 'Lalo', 'Mir', 'lalitomir@yahoo.com', 13023593, '2018-11-27', 'M', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id_provincia`, `nombre`) VALUES
(1, 'Buenos Aires'),
(2, 'Santa Fe'),
(3, 'Cordoba'),
(4, 'Entre Rios'),
(5, 'Chaco'),
(6, 'Mendoza'),
(7, 'Salta'),
(8, 'Jujuy'),
(9, 'Tierra del Fuego'),
(10, 'Catamarca'),
(11, 'Santa Cruz'),
(12, 'Chubut'),
(13, 'Rio Negro'),
(14, 'San Juan'),
(15, 'San Luis'),
(16, 'Neuquen'),
(17, 'La Pampa'),
(18, 'La Rioja'),
(19, 'Tucuman'),
(20, 'Santiago del Estero'),
(21, 'Corrientes'),
(22, 'Misiones'),
(23, 'Formosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'administrador'),
(2, 'vendedor'),
(3, 'supervisor'),
(4, 'auditor'),
(5, 'telemarketer'),
(6, 'ingresos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_estprosp_permitidos`
--

CREATE TABLE `rol_estprosp_permitidos` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(5) NOT NULL,
  `id_estado_permitido` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_estprosp_permitidos`
--

INSERT INTO `rol_estprosp_permitidos` (`id_permiso`, `id_rol`, `id_estado_permitido`) VALUES
(1, 2, 1),
(2, 2, 5),
(3, 2, 8),
(4, 2, 10),
(5, 2, 11),
(6, 2, 41),
(7, 2, 42),
(8, 2, 43),
(9, 2, 44),
(10, 2, 45),
(11, 4, 9),
(12, 4, 11),
(13, 6, 6),
(14, 6, 7),
(15, 2, 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id_seguimiento` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_prospecto` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `seguimientos`
--

INSERT INTO `seguimientos` (`id_seguimiento`, `fecha`, `descripcion`, `id_prospecto`, `id_usuario`) VALUES
(1, '2017-08-15', 'Falta documentacion de Araceli', 15, 26),
(2, '2018-11-19', 'Araceli no sera ingresada', 15, 26),
(3, '2019-04-06', 'hola', 1, 24),
(4, '2019-04-06', 'hola', 1, 24),
(5, '2019-04-06', 'Hola', 1, 24),
(6, '2019-04-08', 'Hola', 5, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos_pros`
--

CREATE TABLE `telefonos_pros` (
  `id_tel_pros` int(5) NOT NULL,
  `telefono` int(10) NOT NULL,
  `id_prospecto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `telefonos_pros`
--

INSERT INTO `telefonos_pros` (`id_tel_pros`, `telefono`, `id_prospecto`) VALUES
(1, 1133221155, 32),
(2, 1598756542, 1),
(3, 1115734356, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `id_rol` int(5) NOT NULL,
  `id_agencia` int(5) DEFAULT NULL,
  `id_legajo` int(5) NOT NULL,
  `password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `nombre_usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_agencia`, `id_legajo`, `password`, `estado`, `nombre_usuario`) VALUES
(0, 2, 6, 11, 'lalalal', 1, 'Prueba2'),
(1, 2, 6, 10, 'lalal', 1, 'Prueba3'),
(2, 2, 2, 2, 'fer', 1, 'fer'),
(3, 1, 1, 6, 'ttt551', 0, ''),
(21, 1, 1, 30, 'fran', 1, 'fran'),
(23, 1, 1, 32, 'francisco33ddd', 0, ''),
(24, 3, 1, 33, 'flor', 1, 'flor'),
(25, 4, 5, 34, 'leo', 1, 'leo'),
(26, 5, 2, 32, 'lalalal', 1, 'Prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id_agencia`);

--
-- Indices de la tabla `asociado`
--
ALTER TABLE `asociado`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `cambios_estado`
--
ALTER TABLE `cambios_estado`
  ADD PRIMARY KEY (`id_camb_estado`),
  ADD KEY `estado_act` (`estado_act`),
  ADD KEY `estado_permitido` (`estado_permitido`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD KEY `id_prospecto` (`id_prospecto`);

--
-- Indices de la tabla `legajos`
--
ALTER TABLE `legajos`
  ADD PRIMARY KEY (`id_legajo`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_agencia` (`id_agencia`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_prospecto` (`id_prospecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`id_prospectos`),
  ADD KEY `estado_actual` (`estado_actual`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_estprosp_permitidos`
--
ALTER TABLE `rol_estprosp_permitidos`
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado_permitido` (`id_estado_permitido`);

--
-- Indices de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_prospecto` (`id_prospecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  ADD PRIMARY KEY (`id_tel_pros`),
  ADD KEY `id_prospecto` (`id_prospecto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_legajo` (`id_legajo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id_agencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `asociado`
--
ALTER TABLE `asociado`
  MODIFY `dni` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cambios_estado`
--
ALTER TABLE `cambios_estado`
  MODIFY `id_camb_estado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id_integrante` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `legajos`
--
ALTER TABLE `legajos`
  MODIFY `id_legajo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `id_prospectos` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id_seguimiento` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  MODIFY `id_tel_pros` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambios_estado`
--
ALTER TABLE `cambios_estado`
  ADD CONSTRAINT `cambios_estado_ibfk_1` FOREIGN KEY (`estado_act`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `cambios_estado_ibfk_2` FOREIGN KEY (`estado_permitido`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`),
  ADD CONSTRAINT `localidad_ibfk_2` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id_agencia`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD CONSTRAINT `prospectos_ibfk_1` FOREIGN KEY (`estado_actual`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `prospectos_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `rol_estprosp_permitidos`
--
ALTER TABLE `rol_estprosp_permitidos`
  ADD CONSTRAINT `rol_estprosp_permitidos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `rol_estprosp_permitidos_ibfk_2` FOREIGN KEY (`id_estado_permitido`) REFERENCES `estados` (`id_estado`);

--
-- Filtros para la tabla `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`),
  ADD CONSTRAINT `seguimientos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  ADD CONSTRAINT `telefonos_pros_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id_agencia`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_legajo`) REFERENCES `legajos` (`id_legajo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
