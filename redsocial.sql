/*
SQLyog Ultimate v9.63 
MySQL - 5.6.12-log : Database - redsocial
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


/*Table structure for table `amigos` */

DROP TABLE IF EXISTS `amigos`;

CREATE TABLE `amigos` (
  `idamigo` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `emailamigo` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idamigo`),
  UNIQUE KEY `idamigo` (`idamigo`),
  UNIQUE KEY `idamigo_2` (`idamigo`),
  KEY `email` (`email`,`emailamigo`),
  KEY `emailamigo` (`emailamigo`),
  KEY `email_2` (`email`,`emailamigo`),
  CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`emailamigo`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `amigos` */

LOCK TABLES `amigos` WRITE;

UNLOCK TABLES;

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `emailamigo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mensaje` text CHARACTER SET latin1 NOT NULL,
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `emailamigo` (`emailamigo`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE,
  CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`emailamigo`) REFERENCES `usuario` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `chat` */

LOCK TABLES `chat` WRITE;

UNLOCK TABLES;

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `idcom` int(11) NOT NULL AUTO_INCREMENT,
  `idpub` int(11) NOT NULL,
  `texto` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imagen` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `video` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idcom`),
  KEY `idpub` (`idpub`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idpub`) REFERENCES `publicaciones` (`idpub`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `comentarios` */

LOCK TABLES `comentarios` WRITE;

UNLOCK TABLES;

/*Table structure for table `fotos` */

DROP TABLE IF EXISTS `fotos`;

CREATE TABLE `fotos` (
  `idfotos` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `idmf` int(11) NOT NULL,
  `foto` varchar(200) CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(70) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idfotos`),
  KEY `email` (`email`,`idmf`),
  KEY `idmf` (`idmf`),
  KEY `idmf_2` (`idmf`),
  CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fotos_ibfk_2` FOREIGN KEY (`idmf`) REFERENCES `misfotos` (`idmf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fotos` */

LOCK TABLES `fotos` WRITE;

UNLOCK TABLES;

/*Table structure for table `grupometadato` */

DROP TABLE IF EXISTS `grupometadato`;

CREATE TABLE `grupometadato` (
  `idmetadato` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionmetadato` varchar(20) NOT NULL,
  PRIMARY KEY (`idmetadato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `grupometadato` */

LOCK TABLES `grupometadato` WRITE;

UNLOCK TABLES;

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `idg` int(30) NOT NULL AUTO_INCREMENT,
  `idmg` int(30) NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idg`),
  UNIQUE KEY `idg` (`idg`),
  KEY `idmg` (`idmg`),
  KEY `email` (`email`),
  CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`idmg`) REFERENCES `migrupos` (`idmg`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `grupos` */

LOCK TABLES `grupos` WRITE;

UNLOCK TABLES;

/*Table structure for table `migrupos` */

DROP TABLE IF EXISTS `migrupos`;

CREATE TABLE `migrupos` (
  `idmg` int(30) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idmg`),
  KEY `idmg` (`idmg`),
  KEY `email` (`email`),
  CONSTRAINT `migrupos_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migrupos` */

LOCK TABLES `migrupos` WRITE;

UNLOCK TABLES;

/*Table structure for table `misfotos` */

DROP TABLE IF EXISTS `misfotos`;

CREATE TABLE `misfotos` (
  `idmf` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombrealbum` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idmf`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `misfotos` */

LOCK TABLES `misfotos` WRITE;

UNLOCK TABLES;

/*Table structure for table `perfil` */

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `direccion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `edocivil` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ocupacion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estudios` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ciudad` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idperfil`),
  KEY `idperfil` (`idperfil`),
  KEY `email` (`email`),
  KEY `idperfil_2` (`idperfil`),
  KEY `email_2` (`email`),
  CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `perfil` */

LOCK TABLES `perfil` WRITE;

UNLOCK TABLES;

/*Table structure for table `publicaciones` */

DROP TABLE IF EXISTS `publicaciones`;

CREATE TABLE `publicaciones` (
  `idpub` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `texto` varchar(200) CHARACTER SET latin1 NOT NULL,
  `imagen` varchar(200) CHARACTER SET latin1 NOT NULL,
  `video` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enperfilde` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idpub`),
  KEY `idpub` (`idpub`,`email`),
  KEY `email` (`email`),
  CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `publicaciones` */

LOCK TABLES `publicaciones` WRITE;

UNLOCK TABLES;

/*Table structure for table `solicitudes` */

DROP TABLE IF EXISTS `solicitudes`;

CREATE TABLE `solicitudes` (
  `idconf` int(30) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `emailamigo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idconf`),
  KEY `email` (`email`,`emailamigo`),
  KEY `emailamigo` (`emailamigo`),
  KEY `email_2` (`email`,`emailamigo`),
  CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `solicitudes` */

LOCK TABLES `solicitudes` WRITE;

UNLOCK TABLES;

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fechanac` date NOT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sexo` varchar(30) CHARACTER SET latin1 NOT NULL,
  `stado` varchar(30) CHARACTER SET latin1 NOT NULL,
  `fotos` varchar(200) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`email`),
  KEY `email` (`email`),
  KEY `iduser` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

LOCK TABLES `usuario` WRITE;

UNLOCK TABLES;

/*Table structure for table `valormetadato` */

DROP TABLE IF EXISTS `valormetadato`;

CREATE TABLE `valormetadato` (
  `idvalmetadato` int(11) NOT NULL AUTO_INCREMENT,
  `emailuser` varchar(50) CHARACTER SET latin1 NOT NULL,
  `metadatoid` int(11) NOT NULL,
  `valormetadato` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idvalmetadato`),
  KEY `emailuser` (`emailuser`),
  KEY `metadatoid` (`metadatoid`),
  CONSTRAINT `valormetadato_ibfk_1` FOREIGN KEY (`emailuser`) REFERENCES `usuario` (`email`),
  CONSTRAINT `valormetadato_ibfk_2` FOREIGN KEY (`metadatoid`) REFERENCES `grupometadato` (`idmetadato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `valormetadato` */

LOCK TABLES `valormetadato` WRITE;

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
