/*
 Navicat Premium Data Transfer

 Source Server         : Localhost mysql
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : ps_userdata

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 08/05/2021 12:47:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users_detail
-- ----------------------------
DROP TABLE IF EXISTS `users_detail`;
CREATE TABLE `users_detail`  (
  `UserID` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserUID` int(11) NOT NULL,
  `UserName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SocialNo1` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `SocialNo2` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `PwQuestion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PwAnswer` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PostNo` char(7) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Addr1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Addr2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Phone1` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Phone2` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Phone3` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Mobile1` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Mobile2` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Mobile3` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NewsLetter` tinyint(4) NOT NULL,
  `Sms` tinyint(4) NOT NULL,
  `AdultAuth` tinyint(4) NOT NULL,
  `AdultAuthDate` datetime(0) NULL DEFAULT NULL,
  `EmailAuth` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EmailAuthKey` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Job` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `JobNo` tinyint(4) NULL DEFAULT NULL,
  `LocalNo` tinyint(4) NULL DEFAULT NULL,
  `PwQuNo` tinyint(4) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_detail
-- ----------------------------
INSERT INTO `users_detail` VALUES ('aaaaaa', 2, 'aaaaaa', NULL, NULL, '', NULL, 'ledinhloi1997@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('bbbbbb', 3, 'bbbbbb', NULL, NULL, '', NULL, 'aaaaaa@aaaaaa.bbbbbb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('cccccc', 4, 'cccccc', NULL, NULL, '', NULL, 'cccccc@cccccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('dddddd', 5, 'dddddd', NULL, NULL, '', NULL, 'dddddd@dddddd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('eeeeee', 6, 'eeeeee', NULL, NULL, '', NULL, 'dddddd@eeeeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('ffffff', 7, 'ffffff', NULL, NULL, '', NULL, 'ffffff@ffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('tttttt', 8, 'tttttt', NULL, NULL, '', NULL, 'ffffff@tttttt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('leviet', 11, 'leviet', NULL, NULL, '', NULL, 'ledinhloi19978@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('Antonio_Deen', 12, 'Antonio Deen', NULL, NULL, '', NULL, 'ledinhloi19297@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('rrrrrrr', 9, 'rrrrrrr', NULL, NULL, '', NULL, 'rrrrrrr@rrrrrrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('yyyyyy', 10, 'yyyyyy', NULL, NULL, '', NULL, 'yyyyyy@yyyyyy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('aaaaaaaaa', 13, 'aaaaaaaaa', NULL, NULL, '', NULL, 'aaaaaaaaa@aaaaaaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users_detail` VALUES ('loiloiloi', 14, 'loiloiloi', NULL, NULL, '', NULL, 'loiloiloi@loiloiloi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, '0', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users_master
-- ----------------------------
DROP TABLE IF EXISTS `users_master`;
CREATE TABLE `users_master`  (
  `RowID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `UserID` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Pw` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `JoinDate` datetime(0) NOT NULL,
  `Admin` tinyint(4) NOT NULL,
  `AdminLevel` tinyint(4) NOT NULL,
  `UseQueue` tinyint(4) NOT NULL,
  `Status` smallint(6) NOT NULL,
  `Leave` tinyint(4) NOT NULL,
  `LeaveDate` datetime(0) NULL DEFAULT NULL,
  `UserType` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserIp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ModiIp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ModiDate` datetime(0) NULL DEFAULT NULL,
  `Point` int(11) NOT NULL,
  `Enpassword` char(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Birth` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`RowID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1016 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_master
-- ----------------------------
INSERT INTO `users_master` VALUES (11, 1, 'admin', 'admin123', '2021-05-04 15:41:00', 1, 127, 0, 16, 0, '2031-05-04 15:41:00', 'A', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (13, 2, 'aaaaaa', '123456899', '2021-05-05 18:30:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (14, 3, 'bbbbbb', 'bbbbbb', '2021-05-05 18:33:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (15, 4, 'cccccc', 'cccccc', '2021-05-05 18:33:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (16, 5, 'dddddd', 'dddddd', '2021-05-05 18:36:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (17, 6, 'eeeeee', 'eeeeee', '2021-05-05 18:37:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (18, 7, 'ffffff', 'ffffff', '2021-05-05 18:38:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (19, 8, 'tttttt', 'tttttt', '2021-05-05 18:39:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (20, 9, 'rrrrrrr', 'rrrrrrr', '2021-05-05 18:40:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (21, 10, 'yyyyyy', 'yyyyyy', '2021-05-05 18:46:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (1012, 11, 'leviet', '12345689', '2021-05-06 13:13:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (1013, 12, 'Antonio_Deen', '12345689', '2021-05-06 13:38:00', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (1014, 13, 'aaaaaaaaa', 'aaaaaaaaa', '2021-05-07 02:56:40', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO `users_master` VALUES (1015, 14, 'loiloiloi', 'loiloiloi', '2021-05-07 08:42:30', 0, 0, 0, 16, 0, NULL, 'U', NULL, NULL, NULL, 0, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
