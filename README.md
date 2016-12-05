# mouqu-weilai
谋趣后台管理
 相关数据库表结构如下，
 /*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mouqu

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-12-05 16:52:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` tinytext NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL,
  `login_log` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for chart
-- ----------------------------
DROP TABLE IF EXISTS `chart`;
CREATE TABLE `chart` (
  `sender` int(11) NOT NULL,
  `geter` int(11) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for check_info
-- ----------------------------
DROP TABLE IF EXISTS `check_info`;
CREATE TABLE `check_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(100) NOT NULL COMMENT '姓名',
  `sex` enum('男','女') NOT NULL COMMENT '性别',
  `type` enum('用户','商户') NOT NULL COMMENT '用户类型',
  `id_num` bigint(34) NOT NULL COMMENT '身份证号',
  `pic_id1` varchar(200) NOT NULL COMMENT '身份证照片（正）',
  `pic_id2` varchar(200) NOT NULL COMMENT '身份证照片（反）',
  `business` varchar(200) NOT NULL COMMENT '营业执照',
  `other` text NOT NULL COMMENT '其他',
  `status` enum('未审核','审核通过','审核未通过') NOT NULL COMMENT '审核状态',
  `remarks` text NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `orderid` varchar(50) NOT NULL COMMENT '订单号',
  `ad_id` int(11) NOT NULL COMMENT '用户id',
  `tag` varchar(50) NOT NULL COMMENT '服务分类',
  `content` tinytext NOT NULL COMMENT '订单内容',
  `price` int(11) NOT NULL COMMENT '单价',
  `num` int(11) NOT NULL COMMENT '数量',
  `mobile` int(11) NOT NULL COMMENT '手机',
  `sername` varchar(50) NOT NULL COMMENT '服务对象',
  `address` varchar(100) NOT NULL COMMENT '地址',
  `paystyle` varchar(50) NOT NULL COMMENT '支付方式',
  `paystatus` enum('0','1') NOT NULL COMMENT '支付状态',
  `servicestatus` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '服务状态',
  `orderstatus` enum('未发布','已发布') NOT NULL,
  `serverid` int(11) NOT NULL COMMENT '服务商id',
  `stars` enum('1','2','3','4','5','0') DEFAULT NULL COMMENT '评星',
  `assess` text NOT NULL COMMENT '评价',
  `create` datetime NOT NULL COMMENT '订单生成时间',
  `created` datetime NOT NULL COMMENT '订单完成时间',
  `manage` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `servicestatus` (`servicestatus`)
) ENGINE=InnoDB AUTO_INCREMENT=10000012 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `service` text NOT NULL,
  `version` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `type` enum('用户','商户') NOT NULL,
  `sex` enum('男','女','保密') NOT NULL,
  `age` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `info` tinytext NOT NULL,
  `advice` text NOT NULL,
  `complaint` text NOT NULL,
  `created` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


#########
#######################还有一些小细节有待完善
