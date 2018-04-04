-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 02:58 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `previewm_gadwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `cities_translations` (
  `id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(10) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `video` text COLLATE utf8mb4_unicode_ci,
  `hint_step` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `step_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hint_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `content_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `contents_translations` (
  `id` int(10) unsigned NOT NULL,
  `content_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `countries_translations` (
  `id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
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

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `currencies_translations` (
  `id` int(10) unsigned NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deprecations`
--

CREATE TABLE IF NOT EXISTS `deprecations` (
  `id` int(10) unsigned NOT NULL,
  `percentage` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `deprecations_translations` (
  `id` int(10) unsigned NOT NULL,
  `deprecation_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `expenses_categories` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1'
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

CREATE TABLE IF NOT EXISTS `expenses_categories_translations` (
  `id` int(10) unsigned NOT NULL,
  `expense_categories_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
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

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
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

CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `sectors_translations` (
  `id` int(10) unsigned NOT NULL,
  `sector_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
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

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `option_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sidebar_items`
--

CREATE TABLE IF NOT EXISTS `sidebar_items` (
  `item_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_access` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ordering` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `sidebar_menus` (
  `menu_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles_access` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `ordering` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `have_header` int(11) DEFAULT '1',
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `studies` (
  `id` int(10) unsigned NOT NULL,
  `working_capital_months` int(11) DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `space` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `sector_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`id`, `working_capital_months`, `phone`, `space`, `email`, `location`, `user_id`, `country_id`, `city_id`, `currency_id`, `sector_id`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(3, NULL, '0111112223344', '', 'root@mahacode.com', 'مدينة 6 اكتوبر', 2, 1, 1, 1, 1, '2017-09-14 11:17:21', '2017-10-14 10:56:05', NULL, 0),
(15, NULL, '44011111', '', 'root@mahacode.com', 'Bani-suef', 1, 1, 1, 1, 1, '2017-09-23 07:34:43', '2017-09-23 07:34:43', NULL, 0),
(16, NULL, '0148478669', '', 'root@mahacode.com', 'salah-salem', 1, 1, 1, 1, 1, '2017-09-23 07:36:43', '2017-09-23 07:36:43', NULL, 0),
(17, NULL, '011111', '100', 'root@mahacode.com', 'Bani-suef', 2, 1, 1, 1, 1, '2017-09-23 10:05:03', '2017-09-23 10:05:03', NULL, 0),
(18, NULL, '0501247896', '100', 'admin@mahacode.com', 'Bani-suef', 2, 1, 1, 1, 1, '2017-09-23 12:41:26', '2017-09-23 12:41:26', NULL, 0),
(19, NULL, '123456', '100', 'test@test.com', 'test', 2, 1, 1, 1, 1, '2017-09-23 13:07:38', '2017-09-23 13:07:38', NULL, 0),
(20, NULL, '0111112222', '100', 'root@mahacode.com', 'سش', 2, 1, 1, 1, 1, '2017-09-24 09:30:32', '2017-09-24 09:30:32', NULL, 0),
(21, NULL, '01111122233', '1000', 'root@mahacode.com', 'سشش', 2, 1, 1, 1, 1, '2017-09-24 09:43:24', '2017-09-24 09:43:24', NULL, 0),
(22, NULL, '011111', '5000', 'admin@mahacode.com', 'bns', 2, 1, 1, 1, 1, '2017-10-02 08:06:44', '2017-10-02 08:06:44', NULL, 0),
(23, NULL, '011111', '100', 'root@mahacode.com', 'سشdd', 2, 1, 1, 1, 1, '2017-10-02 08:15:34', '2017-10-02 08:15:34', NULL, 0),
(25, NULL, '011124333', '200', 'tester@mahacode.com', 'مدينة 6 اكتوبر', 9, 1, 1, 1, 1, '2017-10-16 06:07:47', '2017-10-16 11:34:54', NULL, 0),
(26, 2, '07775000', '7000', 'e@mahacode.com', 'بنى سويف ', 10, 1, 1, 1, 1, '2017-10-16 06:37:17', '2017-10-22 07:28:13', NULL, 0),
(27, 2, '0153655855', '1000', 'ceo@mashroo3k.com', 'الرياض', 12, 1, 1, 1, 1, '2017-10-28 13:23:46', '2017-10-28 13:27:16', NULL, 0),
(28, 2, '0', '50', 'e@mahacode.com', 'موقع ', 14, 1, 1, 1, 1, '2017-10-28 16:33:45', '2017-10-28 17:00:08', NULL, 0),
(29, 0, '1224938803', '444444', 'safwatrabea@gmail.com', 'ببب', 13, 1, 1, 1, 1, '2017-10-28 16:52:55', '2017-10-28 16:52:55', NULL, 0),
(30, 0, '', '', '', '', 15, 1, 1, 1, 1, '2017-10-29 13:40:53', '2017-10-29 13:42:17', NULL, 0),
(31, 0, '0123654789', '500', 'pn@yahoo.com', 'project location ', 16, 1, 1, 1, 1, '2017-11-05 14:50:44', '2017-11-05 14:50:44', NULL, 0),
(32, 2, '01112433658', '200', 'PM@mahacode.com', 'project location ', 17, 1, 1, 1, 1, '2017-11-05 15:10:40', '2017-11-05 16:12:51', NULL, 0),
(33, 2, '01102102155', '10000', 'operations@mashroo3k.com', 'الرياض ', 18, 1, 1, 1, 1, '2017-11-06 20:22:18', '2017-11-07 13:36:41', NULL, 0),
(34, 0, '01008075630', '10000', 'Maisara.esam@mashroo3k.net', 'أبو ظبي', 19, 1, 1, 1, 1, '2017-11-06 20:31:10', '2017-11-06 20:31:10', NULL, 0),
(35, 1, '01102102155', '250', 'ay7aga@mashroo3k.net', 'القاهرة', 20, 1, 1, 1, 1, '2017-11-06 20:36:39', '2017-11-06 20:52:55', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studies_assets`
--

CREATE TABLE IF NOT EXISTS `studies_assets` (
  `id` int(10) unsigned NOT NULL,
  `value` double DEFAULT NULL,
  `space` double DEFAULT NULL,
  `count` int(20) DEFAULT NULL,
  `deprecation_id` int(10) unsigned DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_assets`
--

INSERT INTO `studies_assets` (`id`, `value`, `space`, `count`, `deprecation_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1000, 100, NULL, 1, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(2, 1000, 100, NULL, 2, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(3, 1100, NULL, 11, 3, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(4, 1000, NULL, 10, 4, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(5, 100, NULL, NULL, 5, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(6, 10000, NULL, 100, 6, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(7, 1200, NULL, 12, 3, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(8, 10022, NULL, 100, 4, 28, '2017-10-28 16:39:10', '2017-10-28 16:39:10', NULL),
(9, 50, 50, NULL, 2, 26, '2017-10-29 02:33:18', '2017-10-29 02:33:18', NULL),
(10, 1000, 100, NULL, 2, 27, '2017-11-04 13:23:24', '2017-11-04 13:23:24', NULL),
(11, 50000, NULL, 2, 3, 27, '2017-11-04 13:23:25', '2017-11-04 13:23:25', NULL),
(12, 100000, NULL, 3, 4, 27, '2017-11-04 13:23:26', '2017-11-04 13:23:26', NULL),
(13, 15000, NULL, NULL, 5, 27, '2017-11-04 13:23:26', '2017-11-04 13:23:26', NULL),
(14, 100000, NULL, 1, 6, 27, '2017-11-04 13:23:26', '2017-11-04 13:23:26', NULL),
(15, 5000, 50, NULL, 1, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(16, 1000, 100, NULL, 2, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(17, 500000, NULL, 500, 3, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(18, 50000, NULL, 50, 4, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(19, 500000, NULL, NULL, 5, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(21, 2000, 200, NULL, 2, 32, '2017-11-05 15:36:46', '2017-11-05 15:36:46', NULL),
(22, 5000, NULL, 50, 6, 32, '2017-11-05 15:39:26', '2017-11-05 15:39:26', NULL),
(23, 100, 10000, NULL, 1, 33, '2017-11-06 20:36:13', '2017-11-07 13:33:51', NULL),
(24, 377743, NULL, NULL, 3, 35, '2017-11-06 20:44:36', '2017-11-06 20:44:36', NULL),
(25, 57000, NULL, NULL, 5, 35, '2017-11-06 20:44:36', '2017-11-06 20:44:36', NULL),
(26, 197972, NULL, NULL, 6, 35, '2017-11-06 20:44:36', '2017-11-06 20:44:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_assets_translations`
--

CREATE TABLE IF NOT EXISTS `studies_assets_translations` (
  `id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_assets_translations`
--

INSERT INTO `studies_assets_translations` (`id`, `asset_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', '', NULL),
(2, 2, 'ar', 'بيان14', NULL),
(3, 3, 'ar', 'بيان 16', NULL),
(4, 4, 'ar', 'سياره', NULL),
(5, 5, 'ar', 'بيان25', NULL),
(6, 6, 'ar', 'بيان1416', NULL),
(7, 7, 'ar', 'بيان14', NULL),
(8, 8, 'ar', 'سياره2', NULL),
(9, 9, 'ar', 'ارض', NULL),
(10, 10, 'ar', 'مبانى', NULL),
(11, 11, 'ar', 'االالات', NULL),
(12, 12, 'ar', 'سايره', NULL),
(13, 13, 'ar', 'دراسات', NULL),
(14, 14, 'ar', 'اثاث', NULL),
(15, 15, 'ar', '', NULL),
(16, 16, 'ar', 'انشاء ', NULL),
(17, 17, 'ar', 'معده ', NULL),
(18, 18, 'ar', 'سيارة ', NULL),
(19, 19, 'ar', 'مصاريف ما قبل التشغيل ', NULL),
(21, 21, 'ar', 'انشاء 2', NULL),
(22, 22, 'ar', 'تجهيز ', NULL),
(23, 23, 'ar', '', NULL),
(24, 24, 'ar', 'الات كتير', NULL),
(25, 25, 'ar', 'مصروفات ما قبل التشغيل', NULL),
(26, 26, 'ar', 'الاثاث كله', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_competitors`
--

CREATE TABLE IF NOT EXISTS `studies_competitors` (
  `id` int(10) unsigned NOT NULL,
  `study_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_competitors`
--

INSERT INTO `studies_competitors` (`id`, `study_id`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 3, '2017-09-27 07:33:38', '2017-09-27 07:33:38', NULL),
(6, 25, '2017-10-16 06:24:04', '2017-10-16 06:24:04', NULL),
(15, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49', NULL),
(16, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49', NULL),
(17, 29, '2017-10-28 18:23:41', '2017-10-28 18:23:41', NULL),
(18, 27, '2017-11-04 13:20:56', '2017-11-04 13:20:56', NULL),
(25, 33, '2017-11-06 20:31:18', '2017-11-06 20:31:18', NULL),
(68, 35, '2017-11-06 20:39:38', '2017-11-06 20:39:38', NULL),
(72, 34, '2017-11-06 20:53:58', '2017-11-06 20:53:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_competitors_translations`
--

CREATE TABLE IF NOT EXISTS `studies_competitors_translations` (
  `id` int(10) unsigned NOT NULL,
  `competitor_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_competitors_translations`
--

INSERT INTO `studies_competitors_translations` (`id`, `competitor_id`, `locale`, `title`, `description`, `product`, `place`) VALUES
(1, 1, 'ar', 'منافس', NULL, 'منتج', 'مصر'),
(5, 6, 'ar', '', NULL, '', ''),
(14, 15, 'ar', 'منافس', NULL, 'منتجات', 'مكان'),
(15, 16, 'ar', 'منافس1', NULL, 'منتجات1', 'مكان 1 '),
(16, 17, 'ar', 'ياسمين ', NULL, 'ياسمين', 'حى الياتسيمين'),
(17, 18, 'ar', 'الشعلان', NULL, NULL, NULL),
(23, 25, 'ar', 'الشعلان ', NULL, 'أعلاف حيوانية ', 'مكة المكرمة '),
(66, 68, 'ar', 'منافس 1', NULL, 'مشروبات', 'القاهرة'),
(70, 72, 'ar', 'اسمنت شكري', NULL, 'اسمنت', 'دبي');

-- --------------------------------------------------------

--
-- Table structure for table `studies_expenses`
--

CREATE TABLE IF NOT EXISTS `studies_expenses` (
  `id` int(10) unsigned NOT NULL,
  `value` double DEFAULT NULL,
  `space` double DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_expenses`
--

INSERT INTO `studies_expenses` (`id`, `value`, `space`, `count`, `category_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 46, NULL, 55, 5, 26, '2017-10-22 09:53:52', '2017-10-22 09:53:52', NULL),
(3, 566, NULL, NULL, 2, 26, '2017-10-22 09:57:47', '2017-10-22 09:57:47', NULL),
(4, 535, NULL, NULL, 3, 26, '2017-10-22 09:57:47', '2017-10-22 09:57:47', NULL),
(5, 23, 56, NULL, 4, 26, '2017-10-24 12:06:07', '2017-10-24 12:06:07', NULL),
(12, 50, NULL, NULL, 1, 26, '2017-10-25 09:17:12', '2017-10-25 09:17:12', NULL),
(14, 77, NULL, NULL, 2, 28, '2017-10-28 16:43:47', '2017-10-28 16:43:47', NULL),
(15, 55, NULL, NULL, 3, 28, '2017-10-28 16:43:47', '2017-10-28 16:43:47', NULL),
(16, 222, 22, NULL, 4, 28, '2017-10-28 16:43:47', '2017-10-28 16:43:47', NULL),
(17, 5000, NULL, 50, 5, 28, '2017-10-28 16:43:47', '2017-10-28 16:43:47', NULL),
(26, 5000, NULL, 50, 5, 28, '2017-10-28 16:43:53', '2017-10-28 16:43:53', NULL),
(49, 66, NULL, NULL, 1, 28, '2017-10-28 16:43:55', '2017-10-28 16:43:55', NULL),
(54, 77, NULL, NULL, 1, 28, '2017-10-28 16:43:55', '2017-10-28 16:43:55', NULL),
(84, 444, 44, NULL, 4, 28, '2017-10-28 16:43:57', '2017-10-28 16:43:57', NULL),
(146, 3333, 33, NULL, 4, 28, '2017-10-28 16:44:06', '2017-10-28 16:44:06', NULL),
(160, 222, 22, NULL, 4, 28, '2017-10-28 16:44:08', '2017-10-28 16:44:08', NULL),
(166, 1000, NULL, NULL, 1, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(167, 2000, NULL, NULL, 2, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(168, 15000, NULL, NULL, 3, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(169, 250, 600, NULL, 4, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(170, 5000, NULL, 2, 5, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(171, 50000, NULL, NULL, 1, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(172, 60000, NULL, NULL, 2, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(173, 9000, NULL, NULL, 3, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(174, 200000, 200, NULL, 4, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(175, 5000, NULL, 500, 5, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(176, 7000, NULL, NULL, 1, 35, '2017-11-06 20:48:47', '2017-11-06 20:48:47', NULL),
(177, 4000, NULL, NULL, 2, 35, '2017-11-06 20:48:48', '2017-11-06 20:48:48', NULL),
(178, 4750, NULL, NULL, 3, 35, '2017-11-06 20:48:48', '2017-11-06 20:48:48', NULL),
(179, 12500, 250, NULL, 4, 35, '2017-11-06 20:48:48', '2017-11-06 20:48:48', NULL),
(180, 24000, NULL, 1, 5, 35, '2017-11-06 20:48:48', '2017-11-06 20:50:44', NULL),
(181, 3000, NULL, NULL, 1, 33, '2017-11-07 13:32:36', '2017-11-07 13:32:36', NULL),
(182, 1000, NULL, NULL, 3, 33, '2017-11-07 13:32:36', '2017-11-07 13:32:36', NULL),
(183, 1000, 10000, NULL, 4, 33, '2017-11-07 13:32:36', '2017-11-07 13:32:36', NULL),
(184, 1000, NULL, 3, 5, 33, '2017-11-07 13:32:36', '2017-11-07 13:32:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_expenses_translations`
--

CREATE TABLE IF NOT EXISTS `studies_expenses_translations` (
  `id` int(10) unsigned NOT NULL,
  `expense_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_expenses_translations`
--

INSERT INTO `studies_expenses_translations` (`id`, `expense_id`, `locale`, `title`, `description`, `item`, `location`, `type`) VALUES
(2, 2, 'ar', NULL, NULL, 'بيان 11', '', ''),
(3, 3, 'ar', NULL, NULL, '', '', 'بيان '),
(4, 4, 'ar', NULL, NULL, '', '', '545'),
(5, 5, 'ar', NULL, NULL, '', 'dd', ''),
(12, 12, 'ar', NULL, NULL, 'بيان 11', '', ''),
(14, 14, 'ar', NULL, NULL, '', '', 'ن'),
(15, 15, 'ar', NULL, NULL, '', '', 'س'),
(16, 16, 'ar', NULL, NULL, '', 'ي', ''),
(17, 17, 'ar', NULL, NULL, 'ر', '', ''),
(26, 26, 'ar', NULL, NULL, 'ر', '', ''),
(49, 49, 'ar', NULL, NULL, 'ت', '', ''),
(54, 54, 'ar', NULL, NULL, 'ه', '', ''),
(84, 84, 'ar', NULL, NULL, '', 'ف', ''),
(146, 146, 'ar', NULL, NULL, '', 'س', ''),
(160, 160, 'ar', NULL, NULL, '', 'ي', ''),
(166, 166, 'ar', NULL, NULL, 'مياه', '', ''),
(167, 167, 'ar', NULL, NULL, '', '', 'مصاريف'),
(168, 168, 'ar', NULL, NULL, '', '', 'تسويق'),
(169, 169, 'ar', NULL, NULL, '', 'الرياض', ''),
(170, 170, 'ar', NULL, NULL, 'مرتبات', '', ''),
(171, 171, 'ar', NULL, NULL, 'المنافع ', '', ''),
(172, 172, 'ar', NULL, NULL, '', '', 'المصاريف الاداريه والعمومية'),
(173, 173, 'ar', NULL, NULL, '', '', 'التسويق'),
(174, 174, 'ar', NULL, NULL, '', 'الايجار', ''),
(175, 175, 'ar', NULL, NULL, 'والاجور', '', ''),
(176, 176, 'ar', NULL, NULL, 'كهرباء و مياة', '', ''),
(177, 177, 'ar', NULL, NULL, '', '', 'مصروفات عمومية'),
(178, 178, 'ar', NULL, NULL, '', '', 'دعاية و اعلان'),
(179, 179, 'ar', NULL, NULL, '', 'القاهرة', ''),
(180, 180, 'ar', NULL, NULL, 'كلهم علي بعضهم ؟!!', '', ''),
(181, 181, 'ar', NULL, NULL, 'المياه والكهرباء والوقود ', '', ''),
(182, 182, 'ar', NULL, NULL, '', '', 'التسويق '),
(183, 183, 'ar', NULL, NULL, '', 'الرياض', ''),
(184, 184, 'ar', NULL, NULL, 'موظفين ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studies_finance_investments`
--

CREATE TABLE IF NOT EXISTS `studies_finance_investments` (
  `id` int(10) unsigned NOT NULL,
  `personal_investment` double DEFAULT NULL,
  `loan` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_finance_investments`
--

INSERT INTO `studies_finance_investments` (`id`, `personal_investment`, `loan`, `other`, `study_id`, `created_at`, `updated_at`) VALUES
(4, 50, 20, 30, 3, '2017-10-08 07:46:59', '2017-10-08 07:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `studies_four_analyze`
--

CREATE TABLE IF NOT EXISTS `studies_four_analyze` (
  `id` int(10) unsigned NOT NULL,
  `study_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_four_analyze`
--

INSERT INTO `studies_four_analyze` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2017-09-27 13:29:27', '2017-09-27 13:29:27'),
(6, 25, '2017-10-16 06:24:04', '2017-10-16 06:24:04'),
(10, NULL, '2017-10-25 09:51:00', '2017-10-25 09:51:00'),
(11, NULL, '2017-10-25 09:57:30', '2017-10-25 09:57:30'),
(12, NULL, '2017-10-25 10:12:37', '2017-10-25 10:12:37'),
(13, NULL, '2017-10-25 11:23:16', '2017-10-25 11:23:16'),
(14, NULL, '2017-10-26 08:35:21', '2017-10-26 08:35:21'),
(15, NULL, '2017-10-26 09:00:46', '2017-10-26 09:00:46'),
(16, NULL, '2017-10-26 09:11:41', '2017-10-26 09:11:41'),
(17, NULL, '2017-10-26 10:50:04', '2017-10-26 10:50:04'),
(18, NULL, '2017-10-28 13:23:56', '2017-10-28 13:23:56'),
(19, NULL, '2017-10-28 13:25:56', '2017-10-28 13:25:56'),
(20, NULL, '2017-10-28 13:26:02', '2017-10-28 13:26:02'),
(24, NULL, '2017-10-28 13:26:32', '2017-10-28 13:26:32'),
(25, NULL, '2017-10-28 16:34:28', '2017-10-28 16:34:28'),
(26, NULL, '2017-10-28 16:34:57', '2017-10-28 16:34:57'),
(27, 28, '2017-10-28 16:36:50', '2017-10-28 16:36:50'),
(29, NULL, '2017-10-28 16:49:39', '2017-10-28 16:49:39'),
(30, NULL, '2017-10-28 16:49:48', '2017-10-28 16:49:48'),
(31, NULL, '2017-10-28 16:53:10', '2017-10-28 16:53:10'),
(32, NULL, '2017-10-28 16:53:30', '2017-10-28 16:53:30'),
(33, NULL, '2017-10-28 16:53:46', '2017-10-28 16:53:46'),
(34, NULL, '2017-10-28 17:01:10', '2017-10-28 17:01:10'),
(35, NULL, '2017-10-28 18:16:31', '2017-10-28 18:16:31'),
(36, 29, '2017-10-28 18:23:41', '2017-10-28 18:23:41'),
(37, NULL, '2017-10-29 02:32:45', '2017-10-29 02:32:45'),
(38, NULL, '2017-10-29 02:36:06', '2017-10-29 02:36:06'),
(39, NULL, '2017-10-29 13:39:24', '2017-10-29 13:39:24'),
(40, NULL, '2017-10-29 13:41:16', '2017-10-29 13:41:16'),
(41, NULL, '2017-10-29 13:42:20', '2017-10-29 13:42:20'),
(42, NULL, '2017-10-29 13:42:26', '2017-10-29 13:42:26'),
(43, NULL, '2017-10-29 13:42:50', '2017-10-29 13:42:50'),
(44, NULL, '2017-10-29 15:58:51', '2017-10-29 15:58:51'),
(45, 27, '2017-11-04 13:20:55', '2017-11-04 13:20:55'),
(46, NULL, '2017-11-04 13:20:56', '2017-11-04 13:20:56'),
(48, NULL, '2017-11-05 14:56:04', '2017-11-05 14:56:04'),
(49, NULL, '2017-11-05 15:10:44', '2017-11-05 15:10:44'),
(50, NULL, '2017-11-05 15:15:03', '2017-11-05 15:15:03'),
(51, NULL, '2017-11-05 15:15:24', '2017-11-05 15:15:24'),
(52, NULL, '2017-11-05 15:16:06', '2017-11-05 15:16:06'),
(53, NULL, '2017-11-05 15:17:42', '2017-11-05 15:17:42'),
(54, NULL, '2017-11-05 15:18:15', '2017-11-05 15:18:15'),
(57, NULL, '2017-11-05 17:35:51', '2017-11-05 17:35:51'),
(58, NULL, '2017-11-06 20:22:28', '2017-11-06 20:22:28'),
(59, NULL, '2017-11-06 20:22:54', '2017-11-06 20:22:54'),
(60, NULL, '2017-11-06 20:31:31', '2017-11-06 20:31:31'),
(61, NULL, '2017-11-06 20:31:36', '2017-11-06 20:31:36'),
(62, 33, '2017-11-06 20:32:38', '2017-11-06 20:32:38'),
(105, 35, '2017-11-06 20:39:38', '2017-11-06 20:39:38'),
(106, NULL, '2017-11-06 20:40:55', '2017-11-06 20:40:55'),
(110, 34, '2017-11-06 20:54:00', '2017-11-06 20:54:00'),
(111, NULL, '2017-11-13 17:29:36', '2017-11-13 17:29:36'),
(112, NULL, '2017-11-13 17:29:49', '2017-11-13 17:29:49'),
(113, NULL, '2018-02-19 14:40:57', '2018-02-19 14:40:57'),
(114, NULL, '2018-02-19 14:41:00', '2018-02-19 14:41:00'),
(115, NULL, '2018-02-19 14:42:08', '2018-02-19 14:42:08'),
(116, NULL, '2018-02-19 14:42:11', '2018-02-19 14:42:11'),
(117, NULL, '2018-02-19 14:43:42', '2018-02-19 14:43:42'),
(118, NULL, '2018-02-19 14:56:56', '2018-02-19 14:56:56'),
(119, NULL, '2018-02-19 14:56:59', '2018-02-19 14:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `studies_four_analyze_translations`
--

CREATE TABLE IF NOT EXISTS `studies_four_analyze_translations` (
  `id` int(10) unsigned NOT NULL,
  `four_analyze_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` text COLLATE utf8mb4_unicode_ci,
  `athreat` text COLLATE utf8mb4_unicode_ci,
  `chance` text COLLATE utf8mb4_unicode_ci,
  `challenge` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_four_analyze_translations`
--

INSERT INTO `studies_four_analyze_translations` (`id`, `four_analyze_id`, `locale`, `power`, `athreat`, `chance`, `challenge`) VALUES
(1, 1, 'ar', 'قوة', 'تهديد', 'فرصة', 'تحدي'),
(5, 6, 'ar', '', '', '', ''),
(12, 27, 'ar', 'قوة', 'تهديد', 'فرصه', 'تحدى'),
(14, 36, 'ar', 'ياسمينه', 'يامسين', 'ياسمش', 'ميتاسا'),
(15, 45, 'ar', 'الاى', 'سبلاىلى', 'سبلاسلقلا', 'سللاسقفلا'),
(18, 62, 'ar', 'الجودة', 'سياسات الدولة ', 'التشجيع ', 'قله العمالة'),
(61, 105, 'ar', 'الخدمة المتميزة', 'جودة الطعام', 'زيادة اعداد السكان', 'زيادة عدد المنافسين'),
(65, 110, 'ar', 'الموقع متميز جغرافيا، سعر بيع منخفض عن السوق ', 'عدم توافر المواد الخام بصفة دورية و العتماد على مورد واحد', 'تشجيع الدولة على الاستثمار وسهولة الحصول على قرض تمويلي', 'وجود عدد كبير من المنافسين في السوق');

-- --------------------------------------------------------

--
-- Table structure for table `studies_increases_rate`
--

CREATE TABLE IF NOT EXISTS `studies_increases_rate` (
  `id` int(10) unsigned NOT NULL,
  `years` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_increases_rate`
--

INSERT INTO `studies_increases_rate` (`id`, `years`, `percentage`, `study_id`, `created_at`, `updated_at`) VALUES
(1, 'السنة الأولى', 50, 3, '2017-10-02 12:36:27', '2017-10-02 12:36:27'),
(2, 'السنة الثانية', 60, 3, '2017-10-02 12:36:27', '2017-10-02 12:36:27'),
(3, 'السنة الثالثة', 70, 3, '2017-10-02 12:36:27', '2017-10-02 12:36:27'),
(4, 'السنة الرابعة', 80, 3, '2017-10-02 12:36:27', '2017-10-02 12:36:27'),
(5, 'السنة الخامسة', 100, 3, '2017-10-02 12:36:27', '2017-10-02 12:36:27'),
(7, '', 0, 25, '2017-10-16 06:08:28', '2017-10-16 06:08:28'),
(8, '', 0, 25, '2017-10-16 06:08:28', '2017-10-16 06:08:28'),
(9, '', 0, 25, '2017-10-16 06:08:28', '2017-10-16 06:08:28'),
(10, '', 0, 25, '2017-10-16 06:08:28', '2017-10-16 06:08:28'),
(11, '', 0, 25, '2017-10-16 06:08:28', '2017-10-16 06:08:28'),
(12, '1', 60, 26, '2017-10-16 06:56:42', '2017-10-25 06:49:47'),
(13, '1', 70, 26, '2017-10-16 06:56:42', '2017-10-25 06:49:47'),
(14, '1 ', 80, 26, '2017-10-16 06:56:42', '2017-10-25 06:49:47'),
(15, '1', 90, 26, '2017-10-16 06:56:42', '2017-10-25 06:49:47'),
(16, '1', 100, 26, '2017-10-16 06:56:42', '2017-10-25 06:49:48'),
(18, 'السنه الاولى', 70, 27, '2017-10-28 13:26:38', '2017-11-04 13:21:56'),
(19, 'الاثنيه', 80, 27, '2017-10-28 13:26:38', '2017-11-04 13:21:56'),
(20, 'الثالثه', 90, 27, '2017-10-28 13:26:38', '2017-11-04 13:21:56'),
(21, 'الرابعه', 100, 27, '2017-10-28 13:26:38', '2017-11-04 13:21:56'),
(22, 'الخامسه', 100, 27, '2017-10-28 13:26:38', '2017-11-04 13:21:56'),
(23, '1', 30, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47'),
(24, '2', 40, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47'),
(25, '3', 30, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47'),
(26, '4', 40, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47'),
(27, '5', 60, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47'),
(33, '', 0, 29, '2017-10-28 18:23:56', '2017-10-28 18:23:56'),
(34, '', 0, 29, '2017-10-28 18:23:56', '2017-10-28 18:23:56'),
(35, '', 0, 29, '2017-10-28 18:23:56', '2017-10-28 18:23:56'),
(36, '', 0, 29, '2017-10-28 18:23:56', '2017-10-28 18:23:56'),
(37, '', 0, 29, '2017-10-28 18:23:56', '2017-10-28 18:23:56'),
(43, '1', 60, 32, '2017-11-05 15:20:51', '2017-11-05 15:22:08'),
(44, '2', 70, 32, '2017-11-05 15:20:51', '2017-11-05 15:22:08'),
(45, '3', 80, 32, '2017-11-05 15:20:51', '2017-11-05 15:22:08'),
(46, '4', 90, 32, '2017-11-05 15:20:51', '2017-11-05 15:22:08'),
(47, '5', 100, 32, '2017-11-05 15:20:51', '2017-11-05 15:22:09'),
(49, 'الاولى ', 70, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53'),
(50, 'الثانية', 80, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53'),
(51, 'الثالثة', 90, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53'),
(52, 'الرابعة ', 90, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53'),
(53, 'الخامسة ', 100, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53'),
(54, 'السنة الاولي', 60, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55'),
(55, 'السنة الثانية', 70, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55'),
(56, 'السنة الثالثة', 80, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55'),
(57, 'السنة الرابعة', 90, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55'),
(58, 'السنة الخامسة', 100, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55'),
(59, '', 0, 15, '2018-02-19 14:41:02', '2018-02-19 14:41:02'),
(60, '', 0, 15, '2018-02-19 14:41:02', '2018-02-19 14:41:02'),
(61, '', 0, 15, '2018-02-19 14:41:02', '2018-02-19 14:41:02'),
(62, '', 0, 15, '2018-02-19 14:41:02', '2018-02-19 14:41:02'),
(63, '', 0, 15, '2018-02-19 14:41:02', '2018-02-19 14:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `studies_marketing`
--

CREATE TABLE IF NOT EXISTS `studies_marketing` (
  `id` int(10) unsigned NOT NULL,
  `study_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_marketing`
--

INSERT INTO `studies_marketing` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(2, 3, '2017-09-27 08:18:14', '2017-09-27 08:18:14'),
(3, 3, '2017-09-27 08:18:14', '2017-09-27 08:18:14'),
(8, 25, '2017-10-16 06:24:04', '2017-10-16 06:24:04'),
(19, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49'),
(20, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49'),
(21, 29, '2017-10-28 18:23:42', '2017-10-28 18:23:42'),
(22, 27, '2017-11-04 13:20:56', '2017-11-04 13:20:56'),
(29, 33, '2017-11-06 20:32:38', '2017-11-06 20:32:38'),
(72, 35, '2017-11-06 20:39:38', '2017-11-06 20:39:38'),
(76, 34, '2017-11-06 20:54:00', '2017-11-06 20:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `studies_marketing_translations`
--

CREATE TABLE IF NOT EXISTS `studies_marketing_translations` (
  `id` int(10) unsigned NOT NULL,
  `marketing_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_marketing_translations`
--

INSERT INTO `studies_marketing_translations` (`id`, `marketing_id`, `locale`, `title`, `description`) VALUES
(2, 2, 'ar', 'do marketing', NULL),
(3, 3, 'ar', 'publish post', NULL),
(7, 8, 'ar', '', NULL),
(18, 19, 'ar', 'ترويج', NULL),
(19, 20, 'ar', 'ترويج2', NULL),
(20, 21, 'ar', 'ياسمين', NULL),
(21, 22, 'ar', 'الترويج', NULL),
(27, 29, 'ar', 'السوشيال ميديا ', NULL),
(70, 72, 'ar', 'اعلانات الطرق', NULL),
(74, 76, 'ar', 'بنارات اعلان ، انترنت وسوشيال ميديا', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_products`
--

CREATE TABLE IF NOT EXISTS `studies_products` (
  `id` int(10) unsigned NOT NULL,
  `price` double DEFAULT NULL,
  `production` double DEFAULT NULL,
  `sales` double DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_products`
--

INSERT INTO `studies_products` (`id`, `price`, `production`, `sales`, `type`, `unit_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 500, 6000, 21, NULL, 1, 3, '2017-09-16 09:18:33', '2017-10-10 09:45:01', NULL),
(5, 400, 5000, NULL, NULL, 1, 3, '2017-10-02 08:49:14', '2017-10-10 09:45:02', NULL),
(6, 5000, 100, NULL, NULL, 1, 3, '2017-10-10 09:45:02', '2017-10-10 09:45:02', NULL),
(7, 7000, 1000, NULL, NULL, 1, 3, '2017-10-10 09:45:02', '2017-10-10 09:45:02', NULL),
(48, 500, 500, NULL, NULL, 1, 26, '2017-10-26 10:51:57', '2017-10-26 10:51:57', NULL),
(49, 30, 30, NULL, NULL, 1, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47', NULL),
(50, 40, 30, NULL, NULL, 1, 28, '2017-10-28 16:37:47', '2017-10-28 16:37:47', NULL),
(51, 10, 100000, NULL, NULL, 1, 27, '2017-11-04 13:21:57', '2017-11-04 13:21:57', NULL),
(52, 1000, 100, NULL, NULL, 1, 32, '2017-11-05 15:34:13', '2017-11-05 15:34:13', NULL),
(53, 1000, 10000, NULL, NULL, 1, 33, '2017-11-06 20:35:53', '2017-11-06 20:35:53', NULL),
(54, 27, 140, NULL, NULL, 1, 35, '2017-11-06 20:42:55', '2017-11-06 20:42:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_products_translations`
--

CREATE TABLE IF NOT EXISTS `studies_products_translations` (
  `id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_products_translations`
--

INSERT INTO `studies_products_translations` (`id`, `product_id`, `locale`, `title`, `description`) VALUES
(4, 4, 'ar', 'كيماوى ', '55'),
(5, 5, 'ar', 'مٌبيد حشرى ', NULL),
(6, 6, 'ar', 'المنتج الثالث', NULL),
(7, 7, 'ar', 'المنتج الرابع', NULL),
(48, 48, 'ar', 'المنتج الأول1', NULL),
(49, 49, 'ar', 'منتجات1 ', NULL),
(50, 50, 'ar', 'منتجات2', NULL),
(51, 51, 'ar', 'صابةون', NULL),
(52, 52, 'ar', 'منتج ', NULL),
(53, 53, 'ar', 'اعلاف ', NULL),
(54, 54, 'ar', 'وجبات خفيفة و مشروبات', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_raw_materials`
--

CREATE TABLE IF NOT EXISTS `studies_raw_materials` (
  `id` int(10) unsigned NOT NULL,
  `price` double DEFAULT NULL,
  `production` double DEFAULT NULL,
  `sales` double DEFAULT NULL,
  `unit_id` int(10) unsigned DEFAULT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_raw_materials`
--

INSERT INTO `studies_raw_materials` (`id`, `price`, `production`, `sales`, `unit_id`, `study_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 150, 50, 50, 1, 3, '2017-09-17 06:07:09', '2017-10-03 13:06:03', NULL),
(2, 60, 50, 50, 1, 3, '2017-09-17 06:13:59', '2017-10-03 13:06:04', NULL),
(3, 700, 50, 50, 1, 3, '2017-09-17 06:14:02', '2017-10-03 13:06:04', NULL),
(4, 200, 50, 50, 1, 3, '2017-09-17 06:14:05', '2017-10-03 13:06:04', NULL),
(5, 200, 70, NULL, 1, 3, '2017-10-08 10:01:32', '2017-10-08 10:01:32', NULL),
(13, 10, 50, NULL, 1, 26, '2017-10-25 11:29:45', '2017-10-25 11:29:45', NULL),
(14, 655, 33, NULL, 1, 28, '2017-10-28 16:43:46', '2017-10-28 16:43:46', NULL),
(15, 67, 88, NULL, 1, 28, '2017-10-28 16:43:47', '2017-10-28 16:43:47', NULL),
(65, 5, 100000, NULL, 1, 27, '2017-11-04 13:24:59', '2017-11-04 13:24:59', NULL),
(66, 52000, 52, NULL, 1, 32, '2017-11-05 15:57:08', '2017-11-05 15:57:08', NULL),
(67, 26250, 1, NULL, 1, 35, '2017-11-06 20:48:48', '2017-11-06 20:48:48', NULL),
(68, 750, 10000, NULL, 1, 33, '2017-11-07 13:32:36', '2017-11-07 13:32:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_rw_mat_translations`
--

CREATE TABLE IF NOT EXISTS `studies_rw_mat_translations` (
  `id` int(10) unsigned NOT NULL,
  `raw_material_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_rw_mat_translations`
--

INSERT INTO `studies_rw_mat_translations` (`id`, `raw_material_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', 'منتج 1', 'desc'),
(2, 2, 'ar', 'منتج 2', 'desc'),
(3, 3, 'ar', 'منتج 3', 'desc'),
(4, 4, 'ar', 'منتج 4', 'desc'),
(5, 5, 'ar', 'منتج 4', NULL),
(13, 13, 'ar', 'ماده خام للجراكين 4لتر', NULL),
(14, 14, 'ar', 'م', NULL),
(15, 15, 'ar', 'ت', NULL),
(65, 65, 'ar', 'صابون', NULL),
(66, 66, 'ar', 'التشغيل ', NULL),
(67, 67, 'ar', 'وجبات و مشروبات', NULL),
(68, 68, 'ar', 'اعلاف', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_sectors`
--

CREATE TABLE IF NOT EXISTS `studies_sectors` (
  `id` int(10) unsigned NOT NULL,
  `study_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_sectors`
--

INSERT INTO `studies_sectors` (`id`, `study_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2017-09-27 06:38:13', '2017-09-27 06:38:13'),
(2, 3, '2017-10-02 07:52:30', '2017-10-02 07:52:30'),
(3, 3, '2017-10-02 08:56:57', '2017-10-02 08:56:57'),
(4, 3, '2017-10-02 08:56:58', '2017-10-02 08:56:58'),
(5, 3, '2017-10-02 08:56:58', '2017-10-02 08:56:58'),
(13, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49'),
(14, 28, '2017-10-28 16:36:49', '2017-10-28 16:36:49'),
(16, 29, '2017-10-28 18:23:41', '2017-10-28 18:23:41'),
(17, 27, '2017-11-04 13:20:56', '2017-11-04 13:20:56'),
(22, 33, '2017-11-06 20:32:35', '2017-11-06 20:32:35'),
(66, 35, '2017-11-06 20:39:38', '2017-11-06 20:39:38'),
(70, 34, '2017-11-06 20:53:58', '2017-11-06 20:53:58'),
(71, 27, '2017-12-16 19:11:51', '2017-12-16 19:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `studies_sectors_translations`
--

CREATE TABLE IF NOT EXISTS `studies_sectors_translations` (
  `id` int(10) unsigned NOT NULL,
  `studies_sector_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_sectors_translations`
--

INSERT INTO `studies_sectors_translations` (`id`, `studies_sector_id`, `locale`, `title`, `description`) VALUES
(1, 1, 'ar', 'قطاع الافراد', NULL),
(2, 2, 'ar', 'قطاع المصانع ', NULL),
(3, 3, 'ar', 'قطاع البتاع ', NULL),
(4, 4, 'ar', 'قطاع الادوات الجديدة', NULL),
(5, 5, 'ar', 'قطاع الفيلا', NULL),
(12, 13, 'ar', 'اسم قطاع ', NULL),
(13, 14, 'ar', 'اسم قطاع 2', NULL),
(15, 16, 'ar', 'قطاع اجبارى', NULL),
(16, 17, 'ar', 'المساكن', NULL),
(20, 22, 'ar', 'المزارع ', NULL),
(64, 66, 'ar', 'الشباب', NULL),
(68, 70, 'ar', 'شركات الانشاء', NULL),
(69, 71, 'ar', 'hgfdzi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studies_translations`
--

CREATE TABLE IF NOT EXISTS `studies_translations` (
  `id` int(10) unsigned NOT NULL,
  `study_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `studies_translations`
--

INSERT INTO `studies_translations` (`id`, `study_id`, `locale`, `title`, `description`) VALUES
(1, 3, 'ar', 'مصنع الأسمدة ', 'المشروع عبارة عن إقامة مصنع للاسمدة  بمدينة 6 أكتوبر بجهورية مصر العربية  حيث يقوم المصنع بتعبئة عبوات مختلفة الأحجام (300 مللي - 600 مللي - 1500 مللي) حيث يتم انتاج مياه شرب نقية ومعبأة فى عبوات ذات أحجام مختلفة .\n'),
(11, 15, 'ar', 'دراسة جديدة ', 'ييي'),
(12, 16, 'ar', 'عنوان', 'تنتت'),
(13, 17, 'ar', 'عنوان', 'جديد 12'),
(14, 18, 'ar', 'دراسة جديدة جدا', 'الوصف الكلى '),
(15, 19, 'ar', 'test', 'test'),
(16, 20, 'ar', 'دراسة الاسمده', 'الوصف'),
(17, 21, 'ar', 'دراسة الاسمده', 'الوصف'),
(18, 22, 'ar', 'دراسة الادوية ', 'قمن'),
(19, 23, 'ar', 'دراسة انجليزى ', 'وصف انجليزى '),
(21, 25, 'ar', 'مصنع', 'الوصف'),
(22, 26, 'ar', 'مصبع العبوات البلاستيكيه ', 'الوصف مفصل '),
(23, 27, 'ar', 'رامى شعلان', 'مشروع زراعه '),
(24, 28, 'ar', 'مشروع ', 'وصف '),
(25, 29, 'ar', 'سيارات', 'يييييييييي'),
(26, 30, 'ar', '', ''),
(27, 31, 'ar', 'project name ', 'description '),
(28, 32, 'ar', 'project name ', 'project desription'),
(29, 33, 'ar', 'أعلاف ', 'المشروع عبارة عن مصنع لتصنيع الأعلاف الحيوانية \n'),
(30, 34, 'ar', 'مصنع اسمنت', 'المشروع عبارة عن مشروع اسمنت بأنواعه المختلفة'),
(31, 35, 'ar', 'كوفي شوب مشروعك', 'كوفي شوب لتقديم الوجبات و المشروبات للزبائن');

-- --------------------------------------------------------

--
-- Table structure for table `study_status`
--

CREATE TABLE IF NOT EXISTS `study_status` (
  `id` int(11) NOT NULL,
  `study_id` int(11) DEFAULT NULL,
  `step_one` int(2) DEFAULT NULL,
  `step_two` int(2) DEFAULT NULL,
  `step_three` int(2) DEFAULT NULL,
  `step_four` int(2) DEFAULT NULL,
  `step_five` int(2) DEFAULT NULL,
  `step_six` int(2) DEFAULT NULL,
  `is_completed` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `study_status`
--

INSERT INTO `study_status` (`id`, `study_id`, `step_one`, `step_two`, `step_three`, `step_four`, `step_five`, `step_six`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 26, 1, 0, 1, 0, 1, 1, 0, '2017-10-23 11:11:31', '2017-10-29 13:39:24'),
(2, 28, 1, 1, 1, 1, 1, 1, NULL, '2017-10-28 16:34:33', '2017-10-28 16:59:43'),
(3, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:36', '2017-10-28 16:34:36'),
(4, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:36', '2017-10-28 16:34:36'),
(5, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:36', '2017-10-28 16:34:36'),
(6, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:38', '2017-10-28 16:34:38'),
(7, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:38', '2017-10-28 16:34:38'),
(8, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:38', '2017-10-28 16:34:38'),
(9, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:34:39', '2017-10-28 16:34:39'),
(10, 29, 1, 1, 0, NULL, NULL, NULL, NULL, '2017-10-28 16:53:10', '2017-10-28 18:24:04'),
(11, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:53:18', '2017-10-28 16:53:18'),
(12, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-28 16:53:26', '2017-10-28 16:53:26'),
(13, 27, 1, 1, 1, 0, 1, 1, NULL, '2017-10-28 18:16:26', '2017-11-06 14:26:45'),
(14, 30, 1, 0, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:21', '2017-10-29 13:42:20'),
(15, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:25', '2017-10-29 13:41:25'),
(16, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:26', '2017-10-29 13:41:26'),
(17, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:28', '2017-10-29 13:41:28'),
(18, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:29', '2017-10-29 13:41:29'),
(19, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-29 13:41:29', '2017-10-29 13:41:29'),
(20, 32, 1, 1, 1, 1, 1, 1, NULL, '2017-11-05 15:10:54', '2017-11-05 15:58:30'),
(21, 33, NULL, 1, 1, 0, 0, 1, NULL, '2017-11-06 20:31:40', '2017-11-07 13:36:40'),
(22, 35, NULL, NULL, 1, 0, 1, 1, NULL, '2017-11-06 20:40:27', '2017-11-06 20:52:55'),
(23, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:30', '2017-11-06 20:40:30'),
(24, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:30', '2017-11-06 20:40:30'),
(25, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:30', '2017-11-06 20:40:30'),
(26, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:31', '2017-11-06 20:40:31'),
(27, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:31', '2017-11-06 20:40:31'),
(28, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:31', '2017-11-06 20:40:31'),
(29, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:32', '2017-11-06 20:40:32'),
(30, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:32', '2017-11-06 20:40:32'),
(31, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:33', '2017-11-06 20:40:33'),
(32, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:33', '2017-11-06 20:40:33'),
(33, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:33', '2017-11-06 20:40:33'),
(34, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:34', '2017-11-06 20:40:34'),
(35, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:34', '2017-11-06 20:40:34'),
(36, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:36', '2017-11-06 20:40:36'),
(37, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:36', '2017-11-06 20:40:36'),
(38, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:36', '2017-11-06 20:40:36'),
(39, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:37', '2017-11-06 20:40:37'),
(40, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:37', '2017-11-06 20:40:37'),
(41, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:37', '2017-11-06 20:40:37'),
(42, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:38', '2017-11-06 20:40:38'),
(43, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:38', '2017-11-06 20:40:38'),
(44, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:38', '2017-11-06 20:40:38'),
(45, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:39', '2017-11-06 20:40:39'),
(46, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:39', '2017-11-06 20:40:39'),
(47, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:40', '2017-11-06 20:40:40'),
(48, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:40', '2017-11-06 20:40:40'),
(49, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:40', '2017-11-06 20:40:40'),
(50, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:41', '2017-11-06 20:40:41'),
(51, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:43', '2017-11-06 20:40:43'),
(52, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:43', '2017-11-06 20:40:43'),
(53, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:43', '2017-11-06 20:40:43'),
(54, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:46', '2017-11-06 20:40:46'),
(55, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:46', '2017-11-06 20:40:46'),
(56, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:46', '2017-11-06 20:40:46'),
(57, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:47', '2017-11-06 20:40:47'),
(58, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:48', '2017-11-06 20:40:48'),
(59, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-11-06 20:40:48', '2017-11-06 20:40:48'),
(60, 15, 1, 0, 0, 0, NULL, NULL, NULL, '2018-02-19 14:40:55', '2018-02-19 14:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `unites`
--

CREATE TABLE IF NOT EXISTS `unites` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE IF NOT EXISTS `unites_translations` (
  `id` int(10) unsigned NOT NULL,
  `unit_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
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

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `created_by`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Super Admin', 'admin@mahacode.com', '$2y$10$zrt76VxAlxoFhZCZPzs8vev1rktGH6uA6gr3d8ACDGCNT0PYimZRG', 1, 1, 'M6u1wdLuNRL2At9kFToVCZsjP9Mfcho2bEznGXIFefNWfWDiHX2hhiiM7CUR', NULL, NULL),
(2, 2, 'مصطفى محمد أحمد', 'user@mahacode.com', '$2y$10$g8TA5zK7jAIgZ/./SqwcK.R6R2EyN/sbUxNOVPqNo4eD3o6FGQeey', 1, 1, 'idDDjkA3rT4D6Aq5O9h0fTzZRboCfiUA4jqb7pn3SVjQXY2HjiwuhHlNXKYX', '2017-09-17 09:11:56', '2017-09-19 05:35:15'),
(6, 1, 'mustaoha', 'mustapha@mahacode.com', '$2y$10$Qz3rU64e8Z3v1rmyy8McE.DiotXI/t1JUe8RJQ/kEq2GIaRdapVEW', 1, 1, NULL, '2017-09-17 13:40:45', '2017-09-18 12:40:12'),
(7, 1, 'Mustafa Gamal', 'mustafa@mahacode.com', '$2y$10$X.LekrQiLyAu/fpMqi9jj.dYgmbk.QaoN3lT2Bdk2ctc8O0ewBgEi', 1, 1, NULL, '2017-09-18 12:40:44', '2017-09-18 12:40:44'),
(8, 2, 'Yasmine', 'yasmine@mahacode.com', '$2y$10$JIf17k1bdj.y94rX623G/ebxGxWtbF4sw.wWQRXw2tVA3UHEZd/SS', 1, 1, NULL, '2017-09-18 12:41:12', '2017-09-18 12:41:12'),
(9, 2, 'Tester', 'tester@mahacode.com', '$2y$10$GXbKEdZSczzLu9yq49AIq.dSmJbqkroX8wi04wUyih5nBVZ5/.P6i', 1, 1, '1DD5K7VpvuQVhHpmV4OlXvj9x0QOLSKw0jkhtFMbkWRMtljdm20d8s0Sh3we', '2017-10-16 05:46:40', '2017-10-16 05:46:40'),
(10, 2, 'QA', 'QA@mahacode.com', '$2y$10$Zh2CI8Skt5eIU7tZ0UMoW.INX0r2Tr/k8fXnAL9seChN/vlej2rDi', 1, 1, 'gA6d353dpLkJ6L4xxCsFBvCmySgb2WmJw3awF5joKRjy3fVgBqgUhMlU9Xit', '2017-10-16 06:33:26', '2017-10-16 06:33:26'),
(11, 2, 'Admin', 'admin@admin.com', '$2y$10$UsK8TojQ6MBSJZgfInoTSOS0Xf0E7u7LsniZscNJ6BCxlsAVsIYnW', 1, 1, NULL, '2017-10-26 21:31:02', '2017-10-26 21:31:02'),
(12, 2, 'ramy shaalan', 'ceo@mashroo3k.com', '$2y$10$Yk3zrxJE2q/FLvBgaKMLv.RJK2HNsNdPfU5zF4UZVPCLJS2uk7RvW', 1, 1, NULL, '2017-10-28 13:22:01', '2017-10-28 13:22:01'),
(13, 2, 'Safwat Rabea', 'Safwat@mahacode.com', '$2y$10$kJY0IkrYwrGgGAAzxxkQk.r1h7.AjDTEYuFl2fG8de5nj.g0qwP06', 1, 1, NULL, '2017-10-28 14:59:29', '2017-10-28 14:59:29'),
(14, 2, 'QC', 'QC@mahacode.com', '$2y$10$td9OhN7qb7Eb/D/I2uVyE.MMVccPOYgfeg1PyP6hVchJdqQcCcHz.', 1, 1, NULL, '2017-10-28 16:32:59', '2017-10-28 16:32:59'),
(15, 2, 'reem', 'reem@mahacode.com', '$2y$10$6AIugnBOiSjdhXq6HwOtuebJNiZTNV3i7eGtpM3h55Wq5/y2vmlBm', 1, 1, NULL, '2017-10-29 13:40:05', '2017-10-29 13:40:05'),
(16, 2, 'hm', 'hm@mahacode.com', '$2y$10$2iIKwd9b/YhEOJBm74c8MeA.6bR1gP1wmDBR2D5ML2xuBUSumyrUi', 1, 1, NULL, '2017-11-04 19:23:00', '2017-11-04 19:23:00'),
(17, 2, 'project', 'pr@mahacode.com', '$2y$10$yjxvNIE5II.T8YeEFAmKSO3Gf9/R8mDDHn6aTJsuTRbY0XbcwS0CS', 1, 1, '7kaBaaeztZ4XzdX47TWC6UykvYhGdVWWnKHlhRoKlxQz51NUqDYcTb6A6xGd', '2017-11-05 15:09:17', '2017-11-05 15:09:17'),
(18, 2, 'جمال عبدالناصر جمعة حسين', 'operations@mashroo3k.com', '$2y$10$MkGos6V0/MySTEHBrwbrfuSx.91q9QNSKVIEEBIZQQhPBVGoquxTG', 1, 1, NULL, '2017-11-06 20:11:29', '2017-11-06 20:11:29'),
(19, 2, 'ميسرة محمد عصام حامد', 'maisara.esam@mashroo3k.net', '$2y$10$MHG1rl4Mp2K8HajcgpoYKeCL9EbKKjlo1UIIxOCy5a5JjafJTrmVu', 1, 1, NULL, '2017-11-06 20:16:20', '2017-11-06 20:16:20'),
(20, 2, 'Ahmed Sayed', 'ahmedsayed@mashroo3k.net', '$2y$10$wOx1xfGDl0SFU9KMP0uH5OB3xe5m9UziXck30gN.90sh18ot2noI6', 1, 1, NULL, '2017-11-06 20:28:19', '2017-11-06 20:28:19'),
(21, 2, 'Ssss', 'ssss@ddd.hg', '$2y$10$WLNfjY.znsEgo54pv1EGZuj6gi9KLmwgHn.X8Ho8zqfipRZXOx5Fu', 1, 1, NULL, '2017-11-13 17:28:48', '2017-11-13 17:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `role_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`), ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `cities_translations`
--
ALTER TABLE `cities_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `cities_translations_city_id_foreign` (`city_id`), ADD KEY `cities_translations_locale_index` (`locale`(191));

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents_translations`
--
ALTER TABLE `contents_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `contents_translations_content_id_foreign` (`content_id`), ADD KEY `contents_translations_locale_index` (`locale`(191));

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries_translations`
--
ALTER TABLE `countries_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `countries_translations_country_id_foreign` (`country_id`), ADD KEY `countries_translations_locale_index` (`locale`(191));

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies_translations`
--
ALTER TABLE `currencies_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `currencies_translations_currency_id_foreign` (`currency_id`), ADD KEY `currencies_translations_locale_index` (`locale`(191));

--
-- Indexes for table `deprecations`
--
ALTER TABLE `deprecations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deprecations_translations`
--
ALTER TABLE `deprecations_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `deprecations_translations_deprecation_id_foreign` (`deprecation_id`), ADD KEY `deprecations_translations_locale_index` (`locale`(191));

--
-- Indexes for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_categories_translations`
--
ALTER TABLE `expenses_categories_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `expenses_categories_translations_category_id_foreign` (`expense_categories_id`), ADD KEY `expenses_categories_translations_locale_index` (`locale`(191));

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`), ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`), ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`), ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`), ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors_translations`
--
ALTER TABLE `sectors_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `sectors_translations_sector_id_foreign` (`sector_id`), ADD KEY `sectors_translations_locale_index` (`locale`(191));

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar_items`
--
ALTER TABLE `sidebar_items`
  ADD PRIMARY KEY (`item_id`), ADD KEY `sidebar_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `sidebar_menus`
--
ALTER TABLE `sidebar_menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_user_id_foreign` (`user_id`), ADD KEY `studies_country_id_foreign` (`country_id`), ADD KEY `studies_city_id_foreign` (`city_id`), ADD KEY `studies_currency_id_foreign` (`currency_id`), ADD KEY `studies_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `studies_assets`
--
ALTER TABLE `studies_assets`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_assets_deprecation_id_foreign` (`deprecation_id`), ADD KEY `studies_assets_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_assets_translations`
--
ALTER TABLE `studies_assets_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_assets_translations_asset_id_foreign` (`asset_id`), ADD KEY `studies_assets_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_competitors`
--
ALTER TABLE `studies_competitors`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_competitors_study_id_foreign` (`study_id`), ADD KEY `studies_competitors_product_id_foreign` (`product_id`);

--
-- Indexes for table `studies_competitors_translations`
--
ALTER TABLE `studies_competitors_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_competitors_translations_competitor_id_foreign` (`competitor_id`), ADD KEY `studies_competitors_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_expenses`
--
ALTER TABLE `studies_expenses`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_expenses_category_id_foreign` (`category_id`), ADD KEY `studies_expenses_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_expenses_translations`
--
ALTER TABLE `studies_expenses_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_expenses_translations_studies_expense_id_foreign` (`expense_id`), ADD KEY `studies_expenses_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_finance_investments`
--
ALTER TABLE `studies_finance_investments`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_finance_investments_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_four_analyze`
--
ALTER TABLE `studies_four_analyze`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_four_analyze_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_four_analyze_translations`
--
ALTER TABLE `studies_four_analyze_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_four_analyze_translations_four_analyze_id_foreign` (`four_analyze_id`), ADD KEY `studies_four_analyze_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_increases_rate`
--
ALTER TABLE `studies_increases_rate`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_increases_rate_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_marketing`
--
ALTER TABLE `studies_marketing`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_marketing_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_marketing_translations`
--
ALTER TABLE `studies_marketing_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_marketing_translations_marketing_id_foreign` (`marketing_id`), ADD KEY `studies_marketing_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_products`
--
ALTER TABLE `studies_products`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_products_unit_id_foreign` (`unit_id`), ADD KEY `studies_products_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_products_translations`
--
ALTER TABLE `studies_products_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_products_translations_studies_products_id_foreign` (`product_id`), ADD KEY `studies_products_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_raw_materials`
--
ALTER TABLE `studies_raw_materials`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_raw_materials_unit_id_foreign` (`unit_id`), ADD KEY `studies_raw_materials_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_rw_mat_translations`
--
ALTER TABLE `studies_rw_mat_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_rw_mat_translations_raw_material_id_foreign` (`raw_material_id`), ADD KEY `studies_rw_mat_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_sectors`
--
ALTER TABLE `studies_sectors`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_sectors_study_id_foreign` (`study_id`);

--
-- Indexes for table `studies_sectors_translations`
--
ALTER TABLE `studies_sectors_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_sectors_translations_sector_id_foreign` (`studies_sector_id`), ADD KEY `studies_sectors_translations_locale_index` (`locale`(191));

--
-- Indexes for table `studies_translations`
--
ALTER TABLE `studies_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `studies_translations_study_id_foreign` (`study_id`), ADD KEY `studies_translations_locale_index` (`locale`(191));

--
-- Indexes for table `study_status`
--
ALTER TABLE `study_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unites`
--
ALTER TABLE `unites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unites_translations`
--
ALTER TABLE `unites_translations`
  ADD PRIMARY KEY (`id`), ADD KEY `unites_translations_unit_id_foreign` (`unit_id`), ADD KEY `unites_translations_locale_index` (`locale`(191));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cities_translations`
--
ALTER TABLE `cities_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contents_translations`
--
ALTER TABLE `contents_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries_translations`
--
ALTER TABLE `countries_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `currencies_translations`
--
ALTER TABLE `currencies_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deprecations`
--
ALTER TABLE `deprecations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `deprecations_translations`
--
ALTER TABLE `deprecations_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `expenses_categories_translations`
--
ALTER TABLE `expenses_categories_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sectors_translations`
--
ALTER TABLE `sectors_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sidebar_items`
--
ALTER TABLE `sidebar_items`
  MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sidebar_menus`
--
ALTER TABLE `sidebar_menus`
  MODIFY `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `studies_assets`
--
ALTER TABLE `studies_assets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `studies_assets_translations`
--
ALTER TABLE `studies_assets_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `studies_competitors`
--
ALTER TABLE `studies_competitors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `studies_competitors_translations`
--
ALTER TABLE `studies_competitors_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `studies_expenses`
--
ALTER TABLE `studies_expenses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `studies_expenses_translations`
--
ALTER TABLE `studies_expenses_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `studies_finance_investments`
--
ALTER TABLE `studies_finance_investments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `studies_four_analyze`
--
ALTER TABLE `studies_four_analyze`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `studies_four_analyze_translations`
--
ALTER TABLE `studies_four_analyze_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `studies_increases_rate`
--
ALTER TABLE `studies_increases_rate`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `studies_marketing`
--
ALTER TABLE `studies_marketing`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `studies_marketing_translations`
--
ALTER TABLE `studies_marketing_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `studies_products`
--
ALTER TABLE `studies_products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `studies_products_translations`
--
ALTER TABLE `studies_products_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `studies_raw_materials`
--
ALTER TABLE `studies_raw_materials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `studies_rw_mat_translations`
--
ALTER TABLE `studies_rw_mat_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `studies_sectors`
--
ALTER TABLE `studies_sectors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `studies_sectors_translations`
--
ALTER TABLE `studies_sectors_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `studies_translations`
--
ALTER TABLE `studies_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `study_status`
--
ALTER TABLE `study_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `unites`
--
ALTER TABLE `unites`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unites_translations`
--
ALTER TABLE `unites_translations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities_translations`
--
ALTER TABLE `cities_translations`
ADD CONSTRAINT `cities_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contents_translations`
--
ALTER TABLE `contents_translations`
ADD CONSTRAINT `contents_translations_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `countries_translations`
--
ALTER TABLE `countries_translations`
ADD CONSTRAINT `countries_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currencies_translations`
--
ALTER TABLE `currencies_translations`
ADD CONSTRAINT `currencies_translations_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deprecations_translations`
--
ALTER TABLE `deprecations_translations`
ADD CONSTRAINT `deprecations_translations_deprecation_id_foreign` FOREIGN KEY (`deprecation_id`) REFERENCES `deprecations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses_categories_translations`
--
ALTER TABLE `expenses_categories_translations`
ADD CONSTRAINT `expenses_categories_translations_category_id_foreign` FOREIGN KEY (`expense_categories_id`) REFERENCES `expenses_categories` (`id`) ON DELETE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
