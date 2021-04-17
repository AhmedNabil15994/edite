-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2021 at 05:56 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edite`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocked_users`
--

CREATE TABLE `blocked_users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `ended_at` datetime DEFAULT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(18, 'مدينة 111', 1, 1, 1, '2021-01-01 23:42:40', 1, '2021-01-01 23:43:58', 1, '2021-01-01 23:44:08'),
(19, 'ينبع', 1, 2, 1, '2021-01-05 03:33:07', NULL, NULL, NULL, NULL),
(20, 'نجران', 1, 3, 1, '2021-01-05 03:33:13', NULL, NULL, NULL, NULL),
(21, 'مملكة البحرين', 1, 4, 1, '2021-01-05 03:33:19', NULL, NULL, NULL, NULL),
(22, 'مكة المكرمة', 1, 5, 1, '2021-01-05 03:33:24', NULL, NULL, NULL, NULL),
(23, 'محايل عسير', 1, 6, 1, '2021-01-05 03:33:29', NULL, NULL, NULL, NULL),
(24, 'عنيزة', 1, 7, 1, '2021-01-05 03:33:35', NULL, NULL, NULL, NULL),
(25, 'عرعر', 1, 8, 1, '2021-01-05 03:33:40', NULL, NULL, NULL, NULL),
(26, 'طريف', 1, 9, 1, '2021-01-05 03:33:46', NULL, NULL, NULL, NULL),
(27, 'صبيا', 1, 10, 1, '2021-01-05 03:33:51', NULL, NULL, NULL, NULL),
(28, 'صامطة', 1, 11, 1, '2021-01-05 03:33:56', NULL, NULL, NULL, NULL),
(29, 'شرورة', 1, 12, 1, '2021-01-05 03:34:01', NULL, NULL, NULL, NULL),
(30, 'سيهات', 1, 13, 1, '2021-01-05 03:34:06', NULL, NULL, NULL, NULL),
(31, 'سكاكا', 1, 14, 1, '2021-01-05 03:34:11', NULL, NULL, NULL, NULL),
(32, 'رفحاء', 1, 15, 1, '2021-01-05 03:34:16', NULL, NULL, NULL, NULL),
(33, 'خميس مشيط', 1, 16, 1, '2021-01-05 03:34:23', NULL, NULL, NULL, NULL),
(34, 'حفر الباطن', 1, 17, 1, '2021-01-05 03:34:29', NULL, NULL, NULL, NULL),
(35, 'حائل', 1, 18, 1, '2021-01-05 03:34:35', NULL, NULL, NULL, NULL),
(36, 'جيزان', 1, 19, 1, '2021-01-05 03:34:39', NULL, NULL, NULL, NULL),
(37, 'جدة', 1, 20, 1, '2021-01-05 03:34:45', NULL, NULL, NULL, NULL),
(38, 'جازان', 1, 21, 1, '2021-01-05 03:34:55', NULL, NULL, NULL, NULL),
(39, 'تبوك', 1, 22, 1, '2021-01-05 03:35:00', NULL, NULL, NULL, NULL),
(40, 'بيشة', 1, 23, 1, '2021-01-05 03:35:08', NULL, NULL, NULL, NULL),
(41, 'بريدة', 1, 24, 1, '2021-01-05 03:35:13', NULL, NULL, NULL, NULL),
(42, 'النماص', 1, 25, 1, '2021-01-05 03:35:18', NULL, NULL, NULL, NULL),
(43, 'النعيرية', 1, 26, 1, '2021-01-05 03:35:24', NULL, NULL, NULL, NULL),
(44, 'المدينة المنورة', 1, 27, 1, '2021-01-05 03:35:30', NULL, NULL, NULL, NULL),
(45, 'المخواة', 1, 28, 1, '2021-01-05 03:35:37', NULL, NULL, NULL, NULL),
(46, 'القنفذة', 1, 29, 1, '2021-01-05 03:35:44', NULL, NULL, NULL, NULL),
(47, 'القطيف', 1, 30, 1, '2021-01-05 03:35:50', NULL, NULL, NULL, NULL),
(48, 'القصيم', 1, 31, 1, '2021-01-05 03:35:55', NULL, NULL, NULL, NULL),
(49, 'الظهران', 1, 32, 1, '2021-01-05 03:36:01', NULL, NULL, NULL, NULL),
(50, 'الطائف', 1, 33, 1, '2021-01-05 03:36:08', NULL, NULL, NULL, NULL),
(51, 'الرياض', 1, 34, 1, '2021-01-05 03:36:14', NULL, NULL, NULL, NULL),
(52, 'الدوادمي', 1, 35, 1, '2021-01-05 03:36:19', NULL, NULL, NULL, NULL),
(53, 'الدمام', 1, 36, 1, '2021-01-05 03:36:27', NULL, NULL, NULL, NULL),
(54, 'الخفجي', 1, 37, 1, '2021-01-05 03:36:33', NULL, NULL, NULL, NULL),
(55, 'الخرج', 1, 38, 1, '2021-01-05 03:36:39', NULL, NULL, NULL, NULL),
(56, 'الخبر', 1, 39, 1, '2021-01-05 03:36:45', NULL, NULL, NULL, NULL),
(57, 'الجبيل', 1, 40, 1, '2021-01-05 03:36:50', NULL, NULL, NULL, NULL),
(58, 'الباحه', 1, 41, 1, '2021-01-05 03:36:56', NULL, NULL, NULL, NULL),
(59, 'الاحساء', 1, 42, 1, '2021-01-05 03:37:03', NULL, NULL, NULL, NULL),
(60, 'اخري', 1, 43, 1, '2021-01-05 03:37:09', NULL, NULL, NULL, NULL),
(61, 'ابو عريش', 1, 44, 1, '2021-01-05 03:37:16', NULL, NULL, NULL, NULL),
(62, 'ابها', 1, 45, 1, '2021-01-05 03:37:22', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `reply` text,
  `ip_address` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone`, `email`, `message`, `address`, `reply`, `ip_address`, `status`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'test test test', '201558651994', 'test@tes.com', 'test', 'test', NULL, '127.0.0.1', 1, '2021-04-14 21:04:05', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` double DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `sort` int DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `type`, `price`, `image`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'وقّعت غرفة الأحساء وجمعية الثقافة والفنون بالأحساء اتفاقية                                     تعاون لتوطيد العلاقات ومدّ جسور التعاون بين الطرفين من خلال                                     منح الجمعية حق امتياز تشغيل المساحة الإبداعية في منتزه...', '2021-04-14', NULL, 0, 'edite-135975823620210414093142PM.png', 1, 1, 1, '2021-04-14 21:31:49', NULL, NULL, NULL, NULL),
(2, 'بحضور الملحق الثقافي الأمريكي بجدة السيد نوح كوننغهام ونخبة                                         من الفنانين والفنانات في الساحة التشكيلية بجدة الأستاذ محمد آل                                         صبيح  يفتتح المعرض الختامي للإقامة الفنية الجزئية...', '2021-04-14', NULL, 0, 'edite-14311510920210414093205PM.png', 1, 2, 1, '2021-04-14 21:32:06', NULL, NULL, NULL, NULL),
(3, 'بحضور الملحق الثقافي الأمريكي بجدة السيد نوح كوننغهام ونخبة                                         من الفنانين والفنانات في الساحة التشكيلية بجدة الأستاذ محمد آل                                         صبيح  يفتتح المعرض الختامي للإقامة الفنية الجزئية...', '2021-04-14', NULL, 0, 'edite-159539754820210414093222PM.png', 1, 3, 1, '2021-04-14 21:32:25', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `title`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'المجال 1', 1, 1, 1, '2021-04-15 18:11:16', NULL, NULL, NULL, NULL),
(2, 'المجال 2', 1, 2, 1, '2021-04-15 18:11:24', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `permissions` text,
  `admin_privs` int NOT NULL,
  `sort` int NOT NULL,
  `status` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `permissions`, `admin_privs`, `sort`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'مجموعة 1', 'a:53:{i:0;s:14:\"list-dashboard\";i:1;s:0:\"\";i:2;s:13:\"list-topMenus\";i:3;s:12:\"edit-topMenu\";i:4;s:11:\"add-topMenu\";i:5;s:14:\"delete-topMenu\";i:6;s:12:\"sort-topMenu\";i:7;s:14:\"charts-topMenu\";i:8;s:16:\"list-bottomMenus\";i:9;s:15:\"edit-bottomMenu\";i:10;s:14:\"add-bottomMenu\";i:11;s:17:\"delete-bottomMenu\";i:12;s:15:\"sort-bottomMenu\";i:13;s:17:\"charts-bottomMenu\";i:14;s:10:\"list-pages\";i:15;s:9:\"edit-page\";i:16;s:8:\"add-page\";i:17;s:11:\"delete-page\";i:18;s:9:\"sort-page\";i:19;s:11:\"charts-page\";i:20;s:16:\"uploadImage-page\";i:21;s:16:\"deleteImage-page\";i:22;s:12:\"list-sliders\";i:23;s:11:\"edit-slider\";i:24;s:10:\"add-slider\";i:25;s:13:\"delete-slider\";i:26;s:11:\"sort-slider\";i:27;s:13:\"charts-slider\";i:28;s:18:\"uploadImage-slider\";i:29;s:18:\"deleteImage-slider\";i:30;s:15:\"list-advantages\";i:31;s:14:\"edit-advantage\";i:32;s:13:\"add-advantage\";i:33;s:16:\"delete-advantage\";i:34;s:14:\"sort-advantage\";i:35;s:16:\"charts-advantage\";i:36;s:13:\"list-benefits\";i:37;s:12:\"edit-benefit\";i:38;s:11:\"add-benefit\";i:39;s:14:\"delete-benefit\";i:40;s:12:\"sort-benefit\";i:41;s:14:\"charts-benefit\";i:42;s:11:\"list-cities\";i:43;s:9:\"edit-city\";i:44;s:8:\"add-city\";i:45;s:11:\"delete-city\";i:46;s:9:\"sort-city\";i:47;s:11:\"charts-city\";i:48;s:14:\"list-contactUs\";i:49;s:14:\"edit-contactUs\";i:50;s:16:\"delete-contactUs\";i:51;s:15:\"reply-contactUs\";i:52;s:16:\"charts-contactUs\";}', 0, 2, 1, 1, '2021-01-03 19:24:39', 1, '2021-01-05 23:04:10', NULL, NULL),
(3, 'Normal User', NULL, 0, 3, 1, 1, '2021-01-05 22:54:57', NULL, NULL, 1, '2021-01-05 22:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime DEFAULT NULL,
  `ended` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id`, `username`, `from_date`, `to_date`, `ended`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'admin', '2021-04-14 17:30:03', '2021-04-14 17:45:03', 1, 1, 1, '2021-04-14 17:30:03', NULL, NULL, NULL, NULL),
(2, 'admin', '2021-04-14 20:13:45', '2021-04-14 20:28:45', 1, 2, 1, '2021-04-14 20:13:45', NULL, NULL, NULL, NULL),
(3, 'admin', '2021-04-15 17:58:38', '2021-04-15 18:13:38', 1, 3, 1, '2021-04-15 17:58:38', NULL, NULL, NULL, NULL),
(4, 'admin', '2021-04-17 11:21:50', '2021-04-17 11:36:50', 0, 4, 1, '2021-04-17 11:21:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `discount_price` double DEFAULT NULL,
  `features` text,
  `conditions` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `price`, `discount_price`, `features`, `conditions`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'عامل', 100, NULL, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 1, 1, 1, '2021-04-14 22:22:32', NULL, NULL, NULL, NULL),
(2, 'منتسب', 200, 0, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 1, 2, 1, '2021-04-14 22:29:07', NULL, NULL, NULL, NULL),
(3, 'شرفية', 350, 0, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 1, 3, 1, '2021-04-14 22:29:25', NULL, NULL, NULL, NULL),
(4, 'فخرية', 500, 0, 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 'a:8:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";i:6;s:1:\"7\";i:7;s:1:\"8\";}', 1, 4, 1, '2021-04-14 22:29:42', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_conditions`
--

CREATE TABLE `membership_conditions` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_conditions`
--

INSERT INTO `membership_conditions` (`id`, `title`, `description`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'الاستفادة من المميزات والخصومات الممنوحة لأعضاء الجمعية', NULL, 1, 1, 1, '2021-04-14 22:16:34', NULL, NULL, NULL, NULL),
(2, 'أولوية التسجيل في الدورات التي يقيمها مبادرة ثقف لتنمية المواهب ( ثقف )', NULL, 1, 2, 1, '2021-04-14 22:16:43', NULL, NULL, NULL, NULL),
(3, 'أولوية التعاقد في الفعاليات التي تقيمها الجمعية', NULL, 1, 3, 1, '2021-04-14 22:16:52', NULL, NULL, NULL, NULL),
(4, 'نشر إعلانات الدورات التدريبية ونتائجها في قنوات التواصل الاجتماعي للجمعية', NULL, 1, 4, 1, '2021-04-14 22:17:01', NULL, NULL, NULL, NULL),
(5, 'خصم يصل إلى 20% على رسوم المشاركة في الدورات والورش التدريبية من قبل مبادرة ثقف لتنمية المواهب ( ثقف )', NULL, 1, 5, 1, '2021-04-14 22:17:09', NULL, NULL, NULL, NULL),
(6, 'إشعار العضو بجميع فعاليات الجمعية عن طريق البريد الإلكتروني أو تنبيهات تطبيق الجوال الرسمي للجمعية', NULL, 1, 6, 1, '2021-04-14 22:17:17', NULL, NULL, NULL, NULL),
(7, 'نشر إعلانات الدورات التدريبية ونتائجها في قنوات التواصل الاجتماعي للجمعية', NULL, 1, 7, 1, '2021-04-14 22:17:25', NULL, NULL, NULL, NULL),
(8, 'يحصل على خصم يصل إلى 10% من قيمة استئجار القاعات داخل الجمعية', NULL, 1, 8, 1, '2021-04-14 22:17:33', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_features`
--

CREATE TABLE `membership_features` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membership_features`
--

INSERT INTO `membership_features` (`id`, `title`, `description`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'الاستفادة من المميزات والخصومات الممنوحة لأعضاء الجمعية', NULL, 1, 1, 1, '2021-04-14 22:17:59', NULL, NULL, NULL, NULL),
(2, 'أولوية التسجيل في الدورات التي يقيمها مبادرة ثقف لتنمية المواهب ( ثقف )', NULL, 1, 2, 1, '2021-04-14 22:18:07', NULL, NULL, NULL, NULL),
(3, 'أولوية التعاقد في الفعاليات التي تقيمها الجمعية', NULL, 1, 3, 1, '2021-04-14 22:18:17', NULL, NULL, NULL, NULL),
(4, 'نشر إعلانات الدورات التدريبية ونتائجها في قنوات التواصل الاجتماعي للجمعية', NULL, 1, 4, 1, '2021-04-14 22:18:25', NULL, NULL, NULL, NULL),
(5, 'خصم يصل إلى 20% على رسوم المشاركة في الدورات والورش التدريبية من قبل مبادرة ثقف لتنمية المواهب ( ثقف )', NULL, 1, 5, 1, '2021-04-14 22:18:34', NULL, NULL, NULL, NULL),
(6, 'إشعار العضو بجميع فعاليات الجمعية عن طريق البريد الإلكتروني أو تنبيهات تطبيق الجوال الرسمي للجمعية', NULL, 1, 6, 1, '2021-04-14 22:18:43', NULL, NULL, NULL, NULL),
(7, 'نشر إعلانات الدورات التدريبية ونتائجها في قنوات التواصل الاجتماعي للجمعية', NULL, 1, 7, 1, '2021-04-14 22:18:51', NULL, NULL, NULL, NULL),
(8, 'يحصل على خصم يصل إلى 10% من قيمة استئجار القاعات داخل الجمعية', NULL, 1, 8, 1, '2021-04-14 22:18:58', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_no` varchar(55) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `card_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` int DEFAULT NULL,
  `field_id` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city_id` int DEFAULT NULL,
  `membership_id` int NOT NULL,
  `brief` text,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `name`, `email`, `phone`, `card_name`, `gender`, `field_id`, `city_id`, `membership_id`, `brief`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, '151994', 'Ahmed Nabil Ebraheim Hussein', 'mody998866@gmail.com', '201069273925', 'Ahmed Nabil', 1, '1', 19, 4, 'Brief', 6, 1, NULL, '2021-04-15 19:39:23', 1, '2021-04-17 12:42:06', NULL, NULL),
(2, '7613', 'test test test test', 'ahmedmahran2023@gmail.com', '201558651994', 'a b', 1, '1', 19, 1, 'test', 1, 2, NULL, '2021-04-17 11:11:54', NULL, NULL, NULL, NULL),
(3, '2342', 'test test test test', 'ahmedmahran2023@gmail.com', '201558651994', 'a b', 1, '1', 19, 1, 'test', 4, 3, NULL, '2021-04-17 11:18:07', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `identity_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `identity_end_date` date DEFAULT NULL,
  `identity_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `identity_no`, `identity_end_date`, `identity_image`, `image`, `facebook`, `twitter`, `snapchat`, `youtube`, `instagram`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 1, 'a', '2021-04-09', 'edite-175590336720210417094504AM.png', 'edite-66679187720210417094504AM.png', 'facebook', 'twitter', 'snapchat', 'youtube', 'instagram', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, '123123', '2021-04-15', 'edite-212337620620210417113510AM.png', 'edite-113956030320210417113510AM.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `icon`, `description`, `image`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'عن الجمعية', NULL, '<p><span style=\"color: rgb(0, 0, 0); font-family: Tajawal-Regular; font-size: 18px; text-align: start;\">في يوم 19/11/1393هـ الموافق 13/12/1973م. صدر القرار رقم 43 من الإدارة العامة لرعاية الشباب بوزارة العمل والشؤون الاجتماعية بمنح الترخيص المبدئي للجمعية باسم (الجمعية العربية السعودية للفنون) ولمدة عام من تاريخه. وفي عام 1394هـ/ 1974م, أصبحت الإدارة العامة لرعاية الشباب مؤسسة حكومية ذات شخصية وميزانية مستقلة ترتبط إدارياً بالمجلس الأعلى لرعاية الشباب باسم (الرئاسة العامة لرعاية الشباب) برئاسة الأمير فيصل بن فهد بن عبدالعزيز «رحمه الله». وفي يوم 12/4/1395هـ/ 23/4/1975م, صدر قرار الأمير فيصل بن فهد رقم 33 بمنح الترخيص النهائي للجمعية</span><br></p>', 'enggate-184758178720210414055414PM.png', 1, 1, 1, '2021-04-14 17:54:16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int NOT NULL,
  `filename` varchar(255) NOT NULL,
  `imageable_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `imageable_id` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `filename`, `imageable_type`, `imageable_id`, `link`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'enggate-184758178720210414055414PM.png', 'App\\Models\\Page', 1, 'http://backend.edite.loc/uploads/pages/1/enggate-184758178720210414055414PM.png', 1, 1, 1, '2021-04-14 17:54:14', NULL, NULL, NULL, NULL),
(2, 'edite-135975823620210414093142PM.png', 'App\\Models\\Event', 1, 'http://backend.edite.loc/uploads/events/1/edite-135975823620210414093142PM.png', 1, 2, 1, '2021-04-14 21:31:42', NULL, NULL, NULL, NULL),
(3, 'edite-14311510920210414093205PM.png', 'App\\Models\\Event', 2, 'http://backend.edite.loc/uploads/events/2/edite-14311510920210414093205PM.png', 1, 3, 1, '2021-04-14 21:32:05', NULL, NULL, NULL, NULL),
(4, 'edite-159539754820210414093222PM.png', 'App\\Models\\Event', 3, 'http://backend.edite.loc/uploads/events/3/edite-159539754820210414093222PM.png', 1, 4, 1, '2021-04-14 21:32:22', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `group_id` int NOT NULL,
  `gender` int DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `brief` text,
  `show_details` int NOT NULL,
  `session_time` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `lang` int NOT NULL COMMENT '0 == Arabic',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `status` int NOT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  `show_images` int NOT NULL DEFAULT '1',
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_ar`, `name_en`, `username`, `code`, `email`, `password`, `remember_token`, `group_id`, `gender`, `address`, `phone`, `brief`, `show_details`, `session_time`, `image`, `lang`, `facebook`, `twitter`, `youtube`, `snapchat`, `instagram`, `status`, `is_active`, `show_images`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(1, 'المشرف العام', 'Administrator', 'admin', NULL, 'admin@admin.com', '$2y$10$rBEzl6SkbcqWSCVkfj5TzuNILCUZ6ymHTJFf7gNiNZNn5v.aFfhrG', 'dlSvpXTgH422sHOxopaCorRwfCd6TJaUkSCBvM5362lcPBgkdwHDOd9yNtnG', 1, NULL, 'menofia44', '44123123', NULL, 0, 15, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 1, 1, '2021-01-14 12:47:01', 1, '2021-01-14 12:47:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_cards`
--

CREATE TABLE `user_cards` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `deliver_no` int DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `membership_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int NOT NULL,
  `sort` int NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cards`
--

INSERT INTO `user_cards` (`id`, `order_id`, `deliver_no`, `code`, `membership_id`, `start_date`, `end_date`, `status`, `sort`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_by`, `deleted_at`) VALUES
(108, 1, 123123, '1001', 4, '2021-04-17', '2022-04-17', 1, 2, 1, '2021-04-17 12:42:06', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE `variables` (
  `id` int NOT NULL,
  `var_key` varchar(255) NOT NULL,
  `var_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `type` int NOT NULL COMMENT '1 == General Settings || 2 == Panel Settings',
  `var_type` int NOT NULL COMMENT '0=Input | 1=textarea | 2=tag | 3=video | 4=image',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`id`, `var_key`, `var_value`, `type`, `var_type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'العنوان عربي', 'الجمعية العربية السعودية للثقافة والفنون', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(2, 'الكلمات الدليلية عربي ', '[{\"value\":\"الجمعية العربية السعودية للثقافة والفنون\"}]', 1, 2, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(3, 'الوصف عربي', 'الجمعية العربية السعودية للثقافة والفنون', 1, 1, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(4, 'البريد الإلكتروني(الإدارة):', '123@123.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(5, 'البريد الإلكتروني(للرسائل):', '123@123.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(6, 'رقم الهاتف:', '1234567890', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(7, 'رقم الواتس اب:', '1234567890', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(8, 'العنوان:', 'برج المستقبل الصحافة، الرياض 13321 6245،المملكة العربية السعودية', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(9, 'latitude:', '24.774265', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(10, 'longitude:', '46.738586', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(11, 'رابط الاندرويد:', 'https://play.google.com/store', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(12, 'رابط ال ios:', 'https://www.apple.com/shop', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(13, 'رابط الفيس بوك:', 'https://www.facebook.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(14, 'رابط السناب شات:', 'https://www.snapchat.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(15, 'رابط تويتر:', 'https://twitter.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(16, 'رابط يوتيوب:', 'https://www.youtube.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(17, 'رابط انستجرام:', 'https://www.instagram.com', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(18, 'الفيديو التعريفى:', NULL, 1, 3, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(19, 'SECRET_KEY', '19e7fb209e82d8889b3e5ff1af8a8b63', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(20, 'وقت قفل الشاشه:', '500', 2, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(21, 'مدة الحظر:', '15', 2, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(22, 'الصورة الافتراضية للمشرفين:', 'http://backend.edite.loc/uploads/variables/22/enggate-102584387320210414054317PM.png', 2, 4, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL),
(25, 'PUBLISH_KEY', 'pk_test_vm1NmySCaEqsNVqbPGNk5to9CLvwBAVVcefXdiwT', 1, 0, '2021-01-02 21:31:43', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_actions`
--

CREATE TABLE `web_actions` (
  `id` int NOT NULL,
  `type` int NOT NULL COMMENT '1 = Insert || 2 = Edit || 3 = Delete || 4 = FastEdit',
  `module_name` varchar(255) NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_actions`
--

INSERT INTO `web_actions` (`id`, `type`, `module_name`, `created_by`, `created_at`) VALUES
(1, 2, 'Variable', 1, '2021-04-14 17:41:31'),
(2, 2, 'Variable', 1, '2021-04-14 17:43:19'),
(3, 2, 'Variable', 1, '2021-04-14 17:45:31'),
(4, 1, 'Page', 1, '2021-04-14 17:54:16'),
(5, 2, 'ContactUs', 1, '2021-04-14 21:04:05'),
(6, 1, 'Event', 1, '2021-04-14 21:21:47'),
(7, 1, 'Event', 1, '2021-04-14 21:23:16'),
(8, 1, 'Event', 1, '2021-04-14 21:24:39'),
(9, 1, 'Event', 1, '2021-04-14 21:30:52'),
(10, 1, 'Event', 1, '2021-04-14 21:31:49'),
(11, 1, 'Event', 1, '2021-04-14 21:32:06'),
(12, 1, 'Event', 1, '2021-04-14 21:32:25'),
(13, 1, 'Condition', 1, '2021-04-14 22:16:34'),
(14, 1, 'Condition', 1, '2021-04-14 22:16:43'),
(15, 1, 'Condition', 1, '2021-04-14 22:16:52'),
(16, 1, 'Condition', 1, '2021-04-14 22:17:01'),
(17, 1, 'Condition', 1, '2021-04-14 22:17:09'),
(18, 1, 'Condition', 1, '2021-04-14 22:17:17'),
(19, 1, 'Condition', 1, '2021-04-14 22:17:25'),
(20, 1, 'Condition', 1, '2021-04-14 22:17:33'),
(21, 1, 'Feature', 1, '2021-04-14 22:17:59'),
(22, 1, 'Feature', 1, '2021-04-14 22:18:07'),
(23, 1, 'Feature', 1, '2021-04-14 22:18:17'),
(24, 1, 'Feature', 1, '2021-04-14 22:18:25'),
(25, 1, 'Feature', 1, '2021-04-14 22:18:34'),
(26, 1, 'Feature', 1, '2021-04-14 22:18:43'),
(27, 1, 'Feature', 1, '2021-04-14 22:18:51'),
(28, 1, 'Feature', 1, '2021-04-14 22:18:58'),
(29, 1, 'Membership', 1, '2021-04-14 22:22:32'),
(30, 1, 'Membership', 1, '2021-04-14 22:29:07'),
(31, 1, 'Membership', 1, '2021-04-14 22:29:25'),
(32, 1, 'Membership', 1, '2021-04-14 22:29:42'),
(33, 1, 'Field', 1, '2021-04-15 18:11:16'),
(34, 1, 'Field', 1, '2021-04-15 18:11:24'),
(35, 2, 'Order', 1, '2021-04-15 19:39:23'),
(36, 4, 'Order', 1, '2021-04-15 20:06:18'),
(37, 2, 'Order', 2, '2021-04-15 22:04:51'),
(38, 2, 'Order', 2, '2021-04-15 22:04:55'),
(39, 2, 'Order', 2, '2021-04-15 22:05:02'),
(40, 2, 'Order', 1, '2021-04-17 11:11:54'),
(41, 2, 'Order', 1, '2021-04-17 11:18:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_conditions`
--
ALTER TABLE `membership_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_features`
--
ALTER TABLE `membership_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cards`
--
ALTER TABLE `user_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_actions`
--
ALTER TABLE `web_actions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocked_users`
--
ALTER TABLE `blocked_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `membership_conditions`
--
ALTER TABLE `membership_conditions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `membership_features`
--
ALTER TABLE `membership_features`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_cards`
--
ALTER TABLE `user_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `web_actions`
--
ALTER TABLE `web_actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
