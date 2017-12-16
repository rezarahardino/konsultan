/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : konsultan

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-16 23:00:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(30) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'Kangker');
INSERT INTO `categories` VALUES ('2', 'Jantung');
INSERT INTO `categories` VALUES ('3', 'Diabetes');

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_live_chat` int(11) DEFAULT NULL,
  `chat` text,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chat
-- ----------------------------

-- ----------------------------
-- Table structure for chatnew
-- ----------------------------
DROP TABLE IF EXISTS `chatnew`;
CREATE TABLE `chatnew` (
  `conversationId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`conversationId`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chatnew
-- ----------------------------
INSERT INTO `chatnew` VALUES ('123', '12334', 'aaaa', '2017-12-16 16:25:23');
INSERT INTO `chatnew` VALUES ('124', '12334', 'afafaf', '2017-12-16 16:27:38');
INSERT INTO `chatnew` VALUES ('125', '12334', 'hfghdhd', '2017-12-16 16:27:41');

-- ----------------------------
-- Table structure for live_chat
-- ----------------------------
DROP TABLE IF EXISTS `live_chat`;
CREATE TABLE `live_chat` (
  `id_live_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `is_consult` int(3) DEFAULT '0' COMMENT '1 = online, 0 = offline',
  PRIMARY KEY (`id_live_chat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of live_chat
-- ----------------------------
INSERT INTO `live_chat` VALUES ('3', '3', '4', '1');
INSERT INTO `live_chat` VALUES ('4', '4', '3', '1');
INSERT INTO `live_chat` VALUES ('5', '0', '4', '1');
INSERT INTO `live_chat` VALUES ('6', '0', '4', '1');
INSERT INTO `live_chat` VALUES ('7', '0', '4', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '3' COMMENT '1 = admin, 2 = doctor, 3 = user',
  `is_online` int(3) DEFAULT '0' COMMENT '1 = online, 0 = offline',
  `id_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'L', '085220277881', 'Bandung', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1', '0', null);
INSERT INTO `users` VALUES ('3', 'Eka Mulyana', 'L', '085220277881', 'Jakarta', 'Eka', 'eka@gmail.com', '79ee82b17dfb837b1be94a6827fa395a', '3', '1', null);
INSERT INTO `users` VALUES ('4', 'dr. Anggun Lestari', 'P', '085220277884', 'Jakarta', 'anggun', 'anggun@gmail.com', '22c037a5577d20d5250ff67dfec1d502', '2', '1', '3');
INSERT INTO `users` VALUES ('8', 'dr. Suherman', 'L', '085220277883', 'Katapang', '', '', '', '2', '0', '1');
INSERT INTO `users` VALUES ('10', 'dr. Rani', 'P', '086532811997', 'Bandung', '', '', '', '2', '0', '2');
INSERT INTO `users` VALUES ('11', 'dr. Asep', 'L', '086332188662', 'Jakarta', '', '', '', '2', '0', '1');
