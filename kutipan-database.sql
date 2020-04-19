-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2020 pada 05.30
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_laravel_kutipan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `likeable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `likeable_id`, `likeable_type`) VALUES
(1, 1, 19, 'App\\Models\\Quote'),
(2, 1, 6, 'App\\Models\\QuoteComment'),
(7, 1, 7, 'App\\Models\\Quote'),
(8, 1, 1, 'App\\Models\\QuoteComment'),
(11, 1, 2, 'App\\Models\\QuoteComment'),
(13, 2, 20, 'App\\Models\\Quote'),
(14, 3, 7, 'App\\Models\\Quote'),
(22, 3, 7, 'App\\Models\\QuoteComment');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_17_141435_create_quotes_table', 2),
(6, '2019_12_14_144720_create_quotes_comments_table', 3),
(7, '2019_12_15_135153_create_tags_table', 4),
(8, '2019_12_15_135505_create_quote_tag_table', 4),
(9, '2020_04_15_043523_create_table_likes', 5),
(10, '2020_04_18_143505_create_table_like', 6),
(11, '2020_04_19_020840_create_notifications_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `subject`, `user_id`, `quote_id`, `seen`, `created_at`, `updated_at`) VALUES
(1, 'Ada komentar', 1, 20, 1, '2020-04-18 19:25:28', '2020-04-18 20:09:56'),
(2, 'Ada komentar jordi jord', 1, 20, 1, '2020-04-18 19:27:09', '2020-04-18 20:09:56'),
(3, 'Ada komentar dari: viko', 3, 21, 1, '2020-04-18 20:10:54', '2020-04-18 20:11:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quotes`
--

INSERT INTO `quotes` (`id`, `title`, `slug`, `subject`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'quotes kedua', 'quotes-kedua-1576326922', 'quotes keduaquotes keduaquotes keduaquotes keduaquotes kedua', 1, '2019-12-14 05:35:22', '2019-12-14 05:35:22'),
(4, 'quote ke-3', 'quote-ke-3-1576330232', 'quote ke-3vquote ke-3quote ke-3quote ke-3quote ke-3', 1, '2019-12-14 06:30:32', '2019-12-14 06:30:32'),
(5, 'quotes pertama', 'quotes-pertama-1576330287', 'quotes pertamaquotes pertamaquotes pertamaquotes pertamaquotes pertamaquotes pertama', 1, '2019-12-14 06:31:27', '2019-12-14 06:31:27'),
(6, 'contoh lagi', 'contoh-lagi', 'contoh lagicontoh lagicontoh lagicontoh lagicontoh lagi', 1, '2019-12-14 06:32:56', '2019-12-14 06:32:56'),
(7, 'kutipan jajang', 'kutipan-jajang', 'jajang ganteng ganteng banget', 2, '2019-12-14 07:44:55', '2019-12-14 07:44:55'),
(11, 'test quote tag', 'test-quote-tag', 'test quote tag', 1, '2019-12-15 07:32:30', '2019-12-15 07:32:30'),
(14, 'tag Kosong', 'tag-kosong', 'tag Kosong', 1, '2019-12-15 07:40:20', '2019-12-15 07:40:20'),
(15, 'jadi motivasi aja', 'tag-tag', 'tag tagtag tag', 1, '2019-12-15 07:57:02', '2019-12-15 08:01:48'),
(19, 'jadi motivasi aj', 'jadi-motivasi-aja-11', 'tag tagtag tag', 1, '2019-12-15 08:04:33', '2019-12-15 08:05:39'),
(20, 'tag motivas', 'tag-motivas', 'tag motivastag motivas', 1, '2019-12-24 07:55:49', '2019-12-24 07:55:49'),
(21, 'jangan menyerah by jordi', 'jangan-menyerah-by-jordi', 'ayo kita jangan menyerah', 3, '2020-04-18 08:39:39', '2020-04-18 08:39:39'),
(22, 'contoh', 'contoh', 'contoh improvisasi tag', 3, '2020-04-18 20:23:34', '2020-04-18 20:23:34'),
(23, 'air beriak tanda tak dalam', 'air-beriak-tanda-tak-dalam', 'air beriak tanda tak dalamair beriak tanda tak dalamair beriak tanda tak dalamair beriak tanda tak dalam', 3, '2020-04-18 20:24:34', '2020-04-18 20:24:34'),
(24, 'usaha tidak menghianati hasil', 'usaha-tidak-menghianati-hasil', 'usia tidak menghianati hasil', 3, '2020-04-18 20:26:35', '2020-04-18 20:26:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quote_comments`
--

CREATE TABLE `quote_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quote_comments`
--

INSERT INTO `quote_comments` (`id`, `subject`, `quote_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Komentar pada kutipan jajang', 7, 2, '2019-12-14 08:06:59', '2019-12-14 08:06:59'),
(2, 'komentar dari jajang', 3, 2, '2019-12-14 08:10:37', '2019-12-14 08:10:37'),
(3, 'halo ini viko', 3, 1, '2019-12-15 05:07:50', '2019-12-15 05:07:50'),
(4, 'coment lagi viko', 3, 1, '2019-12-15 05:09:15', '2019-12-15 05:09:15'),
(5, 'cacacacaca', 3, 1, '2020-04-14 21:22:43', '2020-04-14 21:22:43'),
(6, 'ayo rek', 19, 1, '2020-04-18 07:40:28', '2020-04-18 07:40:28'),
(7, 'cocok', 20, 1, '2020-04-18 07:57:47', '2020-04-18 07:57:47'),
(9, 'jordi comment', 21, 3, '2020-04-18 08:40:52', '2020-04-18 08:40:52'),
(11, 'jordi komen lagi', 20, 3, '2020-04-18 19:27:09', '2020-04-18 19:27:09'),
(12, 'hallo jordi', 21, 1, '2020-04-18 20:10:54', '2020-04-18 20:10:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quote_tag`
--

CREATE TABLE `quote_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `quote_tag`
--

INSERT INTO `quote_tag` (`id`, `quote_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(19, 14, 2, NULL, NULL),
(20, 14, 1, NULL, NULL),
(21, 20, 1, NULL, NULL),
(22, 21, 3, NULL, NULL),
(24, 22, 1, NULL, NULL),
(25, 23, 1, NULL, NULL),
(26, 23, 1, NULL, NULL),
(27, 24, 1, NULL, NULL),
(28, 24, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Motivasi', NULL, NULL),
(2, 'Kehidupan', NULL, NULL),
(3, 'Nasionalisme', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'viko', 'viko@gmail.com', NULL, '$2y$10$VOuuY4jxVthsTuvgezf7KeqtQrW2CdptvEeO3N88qAgKcG0LjUWG.', NULL, '2019-09-21 05:05:01', '2019-09-21 05:05:01'),
(2, 'Jajang', 'jajang@mail.com', NULL, '$2y$10$KGR9S6eEsAZvMo4Z7Us/2eWlC5ygcIkVj2oO9iADL7.cqChoopRae', NULL, '2019-12-14 06:41:16', '2019-12-14 06:41:16'),
(3, 'jordi jord', 'jordi@gmail.com', NULL, '$2y$10$dTy8Sr/yNPkAKKW56PK0ZezVM2XP11CCyXZ82uNGQCxWebCHui7H.', NULL, '2020-04-18 08:09:12', '2020-04-18 08:09:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `notifications_quote_id_foreign` (`quote_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotes_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `quote_comments`
--
ALTER TABLE `quote_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_comments_quote_id_foreign` (`quote_id`),
  ADD KEY `quote_comments_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `quote_tag`
--
ALTER TABLE `quote_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_tag_tag_id_foreign` (`tag_id`),
  ADD KEY `quote_tag_quote_id_foreign` (`quote_id`);

--
-- Indeks untuk tabel `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `quote_comments`
--
ALTER TABLE `quote_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `quote_tag`
--
ALTER TABLE `quote_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_quote_id_foreign` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `quote_comments`
--
ALTER TABLE `quote_comments`
  ADD CONSTRAINT `quote_comments_quote_id_foreign` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quote_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `quote_tag`
--
ALTER TABLE `quote_tag`
  ADD CONSTRAINT `quote_tag_quote_id_foreign` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quote_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
