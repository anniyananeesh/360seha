-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Oct 18, 2016 at 06:59 AM
-- Server version: 5.5.42
-- PHP Version: 5.4.42

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `seha_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `seha_about_page_settings`
--

CREATE TABLE `seha_about_page_settings` (
  `subscriber` int(11) NOT NULL,
  `about_img` varchar(255) DEFAULT NULL,
  `show_location` tinyint(1) NOT NULL DEFAULT '0',
  `show_address` tinyint(1) NOT NULL DEFAULT '0',
  `show_contact` tinyint(1) NOT NULL DEFAULT '0',
  `show_timings` tinyint(1) NOT NULL DEFAULT '0',
  `show_domain` tinyint(1) NOT NULL DEFAULT '0',
  `long_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_about_page_settings`
--

INSERT INTO `seha_about_page_settings` (`subscriber`, `about_img`, `show_location`, `show_address`, `show_contact`, `show_timings`, `show_domain`, `long_description`) VALUES
(1, '8deaa9136aa0b64cc74bc92930c75859.jpg', 1, 0, 1, 1, 1, '“Continental Hospitals has engaged the best physicians from the community, nationally & internationally with a ‘quality first’ concept, has engaged the best nurses with a ‘patient care first’ concept, has engaged the best employees with a ‘patient dignity’, safety first’ concept and always practice evidence based medicine with the highest integrity and ethics”, says Dr Guru N Reddy.\r\n\r\nFocused on patient centric care, Continental Hospitals has brought together a team of expert medical professionals to provide the highest standards of healthcare delivery by embracing world-class best practices and by engaging in continuous learning and research. Continental Hospitals’ physicians and staff have already started delivering the latest in medical treatment and evidence-based medicine.\r\n\r\nContinental Hospitals is India’s first LEED qualified super specialty hospital. The Healthcare Institution, a 700-bed super specialty tertiary care, is built to international standards and designed to enhance the healing spaces with natural ventilation, safety and privacy. Continental Hospitals in its 18 floor structure has incorporated safest standards in the world including fire, water resources, sanitation and internal transportation systems.\r\n\r\nBy emulating patient centric medicine, understanding the impact of sound patient-physician relationships, and knowing the successes of collaborative practice of medicine, Dr Guru N Reddy brings compassionate care to Continental Hospitals in Hyderabad.\r\n\r\nWith 30+ specialties, Continental Hospitals offers a New Experience in Healthcare. By providing world-class technologies, 21 modular Operation Theaters, renowned doctors, compassionate nurses, advanced ICUs (90 beds) and Emergency Center, the healthcare institute is here to redefine healthcare scenario in India. Continental Hospitals’ commitment to offer accurate diagnosis, evidence-based medicine and superior patient-centric care remains at the center of everything we deliver.\r\n\r\nContinental Hospitals has engineered a specially designed building that aims to maintain uni-directional flow of man and material to avoid cross infections. The first-of-its-kind design provides different entrances for different patient needs and specified towers (Diagnostic & Treatment, Out Patient and Nursing Towers) to answer patients’ health requirements effortlessly'),
(3, NULL, 1, 1, 1, 1, 1, ''),
(2, NULL, 1, 1, 1, 1, 1, 'A spa is a location where mineral-rich spring water (and sometimes sea water) is used to give medicinal baths. Spa towns or spa resorts (including hot springs resorts) typically offer various health treatments, which are also known as balneotherapy. The belief in the curative powers of mineral waters goes back to prehistoric times. Such practices have been popular worldwide, but are especially widespread in Europe and Japan. Day spas are also quite popular, and offer various personal care treatments.');

-- --------------------------------------------------------

--
-- Table structure for table `seha_advertisements`
--

CREATE TABLE `seha_advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ad_area` tinyint(1) NOT NULL,
  `is_adsense` tinyint(1) NOT NULL,
  `adsense_script` text,
  `url` varchar(355) DEFAULT NULL,
  `views` int(11) NOT NULL,
  `show_status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_advertisements`
--

INSERT INTO `seha_advertisements` (`id`, `title`, `title_ar`, `image`, `ad_area`, `is_adsense`, `adsense_script`, `url`, `views`, `show_status`, `created_on`, `updated_on`) VALUES
(3, 'Nike Ads 300 - 250', 'Nike Ads 300 - 250', 'db195d15dcb2c31b5237e860b6f80a4c.png', 3, 0, NULL, 'https://support.google.com/', 10, 1, '2014-12-18 01:55:24', '2016-05-31 00:03:55'),
(5, '360Seha Advert', NULL, 'f85a4a3624ffb5774d23f22cb547da8d.jpg', 1, 0, NULL, 'http://360Seha.com/en', 49, 0, '2015-05-09 13:26:41', '2015-11-11 10:13:07'),
(6, '360Seha Ad Banner', NULL, '0f803391f5299c9f8843880b0130bb7a.jpg', 1, 0, NULL, 'http://360seha.com/get_listed', 128, 0, '2015-06-06 15:48:00', '2015-11-11 10:10:16'),
(7, '360Seha Ad Banner', NULL, 'cc2cea6b6be1318ec3609eb53c916f67.jpg', 1, 0, NULL, 'http://360seha.com/get_listed', 115, 1, '2015-06-06 15:48:35', '2015-11-11 10:10:12'),
(8, 'International Education Show', 'International Education Show', '3b8105ba573bd545c27d4c1f8b451ea5.gif', 1, 0, NULL, 'http://educationshow.ae/', 206, 0, '2015-11-11 10:13:02', '2016-06-01 02:51:51'),
(9, 'mobile map ad1', 'mobile map ad1', '0f61484f3d52d8810b97a7511703830a.png', 4, 0, NULL, 'http://360seha.com', 0, 1, '2016-03-22 15:31:20', '2016-03-22 15:31:20'),
(10, 'mobile ads 2', 'mobile ads 2', '2d4d3669562df1ad1656d26776df3907.png', 4, 0, NULL, 'http://www.google.co.in', 0, 1, '2016-03-22 15:32:58', '2016-03-22 15:32:58'),
(11, 'Sammple side banner', 'Sammple side banner', '10e8bedf8bb98131f3f2b8ecaf6c19bc.jpg', 2, 0, NULL, 'http://www.google.co.in', 0, 1, '2016-05-31 00:04:46', '2016-05-31 00:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `seha_appointments`
--

CREATE TABLE `seha_appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `voucher_code` varchar(255) DEFAULT NULL,
  `dept_fk` int(11) DEFAULT NULL,
  `appointment_day` varchar(255) NOT NULL,
  `appointment_time` varchar(255) NOT NULL,
  `status` enum('Pending','Rejected','Confirmed') NOT NULL DEFAULT 'Pending',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_appointments`
--

INSERT INTO `seha_appointments` (`id`, `user_id`, `subscriber`, `voucher_code`, `dept_fk`, `appointment_day`, `appointment_time`, `status`, `created_on`, `updated_on`) VALUES
(1, 16, 29, 'No voucher code', 2, '2016/07/20', '07:46 PM', 'Pending', '2016-07-20 10:46:28', '2016-07-20 10:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `seha_banners`
--

CREATE TABLE `seha_banners` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_banners`
--

INSERT INTO `seha_banners` (`id`, `image_url`, `url`, `is_active`, `created_on`, `updated_on`) VALUES
(4, 'a9579119808526965210a2011d094709.png', NULL, 'Y', '2016-05-30 21:52:38', '2016-05-30 21:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `seha_categories`
--

CREATE TABLE `seha_categories` (
  `id_category` int(10) unsigned NOT NULL,
  `name` varchar(145) NOT NULL,
  `name_ar` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` tinyint(1) DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '0',
  `orderby` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_category_parent` int(10) unsigned DEFAULT '0',
  `seoname` varchar(145) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=529 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_categories`
--

INSERT INTO `seha_categories` (`id_category`, `name`, `name_ar`, `type`, `show_status`, `orderby`, `created`, `id_category_parent`, `seoname`) VALUES
(37, 'Medical Center', 'مركز طبي', NULL, 1, 2, '2016-10-08 12:05:54', NULL, 'medical center'),
(38, 'Hospital', 'مستشفى', NULL, 1, 3, '2016-10-08 12:06:38', NULL, 'hospital'),
(39, 'Pharmacy', 'صيدلية', NULL, 1, 4, '2016-10-08 12:06:50', NULL, 'pharmacy'),
(40, 'Labs', 'مختبر', NULL, 1, 6, '2016-10-08 12:07:27', NULL, 'labs'),
(527, 'Fitness', 'نادي لياقة', NULL, 1, 5, '2016-10-08 12:07:13', NULL, 'fitness'),
(528, 'Clinic', 'عيادة', NULL, 1, 1, '2016-10-08 12:06:25', NULL, 'clinic');

-- --------------------------------------------------------

--
-- Table structure for table `seha_cities`
--

CREATE TABLE `seha_cities` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_fk` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `orderby` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_cities`
--

INSERT INTO `seha_cities` (`id`, `name`, `name_ar`, `country_fk`, `code`, `orderby`, `created_on`, `updated_on`) VALUES
(3, 'Sharjah', 'الشارقة', 1, 'SHJ', 6, '2015-02-22 11:12:45', '2015-05-31 17:10:01'),
(4, 'Dubai', 'دبي', 1, 'DXB', 4, '2015-02-22 11:56:28', '2015-05-31 17:09:39'),
(5, 'Abu Dhabi', 'أبوظبي', 1, '0', 1, '2015-04-27 09:13:22', '2016-05-02 12:18:16'),
(6, 'Ajman', 'عجمان', 1, '0', 2, '2015-04-27 09:13:38', '2016-05-02 12:18:21'),
(7, 'Al Ain', 'العين', 1, '0', 3, '2015-04-27 09:13:52', '2016-05-02 12:18:27'),
(8, 'Fujairah', 'الفجيرة', 1, '0', 5, '2015-04-27 09:14:14', '2016-05-02 12:18:32'),
(9, 'Ras Al Khaimah', 'رأس الخيمة', 1, 'RAK', 7, '2015-04-27 09:14:34', '2015-05-31 17:10:13'),
(10, 'Umm al Quwain', 'أم القيوين', 1, '0', 8, '2015-04-27 09:15:05', '2016-05-02 11:56:04'),
(12, 'Doha', 'Doha', 6, '0', 9, '2016-05-02 12:18:52', '2016-05-02 12:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `seha_config`
--

CREATE TABLE `seha_config` (
  `group_name` varchar(128) NOT NULL,
  `config_key` varchar(128) NOT NULL,
  `config_value` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_config`
--

INSERT INTO `seha_config` (`group_name`, `config_key`, `config_value`) VALUES
('general', 'maintenance', '0'),
('general', 'site_name', 'Your Health Directory'),
('general', 'site_description', 'You online classified partner'),
('general', 'admin_email', 'info@360seha.com'),
('general', 'date_format', 'mm/dd/yy'),
('general', 'latest', '0'),
('general', 'search_per_page', '3'),
('general', 'allow_contact_attachments', '0'),
('general', 'maintain_text', '0'),
('mail', 'server_type', 'Localhost'),
('mail', 'host_name', 'Localhostdddfs'),
('mail', 'from_name', '360Seha Admin'),
('mail', 'from_mail', 'no-reply@360seha.com'),
('mail', 'server_port', '145'),
('mail', 'username', 'omarskaf@gmail.com'),
('mail', 'password', 'Om#93770952104'),
('mail', 'encrypt', '0'),
('mail', 'smtp', '0'),
('mail', 'pop3', '0'),
('image', 'allowed_types', 'jpg,jpeg,png,gif'),
('image', 'max_size', '600'),
('image', 'max_height', '640'),
('image', 'max_width', '640'),
('image', 'thumb_height', '263'),
('image', 'thumb_width', '263'),
('image', 'quality', '100'),
('image', 'wm_enable', '0'),
('image', 'wm_path', 'http://360seha.com/watermark.png'),
('image', 'wm_pos', 'CENTER'),
('social', 'config', 'a:2:{s:10:"debug_mode";i:1;s:9:"providers";a:9:{s:7:"open_id";i:0;s:5:"yahoo";a:3:{s:7:"enabled";i:1;s:2:"id";b:0;s:6:"secret";b:0;}s:6:"google";a:3:{s:7:"enabled";i:0;s:2:"id";s:7:"Some id";s:6:"secret";s:15:"Some secret key";}s:7:"twitter";a:3:{s:7:"enabled";i:0;s:3:"key";s:7:"Some id";s:6:"secret";s:15:"Some secret key";}s:8:"facebook";a:3:{s:7:"enabled";i:0;s:2:"id";s:7:"Some id";s:6:"secret";b:0;}s:4:"live";a:3:{s:7:"enabled";i:0;s:2:"id";s:7:"Some id";s:6:"secret";s:0:"";}s:8:"my_space";a:3:{s:7:"enabled";i:0;s:3:"key";s:15:"Some secret key";s:6:"secret";s:15:"Some secret key";}s:11:"four_square";a:3:{s:7:"enabled";i:0;s:2:"id";s:7:"Some id";s:6:"secret";s:15:"Some secret key";}s:3:"aol";i:0;}}'),
('advert', 'ad_per_page', '20'),
('advert', 'ad_per_rss', '2'),
('advert', 'sort_listing', '2'),
('advert', 'home_page', '1'),
('advert', 'post_login', '0'),
('advert', 'expire_days', '10'),
('advert', 'captcha', '0'),
('advert', 'banned_words', 'Sd,SDD'),
('advert', 'banned_replace_words', 'xxxx'),
('advert', 'review', '0'),
('comment', 'allow_users', '1'),
('comment', 'reg_user_allow', '0'),
('comment', 'approve', '1'),
('comment', 'per_page', '10'),
('comment', 'notify_new_comment', '1'),
('comment', 'notify_user', '1'),
('comment', 'min_approve', '10'),
('newsletter', 'from_nl_mail', 'news-desk@360seha.com'),
('newsletter', 'from_nl_name', 'News Desk'),
('newsletter', 'nl_server', 'Localhost'),
('newsletter', 'mailchimp_id', '0'),
('newsletter', 'spam_words', 's,s,s'),
('newsletter', 'auto_enable', '1'),
('newsletter', 'upload_enable', '1'),
('general', 'grace_period', '90'),
('general', 'offer_label', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `seha_contacts`
--

CREATE TABLE `seha_contacts` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `er_description` text,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_contacts`
--

INSERT INTO `seha_contacts` (`id`, `list_id`, `first_name`, `last_name`, `email`, `status`, `er_description`, `created_on`, `updated_on`) VALUES
(2, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2014-11-18 16:48:55', '2014-11-18 16:48:55'),
(17, 3, 'Anoop', 'Ponnappan', 'anoop.valiyaveettil@gmail.com', 1, NULL, '2014-11-18 17:26:09', '2014-11-18 17:26:09'),
(20, 3, 'Omar', 'Skaf', 'omarskaf@gmail.com', 1, NULL, '2014-11-19 06:14:14', '2014-11-19 06:14:14'),
(21, 3, 'Aneesh', 'Ponnappan', 'aneesh.anni', 1, 'Invalid Email', '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(22, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(23, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(24, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(25, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(26, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(27, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(28, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(29, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(30, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(31, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(32, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(33, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(34, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(35, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:50', '2015-05-17 11:00:50'),
(36, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:00:51', '2015-05-17 11:00:51'),
(38, 3, 'Aneesh', 'Ponnappan', 'aneesh.anni', 1, 'Invalid Email', '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(39, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(40, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(41, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(42, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(43, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(44, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(45, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(46, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(47, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(48, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(49, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(50, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(51, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(52, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(53, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:23:58', '2015-05-17 11:23:58'),
(54, 3, 'Aneesh', 'Ponnappan', 'aneesh.anni', 1, 'Invalid Email', '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(55, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(56, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(57, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(58, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(59, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(60, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(61, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(62, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(63, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(64, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(65, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(66, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(67, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(68, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(69, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:39', '2015-05-17 11:24:39'),
(70, 3, 'Aneesh', 'Ponnappan', 'aneesh.anni', 1, 'Invalid Email', '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(71, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(72, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(73, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(74, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(75, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(76, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(77, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(78, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(79, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(80, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(81, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(82, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(83, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(84, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57'),
(85, 3, 'Aneesh', 'Ponnappan', 'aneesh.anniyan@gmail.com', 1, NULL, '2015-05-17 11:24:57', '2015-05-17 11:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `seha_contact_list`
--

CREATE TABLE `seha_contact_list` (
  `id` int(11) NOT NULL,
  `list_title` varchar(200) NOT NULL,
  `contacts_count` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_contact_list`
--

INSERT INTO `seha_contact_list` (`id`, `list_title`, `contacts_count`, `status`, `created_on`, `updated_on`) VALUES
(3, 'Main', 67, 1, '2014-11-18 13:30:46', '2014-11-18 13:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `seha_countries`
--

CREATE TABLE `seha_countries` (
  `id` int(11) NOT NULL,
  `name_en` varchar(250) CHARACTER SET utf8 NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `domain_url` varchar(300) DEFAULT NULL,
  `orderby` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_countries`
--

INSERT INTO `seha_countries` (`id`, `name_en`, `name_ar`, `image_url`, `domain_url`, `orderby`, `created_on`, `updated_on`) VALUES
(1, 'United Arab Emiratess', 'الامارات العربية المتحدة', 'b4c36e27197fc4717d3c084b329fa156.png', 'emirates.360seha.com', 1, '2016-01-31 00:00:00', '2016-07-03 12:07:21'),
(5, 'Saudi Arabia', 'الممكلة العربة السعودية', 'de7fa9708a7f7a179f247726611e510a.png', 'saudi-arabia.360seha.com', 2, '2016-03-19 12:45:56', '2016-07-03 12:07:37'),
(6, 'Qatar', 'قطر', '78bf68f1e7e321499c815e8cd877632b.png', 'qatar.360seha.com', 3, '2016-03-20 16:22:43', '2016-07-07 13:55:07'),
(7, 'Bahrain', 'البحرين', '6a53d1467db9886e5dc6efda80489d23.png', 'bahrain.360seha.com', 4, '2016-03-20 16:22:53', '2016-07-07 13:55:28'),
(8, 'Kuwait', 'الكويت', 'ffef868fd6d80408e6955a23e9479169.jpg', 'Kuwait.360seha.com', 5, '2016-07-07 14:07:19', '2016-08-23 12:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `seha_currencies`
--

CREATE TABLE `seha_currencies` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(100) NOT NULL,
  `c_symbol` varchar(10) NOT NULL,
  `c_code` varchar(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_currencies`
--

INSERT INTO `seha_currencies` (`c_id`, `c_title`, `c_symbol`, `c_code`, `status`, `created_on`, `updated_on`) VALUES
(1, 'US Dollars', '$', 'USD', 0, '2014-11-15 00:00:00', '2014-11-15 00:00:00'),
(2, 'UAE Dirhams', 'AED', 'AED', 1, '2014-11-24 04:10:10', '2014-11-24 04:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `seha_devices`
--

CREATE TABLE `seha_devices` (
  `id` int(11) NOT NULL,
  `gcm_regid` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_devices`
--

INSERT INTO `seha_devices` (`id`, `gcm_regid`, `created_at`) VALUES
(6, 'APA91bGeI3Zdqza5TlHW7plObhhpxo5ZAGGNFzGtbNQMSpFRKi9mczrC5l3m5nTL0QsQlm9A1cGiM9fbE0_JsG0s59OzbeFD1qKkOYvwl8fLeXH_V19qAQX47tXaLyiTM3lkeAmT8UJOGuS2sXDyU7rcpIZoF6SSag', '2015-03-31 00:01:01'),
(7, 'undefined', '2015-06-02 19:08:51'),
(8, 'undefined', '2015-06-05 05:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `seha_doctors`
--

CREATE TABLE `seha_doctors` (
  `id` int(10) unsigned NOT NULL,
  `name_en` varchar(145) NOT NULL,
  `name_ar` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `specialization_en` varchar(255) NOT NULL,
  `specialization_ar` varchar(255) NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `orderby` int(11) NOT NULL DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seha_enquiries`
--

CREATE TABLE `seha_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `is_view` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_enquiries`
--

INSERT INTO `seha_enquiries` (`id`, `name`, `email`, `contact_no`, `city`, `subject`, `message`, `is_view`, `created_on`, `updated_on`) VALUES
(1, 'A', 'aneesh.anniyan@gmail.com', '05121700', 'Sharjah', 'Feedback', 'Some message', 0, '2015-04-05 12:03:26', '2015-04-05 12:03:26'),
(2, 'Aneesh', 'aneesh.dgweb@gmail.com', '051273470', 'Sharjah', 'General Inquiry', 'Some message', 0, '2015-04-12 05:04:16', '2015-04-12 05:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `seha_health_tips`
--

CREATE TABLE `seha_health_tips` (
  `tips_id` int(11) NOT NULL,
  `tips_title` varchar(255) DEFAULT NULL,
  `tips_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_description` text,
  `tips_description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) DEFAULT NULL,
  `subscriber_type` tinyint(1) NOT NULL COMMENT '1 => Doctor, 2 => Medical Center, 3 => Company',
  `image_url` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_health_tips`
--

INSERT INTO `seha_health_tips` (`tips_id`, `tips_title`, `tips_title_ar`, `tips_description`, `tips_description_ar`, `show_status`, `subscriber`, `subscriber_type`, `image_url`, `thumb_url`, `send`, `created_on`, `updated_on`) VALUES
(1, '12 Ways to lose weight . Just change your diet', '12 Ways to lose weight', '<p>You''re 10, 20, 30 or more pounds overweight and you''ve dieted, on and off, for years. You''ve lost weight and then put it back on and more.</p>\n<p>Why? Diets don''t work. Today we know diets don''t work. Even Weight Watchers says so. Restricting calories again and again alters your metabolism. That''s why so many people put back the weight they lost while dieting, plus more.</p>\n<p>Yet, desperate to lose weight, Americans keep going on diets. While there''s no magic bullet for weight loss, there are steps you can take to lose weight, safely and for good, while increasing your health.</p>\n<p>The common sense advice to "eat less, move more," isn''t entirely correct. It matters<em>what</em>&nbsp;you eat.</p>\n<p>And here''s a dirty little secret: Consuming refined carbohydrates -- simple sugars and starches -- is one of the biggest reasons Americans are now battling obesity. Carbohydrates you don''t burn get stored in your body as fat.</p>', '<p>You''re 10, 20, 30 or more pounds overweight and you''ve dieted, on and off, for years. You''ve lost weight and then put it back on and more.</p>\n<p>Why? Diets don''t work. Today we know diets don''t work. Even Weight Watchers says so. Restricting calories again and again alters your metabolism. That''s why so many people put back the weight they lost while dieting, plus more.</p>\n<p>Yet, desperate to lose weight, Americans keep going on diets. While there''s no magic bullet for weight loss, there are steps you can take to lose weight, safely and for good, while increasing your health.</p>\n<p>The common sense advice to "eat less, move more," isn''t entirely correct. It matters<em>what</em>&nbsp;you eat.</p>\n<p>And here''s a dirty little secret: Consuming refined carbohydrates -- simple sugars and starches -- is one of the biggest reasons Americans are now battling obesity. Carbohydrates you don''t burn get stored in your body as fat.</p>', 1, 60, 0, '5afded3036707e50c98b4842f6a7eda8.jpg', '5afded3036707e50c98b4842f6a7eda8_thumb.jpg', 0, '2015-11-14 16:20:03', '2015-11-14 16:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `seha_insurance`
--

CREATE TABLE `seha_insurance` (
  `ins_id` int(11) NOT NULL,
  `ins_title` varchar(255) NOT NULL,
  `ins_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `image_url` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `site_link` varchar(255) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_insurance`
--

INSERT INTO `seha_insurance` (`ins_id`, `ins_title`, `ins_title_ar`, `show_status`, `image_url`, `thumb_url`, `site_link`, `created_on`, `updated_on`) VALUES
(5, 'Daman', 'ضمان', 1, NULL, NULL, '0', '2016-07-12 12:22:14', '2016-07-12 12:22:14'),
(6, 'Thiqa', 'ثقة', 1, NULL, NULL, '0', '2016-07-12 12:23:13', '2016-07-12 12:23:13'),
(7, 'Al Buhaira National Insurance', 'البحيرة الوطنية للتأمين', 1, NULL, NULL, '0', '2016-07-12 12:23:38', '2016-07-28 17:29:39'),
(8, 'Nas', 'ناس', 1, NULL, NULL, '0', '2016-07-12 12:23:56', '2016-07-12 12:23:56'),
(9, 'DubaiCare', 'دبي كير', 1, NULL, NULL, '0', '2016-07-12 12:24:16', '2016-07-12 12:24:16'),
(10, 'HealthNet', 'هيلث نت', 1, NULL, NULL, '0', '2016-07-12 12:25:07', '2016-07-12 12:25:07'),
(11, 'Uni care', 'يوني كير', 1, NULL, NULL, '0', '2016-07-12 12:25:35', '2016-07-12 12:25:35'),
(12, 'MedNet', 'ميد نت', 1, NULL, NULL, '0', '2016-07-12 12:25:54', '2016-07-12 12:25:54'),
(13, 'Neuron', 'نيرون', 1, NULL, NULL, '0', '2016-07-12 12:26:32', '2016-07-12 12:26:32'),
(14, 'Penta care', 'بنتا كير', 1, NULL, NULL, '0', '2016-07-12 12:26:53', '2016-07-12 12:26:53'),
(15, 'Alico', 'اليكو', 1, NULL, NULL, '0', '2016-07-12 12:33:57', '2016-07-12 12:33:57'),
(16, 'Aetna “ Good health', 'جود هيلث', 1, NULL, NULL, '0', '2016-07-12 12:34:23', '2016-07-12 12:34:23'),
(17, 'Inayah', 'عناية', 1, NULL, NULL, '0', '2016-07-12 12:34:40', '2016-07-12 12:34:40'),
(18, 'Almadallah', 'المظلة', 1, NULL, NULL, '0', '2016-07-12 12:35:00', '2016-07-12 12:35:00'),
(19, 'Medserv', 'ميد سيرف', 1, NULL, NULL, '0', '2016-07-12 12:36:45', '2016-07-12 12:36:45'),
(21, 'Allianz', 'اللاينس', 1, NULL, NULL, '0', '2016-07-12 12:39:18', '2016-07-12 12:39:18'),
(22, 'Next care', 'نكست كير', 1, NULL, NULL, '0', '2016-07-12 12:39:38', '2016-07-12 12:39:38'),
(23, 'ADNIC', 'أبوظبي الوطنية', 1, NULL, NULL, '0', '2016-07-12 12:40:07', '2016-07-12 13:02:11'),
(24, 'Globe med', 'جلوب ميد', 1, NULL, NULL, '0', '2016-07-12 12:40:26', '2016-07-12 12:40:26'),
(25, 'Amity', 'اميتي', 1, NULL, NULL, '0', '2016-07-12 12:40:57', '2016-07-12 12:40:57'),
(26, 'Aafiya', 'عافية', 1, NULL, NULL, '0', '2016-07-12 12:43:10', '2016-07-12 12:43:10'),
(27, 'National General Insurance', 'الشركة الوطنية للتأمينات العامة', 1, NULL, NULL, '0', '2016-07-12 12:50:49', '2016-07-12 12:50:49'),
(28, 'Al Ain Ahlia', 'العين الاهلية', 1, NULL, NULL, '0', '2016-07-12 12:51:55', '2016-07-12 12:51:55'),
(29, 'Al Sagr National', 'الصقر الوطنية', 1, NULL, NULL, '0', '2016-07-12 12:59:12', '2016-07-12 12:59:27'),
(30, 'Abu Dhabi National Takaful', 'أبوظبي الوطنية للتكافل', 1, NULL, NULL, '0', '2016-07-12 13:00:45', '2016-07-12 13:00:45'),
(31, 'Methaq Takaful', 'ميثـاق للتأميـن التكـافلي', 1, NULL, NULL, '0', '2016-07-12 13:04:06', '2016-07-12 13:04:06'),
(32, 'AXA Green Crescent', 'أكسا الهلال الأخضر', 1, NULL, NULL, '0', '2016-07-12 13:06:07', '2016-07-12 13:06:07'),
(33, 'Arab Orient', 'المشرق العربي', 1, NULL, NULL, '0', '2016-07-12 13:07:21', '2016-07-12 13:07:21'),
(34, 'Arabian Scandinavian', 'العربية الاسكندنافية', 1, NULL, NULL, '0', '2016-07-12 13:08:38', '2016-07-12 13:08:38'),
(35, 'United Insurance', 'التأمين المتحدة', 1, NULL, NULL, '0', '2016-07-12 13:10:14', '2016-07-12 13:10:14'),
(36, 'RAK Insurance', 'رأس الخيمة الوطنية', 1, NULL, NULL, '0', '2016-07-12 13:11:25', '2016-07-12 13:11:25'),
(37, 'Noor Takaful', 'نور للتكافل', 1, NULL, NULL, '0', '2016-07-12 13:12:52', '2016-07-12 13:12:52'),
(38, 'Sharjah Insurance', 'الشارقة للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:13:47', '2016-07-12 13:13:47'),
(39, 'Al Fujairah National Insurance', 'الفجيرة الوطنية للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:15:15', '2016-07-12 13:15:15'),
(40, 'Oman Insurance', 'عمان للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:16:21', '2016-07-12 13:16:21'),
(41, 'Emirates Insurance', 'الإمارات للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:17:25', '2016-07-12 13:17:25'),
(42, 'Al Dhafra Insurance', 'الظفرة للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:18:06', '2016-07-12 13:18:06'),
(43, 'ARIG', 'المجموعة العربية للتأمين - أريج', 1, NULL, NULL, '0', '2016-07-12 13:19:07', '2016-07-12 13:19:07'),
(44, 'Dar Al Takaful', 'دار التكافل', 1, NULL, NULL, '0', '2016-07-12 13:20:00', '2016-07-12 13:20:00'),
(45, 'Al Khazna Insurance', 'شركة الخزنة للتأمين', 1, NULL, NULL, '0', '2016-07-12 13:21:12', '2016-07-12 13:21:12'),
(46, 'Dubai National Insurance & Reinsurance', 'دبي الوطنية للتأمين وإعادة التأمين', 1, NULL, NULL, '0', '2016-07-12 13:22:09', '2016-07-12 13:22:09'),
(47, 'Adamjee Insurance', 'Adamjee Insurance', 1, NULL, NULL, '0', '2016-07-28 16:52:45', '2016-07-28 16:52:45'),
(48, 'Ain Ahlia Insurance', 'Ain Ahlia Insurance', 1, NULL, NULL, '0', '2016-07-28 16:53:21', '2016-07-28 16:53:21'),
(49, 'Alamia for Medical and Integrated Service', 'Alamia for Medical and Integrated Service', 1, NULL, NULL, '0', '2016-07-28 16:53:53', '2016-07-28 16:53:53'),
(50, 'Al Buhaira National Insurance', 'Al Buhaira National Insurance', 1, NULL, NULL, '0', '2016-07-28 16:54:32', '2016-07-28 16:54:32'),
(51, 'Al Hilal Takaful Company', 'Al Hilal Takaful Company', 1, NULL, NULL, '0', '2016-07-28 16:55:34', '2016-07-28 16:55:34'),
(52, 'Al Ittihad Al Watani GIC', 'Al Ittihad Al Watani GIC', 1, NULL, NULL, '0', '2016-07-28 16:56:23', '2016-07-28 16:56:23'),
(53, 'Alliance insurance Company', 'Alliance insurance Company', 1, NULL, NULL, '0', '2016-07-28 16:57:02', '2016-07-28 16:57:02'),
(54, 'Almadallah Healthcare Management', 'Almadallah Healthcare Management', 1, NULL, NULL, '0', '2016-07-28 16:57:57', '2016-07-28 16:57:57'),
(55, 'AL Safwa Insurance Consultations', 'AL Safwa Insurance Consultations', 1, NULL, NULL, '0', '2016-07-28 16:58:25', '2016-07-28 16:58:25'),
(56, 'Al Wathba National Insurance', 'Al Wathba National Insurance', 1, NULL, NULL, '0', '2016-07-28 16:59:07', '2016-07-28 16:59:07'),
(57, 'Aman Insurance', 'Aman Insurance', 1, NULL, NULL, '0', '2016-07-28 16:59:38', '2016-07-28 16:59:38'),
(58, 'Arabia Insurance', 'Arabia Insurance', 1, NULL, NULL, '0', '2016-07-28 17:00:16', '2016-07-28 17:00:16'),
(59, 'Arab International Insurance', 'Arab International Insurance', 1, NULL, NULL, '0', '2016-07-28 17:00:45', '2016-07-28 17:00:45'),
(60, 'Arab Orient Allianz Worldwide', 'Arab Orient Allianz Worldwide', 1, NULL, NULL, '0', '2016-07-28 17:01:26', '2016-07-28 17:01:26'),
(61, 'Avita', 'Avita', 1, NULL, NULL, '0', '2016-07-28 17:01:46', '2016-07-28 17:01:46'),
(62, 'BUPA Arabia', 'BUPA Arabia', 1, NULL, NULL, '0', '2016-07-28 17:04:22', '2016-07-28 17:04:22'),
(63, 'BUPA Shell', 'BUPA Shell', 1, NULL, NULL, '0', '2016-07-28 17:05:20', '2016-07-28 17:05:20'),
(64, 'Care Company (REAYA)', 'Care Company (REAYA)', 1, NULL, NULL, '0', '2016-07-28 17:06:02', '2016-07-28 17:06:02'),
(65, 'CIGNA', 'CIGNA', 1, NULL, NULL, '0', '2016-07-28 17:06:16', '2016-07-28 17:06:16'),
(66, 'CNSS', 'CNSS', 1, NULL, NULL, '0', '2016-07-28 17:06:33', '2016-07-28 17:06:33'),
(67, 'Connex', 'Connex', 1, NULL, NULL, '0', '2016-07-28 17:07:05', '2016-07-28 17:07:05'),
(68, 'DP World', 'DP World', 1, NULL, NULL, '0', '2016-07-28 17:07:36', '2016-07-28 17:07:36'),
(69, 'Dry Docks World Dubai', 'Dry Docks World Dubai', 1, NULL, NULL, '0', '2016-07-28 17:07:54', '2016-07-28 17:07:54'),
(70, 'Dubai Care', 'Dubai Care', 1, NULL, NULL, '0', '2016-07-28 17:08:06', '2016-07-28 17:08:06'),
(71, 'Dubai Insurance', 'دبي للتأمين', 1, NULL, NULL, '0', '2016-07-28 17:08:27', '2016-07-28 17:08:27'),
(72, 'Enaya', 'Enaya', 1, NULL, NULL, '0', '2016-07-28 17:09:36', '2016-07-28 17:09:36'),
(73, 'Expacare', 'Expacare', 1, NULL, NULL, '0', '2016-07-28 17:10:01', '2016-07-28 17:10:01'),
(74, 'Gateway International Assurance', 'Gateway International Assurance', 1, NULL, NULL, '0', '2016-07-28 17:10:16', '2016-07-28 17:10:16'),
(75, 'GeoBlue', 'GeoBlue', 1, NULL, NULL, '0', '2016-07-28 17:10:31', '2016-07-28 17:10:31'),
(76, 'GHQ', 'GHQ', 1, NULL, NULL, '0', '2016-07-28 17:10:46', '2016-07-28 17:10:46'),
(77, 'Gulf Agency Company', 'Gulf Agency Company', 1, NULL, NULL, '0', '2016-07-28 17:11:54', '2016-07-28 17:11:54'),
(78, 'Healix', 'Healix', 1, NULL, NULL, '0', '2016-07-28 17:12:07', '2016-07-28 17:12:07'),
(79, 'Henner (TPA)', 'Henner (TPA)', 1, NULL, NULL, '0', '2016-07-28 17:12:29', '2016-07-28 17:12:29'),
(80, 'HTH Worldwide', 'HTH Worldwide', 1, NULL, NULL, '0', '2016-07-28 17:12:43', '2016-07-28 17:12:43'),
(81, 'Integraglobal Health Care', 'Integraglobal Health Care', 1, NULL, NULL, '0', '2016-07-28 17:13:16', '2016-07-28 17:13:16'),
(82, 'InterGlobal', 'InterGlobal', 1, NULL, NULL, '0', '2016-07-28 17:13:29', '2016-07-28 17:13:29'),
(83, 'Iran Insurance', 'Iran Insurance', 1, NULL, NULL, '0', '2016-07-28 17:13:40', '2016-07-28 17:13:40'),
(84, 'Iris Health Services', 'Iris Health Services', 1, NULL, NULL, '0', '2016-07-28 17:13:55', '2016-07-28 17:13:55'),
(85, 'JC MacDermott', 'JC MacDermott', 1, NULL, NULL, '0', '2016-07-28 17:14:23', '2016-07-28 17:14:23'),
(86, 'Jordan Insurance', 'Jordan Insurance', 1, NULL, NULL, '0', '2016-07-28 17:17:04', '2016-07-28 17:17:04'),
(87, 'MaxCare', 'MaxCare', 1, NULL, NULL, '0', '2016-07-28 17:17:18', '2016-07-28 17:17:18'),
(88, 'MetLife ALICO', 'MetLife ALICO', 1, NULL, NULL, '0', '2016-07-28 17:17:59', '2016-07-28 17:17:59'),
(89, 'Mipol', 'Mipol', 1, NULL, NULL, '0', '2016-07-28 17:18:13', '2016-07-28 17:18:13'),
(90, 'Mobilie Saint Honore (MSH)', 'Mobilie Saint Honore (MSH)', 1, NULL, NULL, '0', '2016-07-28 17:18:29', '2016-07-28 17:18:29'),
(91, 'National Life and General Insurance', 'National Life and General Insurance', 1, NULL, NULL, '0', '2016-07-28 17:19:07', '2016-07-28 17:19:07'),
(92, 'New India Insurance', 'New India Insurance', 1, NULL, NULL, '0', '2016-07-28 17:19:40', '2016-07-28 17:19:40'),
(94, 'Now Health International', 'Now Health International', 1, NULL, NULL, '0', '2016-07-28 17:20:48', '2016-07-28 17:20:48'),
(95, 'Pentacare', 'Pentacare', 1, NULL, NULL, '0', '2016-07-28 17:21:13', '2016-07-28 17:21:13'),
(96, 'Qatar Insurance', 'Qatar Insurance', 1, NULL, NULL, '0', '2016-07-28 17:21:30', '2016-07-28 17:21:30'),
(97, 'Rak Bank', 'Rak Bank', 1, NULL, NULL, '0', '2016-07-28 17:21:48', '2016-07-28 17:21:48'),
(98, 'Ras Al Khaimah National Insurance', 'Ras Al Khaimah National Insurance', 1, NULL, NULL, '0', '2016-07-28 17:21:58', '2016-07-28 17:21:58'),
(99, 'Royal & Sun Alliance Insurance (Middle East) Ltd', 'Royal & Sun Alliance Insurance (Middle East) Ltd', 1, NULL, NULL, '0', '2016-07-28 17:22:16', '2016-07-28 17:22:16'),
(100, 'SAICO', 'SAICO', 1, NULL, NULL, '0', '2016-07-28 17:22:27', '2016-07-28 17:22:27'),
(101, 'Salama Islamic Arab Insurance', 'Salama Islamic Arab Insurance', 1, NULL, NULL, '0', '2016-07-28 17:22:45', '2016-07-28 17:22:45'),
(102, 'Takaful Emarat', 'Takaful Emarat', 1, NULL, NULL, '0', '2016-07-28 17:23:01', '2016-07-28 17:23:01'),
(103, 'The Crown Prince of Dubai Office(CPD)', 'The Crown Prince of Dubai Office(CPD)', 1, NULL, NULL, '0', '2016-07-28 17:23:12', '2016-07-28 17:23:12'),
(105, 'Vidal Health (TPA)', 'Vidal Health (TPA)', 1, NULL, NULL, '0', '2016-07-28 17:24:16', '2016-07-28 17:24:16'),
(106, 'WAPMED', 'WAPMED', 1, NULL, NULL, '0', '2016-07-28 17:24:28', '2016-07-28 17:24:28'),
(107, 'Whealth International', 'Whealth International', 1, NULL, NULL, '0', '2016-07-28 17:24:39', '2016-07-28 17:24:39'),
(108, 'WILLIAM RUSSELL LIMITED', 'WILLIAM RUSSELL LIMITED', 1, NULL, NULL, '0', '2016-07-28 17:24:53', '2016-07-28 17:24:53'),
(109, 'Zurich Insurance', 'Zurich Insurance', 1, NULL, NULL, '0', '2016-07-28 17:25:06', '2016-07-28 17:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `seha_languages`
--

CREATE TABLE `seha_languages` (
  `lang_id` int(11) NOT NULL,
  `lang_title` varchar(100) NOT NULL,
  `lang_code` varchar(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_languages`
--

INSERT INTO `seha_languages` (`lang_id`, `lang_title`, `lang_code`, `is_active`, `created_on`, `updated_on`) VALUES
(1, 'English', 'en_GB', 1, '2014-11-15 00:00:00', '2014-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seha_locations`
--

CREATE TABLE `seha_locations` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `latitude_id` varchar(30) NOT NULL,
  `longitude_id` varchar(30) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seha_news`
--

CREATE TABLE `seha_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) DEFAULT NULL,
  `news_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_description` text,
  `news_description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_news`
--

INSERT INTO `seha_news` (`news_id`, `news_title`, `news_title_ar`, `news_description`, `news_description_ar`, `show_status`, `subscriber`, `image_url`, `thumb_url`, `send`, `created_on`, `updated_on`) VALUES
(4, '''Hard'' Tap Water Linked to Eczema in Babies', 'دراسة حديثة: المياه', '<p>"Hard," mineral-laden water may increase the risk of a baby getting the skin condition eczema, a new British study suggests.</p>\n<p>Eczema is a chronic condition marked by itchiness and rashes. The study included 1,300 3-month old infants from across the United Kingdom. Researchers checked hardness -- the water''s mineral content -- and chlorine levels in the water supply where the babies lived.</p>\n<p>Babies who lived in areas with hard water were up to 87 percent more likely to have eczema, the study found.</p>\n<p>"Our study builds on growing evidence of a link between exposure to hard water and the risk of developing eczema in childhood," said lead author Dr. Carsten Flohr, from the Institute of Dermatology at King''s College London.</p>\n<p>The study wasn''t designed to prove a cause-and-effect relationship, so further research is needed to learn more about this apparent link, Flohr added.</p>\n<p>"We are about to launch a feasibility trial to assess whether installing a water softener in the homes of high-risk children around the time of birth may reduce the risk of eczema and whether reducing chlorine levels brings any additional benefits," Flohr said in a college news release.</p>\n<p>Previous studies have found an association between water hardness and eczema risk in schoolchildren. This is the first study to examine the link in infants, the researchers said.</p>\n<p>The study was published recently in the&nbsp;<em>Journal of Allergy and Clinical Immunology</em>.</p>', '<p dir="RTL">توصلت دراسة بريطانية حديثة إلى أن مياه الصنبور "العَسِرة"، أي المياه الحاوية على تراكيز عالية من المعادن، قد تزيد من خطر إصابة الأطفال بالإكزيما، وهي حالة جلدية مزمنة تتظاهر بحكة واندفاعات جلدية.</p>\n<p dir="RTL">اشتملت الدراسة على حوالي 1300 طفلاً بعمر ثلاثة أشهر من جميع أنحاء المملكة المتحدة. قام الباحثون بقياس عُسر مياه الصنابير في مناطق سكن الأطفال (حساب كمية المعادن الموجودة فيها)، وقياس كمية الكلور فيها أيضاً.</p>\n<p dir="RTL">وجد الباحثون بأن الأطفال الذين يعيشون في مناطق ذات مياه عسرة كانوا أكثر عُرضة للإصابة بالإكزيما الجلدية بنسبة كبيرة بلغت 87 في المائة.</p>\n<p dir="RTL">يقول المُعد الرئيسي للدراسة الدكتور كارستن فلوهر، الأستاذ بمعهد كينجز كوليج لندن لطب الجلد: "لقد أضافت دراستنا هذه دليلاً جديداً إلى الأدلة السابقة حول العلاقة بين التعرض للمياه العسرة وإصابة الأطفال بالإكزيما".</p>\n<p dir="RTL">ويُضيف فلوهر: "لم تُصمم الدراسة الحالية لإثبات علاقة سبب ونتيجة بين التعرض للمياه العسرة والإصابة بالإكزيما، ولا بد من إجراء المزيد من الدراسات حول الأمر لفهم العلاقة بينهما جيداً، وإننا بصدد إطلاق تجربة جديدة لمعرفة ما إذا كان تركيب أجهزة تُقلل من عسر المياه في المنازل قُبيل ولادة الأطفال الجدد فيها سيساعد على الحد من معدلات إصابتهم بالإكزيما، ومعرفة ما إذا كان تقليل مستويات الكلور في المياه سيعود بأي نفع على الأطفال".</p>\n<p dir="RTL">من الجدير ذكره بأن دراساتٍ سابقة كانت قد وجدت ارتباطاً بين قساوة مياه الصنابير في المدارس وزيادة خطر الإصابة الأطفال بالإكزيما. إلا أن هذه هي الدراسة الأولى التي تتحرى أثر المياه العَسِرة عند المواليد الجدد.</p>\n<p>جرى نشر نتائج الدراسة مؤخراً في مجلة الحساسية والمناعة السريرية</p>', 1, NULL, '552b043b6cdaefb31fbabc19877cbb31.jpg', '552b043b6cdaefb31fbabc19877cbb31_thumb.jpg', 0, '2016-06-17 17:49:07', '2016-06-17 17:49:07'),
(5, 'Exploring the Link Between Estrogen and Migraines', 'خبراء يعكفون على تحري العلاقة بين هرمون الإستروجين وصداع الشقيقة عند النساء', '<p>Researchers are getting a better understanding of the link between estrogen levels and migraine headaches in women.</p>\n<p>A new study finds that for women who get these intense headaches, levels of the hormone estrogen drop more rapidly in the days before menstruation than in women without the headaches.</p>\n<p>"These results suggest that a ''two-hit'' process may link estrogen withdrawal to menstrual migraine," said study author Dr. Jelena Pavlovic, of the Albert Einstein College of Medicine/Montefiore Medical Center in New York City. "More rapid estrogen decline may make women vulnerable to common triggers for migraine attacks such as stress, lack of sleep, foods and wine."</p>\n<p>Researchers looked at urine samples of 114 women with migraines and 223 women without migraines, average age 47. Estrogen levels among those with migraines dropped 40 percent in the days just before menstruation, compared to 30 percent for those without migraines, the study found.</p>\n<p>No similar patterns were seen with other types of hormones, according to the study.</p>\n<p>The results were published online June 1 in the journal&nbsp;<em>Neurology</em>.</p>\n<p>"Future studies should focus on the relationship between headaches and daily hormone changes and explore the possible underpinnings of these results," Pavlovic added in a journal news release.</p>\n<p>About 12 percent of Americans get migraines, and they''re three times more common in women than men, according to the American Migraine Foundation. Besides headaches, migraine attacks can include nausea, vomiting and sensitivity to lights, sound and smells.</p>', '<p dir="RTL">يقول باحثون بأنهم نجحوا في استجلاء المزيد من الحقائق حول العلاقة بين مستويات هرمون الإستروجين والإصابة بصداع الشقيقة migrane عند النساء.</p>\n<p dir="RTL">فقد وجدت دراسة حديثة بأن النساء اللواتي يشعرن بهذا النوع من الصداع الشديد تنخفض لديهنّ مستويات الإستروجين بشكل أسرع في الأيام التي تسبق الدورة الشهرية، وذلك بالمقارنة مع النساء اللواتي لا يشعرن بهذا النوع من الصداع.</p>\n<p dir="RTL">تقول الدكتورة جيلينا بافلوفيك، الخبيرة بكلية ألبرت إينشتاين للعلوم الطبية بنيويورك: "تدل نتائج دراستنا على وجود عملية مؤلفة من مرحلتين تربط بين سحب الإستروجين وصداع الشقيقة الحيضي. حيث إن الهبوط السريع في مستويات الإستروجين يجعل النساء أقل مقاومةً للعوامل التي تُثير نوبات الشقيقة، مثل الشدة النفسية وقلة النوم وقلة الطعام وتناول المشروبات الكحولية".</p>\n<p dir="RTL">قام الباحثون بدراسة عينات بولية لـ 114 امرأة مصابة بالشقيقة و 223 امرأة غير مصابة بالشقيقة، وبلغ متوسط أعمار المشاركات حوالي 47 سنة. وقد وجدت الدراسة بأن مستويات الإستروجين انخفضت بنسبة 40 في المائة عند النساء المُصابات بالشقيقة في الأيام التي سبقت الحيض مباشرةً، وذلك بالمقارنة مع انخفاض بنسبة 30 في المائة عند النساء غير المصابات بالشقيقة.</p>\n<p dir="RTL">وبحسب مُعدّي الدراسة، فلم تُشاهد أنماط تبدل مشابهة في مستويات أنواعٍ أخرى من الهرمونات.</p>\n<p dir="RTL">جرى نشر نتائج الدراسة في الأول من شهر يونيو الحالي في النسخة الإلكترونية من مجلة علم الأعصاب.</p>\n<p dir="RTL">تُضيف بافلوفيك: "ينبغي أن تُركز الدراسات المستقبلية على العلاقة بين الصداع والتبدلات اليومية في المستويات الهرمونية، وتحرّي الأسس التي تقوم عليها والنتائج التي تُفضي إليها".</p>\n<p dir="RTL">وبحسب مؤسسة صداع الشقيقة الأمريكية، فإن ما نسبته 12 في المائة من الأمريكيين يعانون من الإصابة بصداع الشقيقة، وأن النساء أكثر إصابةً بها بمعدل ثلاثة أضعاف. وبالإضافة إلى الصداع، تشمل نوبة الشقيقة على الشعور بالغثيان، والتقيؤ، والحساسية للضوء والأصوات والروائح.</p>', 1, NULL, '88788d305311165b5d8bb631d231d1e5.jpg', '88788d305311165b5d8bb631d231d1e5_thumb.jpg', 0, '2016-06-17 17:50:01', '2016-06-17 17:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `seha_newsletter_subscriptions`
--

CREATE TABLE `seha_newsletter_subscriptions` (
  `id` int(11) NOT NULL,
  `reg_email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_newsletter_subscriptions`
--

INSERT INTO `seha_newsletter_subscriptions` (`id`, `reg_email`, `created_at`, `updated_at`) VALUES
(2, 'aneesh.ansniyan@gmail.com', '2016-05-02 15:22:43', '2016-05-02 15:22:43'),
(3, 'aneesh.dd@gmail.com', '2016-05-02 15:26:58', '2016-05-02 15:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `seha_nl_templates`
--

CREATE TABLE `seha_nl_templates` (
  `tpl_id` int(11) NOT NULL,
  `tpl_title` varchar(255) NOT NULL,
  `tpl_thumb` varchar(255) DEFAULT NULL,
  `tpl_url` varchar(255) NOT NULL,
  `tpl_content` text NOT NULL,
  `tpl_status` tinyint(1) NOT NULL DEFAULT '1',
  `tpl_edit` tinyint(1) NOT NULL DEFAULT '1',
  `tpl_created` datetime NOT NULL,
  `tpl_update` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_nl_templates`
--

INSERT INTO `seha_nl_templates` (`tpl_id`, `tpl_title`, `tpl_thumb`, `tpl_url`, `tpl_content`, `tpl_status`, `tpl_edit`, `tpl_created`, `tpl_update`) VALUES
(1, 'Blank Template', NULL, 'blank/', '', 1, 0, '2014-11-19 03:13:00', '2014-11-19 03:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `seha_notifications`
--

CREATE TABLE `seha_notifications` (
  `not_id` int(11) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(300) NOT NULL,
  `message_en` text NOT NULL,
  `message_ar` text,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seha_notifications_users`
--

CREATE TABLE `seha_notifications_users` (
  `device_id` varchar(50) NOT NULL,
  `not_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 Read, 2 Hidden'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seha_notification_job`
--

CREATE TABLE `seha_notification_job` (
  `job_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `not_lang` enum('English','Arabic') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Arabic',
  `send_on` datetime NOT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_notification_job`
--

INSERT INTO `seha_notification_job` (`job_id`, `title`, `message`, `not_lang`, `send_on`, `send`, `created_on`, `updated_on`) VALUES
(1, 'الشارقة العالمي للطب الشمولي', 'الشارقة العالمي للطب الشمولي أصبح أقرب لكم الآن يمكنكم حجز موعد عبر 360صحة', 'Arabic', '2015-07-01 12:05:38', 1, '2015-06-27 04:32:12', '2015-07-01 12:04:17'),
(2, 'مركز أجياد الطبي', 'يرحب 360صحة بانضمام مركز أجياد الطبي له ويمكنكم معرفة خدمات المركز وعروضه عبر الموقع والتطبيق', 'Arabic', '2015-07-01 12:05:33', 1, '2015-07-01 12:05:29', '2015-07-01 12:05:29'),
(5, 'مركز الزمرد الطبي', 'نرحب بانضمام مركز الزمرد الطبي الى شبكة 360صحة يمكنكم الآن معرفة الخدمات التي يقدمها المركز وحجز موعد مباشرو من خلال التطبيق', 'Arabic', '2016-03-20 02:05:13', 1, '2015-07-26 12:44:34', '2015-11-08 09:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `seha_patients`
--

CREATE TABLE `seha_patients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `unique_token` varchar(300) NOT NULL,
  `password_hash` varchar(300) NOT NULL,
  `readable_pass` varchar(300) NOT NULL,
  `created_on` datetime NOT NULL,
  `update_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `reward_points` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `verify_code` varchar(300) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_patients`
--

INSERT INTO `seha_patients` (`id`, `full_name`, `location`, `email`, `phone`, `unique_token`, `password_hash`, `readable_pass`, `created_on`, `update_on`, `last_login`, `reward_points`, `status`, `verify_code`, `is_verified`) VALUES
(1, 'Aneesh Ponnappan', 'Sharjah, United Arab Emirates', 'aneesh.anniyadn@gmail.com', '971 556545445', 'bd2a0e193184f022cefcaad0c8959d3af04fde7fd91ed33d78ebe36316a10144fcedeed33fc4c725bdb29df078adcddd', 'db86a34ccdab941b4cdc0aeef14d7c21', 'anniyan2009', '2015-06-27 07:02:58', '2016-06-16 18:26:22', '0000-00-00 00:00:00', 4, 1, '', 1),
(2, 'Aneesh', 'Sharjah, United Arab Emirates', 'aneesh.dgweb@gmail.com', '564478789', '28d44381a706a200127e56ed933e23bd7d08f5d8067b28de409cbc27ce504f4eaf9b78e1348f07fcd1449e057d25fe6f', '2c51ac85617c9ee5c550b787ce47d996', 'DBiHX1gZbC', '2015-06-28 05:12:15', '2015-06-28 05:12:15', '0000-00-00 00:00:00', 14, 1, '', 1),
(4, 'Aneesh Ponnappan', 'Sharjah, United Arab Emirates', 'aneesh.anniyan@gmail.com', '971525723556', 'ece68dd9bd7db93c1df8d9d9139fbee58c9dc1be020fa5a2aaa18eed25bfb522fce8e222471df0279c6b9b2a1ce28d74', '85e9f2b66448b873582e30588151c6cb', '4OpFeoGpqt', '2015-07-06 13:00:28', '2016-06-17 09:15:54', '0000-00-00 00:00:00', 417, 1, '', 1),
(5, 'Ahmad', 'undefined', 'germanuae2014@gmail.com', '0529950042', '427d630495a5ca5742998b4f8bbc1737c5627df20efcddc9ad6d5c24911ccc4b87b86bcd8ec4e6ee98780708d08f8420', 'dbddefc24362b7fcbe9930b8efd48f43', 'german1972', '2015-07-07 06:21:21', '2015-07-07 06:21:21', '0000-00-00 00:00:00', 4, 1, '', 1),
(9, 'Aneesh Ponnappan', 'Sharjah, United Arab emirates', 'aneesh.anniyan@gmail.com', '971525723556', 'a44b3732a8c8d21d87590aa721666fb698ef309b06820a4aaac2873b13d704a1620fc092ded0d67670df7dbf4034890b', '65f3f7265f736fa99a3162e9ad9729f6', 'anniyan2009', '2015-08-06 11:15:15', '2015-08-06 11:15:15', '0000-00-00 00:00:00', 0, 1, '', 1),
(11, 'Shiro Menz', 'Sharjah, United Arab Emirates', 's_hosho1981@hotmail.com', '0556015503', 'fde950acb8eafd691fa7d1a1a0906a33f0f83c540f7c2d13bda460fc64ea2b0da02cfe708e8bdfa238aa0a0b311e813c', 'b5d6e8527995cd9ad6aab0be76e55317', 'shiro555', '2015-09-02 22:01:39', '2015-09-02 22:01:39', '0000-00-00 00:00:00', 0, 1, '', 1),
(12, 'waill allaham', 'Sharjah, United Arab Emirates', 'waillallaham@gmail.com', '0503819252', '9ecb0a08183d7e8564e7625f89b85e26dacb7fe48c2b78bd9718fd34e3cea1a5426b64bfe7df60b67076a33ae7ba0477', '7638b898472bd55b9fcf23464c6bc008', 'hello1234', '2015-10-27 13:45:54', '2015-10-27 13:45:54', '0000-00-00 00:00:00', 0, 1, '', 1),
(14, 'Rakesh', 'Abu Dhabi, United Arab Emirates', 'rakesh.sharmarsm@gmail.com', '0509059221', 'feb179b2db0cbfc83ab570ef10678dad727299467ad051c0f7742137673f1c309cd5e9897d2ee3ede6ac5595861e95b7', '7224baec4b3afa44b0907ac7b7fad873', 'dubai@4321', '2015-11-22 18:07:35', '2015-11-22 18:07:35', '0000-00-00 00:00:00', 0, 1, '', 1),
(15, 'omar79', ', United Arab Emirates', 'omar@digitalgateweb.com', '0564032239', '1baf245bcd3797254d9da38382673535b76845ce816066915fddf36ba6d9a59ccdf2b1d531766204e1652ef61d8ac888', 'eea3fbb3ee3fd60611b15703b81c36e9', 'om123456', '2015-11-22 18:37:54', '2015-11-22 18:37:54', '0000-00-00 00:00:00', 5, 1, '', 1),
(16, 'omar skaf', 'Sharjah, United Arab Emirates', 'omarskaf@gmail.com', '0564032239', 'd0ce0514303494dae8ae778c1481fce8ade1970054bf3d3ee2d601812d271b6265068c6adf588f0c65dca9e461d1427d', '259e0dc9cd22b3107f1d917982adaa32', 'om123456', '2015-11-30 08:05:35', '2015-11-30 08:05:35', '0000-00-00 00:00:00', 1, 1, '', 1),
(17, 'kinan', 'Sharjah, United Arab Emirates', 'kinankinan1981@gmail.com', '0505147133', '74ecb0648d924c5ee5f7bdc8adc37324c28fefbaf868646910c35363b98989eefd34307138c5ec01c94e91ab55cbd42c', '0d4cc1e6b4a29bfee064785c26b8763d', '8484rash', '2015-12-05 08:55:07', '2015-12-05 08:55:07', '0000-00-00 00:00:00', 0, 1, '', 1),
(18, 'Aneesh Ponnappan', 'Sharjah, United Arab Emirates', 'aneesh.dgwebtest@gmail.com', '0525723335', 'be72f74b2ab1c134876aedc22ea6a9f0e7fbb7ff030f27f98e77c31f5cfe350bf27d464520419020dfb891615bd0f345', 'f98b63da34c420ba5fca4f3f2ab8e203', 'anniyan2009', '2016-06-12 09:44:22', '2016-06-12 11:35:42', '0000-00-00 00:00:00', 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seha_patients_comments`
--

CREATE TABLE `seha_patients_comments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL,
  `hide` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_patients_comments`
--

INSERT INTO `seha_patients_comments` (`id`, `patient_id`, `subscriber`, `comment`, `created_on`, `hide`, `approved`) VALUES
(20, 1, 26, 'Hi', '2015-07-05 11:30:42', 0, 1),
(21, 5, 29, 'مركز مميز', '2015-07-07 06:23:54', 0, 1),
(22, 6, 36, 'منور دكتور طارق', '2015-07-24 21:43:09', 0, 1),
(23, 3, 35, 'بالتوفيق', '2015-07-26 17:05:25', 0, 1),
(24, 4, 26, 'hi', '2015-07-28 07:19:51', 0, 0),
(25, 4, 31, 'hi', '2015-08-03 08:05:02', 0, 0),
(26, 3, 46, 'Great hospital', '2015-08-20 20:09:36', 0, 1),
(27, 15, 29, 'بالتوفيق مركز مميز', '2015-11-22 18:40:11', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seha_patients_favourites`
--

CREATE TABLE `seha_patients_favourites` (
  `patient_id` int(11) DEFAULT NULL,
  `subs_id` int(11) DEFAULT NULL,
  `fav_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_patients_favourites`
--

INSERT INTO `seha_patients_favourites` (`patient_id`, `subs_id`, `fav_id`) VALUES
(1, 29, 3),
(16, 31, 9),
(16, 26, 10);

-- --------------------------------------------------------

--
-- Table structure for table `seha_patients_likes`
--

CREATE TABLE `seha_patients_likes` (
  `like_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_patients_likes`
--

INSERT INTO `seha_patients_likes` (`like_id`, `patient_id`, `subscriber`) VALUES
(1, 4, 27),
(2, 4, 38),
(3, 4, 40),
(4, 3, 35),
(5, 8, 29),
(6, 4, 26),
(7, 4, 36),
(8, 3, 37),
(9, 4, 29),
(10, 4, 31),
(11, 3, 46),
(12, 3, 29),
(13, 3, 36),
(14, 15, 29),
(15, 15, 54),
(16, 2, 52),
(17, 2, 31);

-- --------------------------------------------------------

--
-- Table structure for table `seha_patients_pinlikes`
--

CREATE TABLE `seha_patients_pinlikes` (
  `patient_id` int(11) NOT NULL,
  `pin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_patients_pinlikes`
--

INSERT INTO `seha_patients_pinlikes` (`patient_id`, `pin_id`) VALUES
(1, 10),
(34, 13),
(34, 12),
(34, 10),
(4, 8),
(4, 7),
(6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `seha_patient_interest`
--

CREATE TABLE `seha_patient_interest` (
  `patient_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_patient_interest`
--

INSERT INTO `seha_patient_interest` (`patient_id`, `offer_id`, `created_on`) VALUES
(17, 1, '2015-01-07 03:43:31'),
(16, 1, '2015-01-07 04:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `seha_pinboard_interest`
--

CREATE TABLE `seha_pinboard_interest` (
  `patient_id` int(11) NOT NULL,
  `pinboard_id` int(11) NOT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_pinboard_interest`
--

INSERT INTO `seha_pinboard_interest` (`patient_id`, `pinboard_id`, `created_on`) VALUES
(4, 8, '2015-07-25 12:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `seha_profile_page_settings`
--

CREATE TABLE `seha_profile_page_settings` (
  `show_location` tinyint(1) NOT NULL,
  `public_address` tinyint(1) NOT NULL,
  `show_contact` tinyint(1) NOT NULL,
  `show_timings` tinyint(1) NOT NULL,
  `show_domain` tinyint(1) NOT NULL,
  `show_notes` tinyint(1) NOT NULL,
  `enable_comments` tinyint(1) NOT NULL,
  `enable_reviews` tinyint(1) NOT NULL,
  `review_min_count` int(11) NOT NULL,
  `description` text NOT NULL,
  `l_description` text NOT NULL,
  `enable_photo_gallery` tinyint(1) NOT NULL,
  `images_count` int(11) NOT NULL,
  `show_photo_listings` varchar(20) NOT NULL,
  `enable_video_gallery` tinyint(1) NOT NULL,
  `show_videos_count` int(11) NOT NULL,
  `show_video_listings` varchar(20) NOT NULL,
  `subscriber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_profile_page_settings`
--

INSERT INTO `seha_profile_page_settings` (`show_location`, `public_address`, `show_contact`, `show_timings`, `show_domain`, `show_notes`, `enable_comments`, `enable_reviews`, `review_min_count`, `description`, `l_description`, `enable_photo_gallery`, `images_count`, `show_photo_listings`, `enable_video_gallery`, `show_videos_count`, `show_video_listings`, `subscriber`) VALUES
(1, 1, 1, 1, 1, 0, 0, 0, 0, '', '', 0, 0, 'latest', 0, 0, 'latest', 1),
(1, 1, 1, 1, 1, 1, 1, 1, 10, 'A spa is a location where mineral-rich spring water (and sometimes sea water) is used to give medicinal baths. Spa towns or spa resorts (including hot springs resorts) typically offer various health treatments, which are also known as balneotherapy. The belief in the curative powers of mineral waters goes back to prehistoric times. Such practices have been popular worldwide, but are especially widespread in Europe and Japan. Day spas are also quite popular, and offer various personal care treatments.', '', 1, 10, 'latest', 1, 10, 'latest', 2);

-- --------------------------------------------------------

--
-- Table structure for table `seha_region`
--

CREATE TABLE `seha_region` (
  `id` int(11) NOT NULL,
  `reg_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city_pk` int(11) NOT NULL,
  `lang` enum('en','ar') NOT NULL DEFAULT 'en',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_region`
--

INSERT INTO `seha_region` (`id`, `reg_name`, `city_pk`, `lang`, `created_on`, `updated_on`) VALUES
(1, 'Al Khan', 3, 'en', '2015-02-22 11:59:12', '2015-04-12 09:59:39'),
(3, 'Abu Dhabi Airport Freezone', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(4, 'Abu Dhabi City Centre', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(5, 'Abu Dhabi Falcon Hospital', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(6, 'Abu Dhabi Formula 1', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(7, 'Abu Dhabi Gate City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(8, 'Abu Dhabi Golf & Equestrian Club', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(9, 'Abu Dhabi Golf Club & Spa', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(10, 'Abu Dhabi Industrial City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(11, 'Abu Dhabi International Airport', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(12, 'Abu Dhabi Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(13, 'Abu Dhabi Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(14, 'Abu Dhabi National Exhibition Centre', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(15, 'Abu Dhabi University', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(16, 'ADAFZA', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(17, 'Al Ghadeer Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(18, 'Al Aman', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(19, 'Al Bahia', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(20, 'Al Bahia Park', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(21, 'Al Bandar', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(22, 'Al Bateen', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(23, 'Al Bateen Airport', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(24, 'Al Bateen Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(25, 'Al Bateen Villas', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(26, 'Al Dana', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(27, 'Al Dhafrah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(28, 'Al Falah City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(29, 'Al Ghadeer', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(30, 'Al Ghaf Park', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(31, 'Al Ghazal Golf Club', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(32, 'Al Gurm Mangroves', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(33, 'Al Hosn', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(34, 'Al Ittihad', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(35, 'Al Karamah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(36, 'Al Khaleej Al Arabi Street', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(37, 'Al Khalidiyah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(38, 'Al Khubeirah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(39, 'Al Lissaily', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(40, 'Al Madina Al Riyadiya', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(41, 'Al Mafraq', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(42, 'Al Mafraq Hospital', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(43, 'Al Manaseer', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(44, 'Al Manhal', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(45, 'Al Maqtaa', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(46, 'Al Markaziyah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(47, 'Al Matar', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(48, 'Al Mina', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(49, 'Al Moroor', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(50, 'Al Muneera', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(51, 'Al Musalla', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(52, 'Al Mushrif', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(53, 'Al Muzoon', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(54, 'Al Nahda', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(55, 'Al Nahyan', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(56, 'Al Nahyan military Camp', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(57, 'Al Qubesat', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(58, 'Al Qurayyah Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(59, 'Al Qurm', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(60, 'Al Qurm Gardens', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(61, 'Al Raha Beach', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(62, 'Al Raha Gardens', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(63, 'Al Raha Shopping Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(64, 'Al Rahba', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(65, 'Al Ras Al Akhdar', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(66, 'Al Razeem', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(67, 'Al Reef', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(68, 'Al Reef Community', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(69, 'Al Reef Downtown', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(70, 'Al Reem Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(71, 'Al Rehhan', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(72, 'Al Rowdah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(73, 'Al Rumaila', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(74, 'Al Safarat', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(75, 'Al Safeer Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(76, 'Al Salam street', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(77, 'Al Seef', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(78, 'Al Shaleela', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(79, 'Al Shamkha', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(80, 'Al Shatie', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(81, 'Al Shawamekh', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(82, 'Al Thurayya', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(83, 'Al Wahda Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(84, 'Al Wahdah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(85, 'Al Zaab', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(86, 'Al Zahiya', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(87, 'Al Zahraa', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(88, 'Al Zeina', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(89, 'Arabian Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(90, 'Arzanah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(91, 'As Suwwah Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(92, 'Balrmmd Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(93, 'Bani Yas', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(94, 'Baniyas City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(95, 'Belghailam', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(96, 'Belghailam Island Cluster', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(97, 'Between two Bridges', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(98, 'Bisrat Fahid Island Cluster', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(99, 'Bloom Gardens', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(100, 'Capital Plaza', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(101, 'City of Lights', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(102, 'Coconut Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(103, 'Contemporary Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(104, 'Corniche', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(105, 'Danet Abu Dhabi', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(106, 'Defense Road', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(107, 'Delma Street', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(108, 'Desert Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(109, 'Eastern Road', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(110, 'Electra', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(111, 'Emirates Palace', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(112, 'Futaysi Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(113, 'Gargash Round About', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(114, 'Gate District', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(115, 'Golf Gardens', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(116, 'Guggenheim & Louvre Museums', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(117, 'Hadbat Al Zafranah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(118, 'Hamdan Centre', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(119, 'Hodariyat Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(120, 'Hydra City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(121, 'Hydra Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(122, 'ICAD Main Gate', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(123, 'Khalidiyah Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(124, 'Khalifa City A', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(125, 'Khalifa City B', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(126, 'Khalifa City C', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(127, 'Khalifa Street', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(128, 'Khor Al Raha', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(129, 'Lifeline Hospital', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(130, 'Liwa Street', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(131, 'Lulu Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(132, 'Madinat Zayed', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(133, 'Madinat Zayed Shopping Centre', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(134, 'Mangrove Area North', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(135, 'Marina Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(136, 'Marina Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(137, 'Masdar City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(138, 'Mediterranean Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(139, 'Mina Mall', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(140, 'Mohammed Bin Zayed City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(141, 'Motor World', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(142, 'Mussafah', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(143, 'Mussafah East', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(144, 'Mussafah Industrial Area', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(145, 'Mussafah Residential & Commercial Area', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(146, 'Najmat', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(147, 'Najmat Reem Marina', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(148, 'New Shahama', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(149, 'Nurai Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(150, 'Officers City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(151, 'Officers Club Area', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(152, 'Police Traffic Dept', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(153, 'Qasr Al Bahr', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(154, 'Qasr El Shatie', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(155, 'Rawdhat', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(156, 'Saadiyat Beach', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(157, 'Saadiyat Culatural District', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(158, 'Saadiyat Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(159, 'Saadiyat Marina', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(160, 'Saadiyat Retreat', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(161, 'Saadiyat South Beach Promenade', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(162, 'Saadiyat Wetlands Reserve', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(163, 'Samaliyah Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(164, 'Sas Al Nakhl Villas', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(165, 'Sas An Nakhl Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(166, 'Shahama Market', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(167, 'Shams Abu Dhabi', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(168, 'Sheikh Khalifa Park', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(169, 'Sheikh Zayed Grand Mosque', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(170, 'South Hodariyat Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(171, 'Tamouh CBD', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(172, 'Tamouh Marina Square', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(173, 'Tourist Club Area', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(174, 'Umm Al Nar', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(175, 'Umm Yifenah Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(176, 'Yas Circuit & Marina', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(177, 'Yas Entertainment District', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(178, 'Yas Island', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(179, 'Yas Northern Marina Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(180, 'Yas Northern Residential & Golf', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(181, 'Yas Southern Marina Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(182, 'Yas Village', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(183, 'Yas Waterfront Resorts & Links', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(184, 'Zayed Bay', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(185, 'Zayed Sports City', 5, 'en', '2015-04-27 07:41:39', '2015-04-27 07:41:39'),
(186, 'Ajman Industrial Area', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(187, 'Al Bustan', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(188, 'Al Butain', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(189, 'Al Hamriya', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(190, 'Al Helio', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(191, 'Al Jarrf', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(192, 'Al Manamah', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(193, 'Al Mowaihat', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(194, 'Al Nakhil', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(195, 'Al Nuaimia', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(196, 'Al Owan', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(197, 'Al Rashidya', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(198, 'Al Rumailah', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(199, 'Al Sawan', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(200, 'Al Zahra', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(201, 'Mushairef', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(202, 'Safia Island', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(203, 'Sheikh Khalifa Bin Zayed', 6, 'en', '2015-04-27 07:43:48', '2015-04-27 07:43:48'),
(204, 'Abu Huraybah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(205, 'Abu Krayyah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(206, 'Abu Samrah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(207, 'Al Agabiyya', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(208, 'Al Bateen', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(209, 'Al Bateen', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(210, 'Al Dhahra', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(211, 'Al Falaj Hazzaa', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(212, 'Al Foah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(213, 'Al Grayyeh', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(214, 'Al Haiyir', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(215, 'Al Hili', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(216, 'Al Jimi', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(217, 'Al Khabisi', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(218, 'Al Khazna', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(219, 'Al Maqam', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(220, 'Al Masoudi', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(221, 'Al Mutarad', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(222, 'Al Mutawaa', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(223, 'Al Muwaiji', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(224, 'Al Niyadat', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(225, 'Al Qattara', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(226, 'Al Quaa', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(227, 'Al Rawdha', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(228, 'Al Salamat', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(229, 'Al Sinaiyah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(230, 'Al Tawia', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(231, 'Al Wagan', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(232, 'Al Zahir', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(233, 'Al Zahir', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(234, 'Gafat Al Nayyar', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(235, 'Jabel Al Hafeet', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(236, 'Nahel', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(237, 'Remah', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(238, 'Shwaib', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(239, 'Um El Zumool', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(240, 'Um Ghafa', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(241, 'Zakher', 7, 'en', '2015-04-27 07:45:37', '2015-04-27 07:45:37'),
(242, 'Al Faseel', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(243, 'Fujairah Freezone', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(244, 'Gurfah', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(245, 'Merashid', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(246, 'Sakamkam', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(247, 'Saniaya', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(248, 'Sharm', 8, 'en', '2015-04-27 07:47:03', '2015-04-27 07:47:03'),
(249, 'Abu Hail', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(250, 'Acacia Avenues', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(251, 'Academic City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(252, 'Akoya', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(253, 'Akoya Oxygen', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(254, 'Al Barari', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(255, 'Al Barsha', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(256, 'Al Furjan', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(257, 'Al Ghurair City Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(258, 'Al Jadaf', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(259, 'Al Jafiliya', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(260, 'Al Khawaneej', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(261, 'Al Mamzar', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(262, 'Al Manara', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(263, 'Al Mizhar', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(264, 'Al Nahda', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(265, 'Al Quoz', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(266, 'Al Qusais', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(267, 'Al Safa', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(268, 'Al Sufouh', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(269, 'Al Twar', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(270, 'Al Waha', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(271, 'Al Warqaa', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(272, 'Al Wuheida', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(273, 'American Hospital', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(274, 'Aqua Dunya', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(275, 'Arabian Ranches', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(276, 'Arjan', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(277, 'Baniyas Square', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(278, 'Bawadi', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(279, 'Bur Dubai', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(280, 'Burj Al Arab Hotel', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(281, 'Burj Khalifa Tower', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(282, 'Burjuman Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(283, 'Business Bay', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(284, 'Business Bay Bridge', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(285, 'Business Park Motor City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(286, 'Century Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(287, 'City of Arabia', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(288, 'Clock Tower', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(289, 'Creek Golf & Yacht Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(290, 'Creek Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(291, 'Culture Village', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(292, 'Deema', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(293, 'Deira', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(294, 'Deira City Centre Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(295, 'DIFC', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(296, 'DIFC Gate Building', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(297, 'Discovery Gardens', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(298, 'DMC, DIC & KV Freezones', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(299, 'Down Town Jebel Ali', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(300, 'Downtown Dubai', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(301, 'Dragon Mart', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(302, 'Dubai Airport Free Zone', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(303, 'Dubai Autodrome', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(304, 'Dubai Creek Golf Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(305, 'Dubai Festival City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(306, 'Dubai Hills', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(307, 'Dubai Hospital', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(308, 'Dubai Industrial City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(309, 'Dubai International Airport', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(310, 'Dubai International Airport', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(311, 'Dubai Internet City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(312, 'Dubai Investment Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(313, 'Dubai Lagoon', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(314, 'Dubai Land', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(315, 'Dubai Marina', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(316, 'Dubai Media City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(317, 'Dubai Museum', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(318, 'Dubai Outlet Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(319, 'Dubai Silicon Oasis', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(320, 'Dubai Sports City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(321, 'Dubai Studio City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(322, 'Dubai Tennis Stadium', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(323, 'Dubai World Central', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(324, 'Dubai World Trade Centre', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(325, 'Dubiotech', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(326, 'Emaar Business Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(327, 'Emirates Hills', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(328, 'Emirates Living', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(329, 'Emirates Towers', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(330, 'Executive Towers', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(331, 'Falcon City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(332, 'Floating Bridge', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(333, 'Forat', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(334, 'Four Seasons Golf Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(335, 'Garhoud', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(336, 'Garhoud Bridge', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(337, 'Ghadeer Community', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(338, 'Ghantoot Race Course and Polo Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(339, 'Golf City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(340, 'Green Community', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(341, 'Green Community Market', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(342, 'Green Community Motor City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(343, 'Hamriya Port', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(344, 'Hattan 1', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(345, 'Hattan 2', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(346, 'Hattan 3', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(347, 'Hor Al Anz', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(348, 'Ibn Batuta Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(349, 'IMPZ International Media Production Zone', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(350, 'International City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(351, 'International Modern Hospital', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(352, 'JAFZA Jebel Ali Free Zone', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(353, 'JAFZA Jebel Ali Free Zone', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(354, 'JBR Jumeirah Beach Residence', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(355, 'Jebel Ali', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(356, 'Jebel Ali Airport (planned)', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(357, 'Jebel Ali Business Centre', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(358, 'Jebel Ali Industrial Area', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(359, 'Jebel Ali Village', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(360, 'JLT Jumeirah Lake Towers', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(361, 'Jumeirah', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(362, 'Jumeirah Beach Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(363, 'Jumeirah Golf Estates', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(364, 'Jumeirah Heights', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(365, 'Jumeirah Islands', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(366, 'Jumeirah Mosque', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(367, 'Jumeirah Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(368, 'Jumeirah Village', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(369, 'Jumeirah Village Circle', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(370, 'Jumeirah Village Triangle', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(371, 'Karama', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(372, 'Knowledge Village', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(373, 'Legends Dubai', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(374, 'Living Legends', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(375, 'Maeen', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(376, 'Majan', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(377, 'Maktoum Bridge', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(378, 'Mall of the Emirates', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(379, 'Mamzar Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(380, 'Marina Walk', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(381, 'Maritime City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(382, 'Meadows Town Centre', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(383, 'Mercato Shopping Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(384, 'Meydan City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(385, 'Mira', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(386, 'Mirdif', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(387, 'Mohammed Bin Rashid City District One', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(388, 'Montgomerie Golf Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(389, 'Motor City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(390, 'Mudon', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(391, 'Muhaisnah', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(392, 'Mushrif Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(393, 'Nad Al Hamar', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(394, 'Nad Al Shiba', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(395, 'Nad Al Shiba Horse Racing', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(396, 'Naif', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(397, 'Oasis Towers', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(398, 'Old Town', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(399, 'Oud Al Muteena', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(400, 'Oud Metha', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(401, 'Pacific Village', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(402, 'Palm Deira', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(403, 'Palm Jebel Ali', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(404, 'Palm Jebel Ali Gate', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(405, 'Palm Jebel Ali Gate', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(406, 'Pearl Jumeirah', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(407, 'Ras Al Khor', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(408, 'Rashidiya', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(409, 'Reem', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(410, 'Remraam', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(411, 'Residential City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(412, 'Ritaj', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(413, 'Safa Park', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(414, 'Satwa', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(415, 'Satwa Round About', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(416, 'Sheikh Zayed Road', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(417, 'Shindagha Tunnel', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(418, 'Silicon Oasis', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(419, 'Sonapur', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(420, 'Southridge/Burj Views', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(421, 'Tecom - Dubai Media City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(422, 'The Dubai Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(423, 'The Gardens', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(424, 'The Greens & The Views', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(425, 'The Hills', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(426, 'The Lagoons', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(427, 'The Lakes', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(428, 'The Meadows', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(429, 'The Palm Deira', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(430, 'The Palm Jebel Ali', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(431, 'The Palm Jebel Ali Gate', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(432, 'The Palm Jumeirah', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(433, 'The Plantation, Equestrian & Polo Club', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(434, 'The Royal Estates', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(435, 'The Springs', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(436, 'The Villa', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(437, 'The World', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(438, 'Tijara Town', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(439, 'Time Square Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(440, 'Trade Centre', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(441, 'Umm Al Sheif', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(442, 'Umm Ramool', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(443, 'Umm Suqeim', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(444, 'Umm Suqeim Public Beach', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(445, 'Up Town Motor City', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(446, 'Uptown Mirdif', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(447, 'Uptown Mirdiff Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(448, 'Victory Heights', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(449, 'Wadi Almardi', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(450, 'Wafi City Mall', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(451, 'Warsan', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(452, 'Waterfront Jebel Ali', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(453, 'Whispering Pines', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(454, 'Zabeel', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(455, 'Zabeel Palace', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(456, 'Zen by Indigo', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(457, 'Zulal', 4, 'en', '2015-04-27 07:48:18', '2015-04-27 07:48:18'),
(458, 'Abu ShagØ§ara', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(459, 'Al Abar', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(460, 'Al Azra', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(461, 'Al Darari', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(462, 'Al Falaj', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(463, 'Al Fayha', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(464, 'Al Fisht', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(465, 'Al Ghaphia', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(466, 'Al Gharayen', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(467, 'Al Gharb', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(468, 'Al Ghubaiba', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(469, 'Al Ghuwair', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(470, 'Al Goaz', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(471, 'Al Hazana', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(472, 'Al Heera', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(473, 'Al Jazzat', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(474, 'Al Jubail', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(475, 'Al Juraina', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(476, 'Al khaledia', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(477, 'Al Khan', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(478, 'Al khezamia', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(479, 'Al Layyeh', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(480, 'Al Mahatah', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(481, 'Al Majaz', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(482, 'Al Mamzar', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(483, 'Al Manakh', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(484, 'Al Mansura', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(485, 'Al Mareija', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(486, 'Al Mujarrah', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(487, 'Al Musalla', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(488, 'Al Nabba', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(489, 'Al Nahda', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(490, 'Al Nasserya', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(491, 'Al Noaf', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(492, 'Al Nud', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(493, 'Al Qadisia', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(494, 'Al Qasba', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(495, 'Al Qasimia', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(496, 'Al Qulayaa', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(497, 'Al Ramaqta', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(498, 'Al Ramla ', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(499, 'Al Ramtha', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(500, 'Al Rifah', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(501, 'Al Riffa', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(502, 'Al Sabkha', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(503, 'Al Sajaa', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(504, 'Al Shahba', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(505, 'Al Shuwaihean', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(506, 'Al Soor', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(507, 'Al Sweihat', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(508, 'Al Tai', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(509, 'Al turrfa', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(510, 'Al Yarmook', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(511, 'Bu Tina', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(512, 'Corniche Al Buhaira', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(513, 'Dasman', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(514, 'Elyash', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(515, 'Halwan Suburb', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(516, 'Hoshi Area', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(517, 'Industrial Area 1', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(518, 'Industrial Area 10', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(519, 'Industrial Area 11', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(520, 'Industrial Area 12', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(521, 'Industrial Area 13', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(522, 'Industrial Area 15', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(523, 'Industrial Area 17', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(524, 'Industrial Area 2', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(525, 'Industrial Area 3', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(526, 'Industrial Area 4', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(527, 'Industrial Area 5', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(528, 'Industrial Area 6', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(529, 'Industrial Area 7', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(530, 'Industrial Area 8', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(531, 'Industrial Area 9', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(532, 'Maysaloon', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(533, 'Muwafjah', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(534, 'Muwaileh', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(535, 'Muwailih Commercial', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(536, 'Rolla Area', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(537, 'Saif Zone', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(538, 'Samnan', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(539, 'Sharjah Industrial Area', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(540, 'Sharqan', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(541, 'Tilal City', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(542, 'Um Tarrafa', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(543, 'University City', 3, 'en', '2015-04-27 07:49:45', '2015-04-27 07:49:45'),
(544, 'Al Darbijaniyah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(545, 'Al Dhaith North', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(546, 'Al Dhaith South', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(547, 'Al Duhaisah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(548, 'Al Faslayn', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(549, 'Al Ghubb', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(550, 'Al Hamra', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(551, 'Al Hudaibah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(552, 'Al Juwais', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(553, 'Al Kharran', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(554, 'Al Mairid', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(555, 'Al Mamourah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(556, 'Al Marjan Island', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(557, 'AL Mataf', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(558, 'Al Nadiyah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(559, 'Al Nakheel', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(560, 'Al Nudood', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(561, 'Al Qir', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(562, 'Al Qurm', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(563, 'Al Qusaidat', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(564, 'Al Rams', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(565, 'Al Seer', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(566, 'Al Sharishah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(567, 'Al Turfa', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(568, 'Al Uraibi', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(569, 'Bab Al Bahr', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(570, 'Cove', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(571, 'Dafan Al Khor', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(572, 'Dahan', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(573, 'Ghalilah', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(574, 'Khuzam', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(575, 'Mina Al Arab', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(576, 'RAK City', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(577, 'Seih', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(578, 'Shamal Julphar', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(579, 'Shams', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(580, 'Sidroh', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(581, 'Yasmin Village', 9, 'en', '2015-04-27 07:51:05', '2015-04-27 07:51:05'),
(582, 'Al Aahad', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(583, 'Al Dar Al Baida', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(584, 'Al Haditha', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(585, 'Al Hawiyah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(586, 'Al Humrah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(587, 'Al Khor', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(588, 'Al Maidan', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(589, 'Al Raas', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(590, 'Al Ramlah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(591, 'Al Raudah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(592, 'Al Riqqah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(593, 'Al Salamah', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(594, 'Defence Camp', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(595, 'Masjid Al Mazroui', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(596, 'Old Town Area', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(597, 'U.A.Q Industrial Area', 10, 'en', '2015-04-27 07:52:06', '2015-04-27 07:52:06'),
(600, 'آل سجى', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(601, 'أبو شغارة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(602, 'أم طرفة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(603, 'الآبار', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(604, 'الجبيل', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(605, 'الجرينة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(606, 'الجزات', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(607, 'الحزانة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(608, 'الخالدية', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(609, 'الخان', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(610, 'الخزًامية', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(611, 'الدراري', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(612, 'الرفاع', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(613, 'الرفعة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(614, 'الرمثاء', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(615, 'الرمقطة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(616, 'الرًملة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(617, 'السبخة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(618, 'السور', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(619, 'السويهات', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(620, 'الشهبة', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(621, 'الشويهين', 3, 'ar', '2015-05-24 07:40:54', '2015-05-24 07:40:54'),
(622, 'الصناعية 1', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(623, 'الصناعية 10', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(624, 'الصناعية 11', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(625, 'الصناعية 12', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(626, 'الصناعية 13', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(627, 'الصناعية 15', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(628, 'الصناعية 17', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(629, 'الصناعية 2', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(630, 'الصناعية 3', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(631, 'الصناعية 4', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(632, 'الصناعية 5', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(633, 'الصناعية 6', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(634, 'الصناعية 7', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(635, 'الصناعية 8', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(636, 'الصناعية 9', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(637, 'الطائي', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(638, 'الطرفة', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(639, 'الطلعة', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(640, 'العذراء', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(641, 'الغافية', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(642, 'الغبيبة', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(643, 'الغراين', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(644, 'الغرب', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(645, 'الغوير', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(646, 'الفشت', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(647, 'الفلاج', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(648, 'الفيحاء', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(649, 'القاسمية', 3, 'ar', '2015-05-24 07:40:55', '2015-05-24 07:40:55'),
(650, 'القصباء', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(651, 'القصيدية', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(652, 'القلبا', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(653, 'القواز', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(654, 'المجاز', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(655, 'المجًرة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56');
INSERT INTO `seha_region` (`id`, `reg_name`, `city_pk`, `lang`, `created_on`, `updated_on`) VALUES
(656, 'المحطة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(657, 'المدينة الجامعية', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(658, 'المريجة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(659, 'المصلى', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(660, 'الممزر', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(661, 'المناخ', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(662, 'المنصورة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(663, 'المنطقة الصناعية بالشارقة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(664, 'النبًا', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(665, 'النصيرية', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(666, 'النهدة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(667, 'النواف', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(668, 'النود', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(669, 'الهيرة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(670, 'الياش', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(671, 'اليرموك', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(672, 'بو طينة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(673, 'تلال مدينة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(674, 'داسمان', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(675, 'رولا المنطقة', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(676, 'سمنان', 3, 'ar', '2015-05-24 07:40:56', '2015-05-24 07:40:56'),
(677, 'شرقان', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(678, 'ضاحية حلوان', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(679, 'كورنيش البحيرة', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(680, 'لياح', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(681, 'منطقة السيف', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(682, 'منطقة هوشي', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(683, 'موقجة', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(684, 'مويلح', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(685, 'مويلح التجاري', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(686, 'ميسلون', 3, 'ar', '2015-05-24 07:40:57', '2015-05-24 07:40:57'),
(687, '', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(688, '', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(689, ' قرية مارينافي ياس الشمالية', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(690, ' منتجعات و وصلات جزيرة ياس ووترفرونت', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(691, ' منطقة ترفيه جزيرة ياس', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(692, 'ADAFZA', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(693, 'آل الفيلات البطين', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(694, 'آل شارع الخليج العربي', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(695, 'آل مجتمع الشعاب المرجانية', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(696, 'أبو ظبي للفورمولا 1', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(697, 'أرزنه', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(698, 'أم النار', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(699, 'إليكترا', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(700, 'الأمن', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(701, 'الاتحاد', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(702, 'الباهيا بارك', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(703, 'الباهية', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(704, 'البطين', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(705, 'البطين مول', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(706, 'البندر', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(707, 'البوابه الرئيسية ICAD', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(708, 'الثريا', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(709, 'الحصن', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(710, 'الخالدية', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(711, 'الخالدية مول', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(712, 'الخبيرة', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(713, 'الدانة', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(714, 'الراحة مول', 5, 'ar', '2015-05-24 07:43:43', '2015-05-24 07:43:43'),
(715, 'الرحبة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(716, 'الرزيم', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(717, 'الرميلة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(718, 'الروضة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(719, 'الريحان', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(720, 'الريف', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(721, 'الريف داون تاون', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(722, 'الزعاب', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(723, 'الزهراء', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(724, 'الزهية', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(725, 'الزينة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(726, 'السفرات', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(727, 'السفير مول', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(728, 'السيف', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(729, 'الشارع ليوا', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(730, 'الشاطئ', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(731, 'الشليلة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(732, 'الشمخة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(733, 'الشهامة الجديدة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(734, 'الشوامخ', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(735, 'الشيخ خليفة بارك', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(736, 'الضفرة', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(737, 'الطريق الشرقي', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(738, 'العاصمة بلاز', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(739, 'الغاف بارك', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(740, 'القبيسات', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(741, 'القرم', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(742, 'القرم حدائق', 5, 'ar', '2015-05-24 07:43:44', '2015-05-24 07:43:44'),
(743, 'القرم مانجروف', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(744, 'القرية المتوسطية', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(745, 'الكرامة', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(746, 'الليسيلى', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(747, 'المدينة الرياضية', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(748, 'المركزية', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(749, 'المرور', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(750, 'المشرف', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(751, 'المصفح', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(752, 'المصفح شرق', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(753, 'المصلى', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(754, 'المطر', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(755, 'المفرق', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(756, 'المقطاع', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(757, 'المناصير', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(758, 'المنطقة الحرة في مطار أبو ظبي', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(759, 'المنهل', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(760, 'المنيرة', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(761, 'الموزون', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(762, 'المينا', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(763, 'النهضة', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(764, 'النهيان', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(765, 'الوحدة', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(766, 'الوحدة مول', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(767, 'بلغيلم', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(768, 'بني ياس', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(769, 'بني ياس سيتي', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(770, 'بين الجسرين', 5, 'ar', '2015-05-24 07:43:45', '2015-05-24 07:43:45'),
(771, 'جامعة أبو ظبي', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(772, 'جايت ديستركت', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(773, 'جزيرة أبو ظبي', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(774, 'جزيرة أم يفينة', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(775, 'جزيرة الريم', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(776, 'جزيرة السعديات', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(777, 'جزيرة السواح', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(778, 'جزيرة القرية', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(779, 'جزيرة اللولو', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(780, 'جزيرة بلرمد', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(781, 'جزيرة جوز الهند', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(782, 'جزيرة حضيرات', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(783, 'جزيرة ساس النخل', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(784, 'جزيرة سمالية', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(785, 'جزيرة فطيسي', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(786, 'جزيرة ياس', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(787, 'جزيرة ياس الشمالية سكن و جولف', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(788, 'جنوب جزيرة حضيرات', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(789, 'جنوب قرية مارينا ياس ', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(790, 'جولف حدائق', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(791, 'حدائق الراحة', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(792, 'حدائق بلووم ', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(793, 'حلبة مرسى ياس ', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(794, 'حمدان سنتر', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(795, 'خليج زايد', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(796, 'خور الراحة', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(797, 'دانة أبو ظبي', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(798, 'دوار قرقاش ', 5, 'ar', '2015-05-24 07:43:46', '2015-05-24 07:43:46'),
(799, 'رأس الاخضر', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(800, 'روضة', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(801, 'سوق الشهامة ', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(802, 'سيتي سنتر أبوظبي', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(803, 'شارع الدفاع', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(804, 'شارع السلام', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(805, 'شارع خليفة', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(806, 'شارع دلما', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(807, 'شاطئ الراحة', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(808, 'شاطئ سعديات', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(809, 'شمس أبو ظبي', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(810, 'ضباط منطقة النادي', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(811, 'طموح CBD', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(812, 'طموح مارينا سكوير', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(813, 'فلل ساس النخل', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(814, 'قرية الصحراء', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(815, 'قرية الغدير', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(816, 'قرية المعاصرة', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(817, 'قرية عربية', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(818, 'قرية مارينا', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(819, 'قرية هيدرا', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(820, 'قرية ياس', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(821, 'قسم شرطة المرور', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(822, 'قصر الإمارات', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(823, 'قصر البحر', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(824, 'قصر الشاطئ', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(825, 'كتلة جزيرة بسرة فهد ', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(826, 'كتلة جزيرة بلغيلم ', 5, 'ar', '2015-05-24 07:43:47', '2015-05-24 07:43:47'),
(827, 'كورنيش', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(828, 'مارينا السعديات', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(829, 'مارينا مول', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(830, 'متحف جوجنهايم و لوفر', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(831, 'محمية الأراضي الرطبة بالسعديات', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(832, 'مدينة أبوظبي الصناعية', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(833, 'مدينة الأنوار', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(834, 'مدينة الضباط ', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(835, 'مدينة الفلاح', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(836, 'مدينة بوابة أبوظبي', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(837, 'مدينة خليفة A', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(838, 'مدينة خليفة B', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(839, 'مدينة خليفة C', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(840, 'مدينة زايد', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(841, 'مدينة زايد الرياضية', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(842, 'مدينة محمد بن زايد', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(843, 'مدينة مصدر', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(844, 'مدينة هيدرا ', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(845, 'مركز أبو ظبي ', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(846, 'مركز أبو ظبي الوطني للمعارض', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(847, 'مركز مدينة زايد للتسوق', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(848, 'مستشفى أبوظبي للصقور', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(849, 'مستشفى المفرق', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(850, 'مستشفى لايفلاين', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(851, 'مسجد الشيخ زايد ', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(852, 'مطار أبو ظبي الدولي', 5, 'ar', '2015-05-24 07:43:48', '2015-05-24 07:43:48'),
(853, 'مطار أبو ظبي الدولي مبنى 1', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(854, 'مطار البطين', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(855, 'معتكف سعديات ', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(856, 'ممشى جنوب شاطىء السعديات ', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(857, 'منطقة السعديات الثقافية', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(858, 'منطقة المانغروف الشمالية', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(859, 'منطقة المصفح السكنية و التجارية', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(860, 'منطقة المصفح الصناعية', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(861, 'منطقة النادي السياحي', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(862, 'موتور ورلد', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(863, 'مينا مول', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(864, 'نادي أبو ظبي للفروسية و الجولف', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(865, 'نادي أبوظبي للجولف و السبا', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(866, 'نادي الغزال للجولف', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(867, 'نجمة', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(868, 'نجمة ريم مارينا', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(869, 'نوراى ايلاند', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(870, 'هضبة الزعفرانة', 5, 'ar', '2015-05-24 07:43:49', '2015-05-24 07:43:49'),
(871, 'Al Nuaimia', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(872, 'آل صوان', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(873, 'آل موا هات', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(874, 'آل هيليو', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(875, 'البستان', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(876, 'البطين', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(877, 'الجرف', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(878, 'الحمرية', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(879, 'الراشدية', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(880, 'الرميلة', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(881, 'الزهراء', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(882, 'الشيخ خليفة بن زايد', 6, 'ar', '2015-05-24 07:46:49', '2015-05-24 07:46:49'),
(883, 'المنامة', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(884, 'النخيل', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(885, 'الوان', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(886, 'جزيرة صفيًة', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(887, 'عجمان الصناعية', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(888, 'مشيرف', 6, 'ar', '2015-05-24 07:46:50', '2015-05-24 07:46:50'),
(889, 'أبو حريبة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(890, 'أبو سمره', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(891, 'أبو كريه', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(892, 'أم الزمول', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(893, 'أم غافة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(894, 'البطين', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(895, 'البطين', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(896, 'الجيمي', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(897, 'الخبيصي', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(898, 'الخزنة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(899, 'الروضة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(900, 'الزاهر', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(901, 'الزاهير', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(902, 'السلامات', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(903, 'الشويب', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(904, 'الصناعية', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(905, 'الطوية', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(906, 'الظاهرة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(907, 'العقابية', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(908, 'الفوعة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(909, 'القريّة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(910, 'القطارة', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(911, 'القوع', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(912, 'المربع', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(913, 'المسعودي', 7, 'ar', '2015-05-24 07:49:01', '2015-05-24 07:49:01'),
(914, 'المطوعه', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(915, 'المعترض', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(916, 'المقام', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(917, 'المويجعي', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(918, 'النيادات', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(919, 'الهير', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(920, 'الهيلي', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(921, 'الوقن', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(922, 'جبل حفيت', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(923, 'رماح', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(924, 'زاخر', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(925, 'غافات النيار', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(926, 'فلج هزاع', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(927, 'ناهل', 7, 'ar', '2015-05-24 07:49:02', '2015-05-24 07:49:02'),
(928, '', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(929, '', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(930, '', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(931, '', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(932, '', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(933, ' بوابة نخلة جبل علي', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(934, '1 مدينة محمد بن راشد الحى رقم', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(935, 'أبتاون مردف', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(936, 'أبتاون مردف مول', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(937, 'أبراج الإمارات', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(938, 'أبراج الواحة', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(939, 'أبراج بحيرة الجميرا', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(940, 'أرجان', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(941, 'أساطير', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(942, 'أكوا دنيا', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(943, 'أم الشيف', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(944, 'أم رمول', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(945, 'أم سقيم', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(946, 'أولد تاون', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(947, 'إعمار بيزنس بارك', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(948, 'اب تاون موتور سيتي', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(949, 'ابو هيل', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(950, 'استاد دبي للتنس', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(951, 'الأبراج التنفيذية', 4, 'ar', '2015-05-24 07:51:57', '2015-05-24 07:51:57'),
(952, 'الإمارات ليفنج', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(953, 'البحيرات', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(954, 'البراري', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(955, 'البرشاء', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(956, 'التلال دبي', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(957, 'الجافليه', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(958, 'الجداف', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(959, 'الجسر العائم', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(960, 'الحدائق', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(961, 'الخوانيج', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(962, 'الخيران', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(963, 'الراشدية', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(964, 'الروضة و ذي فيوز', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(965, 'السطوة', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(966, 'السنط الأفنيوز', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(967, 'الشاطئ العام في أم سقيم ', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(968, 'الصفا', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(969, 'الصفوح', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(970, 'الطوار', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(971, 'العقارات المالكة', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(972, 'الفرات', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(973, 'الفرجان', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(974, 'القرهود', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(975, 'القصيص', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(976, 'القوز', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(977, 'الكرامة', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(978, 'المجتمع الغدير', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(979, 'المدينة البحرية', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(980, 'المدينة العالمية', 4, 'ar', '2015-05-24 07:51:58', '2015-05-24 07:51:58'),
(981, 'المرابع العربية', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(982, 'المروج', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(983, 'المزهر', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(984, 'المستشفى الأمريكي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(985, 'المستشفى الدولي الحديث', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(986, 'الممزر', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(987, 'المنارة', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(988, 'المناطق الحرة ل DMC، مدينة دبي للإنترنت و قرية المعرفة ', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(989, 'المنطقة الحرة بمطار دبي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(990, 'المنطقة الصناعية بجبل علي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(991, 'النهدة', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(992, 'الواجهة البحرية في جبل علي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(993, 'الواحة', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(994, 'الوحيدة', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(995, 'الورقاء', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(996, 'الينابيع', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(997, 'بارك الأعمال موتور سيتي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(998, 'بر دبي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(999, 'برج خليفة', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1000, 'بوابة مبنى مركز دبي المالي العالمي ', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1001, 'بوابة نخلة جبل علي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1002, 'بوابة نخلة جبل علي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1003, 'بوادي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1004, 'تايمز سكوير سنتر', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1005, 'تجارة تاون', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1006, 'تلال الإمارات', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1007, 'تيكوم - مدينة دبي للإعلام', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1008, 'جبل علي', 4, 'ar', '2015-05-24 07:51:59', '2015-05-24 07:51:59'),
(1009, 'جرين كوميونيتي', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1010, 'جرين كوميونيتي موتور سيتي', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1011, 'جزر العالم', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1012, 'جزر جميرا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1013, 'جزيرة النخلة جبل علي', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1014, 'جزيرة النخلة جبل علي', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1015, 'جزيرة النخلة جميرا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1016, 'جزيرة النخلة ديرة', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1017, 'جزيرة النخلة ديرة', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1018, 'جسر القرهود', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1019, 'جسر المكتوم', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1020, 'جسر خليج التجارة', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1021, 'جميرا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1022, 'جميرا بارك', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1023, 'جميرا بيتش ريزيدنس', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1024, 'جولف سيتى', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1025, 'حديقة الخور', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1026, 'حديقة الصفا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1027, 'حديقة الممزر', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1028, 'حديقة مشرف', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1029, 'حلبة دبي أوتودروم', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1030, 'خليج التجارة', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1031, 'دائرة قرية جميرا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1032, 'دبي أوتلت مول', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1033, 'دبي فيستيفال سيتي', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1034, 'دبي لاجون', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1035, 'دبي لاند', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1036, 'دبي مارينا', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1037, 'دبي وورلد سنترال', 4, 'ar', '2015-05-24 07:52:00', '2015-05-24 07:52:00'),
(1038, 'دبيوتك', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1039, 'دوار الساعة', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1040, 'دوار السطوة', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1041, 'ديرة', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1042, 'ديرة سيتي سنتر ', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1043, 'ديسكفري جاردنز', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1044, 'ديما', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1045, 'ذا فيلا', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1046, 'رأس الخور', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1047, 'رمرام', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1048, 'ريتاج', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1049, 'ريم', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1050, 'زعبيل', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1051, 'زلال', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1052, 'زن بواسطة النيلي', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1053, 'ساحة بني ياس', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1054, 'ساوثريدج / إطلالة على برج دبي', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1055, 'سلطة و ميناء المنطقة الحرة بجبل علي', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1056, 'سلطة و ميناء المنطقة الحرة بجبل علي ', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1057, 'سنتشري مول', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1058, 'سوق التنين', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1059, 'سوق جرين كوميونيتي ', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1060, 'سونابور', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1061, 'سيتي اوف ارابيا', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1062, 'شارع الشيخ زايد', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1063, 'شاطئ الجميرا', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1064, 'عقارات جميرا للجولف', 4, 'ar', '2015-05-24 07:52:01', '2015-05-24 07:52:01'),
(1065, 'عود المطينة', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1066, 'عود ميثاء', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1067, 'فالكون سيتي', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1068, 'فندق برج العرب', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1069, 'قرية الثقافة', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1070, 'قرية المحيط الهادئ', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1071, 'قرية المعرفة', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1072, 'قرية جبل علي', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1073, 'قرية جميرا', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1074, 'قصر زعبيل', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1075, 'لؤلؤة جميرا', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1076, 'ليجندز دبي', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1077, 'ماعين', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1078, 'متحف دبي', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1079, 'مثلث قرية الجميرا', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1080, 'مجمع دبي للاستثمار', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1081, 'مجن', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1082, 'محيصنة', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1083, 'مدن', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1084, 'مدينة دبي الأكاديمية', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1085, 'مدينة دبي الرياضية', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1086, 'مدينة دبي الصناعية', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1087, 'مدينة دبي للإعلام', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1088, 'مدينة دبي للإنترنت', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1089, 'مدينة دبي للاستوديوهات', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1090, 'مدينة سكنية', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1091, 'مرتفعات جميرا', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1092, 'مردف', 4, 'ar', '2015-05-24 07:52:02', '2015-05-24 07:52:02'),
(1093, 'مركز أعمال جبل علي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1094, 'مركز ابن بطوطة', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1095, 'مركز التجارة', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1096, 'مركز الغرير للتسوق', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1097, 'مركز برجمان للتسوق', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1098, 'مركز دبي التجاري العالمي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1099, 'مركز دبي المالي العالمي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1100, 'مركز ميركاتو', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1101, 'مستشفى دبي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1102, 'مسجد الجميرا', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1103, 'مضمار مدينة', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1104, 'مطار جبل علي (المخطط)', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1105, 'مطار دبي الدولي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1106, 'مطار دبي الدولي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1107, 'ممشى مارينا', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1108, 'منطقة الإنتاج الإعلامي العالمية ', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1109, 'موتور سيتي', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1110, 'مول الإمارات', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1111, 'مونتغمري جولف كلوب', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1112, 'ميدوز تاون سنتر', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1113, 'ميرا', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1114, 'ميناء الحمرية', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1115, 'نادي خور دبي لليخوت و الغولف ', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1116, 'نادي الغولف فور سيزونز', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1117, 'نادي بلانتيشن للفروسية و البولو', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1118, 'نادي خور دبي للجولف', 4, 'ar', '2015-05-24 07:52:03', '2015-05-24 07:52:03'),
(1119, 'نادي غنتوت لمضمار السباق و البولو', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1120, 'نايف', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1121, 'ند الحمر', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1122, 'ند الشبا', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1123, 'ند الشبا لسباقات الخيول', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1124, 'نفق الشندغة', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1125, 'هتان 1', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1126, 'هتان 2', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1127, 'هتان 3', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1128, 'هور العنز', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1129, 'واحة دبي للسيليكون', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1130, 'وادي الأمردي', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1131, 'وافي سيتي مول', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1132, 'ورسان', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1133, 'وصط مدينة جبل علي', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1134, 'وهيلس', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1135, 'يهمس بينس', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1136, '‫فيكتوري هايتس‬', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1137, '‫‫وسط المدينة', 4, 'ar', '2015-05-24 07:52:04', '2015-05-24 07:52:04'),
(1138, 'الترفة', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1139, 'الجويس', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1140, 'الحضيبة', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1141, 'الحمرا', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1142, 'الخران', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1143, 'الدربجيانية', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1144, 'الدهيسة', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1145, 'الديث جنوب', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1146, 'الديث شمال', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1147, 'الرمس', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1148, 'السير', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1149, 'الشريشة', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1150, 'العريبي', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1151, 'الغب', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1152, 'الفصلين', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1153, 'القرم', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1154, 'القسيدات', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1155, 'القير', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1156, 'المرجان ايلاند', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1157, 'المطاف', 9, 'ar', '2015-05-24 07:54:16', '2015-05-24 07:54:16'),
(1158, 'المعمورة', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1159, 'الميرد', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1160, 'النخيل', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1161, 'الندود', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1162, 'الندية', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1163, 'باب البحر', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1164, 'جون خليج صغير', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1165, 'خزام', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1166, 'دفن الخور', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1167, 'دهن', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1168, 'سدروه', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1169, 'سيح', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1170, 'شمال جلفار', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1171, 'شمس', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1172, 'غليلة', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1173, 'قرية ياسمين', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1174, 'مدينة رأس الخيمة', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1175, 'ميناء العرب', 9, 'ar', '2015-05-24 07:54:17', '2015-05-24 07:54:17'),
(1176, 'الآحد', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1177, 'الحديثة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1178, 'الحمرة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1179, 'الخور', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1180, 'الدار البيضاء', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1181, 'الرأس', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1182, 'الرقة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1183, 'الرملة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1184, 'الروضة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1185, 'السلامة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1186, 'المدينة القديمة', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1187, 'المنطقة الصناعية', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1188, 'الميدان', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1189, 'الهوية', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1190, 'مخيم الدفاع', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1191, 'مسجد المزروئي', 10, 'ar', '2015-05-24 07:57:08', '2015-05-24 07:57:08'),
(1192, 'Dubai Health Care City', 4, 'en', '2015-11-02 15:53:47', '2015-11-02 15:53:47'),
(1193, 'مدينة دبي الطبية', 4, 'en', '2015-11-02 15:54:51', '2015-11-02 15:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `seha_roles`
--

CREATE TABLE `seha_roles` (
  `role_id` int(2) NOT NULL,
  `name` varchar(45) NOT NULL,
  `role_nicename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_roles`
--

INSERT INTO `seha_roles` (`role_id`, `name`, `role_nicename`) VALUES
(1, 'seha_super_admin', 'Super Admin'),
(2, 'seha_admins', 'Administrators'),
(3, 'seha_users', 'Normal User'),
(4, 'seha_public_user', 'Seha Public User');

-- --------------------------------------------------------

--
-- Table structure for table `seha_slides`
--

CREATE TABLE `seha_slides` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `dept_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_slides`
--

INSERT INTO `seha_slides` (`id`, `image_url`, `url`, `is_active`, `dept_id`, `created_on`, `updated_on`) VALUES
(2, '130162591b2ca71b8c4488854d580c42.png', 'http://360seha.com', 'Y', 2, '2016-02-21 15:43:36', '2016-09-15 13:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `seha_slides_depts`
--

CREATE TABLE `seha_slides_depts` (
  `banner_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_slides_depts`
--

INSERT INTO `seha_slides_depts` (`banner_id`, `dept_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `seha_specializations`
--

CREATE TABLE `seha_specializations` (
  `id` int(11) NOT NULL,
  `title_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_specializations`
--

INSERT INTO `seha_specializations` (`id`, `title_en`, `title_ar`, `dept_id`, `show_status`, `created_on`, `updated_on`) VALUES
(1, 'Teeth Whitening', 'تبييض الأسنان', 2, 1, '2016-06-19 13:40:59', '2016-06-23 15:43:00'),
(2, 'Dental Implants', 'زراعة الأسنان', 2, 1, '2016-06-19 13:41:14', '2016-06-23 15:43:52'),
(4, 'hollywood smile', 'ابتسامة هوليود', 2, 1, '2016-06-23 15:45:23', '2016-06-23 15:49:26'),
(5, 'Root Canal Procedure', 'علاج قناة الجذر', 2, 1, '2016-06-23 15:48:31', '2016-06-23 15:48:31'),
(6, 'Tooth Extraction', 'قلع الاسنان', 2, 1, '2016-06-23 15:49:17', '2016-06-23 15:49:17'),
(7, 'Tooth Filling Procedure', 'حشو الاسنان', 2, 1, '2016-06-23 15:50:04', '2016-06-23 15:50:04'),
(8, 'Dental Crowns', 'تلبيس الاسنان', 2, 1, '2016-06-23 15:50:43', '2016-06-23 15:50:43'),
(9, 'Breast Reconstruction Without Implants', 'ترميم الثدي', 6, 1, '2016-06-23 15:53:38', '2016-06-23 15:53:38'),
(10, 'Lip Augmentation', 'نفخ الشفاه', 6, 1, '2016-06-23 15:54:24', '2016-06-23 15:54:24'),
(11, 'Hair Transplant', 'زرع الشعر', 6, 1, '2016-06-23 15:55:49', '2016-06-23 15:55:49'),
(12, 'Dermabration', 'تسحيج الجلد', 6, 1, '2016-06-23 15:59:35', '2016-06-23 15:59:35'),
(13, 'Laser Skin Resurfacing', 'تجديد سطح الجلد بالليزر', 6, 1, '2016-06-23 16:00:38', '2016-06-23 16:00:38'),
(14, 'Injectable Fillers (Wrinkle fillers)', 'ملء التجاعيد', 6, 1, '2016-06-23 16:01:07', '2016-06-23 16:01:07'),
(15, 'Cheek, Jaw, and Chin Implants', 'جراحة الوجه', 6, 1, '2016-06-23 16:01:38', '2016-06-23 16:01:38'),
(16, 'Liposuction (Under Chin)', 'شفط الدهون من الذقن', 6, 1, '2016-06-23 16:02:04', '2016-06-23 16:02:04'),
(17, 'Spider Veins and Varicose Veins', 'ازالة الاوردة عروق العنكبوت وتوسع الاوردة', 6, 1, '2016-06-23 16:02:42', '2016-06-23 16:02:42'),
(18, 'Cosmetic Tattooing (Lips, Eyebrows, Eyeliner)', 'المكياج الدائم', 6, 1, '2016-06-23 16:03:14', '2016-06-23 16:03:14'),
(19, 'Webbed finger or toe repair', 'ارتفاق الاصابع', 6, 1, '2016-06-23 16:03:43', '2016-06-23 16:03:43'),
(20, 'Blepharoplasty', 'راب الجفن', 6, 1, '2016-06-23 16:04:46', '2016-06-23 16:04:46'),
(21, 'Blepharoplasty', 'جراحة الجفون', 6, 1, '2016-06-23 16:05:12', '2016-06-23 16:05:12'),
(22, 'Rhinoplasty', 'جراحة الانف', 6, 1, '2016-06-23 16:11:20', '2016-06-23 16:11:20'),
(23, 'Breast Augmentation Surgery', 'تكبير الثدي', 6, 1, '2016-06-23 16:11:46', '2016-06-23 16:11:46'),
(24, 'Breast Reduction Surgery', 'تصغير الثدي', 6, 1, '2016-06-23 16:12:44', '2016-06-23 16:12:44'),
(25, 'Breast Reconstruction Surgery', 'اعادة بناء الثدي', 6, 1, '2016-06-23 16:13:09', '2016-06-23 16:13:09'),
(26, 'Face lift Surgery', 'شد الوجه', 6, 1, '2016-06-23 16:13:37', '2016-06-23 16:13:37'),
(27, 'Botox Injection', 'حقن البوتوكس', 6, 1, '2016-06-23 16:13:57', '2016-06-23 16:13:57'),
(28, 'Liposuction Surgery', 'شفط الدهون', 6, 1, '2016-06-23 16:16:20', '2016-06-23 16:16:20'),
(29, 'Abdominoplasty (“Tummy Tuck”)', 'شد البطن', 6, 1, '2016-06-23 16:16:50', '2016-06-23 16:16:50'),
(30, 'Laser Hair Removal', 'ازالة الشعر بالليزر', 6, 1, '2016-06-23 16:17:26', '2016-06-23 16:17:26'),
(31, 'Brow lift Surgery', 'رفع الحواجب', 6, 1, '2016-06-23 16:17:57', '2016-06-23 16:17:57'),
(32, 'Neck lift Surgery', 'شد الرقبة', 6, 1, '2016-06-23 16:18:17', '2016-06-23 16:18:17'),
(33, 'Brachioplasty (Upper Arm Lift)', 'عملية شد الذراعين', 6, 1, '2016-06-23 16:18:41', '2016-06-23 16:18:41'),
(34, 'Scar Revision Surgery', 'علاج الندب', 6, 1, '2016-06-23 16:19:06', '2016-06-23 16:19:06'),
(35, 'Laser Lipolysis', 'اذابة الدهون', 6, 1, '2016-06-23 16:19:28', '2016-06-23 16:19:28'),
(36, 'Breast Lift', 'رفع الثدي', 6, 1, '2016-06-23 16:20:00', '2016-06-23 16:20:00'),
(37, 'Hair Loss Treatment', 'علاج تساقط الشعر', 6, 1, '2016-06-23 16:20:22', '2016-06-23 16:20:22'),
(38, 'Peeling skin', 'تقشير البشرة', 6, 1, '2016-06-23 16:21:18', '2016-06-23 16:21:18'),
(39, 'Laser Tattoo Removal', 'ازالة الوشم بالليزر', 6, 1, '2016-06-23 16:21:51', '2016-06-23 16:21:51'),
(40, 'Orthodontics', 'تقويم الأسنان', 2, 1, '2016-06-23 16:29:32', '2016-06-25 13:40:51'),
(42, 'Erection problems', 'ضعف الانتصاب', 8, 1, '2016-06-25 14:16:27', '2016-06-25 14:16:27'),
(43, 'Premature ejaculation', 'سرعة القذف', 8, 1, '2016-06-25 14:17:18', '2016-06-25 14:17:18'),
(44, 'Male infertility', 'تأخر الانجاب وعقم الرجال', 8, 1, '2016-06-25 14:18:02', '2016-06-25 14:18:02'),
(45, 'Prostate diseases (inflammation -enlargement-tumour )', 'امراض البروستات (التهابات -تضخم -اورام).', 8, 1, '2016-06-25 14:18:35', '2016-06-25 14:18:35'),
(46, 'Gallstones Treatment', 'علاج الحصوات (تفتيت- مناظير –ليزر)', 8, 1, '2016-06-25 14:19:29', '2016-06-25 14:19:29'),
(47, 'Urinary incontinence', 'السلس البولي والتبول اللاارادي', 8, 1, '2016-06-25 14:19:58', '2016-06-25 14:19:58'),
(48, 'Follow up the pregnancy', 'متابعة الحمل', 9, 1, '2016-06-25 14:25:00', '2016-06-25 14:25:00'),
(49, 'normal and cesarean delivery', 'الولادة الطبيعية والقيصرية', 9, 1, '2016-06-25 14:26:22', '2016-06-25 14:26:22'),
(50, 'Pre- marriage medical checkup', 'الفحص الطبي قبل الزواج', 9, 1, '2016-06-25 14:26:57', '2016-06-25 14:26:57'),
(51, 'Supervising the infertility cases', 'الإشراف على حالات العقم', 9, 1, '2016-06-25 14:28:35', '2016-06-25 14:28:35'),
(52, 'Checking up the functions of the genital system', 'فحص وظائف الجهاز التناسلي', 9, 1, '2016-06-25 14:31:31', '2016-06-25 14:31:31'),
(53, 'Checking up the functions of breast', 'فحص وظائف الثدي', 9, 1, '2016-06-25 14:34:50', '2016-06-25 14:34:50'),
(54, 'Checking up the women general health', 'فحص الصحة العامة للنساء', 9, 1, '2016-06-25 14:35:43', '2016-06-25 14:35:43'),
(55, 'Early detection and prevention of cervix cancer', 'الكشف المبكر عن سرطان عنق الرحم', 9, 1, '2016-06-25 14:36:22', '2016-06-25 14:36:22'),
(56, 'Early detection and prevention of breast cancer', 'الكشف المبكر عن سرطان الثدي', 9, 1, '2016-06-25 14:37:08', '2016-06-25 14:37:08'),
(57, 'Provide vaccination to prevent cervix cancer', 'التطعيم المضاد لسرطان عنق الرحم', 9, 1, '2016-06-25 14:37:44', '2016-06-25 14:37:44'),
(58, 'Rhinoplasty', 'تجميل الأنف', 11, 1, '2016-06-25 15:02:03', '2016-06-25 15:02:03'),
(59, 'Nasal septum deviation surgery', 'تعديل الحاجز الأنفي', 11, 1, '2016-06-25 15:02:45', '2016-06-25 15:02:45'),
(60, 'Surgery of cochlear Baha implantation for hearing', 'تركيب جهاز الباهة لضعاف السمع', 11, 1, '2016-06-25 15:04:37', '2016-06-25 15:04:37'),
(61, 'Performance of hearing test for newborn babies', 'تقييم السمع لدى الأطفال وحديثي الولادة', 11, 1, '2016-06-25 15:05:12', '2016-06-25 15:05:12'),
(62, 'Performance of middle ear surgery by microscope', 'أمراض الأذن الوسطى وجراحتها بواسطة المايكروسكوب', 11, 1, '2016-06-25 15:05:54', '2016-06-25 15:05:54'),
(63, 'Tinnitus', 'طنين الاذن', 11, 1, '2016-06-25 15:06:24', '2016-06-25 15:06:24'),
(64, 'Allergic Rhinitis, Sinusitis, and Rhinosinusitis', 'التهاب وحساسية الأنف والجيوب الأنفية', 11, 1, '2016-06-25 15:06:55', '2016-06-25 15:06:55'),
(65, 'Endoscopy of the nose, throat and larynx', 'تنظير الأنف والحلق والحنجرة.', 11, 1, '2016-06-25 15:07:33', '2016-06-25 15:07:33'),
(66, 'Removal of foreign bodies', 'إزالة الأجسام الغريبة', 11, 1, '2016-06-25 15:08:01', '2016-06-25 15:08:01'),
(67, 'Performance of tonsillectomy operations', 'استئصال اللوزتين واللحميات الأنفية', 11, 1, '2016-06-25 15:08:34', '2016-06-25 15:08:34'),
(68, 'Treatment of snoring and obstructive sleep apnea', 'علاج الشخير وانسداد النفس أثناء النوم', 11, 1, '2016-06-25 15:09:06', '2016-06-25 15:09:06'),
(69, 'Septoplasty', 'تقويم انحراف الوتيرة والقرنيات الأنفية', 11, 1, '2016-06-25 15:11:14', '2016-06-25 15:11:14'),
(70, 'Treatment of hoarseness', 'علاج بحة الصوت', 11, 1, '2016-06-25 15:11:47', '2016-06-25 15:11:47'),
(71, 'Vocal cord dysfunction (VCD) symptoms', 'مشكلات الأحبال الصوتية', 11, 1, '2016-06-25 15:12:14', '2016-06-25 15:12:14'),
(72, 'Respiratory problems', 'مشاكل التنفس', 11, 1, '2016-06-25 15:13:47', '2016-06-25 15:13:47'),
(73, 'Salivary gland surgery', 'عمليات الغدد اللعابية', 11, 1, '2016-06-25 15:14:28', '2016-06-25 15:14:28'),
(74, 'Tympanic membrane perforation treatment', 'ترقيع طبلة الأذن', 11, 1, '2016-06-25 15:15:35', '2016-06-25 15:15:35'),
(75, 'Insertion of tympanostomy tube', 'وضع أنابيب تهوية في طبلة الأذن', 11, 1, '2016-06-25 15:16:01', '2016-06-25 15:16:01'),
(76, 'Laparoscopic sinus surgery', 'عمليات الجيوب الأنفية بالمناظير', 11, 1, '2016-06-25 15:16:26', '2016-06-25 15:16:26'),
(77, 'Diagnosing of dizziness resulted from inner ear and its treatment', 'تشخيص دوار الأذن الداخلية وعلاجه', 11, 1, '2016-06-25 15:17:07', '2016-06-25 15:17:07'),
(78, 'Pharmacy', 'صيدلية عامة', 12, 1, '2016-06-29 15:03:17', '2016-07-12 11:53:48'),
(79, 'Cupping (Hijama)', 'الحجامة', 13, 1, '2016-07-17 16:28:10', '2016-07-17 16:28:10'),
(80, 'Homeopathy', 'الطب المثلي', 13, 1, '2016-07-17 16:29:35', '2016-07-17 16:29:35'),
(81, 'Acupuncture', 'الوخز بالأبر', 13, 1, '2016-07-17 16:43:07', '2016-07-17 16:43:07'),
(82, 'Ozone Therapy', 'العلاج بالأوزون', 13, 1, '2016-07-17 16:45:51', '2016-07-17 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `seha_sponsors`
--

CREATE TABLE `seha_sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_fk` int(11) DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sponsor_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_sponsors`
--

INSERT INTO `seha_sponsors` (`sponsor_id`, `title_en`, `title_ar`, `country_fk`, `image_url`, `thumb_url`, `sponsor_url`, `status`, `created_on`, `updated_on`) VALUES
(3, '360seha', '٣٦٠صحة', 1, 'd1c939ab0c5104c41ba3e047c3bdf9a6.png', 'd1c939ab0c5104c41ba3e047c3bdf9a6_thumb.png', 'http://www.360seha.com', 1, '2015-06-09 04:41:29', '2016-07-22 12:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_contact_us`
--

CREATE TABLE `seha_subcriber_contact_us` (
  `contact_id` int(11) NOT NULL,
  `show_location` tinyint(1) NOT NULL DEFAULT '1',
  `show_address` tinyint(1) NOT NULL DEFAULT '1',
  `show_contact_no` tinyint(4) NOT NULL DEFAULT '1',
  `show_timings` tinyint(4) NOT NULL DEFAULT '1',
  `show_domain` tinyint(4) NOT NULL DEFAULT '1',
  `info_mail` varchar(255) NOT NULL,
  `social_fb_link` varchar(255) DEFAULT NULL,
  `social_tweet_link` varchar(255) DEFAULT NULL,
  `social_inst_link` varchar(255) DEFAULT NULL,
  `social_ytube_link` varchar(255) DEFAULT NULL,
  `social_google_plus` varchar(255) DEFAULT NULL,
  `social_linked_in` varchar(255) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_contact_us`
--

INSERT INTO `seha_subcriber_contact_us` (`contact_id`, `show_location`, `show_address`, `show_contact_no`, `show_timings`, `show_domain`, `info_mail`, `social_fb_link`, `social_tweet_link`, `social_inst_link`, `social_ytube_link`, `social_google_plus`, `social_linked_in`, `subscriber`, `created_on`, `updated_on`) VALUES
(0, 1, 1, 1, 0, 1, 'web-queries@example.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2014-11-25 16:34:54', '2014-11-25 16:34:54'),
(0, 1, 1, 1, 1, 1, 'info@blossoms.org', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2015-01-02 21:51:23', '2015-01-02 21:51:23'),
(0, 0, 0, 0, 0, 0, 'web-queries@example.coms', 'https://www.facebook.com/IllinoisMedicalCenter', 'https://www.twitter.com/IllinoisMedicalCenter/info', 'https://www.instagram.com/IllinoisMedicalCenter/info', 'https://www.youtube.com/IllinoisMedicalCenter/info', NULL, NULL, 6, '2015-05-27 17:02:02', '2015-05-27 17:02:02'),
(0, 0, 0, 0, 0, 0, 'info@illinoispolyclinic.com', 'https://www.facebook.com/IllinoisMedicalCenter', NULL, NULL, NULL, NULL, NULL, 18, '2015-04-13 16:20:27', '2015-04-13 16:20:27'),
(0, 0, 0, 0, 0, 0, 'web-queries@example.com', NULL, NULL, NULL, NULL, NULL, NULL, 13, '2015-05-05 16:53:38', '2015-05-05 16:53:38'),
(0, 0, 0, 0, 0, 0, '', 'https://www.facebook.com/ExeterMedicalCenter', NULL, NULL, NULL, NULL, NULL, 5, '2015-05-09 11:43:32', '2015-05-09 11:43:32'),
(0, 1, 1, 1, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, 8, '2015-05-21 09:48:09', '2015-05-21 09:48:09'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/hhuae', 'https://www.twitter.com/holisticuae', 'https://www.instagram.com/holisticuae/', NULL, NULL, NULL, 26, '2015-06-03 10:53:42', '2015-06-03 10:53:42'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/edc.shj', NULL, NULL, NULL, NULL, NULL, 27, '2015-06-07 12:12:25', '2015-06-07 12:12:25'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/ajyadmc', 'https://www.twitter.com/ajyadmc', 'https://www.instagram.com/ajyadmc', NULL, NULL, NULL, 29, '2015-06-29 14:56:11', '2015-06-29 14:56:11'),
(0, 1, 1, 1, 1, 1, '', 'https://facebook.com/dr.ronarabah', '', 'https://instagram.com/dr.ronarabah', NULL, NULL, NULL, 30, '2015-07-01 12:17:36', '2015-07-01 12:17:36'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/ALZUMURUDMC', NULL, 'https://instagram.com/zumurdmc/', NULL, NULL, NULL, 31, '2015-07-06 13:50:40', '2015-07-06 13:50:40'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/IllinoisMedicalCenter', 'https://twitter.com/illinoismedical', 'http://instagram.com/illinoismedicalcenter', NULL, NULL, NULL, 32, '2015-07-16 12:11:38', '2015-07-16 12:11:38'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/Beauty.Trick.Mc', 'https://twitter.com/Beauty_Trick_mc', 'https://instagram.com/beauty_trick_mc/', NULL, NULL, NULL, 33, '2015-07-20 15:56:03', '2015-07-20 15:56:03'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/cosmohealthmc', 'https://twitter.com/cosmohealthmc', 'https://instagram.com/cosmohealthmc', NULL, NULL, NULL, 35, '2015-07-21 14:40:05', '2015-07-21 14:40:05'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/pages/%D8%AF-%D9%86%D8%B9%D9%85%D8%AA-%D8%A7%D9%84%D9%85%D8%B3%D9%84%D9%85%D9%8A-%D8%B7%D8%A8%D9%8A%D8%A8%D8%A9-%D8%A7%D9%84%D8%A7%D8%B3%D9%86%D8%A7%D9%86/1392850614273064', NULL, NULL, NULL, NULL, NULL, 38, '2015-07-23 14:05:13', '2015-07-23 14:05:13'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/OrianaHospital', NULL, NULL, NULL, NULL, 'https://www.linkedin.com/company/oriana-clinics', 39, '2015-07-23 18:20:57', '2015-07-23 18:20:57'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/malakydc', 'https://twitter.com/malakydc', 'https://instagram.com/malakydc/', NULL, NULL, NULL, 43, '2015-08-09 13:17:16', '2015-08-09 13:17:16'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/UHSharjah/', 'https://twitter.com/UHSharjah', 'https://www.instagram.com/UHSharjah/pitalsharjah/', 'https://www.youtube.com/user/uhsmarketing2011/videos', 'https://plus.google.com/107966158476621373444/posts', 'https://www.linkedin.com/company/university-hospital-sharjah', 47, '2015-09-05 15:15:19', '2015-09-05 15:15:19'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/Arwadental', 'https://twitter.com/arwadental', 'https://instagram.com/arwadentalclinic/', NULL, NULL, NULL, 50, '2015-10-24 13:22:16', '2015-10-24 13:22:16'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/smiledesignc', '', 'https://instagram.com/wawsmile/', NULL, NULL, NULL, 51, '2015-10-25 10:13:11', '2015-10-25 10:13:11'),
(0, 1, 1, 1, 1, 1, '', NULL, NULL, NULL, NULL, NULL, NULL, 62, '2016-05-03 10:10:16', '2016-05-03 10:10:16'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/malakydc', 'https://twitter.com/malakydc', 'http://instagram.com/malakydc', NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/malakydcss', 'https://twitter.com/malakydcss', 'http://instagram.com/malakydc', NULL, NULL, NULL, 69, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/IbnNafees', 'https://twitter.com/IbnNafeesMC', 'https://www.instagram.com/IbnNafees/', NULL, NULL, NULL, 70, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'http://www.basmatalhayatdc.com/', 'https://twitter.com/Basmatalhayatdc', 'https://www.instagram.com/Basmatalhayatdc/', NULL, NULL, NULL, 71, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/pages/Uro-Diagnostic-Clinic/534186763308677', 'https://twitter.com/UroDC', 'https://www.instagram.com/urodc/', NULL, NULL, NULL, 72, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/DrSulaimanAlHabib', 'https://twitter.com/HMG', '', NULL, NULL, NULL, 73, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/eihospitalshj/', '', 'https://www.instagram.com/eihospitalshj/', NULL, NULL, NULL, 74, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/MedlineMedicalCenter/', 'https://twitter.com/@MedlineDubai', 'https://www.instagram.com/medlinemedicalcenter/', NULL, NULL, NULL, 75, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/AwazenUAE', 'https://twitter.com/AwazenUAE', 'https://www.instagram.com/awazenuae/', NULL, NULL, NULL, 76, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/ACPNUAE', 'https://twitter.com/ACPNUAE', 'https://www.instagram.com/acpnuae/', NULL, NULL, NULL, 77, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/BurjeelHospital', 'https://twitter.com/BurjeelOfficial', '', NULL, NULL, NULL, 78, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0, 1, 1, 1, 1, 1, '', 'https://www.facebook.com/DrMichaelsDentalClinic', 'https://twitter.com/doctor_michaels', 'https://www.instagram.com/drmichaelsdental/', NULL, NULL, NULL, 79, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_doctors`
--

CREATE TABLE `seha_subcriber_doctors` (
  `id_dr` int(11) NOT NULL,
  `dr_title` varchar(255) NOT NULL,
  `dr_image` varchar(255) DEFAULT NULL,
  `dr_job_title` varchar(255) NOT NULL,
  `dr_email` varchar(255) NOT NULL,
  `dr_languages` varchar(255) DEFAULT NULL,
  `dr_specialization` varchar(255) DEFAULT NULL,
  `dr_fb_link` varchar(255) DEFAULT NULL,
  `dr_twit_link` varchar(255) DEFAULT NULL,
  `dr_linked_in` varchar(255) DEFAULT NULL,
  `dr_profile` text,
  `subscriber` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_doctors`
--

INSERT INTO `seha_subcriber_doctors` (`id_dr`, `dr_title`, `dr_image`, `dr_job_title`, `dr_email`, `dr_languages`, `dr_specialization`, `dr_fb_link`, `dr_twit_link`, `dr_linked_in`, `dr_profile`, `subscriber`, `created_on`, `updated_on`) VALUES
(2, 'Dr. Ravi Pillai', NULL, 'Dentist', 'ravibpillai@gmail.com', 'English', 'Canal Surgery', NULL, NULL, NULL, 'I graduated from Guy’s Dental Hospital in 2000. I have worked at the practice as an associate since 2004 and took over ownership in 2010.\r\nI constantly attend courses and training to further my skills and knowledge in order to improve the patient experience. I attained the MFGDP qualification in 2002 and completed the Advanced Dental Seminars 1 year course in Cosmetic and Aesthetic Dentistry.\r\n\r\n\r\nI always aim to provide gentle, painless dental care. My particular interests include teeth straightening and teeth whitening, as it is always great to see how transforming someone’s smile can have such a positive impact on their life.', 1, '2014-11-24 11:31:20', '2014-11-24 11:31:20'),
(3, 'Dr ravi pIllai', 'b872715a6459466def10ac8bff5ffd09.jpg', 'Dentist', 'ravibpillai@gmail.com', 'English', 'Canal Surgery', NULL, NULL, NULL, 'I graduated from Guy’s Dental Hospital in 2000. I have worked at the practice as an associate since 2004 and took over ownership in 2010.\r\nI constantly attend courses and training to further my skills and knowledge in order to improve the patient experience. I attained the MFGDP qualification in 2002 and completed the Advanced Dental Seminars 1 year course in Cosmetic and Aesthetic Dentistry.\r\n\r\nI always aim to provide gentle, painless dental care. My particular interests include teeth straightening and teeth whitening, as it is always great to see how transforming someone’s smile can have such a positive impact on their life.', 1, '2014-11-24 11:34:00', '2014-11-25 10:34:50'),
(4, 'John Doe', 'bc4cdd1135847da8e3c8ac2d97279cd1.jpg', 'Chief Surgeon', 'queries@example.org', 'Arabic, English, German', 'General Surgery', NULL, NULL, NULL, 'Some description about doctor', 6, '2015-03-18 15:55:42', '2015-03-18 15:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_img_gallery`
--

CREATE TABLE `seha_subcriber_img_gallery` (
  `img_id` int(11) NOT NULL,
  `img_caption` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_thumb` varchar(255) NOT NULL,
  `img_show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) DEFAULT NULL,
  `orderby` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_img_gallery`
--

INSERT INTO `seha_subcriber_img_gallery` (`img_id`, `img_caption`, `img_url`, `img_thumb`, `img_show_status`, `subscriber`, `orderby`, `created_on`, `updated_on`) VALUES
(3, 'Drawing expo 2014', '8ba37b842e39e944dc713a9be61b0161.jpg', '8ba37b842e39e944dc713a9be61b0161_thumb.jpg', 1, 1, NULL, '2014-11-25 14:58:36', '2014-11-25 14:59:13'),
(4, 'Some image', 'd6367a2ed99ea1e7ed64c49183737254.jpg', 'd6367a2ed99ea1e7ed64c49183737254_thumb.jpg', 1, 1, NULL, '2014-11-25 16:13:23', '2014-11-25 16:13:23'),
(6, 'Cosmetic Make overs', 'edfaef749e0ef13246d67b25730a30e6.jpg', 'edfaef749e0ef13246d67b25730a30e6_thumb.jpg', 1, 6, NULL, '2015-04-04 17:35:27', '2015-04-04 17:35:27'),
(7, 'Medical Cneter Interior', '2aa5227137118d4819424a3b6ee693eb.jpg', '2aa5227137118d4819424a3b6ee693eb_thumb.jpg', 1, 6, NULL, '2015-05-17 13:40:55', '2015-05-17 13:40:55'),
(25, NULL, 'IMG-19a5ffd00160b1c.jpg', 'IMG-19a5ffd00160b1c.jpg', 1, 69, NULL, '2016-05-08 21:12:38', '2016-05-08 21:12:38'),
(64, NULL, 'IMG-4b148542f364a59.jpg', 'IMG-4b148542f364a59.jpg', 1, 26, 2, '2016-06-02 01:23:33', '2016-06-02 01:23:33'),
(65, NULL, 'IMG-4495ba8e153dc33.jpg', 'IMG-4495ba8e153dc33.jpg', 1, 26, 1, '2016-06-02 01:23:33', '2016-06-02 01:23:33'),
(66, NULL, 'IMG-83b302c33fedc7b.jpg', 'IMG-83b302c33fedc7b.jpg', 1, 26, 0, '2016-06-02 01:23:33', '2016-06-02 01:23:33'),
(67, NULL, 'IMG-727c894fb47f98e.jpg', 'IMG-727c894fb47f98e.jpg', 1, 26, 2, '2016-06-02 01:23:34', '2016-06-02 01:23:34'),
(68, NULL, 'IMG-096c715660626e1.png', 'IMG-096c715660626e1.png', 1, 74, NULL, '2016-07-27 13:46:09', '2016-07-27 13:46:09'),
(69, NULL, 'IMG-89c83a9f438642c.png', 'IMG-89c83a9f438642c.png', 1, 74, NULL, '2016-07-27 13:46:15', '2016-07-27 13:46:15'),
(70, NULL, 'IMG-33e4f0460f6fdaa.png', 'IMG-33e4f0460f6fdaa.png', 1, 74, NULL, '2016-07-27 13:46:21', '2016-07-27 13:46:21'),
(71, NULL, 'IMG-c5e46df4d7e5050.jpg', 'IMG-c5e46df4d7e5050.jpg', 1, 74, 0, '2016-07-27 13:46:23', '2016-07-27 13:46:23'),
(72, NULL, 'IMG-dda64b996d99ac5.jpg', 'IMG-dda64b996d99ac5.jpg', 1, 74, 1, '2016-07-27 13:46:25', '2016-07-27 13:46:25'),
(73, NULL, 'IMG-125abff08566374.jpg', 'IMG-125abff08566374.jpg', 1, 79, NULL, '2016-08-23 16:55:17', '2016-08-23 16:55:17'),
(74, NULL, 'IMG-440a92b24cbb570.jpg', 'IMG-440a92b24cbb570.jpg', 1, 79, NULL, '2016-08-23 16:55:34', '2016-08-23 16:55:34'),
(75, NULL, 'IMG-be67daae876b802.jpg', 'IMG-be67daae876b802.jpg', 1, 79, NULL, '2016-08-23 16:55:36', '2016-08-23 16:55:36'),
(77, NULL, 'IMG-5fa0a2309b210e0.jpg', 'IMG-5fa0a2309b210e0.jpg', 1, 79, 0, '2016-08-23 16:56:05', '2016-08-23 16:56:05'),
(78, NULL, 'IMG-11d30f0d3b99d08.jpg', 'IMG-11d30f0d3b99d08.jpg', 1, 88, NULL, '2016-09-03 17:49:24', '2016-09-03 17:49:24'),
(79, NULL, 'IMG-1473259878735.jpg', 'IMG-1473259878735.jpg', 1, 98, NULL, '2016-09-07 09:51:22', '2016-09-07 09:51:22'),
(80, NULL, 'IMG-1473260061558.jpg', 'IMG-1473260061558.jpg', 1, 99, NULL, '2016-09-07 09:54:23', '2016-09-07 09:54:23'),
(81, NULL, 'IMG-1473260212029.jpg', 'IMG-1473260212029.jpg', 1, 100, NULL, '2016-09-07 09:56:54', '2016-09-07 09:56:54'),
(82, NULL, 'IMG-1473263862298.jpg', 'IMG-1473263862298.jpg', 1, 101, NULL, '2016-09-07 10:57:44', '2016-09-07 10:57:44'),
(83, NULL, 'IMG-1473263862298.jpg', 'IMG-1473263862298.jpg', 1, 102, NULL, '2016-09-07 12:19:05', '2016-09-07 12:19:05'),
(84, NULL, 'IMG-1473263862298.jpg', 'IMG-1473263862298.jpg', 1, 103, NULL, '2016-09-07 12:29:06', '2016-09-07 12:29:06'),
(85, NULL, 'IMG-3ec2e3efc597a93.jpg', 'IMG-3ec2e3efc597a93.jpg', 1, 29, NULL, '2016-09-19 17:11:07', '2016-09-19 17:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_offers`
--

CREATE TABLE `seha_subcriber_offers` (
  `offer_id` int(11) NOT NULL,
  `offer_title` varchar(255) NOT NULL,
  `offer_title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `offer_image` varchar(255) DEFAULT NULL,
  `orig_price` varchar(50) NOT NULL,
  `subscriber` int(11) NOT NULL,
  `subs_type` tinyint(1) DEFAULT NULL COMMENT 'Subscriber type added the offer',
  `service_fk` int(11) NOT NULL,
  `offer_starts` datetime NOT NULL,
  `offer_ends` datetime NOT NULL,
  `discount_price` varchar(20) NOT NULL,
  `offer_description` text NOT NULL,
  `offer_description_ar` text CHARACTER SET utf8,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_offers`
--

INSERT INTO `seha_subcriber_offers` (`offer_id`, `offer_title`, `offer_title_ar`, `offer_image`, `orig_price`, `subscriber`, `subs_type`, `service_fk`, `offer_starts`, `offer_ends`, `discount_price`, `offer_description`, `offer_description_ar`, `send`, `created_on`, `updated_on`) VALUES
(2, 'National day Offer', 'National day Offer ar', 'ccfb3a5861fa80e8f007b35f7eae9490.jpg', '100', 6, 3, 0, '2015-05-18 00:00:00', '2015-05-30 00:00:00', '50', 'Some description', 'Some description ar', 0, '2015-05-18 12:32:41', '2015-05-31 17:05:01'),
(3, 'National day offer', 'National day offer', NULL, '100', 9, 1, 0, '2015-05-26 00:00:00', '2015-05-30 00:00:00', '20', 'National day offer', 'National day offer', 0, '2015-05-26 17:42:46', '2015-05-26 17:44:11'),
(4, 'national day offer', 'national day offer', NULL, '12', 8, 3, 0, '2015-05-26 00:00:00', '2015-05-29 00:00:00', '2', 'asd', 'asd', 0, '2015-05-27 09:22:52', '2015-05-27 09:23:42'),
(5, 'Tooth Whitening Offer now', 'تبييض الأسنان عرض الآن', 'c8ef35f3fb6479e774e4000fa232db3b.jpg', '150', 5, 3, 0, '2015-05-30 00:00:00', '2015-06-06 00:00:00', '120', 'Dental bleaching, also known as tooth whitening, is a common procedure in general dentistry. According to the FDA, whitening restores natural tooth color and bleaching whitens beyond the natural color. There are many methods available, such as brushing, bleaching strips, bleaching pen, bleaching gel, and laser bleaching. Teeth whitening has become the most requested procedure in cosmetic dentistry today. More than 100 million Americans whiten their teeth one way or another; spending an estimated $15 billion in 2010.[1]', 'Dental bleaching, also known as tooth whitening, is a common procedure in general dentistry. According to the FDA, whitening restores natural tooth color and bleaching whitens beyond the natural color. There are many methods available, such as brushing, bleaching strips, bleaching pen, bleaching gel, and laser bleaching. Teeth whitening has become the most requested procedure in cosmetic dentistry today. More than 100 million Americans whiten their teeth one way or another; spending an estimated $15 billion in 2010.[1]', 0, '2015-05-31 10:39:03', '2015-05-31 10:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_services`
--

CREATE TABLE `seha_subcriber_services` (
  `services_id` int(11) NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `services_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `services_description` text NOT NULL,
  `services_description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `services_image` varchar(255) DEFAULT NULL,
  `subscriber` int(11) NOT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_services`
--

INSERT INTO `seha_subcriber_services` (`services_id`, `services_title`, `services_title_ar`, `services_description`, `services_description_ar`, `services_image`, `subscriber`, `show_status`, `created_on`, `updated_on`) VALUES
(42, 'Plastic surgery', 'Plastic surgery', '<p>Some description of plastic surgery in english</p>', '<p>Some description of plastic surgery in arabic</p>', '26bc8282a4306f611bb4e1fd6a70054d.jpg', 8, 1, '2015-05-27 10:34:57', '2015-05-27 10:35:06'),
(43, 'Plastic surgery', 'Plastic surgery', '<p>Plastic surgery</p>', '<p>Plastic surgery</p>', NULL, 6, 1, '2015-05-27 12:58:50', '2015-05-27 18:31:56'),
(44, 'asd', 'asd', '<p>asd</p>', '<p>asd</p>', NULL, 6, 1, '2015-05-27 18:30:06', '2015-05-27 18:41:42'),
(45, 'Plastic Sugery', 'البلاستيك', '<p>Treatments for the plastic repair of a broken nose are first mentioned in the&nbsp;Edwin Smith Papyrus,<sup id="cite_ref-cossurg_8-0" class="reference">[8]</sup>&nbsp;a transcription of an Ancient Egyptian medical text, some of the oldest known surgical treatise, dated to the&nbsp;Old Kingdom&nbsp;from 3000 to 2500 BC.<sup id="cite_ref-plsurgery_9-0" class="reference">[9]</sup>&nbsp;Reconstructive surgery techniques were being carried out in&nbsp;India&nbsp;by 800 BC.<sup id="cite_ref-EP_10-0" class="reference">[10]</sup><sup class="noprint Inline-Template">[<em><span title="The citation near this tag is broken. (March 2015)">broken citation</span></em>]</sup>&nbsp;Sushruta&nbsp;was a physician that made important contributions to the field of plastic and cataract surgery in 6th century BC.<sup id="cite_ref-Dwivedi.26Dwivedi_11-0" class="reference">[11]</sup>&nbsp;The medical works of both Sushruta and&nbsp;Charak&nbsp;originally in&nbsp;Sanskrit&nbsp;were translated into the&nbsp;Arabic language&nbsp;during the Abbasid Caliphate in 750 AD.<sup id="cite_ref-locka_12-0" class="reference">[12]</sup>&nbsp;The Arabic translations made their way into&nbsp;Europe&nbsp;via intermediaries.<sup id="cite_ref-locka_12-1" class="reference">[12]</sup>&nbsp;In&nbsp;Italy&nbsp;the Branca family<sup id="cite_ref-13" class="reference">[13]</sup>&nbsp;of&nbsp;Sicily&nbsp;and&nbsp;Gaspare Tagliacozzi&nbsp;(Bologna) became familiar with the techniques of Sushruta.<sup id="cite_ref-locka_12-2" class="reference">[12]</sup></p>\r\n<p>British&nbsp;physicians traveled to India to see&nbsp;rhinoplasties&nbsp;being performed by native methods.<sup id="cite_ref-Lock651_14-0" class="reference">[14]</sup>&nbsp;Reports on Indian rhinoplasty performed by a&nbsp;Kumhar&nbsp;vaidya&nbsp;were published in the&nbsp;<em>Gentleman''s Magazine</em>&nbsp;by 1794.<sup id="cite_ref-Lock651_14-1" class="reference">[14]</sup>&nbsp;Joseph Constantine Carpue&nbsp;spent 20 years in India studying local plastic surgery methods.<sup id="cite_ref-Lock651_14-2" class="reference">[14]</sup>&nbsp;Carpue was able to perform the first major surgery in the&nbsp;Western world&nbsp;by 1815.<sup id="cite_ref-Lock652_15-0" class="reference">[15]</sup>&nbsp;Instruments described in the&nbsp;<em>Sushruta Samhita</em>&nbsp;were further modified in the Western world.<sup id="cite_ref-Lock652_15-1" class="reference">[15]</sup></p>', '<p>وذكر لأول مرة علاجات لإصلاح البلاستيك من كسر في الأنف في ورق بردي إدوين سميث، [8] على نسخ من نص المصرية القديمة الطبي، وبعض من أقدم أطروحة الجراحية المعروفة، يرجع تاريخها إلى عصر الدولة القديمة 3000-2500 قبل الميلاد. [ 9] ويجري تنفيذ تقنيات جراحة الترميمية في الهند من قبل 800 قبل الميلاد. [10] [كانت مكسورة الاقتباس] ساسروتا الطبيب الذي قدم مساهمات هامة في مجال جراحة التجميل وإعتام عدسة العين في القرن 6 قبل الميلاد. [11] والأعمال الطبية من كلا ترجمت ساسروتا وشاراق أصلا في اللغة السنسكريتية إلى اللغة العربية خلال الخلافة العباسية عام 750 م. جعلت [12] والترجمات العربية طريقهم إلى أوروبا عن طريق وسطاء. [12] وفي إيطاليا الأسرة برانكا [13] من صقلية وغاسباري أصبح Tagliacozzi (بولونيا) معتادا على تقنيات ساسروتا. [12]</p>\r\n<p>سافر الأطباء البريطانيين الى الهند لرؤية rhinoplasties التي يؤديها أساليب الأصلي. [14] وقد نشرت تقارير عن عملية تجميل الأنف الهندي يؤديها Kumhar فيديا في مجلة الرجل المحترم من قبل 1794. [14] جوزيف قسطنطين Carpue أمضى 20 عاما في الهند دراسة الجراحة التجميلية المحلية طرق. كان [14] Carpue قادرة على إجراء الجراحة الرئيسية الأولى في العالم الغربي قبل عام 1815. [15] الأدوات الموصوفة في ساسروتا سامهيتا تم تعديلها بشكل أكبر في العالم الغربي. [15]</p>', '0371d0cd6192c7f616c40919a4397f55.jpg', 5, 1, '2015-05-31 10:36:07', '2015-05-31 10:36:07'),
(46, 'Internal Medicine& Gastroenterology', 'الباطنية والجهاز الهضمي والكبد والمناظير', '<p>Integrated medical clinic under the supervision of Dr. Mohamed El Feki (MD), Specialist of internal medicine. Gastroenterologist. and hepatologist who is having more than 10 years experience.<br />This clinic provides you with the following Services:</p>\n<p>&bull; Esophago- gastro- doudenoscopy.<br />&bull; Colonoscopy.<br />&bull; Diagnosis and treatment of gastroenterology and hepatology disease.<br />&bull; Treatment and follow up of chronic diseases<br />(Diabetes and its complications, Hypertension, Rheumatic diseases, Chest Diseases, Bronchial asthma, and Endocrinology diseases.)<br />&bull; Programs for early detection of tumors.<br />&bull; Intragastric Balloon for weight loss.<br /><br />Ultra Sound 3d is available in his clinic.</p>', '<p>عياده طببيه متكامله تحت اشراف الاستاذ الدكتور/ محمدعبد الفتاح الفقي , دكتوراه بالامراض الباطنيه , اخصائي الامراض الباطنيه والجهاز الهضمى والكبد والمناظير , عضو جمعيه الكبد المصريه , مدرس الامراض الباطنيه بجامعه القاهره وله من الخبره مايزيد عن عشر سنوات فى المستشفيات الحكوميه والخاصه<br /><br />وتقدم هذه العيادة :<br /><br />&bull; تنظير المرىء وتنظير المعدة والاثني عشر .<br />&bull; تنظير القولون .<br />&bull; تشخيص وعلاج أمراض الجهاز الهضمي والكبد .<br />&bull; أحد أساليب علاج أمراض الجهاز الهضمي بواسطة المنظار .<br />&bull; تشخيص وعلاج الحالات المزمنة لامراض:<br />( السكري ومضاعفاته &ndash; ضغط الدم &ndash; القلب &ndash; أمراض الروماتيزم - الامراض الصدرية &ndash; الربو الشعبي &ndash; الغدد الصماء).<br />&bull; برامج الكشف المبكر عن الاورام .<br />&bull; اجراء عمليات بالون المعده لتخفيف الوزن.<br /><br />كما تتوفر بالعيادة جهاز موجات فوق الصوتية Ultra Sound 3D</p>', NULL, 26, 1, '2015-06-03 09:28:05', '2015-07-23 16:31:19'),
(47, 'Colonic Hydrotherapy', 'تنظيف القولون ( طرد السموم )', '<p>Colonic Hydrotherapy<br />The Colon Hydrotherapy device is one of its kind in the field of complementary medicine which do detoxification through cleaning the colon by using sterile water, this advanced technology is considered as a sophisticated medication method in treating most of the diseases like constipation, irritable bowel syndrome, gases, migraine, eczema, acne, psoriasis and other diseases, whereas this technology depends on freeing the body from toxins which cause diseases and then activating and energizing the body, it also helps reducing the severity of most of the diseases like diabetes by changing the nutrition systems upon the completion of the cleaning process.</p>', '<p>&nbsp;تنظيف القولون ( طرد السموم ):<br />يعتبر جهاز تنظيف القولون صرخة طبية متطورة في عالم الطب التكميلي والذي بدوره يقوم باستخراج السموم من الجسم عن طريق تنظيف القولون بادخال ماء معقم ومعالج وتعتبر هذه التقنية الحديثة طريقة طبية متطورة في علاج كثير من الامراض مثل الامساك , القولون العصبي, الغازات ,مشاكل الجهاز الهضمي , الصداع , الاكزيما ,حب الشباب , الصدفية ,وغيرها الكثير من الامراض حيث أن هذه التقنية تعتمد في عملها على تخليص الجسم من السموم التي تسبب الامراض ومن ثم تنشيط الجسم وإعادة الحيوية إليه كما أنها تساعد في التقليل من حدة أعراض كثير من الامراض مثل السكري وذلك بتغيير الانظمة الغذائية بعد إتمام عملية التنظيف .ومن خلا متابعة كل ماهو جديد فتم اضافة تنظيف القولون بالاوزون لهذه العيادة.</p>', NULL, 26, 1, '2015-08-01 17:54:18', '2015-08-01 17:59:55'),
(49, 'Service1ss', 'شسيشسيي', '<p>Service1</p>', '<p>Service1</p>', 'fe9cc164bc990cea250a084eccc23349.jpg', 62, 1, '2016-03-24 09:28:28', '2016-03-24 09:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subcriber_video_gallery`
--

CREATE TABLE `seha_subcriber_video_gallery` (
  `vid_id` int(11) NOT NULL,
  `vid_caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `vid_caption_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subscriber` int(11) DEFAULT NULL,
  `vid_url` varchar(255) NOT NULL,
  `has_thumb` tinyint(1) NOT NULL DEFAULT '0',
  `thumb_url` varchar(255) DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subcriber_video_gallery`
--

INSERT INTO `seha_subcriber_video_gallery` (`vid_id`, `vid_caption`, `vid_caption_ar`, `subscriber`, `vid_url`, `has_thumb`, `thumb_url`, `show_status`, `created_on`, `updated_on`) VALUES
(2, 'Dr German Arzate From Cancun Cosmetic Dentistry', 'Dr German Arzate From Cancun Cosmetic Dentistry', 8, 'https://www.youtube.com/v/BmesfqmsKkY', 1, 'http://img.youtube.com/vi/BmesfqmsKkY/hqdefault.jpg', 1, '2015-05-27 11:10:47', '2015-05-27 11:11:27'),
(3, 'Dr German Arzate From Cancun Cosmetic Dentistry', 'Dr German Arzate From Cancun Cosmetic Dentistry', 6, 'https://www.youtube.com/v/V56cHSNG2vw', 1, 'http://img.youtube.com/vi/V56cHSNG2vw/hqdefault.jpg', 1, '2015-05-27 17:01:01', '2015-05-31 10:06:26'),
(9, 'الحجامة مع الدكتور هيمن النحال', 'الحجامة مع الدكتور هيمن النحال', 26, '3-ENrkYpsCU', 0, 'http://img.youtube.com/vi/3-ENrkYpsCU/hqdefault.jpg', 1, '2015-11-24 14:42:08', '2015-11-24 14:42:08'),
(43, NULL, NULL, 69, 'Fs6cDA7rSNc', 0, 'http://img.youtube.com/vi/Fs6cDA7rSNc/hqdefault.jpg', 1, '2016-05-08 00:29:36', '2016-05-08 00:29:36'),
(44, NULL, NULL, 69, 'R7G6JFRccvA', 0, 'http://img.youtube.com/vi/R7G6JFRccvA/hqdefault.jpg', 1, '2016-05-08 00:29:36', '2016-05-08 00:29:36'),
(45, 'الحجامة مع الدكتور هيمن النحال', 'الحجامة مع الدكتور هيمن النحال', 26, '3-ENrkYpsCU', 0, 'http://img.youtube.com/vi/3-ENrkYpsCU/hqdefault.jpg', 1, '2015-11-24 14:42:08', '2015-11-24 14:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers`
--

CREATE TABLE `seha_subscribers` (
  `user_id` int(11) NOT NULL,
  `subs_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `subs_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subs_public_profile` varchar(255) DEFAULT NULL,
  `profile_visits` int(11) NOT NULL DEFAULT '0',
  `subs_profile_img` varchar(255) DEFAULT NULL,
  `subs_featured_image` varchar(250) DEFAULT NULL,
  `show_featured_home` tinyint(1) NOT NULL DEFAULT '0',
  `subs_gender` enum('male','female','other') DEFAULT NULL,
  `subs_cat_id` varchar(255) DEFAULT NULL,
  `dept_fk` int(11) DEFAULT NULL,
  `subs_type` tinyint(1) DEFAULT '1' COMMENT 'type of subscriber',
  `subs_experience` varchar(4) DEFAULT NULL,
  `subs_medical_center` varchar(250) DEFAULT NULL,
  `subs_username` varchar(50) DEFAULT NULL,
  `subs_email` varchar(255) DEFAULT NULL,
  `subs_pwd_hash` text,
  `r_password` varchar(255) DEFAULT NULL,
  `subs_uniq_token` text,
  `zipcode` varchar(10) DEFAULT NULL,
  `subs_primary_contact` varchar(20) DEFAULT NULL,
  `subs_secondary_contact` varchar(20) DEFAULT NULL,
  `subs_timings` text,
  `subs_lat_id` varchar(50) DEFAULT NULL COMMENT 'Lattitut',
  `subs_long_id` varchar(50) DEFAULT NULL COMMENT 'Longitude',
  `subs_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_location` tinyint(1) DEFAULT '1',
  `subs_url` text,
  `city` int(11) DEFAULT NULL,
  `subs_state` int(11) DEFAULT NULL,
  `subs_country` varchar(20) DEFAULT NULL,
  `subs_contact_name` varchar(255) DEFAULT NULL,
  `email_verify` varchar(255) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `subs_created` datetime DEFAULT NULL,
  `subs_update` datetime DEFAULT NULL,
  `subs_support_email` varchar(255) DEFAULT NULL,
  `subs_secondary_email` varchar(255) DEFAULT NULL,
  `subs_address_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subs_address_1_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subs_address_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subs_address_2_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subs_fax_no` varchar(40) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `description` text,
  `description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description_en_long` text,
  `description_en_long_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `parking_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `bus_station_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `metro_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `parking_ar` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `bus_station_ar` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `metro_ar` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `enable_review` tinyint(1) DEFAULT '0',
  `enable_comment` tinyint(1) DEFAULT '0',
  `subs_review` varchar(5) NOT NULL DEFAULT '0',
  `is_approve` tinyint(1) NOT NULL DEFAULT '1',
  `subs_languages` enum('English','Arabic','All') DEFAULT NULL,
  `subs_summary` text,
  `subs_summary_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_visiting` tinyint(1) NOT NULL DEFAULT '0',
  `visit_timing_from` date DEFAULT NULL,
  `visit_timing_to` date DEFAULT NULL,
  `has_emergency` tinyint(1) NOT NULL DEFAULT '0',
  `has_insurance` tinyint(1) NOT NULL DEFAULT '0',
  `has_home_services` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Check whether the beauty center has home services',
  `account_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0=> Public, 1 Private',
  `link_profile_to` enum('self','fb','twitter','instagram','ytube','gplus','lkndin') NOT NULL DEFAULT 'self' COMMENT 'Defines where to navigate the account profile on user click',
  `timing` tinyint(1) DEFAULT NULL,
  `publish_on` enum('Arabic','English','All') DEFAULT 'All',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `subs_home_bg` varchar(255) DEFAULT NULL,
  `subs_access` varchar(300) DEFAULT NULL,
  `meta_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `meta_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `likes` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0',
  `show_on_map` tinyint(1) NOT NULL DEFAULT '0',
  `instagram_username` varchar(255) DEFAULT NULL,
  `payments` varchar(300) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscribers`
--

INSERT INTO `seha_subscribers` (`user_id`, `subs_title`, `subs_title_ar`, `subs_public_profile`, `profile_visits`, `subs_profile_img`, `subs_featured_image`, `show_featured_home`, `subs_gender`, `subs_cat_id`, `dept_fk`, `subs_type`, `subs_experience`, `subs_medical_center`, `subs_username`, `subs_email`, `subs_pwd_hash`, `r_password`, `subs_uniq_token`, `zipcode`, `subs_primary_contact`, `subs_secondary_contact`, `subs_timings`, `subs_lat_id`, `subs_long_id`, `subs_place`, `show_location`, `subs_url`, `city`, `subs_state`, `subs_country`, `subs_contact_name`, `email_verify`, `is_verified`, `status`, `subs_created`, `subs_update`, `subs_support_email`, `subs_secondary_email`, `subs_address_1`, `subs_address_1_ar`, `subs_address_2`, `subs_address_2_ar`, `subs_fax_no`, `is_featured`, `description`, `description_ar`, `description_en_long`, `description_en_long_ar`, `parking_en`, `bus_station_en`, `metro_en`, `parking_ar`, `bus_station_ar`, `metro_ar`, `enable_review`, `enable_comment`, `subs_review`, `is_approve`, `subs_languages`, `subs_summary`, `subs_summary_ar`, `is_visiting`, `visit_timing_from`, `visit_timing_to`, `has_emergency`, `has_insurance`, `has_home_services`, `account_type`, `link_profile_to`, `timing`, `publish_on`, `published`, `subs_home_bg`, `subs_access`, `meta_en`, `meta_ar`, `likes`, `comments`, `show_on_map`, `instagram_username`, `payments`) VALUES
(26, 'Sharjah Holistic Health', 'الشارقة العالمي للطب الشمولي', 'sharjahholistichealth', 1160, '19d2d6b32e4d8c429c11f0a1ef087510.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'anniyananeesh2345', 'info@hhuae.com', '7ebc3a1b93d71945069f9904c2e61193', 'anniyan2009', '229b090de6b092b5b9eed19deff3d0e4de5032fefb841c9e578baf1dd45ffc9fa2499820967c1d00d0cfb5bce4624d4337fbb173', NULL, '+97165720088', '0', NULL, '25.346057413746813', '55.391006337295494', NULL, 1, 'www.hhuae.com', 480, 3, '1', '0', NULL, 1, 1, '2015-06-02 15:35:58', '2016-10-10 12:50:57', NULL, NULL, 'King Abdul Aziz Street - Opposite Citi Bank', 'شارع الملك عبد العزيز - مقابل سيتي بنك', 'Mezzanine Floor', 'طابق الميزانين ', '+97165720099', 1, 'Sharjah international holistic health center inaugurated November 2006 as one of the most important leading centers in the region, that combines both traditional medicine and complementary medicine in its practice, using new medical technologies and highly qualified trained staff  collaborating together to provide holistic medical services.\r\n\r\nOur lead is to provide a combination of integrated and differentiated medical care services to keep pace with the latest in the world of medicine.\r\n\r\nTo provide quality health care services and to use the modern technologies in order to contribute effectively in raising the level of health care taking in consideration all humanitarian, ethical and professionalism aspects by Accuracy… Distinction. Medical Honesty', 'صحتك غايتنا مركز طبي متعدد التخصصات تحت اشراف د.هيمن النحال', '<p>Welcome to&nbsp;Sharjah Holistic Health</p>', '<p>مرحبا بكم في مركز الشارقة العالمي للطب الشمولي</p>', '0', '0', '0', '0', '0', '0', 0, 0, '2', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 0, 'self', 3, 'All', 1, '709b3401942ea5b6c6d9c26ebc61aaa9.jpg', 'a:4:{i:0;s:7:"doctors";i:1;s:6:"photos";i:2;s:4:"news";i:3;s:6:"offers";}', NULL, NULL, 5, 1, 1, 'holistichealth', NULL),
(27, 'European Dental Center', 'المركز الأوربي لطب الأسنان', 'europeandentalcenter', 83, 'd647f39aaec6152518634aa339bc4235.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'edc_shj@hotmail.com', NULL, NULL, NULL, NULL, '065529366', NULL, NULL, '25.332790616328715', '55.38989263690951', NULL, 1, NULL, 512, 3, '1', NULL, NULL, 1, 1, '2015-06-07 11:49:59', '2016-07-22 00:53:51', NULL, NULL, 'Almajaz - Cornich Albuhaira', 'المجاز -  كورنيش البحيرة', 'Albuhaira Blazza - 101', '101 - البحيرة بلازا', NULL, 0, 'European Dental Center is one of the most prestigious dental center in the heart of Sharjah city. It''s located in Buhairah Corniche area where the view of the lake gives the assurance and comfort.', 'لمركز الأوروبي لطب الاسنان هو واحد من أرقى مراكز الاسنان في قلب مدينة الشارقة , والواقع على كورنيش البحيرة حيث يتميز باطلالته الخلابة على البحيرة والتي تعطي جوا من الراحة والاطمئنان.', NULL, NULL, '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 3, 'self', 3, 'All', 1, 'a1e20d4611d7c21b28b29258e28bbad7.jpg', 'a:6:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";i:5;s:9:"insurance";}', NULL, NULL, 4, 0, 1, NULL, NULL),
(29, 'Ajyad Medical Center', 'مركز أجياد الطبي', 'AjyadMC', 670, '6abc2db98bd0a10115e5062eb27a5623.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'ajyadmedicalcenter', 'info@ajyadmc.com', '7847c0175cbdcfdfb7d0b60fcefa8a82', 'anniyan2009', '90bb74c9b71bd212b79c59b94d5f80cc5db700315cea940bccd51ea7c152350d123c9e8da589fed7fbb29713e2fb5364a2ed6078', NULL, '0097164557745', '0', NULL, '25.323611', '55.382777', NULL, 1, 'http://www.ajyadmc.com', 512, 3, '1', '0', NULL, 1, 1, '2015-06-29 14:23:56', '2016-10-08 16:16:02', NULL, NULL, 'Al Durrah Tower,211d, Corniche Street,Office 1307, 1308', 'برج الدرة ,كورنيش البحيرة ,مكتب 1307,1308', 'aldurra tower - 708', 'برج الدرة - 708', NULL, 1, 'your smile is our target ...smile with confidence', 'ابتسامتك معنا أفضل ...لأنك تستحق ابتسامة مميزة', '', '', '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 1, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:6:"photos";}', NULL, NULL, 12, 2, 1, NULL, NULL),
(30, 'Rona Rabah Dental Clinic', 'عيادة رونا رباح لطب الأسنان', 'ronarabahdentalclinic', 42, 'e6cbe5aa5a52627dc85588d1a89e302f.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'rona.rabah@gmail.com', NULL, NULL, NULL, NULL, '+97145586979', '0', NULL, '25.185323435302053', '55.26499373802869', NULL, 1, '', 283, 4, '1', '0', NULL, 1, 1, '2015-07-01 12:15:53', '2016-10-08 14:50:16', NULL, NULL, 'Burlington Tower, 1c, Al Abraj Street\n1 Floor, Office 111', 'الخليج التجاري - برج البرلنغتون - رقم 111 مقابل فندق الاوبروي', 'Burlington tower - 111', 'برج بيرلينغتون - 111', NULL, 0, 'welcome to rona rabah dental clinic where science meets technology and experience to give you the best services in dental world, many services and perfect results', 'مرحبا بكم في عيادة الدكتورة رونا لطب الأسنان حيث يلتقي العلم والتكنولوجيا والخبرة لتقديم أفضل الخدمات في طب الأسنان العادي والتجميلي خدمات متعددة ونتائج مذهلة ', '', '', '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, 'a:6:{i:0;s:15:"hollywoodsmile ";i:1;s:6:"crowns";i:2;s:7:"bridges";i:3;s:6:"venner";i:4;s:8:"lumineer";i:5;s:10:"whitening ";}', 'a:6:{i:0;s:28:"ابتسامة هوليود ";i:1;s:10:"تبييض";i:2;s:14:"تركيبات";i:3;s:10:"زراعة";i:4;s:8:"جسور";i:5;s:10:"تيجان";}', 2, 0, 1, NULL, NULL),
(31, 'Al zumurd Medical Center', 'مركز الزمرد الطبي', 'alzumurdmedicalcenter', 95, 'be93c1179837089ac121ad3c635cfe8a.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'z.m.c@live.com', NULL, NULL, NULL, NULL, '065316697', NULL, NULL, '25.336029', '55.424946', NULL, 1, NULL, 538, 3, '1', NULL, NULL, 1, 1, '2015-07-05 15:11:11', '2016-06-01 03:38:27', NULL, NULL, 'Samnan Wasit St,Opp shaba plaza', ' سمنان - شارع واسط مقابل الشهباء بلازا ', 'zumurd buliding 101', 'بناء الزمرد - 101', NULL, 0, 'Al Zumurd MC ....Home of beauty', 'مركز الزمرد الطبي للجمال ....... عنوان بإشراف د.لمى الزعبي', '<p>Al Zumurd MC ....Home of beauty</p>', '<p>مركز الزمرد الطبي للجمال عنوان .....بإشراف د.لمى الزعبي</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:1:{i:0;s:7:"doctors";}', NULL, NULL, 5, 0, 1, NULL, NULL),
(32, 'Illinois Medical Center', 'مركز إلينوي الطبي', 'illinoismedicalcenter', 30, '520ba02be47085f0622ee510843dd6f9.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@illinoispolyclinic.com', NULL, NULL, NULL, NULL, '04 349 9977', NULL, NULL, '25.213286', '55.257005', NULL, 1, 'www.illinoispolyclinic.com', 361, NULL, NULL, NULL, NULL, 1, 1, '2016-10-08 16:21:16', '2016-10-08 16:21:16', NULL, NULL, '60 32 C St - Dubai - United Arab Emirates', 'شارع الجميرا - جانب مركاتو مول ', 'Villa No. 163A', 'فيلا - رقم 163 أ', ' 04 349 8999', 0, 'Illinois Medical Center Clinic was established in May 2007, having the vision that nothing is more important than being able to trust and believe in the medical services that you are given by our professional doctors', 'أسس مركز إلينوي الطبي في 2007 تحت إشراف د.دعاء ضرغام حاملا هدف وغاية بأنه ليس هناك شي يعادل أهمية تقديم أفضل الخدمات الطبية للمرضى والحصول بالتالي على رضاهم التام عن خدمات المركز', '', '<p>أسس مركز إلينوي الطبي في 2007 تحت إشراف د.دعاء ضرغام حاملا هدف وغاية بأنه ليس هناك شي يعادل أهمية تقديم أفضل الخدمات الطبية للمرضى والحصول بالتالي على رضاهم التام عن خدمات المركز</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(33, 'Beauty Trick Medical Center', 'مركز بيوتي تريك الطبي', 'beautytrickmedicalcenter', 26, 'b2a1eb2ff1b6b2784bd1fe68fbfeb60a.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@beautytrick.ae', NULL, NULL, NULL, NULL, '+971 2 642 2771', NULL, NULL, '24.458584', '54.373367', NULL, 1, 'www.beautytrick.ae', 107, 5, '1', NULL, NULL, 1, 1, '2016-09-24 15:21:40', '2016-09-24 16:16:41', NULL, NULL, 'Al Karamah St - Abu Dhabi - United Arab Emirates', 'شارع ديلما', 'near sheikh sultan bin zayed stadium ', 'قرب ستاد الشيخ سلطان بن زايد ', NULL, 0, 'Beauty Trick medical center is a prestigious place for creation of beauty.\nlocated in the heart of city of Abu Dhabi . Your Soul ... Trick of beauty.', 'مركز بيوتي تريك الطبي هو المكان المميز لخلق الجمال ...يقع في قلب العاصمة أبوظبي ...لأن روحك هي مصدر الجمال', '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(34, 'Amrita Medical Center', 'مركز عمريتا الطبي', 'amritamedicalcenter', 27, 'b922110e656c44088596017e169747f3.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@amritamedicals.com', NULL, NULL, NULL, NULL, '97126661555', NULL, NULL, '24.477136', '54.348336', NULL, 1, 'http://www.amritamedicals.com', 709, 5, '1', NULL, NULL, 1, 1, '2015-07-20 16:34:30', '2015-08-02 09:44:30', NULL, NULL, 'alNasr Street ', 'شارع الناصر ', 'opist of family Park', 'مقابل حديقة العائلة  ', NULL, 0, 'Amrita Medical Center is established in 2003 under the management and authority of Dr. Abdul Karim Al Ramahi, a Specialist Pediatrician by profession and expert in his medical field.', 'سس مركز عمريتا الطبي عام 2003 تحت إدارة وإشراف الدكتور عبد الكريم الرمحي، وهو أخصائي في طب الأطفال وذو خبرة واحترافية في مجاله الطبي.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '4', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:8:"services";}', NULL, NULL, 0, 0, 1, NULL, NULL),
(35, 'Cosmo Health Medical Center', 'مركز كوزمو هيلث الطبي', 'cosmohealthmedicalcenter', 78, '0deeba753f915cfdbdeb034819e20e4a.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'omarskaf@gmail.com', NULL, NULL, NULL, NULL, '065669910', NULL, NULL, '25.3553814458781', '55.42142273071897', NULL, 1, 'www.cosmohealthmc.com', 498, 3, '1', NULL, NULL, 1, 1, '2015-07-21 12:30:36', '2015-08-02 13:37:20', NULL, NULL, 'Al Ramla west ', 'الرملة الغربية ', 'villa B568', 'فيلا 568 ب ', NULL, 0, 'Cosmo health medical center had been established in 2014 in Sharjah, providing the highest level of healthcare services by careful selection of highly qualified doctors and staff.', 'تم افتتاح مركز كوزمو هيلث الطبي في عام 2014  في الشارقة , ليضم نخبة من أمهر أخصائيي تجميل الأسنان في الامارات الذين صمموا ابتسامة الكثير من النجوم و المشاهير، و هم أعضاء معتمدون من الجمعية الطبية الأمريكية لطب الأسنان و لديهم الخبرة والتقنية…', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 3, 1, 1, NULL, NULL),
(38, 'Dr.Nemat Mossalami', 'د.نعمت المسلمي', 'dr.nematmossalami', 38, '4611d1320349b3d26cdc394375a996f0.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@360seha.com', NULL, NULL, NULL, NULL, '06 572 1052', NULL, NULL, '25.343506789766277', '55.40521619206538', NULL, 1, NULL, 458, 3, '1', NULL, NULL, 1, 1, '2015-07-23 13:59:05', '2015-09-06 18:39:11', NULL, NULL, 'Al Wahda st. Opp Gold Center', 'شارع الوحدة مقابل مركز الذهب ', 'Masafi pharmacy 305', 'صيدلية مسافي 305', NULL, 0, 'Our Dental Clinic is designed to provide state of the art quality dental treatment to be carried out in an attractive and welcoming environment.', 'تم تصميم العيادة لدينا وفق أحدث الطرق لتوفر أفضل الخدمات الطبية للمرضى في جو من الراحة والترحيب', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 0, NULL, NULL, NULL, NULL, 2, 0, 1, NULL, NULL),
(39, 'Oriana Hospital', 'مشفى أوريانا', NULL, 57, '8eb22195c371b8d62af8ab7a6c31bf3a.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, NULL, 'info@oriana-hospital.com', NULL, NULL, NULL, NULL, '+97165251000', NULL, NULL, '25.3127953', '55.3757071', NULL, 1, 'http://oriana-hospital.com', 1, 3, '1', NULL, NULL, 1, 1, '2015-07-23 18:12:47', '2015-07-23 18:18:14', NULL, NULL, ' New Al Taawun Rd', 'شارع التعاون الجديد', 'Manazil Tower 2', ' برج منازل 2', NULL, 0, 'The mission of Oriana Hospital is to provide patient-friendly care and good quality, in a setting of excellence customer service.\nOriana Hospital will be recognized as a healthcare facility that strives to provide best patient experience and an improved quality of life for the people it serves.', 'مهمة أوريانا هي توفير الرعاية الكاملة للمرضى بأعلى مستويات الجودة في مكان متميز في خدمة العملاء.\nسيتم الاعتراف بمستشفى أوريانا كمركز طبي بارز يسعى جاهدا لتوفير تجربة طبية متميزة للمرضى، ونتائج سريرية فائقة، من أجل تحسين نوعية الحياة للشعب الذي يقدم له الخدمات الطبية.', '<p>The mission of Oriana Hospital is to provide patient-friendly care and good quality, in a setting of excellence customer service.<br />Oriana Hospital will be recognized as a healthcare facility that strives to provide best patient experience and an improved quality of life for the people it serves.</p>', '<p>مهمة أوريانا هي توفير الرعاية الكاملة للمرضى بأعلى مستويات الجودة في مكان متميز في خدمة العملاء.<br />سيتم الاعتراف بمستشفى أوريانا كمركز طبي بارز يسعى جاهدا لتوفير تجربة طبية متميزة للمرضى، ونتائج سريرية فائقة، من أجل تحسين نوعية الحياة للشعب الذي يقدم له الخدمات الطبية.</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 1, 'All', 1, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL),
(40, 'ASTER', 'آستر', 'aster', 94, '6e5dfc3e5309ecbcba7078c6397c8ec0.jpg', NULL, 0, NULL, '39', NULL, 2, NULL, NULL, NULL, ' majaz@asterpharmacy.com', NULL, NULL, NULL, NULL, '06-5599799', NULL, NULL, '25.329500252326643', '55.39252730555722', NULL, 1, 'www.asterpharmacy.com', 481, 3, '1', NULL, NULL, 1, 1, '2015-08-02 16:44:31', '2016-07-22 03:12:56', NULL, NULL, 'Jamal Abdul Nasir st, Majaz', 'المجاز - جمال عبد الناصر', 'Near Al Fara Tower ', 'قرب  برج الفارا ', NULL, 0, 'With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.', 'بأكثر من 100 فرع نجعل الوصول  إلينا أقرب لنقابل كل إحتياجاتكم', '<p>With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.</p>', '<p>بأكثر من 100 فرع نجعل الوصول&nbsp; إلينا أقرب لنقابل كل إحتياجاتكم</p>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', 1, 'All', 1, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL),
(43, 'Almalaky Alafdhal', 'الملكي الأفضل لتقويم وتجميل الأسنان ', 'almalakyalafdhal', 52, '6c7026566dd8da575661d85ef76fba4d.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@malakydc.com', NULL, NULL, NULL, NULL, '+971 065446564 ', NULL, NULL, '25.344007', '55.386221', NULL, 1, 'www.malakydc.com', 512, 3, '1', NULL, NULL, 1, 1, '2015-08-09 13:01:56', '2015-08-09 13:26:44', NULL, NULL, 'Cornich St', 'كورنيش البحيرة ', 'Crystal Plaza , Office #1301', 'كريستال بلازا ,مكتب 1301', NULL, 0, 'From the smiling emirates of Sharjah, within its heart where a combination of classical and modernistic architectural wonders resides overlooking the the breath taking views of Khalid Lagoon and Sharjah Central Market, especial characters in the capital of Islamic culture emerges almalaky alafdhal for orthodontics and cosmetics dentistry to draw you to the most beautiful natured smile.', 'بعد دراسة دقيقة ارتأينا  فيها الدقة بالتفاصيل التي تخدم مرضانا من جميع الجوانب  تم انشاء المركز الملكي الافضل وفق احدث  التصاميم  آخذين بنظر الاعتبار اشعار المريض بالراحة النفسية حال دخوله المركز من خلال توفير صالة انتظار رائعة بالوان راقية ومدروسة بعناية لراحتكم وذات اطلالة رائعة على بحيرة خالد  ولخصوصية العادات والتقاليد العربية هناك قسم خاص لانتظار النساء\nولابأس في  موسيقى هادئة مع فنجان قهوة خلال  دقائق الأ نتظار ', '<p><span>From the smiling emirates of Sharjah, within its heart where a combination of classical and modernistic architectural wonders resides overlooking the the breath taking views of Khalid Lagoon and Sharjah Central Market, especial characters in the capital of Islamic culture emerges almalaky alafdhal for orthodontics and cosmetics dentistry to draw you to the most beautiful natured smile.</span></p>', '<p>بعد دراسة دقيقة ارتأينا&nbsp; فيها الدقة بالتفاصيل التي تخدم مرضانا من جميع الجوانب&nbsp; تم انشاء المركز الملكي الافضل وفق احدث&nbsp; التصاميم&nbsp; آخذين بنظر الاعتبار اشعار المريض بالراحة النفسية حال دخوله المركز من خلال توفير صالة انتظار رائعة بالوان راقية ومدروسة بعناية لراحتكم وذات اطلالة رائعة على بحيرة خالد&nbsp; ولخصوصية العادات والتقاليد العربية هناك قسم خاص لانتظار النساء<br />ولابأس في&nbsp; موسيقى هادئة مع فنجان قهوة خلال&nbsp; دقائق الأ نتظار</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(44, 'Unicare', 'يوني كير', 'unicare', 16, 'ef17b01c0925919cbf9734dc187dc2c0.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@unicaredubai.com', NULL, NULL, NULL, NULL, '971 4 352 9292', NULL, NULL, '25.25405', '55.303072', NULL, 1, 'http://www.unicaredubai.com', 282, 4, '1', NULL, NULL, 1, 1, '2015-08-09 13:48:22', '2016-10-08 16:25:57', NULL, NULL, 'Sheik Khalifa Bin Zayed Road', 'شارع الشيخ خليفة بن زايد ', 'BurJuman Centre,23 North Wing', 'مركز برجمان ,23 نورث وينغ  ', NULL, 0, 'Founded in 1998, uniCare is an integrated healthcare provider offering a comprehensive range of healthcare services. ', 'Founded in 1998, uniCare is an integrated healthcare provider offering a comprehensive range of healthcare services. ', '<p><span class="text_exposed_show"><br /></span></p>', '<p><span class="text_exposed_show"><br /></span></p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(45, 'Aster Pharmacy', 'صيدلية آستر', 'asterpharmacy', 16, 'b3aecc55d3de7445a20d50b836bdc34d.jpg', NULL, 0, NULL, '39', NULL, 2, NULL, NULL, NULL, 'aster1@asterpharmacy.com', NULL, NULL, NULL, NULL, '04-3863800', NULL, NULL, '25.259804', '55.293953', NULL, 1, 'www.asterpharmacy.com', 279, 4, '1', NULL, NULL, 1, 1, '2015-08-12 15:06:31', '2015-08-12 15:28:10', NULL, NULL, 'Bur Dubai, Dubai', 'Bur Dubai, Dubai', ' Bait Al Waleed, Al Souq Al Kabeer', ' Bait Al Waleed, Al Souq Al Kabeer', NULL, 0, 'With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.\n', 'With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.\n', '<h3>With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.</h3>', '<h3>With over 100 pharmacies under our belt, we make it easier for you to find the one closest to you and that meets your needs.</h3>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', 1, 'English', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(46, 'Al Zahra Hospital', 'مستشفى الزهراء', 'alzahrahospital', 117, '5ebe344e9408c22dde5e251c3f38dcd2.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, NULL, 'alzahra@alzahra.com', NULL, NULL, NULL, NULL, '+971 6 5157437', NULL, NULL, '25.3603259', '55.3941331', NULL, 1, 'www.alzahra.com', 536, 3, '1', NULL, NULL, 1, 1, '2015-08-13 10:28:44', '2016-10-07 20:10:52', NULL, NULL, 'Rolla Area', 'منطقة الرولة ', 'Al Zahra Hospital', 'مشفى الزهراء ', NULL, 0, 'Al Zahra Hospital was established in 1981 by Gulf Medical Projects Company. This 100 bed hospital is the first and largest private general hospital in the UAE. Both inpatient and outpatient treatment is of an international standard, and is backed by the latest radiology and laboratory facilities.', 'Al Zahra Hospital was established in 1981 by Gulf Medical Projects Company. This 100 bed hospital is the first and largest private general hospital in the UAE. Both inpatient and outpatient treatment is of an international standard, and is backed by the latest radiology and laboratory facilities.', '<p>Welcome to&nbsp;Al Zahra Hospital</p>', '<p>&nbsp;مرحبا بكم في مستشفى الزهراء</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', 1, 'All', 1, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, NULL),
(47, 'University Hospital Sharjah', 'مستشفى جامعة الشارقة', 'UHS', 38, '92902b4fd6a1d6f19a1a7b6f7f13c53f.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, NULL, 'info@uhs.ae', NULL, NULL, NULL, NULL, '+971 6 5058555', '+971 6 5058555', NULL, '25.29910460035135', '55.490286350250244', NULL, 1, 'www.uhs.ae', 543, 3, '1', 'admin', NULL, 1, 1, '2015-09-05 14:15:51', '2016-07-20 13:45:54', NULL, NULL, 'unvirsity city', 'المدينة الجامعية', 'University Hospital Sharjah', 'مستشفى الجامعة الشارقة ', '+971 6 5058444', 0, 'University Hospital Sharjah is a multi specialty luxury hospital in Sharjah', 'مستشفى الجامعة في الشارقة مشفى متعددة الأختصاصات ...أنعم معنا بالرفاهية  ', '<p>University Hospital Sharjah is a multi specialty luxury hospital in Sharjah</p>', '<p>مستشفى الجامعة في الشارقة مشفى متعددة الأختصاصات ...أنعم معنا بالرفاهية&nbsp;</p>', 'free parking', 'N/A', 'N/A', 'مواقف مجانية', 'N/A', 'N/A', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 0, 2, 'self', 1, 'All', 1, NULL, 'a:7:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";i:5;s:9:"insurance";i:6;s:4:"chat";}', NULL, NULL, 0, 0, 1, NULL, 'cash,credit_card'),
(50, 'Arwa Dental Clinic', 'عيادة أروى لطب الأسنان', 'arwadentalclinic', 50, 'a6827ddece2af93694a1b540cc3af8ce.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'drarwaalani@yahoo.com ', NULL, NULL, NULL, NULL, '0097142955200', NULL, NULL, '25.2556466', '55.3323037', NULL, 1, 'www.arwadentalclinic.com', 293, 4, '1', NULL, NULL, 1, 0, '2015-10-24 12:59:41', '2016-07-22 13:36:58', NULL, NULL, 'Deira City Centre, Port Saeed', 'بور سعيد مقابل ديرة سيتي سنتر', 'Al Wahda Building ,604', 'بناء الوحدة 604 ', NULL, 0, 'The clinic was opened in 2009 \nClinic staff includes 4 Doctors with 16 years experience and 5 nurses\nThe clinic has 4 rooms equipped with the latest Dental equipment & another 1 room are under installation\nThe clinic is considered as centre for cosmetic dentistry', 'تم افتتاح العيادة في عام 2009\n.يشمل موظفي العيادة على 4 من الأطباء  يتمتعون\n بخبرة 16 سنة من العمل و كما تشمل العيادة على 5 ممرضات\n.تحوي العيادة على 4 غرف مجهزة بأحدث معدات الأسنان و غرفة قيد التركيب\n.و تعتبر العيادة كمركز لطب الأسنان التجميلي', '<p>The clinic was opened in 2009 <br />Clinic staff includes 4 Doctors with 16 years experience and 5 nurses<br />The clinic has 4 rooms equipped with the latest Dental equipment &amp; another 1 room are under installation<br />The clinic is considered as centre for cosmetic dentistry</p>', '<p style="text-align: right;">تم افتتاح العيادة في عام 2009<br />.يشمل موظفي العيادة على 4 من الأطباء&nbsp; يتمتعون بخبرة 16 سنة من العمل و كما تشمل العيادة على 5 ممرضات<br />.تحوي العيادة على 4 غرف مجهزة بأحدث معدات الأسنان و غرفة قيد التركيب<br />.و تعتبر العيادة كمركز لطب الأسنان التجميلي</p>', 'Free parking', 'N/A', 'Dira city center', 'موقف مجاني', 'N/A', 'ديرة سيتي سنتر', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 0, 2, 'self', 3, 'All', 1, NULL, 'a:8:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:7:"doctors";i:3;s:6:"photos";i:4;s:6:"videos";i:5;s:4:"logo";i:6;s:9:"insurance";i:7;s:4:"chat";}', 'a:3:{i:0;s:5:"smle ";i:1;s:16:"hollywood smile ";i:2;s:6:"dental";}', 'a:2:{i:0;s:28:"ابتسامة هوليود ";i:1;s:26:"تجميل الأسنان ";}', 0, 0, 1, NULL, 'cash,credit_card'),
(51, 'Smile desigen dental clinic', 'عيادة سمايل ديزاين لطب الأسنان', 'smiledesigendentalclinic', 51, 'e9bd38f7113ec3507d0ef0269bef0b1e.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'smiledesignc@gmail.com', NULL, NULL, NULL, NULL, '+97142395776', '', NULL, '25.2433503', '55.3422654', NULL, 1, '', 335, 4, '1', 'Admin', NULL, 1, 0, '2015-10-25 09:49:58', '2016-07-22 03:10:06', NULL, NULL, 'Al Garhoud,Sheikh Rashid Road,city Dubai', 'القرهود ,دبي ,شارع الشيخ راشد ', 'Zalfa Building, 12, 107', 'بناء زلفة 107', NULL, 0, 'Hollywood Smile In Dubai Member of AADC ', 'مصمموا ابتسامة هوليود في دبي أعضاء الجمعية الأمريكية لطب الأسنان ', '<p>Hollywood Smile In Dubai Member of AADC</p>', '<p>مصمموا ابتسامة هوليود في دبي أعضاء الجمعية الأمريكية لطب الأسنان</p>', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 0, 2, 'self', 3, 'All', 1, NULL, 'a:8:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:7:"doctors";i:3;s:6:"photos";i:4;s:6:"videos";i:5;s:4:"logo";i:6;s:9:"insurance";i:7;s:4:"chat";}', 'a:3:{i:0;s:6:"smile ";i:1;s:9:"hollywood";i:2;s:16:"hollywood smile ";}', 'a:3:{i:0;s:15:"ابتسامة ";i:1;s:32:"ابتسامة المشاهير ";i:2;s:27:"ابتسامة هوليود";}', 0, 0, 1, NULL, 'cash,credit_card'),
(52, 'Al Mariffa Medical Centre', 'مركز المعرفة الطبي', 'AlMariffaMedicalCenter', 60, '9c717719564421d76901c32fc43b91a4.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'dnaatp72@yahoo.com', NULL, NULL, NULL, NULL, ' 065251061', NULL, NULL, '25.33097568876417', '55.37666020301049', NULL, 1, NULL, 512, 3, '1', NULL, NULL, 1, 1, '2015-11-02 12:16:15', '2015-11-02 13:50:14', NULL, NULL, 'Buhaira Corniche-Sharjah', 'كورنيش البحيرة-الشارقة', 'Emirates Sail Tower, Flat 201', 'برج البحار الاماراتي-شقة201', NULL, 0, 'Al Mariffa Medical Center is a state of art multi-disciplinary health care delivery centre led by a team of doctors with a long experience in the field of private medical practice in UAE.', 'مركز المعرفة الطبي هو حالة من الفن متعدد التخصصات في الرعاية الصحية بقيادة فريق من الأطباء مع خبرة طويلة في مجال الممارسة الطبية خاصة في دولة الإمارات العربية المتحدة', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:7:"doctors";}', 'a:5:{i:0;s:7:"Dentist";i:1;s:19:"Oral Implantologist";i:2;s:27:"Oral Maxillofacial Surgeon\n";i:3;s:12:"Orthodontist";i:4;s:17:"Pediatric Dentist";}', 'a:5:{i:0;s:10:"اسنان";i:1;s:10:"تقويم";i:2;s:19:"جراحة فكين";i:3;s:21:"زراعة اسنان";i:4;s:0:"";}', 1, 0, 1, NULL, NULL),
(53, 'Al Mariffa Medical Center', 'مركز المعرفة الطبي', 'almariffamedicalcenter', 12, '5f0bfc3931b7ff03c9b7f73295fb7884.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'dnaatp72@yahoo.com', NULL, NULL, NULL, NULL, '+97142522133 ', NULL, NULL, '25.25698468236245', '55.332978788268974', NULL, 1, NULL, 293, 4, '1', NULL, NULL, 1, 1, '2015-11-02 13:28:46', '2015-11-02 13:48:31', NULL, NULL, ' Port Saeed-Dubai', 'شارع بور سعيد-دبي', '(Al Sarkal), Flat 1006', 'السركال شقة 1006', NULL, 0, 'Al Mariffa Medical Center is a state of art multi-disciplinary health care delivery centre led by a team of doctors with a long experience in the field of private medical practice in UAE.', 'مركز المعرفة الطبي هو حالة من الفن متعدد التخصصات الرعاية الصحية بقيادة فريق من الأطباء مع خبرة طويلة في مجال الممارسة الطبية خاصة في دولة الإمارات العربية المتحدة .', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:7:"doctors";}', 'a:5:{i:0;s:7:"Dentist";i:1;s:19:"Oral Implantologist";i:2;s:27:"Oral Maxillofacial Surgeon\n";i:3;s:12:"Orthodontist";i:4;s:17:"Pediatric Dentist";}', 'a:5:{i:0;s:10:"اسنان";i:1;s:10:"تقويم";i:2;s:19:"جراحة فكين";i:3;s:19:"زراعة اسان";i:4;s:36:"علاجات سنية للاطفال";}', 0, 0, 1, NULL, NULL),
(54, 'French Medical Center', 'المركز الفرنسي الطبي', 'frenchmedicalcenter', 9, '7662f07074ae7c2a8d3882eedae36924.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '(+971) 065744266', NULL, NULL, '25.336516', '55.387253', NULL, 1, NULL, 512, 3, '1', NULL, NULL, 1, 1, '2015-11-02 14:02:03', '2015-11-02 15:22:24', NULL, NULL, 'Buhaira Corniche, Sharjah', 'كورنيش البحيرة, الشارقة', 'Buheira Building, Flat #201 , Near Hardees and Kentucky', 'بناية البحيرة، رقم ٢٠١ , بجانب هارديز و كنتاكي', NULL, 0, 'French Medical Center (formerly: French clinic  of Rheumatology) is the first specialized Rheumatology clinic to open officially in the UAE in 1994 and was licensed in 1993.\n\nIt is the leading center in Rheumatic diseases and bone joints for the treatment of Rheumatic diseases and Immune diseases of aging, spinal diseases and sports injuries and Rheumatic children. It was the first center to use the Dicksa device to measure osteoporosis in the private sector. Was also a leading center in the blend between the diagnosis and treatment of Rheumatic diseases, bone  joints and Physiotherapy (physical). It was established as an advanced center for physiotherapy and spine, joints and bones since 1994.\n', 'المركز الفرنسي الطبي ( العيادة الفرنسية لأمراض الروماتيزم سابقا" ) أول عيادة تخصصية في أمراض الروماتيزم تفتتح في دولة الإمارات في عام 1994 بشكل عملي ولقد تم الترخيص في عام 1993. المركز الرائد في أمراض الروماتيزم والمفاصل العظمية لعلاج أمراض الروماتيزم المناعية وأمراض الشيخوخة وكبار السن وأمراض العمود الفقري والإصابات الرياضية وروماتيزم الأطفال. المركز الأول الذي اعتمد جهاز ديكسا لقياس هشاشة العظام في القطاع الخاص.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 1, 0, 1, NULL, NULL),
(55, 'German Medical Center DHCC', 'المركز الطبي الألماني', 'germanmedicalcenter', 2, 'c7797afb6268f45c2239c63675d48ad0.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, ' info@gmcdhcc.com', NULL, NULL, NULL, NULL, '044322989', NULL, NULL, '25.2313716', '55.3241099', NULL, 1, NULL, 1193, 4, '1', NULL, NULL, 1, 1, '2015-11-02 15:26:13', '2015-11-16 16:08:29', NULL, NULL, 'Dubai - Dubai Healthcare City', 'بي - مدينة دبي الطبية ', ' Ibn Sina Building 27 ,Block B, Clinic 302 & 404', 'بنى ابن سينا 27 - بلوك ب - عيادة رقم 302 و 404', NULL, 0, 'The German Medical Center is a multi-specialty medical institution offering world-class medical care in Dubai Healthcare City. Care is provided via a roster of highly qualified doctors and visiting consultants who are specialists in their fields.\n\nThe German Medical Center’s model of medical service provision complements local doctors’ expertise with carefully selected visiting consultants from Germany.\n\nConfidentiality, integrated care, patient doctor communication and an emphasis on follow-up care set the Center apart in quality of care as well as the entire patient experience.', 'لمركز الطبي الأالماني في مدينة دبي الطبية هو مركز متعدد التخصصات يقدم أعلى مستويات الرعاية الصحية وذلك من خلال حرصه على إختيار باقة متميزة من الأطباء الإستشاريين الألمان من ذوي الكفاءة العالية في مختلف التخصصات الطبية والذين يصلون تباعا على مدار العام ليقدموا خبراتهم في التشخيص و المتابعة العلاجية الى تمام الشفاء باذن الله من خلال جدول زيارات منظم يدعم متابعتهم لكم في أوقات متقاربة حسب مواعيد الزيارات', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:9:"insurance";}', NULL, NULL, 0, 0, 1, NULL, NULL),
(56, 'Armada Medical Centre', 'مركز أرمادا الطبي', 'armadamedicalcentre', 9, 'bf39d400bfe3e9ac8bd7a5dc0970b623.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, 'info@armadahospital.com', NULL, NULL, NULL, NULL, '043990022', NULL, NULL, '25.07496859910225', '55.144913455017104', NULL, 1, NULL, 361, 4, '1', NULL, NULL, 1, 1, '2015-11-02 16:03:06', '2015-11-02 16:25:00', NULL, NULL, 'Jumeirah Lakes Towers, Dubai,', 'أبراج بحيرات جميرا، دبي، ', 'Armada Towers, P2, 19th Floor', 'أبراج أرمادا، P2، الطابق 19', NULL, 0, 'Armada Medical Centre JLT provides patients with state of the art facilities as well as comprehensive range of services to address needs of every patient.', 'مركز ارمادا الطبي يوفر للمرضى احدث المرافق و التجهيزات الطبية بالاضافة لطيف واسع من الخدمات التي تناسب احتياجات المرضى', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(58, 'New Hope IVF', 'مستشفى نيو هوب للأمراض النسائية و الإخصاب', 'newhopeivf', 11, '3e7885f2230b35e6d4fbe1fee254d112.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, NULL, 'info@newhopeivf.com', NULL, NULL, NULL, NULL, '065254446', NULL, NULL, '25.320105403395207', '55.36339975120393', NULL, 1, NULL, 660, 3, '1', NULL, NULL, 1, 1, '2015-11-03 10:46:08', '2015-11-03 11:13:05', NULL, NULL, ' AL MAMZAR CORNICHE- Alsharjah', ' كورنيش الممزر- الشارقة', 'AL SONDUS TOWER. AL KHAN STREET', 'برج السندس - شارع الخان', NULL, 0, 'New Hope IVF has been synonymous with quality IVF care. The ability to give our clients comprehensive IVF care from Basic Diagnostic Work Up to the most advanced In Vitro Fertilization Techniques all under one roof has been our hallmark. Patients are seen in a caring environment, where the major emphasis is not only on technological excellence, but also on accessibility, warm and friendly personal attention and emotional support.', '. لقد نجح مستشفى نيو هوب للإخصاب في أن يصبح مرادفًا لرعاية عالية الجودة في مجال الإخصاب خارج الجسم، فما يميزّنا هو قدرتنا على منح عملائنا رعاية الإخصاب الشاملة، بدءاً من عمليات التشخيص البسيطة وصولاً إلى أكثر تقنيات الإخصاب خارج الجسم تقدماً، . أما التعامل مع المرضى فيتم في بيئة اهتمام ورعاية حيث يكون التركيز الرئيسي على التفوق التكنولوجي تمامًا كما على توفير الدعم العاطفي والرعاية الشخصية الدافئة و والودية.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(59, 'International Modern Hospital', 'المستشفى الدولي الحديث', 'internationalmodernhospital', 9, '1db0687ea5e412b94134eda0365983aa.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, NULL, 'info@imh.ae', NULL, NULL, NULL, NULL, '+971 4 406 3000', NULL, NULL, '25.248779', '55.283505', NULL, 1, NULL, 279, 4, '1', NULL, NULL, 1, 1, '2015-11-03 11:26:02', '2015-11-03 11:55:21', NULL, NULL, 'Port Rashid Road-Al Mankhool Area - Bur Dubai', 'شارع ميناء راشد – منطقة المنخول – بر دبي- دبي', 'International Modern Hospital building ', 'المستشفى الدولي الحديث ', NULL, 0, 'The International Modern Hospital is an up- to-date private general hospital which offers a variety of services with multiple specialties in an all private room inpatient facility', ' المستشفى الدولي الحديث متعدد التخصصات  اكثر من 24 تخصص و يقدم افضل خدمات الرعاية   الطبية ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 1, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, NULL),
(60, 'NOUR AL HUDA PHARMACY', 'صيدلية نور الهدى', 'nouralhudapharmacy', 41, '3bf1ca2d67c6187926d3503d7d3f1dfb.jpg', NULL, 0, NULL, '39', NULL, 2, NULL, NULL, NULL, 'nouralhuda-phcy@hotmail.com', NULL, NULL, NULL, NULL, '065562494', NULL, NULL, '25.3254879', '55.3779781', NULL, 1, NULL, 481, 3, '1', NULL, NULL, 1, 1, '2015-11-11 15:21:20', '2015-11-14 16:17:13', NULL, NULL, 'Behind Hilton Hotel -Almajaz3-Sharjah', 'خلف فندق هيلتون - المجاز 3 - الشارقة', 'Nour al huda pharmacy', 'صيدلية نور الهدى', '065565794', 0, 'Nour al huda pharmacy', 'صيدلية نور الهدى ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:2:{i:0;s:4:"news";i:1;s:4:"tips";}', NULL, NULL, 0, 0, 1, NULL, NULL),
(61, 'omaya medical center', 'مركز أمية الطبي', 'omayamedicalcenter', 12, '0255e59d88a1ade5658c28f5e3cca6da.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '04 224 2281', NULL, NULL, '25.2634736', '55.3163692', NULL, 1, NULL, 0, 4, '1', NULL, NULL, 1, 1, '2015-11-16 18:14:33', '2015-11-29 17:40:00', NULL, NULL, ' Al Maktoum street', 'شارع المكتوم ', 'Doha Centre, above Qatar Airlines', 'مركز الدوحة ', '04 224 2287', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:7:"doctors";}', NULL, NULL, 0, 0, 1, NULL, NULL),
(62, 'The polyclinic', 'المجمع الطبي-د.محمد بهاء حابس', 'thepolyclinic', 16, '2c8c33b7079e106ba98b4d226037b73f.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'polyclinicuae', 'thepolyclinic@gmail.com', '8c86b0e18facd57bcbf351fb18fb8989', 'poly123456', 'bc48345f716bed2836916153590fa6853d649f0b0673d4df23d739ef0f7605df3ab4ba093b3ccf4d322d21355827c58e3b8fae05', NULL, '042950007', NULL, NULL, '25.259904256766774', '55.333326142883266', NULL, 1, NULL, 293, 4, '1', NULL, NULL, 1, 1, '2015-11-29 14:13:36', '2016-03-24 09:53:30', NULL, NULL, 'Port saeed road ', 'شارع بور سعيد ', 'opp.deira city center - al wahda building-105', 'مقابل ديرة سيتي سنتر - بناء الوحدة- 105', '042957161', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:10:{i:0;s:11:"departments";i:1;s:7:"doctors";i:2;s:8:"services";i:3;s:6:"offers";i:4;s:4:"news";i:5;s:9:"insurance";i:6;s:8:"articles";i:7;s:6:"photos";i:8;s:6:"videos";i:9;s:4:"tips";}', NULL, NULL, 0, 0, 1, NULL, NULL),
(70, 'Ibn Nafees Medical Center', 'مركز ابن النفيس الطبي', 'ibnnafeesmedicalcenter', 43, 'fc2eba87a8294790b15130970a11109a.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'ibnnafees', 'info@ibnnafees.com', '52d38c4215ef6c89df4169cc361dcbd0', 'ZnaXKleIATW2', '8720912240fdfe6e604db6db46350a068b106a082f8d74f5a2bc7b3a6998349172a0dc2fc23d3e9499a16e6aaa618377d6109d96', NULL, '0097126324200', '0097126324200', NULL, '24.491402085303328', '54.368362290573145', NULL, 1, 'www.ibnnafees.com', NULL, 5, '1', 'admin', NULL, 1, 1, '2016-07-19 11:46:09', '2016-07-21 11:58:37', NULL, NULL, 'Central area - Najda Street - Tower Building Bin Saqr - the fourth floor', 'المنطقة المركزية - شارع النجدة - مبنى برج بنا صقر - الطابق الرابع', NULL, NULL, NULL, 0, NULL, NULL, '<p>Our aim at Ibn Nafees Medical Center is to provide our patients with the highest quality of medical care. Patients of Ibn Nafees Medical Center are the first to benefit from the latest technologies and treatment.</p>', '<p>هدفنا في مركز ابن النفيس الطبي هو توفير لمرضانا أعلى مستويات الجودة من الرعاية الطبية مرضى مركز ابن النفيس الطبي هم أول المستفيدين من أحدث التقنيات والعلاج.</p>', 'Paid  parking avilable', 'N/A', 'N/A', 'موقف مدفوع متوفر', 'N/A', 'N/A', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 0, 2, 'self', 3, 'All', 1, NULL, 'a:6:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:4:"logo";i:4;s:9:"insurance";i:5;s:4:"chat";}', NULL, NULL, 0, 0, 0, NULL, 'cash,credit_card'),
(71, 'Basmat alhayat MC', 'مركز بسمة الحياة لطب الأسنان', 'basmatalhayatmc', 21, '28aeed836fe0949aaa0b4e2723ddf794.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'Basmatalhayat', 'info@basmatalhayatdc.com', '7446c00626f63cc6cfdf83cbc3db20a8', 'ba123456', '10493dafd8ffcdcb9811bd634969072ab11825c441ea5cc2b9992803192432db289b9c7616aff9834deba318f6117f2888c4f62a', NULL, '065655336', '065655336', NULL, '25.336226601854314', '55.37549958915724', NULL, 1, 'http://www.basmatalhayatdc.com/', NULL, 3, '1', 'Eihab', NULL, 1, 1, '2016-07-22 13:52:29', '2016-07-24 11:34:52', NULL, NULL, '1102, Sarh Al Emarart Towe\n             Corniche St.', 'مكتب 1102, برج صرح الامارات- كورنيش البحيرة', NULL, NULL, NULL, 0, NULL, NULL, '<p><span>Basmat Al hayat Dental Center</span><span>&nbsp;is a gathering of a group of excellent dentists&rsquo; recipients of distinguished scientific qualifications, we have an outstanding team that is committed to quality standards. Our goal is to satisfy patients by providing use of the best findings of the science dental treatment, we believe that the highest values must be followed in all aspects of our services so we focus on continuous training for our administrators with the interest of our doctors team to keep up with everything that is modern in dentistry and its application.</span><br /><span>We apply science of dentistry to provide the best services and to meet the needs of the health of our patients.</span></p>', '<div class="about-ins">هو تجمع لنخبة ممتازة من أطباء الأسنان الحاصلين على مؤهلات علمية متميزة , فلدينا فريق متميز وملتزم بمعايير الجودة.<br />هدفنا هو إرضاء المرضى من خلال تقديم العلاج بإستخدام أفضل ما توصل اليه علم طبا الأسنان , نحن مؤمنون بأن القيم العليا يجب أن تًتبع فى كل جوانب خدماتنا لذلك نركز على التدريب المستمر لموظفينا الاداريين مع اهتمام فريق أطبائنا على مواكبة كل ما هو حديث فى علم طب الاسنان وتطبيقة .<br />نحنُ نكرس علم طب الاسنان لتقديم أفضل الخدمات ولنلبي احتياجات صحة مرضانا&nbsp;</div>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:6:{i:0;s:7:"timings";i:1;s:7:"doctors";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";i:5;s:9:"insurance";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(72, 'Urology Diagnostic Clinic', 'العيادة التشخيصية للمسالك البولية', 'udc', 8, '6aaaefed06843c7c9d51f26787aa6ff7.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'admin', 'info@udc-uae.com', 'bd482a155163cd5df4082a53bc6dcb93', 'udc123456', 'e4d5f52a71b4875073dc3a831e1c19431e617782913dd9eadeaeb6f5e7681aecf2aac7f521232f297a57a5a743894a0e4a801fc3', NULL, '+971 4 4325 006', '+971 4 4325 006', NULL, '25.23308093957692', '55.31774626464846', NULL, 1, 'http://www.udc-uae.com', NULL, 4, '1', 'osama', NULL, 1, 1, '2016-07-24 13:05:43', '2016-07-24 13:41:58', NULL, NULL, 'Dubai Health City - Al Razi Medical Complex Building 64, Block A ,First Floor Suite No.: 1010', 'مدينة دبي الطبية, بناية الرازي , 64 مبنىA ,الطابق الأول , جناح 1010', NULL, NULL, NULL, 0, NULL, NULL, '<p>Our mission is to provide the highest quality personalized medical care in our state-of-the art urology clinical facility, t<span>he <span >Urology Diagnostic Clinic in Dubai</span></span>&nbsp;(UDC) The . Our physician, Dr. Osama Jaber is a German Board Certified Urologist (Facharzt) and top urologist in Dubai. He is specialized in the comprehensive treatment of urological disorders using the most advanced technology available.</p>', '<p>نشئت العيادة التشخيصية للمسالك البولية في مدينة دبي للرعاية الصحية في عام 2013، وهي منشأة متخصصة في تقديم أعلى مستوى من الرعاية الصحية للمسالك البولية للمقيمين في دبي.<br />في عيادتنا لدينا الطبيب والمؤسس والمدير، د. أسامة جبر، الذي حاز على شهادة البورد الألماني للمسالك البولية - (فاخر ارزت)، والحاصل أيضا على شاهدة الطب، مكملا الإقامة الجراحية في جامعة ايسن عام 1997.<br /><br />-يركز نهجنا على صحة المسالك البولية للمرضى بشكل عام طوال حياتهم ,لزويدهم بأعلى مستوى ممكن من الراحة.<br /><br />نحن نؤمن أن الرعاية الممتازة تعتمد على تفهم مرضانا لمرضهم و لخيارات التشخيص و طرق العلاج&nbsp; المقدمة لهم ,حيث نبذل كل جهودنا للإجابة على الأسئلة الواردة من مرضانا لتوفير بيئة داعمة ومريحة لهم .</p>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:5:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";}', NULL, NULL, 0, 0, 0, NULL, 'cash,credit_card'),
(73, 'Dr. Sulaiman Al-Habib Hospital', 'مستشفى د.سليمان الحبيب', 'dr.sulaimanal-habibhospital', 13, '3a29c8ea88133c5168e25a4d0a1325fd.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, 'sulaiman', 'info@drsulaimanalhabib.com', 'fce2995f273ea85e664a666c218e6b9f', 'su123456', '85a107a9cec4431d9a631a1d82eacbbb9142627ae4d564c515fe4461d5d7b854a15773073460d81e02faa3559f9e02c9a766fcbd', NULL, '0097144297777', '0097144297777', NULL, '25.23144561889347', '55.3208683559418', NULL, 1, 'http://hmg.com.sa', NULL, 4, '1', 'admin', NULL, 1, 1, '2016-07-26 15:49:40', '2016-10-08 13:53:42', NULL, NULL, 'Dubai Healthcare City', 'المدينة الطبية', NULL, NULL, NULL, 0, NULL, NULL, '', '', '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:4:{i:0;s:7:"timings";i:1;s:6:"photos";i:2;s:4:"logo";i:3;s:9:"insurance";}', NULL, NULL, 0, 0, 0, NULL, 'cash,credit_card'),
(74, 'Emirates International Hospital', 'المستشفى الدولي الإماراتي', 'emiratesinternationalhospital', 92, '7fdda9f96e8b197503262fbbce91974c.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, 'eihospital', 'infoeihospital@gmail.com', '9c646d437d0cc60d238c74a6540f5271', 'ei123456', 'cd0378aa470247b18c918f9c2cf963779667612747e3b5ca902b289d7b170ceabe9dda8f4f6f713457ba581ee85420d77024872f', NULL, '06 516 9100', '06 516 9100', NULL, '25.392074844905807', '55.41923300714495', NULL, 1, 'http://eihospital.com', NULL, 3, '1', 'dr.main', NULL, 1, 1, '2016-07-27 13:17:32', '2016-07-28 17:49:08', NULL, NULL, 'Al Montazah St.', 'شارع المنتزه', NULL, NULL, NULL, 1, NULL, NULL, '<p>The Emirates International Hospital is a multi-specialty clinic, with a commitment to promote and care for the health and well-being of our community. We provide comprehensive medical care in the following specialties, Cosmetic and Beauty Clinic, Plastic Surgery, Dentistry, Internal Medicine and Orthopedic.</p>\n<p>The Emirates International Hospital also offers Beauty treatments to the more discerning patients, focusing on their concerns and finding satisfying solutions with minimally invasive techniques. We believe in maintaining the beauty of the physical aspects and delaying the ageing process.</p>\n<p>The Emirates International Hospital is committed to meet the needs of our patients in a friendly atmosphere. We strive to become your medical center and healthcare destination of choice.</p>', '<p>المستشفى الدولي الإماراتي هم مستشفى لجراحة اليوم الواحد ومستوصف متعدد العيادات يخدم منطقة واسعة تشمل الشارقة وعجمان والمناطق القريبة من باقي الإمارات</p>\n<p>تتمحور أولوياتنا في المستشفى الدولي الإماراتي على الجودة ,السلامة ,الاحترافية الخبرة المهنية والكفاءة لتكون بمثابة مرتكزات لتوجيه جميع العاملين الى وضع مرضانا في صميم كل مانقوم بع بغض النظر عن الدور الذي نقوم به وبشكل مباشر أو غير مباشر في تقديم الرعاية الصحية للمرضى في جميع الأقسام بطريقة فعالة وآمنة</p>', 'free parking', '', '', 'موقف مجاني', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 1, 0, 1, 'self', 3, 'All', 1, NULL, 'a:7:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";i:5;s:9:"insurance";i:6;s:4:"chat";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(75, 'MedLine Medical Center', 'مركز ميدلاين الطبي', 'medlinemedicalcenter', 5, '760b76553d703957ca662895d6873257.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'MedLine', 'info@medlinedubai.com', '99db4c706f8419c0c39c9566a49d77e2', '??123456', '46686744936c214d7d1c9837c17194f4655456f8f264417cb994311edca03b0d3088ea068b89b34ce702c8645bdb1122ebb12ce6', NULL, '00971509599324', '0097143542777', NULL, '25.23926050620411', '55.27058498353961', NULL, 1, 'www.medlinedubai.com', NULL, 4, '1', 'admin', NULL, 1, 1, '2016-07-28 15:43:01', '2016-07-28 17:46:29', NULL, NULL, 'Jumeriah Terrace Building 104 , 2nd December Road Jumeirah1', 'بناء الجميرا تيراس 104  شارع 2 ديسمبر الجميرا 1', NULL, NULL, NULL, 0, NULL, NULL, '<ul class="uiList fbSettingsList fbSettingsListBorderTop fbSettingsListBorderBottom _4kg _4ks">\n<li>\n<div class="clearfix _2pi4">\n<div class="_4bl9">\n<div class="_50f4">\n<div id="id_5799efd7544910983433124" class="text_exposed_root text_exposed"><span dir="rtl"><span class="text_exposed_show">MedLine Medical Center is known for excellence in providing healthcare. We have a long list of competent doctors and dedicated staff providing patients with compassionate medical care of the highest quality thereby making MedLine Medical Center one of the premiere medical facilities not only in Dubai but in the UAE and the GCC as well</span></span></div>\n</div>\n</div>\n</div>\n</li>\n</ul>', '<ul class="uiList fbSettingsList fbSettingsListBorderTop fbSettingsListBorderBottom _4kg _4ks">\n<li>\n<div class="clearfix _2pi4">\n<div class="_4bl9">\n<div class="_50f4">\n<div id="id_5799efd7544910983433124" class="text_exposed_root text_exposed"><span dir="rtl">مركز ميد لاين الطبي أحد أفضل المراكز الطبية المعروفة بتقديم الرعاية الصحية المتميزة، ليس على مستوى إمارة دبي فقط، وإنما على <span class="text_exposed_hide">...</span><span class="text_exposed_show">مستوى دولة الإمارات ودول الخليج العربي. يضم المركز نخبة من أكبر الأطباء المتخصصين في عدة مجالات، وفريق تمريض يتميز بالكفاءة العالية. لتحديد المواعيد، يرجى الاتصال بنا أو زيارة موقعنا الإلكتروني. تمنياتنا للجميع بدوام الصحة والعافية.</span></span></div>\n</div>\n</div>\n</div>\n</li>\n</ul>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 1, 'All', 1, NULL, 'a:6:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";i:5;s:9:"insurance";}', NULL, NULL, 0, 0, 0, NULL, NULL);
INSERT INTO `seha_subscribers` (`user_id`, `subs_title`, `subs_title_ar`, `subs_public_profile`, `profile_visits`, `subs_profile_img`, `subs_featured_image`, `show_featured_home`, `subs_gender`, `subs_cat_id`, `dept_fk`, `subs_type`, `subs_experience`, `subs_medical_center`, `subs_username`, `subs_email`, `subs_pwd_hash`, `r_password`, `subs_uniq_token`, `zipcode`, `subs_primary_contact`, `subs_secondary_contact`, `subs_timings`, `subs_lat_id`, `subs_long_id`, `subs_place`, `show_location`, `subs_url`, `city`, `subs_state`, `subs_country`, `subs_contact_name`, `email_verify`, `is_verified`, `status`, `subs_created`, `subs_update`, `subs_support_email`, `subs_secondary_email`, `subs_address_1`, `subs_address_1_ar`, `subs_address_2`, `subs_address_2_ar`, `subs_fax_no`, `is_featured`, `description`, `description_ar`, `description_en_long`, `description_en_long_ar`, `parking_en`, `bus_station_en`, `metro_en`, `parking_ar`, `bus_station_ar`, `metro_ar`, `enable_review`, `enable_comment`, `subs_review`, `is_approve`, `subs_languages`, `subs_summary`, `subs_summary_ar`, `is_visiting`, `visit_timing_from`, `visit_timing_to`, `has_emergency`, `has_insurance`, `has_home_services`, `account_type`, `link_profile_to`, `timing`, `publish_on`, `published`, `subs_home_bg`, `subs_access`, `meta_en`, `meta_ar`, `likes`, `comments`, `show_on_map`, `instagram_username`, `payments`) VALUES
(76, 'Awazen Medical Center', 'مركز أوازن الطبي', 'awazenmedicalcenter', 11, '6a92635e4106193fe75b726c682beac6.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'Awazen', 'info@awazen.com', '80176400d6bbcc311ade655c31a9fc07', '??123456', '307dfa71f495eed4808468089ace68241ab6d42640c0e04a7894333a17611803b0fb5077771a392c00521659bcecbbec5649874f', NULL, '0097124411944', '0097124411944', NULL, '24.471934615388864', '54.37427387924197', NULL, 1, 'http://www.awazen.com', NULL, 5, '1', 'Awazen', NULL, 1, 1, '2016-07-30 11:46:21', '2016-07-30 12:21:34', NULL, NULL, 'Al Wahda Commercial Tower , Hazza Bin Zayed Street\n8th Floor', 'بناء الوحدة التجاري,شارع هزاع بن زايد ,الطابق الثامن', NULL, NULL, NULL, 0, NULL, NULL, '<p>Visit the Awazen Medical Center to discover a healthier and happier you. The Awazen medical center is the perfect location for the entire family from dermatology to gynecology, family medicine, pediatrics, nutrition, dental, and surgery your whole family can get the best physical care in one location. We offer the widest range of medical procedures to help you keep living a healthy lifestyle.</p>', '<p dir="RTL">قم بزيارة مركز أوازن الطبي لاكتشاف الأفضل لصحتك ,مركز أوازن الطبي هو المكان الأمثل لك ولعائلتك حيث نوفر العديد من العلاجات المتميزة مثل طب الأسرة ,الجلدية ,النساء والولادة وطب الأسنان وطب الأطفال والتغذية والجراحة</p>\n<p dir="RTL">نحن نقدم طيف واسع من الخدمات الطبية&nbsp; لنساعدك في الحفاظ على صحتك والاستمتاع بنمط حياة صحية</p>\n<p dir="RTL">&nbsp;</p>', 'Valet Parking Available', '', '', 'خدمة صف السيارات متوفرة', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(77, 'The American Center for Psychiatry and Neurology-Sharjah', 'المركز الأمريكي النفسي والعصبي - الشارقة', 'theamericancenterforpsychiatryandneurology-sharjah', 9, 'eb3cdad9eb102605eafda4565afc33da.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'American', 'Rec.shj@americancenteruae.com', '59d97e12a35d01219c1aa78494cd1237', 'am@123456', 'b31d8e98dbbf97b7433adaf7ccc268477100a447c99eb030e42576d4c3684bf227818c69c6c6f067a3ead9ce67a1c67a790fa26b', NULL, '0097165125000', '0097165125000', NULL, '25.342034877104442', '55.42794213981631', NULL, 1, 'http://www.americancenteruae.com', NULL, 3, '1', 'American', NULL, 1, 1, '2016-07-30 14:21:57', '2016-07-30 14:52:19', NULL, NULL, 'Halwan Suburb\nSheikh Zayed St.\nVilla No. 1', 'ضاحية حلوان ,شارع الشيخ زايد ,فيلا رقم 1', NULL, NULL, NULL, 0, NULL, NULL, '<p>ACPN is a premier medical facility focusing on providing you with the highest quality primary and specialized medical care a<span class="text_exposed_show">nd health education services.<br /> <br /> Founded in Abu Dhabi in 2008, we have since expanded our facilities to Dubai and Sharjah, escalating to provide services to over 40,000 patients throughout the years &ndash; a number which we aim to keep growing.<br /> <br /> At ACPN, our line or services revolves around two major areas:<br /> <br /> &bull; Medical Services &ndash; Neurological Treatment, Psychiatric Consultation, Psychology and Counseling Services and Children&rsquo;s Neuroscience Services<br /> &bull; Training and Development &ndash; Facilitating training and professional development programs ranging from Medical Seminars and Conferences to Corporate Courses and Workshops.</span></p>', '<p><span class="text_exposed_show">يعد المركز الأمريكي النفسي والعصبي أول منشأة طبية تركزعلى توفير أعلى مستوى من الرعاية الطبية المتخصصة وخدمات التثقيف الصحية.<br /> ويقدم المركز خدمات الطب النفسي للبالغين والأطفال والمراهقين، بالإضافة إلى العيادات المتخصصة مثل عيادة الصحة النفسية للمرأة، عيادة اضطرابات الأكل، اضطرابات المزاج، عيادة تحديد العجزوقابلية العمل، عيادة الطب النفسي للإدمان، والطب النفسي للطيران.<br /> كما يشمل قسم الأعصاب الخدمات العصبية للبالغين والمراهقين، بالإضافة إلى العيادات المتخصصة مثل عيادة التصلب المتعدد، الصداع، وعيادة اضطرابات النوم.<br /> ويقدم العلاج النفسي مجموعة من الخدمات للأطفال، من اختبارات تقييم صعوبات التعلم وتأخر النمو، كما يقدم الخدمات العلاجية للأطفال. كما يقدم مجموعة واسعة من الدعم للبالغين مثل تقديم المشورة في حالات المشاكل الشخصية والعاطفية، والعمل مع الأمراض العقلية الشديدة والمعقدة.<br /> </span></p>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 3, 'All', 1, NULL, 'a:1:{i:0;s:7:"timings";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(78, 'Burjeel Hospital', 'مستشفى برجيل', 'burjeelhospital', 14, '399af22057e04f420ec046a0f1620248.jpg', NULL, 0, NULL, '38', NULL, 6, NULL, NULL, 'Burjeel', 'info@burjeel.com', 'b617fc18a30d1e6da328dec3006ddd38', 'bu@123456', '57475e80c31b36e61292d741ae1a4776a41c1228cbf1ef6438a9ccc693ce6d9e23844938304bab8ee53f6fd94d4f1967ccb36e48', NULL, '+97125085555', '+97125085555', NULL, '24.479333829296582', '54.380861384582545', NULL, 1, 'http://www.burjeel.com', NULL, 5, '1', 'info', NULL, 1, 1, '2016-07-31 12:58:35', '2016-08-01 11:37:13', NULL, NULL, 'Al Najdah Street', 'شارع النجدة', NULL, NULL, NULL, 0, NULL, NULL, '<p>burjeel hospital was established to provide world-class, specialized and superior healthcare complemented by a warm and personalized human touch to the growing population of the emirate of abu dhabi.</p>', '<div class="div_en_abou_us_content">تأسست&nbsp;مستشفى برجيل الى تحقيق مكانة مميزة من خلال التزامها بأعلى معايير الجودة لتلبية متطلبات الرعاية الصحية للأعداد المتزايدة من سكان امارة ابوظبى و هى توفر رعاية طبية متكاملة سواء فى مجال التشخيص أو العلاج أو الوقاية</div>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 1, 0, 2, 'self', 1, 'All', 1, NULL, 'a:2:{i:0;s:7:"timings";i:1;s:9:"insurance";}', NULL, NULL, 0, 0, 0, NULL, 'cash,credit_card'),
(79, 'Dr Michael''s Dental Clinic', 'د.مايكل دينتل كلينك', 'drmichael''sdentalclinic', 7, '3a04acf23d5724a5b51fb57ed2efccfd.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'Michael', 'ummsuqeim@drmichaels.com', '4fb4cad19528227511324604c265384c', 'mi123456', 'a2b02951042467c03c584fa036f609b8a255032186328d2d84335b434be1cb5b17a272293e06fa3927cbdf4e9d93ba4541acce86', NULL, '043495900', '043495900', NULL, '25.157183', '55.217356', NULL, 1, 'http://www.drmichaels.com', NULL, 4, '1', 'michael', NULL, 1, 1, '2016-08-23 13:06:29', '2016-08-24 12:16:25', NULL, NULL, 'Villa 1016, Al Wasl Road, Umm Suqeim 1', 'فيلا 1016 شارع الوصل ,أم سقيم 1', NULL, NULL, NULL, 0, NULL, NULL, '<p>Dr Michael''s Dental Clinic is a premier dental care provider in Dubai with cutting edge dental clinics in Jumeirah, Umm Suqeim and Dubai Healthcare City.</p>', '<p><span><span>عيادة</span> <span>الدكتور</span> <span>مايكل</span> لطب الأسنان <span>هي</span> <span>من أهم مقدمي خدمة علاج الأسنان&nbsp;</span> <span>في دبي</span> <span>مع</span> <span>احدث</span> <span>عيادات</span> <span>طب الأسنان</span> <span>في منطقة الجميرا</span> <span>وأم</span> <span>سقيم</span> <span>ومدينة دبي الطبية</span><span>.</span></span></p>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 1, 'All', 1, NULL, 'a:5:{i:0;s:7:"timings";i:1;s:11:"appointment";i:2;s:6:"photos";i:3;s:6:"videos";i:4;s:4:"logo";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(81, 'Almazroui Medical Center', 'مركز المزروعي الطبي', 'almazrouimedicalcenter', 17, '09e1ebeeaada0a9987c2660f8aa7eb39.jpg', NULL, 0, NULL, '37', NULL, 3, NULL, NULL, 'Almazroui', NULL, 'fbc3591506ce1848d01a4efe761c83fb', '??123456', '5c961a5f83aee4f7c5252ef3a82c2391e3529c7d3604bb65c18619e5936befa4c6af75d0c598b66b1477b605643f6072557478ac', NULL, NULL, NULL, NULL, '24.485323', '54.374815', NULL, 1, NULL, NULL, 5, '1', NULL, NULL, 1, 0, '2016-09-01 14:18:15', '2016-09-01 14:40:59', NULL, NULL, 'Al Khyeli building, Al Falah street', 'بناء الخيلي ,شارع الفلاح', NULL, NULL, NULL, 0, NULL, NULL, '<p>The ultimate goal for the existence of Al Mazroui Medical Center One Day Surgery is the provision of high standard of quality healthcare in Abu Dhabi</p>', '<p><span id="result_box" lang="ar"><span>والهدف النهائي</span> <span>لوجود</span> <span>جراحة</span> <span>المركز الطبي</span> <span>المزروعي</span> <span>يوم واحد</span> <span>هو توفير</span> <span>مستوى عال من</span> <span>الرعاية الصحية عالية الجودة</span> <span>في</span> <span>أبو</span> <span>ظبي</span></span></p>', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', 1, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(88, 'Gentle Care Medical Center', 'مركز العناية اللطيفة الطبي', 'gentlecaremedicalcenter', 30, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '065758757', NULL, NULL, '25.3393252', '55.3860346', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2016-09-04 14:29:29', '2016-09-22 10:00:44', NULL, NULL, '110 Corniche St - Sharjah - United Arab Emirates', '110 Corniche St - Sharjah - United Arab Emirates', NULL, NULL, NULL, 0, NULL, NULL, '', '', '', '', '', '', '', '', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:2:{i:0;s:6:"photos";i:1;s:4:"logo";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(106, 'Charme Polyclinic', 'مجمع شارم الطبي', 'charmepolyclinic', 6, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'info@charmemedical.com', NULL, NULL, NULL, NULL, '+97143808889', NULL, NULL, '25.1437306', '55.2097203', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-17 15:17:22', '2016-09-17 15:19:40', NULL, NULL, 'Jumierah, Al wasl Rd, Villa 1035', 'شارع الوصل ,الجميرا,فيلا 1035', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(107, 'Ibn Al Nafees Hijamah & Medical Clinic', 'مركز ابن النفيس الطبي للحجامة', 'ibnalnafeeshijamah&medicalclinic', 1, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'ibnalnafeesclinic@gmail.com', NULL, NULL, NULL, NULL, '+97142899621', NULL, NULL, '25.21377', '55.38051', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-17 15:28:38', '2016-09-17 15:30:52', NULL, NULL, 'Nad Al Hamar, Bel Remaitha Club Bldng', 'ند الحمر ,بناء نادي بالمرميثة', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(108, 'Full Care Medical Centre, LLC', 'مركز فل كير الطبي', 'fullcaremedicalcentre,llc', 9, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'info@fcmc.ae', NULL, NULL, NULL, NULL, '+971 4 288 5522', NULL, NULL, '25.189542', '55.407256', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-17 15:40:57', '2016-09-17 15:45:48', NULL, NULL, 'AI Warqa 1 Bldg. 14 Near Aswaq Center Deira', 'بناء الورقاء 1 ,قرب أسواق ديرة سنتر', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(114, 'Labcare', 'العناية الطبية', 'labcare', 9, NULL, NULL, 0, NULL, '40', NULL, 1, NULL, NULL, NULL, 'info@labcare.me', NULL, NULL, NULL, NULL, '+97165566086', NULL, NULL, '25.336338', '55.375499', NULL, 1, NULL, NULL, 3, '1', NULL, NULL, 1, 1, '2016-09-19 15:48:41', '2016-09-19 15:53:10', NULL, NULL, 'Sarh Al Emarat Tower,Corniche Street ,6 Floor, Office 605', 'برج صرح الإمارات ,كورنيش البحيرة, الطابق السادس ,مكتب 605', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:1:{i:0;s:6:"photos";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(115, 'Al Dimashqi Medical Center', 'مركز الدمشقي الطبي', 'aldimashqimedicalcenter', 26, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'info@aldimashqi-medical.com', NULL, NULL, NULL, NULL, '+97165563553', NULL, NULL, ' 25.3363997', '55.3732288', NULL, 1, NULL, NULL, 3, '1', NULL, NULL, 1, 1, '2016-09-19 16:02:28', '2016-09-19 16:05:32', NULL, NULL, 'Sarh Al Emarat Tower,121, Corniche Street,Office 205', 'برج صرح الإمارات ,كورنيش البحيرة ,مكتب 205', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 3, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(116, 'Dooa Pharmacy', 'صيدلية دعاء', 'dooapharmacy', 2, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'dooaajman@makkahgroup.org', NULL, NULL, NULL, NULL, '+971 6 7481870', NULL, NULL, '25.3959566', '55.4956834', NULL, 1, NULL, NULL, 6, '1', NULL, NULL, 1, 1, '2016-09-21 15:51:29', '2016-09-21 15:54:10', NULL, NULL, 'Sheikh makthum Bin Rashid Street,Al Zahra Area', 'الزهراء - شارع الشيخ مكتوم بن راشد', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(117, 'Real 6, pharmacy', 'صيدلية ريال 6', 'real6,pharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'info@life-me.com', NULL, NULL, NULL, NULL, '+971 4 3529988', NULL, NULL, '25.211626507946495', '55.27440784813234', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-21 16:05:52', '2016-10-10 15:14:13', NULL, NULL, 'Chelsea Tower, 90, Sheikh Zayed Road ,G Floor, Shop 1', 'برج تشيلسي ,شارع الشيخ زايد ,الطابق الأرضي ,محل 1', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, 'a:1:{i:0;s:7:"doctors";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(118, 'Makkah Pharmacy', 'صيدلية مكة', 'makkahpharmacy', 5, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'makshj@makkahgroup.org', NULL, NULL, NULL, NULL, '+971 6 5656994', NULL, NULL, '25.36835877139076', '55.40359149046026', NULL, 1, NULL, NULL, 3, '1', NULL, NULL, 1, 1, '2016-09-21 16:16:03', '2016-10-08 20:38:44', NULL, NULL, 'Al Zahra Street, Al Nasseria, opp. Al Rahman Mosque', 'شارع الزهراء - الشارقة - مقابل جامع الرحمن', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(119, 'Central Makkah Pharmacy', 'صيدلية مكة المركزية', 'centralmakkahpharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'makcentral@makkahgroup.org', NULL, NULL, NULL, NULL, '+971 6 7466009', NULL, NULL, '25.3945998', '55.4615594', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2016-09-22 16:58:33', '2016-09-22 16:58:33', NULL, NULL, 'Unnamed Road - Ajman - United Arab Emirates', NULL, NULL, NULL, NULL, 0, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(120, 'Noor Makkah Pharmacy', 'صيدلية نور مكة', 'noormakkahpharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'noormakkah@makkahgroup.org', NULL, NULL, NULL, NULL, '+971 6 7499961', NULL, NULL, '25.3986327', '55.4642786', NULL, 1, NULL, NULL, 6, '1', NULL, NULL, 1, 1, '2016-09-22 17:05:26', '2016-09-22 17:07:22', NULL, NULL, 'Al Owais Tower,\n129, Sheikh Humaid Bin Rashid Al Nuaiemi Street', 'برج الأويس ,شارع الشيخ حميد بن راشد ,شارع النعيمية', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(121, 'Thumbay Pharmacy', 'صيدلية ثومبي', 'thumbaypharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '8006555', NULL, NULL, '25.3819431', '55.4638832', NULL, 1, NULL, NULL, 6, '1', NULL, NULL, 1, 1, '2016-09-22 17:15:27', '2016-09-22 17:26:50', NULL, NULL, 'GMC Hospital, 25/1, Al Itihad Road,G Floor', 'مستشفى ال جي أم سي ,شارع الاتحاد ,الطابق الأرضي', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(122, 'Gulf Chinese Medical Centre', 'مركز الخليج للطب الصيني', 'gulfchinesemedicalcentre', 0, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 2 6343538', NULL, NULL, '24.4853117', '54.3581731', NULL, 1, NULL, NULL, 5, '1', NULL, NULL, 1, 1, '2016-09-24 14:47:34', '2016-09-24 14:52:16', NULL, NULL, 'Sheikh Mohd Bin Butti Building, Office #104, Airport Road & Hamdan Street Corner', 'بناء الشيخ محمد بن بطي ,مكتب#104 زاوية شارع المطار وشارع حمدان', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(123, 'Access Clinic', 'مركز أكسس', 'accessclinic', 0, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 552 0139', NULL, NULL, '25.159125', '55.3985237', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-24 14:59:52', '2016-09-24 15:03:31', NULL, NULL, 'G Floor ,Persia Cluster, International City, Mushraif', 'الطابق الأرضي ,الحي الفارسي ,انترناشونال سيتي ,مشرف', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(124, 'Al Salama One Day Surgery Center', 'مركز السلامة لجراحة اليوم الواحد', 'alsalamaonedaysurgerycenter', 4, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '025047900', NULL, NULL, '24.305891', '54.63696', NULL, 1, NULL, NULL, 5, '1', NULL, NULL, 1, 1, '2016-09-24 16:25:15', '2016-09-24 16:29:46', NULL, NULL, 'Banyas', 'بني ياس', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(125, 'New Medical Centre', 'المركز الطبي الجديد', 'newmedicalcentre', 2, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'info@nmc.ae', NULL, NULL, NULL, NULL, '+971 2 633 2255', NULL, NULL, '25.2766075', '55.346067', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-09-29 12:30:06', '2016-10-04 17:11:36', NULL, NULL, 'Dar Al-Safiya Building\nG Floor\nHor Al Anz, Deira', 'بناء دار الصفية ,الطابق الأرضي ,هور العنز ,ديرة', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 3, 'self', NULL, 'All', 1, NULL, 'a:2:{i:0;s:4:"news";i:1;s:6:"offers";}', NULL, NULL, 0, 0, 0, NULL, NULL),
(127, 'Al Ain Pharmacy Main Branch', 'صيدلية العين الفرع الرئيسي', 'alainpharmacymainbranch', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, 'main@alain-pharmacy.com', NULL, NULL, NULL, NULL, '03 765 5120', NULL, NULL, '24.225306', '55.7585041 ', NULL, 1, NULL, NULL, 7, '1', NULL, NULL, 1, 1, '2016-10-06 15:41:41', '2016-10-06 15:56:53', NULL, NULL, 'alain', 'العين', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 3, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(128, 'Al Ain Pharmacy', 'صيدلية العين', 'alainpharmacy', 1, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 334 2333', NULL, NULL, '25.220883209946773', '55.28046866686475', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-06 16:05:10', '2016-10-07 19:47:12', NULL, NULL, 'Blue Tower, 40, Sheikh Zayed Road\nG Floor,Trade Center 1, Jumeirah', 'البرج الأزرق ,شارع الشيخ زايد ,الطابق الأرضي ,المركز التجاري1,الجميرا', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 3, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(129, 'RASHID HOSPITAL', 'مستشفى راشد', 'rashidhospital', 0, NULL, NULL, 0, NULL, '38', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 2192000', NULL, NULL, '25.24442', '55.3184459', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-08 13:35:00', '2016-10-08 13:47:49', NULL, NULL, 'Umm Hurair 2, Bur Dubai', 'أم هرير 2 - بر دبي', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 3, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(130, 'Manchester DentalCenter', 'مركز مانشستر الطبي', 'manchesterdentalcenter', 4, NULL, NULL, 0, NULL, '37', NULL, 1, NULL, NULL, NULL, 'info@mdcsmileuae.com', NULL, NULL, NULL, NULL, '+971 6 554 7373', NULL, NULL, '25.310055386734145', '55.37269381845476', NULL, 1, NULL, NULL, 3, '1', NULL, NULL, 1, 1, '2016-10-08 15:07:18', '2016-10-08 15:10:47', NULL, NULL, 'Al Taawun St - KFC Buliding', 'شارع التعاون , بناء KFC', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(131, 'Dubai Hospital Pharmacy', 'صيدلية مستشفى دبي', 'dubaihospitalpharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 2722011', NULL, NULL, '25.2845569', '55.3215563', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 10:04:09', '2016-10-09 10:05:58', NULL, NULL, 'Dubai Hospital, 222, Al Khaleej Road\nG Floor\nAl Baraha, Deira', 'مستشفى دبي ,شارع الخليج ,البراحة ,ديرة', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(132, 'Med Life Pharmacy', 'صيدلية ميد لايف', 'medlifepharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 3539755', NULL, NULL, '25.262022545815203', '55.292456391995984', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 10:12:55', '2016-10-09 10:18:00', NULL, NULL, 'Al Fahidi Building,G Floor, \nAl Souq Al Kabeer, Bur Dubai', 'بناء الفهيدي ,الطابق الأرضي ,السويق الكبير,ير دبي', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(133, 'Makkah Pharmacy', 'صيدلية مكة', 'makkahpharmacyajman', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 6 7474616', NULL, NULL, '25.39449855119094', '55.43143887956717', NULL, 1, NULL, NULL, 6, '1', NULL, NULL, 1, 1, '2016-10-09 10:21:33', '2016-10-09 10:25:56', NULL, NULL, 'Ajman One,\nA, Sheikh Rashid Bin Humaid Street\nG Floor\nRashideya 3', 'شارع الشيخ راشد بن حميد ,الطابق الأرضي,الراشدية 3', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(134, 'O2 Al Diyafah Pharmacy', 'صيدلية أو2 الضيافة', 'o2aldiyafahpharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 3594520', NULL, NULL, '25.23664587061845', '55.277028769233766', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 10:29:25', '2016-10-09 10:41:34', NULL, NULL, 'Hilal Bintres Building, 35, 6b Street\nG Floor\nAl Hudaiba, Bur Dubai', 'مبني الهلال,الطابق الأرضي ,الحديبة,بر دبي', NULL, NULL, NULL, 0, NULL, NULL, '', '', '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(135, 'Thumbay Pharmacy', 'صيدلية ثومبي', 'thumbaypharmacydubai', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 6030517', NULL, NULL, '25.281504182813062', '55.36516385186769', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 10:44:39', '2016-10-09 10:48:21', NULL, NULL, '5/1, 13 Street\nG Floor\nAl Qusais 1, Deira', 'الشارع 13,القصيص ,الطابق الأرضي ,ديرة', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(136, 'New Dooa, pharmacy', 'صيدلية دعاء الجديدة', 'newdooapharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 6 7481800', NULL, NULL, '25.39955', '55.503488', NULL, 1, NULL, NULL, 6, '1', NULL, NULL, 1, 1, '2016-10-09 10:52:39', '2016-10-09 11:03:47', NULL, NULL, '268/14, Sheikh Ammar Bin Humaid Street\nG Floor\nJurf 2', 'الشيخ عمار بن حميد ,الطابق الأرضي,الجرف2', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(137, 'Al Neem, pharmacy', 'صيدلية النعيم', 'alneempharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 3697130', NULL, NULL, '25.168019', '55.404196', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 11:05:37', '2016-10-09 11:10:36', NULL, NULL, 'Riviera Dreams,\n20, Central Business District-C Street\nG Floor', 'ريفيرا دريم ,شارع المنطقة التجارية المركزية ,الطابق الأرضي,انترناشونال سيتي', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 2, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL),
(138, 'Boots Pharmacy', 'صيدلية بوتس', 'bootspharmacy', 0, NULL, NULL, 0, NULL, '39', NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '+971 4 4190801', NULL, NULL, '25.249345739247406', '55.35175151324461', NULL, 1, NULL, NULL, 4, '1', NULL, NULL, 1, 1, '2016-10-09 11:12:31', '2016-10-09 11:19:18', NULL, NULL, 'Dubai International Airport Terminal 1,\n1a, Airport Road\nG Floor', 'مطار دبي الدولي البناء 1,شارع المطار الطابق الأرضي', NULL, NULL, NULL, 0, NULL, NULL, '', NULL, '0', '0', '0', '0', '0', '0', 0, 0, '0', 1, NULL, NULL, NULL, 0, NULL, NULL, 1, 0, 0, 3, 'self', NULL, 'All', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_articles`
--

CREATE TABLE `seha_subscribers_articles` (
  `articles_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscribers_articles`
--

INSERT INTO `seha_subscribers_articles` (`articles_id`, `title`, `title_ar`, `image_url`, `description`, `description_ar`, `show_status`, `created_on`, `updated_on`) VALUES
(5, '5 tips for eating healthy during Ramadan', '5 نصائح للغذاء الصحي في رمضان', '7f9dcbfcd04bbc59b5e601bd750c3428.jpg', '<p>Tips for Ramadan<br />Here are 5 tips for eating healthy during Ramadan.<br /><br />Eat slow digesting foods especially at the Suhur, the breakfast before dawn. Examples of slow-digesting food are grains and seeds like barley, wheat, oats, millet, semolina, beans, lentils and unpolished rice.&nbsp;<br /><br />Eat foods with lots of fiber. Examples of foods that contain fiber are bran, whole wheat, grains and seeds. Most vegetables are a good source of fiber, such as green beans, peas, cabbage, zucchini and spinach. Most fruits are excellent sources of fiber including dried unsweetened fruits.&nbsp;<br /><br />Avoid fried and fatty foods, they contain a lot of fat and can cause indigestion and heartburn. They are also high in calories and can cause weight gain.&nbsp;<br /><br />Drink a lot of water at Suhur, the breakfast before dawn, as well as between the Iftar dinner and bedtime so that your body can adjust fluid levels over time.&nbsp;<br /><br />Avoid caffeine at Suhur, the breakfast before dawn. Coffee is a diuretic and makes you pass urine. This will make you lose water from your body as well as mineral salts that are needed as you fast during the day.&nbsp;</p>', '<p><span title="Here are 5 tips for eating healthy during Ramadan.\n\n">هنا 5 نصائح لتناول الطعام الصحي خلال شهر رمضان.<br /><br /></span><span title="Eat slow digesting foods especially at the Suhur, the breakfast before dawn.">تناول الأطعمة بطيئة الهضم وخصوصا في السحور والإفطار قبل الفجر.&nbsp;</span><span title="Examples of slow-digesting food are grains and seeds like barley, wheat, oats, millet, semolina, beans, lentils and unpolished rice.\n\n">أمثلة من بطء هضم الطعام والحبوب والبذور مثل الشعير والقمح والشوفان والدخن ودقيق السميد والفول والعدس والأرز غير المصقول.<br /><br /></span><span title="Eat foods with lots of fiber.">تناول الأطعمة التي تحتوي على الكثير من الألياف.&nbsp;</span><span title="Examples of foods that contain fiber are bran, whole wheat, grains and seeds.">ومن الأغذية التي تحتوي على الألياف النخالة والقمح الكامل والحبوب والبذور.&nbsp;</span><span title="Most vegetables are a good source of fiber, such as green beans, peas, cabbage, zucchini and spinach.">معظم الخضروات هي مصدر جيد للألياف، مثل الفاصوليا الخضراء والبازلاء والملفوف والكوسا والسبانخ.&nbsp;</span><span title="Most fruits are excellent sources of fiber including dried unsweetened fruits.\n\n">معظم الفواكه مصادر ممتازة من الألياف بما في ذلك الفواكه غير المحلاة المجففة.<br /><br /></span><span title="Avoid fried and fatty foods, they contain a lot of fat and can cause indigestion and heartburn.">تجنب الأطعمة المقلية والدهنية، كما أنها تحتوي على الكثير من الدهون ويمكن أن يسبب عسر الهضم وحرقة.&nbsp;</span><span title="They are also high in calories and can cause weight gain.\n\n">وهي أيضا نسبة عالية من السعرات الحرارية ويمكن أن تسبب زيادة الوزن.<br /><br /></span><span title="Drink a lot of water at Suhur, the breakfast before dawn, as well as between the Iftar dinner and bedtime so that your body can adjust fluid levels over time.\n\n">شرب الكثير من الماء عند السحور والافطار قبل الفجر، وكذلك بين عشاء الإفطار ووقت النوم حتى أن جسمك يمكن ضبط مستوى السوائل مع مرور الوقت.<br /><br /></span><span title="Avoid caffeine at Suhur, the breakfast before dawn.">تجنب الكافيين في السحور والافطار قبل الفجر.&nbsp;</span><span title="Coffee is a diuretic and makes you pass urine.">القهوة هو مدر للبول ويجعلك تمرير البول.&nbsp;</span><span title="This will make you lose water from your body as well as mineral salts that are needed as you fast during the day.">هذا وسوف تجعلك تفقد الماء من الجسم وكذلك الأملاح المعدنية التي يحتاجها كما كنت صيام نهار.</span></p>', 1, '2016-06-17 17:50:56', '2016-06-17 17:50:56'),
(6, 'Panic Attacks', 'اضطرابُ الهَلَع', '1c181e744f2a78c95ff1e1d862027d4f.jpg', '<p>Panic disorder is a type of anxiety disorder. It causes panic attacks, which is a sudden feeling of dread without clear reason. It also causes the fear of panic attacks ,. The patient may also suffer from physical symptoms such as: &bull; speed up the heartbeat. &bull; pain in chest. &bull; breathing difficulties. &bull; Dizziness. Panic attacks can occur at any time, anywhere, without warning. The patient may live in fear of another bout, and perhaps avoid the places where the seizure occurred. For some people, they fear for their lives controlled so that they become unable to leave their homes sometimes. Panic attacks occur when women talk more than men. It usually starts when a person is young. Sometimes panic attacks occur when a person is under the influence of a great psychological pressure. And treatment, most people get better condition. It can be psychological treatment for the patient describes how to distinguish thinking patterns that cause the heart, and allow him to change it before it led to panic. It can also be useful drugs as well.</p>', '<p>اضطرابُ الهَلَع هو أحدُ أنواع اضطرابات القلق. وهو يُسبِّب نوبات الهَلَع التي هي شعورٌ مفاجئ بالرُّعب من غير سببٍ واضح. كما أنَّه يسبِّب أيضاً الخوفَ من حدوث نوبات الهَلَع،. وقد يعاني المريضُ أيضاً من أعراضا جسدية مثل: &bull; تسرُّع ضربات القلب. &bull; ألم في الصدر. &bull; صعوبة في التنفُّس. &bull; دوخة. يُمكن أن تحدثَ نوباتُ الهَلَع في أيِّ وقت، وفي أيِّ مكان، دون سابق إنذار. وقد يعيش المريضُ في خوف من حُدوث نوبة أُخرى، ورُبَّما يتجنَّب الأماكنَ التي حدثت فيها النوبة. وبالنسبة لبعض الناس، يُسيطر الخوفُ على حياتهم بحيث يصبحون عاجزين عن مُغادرة منازلهم أحياناً. تحدث نوباتُ الهَلَع عندَ النساء أكثر ممَّا تحدث عندَ الرجال. وهي تبدأ عادةً عندما يكون الشخص في سنِّ الشباب. تحدث نوباتُ الهَلَع أحياناً عندما يكون الشخصُ تحت تأثير ضُغوط نفسيَّة كبيرة. وبالمُعالجةُ، تتحسُّن حالة مُعظم الناس. ويُمكن أن تُوضح المُعالجةُ النفسيَّة للمريض كيفية تمييز أنماطَ التفكير التي تسبِّب النوبةَ، وتسمح له بتغييرها قبلَ أن تقودَه إلى الهَلَع. كما يُمكن أن تكونَ الأدويةُ مُفيدة أيضاً.</p>', 1, '2016-06-17 17:51:43', '2016-06-17 17:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_departments`
--

CREATE TABLE `seha_subscribers_departments` (
  `dept_id` int(11) NOT NULL,
  `dept_title` varchar(255) NOT NULL,
  `dept_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `orderby` int(11) NOT NULL DEFAULT '1',
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscribers_departments`
--

INSERT INTO `seha_subscribers_departments` (`dept_id`, `dept_title`, `dept_title_ar`, `orderby`, `show_status`, `created_on`, `updated_on`) VALUES
(1, 'Orthopaedic', 'علاج العظام', 1, 1, '2015-08-02 13:34:26', '2016-10-10 12:49:16'),
(2, 'Dentistry', 'طب الأسنان', 2, 1, '2015-09-01 17:59:51', '2016-09-29 12:50:22'),
(5, 'Neurologys', 'الأمراض العصبية', 4, 1, '2016-05-04 22:57:05', '2016-07-19 14:22:35'),
(6, 'Plastic Surgery', 'جراحة تجميلية', 5, 1, '2016-06-23 15:53:04', '2016-07-19 14:33:40'),
(7, 'Pediatrics', 'طب الأطفال', 6, 1, '2016-06-25 14:06:41', '2016-08-23 12:48:24'),
(8, 'Urology & Andrology', 'جراحة المسالك البولية وامراض الذكورة', 7, 1, '2016-06-25 14:14:16', '2016-09-29 12:52:35'),
(9, 'Gynaecology & Obstetrics', 'أمراض النساء والتوليد', 8, 1, '2016-06-25 14:23:17', '2016-09-29 12:48:35'),
(10, 'Internal Medicine', 'الامراض الباطنية', 9, 1, '2016-06-25 14:47:59', '2016-06-25 14:47:59'),
(11, 'Ear Nose & Throat (ENT)', 'الأنف والأذن والحنجرة', 10, 1, '2016-06-25 15:01:10', '2016-10-08 16:38:35'),
(12, 'Pharmacy', 'صيدلية', 11, 1, '2016-06-29 15:01:52', '2016-07-19 14:36:36'),
(13, 'Alternative medicine', 'الطب التكميلي', 12, 1, '2016-07-17 16:25:41', '2016-07-17 16:25:41'),
(14, 'Ophthalmology', 'طب العيون', 13, 1, '2016-07-19 14:24:05', '2016-07-19 14:24:05'),
(15, 'General Surgery', 'الجراحة العامة', 14, 1, '2016-07-19 14:26:04', '2016-07-19 14:26:04'),
(17, 'Dermatology', 'طب الأمراض الجلدية', 15, 1, '2016-07-19 14:28:29', '2016-07-27 13:04:35'),
(19, 'General Practice', 'طب عام', 16, 1, '2016-07-19 14:31:29', '2016-07-19 14:31:29'),
(20, 'Neurosurgery', 'جراحة الاعصاب', 17, 1, '2016-07-19 14:32:01', '2016-07-19 14:32:01'),
(21, 'Podiatry', 'علاج الأرجل', 18, 1, '2016-07-19 14:34:29', '2016-07-19 14:34:29'),
(22, 'Colorectal', 'القولون والمستقيم', 19, 1, '2016-07-19 14:35:12', '2016-07-19 14:35:12'),
(24, 'Dental Lab', 'مختبر اسنان', 20, 1, '2016-07-19 14:38:03', '2016-07-19 14:38:03'),
(25, 'Medical lab', 'مختبر تحليل طبي', 21, 1, '2016-07-19 14:39:48', '2016-07-19 14:39:48'),
(26, 'Maternity', 'الأمومة', 22, 1, '2016-07-20 13:54:48', '2016-07-20 13:54:48'),
(27, 'Cardiology', 'القلبية', 23, 1, '2016-07-20 13:56:57', '2016-07-20 13:56:57'),
(28, 'Spinal Surgery Clinic', 'جراحة العمود الفقري', 24, 1, '2016-07-26 14:56:56', '2016-07-26 14:56:56'),
(29, 'Speech Therapy', 'علاج صعوبات النطق', 25, 1, '2016-07-26 14:59:24', '2016-07-26 14:59:24'),
(30, 'Tissue Laboratory', 'مختبر الأنسجة', 26, 1, '2016-07-26 15:00:15', '2016-07-26 15:00:15'),
(31, 'Vascular Surgery', 'جراحة الأوعية الدموية', 27, 1, '2016-07-26 15:02:11', '2016-07-26 15:02:11'),
(33, 'Diabetes and Endocrine', 'أمراض السكري والغدد الصماء', 28, 1, '2016-07-26 15:07:29', '2016-07-26 15:07:29'),
(34, 'ER', 'الإسعاف والطوارئ', 29, 1, '2016-07-26 15:08:34', '2016-08-23 12:48:43'),
(35, 'Endoscopy', 'مناظير الجهاز الهضمي', 30, 1, '2016-07-26 15:09:26', '2016-07-26 15:09:26'),
(36, 'Family Medicine', 'طب الأسرة', 31, 1, '2016-07-26 15:10:26', '2016-07-26 15:10:26'),
(37, 'Intensive Care', 'العناية المركزة', 32, 1, '2016-07-26 15:12:19', '2016-07-26 15:12:19'),
(38, 'IFV', 'علاج العقم والمساعدة على الإنجاب', 33, 1, '2016-07-26 15:14:37', '2016-08-23 12:48:56'),
(39, 'Kidney Dialysis', 'الغسيل الكلوي', 34, 1, '2016-07-26 15:15:21', '2016-07-26 15:15:21'),
(40, 'Nuclear Medicine', 'الطب النووي', 35, 1, '2016-07-26 15:16:22', '2016-07-26 15:16:22'),
(41, 'Nutrition', 'التغذية العلاجية', 36, 1, '2016-07-26 15:17:11', '2016-07-26 15:17:11'),
(42, 'Nephrology', 'علاج أمراض الكلى', 37, 1, '2016-07-26 15:18:41', '2016-07-26 15:18:41'),
(43, 'Neurosurgery', 'جراحة المخ والأعصاب', 38, 1, '2016-07-26 15:20:00', '2016-07-26 15:20:00'),
(44, 'Hematology', 'علاج أمراض الدم والأورام', 39, 1, '2016-07-26 15:21:31', '2016-07-26 15:21:31'),
(45, 'Obesity Treatment', 'علاج السمنة', 40, 1, '2016-07-26 15:22:56', '2016-07-26 15:22:56'),
(46, 'Pulmonary', 'علاج الأمراض الصدرية', 41, 1, '2016-07-26 15:24:17', '2016-07-26 15:24:17'),
(47, 'Physiotherapy', 'العلاج الطبيعي والتأهيل', 42, 1, '2016-07-26 15:25:06', '2016-07-26 15:25:06'),
(48, 'Psychiatry', 'الطب النفسي', 43, 1, '2016-07-26 15:25:58', '2016-07-26 15:25:58'),
(49, 'Plastic Surgery', 'الجراحة التجميلية', 44, 1, '2016-07-26 15:27:11', '2016-07-26 15:27:11'),
(50, 'Pain Treatment', 'علاج الألم', 45, 1, '2016-07-26 15:27:59', '2016-07-26 15:27:59'),
(51, 'Radiology', 'الأشعة', 46, 1, '2016-07-26 15:29:16', '2016-07-26 15:29:16'),
(52, 'Rheumatology', 'علاج الروماتيزم', 47, 1, '2016-07-26 15:30:01', '2016-07-26 15:30:01'),
(53, 'Sleep Disorder', 'علاج اضطرابات النوم', 48, 1, '2016-07-26 15:30:42', '2016-07-26 15:30:42'),
(54, 'Sports Medicine', 'الطب الرياضي', 49, 1, '2016-07-26 15:31:34', '2016-07-26 15:31:34'),
(55, 'Laser Hair Removal', 'مركز إزالة الشعر بالليزر', 50, 1, '2016-07-26 15:32:22', '2016-07-26 15:32:22'),
(56, 'Low Vision', 'المساعدة على الإبصار', 51, 1, '2016-07-26 15:34:26', '2016-07-26 15:34:26'),
(57, 'Cupping', 'الحجامة', 52, 1, '2016-07-27 13:13:52', '2016-07-27 13:13:52'),
(58, 'Psychology', 'علم النفس', 53, 1, '2016-07-30 14:37:45', '2016-07-30 14:37:45'),
(59, 'Neurology', 'طب الأمراض العصبية', 54, 1, '2016-07-30 14:40:43', '2016-07-30 14:40:43'),
(60, 'Cosmatic', 'الطب التجميلي', 1, 1, '2016-09-19 16:14:21', '2016-09-29 12:49:47'),
(61, 'Chinese Medical', 'الطب الصيني', 1, 1, '2016-09-24 14:41:52', '2016-09-24 14:41:52'),
(62, 'Anesthesia', 'تخدير', 1, 1, '2016-09-24 16:44:48', '2016-09-24 16:44:48'),
(63, 'ICU (Insensitive Care Unit)', 'وحدة العناية المركزة', 1, 1, '2016-09-24 16:45:32', '2016-09-24 16:45:32'),
(64, 'Ozone Therapy', 'العلاج بالأوزون', 1, 1, '2016-09-24 16:46:13', '2016-09-24 16:46:13'),
(65, 'Cardiothoracic Sciences', 'علوم القلب', 1, 1, '2016-09-29 12:46:21', '2016-09-29 12:46:21'),
(66, 'Gastroenterology', 'أمراض الجهاز الهضمي', 1, 1, '2016-09-29 12:47:18', '2016-09-29 12:47:18'),
(67, 'Oral and Maxillofacial Surgery', 'جراحة الوجه و الفكين', 1, 1, '2016-09-29 12:54:14', '2016-09-29 12:54:14'),
(68, 'Occupational Health', 'صحة مهنية', 1, 1, '2016-10-08 16:34:41', '2016-10-08 16:34:41'),
(69, 'Homeopathy', 'معالجة مثلية', 1, 1, '2016-10-08 16:35:44', '2016-10-08 16:36:05'),
(70, 'Dietetics & Nutrition', 'علم التغذية والتغذية', 1, 1, '2016-10-08 16:36:49', '2016-10-08 16:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_depts`
--

CREATE TABLE `seha_subscribers_depts` (
  `user_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_subscribers_depts`
--

INSERT INTO `seha_subscribers_depts` (`user_id`, `dept_id`) VALUES
(69, 5),
(69, 3),
(69, 1),
(34, 5),
(34, 2),
(52, 2),
(60, 12),
(70, 25),
(70, 22),
(70, 21),
(70, 20),
(70, 19),
(70, 17),
(70, 14),
(70, 12),
(70, 11),
(70, 10),
(70, 9),
(70, 8),
(70, 7),
(70, 6),
(70, 5),
(70, 2),
(70, 1),
(47, 25),
(47, 22),
(47, 15),
(47, 12),
(47, 10),
(47, 9),
(47, 7),
(29, 2),
(51, 2),
(40, 12),
(50, 2),
(71, 2),
(72, 8),
(73, 52),
(73, 51),
(73, 48),
(73, 47),
(73, 46),
(73, 43),
(73, 42),
(73, 41),
(73, 34),
(73, 33),
(73, 32),
(73, 31),
(73, 27),
(73, 15),
(73, 14),
(73, 11),
(73, 10),
(73, 9),
(73, 8),
(73, 7),
(73, 2),
(73, 1),
(74, 55),
(74, 54),
(74, 52),
(74, 47),
(74, 15),
(74, 10),
(74, 6),
(74, 2),
(74, 1),
(75, 51),
(75, 47),
(75, 25),
(75, 24),
(75, 19),
(75, 17),
(75, 15),
(75, 10),
(75, 2),
(76, 41),
(76, 36),
(76, 17),
(76, 15),
(76, 9),
(76, 7),
(76, 2),
(77, 59),
(77, 48),
(78, 52),
(78, 47),
(78, 27),
(78, 22),
(78, 14),
(78, 8),
(78, 1),
(79, 2),
(81, 27),
(81, 19),
(81, 15),
(81, 14),
(81, 11),
(81, 10),
(81, 9),
(81, 2),
(81, 1),
(82, 58),
(82, 2),
(88, 2),
(97, 59),
(97, 58),
(97, 57),
(97, 56),
(98, 1),
(98, 2),
(98, 3),
(99, 1),
(99, 3),
(100, 1),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 1),
(104, 2),
(104, 3),
(105, 6),
(106, 49),
(106, 17),
(106, 2),
(107, 57),
(107, 19),
(107, 9),
(107, 3),
(108, 25),
(108, 17),
(108, 10),
(108, 9),
(108, 7),
(108, 2),
(109, 2),
(110, 1),
(110, 2),
(111, 1),
(111, 2),
(111, 3),
(112, 2),
(113, 2),
(114, 25),
(115, 60),
(115, 27),
(115, 17),
(115, 9),
(115, 2),
(26, 13),
(26, 10),
(26, 9),
(26, 8),
(26, 6),
(26, 2),
(35, 55),
(35, 17),
(35, 2),
(116, 12),
(117, 12),
(118, 12),
(119, 12),
(120, 12),
(121, 12),
(122, 61),
(123, 19),
(123, 2),
(33, 60),
(33, 49),
(33, 2),
(124, 52),
(124, 51),
(124, 47),
(124, 37),
(124, 34),
(124, 27),
(124, 25),
(124, 19),
(124, 17),
(124, 15),
(124, 14),
(124, 12),
(124, 11),
(124, 10),
(124, 9),
(124, 8),
(124, 7),
(124, 2),
(124, 1),
(125, 67),
(125, 66),
(125, 51),
(125, 48),
(125, 47),
(125, 19),
(125, 17),
(125, 15),
(125, 14),
(125, 11),
(125, 10),
(125, 9),
(125, 8),
(125, 7),
(125, 5),
(125, 2),
(125, 1),
(126, 12),
(127, 12),
(128, 12),
(46, 66),
(46, 55),
(46, 52),
(46, 49),
(46, 46),
(46, 43),
(46, 42),
(46, 34),
(46, 27),
(46, 19),
(46, 17),
(46, 15),
(46, 14),
(46, 11),
(46, 10),
(46, 9),
(46, 8),
(46, 7),
(46, 6),
(46, 5),
(46, 2),
(27, 2),
(129, 34),
(129, 27),
(129, 10),
(31, 55),
(31, 17),
(31, 2),
(30, 2),
(130, 2),
(32, 57),
(32, 17),
(32, 2),
(58, 9),
(44, 70),
(44, 69),
(44, 68),
(44, 51),
(44, 47),
(44, 27),
(44, 19),
(44, 17),
(44, 15),
(44, 14),
(44, 11),
(44, 10),
(44, 9),
(44, 7),
(44, 6),
(44, 2),
(44, 1),
(131, 12),
(132, 12),
(133, 12),
(134, 12),
(135, 12),
(136, 12),
(137, 12),
(138, 12);

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_menu_access`
--

CREATE TABLE `seha_subscribers_menu_access` (
  `subs_id` int(11) DEFAULT NULL,
  `access` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscribers_menu_access`
--

INSERT INTO `seha_subscribers_menu_access` (`subs_id`, `access`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(5, 2),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(6, 2),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 10),
(8, 2),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_slides`
--

CREATE TABLE `seha_subscribers_slides` (
  `id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_thumb` varchar(255) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscribers_slides`
--

INSERT INTO `seha_subscribers_slides` (`id`, `img_url`, `img_thumb`, `subscriber`, `status`, `created_on`, `updated_on`) VALUES
(6, '4cefb42fc88f4663971853bada2dc1f6.jpg', '4cefb42fc88f4663971853bada2dc1f6.jpg', 5, 1, '2015-05-29 18:50:28', '2015-05-29 18:50:28'),
(7, '0afebadfc51fc3044147c3b7709d4b0b.jpg', '0afebadfc51fc3044147c3b7709d4b0b.jpg', 5, 1, '2015-05-30 09:12:10', '2015-05-30 09:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_smedia_settings`
--

CREATE TABLE `seha_subscribers_smedia_settings` (
  `id` int(11) NOT NULL,
  `instagram_client_id` varchar(255) NOT NULL,
  `instagram_userid` varchar(255) NOT NULL,
  `fb_pge_url` varchar(300) DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL,
  `tweet_url` varchar(600) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_subscribers_smedia_settings`
--

INSERT INTO `seha_subscribers_smedia_settings` (`id`, `instagram_client_id`, `instagram_userid`, `fb_pge_url`, `subscriber`, `tweet_url`, `created_on`, `updated_on`) VALUES
(1, 'fea7ebd96b314f8f89c3a61a14d971f2', '1816373277', 'https://www.facebook.com/CreativeVisualMedia', 6, '<a class="twitter-timeline" href="https://twitter.com/anniyananeesh" data-widget-id="592959580084121601">Tweets by @anniyananeesh</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?''http'':''https'';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>', '2015-04-08 13:41:07', '2015-05-03 10:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_spl`
--

CREATE TABLE `seha_subscribers_spl` (
  `subs_id` int(11) DEFAULT NULL,
  `spl_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_subscribers_spl`
--

INSERT INTO `seha_subscribers_spl` (`subs_id`, `spl_id`, `dept_id`, `id`) VALUES
(34, 1, NULL, 3),
(34, 2, NULL, 4),
(52, 1, NULL, 5),
(26, 1, NULL, 32),
(26, 2, NULL, 33),
(26, 4, NULL, 34),
(26, 5, NULL, 35),
(26, 6, NULL, 36),
(26, 7, NULL, 37),
(26, 8, NULL, 38),
(26, 40, NULL, 39),
(26, 50, 9, 42),
(60, 78, 12, 43),
(26, 1, 2, 44),
(26, 2, 2, 45),
(26, 4, 2, 46),
(26, 5, 2, 47),
(26, 6, 2, 48),
(26, 7, 2, 49),
(26, 8, 2, 50),
(26, 40, 2, 51),
(51, 1, 2, 67),
(51, 2, 2, 68),
(51, 4, 2, 69),
(51, 5, 2, 70),
(51, 6, 2, 71),
(51, 7, 2, 72),
(51, 8, 2, 73),
(26, 79, 13, 74),
(26, 80, 13, 75),
(26, 82, 13, 76),
(70, 37, NULL, 77),
(71, 37, NULL, 78),
(72, 37, NULL, 79),
(73, 38, NULL, 80),
(74, 38, NULL, 81),
(75, 37, NULL, 82),
(76, 37, NULL, 83),
(77, 37, NULL, 84),
(78, 38, NULL, 85),
(79, 37, NULL, 86),
(81, 37, NULL, 87),
(82, 37, NULL, 88);

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscribers_wall`
--

CREATE TABLE `seha_subscribers_wall` (
  `wall_id` int(11) NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `description_ar` text COLLATE utf8_unicode_ci,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscriber` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `spl_id` int(11) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `voucher_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `has_points` tinyint(1) NOT NULL DEFAULT '0',
  `points` int(4) DEFAULT NULL,
  `expiry` date DEFAULT NULL,
  `offer_starts` date DEFAULT NULL,
  `offer_ends` date DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_subscribers_wall`
--

INSERT INTO `seha_subscribers_wall` (`wall_id`, `title_en`, `title_ar`, `description_en`, `description_ar`, `image_url`, `thumb_url`, `subscriber`, `dept_id`, `spl_id`, `type`, `status`, `voucher_code`, `likes`, `has_points`, `points`, `expiry`, `offer_starts`, `offer_ends`, `created_on`, `updated_on`) VALUES
(11, 'teeth wahitining', 'تبييض الأسنان', 'Teeth Whitining Offer', 'عروض تبييض الأسنان', 'eede3001f02b564c58f2c2f5b5ea28ca.jpg', 'eede3001f02b564c58f2c2f5b5ea28ca_thumb.jpg', 29, 2, NULL, 3, 1, 'AJ2409', 0, 0, NULL, NULL, '2016-09-24', '2016-10-24', '2016-09-24 04:57:05', '2016-09-24 04:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_followers`
--

CREATE TABLE `seha_subscriber_followers` (
  `subs_id` int(11) NOT NULL,
  `follower_email` varchar(255) NOT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscriber_followers`
--

INSERT INTO `seha_subscriber_followers` (`subs_id`, `follower_email`, `created_on`) VALUES
(6, 'aneesh.dgweb@gmail.com', '2015-06-04 11:26:01'),
(6, 'aneesh.anniyan@gmail.com', '2015-06-05 00:00:00'),
(26, 'aneesh.anniyan@gmail.com', '2015-06-04 01:37:54'),
(26, 'aneesh.dgweb@gmail.com', '2015-06-04 01:38:46'),
(26, 'omarskaf@gmail.com', '2015-06-08 08:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_insurance`
--

CREATE TABLE `seha_subscriber_insurance` (
  `ins_id` int(11) DEFAULT NULL,
  `subs_id` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seha_subscriber_insurance`
--

INSERT INTO `seha_subscriber_insurance` (`ins_id`, `subs_id`, `created_on`) VALUES
(NULL, 55, '2015-11-16 16:09:10'),
(25, 26, '2016-07-17 04:58:06'),
(24, 26, '2016-07-17 04:58:06'),
(23, 26, '2016-07-17 04:58:06'),
(22, 26, '2016-07-17 04:58:06'),
(21, 26, '2016-07-17 04:58:06'),
(19, 26, '2016-07-17 04:58:06'),
(18, 26, '2016-07-17 04:58:06'),
(17, 26, '2016-07-17 04:58:06'),
(16, 26, '2016-07-17 04:58:06'),
(15, 26, '2016-07-17 04:58:06'),
(14, 26, '2016-07-17 04:58:06'),
(13, 26, '2016-07-17 04:58:06'),
(12, 26, '2016-07-17 04:58:06'),
(11, 26, '2016-07-17 04:58:06'),
(10, 26, '2016-07-17 04:58:06'),
(9, 26, '2016-07-17 04:58:06'),
(8, 26, '2016-07-17 04:58:06'),
(7, 26, '2016-07-17 04:58:06'),
(6, 26, '2016-07-17 04:58:06'),
(5, 26, '2016-07-17 04:58:06'),
(46, 75, '2016-07-28 04:23:35'),
(27, 75, '2016-07-28 04:23:35'),
(25, 75, '2016-07-28 04:23:35'),
(16, 75, '2016-07-28 04:23:35'),
(106, 78, '2016-08-01 11:36:44'),
(100, 78, '2016-08-01 11:36:44'),
(90, 78, '2016-08-01 11:36:44'),
(88, 78, '2016-08-01 11:36:44'),
(70, 78, '2016-08-01 11:36:44'),
(54, 78, '2016-08-01 11:36:44'),
(45, 78, '2016-08-01 11:36:44'),
(40, 78, '2016-08-01 11:36:44'),
(32, 78, '2016-08-01 11:36:44'),
(25, 78, '2016-08-01 11:36:44'),
(24, 78, '2016-08-01 11:36:44'),
(23, 78, '2016-08-01 11:36:44'),
(22, 78, '2016-08-01 11:36:44'),
(17, 78, '2016-08-01 11:36:44'),
(12, 78, '2016-08-01 11:36:44'),
(10, 78, '2016-08-01 11:36:44'),
(8, 78, '2016-08-01 11:36:44'),
(5, 78, '2016-08-01 11:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_insurance_clients`
--

CREATE TABLE `seha_subscriber_insurance_clients` (
  `ins_id` int(11) NOT NULL,
  `ins_title` varchar(255) NOT NULL,
  `ins_title_ar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ins_logo` varchar(255) NOT NULL,
  `ins_company_url` varchar(255) DEFAULT NULL,
  `make_link` tinyint(1) NOT NULL DEFAULT '0',
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscriber_insurance_clients`
--

INSERT INTO `seha_subscriber_insurance_clients` (`ins_id`, `ins_title`, `ins_title_ar`, `ins_logo`, `ins_company_url`, `make_link`, `show_status`, `subscriber`, `created_on`, `updated_on`) VALUES
(2, 'Star helath Insurance', 'Star helath Insurance', '76f0d5ded799fc97ecc764152c6807e0.png', 'http://www.example.com', 1, 1, 6, '2014-11-25 17:58:43', '2015-05-17 13:39:13'),
(3, 'Star helath Insurance', NULL, '', 'http://www.example.com', 1, 1, 4, '2015-03-18 10:07:50', '2015-03-18 10:07:50'),
(4, 'Deira Heallth insurance', 'Deira Heallth insurance _ar', '14e36a37b2ee0c66eb34cd0802308baf.png', 'http://www.example.com', 1, 1, 18, '2015-04-13 17:22:34', '2015-04-13 17:22:34'),
(5, 'ss', 'S', '7bef1d6da49151daa455313286e74c42.png', NULL, 0, 1, 9, '2015-05-26 18:21:57', '2015-05-26 18:24:15'),
(6, 'Star health insurance', 'نجمة التأمين الصحي', '6ef76324d2e8885385ccfd76fb4e3b99.jpg', NULL, 0, 1, 5, '2015-05-31 10:44:14', '2015-05-31 10:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_news`
--

CREATE TABLE `seha_subscriber_news` (
  `notes_id` int(11) NOT NULL,
  `notes_title` varchar(255) NOT NULL,
  `notes_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes_description` text NOT NULL,
  `notes_description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) DEFAULT NULL,
  `subscriber_type` tinyint(1) NOT NULL COMMENT '1 => Doctor, 2 => Medical Center, 3 => Company',
  `image_url` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscriber_news`
--

INSERT INTO `seha_subscriber_news` (`notes_id`, `notes_title`, `notes_title_ar`, `notes_description`, `notes_description_ar`, `show_status`, `subscriber`, `subscriber_type`, `image_url`, `thumb_url`, `send`, `created_on`, `updated_on`) VALUES
(1, 'Nour al huda pharmacy', 'Nour al huda pharmacy', '<p>Nour al huda pharmacy</p>', '<p>Nour al huda pharmacy</p>', 1, 60, 0, '2769f4be0d80d93a90751726e77a5fdc.png', '2769f4be0d80d93a90751726e77a5fdc_thumb.png', 0, '2015-11-14 16:21:39', '2015-11-14 16:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_products`
--

CREATE TABLE `seha_subscriber_products` (
  `prdt_id` int(11) NOT NULL,
  `prdt_title` varchar(255) NOT NULL,
  `prdt_img` varchar(255) DEFAULT NULL,
  `prdt_description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `subscriber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_testimonials`
--

CREATE TABLE `seha_subscriber_testimonials` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `subscriber` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_subscriber_testimonials`
--

INSERT INTO `seha_subscriber_testimonials` (`id`, `content`, `author`, `location`, `show_status`, `subscriber`, `created_on`, `updated_on`) VALUES
(1, 'of 3 and all received implants. Total of 5 implants were performed along with othe.."', 'Eugene Herald', 'Australia', 1, 1, '2014-12-08 22:15:50', '2014-12-08 22:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `seha_subscriber_timings`
--

CREATE TABLE `seha_subscriber_timings` (
  `id` int(11) NOT NULL,
  `subs_id` int(11) unsigned NOT NULL,
  `start_weekday` tinyint(1) unsigned NOT NULL,
  `end_weekday` tinyint(1) DEFAULT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seha_subscriber_timings`
--

INSERT INTO `seha_subscriber_timings` (`id`, `subs_id`, `start_weekday`, `end_weekday`, `open_time`, `close_time`) VALUES
(17, 5, 0, 5, '00:00:00', '23:30:00'),
(18, 6, 0, 3, '00:00:00', '16:30:00'),
(19, 6, 5, 6, '00:00:00', '16:30:00'),
(20, 26, 0, 5, '09:00:00', '13:00:00'),
(21, 26, 0, 5, '17:00:00', '21:00:00'),
(32, 32, 0, 5, '09:00:00', '19:00:00'),
(33, 33, 0, 5, '09:00:00', '21:00:00'),
(35, 34, 0, 5, '09:00:00', '21:00:00'),
(36, 35, 0, 5, '09:00:00', '21:00:00'),
(37, 39, 0, 6, '04:00:00', '23:59:00'),
(38, 40, 0, 6, '04:00:00', '23:59:00'),
(39, 43, 0, 5, '09:00:00', '21:00:00'),
(40, 44, 0, 5, '08:00:00', '21:00:00'),
(41, 44, 6, NULL, '17:00:00', '21:00:00'),
(42, 45, 0, 6, '04:00:00', '23:59:00'),
(43, 46, 0, 6, '04:00:00', '23:59:00'),
(46, 29, 0, 5, '09:00:00', '13:00:00'),
(47, 29, 0, 5, '17:00:00', '21:00:00'),
(51, 49, 0, 5, '09:00:00', '13:00:00'),
(52, 49, 0, 5, '17:00:00', '21:00:00'),
(53, 50, 0, 5, '10:00:00', '22:00:00'),
(54, 52, 0, 5, '10:00:00', '21:00:00'),
(55, 53, 0, 5, '10:00:00', '21:00:00'),
(56, 54, 0, 5, '09:00:00', '13:00:00'),
(57, 54, 0, 5, '17:00:00', '21:00:00'),
(58, 55, 0, 5, '10:00:00', '19:00:00'),
(59, 58, 0, 4, '09:00:00', '17:00:00'),
(60, 58, 5, NULL, '09:00:00', '14:00:00'),
(61, 59, 0, 6, '04:00:00', '23:59:00'),
(69, 62, 0, 5, '09:30:00', '13:30:00'),
(70, 62, 0, 4, '17:00:00', '20:00:00'),
(83, 61, 0, 5, '09:00:00', '13:00:00'),
(84, 61, 2, 5, '09:00:00', '13:00:00'),
(85, 61, 0, NULL, '17:00:00', '21:00:00'),
(86, 61, 2, NULL, '17:00:00', '21:00:00'),
(92, 69, 0, 6, '04:00:00', '23:59:00'),
(93, 69, 0, 4, '00:00:00', '01:30:00'),
(94, 70, 0, 5, '09:00:00', '13:00:00'),
(95, 70, 0, 5, '17:00:00', '09:00:00'),
(96, 47, 0, 6, '04:00:00', '23:59:00'),
(97, 27, 0, 5, '09:00:00', '13:00:00'),
(98, 27, 0, 5, '17:00:00', '21:00:00'),
(99, 51, 0, 5, '09:00:00', '13:00:00'),
(100, 51, 0, 5, '17:00:00', '21:00:00'),
(101, 71, 0, 5, '09:00:00', '13:00:00'),
(102, 71, 0, 5, '17:00:00', '21:00:00'),
(103, 72, 0, 5, '09:00:00', '13:00:00'),
(104, 72, 0, 5, '17:00:00', '21:00:00'),
(105, 74, 0, 5, '09:00:00', '21:00:00'),
(108, 75, 0, 6, '04:00:00', '23:59:00'),
(109, 76, 0, 5, '08:00:00', '21:00:00'),
(110, 77, 0, 5, '09:00:00', '18:00:00'),
(111, 78, 0, 6, '04:00:00', '23:59:00'),
(113, 79, 0, 6, '04:00:00', '23:59:00'),
(115, 81, 0, 6, '04:00:00', '23:59:00'),
(116, 82, 0, 5, '09:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `seha_tips`
--

CREATE TABLE `seha_tips` (
  `tips_id` int(11) NOT NULL,
  `tips_title` varchar(255) NOT NULL,
  `tips_title_ar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tips_description` text NOT NULL,
  `tips_description_ar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `show_status` tinyint(1) NOT NULL DEFAULT '1',
  `image_url` varchar(255) DEFAULT NULL,
  `thumb_url` varchar(255) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_tips`
--

INSERT INTO `seha_tips` (`tips_id`, `tips_title`, `tips_title_ar`, `tips_description`, `tips_description_ar`, `show_status`, `image_url`, `thumb_url`, `send`, `created_on`, `updated_on`) VALUES
(2, 'The risks of excess weight', 'مخاطر الوزن الزائد', '<p><span id="result_box" lang="en"><span class="hps">Risk of weight gain</span><span>:</span><br /> <span class="hps">Or</span> <span class="hps">overweight</span> <span class="hps">has a negative effect</span> <span class="hps">on women''s</span> <span class="hps">health</span> <span class="hps">in general</span><span>.</span> <span class="hps">Also</span> <span class="hps">lead to increased</span> <span class="hps">incidence of</span> <span class="hps">polycystic ovarian syndrome</span> <span class="hps">and</span> <span class="hps">thus</span> <span class="hps">to a lack of</span> <span class="hps">fertility</span><span>.</span><br /> <span class="hps">Did you know</span> <span class="hps">that</span> <span class="hps">about half of</span> <span class="hps">those who</span> <span class="hps">lose</span> <span class="hps">their lives</span> <span class="hps">during</span> <span class="hps">or after childbirth</span> <span class="hps">are</span> <span class="hps">overweight</span><span>.</span><br /> <span class="hps">D.atiaf</span> <span class="hps">Ismail</span><br /> <span class="hps">Specialist</span> <span class="hps">women</span> <span class="hps">and</span> <span class="hps">birth/sharjah holistic health <br /></span></span></p>', '<p><span data-reactid=".1.1.0.0.2.1.0.0.1"><span data-reactid=".1.1.0.0.2.1.0.0.1.2">مخاطر زيادة الوزن:</span><br data-reactid=".1.1.0.0.2.1.0.0.1.$newline3/=10" /><span data-reactid=".1.1.0.0.2.1.0.0.1.4">أن زيادة الوزن له تأثير سلبي على صحة المرأة بصورة عامة.</span></span></p>\n<p><span data-reactid=".1.1.0.0.2.1.0.0.1"><span data-reactid=".1.1.0.0.2.1.0.0.1.4">كما يؤدي إلى زيادة الإصابة بتكيس المبايض و بالتالي إلى قلة الخصوبة.</span><br data-reactid=".1.1.0.0.2.1.0.0.1.$newline5/=10" /><span data-reactid=".1.1.0.0.2.1.0.0.1.6">هل تعلمين بأن حوالي نصف اللواتي يفقدن حياتهم أثناء الولادة أو بعدها هم من ذوات الوزن الزائد. </span><br data-reactid=".1.1.0.0.2.1.0.0.1.$newline7/=10" /><span data-reactid=".1.1.0.0.2.1.0.0.1.8">د.اطياف إسماعيل </span><br data-reactid=".1.1.0.0.2.1.0.0.1.$newline9/=10" /><span data-reactid=".1.1.0.0.2.1.0.0.1.a">اخصائية نساء و ولادة/مركز الشارقة العالمي للطب الشمولي<br /></span></span></p>', 1, '8754aa54781a7c1be26f992c888c3ab6.jpg', '8754aa54781a7c1be26f992c888c3ab6_thumb.jpg', 1, '2015-11-30 13:34:36', '2016-07-22 01:36:49'),
(3, '.', 'فوائد العسل للأطفال', '<p>.</p>', '<p>إعطاء الأطفال ملعقة من العسل قبل النوم تخفف من أعراض الكحة الناتجة عن التهابات الصدر والزكام و يساعد بالنوم</p>', 1, '4cd1e4ba91ad69c90d05a8380293c3cc.jpg', '4cd1e4ba91ad69c90d05a8380293c3cc_thumb.jpg', 1, '2016-03-19 12:22:51', '2016-07-22 01:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `seha_translations`
--

CREATE TABLE `seha_translations` (
  `id` int(11) NOT NULL,
  `lang_code` varchar(10) DEFAULT NULL,
  `original_string` text,
  `translated_string` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_translations`
--

INSERT INTO `seha_translations` (`id`, `lang_code`, `original_string`, `translated_string`, `status`, `created_on`) VALUES
(1, 'en_GB', 'Hai How are you', 'Hai How are you', 1, '2014-10-13'),
(2, 'en_GB', 'Some originalh', 'Some originalh', 1, '2014-10-13'),
(8, 'en_GB', 'Hi Johnny', 'Hi Johnny', 1, '2014-11-16'),
(9, 'en_GB', 'Hi Johnny', 'Hi Johnny', 1, '2014-11-16'),
(10, 'en_GB', 'New Johnny', 'New Johnny', 1, '2014-11-16'),
(11, 'en_GB', 'Namaz', 'Namaz', 1, '2014-11-16'),
(12, 'en_GB', 'Hi johnny new', 'Hi johnny new', 1, '2014-11-16'),
(13, 'en_GB', 'SADasdsd', 'SADasdsd', 1, '2014-11-16'),
(14, 'en_GB', 'asdasdsgg', 'asdasdsgg', 1, '2014-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `seha_users`
--

CREATE TABLE `seha_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `r_password` varchar(80) NOT NULL,
  `unique_token` varchar(255) NOT NULL,
  `grp_id` int(2) NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '1',
  `is_master` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_users`
--

INSERT INTO `seha_users` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `r_password`, `unique_token`, `grp_id`, `user_status`, `is_master`, `created`) VALUES
(1, 'Super', 'Admin', 'admin', 'omarskaf@gmail.com', '12eacfd62f36f46b58e54bbb59ada28f', '360sehaadmin@123', 'b103753c39c381cff992ab164afae888782c0c88acdeca4b47b0e2281b61568a135ab45a21232f297a57a5a743894a0e4a801fc3', 2, 1, 1, '2014-11-13 05:15:17'),
(2, 'Anoop', 'Ponnapp', 'aneesh.anniayn@gmail.com', '', '', '', '', 0, 1, 0, '0000-00-00 00:00:00'),
(4, 'Aneesh', 'Ponnappan', 'anniyananeesh', 'aneesh.anniyan@gmail.com', 'ae0b577cee7e19f97769742645e26c90', 'mZIdNnOwEbVB', '73b4d2cca6f50c1b90069374e5030eaa6c66f55297cbca45f187e518c25e37d2f6c957de967c1d00d0cfb5bce4624d4337fbb173', 1, 0, 0, '2014-11-20 13:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `seha_user_groups`
--

CREATE TABLE `seha_user_groups` (
  `grp_id` int(11) NOT NULL,
  `grp_title` varchar(255) NOT NULL,
  `grp_role_id` int(11) DEFAULT NULL,
  `grp_status` tinyint(1) NOT NULL DEFAULT '1',
  `grp_created` datetime NOT NULL,
  `grp_updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_user_groups`
--

INSERT INTO `seha_user_groups` (`grp_id`, `grp_title`, `grp_role_id`, `grp_status`, `grp_created`, `grp_updated`) VALUES
(1, 'Administrator', 2, 1, '2014-11-20 04:09:11', '2014-11-20 04:09:11'),
(2, 'Dummy Admin', 2, 1, '2014-11-20 12:50:51', '2014-11-20 12:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `seha_user_ip`
--

CREATE TABLE `seha_user_ip` (
  `id` int(11) NOT NULL,
  `ip` varchar(35) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_user_ip`
--

INSERT INTO `seha_user_ip` (`id`, `ip`, `created_on`) VALUES
(3, '49.15.137.240', '2015-01-17 05:54:15'),
(4, '5.107.217.21', '2015-01-17 08:00:01'),
(5, '83.110.192.252', '2015-01-18 12:22:00'),
(6, '106.76.208.249', '2015-01-19 12:58:39'),
(7, '83.110.194.167', '2015-01-21 10:46:13'),
(8, '106.77.190.38', '2015-01-23 10:32:53'),
(9, '37.245.101.14', '2015-01-25 04:25:37'),
(10, '83.110.195.72', '2015-01-26 03:17:29'),
(11, '67.213.218.74', '2015-01-29 02:27:23'),
(12, '5.107.165.1', '2015-01-30 06:01:34'),
(13, '180.215.113.212', '2015-01-30 06:12:38'),
(14, '163.47.14.207', '2015-01-31 08:18:46'),
(15, '66.249.93.150', '2015-02-03 12:47:06'),
(16, '66.249.93.156', '2015-02-03 12:47:06'),
(17, '180.215.122.71', '2015-02-05 11:47:53'),
(18, '180.215.125.9', '2015-02-11 07:49:33'),
(19, '180.215.121.89', '2015-02-12 05:36:56'),
(20, '180.215.124.13', '2015-02-12 07:47:45'),
(21, '5.107.172.206', '2015-02-13 10:15:18'),
(22, '66.249.81.146', '2015-02-14 10:53:44'),
(23, '83.110.103.125', '2015-02-16 09:46:18'),
(24, '66.249.81.135', '2015-02-19 10:50:41'),
(25, '66.249.93.159', '2015-02-19 10:50:41'),
(26, '5.107.156.244', '2015-02-20 01:39:57'),
(27, '66.249.81.131', '2015-02-21 08:51:12'),
(28, '::1', '2015-02-21 10:53:56'),
(29, '127.0.0.1', '2015-04-14 09:56:42'),
(30, '83.110.79.15', '2015-05-31 04:35:52'),
(31, '66.249.81.165', '2015-06-01 10:08:45'),
(32, '157.55.39.190', '2015-06-01 02:51:09'),
(33, '66.249.81.169', '2015-06-02 11:34:39'),
(34, '66.249.67.247', '2015-06-02 11:57:54'),
(35, '66.249.81.173', '2015-06-04 11:54:54'),
(36, '180.76.15.144', '2015-06-07 05:31:57'),
(37, '180.76.15.17', '2015-06-08 12:08:04'),
(38, '5.107.221.122', '2015-06-08 08:54:58'),
(39, '217.165.249.163', '2015-06-08 10:36:13'),
(40, '83.110.102.169', '2015-06-08 12:37:11'),
(41, '83.110.194.227', '2015-06-08 02:38:55'),
(42, '157.55.39.12', '2015-06-09 03:31:16'),
(43, '180.76.15.26', '2015-06-09 10:59:34'),
(44, '180.76.15.151', '2015-06-12 02:31:00'),
(45, '92.96.171.148', '2015-06-12 04:07:11'),
(46, '66.249.65.126', '2015-06-12 08:56:41'),
(47, '66.249.65.120', '2015-06-12 11:16:18'),
(48, '54.68.97.166', '2015-06-14 11:30:35'),
(49, '83.110.195.0', '2015-06-14 09:52:18'),
(50, '207.46.13.116', '2015-06-18 01:33:25'),
(51, '83.110.79.224', '2015-06-18 08:57:49'),
(52, '157.55.39.64', '2015-06-19 01:51:50'),
(53, '123.125.71.70', '2015-06-19 05:10:41'),
(54, '180.76.15.8', '2015-06-20 05:10:26'),
(55, '66.249.67.120', '2015-06-21 09:25:51'),
(56, '180.76.15.163', '2015-07-02 06:17:27'),
(57, '207.46.13.114', '2015-07-03 02:48:41'),
(58, '157.55.39.240', '2015-07-05 08:19:44'),
(59, '180.76.15.160', '2015-07-05 03:39:13'),
(60, '180.76.15.150', '2015-07-05 09:57:49'),
(61, '220.181.108.175', '2015-07-07 03:28:35'),
(62, '180.76.15.161', '2015-07-10 09:23:15'),
(63, '207.46.13.30', '2015-07-11 08:00:47'),
(64, '180.76.15.154', '2015-07-12 07:33:50'),
(65, '180.76.15.157', '2015-07-13 08:47:13'),
(66, '157.55.39.200', '2015-07-13 11:23:00'),
(67, '157.55.39.79', '2015-07-13 03:25:56'),
(68, '180.76.15.134', '2015-07-14 12:47:20'),
(69, '220.181.108.119', '2015-07-14 07:59:27'),
(70, '207.46.13.149', '2015-07-15 08:02:57'),
(71, '83.110.78.113', '2015-09-06 06:15:12'),
(72, '66.249.67.114', '2015-09-06 07:12:23'),
(73, '157.55.39.182', '2015-09-06 07:57:32'),
(74, '207.46.13.119', '2015-09-06 09:12:33'),
(75, '66.249.67.97', '2015-09-06 09:43:54'),
(76, '92.96.236.9', '2015-09-06 09:45:17'),
(77, '83.110.192.43', '2015-10-08 12:19:55'),
(78, '61.135.190.224', '2015-10-08 04:30:20'),
(79, '45.55.62.214', '2015-10-10 04:17:33'),
(80, '5.228.187.250', '2015-10-11 11:34:40'),
(81, '66.249.73.141', '2015-10-11 01:31:09'),
(82, '95.221.236.228', '2015-10-11 09:23:46'),
(83, '192.99.2.27', '2015-10-12 08:45:20'),
(84, '83.110.243.102', '2015-10-12 06:51:01'),
(85, '107.189.60.77', '2015-10-12 07:51:02'),
(86, '61.135.190.102', '2015-10-13 05:54:17'),
(87, '52.13.64.121', '2015-10-13 11:54:55'),
(88, '66.249.64.71', '2015-10-14 04:20:15'),
(89, '66.249.64.155', '2015-10-14 05:12:45'),
(90, '66.249.64.150', '2015-10-14 02:04:57'),
(91, '46.242.6.21', '2015-10-15 06:41:05'),
(92, '66.249.64.160', '2015-10-15 09:52:51'),
(93, '66.249.64.76', '2015-10-15 04:04:49'),
(94, '66.249.64.66', '2015-10-16 12:05:00'),
(95, '66.249.75.251', '2015-10-17 05:42:27'),
(96, '66.249.75.243', '2015-10-18 12:28:24'),
(97, '66.249.69.22', '2015-10-18 06:10:34'),
(98, '83.110.195.197', '2015-10-18 09:21:47'),
(99, '54.92.168.158', '2015-10-18 09:25:51'),
(100, '66.249.75.235', '2015-10-18 10:23:43'),
(101, '199.30.25.20', '2015-10-19 10:28:30'),
(102, '83.110.193.179', '2015-10-19 11:24:35'),
(103, '66.249.79.36', '2015-10-20 03:10:42'),
(104, '66.249.79.241', '2015-10-20 06:48:33'),
(105, '54.212.63.59', '2015-10-20 11:32:41'),
(106, '83.110.100.253', '2015-10-20 12:04:18'),
(107, '66.249.79.34', '2015-10-20 02:03:30'),
(108, '66.249.67.139', '2015-10-20 05:32:16'),
(109, '188.32.179.105', '2015-10-20 06:25:33'),
(110, '66.249.67.126', '2015-10-20 08:11:40'),
(111, '66.249.67.251', '2015-10-21 06:10:51'),
(112, '66.249.67.252', '2015-10-21 07:40:01'),
(113, '66.249.67.235', '2015-10-21 12:22:51'),
(114, '180.76.15.142', '2015-10-21 01:43:09'),
(115, '207.46.13.3', '2015-10-21 04:38:32'),
(116, '66.249.65.123', '2015-10-22 05:59:04'),
(117, '66.249.65.118', '2015-10-23 01:20:35'),
(118, '66.249.93.250', '2015-10-24 11:53:54'),
(119, '68.180.228.23', '2015-10-26 06:02:33'),
(120, '83.110.194.171', '2015-11-11 09:40:01'),
(121, '83.110.194.208', '2016-03-22 03:00:16'),
(122, '52.12.248.98', '2016-03-22 03:38:41'),
(123, '66.249.74.59', '2016-03-23 04:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `seha_user_permissions`
--

CREATE TABLE `seha_user_permissions` (
  `grp_id` int(11) NOT NULL,
  `permission_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_user_permissions`
--

INSERT INTO `seha_user_permissions` (`grp_id`, `permission_title`) VALUES
(2, 'user_view'),
(2, 'user_create'),
(2, 'user_edit'),
(2, 'user_delete'),
(2, 'user_group_view'),
(2, 'user_group_create'),
(2, 'user_group_edit'),
(2, 'user_group_delete'),
(2, 'settings_general'),
(2, 'settings_mail'),
(2, 'settings_images'),
(2, 'settings_social media'),
(2, 'settings_advertisement'),
(2, 'settings_comment'),
(2, 'settings_currency'),
(2, 'settings_language'),
(2, 'subscribers_settings'),
(2, 'subscribers_create'),
(2, 'subscribers_edit'),
(2, 'subscribers_approval'),
(2, 'subscribers_delete'),
(2, 'subscribers_view'),
(2, 'tools_repair_database'),
(2, 'tools_import_database'),
(2, 'category_edit');

-- --------------------------------------------------------

--
-- Table structure for table `seha_user_reviews`
--

CREATE TABLE `seha_user_reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8,
  `rating` varchar(4) NOT NULL,
  `subscriber` int(11) NOT NULL,
  `is_approve` tinyint(1) NOT NULL DEFAULT '0',
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seha_user_reviews`
--

INSERT INTO `seha_user_reviews` (`id`, `name`, `message`, `rating`, `subscriber`, `is_approve`, `created_on`, `updated_on`) VALUES
(5, 'Aneesh Ponnappan', 'good service', '4', 78, 0, '2016-09-07 10:02:35', '2016-09-07 10:02:35'),
(8, 'omar skaf', 'مركز مميز بخدمات مميزة', '4', 52, 1, '2016-09-08 16:50:15', '2016-09-08 16:50:15'),
(9, 'Aneesh Ponnappan', 'good service', '5', 74, 1, '2016-09-09 02:50:06', '2016-09-09 02:50:06'),
(10, 'Aneesh Ponnappan', 'nice', '3', 74, 1, '2016-09-09 03:00:29', '2016-09-09 03:00:29'),
(11, 'Aneesh Ponnappan', 'hi', '1', 74, 1, '2016-09-09 03:10:42', '2016-09-09 03:10:42'),
(12, 'Aneesh Ponnappan', 'hi', '4', 26, 1, '2016-09-09 03:14:50', '2016-09-09 03:14:50'),
(13, 'Aneesh Ponnappan', 'new vice is goofd  for dental care', '1', 26, 1, '2016-09-09 03:15:44', '2016-09-09 03:15:44'),
(14, 'Anoop Ponnpapan', 'higood servucer', '4', 34, 1, '2016-09-14 06:23:23', '2016-09-14 06:23:23'),
(15, 'Anwar rashid', 'Got a good welcome and treatment from them', '5', 74, 1, '2016-09-14 06:39:47', '2016-09-14 06:39:47'),
(16, 'Sumesh', 'Hi good service', '3', 26, 1, '2016-09-14 07:14:32', '2016-09-14 07:14:32'),
(17, 'Jone', 'Good', '4', 50, 1, '2016-09-18 13:48:33', '2016-09-18 13:48:33'),
(19, 'Aneesh', 'Best service I got', '4', 29, 1, '2016-10-03 04:33:28', '2016-10-03 04:33:28'),
(20, 'Omar mouhamad', 'خدمة مميزة شكراً دكتور عز الدين', '5', 130, 1, '2016-10-09 02:29:03', '2016-10-09 02:29:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seha_advertisements`
--
ALTER TABLE `seha_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_appointments`
--
ALTER TABLE `seha_appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `seha_banners`
--
ALTER TABLE `seha_banners`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `seha_categories`
--
ALTER TABLE `seha_categories`
  ADD PRIMARY KEY (`id_category`) USING BTREE,
  ADD UNIQUE KEY `oc2_categories_IK_seo_name` (`seoname`);

--
-- Indexes for table `seha_cities`
--
ALTER TABLE `seha_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_config`
--
ALTER TABLE `seha_config`
  ADD PRIMARY KEY (`config_key`),
  ADD UNIQUE KEY `config_key` (`config_key`),
  ADD KEY `config_key_2` (`config_key`);

--
-- Indexes for table `seha_contacts`
--
ALTER TABLE `seha_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_contact_list`
--
ALTER TABLE `seha_contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_countries`
--
ALTER TABLE `seha_countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `seha_currencies`
--
ALTER TABLE `seha_currencies`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `seha_devices`
--
ALTER TABLE `seha_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_doctors`
--
ALTER TABLE `seha_doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `seha_enquiries`
--
ALTER TABLE `seha_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_health_tips`
--
ALTER TABLE `seha_health_tips`
  ADD PRIMARY KEY (`tips_id`),
  ADD KEY `tips_id` (`tips_id`);

--
-- Indexes for table `seha_insurance`
--
ALTER TABLE `seha_insurance`
  ADD PRIMARY KEY (`ins_id`),
  ADD KEY `ins_id` (`ins_id`);

--
-- Indexes for table `seha_languages`
--
ALTER TABLE `seha_languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `seha_locations`
--
ALTER TABLE `seha_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_news`
--
ALTER TABLE `seha_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `seha_newsletter_subscriptions`
--
ALTER TABLE `seha_newsletter_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_nl_templates`
--
ALTER TABLE `seha_nl_templates`
  ADD PRIMARY KEY (`tpl_id`);

--
-- Indexes for table `seha_notifications`
--
ALTER TABLE `seha_notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `seha_notification_job`
--
ALTER TABLE `seha_notification_job`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `seha_patients`
--
ALTER TABLE `seha_patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `seha_patients_comments`
--
ALTER TABLE `seha_patients_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_patients_favourites`
--
ALTER TABLE `seha_patients_favourites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `seha_patients_likes`
--
ALTER TABLE `seha_patients_likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `seha_region`
--
ALTER TABLE `seha_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_slides`
--
ALTER TABLE `seha_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_specializations`
--
ALTER TABLE `seha_specializations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `seha_sponsors`
--
ALTER TABLE `seha_sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `seha_subcriber_doctors`
--
ALTER TABLE `seha_subcriber_doctors`
  ADD PRIMARY KEY (`id_dr`);

--
-- Indexes for table `seha_subcriber_img_gallery`
--
ALTER TABLE `seha_subcriber_img_gallery`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `img_id` (`img_id`),
  ADD KEY `img_id_2` (`img_id`);

--
-- Indexes for table `seha_subcriber_offers`
--
ALTER TABLE `seha_subcriber_offers`
  ADD PRIMARY KEY (`offer_id`),
  ADD UNIQUE KEY `offer_id` (`offer_id`),
  ADD KEY `offer_id_2` (`offer_id`),
  ADD KEY `service_fk` (`service_fk`),
  ADD KEY `subscriber` (`subscriber`),
  ADD KEY `offer_starts` (`offer_starts`),
  ADD KEY `offer_ends` (`offer_ends`);

--
-- Indexes for table `seha_subcriber_services`
--
ALTER TABLE `seha_subcriber_services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `seha_subcriber_video_gallery`
--
ALTER TABLE `seha_subcriber_video_gallery`
  ADD PRIMARY KEY (`vid_id`);

--
-- Indexes for table `seha_subscribers`
--
ALTER TABLE `seha_subscribers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`),
  ADD KEY `subs_lat_id` (`subs_lat_id`,`subs_long_id`,`is_verified`,`is_visiting`,`has_emergency`,`has_home_services`);

--
-- Indexes for table `seha_subscribers_articles`
--
ALTER TABLE `seha_subscribers_articles`
  ADD PRIMARY KEY (`articles_id`),
  ADD KEY `articles_id` (`articles_id`);

--
-- Indexes for table `seha_subscribers_departments`
--
ALTER TABLE `seha_subscribers_departments`
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `seha_subscribers_slides`
--
ALTER TABLE `seha_subscribers_slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_subscribers_smedia_settings`
--
ALTER TABLE `seha_subscribers_smedia_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_subscribers_spl`
--
ALTER TABLE `seha_subscribers_spl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_subscribers_wall`
--
ALTER TABLE `seha_subscribers_wall`
  ADD PRIMARY KEY (`wall_id`);

--
-- Indexes for table `seha_subscriber_insurance`
--
ALTER TABLE `seha_subscriber_insurance`
  ADD KEY `ins_id` (`ins_id`),
  ADD KEY `subs_id` (`subs_id`);

--
-- Indexes for table `seha_subscriber_insurance_clients`
--
ALTER TABLE `seha_subscriber_insurance_clients`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `seha_subscriber_news`
--
ALTER TABLE `seha_subscriber_news`
  ADD PRIMARY KEY (`notes_id`),
  ADD KEY `subscriber_type` (`subscriber_type`);

--
-- Indexes for table `seha_subscriber_products`
--
ALTER TABLE `seha_subscriber_products`
  ADD PRIMARY KEY (`prdt_id`);

--
-- Indexes for table `seha_subscriber_testimonials`
--
ALTER TABLE `seha_subscriber_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_subscriber_timings`
--
ALTER TABLE `seha_subscriber_timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_tips`
--
ALTER TABLE `seha_tips`
  ADD PRIMARY KEY (`tips_id`),
  ADD KEY `tips_id` (`tips_id`);

--
-- Indexes for table `seha_translations`
--
ALTER TABLE `seha_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_users`
--
ALTER TABLE `seha_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `seha_user_groups`
--
ALTER TABLE `seha_user_groups`
  ADD PRIMARY KEY (`grp_id`),
  ADD UNIQUE KEY `grp_id` (`grp_id`);

--
-- Indexes for table `seha_user_ip`
--
ALTER TABLE `seha_user_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seha_user_reviews`
--
ALTER TABLE `seha_user_reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seha_advertisements`
--
ALTER TABLE `seha_advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `seha_appointments`
--
ALTER TABLE `seha_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_banners`
--
ALTER TABLE `seha_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seha_categories`
--
ALTER TABLE `seha_categories`
  MODIFY `id_category` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=529;
--
-- AUTO_INCREMENT for table `seha_cities`
--
ALTER TABLE `seha_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `seha_contacts`
--
ALTER TABLE `seha_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `seha_contact_list`
--
ALTER TABLE `seha_contact_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seha_countries`
--
ALTER TABLE `seha_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `seha_currencies`
--
ALTER TABLE `seha_currencies`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seha_devices`
--
ALTER TABLE `seha_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `seha_doctors`
--
ALTER TABLE `seha_doctors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seha_enquiries`
--
ALTER TABLE `seha_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seha_health_tips`
--
ALTER TABLE `seha_health_tips`
  MODIFY `tips_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_insurance`
--
ALTER TABLE `seha_insurance`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `seha_languages`
--
ALTER TABLE `seha_languages`
  MODIFY `lang_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_locations`
--
ALTER TABLE `seha_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seha_news`
--
ALTER TABLE `seha_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seha_newsletter_subscriptions`
--
ALTER TABLE `seha_newsletter_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seha_nl_templates`
--
ALTER TABLE `seha_nl_templates`
  MODIFY `tpl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_notifications`
--
ALTER TABLE `seha_notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seha_notification_job`
--
ALTER TABLE `seha_notification_job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seha_patients`
--
ALTER TABLE `seha_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `seha_patients_comments`
--
ALTER TABLE `seha_patients_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `seha_patients_favourites`
--
ALTER TABLE `seha_patients_favourites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `seha_patients_likes`
--
ALTER TABLE `seha_patients_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `seha_region`
--
ALTER TABLE `seha_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1194;
--
-- AUTO_INCREMENT for table `seha_slides`
--
ALTER TABLE `seha_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seha_specializations`
--
ALTER TABLE `seha_specializations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `seha_sponsors`
--
ALTER TABLE `seha_sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seha_subcriber_doctors`
--
ALTER TABLE `seha_subcriber_doctors`
  MODIFY `id_dr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seha_subcriber_img_gallery`
--
ALTER TABLE `seha_subcriber_img_gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `seha_subcriber_offers`
--
ALTER TABLE `seha_subcriber_offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `seha_subcriber_services`
--
ALTER TABLE `seha_subcriber_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `seha_subcriber_video_gallery`
--
ALTER TABLE `seha_subcriber_video_gallery`
  MODIFY `vid_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `seha_subscribers`
--
ALTER TABLE `seha_subscribers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `seha_subscribers_articles`
--
ALTER TABLE `seha_subscribers_articles`
  MODIFY `articles_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `seha_subscribers_departments`
--
ALTER TABLE `seha_subscribers_departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `seha_subscribers_slides`
--
ALTER TABLE `seha_subscribers_slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `seha_subscribers_smedia_settings`
--
ALTER TABLE `seha_subscribers_smedia_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_subscribers_spl`
--
ALTER TABLE `seha_subscribers_spl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `seha_subscribers_wall`
--
ALTER TABLE `seha_subscribers_wall`
  MODIFY `wall_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `seha_subscriber_insurance_clients`
--
ALTER TABLE `seha_subscriber_insurance_clients`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `seha_subscriber_news`
--
ALTER TABLE `seha_subscriber_news`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_subscriber_products`
--
ALTER TABLE `seha_subscriber_products`
  MODIFY `prdt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seha_subscriber_testimonials`
--
ALTER TABLE `seha_subscriber_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seha_subscriber_timings`
--
ALTER TABLE `seha_subscriber_timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `seha_tips`
--
ALTER TABLE `seha_tips`
  MODIFY `tips_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seha_translations`
--
ALTER TABLE `seha_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `seha_users`
--
ALTER TABLE `seha_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seha_user_groups`
--
ALTER TABLE `seha_user_groups`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seha_user_ip`
--
ALTER TABLE `seha_user_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `seha_user_reviews`
--
ALTER TABLE `seha_user_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `seha_subscriber_insurance`
--
ALTER TABLE `seha_subscriber_insurance`
  ADD CONSTRAINT `seha_subscriber_insurance_ibfk_1` FOREIGN KEY (`ins_id`) REFERENCES `seha_insurance` (`ins_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `seha_subscriber_insurance_ibfk_2` FOREIGN KEY (`subs_id`) REFERENCES `seha_subscribers` (`user_id`) ON DELETE SET NULL ON UPDATE SET NULL;
