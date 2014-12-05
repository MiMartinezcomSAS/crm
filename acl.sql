/*
Navicat MySQL Data Transfer

Source Server         : localhost_33061
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : acl

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2014-10-30 18:09:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cargos`
-- ----------------------------
DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cargos
-- ----------------------------
INSERT INTO `cargos` VALUES ('1', 'gerente', null, null);
INSERT INTO `cargos` VALUES ('2', 'secretaria', null, null);
INSERT INTO `cargos` VALUES ('3', 'chismoso', '2014-09-05 22:10:25', '2014-09-05 22:10:25');
INSERT INTO `cargos` VALUES ('4', 'vendedor', '2014-09-05 22:10:40', '2014-09-05 22:10:40');
INSERT INTO `cargos` VALUES ('5', 'nose', '2014-09-05 22:13:56', '2014-09-05 22:13:56');
INSERT INTO `cargos` VALUES ('6', 'mercader', '2014-09-05 22:14:19', '2014-09-05 22:14:19');
INSERT INTO `cargos` VALUES ('7', 'violinista', '2014-09-05 22:17:07', '2014-09-05 22:17:07');
INSERT INTO `cargos` VALUES ('8', 'ni idea', '2014-09-05 22:18:44', '2014-09-05 22:18:44');
INSERT INTO `cargos` VALUES ('9', 'barrendero XD', '2014-09-05 23:17:06', '2014-09-05 23:17:06');
INSERT INTO `cargos` VALUES ('10', 'cargo nuevo', '2014-09-08 16:24:58', '2014-09-08 16:24:58');
INSERT INTO `cargos` VALUES ('11', 'celadorrrrreeee', '2014-09-08 16:28:05', '2014-09-08 16:28:05');
INSERT INTO `cargos` VALUES ('12', 'hola', '2014-09-08 16:28:11', '2014-09-08 16:28:11');
INSERT INTO `cargos` VALUES ('13', 'jlfajdñ', '2014-10-30 15:54:42', '2014-10-30 15:54:42');

-- ----------------------------
-- Table structure for `empresas`
-- ----------------------------
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `nit` bigint(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tel` bigint(255) DEFAULT NULL,
  `ext` bigint(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `correo2` varchar(255) DEFAULT NULL,
  `movil` bigint(255) DEFAULT NULL,
  `propietario_cliente` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `pag_web` varchar(255) DEFAULT NULL,
  `fax` bigint(255) DEFAULT NULL,
  `fuente` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `maps` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `fecha_expedicion` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empresas
-- ----------------------------
INSERT INTO `empresas` VALUES ('3', '12345', '4', '123', '123', '123', '123', '22@gmail.com', '', '123', '@sacha', 'perfil.png', '123', '456', '456', '456', '45', '66456', '456', '2014-10-24', '2014-10-17', '2014-09-05 20:44:37', '2014-10-30 17:16:11', '1');
INSERT INTO `empresas` VALUES ('4', 'fda', '3', '123', '123', '123', '123', '3@gmail.com', '3@gmail.com', '123', '@guardian', 'perfil.png', '123', '456', '456', '456', '45', '66456', '456', '0000-00-00', '0000-00-00', '2014-09-05 20:45:21', '2014-10-26 03:39:39', '1');
INSERT INTO `empresas` VALUES ('5', 'fda', '2', '123', '123', '123', '123', '4@gmail.com', '4@gmail.com', '123', '@oreo', 'perfil.png', '123', '456', '456', '456', '45', '66456', '456', '0000-00-00', '0000-00-00', '2014-09-05 20:45:55', '2014-10-26 03:39:52', '1');
INSERT INTO `empresas` VALUES ('6', 'fda', '2', '123', '123', '123', '123', '5@gmail.com', '5@gmail.com', '123', '@dragof', '01-02.jpg', '123', '456', '456', '456', '45', '66456', '456', '0000-00-00', '2014-10-19', '2014-09-05 20:46:04', '2014-10-28 22:10:31', '1');
INSERT INTO `empresas` VALUES ('7', 'dfas', '1', '123', '123', '123', '123', '6@gmail.com', '6@gmail.com', '123', '@oreo', '1414727565_apple.png', 'afsd', '123', '123', '123', '123', '123', '123', '0000-00-00', '0000-00-00', '2014-09-05 20:47:04', '2014-10-30 23:06:53', '1');
INSERT INTO `empresas` VALUES ('9', 'mimartinez', '1', '123456', '123', '123', '456', '7@gmail.com', '7@gmail.com', '456', '@guardian', 'perfil.png', 'fdas', '123', '123', '123', '123', '123', '123', '0000-00-00', '0000-00-00', '2014-09-05 22:18:29', '2014-10-26 03:40:40', '1');
INSERT INTO `empresas` VALUES ('12', 'nose', '1', '1', '1', '1', '1', '1@gmail.com', '1@gmail.com', '1', '@dragof', '1414727565_apple.png', '123', '1', '1', '1', '1', '1', '1', '0000-00-00', '0000-00-00', '2014-10-02 17:15:33', '2014-10-30 23:07:53', '1');
INSERT INTO `empresas` VALUES ('13', '777', '3', '777', '777', '777', '777', '777@gmail.com', '777@gmail.com', '777', '@lorena', '01-02.jpg', '777 ', '777', '777', '777', '777', '777', '777', '0000-00-00', '0000-00-00', '2014-10-22 18:57:41', '2014-10-26 03:40:19', '1');
INSERT INTO `empresas` VALUES ('14', 'fecha', '3', '45641', '1456156', '1561651', '56165165', 'fecha@gmail.com', 'fecha@gmail.com', '121561', '@dragof', 'Login-acotado.jpg', '4564156', '156156', '156156', '156156', '156156', '156156', '156165', '0000-00-00', '2014-10-10', '2014-10-28 19:59:06', '2014-10-28 22:06:49', '1');
INSERT INTO `empresas` VALUES ('15', '12123', '1', '123123', '1231', '231', '231', '231@gmail.com', '', '15156', '@guardian', 'email_UI.png', '441561', '156165', '1561', '561', '56', '156', '165', '2014-10-24', '2014-10-22', '2014-10-29 20:32:56', '2014-10-29 20:32:56', '1');
INSERT INTO `empresas` VALUES ('16', '1224445', '1', '0', '', '0', '0', '456456456@gmail.com', '', '355356', '@camacho', null, '', '0', '', '', '', '', '', '2014-10-17', '2014-10-02', '2014-10-30 15:36:12', '2014-10-30 15:36:12', '1');
INSERT INTO `empresas` VALUES ('17', 'jejejej', '1', '0', '', '0', '0', 'jejejej@gmail.com', '', '14564156', '@lorena', 'perfil.png', '', '0', '', '', '', '', '', '2014-01-01', '2015-01-01', '2014-10-30 15:37:38', '2014-10-30 15:37:38', '1');
INSERT INTO `empresas` VALUES ('18', '15615645787897', '1', '0', '', '0', '0', '4564568789789@gmail.com', '', '497987', '@dragof', 'perfil.png', '', '0', '', '', '', '', '', '2014-10-26', '2014-10-18', '2014-10-30 16:50:55', '2014-10-30 16:50:55', '1');

-- ----------------------------
-- Table structure for `especiales`
-- ----------------------------
DROP TABLE IF EXISTS `especiales`;
CREATE TABLE `especiales` (
  `espe_id` int(11) NOT NULL AUTO_INCREMENT,
  `crud` int(10) DEFAULT NULL,
  `nocrud` int(10) DEFAULT NULL,
  `ver` int(10) DEFAULT NULL,
  `nover` int(10) DEFAULT NULL,
  `crear` int(10) DEFAULT NULL,
  `nocrear` int(10) DEFAULT NULL,
  `editar` int(10) DEFAULT NULL,
  `noeditar` int(10) DEFAULT NULL,
  `eliminar` int(10) DEFAULT NULL,
  `noeliminar` int(10) DEFAULT NULL,
  PRIMARY KEY (`espe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of especiales
-- ----------------------------

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `crud` int(10) DEFAULT NULL,
  `ver` int(10) DEFAULT NULL,
  `editar` int(10) DEFAULT NULL,
  `crear` int(10) DEFAULT NULL,
  `eliminar` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rol` (`role_id`),
  CONSTRAINT `rol` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of permisos
-- ----------------------------

-- ----------------------------
-- Table structure for `personas`
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `id_cargo` int(255) DEFAULT NULL,
  `tel` bigint(255) DEFAULT NULL,
  `movil` bigint(255) DEFAULT NULL,
  `empresa` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cargos` (`id_cargo`),
  KEY `empresas` (`empresa`),
  CONSTRAINT `cargos` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES ('1', '123456', '123456', '7', '123', '123', '1', '2014-09-05 21:32:27', '2014-09-05 21:32:27', '1965531_267921296737834_9185022172201838124_o.jpg', '1@gmail.com');
INSERT INTO `personas` VALUES ('2', '123', '123', null, '123', '123', '2', '2014-09-05 21:33:33', '2014-09-05 21:33:33', '1965531_267921296737834_9185022172201838124_o.jpg', '2@gmail.com');
INSERT INTO `personas` VALUES ('3', '123', '123', '1', '123', '123', 'nose', '2014-09-05 21:34:01', '2014-10-30 22:51:03', 'perfil.png', '3@gmail.com');
INSERT INTO `personas` VALUES ('4', '123', '123', null, '123', '123', '1', '2014-09-05 21:44:52', '2014-09-05 21:44:52', 'Captura de pantalla - 020914 - 11:54:11.png', '4@gmail.com');
INSERT INTO `personas` VALUES ('6', '123', '123', '1', '123', '123', 'dfas', '2014-09-05 21:48:56', '2014-10-30 23:07:17', '1414727565_apple.png', '5@gmail.com');
INSERT INTO `personas` VALUES ('7', '123123', '123', '2', '123456', '123', 'fdas', '2014-09-05 21:57:24', '2014-09-05 21:57:24', 'Captura de pantalla - 020914 - 11:53:30.png', '6@gmail.com');
INSERT INTO `personas` VALUES ('8', 'edward', 'diaz', '1', '123', '123', 'dfas', '2014-09-05 22:17:34', '2014-10-30 23:07:41', '1414727565_apple.png', '7@gmail.com');
INSERT INTO `personas` VALUES ('9', '123456', '123123', '1', '123456', '123456', 'mimartinez', '2014-09-05 22:18:58', '2014-09-05 22:18:58', '1965531_267921296737834_9185022172201838124_o.jpg', '8@gmail.com');
INSERT INTO `personas` VALUES ('10', 'drawde', 'diaz', '1', '5156', '161', '15615645787', '2014-10-21 14:39:10', '2014-10-30 20:35:18', '2014-09-23 15.32.03.jpg', '9@gmail.com');
INSERT INTO `personas` VALUES ('11', '777', '777', '4', '777', '777', '777', '2014-10-22 18:58:12', '2014-10-30 22:51:21', 'perfil.png', '10@gmail.com');
INSERT INTO `personas` VALUES ('12', '894894981', '189198', '12', '415156', '156156', '1126', '2014-10-22 19:21:25', '2014-10-22 19:21:25', '1345.jpg', '11@gmail.com');
INSERT INTO `personas` VALUES ('13', 'noseeee', 'dsafjkl', '4', '5556', '156156', 'jlfjdklsfja', '2014-10-28 17:25:30', '2014-10-28 17:25:30', '2014-09-25 11.59.43.jpg', '12@gmail.com');
INSERT INTO `personas` VALUES ('14', '12123123', '123123', '1', '123123', '123123123', 'mimartinez', '2014-10-30 15:55:20', '2014-10-30 20:34:56', '2014-09-25 11.59.25.jpg', '13@gmail.com');
INSERT INTO `personas` VALUES ('15', '1234564', '123456', '1', '0', '123', '789789789', '2014-10-30 15:56:47', '2014-10-30 20:39:21', 'Login-acotado.jpg', '14@gmail.com');
INSERT INTO `personas` VALUES ('16', 'jfkljflak', 'jklfjdlkñ', '1', '0', '1231', 'jfkldsaj', '2014-10-30 16:01:17', '2014-10-30 16:01:17', null, '15@gmail.com');
INSERT INTO `personas` VALUES ('17', '54564', '6456456', '1', '456456', '45646', '12345', '2014-10-30 16:30:20', '2014-10-30 22:55:19', '1414727565_apple.png', '16@gmail.com');
INSERT INTO `personas` VALUES ('18', 'jfdklaj', 'jkldfajs', '1', '0', '456465', '15615645787', '2014-10-30 16:31:48', '2014-10-30 20:37:24', 'perfil.png', '17@gmail.com');
INSERT INTO `personas` VALUES ('19', '44564', '456', '1', '0', '123', '123', '2014-10-30 17:32:50', '2014-10-30 17:32:50', 'perfil.png', '18@gmail.com');
INSERT INTO `personas` VALUES ('20', '111', '111', '1', '111', '111', '111', '2014-10-30 17:39:59', '2014-10-30 22:49:42', 'perfil.png', '111@gmail.com');
INSERT INTO `personas` VALUES ('21', '12345646', '1231', '1', '123123', '123', '123456', '2014-10-30 17:52:58', '2014-10-30 17:52:58', 'perfil.png', null);
INSERT INTO `personas` VALUES ('22', '777', '777', '4', '45789', '789789', '1111', '2014-10-30 20:25:22', '2014-10-30 20:25:22', 'perfil.png', null);
INSERT INTO `personas` VALUES ('23', '123456', '1231', '5', '123456', '123', 'jlfjdklsfja', '2014-10-30 21:29:30', '2014-10-30 21:29:30', 'perfil.png', null);
INSERT INTO `personas` VALUES ('24', '123456123', '1231', '1', '1231', '23123', 'dddd', '2014-10-30 21:30:09', '2014-10-30 21:30:09', 'perfil.png', null);
INSERT INTO `personas` VALUES ('25', '555', '555', '1', '555', '55', '5555', '2014-10-30 21:31:09', '2014-10-30 21:31:09', 'perfil.png', null);
INSERT INTO `personas` VALUES ('26', '444', '444', '1', '123456', '45646', '456456', '2014-10-30 21:33:46', '2014-10-30 21:35:02', 'perfil.png', '4444@gmail.com');
INSERT INTO `personas` VALUES ('27', '444', '444', '1', '123456', '45646', '456456', '2014-10-30 21:34:08', '2014-10-30 21:34:43', 'perfil.png', '444@gmail.com');
INSERT INTO `personas` VALUES ('28', '789789', '789789', '1', '789789', '789789', '1111', '2014-10-30 21:35:27', '2014-10-30 21:35:27', 'perfil.png', null);
INSERT INTO `personas` VALUES ('29', '111', '111', '1', '111', '111', 'dddd', '2014-10-30 21:36:10', '2014-10-30 21:37:30', 'perfil.png', '111@gmail.com');
INSERT INTO `personas` VALUES ('30', '123', '123', '1', '123', '123', 'jlfjdklsfja', '2014-10-30 21:38:06', '2014-10-30 21:38:06', 'perfil.png', '123@gmail.com');
INSERT INTO `personas` VALUES ('31', '123456', '12312', '1', '123456', '123456', 'jlfjdklsfja', '2014-10-30 21:38:33', '2014-10-30 21:38:33', 'perfil.png', '12312@gmail.com');
INSERT INTO `personas` VALUES ('32', '123456', '123456', '1', '123456', '12311', '111', '2014-10-30 21:38:59', '2014-10-30 22:53:15', '1414727565_apple.png', '123@gmail.com');
INSERT INTO `personas` VALUES ('33', '123', '123', '1', '23', '23', 'jlfjdklsfja', '2014-10-30 21:41:07', '2014-10-30 21:41:07', 'perfil.png', '123@gmail.com');
INSERT INTO `personas` VALUES ('34', '123', '123', '1', '23', '222', 'fda', '2014-10-30 21:42:16', '2014-10-30 21:42:16', 'perfil.png', '123@gmail.com');

-- ----------------------------
-- Table structure for `prospectos`
-- ----------------------------
DROP TABLE IF EXISTS `prospectos`;
CREATE TABLE `prospectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `nit` bigint(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tel` bigint(255) DEFAULT NULL,
  `ext` bigint(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `correo2` varchar(255) DEFAULT NULL,
  `movil` bigint(255) DEFAULT NULL,
  `propietario_cliente` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `pag_web` varchar(255) DEFAULT NULL,
  `fax` bigint(255) DEFAULT NULL,
  `fuente` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `maps` varchar(255) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `empresa` bigint(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prospectos
-- ----------------------------
INSERT INTO `prospectos` VALUES ('3', '111', '7', '787789', '1651561', '1561561', '156156', 'edward@gmail.com', 'edward@gmail.com', '156165', '@lorena', '1414727565_apple.png', '156156', '156165', '156156', '156165', '1561', '156165', '1561', '2014-10-22 19:21:07', '2014-10-30 23:06:38', '0');
INSERT INTO `prospectos` VALUES ('4', 'jlfjdklsfjakljf', '1', '12316', '1231231', '212313', '123123', 'dfadfa@gmail.com', '', '156555', '@sacha', 'email_UI.png', 'fdsa', '54156', '1651', '65156', '156', '156', '156', '2014-10-28 17:24:53', '2014-10-28 17:24:53', '0');
INSERT INTO `prospectos` VALUES ('5', 'dddd', '1', '5156', '1231', '1231', '1231', 'dddd@gmail.com', 'dddd@gmail.com', '1212', '@oreo', 'Login-acotado.jpg', '5456', '456156', '1561', '5156', '1561', '5616', '156', '2014-10-29 20:02:16', '2014-10-29 20:02:16', '0');
INSERT INTO `prospectos` VALUES ('6', '5555', '1', '555', '555', '55', '555', '555@gmail.com', '', '555', '@camacho', 'Login-acotado.jpg', '545456', '456456', '456456', '45645', '6456', '456', '45646', '2014-10-29 20:09:35', '2014-10-29 20:09:35', '0');
INSERT INTO `prospectos` VALUES ('8', '456456', '1', '4564564', '56456', '4564564', '65456', '156156@gmail.com', '', '1456156', '@camacho', 'Login-acotado.jpg', '156156', '156165156', '156156', '45645', '6456', '456', '45646', '2014-10-29 20:11:29', '2014-10-29 20:11:29', '0');
INSERT INTO `prospectos` VALUES ('10', '1561561', '1', '156156', '1561', '56156', '156', '156@gmail.com', '', '4156156', '@camacho', 'Login-acotado.jpg', '51561', '156156', '1561', '56156', '165', '165', '156', '2014-10-29 20:12:24', '2014-10-29 20:12:24', '0');
INSERT INTO `prospectos` VALUES ('12', '789789789', '1', '7897897897', '897897897', '897897897', '789789789', '789789789@gmail.com', '', '789789', '@camacho', '2014-09-25 11.59.43.jpg', '8974897', '8947894', '984894', '98498', '498', '498', '49849', '2014-10-29 20:23:16', '2014-10-29 20:23:16', '0');
INSERT INTO `prospectos` VALUES ('13', '777787', '1', '7897897897', '89789789', '7897897', '8797897', '897897987@gmail.com', '', '1231564', '@lorena', '2014-09-25 11.59.43.jpg', '1231231', '123123', '121231', '12313', '12123', '123123', '1213', '2014-10-29 20:34:50', '2014-10-29 20:34:50', '0');
INSERT INTO `prospectos` VALUES ('16', '1111', '1', '111111', '11111', '11111', '11111', '1111@gmail.com', '', '11111', '@camacho', 'email_UI.png', '111111', '11111', '11111', '11111', '11111', '11111', '11111', '2014-10-29 20:39:30', '2014-10-29 20:39:30', '0');
INSERT INTO `prospectos` VALUES ('18', '123456', '1', '123456', '123456', '123456', '123456', '123456@gmail.com', '', '123456', '@camacho', '2014-09-25 11.59.43.jpg', '123456', '123456', '123456', '123456', '123456', '123456', '123456', '2014-10-29 21:44:49', '2014-10-29 21:44:49', '0');
INSERT INTO `prospectos` VALUES ('19', '123456', '1', '123456', '123456', '123456', '123456', '10@gmail.com', '10@gmail.com', '23123', '@camacho', 'Login-acotado.jpg', '1223', '123456', '123456', '123456', '123456', '123456', '123456', '2014-10-29 21:47:05', '2014-10-29 21:53:08', '0');
INSERT INTO `prospectos` VALUES ('20', '123', '1', '123', '123', '123', '123', '123@gmail.com', '', '123', '@camacho', '2014-09-25 11.59.43.jpg', '123', '123', '123', '123', '123', '123', '123', '2014-10-29 22:35:17', '2014-10-29 22:35:17', '0');
INSERT INTO `prospectos` VALUES ('21', 'ddddddddd', '1', '0', '', '0', '0', 'dddddddddddddd@gmail.com', '', '123456456', '@camacho', 'email_UI.png', '', '0', '', '', '', '', '', '2014-10-30 15:25:45', '2014-10-30 15:25:45', '0');
INSERT INTO `prospectos` VALUES ('22', 'ddddddd', '1', '0', '', '0', '0', 'ddddddddd@gmail.com', '', '561564564', '@lorena', null, '', '0', '', '', '', '', '', '2014-10-30 15:27:38', '2014-10-30 15:27:38', '0');
INSERT INTO `prospectos` VALUES ('23', 'ddddddd', '1', '0', '', '0', '0', 'ddddddddd@gmail.com', '', '561564564', '@lorena', null, '', '0', '', '', '', '', '', '2014-10-30 15:27:56', '2014-10-30 15:27:56', '0');
INSERT INTO `prospectos` VALUES ('24', 'jfkldsaj', '1', '0', '', '0', '0', 'dsafadfa@gmail.com', '', '54156165', '@sacha', 'perfil.png', '', '0', '', '', '', '', '', '2014-10-30 15:30:33', '2014-10-30 15:30:33', '0');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_administrador');
INSERT INTO `roles` VALUES ('2', 'administrador');
INSERT INTO `roles` VALUES ('3', 'vendedor');
INSERT INTO `roles` VALUES ('4', 'auto');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `tel` int(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `encargado` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `espe_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles` (`role_id`) USING BTREE,
  KEY `especiales` (`espe_id`) USING BTREE,
  CONSTRAINT `especiales` FOREIGN KEY (`espe_id`) REFERENCES `especiales` (`espe_id`),
  CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1569123510 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'edward', 'diaz', '$2y$10$4hfnaJjUERtmZcVF4e53B.12SCy3l.4lxlvYMp2Fv3BG9uhNqJzEi', 'edward@gmail.com', '1', 'aurora', '402476_356869854324451_270414332970004_1603020_1131621054_n.jpg', 'auto', '2', null, '2014-08-21 17:15:49', '2014-10-26 04:06:18', '8dJl9aPh8yLBD46SgPdOZzAk1B4kKHTeWj5iostBI3mfkYYR1JRtkYtOR0qx', '@123');
INSERT INTO `users` VALUES ('4', 'michael', 'camacho', '$2y$10$Gg4uGcGcZCGlDPnv0S.WMu4eDyQOA0oKiOaZzmlPitwipP3ZVp7lq', 'camacho@gmail.com', '1564678', 'aurora', 'perfil.png', 'edward', '3', null, '2014-08-21 21:56:21', '2014-10-27 15:38:20', 'AJ3tcOYnHXUPzpCafVOD84fQKBEj28r2buoEXtKPmC0SXyxrq6I7LX4FLo0X', '@camacho');
INSERT INTO `users` VALUES ('1569123473', 'guardian', 'martinez', '$2y$10$Hbp6qorafo0V8LzgnE/eLe.PRfrm5TeGDuS5q49wCFJwOzhHJilXS', 'guardian@gmail.com', '48789465', 'la terraza', 'perfil.png', 'wowdrawde', '3', null, '2014-08-22 22:34:38', '2014-10-27 16:02:02', 'b42VEaA6sPCAf1duVLVoXruAJNPi0N2WNpZp6xgzgcoTThHsiR8ER6cYrAoi', '@guardian');
INSERT INTO `users` VALUES ('1569123476', 'oreo', 'martinez', '$2y$10$wIV1cCdZRfqzT72h6r69K.5zkVySjJfJ41dOxlsrp1VWi3mY2ftGO', 'oreo@gmail.com', '4564532', '123456', 'perfil.png', 'wowdrawde', '3', null, '2014-08-22 23:32:00', '2014-10-28 16:37:16', 'qNg7v2wKT8upZnzjYSiIgM1iLq4eso8z9ufTIFzysdY2AkSyJnkR5mk01ASN', '@oreo');
INSERT INTO `users` VALUES ('1569123477', 'mi-martinez', 'michael', '$2y$10$gsyd1PO.bn3czk6K1D8jGeT7hr8SRNDfjlce.W4u5ekOGgwZctqeW', 'mi-martinez@info.com', '4567897', 'fdsafa', 'edward.jpg', 'auto', '1', null, '2014-08-22 23:36:06', '2014-10-26 04:36:08', 'VX6JdRIyRx0tMlxptEpbDybAjPI1goDbOkOIKX2b77os553qyUMa4OOLXThu', '@mi-martinez');
INSERT INTO `users` VALUES ('1569123500', 'michael', 'martinez', '$2y$10$8gKYHxbZ4z9VBwL0dO7os.P1h9VkDCU.N3pWtTmgmj/MaKzfDsWta', 'michael@gmail.com', '45674897', 'calle', '1414727565_apple.png', 'auto', '1', null, '2014-09-01 21:31:11', '2014-10-30 22:54:51', 'Tda5G1TFAiQqKkS6LTQMr5k8wpkriHPgjrb0H5wndP1NiDSwOPDm41mkDMY3', '@michael');
INSERT INTO `users` VALUES ('1569123501', 'fabian', 'za', '$2y$10$Dq9AhAdYZLo44hhWhlbYI.4bGCj1IUssq8Zw6n3c797MH0MYOW10y', 'huesos@gmail.com', '456456', 'calle', 'perfil.png', 'edward', '3', null, '2014-09-01 23:04:23', '2014-10-22 01:47:09', null, '@dragof');
INSERT INTO `users` VALUES ('1569123503', 'wowdrawde', 'wowdrawde', '$2y$10$zns9fs/I.24hzQwzZX0K1evHgl2qtCaiJeLdR4iugnXrjJT0.mNRO', 'wowdrawde@gmail.com', '456789', 'calle', 'Login-logo.png', 'auto', '2', null, '2014-09-03 19:59:43', '2014-10-27 15:39:04', 'kMqS04Oyk0bSiXUdG6G3XEbTGqqiZlXF9fNMKoAPGhrzgUh9dHijipQTlbjD', '@wowdrawde');
INSERT INTO `users` VALUES ('1569123506', 'paola', 'paola', '$2y$10$s/2XgqL4Qo/CxDn7aMXzBeBOYvvA6LJYxIb6wqSFqoZLCyPr2k5s.', 'paola@gmail.com', '123456', '132fads1', 'perfil.png', 'auto', '2', null, '2014-09-05 22:23:56', '2014-09-05 22:23:56', null, '@paola');
INSERT INTO `users` VALUES ('1569123507', 'lorena', 'pinzon', '$2y$10$CH3I.ugL5/7/J5lfz/1LNuCs4KHjRY6R4wu9uaQ/Cr1HUKN5Rvcvu', 'karenlorena@gmail.com', '1234564', '1231564', 'perfil.png', 'edward', '3', null, '2014-10-26 03:32:06', '2014-10-26 04:33:12', 'DhbCibjbU27ttBctYioHDNlO5xdifZhgCmDTqkytkzBG9ay6ArlAWYJzfkFv', '@lorena');
INSERT INTO `users` VALUES ('1569123509', 'sacha', 'diaz', '$2y$10$wAZsXJDPegyg5Ysoy12kde5RAvrySFWqg0CC502uujHPiLQ9TBhMy', 'sachadiaz@gmail.com', '456465', '156156', 'perfil.png', 'wowdrawde', '3', null, '2014-10-26 04:09:41', '2014-10-26 04:09:41', null, '@sacha');
