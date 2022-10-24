-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2021 at 02:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rat`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.71 Safari/537.36', '337ba9d82cca5480df4670087a1c9915', '2021-10-01 23:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Administrator', 'Site-Administrator'),
(2, 'Auditor', 'Auditor'),
(3, 'User', 'Regular-User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-01 23:16:10', 1),
(2, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-02 20:31:28', 1),
(3, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-03 03:32:43', 1),
(4, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-03 06:31:07', 1),
(5, '::1', 'auditor@ratools.com', 2, '2021-10-03 06:50:39', 1),
(6, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-03 06:58:13', 1),
(7, '::1', 'ncup', NULL, '2021-10-03 18:38:43', 0),
(8, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-03 18:38:49', 1),
(9, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-04 06:32:32', 1),
(10, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-04 18:28:54', 1),
(11, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-05 00:37:48', 1),
(12, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-05 05:04:50', 1),
(13, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-05 07:48:26', 1),
(14, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-05 21:16:06', 1),
(15, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-05 23:27:03', 1),
(16, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-06 05:03:24', 1),
(17, '::1', 'rat.kag.1.0@gmail.com', 1, '2021-10-07 04:51:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `prioritas_resiko` int(5) NOT NULL,
  `no_reg_resiko` varchar(55) NOT NULL,
  `kejadian` varchar(255) NOT NULL,
  `level_kemungkinan_sebelumnya` int(5) NOT NULL,
  `level_dampak_sebelumnya` int(5) NOT NULL,
  `level_resiko_sebelumnya` int(5) NOT NULL,
  `tingkat_level_resiko_sebelumnya` varchar(55) NOT NULL,
  `level_kemungkinan_harapan` int(5) NOT NULL,
  `level_dampak_harapan` int(5) NOT NULL,
  `level_resiko_harapan` int(5) NOT NULL,
  `tingkat_level_resiko_harapan` varchar(55) NOT NULL,
  `level_kemungkinan_actual` int(5) NOT NULL,
  `level_dampak_actual` int(5) NOT NULL,
  `level_resiko_actual` int(5) NOT NULL,
  `tingkat_level_resiko_actual` varchar(55) NOT NULL,
  `trend_resiko` varchar(55) NOT NULL,
  `deviasi_resiko` varchar(55) NOT NULL,
  `rekomendasi` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `identifikasi_id` int(11) NOT NULL,
  `mitigasi_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `prioritas_resiko`, `no_reg_resiko`, `kejadian`, `level_kemungkinan_sebelumnya`, `level_dampak_sebelumnya`, `level_resiko_sebelumnya`, `tingkat_level_resiko_sebelumnya`, `level_kemungkinan_harapan`, `level_dampak_harapan`, `level_resiko_harapan`, `tingkat_level_resiko_harapan`, `level_kemungkinan_actual`, `level_dampak_actual`, `level_resiko_actual`, `tingkat_level_resiko_actual`, `trend_resiko`, `deviasi_resiko`, `rekomendasi`, `user_id`, `pmr_id`, `identifikasi_id`, `mitigasi_id`, `created_at`, `updated_at`) VALUES
(2, 17, 'I1', 'Audit program tidak terarah (hanya formalitas)', 5, 1, 5, 'Sedang', 2, 1, 2, 'Sangat Rendah', 3, 1, 3, 'Rendah', 'Naik', '1', 'RTP masih belum sesuai', 1, 1, 1, 1, '2021-10-05 01:50:37', '2021-10-05 05:30:26'),
(3, 14, 'G2', 'Audit tidak dapat mengidentifikasi adanya penyimpangan', 2, 3, 6, 'Sedang', 2, 2, 4, 'Rendah', 2, 1, 2, 'Sangat Rendah', 'Turun', '-2', 'RTP Berhasil Dijalankan', 1, 1, 2, 2, '2021-10-05 05:32:08', '2021-10-05 05:32:08'),
(6, 12, 'D3', 'Program Kinerja Tidak Tercapai', 2, 4, 8, 'Sedang', 2, 2, 4, 'Rendah', 2, 2, 4, 'Rendah', 'Tetap', '0', 'RTP sudah sesuai', 1, 1, 10, 10, '2021-10-06 07:09:29', '2021-10-06 07:09:29'),
(7, 19, 'G1', 'Kurang pemahaman dalam melakukan pekerjaan dan kurang disiplin', 2, 2, 4, 'Rendah', 2, 2, 4, 'Rendah', 3, 2, 6, 'Sedang', 'Naik', '2', 'Ganti RTP', 1, 3, 7, 7, '2021-10-06 09:42:46', '2021-10-06 09:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `identifikasi`
--

CREATE TABLE `identifikasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `no_identifikasi` int(11) DEFAULT NULL,
  `sasaran_organisasi` varchar(255) NOT NULL,
  `kejadian` text NOT NULL,
  `kategori_resiko` varchar(255) NOT NULL,
  `penyebab` text NOT NULL,
  `dampak` text NOT NULL,
  `uraian_spi` text NOT NULL,
  `efektivitas` varchar(255) NOT NULL,
  `level_kemungkinan` int(10) NOT NULL,
  `level_dampak` int(10) NOT NULL,
  `level_resiko` int(10) NOT NULL,
  `tingkat_level_resiko` varchar(255) NOT NULL,
  `prioritas_resiko` int(10) NOT NULL,
  `no_reg_resiko` varchar(55) NOT NULL,
  `keputusan_mitigasi` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `identifikasi`
--

INSERT INTO `identifikasi` (`id`, `no_identifikasi`, `sasaran_organisasi`, `kejadian`, `kategori_resiko`, `penyebab`, `dampak`, `uraian_spi`, `efektivitas`, `level_kemungkinan`, `level_dampak`, `level_resiko`, `tingkat_level_resiko`, `prioritas_resiko`, `no_reg_resiko`, `keputusan_mitigasi`, `user_id`, `pmr_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pengawasan dan Evaluasi Program Kinerja', 'Audit program tidak terarah (hanya formalitas)', 'Resiko Lainnya', 'Kompetensi Tim Audit kurang memadai dan Kelalaian Tim Audit', 'Tujuan audit tidak tercapai', 'Review berjenjang dan Pendidikan Pengembangan Mandiri (PPM)', 'Kurang Efektif', 5, 1, 5, 'Sedang', 17, 'I', 'Iya', 1, 1, '2021-10-02 23:40:13', '2021-10-02 23:40:13'),
(2, 2, 'Terlaksananya pengawasan dan evaluasi atas program prioritas yang dilaksanakan SOPK', 'Audit tidak dapat mengidentifikasi adanya penyimpangan', 'Resiko Operasional', 'Tim Audit tidak menjalankan seluruh prosedur audit yang telah ditetapkan dengan baik', 'Pengaduan penyimpangan oleh masyarakat atas kegiatan auditan yang sama', 'Review berjenjang dan Pendidikan Pengembangan Mandiri (PPM), dan Pembinaan Personil', 'Kurang Efektif', 2, 3, 6, 'Sedang', 14, 'G', 'Iya', 1, 1, '2021-10-03 00:11:39', '2021-10-03 00:11:39'),
(7, 1, 'Terlaksananya Pengembangan SDM', 'Kurang pemahaman dalam melakukan pekerjaan dan kurang disiplin', 'Resiko Operasional', 'Kurangnya pelatihan skill terkait, sosialisasi sop dan kepatuhan', 'penurunan kinerja', 'pelatihan skill terkait dan sosialisasi berkala sop', 'Kurang Efektif', 2, 2, 4, 'Rendah', 19, 'G', 'Iya', 1, 3, '2021-10-04 10:26:07', '2021-10-04 10:26:07'),
(10, 3, 'Pengawasan dan Evaluasi Program Kinerja', 'Program Kinerja Tidak Tercapai', 'Resiko Strategis', 'Kurang tepatnya dalam mengambil keputusan pada kinerja', 'Mengurangi omset', 'Pelatihan dan pendidikan tingkat lanjut', 'Kurang Efektif', 2, 4, 8, 'Sedang', 12, 'D', 'Iya', 1, 1, '2021-10-06 18:51:36', '2021-10-06 18:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_resiko`
--

CREATE TABLE `kategori_resiko` (
  `id` int(11) UNSIGNED NOT NULL,
  `kategori_resiko` varchar(255) NOT NULL,
  `reg` varchar(55) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_resiko`
--

INSERT INTO `kategori_resiko` (`id`, `kategori_resiko`, `reg`, `keterangan`) VALUES
(1, 'Resiko Penerimaan', 'A', 'Resiko yang disebabkan oleh tidak tercapainya target penerimaan daerah'),
(2, 'Resiko Belanja', 'B', 'Resiko yang disebabkan oleh kegagalan dalam penyerapan anggaran belanja yang tidak sesuai sasaran dan rencana'),
(3, 'Resiko Pembiayaan', 'C', 'Resiko yang disebabkan oleh kegagalan pemenuhan pembiayaan, baik normal dan jangka waktu'),
(4, 'Resiko Strategis', 'D', 'Resiko yang disebabkan oleh ketidaktepatan organisasi dalam mengambil keputusan strategis'),
(5, 'Resiko Fraud', 'E', 'Resiko yang timbul karena kecurangan yang disengaja yang menimbulkan kerugian negara'),
(6, 'Resiko Kepatuhan', 'F', 'Resiko yang disebabkan organisasi tidak mematuhi ketentuan yang berlaku'),
(7, 'Resiko Operasional', 'G', 'Resiko yang disebabkan oleh tidak berfungsinya proses internal dll'),
(8, 'Resiko Reputasi', 'H', 'Resiko yang disebabkan oleh menurunnya tingkat kepercayaan stakeholder external'),
(9, 'Resiko Lainnya', 'I', 'Resiko yang disebabkan oleh faktor lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `level_dampak_resiko`
--

CREATE TABLE `level_dampak_resiko` (
  `id` int(11) UNSIGNED NOT NULL,
  `level` int(10) NOT NULL,
  `dampak` varchar(99) NOT NULL,
  `jumlah_kerugian_negara` text NOT NULL,
  `penurunan_reputasi` text NOT NULL,
  `penurunan_kinerja` text NOT NULL,
  `gangguan_terhadap_pelayanan` text NOT NULL,
  `jumlah_tuntutan_hukum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_dampak_resiko`
--

INSERT INTO `level_dampak_resiko` (`id`, `level`, `dampak`, `jumlah_kerugian_negara`, `penurunan_reputasi`, `penurunan_kinerja`, `gangguan_terhadap_pelayanan`, `jumlah_tuntutan_hukum`) VALUES
(1, 1, 'Tidak Signifikan', 'Kurang dari Rp 10 juta', 'Keluhan stakeholder secara lisan/tulisan ke organisasi, 3 kali atau kurang', 'Pencapaian target kinerja 100% atau lebih', 'Pelayanan tertunda kurang 1 hari', '5 kali atau kurang dalam satu periode'),
(2, 2, 'Minor', 'Lebih dari Rp 10 juta sd Rp 50 juta', 'Keluhan stakeholder secara lisan/tulisan ke organisasi, lebih dari 3 kali', 'Pencapaian target kinerja diatas 80% sd 100%', 'Pelayanan tertunda diatas 1 hari sd 5 hari', 'diatas 5 sd 15 kali dalam satu periode'),
(3, 3, 'Moderat', 'Lebih dari Rp 50 juta sd Rp 100 juta', 'Pemberitaan negatif di media massa lokal', 'Pencapaian target kinerja diatas 50% sd 80%', 'Pelayanan tertunda diatas 5 hari sd 15 hari', 'diatas 15 sd 30 kali dalam satu periode'),
(4, 4, 'Signifikan', 'Lebih dari Rp 100 juta sd Rp 500 juta', 'Pemberitaan negatif di media massa nasional', 'Pencapaian target kinerja diatas 25% sd 50%', 'Pelayanan tertunda diatas 15 hari sd 30 hari', 'diatas 30 sd 50 kali dalam satu periode'),
(5, 5, 'Sangat Signifikan', 'Lebih dari Rp 500 juta', 'Pemberitaan negatif di media massa internasional', 'Pencapaian target kinerja kurang dari 25%', 'Pelayanan tertunda lebih dari 30 hari', 'ebih dari 50 kali dalam satu periode');

-- --------------------------------------------------------

--
-- Table structure for table `level_kemungkinan_resiko`
--

CREATE TABLE `level_kemungkinan_resiko` (
  `id` int(11) UNSIGNED NOT NULL,
  `level` int(10) NOT NULL,
  `kemungkinan` varchar(99) NOT NULL,
  `persentase_transaksi_satu_periode` text NOT NULL,
  `kemungkinan_jml_frekuensi_suatu_periode_5_tahun` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level_kemungkinan_resiko`
--

INSERT INTO `level_kemungkinan_resiko` (`id`, `level`, `kemungkinan`, `persentase_transaksi_satu_periode`, `kemungkinan_jml_frekuensi_suatu_periode_5_tahun`) VALUES
(1, 1, 'Hampir Tidak Terjadi', 'Terjadi kurang dari 5% dari kejadian transaksi', 'Terjadinya sangat jarang, kurang dari 2 kali'),
(2, 2, 'Jarang Terjadi', 'Terjadi antara 5% sd 10% dari kejadian transaksi', 'Terjadinya jarang, 2 sd 10 kali'),
(3, 3, 'Kadang Terjadi', 'Terjadi antara 10% sd 20% dari kejadian transaksi', 'Terjadinya cukup sering, diatas 10 sd 18 kali'),
(4, 4, 'Sering Terjadi', 'Terjadi antara 20% sd 50% dari kejadian transaksi', 'Terjadinya sering, diatas 18 sd 26 kali'),
(5, 5, 'Hampir Pasti Terjadi', 'Terjadi lebih dari 50% dari kejadian transaksi', 'Terjadi sangat sering, lebih dari 26 kali');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2021-09-30-235211', 'App\\Database\\Migrations\\CreateTablePmr', 'default', 'App', 1633145392, 1),
(3, '2021-10-02-025225', 'App\\Database\\Migrations\\CreateTableSaron', 'default', 'App', 1633145392, 1),
(4, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1633147052, 2),
(5, '2021-10-02-033428', 'App\\Database\\Migrations\\CreateTableUsers', 'default', 'App', 1633147052, 2),
(6, '2021-10-02-094252', 'App\\Database\\Migrations\\CreateTableSmr', 'default', 'App', 1633167933, 3),
(7, '2021-10-02-113101', 'App\\Database\\Migrations\\CreateTableStakeholder', 'default', 'App', 1633174404, 4),
(8, '2021-10-03-013836', 'App\\Database\\Migrations\\CreateTableIdentifikasi', 'default', 'App', 1633226089, 5),
(9, '2021-10-03-015602', 'App\\Database\\Migrations\\CreateTableKategoriResiko', 'default', 'App', 1633226280, 6),
(10, '2021-10-03-020151', 'App\\Database\\Migrations\\CreateTableKategoriResiko', 'default', 'App', 1633226583, 7),
(11, '2021-10-03-020923', 'App\\Database\\Migrations\\CreateTableLevelKemungkinanResiko', 'default', 'App', 1633227133, 8),
(12, '2021-10-03-021621', 'App\\Database\\Migrations\\CreateTableLevelDampakResiko', 'default', 'App', 1633227508, 9),
(13, '2021-10-03-234205', 'App\\Database\\Migrations\\CreateTableMitigasi', 'default', 'App', 1633304947, 10),
(14, '2021-10-04-021626', 'App\\Database\\Migrations\\AddColumnToTableIdentifikasi', 'default', 'App', 1633313956, 11),
(15, '2021-10-04-235041', 'App\\Database\\Migrations\\CreateTableEvaluasi', 'default', 'App', 1633392024, 12);

-- --------------------------------------------------------

--
-- Table structure for table `mitigasi`
--

CREATE TABLE `mitigasi` (
  `id` int(11) UNSIGNED NOT NULL,
  `mitigasi_kejadian` text NOT NULL,
  `mitigasi_prioritas_resiko` int(10) NOT NULL,
  `mitigasi_no_reg_resiko` varchar(55) NOT NULL,
  `opsi_mitigasi` varchar(255) NOT NULL,
  `keg_pengendalian_tambahan` text NOT NULL,
  `target` varchar(255) NOT NULL,
  `jadwal_implementasi` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `mitigasi_level_kemungkinan` int(10) NOT NULL,
  `mitigasi_level_dampak` int(10) NOT NULL,
  `mitigasi_level_resiko` int(10) NOT NULL,
  `mitigasi_tingkat_level_resiko` varchar(255) NOT NULL,
  `mitigasi_dilaksanakan` varchar(255) NOT NULL,
  `capaian_target` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `identifikasi_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mitigasi`
--

INSERT INTO `mitigasi` (`id`, `mitigasi_kejadian`, `mitigasi_prioritas_resiko`, `mitigasi_no_reg_resiko`, `opsi_mitigasi`, `keg_pengendalian_tambahan`, `target`, `jadwal_implementasi`, `penanggung_jawab`, `mitigasi_level_kemungkinan`, `mitigasi_level_dampak`, `mitigasi_level_resiko`, `mitigasi_tingkat_level_resiko`, `mitigasi_dilaksanakan`, `capaian_target`, `user_id`, `pmr_id`, `identifikasi_id`, `created_at`, `updated_at`) VALUES
(1, 'Audit program tidak terarah (hanya formalitas)', 17, 'I1', 'Iya', 'Pembinaan Tim Audit', 'Periode Audit Berikutnya', 'Semester I 2022', 'Inspektur', 2, 1, 2, 'Sangat Rendah', 'Iya', 'SOP Terpenuhi', 1, 1, 1, '2021-10-04 00:06:23', '2021-10-05 01:40:32'),
(2, 'Kurang pemahaman dalam melakukan pekerjaan dan kurang disiplin', 19, 'G1', 'Iya', 'Pembinaan Kepatuhan dan Pelatihan Skill', 'Periode Audit Berikutnya', 'Semester I 2022', 'Inspektur', 2, 2, 4, 'Rendah', 'Iya', 'Penigkatan Kinerja', 1, 3, 7, '2021-10-04 01:14:34', '2021-10-04 01:14:34'),
(4, 'Adanya Pekerjaan yang lewat masa periode', 19, 'B2', 'Iya', 'Diklat untuk menambah wawasan dan memperdalam skill dalam bidang pekerjaan terkait', 'Periode Audit Berikutnya', 'Semester I 2022', 'Inspektur', 1, 1, 1, 'Sangat Rendah', 'Iya', 'Ketepatan Waktu Penyelesaian Pekerjaan', 1, 3, 9, '2021-10-04 18:40:41', '2021-10-04 18:43:46'),
(5, 'Audit tidak dapat mengidentifikasi adanya penyimpangan', 14, 'G2', 'Iya', 'Auditor diberikan pembinaan dan pelatihan yang mumpuni', 'Periode Audit Berikutnya', 'Semester I 2022', 'Inspektur', 2, 2, 4, 'Rendah', 'Iya', 'SOP Terpenuhi', 1, 1, 2, '2021-10-05 01:17:03', '2021-10-05 01:17:03'),
(8, 'Program Kinerja Tidak Tercapai', 12, 'D3', 'Iya', 'Pendidikan dan latihan tingkat lanjut ', 'Periode Audit Berikutnya', 'Semester I 2022', 'Inspektur', 2, 2, 4, 'Rendah', 'Iya', 'SOP terpenuhi dan Kinerja Meningkat', 1, 1, 10, '2021-10-06 07:06:00', '2021-10-06 07:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `pmr`
--

CREATE TABLE `pmr` (
  `id` int(11) UNSIGNED NOT NULL,
  `tahun` int(10) NOT NULL,
  `kld` varchar(255) NOT NULL,
  `nama_unit` varchar(155) NOT NULL,
  `level_mr_eselon` varchar(99) NOT NULL,
  `nama_level_unit` varchar(255) NOT NULL,
  `ruang_lingkup_penerapan` text DEFAULT NULL,
  `periode` int(10) NOT NULL,
  `output` varchar(255) NOT NULL,
  `data_sudah_benar` varchar(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pmr`
--

INSERT INTO `pmr` (`id`, `tahun`, `kld`, `nama_unit`, `level_mr_eselon`, `nama_level_unit`, `ruang_lingkup_penerapan`, `periode`, `output`, `data_sudah_benar`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2021, 'Kementerian Agama RI', 'Inspektorat Jendral', 'Eselon II', 'Inspektur I', 'Seluruh Unit Dibawahnya', 2021, 'Profile Resiko', 'Iya', 1, '2021-10-01 23:34:57', '2021-10-01 23:35:48'),
(3, 2021, 'Kementerian Agama RI', 'Inspektorat Jendral', 'Eselon II', 'Inspektur II', 'Seluruh Unit Dibawahnya', 2021, 'Profile Resiko', 'Iya', 1, '2021-10-02 00:00:33', '2021-10-02 00:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `saron`
--

CREATE TABLE `saron` (
  `id` int(11) UNSIGNED NOT NULL,
  `daftar_sasaran` text NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saron`
--

INSERT INTO `saron` (`id`, `daftar_sasaran`, `indikator`, `user_id`, `pmr_id`, `created_at`, `updated_at`) VALUES
(2, 'Pengawasan dan Evaluasi Program Kinerja', 'Penerbitan Laporan Hasil Pemeriksaan', 1, 1, '2021-10-02 02:02:47', '2021-10-02 02:02:47'),
(3, 'Terlaksananya pengawasan dan evaluasi atas program prioritas yang dilaksanakan SOPK', 'Penerbitan Laporan Hasil Pemeriksaan', 1, 1, '2021-10-02 02:03:32', '2021-10-02 02:03:32'),
(4, 'Terlaksananya Pengembangan SDM', 'Performance Appraisal SDM', 1, 3, '2021-10-02 04:08:02', '2021-10-02 04:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `smr`
--

CREATE TABLE `smr` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smr`
--

INSERT INTO `smr` (`id`, `nama`, `jabatan`, `user_id`, `pmr_id`, `created_at`, `updated_at`) VALUES
(1, 'Antonov', 'Ketua Pengelola Resiko', 1, 1, '2021-10-02 05:26:04', '2021-10-02 05:47:06'),
(2, 'Mario', 'Sekretaris Pengelola Resiko', 1, 1, '2021-10-02 05:26:58', '2021-10-02 05:48:24'),
(5, 'Luigi', 'Anggota Pengelola Resiko', 1, 1, '2021-10-02 05:28:42', '2021-10-02 05:28:42'),
(6, 'Umit Davala', 'Ketua Pengelola Resiko', 1, 3, '2021-10-02 05:47:53', '2021-10-02 05:48:08'),
(7, 'Escobar', 'Anggota Pengelola Resiko', 1, 1, '2021-10-02 05:50:51', '2021-10-02 05:50:51'),
(8, 'Matt Kharkhi', 'Sekretaris Pengelola Resiko', 1, 3, '2021-10-04 06:39:13', '2021-10-04 06:39:13'),
(10, 'Mario Gomez', 'Anggota Pengelola Resiko', 1, 3, '2021-10-04 18:34:14', '2021-10-04 18:34:14'),
(11, 'Bobby Moore', 'Anggota Pengelola Resiko', 1, 3, '2021-10-04 18:34:52', '2021-10-04 18:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `id` int(11) UNSIGNED NOT NULL,
  `stakeholder` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `pmr_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`id`, `stakeholder`, `keterangan`, `user_id`, `pmr_id`, `created_at`, `updated_at`) VALUES
(1, 'BPK RI', 'Auditor External Pemerintah', 1, 1, '2021-10-02 07:02:57', '2021-10-02 07:02:57'),
(2, 'DPR RI', 'Perwakilan Rakyat', 1, 1, '2021-10-02 07:03:16', '2021-10-02 07:03:16'),
(3, 'Presiden', 'Kepala Pemerintah', 1, 1, '2021-10-02 07:03:45', '2021-10-02 07:16:40'),
(4, 'BPK RI', 'Auditor External Pemerintah', 1, 3, '2021-10-02 07:04:40', '2021-10-02 07:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(99) DEFAULT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `jabatan` varchar(155) NOT NULL,
  `telpon` varchar(55) NOT NULL,
  `tahun` int(11) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `unit_kerja`, `jabatan`, `telpon`, `tahun`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'rat.kag.1.0@gmail.com', 'admin', 'Inspektorat Jendral', 'Site Administrator', '081234567890', 2021, '$2y$10$wtSdyJ7b4zy77scUIk0zfOMaI4QdOrvpuASIaSd/3tRoHPTqBN6XS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-01 23:15:07', '2021-10-01 23:16:02', NULL),
(2, 'Auditor', 'auditor@ratools.com', 'auditor', 'Sekretariat Jendral', 'Auditor', '089908990899', 2021, '$2y$10$V9W.yqFeZiRRQ/dSxNprNuGnrSLfUzimWawuUuBIrTjx8iYOaXuVa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-10-01 23:22:01', '2021-10-01 23:22:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identifikasi`
--
ALTER TABLE `identifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_resiko`
--
ALTER TABLE `kategori_resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_dampak_resiko`
--
ALTER TABLE `level_dampak_resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_kemungkinan_resiko`
--
ALTER TABLE `level_kemungkinan_resiko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitigasi`
--
ALTER TABLE `mitigasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmr`
--
ALTER TABLE `pmr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saron`
--
ALTER TABLE `saron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smr`
--
ALTER TABLE `smr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `identifikasi`
--
ALTER TABLE `identifikasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_resiko`
--
ALTER TABLE `kategori_resiko`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level_dampak_resiko`
--
ALTER TABLE `level_dampak_resiko`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level_kemungkinan_resiko`
--
ALTER TABLE `level_kemungkinan_resiko`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mitigasi`
--
ALTER TABLE `mitigasi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pmr`
--
ALTER TABLE `pmr`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saron`
--
ALTER TABLE `saron`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `smr`
--
ALTER TABLE `smr`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
