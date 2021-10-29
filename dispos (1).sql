-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 07:08 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispos`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_tokens`
--

CREATE TABLE `api_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue_id` int(11) NOT NULL,
  `token` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `mail` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `group_id`, `title`, `active`, `mail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'test form', 1, 1, '2019-10-30 07:34:27', '2019-11-04 05:29:10', NULL),
(2, 2, 'another one', 1, 1, '2019-10-30 08:44:38', '2020-04-08 01:16:04', NULL),
(3, 2, 'daily reports', 1, 1, '2019-11-04 04:32:50', '2019-11-04 04:34:47', NULL),
(4, 3, 'testing form', 1, 0, '2019-11-04 05:11:04', '2020-12-03 01:40:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_center` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `cost_center`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'first group', '', '2019-10-30 07:33:41', '2019-10-30 07:33:41', NULL),
(2, 'second group', '', '2019-10-30 07:33:55', '2019-10-30 07:33:55', NULL),
(3, 'third group', '', '2019-10-30 07:34:12', '2019-10-30 07:34:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(2, '2017_07_29_143505_create_responses_table', 1),
(3, '2017_07_29_143524_create_forms_table', 1),
(4, '2017_07_29_143607_create_questions_table', 1),
(5, '2017_07_29_143621_create_groups_table', 1),
(6, '2017_07_29_143631_create_user_groups_table', 1),
(7, '2017_07_29_143643_create_options_table', 1),
(8, '2017_07_29_143658_create_option_groups_table', 1),
(9, '2017_07_29_153511_create_question_types_table', 1),
(10, '2017_11_04_112553_Validation', 1),
(11, '2018_03_21_200942_createQueueTasks', 1),
(12, '2018_03_21_205014_addInstructionsQueue', 1),
(13, '2018_03_21_212237_addTaskLock', 1),
(14, '2018_03_22_074306_auth_import', 1),
(15, '2018_03_22_081514_add_help', 1),
(16, '2018_03_22_082755_create_api_tokens_table', 1),
(17, '2018_10_05_085947_AutoFlag', 1),
(18, '2018_10_05_093934_SortOptions', 1),
(19, '2019_08_22_112411_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `number_male_female`
-- (See below for the actual view)
--
CREATE TABLE `number_male_female` (
`COUNT(*)` bigint(21)
,`gender` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_group_id`, `title`, `created_at`, `updated_at`, `sort`, `deleted_at`, `parent_id`) VALUES
(1, 1, 'test', NULL, NULL, 0, NULL, NULL),
(2, 1, 'simple test', NULL, NULL, 0, NULL, NULL),
(3, 2, 'ja', NULL, NULL, 0, NULL, NULL),
(4, 2, 'nein', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `option_groups`
--

CREATE TABLE `option_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `option_groups`
--

INSERT INTO `option_groups` (`id`, `title`, `group_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'option group 1', 1, '2019-12-11 04:39:02', '2019-12-11 04:39:02', NULL),
(2, 'option group 2', 1, '2019-12-11 04:40:37', '2019-12-11 04:40:37', NULL),
(3, 'option group3', 1, '2019-12-11 04:41:07', '2019-12-11 04:41:07', NULL),
(4, 'option group 4', 1, '2019-12-11 04:41:24', '2019-12-11 04:41:24', NULL),
(5, 'option group 5', 1, '2019-12-11 04:41:47', '2019-12-11 04:41:47', NULL),
(6, 'option group 6', 1, '2019-12-11 04:42:23', '2019-12-11 04:42:23', NULL),
(7, 'option group 7', 1, '2019-12-11 04:42:44', '2019-12-11 04:42:44', NULL),
(8, 'option group 8', 1, '2019-12-11 04:45:58', '2019-12-11 04:45:58', NULL),
(9, 'option group 9', 1, '2019-12-11 04:46:19', '2019-12-11 04:46:19', NULL),
(10, 'option group 10', 1, '2019-12-11 04:46:32', '2019-12-11 04:46:32', NULL),
(11, 'option group 11', 1, '2019-12-11 04:46:45', '2019-12-11 04:46:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_options` tinyint(1) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `form_id`, `title`, `question_type_id`, `option_group_id`, `created_at`, `updated_at`, `validation`, `help`, `update_options`, `sort`, `deleted_at`) VALUES
(1, 1, 'date of form submition ?', 3, 0, '2019-10-30 07:38:30', '2019-12-04 02:15:11', NULL, NULL, 0, 0, NULL),
(2, 2, 'use of form ?', 2, 0, '2019-10-30 08:45:21', '2019-10-30 08:53:26', NULL, NULL, 0, 0, NULL),
(3, 3, 'what is the status of daily reports ?', 2, 0, '2019-11-04 04:34:24', '2019-11-04 04:38:16', NULL, NULL, 0, 0, NULL),
(4, 4, 'what is the factory ?', 1, 0, '2019-11-04 05:18:01', '2019-11-04 05:18:01', NULL, NULL, 0, 0, NULL),
(5, 4, 'radio test', 4, 0, '2020-12-02 04:24:15', '2020-12-02 04:30:36', NULL, NULL, 0, 0, '2020-12-02 04:30:36'),
(6, 4, 'Mitarbeiter (XBS o. U-Nummer)', 5, 0, '2020-12-03 01:39:41', '2020-12-03 01:39:41', NULL, NULL, NULL, 0, NULL),
(7, 4, 'Vor- und Zuname', 4, 1, '2020-12-03 01:49:45', '2020-12-03 01:51:04', NULL, 'Kundennamen vollständig?', NULL, 0, NULL),
(8, 4, 'Voice File', 4, 2, '2020-12-04 05:58:58', '2020-12-04 05:58:58', NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uses_option_groups` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `type`, `title`, `uses_option_groups`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'text', 'text', 0, NULL, NULL, NULL),
(2, 'textarea', 'textarea', 0, NULL, NULL, NULL),
(3, 'date', 'date', 0, NULL, NULL, NULL),
(4, 'radio', 'Radio Button', 0, NULL, NULL, NULL),
(5, 'integer', 'Integer', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queues`
--

CREATE TABLE `queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `instructions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queues`
--

INSERT INTO `queues` (`id`, `group_id`, `title`, `active`, `created_at`, `updated_at`, `instructions`, `deleted_at`) VALUES
(1, 1, 'first queue', 1, NULL, NULL, '', NULL),
(2, 2, 'second group', 1, NULL, NULL, '', NULL),
(3, 3, 'third queue', 1, NULL, NULL, '', NULL),
(4, 1, 'second group', 1, '2019-10-30 08:42:56', '2019-10-30 08:42:56', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queue_questions`
--

CREATE TABLE `queue_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `option_group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queue_questions`
--

INSERT INTO `queue_questions` (`id`, `queue_id`, `title`, `question_type_id`, `option_group_id`, `created_at`, `updated_at`, `validation`, `help`, `sort`, `deleted_at`) VALUES
(1, 1, 'first queue question', 1, 0, '2019-10-30 08:37:50', '2019-10-30 08:37:50', NULL, NULL, NULL, NULL),
(2, 2, 'where are you ?', 2, 0, '2019-12-27 05:23:21', '2019-12-27 05:23:21', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `response_request` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_attributes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `responses`
--

INSERT INTO `responses` (`id`, `user_id`, `form_id`, `response_request`, `response_attributes`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '{\"q2\":null}', '[]', '2020-12-01 02:12:13', '2020-12-01 02:12:13'),
(2, 1, 3, '{\"q3\":null}', '[]', '2020-12-01 02:12:25', '2020-12-01 02:12:25'),
(3, 1, 2, '{\"quse_of_form_?\":null}', '[]', '2020-12-01 02:25:58', '2020-12-01 02:25:58'),
(4, 1, 3, '{\"qwhat_is_the_status_of_daily_reports_?\":\"hey theree\"}', '[]', '2020-12-01 02:26:20', '2020-12-01 02:26:20'),
(5, 1, 3, '{\"q3\":\"hello this is huge\"}', '[]', '2020-12-01 02:27:06', '2020-12-01 02:27:06'),
(6, 1, 3, '{\"q3\":\"gjgjgf\"}', '[]', '2020-12-01 02:29:21', '2020-12-01 02:29:21'),
(7, 1, 4, '{\"q4\":null}', '[]', '2020-12-02 02:52:45', '2020-12-02 02:52:45'),
(8, 1, 1, '{\"q1\":null}', '[]', '2020-12-02 04:14:08', '2020-12-02 04:14:08'),
(9, 1, 1, '{\"q1\":null}', '[]', '2020-12-02 04:15:30', '2020-12-02 04:15:30'),
(10, 1, 1, '{\"q1\":null}', '[]', '2020-12-02 04:15:39', '2020-12-02 04:15:39'),
(11, 1, 1, '{\"q1\":\"2020-12-15\"}', '[]', '2020-12-02 04:16:21', '2020-12-02 04:16:21'),
(12, 1, 1, '{\"q1\":null}', '[]', '2020-12-02 04:17:08', '2020-12-02 04:17:08'),
(13, 1, 1, '{\"q1\":null}', '[]', '2020-12-02 04:17:27', '2020-12-02 04:17:27'),
(14, 1, 4, '{\"q4\":null}', '[]', '2020-12-02 04:30:51', '2020-12-02 04:30:51'),
(15, 1, 4, '{\"q4\":\"factory is something about\"}', '[]', '2020-12-02 04:31:21', '2020-12-02 04:31:21'),
(16, 1, 4, '{\"q4\":\"simple ondu testing\"}', '[]', '2020-12-02 05:04:22', '2020-12-02 05:04:22'),
(17, 1, 4, '{\"q4\":\"sd\",\"q6\":null}', '[]', '2020-12-03 01:44:49', '2020-12-03 01:44:49'),
(18, 1, 4, '{\"q4\":\"tel me something about yoursefl\",\"q6\":\"1\"}', '[]', '2020-12-03 01:46:07', '2020-12-03 01:46:07'),
(19, 1, 4, '{\"q4\":\"test\",\"q6\":\"1\",\"Field_Label\":null}', '[]', '2020-12-03 02:16:20', '2020-12-03 02:16:20'),
(20, 1, 4, '{\"q4\":\"e\",\"q6\":\"2\"}', '[]', '2020-12-03 02:23:45', '2020-12-03 02:23:45'),
(21, 1, 4, '{\"q4\":\"rrf\",\"q6\":\"1\"}', '[]', '2020-12-03 02:52:34', '2020-12-03 02:52:34'),
(22, 1, 4, '{\"q4\":\"de\",\"q6\":\"1\",\"First_Name\":\"required\",\"Last_Name\":null,\"Date_of_Birth\":null,\"Email\":null,\"Password\":null}', '[]', '2020-12-03 02:59:11', '2020-12-03 02:59:11'),
(23, 1, 4, '{\"q4\":\"dc\",\"q6\":\"1\",\"q7\":\"Vor- und Zuname\"}', '[]', '2020-12-03 04:15:39', '2020-12-03 04:15:39'),
(24, 1, 4, '{\"q4\":\"v\",\"q6\":\"1\",\"q7\":null}', '[]', '2020-12-03 04:24:32', '2020-12-03 04:24:32'),
(25, 1, 4, '{\"q4\":\"e\",\"q6\":\"1\"}', '[]', '2020-12-03 08:13:47', '2020-12-03 08:13:47'),
(26, 1, 4, '{\"q4\":\"simple ondu testing\",\"q6\":\"1\"}', '[]', '2020-12-03 08:34:20', '2020-12-03 08:34:20'),
(27, 1, 4, '{\"q4\":\"tel me something about yoursefl\",\"q6\":\"2\",\"q7\":\"simple test\"}', '[]', '2020-12-03 08:35:49', '2020-12-03 08:35:49'),
(28, 1, 4, '{\"q4\":\"simple ondu testing\",\"q6\":\"3\",\"q7\":\"test\"}', '[]', '2020-12-03 08:52:02', '2020-12-03 08:52:02'),
(29, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"2\"}', '[]', '2020-12-03 08:52:20', '2020-12-03 08:52:20'),
(30, 1, 4, '{\"q4\":\"e\",\"q6\":\"2\",\"q7\":\"test\",\"q8\":\"nein\"}', '[]', '2020-12-04 06:05:16', '2020-12-04 06:05:16'),
(31, 1, 4, '{\"q4\":\"e\",\"q6\":\"3\",\"q7\":\"simple test\"}', '[]', '2020-12-07 00:46:01', '2020-12-07 00:46:01'),
(32, 1, 4, '{\"q4\":\"hi there\",\"q6\":\"10\",\"q7\":\"simple test\"}', '[]', '2020-12-07 00:46:14', '2020-12-07 00:46:14'),
(33, 1, 4, '{\"q4\":\"de\",\"q6\":\"3\",\"q7\":\"test\",\"q8\":\"ja\"}', '[]', '2020-12-07 00:53:08', '2020-12-07 00:53:08'),
(34, 1, 4, '{\"q4\":\"ko\",\"q6\":\"20\",\"q7\":\"simple test\",\"q8\":\"ja\"}', '[]', '2020-12-07 00:55:36', '2020-12-07 00:55:36'),
(35, 1, 4, '{\"q4\":\"simple ondu testing\",\"q6\":\"2\",\"q7\":\"test\",\"q8\":\"ja\"}', '[]', '2020-12-07 01:50:37', '2020-12-07 01:50:37'),
(36, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"4\",\"q7\":\"simple test\",\"q8\":\"ja\"}', '[]', '2020-12-07 02:10:24', '2020-12-07 02:10:24'),
(37, 1, 4, '{\"q4\":\"de\",\"q6\":\"1\",\"q7\":\"test\",\"q8\":\"ja\"}', '[]', '2020-12-07 02:11:04', '2020-12-07 02:11:04'),
(38, 1, 3, '{\"q3\":\"tests\"}', '[]', '2020-12-07 02:12:19', '2020-12-07 02:12:19'),
(39, 1, 3, '{\"q3\":\"fhfh\"}', '[]', '2020-12-07 02:26:11', '2020-12-07 02:26:11'),
(40, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"5\",\"q7\":\"simple test\"}', '[]', '2020-12-07 02:26:41', '2020-12-07 02:26:41'),
(41, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"4\"}', '[]', '2020-12-07 02:27:19', '2020-12-07 02:27:19'),
(42, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"7\"}', '[]', '2020-12-07 02:27:40', '2020-12-07 02:27:40'),
(43, 1, 4, '{\"q4\":\"oo\",\"q6\":\"8\"}', '[]', '2020-12-07 02:28:21', '2020-12-07 02:28:21'),
(44, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"3\"}', '[]', '2020-12-07 02:29:09', '2020-12-07 02:29:09'),
(45, 1, 4, '{\"q4\":\"tel me something about yoursefl\",\"q6\":\"444\"}', '[]', '2020-12-07 02:35:47', '2020-12-07 02:35:47'),
(46, 1, 4, '{\"q4\":\"de\",\"q6\":\"9\",\"q7\":\"test\",\"q8\":\"nein\"}', '[]', '2020-12-07 03:42:50', '2020-12-07 03:42:50'),
(47, 1, 4, '{\"q4\":\"factory is something about\",\"q6\":\"0\",\"q7\":\"simple test\",\"q8\":\"nein\"}', '[]', '2020-12-07 03:43:32', '2020-12-07 03:43:32'),
(48, 1, 3, '{\"q3\":\"u are the one\"}', '[]', '2020-12-07 03:44:11', '2020-12-07 03:44:11'),
(49, 1, 3, '{\"q3\":\"klk\"}', '[]', '2020-12-07 04:16:05', '2020-12-07 04:16:05'),
(50, 1, 4, '{\"q4\":\"sds\",\"q6\":\"9\",\"q7\":\"test\",\"q8\":\"nein\"}', '[]', '2020-12-07 04:16:57', '2020-12-07 04:16:57'),
(51, 1, 4, '{\"q4\":\"de\",\"q6\":\"0\",\"q7\":\"simple test\"}', '[]', '2020-12-07 04:38:15', '2020-12-07 04:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `student_trigger`
--

CREATE TABLE `student_trigger` (
  `id` int(11) NOT NULL,
  `sub1` varchar(255) NOT NULL,
  `sub2` varchar(255) NOT NULL,
  `sub3` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue_id` int(11) NOT NULL,
  `task_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `queue_id`, `task_details`, `created_at`, `updated_at`, `created_user_id`) VALUES
(1, 1, '{\"Year\":\"2018\",\"Industry_aggregation_NZSIOC\":\"Level 1\",\"Industry_code_NZSIOC\":\"99999\",\"Industry_name_NZSIOC\":\"All industries\",\"Units\":\"Dollars (millions)\",\"Variable_code\":\"H01\",\"Variable_name\":\"Total income\",\"Variable_category\":\"Financial performance\",\"Value\":\"691859\",\"Industry_code_ANZSIC06\":\"ANZSIC06 divisions A-S (excluding classes K6330, L6711, O7552, O760, O771, O772, S9540, S9601, S9602, and S9603)\"}', '2019-10-30 08:31:51', '2019-10-30 08:31:51', 1),
(2, 1, '{\"Year\":\"2018\",\"Industry_aggregation_NZSIOC\":\"Level 1\",\"Industry_code_NZSIOC\":\"99999\",\"Industry_name_NZSIOC\":\"All industries\",\"Units\":\"Dollars (millions)\",\"Variable_code\":\"H04\",\"Variable_name\":\"Sales, government funding, grants and subsidies\",\"Variable_category\":\"Financial performance\",\"Value\":\"605766\",\"Industry_code_ANZSIC06\":\"ANZSIC06 divisions A-S (excluding classes K6330, L6711, O7552, O760, O771, O772, S9540, S9601, S9602, and S9603)\"}', '2019-10-30 08:31:51', '2019-10-30 08:31:51', 1),
(3, 1, '{\"Year\":\"2018\",\"Industry_aggregation_NZSIOC\":\"Level 1\",\"Industry_code_NZSIOC\":\"99999\",\"Industry_name_NZSIOC\":\"All industries\",\"Units\":\"Dollars (millions)\",\"Variable_code\":\"H05\",\"Variable_name\":\"Interest, dividends and donations\",\"Variable_category\":\"Financial performance\",\"Value\":\"63509\",\"Industry_code_ANZSIC06\":\"ANZSIC06 divisions A-S (excluding classes K6330, L6711, O7552, O760, O771, O772, S9540, S9601, S9602, and S9603)\"}', '2019-10-30 08:31:51', '2019-10-30 08:31:51', 1),
(4, 1, '{\"Year\":\"2018\",\"Industry_aggregation_NZSIOC\":\"Level 1\",\"Industry_code_NZSIOC\":\"99999\",\"Industry_name_NZSIOC\":\"All industries\",\"Units\":\"Dollars (millions)\",\"Variable_code\":\"H07\",\"Variable_name\":\"Non-operating income\",\"Variable_category\":\"Financial performance\",\"Value\":\"22583\",\"Industry_code_ANZSIC06\":\"ANZSIC06 divisions A-S (excluding classes K6330, L6711, O7552, O760, O771, O772, S9540, S9601, S9602, and S9603)\"}', '2019-10-30 08:31:51', '2019-10-30 08:31:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_locks`
--

CREATE TABLE `task_locks` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_locks`
--

INSERT INTO `task_locks` (`id`, `task_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, '0', '2019-10-30 09:22:23', '2019-10-30 09:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `task_responses`
--

CREATE TABLE `task_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `response_attributes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_responses`
--

INSERT INTO `task_responses` (`id`, `user_id`, `task_id`, `response_attributes`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '{\"q1\":\"simple queue question\"}', '2019-10-30 08:38:15', '2019-10-30 08:38:15'),
(2, 1, 3, '{\"q1\":\"test purpose\"}', '2019-10-30 09:05:17', '2019-10-30 09:05:17'),
(3, 1, 2, '{\"q1\":\"c\"}', '2019-10-30 09:22:30', '2019-10-30 09:22:30'),
(4, 1, 1, '{\"q1\":\"c\"}', '2019-11-04 09:26:56', '2019-11-04 09:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `test1`
--

CREATE TABLE `test1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sso_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testi`
--

CREATE TABLE `testi` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sso_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testu`
--

CREATE TABLE `testu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sso_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_users`
--

CREATE TABLE `test_users` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_users`
--

INSERT INTO `test_users` (`id`, `gender`) VALUES
(1, 'Male'),
(2, 'Male'),
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `admin`, `user_email`, `last_login_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manju', 'C5099941', 1, 'manju.dn@conduent.com', '2020-12-07 07:22:18', 'vxvd2fuQGxUFjdthn59NIaKGmrInpRk4dGWXUDULmckwyYYzWSDIpvoVUBGW', NULL, NULL, '0000-00-00 00:00:00'),
(2, 'User2', 'c5099942', 0, 'manjudn016@gmail.com', '2020-01-20 14:04:46', '', '2019-10-31 02:36:49', '2019-10-31 02:36:49', NULL),
(5, 'user5', 'c5099943', 0, NULL, '2019-12-20 10:39:48', '2aSn0ru2GA3jR388hnj1HewDLbHYpHNs1bIuzpVfNcxIGvR50M4v6jnSkEmu', '2019-12-20 05:09:48', '2019-12-20 05:09:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `can_enroll` tinyint(1) NOT NULL DEFAULT 0,
  `can_edit` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `user_id`, `group_id`, `can_enroll`, `can_edit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2019-10-30 07:33:41', '2019-10-30 07:33:41'),
(2, 1, 2, 0, 1, '2019-10-30 07:33:55', '2019-10-30 07:33:55'),
(3, 1, 3, 0, 1, '2019-10-30 07:34:12', '2019-10-30 07:34:12'),
(4, 2, 1, 1, 0, '2019-10-31 02:36:49', '2019-10-31 02:36:49'),
(5, 5, 1, 1, 0, '2019-12-20 05:09:48', '2019-12-20 05:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_queues`
--

CREATE TABLE `user_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vfirst_view`
-- (See below for the actual view)
--
CREATE TABLE `vfirst_view` (
`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `number_male_female`
--
DROP TABLE IF EXISTS `number_male_female`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `number_male_female`  AS  select count(0) AS `COUNT(*)`,`test_users`.`gender` AS `gender` from `test_users` group by `test_users`.`gender` ;

-- --------------------------------------------------------

--
-- Structure for view `vfirst_view`
--
DROP TABLE IF EXISTS `vfirst_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfirst_view`  AS  select `users`.`name` AS `name` from `users` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `option_groups`
--
ALTER TABLE `option_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queues`
--
ALTER TABLE `queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_questions`
--
ALTER TABLE `queue_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_trigger`
--
ALTER TABLE `student_trigger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_locks`
--
ALTER TABLE `task_locks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_responses`
--
ALTER TABLE `task_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test1_sso_id_unique` (`sso_id`);

--
-- Indexes for table `testi`
--
ALTER TABLE `testi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testi_sso_id_unique` (`sso_id`);

--
-- Indexes for table `testu`
--
ALTER TABLE `testu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testu_sso_id_unique` (`sso_id`);

--
-- Indexes for table `test_users`
--
ALTER TABLE `test_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queues`
--
ALTER TABLE `user_queues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_tokens`
--
ALTER TABLE `api_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `option_groups`
--
ALTER TABLE `option_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `queues`
--
ALTER TABLE `queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `queue_questions`
--
ALTER TABLE `queue_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `student_trigger`
--
ALTER TABLE `student_trigger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_locks`
--
ALTER TABLE `task_locks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task_responses`
--
ALTER TABLE `task_responses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test1`
--
ALTER TABLE `test1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testi`
--
ALTER TABLE `testi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testu`
--
ALTER TABLE `testu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_users`
--
ALTER TABLE `test_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_queues`
--
ALTER TABLE `user_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
