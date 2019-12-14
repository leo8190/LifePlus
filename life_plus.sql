-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 12:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `life_plus`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencias`
--

CREATE TABLE `agencias` (
  `id_agencia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `habilitada` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `agencias`
--

INSERT INTO `agencias` (`id_agencia`, `nombre`, `habilitada`) VALUES
(1, 'Primera', 1),
(2, 'Segunda', 1),
(3, 'Tercera', 1),
(4, 'Cuarta', 1),
(5, 'Quinta', 1),
(6, 'Sexta', 1),
(7, 'Septima', 1),
(8, 'Octava', 1),
(9, 'Novena', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cambios_estado`
--

CREATE TABLE `cambios_estado` (
  `id_camb_estado` int(5) NOT NULL,
  `estado_act` int(5) NOT NULL,
  `estado_permitido` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cambios_estado`
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
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estados`
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
-- Table structure for table `integrantes`
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
-- Dumping data for table `integrantes`
--

INSERT INTO `integrantes` (`id_integrante`, `nombre`, `apellido`, `dni`, `sexo`, `id_prospecto`, `fecha_nacimiento`, `tipo_ingresante`) VALUES
(1, 'Melina', 'Barosi', 40090200, 'M', 31, '1988-02-03', 0),
(2, 'Melisa', 'Barrasa', 40090200, 'M', 32, '1988-02-03', 0),
(3, 'Juan', 'Perez', 15064234, 'M', 33, '1988-02-03', 0),
(4, 'Lalo', 'Mir', 13023593, 'M', 34, '1988-02-03', 0),
(5, 'Carlos', 'Tevezi', 345325, 'M', 35, '1988-02-03', 0),
(6, 'Pabloe', 'Lopeao', 125125, 'M', 36, '1988-02-03', 0),
(7, 'Walter', 'Mazas', 414214355, 'M', 37, '1988-02-03', 1),
(8, 'Antonella', 'Saveedra', 33545235, 'F', 38, '1988-02-16', 1),
(9, 'Polola', 'Zato', 14564564, 'F', 39, '1988-02-03', 0),
(10, 'Asturias', 'Solan', 325532, 'F', 40, '1988-02-03', 2),
(11, 'Marina', 'Maros', 4124124, 'F', 41, '1988-02-03', 2),
(12, 'Federico', 'Sanez', 32553, 'M', 42, '1988-02-03', 1),
(13, 'Adriana', 'Malvin', 3333, 'M', 43, '1988-02-03', 2),
(14, 'Walter', 'Mandals', 333322234, 'M', 44, '1988-02-17', 2),
(15, 'Leonardo', 'Ewene', 3254235, 'M', 45, '1988-02-03', 0),
(16, 'Dario', 'Manues', 122223245, 'M', 46, '1988-03-12', 3),
(17, 'Hector', 'Mandioca', 6476332, 'M', 47, '1988-02-15', 3),
(18, 'Fernando', 'Malevo', 232332324, 'M', 48, '1987-10-06', 1),
(19, 'Reteri', 'Salvador', 35235553, 'M', 49, '1988-05-14', 2),
(20, 'Ernesto', 'Ferradas', 32423435, 'M', 50, '1988-02-02', 3),
(21, 'Pedros', 'Lalos', 978696, 'M', 51, '1988-02-03', 0),
(22, 'Lorenzo', 'Lamas', 325325, 'M', 52, '1988-02-03', 0),
(23, 'Sergio', 'Manuel', 124234124, 'M', 1, '0000-00-00', 2),
(24, 'Mariano', 'Paez', 97869876, 'M', 2, '0000-00-00', 1),
(25, 'Gabriela', 'Marquez', 78967896, 'F', 2, '0000-00-00', 2),
(26, 'Claudia', 'Villa', 3252359, 'F', 2, '0000-00-00', 1),
(27, 'Sabrina', 'Fernandez', 12355123, 'F', 2, '0000-00-00', 2),
(28, 'Gabriel', 'Martinez', 2147483647, 'M', 2, '0000-00-00', 1),
(29, 'Sergio', 'Sara', 235235235, 'M', 1, '0000-00-00', 1),
(30, 'Pablo', 'Martinez', 123414, 'M', 1, '0000-00-00', 1),
(31, 'Carlos', 'Apollonio', 235235235, 'M', 1, '1989-01-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `legajos`
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
-- Dumping data for table `legajos`
--

INSERT INTO `legajos` (`id_legajo`, `nombre`, `apellido`, `email`, `dni`, `telefono`) VALUES
(2, 'Fernando', 'Figueroa', 'ffigueroa@gmail.com', 35456789, 15456123),
(4, 'Leonardo', 'Apollonio', 'leonardo@gmail.com', 33456123, 15456128),
(5, 'Panlo', 'Retero', 'poesr@gmail.com', 54654654, 5484856),
(6, 'Pablit', 'Reter', 'poesr@gmail.co', 54654651, 5484851),
(7, 'Retesi', 'Paloet', 'poesr@gmail.com', 54654654, 5484856),
(8, 'Lolo', 'Lopez', 'lo@gmail.com', 4565484, 468468),
(9, 'Tamara', 'Polo', 'loas@gmail.com', 45151681, 546848),
(10, 'Tereno', 'Paletez', 'loas@gmail.com', 45151681, 546848),
(11, 'Gabrieltet', 'Errote', 'loas@gmail.com', 45151681, 546848),
(12, 'Patricia', 'Paredes', 'l@gmail.com', 546848, 465484),
(30, 'Francisco', 'Doi', 'franjdoi@gmail.com', 40090118, 1140572996),
(32, 'Gabriel', 'Meno', 'ascae@mail.com', 2147483647, 2147483647),
(33, 'Florencia', 'Ferrari', 'florferrari@outlook.com', 38023125, 1142699875),
(34, 'Leonardo', 'Apolonio', 'leoapolonio@yahoo.com', 35090123, 1123478643),
(35, 'Walter', 'Wendo', 'leonard33323o23322@gmail.com', 2424, 2147483647),
(36, 'Pablo', 'Lopez', 'pweqf@gwefwe.com', 324234, 4235235),
(37, 'Raul', 'Raulo', 'raul@ewfef.com', 245235, 325235),
(38, 'Claudio', 'Claro', 'clau@wfqwf.com', 2147483647, 435634634),
(39, 'Perla', 'Sola', 'wfwq@efwqf.com', 3125235, 2147483647),
(40, 'Manuel', 'Malon', 'manu@lolo.com', 2147483647, 2147483647),
(41, 'Ingrid', 'Pale', 'fqwf@qweff.com', 1241245, 214124),
(42, 'Patricia', 'Malves', 'malves@pate.com', 32523523, 2147483647),
(43, 'Pancracio', 'Martinez', 'pancracio@mail.com', 2147483647, 2147483647),
(44, 'Horacio', 'Lareta', 'lareta@ret.com', 2147483647, 352352356),
(45, 'Marina', 'Marolle', 'marolle@mail.com', 235235235, 235235235),
(46, 'Roberto', 'Reteri', 'reteri@mail.com', 2147483647, 54235235);

-- --------------------------------------------------------

--
-- Table structure for table `localidad`
--

CREATE TABLE `localidad` (
  `id` int(5) NOT NULL,
  `id_agencia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_provincia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `localidad`
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
(11, 5, 'Trelew', 12),
(12, 9, 'El Nihuil', 6),
(13, 9, 'El Paramillo', 6),
(14, 4, 'James Craik', 3),
(15, 4, 'Jose de la Quintana', 3),
(16, 6, 'Las Lomitas', 23),
(17, 6, 'Ibarreta', 23),
(18, 7, 'Goya', 21),
(19, 7, 'Itati', 21),
(20, 8, 'Belen', 10),
(21, 8, 'Andalgala', 10);

-- --------------------------------------------------------

--
-- Table structure for table `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(5) NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_prospecto` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `estado_nuevo` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `descripcion`, `id_prospecto`, `fecha`, `estado_nuevo`, `id_usuario`) VALUES
(1, '', 15, '2019-12-10', 5, 25),
(2, '', 1, '2019-12-10', 1, 21),
(3, '', 5, '2019-12-10', 8, 34),
(4, '', 47, '2019-12-10', 6, 21),
(5, '', 47, '2019-12-10', 8, 21);

-- --------------------------------------------------------

--
-- Table structure for table `prospectos`
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
-- Dumping data for table `prospectos`
--

INSERT INTO `prospectos` (`id_prospectos`, `vendedor`, `estado_actual`, `nombre`, `apellido`, `email`, `dni`, `fecha_alta`, `sexo`, `localidad`) VALUES
(1, 1, 7, 'Diego Armando', 'Maradona', 'eldiegote@gmail.com', 14276579, '2018-11-05', 'M', 25),
(2, 1, 6, 'Mercedes', 'Luna', 'mluna@gmail.com', 28109339, '2018-11-09', 'F', 24),
(3, 2, 2, 'Nadia', 'Gonzalez', 'ngonzal@gmail.com', 32115562, '2018-06-22', 'F', 4),
(4, 1, 10, 'Julio', 'Tevez', 'tevezl@gmail.com', 92113562, '2018-06-17', 'M', 23),
(5, 1, 8, 'Jorge', 'Lopez', 'jorgelop@gmail.com', 29332225, '2018-01-10', 'M', 3),
(6, 1, 12, 'Carlos', 'Ochoa', 'ochoacarlos@gmail.com', 31222225, '2018-03-10', 'M', 22),
(7, 2, 2, 'Lucas', 'Gallardo', 'lucas@gmail.com', 31666862, '2017-12-02', 'M', 3),
(8, 2, 2, 'Maria', 'Velazquez', 'velazquezm@gmail.com', 21667862, '2017-11-02', 'F', 3),
(12, 1, 2, 'Fran', 'doi', 'fernando.umb@gmail.com', 40090118, '2018-11-07', 'M', 21),
(13, 31, 3, 'Leonardo', 'Diaz', 'leo@gmail.com', 45123456, '2018-11-14', 'M', 20),
(14, 28, 11, 'Pablo', 'Resin', 'pablo@gmail.com', 30154123, '2018-11-14', 'M', 0),
(15, 32, 5, 'Araceli', 'Diazes', 'ara@gmail.com', 33456781, '2018-11-14', 'F', 0),
(16, 28, 5, 'Claudio', 'Vazquez', 'clau@gmail.com', 45194875, '2018-11-14', 'F', 0),
(17, 29, 7, 'Pedro', 'Martinez', 'pedro@gmail.com', 45194623, '2018-11-14', 'M', 19),
(18, 30, 45, 'Patricia', 'Rolon', 'pato@hotmail.com', 12456364, '2018-11-15', 'F', 18),
(19, 30, 11, 'Roberta', 'Suarezz', 'roberta@gmail.com', 20456154, '2018-11-15', 'F', 17),
(20, 30, 5, 'Tamara', 'Pamela', 'lasi@gmail.com', 456151, '2018-11-15', 'F', 16),
(21, 29, 8, 'Polo', 'Desito', 'polo@gmail.com', 1545484, '2018-11-15', 'M', 15),
(22, 28, 9, 'Julio ', 'Raul', 'julio@gmail.com', 5465465, '2018-11-15', 'M', 14),
(23, 32, 6, 'Paula', 'Sulo', 'paula@gmail.com', 5465485, '2018-11-15', 'F', 13),
(24, 32, 6, 'Fernando', 'Diaz', 'fer@gmail.com', 33456456, '2018-11-15', 'M', 12),
(25, 28, 46, 'Patricia', 'Jaime', 'patri@gmail.com', 4564654, '2018-11-15', 'F', 11),
(26, 28, 43, 'Ernesto', 'Lopez', 'ern@hotmail.com', 54651651, '2018-11-15', 'M', 10),
(27, 29, 1, 'Pablo', 'Paredes', 'pablopar@gmail.com', 56468468, '2018-11-15', 'M', 0),
(28, 31, 1, 'Suarez', 'Solan', 'lop@eee.com', 456456, '2018-11-15', 'M', 0),
(29, 29, 41, 'Lionel', 'Messi', 'lio10@gmail.com', 20156874, '2018-11-20', 'M', 9),
(30, 29, 11, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 8),
(31, 32, 5, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 7),
(32, 29, 5, 'Melisa', 'Barrasa', 'cualquier@gmail.com', 40090200, '2018-11-25', 'M', 6),
(33, 32, 8, 'Juan', 'Perez', 'juancito@gmail.com', 15064234, '2018-11-27', 'M', 5),
(34, 32, 41, 'Lalo', 'Mir', 'lalitomir@yahoo.com', 13023593, '2018-11-27', 'M', 4),
(35, 28, 1, 'Carlos', 'Tevezi', '325235@gfwegfwe.com', 345325, '2019-12-10', 'M', 0),
(36, 1, 1, 'Pabloe', 'Lopeao', '1251@f32r.com', 125125, '2019-12-10', 'M', 0),
(37, 1, 1, 'Marito', 'Saranda', 'saranda@gmail.com', 333252352, '2019-12-10', 'M', 4),
(38, 32, 1, 'Sebastian', 'Perez', 'perez@gmail.com', 335646356, '2019-12-10', 'M', 3),
(39, 32, 44, 'Polola', 'Zato', 'leonardo233333333322@gmail.com', 14564564, '2019-12-10', 'F', 2),
(40, 28, 6, 'Leonela', 'Arroti', 'leonela@gmail.com', 354355235, '2019-12-10', 'F', 2),
(41, 29, 5, 'Marta', 'Pelote', 'leonardo23322@gma222il.com', 44332244, '2019-12-10', 'F', 2),
(42, 29, 10, 'Federico', 'Sanabria', 'leonardo23322@gmai333l.com', 40342325, '2019-12-10', 'M', 6),
(43, 29, 11, 'Antonio', 'Sentesi', 'antonio@gmail.com', 254335523, '2019-12-10', 'M', 7),
(44, 2, 12, 'Walter', 'Diaz', 'walter@diaz.com', 333322223, '2019-12-10', 'M', 4),
(45, 2, 12, 'Leonardo', 'ewfwef', 'leonardo23322@gmffffail.com', 3254235, '2019-12-10', 'M', 2),
(46, 2, 2, 'Sergio', 'Sergei', 'sergio@sergio.com', 443323123, '2019-12-10', 'M', 5),
(47, 2, 8, 'Hector', 'Alargue', 'hector@arr.com', 6476, '2019-12-10', 'M', 1),
(48, 2, 11, 'Federica', 'Pais', 'federica@gmail.com', 23423424, '2019-12-10', 'F', 6),
(49, 28, 1, 'Manuel', 'Stolerman', 'manuel@gmail.com', 352354432, '2019-12-10', 'M', 8),
(50, 2, 1, 'Raul', 'Rarase', 'rarase@gmail.com', 324234343, '2019-12-10', 'M', 9),
(51, 28, 1, 'Pedros', 'Lalos', 'leonar3333do23322@gmail.com', 978696, '2019-12-10', 'M', 8),
(52, 31, 1, 'Lorenzo', 'Lamas', 'lorenzo@lamas.com', 325325, '2019-12-10', 'M', 9);

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--

CREATE TABLE `provincias` (
  `id_provincia` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `provincias`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `roles`
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
-- Table structure for table `rol_estprosp_permitidos`
--

CREATE TABLE `rol_estprosp_permitidos` (
  `id_permiso` int(11) NOT NULL,
  `id_rol` int(5) NOT NULL,
  `id_estado_permitido` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol_estprosp_permitidos`
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
-- Table structure for table `seguimientos`
--

CREATE TABLE `seguimientos` (
  `id_seguimiento` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `id_prospecto` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `seguimientos`
--

INSERT INTO `seguimientos` (`id_seguimiento`, `fecha`, `descripcion`, `id_prospecto`, `id_usuario`) VALUES
(1, '2017-08-15', 'Falta documentacion de Araceli', 15, 26),
(2, '2018-11-19', 'Araceli no sera ingresada', 15, 26),
(3, '2019-04-06', 'Aprobado - Papeles completados', 1, 24),
(4, '2019-04-06', 'Rechazado por pre-existencia', 1, 24),
(5, '2019-04-06', 'Investigar antecedentes', 1, 24),
(6, '2019-04-08', 'Pedir Documentacion', 5, 21),
(7, '2019-12-10', 'Todo Ok - Aprobado', 15, 25),
(8, '2019-12-10', 'Pasa a activo por correcto', 1, 21),
(9, '2019-12-10', 'Falta documentacion necesaria', 5, 34),
(10, '2019-12-10', 'Queda pendiente su ingreso', 47, 21),
(11, '2019-12-10', 'Falta Documentacion de Salud Quirurgica', 47, 21);

-- --------------------------------------------------------

--
-- Table structure for table `telefonos_pros`
--

CREATE TABLE `telefonos_pros` (
  `id_tel_pros` int(5) NOT NULL,
  `telefono` int(10) NOT NULL,
  `id_prospecto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `telefonos_pros`
--

INSERT INTO `telefonos_pros` (`id_tel_pros`, `telefono`, `id_prospecto`) VALUES
(1, 1133221155, 32),
(2, 1598756542, 1),
(3, 1115734356, 34),
(4, 11325235, 35),
(5, 113125234, 36),
(6, 114972342, 37),
(7, 2147483647, 38),
(8, 2147483647, 39),
(9, 2147483647, 40),
(10, 2147483647, 41),
(11, 2147483647, 42),
(12, 33423423, 43),
(13, 112223423, 44),
(14, 113333234, 45),
(15, 11222234, 46),
(16, 1145747723, 47),
(17, 2147483647, 48),
(18, 2147483647, 49),
(19, 2147483647, 50),
(20, 2147483647, 51),
(21, 213412125, 52);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_agencia`, `id_legajo`, `password`, `estado`, `nombre_usuario`) VALUES
(0, 2, 6, 11, 'tamara', 1, 'tamara'),
(1, 2, 6, 10, 'tamara', 1, 'tamara'),
(2, 2, 2, 2, 'fernando', 1, 'fernando'),
(3, 1, 1, 6, 'pablo', 1, 'pablo'),
(21, 1, 1, 30, 'francisco', 1, 'francisco'),
(23, 1, 1, 32, 'gabriel', 1, 'gabriel'),
(24, 3, 1, 33, 'florencia', 1, 'florencia'),
(25, 4, 5, 34, 'leonardo', 1, 'leonardo'),
(26, 5, 2, 32, 'gabriel', 1, 'gabriel'),
(28, 2, 5, 35, 'walter', 1, 'walter'),
(29, 2, 3, 36, 'rolando', 1, 'rolando'),
(30, 2, 1, 37, 'ramiro', 1, 'ramiro'),
(31, 2, 5, 38, 'claudio', 1, 'claudio'),
(32, 2, 6, 39, 'perlas', 1, 'perlas'),
(33, 3, 6, 40, 'manuel', 1, 'manuel'),
(34, 6, 9, 41, 'ingrid', 1, 'ingrid'),
(35, 5, 6, 42, 'patricia', 1, 'patricia'),
(36, 3, 3, 43, 'pancracio', 1, 'pancracio'),
(37, 4, 5, 44, 'horacio', 1, 'horacio'),
(38, 5, 9, 45, 'marina', 1, 'marina'),
(39, 6, 9, 46, 'roberto', 1, 'roberto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencias`
--
ALTER TABLE `agencias`
  ADD PRIMARY KEY (`id_agencia`);

--
-- Indexes for table `cambios_estado`
--
ALTER TABLE `cambios_estado`
  ADD PRIMARY KEY (`id_camb_estado`),
  ADD KEY `estado_act` (`estado_act`),
  ADD KEY `estado_permitido` (`estado_permitido`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD KEY `id_prospecto` (`id_prospecto`);

--
-- Indexes for table `legajos`
--
ALTER TABLE `legajos`
  ADD PRIMARY KEY (`id_legajo`);

--
-- Indexes for table `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_agencia` (`id_agencia`);

--
-- Indexes for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `id_prospecto` (`id_prospecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`id_prospectos`),
  ADD KEY `estado_actual` (`estado_actual`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indexes for table `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `rol_estprosp_permitidos`
--
ALTER TABLE `rol_estprosp_permitidos`
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado_permitido` (`id_estado_permitido`);

--
-- Indexes for table `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_prospecto` (`id_prospecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  ADD PRIMARY KEY (`id_tel_pros`),
  ADD KEY `id_prospecto` (`id_prospecto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_agencia` (`id_agencia`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_legajo` (`id_legajo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencias`
--
ALTER TABLE `agencias`
  MODIFY `id_agencia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cambios_estado`
--
ALTER TABLE `cambios_estado`
  MODIFY `id_camb_estado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id_integrante` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `legajos`
--
ALTER TABLE `legajos`
  MODIFY `id_legajo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `id_prospectos` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id_provincia` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `seguimientos`
--
ALTER TABLE `seguimientos`
  MODIFY `id_seguimiento` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  MODIFY `id_tel_pros` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cambios_estado`
--
ALTER TABLE `cambios_estado`
  ADD CONSTRAINT `cambios_estado_ibfk_1` FOREIGN KEY (`estado_act`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `cambios_estado_ibfk_2` FOREIGN KEY (`estado_permitido`) REFERENCES `estados` (`id_estado`);

--
-- Constraints for table `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `integrantes_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`);

--
-- Constraints for table `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincias` (`id_provincia`),
  ADD CONSTRAINT `localidad_ibfk_2` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id_agencia`);

--
-- Constraints for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `prospectos`
--
ALTER TABLE `prospectos`
  ADD CONSTRAINT `prospectos_ibfk_1` FOREIGN KEY (`estado_actual`) REFERENCES `estados` (`id_estado`),
  ADD CONSTRAINT `prospectos_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `rol_estprosp_permitidos`
--
ALTER TABLE `rol_estprosp_permitidos`
  ADD CONSTRAINT `rol_estprosp_permitidos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `rol_estprosp_permitidos_ibfk_2` FOREIGN KEY (`id_estado_permitido`) REFERENCES `estados` (`id_estado`);

--
-- Constraints for table `seguimientos`
--
ALTER TABLE `seguimientos`
  ADD CONSTRAINT `seguimientos_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`),
  ADD CONSTRAINT `seguimientos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `telefonos_pros`
--
ALTER TABLE `telefonos_pros`
  ADD CONSTRAINT `telefonos_pros_ibfk_1` FOREIGN KEY (`id_prospecto`) REFERENCES `prospectos` (`id_prospectos`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_agencia`) REFERENCES `agencias` (`id_agencia`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_legajo`) REFERENCES `legajos` (`id_legajo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
