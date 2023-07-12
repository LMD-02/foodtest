-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 12, 2023 lúc 06:01 PM
-- Phiên bản máy phục vụ: 8.0.33-0ubuntu0.20.04.2
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `food`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_07_06_163427_create_products_table', 1),
(5, '2023_07_07_142306_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `food_need` text COLLATE utf8mb4_unicode_ci,
  `food_step` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `food_need`, `food_step`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Cá kho', 'data:image/jpeg;base64,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', 'Món cá kho mềm , ngon dễ ăn', '- cá\r\n- Thịt ba chỉ\r\n- Riềng mẻ\r\n- Nước hàng', 'Bước 1: Sơ chế cá và thịt\r\nBước 2: Cho vào nồi\r\nBước 3: Nấu', 'Món kho', NULL, NULL),
(2, 'Cá rán', 'data:image/jpeg;base64,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', 'Cá rô phi rán ròn tan', '- Cá\r\n- Mắm', 'Bước 1: sơ chế\r\nBước 2: gián', 'Chiên/rán', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`) VALUES
(1, 'admin@gmail.com', '123', 1, 'Admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
