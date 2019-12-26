-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 12 月 26 日 06:45
-- 伺服器版本： 8.0.18
-- PHP 版本： 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `AIS_Project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `data_list`
--

CREATE TABLE `data_list` (
  `id` int(8) NOT NULL,
  `main_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  `second_keyword` text COLLATE utf8mb4_general_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int(20) NOT NULL,
  `color` text COLLATE utf8mb4_general_ci NOT NULL,
  `part` text COLLATE utf8mb4_general_ci NOT NULL,
  `thickness` text COLLATE utf8mb4_general_ci NOT NULL,
  `size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instruction_for_use` text COLLATE utf8mb4_general_ci NOT NULL,
  `instruction_for_others` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `data_list`
--

INSERT INTO `data_list` (`id`, `main_keyword`, `second_keyword`, `product_description`, `price`, `color`, `part`, `thickness`, `size`, `instruction_for_use`, `instruction_for_others`) VALUES
(1, '羽絨外套', '外套', '一件外套', 1000, '白色', '上衣', '20', 'L', '穿', '沒有'),
(2, '雨衣', '雨', '暫時沒有', 30, '黃色', '上衣', '20', 'M', '穿', '沒有'),
(3, '陽傘', '傘', '擋雨', 100, '黑色', '手持', '300', 'S', '開起來', '傘的說明'),
(4, '皮外套', '皮', '一件外套', 999, '黑色', '上衣', '100', 'L', '穿上', '無');

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('b0981819277@gmail.com', '$2y$10$/6EiXtlQApRzAZp3EQiBU.4y7QhibbvgRkbl4QfJuSc.DV4XQ9YpS', '2019-12-22 23:48:04');

-- --------------------------------------------------------

--
-- 資料表結構 `recent_keywords`
--

CREATE TABLE `recent_keywords` (
  `id` int(6) NOT NULL,
  `keywords` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `recent_keywords`
--

INSERT INTO `recent_keywords` (`id`, `keywords`) VALUES
(59, '外套'),
(60, '皮'),
(61, '雨'),
(62, '傘'),
(63, '外套'),
(64, '皮'),
(65, '雨'),
(66, '雨'),
(67, '雨'),
(68, '雨'),
(69, '雨'),
(70, '雨'),
(71, '雨'),
(72, '雨'),
(73, '雨'),
(74, '雨'),
(75, '雨'),
(76, '雨'),
(77, '雨'),
(78, '雨'),
(79, '雨'),
(80, '外套'),
(82, '傘'),
(83, '皮'),
(84, '皮'),
(85, '傘'),
(86, '皮'),
(87, '外套'),
(88, '雨'),
(89, '傘'),
(90, '外套'),
(95, '外套'),
(96, '皮'),
(97, '外套'),
(98, '外套'),
(99, '雨'),
(100, '傘'),
(101, '皮'),
(102, '外套'),
(103, '外套'),
(104, '外套'),
(105, '外套'),
(106, '外套'),
(107, '外套'),
(108, '雨'),
(109, '雨'),
(112, '雨'),
(113, '雨'),
(114, '皮'),
(115, '外套'),
(116, '外套'),
(117, '外套'),
(120, '皮'),
(121, '皮'),
(122, '外套'),
(123, '外套'),
(124, '傘'),
(125, '雨'),
(126, '雨'),
(127, '雨'),
(128, '雨'),
(129, '雨'),
(130, '雨'),
(131, '雨'),
(132, '雨'),
(133, '雨'),
(134, '雨'),
(135, '雨'),
(136, '雨'),
(137, '雨'),
(138, '傘'),
(139, '雨'),
(140, '皮'),
(141, '雨'),
(142, '外套'),
(143, '外套'),
(144, '外套'),
(145, '外套'),
(146, '外套'),
(147, '外套'),
(148, '外套'),
(149, '外套'),
(150, '外套'),
(151, '外套'),
(152, '外套'),
(153, '外套'),
(154, '外套'),
(155, '外套'),
(156, '外套'),
(157, '外套'),
(158, '外套'),
(159, '雨'),
(160, '雨'),
(161, '外套'),
(162, '外套'),
(163, '外套'),
(164, '外套'),
(165, '外套'),
(166, '外套'),
(167, '外套'),
(168, '外套'),
(169, '外套'),
(170, '外套'),
(171, '外套'),
(172, '外套'),
(173, '皮'),
(174, '皮'),
(175, '皮'),
(176, '外套'),
(177, '外套'),
(178, '外套'),
(179, '外套'),
(180, '外套'),
(181, '外套'),
(182, '外套'),
(183, '外套'),
(184, '外套'),
(185, '雨'),
(186, '外套'),
(187, '外套'),
(188, '皮'),
(189, '外套'),
(190, '皮革'),
(191, '皮革'),
(192, '雨'),
(193, '外套'),
(194, '外套'),
(195, '雨'),
(196, '雨'),
(197, '外套'),
(198, '外套'),
(199, '外套'),
(200, '123'),
(201, '雨'),
(202, '123');

-- --------------------------------------------------------

--
-- 資料表結構 `shop_list`
--

CREATE TABLE `shop_list` (
  `id` int(4) NOT NULL,
  `shop` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `shop_list`
--

INSERT INTO `shop_list` (`id`, `shop`) VALUES
(32, 'pchome'),
(33, '蝦皮'),
(35, '露天');

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `id` int(4) NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, '資料分析與處理系統');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yang', 'b0981819277@gmail.com', NULL, '$2y$10$FTdELX46eS2G42OSwWFQ/eokVE66FE3aC/HDburX5MQfyeCSRPhGu', NULL, '2019-11-28 21:49:07', '2019-11-28 21:49:07');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `data_list`
--
ALTER TABLE `data_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `recent_keywords`
--
ALTER TABLE `recent_keywords`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `shop_list`
--
ALTER TABLE `shop_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `data_list`
--
ALTER TABLE `data_list`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `recent_keywords`
--
ALTER TABLE `recent_keywords`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_list`
--
ALTER TABLE `shop_list`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `title`
--
ALTER TABLE `title`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
