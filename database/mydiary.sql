-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 03:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydiary`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_06_10_103103_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `myworks`
--

CREATE TABLE `myworks` (
  `id_work` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `desc` varchar(280) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `myworks`
--

INSERT INTO `myworks` (`id_work`, `title`, `subject`, `desc`, `status`) VALUES
(1, 'Laravel', 'Basics', 'Cover important basics', 1),
(2, 'Core Php', 'Simple Basics & Theory', 'Cover important basics', 0),
(3, 'Vanila Ajax', 'Concept', 'Understand Code', 0),
(4, 'WordPress', 'Just Practice', 'understand all options', 0),
(5, 'MongoDB', 'Basics', 'basic practice', 0),
(6, 'Tailwind CSS', 'cover basics', 'only basics & theory', 0),
(7, 'Try & Catch', 'Practice', 'Usage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notepad`
--

CREATE TABLE `notepad` (
  `id_note` int(11) NOT NULL,
  `title_note` varchar(55) NOT NULL,
  `details_note` text NOT NULL,
  `status_note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notepad`
--

INSERT INTO `notepad` (`id_note`, `title_note`, `details_note`, `status_note`) VALUES
(1, 'Life works project', '------Pending Tasks-------\r\n1) Users Crud PTM project\r\n2) Start New Project -> Decide all Things 12-06-2023 \r\n3) \r\n4) \r\n5)', 4),
(2, 'WordPress', 'Watch video , practice and use custom css', 0);

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
-- Table structure for table `projectdetails`
--

CREATE TABLE `projectdetails` (
  `id_detproj` int(11) NOT NULL,
  `id_proj` int(11) NOT NULL,
  `tasks_detproj` varchar(55) NOT NULL,
  `status_detproj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projectdetails`
--

INSERT INTO `projectdetails` (`id_detproj`, `id_proj`, `tasks_detproj`, `status_detproj`) VALUES
(1, 1, 'My works -> Further Details', 3),
(2, 1, 'Projects -> Details', 3),
(3, 1, 'Social Accounts', 3),
(4, 1, 'Notepad', 3),
(5, 1, 'Auth', 3);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_proj` int(11) NOT NULL,
  `title_proj` varchar(55) NOT NULL,
  `subject_proj` varchar(55) NOT NULL,
  `language_proj` varchar(55) NOT NULL,
  `desc_proj` varchar(55) NOT NULL,
  `status_proj` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_proj`, `title_proj`, `subject_proj`, `language_proj`, `desc_proj`, `status_proj`) VALUES
(1, 'Personal Tasks Manager', 'Daily Routine Tasks Schedules Management system', 'laravel', 'v. 8.2,', 1),
(2, 'BilaelDevelops', 'Portfolio Website', 'codeigniter', 'Updated , and submit hireme form.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `remainwork`
--

CREATE TABLE `remainwork` (
  `id_remain` int(11) NOT NULL,
  `id_work` int(11) NOT NULL,
  `task` varchar(100) NOT NULL,
  `reason` varchar(55) NOT NULL,
  `status_remain` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remainwork`
--

INSERT INTO `remainwork` (`id_remain`, `id_work`, `task`, `reason`, `status_remain`) VALUES
(1, 1, 'Crud', 'Functionalities', 2),
(2, 1, 'Models', 'Important', 2),
(3, 1, 'Auth Login', 'Important', 2),
(4, 2, 'Basic Tutorial', 'clear basics', 0);

-- --------------------------------------------------------

--
-- Table structure for table `socialaccounts`
--

CREATE TABLE `socialaccounts` (
  `id_sac` int(11) NOT NULL,
  `title_sac` varchar(55) NOT NULL,
  `email_sac` varchar(55) NOT NULL,
  `password_sac` varchar(55) NOT NULL,
  `link_sac` varchar(55) NOT NULL,
  `status_sac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialaccounts`
--

INSERT INTO `socialaccounts` (`id_sac`, `title_sac`, `email_sac`, `password_sac`, `link_sac`, `status_sac`) VALUES
(1, 'Facebook', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'https://www.facebook.com/profile.php?id=100078519280125', 2),
(2, 'LinkedIn', 'muhammadbilalshaikh00@gmail.com', 'nopasswordshown', 'https://www.linkedin.com/feed/', 3),
(3, 'Twitter', 'muhammadbilalshaikh00@gmail.com', 'nopasswordshown', 'https://twitter.com/MuhammadBilel', 3),
(4, 'Portfolio', 'BilaelDevelops', 'nopasswordshown', 'https://nenosofts.pk/bilaeldevelops/Home', 2),
(5, 'Facebook', 'samdshaikh161@gmail.com', 'nopasswordshown', 'https://www.facebook.com/mohammadbilalshaikh19', 1),
(6, 'Github', 'muhammadbilalshaikh00@gmail.com', 'nopasswordshown', 'https://github.com/MuhammadBilal24', 3),
(7, 'Instagram', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'https://www.instagram.com/', 3),
(8, 'Instagram', 'samdshaikh161@gmail.com', 'nopasswordshown', 'https://www.instagram.com/', 3),
(9, 'Skype', 'muhammadbilalshaikh00@outlook.com', 'nopasswordshown', 'https://www.skype.com/en/', 2),
(10, 'Email', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'muhammadbilalshaikh24525@gmail.com', 2),
(11, 'Email', 'muhammadbilalshaikh00@gmail.com', 'nopasswordshown', 'muhammadbilalshaikh00@gmail.com', 3),
(12, 'Email', 'samdshaikh161@gmail.com', 'nopasswordshown', 'samdshaikh161@gmail.com', 1),
(13, 'Email', 'bilal.2244552255@gmail.com', 'nopasswordshown', 'bilal.2244552255@gmail.com', 0),
(14, 'Email', 'shaikhbilal941@gmail.com', 'nopasswordshown', 'shaikhbilal941@gmail.com', 0),
(15, 'Email', 'sarafarazali987@gmail.com', 'nopasswordshown', 'sarafarazali987@gmail.com', 0),
(16, 'Fiverr', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'https://www.fiverr.com/', 2),
(17, 'Freelance', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'none', 0),
(18, 'Upwork', 'muhammadbilalshaikh24525@gmail.com', 'nopasswordshown', 'none', 0),
(19, 'limey.io', 'muhammadbilalshaikh00@gmail.com', 'nopasswordshown', 'http://limey.io/bilaeldevelops', 3),
(20, 'https://dev.to/', 'muhammadbilalshaikh00@gmail.com [ GitHub ]', 'nopasswordshown', 'https://dev.to/muhammadbilal24', 3),
(21, 'stars.github.com', 'muhammadbilalshaikh00@gmail.com [ GitHub ]', 'nopasswordshown', 'https://stars.github.com/', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad', 'admin@bilaeldevelops.com', '$2y$10$.U6scDEiFVAOqkJesZuv4.zqT54jJoIdlj0SJplyH5L2.ShuiOynm', '2023-06-11 17:10:32', '2023-06-11 17:10:32');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `myworks`
--
ALTER TABLE `myworks`
  ADD PRIMARY KEY (`id_work`);

--
-- Indexes for table `notepad`
--
ALTER TABLE `notepad`
  ADD PRIMARY KEY (`id_note`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projectdetails`
--
ALTER TABLE `projectdetails`
  ADD PRIMARY KEY (`id_detproj`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_proj`);

--
-- Indexes for table `remainwork`
--
ALTER TABLE `remainwork`
  ADD PRIMARY KEY (`id_remain`);

--
-- Indexes for table `socialaccounts`
--
ALTER TABLE `socialaccounts`
  ADD PRIMARY KEY (`id_sac`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myworks`
--
ALTER TABLE `myworks`
  MODIFY `id_work` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notepad`
--
ALTER TABLE `notepad`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectdetails`
--
ALTER TABLE `projectdetails`
  MODIFY `id_detproj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_proj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `remainwork`
--
ALTER TABLE `remainwork`
  MODIFY `id_remain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socialaccounts`
--
ALTER TABLE `socialaccounts`
  MODIFY `id_sac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
