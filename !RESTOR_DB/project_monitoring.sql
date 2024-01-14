/*
 Navicat Premium Data Transfer

 Source Server         : MYSQL
 Source Server Type    : MySQL
 Source Server Version : 80035 (8.0.35)
 Source Host           : localhost:3306
 Source Schema         : project_monitoring

 Target Server Type    : MySQL
 Target Server Version : 80035 (8.0.35)
 File Encoding         : 65001

 Date: 14/01/2024 10:49:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `laporan_id` bigint unsigned DEFAULT NULL,
  `insiden_id` bigint unsigned DEFAULT NULL,
  `survei_id` bigint unsigned DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of images
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for insidens
-- ----------------------------
DROP TABLE IF EXISTS `insidens`;
CREATE TABLE `insidens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyek_id` bigint unsigned NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of insidens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for laporans
-- ----------------------------
DROP TABLE IF EXISTS `laporans`;
CREATE TABLE `laporans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyek_id` bigint unsigned NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of laporans
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2023_10_25_151609_create_proyeks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2023_10_26_131403_create_rencanas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2023_10_26_170517_create_laporans_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2023_10_26_222611_create_insidens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2023_10_26_223659_create_images_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2023_10_30_040536_create_surveis_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for proyeks
-- ----------------------------
DROP TABLE IF EXISTS `proyeks`;
CREATE TABLE `proyeks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `klien` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_proyek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengawas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_str` timestamp NULL DEFAULT NULL,
  `time_end` timestamp NULL DEFAULT NULL,
  `is_str` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of proyeks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for rencanas
-- ----------------------------
DROP TABLE IF EXISTS `rencanas`;
CREATE TABLE `rencanas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyek_id` bigint unsigned NOT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_str` timestamp NULL DEFAULT NULL,
  `time_end` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of rencanas
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for surveis
-- ----------------------------
DROP TABLE IF EXISTS `surveis`;
CREATE TABLE `surveis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `proyek_id` bigint unsigned NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of surveis
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `profil`, `perusahaan`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'Riasulistia', 'admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$SuIZBemzsb5Y6fA6IRVrJOBSOdhTxoS.eE6tmolnNYL7J6h9dry.2', 1, NULL, '2024-01-01 21:43:54', '2024-01-01 21:43:56');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `profil`, `perusahaan`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (2, 'Bonnie Andrew', 'pengawas', 'pengawas@gmail.com', NULL, NULL, NULL, '$2y$10$SuIZBemzsb5Y6fA6IRVrJOBSOdhTxoS.eE6tmolnNYL7J6h9dry.2', 2, NULL, '2023-10-31 18:01:41', '2023-10-31 18:01:41');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `profil`, `perusahaan`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (3, 'Agus Muslim', 'manager', 'manager@gmail.com', NULL, NULL, NULL, '$2y$10$SuIZBemzsb5Y6fA6IRVrJOBSOdhTxoS.eE6tmolnNYL7J6h9dry.2', 3, NULL, '2023-10-31 18:01:41', '2023-10-31 18:01:41');
INSERT INTO `users` (`id`, `name`, `username`, `email`, `profil`, `perusahaan`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES (4, 'Deni Presetyo', 'client', 'client@gmail.com', NULL, NULL, NULL, '$2y$10$SuIZBemzsb5Y6fA6IRVrJOBSOdhTxoS.eE6tmolnNYL7J6h9dry.2', 0, NULL, '2023-10-31 18:01:41', '2023-10-31 18:01:41');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
