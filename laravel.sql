-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 26 2020 г., 23:22
-- Версия сервера: 5.6.41
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `computers`
--

CREATE TABLE `computers` (
  `id` int(10) UNSIGNED NOT NULL,
  `flag_inWarehouse` tinyint(1) NOT NULL DEFAULT '1',
  `room_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `texture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `comment` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_buy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_commisioning_begin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_commisioning_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_decommissioned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `inventarization_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `localnetwork` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `internet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `domen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_lastClear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_lastChangeThermalGrease` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_lastCheck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `case_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `case_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `board_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `board_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `board_socket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `board_bios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_socket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_count_cores` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_count_threads` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_freq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_tdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_max_temperature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_integrated_gpu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_architecture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `disk_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `disk_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `structure_id` int(10) NOT NULL,
  `structure_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `structures`
--

CREATE TABLE `structures` (
  `id` int(10) UNSIGNED NOT NULL,
  `flag_active` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `thinclients`
--

CREATE TABLE `thinclients` (
  `id` int(10) NOT NULL,
  `flag_inWarehouse` tinyint(1) NOT NULL DEFAULT '1',
  `room_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `texture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `comment` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_buy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_commisioning_begin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_commisioning_end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_decommissioned` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `inventarization_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `operation_system` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_count_core` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cpu_freq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ram_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `hdd_space` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ssd_space` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gpu_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usb2_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `usb3_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_lastClear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `date_lastCheck` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'superadmin', '$2y$10$FUEJsELKHn5vr3j8.jYuJ.ciZOx5rMqew6Qb/3RG5qnnTUT9uiKsm', '2OPrk1rYWEwbotjRsIl2zcfGyhshKp6N9U8xm0ZAxf1gS9wqyrFdUPMXvJa7', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_name_index` (`name`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `thinclients`
--
ALTER TABLE `thinclients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `structures`
--
ALTER TABLE `structures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `thinclients`
--
ALTER TABLE `thinclients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
