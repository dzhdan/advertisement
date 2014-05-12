/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 50534
Source Host           : localhost:3306
Source Database       : advert

Target Server Type    : MYSQL
Target Server Version : 50534
File Encoding         : 65001

Date: 2014-05-12 14:16:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `advert`
-- ----------------------------
DROP TABLE IF EXISTS `advert`;
CREATE TABLE `advert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `image_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `pub_status` int(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  `up_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `edited` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`category_id`),
  CONSTRAINT `id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of advert
-- ----------------------------
INSERT INTO `advert` VALUES ('1', '2', '2014-01-30 13:54:59', 'Продам машинуdd', 'Продам машину в хорошем состоянии. Т-34/88 1944 года выпуска                        ', 'efvw', '5', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('2', '2', '2014-01-03 15:32:34', 'Куплю котаrr', 'Куплю кота суку всем привет  как дела?онг', null, '2', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('3', '3', '2014-01-10 23:31:46', 'Куплю рыжего кота', 'Куплю рыжего кота', null, '2', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('4', '3', '2014-01-10 23:31:42', 'Куплю квартиру в вашем районе', 'Куплю квартиру в вашем районе', null, '2', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('37', '2', '2014-02-08 23:43:18', 'eee', 'eee', null, '4', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('38', '2', '2014-02-09 01:19:09', 'hnik', 'un,u;n', null, '3', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('40', '1', '2014-02-09 14:20:32', 'Ремонт и отделка стен и  потолков', 'Выполним ремонт дорого,\r\n  медленно и некачественно\r\nтел 45 85 69', null, '3', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('41', '2', '2014-02-09 20:01:15', 'refreb', 'rtbrb', null, '1', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('42', '1', '2014-02-09 20:01:24', 'rvtv', '5tv5v5t', null, '3', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('43', '1', '2014-02-10 01:42:27', 'ghbjffewefevewr', 'tyghujnimcev', null, '2', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('134', '2', null, 'gb gt ', 'gb gtb gtb ', null, '4', '1', '1', null, null, '1');
INSERT INTO `advert` VALUES ('135', '1', '2014-02-17 00:36:20', 'rrfrcf', 'rffrfcr', null, '1', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('136', '1', '2014-02-17 00:40:44', 'xtxxgl', 'xgtgtvltrev45', null, '4', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('137', '1', '2014-02-18 00:50:30', 'egec22278trb', '4444ecfeef22', null, '2', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('138', '1', '2014-03-01 17:06:35', 'ffgnh22rv', 'dfgdfg22rv', null, '3', '0', '0', null, null, '0');
INSERT INTO `advert` VALUES ('139', '1', '2014-03-01 17:07:05', 'r222btgb34', 'dfgdsfwerfwerfvvrer22243g5\r\n4g545g', null, '2', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('140', '1', '2014-03-01 17:07:15', 'dgdg', 'gdfgdf', null, '2', '0', '1', null, null, null);
INSERT INTO `advert` VALUES ('141', '3', '2014-03-01 22:03:05', 'Куплю борщ или пневмат', 'Куплю тарелочку вкусного  домашнего борща.', null, '2', '0', '1', null, null, null);
INSERT INTO `advert` VALUES ('142', '1', '2014-03-03 00:13:18', 'dddd', 'ddddddd 22ghj\r\n22    33\r\n33', null, '1', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('143', '1', '2014-03-03 00:57:37', 'ПРивет как дела', 'Привет.\r\nКак дела?', null, '1', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('144', '1', '2014-03-03 01:02:29', 'rrr', 'rrr\r\nrrr\r\nrrr', null, '1', '0', '1', null, null, null);
INSERT INTO `advert` VALUES ('145', '1', '2014-03-03 02:31:38', 'КУплю картоху', 'КУплю картоху и гречу с сосисой)', null, '5', '0', '1', null, null, '0');
INSERT INTO `advert` VALUES ('146', '1', '2014-03-18 23:36:44', 'dffd', 'dffvw', null, '1', '0', '1', null, null, null);
INSERT INTO `advert` VALUES ('147', '1', '2014-03-22 18:44:38', 'gtv', 'tgv', null, '2', '0', '1', null, null, null);
INSERT INTO `advert` VALUES ('148', '1', '2014-04-05 13:59:58', 'rrff', 'cfgh', null, '2', '1', '1', null, null, null);
INSERT INTO `advert` VALUES ('149', '1', '2014-04-05 17:15:20', 'xrfxrf', 'frxvrfv', null, '2', '0', '0', null, null, null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `ru_title` varchar(255) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'buy', 'Продам', '0');
INSERT INTO `category` VALUES ('2', 'sale', 'Куплю', '0');
INSERT INTO `category` VALUES ('3', 'services', 'Услуги', '0');
INSERT INTO `category` VALUES ('4', 'job', 'Работа', '0');
INSERT INTO `category` VALUES ('5', 'rent', 'Аренда', '0');
INSERT INTO `category` VALUES ('7', 'other', 'Разное', '0');
INSERT INTO `category` VALUES ('8', 'DX', 'RFC', '0');

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of session
-- ----------------------------
INSERT INTO `session` VALUES ('6m10eehvgrci6eqfeloanuc8j4', '1397918744', 0x63363331343666336465643131386563313939643133393839386230616661635F5F72657475726E55726C7C733A31343A222F61646D696E6973747261746F72223B63363331343666336465643131386563313939643133393839386230616661635F5F69647C733A363A22647A6864616E223B63363331343666336465643131386563313939643133393839386230616661635F5F6E616D657C733A363A22647A6864616E223B6336333134366633646564313138656331393964313339383938623061666163757365725F69647C733A313A2231223B6336333134366633646564313138656331393964313339383938623061666163656D61696C7C733A31383A2273656B726574343740676D61696C2E636F6D223B633633313436663364656431313865633139396431333938393862306166616364656C657465647C733A313A2230223B6336333134366633646564313138656331393964313339383938623061666163726F6C657C733A31333A2261646D696E6973747261746F72223B63363331343666336465643131386563313939643133393839386230616661635F5F7374617465737C613A343A7B733A373A22757365725F6964223B623A313B733A353A22656D61696C223B623A313B733A373A2264656C65746564223B623A313B733A343A22726F6C65223B623A313B7D5969692E4343617074636861416374696F6E2E66313433353033302E757365722E636170746368617C733A363A22726573717071223B5969692E4343617074636861416374696F6E2E66313433353033302E757365722E63617074636861636F756E747C693A323B746573747C693A313B);

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `last_activity` int(10) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  `activation_status` int(1) DEFAULT NULL,
  `activation_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'dzhdan', 'sekret47@gmail.com', '111', 'administrator', '1398614986', '0', null, null);
INSERT INTO `users` VALUES ('2', 'user', 'use@user.com', 'user', 'user', '1398104980', '0', null, null);
INSERT INTO `users` VALUES ('3', 'user2', 'user2@mail.com', 'user2', 'user', null, '0', null, null);
INSERT INTO `users` VALUES ('4', 'e', 'e', 'e', null, null, null, null, null);
INSERT INTO `users` VALUES ('5', 'e', 'e', 'e', null, null, null, null, null);
INSERT INTO `users` VALUES ('6', 'r', 'r', 'r', 'user', null, null, '0', null);
INSERT INTO `users` VALUES ('7', 's', 's', 's', 'user', null, null, '0', 'dc0c8dd02852c9bd2f76c07a4778b958f6f77f5f');
INSERT INTO `users` VALUES ('8', 'd', 'd', 'd', 'user', null, null, '0', '5b1f3c56c4e1184edeb7154a8c2f81b6b57fe92f');
INSERT INTO `users` VALUES ('9', 'dd', 'dd', 'dd', 'user', null, null, '0', '1df595358bfd035444061746b1e6e04ba91f729b');
INSERT INTO `users` VALUES ('35', 'dd', 'eqrfq@mailforspam.com', 'ww', 'user', null, null, '0', 'd76075b8d4de2bf2a35b435bb5f3eb1c98f3a981');
INSERT INTO `users` VALUES ('37', 'activationCode', 'eqrfq@mailforspam.com', 'eqrfq@mailforspam.com', 'user', null, null, '0', 'b5e0d5b28f21035a259061f262e302b614565ff1');
INSERT INTO `users` VALUES ('38', 'eqrfq@mailforspam.com', 'eqrfq@mailforspam.com', 'eqrfq@mailforspam.com', 'user', null, null, '0', 'b2c9d9246c648ef79792cd503b762ba4ce12fba2');
INSERT INTO `users` VALUES ('39', 's', 'sekret47@gmail.com', 's', 'user', null, null, '0', '374a2b8f615045d218dc814e9e7ff179f4e0b70d');
INSERT INTO `users` VALUES ('41', 'ew', 'yyy@mailforspam.com', 'rrr', 'user', null, null, '0', 'ae46503190c7475219f4f4153dafc1e6b74a9bc5');
INSERT INTO `users` VALUES ('42', '45x4x@mailforspam.com', '45x4x@mailforspam.com', '45x4x@mailforspam.com', 'user', null, null, '0', '162eb4dea79bbb2b601990d4d8bd10d635668b2d');
INSERT INTO `users` VALUES ('43', 'sad', 'sad', 'd', 'user', null, null, '0', '7eb8eab508ad1fd32b61f687b779081ddf117c79');
INSERT INTO `users` VALUES ('44', 'e', 'sekret47@gmail.com', 's', 'user', null, null, '0', '6b94f459241f1ba899ef3bc3dcb8ba3c9454f696');

-- ----------------------------
-- Table structure for `yiisession`
-- ----------------------------
DROP TABLE IF EXISTS `yiisession`;
CREATE TABLE `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text,
  `user_id` int(10) unsigned DEFAULT NULL,
  `last_activity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yiisession
-- ----------------------------
INSERT INTO `yiisession` VALUES ('3qf9hp3ok9e9b20tt2ccpa69b3', '1399886555', 'Yii.CCaptchaAction.f1435030.user.captcha|s:6:\"kymujd\";Yii.CCaptchaAction.f1435030.user.captchacount|i:3;', null, null);
