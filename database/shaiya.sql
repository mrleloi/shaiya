/*
 Navicat Premium Data Transfer

 Source Server         : Localhost mysql
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : shaiya

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 08/05/2021 12:48:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE `admin_password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `admin_password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `media_model_type_model_id_index`(`model_type`, `model_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (1, 'App\\Models\\SettingGeneral', 1, 'url_ico', '609437a682911_default-icon-events', '609437a682911_default-icon-events.png', 'image/png', 'public', 6878, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 1, '2021-05-06 18:38:47', '2021-05-06 18:38:48');
INSERT INTO `media` VALUES (2, 'App\\Models\\SettingGeneral', 1, 'url_logo', '60943ba5cd246_shaiya_logo2', '60943ba5cd246_shaiya_logo2.png', 'image/png', 'public', 82461, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 2, '2021-05-06 18:55:36', '2021-05-06 18:55:37');
INSERT INTO `media` VALUES (3, 'App\\Models\\SettingServerInfo', 1, 'ck-media', 'default-icon-news', 'default-icon-news.png', 'image/png', 'public', 6878, '[]', '{\"generated_conversions\":{\"thumb\":true,\"preview\":true}}', '[]', 3, '2021-05-07 04:11:30', '2021-05-07 04:11:31');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_admin_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_05_06_000001_create_media_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_05_06_000002_create_setting_server_infos_table', 1);
INSERT INTO `migrations` VALUES (7, '2021_05_06_000003_create_setting_quy_dinhs_table', 1);
INSERT INTO `migrations` VALUES (8, '2021_05_06_000004_create_setting_huong_dans_table', 1);
INSERT INTO `migrations` VALUES (9, '2021_05_06_000005_create_setting_nap_thes_table', 1);
INSERT INTO `migrations` VALUES (10, '2021_05_06_000006_create_setting_downloads_table', 1);
INSERT INTO `migrations` VALUES (11, '2021_05_06_000007_create_setting_chien_tiches_table', 1);
INSERT INTO `migrations` VALUES (12, '2021_05_06_000008_create_setting_top_ranks_table', 1);
INSERT INTO `migrations` VALUES (13, '2021_05_06_000009_create_setting_generals_table', 1);
INSERT INTO `migrations` VALUES (14, '2021_05_06_000010_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (15, '2021_05_06_000011_create_post_news_table', 1);
INSERT INTO `migrations` VALUES (16, '2021_05_06_000012_create_post_events_table', 1);
INSERT INTO `migrations` VALUES (17, '2021_05_06_000014_create_roles_table', 1);
INSERT INTO `migrations` VALUES (18, '2021_05_06_000015_create_role_user_pivot_table', 1);
INSERT INTO `migrations` VALUES (19, '2021_05_06_000016_create_permission_role_pivot_table', 1);
INSERT INTO `migrations` VALUES (20, '2021_05_06_000017_add_approval_fields', 1);
INSERT INTO `migrations` VALUES (21, '2021_05_06_000003_create_setting_homes_table', 2);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role`  (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `role_id_fk_3850656`(`role_id`) USING BTREE,
  INDEX `permission_id_fk_3850656`(`permission_id`) USING BTREE,
  CONSTRAINT `permission_id_fk_3850656` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_id_fk_3850656` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES (1, 1);
INSERT INTO `permission_role` VALUES (1, 2);
INSERT INTO `permission_role` VALUES (1, 3);
INSERT INTO `permission_role` VALUES (1, 4);
INSERT INTO `permission_role` VALUES (1, 5);
INSERT INTO `permission_role` VALUES (1, 6);
INSERT INTO `permission_role` VALUES (1, 7);
INSERT INTO `permission_role` VALUES (1, 8);
INSERT INTO `permission_role` VALUES (1, 9);
INSERT INTO `permission_role` VALUES (1, 10);
INSERT INTO `permission_role` VALUES (1, 11);
INSERT INTO `permission_role` VALUES (1, 12);
INSERT INTO `permission_role` VALUES (1, 13);
INSERT INTO `permission_role` VALUES (1, 14);
INSERT INTO `permission_role` VALUES (1, 15);
INSERT INTO `permission_role` VALUES (1, 16);
INSERT INTO `permission_role` VALUES (1, 17);
INSERT INTO `permission_role` VALUES (1, 18);
INSERT INTO `permission_role` VALUES (1, 19);
INSERT INTO `permission_role` VALUES (1, 20);
INSERT INTO `permission_role` VALUES (1, 21);
INSERT INTO `permission_role` VALUES (1, 22);
INSERT INTO `permission_role` VALUES (1, 23);
INSERT INTO `permission_role` VALUES (1, 24);
INSERT INTO `permission_role` VALUES (1, 25);
INSERT INTO `permission_role` VALUES (1, 26);
INSERT INTO `permission_role` VALUES (1, 27);
INSERT INTO `permission_role` VALUES (1, 28);
INSERT INTO `permission_role` VALUES (1, 29);
INSERT INTO `permission_role` VALUES (1, 30);
INSERT INTO `permission_role` VALUES (1, 31);
INSERT INTO `permission_role` VALUES (1, 32);
INSERT INTO `permission_role` VALUES (1, 33);
INSERT INTO `permission_role` VALUES (1, 34);
INSERT INTO `permission_role` VALUES (1, 35);
INSERT INTO `permission_role` VALUES (1, 36);
INSERT INTO `permission_role` VALUES (1, 37);
INSERT INTO `permission_role` VALUES (1, 38);
INSERT INTO `permission_role` VALUES (1, 39);
INSERT INTO `permission_role` VALUES (1, 40);
INSERT INTO `permission_role` VALUES (1, 41);
INSERT INTO `permission_role` VALUES (1, 42);
INSERT INTO `permission_role` VALUES (1, 43);
INSERT INTO `permission_role` VALUES (1, 44);
INSERT INTO `permission_role` VALUES (1, 45);
INSERT INTO `permission_role` VALUES (1, 46);
INSERT INTO `permission_role` VALUES (1, 47);
INSERT INTO `permission_role` VALUES (1, 48);
INSERT INTO `permission_role` VALUES (1, 49);
INSERT INTO `permission_role` VALUES (1, 50);
INSERT INTO `permission_role` VALUES (1, 51);
INSERT INTO `permission_role` VALUES (1, 52);
INSERT INTO `permission_role` VALUES (2, 17);
INSERT INTO `permission_role` VALUES (2, 18);
INSERT INTO `permission_role` VALUES (2, 19);
INSERT INTO `permission_role` VALUES (2, 20);
INSERT INTO `permission_role` VALUES (2, 21);
INSERT INTO `permission_role` VALUES (2, 22);
INSERT INTO `permission_role` VALUES (2, 23);
INSERT INTO `permission_role` VALUES (2, 24);
INSERT INTO `permission_role` VALUES (2, 25);
INSERT INTO `permission_role` VALUES (2, 26);
INSERT INTO `permission_role` VALUES (2, 27);
INSERT INTO `permission_role` VALUES (2, 28);
INSERT INTO `permission_role` VALUES (2, 29);
INSERT INTO `permission_role` VALUES (2, 30);
INSERT INTO `permission_role` VALUES (2, 31);
INSERT INTO `permission_role` VALUES (2, 32);
INSERT INTO `permission_role` VALUES (2, 33);
INSERT INTO `permission_role` VALUES (2, 34);
INSERT INTO `permission_role` VALUES (2, 35);
INSERT INTO `permission_role` VALUES (2, 36);
INSERT INTO `permission_role` VALUES (2, 37);
INSERT INTO `permission_role` VALUES (2, 38);
INSERT INTO `permission_role` VALUES (2, 39);
INSERT INTO `permission_role` VALUES (2, 40);
INSERT INTO `permission_role` VALUES (2, 41);
INSERT INTO `permission_role` VALUES (2, 42);
INSERT INTO `permission_role` VALUES (2, 43);
INSERT INTO `permission_role` VALUES (2, 44);
INSERT INTO `permission_role` VALUES (2, 45);
INSERT INTO `permission_role` VALUES (2, 46);
INSERT INTO `permission_role` VALUES (2, 47);
INSERT INTO `permission_role` VALUES (2, 48);
INSERT INTO `permission_role` VALUES (2, 49);
INSERT INTO `permission_role` VALUES (2, 50);
INSERT INTO `permission_role` VALUES (2, 51);
INSERT INTO `permission_role` VALUES (2, 52);
INSERT INTO `permission_role` VALUES (1, 53);
INSERT INTO `permission_role` VALUES (1, 54);
INSERT INTO `permission_role` VALUES (1, 55);
INSERT INTO `permission_role` VALUES (2, 53);
INSERT INTO `permission_role` VALUES (2, 54);
INSERT INTO `permission_role` VALUES (2, 55);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 56 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'user_management_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (2, 'permission_create', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (3, 'permission_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (4, 'permission_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (5, 'permission_delete', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (6, 'permission_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (7, 'role_create', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (8, 'role_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (9, 'role_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (10, 'role_delete', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (11, 'role_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (12, 'user_create', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (13, 'user_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (14, 'user_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (15, 'user_delete', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (16, 'user_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (17, 'post_event_create', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (18, 'post_event_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (19, 'post_event_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (20, 'post_event_delete', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (21, 'post_event_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (22, 'post_new_create', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (23, 'post_new_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (24, 'post_new_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (25, 'post_new_delete', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (26, 'post_new_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (27, 'page_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (28, 'setting_general_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (29, 'setting_general_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (30, 'setting_general_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (31, 'setting_server_info_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (32, 'setting_server_info_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (33, 'setting_server_info_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (34, 'setting_top_rank_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (35, 'setting_top_rank_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (36, 'setting_top_rank_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (37, 'setting_chien_tich_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (38, 'setting_chien_tich_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (39, 'setting_chien_tich_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (40, 'setting_download_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (41, 'setting_download_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (42, 'setting_download_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (43, 'setting_nap_the_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (44, 'setting_nap_the_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (45, 'setting_nap_the_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (46, 'setting_huong_dan_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (47, 'setting_huong_dan_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (48, 'setting_huong_dan_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (49, 'setting_quy_dinh_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (50, 'setting_quy_dinh_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (51, 'setting_quy_dinh_access', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (52, 'profile_password_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (53, 'setting_home_edit', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (54, 'setting_home_show', NULL, NULL, NULL);
INSERT INTO `permissions` VALUES (55, 'setting_home_access', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for post_events
-- ----------------------------
DROP TABLE IF EXISTS `post_events`;
CREATE TABLE `post_events`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_events
-- ----------------------------
INSERT INTO `post_events` VALUES (1, 'aa', '<p>aa</p>', 1, '2021-05-07 07:24:24', '2021-05-07 07:24:24', NULL);
INSERT INTO `post_events` VALUES (2, '2', '<p>22</p>', 1, '2021-05-07 07:40:00', '2021-05-07 07:40:04', '2021-05-07 07:40:04');

-- ----------------------------
-- Table structure for post_news
-- ----------------------------
DROP TABLE IF EXISTS `post_news`;
CREATE TABLE `post_news`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post_news
-- ----------------------------
INSERT INTO `post_news` VALUES (1, 'sự kiện chién tích k thẻ sự kiện chién tích k thẻ ', '<p>aaa</p>', 1, '2021-05-07 05:40:39', '2021-05-07 05:40:39', NULL);
INSERT INTO `post_news` VALUES (2, 'â', '<p>â</p>', 1, '2021-05-07 07:24:06', '2021-05-07 07:24:06', NULL);
INSERT INTO `post_news` VALUES (3, '333', '<p>333</p>', 1, '2021-05-07 07:39:24', '2021-05-07 07:54:27', '2021-05-07 07:54:27');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  INDEX `user_id_fk_3850665`(`user_id`) USING BTREE,
  INDEX `role_id_fk_3850665`(`role_id`) USING BTREE,
  CONSTRAINT `role_id_fk_3850665` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `user_id_fk_3850665` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1);
INSERT INTO `role_user` VALUES (2, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (2, 'User', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for setting_chien_tiches
-- ----------------------------
DROP TABLE IF EXISTS `setting_chien_tiches`;
CREATE TABLE `setting_chien_tiches`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_display` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_chien_tiches
-- ----------------------------
INSERT INTO `setting_chien_tiches` VALUES (1, 'Chiến tích', 'Chiến tích', 0, NULL, '2021-05-07 08:05:03');

-- ----------------------------
-- Table structure for setting_downloads
-- ----------------------------
DROP TABLE IF EXISTS `setting_downloads`;
CREATE TABLE `setting_downloads`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `link_gdrive` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `link_mega` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_downloads
-- ----------------------------
INSERT INTO `setting_downloads` VALUES (1, 'Download', 'Download', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for setting_generals
-- ----------------------------
DROP TABLE IF EXISTS `setting_generals`;
CREATE TABLE `setting_generals`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_fanpage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url_group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `meta_des` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `meta_keyword` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_generals
-- ----------------------------
INSERT INTO `setting_generals` VALUES (1, 'Shaiya2', 'https://www.facebook.com/groups/473321433781426', 'https://www.facebook.com/groups/473321433781426', 'shaiya2', 'shaiya2', NULL, NULL);

-- ----------------------------
-- Table structure for setting_homes
-- ----------------------------
DROP TABLE IF EXISTS `setting_homes`;
CREATE TABLE `setting_homes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `num_news_display` int(11) NOT NULL,
  `num_events_display` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_homes
-- ----------------------------
INSERT INTO `setting_homes` VALUES (1, 'Trang Chủ', 5, 5, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for setting_huong_dans
-- ----------------------------
DROP TABLE IF EXISTS `setting_huong_dans`;
CREATE TABLE `setting_huong_dans`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_huong_dans
-- ----------------------------
INSERT INTO `setting_huong_dans` VALUES (1, 'Hướng dẫn', 'Hướng dẫn', '', NULL, NULL);

-- ----------------------------
-- Table structure for setting_nap_thes
-- ----------------------------
DROP TABLE IF EXISTS `setting_nap_thes`;
CREATE TABLE `setting_nap_thes`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_nap_thes
-- ----------------------------
INSERT INTO `setting_nap_thes` VALUES (1, 'Nạp thẻ', 'Nạp thẻ', '', NULL, NULL);

-- ----------------------------
-- Table structure for setting_quy_dinhs
-- ----------------------------
DROP TABLE IF EXISTS `setting_quy_dinhs`;
CREATE TABLE `setting_quy_dinhs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_quy_dinhs
-- ----------------------------
INSERT INTO `setting_quy_dinhs` VALUES (1, 'Quy định', 'Quy định', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for setting_server_infos
-- ----------------------------
DROP TABLE IF EXISTS `setting_server_infos`;
CREATE TABLE `setting_server_infos`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_server_infos
-- ----------------------------
INSERT INTO `setting_server_infos` VALUES (1, 'Server Info', 'Thông tin Server', '<p><em>Thân chào các bạn!</em></p>\r\n\r\n<p>Nhận được nhiều sự đóng góp liên quan đến thông số của server, cũng như muốn tạo điều kiện cho tất cả người chơi được trải nghiệm <strong>Shaiya</strong><span style=\"color:#FF0000\"><strong> </strong></span>một cách thoải mái nhất. <span style=\"color:#FFFF00\"><strong>BQT</strong></span><span style=\"color:#FF0000\"> </span>xin gửi đến các bạn thông số máy chủ<span style=\"color:#FF8C00\"> </span><strong>Shaiya - Sự Vĩnh Cửu:</strong></p>\r\n\r\n<p><span style=\"color:#FFD700\"><span style=\"font-size:16px\"><strong>1. Thông số máy chủ</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><font color=\"#00ffff\">Shaiya - Phiên bản Sự Vĩnh Cửu</font></li><p>\r\n	</p><li>Tạo thẳng nhân vật \"Tối Thượng Cấp\"</li><p>\r\n	</p><li>Điểm kinh nghiệm:  <span style=\"color:#FF8C00\"><strong>x50</strong></span><p></p>\r\n	</li>\r\n	<li>Quest: x1</li><p>\r\n	</p><li>Drop: x1</li><p>\r\n</p></ul>\r\n	\r\n<span style=\"color:#FFD700\"><span style=\"font-size:16px\"><strong>2. Thông tin game</strong></span></span><p></p>\r\n<ul>	\r\n	<li>Miễn phí Đá hồi sinh, Búa độ bền, Túi giữ trang bị, Bùa chu tước...được tích hợp vào thanh kỹ năng</li><p>\r\n    </p><li>Miễn phí Đá triệu hồi nhóm, Dịch chuyển đến nhóm, Triệu hồi nhà kho...</li><p>\r\n	</p><li>Miễn phí các loại Ngọc Cấp 4.</li><p>\r\n	</p><li>Hệ thống chống cắt skill 100%</li><p>\r\n	</p><li>Hệ thống phân bố điểm kinh nghiệm hợp lý</li><p>\r\n	</p><li>Hệ thống giám sát và quản lý chặt chẽ</li><p>\r\n</p></ul>	\r\n\r\n	\r\n<p><span style=\"color:rgb(255, 215, 0)\"><span style=\"font-size:16px\"><strong>4. Hệ thống ngọc khảm:</strong></span></span></p>\r\n	\r\n	<p>_ Ngọc khảm nạm đôi cấp 1,2,3,4:<span style=\"color:#FF8C00\"><strong> (Thảo Nguyên Sự Sống)</strong></span></p>\r\n	<p>_ Ngọc khảm nạm đôi cấp 1,2,3,4:<span style=\"color:#FF8C00\"><strong> (Hoang Mạc - 1)</strong></span></p>\r\n	<p>_ Ngọc khảm nạm trang sức:<span style=\"color:#FF8C00\"><strong> (Hoang Mạc - 2)</strong></span></p>\r\n	<p>_ Ngọc khảm nạm cấp 5:<span style=\"color:#FF8C00\"><strong> (Hang Dấu Ấn/Aurjen )</strong></span></p>\r\n	\r\n	\r\n	\r\n\r\n\r\n\r\n\r\n<p><span style=\"color:rgb(255, 215, 0)\"><span style=\"font-size:16px\"><strong>5. Hệ thống boss:</strong></span></span></p>\r\n<ul>\r\n\r\n\r\n	<li><font color=\"Pink\">Boss: Kimuraku (Bản đồ: Hầm mộ linh thiêng) - (Delay 12h)</font>\r\n	\r\n	<p>_ Ngọc Thuộc tính: <span style=\"color:#FF8C00\"><strong>x2</strong></span></p>\r\n	<p></p>\r\n	\r\n	</li><li><font color=\"Pink\">Boss: Thần Serafim (Bản đồ: Hầm mộ Thảo Nguyên Sự Sống) - (Delay 13h)</font>\r\n	\r\n	<p>_ Ngọc Thuộc tính: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Trạng thái cấp 6: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p></p>\r\n	\r\n	</li><li><font color=\"Pink\">Boss: Cloron/Fantasma (Bản đồ: Cloron) - (Delay 12h)</font>\r\n	\r\n	<p>_ Trang phục Huyền thoại 5x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Vũ khí Rate 5x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Trang phục 4x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n\r\n	</li>\r\n	\r\n	<li><font color=\"Pink\">Boss: Fantasma (Bản đồ: Fantasma) - (Delay 12h)</font>\r\n	\r\n	<p>_ Trang phục Huyền thoại 5x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Vũ khí Rate 5x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Trang phục 4x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n\r\n	</li>\r\n	\r\n	<p></p>\r\n	<li><font color=\"Pink\">Boss: Huyền Thoại (Bản đồ: Đền Câm Lặng/Hang trung tâm Aidon)</font>\r\n	<p>_ Găng Huyền thoại 5x: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	\r\n	</li>\r\n	\r\n	<p></p>\r\n	<li><font color=\"Pink\">Boss: Chúa Tể Rồng (Bản đồ: Cloron 3) - (Delay 72h)</font>\r\n	\r\n	<p>_ Vũ khí rate Lv.5x(4 Slot): <span style=\"color:#FF8C00\"><strong>x3</strong></span></p>\r\n	</li>\r\n	<p></p>\r\n	<li><font color=\"Pink\">Boss: Rồng Địa Ngục (Bản đồ: Fantasma 3) - (Delay 72h)</font>\r\n	\r\n	<p>_ Vũ khí rate Lv.5x(4 Slot): <span style=\"color:#FF8C00\"><strong>x3</strong></span></p>\r\n\r\n	</li>\r\n	<p>\r\n	</p><li><font color=\"Pink\">Bản đồ Hoang Mạc 1, Hoang Mạc 2, Thảo Nguyên Sự Sống</font>\r\n	\r\n	<p>_ Trang phục 56+<span style=\"color:#FF8C00\"><strong></strong></span></p>\r\n\r\n\r\n	<p><span style=\"color:rgb(255, 215, 0)\"><span style=\"font-size:16px\"><strong>5. Hệ thống trang sức:</strong></span></span></p>\r\n	<p>_ Thành Hygon/Thành Arena<span style=\"color:#FF8C00\"><strong></strong></span></p>\r\n<ul>\r\n\r\n	\r\n\r\n\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n	\r\n<!--\r\n	<li>Boss: Thần Serafim (Bản đồ: Đền thờ ngàn năm)\r\n	<p>_ Ngọc Trạng thái Cấp 6: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	<p>_ Ngọc Trạng thái Cấp 7: <span style=\"color:#FF8C00\"><strong>x1</strong></span></p>\r\n	\r\n	-->\r\n</ul>\r\n\r\n</li></ul>', NULL, '2021-05-07 05:06:32');

-- ----------------------------
-- Table structure for setting_top_ranks
-- ----------------------------
DROP TABLE IF EXISTS `setting_top_ranks`;
CREATE TABLE `setting_top_ranks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_display` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of setting_top_ranks
-- ----------------------------
INSERT INTO `setting_top_ranks` VALUES (1, 'Top Rank', 'Top Rank', 0, NULL, '2021-05-07 07:58:53');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` datetime(0) NULL DEFAULT NULL,
  `approved` tinyint(1) NULL DEFAULT 0,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$IF.OsXN9HMcnZcBLYi7E1.eFLno6ns0LjLHjSbq9fLHbPES60J5vu', 'yJMeLiwuGPCYjCFYxH82v7OT9ssripMm8dlbENhaeb3gkkG0K93QsnOYYjgM', NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'Lê Lợi', 'ledinhloi1997@gmail.com', NULL, 1, '$2y$10$NLTNM/7PKSgds7xjlCXhZu0oylrO3u8KMrj0i1/jCu5zBvBiAMwLK', NULL, '2021-05-07 03:34:24', '2021-05-07 03:54:58', NULL);

SET FOREIGN_KEY_CHECKS = 1;
