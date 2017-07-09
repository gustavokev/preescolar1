/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.5-10.1.21-MariaDB : Database - preescolar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`preescolar` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `preescolar`;

/*Table structure for table `alumnos` */

DROP TABLE IF EXISTS `alumnos`;

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_al` varchar(50) DEFAULT NULL,
  `apellido_al` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `sexo` varchar(30) DEFAULT NULL,
  `alumnos_datos_id` int(11) DEFAULT NULL,
  `estados_id` int(11) DEFAULT NULL,
  `municipios_id` int(11) DEFAULT NULL,
  `grado_id` int(11) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `anio_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datos_id` (`alumnos_datos_id`),
  KEY `gsa_id` (`grado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `alumnos` */

insert  into `alumnos`(`id`,`nombre_al`,`apellido_al`,`fecha_nac`,`sexo`,`alumnos_datos_id`,`estados_id`,`municipios_id`,`grado_id`,`seccion_id`,`anio_id`) values (1,'kevin','acevedo','2009-05-08','masculino',1,1,10,1,1,1),(2,'diana','alahe','2009-07-14','f',2,1,12,2,2,2),(3,'luger','arcila','2009-04-14','m',3,1,3,3,3,3),(4,'jose','barragan','2009-12-08','f',4,1,15,4,4,1),(5,'naiska','blanco','2009-10-19','f',5,1,10,3,1,2),(6,'edglimar','castellano','2009-07-05','f',6,1,2,5,2,3),(7,'josneily','cisneros','2009-08-13','femenino',7,1,4,6,3,1),(8,'cesar','espinoza','2009-11-06','masculino',8,1,7,4,4,2),(9,'yhon','garcia','2009-04-20','m',9,1,9,2,1,3),(10,'jeison','guerrero','2009-10-03','masculino',10,1,5,3,2,1),(11,'abraham','lopez','2009-07-27','masculino',11,1,11,5,3,2),(12,'gust','ace','2003-04-04','masculino',12,1,1,9,4,3),(18,'juan','menelao','1978-10-05','m',13,1,5,7,1,1),(21,'hola','pachec','2003-04-04','m',14,2,23,8,2,2),(22,'filiberto','leva','1981-03-12','masculino',15,1,9,6,3,3),(23,'aba','sosa','2003-04-04','femenino',16,2,22,23,4,2),(24,'fernand','flo','1974-03-12','masculino',16,1,15,22,1,3),(25,'lili','fer','1981-03-12','femenino',8,1,15,5,3,2),(26,'sali','da','2003-04-04','femenino',2,2,23,7,2,2);

/*Table structure for table `alumnos_datos` */

DROP TABLE IF EXISTS `alumnos_datos`;

CREATE TABLE `alumnos_datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_escolar` int(11) DEFAULT NULL,
  `alumnos_id` int(11) DEFAULT NULL,
  `datos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumnos_id` (`alumnos_id`),
  KEY `datos_id` (`datos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `alumnos_datos` */

insert  into `alumnos_datos`(`id`,`cedula_escolar`,`alumnos_id`,`datos_id`) values (1,109,1,1),(2,109,1,2),(3,109,2,3),(4,109,2,4),(5,109,3,5),(6,109,3,6),(7,109,4,7),(8,109,4,8),(9,109,5,9),(10,109,5,10),(11,109,1,11),(12,109,2,12);

/*Table structure for table `anio_escolar` */

DROP TABLE IF EXISTS `anio_escolar`;

CREATE TABLE `anio_escolar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anio` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `anio_escolar` */

insert  into `anio_escolar`(`id`,`anio`) values (1,'2016-2017'),(2,'2017-2018'),(3,'2018-2019'),(4,'2019-2020'),(5,'2020-2021');

/*Table structure for table `anios_grados` */

DROP TABLE IF EXISTS `anios_grados`;

CREATE TABLE `anios_grados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grados_id` int(11) DEFAULT NULL,
  `anios_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_id` (`grados_id`),
  KEY `anio_id` (`anios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `anios_grados` */

insert  into `anios_grados`(`id`,`grados_id`,`anios_id`) values (1,6,1),(2,6,1),(3,7,1),(4,5,2),(9,10,0),(10,7,0),(11,11,1),(12,3,2);

/*Table structure for table `datos` */

DROP TABLE IF EXISTS `datos`;

CREATE TABLE `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) DEFAULT NULL,
  `nombre_re` varchar(30) DEFAULT NULL,
  `apellido_re` varchar(30) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `estatus` varchar(11) DEFAULT NULL,
  `direccion` text,
  `email` varchar(30) DEFAULT NULL,
  `estados_id` int(11) DEFAULT NULL,
  `municipios_id` int(11) DEFAULT NULL,
  `parroquias_id` int(11) DEFAULT NULL,
  `alumnos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumnos_id` (`alumnos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `datos` */

insert  into `datos`(`id`,`cedula`,`nombre_re`,`apellido_re`,`telefono`,`celular`,`estatus`,`direccion`,`email`,`estados_id`,`municipios_id`,`parroquias_id`,`alumnos_id`) values (1,13553614,'gustavo','acevedo meza','0412-3434919',NULL,'r2','La Pica calle pasaje Maya casa #3',NULL,1,10,1,1),(2,18490320,'neilly','sanchez','0412-1347784',NULL,'r1','Urb. La Croquera, Sector O, Fila # 15, casa # 02. ',NULL,1,10,2,1),(3,12170190,'yuleny','ochoa','0412-4798716',NULL,'r1','C/ Jose Felix Ribas, casa # 24, El Libertador. ',NULL,1,10,3,2),(4,15130921,'arnaldo','alahe','',NULL,'r2',' 	C/ Jose Felix Ribas, casa # 24, El Libertador. ',NULL,1,10,4,2),(5,17577629,'deiglis','sanchez','0424-3470446',NULL,'r1','C/ Tamanaco # 15 La Atascosa Pasaje 1.',NULL,1,10,5,3),(6,12611496,'luger','arcila','',NULL,'r2','C/ Tamanaco # 15 La Atascosa Pasaje 1.',NULL,1,10,6,3),(7,15084387,'Lilianets','Figueroa','0412-5025196',NULL,'r1','C/Zamora # 11 Centro I Palo negro. ',NULL,1,10,7,4),(8,10754370,'yosmar','barragan','',NULL,'r2','C/Zamora # 11 Centro I Palo negro.',NULL,1,10,8,4),(9,12612323,'carla','herrera','0416-3457085',NULL,'r1','C/ Miranda # 38-1 El Libertador.',NULL,1,10,9,5),(10,13769232,'julio','blanco',NULL,NULL,'r2','C/ Miranda # 38-1 El Libertador.',NULL,1,10,10,5),(11,123,'','representante 1','','','r3','                                                                                ','',1,10,14,1),(12,456,'','representante 2','','','r3','                                                ','',1,10,8,2),(13,654,'','representante 3','','','r3','                                                ','',1,10,17,3),(14,11,'docente1','docente1','55-5-rriente','','d1','                                                ','',1,10,12,7),(15,12,'docente2','docente2','','','d2','ninguna','',1,10,19,8),(16,13,'docente3','docente3','','','d3','                ','',1,10,4,8),(17,0,'','','','','','                ','',0,0,0,NULL);

/*Table structure for table `direccion` */

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `parroquia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idparroquia` (`parroquia_id`),
  KEY `idestado` (`estado_id`),
  KEY `idmunicipio` (`municipio_id`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `direccion` */

insert  into `direccion`(`id`,`estado_id`,`municipio_id`,`parroquia_id`) values (1,1,10,1),(2,1,10,2),(3,1,10,3),(4,1,10,4),(5,1,10,5),(6,1,10,6),(7,1,10,7),(8,1,10,8),(9,1,10,9),(10,1,10,10),(11,1,10,11),(12,1,10,12),(13,1,10,13),(14,1,10,14),(15,1,10,15),(16,1,10,16),(17,1,10,17),(18,1,10,18),(19,1,10,19),(20,1,10,20),(21,1,10,21),(22,1,10,22),(23,1,10,23),(24,1,10,24),(25,1,10,25),(26,2,37,NULL),(27,1,38,NULL),(28,1,39,NULL),(29,NULL,40,NULL),(30,2,42,NULL);

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `estados` */

insert  into `estados`(`id`,`estado`) values (1,'Aragua'),(2,'Carabobo'),(3,'Miranda'),(4,'Cojedes'),(5,'Amazonas '),(6,'Apure'),(7,'Anzoategui'),(8,'Barinas'),(9,'Bolivar'),(10,'Delta-Amacuro'),(11,'Dependencias-Federales'),(12,'Distrito-Capital'),(13,'Falcon'),(14,'Lara'),(15,'Merida'),(16,'Monagas'),(17,'Nueva-Esparta'),(18,'Portuguesa'),(19,'Sucre'),(20,'Tachira'),(21,'Trujillo'),(22,'Vargas'),(23,'Yaracuy'),(24,'Zulia'),(25,'Guarico');

/*Table structure for table `estatus` */

DROP TABLE IF EXISTS `estatus`;

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `representante1_id` int(11) DEFAULT NULL,
  `representante2_id` int(11) DEFAULT NULL,
  `representante3_id` int(11) DEFAULT NULL,
  `docente1_id` int(11) DEFAULT NULL,
  `docente2_id` int(11) DEFAULT NULL,
  `docente3_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estatus` */

/*Table structure for table `grado_seccion_anio` */

DROP TABLE IF EXISTS `grado_seccion_anio`;

CREATE TABLE `grado_seccion_anio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grado_id` int(11) DEFAULT NULL,
  `seccion_id` int(11) DEFAULT NULL,
  `anio_id` int(11) DEFAULT NULL,
  `gsa` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_id` (`grado_id`),
  KEY `seccion_id` (`seccion_id`),
  KEY `anio_id` (`anio_id`),
  CONSTRAINT `grado_seccion_anio_ibfk_1` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id`),
  CONSTRAINT `grado_seccion_anio_ibfk_2` FOREIGN KEY (`seccion_id`) REFERENCES `secciones` (`id`),
  CONSTRAINT `grado_seccion_anio_ibfk_3` FOREIGN KEY (`anio_id`) REFERENCES `anio_escolar` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `grado_seccion_anio` */

insert  into `grado_seccion_anio`(`id`,`grado_id`,`seccion_id`,`anio_id`,`gsa`) values (1,1,1,1,'1a17'),(2,1,1,2,'1a16'),(3,1,2,1,'1b17'),(4,1,2,2,'1b16'),(5,1,3,1,'1c17'),(6,1,3,2,'1c16'),(7,1,4,1,'1d17'),(8,1,4,2,'1d16'),(9,2,1,1,'2a17'),(10,2,1,2,'2a16'),(11,2,2,1,'2b17'),(12,2,2,2,'2b16'),(13,2,3,1,'2c17'),(14,2,3,2,'2c16'),(15,2,4,1,'2d17'),(16,2,4,2,'2d16'),(17,3,1,1,'3a17'),(18,3,1,2,'3a16'),(19,3,2,1,'3b17'),(20,3,2,2,'3b16'),(21,3,3,1,'3c17'),(22,3,3,2,'3c16'),(23,3,4,1,'3d17'),(24,3,4,2,'3d16');

/*Table structure for table `grados` */

DROP TABLE IF EXISTS `grados`;

CREATE TABLE `grados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `grados` */

insert  into `grados`(`id`,`grado`) values (1,'primer grado'),(2,'segundo grado'),(3,'segundo nivel'),(4,'cuarto grado'),(5,'quinto grado'),(6,'sexto grado'),(7,'maternal'),(11,'primer nivel');

/*Table structure for table `municipios` */

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estados_id` int(11) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estados_id` (`estados_id`),
  CONSTRAINT `municipios_estados_FK` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `municipios` */

insert  into `municipios`(`id`,`estados_id`,`municipio`) values (1,1,'Mario Briceño Iragorry'),(2,1,'Santiago Mariño'),(3,1,'Girardot'),(4,1,'Tovar '),(5,1,'Costa de Oro'),(6,1,'Jose Angel Lamas'),(7,1,'Sucre'),(8,1,'Bolivar'),(9,1,'Linares Alcántara'),(10,1,'Libertador'),(11,1,'Jose Felix Ribas'),(12,1,'Jose Rafael Revenga'),(13,1,'Santos Michelena'),(14,1,'Zamora '),(15,1,'San Sebastian'),(16,1,'San Casimiro'),(17,1,'Camatagua'),(18,1,'Urdaneta'),(22,2,'Juan José Mora'),(23,2,'Puerto Cabello'),(24,2,'Naguanagua'),(25,2,'Bejuma'),(26,2,'Montalban'),(27,2,'Miranda'),(28,2,'Libertador'),(29,2,'Valencia'),(30,2,'Carlos Arvelo'),(31,2,'San Diego'),(32,2,'Guacara'),(33,2,'Los Guayos'),(34,2,'San Joaquín'),(35,2,'Diego Ibarra');

/*Table structure for table `parroquias` */

DROP TABLE IF EXISTS `parroquias`;

CREATE TABLE `parroquias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipios_id` int(11) DEFAULT NULL,
  `parroquia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ciudad_municipio_id` (`municipios_id`),
  CONSTRAINT `parroquias_municipios_FK` FOREIGN KEY (`municipios_id`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

/*Data for the table `parroquias` */

insert  into `parroquias`(`id`,`municipios_id`,`parroquia`) values (1,10,'Barrio Carlos Andrés Pérez'),(2,10,'Barrio Ezequiel Zamora'),(3,10,'Barrio La Frontera'),(4,10,'Barrio Mata Verde'),(5,10,'Barrio Ocumarito Norte'),(6,10,'Centro La Pica'),(7,10,'	Malariología Antonio Aranguren'),(8,10,'Sector 10 de Diciembre'),(9,10,'Sector 1ro de Mayo'),(10,10,'Sector Bello Monte'),(11,10,'Sector El Triángulo'),(12,10,'Sector La Carrizalera'),(13,10,'Sector La Cuarta'),(14,10,'Sector La Frontera'),(15,10,'Sector La Quinta'),(16,10,'Sector Las animas I'),(17,10,'Sector Las animas II'),(18,10,'Sector Las Vegas'),(19,10,'Sector Los Hornos I'),(20,10,'Sector Los Hornos II'),(21,10,'Sector Los Hornos III'),(22,10,'Sector Los Hornos IV'),(23,10,'Sector Los Hornos V'),(24,10,'Sector Los Hornos VI'),(25,10,'Sector Los Hornos VII'),(26,10,'Sector Los Hornos VIII'),(27,10,'Sector Los Hornos IX'),(28,10,'Sector Los Hornos X'),(29,10,'Sector Los Mangos'),(30,10,'Sector Los Naranjos'),(31,10,'Sector Ocumarito'),(32,10,'Sector San Martín'),(33,10,'Sector Santa Rosalía'),(34,10,'Urbanización Cuatricentenario'),(35,10,'Urbanización El Encanto'),(36,10,'Urbanización El Orticeño'),(37,10,'Urbanización La Esperanza'),(38,10,'Urbanización La Macarena I'),(39,10,'Urbanización Los Libertadores'),(40,10,'Urbanización Los Lirios'),(41,10,'Urbanización Palo Negro I'),(42,10,'	Urbanización Palo Negro II'),(43,10,'Urbanización San Miguel'),(44,10,'Urbanización Santa Rosalía'),(45,10,'Barrio Libertador'),(46,10,'Barrio Los Hornos'),(47,10,'Barrio Los Ruices'),(48,10,'Barrio Santa Ana'),(49,10,'Base Aérea Libertador'),(50,10,'Centro Palo Negro'),(51,10,'Hacienda La Coromoto'),(52,10,'Sector 8'),(53,10,'Sector Camburito'),(54,10,'Sector El Jaral'),(55,10,'Sector La Atascosa'),(56,10,'Sector La Granja Coromoto'),(57,10,'Sector Las Malvinas'),(58,10,'Sector Los Jabillos'),(59,10,'Urbanización Araguaney'),(60,10,'Urbanización Bael'),(61,10,'Urbanización La Blanquera'),(62,10,'Urbanización La Croquera'),(63,10,'Urbanización La Ovallera'),(64,10,'Urbanización Las Trinitarias'),(65,10,'Urbanización Los Robles'),(66,10,'Urbanización Los Tulipanes'),(67,10,'Urbanización San Antonio');

/*Table structure for table `secciones` */

DROP TABLE IF EXISTS `secciones`;

CREATE TABLE `secciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `secciones` */

insert  into `secciones`(`id`,`seccion`) values (1,'a'),(2,'b'),(3,'c'),(4,'d');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`lastname`,`username`,`password`,`email`) values (1,'Juan','Palomo','juan','12345678','juan@mail.com'),(2,'Pedro','Palomo','pedro','12345678','pedro@mail.com'),(9,'gustavo','acevedo','gustavoace','25f9e794323b453885f5181f1b624d0b','gustavoacevedo24@hotmail.com'),(10,'gustavo','acevedo','gustavokev','cb4d96fe3f9ec29787f2799c54317241','gustavoacevedo24@gmail.com'),(11,'gustavo','acevedo','neilly','e10adc3949ba59abbe56e057f20f883e','neillysz25@hotmail.com'),(12,'guss','acevedo','gustavoacev','e10adc3949ba59abbe56e057f20f883e','gustavoacevedo@gmail.com'),(13,'gud','acevedom','neillysz','e10adc3949ba59abbe56e057f20f883e','neillysz@hotmail.com');

/*Table structure for table `users1` */

DROP TABLE IF EXISTS `users1`;

CREATE TABLE `users1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users1` */

insert  into `users1`(`id`,`username`,`email`,`password`,`created_at`) values (1,'admin1','admin1@sourcezilla.com','123abc','2012-10-03 09:22:02'),(2,'admin2','admin2@sourcezilla.com','123456','2012-10-03 09:22:02');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `estado` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`correo`,`usuario`,`pass`,`codigo`,`estado`) values (2,'gustavo','gustavoacevedo24@gmail.com','gustavoace','123456','123456','0');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
