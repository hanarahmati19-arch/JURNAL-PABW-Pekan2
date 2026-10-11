-- Dump database LaporBanjir (struktur + 20 data dummy)
-- Impor lewat phpMyAdmin: pilih tab Import, pilih file ini.

CREATE DATABASE IF NOT EXISTS `db_laporbanjir` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_laporbanjir`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_genangan` int NOT NULL,
  `tanggal_kejadian` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `laporan` (`id`, `nama_pelapor`, `lokasi`, `tinggi_genangan`, `tanggal_kejadian`, `created_at`, `updated_at`) VALUES
(1, 'Ajeng Laksita M.Pd', 'Kec. Rancaekek', 27, '2026-09-25', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(2, 'Uchita Zulaika', 'Kec. Majalaya', 58, '2026-09-25', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(3, 'Ifa Pertiwi', 'Kec. Rancaekek', 142, '2026-10-07', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(4, 'Wasis Taufan Anggriawan S.Pt', 'Kec. Dayeuhkolot', 25, '2026-09-24', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(5, 'Putri Agustina S.I.Kom', 'Kec. Katapang', 44, '2026-10-10', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(6, 'Nabila Rika Hartati S.Farm', 'Kec. Pameungpeuk', 130, '2026-09-15', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(7, 'Titin Qori Yolanda', 'Kec. Katapang', 29, '2026-09-15', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(8, 'Iriana Haryanti', 'Kec. Pameungpeuk', 41, '2026-09-18', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(9, 'Hairyanto Permadi', 'Kec. Majalaya', 134, '2026-10-05', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(10, 'Syahrini Permata', 'Kec. Bojongsoang', 11, '2026-10-02', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(11, 'Rafi Eman Natsir', 'Kec. Cileunyi', 50, '2026-09-19', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(12, 'Dono Ivan Winarno S.E.', 'Kec. Baleendah', 139, '2026-09-13', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(13, 'Yahya Mahendra', 'Kec. Rancaekek', 21, '2026-10-02', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(14, 'Balidin Wage Firmansyah', 'Kec. Rancaekek', 66, '2026-09-29', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(15, 'Harsaya Saefullah', 'Kec. Dayeuhkolot', 97, '2026-10-06', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(16, 'Langgeng Setya Salahudin S.Pd', 'Kec. Dayeuhkolot', 10, '2026-09-18', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(17, 'Praba Sihombing', 'Kec. Cileunyi', 59, '2026-09-21', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(18, 'Wasis Jagapati Samosir M.Pd', 'Kec. Banjaran', 98, '2026-09-17', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(19, 'Taufan Marbun M.Pd', 'Kec. Bojongsoang', 24, '2026-09-18', '2026-10-11 08:57:57', '2026-10-11 08:57:57'),
(20, 'Sadina Mutia Padmasari', 'Kec. Katapang', 58, '2026-10-07', '2026-10-11 08:57:57', '2026-10-11 08:57:57');

-- Catat migration agar `php artisan migrate` tidak membuat ulang tabel laporan
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `migrations` (`migration`, `batch`) VALUES ('2026_10_11_000000_create_laporan_table', 1);
