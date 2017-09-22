-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for jdict
CREATE DATABASE IF NOT EXISTS `jdict` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `jdict`;


-- Dumping structure for table jdict.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.categories: ~6 rows (approximately)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Human Resources', '2017-05-15 03:38:04', '2017-05-15 03:38:04'),
	(2, 'Software', '2017-05-15 03:39:02', '2017-05-15 03:39:02'),
	(3, 'Hardware', '2017-05-15 03:39:10', '2017-05-15 03:39:10'),
	(4, 'Offshore', '2017-05-15 03:39:52', '2017-05-15 03:39:52'),
	(5, 'Communicator', '2017-05-15 03:40:42', '2017-06-06 08:31:30'),
	(7, 'test', '2017-06-07 06:42:19', '2017-06-07 06:42:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table jdict.category_word
CREATE TABLE IF NOT EXISTS `category_word` (
  `category_id` int(10) unsigned DEFAULT NULL,
  `word_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `category_word_category_id_foreign` (`category_id`),
  KEY `category_word_word_id_foreign` (`word_id`),
  CONSTRAINT `category_word_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_word_word_id_foreign` FOREIGN KEY (`word_id`) REFERENCES `words` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.category_word: ~5 rows (approximately)
DELETE FROM `category_word`;
/*!40000 ALTER TABLE `category_word` DISABLE KEYS */;
INSERT INTO `category_word` (`category_id`, `word_id`, `created_at`, `updated_at`) VALUES
	(4, 49, '2017-06-07 06:38:18', '2017-06-07 06:38:18'),
	(1, 49, '2017-06-07 06:56:01', '2017-06-07 06:56:01'),
	(2, 49, '2017-06-07 06:56:01', '2017-06-07 06:56:01'),
	(7, 49, '2017-06-07 06:57:02', '2017-06-07 06:57:02'),
	(1, 50, '2017-06-07 07:13:03', '2017-06-07 07:13:03'),
	(2, 50, '2017-06-07 07:13:03', '2017-06-07 07:13:03');
/*!40000 ALTER TABLE `category_word` ENABLE KEYS */;


-- Dumping structure for table jdict.meanings
CREATE TABLE IF NOT EXISTS `meanings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word_id` int(11) DEFAULT NULL,
  `meaning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `examples` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.meanings: ~36 rows (approximately)
DELETE FROM `meanings`;
/*!40000 ALTER TABLE `meanings` DISABLE KEYS */;
INSERT INTO `meanings` (`id`, `word_id`, `meaning`, `examples`, `created_at`, `updated_at`) VALUES
	(1, 9, 'meaning 1', 'example 1', '2017-05-16 09:34:28', '2017-05-16 09:34:28'),
	(2, 9, 'meaning 2', 'example 2', '2017-05-16 09:34:28', '2017-05-16 09:34:28'),
	(3, 9, 'meaning 3', 'example3', '2017-05-16 09:34:28', '2017-05-16 09:34:28'),
	(4, 1, 'mean 1', 'example 1', '2017-05-16 09:43:29', '2017-05-16 09:43:29'),
	(5, 1, 'mean 2', 'example 2', '2017-05-16 09:43:29', '2017-05-16 09:43:29'),
	(6, 24, 'xin chao', 'hello guy', '2017-05-17 04:28:46', '2017-05-17 04:28:46'),
	(7, 24, 'xin chao 2', 'hello guy 2', '2017-05-17 04:28:46', '2017-05-17 04:28:46'),
	(8, 25, 'toi', 'i am A', '2017-05-17 05:58:53', '2017-05-17 05:58:53'),
	(9, 26, 'chung toi', 'we are going to school', '2017-05-17 06:03:23', '2017-05-17 06:03:23'),
	(10, 26, 'chung ta', 'we are the champion', '2017-05-17 06:03:24', '2017-05-17 06:03:24'),
	(11, 27, 'sach', 'this is a book', '2017-05-17 08:30:56', '2017-05-17 08:30:56'),
	(12, 28, 'vo', 'this is notebook', '2017-05-17 08:32:16', '2017-05-17 08:32:16'),
	(13, 29, 'tháng 1', 'いちがつ いちがつ', '2017-05-17 08:44:34', '2017-05-17 08:44:34'),
	(14, 30, 'chim bự', 'loài chim bự quấy rối', '2017-05-17 09:16:07', '2017-05-17 09:16:07'),
	(15, 31, 'chim bự', 'loài chim bự quấy rối', '2017-05-17 09:22:20', '2017-05-17 09:22:20'),
	(16, 31, 'chim rất bự', 'aaa', '2017-05-17 09:22:21', '2017-05-17 09:22:21'),
	(17, 32, 'select2 mean', 'select2 example', '2017-05-18 06:38:30', '2017-05-18 06:38:30'),
	(18, 33, 'Chữ kanji', '漢字が難しい', '2017-05-23 06:35:23', '2017-05-23 06:35:23'),
	(19, 34, 'đáng tiếc, quý báu/ quý giá, lãng phí', '惜しい間違いをしてしまった。', '2017-06-06 06:57:26', '2017-06-06 06:57:26'),
	(20, 35, 'ăn', 'ご飯を食べます', '2017-06-06 07:08:34', '2017-06-06 07:08:34'),
	(21, 35, 'dùng bữa', 'レストランでおいしいエビを食べました', '2017-06-06 07:08:34', '2017-06-06 07:08:34'),
	(22, 36, 'mean 1', 'example 1', '2017-06-06 08:32:25', '2017-06-06 08:32:25'),
	(23, 37, 'mean 2', 'i am 3', '2017-06-06 08:36:59', '2017-06-06 08:36:59'),
	(24, 39, 'mean 1', 'example 1', '2017-06-06 08:48:50', '2017-06-06 08:48:50'),
	(25, 40, 'toi', 'i am A', '2017-06-06 08:52:44', '2017-06-06 08:52:44'),
	(26, 41, 'mean 1', 'example 1', '2017-06-06 09:02:31', '2017-06-06 09:02:31'),
	(27, 42, 'Doanh thu', '売上が伸びる', '2017-06-07 03:08:09', '2017-06-07 03:08:09'),
	(28, 43, 'Chi phí', '費用を削減する', '2017-06-07 03:12:29', '2017-06-07 03:12:29'),
	(29, 44, 'Lợi nhuận', '利益を分配する', '2017-06-07 03:15:15', '2017-06-07 03:15:15'),
	(30, 45, 'Bảng cân đối kế toán', '賃借対照表をを作成する', '2017-06-07 03:17:03', '2017-06-07 03:17:03'),
	(31, 46, 'Bảng báo cáo kết quả hoạt động kinh doanh', '損益計算書を作成する', '2017-06-07 03:18:33', '2017-06-07 03:18:33'),
	(32, 47, 'Báo cáo lưu chuyển tiền tệ', 'キャッシュフロー計算書を作成する', '2017-06-07 03:19:59', '2017-06-07 03:19:59'),
	(64, 48, 'mean 1', 'example 123', '2017-06-07 06:35:11', '2017-06-07 06:35:11'),
	(65, 48, 'mean 2', 'ex 12345', '2017-06-07 06:35:12', '2017-06-07 06:35:12'),
	(81, 49, 'mean 1', 'example 122', '2017-06-07 06:58:15', '2017-06-07 06:58:15'),
	(82, 49, 'mean 2', 'example 122', '2017-06-07 06:58:15', '2017-06-07 06:58:15'),
	(83, 49, 'mean 3', 'example 122', '2017-06-07 06:58:15', '2017-06-07 06:58:15'),
	(84, 50, 'mean 1', 'example 1', '2017-06-07 07:13:03', '2017-06-07 07:13:03');
/*!40000 ALTER TABLE `meanings` ENABLE KEYS */;


-- Dumping structure for table jdict.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.migrations: ~5 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_05_10_083734_create_roles_table', 1),
	(4, '2017_05_15_032941_create_categories_table', 2),
	(5, '2017_05_15_071439_create_words_table', 3),
	(6, '2017_05_15_071741_create_words_table', 4),
	(7, '2017_05_16_041738_create_category_word_table', 5),
	(8, '2017_05_16_090743_create_meanings_table', 6),
	(9, '2017_05_18_071440_create_role_table', 7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table jdict.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table jdict.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admin', '2017-05-10 15:45:41', '2017-05-10 15:45:42'),
	(2, 'user', 'User', '2017-05-10 15:46:05', '2017-05-10 15:46:07'),
	(3, 'guest', 'Guest', '2017-05-10 15:46:40', '2017-05-10 15:46:42');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table jdict.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` smallint(6) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.users: ~9 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'thiep.le.huu', 'le.huu.thiep@softfront.com.vn', '$2y$10$6vCEOOx8wtWqmxP7BKTfv.fuIdC9fyI2lIw0nln6bZ5h6nTIH3PCG', 1, 'qNdQVINtV22bdJIjHQH6rXHetk3fQWZzYivGZK7mbCW5l6LYXzFiZ9P0lMcl', '2017-05-15 01:58:02', '2017-05-15 01:58:02'),
	(7, 'Tran Chieu Chieu', 'tran.chieu.chieu@softfront.com.vn', '$2y$10$4zdPEAJNOEMZqW8kSFLuI.zqcDWnCEOJL45yM3RLCcglrbHpCxsGy', 1, 'ya2Pyg9P7H4BEmw5RHxMSzSEEDC0rux7JLCCPJvwHsi6aZSdwxGjGxg3TVJT', '2017-06-06 06:14:57', '2017-06-06 06:14:57'),
	(8, 'Nguyen Nhien', 'nguyen.hong.nhien@softfront.com.vn', '$2y$10$9BVgqUvE.tHQuZ1pisodhe51zaEdn6bIAXu4/dzhhoZzyPT5ldTNi', 1, 'zDcyQQJIY6aAdDhyP9iI3Hu2Huw09JcmUFpgodXYNNfMGS6MvE05EHfk2zYX', '2017-06-06 06:17:15', '2017-06-06 06:17:15'),
	(9, 'Mai Van Sang', 'mai.van.sang@softfront.com.vn', '$2y$10$Msj0bXfPmQVQ4nFBAddYhe/Zs49rqXPj/1PJW0gymq5qPkxpw6LkW', 1, NULL, '2017-06-06 06:17:48', '2017-06-06 06:17:48'),
	(10, 'Phan Thanh Phat', 'phan.thanh.phat@softfront.com.vn', '$2y$10$6f/VHqxy//VdUnbNz.lYr.7ab6rNKaqcFciNw.uXcz5/xPVy8csnO', 1, NULL, '2017-06-06 06:18:20', '2017-06-06 06:18:20'),
	(11, 'Tran Kieu Oanh', 'tran.kieu.oanh@softfront.com.vn', '$2y$10$8DlS5vd5SB33j9SE2bQxIOLkGHiFAS6V0sKQgtt/3kT3o8gOVcO2O', 1, NULL, '2017-06-06 06:23:54', '2017-06-06 06:23:54'),
	(12, 'Mai Ngoc Thu', 'mai.ngoc.thu@softfront.com.vn', '$2y$10$NYGaBHCKQ8Elde5WFAGj9OSNXk3TJb2DgUCv9OCPo64T309DYKD0O', 1, NULL, '2017-06-06 06:24:32', '2017-06-06 06:24:32'),
	(13, 'Le Phuong Thao', 'le.phuong.thao@softfront.com.vn', '$2y$10$R6kF10JmSfgsQEihWsUABe1./ZfeJL1nHWOAKow1w10enzBz.9hRS', 1, NULL, '2017-06-06 06:25:27', '2017-06-06 06:25:27'),
	(14, 'Ho Cam Nhung', 'ho.cam.nhung@softfront.com.vn', '$2y$10$g7IP6I0K7bBHMqF6B.4Wv.RuQu53tw3A8ffav2.c2L5nQfmHOJ2LK', 1, NULL, '2017-06-06 06:25:52', '2017-06-06 06:25:52'),
	(15, 'Nguyen Lan Huong', 'nguyen.lan.huong@softfront-ds.co.jp', '$2y$10$AnlRkZKKtaGXjJCp/1j9E.p9Et0JCAUpGzgvXBOkEu1K.Xu/eEHPa', 1, NULL, '2017-06-06 06:39:36', '2017-06-06 06:39:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table jdict.words
CREATE TABLE IF NOT EXISTS `words` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `furigana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `related` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jdict.words: ~8 rows (approximately)
DELETE FROM `words`;
/*!40000 ALTER TABLE `words` DISABLE KEYS */;
INSERT INTO `words` (`id`, `word`, `furigana`, `related`, `published`, `created_at`, `updated_at`) VALUES
	(34, '惜しい', 'おしい', '残念、大切、もったいない', 0, '2017-06-06 06:57:26', '2017-06-06 06:57:26'),
	(35, '食べる', 'たべる', '食事する', 0, '2017-06-06 07:08:34', '2017-06-06 07:08:34'),
	(42, '売上', 'うりあげ', '収益', 0, '2017-06-07 03:08:09', '2017-06-07 03:20:29'),
	(43, '費用', 'ひよう', NULL, 0, '2017-06-07 03:12:29', '2017-06-07 03:12:29'),
	(44, '利益', 'りえき', NULL, 0, '2017-06-07 03:15:15', '2017-06-07 03:15:15'),
	(45, '貸借対照表', 'ちんしゃくたいしょうひょう', 'バランスシート', 0, '2017-06-07 03:17:03', '2017-06-07 03:17:03'),
	(46, '損益計算書', 'そんえきけいさんしょ', NULL, 0, '2017-06-07 03:18:33', '2017-06-07 03:18:33'),
	(47, 'キャッシュフロー計算書', 'きゃっしゅふろーけいさんしょ', NULL, 0, '2017-06-07 03:19:58', '2017-06-07 03:19:58'),
	(49, 'Test', 'test 1', 'test 1', 0, '2017-06-07 06:38:18', '2017-06-07 06:38:18'),
	(50, 'test2', 'test 2', 'test', 0, '2017-06-07 07:13:03', '2017-06-07 07:13:03');
/*!40000 ALTER TABLE `words` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
