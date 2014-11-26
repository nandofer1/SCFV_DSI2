DROP DATABASE IF EXISTS `scfv`;
CREATE DATABASE `scfv`;
USE `scfv`;

CREATE TABLE IF NOT EXISTS user_types (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  tipo_usuario varchar(50) UNIQUE,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL
);

INSERT INTO user_types values (id, 'Administrador del Sistema', NOW(), NOW());
INSERT INTO user_types values (id, 'Gerente General', NOW(), NOW());
INSERT INTO user_types values (id, 'Gerente de Servicios', NOW(), NOW());
INSERT INTO user_types values (id, 'Supervisor de desechos solidos', NOW(), NOW());
INSERT INTO user_types values (id, 'Jefe del Taller', NOW(), NOW());
INSERT INTO user_types values (id, 'Gestor de prestamos de vehiculos', NOW(), NOW());

CREATE TABLE IF NOT EXISTS users (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  username varchar(50) UNIQUE,
  password varchar(255) DEFAULT NULL,
  tipo_usuario int(11) DEFAULT NULL,
  dui varchar(10) DEFAULT NULL,
  telefono varchar(14) DEFAULT NULL,
  correo varchar(50) DEFAULT NULL,
  direccion varchar(250) DEFAULT NULL,
  created datetime DEFAULT NULL,
  modified datetime DEFAULT NULL,
  FOREIGN KEY (tipo_usuario) REFERENCES user_types(id)
);

INSERT INTO `users` VALUES (1,'juan','$2a$10$v7NW0coYFFg0gNiOq1fiKeNycMl/dlQoKSfCqaLFkO.4CYJGAOBPy',1,'82845678-8','7154-6839','juan@ues.edu.sv','Urb. Universitaria norte, Poligono #3, San Salvador','2014-11-07 02:37:24','2014-11-06 20:50:01');
INSERT INTO `users` VALUES (2,'fernando','$2a$10$UqXi1iWMAL5BYH19pPdB5O8llithygL1a9uCMq3eTOHtyEB2AzHku',1,'45679812-3','7892-4524','fernando@ues.edu.sv','Col. Atlacatl, pje. principal #4A, Mejicanos. San Salvador','2014-11-07 02:37:24','2014-11-06 20:47:36');
INSERT INTO `users` VALUES (3,'santiago','$2a$10$Y6.xZ/4lPz3VizCo3/PTDOUGFoXL..SggepKciWbT9p2mOb4SRBXu',1,'98765432-1','7816-1838','santiago@ues.edu.sv','Urb. Monserrat, #3. San Marcos. San Salvador','2014-11-06 20:37:57','2014-11-06 20:45:54');
INSERT INTO `users` VALUES (4,'enrique','$2a$10$OtyUSAQ4xV5PzIIEg5fsfOnknZ4vNU2kwKC43p5cc2e3DdPAhti4e',1,'12345678-9','7841-4568','enrique@ues.edu.sv','Col. Maquilishuat #1. San Martin, San Salvador','2014-11-06 20:44:17','2014-11-06 20:44:17');
INSERT INTO `users` VALUES (5,'rebeca','$2a$10$noygLzkwKKEJUHDiysg7QOTuJAKKrd98QjR9Xkg6Nt.q6KWFlMp9O',1,'65498135-8','7862-6565','rebeca@ues.edu.sv','Col. La Paz #4, Santa Ana, San Salvador','2014-11-06 20:51:59','2014-11-06 20:51:59');


CREATE TABLE IF NOT EXISTS units (
  id int(11) NOT NULL AUTO_INCREMENT,
  unidad varchar(50) NOT NULL,
  descripcion varchar(250) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO units VALUES(id, 'Social', '');
INSERT INTO units VALUES(id, 'Gerencial', '');

CREATE TABLE IF NOT EXISTS managements (
  id int(11) NOT NULL AUTO_INCREMENT,
  unit_id int(11) NOT NULL,
  gerencia varchar(50) NOT NULL,
  PRIMARY KEY (id),
  KEY id_unidad (unit_id)
);

INSERT INTO managements VALUES(id, 2, 'Registro del Estado Familiar');
INSERT INTO managements VALUES(id, 2, 'Administracion de Espacios Publicos');
INSERT INTO managements VALUES(id, 2, 'Gerencia Financiera');
INSERT INTO managements VALUES(id, 2, 'Administracion de Mercados');
INSERT INTO managements VALUES(id, 2, 'Gerencia de Servicios Municipales');


CREATE TABLE IF NOT EXISTS departaments (
  id int(11) NOT NULL AUTO_INCREMENT,
  management_id int(11) NOT NULL,
  departamento varchar(80) NOT NULL,
  descripcion varchar(250) NOT NULL,
  PRIMARY KEY (id),
  KEY id_gerencia (management_id)
);

INSERT INTO departaments VALUES (id, 1, 'Cementerios','');

INSERT INTO departaments VALUES (id, 2, 'Limpieza y Ornato','');
INSERT INTO departaments VALUES (id, 2, 'Casa de la Cultura','');
INSERT INTO departaments VALUES (id, 2, 'Parque Municipal Tio Julio','');

INSERT INTO departaments VALUES (id, 3, 'Gestion de Cobro y Recuperacion de Mora','');
INSERT INTO departaments VALUES (id, 3, 'Catastro','');
INSERT INTO departaments VALUES (id, 3, 'Contabilidad','');
INSERT INTO departaments VALUES (id, 3, 'Tesoreria Municipal','');

INSERT INTO departaments VALUES (id, 4, 'Gestion de Cobro','');
INSERT INTO departaments VALUES (id, 4, 'Mantenimiento','');

INSERT INTO departaments VALUES (id, 5, 'Recoleccion y disposicion de desechos solidos','');
INSERT INTO departaments VALUES (id, 5, 'Alumbrado publico y mantenimiento interno','');
INSERT INTO departaments VALUES (id, 5, 'Taller Municipal','');
















CREATE TABLE IF NOT EXISTS allocations (
  id int(11) NOT NULL AUTO_INCREMENT,
  dossier_id int(11) NOT NULL,
  employee_id varchar(10) NOT NULL COMMENT 'Dui a quien se le asigno ',
  management_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'brands'
--

CREATE TABLE IF NOT EXISTS brands (
  id int(11) NOT NULL AUTO_INCREMENT,
  marca varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'cleaningtoolsuseds'
--

CREATE TABLE IF NOT EXISTS cleaningtoolsuseds (
  id int(11) NOT NULL AUTO_INCREMENT,
  trip_id int(11) NOT NULL,
  tool_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'crews'
--

CREATE TABLE IF NOT EXISTS crews (
  id int(11) NOT NULL AUTO_INCREMENT,
  trip_id int(11) NOT NULL,
  employee_id varchar(10) NOT NULL,
  ` motorista` tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'dossiers'
--

CREATE TABLE IF NOT EXISTS dossiers (
  id int(11) NOT NULL AUTO_INCREMENT,
  vehicle_id varchar(8) NOT NULL,
  fecha_ingreso date NOT NULL,
  Kilometraje_actual float NOT NULL,
  kilometraje float NOT NULL,
  numero_viajes int(11) NOT NULL,
  numero_mantenimientos int(11) NOT NULL,
  numero_vales int(11) NOT NULL,
  fecha_ult_mant date NOT NULL,
  prestable tinyint(1) NOT NULL,
  observaciones varchar(250) NOT NULL,
  PRIMARY KEY (id),
  KEY placa (vehicle_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'drivers'
--

CREATE TABLE IF NOT EXISTS drivers (
  id int(11) NOT NULL AUTO_INCREMENT,
  request_id int(11) NOT NULL,
  employee_id varchar(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'employees'
--

CREATE TABLE IF NOT EXISTS employees (
  id varchar(10) NOT NULL COMMENT 'DUI',
  departament_id int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  apellidos varchar(50) NOT NULL,
  direccion varchar(250) NOT NULL,
  correo varchar(50) NOT NULL,
  telefono varchar(14) NOT NULL,
  PRIMARY KEY (id),
  KEY id_departamento (departament_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'fuelvouchers'
--

CREATE TABLE IF NOT EXISTS fuelvouchers (
  id varchar(10) NOT NULL,
  monto float NOT NULL,
  fecha date NOT NULL,
  tipo_combustible varchar(10) NOT NULL,
  galones decimal(10,0) NOT NULL,
  aceite decimal(10,0) NOT NULL,
  factura int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'generalvariables'
--

CREATE TABLE IF NOT EXISTS generalvariables (
  id int(11) NOT NULL AUTO_INCREMENT,
  nombre_alcaldia int(11) NOT NULL,
  direccion varchar(250) NOT NULL,
  tel1 varchar(14) NOT NULL,
  tel2 varchar(14) NOT NULL,
  obervaciones int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'maintenances'
--

CREATE TABLE IF NOT EXISTS maintenances (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) NOT NULL,
  dossier_id int(11) NOT NULL,
  upkeeptype_id int(11) NOT NULL,
  descripcion int(11) NOT NULL,
  fecha_mantenimiento date NOT NULL,
  fecha_solicitud date NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'maintenancetools'
--

CREATE TABLE IF NOT EXISTS maintenancetools (
  id int(11) NOT NULL AUTO_INCREMENT,
  herramienta varchar(50) NOT NULL,
  descripcion varchar(250) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'maintenancetoolsuseds'
--

CREATE TABLE IF NOT EXISTS maintenancetoolsuseds (
  id int(11) NOT NULL AUTO_INCREMENT,
  maintenance_id int(11) NOT NULL,
  maintenancetool_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'maintenancetypes'
--

CREATE TABLE IF NOT EXISTS maintenancetypes (
  id int(11) NOT NULL AUTO_INCREMENT,
  tipo varchar(50) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'modells'
--

CREATE TABLE IF NOT EXISTS modells (
  id int(11) NOT NULL AUTO_INCREMENT,
  brand_id int(11) NOT NULL,
  modelo varchar(30) NOT NULL,
  PRIMARY KEY (id),
  KEY id_marca (brand_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'parts'
--

CREATE TABLE IF NOT EXISTS parts (
  id int(11) NOT NULL AUTO_INCREMENT,
  repuesto varchar(50) NOT NULL,
  descripcion varchar(250) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'partsuseds'
--

CREATE TABLE IF NOT EXISTS partsuseds (
  id int(11) NOT NULL AUTO_INCREMENT,
  maintenance_id int(11) NOT NULL,
  part_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'requests'
--

CREATE TABLE IF NOT EXISTS requests (
  id int(11) NOT NULL AUTO_INCREMENT,
  dossier_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  fecha_solicitud date NOT NULL,
  fecha_inicio date NOT NULL,
  fecha_fin date NOT NULL,
  hora_inicio time NOT NULL,
  hora_fin time NOT NULL,
  descripcion varchar(250) NOT NULL,
  aprobado tinyint(1) NOT NULL,
  anulado tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'requestvouchers'
--

CREATE TABLE IF NOT EXISTS requestvouchers (
  id int(11) NOT NULL AUTO_INCREMENT,
  fuelvoucher_id int(11) NOT NULL,
  request_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'tools'
--

CREATE TABLE IF NOT EXISTS tools (
  id int(11) NOT NULL AUTO_INCREMENT,
  herramienta varchar(20) NOT NULL,
  existencia int(11) NOT NULL,
  descripcion varchar(250) NOT NULL,
  valor float NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'trips'
--

CREATE TABLE IF NOT EXISTS trips (
  id int(11) NOT NULL AUTO_INCREMENT,
  dossier_id int(11) NOT NULL,
  fecha_inicio date NOT NULL,
  fecha_fin date NOT NULL,
  hora_inicio time NOT NULL,
  hora_fin time NOT NULL,
  kilometraje_inicial int(11) NOT NULL,
  kilometraje_final int(11) NOT NULL,
  comentario_salida varchar(250) NOT NULL,
  comentario_entrada varchar(250) NOT NULL,
  rendimiento decimal(10,0) NOT NULL,
  fuera tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'types'
--

CREATE TABLE IF NOT EXISTS `types` (
  id int(11) NOT NULL AUTO_INCREMENT,
  tipo varchar(30) NOT NULL,
  descripcion varchar(250) NOT NULL,
  capacidad int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;


-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'vehicles'
--

CREATE TABLE IF NOT EXISTS vehicles (
  id varchar(8) NOT NULL,
  modell_id int(11) NOT NULL,
  type_id int(11) NOT NULL,
  tarjeta_circulacion varchar(12) NOT NULL,
  fecha_tarjeta varchar(15) NOT NULL,
  anio varchar(4) NOT NULL,
  color varchar(30) NOT NULL,
  motor varchar(20) NOT NULL,
  chasisgrabado varchar(20) NOT NULL,
  chasisvin varchar(20) NOT NULL,
  tipo_gasolina varchar(20) NOT NULL,
  costo float(8,2) NOT NULL,
  PRIMARY KEY (id),
  KEY id_modelo (modell_id,type_id),
  KEY id_tipo (type_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla almacenamiento de vehículos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'vouchers'
--

CREATE TABLE IF NOT EXISTS vouchers (
  id varchar(10) NOT NULL,
  trip_id int(11) NOT NULL,
  fuelvoucher_id varchar(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modells`
--
ALTER TABLE `modells`
  ADD CONSTRAINT modells_ibfk_1 FOREIGN KEY (brand_id) REFERENCES brands (id) ON DELETE NO ACTION ON UPDATE CASCADE;

