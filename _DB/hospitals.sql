-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 08:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitals`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admins_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 => stopped, 1 => active',
  `admins_type` enum('admin','storekeeper','delegate') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `admins_position` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admins_id`, `name`, `email`, `password`, `admins_status`, `admins_type`, `admins_position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'GeneralAdmin', 'admin@gmail.com', '$2y$10$tB4LuUMrJ/nVW33.43S3Ye4Sm57vFnnCDoXSSx5Vig.PXvDP4SJCq', 1, 'admin', 1, NULL, '2019-03-31 22:00:00', '2021-03-10 20:29:51'),
(4, 'Admin', 'Admin@example.com', '$2y$10$/7Nk0.Ha37zWzFbBvcdaVe5gzDugEnbsjdCR9h2v7sK0L2LceuLKe', 1, 'admin', 1, NULL, '2019-05-01 08:30:07', '2021-03-10 20:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `advertisements_id` int(10) UNSIGNED NOT NULL,
  `advertisements_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'اسم الاعلان يظهر للادمن فقط',
  `advertisements_img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `advertisements_mobile_img` varchar(200) CHARACTER SET utf8 NOT NULL,
  `advertisements_color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'لون خلفية الاعلان في حالة الاعلان بانر فقط',
  `advertisements_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `advertisements_status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '''0 => Stopped, 1 => Active''',
  `advertisements_created_at` timestamp NULL DEFAULT NULL,
  `advertisements_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`advertisements_id`, `advertisements_name`, `advertisements_img`, `advertisements_mobile_img`, `advertisements_color`, `advertisements_url`, `advertisements_status`, `advertisements_created_at`, `advertisements_updated_at`) VALUES
(1, 'اعلان', '775770771617811031_instAR.png', '6218566491617811032_instAR.png', '#000000', NULL, '1', '2021-04-07 11:07:43', '2021-04-07 13:57:13'),
(2, 'اعلان  2', '1231626701617811052_MOH01AR.png', '8524615761617811053_MOH01AR.png', '#000000', NULL, '1', '2021-04-07 13:57:34', '2021-04-07 13:57:34'),
(3, 'اعلان 3', '9184303571617811070_nursingJobBG.png', '8862476971617811071_nursingJobBG.png', '#000000', NULL, '1', '2021-04-07 13:57:53', '2021-04-07 13:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `areas_id` int(10) UNSIGNED NOT NULL,
  `countries_id` int(10) UNSIGNED NOT NULL,
  `cities_id` int(10) UNSIGNED NOT NULL,
  `areas_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `areas_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `areas_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`areas_id`, `countries_id`, `cities_id`, `areas_status`, `areas_created_at`, `areas_updated_at`) VALUES
(3, 0, 1, 'active', '2021-10-02 13:25:54', '2021-10-02 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `area_translations`
--

CREATE TABLE `area_translations` (
  `areas_trans_id` int(10) UNSIGNED NOT NULL,
  `areas_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `areas_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_translations`
--

INSERT INTO `area_translations` (`areas_trans_id`, `areas_id`, `locale`, `areas_title`) VALUES
(1, 3, 'ar', 'etert'),
(2, 3, 'en', 'ertert');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cities_id` int(10) UNSIGNED NOT NULL,
  `countries_id` int(10) UNSIGNED NOT NULL,
  `cities_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `cities_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cities_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`cities_id`, `countries_id`, `cities_status`, `cities_created_at`, `cities_updated_at`) VALUES
(1, 0, 'active', '2021-10-01 19:19:10', '2021-10-01 19:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `cities_trans_id` int(10) UNSIGNED NOT NULL,
  `cities_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cities_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`cities_trans_id`, `cities_id`, `locale`, `cities_title`) VALUES
(1, 1, 'ar', 'dfhdfh'),
(2, 1, 'en', 'ffhdh');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clients_id` int(11) UNSIGNED NOT NULL,
  `clients_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_civil_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clients_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `clients_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clients_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients_id`, `clients_phone`, `clients_civil_no`, `clients_name`, `email`, `password`, `clients_status`, `remember_token`, `email_verified_at`, `phone_verified_at`, `clients_created_at`, `clients_updated_at`) VALUES
(1, '123456789', '369852741546', 'AHMED MOHAMMED', 'ahmed@gmail.com', '$2y$10$ddPGVbQuagsuoCYIFPaAie8L1NKTultajr7m.IF62JgOZpJ2Ty7Pm', '1', NULL, NULL, NULL, '2021-04-07 13:13:55', '2021-04-09 19:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contacts_id` int(10) UNSIGNED NOT NULL,
  `contacts_mobiles` text CHARACTER SET utf8,
  `contacts_facebook` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `contacts_twitter` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `contacts_instagram` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `contacts_snapchat` varchar(255) DEFAULT NULL,
  `contacts_whatsapp` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `contacts_created_at` timestamp NULL DEFAULT NULL,
  `contacts_updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contacts_id`, `contacts_mobiles`, `contacts_facebook`, `contacts_twitter`, `contacts_instagram`, `contacts_snapchat`, `contacts_whatsapp`, `contacts_created_at`, `contacts_updated_at`) VALUES
(1, '966525364875', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.nstagram.com/', 'https://www.snapchat.com/', '321654987', '2020-01-13 22:00:00', '2020-11-24 08:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact_translations`
--

CREATE TABLE `contact_translations` (
  `contacts_trans_id` int(11) NOT NULL,
  `contacts_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contacts_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `contacts_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_translations`
--

INSERT INTO `contact_translations` (`contacts_trans_id`, `contacts_id`, `locale`, `contacts_address`, `contacts_text`) VALUES
(1, 1, 'ar', NULL, ''),
(2, 1, 'en', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(10) UNSIGNED NOT NULL,
  `contact_us_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_email` varchar(191) CHARACTER SET utf8 DEFAULT NULL,
  `contact_us_type` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '''0 => Complaint, 1 => Sugestion''',
  `contact_us_status` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0' COMMENT '0 => "new" , 1=>"done"',
  `contact_us_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_message` text COLLATE utf8_unicode_ci NOT NULL,
  `contact_us_created_at` datetime DEFAULT NULL,
  `contact_us_updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countries_id` int(10) UNSIGNED NOT NULL,
  `countries_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `countries_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `countries_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_status`, `countries_created_at`, `countries_updated_at`) VALUES
(1, 'active', '2021-03-27 13:49:49', '2021-03-27 13:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `countries_trans_id` int(10) UNSIGNED NOT NULL,
  `countries_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_translations`
--

INSERT INTO `country_translations` (`countries_trans_id`, `countries_id`, `locale`, `countries_title`) VALUES
(1, 1, 'ar', 'الكويت'),
(2, 1, 'en', 'kuwait');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departments_id` int(10) UNSIGNED NOT NULL,
  `departments_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `departments_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `departments_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departments_id`, `departments_status`, `departments_created_at`, `departments_updated_at`) VALUES
(1, 'active', '2021-03-27 15:08:29', '2021-03-27 15:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `department_translations`
--

CREATE TABLE `department_translations` (
  `departments_trans_id` int(10) UNSIGNED NOT NULL,
  `departments_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departments_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_translations`
--

INSERT INTO `department_translations` (`departments_trans_id`, `departments_id`, `locale`, `departments_title`) VALUES
(1, 1, 'ar', 'sdfsdf'),
(2, 1, 'en', 'sdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `diseases_id` int(10) UNSIGNED NOT NULL,
  `diseases_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `diseases_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diseases_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`diseases_id`, `diseases_status`, `diseases_created_at`, `diseases_updated_at`) VALUES
(1, 'active', '2021-04-08 21:41:39', '2021-04-08 21:41:39'),
(2, 'active', '2021-04-08 21:42:11', '2021-04-08 21:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `disease_translations`
--

CREATE TABLE `disease_translations` (
  `diseases_trans_id` int(10) UNSIGNED NOT NULL,
  `diseases_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diseases_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disease_translations`
--

INSERT INTO `disease_translations` (`diseases_trans_id`, `diseases_id`, `locale`, `diseases_title`) VALUES
(1, 1, 'ar', 'الضغط'),
(2, 1, 'en', 'Pressure'),
(3, 2, 'ar', 'فشل كلوي'),
(4, 2, 'en', 'Kidney failure');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctors_id` int(10) UNSIGNED NOT NULL,
  `doctors_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialties_id` int(10) UNSIGNED DEFAULT NULL,
  `departments_id` int(10) UNSIGNED DEFAULT NULL,
  `doctors_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `doctors_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctors_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctors_civil_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_id` int(10) UNSIGNED DEFAULT NULL,
  `hospitals_id` int(10) UNSIGNED DEFAULT NULL,
  `doctors_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doctors_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctors_id`, `doctors_name`, `specialties_id`, `departments_id`, `doctors_status`, `doctors_phone`, `doctors_email`, `doctors_civil_no`, `password`, `countries_id`, `hospitals_id`, `doctors_created_at`, `doctors_updated_at`) VALUES
(1, 'ahmed', 3, 1, 'active', '963852741', 'ahmed@gmail.com', '12345678932145', '$2y$10$zahgYmwgqYRTGwHQ3ridxuWibRKREaFpjWRv9tSegO.0k/J41evNy', 1, 1, '2021-03-27 16:59:06', '2021-04-10 10:12:34'),
(2, 'dr/khaled', 3, 1, 'active', '12345678', 'khaled@gmail.com', '9685741236545', '$2y$10$MOQ.n89UOdT4/XI116cmkOXUcz8dWeBPu5nLmUwju3dAUqSfDNkpu', NULL, NULL, '2021-04-10 10:46:33', '2021-04-24 14:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `hospitals_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `hospitals_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_id` int(10) UNSIGNED DEFAULT NULL,
  `cities_id` int(10) UNSIGNED DEFAULT NULL,
  `hospitals_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hospitals_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospitals_id`, `hospitals_status`, `hospitals_phone`, `hospitals_lat`, `hospitals_lng`, `countries_id`, `cities_id`, `hospitals_image`, `password`, `hospitals_created_at`, `hospitals_updated_at`) VALUES
(1, 'active', '545642486418', '24.543556900031724', '46.65599275648131', 1, 1, '3484352331634402552_3997673841619085363_eye.jpg', NULL, '2021-03-27 15:31:41', '2021-10-16 14:42:32'),
(2, 'active', '9638527415', '24.543942397325882', '46.65670085966124', NULL, 1, NULL, '$2y$10$BBsRAVMwawq8l2KsX5ryxO/38IE0FXh7e.AG7M9bxDE0cHi2xjZmq', '2021-10-02 14:30:08', '2021-10-16 15:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_areas`
--

CREATE TABLE `hospitals_areas` (
  `hospitals_areas_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `areas_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals_areas`
--

INSERT INTO `hospitals_areas` (`hospitals_areas_id`, `hospitals_id`, `areas_id`) VALUES
(5, 3, 2),
(6, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_departments`
--

CREATE TABLE `hospitals_departments` (
  `hospitals_departments_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `departments_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals_departments`
--

INSERT INTO `hospitals_departments` (`hospitals_departments_id`, `hospitals_id`, `departments_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_specialties`
--

CREATE TABLE `hospitals_specialties` (
  `hospitals_specialties_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `specialties_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals_specialties`
--

INSERT INTO `hospitals_specialties` (`hospitals_specialties_id`, `hospitals_id`, `specialties_id`) VALUES
(4, 1, 4),
(5, 1, 5),
(6, 1, 3),
(7, 2, 3),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals_treatments`
--

CREATE TABLE `hospitals_treatments` (
  `hospitals_treatments_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED DEFAULT NULL,
  `diseases_id` int(10) UNSIGNED DEFAULT NULL,
  `doctors_id` int(10) UNSIGNED DEFAULT NULL,
  `hospitals_treatments_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_treatments_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_treatments_program` text COLLATE utf8mb4_unicode_ci,
  `hospitals_treatments_rate` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_treatments_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `hospitals_treatments_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hospitals_treatments_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals_treatments`
--

INSERT INTO `hospitals_treatments` (`hospitals_treatments_id`, `hospitals_id`, `diseases_id`, `doctors_id`, `hospitals_treatments_period`, `hospitals_treatments_cost`, `hospitals_treatments_program`, `hospitals_treatments_rate`, `hospitals_treatments_status`, `hospitals_treatments_created_at`, `hospitals_treatments_updated_at`) VALUES
(1, 2, 1, 2, '20 يوم', '100دينار', '<p>نص برنامج العلاج&nbsp;&nbsp;</p>', '80%', 'active', '2021-04-24 15:21:53', '2021-05-05 15:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_images`
--

CREATE TABLE `hospital_images` (
  `hospital_images_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `hospital_images_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_images`
--

INSERT INTO `hospital_images` (`hospital_images_id`, `hospitals_id`, `hospital_images_name`) VALUES
(1, 1, '3426070101634402116_3997673841619085363_eye.jpg'),
(2, 1, '1636660921634402117_1745726621619085340_cream.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_translations`
--

CREATE TABLE `hospital_translations` (
  `hospitals_trans_id` int(10) UNSIGNED NOT NULL,
  `hospitals_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hospitals_address` text COLLATE utf8mb4_unicode_ci,
  `hospitals_desc` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_translations`
--

INSERT INTO `hospital_translations` (`hospitals_trans_id`, `hospitals_id`, `locale`, `hospitals_title`, `hospitals_address`, `hospitals_desc`) VALUES
(1, 1, 'ar', 'المستشفي العام بالكويت', 'المدينة - الكويت', '<p>sdfsdfsdf</p>'),
(2, 1, 'en', 'Kuwait General Hospital', 'المدينة - الكويت', '<p>sfsdfsdf</p>'),
(3, 2, 'ar', 'qwrq', 'qwrqwr', '<p>qwrqwr</p>'),
(4, 2, 'en', 'wr', 'qwrqwr', '<p>qwrqwr</p>');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `infos_id` int(11) UNSIGNED NOT NULL,
  `infos_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `infos_status` tinyint(4) NOT NULL DEFAULT '1',
  `infos_position` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`infos_id`, `infos_key`, `infos_status`, `infos_position`) VALUES
(1, 'about', 1, 4),
(2, 'policy', 1, 1),
(3, 'terms', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `info_translations`
--

CREATE TABLE `info_translations` (
  `infos_trans_id` int(11) NOT NULL,
  `infos_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `infos_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `infos_desc` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info_translations`
--

INSERT INTO `info_translations` (`infos_trans_id`, `infos_id`, `locale`, `infos_title`, `infos_desc`) VALUES
(1, 1, 'ar', 'عن واين', '<p dir=\"rtl\"><strong>نص عن المستشفيات</strong></p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>'),
(2, 1, 'en', 'about Wayn', '<div class=\"tw-nfl tw-ta-container\" id=\"tw-target-text-container\">\r\n<pre style=\"text-align:left\">\r\nText about hospitals</pre>\r\n\r\n<p><img alt=\"\" src=\"                            \" /></p>\r\n</div>'),
(3, 2, 'ar', 'سياسة الاستخدام', '<p dir=\"rtl\">نص سياسة الاستخدام</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>'),
(4, 2, 'en', 'Policy', '<p>text</p>'),
(5, 3, 'ar', 'الشروط', '<p dir=\"rtl\">نص الشروط الاحكام</p>'),
(6, 3, 'en', 'Terms', '<p>Text</p>');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `languages_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ltr' COMMENT '''ltr'' => left to right, ''rtl'' => right to left',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 => stopped, 1 => active	',
  `position` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languages_id`, `name`, `locale`, `dir`, `status`, `position`) VALUES
(1, 'English', 'en', 'ltr', 1, 2),
(2, 'Arabic', 'ar', 'rtl', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `metatags`
--

CREATE TABLE `metatags` (
  `metatags_id` mediumint(8) UNSIGNED NOT NULL,
  `metatags_page` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metatags_position` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `metatags`
--

INSERT INTO `metatags` (`metatags_id`, `metatags_page`, `metatags_position`) VALUES
(22, 'home', 1),
(23, 'about', 1),
(24, 'privacy_policy', 1),
(25, 'terms_of_use', 1);

-- --------------------------------------------------------

--
-- Table structure for table `metatag_translations`
--

CREATE TABLE `metatag_translations` (
  `metatags_trans_id` mediumint(8) UNSIGNED NOT NULL,
  `metatags_id` mediumint(8) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `metatags_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `metatags_desc` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `metatag_translations`
--

INSERT INTO `metatag_translations` (`metatags_trans_id`, `metatags_id`, `locale`, `metatags_title`, `metatags_desc`) VALUES
(39, 22, 'ar', 'الصفحة الرئيسية', 'وصف الصفحة الرئيسية'),
(40, 22, 'en', 'Home Page', 'Home page Description'),
(41, 23, 'en', 'About Page title', '<p>About Page description</p>'),
(42, 23, 'ar', 'عنوان صفحة عن الموقع', '<p>وصف صفحة عن الموقع</p>'),
(43, 24, 'en', 'Privacy policy page title', 'Privacy policy page description'),
(44, 24, 'ar', 'عنوان صفحة سياسة الخصوصية', 'وصف صفحة سياسة الخصوصية'),
(49, 25, 'en', 'Terms of use page title', 'Terms of use page description'),
(50, 25, 'ar', 'عنوان صفحة شروط الاستخدام', 'وصف صفحة شروط الاستخدام');

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
(3, '2019_03_28_072431_create_permission_tables', 1),
(4, '2020_03_03_105118_create_notifications_table', 2),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(8, '2016_06_01_000004_create_oauth_clients_table', 3),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Modules\\Admin\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 4),
(2, 'Modules\\Admin\\Models\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `news_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `news_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_status`, `news_image`, `news_created_at`, `news_updated_at`) VALUES
(1, 'active', '5446565751617812408_بثينه 2.jpg', '2021-04-07 11:17:29', '2021-04-07 14:20:09'),
(2, 'active', '4524452311617812501_thumbnail_D61A0097.jpg', '2021-04-07 14:21:41', '2021-04-07 14:21:41'),
(3, 'active', '1972102341617812578_thumbnail_ba814520-2870-41d1-b2c9-3c9bddee031f.jpg', '2021-04-07 14:22:59', '2021-04-07 14:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `news_translations`
--

CREATE TABLE `news_translations` (
  `news_trans_id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_desc` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_translations`
--

INSERT INTO `news_translations` (`news_trans_id`, `news_id`, `locale`, `news_title`, `news_desc`) VALUES
(1, 1, 'ar', 'تطعيمات كبار السن وذوي الإعاقه', '<p style=\"text-align:right\">تم تدشين حملة تطعيم &laquo;كوفيد ـ 19&raquo; في مراكز رعاية المعاقين التابعة للهيئة العامة لشؤون ذوي الاعاقة ومراكز رعاية المسنين التابع لوزارة الشؤون انطلاقا من خطة العمل الوطنية لرعاية كبار السن وذوي الإعاقة لحمايه الفئات الأكثر عرضه للإصابة&nbsp;&nbsp;والفئات الأكثر تعرضا للمضاعفات في حال الإصابة بالفايروس.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;وارتكازا لما هو وارد في خطه التطعيم المعدة من قبل قطاع الصحة العامة لوزارة الصحة أعلنت الوكيل المساعد لشؤون الصحة العامة الدكتورة بثينة المضف عن تنفيذ وزارة الصحة لخطتها الخاصة بتطعيمات فايروس كورونا.</p>\r\n\r\n<p dir=\"rtl\">وأكدت المضف على الأهمية التي توليها وزارة الصحة لهذه الفئات وأننا بصدد تغطية جميع المقيمين بدور الرعاية وسيكون هناك حمله تطعيم أخرى للعاملين بدار المسنين ودور الرعاية لحمايتهم مستقبلا.&nbsp;</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>\r\n\r\n<p dir=\"rtl\"><strong>إدارة العلاقات العامه والإعلام</strong></p>\r\n\r\n<p dir=\"rtl\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;قسم&nbsp;الإعلام</strong></p>'),
(2, 1, 'en', 'Vaccinations for the elderly and people with disabilities', '<p>The &quot;Covid-19&quot; vaccination campaign was launched in the care centers for the disabled of the Public Authority for the Affairs of the Persons with Disabilities and the Elderly Care Centers of the Ministry of Affairs, based on the National Action Plan for the Care of the Elderly and People with Disabilities, to protect the most vulnerable groups and the groups most exposed to complications in the event of infection with the virus.</p>\r\n\r\n<p>Al-Mudhaf emphasized the importance that the Ministry of Health attaches to these groups, and that we are about to cover all residents in care homes, and there will be another vaccination campaign for workers in nursing homes and care homes to protect them in the future.</p>\r\n\r\n<p>Public Relations and Media Department</p>\r\n\r\n<p>Department of Media</p>'),
(3, 2, 'ar', 'موقع كويت مسافر', '<p style=\"text-align:right\">شرح معالي وزير الصحه الشيخ الدكتور باسل حمود الصباح موقع كويت مسافر&nbsp;</p>'),
(4, 2, 'en', 'Kuwait Traveler website', '<p>His Excellency the Minister of Health Sheikh Dr. Basil Hammoud Al-Sabah explained the Kuwait Traveler website</p>'),
(5, 3, 'ar', 'زيارة رئيس مجلس الوزراء الشيخ صباح الخالد', '<p style=\"text-align:right\">زيارة رئيس مجلس الوزراء الشيخ صباح الخالد لمركز الكويت للتطعيم صاله رقم ٥&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">بأرض المعارض بمنطقة مشرف.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>إدراة العلاقات العامة والإعلام</strong></p>\r\n\r\n<p style=\"text-align:right\"><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; قسم الإعلام</strong></p>'),
(6, 3, 'en', 'Visit of Prime Minister Sheikh Sabah Al-Khaled', '<p>The visit of the Prime Minister, Sheikh Sabah Al-Khaled, to the Kuwait Vaccination Center, Hall No. 5<br />\r\nIn the exhibition grounds in Mishref area.</p>\r\n\r\n<p><br />\r\nDepartment of Public Relations and Media<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Department of Media</p>');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('040b8a0a-56a9-40bb-bd85-07deaaf2edaa', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:29:03 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:29:37', '2020-03-11 11:29:03', '2020-03-11 11:29:37'),
('059e0c2e-b8d1-40d6-9f1f-7ab489b63217', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"ertertert\",\"messages_updated_at\":\"2020-07-22 18:47:29\",\"messages_created_at\":\"2020-07-22 18:47:29\",\"messages_id\":322,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:47:30 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:47:30', '2020-07-22 16:47:30'),
('10ff3d26-ec3e-411e-890b-4924be55ea30', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0633\\u0628\\u064a\\u0633\\u0644\\u0633\\u064a\\u0644\",\"messages_img\":\"1897329781595436238_download (1).png\",\"messages_updated_at\":\"2020-07-22 18:43:58\",\"messages_created_at\":\"2020-07-22 18:43:58\",\"messages_id\":318,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:44:00 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:44:00', '2020-07-22 16:44:00'),
('1355750b-d2d3-49ce-b6ca-edc804afb3aa', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"reryueryuey\",\"messages_img\":\"8628992131595436435_WhatsApp Image 2020-07-06 at 12.48.50 AM.jpeg\",\"messages_updated_at\":\"2020-07-22 18:47:15\",\"messages_created_at\":\"2020-07-22 18:47:15\",\"messages_id\":320,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:47:16 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:47:16', '2020-07-22 16:47:16'),
('2cc8646c-554b-4d65-b04f-e93accc81b20', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"consultings_id\":\"23\",\"recipient_id\":\"1\",\"sender_id\":\"1\",\"messages_type\":\"1\",\"messages_text\":\"l\",\"messages_updated_at\":\"2020-03-23 14:49:25\",\"messages_created_at\":\"2020-03-23 14:49:25\",\"messages_id\":298,\"ar\":\"\\u062f\\u0643\\u062a\\u0648\\u0631 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0639\\u0646\\u0627\\u0646\\u064a \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062f\\u0643\\u062a\\u0648\\u0631 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0639\\u0646\\u0627\\u0646\\u064a Send a new message .\",\"created_at\":\"02:49:26 2020-03-23\"},\"type\":\"message\",\"sender\":null}', '2020-03-23 13:34:37', '2020-03-23 12:49:26', '2020-03-23 13:34:37'),
('2ced7790-f020-48a5-880e-9728c9c0a456', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645\",\"messages_updated_at\":\"2020-03-23 13:30:58\",\"messages_created_at\":\"2020-03-23 13:30:58\",\"messages_id\":296,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"01:30:59 2020-03-23\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-03-23 11:30:59', '2020-03-23 11:30:59'),
('32cc0205-b9a7-473b-8e30-948c630dce67', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\" \\u0644\\u0642\\u062f \\u0646\\u0641\\u0630\\u062a \\u0627\\u0644\\u0643\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0645\\u062a\\u0627\\u062d\\u0629 \\u0645\\u0646 \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644 \\u0644\\u062f\\u064a\\u0643 \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0637\\u0644\\u0628\\u0647 \\u0627\\u0644\\u0627\\u0646 \\u0645\\u0646 \\u062e\\u0644\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639  \",\"en\":\" You have run out of available \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644 , you can order it now through the website \",\"created_at\":\"12:52:37 2020-03-11\"},\"type\":\"reminder_dose\",\"sender\":null}', '2020-03-11 10:52:40', '2020-03-11 10:52:37', '2020-03-11 10:52:40'),
('3381db01-fb55-4f5c-8d4b-414b515e7f40', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 5, '{\"data\":{\"consultings_id\":\"25\",\"recipient_id\":\"5\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645 \\u064a\\u0627 \\u062f\\u0643\\u062a\\u0648\\u0631\",\"messages_updated_at\":\"2020-03-23 15:28:56\",\"messages_created_at\":\"2020-03-23 15:28:56\",\"messages_id\":300,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"03:28:57 2020-03-23\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-03-23 13:28:57', '2020-03-23 13:28:57'),
('3adbb911-fa38-4840-90d4-1959d9a61718', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":null,\"messages_updated_at\":\"2020-07-22 18:51:32\",\"messages_created_at\":\"2020-07-22 18:51:32\",\"messages_id\":324,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:51:34 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:51:34', '2020-07-22 16:51:34'),
('4575dfb2-16e4-47a5-a853-68280302cbe8', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u064a\\u0628\\u0644\\u0628\\u064a\\u0644\\u064a\\u0628\",\"messages_img\":\"7190533741595433468_download (1).png\",\"messages_updated_at\":\"2020-07-22 17:57:49\",\"messages_created_at\":\"2020-07-22 17:57:49\",\"messages_id\":312,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"05:57:50 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 15:57:50', '2020-07-22 15:57:50'),
('4fb58ffd-f531-4009-8dc3-48e33f7af90e', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":null,\"messages_img\":\"3103959451595435734_WhatsApp Image 2020-07-06 at 12.48.50 AM.jpeg\",\"messages_updated_at\":\"2020-07-22 18:35:34\",\"messages_created_at\":\"2020-07-22 18:35:34\",\"messages_id\":316,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:35:36 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:35:36', '2020-07-22 16:35:36'),
('645d703d-e10c-490f-a927-aa028462a32d', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0627\\u0644\\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645\",\"messages_updated_at\":\"2020-03-23 13:30:54\",\"messages_created_at\":\"2020-03-23 13:30:54\",\"messages_id\":295,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"01:30:56 2020-03-23\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-03-23 11:30:57', '2020-03-23 11:30:57'),
('6aaff4f8-81a5-4783-985a-bc711763b376', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u062d\\u0627\\u0646 \\u0645\\u0648\\u0639\\u062f \\u062c\\u0631\\u0639\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628 \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644 \\u064a\\u062c\\u0628 \\u0627\\u062e\\u0630 \\u0627\\u0644\\u062c\\u0631\\u0639\\u0629 \\u0627\\u0644\\u0627\\u0646 \",\"en\":\"It\'s time for a dose for \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644. The dose should be taken now \",\"created_at\":\"12:47:05 2020-03-11\"},\"type\":\"reminder_dose\",\"sender\":null}', '2020-03-11 10:47:10', '2020-03-11 10:47:05', '2020-03-11 10:47:10'),
('735288c9-c59c-4065-83a8-3833e6f29993', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 5, '{\"data\":{\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0628\\u062f\\u0623 \\u0634\\u0627\\u062a \\u062c\\u062f\\u064a\\u062f\",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f start a new consulting \",\"created_at\":\"03:28:35 2020-03-23\"},\"type\":\"startChat\",\"sender\":null}', NULL, '2020-03-23 13:28:35', '2020-03-23 13:28:35'),
('76253622-1c01-4595-a839-f7fd468b1066', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:47:41 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:47:57', '2020-03-11 11:47:41', '2020-03-11 11:47:57'),
('7c59a0e1-5878-4304-aca0-5abc84df0ace', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u062f\\u064a \\u0627\\u0644\\u0635\\u0648\\u0631\\u0629 \\u064a\\u0627 \\u062f\\u0643\\u062a\\u0648\\u0631\",\"messages_img\":\"2975903351595435957_download (1).png\",\"messages_updated_at\":\"2020-07-22 18:39:17\",\"messages_created_at\":\"2020-07-22 18:39:17\",\"messages_id\":317,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:39:18 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:39:18', '2020-07-22 16:39:18'),
('7da42b9b-c28e-401d-977e-b6f04954fbea', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:29:45 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:29:50', '2020-03-11 11:29:45', '2020-03-11 11:29:50'),
('7f6e0f5d-73db-46e3-8503-e462ce33de62', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":null,\"messages_img\":\"8983220111595436613_Design4.png\",\"messages_updated_at\":\"2020-07-22 18:50:13\",\"messages_created_at\":\"2020-07-22 18:50:13\",\"messages_id\":323,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:50:14 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:50:14', '2020-07-22 16:50:14'),
('86196678-4a40-4067-9a71-f17e5a238f75', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"sdf\",\"messages_img\":\"7371656381595435317_3523525523-XL.jpg\",\"messages_updated_at\":\"2020-07-22 18:28:37\",\"messages_created_at\":\"2020-07-22 18:28:37\",\"messages_id\":314,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:28:38 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:28:38', '2020-07-22 16:28:38'),
('923b9145-042a-4360-ae30-14965c235c66', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u064a\\u0628\\u0644\\u0628\\u064a\\u0644\\u064a\\u0628\",\"messages_img\":\"5783908481595433468_download (1).png\",\"messages_updated_at\":\"2020-07-22 17:57:49\",\"messages_created_at\":\"2020-07-22 17:57:49\",\"messages_id\":313,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"05:57:50 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 15:57:50', '2020-07-22 15:57:50'),
('a180e21d-c6b8-4236-b2a6-58c2e7e7804e', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u062d\\u0627\\u0646 \\u0645\\u0648\\u0639\\u062f \\u062c\\u0631\\u0639\\u0629 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628 \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644 \\u064a\\u062c\\u0628 \\u0627\\u062e\\u0630 \\u0627\\u0644\\u062c\\u0631\\u0639\\u0629 \\u0627\\u0644\\u0627\\u0646 \",\"en\":\"It\'s time for a dose for \\u062c\\u0648\\u0628\\u0644 \\u0628\\u0627\\u0631\\u064a\\u0633 \\u0645\\u062c\\u0645\\u0648\\u0639\\u0629 \\u0627\\u0644\\u0639\\u0646\\u0627\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0628\\u0634\\u0631\\u0629 ,300 \\u0645\\u0644. The dose should be taken now \",\"created_at\":\"12:51:45 2020-03-11\"},\"type\":\"reminder_dose\",\"sender\":null}', '2020-03-11 10:51:48', '2020-03-11 10:51:45', '2020-03-11 10:51:48'),
('aea38f67-2608-4053-b0b0-9f5b2d26819c', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":null,\"messages_updated_at\":\"2020-07-22 18:47:22\",\"messages_created_at\":\"2020-07-22 18:47:22\",\"messages_id\":321,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:47:23 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:47:23', '2020-07-22 16:47:23'),
('bafb5762-f827-4455-9e8e-3c62303d0416', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:23:35 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:23:49', '2020-03-11 11:23:35', '2020-03-11 11:23:49'),
('bf43658c-f2c7-4a29-9cea-529c8a1d4416', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:27:00 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:27:03', '2020-03-11 11:27:00', '2020-03-11 11:27:03'),
('c05b4937-f824-4b96-856a-ab6b1f4a3968', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"ar\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f \\u0645\\u062a\\u0627\\u062d \\u0627\\u0644\\u0627\\u0646 \\u0641\\u064a \\u0645\\u062f\\u064a\\u062a\\u0643 \\u062a\\u0633\\u0637\\u064a\\u0639 \\u0637\\u0644\\u0628\\u0647 \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639 \",\"en\":\"\\u0641\\u0631\\u064a\\u0634 \\u0633\\u0628\\u0627 \\u0643\\u0627\\u0645\\u0634\\u0627\\u062a\\u0643\\u0627 \\u0633\\u064a\\u0631\\u0648\\u0645 \\u0644\\u0644\\u062c\\u0633\\u0645 \\u0645\\u0636\\u0627\\u062f \\u0644\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a \\u062a\\u0645\\u062f\\u062f \\u0627\\u0644\\u062c\\u0644\\u062f  is now available in your city. You can order it from the website \",\"created_at\":\"01:28:28 2020-03-11\"},\"type\":\"products\",\"sender\":null}', '2020-03-11 11:29:37', '2020-03-11 11:28:28', '2020-03-11 11:29:37'),
('c0bc2851-b900-4026-b1b3-8a005633a972', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0628\\u062f\\u0623 \\u0634\\u0627\\u062a \\u062c\\u062f\\u064a\\u062f\",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f start a new consulting \",\"created_at\":\"06:27:13 2020-03-22\"},\"type\":\"startChat\",\"sender\":null}', NULL, '2020-03-22 16:27:14', '2020-03-22 16:27:14'),
('d19255da-75a6-4359-a03b-bcc04f826964', 'App\\Notifications\\Notifications', 'Modules\\Admin\\Models\\Client', 1, '{\"data\":{\"consultings_id\":\"23\",\"recipient_id\":\"1\",\"sender_id\":\"1\",\"messages_type\":\"1\",\"messages_text\":\"\\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627 \\u0627\\u0647\\u0644\\u0627 \\u0648\\u0633\\u0647\\u0644\\u0627\",\"messages_updated_at\":\"2020-03-23 14:51:59\",\"messages_created_at\":\"2020-03-23 14:51:59\",\"messages_id\":299,\"ar\":\"\\u062f\\u0643\\u062a\\u0648\\u0631 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0639\\u0646\\u0627\\u0646\\u064a \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062f\\u0643\\u062a\\u0648\\u0631 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0639\\u0646\\u0627\\u0646\\u064a Send a new message .\",\"created_at\":\"02:52:00 2020-03-23\"},\"type\":\"message\",\"sender\":null}', '2020-03-23 13:34:37', '2020-03-23 12:52:00', '2020-03-23 13:34:37'),
('d3619e4e-daac-45e0-93e4-e282cee438e5', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0644\\u064a\\u0628\\u0644\\u064a\\u0644\",\"messages_img\":\"6901762341595436247_download (1).png\",\"messages_updated_at\":\"2020-07-22 18:44:07\",\"messages_created_at\":\"2020-07-22 18:44:07\",\"messages_id\":319,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:44:08 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:44:08', '2020-07-22 16:44:08'),
('e3e322cc-30a6-4901-94d0-dd11941ba0b2', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0644\\u0633\\u064a\\u0644\\u0633\\u064a\\u0644\",\"messages_img\":\"218130541595432255_download (1).png\",\"messages_updated_at\":\"2020-07-22 17:37:38\",\"messages_created_at\":\"2020-07-22 17:37:38\",\"messages_id\":311,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"05:37:41 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 15:37:43', '2020-07-22 15:37:43'),
('e4b7ddf9-42ac-4471-82c6-9c11d637260f', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 5, '{\"data\":{\"consultings_id\":\"25\",\"recipient_id\":\"5\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"\\u0627\\u062e\\u0628\\u0627\\u0631 \\u062d\\u0636\\u0631\\u062a\\u0643 \\u064a\\u0627 \\u062f\\u0643\\u062a\\u0648\\u0631\",\"messages_updated_at\":\"2020-03-23 15:34:18\",\"messages_created_at\":\"2020-03-23 15:34:18\",\"messages_id\":301,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"03:34:19 2020-03-23\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-03-23 13:34:19', '2020-03-23 13:34:19'),
('efb935f3-e369-4314-96fa-5a8b93b5a38d', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":\"fstwtwet\",\"messages_updated_at\":\"2020-03-23 14:19:07\",\"messages_created_at\":\"2020-03-23 14:19:07\",\"messages_id\":297,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"02:19:08 2020-03-23\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-03-23 12:19:08', '2020-03-23 12:19:08'),
('facbde8c-1051-4956-ab0c-e5cf20717d6b', 'App\\Notifications\\Notifications', 'Modules\\Consulting\\Models\\Pharmacist', 2, '{\"data\":{\"consultings_id\":\"24\",\"recipient_id\":\"2\",\"sender_id\":\"1\",\"messages_type\":\"0\",\"messages_text\":null,\"messages_img\":\"5039052451595435625_WhatsApp Image 2020-07-06 at 12.30.45 AM.jpeg\",\"messages_updated_at\":\"2020-07-22 18:33:46\",\"messages_created_at\":\"2020-07-22 18:33:46\",\"messages_id\":315,\"ar\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0631\\u0633\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629 \",\"en\":\"\\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f Send a new message .\",\"created_at\":\"06:33:48 2020-07-22\"},\"type\":\"message\",\"sender\":null}', NULL, '2020-07-22 16:33:48', '2020-07-22 16:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) UNSIGNED NOT NULL,
  `orders_patient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_civil_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_blood_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_patient_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_companion_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_companion_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_companion_civil_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_companion_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diseases_id` int(10) UNSIGNED DEFAULT NULL,
  `diseases_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_doctor_following` int(10) UNSIGNED DEFAULT NULL,
  `orders_treatment_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countries_id` int(10) UNSIGNED DEFAULT NULL,
  `hospitals_id` int(10) UNSIGNED DEFAULT NULL,
  `doctors_id` int(10) UNSIGNED DEFAULT NULL,
  `orders_treatment_budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_prescription_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_treatments_program` text COLLATE utf8mb4_unicode_ci,
  `orders_treatment_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders_doctor_following_notes` text COLLATE utf8mb4_unicode_ci,
  `orders_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `clients_id` smallint(4) DEFAULT NULL,
  `orders_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orders_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_patient_name`, `orders_patient_phone`, `orders_patient_civil_no`, `orders_patient_passport`, `orders_patient_nationality`, `orders_patient_blood_type`, `orders_patient_address`, `orders_patient_email`, `orders_companion_name`, `orders_companion_phone`, `orders_companion_civil_no`, `orders_companion_address`, `diseases_id`, `diseases_title`, `orders_doctor_following`, `orders_treatment_cost`, `countries_id`, `hospitals_id`, `doctors_id`, `orders_treatment_budget`, `orders_prescription_img`, `orders_treatments_program`, `orders_treatment_period`, `orders_doctor_following_notes`, `orders_status`, `clients_id`, `orders_created_at`, `orders_updated_at`) VALUES
(3, 'AHMED ALI MOHAMMED', '01207908327', '369852741546', '5352352626', 'كويتي', 'O+', 'سلسيل سيلسيلسيل لسيل', 'atony.hosny@gmail.com', 'ali adel', '346346436', '46346346', 'asfhas fagfgasg fasgfjasgfsafasgfgsf', 0, 'يباياب', 1, '20,000', 2, 2, 2, '1000', '4484755221618062813_thumbnail_ba814520-2870-41d1-b2c9-3c9bddee031f.jpg', '<p>1- first step&nbsp;</p>\r\n\r\n<p>2- second step&nbsp;</p>\r\n\r\n<p>3- third step&nbsp;</p>', '3 months', 'الحالة مستقرة وتحتاج لعلاج خارج الكويت', '3', 1, '2021-04-08 21:09:59', '2021-04-24 14:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_images`
--

CREATE TABLE `order_images` (
  `order_images_id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `orders_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_images`
--

INSERT INTO `order_images` (`order_images_id`, `orders_id`, `orders_img`) VALUES
(1, 3, '9024441561617923399_thumbnail_D61A0097.jpg'),
(2, 3, '7695946551617923399_بثينه 2.jpg'),
(3, 3, '7479215761617923400_instAR.png');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `page`, `action`, `position`, `created_at`, `updated_at`) VALUES
(1, 'view infos', 'admin', 'infos', 'view', 101, '2019-06-19 00:25:51', '2019-06-19 00:25:51'),
(2, 'update infos', 'admin', 'infos', 'update', 102, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(12, 'create admins', 'admin', 'admins', 'create', 402, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(13, 'update admins', 'admin', 'admins', 'update', 403, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(14, 'delete admins', 'admin', 'admins', 'delete', 404, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(15, 'view roles', 'admin', 'roles', 'view', 501, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(16, 'create roles', 'admin', 'roles', 'create', 502, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(17, 'update roles', 'admin', 'roles', 'update', 503, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(18, 'delete roles', 'admin', 'roles', 'delete', 504, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(19, 'view metatags', 'admin', 'metatags', 'view', 601, '2019-06-19 00:25:52', '2019-06-19 00:25:52'),
(20, 'update metatags', 'admin', 'metatags', 'update', 602, '2019-06-19 00:25:53', '2019-06-19 00:25:53'),
(21, 'view settings', 'admin', 'settings', 'view', 701, '2019-06-19 00:25:53', '2019-06-19 00:25:53'),
(22, 'update settings', 'admin', 'settings', 'update', 702, '2019-06-19 00:25:53', '2019-06-19 00:25:53'),
(240, 'view contactus', 'admin', 'contactus', 'view', 601, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(241, 'create contactus', 'admin', 'contactus', 'create', 602, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(242, 'update contactus', 'admin', 'contactus', 'update', 603, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(243, 'delete contactus', 'admin', 'contactus', 'delete', 604, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(244, 'create contacts', 'admin', 'contacts', 'create', 701, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(245, 'delete contacts', 'admin', 'contacts', 'delete', 702, '2020-10-04 14:21:06', '2020-10-04 14:21:06'),
(304, 'view advertisements', 'admin', 'advertisements', 'view', 201, '2021-03-10 20:30:24', '2021-03-10 20:30:24'),
(305, 'create advertisements', 'admin', 'advertisements', 'create', 202, '2021-03-10 20:30:24', '2021-03-10 20:30:24'),
(306, 'update advertisements', 'admin', 'advertisements', 'update', 203, '2021-03-10 20:30:24', '2021-03-10 20:30:24'),
(307, 'delete advertisements', 'admin', 'advertisements', 'delete', 204, '2021-03-10 20:30:24', '2021-03-10 20:30:24'),
(308, 'view admins', 'admin', 'admins', 'view', 501, '2021-03-10 20:36:29', '2021-03-10 20:36:29'),
(309, 'view news', 'admin', 'news', 'view', 301, '2021-03-15 20:00:29', '2021-03-15 20:00:29'),
(310, 'create news', 'admin', 'news', 'create', 302, '2021-03-15 20:00:29', '2021-03-15 20:00:29'),
(311, 'update news', 'admin', 'news', 'update', 303, '2021-03-15 20:00:29', '2021-03-15 20:00:29'),
(312, 'delete news', 'admin', 'news', 'delete', 304, '2021-03-15 20:00:30', '2021-03-15 20:00:30'),
(325, 'view countries', 'admin', 'countries', 'view', 401, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(326, 'create countries', 'admin', 'countries', 'create', 402, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(327, 'update countries', 'admin', 'countries', 'update', 403, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(328, 'delete countries', 'admin', 'countries', 'delete', 404, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(329, 'view hospitals', 'admin', 'hospitals', 'view', 501, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(330, 'create hospitals', 'admin', 'hospitals', 'create', 502, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(331, 'update hospitals', 'admin', 'hospitals', 'update', 503, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(332, 'delete hospitals', 'admin', 'hospitals', 'delete', 504, '2021-03-27 13:19:44', '2021-03-27 13:19:44'),
(333, 'view specialties', 'admin', 'specialties', 'view', 601, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(334, 'create specialties', 'admin', 'specialties', 'create', 602, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(335, 'update specialties', 'admin', 'specialties', 'update', 603, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(336, 'delete specialties', 'admin', 'specialties', 'delete', 604, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(337, 'view departments', 'admin', 'departments', 'view', 701, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(338, 'create departments', 'admin', 'departments', 'create', 702, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(339, 'update departments', 'admin', 'departments', 'update', 703, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(340, 'delete departments', 'admin', 'departments', 'delete', 704, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(341, 'view doctors', 'admin', 'doctors', 'view', 801, '2021-03-27 13:19:45', '2021-03-27 13:19:45'),
(342, 'create doctors', 'admin', 'doctors', 'create', 802, '2021-03-27 13:19:46', '2021-03-27 13:19:46'),
(343, 'update doctors', 'admin', 'doctors', 'update', 803, '2021-03-27 13:19:46', '2021-03-27 13:19:46'),
(344, 'delete doctors', 'admin', 'doctors', 'delete', 804, '2021-03-27 13:19:46', '2021-03-27 13:19:46'),
(345, 'view diseases', 'admin', 'diseases', 'view', 801, '2021-04-07 15:52:58', '2021-04-07 15:52:58'),
(346, 'create diseases', 'admin', 'diseases', 'create', 802, '2021-04-07 15:52:58', '2021-04-07 15:52:58'),
(347, 'update diseases', 'admin', 'diseases', 'update', 803, '2021-04-07 15:52:58', '2021-04-07 15:52:58'),
(348, 'delete diseases', 'admin', 'diseases', 'delete', 804, '2021-04-07 15:52:58', '2021-04-07 15:52:58'),
(349, 'view orders', 'admin', 'orders', 'view', 1001, '2021-04-09 17:54:17', '2021-04-09 17:54:17'),
(350, 'create orders', 'admin', 'orders', 'create', 1002, '2021-04-09 17:54:18', '2021-04-09 17:54:18'),
(351, 'update orders', 'admin', 'orders', 'update', 1003, '2021-04-09 17:54:18', '2021-04-09 17:54:18'),
(352, 'delete orders', 'admin', 'orders', 'delete', 1004, '2021-04-09 17:54:18', '2021-04-09 17:54:18'),
(353, 'view clients', 'admin', 'clients', 'view', 1101, '2021-04-09 19:34:09', '2021-04-09 19:34:09'),
(354, 'update clients', 'admin', 'clients', 'update', 1102, '2021-04-09 19:34:27', '2021-04-09 19:34:27'),
(355, 'delete clients', 'admin', 'clients', 'delete', 1103, '2021-04-09 19:34:27', '2021-04-09 19:34:27'),
(356, 'view hospitals_treatments', 'admin', 'hospitals_treatments', 'view', 1201, '2021-04-24 15:06:36', '2021-04-24 15:06:36'),
(357, 'create hospitals_treatments', 'admin', 'hospitals_treatments', 'create', 1202, '2021-04-24 15:06:36', '2021-04-24 15:06:36'),
(358, 'update hospitals_treatments', 'admin', 'hospitals_treatments', 'update', 1203, '2021-04-24 15:06:36', '2021-04-24 15:06:36'),
(359, 'delete hospitals_treatments', 'admin', 'hospitals_treatments', 'delete', 1204, '2021-04-24 15:06:36', '2021-04-24 15:06:36'),
(360, 'view cities', 'admin', 'cities', 'view', 501, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(361, 'create cities', 'admin', 'cities', 'create', 502, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(362, 'update cities', 'admin', 'cities', 'update', 503, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(363, 'delete cities', 'admin', 'cities', 'delete', 504, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(364, 'view areas', 'admin', 'areas', 'view', 601, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(365, 'create areas', 'admin', 'areas', 'create', 602, '2021-10-01 19:17:06', '2021-10-01 19:17:06'),
(366, 'update areas', 'admin', 'areas', 'update', 603, '2021-10-01 19:17:07', '2021-10-01 19:17:07'),
(367, 'delete areas', 'admin', 'areas', 'delete', 604, '2021-10-01 19:17:07', '2021-10-01 19:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'admin', '2019-04-01 12:36:20', '2019-04-01 12:36:20'),
(2, 'Admin', 'admin', '2019-04-01 12:41:08', '2019-05-01 08:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(240, 1),
(240, 2),
(241, 1),
(241, 2),
(242, 1),
(242, 2),
(243, 1),
(243, 2),
(244, 1),
(244, 2),
(245, 1),
(245, 2),
(304, 1),
(304, 2),
(305, 1),
(305, 2),
(306, 1),
(306, 2),
(307, 1),
(307, 2),
(308, 1),
(308, 2),
(309, 1),
(309, 2),
(310, 1),
(310, 2),
(311, 1),
(311, 2),
(312, 1),
(312, 2),
(325, 1),
(325, 2),
(326, 1),
(326, 2),
(327, 1),
(327, 2),
(328, 1),
(328, 2),
(329, 1),
(329, 2),
(330, 1),
(330, 2),
(331, 1),
(331, 2),
(332, 1),
(332, 2),
(333, 1),
(333, 2),
(334, 1),
(334, 2),
(335, 1),
(335, 2),
(336, 1),
(336, 2),
(337, 1),
(337, 2),
(338, 1),
(338, 2),
(339, 1),
(339, 2),
(340, 1),
(340, 2),
(341, 1),
(341, 2),
(342, 1),
(342, 2),
(343, 1),
(343, 2),
(344, 1),
(344, 2),
(345, 1),
(345, 2),
(346, 1),
(346, 2),
(347, 1),
(347, 2),
(348, 1),
(348, 2),
(349, 1),
(349, 2),
(350, 1),
(350, 2),
(351, 1),
(351, 2),
(352, 1),
(352, 2),
(353, 1),
(353, 2),
(354, 1),
(354, 2),
(355, 1),
(355, 2),
(356, 1),
(356, 2),
(357, 1),
(357, 2),
(358, 1),
(358, 2),
(359, 1),
(359, 2),
(360, 1),
(361, 1),
(362, 1),
(363, 1),
(364, 1),
(365, 1),
(366, 1),
(367, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) UNSIGNED NOT NULL,
  `settings_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `settings_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_key`, `settings_value`) VALUES
(1, 'website_status', '1'),
(2, 'website_lang', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `slugs_id` int(11) NOT NULL,
  `slugs_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`slugs_id`, `slugs_key`) VALUES
(1, 'home'),
(2, 'about'),
(19, 'aboutUs'),
(20, 'terms'),
(21, 'policy'),
(26, 'contactus'),
(28, 'questions');

-- --------------------------------------------------------

--
-- Table structure for table `slug_translations`
--

CREATE TABLE `slug_translations` (
  `slugs_trans_id` int(11) NOT NULL,
  `slugs_id` int(10) UNSIGNED NOT NULL,
  `languages_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `slugs_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slug_translations`
--

INSERT INTO `slug_translations` (`slugs_trans_id`, `slugs_id`, `languages_code`, `slugs_title`) VALUES
(1, 1, 'en', 'home'),
(2, 1, 'ar', 'الرئيسيه'),
(3, 2, 'en', 'about'),
(4, 2, 'ar', 'عن-نماء'),
(37, 19, 'ar', 'عن-الموقع'),
(38, 19, 'en', 'aboutUs'),
(39, 20, 'en', 'terms&conditions'),
(40, 20, 'ar', 'الشروط-والأحكام'),
(41, 21, 'ar', 'سياسة-الخصوصية'),
(42, 21, 'en', 'PrivacyPolicy'),
(43, 22, 'ar', 'اتصل-بنا'),
(44, 22, 'en', 'ContactUs'),
(51, 26, 'ar', 'تواصل معنا'),
(52, 26, 'en', 'contactus');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `specialties_id` int(10) UNSIGNED NOT NULL,
  `specialties_status` enum('active','stop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `specialties_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `specialties_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`specialties_id`, `specialties_status`, `specialties_created_at`, `specialties_updated_at`) VALUES
(3, 'active', '2021-03-27 16:54:50', '2021-03-27 16:54:50'),
(4, 'active', '2021-04-10 10:52:04', '2021-04-10 10:52:04'),
(5, 'active', '2021-04-10 10:52:33', '2021-04-10 10:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `specialty_translations`
--

CREATE TABLE `specialty_translations` (
  `specialties_trans_id` int(10) UNSIGNED NOT NULL,
  `specialties_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialties_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialty_translations`
--

INSERT INTO `specialty_translations` (`specialties_trans_id`, `specialties_id`, `locale`, `specialties_title`) VALUES
(3, 3, 'ar', 'القلب'),
(4, 3, 'en', 'the heart'),
(5, 4, 'ar', 'الصدر والجهاز التنفسي'),
(6, 4, 'en', 'Chest and respiratory system'),
(7, 5, 'ar', 'الأنف والأذن والحنجرة'),
(8, 5, 'en', 'Ear, Nose and Throat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`advertisements_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`areas_id`);

--
-- Indexes for table `area_translations`
--
ALTER TABLE `area_translations`
  ADD PRIMARY KEY (`areas_trans_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cities_id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`cities_trans_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clients_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contacts_id`);

--
-- Indexes for table `contact_translations`
--
ALTER TABLE `contact_translations`
  ADD PRIMARY KEY (`contacts_trans_id`),
  ADD KEY `contact_translations_ipk1` (`contacts_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countries_id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`countries_trans_id`),
  ADD KEY `countries_translations` (`countries_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departments_id`);

--
-- Indexes for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD PRIMARY KEY (`departments_trans_id`),
  ADD KEY `countries_translations` (`departments_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`diseases_id`);

--
-- Indexes for table `disease_translations`
--
ALTER TABLE `disease_translations`
  ADD PRIMARY KEY (`diseases_trans_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctors_id`),
  ADD KEY `countries` (`hospitals_id`),
  ADD KEY `specialties_fk` (`specialties_id`),
  ADD KEY `departments_fk` (`departments_id`),
  ADD KEY `countries_fk` (`countries_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hospitals_id`),
  ADD KEY `countries` (`countries_id`);

--
-- Indexes for table `hospitals_areas`
--
ALTER TABLE `hospitals_areas`
  ADD PRIMARY KEY (`hospitals_areas_id`);

--
-- Indexes for table `hospitals_departments`
--
ALTER TABLE `hospitals_departments`
  ADD PRIMARY KEY (`hospitals_departments_id`);

--
-- Indexes for table `hospitals_specialties`
--
ALTER TABLE `hospitals_specialties`
  ADD PRIMARY KEY (`hospitals_specialties_id`);

--
-- Indexes for table `hospitals_treatments`
--
ALTER TABLE `hospitals_treatments`
  ADD PRIMARY KEY (`hospitals_treatments_id`);

--
-- Indexes for table `hospital_images`
--
ALTER TABLE `hospital_images`
  ADD PRIMARY KEY (`hospital_images_id`);

--
-- Indexes for table `hospital_translations`
--
ALTER TABLE `hospital_translations`
  ADD PRIMARY KEY (`hospitals_trans_id`),
  ADD KEY `countries_translations` (`hospitals_id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`infos_id`);

--
-- Indexes for table `info_translations`
--
ALTER TABLE `info_translations`
  ADD PRIMARY KEY (`infos_trans_id`),
  ADD KEY `articles_id` (`infos_id`),
  ADD KEY `locale` (`locale`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`languages_id`),
  ADD UNIQUE KEY `languages_languages_name_unique` (`name`),
  ADD UNIQUE KEY `languages_languages_code_unique` (`locale`);

--
-- Indexes for table `metatags`
--
ALTER TABLE `metatags`
  ADD PRIMARY KEY (`metatags_id`),
  ADD UNIQUE KEY `meta_tags_page` (`metatags_page`);

--
-- Indexes for table `metatag_translations`
--
ALTER TABLE `metatag_translations`
  ADD PRIMARY KEY (`metatags_trans_id`),
  ADD UNIQUE KEY `meta_tag_translations_meta_tags_id_languages_code_unique` (`metatags_id`,`locale`),
  ADD KEY `meta_tag_translations_languages_code_foreign` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD PRIMARY KEY (`news_trans_id`),
  ADD KEY `news_translations_fk` (`news_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`(191),`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `order_images`
--
ALTER TABLE `order_images`
  ADD PRIMARY KEY (`order_images_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`slugs_id`);

--
-- Indexes for table `slug_translations`
--
ALTER TABLE `slug_translations`
  ADD PRIMARY KEY (`slugs_trans_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialties_id`);

--
-- Indexes for table `specialty_translations`
--
ALTER TABLE `specialty_translations`
  ADD PRIMARY KEY (`specialties_trans_id`),
  ADD KEY `countries_translations` (`specialties_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `advertisements_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `areas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `area_translations`
--
ALTER TABLE `area_translations`
  MODIFY `areas_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cities_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `cities_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clients_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contacts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_translations`
--
ALTER TABLE `contact_translations`
  MODIFY `contacts_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countries_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `countries_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departments_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department_translations`
--
ALTER TABLE `department_translations`
  MODIFY `departments_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `diseases_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disease_translations`
--
ALTER TABLE `disease_translations`
  MODIFY `diseases_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctors_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hospitals_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals_areas`
--
ALTER TABLE `hospitals_areas`
  MODIFY `hospitals_areas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hospitals_departments`
--
ALTER TABLE `hospitals_departments`
  MODIFY `hospitals_departments_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospitals_specialties`
--
ALTER TABLE `hospitals_specialties`
  MODIFY `hospitals_specialties_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospitals_treatments`
--
ALTER TABLE `hospitals_treatments`
  MODIFY `hospitals_treatments_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital_images`
--
ALTER TABLE `hospital_images`
  MODIFY `hospital_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_translations`
--
ALTER TABLE `hospital_translations`
  MODIFY `hospitals_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `infos_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info_translations`
--
ALTER TABLE `info_translations`
  MODIFY `infos_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `languages_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metatags`
--
ALTER TABLE `metatags`
  MODIFY `metatags_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `metatag_translations`
--
ALTER TABLE `metatag_translations`
  MODIFY `metatags_trans_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_translations`
--
ALTER TABLE `news_translations`
  MODIFY `news_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_images`
--
ALTER TABLE `order_images`
  MODIFY `order_images_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `slugs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slug_translations`
--
ALTER TABLE `slug_translations`
  MODIFY `slugs_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialties_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialty_translations`
--
ALTER TABLE `specialty_translations`
  MODIFY `specialties_trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_translations`
--
ALTER TABLE `contact_translations`
  ADD CONSTRAINT `contact_translations_ipk1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`contacts_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD CONSTRAINT `countries_translations` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`countries_id`) ON DELETE CASCADE;

--
-- Constraints for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD CONSTRAINT `departments` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`departments_id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `countries_fk` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`countries_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `departments_fk` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`departments_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `hospitals_fk` FOREIGN KEY (`hospitals_id`) REFERENCES `hospitals` (`hospitals_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `specialties_fk` FOREIGN KEY (`specialties_id`) REFERENCES `specialties` (`specialties_id`) ON DELETE SET NULL;

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `countries` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`countries_id`) ON DELETE CASCADE;

--
-- Constraints for table `hospital_translations`
--
ALTER TABLE `hospital_translations`
  ADD CONSTRAINT `hospitals` FOREIGN KEY (`hospitals_id`) REFERENCES `hospitals` (`hospitals_id`) ON DELETE CASCADE;

--
-- Constraints for table `info_translations`
--
ALTER TABLE `info_translations`
  ADD CONSTRAINT `info_translations_ibfk_2` FOREIGN KEY (`infos_id`) REFERENCES `infos` (`infos_id`) ON DELETE CASCADE;

--
-- Constraints for table `metatag_translations`
--
ALTER TABLE `metatag_translations`
  ADD CONSTRAINT `metatag_translations_ibfk_1` FOREIGN KEY (`metatags_id`) REFERENCES `metatags` (`metatags_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_translations`
--
ALTER TABLE `news_translations`
  ADD CONSTRAINT `news_translations_fk` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE;

--
-- Constraints for table `specialty_translations`
--
ALTER TABLE `specialty_translations`
  ADD CONSTRAINT `specialties` FOREIGN KEY (`specialties_id`) REFERENCES `specialties` (`specialties_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
