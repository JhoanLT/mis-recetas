/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : recetas

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-28 15:22:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) NOT NULL,
  `descripcion` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(55) NOT NULL,
  `nombre` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `usuario` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `fk_rol_idrol` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_rol_idrol` (`fk_rol_idrol`),
  CONSTRAINT `fk_rol_idrol` FOREIGN KEY (`fk_rol_idrol`) REFERENCES `rol` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for clasificacion
-- ----------------------------
DROP TABLE IF EXISTS `clasificacion`;
CREATE TABLE `clasificacion` (
  `idclasificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) NOT NULL,
  `descripcion` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idclasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


-- ----------------------------
-- Table structure for receta
-- ----------------------------
DROP TABLE IF EXISTS `receta`;
CREATE TABLE `receta` (
  `idreceta` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idreceta`),
  KEY `fk_usuario_receta` (`idusuario`),
  CONSTRAINT `fk_usuario_receta` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


-- ----------------------------
-- Table structure for ingrediente
-- ----------------------------
DROP TABLE IF EXISTS `ingrediente`;
CREATE TABLE `ingrediente` (
  `idingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) NOT NULL,
  `descripcion` varchar(55) DEFAULT NULL,
  `imagen` varchar(250) NOT NULL,
  `clasificacion` int(11) NOT NULL,
  PRIMARY KEY (`idingrediente`),
  KEY `fk_clasificacion_idclasificacion` (`clasificacion`),
  CONSTRAINT `fk_clasificacion_idclasificacion` FOREIGN KEY (`clasificacion`) REFERENCES `clasificacion` (`idclasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for detalle_receta_ingrediente
-- ----------------------------
DROP TABLE IF EXISTS `detalle_receta_ingrediente`;
CREATE TABLE `detalle_receta_ingrediente` (
  `id_detalle_receta_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `id_receta` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_receta_ingrediente`),
  KEY `fk_receta_detalle_receta_ingrediente` (`id_receta`),
  KEY `fk_ingrediente_detalle_receta_ingrediente` (`id_ingrediente`),
  CONSTRAINT `fk_ingrediente_detalle_receta_ingrediente` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`idingrediente`),
  CONSTRAINT `fk_receta_detalle_receta_ingrediente` FOREIGN KEY (`id_receta`) REFERENCES `receta` (`idreceta`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*INSERTAR USUARIO ADMINISTRADOR POR DEFECTO*/
INSERT INTO `usuario` (`cedula`, `nombre`, `email`, `usuario`, `password`, `fk_rol_idrol`) VALUES ('12345', 'Administrador', 'admin@admin.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '1');