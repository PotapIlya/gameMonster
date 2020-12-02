-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 02 2020 г., 22:18
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
  `developers_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalogs`
--

INSERT INTO `catalogs` (`id`, `url`, `title`, `price`, `old_price`, `discounts`, `preloader`, `img`, `text`, `novelty`, `exclusive`, `pre_order`, `early_access`, `developers_id`, `created_at`, `updated_at`) VALUES
(2, 'potap', 'Gta5', '500', '100', '50', 'catalog/79a93d1a120c052308be7c3ec509a88b.jpg', '[\"catalog\\/0e64122e479947f70015d376edec5438.jpg\",\"catalog\\/1f49b428fc1c839be916d31d610c153c.jpg\",\"catalog\\/05df911c23ee31195a18d80d3d4dedb3.jpg\"]', '<pre style=\"font-family: \'Fira Code Retina\';\"><span style=\"color: #ffffff;\">Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной <br />\"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую<br /> коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только <br />успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. <br />Его популяризации в новое время послужили публикация листов Letraset с образцами <br />Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker,<br /> в шаблонах которых используется Lorem Ipsum.</span></pre>', 1, 1, 0, 0, '1', '2020-11-03 21:00:00', '2020-11-28 17:51:18'),
(3, 'gta52', 'gta52', '122', NULL, NULL, NULL, '[]', NULL, 0, 0, 0, 0, NULL, NULL, '2020-12-02 13:28:47'),
(4, 'gta522', 'gta522', '12', NULL, NULL, NULL, '[]', NULL, 0, 0, 0, 0, NULL, NULL, '2020-12-02 13:28:58');

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
(7, 2, '321321', 0, '2020-11-04 19:26:33', '2020-11-04 19:26:33'),
(8, 2, '321', 1, '2020-12-02 10:39:32', '2020-12-02 10:39:32'),
(9, 2, '752135', 1, '2020-12-02 16:02:47', '2020-12-02 16:02:47'),
(10, 2, '454', 1, '2020-12-02 16:03:02', '2020-12-02 16:03:02'),
(11, 3, '3223', 1, '2020-12-02 16:16:21', '2020-12-02 16:16:21'),
(12, 2, '3232', 1, '2020-12-02 16:17:12', '2020-12-02 16:17:12'),
(13, 2, '321321', 1, '2020-12-02 16:17:35', '2020-12-02 16:17:35');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_languages`
--

CREATE TABLE `catalog_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_operating_system`
--

CREATE TABLE `catalog_operating_system` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `operating_system` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Дамп данных таблицы `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `developers`
--

CREATE TABLE `developers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `developers`
--

INSERT INTO `developers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Valve', '2020-11-28 15:26:44', '2020-11-28 15:26:44'),
(2, NULL, '2020-11-28 15:27:00', '2020-11-28 15:27:00'),
(3, NULL, '2020-11-28 15:31:15', '2020-11-28 15:31:15');

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
(65, '1', '1', 'PAYID-L6XPQEI6B4326946K219330S', 'paypal', 0, '2020-11-13 18:18:09', '2020-11-13 18:18:09'),
(66, '1', '21', '9fabed3a-dd16-4004-882e-4b3f7de971c1', 'qiwi', 0, '2020-11-28 17:00:33', '2020-11-28 17:00:33'),
(67, '1', '500', 'a5b9b140-3c97-445a-8f4a-2f0e2a21db18', 'qiwi', 0, '2020-12-02 15:46:37', '2020-12-02 15:46:37'),
(68, '1', '31', 'df9c72dd-7e58-410e-8908-c9c7852575c8', 'qiwi', 0, '2020-12-02 15:50:10', '2020-12-02 15:50:10'),
(69, '1', '321', 'PAYID-L7D6EFY28T52838LB470230P', 'paypal', 0, '2020-12-02 15:51:03', '2020-12-02 15:51:03'),
(70, '1', '321', 'b47e236f-233f-4ec6-aa9c-0271517c7e9a', 'qiwi', 0, '2020-12-02 15:52:22', '2020-12-02 15:52:22'),
(71, '1', '321', '74534d37f40fd35cf4c39517c4aaf508', 'payeer', 0, '2020-12-02 15:52:26', '2020-12-02 15:52:26');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(458, '2021_10_01_163747_create_shopping_histories_table', 1),
(459, '2020_11_26_142455_create_social_networks_table', 2),
(460, '2020_11_28_172507_create_developers_table', 2),
(461, '2020_11_28_172727_create_languages_table', 2),
(462, '2020_11_28_172758_create_catalog_languages_table', 2),
(463, '2020_11_28_173016_create_operating_system_table', 2),
(464, '2020_11_28_173035_create_catalog_operating_system_table', 2);

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
(1, 'Produсts', '/development', NULL, '2020-12-02 15:57:31'),
(2, 'Roulette', '/development', NULL, '2020-12-02 15:57:53'),
(3, 'Promotions', '/development', NULL, '2020-12-02 15:59:26'),
(4, 'Guarantee', '/development', NULL, '2020-12-02 15:58:54'),
(5, 'Contact', '/development', NULL, '2020-12-02 15:58:17'),
(6, 'Аccount rent', '/development', NULL, '2020-12-02 15:58:25');

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
-- Структура таблицы `operating_system`
--

CREATE TABLE `operating_system` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('ilya.burenko.01@gmail.com', '$2y$10$LGbXbl5AoIox046mcQfWd.RO8FNoAS3TuqSJnY1VjqPkIb.DRJXK2', '2020-11-10 18:58:16'),
('ilya.burenko.01@mail.ru', '$2y$10$9ZmwIzPJgl42ZAsnm6bqpe/3zrvgbw0WfJhXUtwG0f8ggPRGx2FQa', '2020-12-02 15:55:52');

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
(1, 'proposal/f5b7f3108d0a09a433e542579ceeff8e.png', 'proposal/2ac9dc9c5c71f7292fa7a64ab8a0f434.png', 'Referral links', 'Invite your friends and get bonuses', 'Learn more', NULL, '2020-12-02 13:59:08'),
(2, 'proposal/02d03ff4736281a657d764e871ecade2.png', 'proposal/7c8ff7a4cb0034918f0b27a174d15e55.png', 'Deals and bonuses', 'When subscribing to service news', 'Subscribe', NULL, '2020-12-02 13:59:27'),
(3, 'proposal/e16a2a40c2e032fbafefe7daedd63431.png', 'proposal/33b6ea2f7636e430ec40c4b4c1d9684c.png', 'Need more help?', NULL, 'Send', NULL, '2020-12-02 13:59:39');

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
-- Структура таблицы `social_networks`
--

CREATE TABLE `social_networks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `social_networks`
--

INSERT INTO `social_networks` (`id`, `name`, `href`, `icon`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '<svg width=\"26\" height=\"18\" viewBox=\"0 0 26 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M22.6561 0.635448C23.7058 0.91806 24.5335 1.74571 24.8161 2.79542C25.3409 4.71314 25.3208 8.71009 25.3208 8.71009C25.3208 8.71009 25.3208 12.6869 24.8161 14.6046C24.5335 15.6543 23.7058 16.4819 22.6561 16.7646C20.7384 17.2692 13.0675 17.2692 13.0675 17.2692C13.0675 17.2692 5.41676 17.2692 3.47884 16.7444C2.42914 16.4618 1.60149 15.6341 1.31887 14.5844C0.814209 12.6869 0.814209 8.68991 0.814209 8.68991C0.814209 8.68991 0.814209 4.71314 1.31887 2.79542C1.60149 1.74571 2.44932 0.897874 3.47884 0.615261C5.39657 0.110596 13.0675 0.110596 13.0675 0.110596C13.0675 0.110596 20.7384 0.110596 22.6561 0.635448ZM17.0038 8.68986L10.6249 12.3638V5.0159L17.0038 8.68986Z\" fill=\"#B0B0B0\"/>\r\n</svg>', '2020-11-28 15:41:14', '2020-11-28 15:41:14'),
(2, NULL, NULL, '<svg width=\"12\" height=\"22\" viewBox=\"0 0 12 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path d=\"M7.93775 21.3508V11.6247H11.2658L11.7641 7.83435H7.93775V5.4143C7.93775 4.31692 8.24844 3.569 9.85282 3.569L11.899 3.56807V0.178002C11.5449 0.131978 10.3304 0.0288086 8.91738 0.0288086C5.96726 0.0288086 3.94754 1.79514 3.94754 5.03911V7.83446H0.61084V11.6248H3.94744V21.3509L7.93775 21.3508Z\" fill=\"#B0B0B0\"/>\r\n</svg>', '2020-11-28 15:41:32', '2020-11-28 15:41:32'),
(3, NULL, NULL, '<svg width=\"19\" height=\"20\" viewBox=\"0 0 19 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M5.6074 17.3469C4.69024 17.3051 4.19174 17.1524 3.86045 17.0233C3.42125 16.8523 3.10788 16.6487 2.7784 16.3197C2.44893 15.9907 2.24498 15.6776 2.07475 15.2384C1.94561 14.9073 1.79283 14.4087 1.75114 13.4915C1.70554 12.5 1.69643 12.2021 1.69643 9.69006C1.69643 7.178 1.70629 6.88097 1.75114 5.88859C1.79291 4.97147 1.94681 4.47381 2.07475 4.14172C2.24573 3.70253 2.44938 3.38917 2.7784 3.05971C3.10743 2.73025 3.4205 2.52631 3.86045 2.35608C4.19159 2.22695 4.69024 2.07418 5.6074 2.03249C6.59899 1.98688 6.89686 1.97778 9.4079 1.97778C11.9189 1.97778 12.2171 1.98764 13.2095 2.03249C14.1267 2.07426 14.6244 2.22815 14.9565 2.35608C15.3957 2.52631 15.709 2.7307 16.0385 3.05971C16.368 3.38872 16.5712 3.70253 16.7422 4.14172C16.8713 4.47283 17.0241 4.97147 17.0658 5.88859C17.1114 6.88097 17.1205 7.178 17.1205 9.69006C17.1205 12.2021 17.1114 12.4992 17.0658 13.4915C17.024 14.4087 16.8705 14.9071 16.7422 15.2384C16.5712 15.6776 16.3675 15.991 16.0385 16.3197C15.7095 16.6484 15.3957 16.8523 14.9565 17.0233C14.6253 17.1524 14.1267 17.3052 13.2095 17.3469C12.2179 17.3925 11.9201 17.4016 9.4079 17.4016C6.89573 17.4016 6.59869 17.3925 5.6074 17.3469ZM9.4079 14.5203C6.74002 14.5203 4.57743 12.3578 4.57743 9.68999C4.57743 7.02222 6.74002 4.85972 9.4079 4.85972C12.0758 4.85972 14.2384 7.02222 14.2384 9.68999C14.2384 12.3578 12.0758 14.5203 9.4079 14.5203ZM13.4907 5.29541C13.3668 5.10972 13.3006 4.89145 13.3007 4.66819C13.301 4.36894 13.42 4.08202 13.6317 3.87045C13.8433 3.65888 14.1308 3.53997 14.43 3.53983C14.6533 3.53992 14.8715 3.60621 15.0571 3.73032C15.2427 3.85443 15.3873 4.03079 15.4727 4.23708C15.5581 4.44338 15.5803 4.67036 15.5367 4.88931C15.493 5.10826 15.3854 5.30935 15.2275 5.46716C15.0696 5.62496 14.8684 5.73239 14.6494 5.77586C14.4304 5.81933 14.2034 5.79688 13.9972 5.71136C13.7909 5.62584 13.6147 5.48109 13.4907 5.29541Z\" fill=\"#B0B0B0\"/>\r\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M5.6074 17.3469C4.69024 17.3051 4.19174 17.1524 3.86045 17.0233C3.42125 16.8523 3.10788 16.6487 2.7784 16.3197C2.44893 15.9907 2.24498 15.6776 2.07475 15.2384C1.94561 14.9073 1.79283 14.4087 1.75114 13.4915C1.70554 12.5 1.69643 12.2021 1.69643 9.69006C1.69643 7.178 1.70629 6.88097 1.75114 5.88859C1.79291 4.97147 1.94681 4.47381 2.07475 4.14172C2.24573 3.70253 2.44938 3.38917 2.7784 3.05971C3.10743 2.73025 3.4205 2.52631 3.86045 2.35608C4.19159 2.22695 4.69024 2.07418 5.6074 2.03249C6.59899 1.98688 6.89686 1.97778 9.4079 1.97778C11.9189 1.97778 12.2171 1.98764 13.2095 2.03249C14.1267 2.07426 14.6244 2.22815 14.9565 2.35608C15.3957 2.52631 15.709 2.7307 16.0385 3.05971C16.368 3.38872 16.5712 3.70253 16.7422 4.14172C16.8713 4.47283 17.0241 4.97147 17.0658 5.88859C17.1114 6.88097 17.1205 7.178 17.1205 9.69006C17.1205 12.2021 17.1114 12.4992 17.0658 13.4915C17.024 14.4087 16.8705 14.9071 16.7422 15.2384C16.5712 15.6776 16.3675 15.991 16.0385 16.3197C15.7095 16.6484 15.3957 16.8523 14.9565 17.0233C14.6253 17.1524 14.1267 17.3052 13.2095 17.3469C12.2179 17.3925 11.9201 17.4016 9.4079 17.4016C6.89573 17.4016 6.59869 17.3925 5.6074 17.3469ZM5.52951 0.340171C4.52806 0.385775 3.84375 0.544561 3.24613 0.777097C2.62721 1.01723 2.10327 1.3394 1.57971 1.86211C1.05614 2.38483 0.734792 2.90958 0.494646 3.52847C0.262101 4.12644 0.103308 4.81035 0.0577022 5.81176C0.0113437 6.81475 0.000732422 7.13541 0.000732422 9.68999C0.000732422 12.2446 0.0113437 12.5652 0.0577022 13.5682C0.103308 14.5697 0.262101 15.2535 0.494646 15.8515C0.734792 16.47 1.05622 16.9954 1.57971 17.5179C2.1032 18.0404 2.62721 18.3621 3.24613 18.6029C3.84488 18.8354 4.52806 18.9942 5.52951 19.0398C6.53307 19.0854 6.85321 19.0968 9.4079 19.0968C11.9626 19.0968 12.2833 19.0862 13.2863 19.0398C14.2878 18.9942 14.9717 18.8354 15.5697 18.6029C16.1882 18.3621 16.7125 18.0406 17.2361 17.5179C17.7596 16.9951 18.0803 16.47 18.3211 15.8515C18.5537 15.2535 18.7132 14.5696 18.7581 13.5682C18.8037 12.5645 18.8143 12.2446 18.8143 9.68999C18.8143 7.13541 18.8037 6.81475 18.7581 5.81176C18.7125 4.81028 18.5537 4.12606 18.3211 3.52847C18.0803 2.90995 17.7588 2.38566 17.2361 1.86211C16.7133 1.33857 16.1882 1.01723 15.5704 0.777097C14.9717 0.544561 14.2877 0.385022 13.287 0.340171C12.284 0.294567 11.9633 0.283203 9.40865 0.283203C6.85396 0.283203 6.53307 0.293814 5.52951 0.340171Z\" fill=\"#B0B0B0\"/>\r\n<path d=\"M6.27268 9.68999C6.27268 7.95831 7.67615 6.55414 9.4079 6.55414C11.1396 6.55414 12.5439 7.95831 12.5439 9.68999C12.5439 11.4217 11.1396 12.8258 9.4079 12.8258C7.67615 12.8258 6.27268 11.4217 6.27268 9.68999Z\" fill=\"#B0B0B0\"/>\r\n</svg>', '2020-11-28 15:41:35', '2020-11-28 15:41:35'),
(4, NULL, NULL, '<svg width=\"24\" height=\"24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M11.987 24C6.554 24 1.963 20.397.478 15.452l.008-.027 4.23 1.71a3.195 3.195 0 001.917 2.248c1.652.676 3.557-.095 4.244-1.714a3.14 3.14 0 00.25-1.31l4.099-2.871.1.002c2.453 0 4.446-1.96 4.446-4.366 0-2.406-1.993-4.364-4.446-4.364-2.451 0-4.446 1.958-4.446 4.364l.001.057-2.864 4.077a3.267 3.267 0 00-1.92.521L.09 11.355 0 11.204C.411 4.947 5.62 0 11.987 0 18.622 0 24 5.373 24 12s-5.378 12-12.013 12zm-5.069-5.289c1.276.521 2.743-.072 3.275-1.324a2.4 2.4 0 00.004-1.88 2.461 2.461 0 00-1.352-1.334 2.536 2.536 0 00-1.847-.027l1.496.607a1.797 1.797 0 01.993 2.366c-.39.922-1.47 1.359-2.41.975l-1.448-.588c.256.525.7.965 1.29 1.205zm5.446-9.587c0 1.604 1.33 2.909 2.962 2.909 1.634 0 2.963-1.305 2.963-2.909 0-1.602-1.329-2.908-2.963-2.908-1.632 0-2.962 1.306-2.962 2.908zm2.967-2.19c-1.227 0-2.224.98-2.224 2.186s.997 2.184 2.224 2.184c1.23 0 2.226-.978 2.226-2.184 0-1.207-.997-2.185-2.226-2.185z\" fill=\"#313131\"/></svg>', '2020-11-28 15:41:39', '2020-11-28 15:41:39'),
(5, NULL, NULL, '<svg width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M13.9756 17.111C15.0746 17.5918 15.4867 16.5844 15.4867 16.5844L18.3945 1.97677C18.3716 0.992243 17.0436 1.58754 17.0436 1.58754L0.764603 7.9755C0.764603 7.9755 -0.0138585 8.25025 0.0548292 8.73107C0.123517 9.21188 0.741707 9.44084 0.741707 9.44084L4.84008 10.8146C4.84008 10.8146 6.07646 14.8672 6.32831 15.6456C6.55727 16.4012 6.76333 16.4241 6.76333 16.4241C6.99229 16.5157 7.19836 16.3554 7.19836 16.3554L9.85428 13.9513L13.9756 17.111ZM14.6853 4.56387C14.6853 4.56387 15.2577 4.22043 15.2348 4.56387C15.2348 4.56387 15.3264 4.60966 15.0287 4.93021C14.754 5.20496 8.27441 11.0205 7.40436 11.799C7.33567 11.8448 7.28988 11.9135 7.28988 12.005L7.03803 14.1573C6.99224 14.3862 6.69459 14.4091 6.6259 14.2031L5.54979 10.6771C5.504 10.5397 5.54979 10.3794 5.68717 10.2879L14.6853 4.56387Z\" fill=\"#B0B0B0\"/>\r\n</svg>', '2020-11-28 15:41:46', '2020-11-28 15:41:46'),
(6, NULL, NULL, '<svg width=\"31\" height=\"19\" viewBox=\"0 0 31 19\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">\r\n<path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M30.31 2.09911C30.5193 1.41383 30.31 0.910156 29.3141 0.910156H26.0209C25.1835 0.910156 24.7977 1.34521 24.5884 1.82509C24.5884 1.82509 22.9136 5.83439 20.5411 8.43872C19.7736 9.19262 19.4247 9.43221 19.006 9.43221C18.7967 9.43221 18.4937 9.19262 18.4937 8.50734V2.09911C18.4937 1.27659 18.2507 0.910156 17.5528 0.910156H12.3779C11.8547 0.910156 11.54 1.29184 11.54 1.65366C11.54 2.43343 12.726 2.61318 12.8483 4.80625V9.56968C12.8483 10.614 12.6564 10.8035 12.2377 10.8035C11.1213 10.8035 8.40588 6.7759 6.79506 2.16773C6.47939 1.27197 6.16278 0.910156 5.32115 0.910156H2.028C1.08711 0.910156 0.898926 1.34521 0.898926 1.82509C0.898926 2.6818 2.01554 6.93116 6.09739 12.5511C8.81894 16.3887 12.6526 18.4695 16.1415 18.4695C18.235 18.4695 18.4937 18.0074 18.4937 17.2115V14.3107C18.4937 13.3865 18.692 13.2022 19.3546 13.2022C19.8434 13.2022 20.6806 13.442 22.6346 15.2924C24.8674 17.4852 25.2353 18.4695 26.4914 18.4695H29.7845C30.7254 18.4695 31.1958 18.0074 30.9244 17.0955C30.6275 16.1865 29.5615 14.8682 28.1469 13.305C27.3793 12.4138 26.2279 11.4543 25.8793 10.9747C25.3907 10.3578 25.5302 10.0838 25.8793 9.53572C25.8793 9.53572 29.8913 3.9842 30.31 2.09934V2.09911Z\" fill=\"#B0B0B0\"/>\r\n</svg>', '2020-11-28 15:41:49', '2020-11-28 15:41:49');

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
(1, 2, 'tester', NULL, 'tester@t.r', NULL, NULL, '$2y$10$Afnjz6LQ1MfXRxj2tILCqem/3U/QczZWHtKFcN2mqR74ruHQTfnaq', '8R9hFSFWCYi7EY3cIFgKeITvUElwDf9WjG4aiANYFWy5gVJo0mqnjKZD8CqS', NULL, NULL),
(2, 1, 'tester', NULL, 'tester@t.rdwadwa', NULL, NULL, '$2y$10$cpRoVAiAJeFLr8LTfRnT0OVm.J0rIHXvtwdYpqvlIur3Yrm9tQcPO', NULL, '2020-11-04 19:00:03', '2020-11-04 19:00:03'),
(3, 1, 'tester', NULL, 'tester@t.r312321312312', NULL, NULL, '$2y$10$WV3PYsJIfq81LVhu3.XP5eBvClNB6XGPYX8RbTvz14hiCD.wGhWKG', NULL, '2020-11-04 19:01:36', '2020-11-04 19:01:36'),
(4, 1, 'ilya.burenko.01', NULL, 'ilya.burenko.01@mail.ru', NULL, NULL, '$2y$10$/aj17RdVy8dD3FlilSvFd.PVJOx2oFNlW.gY4ThJKjscY42wrm812', '0BI3ao5h6B7tnuNXglv3BcwZIYZISkjkAnHK8DpotsYYHYO2tTyKNx9mprQr', '2020-11-10 17:34:59', '2020-11-12 15:16:54'),
(5, 1, 'ilya.burenko.01', NULL, 'ilya.burenko.01@gmail.com', NULL, NULL, '$2y$10$cOSODd1MhX7zuG0KW4R5BOeFkgQutgX0Tjl3Mb1iz4jCXqGr0GZWa', NULL, '2020-11-10 18:57:56', '2020-11-10 18:57:56'),
(6, 1, 'potap', NULL, 'potap@potap.ru', NULL, NULL, '$2y$10$lmA3tmCtOyC4DU2B535fHe.yxtnufLJG5N/gBUChzOL6uOT3vsgOa', NULL, '2020-11-28 17:39:05', '2020-11-28 17:39:05');

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
(5, 5, '1000', '2020-11-10 18:57:56', '2020-11-10 18:57:56'),
(6, 6, '1000', '2020-11-28 17:39:06', '2020-11-28 17:39:06');

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
-- Дамп данных таблицы `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `authentication_id`, `type`, `login`, `img`, `email`, `created_at`, `updated_at`) VALUES
(2, 1, '180529199', 'vkontakte', 'Ilya_Burenko', 'https://sun6-21.userapi.com/impg/c855332/v855332892/1d6928/OCGOxvcE1yU.jpg?size=200x0&quality=88&crop=0,0,923,923&sign=074763423c7b5f326eb97dabbd002aea&c_uniq_tag=lrZa053Ub1ZyTrGRcYg2lh3-3zcIHJ36e7cnypijNug&ava=1', 'ilya.burenko.01@mail.ru', '2020-11-28 16:59:51', '2020-11-28 16:59:51'),
(3, 1, '-1', 'google', 'higta99_higta9988', 'https://lh5.googleusercontent.com/-U0zWFPOHwzQ/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmay8qdbfIYK7_-pwWsb5ZvgvHpDQ/s96-c/photo.jpg', 'higtahigta9988@gmail.com', '2020-12-01 16:03:13', '2020-12-01 16:03:13');

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
-- Индексы таблицы `catalog_languages`
--
ALTER TABLE `catalog_languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_operating_system`
--
ALTER TABLE `catalog_operating_system`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `developers`
--
ALTER TABLE `developers`
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
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
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
-- Индексы таблицы `operating_system`
--
ALTER TABLE `operating_system`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `social_networks`
--
ALTER TABLE `social_networks`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `catalog_keys`
--
ALTER TABLE `catalog_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `catalog_languages`
--
ALTER TABLE `catalog_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `catalog_operating_system`
--
ALTER TABLE `catalog_operating_system`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `developers`
--
ALTER TABLE `developers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `history_payments`
--
ALTER TABLE `history_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `licks`
--
ALTER TABLE `licks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=465;

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
-- AUTO_INCREMENT для таблицы `operating_system`
--
ALTER TABLE `operating_system`
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
-- AUTO_INCREMENT для таблицы `social_networks`
--
ALTER TABLE `social_networks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_abouts`
--
ALTER TABLE `user_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
