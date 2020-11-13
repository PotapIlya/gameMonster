-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 14 2020 г., 00:41
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0679512_test2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preloader` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `novelty` tinyint(1) NOT NULL DEFAULT '0',
  `exclusive` tinyint(1) NOT NULL DEFAULT '0',
  `pre_order` tinyint(1) NOT NULL DEFAULT '0',
  `early_access` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `url`, `title`, `price`, `old_price`, `discounts`, `preloader`, `img`, `text`, `novelty`, `exclusive`, `pre_order`, `early_access`, `created_at`, `updated_at`) VALUES
(2, 'potap', 'title', '5', NULL, NULL, 'catalog/79a93d1a120c052308be7c3ec509a88b.jpg', '[]', NULL, 0, 0, 0, 0, '2020-11-04 19:02:16', '2020-11-04 19:02:16');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_keys`
--

CREATE TABLE `catalog_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog_keys`
--

INSERT INTO `catalog_keys` (`id`, `catalog_id`, `key`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, '752135', 0, '2020-11-04 19:25:57', '2020-11-04 19:32:46'),
(5, 2, '897617', 0, '2020-11-04 19:26:13', '2020-11-07 06:42:27'),
(6, 2, '432305', 0, '2020-11-04 19:26:23', '2020-11-12 16:01:01'),
(7, 2, '321321', 0, '2020-11-04 19:26:33', '2020-11-04 19:26:33');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Steam', NULL, NULL),
(2, 'Uplay', NULL, NULL),
(3, 'Origin', NULL, NULL),
(4, 'Epic store', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `new_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `history_payments`
--

CREATE TABLE `history_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `history_payments`
--

INSERT INTO `history_payments` (`id`, `user_id`, `money`, `billId`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'e6f655cf-d4eb-46ac-89a2-5f8d4aa76edf', 'qiwi', 0, '2020-11-03 11:27:13', '2020-11-03 11:27:13'),
(2, '1', '1', '5c498324-97ce-4207-a133-ad41702348c9', 'qiwi', 0, '2020-11-03 12:13:41', '2020-11-03 12:13:41'),
(3, '1', '1', '6a04e8f6-0063-432a-b83b-6fede2d4148e', 'qiwi', 0, '2020-11-03 12:18:45', '2020-11-03 12:18:45'),
(4, '1', '1', 'fcb734be-ea93-4c86-ae6c-9c98d2e773d9', 'qiwi', 0, '2020-11-03 12:27:01', '2020-11-03 12:27:01'),
(5, '1', '1', '3ad68acb-612a-464f-98ff-790d2df919a2', 'qiwi', 0, '2020-11-03 12:30:18', '2020-11-03 12:30:18'),
(6, '1', '1', 'aee063c6-6d0d-4536-9056-fda0f23a5186', 'qiwi', 0, '2020-11-03 12:35:58', '2020-11-03 12:35:58'),
(7, '1', '1', 'a2a059b5-a214-4b9e-b26f-12a8f05bee47', 'qiwi', 0, '2020-11-03 12:57:23', '2020-11-03 12:57:23'),
(8, '1', '1', '7621f70e-9968-4825-806f-8347e12c702b', 'qiwi', 0, '2020-11-03 13:04:29', '2020-11-03 13:04:29'),
(9, '1', '1', '0478d1ba-d8ee-431f-a179-4dacc14e8d1f', 'qiwi', 0, '2020-11-03 13:25:59', '2020-11-03 13:25:59'),
(10, '1', '1', 'a5b974ad-4052-4770-99c8-527a4f1d5b25', 'qiwi', 0, '2020-11-03 13:32:30', '2020-11-03 13:32:30'),
(11, '1', '1', '212995ee-f2d1-4dd9-a190-53c49bf7e688', 'qiwi', 0, '2020-11-03 13:34:01', '2020-11-03 13:34:01'),
(12, '1', '1', '8aa65519-69bd-4d1b-9451-0dc4e8462748', 'qiwi', 0, '2020-11-03 13:43:54', '2020-11-03 13:43:54'),
(13, '1', '1', '7fa44f08-8be5-49ed-86f5-fe413a15431c', 'qiwi', 0, '2020-11-03 13:46:31', '2020-11-03 13:46:31'),
(14, '1', '1', '7c3a16d2-78a5-4586-845f-c7cee33a9277', 'qiwi', 0, '2020-11-03 13:50:35', '2020-11-03 13:50:35'),
(15, '1', '1', 'cf4ab4c2-636f-4d6f-8e06-236c7e064382', 'qiwi', 0, '2020-11-03 13:54:53', '2020-11-03 13:54:53'),
(16, '1', '1', 'b068d814-5f2c-45df-aadf-962ab6487dd8', 'qiwi', 0, '2020-11-03 14:17:11', '2020-11-03 14:17:11'),
(17, '1', '1', '84df3c72-f404-40e2-840e-decde6b4449d', 'qiwi', 0, '2020-11-03 14:19:46', '2020-11-03 14:19:46'),
(18, '1', '1', '946d00ab-3a39-4829-bb75-2f4e10a94953', 'qiwi', 0, '2020-11-03 14:19:47', '2020-11-03 14:19:47'),
(19, '1', '1', '4a3f2a28-60c0-42ca-a0fb-0a4b8da3455f', 'qiwi', 0, '2020-11-04 16:21:50', '2020-11-04 16:21:50'),
(20, '1', '1', 'de47b24e-6688-4eb3-9eb3-b6861cf88131', 'qiwi', 0, '2020-11-04 17:07:30', '2020-11-04 17:07:30'),
(21, '1', '2', 'bb16c749-d07a-4d16-b77e-5ab30017fbbb', 'qiwi', 0, '2020-11-04 17:23:54', '2020-11-04 17:23:54'),
(22, '1', '12', '430dc672-e8dc-495e-9525-1c3f319e1558', 'qiwi', 0, '2020-11-10 21:43:50', '2020-11-10 21:43:50'),
(23, '1', '1', 'a1808195-8b49-4762-86cc-3b464b5c8a3c', 'qiwi', 0, '2020-11-11 12:45:08', '2020-11-11 12:45:08'),
(24, '1', '1', '53', 'qiwi', 0, '2020-11-11 16:07:37', '2020-11-11 16:07:37'),
(25, '1', '1', 'PAYID-L6WDOHY1XL154518P106142R', 'qiwi', 0, '2020-11-11 16:10:25', '2020-11-11 16:10:25'),
(26, '1', '12', 'PAYID-L6WDRZI1SF02219WM504871T', 'paypal', 0, '2020-11-11 16:17:59', '2020-11-11 16:17:59'),
(27, '1', '12', '180fed4e-cdb1-4174-bfea-9b00b8f88585', 'qiwi', 0, '2020-11-11 16:36:49', '2020-11-11 16:36:49'),
(28, '1', '12', 'PAYID-L6WD4TA0TP851566R696150N', 'paypal', 0, '2020-11-11 16:41:03', '2020-11-11 16:41:03'),
(29, '1', '12', 'PAYID-L6WFIXA79U62724A1046934P', 'paypal', 0, '2020-11-11 18:15:10', '2020-11-11 18:15:10'),
(30, '1', '1', 'PAYID-L6WFONQ6XX500234B6698126', 'paypal', 0, '2020-11-11 18:27:20', '2020-11-11 18:27:20'),
(31, '1', '12', 'PAYID-L6WFYCQ4YJ71597R4494213G', 'paypal', 0, '2020-11-11 18:47:57', '2020-11-11 18:47:57'),
(32, '1', '12', 'PAYID-L6WVZCQ0F65838371648164T', 'paypal', 0, '2020-11-12 13:02:18', '2020-11-12 13:02:18'),
(33, '1', '1', 'PAYID-L6WV54A5WE360041P315471M', 'paypal', 0, '2020-11-12 13:12:32', '2020-11-12 13:12:32'),
(34, '1', '12', 'PAYID-L6WWBFY8YP36072B9003691T', 'paypal', 0, '2020-11-12 13:19:36', '2020-11-12 13:19:36'),
(35, '1', '1', 'PAYID-L6WWEDI1T551016P22962040', 'paypal', 0, '2020-11-12 13:25:50', '2020-11-12 13:25:50'),
(36, '1', '1', 'PAYID-L6WWI5A2D3373846R905024V', 'paypal', 0, '2020-11-12 13:36:04', '2020-11-12 13:36:04'),
(37, '1', '1', 'PAYID-L6WWRRY73E290670P520733D', 'paypal', 0, '2020-11-12 13:54:31', '2020-11-12 13:54:31'),
(38, '1', '21', 'PAYID-L6WXL5I6EF35155G9039145B', 'paypal', 0, '2020-11-12 14:50:45', '2020-11-12 14:50:45'),
(39, '1', '1', 'PAYID-L6WXMOI7YD65478XP4178225', 'paypal', 0, '2020-11-12 14:51:54', '2020-11-12 14:51:54'),
(40, '1', '12', 'ea078893-05c5-43ac-8c74-a695d9de990e', 'qiwi', 0, '2020-11-12 14:53:23', '2020-11-12 14:53:23'),
(41, '1', '1221', 'PAYID-L6WXNGY0LL71516T43889848', 'paypal', 0, '2020-11-12 14:53:31', '2020-11-12 14:53:31'),
(42, '1', '1', 'PAYID-L6WX5AA9KD65069UT5031116', 'paypal', 0, '2020-11-12 15:27:12', '2020-11-12 15:27:12'),
(43, '4', '1', 'PAYID-L6WYDTA00M21770L6371872T', 'paypal', 0, '2020-11-12 15:41:16', '2020-11-12 15:41:16'),
(44, '4', '1', 'PAYID-L6WYEJQ5EH75445P96211223', 'paypal', 0, '2020-11-12 15:42:46', '2020-11-12 15:42:46'),
(45, '4', '1', 'PAYID-L6WYEWA30F25999E2326833R', 'paypal', 0, '2020-11-12 15:43:36', '2020-11-12 15:43:36'),
(46, '4', '12', 'PAYID-L6WYM5Y83U402127S621294M', 'paypal', 0, '2020-11-12 16:01:11', '2020-11-12 16:01:11'),
(47, '1', '1', 'PAYID-L6WYVDQ8T345333XP668750V', 'paypal', 0, '2020-11-12 16:18:38', '2020-11-12 16:18:38'),
(48, '4', '1', 'PAYID-L6WZZHQ906652718H345352P', 'paypal', 0, '2020-11-12 17:35:42', '2020-11-12 17:35:42'),
(49, '1', '1', 'PAYID-L6XDV5I6N044465F8866263D', 'paypal', 0, '2020-11-13 04:51:18', '2020-11-13 04:51:18'),
(50, '1', '1', 'PAYID-L6XFJVY5LW33664S6418221L', 'paypal', 0, '2020-11-13 06:41:43', '2020-11-13 06:41:43'),
(51, '1', '1', 'PAYID-L6XFM4I1HP984653Y101734N', 'paypal', 0, '2020-11-13 06:48:34', '2020-11-13 06:48:34'),
(52, '1', '1', 'PAYID-L6XJGEI2SE07780PA315463S', 'paypal', 0, '2020-11-13 11:07:14', '2020-11-13 11:07:14'),
(53, '1', '12', 'PAYID-L6XJHEY5N881567A8321424E', 'paypal', 0, '2020-11-13 11:09:24', '2020-11-13 11:09:24'),
(54, '1', '1', 'PAYID-L6XJIHY27S95740AH206722U', 'paypal', 0, '2020-11-13 11:11:44', '2020-11-13 11:11:44'),
(55, '1', '1', 'PAYID-L6XJITA6L8812513F858692P', 'paypal', 0, '2020-11-13 11:12:29', '2020-11-13 11:12:29'),
(56, '1', '1', '69196947-4e01-4f30-bffd-9cb2ee9ea219', 'qiwi', 0, '2020-11-13 11:24:22', '2020-11-13 11:24:22'),
(57, '1', '1', 'PAYID-L6XJO2I5A953013YP8621004', 'paypal', 0, '2020-11-13 11:25:46', '2020-11-13 11:25:46'),
(58, '1', '12', 'PAYID-L6XJS7I7RT98487EN7671224', 'paypal', 0, '2020-11-13 11:34:37', '2020-11-13 11:34:37'),
(59, '1', '1', 'PAYID-L6XJTLA86E18842PX0339255', 'paypal', 0, '2020-11-13 11:35:24', '2020-11-13 11:35:24'),
(60, '1', '1', 'PAYID-L6XJT2I9DX47412RX3080357', 'paypal', 0, '2020-11-13 11:36:25', '2020-11-13 11:36:25'),
(61, '1', '1', 'PAYID-L6XJWMY6W204182H5335632D', 'paypal', 0, '2020-11-13 11:41:56', '2020-11-13 11:41:56'),
(62, '1', '1', 'PAYID-L6XJZOA6GP43522W8859593K', 'paypal', 0, '2020-11-13 11:48:24', '2020-11-13 11:48:24'),
(63, '1', '1', 'PAYID-L6XJZ2Y14725191MN976615G', 'paypal', 0, '2020-11-13 11:49:16', '2020-11-13 11:49:16'),
(64, '1', '1', 'PAYID-L6XJ3JA245144707C740033L', 'paypal', 0, '2020-11-13 11:52:20', '2020-11-13 11:52:20'),
(65, '1', '1', 'PAYID-L6XPQEI6B4326946K219330S', 'paypal', 0, '2020-11-13 18:18:09', '2020-11-13 18:18:09');

-- --------------------------------------------------------

--
-- Структура таблицы `licks`
--

CREATE TABLE `licks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `games` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `games_form` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `licks`
--

INSERT INTO `licks` (`id`, `img`, `games`, `profit`, `games_form`, `new_price`, `old_price`, `href`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'lick/c20274953d50ffd03d42a363ab62744c.png', '800', '130', '900', '800', '800', '/development', '30', NULL, '2020-11-13 18:36:01'),
(2, 'lick/3d27f53ef7e68f011b2fd219736b6372.png', '800', '130', '900', '800', '800', '/development', '30', NULL, '2020-11-13 18:35:39'),
(3, 'lick/d7f1c80a6b650d1cab50a2ad3a0da860.png', '800', '130', '900', '800', '800', '/development', '30', NULL, '2020-11-13 18:35:05');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(435, '2013_10_16_213440_create_roles_table', 1),
(436, '2014_10_12_000000_create_users_table', 1),
(437, '2014_10_12_100000_create_password_resets_table', 1),
(438, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(439, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(440, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(441, '2016_06_01_000004_create_oauth_clients_table', 1),
(442, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(443, '2019_08_19_000000_create_failed_jobs_table', 1),
(444, '2020_10_01_092824_create_categories_table', 1),
(445, '2020_10_01_092954_create_category_product_table', 1),
(446, '2020_10_01_122446_create_sliders_table', 1),
(447, '2020_10_01_123311_create_news_table', 1),
(448, '2020_10_01_123626_create_category_news_table', 1),
(449, '2020_10_01_124621_create_navs_table', 1),
(450, '2020_10_03_205914_create_catalogs_table', 1),
(451, '2020_10_17_144256_create_user_abouts_table', 1),
(452, '2020_10_18_135520_create_user_services_table', 1),
(453, '2020_10_18_205856_create_catalog_keys_table', 1),
(454, '2020_10_27_105421_create_licks_table', 1),
(455, '2020_10_27_115923_create_proposals_table', 1),
(456, '2020_11_01_174217_create_history_payments_table', 1),
(457, '2020_11_03_130459_create_tests_table', 1),
(458, '2021_10_01_163747_create_shopping_histories_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `navs`
--

CREATE TABLE `navs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `navs`
--

INSERT INTO `navs` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Товары', '/development', NULL, NULL),
(2, 'Рулетка', '/development', NULL, NULL),
(3, 'Акции', '/development', NULL, NULL),
(4, 'Гарантии', '/development', NULL, NULL),
(5, 'Контакты', '/development', NULL, NULL),
(6, 'Аренда аккаунтов', '/development', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tester@t.r', '$2y$10$Ub8260BpB5G7JDCfIlhTKOhd/HtVK2B2Z6ruRMKsup8.v.lxGxuUm', '2020-11-10 17:34:40'),
('ilya.burenko.01@gmail.com', '$2y$10$LGbXbl5AoIox046mcQfWd.RO8FNoAS3TuqSJnY1VjqPkIb.DRJXK2', '2020-11-10 18:58:16');

-- --------------------------------------------------------

--
-- Структура таблицы `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `proposals`
--

INSERT INTO `proposals` (`id`, `img`, `mobile_img`, `title`, `text`, `button`, `created_at`, `updated_at`) VALUES
(1, 'proposal/f5b7f3108d0a09a433e542579ceeff8e.png', 'proposal/2ac9dc9c5c71f7292fa7a64ab8a0f434.png', 'Система рефералов', 'Приглашайте друзей и получайте бонусы', 'Подробнее', NULL, '2020-11-13 18:37:35'),
(2, 'proposal/02d03ff4736281a657d764e871ecade2.png', 'proposal/7c8ff7a4cb0034918f0b27a174d15e55.png', 'Уникальные скидки и бонусы', 'При подписке на новости сервиса', 'Подписаться', NULL, '2020-11-13 18:37:17'),
(3, 'proposal/e16a2a40c2e032fbafefe7daedd63431.png', 'proposal/33b6ea2f7636e430ec40c4b4c1d9684c.png', 'Остались вопросы?', NULL, 'Отправить', NULL, '2020-11-13 18:37:01');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(2, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `shopping_histories`
--

CREATE TABLE `shopping_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'error',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shopping_histories`
--

INSERT INTO `shopping_histories` (`id`, `user_id`, `catalog_id`, `key`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '752135', '2020-11-04 19:27:32', '2020-11-04 19:27:32'),
(4, 1, 2, '897617', '2020-11-04 19:31:00', '2020-11-04 19:31:00'),
(5, 1, 2, '432305', '2020-11-04 19:31:05', '2020-11-04 19:31:05'),
(6, 1, 2, '752135', '2020-11-04 19:32:46', '2020-11-04 19:32:46'),
(7, 1, 2, '897617', '2020-11-07 06:42:27', '2020-11-07 06:42:27'),
(8, 4, 2, '432305', '2020-11-12 16:01:01', '2020-11-12 16:01:01');

-- --------------------------------------------------------

--
-- Структура таблицы `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliders`
--

INSERT INTO `sliders` (`id`, `url`, `title`, `price`, `old_price`, `discounts`, `img`, `created_at`, `updated_at`) VALUES
(13, '/', 'Witcher 3: Wild Hunt', '790', '1990', '30', 'slider/5effcd52d6e093d5ae6644dc325dad93.png', '2020-11-13 18:29:06', '2020-11-13 18:29:53'),
(14, '/', 'Witcher 3: Wild Hunt', '790', '1990', '30', 'slider/5effcd52d6e093d5ae6644dc325dad93.png', '2020-11-13 18:30:51', '2020-11-13 18:30:51'),
(15, '/', 'Witcher 3: Wild Hunt', '790', '1990', '30', 'slider/5effcd52d6e093d5ae6644dc325dad93.png', '2020-11-13 18:30:52', '2020-11-13 18:30:52'),
(16, '/', 'Witcher 3: Wild Hunt', '790', '1990', '30', 'slider/5effcd52d6e093d5ae6644dc325dad93.png', '2020-11-13 18:30:53', '2020-11-13 18:30:53'),
(17, '/', 'Witcher 3: Wild Hunt', '790', '1990', '30', 'slider/5effcd52d6e093d5ae6644dc325dad93.png', '2020-11-13 18:30:54', '2020-11-13 18:30:54');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `login`, `img`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'tester', NULL, 'tester@t.r', NULL, NULL, '$2y$10$Afnjz6LQ1MfXRxj2tILCqem/3U/QczZWHtKFcN2mqR74ruHQTfnaq', 'fv3p0pMKurj2P8HclWOt6OKbCOj6CaXWLvqJ6GmH7LXrlYp65EuaUcn2uc2O', NULL, NULL),
(2, 1, 'tester', NULL, 'tester@t.rdwadwa', NULL, NULL, '$2y$10$cpRoVAiAJeFLr8LTfRnT0OVm.J0rIHXvtwdYpqvlIur3Yrm9tQcPO', NULL, '2020-11-04 19:00:03', '2020-11-04 19:00:03'),
(3, 1, 'tester', NULL, 'tester@t.r312321312312', NULL, NULL, '$2y$10$WV3PYsJIfq81LVhu3.XP5eBvClNB6XGPYX8RbTvz14hiCD.wGhWKG', NULL, '2020-11-04 19:01:36', '2020-11-04 19:01:36'),
(4, 1, 'ilya.burenko.01', NULL, 'ilya.burenko.01@mail.ru', NULL, NULL, '$2y$10$/aj17RdVy8dD3FlilSvFd.PVJOx2oFNlW.gY4ThJKjscY42wrm812', '0BI3ao5h6B7tnuNXglv3BcwZIYZISkjkAnHK8DpotsYYHYO2tTyKNx9mprQr', '2020-11-10 17:34:59', '2020-11-12 15:16:54'),
(5, 1, 'ilya.burenko.01', NULL, 'ilya.burenko.01@gmail.com', NULL, NULL, '$2y$10$cOSODd1MhX7zuG0KW4R5BOeFkgQutgX0Tjl3Mb1iz4jCXqGr0GZWa', NULL, '2020-11-10 18:57:56', '2020-11-10 18:57:56');

-- --------------------------------------------------------

--
-- Структура таблицы `user_abouts`
--

CREATE TABLE `user_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_abouts`
--

INSERT INTO `user_abouts` (`id`, `user_id`, `money`, `created_at`, `updated_at`) VALUES
(1, 1, '20', NULL, '2020-11-07 06:42:27'),
(2, 2, '1000', '2020-11-04 19:00:04', '2020-11-04 19:00:04'),
(3, 3, '1000', '2020-11-04 19:01:36', '2020-11-04 19:01:36'),
(4, 4, '995', '2020-11-10 17:34:59', '2020-11-12 16:01:01'),
(5, 5, '1000', '2020-11-10 18:57:56', '2020-11-10 18:57:56');

-- --------------------------------------------------------

--
-- Структура таблицы `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `authentication_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catalogs_url_unique` (`url`);

--
-- Индексы таблицы `catalog_keys`
--
ALTER TABLE `catalog_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_keys_catalog_id_foreign` (`catalog_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `history_payments`
--
ALTER TABLE `history_payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `licks`
--
ALTER TABLE `licks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `navs`
--
ALTER TABLE `navs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Индексы таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shopping_histories`
--
ALTER TABLE `shopping_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_histories_user_id_foreign` (`user_id`),
  ADD KEY `shopping_histories_catalog_id_foreign` (`catalog_id`);

--
-- Индексы таблицы `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `user_abouts`
--
ALTER TABLE `user_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_abouts_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_services_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `catalog_keys`
--
ALTER TABLE `catalog_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `history_payments`
--
ALTER TABLE `history_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `licks`
--
ALTER TABLE `licks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=459;

--
-- AUTO_INCREMENT для таблицы `navs`
--
ALTER TABLE `navs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `shopping_histories`
--
ALTER TABLE `shopping_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user_abouts`
--
ALTER TABLE `user_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `catalog_keys`
--
ALTER TABLE `catalog_keys`
  ADD CONSTRAINT `catalog_keys_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `shopping_histories`
--
ALTER TABLE `shopping_histories`
  ADD CONSTRAINT `shopping_histories_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_abouts`
--
ALTER TABLE `user_abouts`
  ADD CONSTRAINT `user_abouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_services`
--
ALTER TABLE `user_services`
  ADD CONSTRAINT `user_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
