/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : gm_fuel

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2014-06-06 11:22:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `previous_login` varchar(25) NOT NULL DEFAULT '0',
  `login_hash` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `profile_type` varchar(25) DEFAULT '0' COMMENT 'ventures; experts; investors',
  `confirmation_hash` varchar(255) DEFAULT NULL,
  `confirmation_created` int(11) DEFAULT NULL,
  `forgotpassword_hash` varchar(255) DEFAULT NULL,
  `forgotpassword_created` int(11) DEFAULT NULL,
  `resetpassword_hash` varchar(255) DEFAULT NULL,
  `resetpassword_created` int(11) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT '0' COMMENT '0-validating, 1-confirmed',
  `newsletter` tinyint(1) DEFAULT '1',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=MyISAM AUTO_INCREMENT=1377 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'mgabrielro', '12345', '3', 'mgabrielro@gmail.com', '1389791200', '1389168735', 'd05c26d0045f138b4357ef6b07c23b4e7c16f144', '1', '', '', '0', '', '0', '', '0', '1', '1', '1387383585', '1389791200');
