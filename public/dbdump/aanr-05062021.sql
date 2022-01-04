-- phpMyAdmin SQL Dump
-- version 5.0.4deb1+bionic9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 04:26 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aanr`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_overview` text COLLATE utf8mb4_unicode_ci,
  `feature` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_filename` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agenda` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `agenda_types` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector_id` int(11) DEFAULT NULL,
  `end_year` int(11) DEFAULT NULL,
  `start_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artifactaanr`
--

CREATE TABLE `artifactaanr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_published` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcontent_id` int(11) DEFAULT NULL,
  `link` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `industry_id` bigint(20) UNSIGNED NOT NULL,
  `imglink` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `gad` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `isp_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `created_at`, `updated_at`, `name`, `description`, `isp_id`) VALUES
(1, '2021-04-29 05:32:09', '2021-04-29 05:32:09', 'Sea Urchin', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consortia`
--

CREATE TABLE `consortia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` text COLLATE utf8mb4_unicode_ci,
  `region` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `contact_name` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_details` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consortia`
--

INSERT INTO `consortia` (`id`, `created_at`, `updated_at`, `short_name`, `full_name`, `thumbnail`, `region`, `profile`, `contact_name`, `contact_details`) VALUES
(1, '2020-03-05 20:07:48', '2021-05-02 02:56:10', 'ILAARRDEC', 'Ilocos Agriculture, Aquatic and Natural Resources Research and Development Consortium', 'ilaarrdec_logo.png', 'Region 9', 'fdsafdasfdsa', 'fdasfdsa', 'fdsafdsa'),
(2, '2020-03-05 20:22:14', '2020-03-05 20:22:14', 'UPLB', 'University of the Philippines Los Baños', '200px-Unibersidad_ng_Pilipinas_Los_Banos.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consortia_members`
--

CREATE TABLE `consortia_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acronym` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci,
  `contact_name` char(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_details` text COLLATE utf8mb4_unicode_ci,
  `website` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consortia_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content_subtypes`
--

CREATE TABLE `content_subtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contributors`
--

CREATE TABLE `contributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `headlines`
--

CREATE TABLE `headlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `headlines`
--

INSERT INTO `headlines` (`id`, `created_at`, `updated_at`, `title`, `link`) VALUES
(1, '2020-03-05 17:54:32', '2020-03-05 17:54:32', 'ASEAN and India set foot in Davao City for Science, Technology, and Innovation.', 'http://www.dost.gov.ph/knowledge-resources/news/62-2019-news/1746-asean-and-india-set-foot-in-davao-city-for-science-technology-and-innovation-2019-11-28.html'),
(2, '2020-03-05 17:54:32', '2020-03-05 17:54:32', 'DOST calls for nominations for 2019 NRCP awards.', 'http://www.dost.gov.ph/knowledge-resources/news/62-2019-news/1734-dost-calls-for-nominations-for-2019-nrcp-awards-2019-10-30.html');

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`id`, `created_at`, `updated_at`, `name`, `thumbnail`) VALUES
(1, '2020-11-24 11:06:20', '2021-04-26 13:11:44', 'Agriculture', NULL),
(2, '2020-11-24 11:06:40', '2020-11-24 11:14:24', 'Aquatic Resources', NULL),
(3, '2020-11-24 11:06:46', '2020-11-24 11:14:16', 'Environmental and Natural Resources', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `isp`
--

CREATE TABLE `isp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `sector_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `isp`
--

INSERT INTO `isp` (`id`, `created_at`, `updated_at`, `name`, `description`, `sector_id`) VALUES
(1, '2021-04-28 06:26:26', '2021-04-28 06:26:26', 'Sea Cucumber', 'sea cucumber description', 3);

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_elements`
--

CREATE TABLE `landing_page_elements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `top_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consortia_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_container_toggle` text COLLATE utf8mb4_unicode_ci,
  `header_logo` text COLLATE utf8mb4_unicode_ci,
  `landing_page_item_carousel` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_social_media_button` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_technology_counter` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_technology_grid_view` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_technology_table_view` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_explore_aanr` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_need_help` int(11) NOT NULL DEFAULT '1',
  `landing_page_item_elib_publication` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_elements`
--

INSERT INTO `landing_page_elements` (`id`, `created_at`, `updated_at`, `top_banner`, `consortia_banner`, `slider_container_toggle`, `header_logo`, `landing_page_item_carousel`, `landing_page_item_social_media_button`, `landing_page_item_technology_counter`, `landing_page_item_technology_grid_view`, `landing_page_item_technology_table_view`, `landing_page_item_explore_aanr`, `landing_page_item_need_help`, `landing_page_item_elib_publication`) VALUES
(1, '2020-03-05 07:30:47', '2020-12-01 16:08:40', '5fc6db0802ee9KM4AANR Banner C.png', '5f8e480347a40pcaarrd-logo-invert.png', '1', '5fc4ab96c74e4pcaarrd-logo-invert.png', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sliders`
--

CREATE TABLE `landing_page_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `caption_align` text COLLATE utf8mb4_unicode_ci,
  `button_text` text COLLATE utf8mb4_unicode_ci,
  `button_color` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_sliders`
--

INSERT INTO `landing_page_sliders` (`id`, `created_at`, `updated_at`, `title`, `link`, `description`, `image`, `caption_align`, `button_text`, `button_color`) VALUES
(4, '2020-12-16 17:51:46', '2021-01-15 18:27:17', 'Palawakin ang pagkalap ng impormasyon gamit ang KM4AANR.PH', 'http://aanr.ph/en/about-project/', 'Tignan ang tampok na nilalaman sa Agrikultura, Yamang Tubig at Likas na Yaman', 'KM4AANR Banner A.gif', 'right', 'Alamin ang higit pa dito', NULL),
(5, '2020-12-20 11:35:54', '2021-04-19 16:57:51', 'Celebrating food, culture, and the Filipino with the Filipino Food Month', 'https://mb.com.ph/2021/03/26/celebrating-food-culture-and-the-filipino-with-the-filipino-food-month/', 'Food has always been an important part of Philippine culture. Not only does it help define a particular culture and heritage from a certain point in the country, but it also connects people and bridges their differences.', 'km4aanr_header_1.jpg', 'left', 'Learn More', NULL),
(6, '2020-12-20 11:37:34', '2021-04-19 16:59:59', 'DA urges LGUs to strengthen ASF surveillance', 'https://pia.gov.ph/news/articles/1069161', 'The Department of Agriculture (DA) Region 2 has encouraged Local Government Units (LGUs) to pass their respective ordinances to strengthen responses, monitoring, and surveillance of African Swine Fever (ASF) cases in their respective localities.', 'km4aanr_header_3.jpg', 'right', 'Learn More', NULL);

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2020_03_05_065542_create_landing_page_elements_table', 1),
(8, '2020_03_05_170258_add_consortia_banner_to_landing_page_elements', 2),
(9, '2020_03_05_174653_create_headlines_table', 3),
(15, '2020_03_05_181447_create_landing_page_sliders_table', 4),
(16, '2020_03_06_035128_create_consortia_table', 4),
(19, '2020_03_09_104506_add_text_align_and_button_text_columns_to_landing_page_sliders', 5),
(20, '2020_03_09_105109_add_slider_container_toggle_column_to_landing_page_elements', 5),
(21, '2020_03_10_013829_add_header_logo_to_landing_page_elements', 6),
(22, '2020_11_24_062356_add_landing_page_views_to_landing_page_elements_table', 7),
(23, '2020_11_24_154205_create_industries_table', 8),
(24, '2020_11_24_161906_create_articles_table', 9),
(86, '2021_04_15_133558_create_advertisements_table', 10),
(87, '2021_04_15_142045_create_agendas_table', 10),
(88, '2021_04_15_145312_create_announcements_table', 10),
(89, '2021_04_15_150550_create_artifactaanr_table', 10),
(90, '2021_04_15_151733_create_sectors_table', 10),
(91, '2021_04_15_153418_create_isp_table', 10),
(92, '2021_04_15_154823_create_commodities_table', 10),
(93, '2021_04_15_155038_update_consortia_table', 10),
(94, '2021_04_15_161715_create_consortia_members_table', 10),
(95, '2021_04_15_162133_create_content_table', 10),
(96, '2021_04_15_162214_create_content_subtypes_table', 10),
(97, '2021_04_15_163241_create_contributors_table', 10),
(98, '2021_04_15_163400_create_subscribers_table', 10);

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
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `industry_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `created_at`, `updated_at`, `name`, `description`, `industry_id`) VALUES
(1, '2021-04-26 13:19:15', '2021-04-26 13:19:15', 'Crops', NULL, 1),
(2, '2021-04-26 13:22:55', '2021-04-26 13:22:55', 'Livestock', NULL, 1),
(3, '2021-04-26 13:23:12', '2021-04-26 13:23:12', 'Inland Fisheries', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arvin John Garcia', 'ajbgarcia1@gmail.com', NULL, '$2y$10$f/YGLhmuj6EtI/PpjVV3.eH5NOht0LbRcSf5.O5inoNKvsQiBsw7.', NULL, '2020-03-05 07:15:30', '2020-03-05 07:15:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `artifactaanr`
--
ALTER TABLE `artifactaanr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artifactaanr_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commodities_isp_id_foreign` (`isp_id`);

--
-- Indexes for table `consortia`
--
ALTER TABLE `consortia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consortia_members`
--
ALTER TABLE `consortia_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consortia_members_consortia_id_foreign` (`consortia_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_subtypes`
--
ALTER TABLE `content_subtypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_subtypes_content_id_foreign` (`content_id`);

--
-- Indexes for table `contributors`
--
ALTER TABLE `contributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headlines`
--
ALTER TABLE `headlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isp`
--
ALTER TABLE `isp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isp_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `landing_page_elements`
--
ALTER TABLE `landing_page_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_sliders`
--
ALTER TABLE `landing_page_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sectors_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artifactaanr`
--
ALTER TABLE `artifactaanr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consortia`
--
ALTER TABLE `consortia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consortia_members`
--
ALTER TABLE `consortia_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_subtypes`
--
ALTER TABLE `content_subtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contributors`
--
ALTER TABLE `contributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `headlines`
--
ALTER TABLE `headlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `isp`
--
ALTER TABLE `isp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_page_elements`
--
ALTER TABLE `landing_page_elements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_page_sliders`
--
ALTER TABLE `landing_page_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `artifactaanr`
--
ALTER TABLE `artifactaanr`
  ADD CONSTRAINT `artifactaanr_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `commodities`
--
ALTER TABLE `commodities`
  ADD CONSTRAINT `commodities_isp_id_foreign` FOREIGN KEY (`isp_id`) REFERENCES `isp` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consortia_members`
--
ALTER TABLE `consortia_members`
  ADD CONSTRAINT `consortia_members_consortia_id_foreign` FOREIGN KEY (`consortia_id`) REFERENCES `consortia` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_subtypes`
--
ALTER TABLE `content_subtypes`
  ADD CONSTRAINT `content_subtypes_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `isp`
--
ALTER TABLE `isp`
  ADD CONSTRAINT `isp_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sectors`
--
ALTER TABLE `sectors`
  ADD CONSTRAINT `sectors_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
