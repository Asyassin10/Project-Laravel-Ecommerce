-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 05:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yassin', 'asyassin06@gmail.com', '2021-09-24 18:54:26', '$2y$10$SyTXJ9vnGatZ4zxRhSR.6.Wabelu.bm4IM0v.0Ku6W3oCTvf2MrDe', 'nfT9RJ0XeqD9eR2o1HGOJrxSD19nRHR7JPDbjcj3egB2FGAc4SNwlLTjLRW4', '2021-09-24 18:54:26', '2021-09-24 18:54:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', '', '2021-09-24 19:04:30', '2021-09-24 19:04:30'),
(2, 'Television', '', '2021-09-24 19:05:59', '2021-09-24 19:05:59'),
(5, 'Camera\r\n', '', '2021-09-24 19:08:15', '2021-09-24 19:08:15'),
(11, 'Mac', '', '2021-09-24 19:08:29', '2021-09-24 19:08:29'),
(12, 'Samsung', '', '2021-09-24 19:08:39', '2021-09-24 19:08:39'),
(13, 'Play station', '', '2021-09-24 19:08:47', '2021-09-24 19:08:47'),
(14, 'Xbox', '', '2021-09-24 19:08:59', '2021-09-24 19:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_09_11_141213_create_categories_table', 1),
(7, '2021_09_11_141504_create_sessions_table', 1),
(8, '2021_09_11_144609_create_prouducts_table', 1),
(9, '2021_09_11_154441_create_orders_table', 1),
(10, '2021_09_11_161823_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qentity` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_total` double(8,2) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `qentity`, `product_name`, `price`, `price_total`, `paid`, `delivered`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Macbook Pro', 10500.00, 21000.00, 1, 0, 1, '2021-09-24 19:35:27', '2021-09-24 19:35:27'),
(2, 3, 'iPhone XS', 9500.00, 28500.00, 1, 1, 1, '2021-09-25 09:46:19', '2021-09-25 09:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prouducts`
--

CREATE TABLE `prouducts` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `old_price` double(8,2) NOT NULL DEFAULT 0.00,
  `in_stock` int(11) NOT NULL DEFAULT 0,
  `qty` int(11) NOT NULL DEFAULT 0,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prouducts`
--

INSERT INTO `prouducts` (`product_id`, `product_name`, `description`, `price`, `old_price`, `in_stock`, `qty`, `picture`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 12 pro max', 'The iPhone 12 Pro Max is the high-end large-format model of the 14th generation of Apple\'s smartphone announced on October 13, 2020. It is equipped with a 6.7-inch OLED HDR 60 Hz display, a triple photo sensor with ultra wide-angle and telephoto (x5 optical) and an Apple A14 Bionic SoC compatible 5G (sub-6 GHz).', 10100.00, 10500.00, 20, 0, 'images/products/1632514201_-11598467352bzdw9z3vxp.png', 1, '2021-09-24 19:10:01', '2021-09-24 19:37:02'),
(2, 'playstation 5 Console Playstation 5 [PS5]', 'The PS5 is a home console with optical support (4K Blu-ray) announced for the end of 2020. The PS5 logically succeeds the PS4 and introduces with it a new hardware architecture with an AMD Octa-Core CPU clocked at 3 , 5 GHz supported by 16 GB of GDDR6 RAM and an AMD RDNA 2 GPU. Its price has not been formalized.', 5000.00, 5200.00, 50, 0, 'images/products/1632514409_p1099243-scaled-e1604669009283.jpg', 13, '2021-09-24 19:13:29', '2021-09-24 19:37:21'),
(3, 'Xbox Series X', 'The Microsoft Xbox Series X is a home console with optical support (4K Blu-ray) announced for the end of 2020. The Microsoft Xbox Series X succeeds the Xbox One and introduces with it a new hardware architecture with an Octa-CPU. Core AMD clocked at 3.8 GHz supported by 16 GB of GDDR6 RAM and an AMD RDNA 2 GPU. It will be available at 499 euros when it is released on November 10, 2020 and for pre-order from September 22, 2020.', 4900.00, 5100.00, 40, 0, 'images/products/1632514536_microsoft-xbox-series-x-frandroid.png', 14, '2021-09-24 19:15:36', '2021-09-24 19:37:41'),
(4, 'SGalaxy S21 Ultra', 'The Galaxy S21 Ultra is Samsung\'s benchmark smartphone for the year 2021. Equipped with a very large 6.8-inch screen with a refresh rate of 120 Hz, this device relies heavily on the photo. On its back we find a 108 Mpix sensor, an ultra wide-angle module, a x3 zoom and a x10 periscope zoom. Thanks to its very large 5000 mAh battery and its Exynos 2100 processor, this device should also offer great ease of use.', 4900.00, 5000.00, 50, 0, 'images/products/1632514993_samsung-galaxy-s21-ultra-silver.jpg', 12, '2021-09-24 19:23:13', '2021-09-24 19:23:13'),
(5, 'Macbook Pro', 'With its TouchBar and Touch ID, the Apple MacBook Pro 13 is an ultraportable equipped with the Intel Core i5 processor and equipped with a 13.3-inch WQXGA IPS screen. It is compact in size and has 512 GB of SSD storage with 8 GB of RAM.', 10500.00, 2000.00, 20, 0, 'images/products/1632515387_NicePng_macbook-air-png_1843738.png', 11, '2021-09-24 19:29:47', '2021-09-24 19:29:47'),
(6, 'Nikon D5600', 'The Nikon D5600 is an efficient consumer SLR that benefits from undeniable advantages, such as its beautiful touch screen and swivel, its responsiveness and its image quality. Still, it does not add anything compared to the D5500, except Snapbridge, which is not really essential. You might as well buy the latter, whose performance is identical and the price is lower.', 3900.00, 4500.00, 20, 0, 'images/products/1632516332_pngwing.com.png', 5, '2021-09-24 19:45:32', '2021-09-24 19:45:32'),
(7, 'Samsung 55 \"Series 7 N Smart UHD TV', '55 \'\' UHD Smart TV 3840x2160 Resolution, Real 4K High Dynamic Range HDR Elite Image Quality, UHD 1300 Micro-Dimming, Skinny Bezel Concept, Contrast Enhancer, ISDB-T Digital TV is Ready, Motion Rate 100, Auto Motion Plus Dolby Digital 20W RMS sound output, speaker. 2CH 3 HDMI inputs 2 USB ports, Quadcore-core Digital Clean View Proces Automatic channel search 120', 7640.00, 8000.00, 20, 0, 'images/products/1632516513_televiseur-samsung-55-serie7-n-smart-uhd-.jpg', 2, '2021-09-24 19:48:33', '2021-09-24 19:48:33'),
(8, 'iPhone XS', 'iPhone XS Max price Morocco, is quite simple and very elegant. l has a slightly larger screen, which is very popular with customers. It\'s modern and convenient, the ports and buttons are a perfectly designed LED case to keep your phone protected.', 9500.00, 10000.00, 50, 0, 'images/products/1632516669_iPhone-XS-Max_11.png', 1, '2021-09-24 19:51:09', '2021-09-24 19:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qUGGQmNDLMMcn3MqofrWuQpK2EL9G7qgMtd5Ymd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidWFvcEQxMDRwUVhMTGphdDdNTG1PT0lOODVjS1pSenNUb3ZSU2d3OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJEY0a1dJTG5jbS41emhCRlRHbWVSZGVHZGRiY0lCTEpaY1RCN1k2U3l3TTBLLnE1UjNHUWx5IjtzOjQ6ImNhcnQiO2E6MTp7czo3OiJkZWZhdWx0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6MTp7czo4OiIAKgBpdGVtcyI7YToxOntzOjMyOiJhYWJiNzIwMjk1YTNhOGFmMmIwODAwOGQ1NjA5NWUwYiI7TzozMjoiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0iOjEwOntzOjU6InJvd0lkIjtzOjMyOiJhYWJiNzIwMjk1YTNhOGFmMmIwODAwOGQ1NjA5NWUwYiI7czoyOiJpZCI7aToxO3M6MzoicXR5IjtzOjI6IjE3IjtzOjQ6Im5hbWUiO3M6MTc6IklwaG9uZSAxMiBwcm8gbWF4IjtzOjU6InByaWNlIjtkOjEwMTAwO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjQ6e3M6NToiaW1hZ2UiO3M6NTM6ImltYWdlcy9wcm9kdWN0cy8xNjMyNTE0MjAxXy0xMTU5ODQ2NzM1MmJ6ZHc5ejN2eHAucG5nIjtzOjg6ImluX3N0b2NrIjtpOjIwO3M6ODoicHJvdWR1Y3QiO2k6MTtzOjQ6ImRlc2MiO3M6MzEzOiJUaGUgaVBob25lIDEyIFBybyBNYXggaXMgdGhlIGhpZ2gtZW5kIGxhcmdlLWZvcm1hdCBtb2RlbCBvZiB0aGUgMTR0aCBnZW5lcmF0aW9uIG9mIEFwcGxlJ3Mgc21hcnRwaG9uZSBhbm5vdW5jZWQgb24gT2N0b2JlciAxMywgMjAyMC4gSXQgaXMgZXF1aXBwZWQgd2l0aCBhIDYuNy1pbmNoIE9MRUQgSERSIDYwIEh6IGRpc3BsYXksIGEgdHJpcGxlIHBob3RvIHNlbnNvciB3aXRoIHVsdHJhIHdpZGUtYW5nbGUgYW5kIHRlbGVwaG90byAoeDUgb3B0aWNhbCkgYW5kIGFuIEFwcGxlIEExNCBCaW9uaWMgU29DIGNvbXBhdGlibGUgNUcgKHN1Yi02IEdIeikuIjt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MjE7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDtzOjg6InByaWNlVGF4IjtkOjEyMjIxO319fX19', 1632581342),
('8pWgoxBzxwPCwaz071khLAvD1M34vcqQIPrE3lYF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2xoWXVEU0pKRG91WkNZOHRJNGtMTVlCd0hWV1NsZ2tVTzRZRXpZZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9vcmRlcnMiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1632567212);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `address`, `city`, `country`, `active`, `code`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'yassin', 'asyassin06@gmail.com', NULL, '$2y$10$F4kWILncm.5zhBFTGmeRdeGddbcIBLJZcTB7Y6SywM0K.q5R3GQly', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2021-09-24 18:53:22', '2021-09-24 18:53:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prouducts`
--
ALTER TABLE `prouducts`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `prouducts_categories_id_foreign` (`categories_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prouducts`
--
ALTER TABLE `prouducts`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prouducts`
--
ALTER TABLE `prouducts`
  ADD CONSTRAINT `prouducts_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
