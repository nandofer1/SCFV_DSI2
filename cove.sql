DROP DATABASE IF EXISTS `scfv`;
CREATE DATABASE `scfv`;
USE `scfv`;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2014 a las 08:52:13
-- Versión del servidor: 5.6.17-log
-- Versión de PHP: 5.5.12

/*SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";*/
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `scfv`
--


CREATE TABLE IF NOT EXISTS `logbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` DATETIME NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allocations`
--

CREATE TABLE IF NOT EXISTS `allocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dossier_id` int(11) NOT NULL,
  `employee_id` varchar(10) NOT NULL COMMENT 'Dui a quien se le asigno ',
  `management_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO brands (marca) VALUES ('Toyota');
INSERT INTO brands (marca) VALUES ('Daihatsu');
INSERT INTO brands (marca) VALUES ('Nissan');
INSERT INTO brands (marca) VALUES ('Datsun');
INSERT INTO brands (marca) VALUES ('Mitsubishi');
INSERT INTO brands (marca) VALUES ('Mercedes Benz');
INSERT INTO brands (marca) VALUES ('Kia');
INSERT INTO brands (marca) VALUES ('Hyundai');
INSERT INTO brands (marca) VALUES ('Mack');
INSERT INTO brands (marca) VALUES ('Ford');
INSERT INTO brands (marca) VALUES ('Chevrolet');
INSERT INTO brands (marca) VALUES ('Isuzu');
INSERT INTO brands (marca) VALUES ('Honda');
INSERT INTO brands (marca) VALUES ('Volkswagen');
INSERT INTO brands (marca) VALUES ('Mazda');
INSERT INTO brands (marca) VALUES ('Dodge');
INSERT INTO brands (marca) VALUES ('Kensworth');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cleaningtoolsuseds`
--

CREATE TABLE IF NOT EXISTS `cleaningtoolsuseds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `tool_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crews`
--

CREATE TABLE IF NOT EXISTS `crews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL,
  `employee_id` varchar(10) NOT NULL,
  ` motorista` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departaments`
--

CREATE TABLE IF NOT EXISTS `departaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `management_id` int(11) NOT NULL,
  `departamento` varchar(80) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_gerencia` (`management_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `departaments`
--

INSERT INTO `departaments` (`id`, `management_id`, `departamento`, `descripcion`) VALUES
(1, 1, 'Cementerios', ''),
(2, 2, 'Limpieza y Ornato', ''),
(3, 2, 'Casa de la Cultura', ''),
(4, 2, 'Parque Municipal Tio Julio', ''),
(5, 3, 'Gestion de Cobro y Recuperacion de Mora', ''),
(6, 3, 'Catastro', ''),
(7, 3, 'Contabilidad', ''),
(8, 3, 'Tesoreria Municipal', ''),
(9, 4, 'Gestion de Cobro', ''),
(10, 4, 'Mantenimiento', ''),
(11, 5, 'Recoleccion y disposicion de desechos solidos', ''),
(12, 5, 'Alumbrado publico y mantenimiento interno', ''),
(13, 5, 'Taller Municipal', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` varchar(8) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `kilometraje_actual` float NOT NULL,
  `kilometraje` float NOT NULL,
  `numero_viajes` int(11) NOT NULL,
  `numero_mantenimientos` int(11) NOT NULL,
  `numero_vales` int(11) NOT NULL,
  `fecha_ult_mant` date NOT NULL,
  `prestable` tinyint(1) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
   `activo` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `placa` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;


--
-- Estructura de tabla para la tabla `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` varchar(10) NOT NULL COMMENT 'DUI',
  `departament_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `motorista` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_departamento` (`departament_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `employees` VALUES ('89045678-2', 11, 'Ester Graciela', 'Marmol Escajeda', 'Poligono Santa Cecilia #4Z, Ciudad Delgado', 'marmol@cove.sv', '5482-7964', 0);
INSERT INTO `employees` VALUES ('12345678-9', 2,  'Mauricio Faro', 'Cala Crisostomo', 'Col. Atlacatl pje. #8B, Ciudad Delgado', 'cala@cove.sv', '8419-3887', 0);
INSERT INTO `employees` VALUES ('56745678-5', 11, 'Mario Berto', 'Ochoa Galicia', 'Urbanizacion Carrasco #4G, Ciudad Delgado', 'ochoa@cove.sv', '2489-4967', 0);
INSERT INTO `employees` VALUES ('23445678-8', 3,  'Guadalupe Dinora', 'Villasana Fonseca', 'Residencial San Marcos Casa #1, Ciudad Delgado', 'villasana@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('67845678-4', 11, 'Modesta Josefina', 'Esperanza Lazos', 'Urbanizacion Minier #4H, Ciudad Delgado', 'villasana@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('34545678-7', 4,  'Victoriano Ezequiel', 'Melero Burgos', 'Residencial Bella Vista Casa #4, Ciudad Delgado', 'melero@cove.sv', '5589-4911', 0);
INSERT INTO `employees` VALUES ('78945678-3', 11, 'Severo Bonifacio', 'Almaraz Cornelio', 'Km. 13. Carretera Troncal del Norte #2A, Ciudad Delgado', 'almaraz@cove.sv', '1385-5511', 0);
INSERT INTO `employees` VALUES ('90145678-1', 11, 'Raimunda Enrica', 'Carrera Prieto', 'Km. 12. Carretera Troncal del Norte #2B, Ciudad Delgado', 'aguas@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('45645678-6', 5,  'Claudio Natalio', 'Contreras Calle', 'Col. Las Rosas #4, Ciudad Delgado', 'calles@cove.sv', '2489-4967', 0);
INSERT INTO `employees` VALUES ('01245678-0', 11, 'Cristoval Macario', 'Pavon Larin', 'Col. Santa Eduviges #8F, Ciudad Delgado', 'pavon@cove.sv', '8882-7774', 0);


--
-- Estructura de tabla para la tabla `fuelvouchers`
--

CREATE TABLE IF NOT EXISTS `fuelvouchers` (
  `id` varchar(10) NOT NULL,
  `monto` float NOT NULL,
  `fecha` date NOT NULL,
  `tipo_combustible` varchar(10) NOT NULL,
  `galones` decimal(10,0) NOT NULL,
  `aceite` decimal(10,0) NOT NULL,
  `factura` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generalvariables`
--

CREATE TABLE IF NOT EXISTS `generalvariables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_alcaldia` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `tel1` varchar(14) NOT NULL,
  `tel2` varchar(14) NOT NULL,
  `obervaciones` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenances`
--

CREATE TABLE IF NOT EXISTS `maintenances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dossier_id` int(11) NOT NULL,
  `upkeeptype_id` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `fecha_solicitud` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenancetools`
--

CREATE TABLE IF NOT EXISTS `maintenancetools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `herramienta` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenancetoolsuseds`
--

CREATE TABLE IF NOT EXISTS `maintenancetoolsuseds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_id` int(11) NOT NULL,
  `maintenancetool_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maintenancetypes`
--

CREATE TABLE IF NOT EXISTS `maintenancetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `managements`
--

CREATE TABLE IF NOT EXISTS `managements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `gerencia` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_unidad` (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `managements`
--

INSERT INTO `managements` (`id`, `unit_id`, `gerencia`) VALUES
(1, 2, 'Registro del Estado Familiar'),
(2, 2, 'Administracion de Espacios Publicos'),
(3, 2, 'Gerencia Financiera'),
(4, 2, 'Administracion de Mercados'),
(5, 2, 'Gerencia de Servicios Municipales');



CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `capacidad` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO types VALUES(1, 'Sedan','','');
INSERT INTO types VALUES(2, 'Familiar','','');
INSERT INTO types VALUES(3, 'Pick Up','','');
INSERT INTO types VALUES(4, 'Pick Up Cabina Doble','','');
INSERT INTO types VALUES(5, 'Pick Up Cabina Extra','','');
INSERT INTO types VALUES(6, 'Pick Up Camper','','');
INSERT INTO types VALUES(7, 'Furgon','','');
INSERT INTO types VALUES(8, 'Furgoneta','','');
INSERT INTO types VALUES(9, 'Camion','','');
INSERT INTO types VALUES(10, 'Microbus','','');
INSERT INTO types VALUES(11, 'Bus','','');
INSERT INTO types VALUES(12, 'Coster','','');
INSERT INTO types VALUES(13, 'Van','','');
INSERT INTO types VALUES(14, 'Ambulancia','','');
INSERT INTO types VALUES(15, 'Camioneta','','');
INSERT INTO types VALUES(16, 'Panelito','','');
INSERT INTO types VALUES(17, 'Grua','','');
INSERT INTO types VALUES(18, 'Camion de Barandal','','');
INSERT INTO types VALUES(19, 'Camion con brazo hidraulico','','');
INSERT INTO types VALUES(20, 'Camion Cajon','','');
INSERT INTO types VALUES(21, 'Camion Cisterna','','');
INSERT INTO types VALUES(22, 'Camion Compactador','','');
INSERT INTO types VALUES(23, 'Camion Mezclador','','');
INSERT INTO types VALUES(24, 'Camion Plataforma','','');
INSERT INTO types VALUES(25, 'Camion de Volteo','','');
INSERT INTO types VALUES(26, 'SUV','','');
INSERT INTO types VALUES(27, 'Hatchback','','');
INSERT INTO types VALUES(28, 'Motocicleta','','');
INSERT INTO types VALUES(29, 'Kei','','');
INSERT INTO types VALUES(30, 'Mini SUV','','');
INSERT INTO types VALUES(31, 'Camion Pequeño','','');
INSERT INTO types VALUES(32, 'Coupe','','');
INSERT INTO types VALUES(33, 'Camion Compactador','','');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modells`
--

CREATE TABLE IF NOT EXISTS `modells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `type_id` int(11) NOT NULL,
  `tipo_combustible` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- Toyota
INSERT INTO modells VALUES (1, 1, 'Corolla', 1, 'Gasolina');
INSERT INTO modells VALUES (2, 1, 'Corolla E70', 1, 'Gasolina');
INSERT INTO modells VALUES (3, 1, 'Corolla XLi', 1, 'Gasolina');
INSERT INTO modells VALUES (4, 1, 'Rav4', 26, 'Gasolina');
INSERT INTO modells VALUES (5, 1, '4Runner', 26, 'Diesel');
INSERT INTO modells VALUES (6, 1, 'Prius', 1, 'Gasolina');
INSERT INTO modells VALUES (7, 1, 'Land Cruiser', 26, 'Diesel');
INSERT INTO modells VALUES (8, 1, 'Celica',1 , 'Gasolina');
INSERT INTO modells VALUES (9, 1, 'Supra',1 , 'Gasolina');
INSERT INTO modells VALUES (10, 1, 'Tercel', 1, 'Gasolina');
INSERT INTO modells VALUES (11, 1, 'Tercel EZ', 1, 'Gasolina');
INSERT INTO modells VALUES (12, 1, 'Yaris', 1, 'Diesel');
INSERT INTO modells VALUES (13, 1, 'Echo',1 , 'Gasolina');
INSERT INTO modells VALUES (14, 1, 'Camry', 1, 'Gasolina');
INSERT INTO modells VALUES (15, 1, 'Highlander', 26, 'Gasolina');
INSERT INTO modells VALUES (16, 1, 'Hilux', 3, 'Diesel');
INSERT INTO modells VALUES (17, 1, 'Hilux 22r', 3, 'Gasolina');
INSERT INTO modells VALUES (18, 1, 'Tacoma',3 , 'Gasolina');
INSERT INTO modells VALUES (19, 1, 'Tundra', 3, 'Gasolina');
INSERT INTO modells VALUES (20, 1, 'Hiace', 16, 'Gasolina');
INSERT INTO modells VALUES (21, 1, 'Starlet', 8, 'Gasolina');
INSERT INTO modells VALUES (22, 1, 'Corolla Trueno', 1, 'Gasolina');
INSERT INTO modells VALUES (23, 1, 'Vitz', 8, 'Gasolina');
INSERT INTO modells VALUES (24, 1, 'T-100', 3, 'Gasolina');
INSERT INTO modells VALUES (25, 1, 'Corolla Verso', 1, 'Gasolina');
INSERT INTO modells VALUES (26, 1, 'Corolla Levin', 1, 'Gasolina');
INSERT INTO modells VALUES (27, 1, 'Corolla Fielder', 1, 'Gasolina');
INSERT INTO modells VALUES (28, 1, 'Solara', 1, 'Gasolina');
INSERT INTO modells VALUES (29, 1, 'iQ', 27, 'Gasolina');
-- Daihatsu
INSERT INTO modells VALUES (30, 2, 'Applause' ,1, 'Gasolina');
INSERT INTO modells VALUES (31, 2, 'Charmant', 1, 'Gasolina');
INSERT INTO modells VALUES (32, 2, 'Charade', 1, 'Gasolina');
INSERT INTO modells VALUES (33, 2, 'Charade Giro', 1, 'Gasolina');
INSERT INTO modells VALUES (34, 2, 'Cuore', 29, 'Gasolina');
INSERT INTO modells VALUES (35, 2, 'Max Cuore', 29, 'Gasolina');
INSERT INTO modells VALUES (36, 2, 'Move', 29, 'Gasolina');
INSERT INTO modells VALUES (37, 2, 'F10', 30, 'Gasolina');
INSERT INTO modells VALUES (38, 2, 'Delta', 9, 'Gasolina');
-- Nissan
INSERT INTO modells VALUES (39, 3, 'X-Trail', 26, 'Gasolina');
INSERT INTO modells VALUES (40, 3, 'D21', 3, 'Gasolina');
INSERT INTO modells VALUES (41, 3, 'NP-300', 4, 'Gasolina');
INSERT INTO modells VALUES (42, 3, 'Terrano', 26, 'Gasolina');
INSERT INTO modells VALUES (43, 3, 'Navara', 4, 'Gasolina');
INSERT INTO modells VALUES (44, 3, 'Frontier', 4, 'Gasolina');
INSERT INTO modells VALUES (45, 3, 'Titan', 4, 'Gasolina');
INSERT INTO modells VALUES (46, 3, 'Pathfinder', 26, 'Gasolina');
INSERT INTO modells VALUES (47, 3, 'Almera', 1, 'Gasolina');
INSERT INTO modells VALUES (48, 3, 'X-Terra', 26, 'Gasolina');
INSERT INTO modells VALUES (49, 3, 'Patrol', 26, 'Gasolina');
INSERT INTO modells VALUES (50, 3, 'Sentra', 1, 'Gasolina');
INSERT INTO modells VALUES (51, 3, 'Leaf' ,1, 'Gasolina');
INSERT INTO modells VALUES (52, 3, 'Hardbody', 3, 'Gasolina');
-- Datsun
INSERT INTO modells VALUES (53, 4, '280 ZX', 31, 'Gasolina');
INSERT INTO modells VALUES (54, 4, 'Sunny 1200', 1, 'Gasolina');
INSERT INTO modells VALUES (55, 4, '1500', 3, 'Gasolina');
INSERT INTO modells VALUES (56, 4, 'SD 22', 3, 'Gasolina');
INSERT INTO modells VALUES (57, 4, '720', 3, 'Gasolina');
INSERT INTO modells VALUES (58, 4, 'King Cab', 5, 'Gasolina');
INSERT INTO modells VALUES (59, 4, '120y', 1, 'Gasolina');
INSERT INTO modells VALUES (60, 4, '210', 1, 'Gasolina');
INSERT INTO modells VALUES (61, 4, '160 J', 1, 'Gasolina');
-- Mitsubishi 
INSERT INTO modells VALUES (62, 5, 'Lancer', 1, 'Gasolina');
INSERT INTO modells VALUES (63, 5, 'Lancer GLX', 1, 'Gasolina');
INSERT INTO modells VALUES (64, 5, 'Montero', 26, 'Gasolina');
INSERT INTO modells VALUES (65, 5, 'Outlander', 26, 'Gasolina');
INSERT INTO modells VALUES (66, 5, 'Expo', 26, 'Gasolina');
INSERT INTO modells VALUES (67, 5, 'Sportero', 4, 'Gasolina');
INSERT INTO modells VALUES (68, 5, 'L-200', 4, 'Gasolina');
INSERT INTO modells VALUES (69, 5, 'RAM-50', 3, 'Gasolina');
-- Mercedez Benz
INSERT INTO modells VALUES (70, 6, '1319', 18, 'Gasolina');
INSERT INTO modells VALUES (71, 6, '1317', 18, 'Gasolina');
INSERT INTO modells VALUES (72, 6, '1633 D', 20, 'Gasolina');
INSERT INTO modells VALUES (73, 6, '1633', 7, 'Gasolina');
INSERT INTO modells VALUES (74, 6, 'L1113', 18, 'Gasolina');
INSERT INTO modells VALUES (75, 6, 'L1117', 18, 'Gasolina');
INSERT INTO modells VALUES (76, 6, '1214', 9, 'Gasolina');
-- KIA
INSERT INTO modells VALUES (77, 7, 'K-2500', 31, 'Gasolina');
INSERT INTO modells VALUES (78, 7, 'K-2700', 31, 'Gasolina');
INSERT INTO modells VALUES (79, 7, 'K-3000', 31, 'Gasolina');
INSERT INTO modells VALUES (80, 7, 'K-3600', 31, 'Gasolina');
INSERT INTO modells VALUES (81, 7, 'K-3600 II', 31, 'Gasolina');
INSERT INTO modells VALUES (82, 7, 'Pregio', 10, 'Gasolina');
INSERT INTO modells VALUES (83, 7, 'Grand Pregio', 10, 'Gasolina');
INSERT INTO modells VALUES (84, 7, 'Towner', 16, 'Gasolina');
INSERT INTO modells VALUES (85, 7, 'Ceres', 31, 'Gasolina');
INSERT INTO modells VALUES (86, 7, 'Sorento', 26, 'Gasolina');
INSERT INTO modells VALUES (87, 7, 'Spectra', 1, 'Gasolina');
INSERT INTO modells VALUES (88, 7, 'Rondo', 26, 'Gasolina');
INSERT INTO modells VALUES (89, 7, 'Rio', 1, 'Gasolina');
INSERT INTO modells VALUES (90, 7, 'Sportage', 26, 'Gasolina');
-- Hyundai 
INSERT INTO modells VALUES (91, 8, 'H100', 31, 'Gasolina');
INSERT INTO modells VALUES (92, 8, 'Santa Fe', 26, 'Gasolina');
INSERT INTO modells VALUES (93, 8, 'Elantra', 1, 'Gasolina');
INSERT INTO modells VALUES (94, 8, 'HD72', 9, 'Gasolina');
-- Mack
INSERT INTO modells VALUES (95, 9, 'Vision', 7, 'Gasolina');
INSERT INTO modells VALUES (96, 9, 'Super-Liner', 7, 'Gasolina');
INSERT INTO modells VALUES (97, 9, 'RS700', 7, 'Gasolina');
-- Ford
INSERT INTO modells VALUES (98, 10, 'Ranger', 3, 'Gasolina');
INSERT INTO modells VALUES (99, 10, 'Explorer', 26, 'Gasolina');
INSERT INTO modells VALUES (100, 10, 'Focus', 1, 'Gasolina');
INSERT INTO modells VALUES (101, 10, 'Sport Trac', 4, 'Gasolina');
INSERT INTO modells VALUES (102, 10, 'F-250 Lariat', 4, 'Gasolina');
INSERT INTO modells VALUES (103, 10, 'F-150', 4, 'Gasolina');
INSERT INTO modells VALUES (104, 10, 'Escape', 26, 'Gasolina');
-- Chevrolet
INSERT INTO modells VALUES (105, 11, 'S10', 3, 'Gasolina');
INSERT INTO modells VALUES (106, 11, 'Silverado', 4, 'Gasolina');
INSERT INTO modells VALUES (107, 11, 'Colorado', 5, 'Gasolina');
-- Isuzu
INSERT INTO modells VALUES (108, 12, 'Hombre', 3, 'Gasolina');
INSERT INTO modells VALUES (109, 12, 'Pup', 3, 'Gasolina');
-- Honda
INSERT INTO modells VALUES (110, 13, 'Civic', 1, 'Gasolina');
INSERT INTO modells VALUES (111, 13, 'Accord', 1, 'Gasolina');
-- Volkswagen
INSERT INTO modells VALUES (112, 14, 'Caddy', 8, 'Gasolina');
INSERT INTO modells VALUES (113, 14, 'Amarok', 4, 'Gasolina');
-- Mazda
INSERT INTO modells VALUES (114, 15, 'B2200', 1, 'Gasolina');
INSERT INTO modells VALUES (115, 15, 'B2300', 1, 'Gasolina');
INSERT INTO modells VALUES (116, 15, 'B2900', 1, 'Gasolina');
INSERT INTO modells VALUES (117, 15, 'BT50', 4, 'Gasolina');
-- Dodge
INSERT INTO modells VALUES (118, 16, 'Dakota', 4, 'Gasolina');
INSERT INTO modells VALUES (119, 16, 'RAM', 4, 'Gasolina');
-- Kensworth
INSERT INTO modells VALUES (120, 17, 'T370',33,'Gasolina');

-- Estructura de tabla para la tabla `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `repuesto` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partsuseds`
--

CREATE TABLE IF NOT EXISTS `partsuseds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dossier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT '0',
  `anulado` tinyint(1) NOT NULL DEFAULT '0',
  `employee_id` int(10) NOT NULL,
  `telefono` varchar(14) NOT NULL DEFAULT '--',
  `driver_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Estructura de tabla para la tabla `requestvouchers`
--

CREATE TABLE IF NOT EXISTS `requestvouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fuelvoucher_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `herramienta` varchar(20) NOT NULL,
  `existencia` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trips`
--

CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dossier_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `kilometraje_inicial` int(11) NOT NULL,
  `kilometraje_final` int(11) NOT NULL,
  `comentario_salida` varchar(250) NOT NULL,
  `comentario_entrada` varchar(250) NOT NULL,
  `rendimiento` decimal(10,0) NOT NULL,
  `fuera` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unidad` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `units`
--

INSERT INTO `units` (`id`, `unidad`, `descripcion`) VALUES
(1, 'Social', ''),
(2, 'Gerencial', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `dui` varchar(10) DEFAULT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `tipo_usuario`, `dui`, `telefono`, `correo`, `direccion`, `created`, `modified`) VALUES
(1, 'juan', '$2a$10$v7NW0coYFFg0gNiOq1fiKeNycMl/dlQoKSfCqaLFkO.4CYJGAOBPy', 1, '82845678-8', '7154-6839', 'juan@ues.edu.sv', 'Urb. Universitaria norte, Poligono #3, San Salvador', '2014-11-07 02:37:24', '2014-11-06 20:50:01'),
(2, 'fernando', '$2a$10$UqXi1iWMAL5BYH19pPdB5O8llithygL1a9uCMq3eTOHtyEB2AzHku', 1, '45679812-3', '7892-4524', 'fernando@ues.edu.sv', 'Col. Atlacatl, pje. principal #4A, Mejicanos. San Salvador', '2014-11-07 02:37:24', '2014-11-06 20:47:36'),
(3, 'santiago', '$2a$10$Y6.xZ/4lPz3VizCo3/PTDOUGFoXL..SggepKciWbT9p2mOb4SRBXu', 1, '98765432-1', '7816-1838', 'santiago@ues.edu.sv', 'Urb. Monserrat, #3. San Marcos. San Salvador', '2014-11-06 20:37:57', '2014-11-06 20:45:54'),
(4, 'enrique', '$2a$10$OtyUSAQ4xV5PzIIEg5fsfOnknZ4vNU2kwKC43p5cc2e3DdPAhti4e', 1, '12345678-9', '7841-4568', 'enrique@ues.edu.sv', 'Col. Maquilishuat #1. San Martin, San Salvador', '2014-11-06 20:44:17', '2014-11-06 20:44:17'),
(5, 'rebeca', '$2a$10$noygLzkwKKEJUHDiysg7QOTuJAKKrd98QjR9Xkg6Nt.q6KWFlMp9O', 1, '65498135-8', '7862-6565', 'rebeca@ues.edu.sv', 'Col. La Paz #4, Santa Ana, San Salvador', '2014-11-06 20:51:59', '2014-11-06 20:51:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tipo_usuario` (`tipo_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `tipo_usuario`, `created`, `modified`) VALUES
(1, 'Administrador del Sistema', '2014-11-30 03:03:53', '2014-11-30 03:03:53'),
(2, 'Gerente General', '2014-11-30 03:03:53', '2014-11-30 03:03:53'),
(3, 'Gerente de Servicios', '2014-11-30 03:03:53', '2014-11-30 03:03:53'),
(4, 'Supervisor de desechos solidos', '2014-11-30 03:03:53', '2014-11-30 03:03:53'),
(5, 'Jefe del Taller', '2014-11-30 03:03:53', '2014-11-30 03:03:53'),
(6, 'Gestor de prestamos de vehiculos', '2014-11-30 03:03:53', '2014-11-30 03:03:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` varchar(8) NOT NULL,
  `modell_id` int(11) NOT NULL,
  `management_id` int(11) NOT NULL,
  `tarjeta_circulacion` varchar(12) NOT NULL,
  `fecha_tarjeta` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `color` varchar(30) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `chasisgrabado` varchar(20) NOT NULL,
  `chasisvin` varchar(20) NOT NULL,
  `costo` float(8,2) NOT NULL,
  FOREIGN KEY (management_id) REFERENCES managements(id),
  PRIMARY KEY (`id`),
  KEY `id_modelo` (`modell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla almacenamiento de vehículos';

INSERT INTO `vehicles` VALUES 
('N4165',120, 5, 'N41652006','2013-03-06','2006','Blanco','45782369','AASJKJ10U1353876','ADASDDAD1232132',35000.00),
('N4546',120, 5, 'N45462010','2014-02-04','2010','Blanco','7841235','KHASDJ10U1352452','PVNWEU10U1352452',40000.00),
('N5241',120, 5, 'N52412008','2014-05-01','2008','Blanco','9973459','ASDSADJ10U1353847','UOIYOYJ10U1353847',54000.00),
('N5456',120, 5, 'N54562006','2013-04-10','2006','Blanco','1973458','QJNFTCJ10U1353585','KJNFCOJ10U1353585',46000.00),
('N5468',120, 5, 'N54681997','2014-08-06','1997','Blanco','19763648','JJNFCGJ10U1279249','SJVFCAJ10U1279249',54000.00),
('N5687',118, 1, 'N56872010','2014-04-03','2010','Rojo','73369372','3BKHHZ8X1DF712998','SJNFDAE11U1286116',17500.00),
('N5713',113, 2, 'N57132007','2013-07-11','2007','Verde','45687613','AENFCAJ10U1232057','SEDJCAJ10U6000911',7000.00),
('N5746',83,  3, 'N57462000','2011-11-01','2000','Rojo','78913845','SJNFDYE11U1304314','OPNFCAJ10U1238112',8000.00),
('N7721',1,   4, 'N77212005','2010-09-14','2005','Gris','19734563','UJNFCLQ10U1238681','FJIPCAX10U1279633',9000.00);

-- --------------------------------------------------------
INSERT INTO `dossiers` VALUES 
(id, 'N4165','2014-11-30','0','0','0','0','0', '0-0-0', FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N4546','2014-11-30', '0','0','0','0','0', '0-0-0', FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5241','2014-11-30','0','0','0','0','0', '0-0-0', FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5456','2014-11-30','0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5468','2014-11-30','0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5687','2014-11-30', '0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5713','2014-11-30', '0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N5746','2014-11-30','0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1'),
(id, 'N7721','2014-11-30','0','0','0','0','0','0-0-0',FALSE,'Ingreso en Perfecto estado','1');

--
-- Estructura de tabla para la tabla `devehicles`
--

CREATE TABLE IF NOT EXISTS `devehicles` (
  `id` varchar(8) NOT NULL,
  `modell_id` int(11) NOT NULL,
  `tarjeta_circulacion` varchar(12) NOT NULL,
  `fecha_tarjeta` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `color` varchar(30) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `chasisgrabado` varchar(20) NOT NULL,
  `chasisvin` varchar(20) NOT NULL,
  `costo` float(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_modelo` (`modell_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla almacenamiento de vehículos dados de baja';


--
-- Estructura de tabla para la tabla `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` varchar(10) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `fuelvoucher_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modells`
--
ALTER TABLE `modells`
  ADD CONSTRAINT `modells_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;


ALTER TABLE `modells`
  ADD CONSTRAINT `modells_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



