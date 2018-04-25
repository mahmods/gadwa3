-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2018 at 03:44 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-09-14 10:52:39', '2017-09-14 10:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `cities_translations`
--

DROP TABLE IF EXISTS `cities_translations`;
CREATE TABLE IF NOT EXISTS `cities_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `city_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_translations_city_id_foreign` (`city_id`),
  KEY `cities_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities_translations`
--

INSERT INTO `cities_translations` (`id`, `city_id`, `locale`, `title`) VALUES
(1, 1, 'ar', 'Cairo');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `hint_step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `step_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hint_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `content_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `image`, `video`, `hint_step`, `step_name`, `hint_order`, `content_type`, `created_at`, `updated_at`) VALUES
(2, '145026default.png', NULL, 'step_one', NULL, NULL, 'slider', '2017-09-11 12:50:26', '2017-09-12 11:59:29'),
(3, '092128default.png', NULL, 'step_one', 'الخطوة الأولى', '1', 'steps', '2017-09-14 07:21:28', '2017-09-14 07:31:58'),
(4, '092349default.png', NULL, 'step_two', 'الخطوة الثانية', NULL, 'steps', '2017-09-14 07:23:49', '2017-09-14 07:40:00'),
(5, '092433default.png', NULL, 'step_three', 'الخطوة الثالثة', '1', 'steps', '2017-09-14 07:24:33', '2017-09-14 07:40:09'),
(6, '090109mockup.png', 'https://www.youtube.com/embed/K9nhm-2SySE', 'step_one', NULL, NULL, 'page', '2017-09-16 06:22:21', '2017-09-16 07:53:20'),
(7, '082422mockup2.png', NULL, 'step_one', NULL, NULL, 'page', '2017-09-16 06:24:22', '2017-09-16 06:24:22'),
(8, '082524mockup3.png', NULL, 'step_one', NULL, NULL, 'page', '2017-09-16 06:25:24', '2017-09-16 06:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `contents_translations`
--

DROP TABLE IF EXISTS `contents_translations`;
CREATE TABLE IF NOT EXISTS `contents_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contents_translations_content_id_foreign` (`content_id`),
  KEY `contents_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents_translations`
--

INSERT INTO `contents_translations` (`id`, `content_id`, `locale`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'ar', 'أبدأ دراسه مشروعك بكل سهوله مع جدوي', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفي', NULL, NULL),
(3, 3, 'ar', 'سجل بياناتك الاساسية', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفي', NULL, NULL),
(4, 4, 'ar', 'بيانات السوق', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفي', NULL, NULL),
(5, 5, 'ar', 'الطاقة الانتاجية', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفي', NULL, NULL),
(6, 6, 'ar', 'عن جدوى', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.\r\n\r\nإذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.', NULL, NULL),
(7, 7, 'ar', 'ابدأ دراستك التفصيليه الان بـــ 8 خطوات فقط', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع', NULL, NULL),
(8, 8, 'ar', 'حمل واطلع على دراساتك من اى مكان وفى اى وقت', 'إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'EG', '2017-09-14 10:52:22', '2017-09-14 10:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `countries_translations`
--

DROP TABLE IF EXISTS `countries_translations`;
CREATE TABLE IF NOT EXISTS `countries_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_translations_country_id_foreign` (`country_id`),
  KEY `countries_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries_translations`
--

INSERT INTO `countries_translations` (`id`, `country_id`, `locale`, `title`) VALUES
(1, 1, 'ar', 'جمهوية مصر العربية');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `symbol`, `code`, `rate`, `created_at`, `updated_at`) VALUES
(1, 'le', 'le', 1.2, '2017-09-14 10:52:06', '2017-09-14 10:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `currencies_translations`
--

DROP TABLE IF EXISTS `currencies_translations`;
CREATE TABLE IF NOT EXISTS `currencies_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_translations_currency_id_foreign` (`currency_id`),
  KEY `currencies_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deprecations`
--

DROP TABLE IF EXISTS `deprecations`;
CREATE TABLE IF NOT EXISTS `deprecations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `percentage` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deprecations`
--

INSERT INTO `deprecations` (`id`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 20, '2017-09-14 10:51:34', '2017-09-30 07:28:48'),
(2, 20, '2017-09-30 07:28:48', '2017-09-30 07:28:48'),
(3, 20, '2017-09-30 07:28:49', '2017-09-30 07:28:49'),
(4, 20, '2017-09-30 07:28:49', '2017-09-30 07:28:49'),
(5, 20, '2017-09-30 07:28:49', '2017-09-30 07:28:49'),
(6, 50, '2017-10-03 08:51:28', '2017-10-03 08:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `deprecations_translations`
--

DROP TABLE IF EXISTS `deprecations_translations`;
CREATE TABLE IF NOT EXISTS `deprecations_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `deprecation_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deprecations_translations_deprecation_id_foreign` (`deprecation_id`),
  KEY `deprecations_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deprecations_translations`
--

INSERT INTO `deprecations_translations` (`id`, `deprecation_id`, `locale`, `title`) VALUES
(1, 1, 'ar', 'الاراضي'),
(2, 2, 'ar', 'الانشاءات و المباني'),
(3, 3, 'ar', 'الالات والمعدات'),
(4, 4, 'ar', 'السيارات'),
(5, 5, 'ar', 'مصاريف ماقبل التشغيل'),
(6, 6, 'ar', 'تكاليف الاثاث والتجهيزات');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

DROP TABLE IF EXISTS `expenses_categories`;
CREATE TABLE IF NOT EXISTS `expenses_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `created_at`, `updated_at`, `type`) VALUES
(1, '2017-09-14 10:53:18', '2017-09-14 10:53:18', 1),
(2, '2017-09-28 06:30:01', '2017-09-28 06:30:01', 1),
(3, '2017-09-28 06:30:20', '2017-09-28 06:30:20', 1),
(4, '2017-09-28 06:30:49', '2017-09-28 06:30:49', 1),
(5, '2017-09-28 06:32:08', '2017-09-28 06:32:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories_translations`
--

DROP TABLE IF EXISTS `expenses_categories_translations`;
CREATE TABLE IF NOT EXISTS `expenses_categories_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expense_categories_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `expenses_categories_translations_category_id_foreign` (`expense_categories_id`),
  KEY `expenses_categories_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_categories_translations`
--

INSERT INTO `expenses_categories_translations` (`id`, `expense_categories_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', 'تكاليف المنافع والخدمات', 'تكاليف المنافع والخدمات'),
(2, 2, 'ar', 'المصاريف الاداريه والعمومية', 'المصاريف الاداريه والعمومية'),
(3, 3, 'ar', 'تكاليف التسويق', 'تكاليف التسويق'),
(4, 4, 'ar', 'الايجار', 'الايجار'),
(5, 5, 'ar', 'الرواتب والاجور', 'الرواتب والاجور');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_08_08_112606_create_user_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(9, '2017_08_08_224302_create_sidebar_menuses_table', 1),
(10, '2017_08_08_225052_create_sidebar_items_table', 1),
(11, '2017_08_16_103658_create_table_sectors', 1),
(12, '2017_08_16_103724_create_table_currencies', 1),
(13, '2017_08_16_103758_create_table_countries', 1),
(14, '2017_08_16_103809_create_table_cities', 1),
(15, '2017_08_16_103830_create_table_settinges', 1),
(16, '2017_08_16_104140_create_table_studies', 1),
(17, '2017_08_19_120026_create_table_unites', 1),
(18, '2017_08_19_120038_create_table_studies_products', 1),
(19, '2017_08_19_120046_create_table_studies_sectors', 1),
(20, '2017_08_19_120051_create_table_studies_markting', 1),
(21, '2017_08_19_120153_create_table_studies_competition', 1),
(22, '2017_08_19_120223_create_table_studies_assetes', 1),
(23, '2017_08_19_120310_create_table_studies_increases_rate', 1),
(24, '2017_08_19_120330_create_table_studies_expences', 1),
(25, '2017_08_19_120400_create_table_studies_raw_materials', 1),
(26, '2017_08_19_120442_create_table_studies_finance_invesments', 1),
(27, '2017_08_20_114241_alter_table_sidebar_menu', 1),
(28, '2017_08_24_105502_alter_table_studies_marketing_translation', 1),
(29, '2017_08_24_131320_alter_table_all_tables_studies__translations', 1),
(30, '2017_08_27_152644_change_table_competions_to_competitors', 1),
(31, '2017_09_10_141944_create_contents_table', 1),
(32, '2017_09_27_090629_alter_table_competitors_translation', 2),
(33, '2017_09_27_142349_create_four_analyze_management', 3),
(34, '2017_09_27_155137_alter_table_studies', 4),
(35, '2017_09_27_165059_alter_table_expences_categories', 5),
(36, '2017_09_30_074956_alter_table_studies_expenses_translation', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

DROP TABLE IF EXISTS `sectors`;
CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `created_at`, `updated_at`) VALUES
(1, '2017-09-14 10:51:49', '2017-09-14 10:51:49'),
(2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sectors_translations`
--

DROP TABLE IF EXISTS `sectors_translations`;
CREATE TABLE IF NOT EXISTS `sectors_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sector_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sectors_translations_sector_id_foreign` (`sector_id`),
  KEY `sectors_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors_translations`
--

INSERT INTO `sectors_translations` (`id`, `sector_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', 'القطاع الصناعى', 'desc'),
(2, 2, 'ar', 'القطاع الزراعى', 'القطاع الصناعى');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_items`
--

DROP TABLE IF EXISTS `sidebar_items`;
CREATE TABLE IF NOT EXISTS `sidebar_items` (
  `item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_access` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ordering` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `sidebar_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebar_items`
--

INSERT INTO `sidebar_items` (`item_id`, `menu_id`, `name`, `route`, `roles_access`, `icon`, `ordering`, `active`, `class`, `created_at`, `updated_at`) VALUES
(1, 2, 'allUsers', 'getAllUsers', '1', 'fa fa-users', 1, 1, '', NULL, NULL),
(2, 2, 'addUser', 'getAddUser', '1', 'fa fa-users', 1, 1, '', NULL, NULL),
(3, 3, 'deprecations', 'getAllDeprecations', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(4, 3, 'sectors', 'getAllSectors', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(5, 3, 'currencies', 'getAllCurrencies', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(6, 3, 'Countries', 'getAllCountries', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(7, 3, 'unites', 'getAllUnites', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(8, 3, 'expense_categories', 'getAllExpenseCategories', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(9, 4, 'allStudies', 'getAllStudies', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(10, 4, 'addStudy', 'getAddStudy', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(11, 5, 'allStudiesMarketing', 'getAllMarketings', '1', 'fa fa-level-down', 2, 1, '', NULL, NULL),
(12, 5, 'addMarketing', 'getAddMarketing', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(13, 6, 'allAssets', 'getAllAssets', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(14, 6, 'addAsset', 'getAddAsset', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(15, 7, 'addStudyProducts', 'getAllProducts', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(16, 8, 'studySectors', 'getAllStudiesSectors', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(17, 9, 'all_expenses', 'getAllExpenses', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(18, 9, 'add_expense', 'getAddExpense', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(19, 10, 'studyCompetitor', 'getAllCompetitors', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(20, 11, 'studyRawMaterial', 'getAllRawMaterials', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(21, 12, 'studyFinanceInvestments', 'getAllFinanceInvestments', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(22, 13, 'all_increase_rates', 'getAllIncreaseRates', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(23, 13, 'add_increase_rate', 'getAddIncreaseRate', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(24, 14, 'all_contents', 'getAllContents', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL),
(25, 14, 'add_content', 'getAddContent', '1', 'fa fa-level-down', 1, 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_menus`
--

DROP TABLE IF EXISTS `sidebar_menus`;
CREATE TABLE IF NOT EXISTS `sidebar_menus` (
  `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_access` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ordering` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `have_header` int(11) DEFAULT '1',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebar_menus`
--

INSERT INTO `sidebar_menus` (`menu_id`, `name`, `roles_access`, `icon`, `ordering`, `active`, `have_header`, `class`, `created_at`, `updated_at`) VALUES
(1, 'home', '1', 'icon-home', 1, 1, 1, '', NULL, NULL),
(2, 'users', '1', 'fa fa-users', 1, 1, 1, '', NULL, NULL),
(3, 'components', '1', 'icon-puzzle', 1, 1, 1, '', NULL, NULL),
(4, 'studies', '1', 'icon-docs', 1, 1, 1, '', NULL, NULL),
(5, 'studiesMarketing', '1', 'icon-docs', 1, 1, 1, '', NULL, NULL),
(6, 'studyAssets', '1', 'icon-docs', 1, 1, 1, '', NULL, NULL),
(7, 'studyProducts', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL),
(8, 'studySectors', '1', 'icon-docs', 1, 1, 1, '', NULL, NULL),
(9, 'studyExpenses', '1', 'icon-docs', 1, 1, 1, '', NULL, NULL),
(10, 'studyCompetitor', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL),
(11, 'studyRawMaterial', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL),
(12, 'studyFinanceInvestments', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL),
(13, 'studyIncreaseRates', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL),
(14, 'contents', '1', 'fa fa-cubes', 1, 1, 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

DROP TABLE IF EXISTS `studies`;
CREATE TABLE IF NOT EXISTS `studies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `working_capital_months` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `sector_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `studies_user_id_foreign` (`user_id`),
  KEY `studies_country_id_foreign` (`country_id`),
  KEY `studies_city_id_foreign` (`city_id`),
  KEY `studies_currency_id_foreign` (`currency_id`),
  KEY `studies_sector_id_foreign` (`sector_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`id`, `working_capital_months`, `phone`, `space`, `email`, `location`, `user_id`, `country_id`, `city_id`, `currency_id`, `sector_id`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(7, 2, '01112433658', '50', 'root@mahacode.com', 'بنى سويف ', 32, 1, 1, 1, 1, '2018-04-25 12:42:16', '2018-04-25 13:00:38', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studies_assets`
--

DROP TABLE IF EXISTS `studies_assets`;
CREATE TABLE IF NOT EXISTS `studies_assets` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` double DEFAULT NULL,
  `space` double DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `deprecation_id` int(10) UNSIGNED DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_assets_deprecation_id_foreign` (`deprecation_id`),
  KEY `studies_assets_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_assets`
--

INSERT INTO `studies_assets` (`id`, `value`, `space`, `count`, `deprecation_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 200, 100, NULL, 1, 7, '2018-04-25 12:57:41', '2018-04-25 12:57:41', NULL),
(7, 200, 100, NULL, 2, 7, '2018-04-25 12:57:42', '2018-04-25 12:57:42', NULL),
(8, 200, NULL, 200, 3, 7, '2018-04-25 12:57:42', '2018-04-25 12:57:42', NULL),
(9, 100, NULL, 100, 4, 7, '2018-04-25 12:57:42', '2018-04-25 12:57:42', NULL),
(10, 100, NULL, NULL, 5, 7, '2018-04-25 12:57:42', '2018-04-25 12:57:42', NULL),
(11, 100, NULL, 200, 6, 7, '2018-04-25 12:57:42', '2018-04-25 12:57:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_assets_translations`
--

DROP TABLE IF EXISTS `studies_assets_translations`;
CREATE TABLE IF NOT EXISTS `studies_assets_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_assets_translations_asset_id_foreign` (`asset_id`),
  KEY `studies_assets_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_assets_translations`
--

INSERT INTO `studies_assets_translations` (`id`, `asset_id`, `locale`, `title`, `description`) VALUES
(1, 6, 'ar', '', NULL),
(2, 7, 'ar', '100', NULL),
(3, 8, 'ar', '100', NULL),
(4, 9, 'ar', '100', NULL),
(5, 10, 'ar', 'بيان14', NULL),
(6, 11, 'ar', 'تجهيز مصاريف قبل 19/2/2018', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_competitors`
--

DROP TABLE IF EXISTS `studies_competitors`;
CREATE TABLE IF NOT EXISTS `studies_competitors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `study_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_competitors_study_id_foreign` (`study_id`),
  KEY `studies_competitors_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_competitors`
--

INSERT INTO `studies_competitors` (`id`, `study_id`, `created_at`, `updated_at`, `product_id`) VALUES
(5, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_competitors_translations`
--

DROP TABLE IF EXISTS `studies_competitors_translations`;
CREATE TABLE IF NOT EXISTS `studies_competitors_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `competitor_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_competitors_translations_competitor_id_foreign` (`competitor_id`),
  KEY `studies_competitors_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_competitors_translations`
--

INSERT INTO `studies_competitors_translations` (`id`, `competitor_id`, `locale`, `title`, `description`, `product`, `place`) VALUES
(1, 5, 'ar', 'yy', NULL, 'dd', 'yy');

-- --------------------------------------------------------

--
-- Table structure for table `studies_expenses`
--

DROP TABLE IF EXISTS `studies_expenses`;
CREATE TABLE IF NOT EXISTS `studies_expenses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `value` double DEFAULT NULL,
  `space` double DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_expenses_category_id_foreign` (`category_id`),
  KEY `studies_expenses_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_expenses`
--

INSERT INTO `studies_expenses` (`id`, `value`, `space`, `count`, `category_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, NULL, NULL, NULL, NULL, 7, NULL, NULL, NULL),
(6, 10, NULL, NULL, 1, 7, '2018-04-25 12:59:21', '2018-04-25 12:59:21', NULL),
(7, 10, NULL, NULL, 2, 7, '2018-04-25 12:59:22', '2018-04-25 12:59:22', NULL),
(8, 10, NULL, NULL, 3, 7, '2018-04-25 12:59:22', '2018-04-25 12:59:22', NULL),
(9, 10, 10, NULL, 4, 7, '2018-04-25 12:59:22', '2018-04-25 12:59:22', NULL),
(10, 10, NULL, 10, 5, 7, '2018-04-25 12:59:22', '2018-04-25 12:59:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_expenses_translations`
--

DROP TABLE IF EXISTS `studies_expenses_translations`;
CREATE TABLE IF NOT EXISTS `studies_expenses_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expense_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_expenses_translations_studies_expense_id_foreign` (`expense_id`),
  KEY `studies_expenses_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_expenses_translations`
--

INSERT INTO `studies_expenses_translations` (`id`, `expense_id`, `locale`, `title`, `description`, `item`, `location`, `type`) VALUES
(1, 6, 'ar', NULL, NULL, 'اجر 19/2/2018', '', ''),
(2, 7, 'ar', NULL, NULL, '', '', '10'),
(3, 8, 'ar', NULL, NULL, '', '', 'اجر 19/2/2018'),
(4, 9, 'ar', NULL, NULL, '', 'راتب الراجل بتاع الحراسه ', ''),
(5, 10, 'ar', NULL, NULL, 'نوع تانى ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studies_finance_investments`
--

DROP TABLE IF EXISTS `studies_finance_investments`;
CREATE TABLE IF NOT EXISTS `studies_finance_investments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `personal_investment` double DEFAULT NULL,
  `loan` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_finance_investments_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_finance_investments`
--

INSERT INTO `studies_finance_investments` (`id`, `personal_investment`, `loan`, `other`, `study_id`, `created_at`, `updated_at`) VALUES
(5, 30, 70, NULL, 7, NULL, '2018-04-25 13:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `studies_four_analyze`
--

DROP TABLE IF EXISTS `studies_four_analyze`;
CREATE TABLE IF NOT EXISTS `studies_four_analyze` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `study_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_four_analyze_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_four_analyze`
--

INSERT INTO `studies_four_analyze` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(5, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_four_analyze_translations`
--

DROP TABLE IF EXISTS `studies_four_analyze_translations`;
CREATE TABLE IF NOT EXISTS `studies_four_analyze_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `four_analyze_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` text COLLATE utf8mb4_unicode_ci,
  `athreat` text COLLATE utf8mb4_unicode_ci,
  `chance` text COLLATE utf8mb4_unicode_ci,
  `challenge` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_four_analyze_translations_four_analyze_id_foreign` (`four_analyze_id`),
  KEY `studies_four_analyze_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_four_analyze_translations`
--

INSERT INTO `studies_four_analyze_translations` (`id`, `four_analyze_id`, `locale`, `power`, `athreat`, `chance`, `challenge`) VALUES
(1, 5, 'ar', 'ig', 'gg', 'gg', 'ig');

-- --------------------------------------------------------

--
-- Table structure for table `studies_increases_rate`
--

DROP TABLE IF EXISTS `studies_increases_rate`;
CREATE TABLE IF NOT EXISTS `studies_increases_rate` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `years` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_increases_rate_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_increases_rate`
--

INSERT INTO `studies_increases_rate` (`id`, `years`, `percentage`, `study_id`, `created_at`, `updated_at`) VALUES
(6, 'السنة الاولى ', 10, 7, '2018-04-25 13:17:03', '2018-04-25 13:17:03'),
(7, '19/2/2018', 10, 7, '2018-04-25 13:17:03', '2018-04-25 13:17:03'),
(8, '19/2/2018', 40, 7, '2018-04-25 13:17:03', '2018-04-25 13:17:03'),
(9, 'السنة الاولى ', 60, 7, '2018-04-25 13:17:03', '2018-04-25 13:17:03'),
(10, 'السنة الاولى ', 70, 7, '2018-04-25 13:17:03', '2018-04-25 13:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `studies_marketing`
--

DROP TABLE IF EXISTS `studies_marketing`;
CREATE TABLE IF NOT EXISTS `studies_marketing` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `study_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_marketing_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_marketing`
--

INSERT INTO `studies_marketing` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(5, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_marketing_translations`
--

DROP TABLE IF EXISTS `studies_marketing_translations`;
CREATE TABLE IF NOT EXISTS `studies_marketing_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marketing_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_marketing_translations_marketing_id_foreign` (`marketing_id`),
  KEY `studies_marketing_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_marketing_translations`
--

INSERT INTO `studies_marketing_translations` (`id`, `marketing_id`, `locale`, `title`, `description`) VALUES
(1, 5, 'ar', 'ss', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_products`
--

DROP TABLE IF EXISTS `studies_products`;
CREATE TABLE IF NOT EXISTS `studies_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `production` double DEFAULT NULL,
  `sales` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_products_unit_id_foreign` (`unit_id`),
  KEY `studies_products_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_products`
--

INSERT INTO `studies_products` (`id`, `price`, `production`, `sales`, `type`, `unit_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 30, 30, 100, NULL, 1, 7, NULL, '2018-04-25 12:51:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_products_translations`
--

DROP TABLE IF EXISTS `studies_products_translations`;
CREATE TABLE IF NOT EXISTS `studies_products_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_products_translations_studies_products_id_foreign` (`product_id`),
  KEY `studies_products_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_products_translations`
--

INSERT INTO `studies_products_translations` (`id`, `product_id`, `locale`, `title`, `description`) VALUES
(1, 5, 'ar', 'بلح احمر ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_raw_materials`
--

DROP TABLE IF EXISTS `studies_raw_materials`;
CREATE TABLE IF NOT EXISTS `studies_raw_materials` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `production` double DEFAULT NULL,
  `sales` double DEFAULT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `study_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_raw_materials_unit_id_foreign` (`unit_id`),
  KEY `studies_raw_materials_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_raw_materials`
--

INSERT INTO `studies_raw_materials` (`id`, `price`, `production`, `sales`, `unit_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 33, 20, NULL, 1, 7, NULL, '2018-04-25 12:59:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_rw_mat_translations`
--

DROP TABLE IF EXISTS `studies_rw_mat_translations`;
CREATE TABLE IF NOT EXISTS `studies_rw_mat_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `raw_material_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_rw_mat_translations_raw_material_id_foreign` (`raw_material_id`),
  KEY `studies_rw_mat_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_rw_mat_translations`
--

INSERT INTO `studies_rw_mat_translations` (`id`, `raw_material_id`, `locale`, `title`, `description`) VALUES
(1, 5, 'ar', '20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_sectors`
--

DROP TABLE IF EXISTS `studies_sectors`;
CREATE TABLE IF NOT EXISTS `studies_sectors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `study_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_sectors_study_id_foreign` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_sectors`
--

INSERT INTO `studies_sectors` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(5, 7, NULL, NULL),
(6, 7, '2018-04-25 12:49:28', '2018-04-25 12:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `studies_sectors_translations`
--

DROP TABLE IF EXISTS `studies_sectors_translations`;
CREATE TABLE IF NOT EXISTS `studies_sectors_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studies_sector_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `studies_sectors_translations_sector_id_foreign` (`studies_sector_id`),
  KEY `studies_sectors_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_sectors_translations`
--

INSERT INTO `studies_sectors_translations` (`id`, `studies_sector_id`, `locale`, `title`, `description`) VALUES
(1, 5, 'ar', 'قطاع 19/2/2018', NULL),
(2, 6, 'ar', 'قطاع نبذ النخله ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_translations`
--

DROP TABLE IF EXISTS `studies_translations`;
CREATE TABLE IF NOT EXISTS `studies_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `study_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `studies_translations_study_id_foreign` (`study_id`),
  KEY `studies_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_translations`
--

INSERT INTO `studies_translations` (`id`, `study_id`, `locale`, `title`, `description`) VALUES
(3, 7, 'ar', 'مصبع العبوات البلاستيكيه ', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `study_status`
--

DROP TABLE IF EXISTS `study_status`;
CREATE TABLE IF NOT EXISTS `study_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_id` int(11) DEFAULT NULL,
  `step_one` int(2) DEFAULT NULL,
  `step_two` int(2) DEFAULT NULL,
  `step_three` int(2) DEFAULT NULL,
  `step_four` int(2) DEFAULT NULL,
  `step_five` int(2) DEFAULT NULL,
  `step_six` int(2) DEFAULT NULL,
  `is_completed` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_status`
--

INSERT INTO `study_status` (`id`, `study_id`, `step_one`, `step_two`, `step_three`, `step_four`, `step_five`, `step_six`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-25 14:20:33', '2018-04-25 12:23:15'),
(2, 3, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2018-04-25 14:26:28', '2018-04-25 12:27:06'),
(3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-25 14:28:41', NULL),
(4, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-04-25 14:32:06', NULL),
(5, 7, 1, 1, 1, 1, 1, 1, NULL, '2018-04-25 14:42:16', '2018-04-25 13:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `unites`
--

DROP TABLE IF EXISTS `unites`;
CREATE TABLE IF NOT EXISTS `unites` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unites`
--

INSERT INTO `unites` (`id`, `created_at`, `updated_at`) VALUES
(1, '2017-09-14 10:53:02', '2017-09-14 10:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `unites_translations`
--

DROP TABLE IF EXISTS `unites_translations`;
CREATE TABLE IF NOT EXISTS `unites_translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `unites_translations_unit_id_foreign` (`unit_id`),
  KEY `unites_translations_locale_index` (`locale`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unites_translations`
--

INSERT INTO `unites_translations` (`id`, `unit_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', 'unit 1', 'desc');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `created_by`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Super Admin', 'admin@mahacode.com', '$2y$10$zrt76VxAlxoFhZCZPzs8vev1rktGH6uA6gr3d8ACDGCNT0PYimZRG', 1, 1, 'CnP1ScnySrUFK810Lwwbuz2BfaxsJE7VBIoE0BWifZNsLce0YhitJqEYT6UI', NULL, NULL),
(2, 2, 'مصطفى محمد أحمد', 'user@mahacode.com', '$2y$10$g8TA5zK7jAIgZ/./SqwcK.R6R2EyN/sbUxNOVPqNo4eD3o6FGQeey', 1, 1, 'idDDjkA3rT4D6Aq5O9h0fTzZRboCfiUA4jqb7pn3SVjQXY2HjiwuhHlNXKYX', '2017-09-17 09:11:56', '2017-09-19 05:35:15'),
(6, 1, 'mustaoha', 'mustapha@mahacode.com', '$2y$10$Qz3rU64e8Z3v1rmyy8McE.DiotXI/t1JUe8RJQ/kEq2GIaRdapVEW', 1, 1, NULL, '2017-09-17 13:40:45', '2017-09-18 12:40:12'),
(7, 1, 'Mustafa Gamal', 'mustafa@mahacode.com', '$2y$10$X.LekrQiLyAu/fpMqi9jj.dYgmbk.QaoN3lT2Bdk2ctc8O0ewBgEi', 1, 1, NULL, '2017-09-18 12:40:44', '2017-09-18 12:40:44'),
(8, 2, 'Yasmine', 'yasmine@mahacode.com', '$2y$10$JIf17k1bdj.y94rX623G/ebxGxWtbF4sw.wWQRXw2tVA3UHEZd/SS', 1, 1, NULL, '2017-09-18 12:41:12', '2017-09-18 12:41:12'),
(9, 2, 'Tester', 'tester@mahacode.com', '$2y$10$GXbKEdZSczzLu9yq49AIq.dSmJbqkroX8wi04wUyih5nBVZ5/.P6i', 1, 1, '1DD5K7VpvuQVhHpmV4OlXvj9x0QOLSKw0jkhtFMbkWRMtljdm20d8s0Sh3we', '2017-10-16 05:46:40', '2017-10-16 05:46:40'),
(10, 2, 'QA', 'QA@mahacode.com', '$2y$10$Zh2CI8Skt5eIU7tZ0UMoW.INX0r2Tr/k8fXnAL9seChN/vlej2rDi', 1, 1, 'gA6d353dpLkJ6L4xxCsFBvCmySgb2WmJw3awF5joKRjy3fVgBqgUhMlU9Xit', '2017-10-16 06:33:26', '2017-10-16 06:33:26'),
(11, 2, 'Admin', 'admin@admin.com', '$2y$10$UsK8TojQ6MBSJZgfInoTSOS0Xf0E7u7LsniZscNJ6BCxlsAVsIYnW', 1, 1, 'KbxeAq7dbPdZl4FAooSYSt1DRMZW79ayYBTex1c07JzRfPWLtMAC7KzTA52p', '2017-10-26 21:31:02', '2017-10-26 21:31:02'),
(12, 2, 'ramy shaalan', 'ceo@mashroo3k.com', '$2y$10$Yk3zrxJE2q/FLvBgaKMLv.RJK2HNsNdPfU5zF4UZVPCLJS2uk7RvW', 1, 1, NULL, '2017-10-28 13:22:01', '2017-10-28 13:22:01'),
(13, 2, 'Safwat Rabea', 'Safwat@mahacode.com', '$2y$10$kJY0IkrYwrGgGAAzxxkQk.r1h7.AjDTEYuFl2fG8de5nj.g0qwP06', 1, 1, NULL, '2017-10-28 14:59:29', '2017-10-28 14:59:29'),
(14, 2, 'QC', 'QC@mahacode.com', '$2y$10$td9OhN7qb7Eb/D/I2uVyE.MMVccPOYgfeg1PyP6hVchJdqQcCcHz.', 1, 1, NULL, '2017-10-28 16:32:59', '2017-10-28 16:32:59'),
(15, 2, 'reem', 'reem@mahacode.com', '$2y$10$6AIugnBOiSjdhXq6HwOtuebJNiZTNV3i7eGtpM3h55Wq5/y2vmlBm', 1, 1, NULL, '2017-10-29 13:40:05', '2017-10-29 13:40:05'),
(16, 2, 'hm', 'hm@mahacode.com', '$2y$10$2iIKwd9b/YhEOJBm74c8MeA.6bR1gP1wmDBR2D5ML2xuBUSumyrUi', 1, 1, NULL, '2017-11-04 19:23:00', '2017-11-04 19:23:00'),
(17, 2, 'project', 'pr@mahacode.com', '$2y$10$yjxvNIE5II.T8YeEFAmKSO3Gf9/R8mDDHn6aTJsuTRbY0XbcwS0CS', 1, 1, '7kaBaaeztZ4XzdX47TWC6UykvYhGdVWWnKHlhRoKlxQz51NUqDYcTb6A6xGd', '2017-11-05 15:09:17', '2017-11-05 15:09:17'),
(18, 2, 'جمال عبدالناصر جمعة حسين', 'operations@mashroo3k.com', '$2y$10$MkGos6V0/MySTEHBrwbrfuSx.91q9QNSKVIEEBIZQQhPBVGoquxTG', 1, 1, NULL, '2017-11-06 20:11:29', '2017-11-06 20:11:29'),
(19, 2, 'ميسرة محمد عصام حامد', 'maisara.esam@mashroo3k.net', '$2y$10$MHG1rl4Mp2K8HajcgpoYKeCL9EbKKjlo1UIIxOCy5a5JjafJTrmVu', 1, 1, NULL, '2017-11-06 20:16:20', '2017-11-06 20:16:20'),
(20, 2, 'Ahmed Sayed', 'ahmedsayed@mashroo3k.net', '$2y$10$wOx1xfGDl0SFU9KMP0uH5OB3xe5m9UziXck30gN.90sh18ot2noI6', 1, 1, NULL, '2017-11-06 20:28:19', '2017-11-06 20:28:19'),
(21, 2, 'Ssss', 'ssss@ddd.hg', '$2y$10$WLNfjY.znsEgo54pv1EGZuj6gi9KLmwgHn.X8Ho8zqfipRZXOx5Fu', 1, 1, NULL, '2017-11-13 17:28:48', '2017-11-13 17:28:48'),
(22, 2, 'yasmine', 'yasmine.mamdouh@mahacode.com', '$2y$10$Vnw4Dx.Lfh7yWGYmDJH32eh7sKzTfHoSKoZNelXtf6YoIriDxqgxm', 1, 1, 'Mn5p9CCUjATWjeadQ2gigoQrOaoeFG5OGi4wZhHpPSKFzAuWzYFq9jeejz8l', '2018-02-19 15:09:23', '2018-02-19 15:09:23'),
(23, 2, 'smah', 'smah@yahoo.com', '$2y$10$/5tNATzXlEjLm6kqjguV4.f0IMES6ILD7NzMy0hgm3kwMVglqtLGC', 1, 1, 'Ytr5fVFUMwvmB4uIQPRPiFrBzC8lVn1wbEKRKJllxQBTAhqJUkeuYAnP6OEr', '2018-04-07 08:44:30', '2018-04-07 08:44:30'),
(24, 2, 'mostapha', 'mostapha@yahoo.com', '$2y$10$cpb1eX80jjmvcLhLs0./duG4/3pyvfzD8OKTULb3c.1pmdeKRTG8W', 1, 1, NULL, '2018-04-07 12:45:20', '2018-04-07 12:45:20'),
(25, 2, 'mostaphatest', 'mostaphatest@mm.com', '$2y$10$77p1kQcBROa1N5quWKoEb.LaEwNwmGT1x2xLeFxDMiIfy2i1qYW9O', 1, 1, '0Qdk4FhAd8dZgJRO8Uj1MzeYXIFJHC7mKrCbW9vColWsMe60zpHf6imjOIdA', '2018-04-08 06:29:36', '2018-04-08 06:29:36'),
(26, 2, 'Mohamed', 'mmm@mahacode.com', '$2y$10$3e8McubTZm.ZjIS8q/vRjO1igfuKAiaACEMVlV9SnoxXQCOpc/AZu', 1, 1, NULL, '2018-04-08 11:36:24', '2018-04-08 11:36:24'),
(27, 2, 'Mohamed', 'm@admin.com', '$2y$10$MIU5XmSCbrBrRM3Rj1JJ4.vJU840UFdwkj5Xr/TC71X87KLWtt6b2', 1, 1, 'iCahGOau4I521BBeVH09aC73zEyjs1JhCWQWaZzu8ky1qtSJ27eU5dkYAVXq', '2018-04-12 07:05:33', '2018-04-12 07:05:33'),
(28, 2, 'yasz', 'yaz@mahacode.com', '$2y$10$OxGMzdU.9W2gFCbQHv0yw.5wvTFemPpk0zkfW26xMzZ4SSK.HCy.K', 1, 1, 'fZx8X0YO7SWQNh6wJFFZiUXN0caHnGi2aCVXMDVL1mBrIeC6jCGvLRtaW5ly', '2018-04-12 08:53:45', '2018-04-12 08:53:45'),
(29, 2, 'Mohamed', 'm@mahacode.com', '$2y$10$iQLnpqvMOnwAiGOnU93vUubL6oQUnrV3uRkLM6aRCLt7UT04On/YS', 1, 1, '10iRKnZ9bLqlnzAVpJUpeQgcRTh677aemACl1b4GaHFadSswnBVqRyLAe62N', '2018-04-12 09:12:27', '2018-04-12 09:12:27'),
(30, 2, 'Mohamed', 'm@mm.com', '$2y$10$e7BxV4iO32QVG5e.HQ4yn.c/UtVuQF9GJIgFnWQ4YYARqDTm00DHm', 1, 1, NULL, '2018-04-12 11:36:21', '2018-04-12 11:36:21'),
(31, 2, 'new', 'new@mahacode.com', '$2y$10$/gwrNKck3y68WRBSXQ/NreDUqKU9EKhopSwxiPCwS.QKAO5HGIzBe', 1, 1, 'ItSSen9rQOdZdiCZkLrvcWvXwPcpusYNEhfzqXRFMi8eR0oArqOYsG0k8bBr', '2018-04-25 07:43:51', '2018-04-25 07:43:51'),
(32, 2, 'Mohamed', 'mmmm@mahacode.com', '$2y$10$4sN8G0k9GILoBAGJ.JCa.u/mFaNhQnXAR17.AmsT5knGogW5JBZlu', 1, 1, 'DFGZbor6DLImpVxWotDukAZwdPhKIcysHECwQhMfk8hveyX1M0ErunipSWHS', '2018-04-25 09:34:01', '2018-04-25 09:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sectors_translations`
--
ALTER TABLE `sectors_translations`
  ADD CONSTRAINT `sectors_translations_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sidebar_items`
--
ALTER TABLE `sidebar_items`
  ADD CONSTRAINT `sidebar_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `sidebar_menus` (`menu_id`) ON DELETE SET NULL;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_assets`
--
ALTER TABLE `studies_assets`
  ADD CONSTRAINT `studies_assets_deprecation_id_foreign` FOREIGN KEY (`deprecation_id`) REFERENCES `deprecations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_assets_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_assets_translations`
--
ALTER TABLE `studies_assets_translations`
  ADD CONSTRAINT `studies_assets_translations_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `studies_assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_competitors`
--
ALTER TABLE `studies_competitors`
  ADD CONSTRAINT `studies_competitors_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `studies_products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_competitors_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_competitors_translations`
--
ALTER TABLE `studies_competitors_translations`
  ADD CONSTRAINT `studies_competitors_translations_competitor_id_foreign` FOREIGN KEY (`competitor_id`) REFERENCES `studies_competitors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_expenses`
--
ALTER TABLE `studies_expenses`
  ADD CONSTRAINT `studies_expenses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `expenses_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_expenses_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_expenses_translations`
--
ALTER TABLE `studies_expenses_translations`
  ADD CONSTRAINT `studies_expenses_translations_studies_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `studies_expenses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_finance_investments`
--
ALTER TABLE `studies_finance_investments`
  ADD CONSTRAINT `studies_finance_investments_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_four_analyze`
--
ALTER TABLE `studies_four_analyze`
  ADD CONSTRAINT `studies_four_analyze_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_four_analyze_translations`
--
ALTER TABLE `studies_four_analyze_translations`
  ADD CONSTRAINT `studies_four_analyze_translations_four_analyze_id_foreign` FOREIGN KEY (`four_analyze_id`) REFERENCES `studies_four_analyze` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_increases_rate`
--
ALTER TABLE `studies_increases_rate`
  ADD CONSTRAINT `studies_increases_rate_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_marketing`
--
ALTER TABLE `studies_marketing`
  ADD CONSTRAINT `studies_marketing_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_marketing_translations`
--
ALTER TABLE `studies_marketing_translations`
  ADD CONSTRAINT `studies_marketing_translations_marketing_id_foreign` FOREIGN KEY (`marketing_id`) REFERENCES `studies_marketing` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_products`
--
ALTER TABLE `studies_products`
  ADD CONSTRAINT `studies_products_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_products_translations`
--
ALTER TABLE `studies_products_translations`
  ADD CONSTRAINT `studies_products_translations_studies_products_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `studies_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_raw_materials`
--
ALTER TABLE `studies_raw_materials`
  ADD CONSTRAINT `studies_raw_materials_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studies_raw_materials_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_rw_mat_translations`
--
ALTER TABLE `studies_rw_mat_translations`
  ADD CONSTRAINT `studies_rw_mat_translations_raw_material_id_foreign` FOREIGN KEY (`raw_material_id`) REFERENCES `studies_raw_materials` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_sectors`
--
ALTER TABLE `studies_sectors`
  ADD CONSTRAINT `studies_sectors_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_sectors_translations`
--
ALTER TABLE `studies_sectors_translations`
  ADD CONSTRAINT `studies_sectors_translations_sector_id_foreign` FOREIGN KEY (`studies_sector_id`) REFERENCES `studies_sectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studies_translations`
--
ALTER TABLE `studies_translations`
  ADD CONSTRAINT `studies_translations_study_id_foreign` FOREIGN KEY (`study_id`) REFERENCES `studies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `unites_translations`
--
ALTER TABLE `unites_translations`
  ADD CONSTRAINT `unites_translations_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `unites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
