-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 01:44 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwdhakatuitions_tutor`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '<p>dfxgdfgdfgdfg</p>', NULL, '2017-03-30 05:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activation`
--

INSERT INTO `activation` (`id`, `user_id`, `user_token`, `created_at`, `updated_at`) VALUES
(33, 36, '998fa19e77d6f4a2a9387a652d2785d49e817d5a24f0fe9bd89bc502ce47b7b2', '2017-02-27 09:34:41', '2017-02-27 09:34:41'),
(34, 37, '9c9eca269d27ea82e3be324bcb1a85a6596c1897f8ebb8800d556bcef669657f', '2017-02-27 09:38:29', '2017-02-27 09:38:29'),
(35, 38, 'acf14d7dba290a67a6e6404e0245ce0162502efd656765b5a33f07d80f886e50', '2017-03-09 12:36:39', '2017-03-09 12:36:39'),
(36, 40, '10e359d6899a168344d2650ea8de4261a3d368e3fe3de44f30e4786ff827c625', '2017-03-23 14:45:39', '2017-03-23 14:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_to_tutors`
--

CREATE TABLE `admin_to_tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medium_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `medium_id`, `created_at`, `updated_at`) VALUES
(1, 'A level', 1, '2017-02-06 16:57:32', '2017-02-06 16:57:32'),
(3, 'O level ', 1, '2017-02-06 17:54:12', '2017-02-06 17:54:12'),
(5, 'Class X', 2, '2017-02-15 14:41:21', '2017-03-07 11:05:39'),
(6, 'Class IX', 2, '2017-03-07 11:02:32', '2017-03-07 11:02:32'),
(7, 'Class VIII', 2, '2017-03-07 11:02:49', '2017-03-07 11:02:49'),
(8, 'Class VII', 2, '2017-03-07 11:03:38', '2017-03-07 11:03:38'),
(9, 'Class VI', 2, '2017-03-07 11:03:56', '2017-03-07 11:03:56'),
(10, 'Class V', 2, '2017-03-07 11:04:12', '2017-03-07 11:04:12'),
(11, 'Class IV', 2, '2017-03-07 11:04:40', '2017-03-07 11:04:40'),
(12, 'Class III', 2, '2017-03-07 11:04:55', '2017-03-07 11:04:55'),
(13, 'Class II', 2, '2017-03-07 11:05:07', '2017-03-07 11:05:07'),
(14, 'Class I', 2, '2017-03-07 11:05:19', '2017-03-07 11:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `id` int(10) UNSIGNED NOT NULL,
  `curriculum_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_info`
--

CREATE TABLE `education_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `exam_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `curriculum` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cGpa` int(11) NOT NULL,
  `from` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `until` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passed` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currently_studding` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_label`
--

CREATE TABLE `education_label` (
  `id` int(10) UNSIGNED NOT NULL,
  `label_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education_label`
--

INSERT INTO `education_label` (`id`, `label_name`, `created_at`, `updated_at`) VALUES
(1, 'Higher Secondary', '2017-02-15 12:04:37', '2017-02-15 12:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `education_media`
--

CREATE TABLE `education_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `education_media_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mazar_group`
--

CREATE TABLE `mazar_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `education_label_id` int(11) NOT NULL,
  `group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medium_category`
--

CREATE TABLE `medium_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `medium_category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medium_category`
--

INSERT INTO `medium_category` (`id`, `medium_category_name`, `created_at`, `updated_at`) VALUES
(1, 'English Medium', '2017-02-06 16:57:21', '2017-02-06 16:57:21'),
(2, 'Bangla Medium', '2017-02-15 14:40:23', '2017-02-15 14:40:23'),
(3, 'English Version', '2017-02-15 14:41:14', '2017-02-15 14:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_09_055453_create_medium_category_table', 1),
(4, '2017_01_09_055640_create_class_table', 1),
(5, '2017_01_09_055658_create_subject_table', 1),
(6, '2017_01_09_061911_create_activation_tabel', 1),
(7, '2017_01_14_092938_create_education_label_tabel', 1),
(8, '2017_01_14_093018_create_mazor_group_tabel', 1),
(9, '2017_01_14_093046_create_curriculam_tabel', 1),
(10, '2017_01_14_093720_create_tutor_basic_info', 1),
(11, '2017_01_14_094143_create_tutoring_location_table', 1),
(12, '2017_01_14_095058_create_online_info_table', 1),
(13, '2017_01_14_095409_create_education_info', 1),
(14, '2017_01_14_100146_create_tutoring_experence_table', 1),
(15, '2017_01_14_100309_create_tutoring_available_days_table', 1),
(16, '2017_01_14_102109_create_personal_info_table', 1),
(17, '2017_01_18_064936_create_education_media_table', 1),
(18, '2017_01_18_103417_create_tutoring_subjects_table', 1),
(19, '2017_01_18_103628_create_tutoring_media_table', 1),
(20, '2017_01_18_103808_create_tutoring_classes_table', 1),
(21, '2017_01_19_063110_create_tutoring_divisions_table', 1),
(22, '2017_01_19_063743_create_tutoring_districts_table', 1),
(23, '2017_01_19_070247_create_tutoring_locations_table', 1),
(24, '2017_01_25_123749_create_offers_table', 1),
(25, '2017_01_25_124853_create_offer_media_table', 1),
(26, '2017_01_25_125018_create_offer_classes_table', 1),
(27, '2017_01_25_125112_create_offer_subjects_table', 1),
(28, '2017_01_27_205055_create_over_views_table', 1),
(29, '2017_01_27_205243_create_offers_for_tutors_table', 1),
(30, '2017_01_27_205541_create_offers_for_admins_table', 1),
(31, '2017_01_27_205720_create_tutor_to_admins_table', 1),
(32, '2017_01_27_205833_create_admin_to_tutors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `relation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `student_amount` int(11) NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `negotiable` tinyint(1) NOT NULL DEFAULT '0',
  `day_week` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `specified_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requirement` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `first_name`, `last_name`, `phone`, `relation`, `email`, `student_amount`, `gender`, `salary`, `negotiable`, `day_week`, `country`, `division`, `district`, `location`, `specified_location`, `requirement`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Test Tuition  Title', 'Demo', 'Guardian  ', '01843701272', 'Borther', 'demo@tutor.com', 2, 'male', '5000', 0, 4, 'bangladesh', '1', '2', '1', 'babani dohs', 'Pre school teaching needed. Must be hard working & good behavior. Can manage. Exp preffered.', 1, '2017-02-06 17:20:02', '2017-02-15 15:50:48'),
(2, 'gfhfgh', 'ghfgh', 'ghfgh', '7657657', '67657', 'admin@gmail.com', 56, 'male', '454', 0, 45, 'bangladesh', '1', '2', '1', '544', '45', 1, '2017-02-15 15:39:43', '2017-02-15 15:49:34'),
(3, 'Test Job ', 'Nurul', 'Azim', '01843701272', 'self', 'azimnurul1993@gmail.com', 2, 'female', '500', 0, 6, 'bangladesh', '1', '2', '5', 'hany bol er pasa', 'i want one man army', 1, '2017-02-16 11:56:08', '2017-02-18 16:26:50'),
(4, 'Job post by Inback', 'abc', 'cbde', '01815000000', 'parent', 'a@b.c', 2, 'any', '2000', 0, 6, 'bangladesh', '1', '2', '1', 'Board Bazaar', 'no Extra requirements just have to be nice in behavior', 1, '2017-02-22 17:05:53', '2017-02-22 17:08:23'),
(5, 'Jobs For all', 'abc', 'cbde', '01815000000', 'parent', 'a@b.c', 2, 'any', '5000', 0, 6, 'bangladesh', '1', '2', '1', 'Board bazaar', 'nothing but experienced is required', 1, '2017-02-22 17:12:06', '2017-02-22 17:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `offers_for_admins`
--

CREATE TABLE `offers_for_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(11) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers_for_admins`
--

INSERT INTO `offers_for_admins` (`id`, `offer_id`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2017-02-06 17:20:02', '2017-02-06 17:20:02'),
(2, 2, 0, '2017-02-15 15:39:43', '2017-02-15 15:39:43'),
(3, 3, 0, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(4, 4, 0, '2017-02-22 17:05:53', '2017-02-22 17:05:53'),
(5, 5, 0, '2017-02-22 17:12:06', '2017-02-22 17:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `offers_for_tutors`
--

CREATE TABLE `offers_for_tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_classes`
--

CREATE TABLE `offer_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `offers_id` int(11) NOT NULL,
  `classes_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offer_classes`
--

INSERT INTO `offer_classes` (`id`, `offers_id`, `classes_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-06 17:20:02', '2017-02-06 17:20:02'),
(2, 2, 1, '2017-02-15 15:39:43', '2017-02-15 15:39:43'),
(3, 3, 1, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(4, 3, 1, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(5, 4, 3, '2017-02-22 17:05:53', '2017-02-22 17:05:53'),
(6, 5, 1, '2017-02-22 17:12:06', '2017-02-22 17:12:06'),
(7, 5, 3, '2017-02-22 17:12:06', '2017-02-22 17:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `offer_media`
--

CREATE TABLE `offer_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `offers_id` int(11) NOT NULL,
  `medium_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offer_media`
--

INSERT INTO `offer_media` (`id`, `offers_id`, `medium_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-06 17:20:02', '2017-02-06 17:20:02'),
(2, 2, 1, '2017-02-15 15:39:43', '2017-02-15 15:39:43'),
(3, 3, 1, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(4, 3, 2, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(5, 4, 1, '2017-02-22 17:05:53', '2017-02-22 17:05:53'),
(6, 5, 1, '2017-02-22 17:12:06', '2017-02-22 17:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `offer_subjects`
--

CREATE TABLE `offer_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `offers_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offer_subjects`
--

INSERT INTO `offer_subjects` (`id`, `offers_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-06 17:20:02', '2017-02-06 17:20:02'),
(2, 2, 1, '2017-02-15 15:39:43', '2017-02-15 15:39:43'),
(3, 3, 1, '2017-02-16 11:56:08', '2017-02-16 11:56:08'),
(4, 4, 3, '2017-02-22 17:05:53', '2017-02-22 17:05:53'),
(5, 5, 1, '2017-02-22 17:12:06', '2017-02-22 17:12:06'),
(6, 5, 2, '2017-02-22 17:12:06', '2017-02-22 17:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `over_views`
--

CREATE TABLE `over_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `over_view` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `over_views`
--

INSERT INTO `over_views` (`id`, `title`, `user_id`, `over_view`, `created_at`, `updated_at`) VALUES
(1, 'expert in english', 32, 'hello discription', '2017-02-22 15:27:12', '2017-02-22 15:27:12'),
(2, 'fsdfds', 39, 'sdfdsfs', '2017-03-14 16:53:08', '2017-03-14 16:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shakawat.inbackoffice@gmail.com', '7606884a2d713b4226f05a3e03814daf75d64e10b2c849bfcc3e290178c27c69', '2017-03-13 11:39:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `upazila` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_card_type` int(10) UNSIGNED NOT NULL,
  `id_card_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkdin_link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `father_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_contact_relation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emergency_contact_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferred_location`
--

CREATE TABLE `preferred_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `preferred_location`
--

INSERT INTO `preferred_location` (`id`, `tutoring_basic_info_id`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 2, 9, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(3, 3, 2, '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `class_id`, `created_at`, `updated_at`) VALUES
(1, 'Math', 1, '2017-02-06 16:57:49', '2017-02-06 16:57:49'),
(2, 'Science', 3, '2017-02-06 17:54:31', '2017-02-06 17:54:31'),
(3, 'Math', 3, '2017-02-15 12:03:23', '2017-03-07 11:06:11'),
(4, 'Math', 5, '2017-03-07 11:10:17', '2017-03-07 11:10:17'),
(5, 'Physics', 5, '2017-03-07 11:11:01', '2017-03-07 11:11:01'),
(6, 'Chemistry', 5, '2017-03-07 11:11:29', '2017-03-07 11:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_basic_info`
--

CREATE TABLE `tutoring_basic_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tutoring_contact_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `student_home` tinyint(1) NOT NULL DEFAULT '0',
  `tutor_home` tinyint(1) NOT NULL DEFAULT '0',
  `online_home` tinyint(1) NOT NULL DEFAULT '0',
  `experience` tinyint(1) NOT NULL,
  `available_from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `available_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `division` int(100) NOT NULL,
  `district` int(100) NOT NULL,
  `location` int(100) NOT NULL,
  `salary_negotiable` tinyint(1) NOT NULL DEFAULT '0',
  `personal_tutoring` tinyint(1) NOT NULL DEFAULT '0',
  `group_tutoring` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_basic_info`
--

INSERT INTO `tutoring_basic_info` (`id`, `user_id`, `tutoring_contact_no`, `student_home`, `tutor_home`, `online_home`, `experience`, `available_from`, `available_to`, `salary`, `country`, `division`, `district`, `location`, `salary_negotiable`, `personal_tutoring`, `group_tutoring`, `created_at`, `updated_at`) VALUES
(1, 33, '01554330128', 0, 1, 1, 1, '8pm', '2pm', '500', 'bangladesh', 1, 2, 2, 0, 1, 1, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 33, '01817107244', 0, 1, 0, 0, '10:00pm', '06:am', '500', 'bangladesh', 1, 2, 17, 1, 1, 1, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(3, 39, '01698745632', 1, 0, 0, 0, '01-01-2017', '01-01-2017', '5000', 'bangladesh', 1, 2, 14, 1, 1, 0, '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_classes`
--

CREATE TABLE `tutoring_classes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `classes_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_classes`
--

INSERT INTO `tutoring_classes` (`id`, `tutoring_basic_info_id`, `classes_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 1, 3, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(3, 1, 4, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(4, 1, 5, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(5, 2, 1, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(6, 2, 3, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(7, 2, 5, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(8, 2, 6, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(9, 2, 7, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(10, 3, 1, '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_days`
--

CREATE TABLE `tutoring_days` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `days` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_days`
--

INSERT INTO `tutoring_days` (`id`, `tutoring_basic_info_id`, `days`, `created_at`, `updated_at`) VALUES
(1, 1, 'friday', '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 1, 'saturday', '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(3, 1, 'sunday', '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(4, 1, 'Monday', '2017-02-25 17:50:46', '2017-02-25 17:50:46'),
(5, 1, 'tuesday', '2017-02-25 17:50:46', '2017-02-25 17:50:46'),
(6, 2, 'friday', '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(7, 2, 'saturday', '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(8, 2, 'sunday', '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(9, 3, 'saturday', '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_districts`
--

CREATE TABLE `tutoring_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_divisions_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_districts`
--

INSERT INTO `tutoring_districts` (`id`, `tutoring_divisions_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 'Dhaka', '2017-02-06 17:02:49', '2017-02-06 17:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_divisions`
--

CREATE TABLE `tutoring_divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_divisions`
--

INSERT INTO `tutoring_divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2017-02-06 17:01:59', '2017-02-06 17:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_experience`
--

CREATE TABLE `tutoring_experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `experience_years` int(10) UNSIGNED NOT NULL,
  `discription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_experience`
--

INSERT INTO `tutoring_experience` (`id`, `tutoring_basic_info_id`, `experience_years`, `discription`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'giving teaching from university life', '2017-02-25 17:50:46', '2017-02-25 17:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_locations`
--

CREATE TABLE `tutoring_locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_districts_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_locations`
--

INSERT INTO `tutoring_locations` (`id`, `tutoring_districts_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Adabor', '2017-02-06 17:03:29', '2017-03-07 11:31:49'),
(2, 2, 'Agargaon', '2017-02-15 12:07:02', '2017-03-07 11:32:02'),
(3, 2, 'Armanitola', '2017-02-15 14:42:59', '2017-03-07 11:32:22'),
(4, 2, 'Asadgate', '2017-02-15 15:22:59', '2017-03-07 11:32:35'),
(5, 2, 'Ashkona', '2017-02-15 15:40:59', '2017-03-07 11:32:59'),
(6, 2, 'Azimpur', '2017-03-07 11:31:13', '2017-03-07 11:33:15'),
(7, 2, 'Badda', '2017-03-08 12:49:03', '2017-03-08 12:49:03'),
(8, 2, 'Baily Road', '2017-03-08 12:50:19', '2017-03-08 12:50:19'),
(9, 2, 'Bakshi Bazar', '2017-03-08 12:52:42', '2017-03-08 12:52:42'),
(10, 2, 'Banani', '2017-03-08 12:53:10', '2017-03-08 12:53:10'),
(11, 2, 'Banani DOHS', '2017-03-08 12:54:32', '2017-03-08 12:54:32'),
(12, 2, 'Bangabhaban', '2017-03-08 12:55:26', '2017-03-08 12:55:26'),
(13, 2, 'Bangla Motor', '2017-03-08 12:57:24', '2017-03-08 12:57:24'),
(14, 2, 'Bangshal', '2017-03-08 12:58:47', '2017-03-08 12:58:47'),
(15, 2, 'Baridhara', '2017-03-08 12:59:39', '2017-03-08 12:59:39'),
(16, 2, 'Baridhara DOHS', '2017-03-08 13:00:09', '2017-03-08 13:00:09'),
(17, 2, 'Bashabo', '2017-03-08 13:00:28', '2017-03-08 13:00:28'),
(18, 2, 'Bashundhara R/A', '2017-03-08 13:01:07', '2017-03-08 13:01:07'),
(19, 2, 'Begun Bari', '2017-03-08 13:01:43', '2017-03-08 13:01:43'),
(20, 2, 'Bijoynagar', '2017-03-08 13:02:50', '2017-03-08 13:02:50'),
(21, 2, 'Bimanbondor', '2017-03-08 13:04:17', '2017-03-08 13:04:17'),
(22, 2, 'Bonosree', '2017-03-08 13:05:03', '2017-03-08 13:07:12'),
(23, 2, 'Cantonment', '2017-03-08 13:09:11', '2017-03-08 13:09:11'),
(24, 2, 'Chakbazar', '2017-03-08 13:10:50', '2017-03-08 13:10:50'),
(25, 2, 'College Gate', '2017-03-08 13:11:34', '2017-03-08 13:11:34'),
(26, 2, 'Darussalam', '2017-03-08 13:13:37', '2017-03-08 13:13:37'),
(27, 2, 'Daskhin Khan', '2017-03-08 13:14:51', '2017-03-08 13:14:51'),
(28, 2, 'Demra', '2017-03-08 13:15:51', '2017-03-08 13:15:51'),
(29, 2, 'Dhaka University Area', '2017-03-08 13:16:42', '2017-03-08 13:16:42'),
(30, 2, 'Dhanmondi', '2017-03-08 13:19:01', '2017-03-08 13:19:01'),
(31, 2, 'Elephant Road', '2017-03-08 14:36:06', '2017-03-08 14:36:06'),
(32, 2, 'English Road', '2017-03-08 14:37:47', '2017-03-08 14:37:47'),
(33, 2, 'Eskaton road', '2017-03-08 14:38:55', '2017-03-08 14:38:55'),
(34, 2, 'Firmgate', '2017-03-08 14:39:33', '2017-03-08 14:39:33'),
(35, 2, 'Fokirapul', '2017-03-08 14:41:18', '2017-03-08 14:41:18'),
(36, 2, 'Gandaria', '2017-03-08 14:42:17', '2017-03-08 14:42:17'),
(37, 2, 'Green Road', '2017-03-08 14:43:52', '2017-03-08 14:43:52'),
(38, 2, 'Gulshan-1', '2017-03-08 14:45:28', '2017-03-08 14:45:28'),
(39, 2, 'Gulshan-2', '2017-03-08 14:46:25', '2017-03-08 14:46:25'),
(40, 2, 'Hatirpul', '2017-03-08 14:47:21', '2017-03-08 14:47:21'),
(41, 2, 'Hazaribag', '2017-03-08 14:49:36', '2017-03-08 14:49:36'),
(42, 2, 'Ibrahimpur', '2017-03-08 14:50:19', '2017-03-08 14:50:19'),
(43, 2, 'Indira Road', '2017-03-08 14:50:45', '2017-03-08 14:50:45'),
(44, 2, 'Jatrabari', '2017-03-08 14:51:19', '2017-03-08 14:51:19'),
(45, 2, 'Kadamtoli', '2017-03-08 14:52:20', '2017-03-08 14:52:20'),
(46, 2, 'Kafrul', '2017-03-08 14:52:49', '2017-03-08 14:52:49'),
(47, 2, 'Kakrail', '2017-03-08 14:53:17', '2017-03-08 14:53:17'),
(48, 2, 'Kolabagan', '2017-03-08 14:54:58', '2017-03-08 14:54:58'),
(49, 2, 'Kamrangirchor', '2017-03-08 14:55:28', '2017-03-08 14:55:28'),
(50, 2, 'Kawran Bazar', '2017-03-08 14:56:12', '2017-03-08 14:56:12'),
(51, 2, 'Kathal Bagan', '2017-03-08 14:59:28', '2017-03-08 14:59:28'),
(52, 2, 'Kawla', '2017-03-08 15:00:57', '2017-03-08 15:00:57'),
(53, 2, 'Kazipara', '2017-03-08 15:01:24', '2017-03-08 15:01:24'),
(54, 2, 'Khilgaon', '2017-03-08 15:02:17', '2017-03-08 15:02:17'),
(55, 2, 'Khilkhet', '2017-03-08 15:02:42', '2017-03-08 15:02:42'),
(56, 2, 'Kollanpur', '2017-03-08 15:03:06', '2017-03-08 15:03:06'),
(57, 2, 'Kotwali', '2017-03-08 15:03:37', '2017-03-08 15:03:37'),
(58, 2, 'Kuril', '2017-03-08 15:03:57', '2017-03-08 15:03:57'),
(59, 2, 'Lalbag', '2017-03-08 15:05:08', '2017-03-08 15:05:08'),
(60, 2, 'Lalmatia', '2017-03-08 15:05:31', '2017-03-08 15:05:31'),
(61, 2, 'Malibag', '2017-03-08 15:06:48', '2017-03-08 15:06:48'),
(62, 2, 'Matikata', '2017-03-08 15:07:05', '2017-03-08 15:07:05'),
(63, 2, 'Mirpur', '2017-03-08 15:07:30', '2017-03-08 15:07:30'),
(64, 2, 'Mirpur-1', '2017-03-08 15:07:58', '2017-03-08 15:07:58'),
(65, 2, 'Mirpur-2', '2017-03-08 15:08:21', '2017-03-08 15:08:21'),
(66, 2, 'Mirpur-3', '2017-03-08 15:08:42', '2017-03-08 15:08:42'),
(67, 2, 'Mirpur-6', '2017-03-08 15:10:09', '2017-03-08 15:10:09'),
(68, 2, 'Mirpur-7', '2017-03-08 15:10:43', '2017-03-08 15:10:43'),
(69, 2, 'Mirpur-10', '2017-03-08 15:11:07', '2017-03-08 15:11:07'),
(70, 2, 'Mirpur-11', '2017-03-08 15:11:26', '2017-03-08 15:11:26'),
(71, 2, 'Mirpur-12', '2017-03-08 15:11:54', '2017-03-08 15:11:54'),
(72, 2, 'Mirpur-13', '2017-03-08 15:12:26', '2017-03-08 15:12:26'),
(73, 2, 'Mirpur-14', '2017-03-08 15:12:47', '2017-03-08 15:12:47'),
(74, 2, 'Mirpur DOHS', '2017-03-08 15:13:08', '2017-03-08 15:13:08'),
(75, 2, 'Mitfort Road', '2017-03-08 15:13:48', '2017-03-08 15:13:48'),
(76, 2, 'Mogbazar', '2017-03-08 15:14:20', '2017-03-08 15:14:20'),
(77, 2, 'Mohakhali', '2017-03-08 15:14:57', '2017-03-08 15:14:57'),
(78, 2, 'Mohakhali DOHS', '2017-03-08 15:15:21', '2017-03-08 15:16:26'),
(79, 2, 'Mohammadpur', '2017-03-08 15:18:32', '2017-03-08 15:18:32'),
(80, 2, 'Mollartek', '2017-03-08 15:19:32', '2017-03-08 15:19:32'),
(81, 2, 'Monipuri Para', '2017-03-08 15:20:25', '2017-03-08 15:20:25'),
(82, 2, 'Motijheel', '2017-03-08 15:21:04', '2017-03-08 15:21:04'),
(83, 2, 'Mouchak', '2017-03-08 15:21:39', '2017-03-08 15:21:39'),
(84, 2, 'Mugda', '2017-03-08 15:22:15', '2017-03-08 15:22:15'),
(85, 2, 'Nakhalpara', '2017-03-08 15:24:03', '2017-03-08 15:24:03'),
(86, 2, 'Naya Bazar', '2017-03-08 15:24:50', '2017-03-08 15:24:50'),
(87, 2, 'Naya Polton', '2017-03-08 15:25:39', '2017-03-08 15:25:39'),
(88, 2, 'New Eskaton Road', '2017-03-08 15:26:50', '2017-03-08 15:26:50'),
(89, 2, 'New Market', '2017-03-08 15:27:51', '2017-03-08 15:27:51'),
(90, 2, 'Niketon', '2017-03-08 15:28:27', '2017-03-08 15:28:27'),
(91, 2, 'Nikunja-1', '2017-03-08 15:29:35', '2017-03-08 15:29:35'),
(92, 2, 'Nikunja-2', '2017-03-08 15:30:05', '2017-03-08 15:30:05'),
(93, 2, 'Notun Bazar', '2017-03-08 15:30:35', '2017-03-08 15:30:35'),
(94, 2, 'Pallabi', '2017-03-08 15:31:49', '2017-03-08 15:31:49'),
(95, 2, 'Polton', '2017-03-08 15:32:25', '2017-03-08 15:32:25'),
(96, 2, 'Panthapath', '2017-03-08 15:32:47', '2017-03-08 15:32:47'),
(97, 2, 'paribag', '2017-03-08 15:36:57', '2017-03-08 15:36:57'),
(98, 2, 'Pilkhana', '2017-03-08 15:37:29', '2017-03-08 15:37:29'),
(99, 2, 'Pirerbag', '2017-03-08 15:38:01', '2017-03-08 15:38:01'),
(100, 2, 'Postogola', '2017-03-08 15:38:53', '2017-03-08 15:38:53'),
(101, 2, 'Puran Dhaka', '2017-03-08 15:39:31', '2017-03-08 15:40:27'),
(102, 2, 'Purana polton', '2017-03-08 15:44:00', '2017-03-08 15:44:00'),
(103, 2, 'Ramna', '2017-03-08 15:44:28', '2017-03-08 15:44:28'),
(104, 2, 'Rampura', '2017-03-08 15:45:17', '2017-03-08 15:45:17'),
(105, 2, 'Rayer Bazar', '2017-03-08 15:45:52', '2017-03-08 15:45:52'),
(106, 2, 'Rajarbagh', '2017-03-08 15:46:41', '2017-03-08 15:46:41'),
(107, 2, 'Sabujbag', '2017-03-08 15:47:14', '2017-03-08 15:47:14'),
(108, 2, 'Sadarghat', '2017-03-08 15:47:47', '2017-03-08 15:47:47'),
(109, 2, 'Saydabad', '2017-03-08 15:48:25', '2017-03-08 15:48:25'),
(110, 2, 'Sankar', '2017-03-08 15:48:45', '2017-03-08 15:48:45'),
(111, 2, 'Segunbagicha', '2017-03-08 15:49:17', '2017-03-08 15:49:17'),
(112, 2, 'Shahbag', '2017-03-08 15:52:20', '2017-03-08 15:52:20'),
(113, 2, 'Shahinbag', '2017-03-08 15:52:41', '2017-03-08 15:53:17'),
(114, 2, 'Shahjadpur', '2017-03-08 15:53:44', '2017-03-08 15:53:44'),
(115, 2, 'Shajahanpur', '2017-03-08 15:54:36', '2017-03-08 15:54:36'),
(116, 2, 'Shamoli', '2017-03-08 15:54:48', '2017-03-08 15:56:05'),
(117, 2, 'Shantibag', '2017-03-08 15:57:19', '2017-03-08 15:57:19'),
(118, 2, 'Shantinagar', '2017-03-08 15:58:09', '2017-03-08 15:58:09'),
(119, 2, 'Sher-e-bangla nagar', '2017-03-08 15:58:47', '2017-03-08 15:58:47'),
(120, 2, 'Sherwrapara', '2017-03-08 15:59:22', '2017-03-08 15:59:22'),
(121, 2, 'Shyampur', '2017-03-08 15:59:50', '2017-03-08 15:59:50'),
(122, 2, 'Siddeshwari Road', '2017-03-08 16:00:36', '2017-03-08 16:00:36'),
(123, 2, 'Sobahanbag', '2017-03-08 16:01:04', '2017-03-08 16:01:04'),
(124, 2, 'Sonir Akhra', '2017-03-08 16:01:47', '2017-03-08 16:01:47'),
(125, 2, 'Shukrabad', '2017-03-08 16:02:11', '2017-03-08 16:02:11'),
(126, 2, 'Sutrapur', '2017-03-08 16:02:57', '2017-03-08 16:02:57'),
(127, 2, 'Tejgaon', '2017-03-08 16:03:18', '2017-03-08 16:03:18'),
(128, 2, 'Turag', '2017-03-08 16:04:13', '2017-03-08 16:04:13'),
(129, 2, 'Uttara', '2017-03-08 16:05:13', '2017-03-08 16:05:13'),
(130, 2, 'Uttara Sector-1', '2017-03-08 16:06:20', '2017-03-08 16:06:20'),
(131, 2, 'Uttara Sector-3', '2017-03-08 16:06:51', '2017-03-08 16:06:51'),
(132, 2, 'Uttara Sector-4', '2017-03-08 16:07:08', '2017-03-08 16:09:53'),
(133, 2, 'Uttara Sector-5', '2017-03-08 16:10:21', '2017-03-08 16:10:21'),
(134, 2, 'Uttara Sector-6', '2017-03-08 16:11:23', '2017-03-08 16:11:23'),
(135, 2, 'Uttara Sector-7', '2017-03-08 16:11:47', '2017-03-08 16:11:47'),
(136, 2, 'Uttara Sector-8', '2017-03-08 16:12:07', '2017-03-08 16:12:07'),
(137, 2, 'Uttara Sector-9', '2017-03-08 16:12:36', '2017-03-08 16:12:36'),
(138, 2, 'Uttara Sector-10', '2017-03-08 16:13:03', '2017-03-08 16:13:03'),
(139, 2, 'Uttara Sector-11', '2017-03-08 16:13:22', '2017-03-08 16:13:22'),
(140, 2, 'Uttara Sector-12', '2017-03-08 16:13:41', '2017-03-08 16:13:41'),
(141, 2, 'Uttara Sector-13', '2017-03-08 16:14:01', '2017-03-08 16:14:01'),
(142, 2, 'Uttara Sector-14', '2017-03-08 16:14:19', '2017-03-08 16:14:19'),
(143, 2, 'Uttarkhan', '2017-03-08 16:14:50', '2017-03-08 16:14:50'),
(144, 2, 'Wari', '2017-03-08 16:15:12', '2017-03-08 16:15:12'),
(145, 2, 'West Rampura', '2017-03-08 16:15:40', '2017-03-08 16:15:40'),
(146, 2, 'Zigatola', '2017-03-08 16:15:58', '2017-03-08 16:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_media`
--

CREATE TABLE `tutoring_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `medium_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_media`
--

INSERT INTO `tutoring_media` (`id`, `tutoring_basic_info_id`, `medium_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 1, 2, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(3, 1, 3, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(4, 2, 1, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(5, 2, 2, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(6, 3, 1, '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_online_info`
--

CREATE TABLE `tutoring_online_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `skype_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gmail_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_online_info`
--

INSERT INTO `tutoring_online_info` (`id`, `skype_id`, `gmail_id`, `tutoring_basic_info_id`, `created_at`, `updated_at`) VALUES
(1, 'shakawat hossain', 'sagor.rogas@gmail.com', 1, '2017-02-25 17:50:46', '2017-02-25 17:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `tutoring_subjects`
--

CREATE TABLE `tutoring_subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoring_basic_info_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutoring_subjects`
--

INSERT INTO `tutoring_subjects` (`id`, `tutoring_basic_info_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(2, 1, 2, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(3, 1, 3, '2017-02-25 17:50:45', '2017-02-25 17:50:45'),
(4, 2, 1, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(5, 2, 2, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(6, 2, 5, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(7, 2, 6, '2017-03-13 11:42:27', '2017-03-13 11:42:27'),
(8, 3, 1, '2017-03-14 16:49:21', '2017-03-14 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_to_admins`
--

CREATE TABLE `tutor_to_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `read_status` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tutor_to_admins`
--

INSERT INTO `tutor_to_admins` (`id`, `user_id`, `offer_id`, `read_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 0, 0, '2017-03-28 11:41:46', '2017-03-28 11:41:46'),
(2, 3, 5, 0, 0, '2017-03-29 13:41:14', '2017-03-29 13:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `confirm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=NotConfirm, 1= confirm',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Unblock, 1= Block',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `role`, `confirm`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nnn', 'nn', 'maruf.ju@gmail.com', '$2y$10$XQLsosY1/6wdSoYN3Uyrg.AVmGPzGsHPm1A6JzA75YtFPxcuFb3nO', '01717353509', 0, 0, 2, NULL, '2017-02-05 12:38:51', '2017-02-16 12:05:46'),
(3, 'Marof', 'Alam', 'marof.ewu@gmail.com', '$2y$10$OCwlH.yBQO6QZvyA1ZAuFemAg.h92uVP9X.QY3dFY/X6mz8ClqCZq', '01817107247', 1, 1, 3, '4oHJYEUFeRN7kJaRu6E6EzYEbvB2UBRBYGZIszDhdsuqmqtQTo2NXYiw6wHL', '2017-02-06 16:48:40', '2017-03-29 13:43:52'),
(4, 'mas', 'sss', 'marof.ju@gmail.com', '$2y$10$aIKyCfCWMMNc9vYTDTeJNeUZE93w8jBRdIV5jVWZd0vYZ/b3EP3yi', '01710544500', 0, 1, 3, NULL, '2017-02-07 12:15:12', '2017-03-16 09:52:01'),
(5, 'ariful', 'alam', 'ariful.ewu@gmail.com', '$2y$10$bCpaH60Vzr1c45EFCle2d.atu3hBjlGy9ESYLDMtUAcnRlCwuh9XW', '01672294747', 0, 1, 3, NULL, '2017-02-15 14:30:14', '2017-02-18 16:55:06'),
(6, 'Rizia Jahan', 'Riza', 'rsriza90@gmail.com', '$2y$10$TM2no8J5NUTm6fXmV5J8meRv2ClkonXYKbpbjNmUUYdvzUlW9wOb.', '01914223224', 0, 1, 2, 'e7bbx0GeYmeIp5DiCOVfmpfFLS0pxETzBlLOUfXTKw8cz127YIYVtvUVH1iG', '2017-02-15 14:55:11', '2017-02-16 12:05:42'),
(7, 'abc', 'def', 'shakawat.inbackoffice@gmail.com', '$2y$10$XJuhWDBneMd4qngDWEWdwuL0wrb/pnUUUFiwusCkjGI7eMu2j8/1u', '0987654321', 0, 1, 3, NULL, '2017-02-15 15:02:32', '2017-03-16 09:51:59'),
(8, 'Riza', 'Khan', 'riza.inbackoffice@gmail.com', '$2y$10$KF.vVKqw6mvrA9tTz5V4g.V09pOgq4i6s6CDrb6SORynQF39PtHDG', '01708420445', 0, 1, 3, NULL, '2017-02-15 15:14:48', '2017-03-16 09:51:59'),
(31, 'MARUFUL ', 'ALAM', 'juhanajannath@gmail.com', '$2y$10$YUvEFjlB6IRHAqANx7IYhOM8doyOhhkK71KE5uXr3dArIfkqJpw5y', '01710544500', 0, 1, 0, NULL, '2017-02-18 13:16:06', '2017-02-18 16:47:26'),
(32, 'Nurul', 'Azim', 'azimnurul1993@gmail.com', '$2y$10$hxKBuOd3wYncFrsvGywFSegLOb2t.lLWVIgg3OMlyL5j9lv.577ym', '01843701272', 0, 1, 0, 'a6JT0A4JjZBTeVNmSkQb3vEaHmj0r0Fgghv0QAXDvBICHud5OG7NXh8Etkc3', '2017-02-22 15:20:36', '2017-02-26 11:07:54'),
(33, 'Alex', 'Rozario', 'sagor.rogas@gmail.com', '$2y$10$5jjCLIOsFfx9YQu/E85bL.HCG2omsqxz4hXeWE./BEqp/uYYb9Vdu', '01554330128', 0, 1, 0, 'gfjWVTMYPu70SZtFUAGdkQ6QEy28ZEjBr5iBZ83kqg74I17Q6Gi8n9wPJbHr', '2017-02-25 17:39:48', '2017-02-26 11:09:55'),
(38, 'MD.NILOT]', 'alam', 'md.niloy@gmail.com', '$2y$10$WcBzqP/mlDzuK7AmDonURezOiAoMQRQKCNq0uvq2z2r7BsPBkpora', '01616353509', 0, 0, 0, 'hPNSkGg9exZqGGtQOmRBVGp28VhE4TQpJpaClIlvepbxDlkNRxyl5RiJl8ff', '2017-03-09 12:36:39', '2017-03-09 12:37:02'),
(39, 'test ', 'admin', 'tahminaiti@gmail.com', '$2y$10$HgTFJf7wKo3U73R6RSvibup6TSKwCwv6SxSYeIfaMCX6LX2bpv8UO', '0111111111', 0, 1, 3, 'cPy09ZomuHZAbSZEliswoZIN4wIyaqwEqGwsVRLjh6zvLtJQnzqCkBhI49xE', '2017-03-13 11:21:50', '2017-03-16 09:51:47'),
(40, 'HM', 'Saad', 'hmsaad.ewu@gmail.com', '$2y$10$pySXIS.MKy4YrAaeLfqEPeyQ0sqL6wYBexY3uNcF0byDHZmTf7kJG', '01684696460', 0, 0, 3, '0xO8AEDvqJTLbo3xKFYOYIrZ1jpzZWYoZWCcujRUraT893iQjipnBYXlplHo', '2017-03-23 14:45:39', '2017-03-28 12:09:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_to_tutors`
--
ALTER TABLE `admin_to_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_info`
--
ALTER TABLE `education_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_label`
--
ALTER TABLE `education_label`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_media`
--
ALTER TABLE `education_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mazar_group`
--
ALTER TABLE `mazar_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medium_category`
--
ALTER TABLE `medium_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_for_admins`
--
ALTER TABLE `offers_for_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_for_tutors`
--
ALTER TABLE `offers_for_tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_classes`
--
ALTER TABLE `offer_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_media`
--
ALTER TABLE `offer_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_subjects`
--
ALTER TABLE `offer_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `over_views`
--
ALTER TABLE `over_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferred_location`
--
ALTER TABLE `preferred_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_basic_info`
--
ALTER TABLE `tutoring_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_classes`
--
ALTER TABLE `tutoring_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_days`
--
ALTER TABLE `tutoring_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_districts`
--
ALTER TABLE `tutoring_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_divisions`
--
ALTER TABLE `tutoring_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_experience`
--
ALTER TABLE `tutoring_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_locations`
--
ALTER TABLE `tutoring_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_media`
--
ALTER TABLE `tutoring_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_online_info`
--
ALTER TABLE `tutoring_online_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutoring_subjects`
--
ALTER TABLE `tutoring_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_to_admins`
--
ALTER TABLE `tutor_to_admins`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `activation`
--
ALTER TABLE `activation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `admin_to_tutors`
--
ALTER TABLE `admin_to_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_info`
--
ALTER TABLE `education_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_label`
--
ALTER TABLE `education_label`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education_media`
--
ALTER TABLE `education_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mazar_group`
--
ALTER TABLE `mazar_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medium_category`
--
ALTER TABLE `medium_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `offers_for_admins`
--
ALTER TABLE `offers_for_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `offers_for_tutors`
--
ALTER TABLE `offers_for_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offer_classes`
--
ALTER TABLE `offer_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `offer_media`
--
ALTER TABLE `offer_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `offer_subjects`
--
ALTER TABLE `offer_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `over_views`
--
ALTER TABLE `over_views`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `preferred_location`
--
ALTER TABLE `preferred_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tutoring_basic_info`
--
ALTER TABLE `tutoring_basic_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tutoring_classes`
--
ALTER TABLE `tutoring_classes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tutoring_days`
--
ALTER TABLE `tutoring_days`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tutoring_districts`
--
ALTER TABLE `tutoring_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutoring_divisions`
--
ALTER TABLE `tutoring_divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutoring_experience`
--
ALTER TABLE `tutoring_experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutoring_locations`
--
ALTER TABLE `tutoring_locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT for table `tutoring_media`
--
ALTER TABLE `tutoring_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tutoring_online_info`
--
ALTER TABLE `tutoring_online_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutoring_subjects`
--
ALTER TABLE `tutoring_subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tutor_to_admins`
--
ALTER TABLE `tutor_to_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
