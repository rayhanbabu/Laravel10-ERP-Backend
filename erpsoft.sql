-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2026 at 04:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `collors`
--

CREATE TABLE `collors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `collor_name` varchar(255) NOT NULL,
  `collor_des` varchar(255) DEFAULT NULL,
  `collor_status` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university_id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_address` varchar(255) DEFAULT NULL,
  `dept_code` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `established_date` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`id`, `university_id`, `dept_name`, `dept_address`, `dept_code`, `faculty`, `established_date`, `created_by`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ancova Building Limited', 'Dhaka', NULL, NULL, NULL, '1', NULL, '2026-08-03 14:15:14', '2026-08-03 14:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `maintains`
--

CREATE TABLE `maintains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `maintain_username` varchar(255) DEFAULT NULL,
  `login_device` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `login_code` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `forget_code` varchar(255) DEFAULT NULL,
  `forget_time` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `view_access` varchar(255) DEFAULT NULL,
  `delete_access` varchar(255) DEFAULT NULL,
  `edit_access` varchar(255) DEFAULT NULL,
  `access_number` varchar(255) DEFAULT NULL,
  `update_data` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `application` varchar(255) DEFAULT NULL,
  `resign` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintains`
--

INSERT INTO `maintains` (`id`, `password`, `role`, `image`, `name`, `maintain_username`, `login_device`, `email`, `phone`, `status`, `login_code`, `login_time`, `forget_code`, `forget_time`, `comments`, `view_access`, `delete_access`, `edit_access`, `access_number`, `update_data`, `others`, `application`, `resign`, `created_at`, `updated_at`) VALUES
(1, 'supperadmin', 'supperadmin', NULL, NULL, NULL, NULL, 'rayhanbabu458@gmail.com', '01750360044', '1', 'null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managerpayments`
--

CREATE TABLE `managerpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `pcategory_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `reff` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `web_link` varchar(255) DEFAULT NULL,
  `date1` varchar(255) DEFAULT NULL,
  `date2` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_08_07_230459_create_univers_table', 1),
(5, '2023_10_16_103849_create_maintains_table', 1),
(6, '2024_01_01_141945_create_depts_table', 1),
(7, '2024_01_01_220111_create_teachers_table', 1),
(8, '2024_01_14_091524_create_weeks_table', 1),
(9, '2024_02_05_194409_create_collors_table', 1),
(10, '2024_04_16_105701_create_notices_table', 1),
(11, '2024_05_06_080843_create_members_table', 1),
(12, '2024_05_06_201243_create_sites_table', 1),
(13, '2024_05_06_214312_create_pcategories_table', 1),
(14, '2024_05_06_222805_create_scategories_table', 1),
(15, '2024_05_07_065917_create_spends_table', 1),
(16, '2024_05_07_083303_create_payments_table', 1),
(17, '2024_05_16_103438_create_managerpayments_table', 1),
(18, '2024_05_16_164143_create_reports_table', 1),
(19, '2024_05_25_105253_create_projects_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `other` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `pcategory_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `reff` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `day` int(10) DEFAULT NULL,
  `month` int(10) DEFAULT NULL,
  `year` int(10) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `dept_id`, `pcategory_id`, `site_id`, `created_by`, `reff`, `date`, `amount`, `day`, `month`, `year`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, '2026-08-03', 2000.00, 3, 8, 2026, NULL, '2026-08-03 14:27:09', '2026-08-03 14:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pcategory_name` varchar(255) NOT NULL,
  `pcategory_status` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `dept_id`, `image`, `pcategory_name`, `pcategory_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Site Onwer Payment', '1', '1', '1', '2026-08-03 14:24:24', '2026-08-03 14:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_status` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `dept_id`, `image`, `project_name`, `project_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'DU Project', '1', '1', NULL, '2026-08-03 14:22:28', '2026-08-03 14:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reff` text DEFAULT NULL,
  `date` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scategories`
--

CREATE TABLE `scategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `scategory_name` varchar(255) NOT NULL,
  `scategory_status` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scategories`
--

INSERT INTO `scategories` (`id`, `dept_id`, `image`, `scategory_name`, `scategory_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Labour', '1', '1', NULL, '2026-08-03 14:36:28', '2026-08-03 14:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_status` varchar(255) NOT NULL DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `dept_id`, `project_id`, `image`, `site_name`, `site_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Fh Hall', '1', '1', NULL, '2026-08-03 14:24:04', '2026-08-03 14:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `spends`
--

CREATE TABLE `spends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `scategory_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `reff` varchar(255) DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `academic_qualification` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `bank_details` varchar(255) DEFAULT NULL,
  `forget_password` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `teacher_status` varchar(255) DEFAULT NULL,
  `subject_access` varchar(255) DEFAULT NULL,
  `login_code` varchar(255) DEFAULT NULL,
  `login_time` varchar(255) DEFAULT NULL,
  `forget_code` varchar(255) DEFAULT NULL,
  `forget_time` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `teacher` varchar(20) DEFAULT NULL,
  `member` varchar(20) DEFAULT NULL,
  `event` varchar(20) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `spend_view` varchar(20) DEFAULT NULL,
  `spend_edit` varchar(20) DEFAULT NULL,
  `payment_view` varchar(20) DEFAULT NULL,
  `payment_edit` varchar(20) DEFAULT NULL,
  `pmanager_view` varchar(20) DEFAULT NULL,
  `pmanager_edit` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `dept_id`, `teacher_name`, `role`, `email`, `phone`, `nickname`, `designation`, `present_address`, `permanent_address`, `academic_qualification`, `password`, `bank_details`, `forget_password`, `created_by`, `updated_by`, `teacher_status`, `subject_access`, `login_code`, `login_time`, `forget_code`, `forget_time`, `image`, `teacher`, `member`, `event`, `payment`, `spend_view`, `spend_edit`, `payment_view`, `payment_edit`, `pmanager_view`, `pmanager_edit`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ancova Building Limited', 'admin', 'ancovasoft@gmail.com', '01750360055', NULL, 'Dhaka', NULL, NULL, NULL, 'Rayhan12', NULL, NULL, '1', NULL, '1', NULL, '27638', NULL, NULL, NULL, NULL, '1', '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-03 14:15:14', '2026-08-03 14:20:41'),
(2, 1, 'Palash', 'teacher', 'ancova2020@gmail.com', '01750360066', NULL, 'Manager', NULL, NULL, NULL, 'Rayhan12', NULL, NULL, '1', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2026-08-03 14:28:29', '2026-08-03 14:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `univers`
--

CREATE TABLE `univers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `university` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `university_code` varchar(255) DEFAULT NULL,
  `university_established_date` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `univers`
--

INSERT INTO `univers` (`id`, `university`, `image`, `address`, `university_code`, `university_established_date`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, NULL, NULL, NULL, NULL, '2026-08-03 14:14:14', '2026-08-03 14:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `week` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `text2` text DEFAULT NULL,
  `text3` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collors`
--
ALTER TABLE `collors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collors_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depts_university_id_foreign` (`university_id`);

--
-- Indexes for table `maintains`
--
ALTER TABLE `maintains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maintains_email_unique` (`email`),
  ADD UNIQUE KEY `maintains_phone_unique` (`phone`);

--
-- Indexes for table `managerpayments`
--
ALTER TABLE `managerpayments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `managerpayments_dept_id_foreign` (`dept_id`),
  ADD KEY `managerpayments_pcategory_id_foreign` (`pcategory_id`),
  ADD KEY `managerpayments_site_id_foreign` (`site_id`),
  ADD KEY `managerpayments_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_dept_id_foreign` (`dept_id`),
  ADD KEY `payments_pcategory_id_foreign` (`pcategory_id`),
  ADD KEY `payments_site_id_foreign` (`site_id`),
  ADD KEY `payments_created_by_foreign` (`created_by`);

--
-- Indexes for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pcategories_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_dept_id_foreign` (`dept_id`),
  ADD KEY `reports_created_by_foreign` (`created_by`);

--
-- Indexes for table `scategories`
--
ALTER TABLE `scategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scategories_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `spends`
--
ALTER TABLE `spends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spends_dept_id_foreign` (`dept_id`),
  ADD KEY `spends_scategory_id_foreign` (`scategory_id`),
  ADD KEY `spends_site_id_foreign` (`site_id`),
  ADD KEY `spends_created_by_foreign` (`created_by`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`),
  ADD KEY `teachers_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `univers`
--
ALTER TABLE `univers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collors`
--
ALTER TABLE `collors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `depts`
--
ALTER TABLE `depts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintains`
--
ALTER TABLE `maintains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `managerpayments`
--
ALTER TABLE `managerpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scategories`
--
ALTER TABLE `scategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spends`
--
ALTER TABLE `spends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `univers`
--
ALTER TABLE `univers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collors`
--
ALTER TABLE `collors`
  ADD CONSTRAINT `collors_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `depts`
--
ALTER TABLE `depts`
  ADD CONSTRAINT `depts_university_id_foreign` FOREIGN KEY (`university_id`) REFERENCES `univers` (`id`);

--
-- Constraints for table `managerpayments`
--
ALTER TABLE `managerpayments`
  ADD CONSTRAINT `managerpayments_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`),
  ADD CONSTRAINT `managerpayments_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `managerpayments_pcategory_id_foreign` FOREIGN KEY (`pcategory_id`) REFERENCES `pcategories` (`id`),
  ADD CONSTRAINT `managerpayments_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `payments_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`),
  ADD CONSTRAINT `payments_pcategory_id_foreign` FOREIGN KEY (`pcategory_id`) REFERENCES `pcategories` (`id`),
  ADD CONSTRAINT `payments_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD CONSTRAINT `pcategories_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `reports_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `scategories`
--
ALTER TABLE `scategories`
  ADD CONSTRAINT `scategories_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);

--
-- Constraints for table `spends`
--
ALTER TABLE `spends`
  ADD CONSTRAINT `spends_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `spends_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`),
  ADD CONSTRAINT `spends_scategory_id_foreign` FOREIGN KEY (`scategory_id`) REFERENCES `scategories` (`id`),
  ADD CONSTRAINT `spends_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `depts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
