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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO brands VALUES (id, 'Toyota');
INSERT INTO brands VALUES (id, 'Daihatsu');
INSERT INTO brands VALUES (id, 'Nissan');
INSERT INTO brands VALUES (id, 'Datsun');
INSERT INTO brands VALUES (id, 'Mitsubishi');
INSERT INTO brands VALUES (id, 'Mercedes Benz');
INSERT INTO brands VALUES (id, 'Kia');
INSERT INTO brands VALUES (id, 'Hyundai');
INSERT INTO brands VALUES (id, 'Mack');
INSERT INTO brands VALUES (id, 'Ford');
INSERT INTO brands VALUES (id, 'Chevrolet');
INSERT INTO brands VALUES (id, 'Isuzu');
INSERT INTO brands VALUES (id, 'Honda');
INSERT INTO brands VALUES (id, 'Volkswagen');
INSERT INTO brands VALUES (id, 'Mazda');
INSERT INTO brands VALUES (id, 'Dodge');

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
  `Kilometraje_actual` float NOT NULL,
  `kilometraje` float NOT NULL,
  `numero_viajes` int(11) NOT NULL,
  `numero_mantenimientos` int(11) NOT NULL,
  `numero_vales` int(11) NOT NULL,
  `fecha_ult_mant` date NOT NULL,
  `prestable` tinyint(1) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
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
INSERT INTO `employees` VALUES ('12345678-9', 2, 'Mauricio Faro', 'Cala Crisostomo', 'Col. Atlacatl pje. #8B, Ciudad Delgado', 'cala@cove.sv', '8419-3887', 0);
INSERT INTO `employees` VALUES ('56745678-5', 11, 'Mario Berto', 'Ochoa Galicia', 'Urbanizacion Carrasco #4G, Ciudad Delgado', 'ochoa@cove.sv', '2489-4967', 0);
INSERT INTO `employees` VALUES ('23445678-8', 3, 'Guadalupe Dinora', 'Villasana Fonseca', 'Residencial San Marcos Casa #1, Ciudad Delgado', 'villasana@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('67845678-4', 11, 'Modesta Josefina', 'Esperanza Lazos', 'Urbanizacion Minier #4H, Ciudad Delgado', 'villasana@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('34545678-7', 4, 'Victoriano Ezequiel', 'Melero Burgos', 'Residencial Bella Vista Casa #4, Ciudad Delgado', 'melero@cove.sv', '5589-4911', 0);
INSERT INTO `employees` VALUES ('78945678-3', 11, 'Severo Bonifacio', 'Almaraz Cornelio', 'Km. 13. Carretera Troncal del Norte #2A, Ciudad Delgado', 'almaraz@cove.sv', '1385-5511', 0);
INSERT INTO `employees` VALUES ('90145678-1', 11, 'Raimunda Enrica', 'Carrera Prieto', 'Km. 12. Carretera Troncal del Norte #2B, Ciudad Delgado', 'aguas@cove.sv', '8882-7774', 0);
INSERT INTO `employees` VALUES ('45645678-6', 5, 'Claudio Natalio', 'Contreras Calle', 'Col. Las Rosas #4, Ciudad Delgado', 'calles@cove.sv', '2489-4967', 0);
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modells`
--

CREATE TABLE IF NOT EXISTS `modells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_marca` (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

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

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `capacidad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `tipo`, `descripcion`, `capacidad`) VALUES
(8, 'Tipo', '', 102);

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
  `type_id` int(11) NOT NULL,
  `tarjeta_circulacion` varchar(12) NOT NULL,
  `fecha_tarjeta` varchar(15) NOT NULL,
  `anio` varchar(4) NOT NULL,
  `color` varchar(30) NOT NULL,
  `motor` varchar(20) NOT NULL,
  `chasisgrabado` varchar(20) NOT NULL,
  `chasisvin` varchar(20) NOT NULL,
  `tipo_gasolina` varchar(20) NOT NULL,
  `costo` float(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_modelo` (`modell_id`,`type_id`),
  KEY `id_tipo` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla almacenamiento de vehículos';


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

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
