/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : backstage

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-11-15 21:16:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1',
  `status` int(2) NOT NULL DEFAULT '1',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `login_time` int(11) DEFAULT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(2) NOT NULL DEFAULT '0',
  `tel` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@qq.com', '1', '1', '1541503286', '1542279862', null, '1542279862', '11', '1', '12312341234');
INSERT INTO `user` VALUES ('2', 'lrm', 'a02cc9a3fc5def5275b5ca22f0d8f414', 'lrm@qq.com', '0', '1', '1541503286', '1542279859', null, '1542199787', '3', '1', '1564515946');
INSERT INTO `user` VALUES ('3', 'us1', '10ed1697617fe7758b4236d5b791286c', 'us1@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '1148564');
INSERT INTO `user` VALUES ('4', 'us2', 'e10adc3949ba59abbe56e057f20f883e', 'us2@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '254848');
INSERT INTO `user` VALUES ('5', 'us3', 'e10adc3949ba59abbe56e057f20f883e', 'us3@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '1545');
INSERT INTO `user` VALUES ('6', 'us4', 'c56d0e9a7ccec67b4ea131655038d604', 'us4@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '878545');
INSERT INTO `user` VALUES ('7', 'us5', 'e10adc3949ba59abbe56e057f20f883e', 'us5@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '85521');
INSERT INTO `user` VALUES ('8', 'us6', 'e10adc3949ba59abbe56e057f20f883e', 'us6@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '2544');
INSERT INTO `user` VALUES ('9', 'us9', 'e10adc3949ba59abbe56e057f20f883e', 'us9@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '85521');
INSERT INTO `user` VALUES ('10', 'us10', 'e10adc3949ba59abbe56e057f20f883e', 'us10@qq.com', '0', '1', '1541503286', '1542279859', null, '1541775148', '1', '1', '2544');
INSERT INTO `user` VALUES ('21', 'qqq', '73b0102fc76d96b393d649033498b5ca', 'dada@qq.com', '0', '1', '1542287512', '1542287512', null, null, '0', '1', null);
INSERT INTO `user` VALUES ('20', 'qqqq', 'e10adc3949ba59abbe56e057f20f883e', 'th@qq.com', '0', '1', '1542287407', '1542287407', null, null, '0', '1', null);
