/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50720
Source Host           : localhost:3306
Source Database       : airline

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-06-12 17:36:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for airlines
-- ----------------------------
DROP TABLE IF EXISTS `airlines`;
CREATE TABLE `airlines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of airlines
-- ----------------------------
INSERT INTO `airlines` VALUES ('1', 'Avianca');
INSERT INTO `airlines` VALUES ('2', 'Peruvian');

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', 'banner', '123456', 'Banner Gonzales', 'Av Nicolas');

-- ----------------------------
-- Table structure for cli_des
-- ----------------------------
DROP TABLE IF EXISTS `cli_des`;
CREATE TABLE `cli_des` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cli` int(11) NOT NULL,
  `id_des` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cli` (`id_cli`),
  KEY `fk_des` (`id_des`),
  CONSTRAINT `fk_cli` FOREIGN KEY (`id_cli`) REFERENCES `clients` (`id`),
  CONSTRAINT `fk_des` FOREIGN KEY (`id_des`) REFERENCES `destination` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cli_des
-- ----------------------------
INSERT INTO `cli_des` VALUES ('1', '1', '3', '2018-06-12 17:34:02');
INSERT INTO `cli_des` VALUES ('6', '1', '1', '2018-06-12 17:35:18');

-- ----------------------------
-- Table structure for destination
-- ----------------------------
DROP TABLE IF EXISTS `destination`;
CREATE TABLE `destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `idtipo` int(11) NOT NULL,
  `idairline` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo` (`idtipo`),
  KEY `fk_airline` (`idairline`),
  CONSTRAINT `fk_airline` FOREIGN KEY (`idairline`) REFERENCES `airlines` (`id`),
  CONSTRAINT `fk_tipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of destination
-- ----------------------------
INSERT INTO `destination` VALUES ('1', 'Dubai', '2018-06-21', '20.00', '1', '1', 'image');
INSERT INTO `destination` VALUES ('2', 'Mancura', '2018-06-13', '20.00', '2', '1', 'image');
INSERT INTO `destination` VALUES ('3', 'Peru', '2018-06-14', '40.00', '2', '2', 'image');

-- ----------------------------
-- Table structure for tipo
-- ----------------------------
DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tipo
-- ----------------------------
INSERT INTO `tipo` VALUES ('1', 'Ida y Vuelta');
INSERT INTO `tipo` VALUES ('2', 'Ida');
