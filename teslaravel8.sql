-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for teslaravel8
CREATE DATABASE IF NOT EXISTS `teslaravel8` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `teslaravel8`;

-- Dumping structure for table teslaravel8.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table teslaravel8.kembalis
CREATE TABLE IF NOT EXISTS `kembalis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tgl_kembali` date NOT NULL,
  `mobil_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kembalis_mobil_id_foreign` (`mobil_id`),
  KEY `kembalis_user_id_foreign` (`user_id`),
  CONSTRAINT `kembalis_mobil_id_foreign` FOREIGN KEY (`mobil_id`) REFERENCES `mobils` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kembalis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `userss` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.kembalis: ~0 rows (approximately)

-- Dumping structure for table teslaravel8.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.migrations: ~7 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_12_09_035825_create_mobils_table', 1),
	(5, '2023_12_09_035835_create_rentals_table', 1),
	(6, '2023_12_09_041229_create_userss_table', 1),
	(7, '2023_12_09_041418_create_kembalis_table', 1);

-- Dumping structure for table teslaravel8.mobils
CREATE TABLE IF NOT EXISTS `mobils` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sewa` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_plat` (`no_plat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.mobils: ~3 rows (approximately)
REPLACE INTO `mobils` (`id`, `merk`, `model`, `no_plat`, `sewa`, `created_at`, `updated_at`) VALUES
	(1, 'Toyota', 'Toyota Avanza', 'S 3333 EB', 200000.00, '2023-12-08 23:37:34', '2023-12-08 23:37:34'),
	(2, 'Toyota', 'Kijang Inova', 'S 3312 EF', 300000.00, '2023-12-08 23:49:12', '2023-12-08 23:49:12'),
	(3, 'Honda', 'Honda Mobilio', 'S 3212 RR', 250000.00, '2023-12-09 00:16:07', '2023-12-09 00:16:07');

-- Dumping structure for table teslaravel8.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.password_resets: ~0 rows (approximately)

-- Dumping structure for table teslaravel8.rentals
CREATE TABLE IF NOT EXISTS `rentals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `mobil_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rentals_mobil_id_foreign` (`mobil_id`),
  KEY `rentals_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.rentals: ~4 rows (approximately)
REPLACE INTO `rentals` (`id`, `tgl_mulai`, `tgl_akhir`, `mobil_id`, `user_id`, `status`, `total`, `created_at`, `updated_at`) VALUES
	(5, '2022-12-01', '2022-12-09', 1, 1, 'Selesai', 400000, '2023-12-09 01:54:00', '2023-12-09 02:40:01'),
	(6, '2022-01-09', '2022-12-08', 3, 1, 'Selesai', 500000, '2023-12-09 02:12:49', '2023-12-09 02:45:07'),
	(7, '2022-08-10', '2022-10-08', 2, 1, 'Selesai', 900000, '2023-12-09 02:14:18', '2023-12-09 02:40:45'),
	(11, '2023-12-09', '2023-12-11', 2, 1, 'Belum Selesai', 600000, '2023-12-09 04:12:48', '2023-12-09 04:12:48');

-- Dumping structure for table teslaravel8.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.users: ~0 rows (approximately)

-- Dumping structure for table teslaravel8.userss
CREATE TABLE IF NOT EXISTS `userss` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_sim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table teslaravel8.userss: ~0 rows (approximately)
REPLACE INTO `userss` (`id`, `name`, `alamat`, `nomor_telepon`, `nomor_sim`, `created_at`, `updated_at`) VALUES
	(1, 'imam', 'tuban', '0838571120878', '11', '2023-12-09 04:48:38', '2023-12-09 04:48:39'),
	(2, 'biladi', 'tuban', '0838571120878', '11', '2023-12-09 04:48:38', '2023-12-09 04:48:39'),
	(3, 'Imam Biladi', 'tuban', '089328108', '12', '2023-12-08 22:38:19', '2023-12-08 22:38:19');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
