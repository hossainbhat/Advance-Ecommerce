-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advance_ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'superadmin', '01838322523', 'admin@gmail.com', NULL, '$2y$10$Zgo0Y4aLlDEZ9/Qi48E86uDoJSSCq4iNlWtten1QoxAv0V7CM7bES', '70922.jpg', 'Nikunja-2, Khilkhet, Dhaka', 1, NULL, NULL, '2022-06-10 09:39:47'),
(2, 'hossain', 'admin', '59709', 'hossain@yopmail.com', NULL, '$2y$10$QvW0ZpcI4s7cmv.Gr9H5qO2bW9X2QZ3hJe3FcIx8/Q.U0DfddC/8S', '', '', 1, NULL, NULL, '2022-06-12 17:58:30'),
(4, 'En', 'admin', '01838322537', 'en@gmail.com', NULL, '$2y$10$yJ.u/CeplN/iWjjFYOZQCO/kVJTLyf.6YIM1V2iCsCl8mc.Ik5Aje', NULL, NULL, 0, NULL, '2022-06-13 04:54:22', '2022-06-13 04:54:22'),
(5, 'Boni', 'subadmin', '04238480204', 'boni@gmail.com', NULL, '$2y$10$Zgo0Y4aLlDEZ9/Qi48E86uDoJSSCq4iNlWtten1QoxAv0V7CM7bES', '73193.png', NULL, 1, NULL, '2022-06-13 05:07:47', '2022-06-13 06:08:37'),
(6, 'Md Hossain Bhat', 'admin', '01716519089', 'hossainbhat@gmail.com', NULL, '$2y$10$vxDNmexG280IptQGi02IluDPMuaWucn1Y/XdxD/Q.GzyAaTDRCALe', NULL, NULL, 0, NULL, '2022-06-13 17:37:03', '2022-06-13 17:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `admins_roles`
--

CREATE TABLE `admins_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_access` tinyint(4) NOT NULL,
  `edit_access` tinyint(4) DEFAULT NULL,
  `full_access` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_roles`
--

INSERT INTO `admins_roles` (`id`, `admin_id`, `module`, `view_access`, `edit_access`, `full_access`, `created_at`, `updated_at`) VALUES
(29, 4, 'section', 1, 1, 1, NULL, NULL),
(30, 4, 'brand', 1, 1, 1, NULL, NULL),
(31, 4, 'category', 1, 1, 1, NULL, NULL),
(32, 4, 'product', 1, 1, 1, NULL, NULL),
(33, 4, 'banner', 1, 1, 1, NULL, NULL),
(34, 4, 'coupon', 1, 1, 1, NULL, NULL),
(35, 4, 'rating', 1, 0, 1, NULL, NULL),
(36, 4, 'cms', 1, 1, 1, NULL, NULL),
(37, 4, 'shiping', 1, 0, 1, NULL, NULL),
(38, 4, 'order', 1, 0, 1, NULL, NULL),
(39, 4, 'user', 1, 0, 1, NULL, NULL),
(40, 4, 'role', 1, 1, 1, NULL, NULL),
(111, 2, 'section', 1, 1, 1, NULL, NULL),
(112, 2, 'brand', 1, 1, 1, NULL, NULL),
(113, 2, 'category', 1, 1, 1, NULL, NULL),
(114, 2, 'product', 1, 1, 1, NULL, NULL),
(115, 2, 'banner', 1, 1, 1, NULL, NULL),
(116, 2, 'coupon', 1, 1, 1, NULL, NULL),
(117, 2, 'rating', 1, 0, 1, NULL, NULL),
(118, 2, 'cms', 1, 1, 1, NULL, NULL),
(119, 2, 'shiping', 1, 0, 1, NULL, NULL),
(120, 2, 'order', 1, 0, 1, NULL, NULL),
(121, 2, 'user', 1, 0, 1, NULL, NULL),
(122, 2, 'role', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, '10376.png', 'http://localhost:8000/custom-tailors', 'Black Jacket', 'black jacket', 1, NULL, '2022-06-12 05:19:15'),
(2, '351.png', 'jakaet', 'Black Jacket', 'black jacket', 1, NULL, '2022-03-04 21:18:50'),
(3, '47514.png', 'jakaet3', 'Black Jacket', 'black jacket', 1, NULL, '2022-03-04 21:19:12'),
(4, '79219.png', 'www.facebook.com', 'Web Developer', 'dsdf', 0, '2020-08-24 00:18:21', '2022-06-12 05:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Dorji Bari', 1, '2020-08-05 02:36:38', '2022-06-13 16:21:28'),
(14, 'Easy', 1, '2020-08-05 02:36:53', '2020-09-17 14:35:37'),
(15, 'D-Smart', 1, '2020-10-08 15:02:56', '2020-10-08 15:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(32, 'pW69WzIohBEqPBLyl80cuNPehNnswExVwa9bOVKS', 1, '9', 'Large', 1, '2022-03-15 01:42:25', '2022-03-15 01:45:16'),
(42, 'LTWT27VE8wWj7FF2mDQwREXrM5mjNehwy7ByurfQ', 0, '10', 'Medium', 1, '2022-06-01 01:28:06', '2022-06-01 01:28:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `name`, `image`, `discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'T-Shirt', '15247.jpg', 0.00, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less norma', 't-shirt', 't-shirt', 't-shirt', 't-shirt', 1, '2020-06-26 17:05:26', '2022-06-13 16:21:13'),
(2, 1, 1, 'Easy Shirt', '65715.jpg', 0.00, 't-shirt', 'easy', 't-shirt', 't-shirt', 't-shirt', 0, '2020-06-26 17:06:09', '2022-06-14 07:26:09'),
(3, 1, 1, 'Casual T-Shirt', '29744.jpg', 4.00, 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 1, '2020-06-26 17:07:06', '2020-06-26 17:07:06'),
(4, 0, 2, 'test', '90891.jpg', 0.00, 'test', 'test_url', 'test', 'test', 'test', 1, '2020-08-05 19:01:41', '2020-08-05 19:01:41'),
(5, 4, 2, 'test2', '39848.jpg', 0.00, 'test2', 'test2_url', 'test2', 'test2', 'test2', 1, '2020-08-05 19:05:55', '2020-08-05 19:05:55'),
(6, 0, 3, 'test', '0', 0.00, '', 'test', '', '', '', 1, '2020-08-23 15:36:16', '2020-08-23 15:36:16'),
(7, 0, 3, 'test2', '0', 0.00, '', 'test2', '', '', '', 1, '2020-08-23 15:36:49', '2020-08-23 15:36:49'),
(8, 0, 3, 'test3', '0', 0.00, '', 'test3', '', '', '', 1, '2020-08-23 15:37:23', '2020-08-23 15:37:23'),
(9, 0, 3, 'test4', '0', 0.00, '', 'test4', '', '', '', 1, '2020-08-23 15:37:50', '2020-08-23 15:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `url`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`, `updated_at`) VALUES
(2, 'About Us', '<h3><i><strong>I</strong>n publishing and graphic .</i></h3><p><i>design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. In publishing and graphic</i></p><p>&nbsp;D<strong>esign</strong>, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>', 'about', 'About us', '<p>a placeholder before final copy is available.</p>', 'about, abou_tus', '1', '2022-06-08 17:26:05', '2022-06-10 06:10:29'),
(3, 'Terms & Condition', '<p>terms and condition</p>', 'terms_and_condition', 'terms and condition', '<p>terms and condition</p>', 'terms_and_condition', '1', '2022-06-10 09:31:02', '2022-06-10 09:31:02'),
(4, 'FAQ', '<p>faq</p>', 'faq', 'faq', '<p>faq</p>', 'faq', '1', '2022-06-10 09:31:49', '2022-06-10 09:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'DS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AU', 'Australia', 1),
(14, 'AT', 'Austria', 1),
(15, 'AZ', 'Azerbaijan', 1),
(16, 'BS', 'Bahamas', 1),
(17, 'BH', 'Bahrain', 1),
(18, 'BD', 'Bangladesh', 1),
(19, 'BB', 'Barbados', 1),
(20, 'BY', 'Belarus', 1),
(21, 'BE', 'Belgium', 1),
(22, 'BZ', 'Belize', 1),
(23, 'BJ', 'Benin', 1),
(24, 'BM', 'Bermuda', 1),
(25, 'BT', 'Bhutan', 1),
(26, 'BO', 'Bolivia', 1),
(27, 'BA', 'Bosnia and Herzegovina', 1),
(28, 'BW', 'Botswana', 1),
(29, 'BV', 'Bouvet Island', 1),
(30, 'BR', 'Brazil', 1),
(31, 'IO', 'British Indian Ocean Territory', 1),
(32, 'BN', 'Brunei Darussalam', 1),
(33, 'BG', 'Bulgaria', 1),
(34, 'BF', 'Burkina Faso', 1),
(35, 'BI', 'Burundi', 1),
(36, 'KH', 'Cambodia', 1),
(37, 'CM', 'Cameroon', 1),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 1),
(40, 'KY', 'Cayman Islands', 1),
(41, 'CF', 'Central African Republic', 1),
(42, 'TD', 'Chad', 1),
(43, 'CL', 'Chile', 1),
(44, 'CN', 'China', 1),
(45, 'CX', 'Christmas Island', 1),
(46, 'CC', 'Cocos (Keeling) Islands', 1),
(47, 'CO', 'Colombia', 1),
(48, 'KM', 'Comoros', 1),
(49, 'CD', 'Democratic Republic of the Congo', 1),
(50, 'CG', 'Republic of Congo', 1),
(51, 'CK', 'Cook Islands', 1),
(52, 'CR', 'Costa Rica', 1),
(53, 'HR', 'Croatia (Hrvatska)', 1),
(54, 'CU', 'Cuba', 1),
(55, 'CY', 'Cyprus', 1),
(56, 'CZ', 'Czech Republic', 1),
(57, 'DK', 'Denmark', 1),
(58, 'DJ', 'Djibouti', 1),
(59, 'DM', 'Dominica', 1),
(60, 'DO', 'Dominican Republic', 1),
(61, 'TP', 'East Timor', 1),
(62, 'EC', 'Ecuador', 1),
(63, 'EG', 'Egypt', 1),
(64, 'SV', 'El Salvador', 1),
(65, 'GQ', 'Equatorial Guinea', 1),
(66, 'ER', 'Eritrea', 1),
(67, 'EE', 'Estonia', 1),
(68, 'ET', 'Ethiopia', 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 1),
(70, 'FO', 'Faroe Islands', 1),
(71, 'FJ', 'Fiji', 1),
(72, 'FI', 'Finland', 1),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 1),
(75, 'GF', 'French Guiana', 1),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 1),
(79, 'GM', 'Gambia', 1),
(80, 'GE', 'Georgia', 1),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 1),
(83, 'GI', 'Gibraltar', 1),
(84, 'GK', 'Guernsey', 1),
(85, 'GR', 'Greece', 1),
(86, 'GL', 'Greenland', 1),
(87, 'GD', 'Grenada', 1),
(88, 'GP', 'Guadeloupe', 1),
(89, 'GU', 'Guam', 1),
(90, 'GT', 'Guatemala', 1),
(91, 'GN', 'Guinea', 1),
(92, 'GW', 'Guinea-Bissau', 1),
(93, 'GY', 'Guyana', 1),
(94, 'HT', 'Haiti', 1),
(95, 'HM', 'Heard and Mc Donald Islands', 1),
(96, 'HN', 'Honduras', 1),
(97, 'HK', 'Hong Kong', 1),
(98, 'HU', 'Hungary', 1),
(99, 'IS', 'Iceland', 1),
(100, 'IN', 'India', 1),
(101, 'IM', 'Isle of Man', 1),
(102, 'ID', 'Indonesia', 1),
(103, 'IR', 'Iran (Islamic Republic of)', 1),
(104, 'IQ', 'Iraq', 1),
(105, 'IE', 'Ireland', 1),
(106, 'IL', 'Israel', 1),
(107, 'IT', 'Italy', 1),
(108, 'CI', 'Ivory Coast', 1),
(109, 'JE', 'Jersey', 1),
(110, 'JM', 'Jamaica', 1),
(111, 'JP', 'Japan', 1),
(112, 'JO', 'Jordan', 1),
(113, 'KZ', 'Kazakhstan', 1),
(114, 'KE', 'Kenya', 1),
(115, 'KI', 'Kiribati', 1),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1),
(117, 'KR', 'Korea, Republic of', 1),
(118, 'XK', 'Kosovo', 1),
(119, 'KW', 'Kuwait', 1),
(120, 'KG', 'Kyrgyzstan', 1),
(121, 'LA', 'Lao People\'s Democratic Republic', 1),
(122, 'LV', 'Latvia', 1),
(123, 'LB', 'Lebanon', 1),
(124, 'LS', 'Lesotho', 1),
(125, 'LR', 'Liberia', 1),
(126, 'LY', 'Libyan Arab Jamahiriya', 1),
(127, 'LI', 'Liechtenstein', 1),
(128, 'LT', 'Lithuania', 1),
(129, 'LU', 'Luxembourg', 1),
(130, 'MO', 'Macau', 1),
(131, 'MK', 'North Macedonia', 1),
(132, 'MG', 'Madagascar', 1),
(133, 'MW', 'Malawi', 1),
(134, 'MY', 'Malaysia', 1),
(135, 'MV', 'Maldives', 1),
(136, 'ML', 'Mali', 1),
(137, 'MT', 'Malta', 1),
(138, 'MH', 'Marshall Islands', 1),
(139, 'MQ', 'Martinique', 1),
(140, 'MR', 'Mauritania', 1),
(141, 'MU', 'Mauritius', 1),
(142, 'TY', 'Mayotte', 1),
(143, 'MX', 'Mexico', 1),
(144, 'FM', 'Micronesia, Federated States of', 1),
(145, 'MD', 'Moldova, Republic of', 1),
(146, 'MC', 'Monaco', 1),
(147, 'MN', 'Mongolia', 1),
(148, 'ME', 'Montenegro', 1),
(149, 'MS', 'Montserrat', 1),
(150, 'MA', 'Morocco', 1),
(151, 'MZ', 'Mozambique', 1),
(152, 'MM', 'Myanmar', 1),
(153, 'NA', 'Namibia', 1),
(154, 'NR', 'Nauru', 1),
(155, 'NP', 'Nepal', 1),
(156, 'NL', 'Netherlands', 1),
(157, 'AN', 'Netherlands Antilles', 1),
(158, 'NC', 'New Caledonia', 1),
(159, 'NZ', 'New Zealand', 1),
(160, 'NI', 'Nicaragua', 1),
(161, 'NE', 'Niger', 1),
(162, 'NG', 'Nigeria', 1),
(163, 'NU', 'Niue', 1),
(164, 'NF', 'Norfolk Island', 1),
(165, 'MP', 'Northern Mariana Islands', 1),
(166, 'NO', 'Norway', 1),
(167, 'OM', 'Oman', 1),
(168, 'PK', 'Pakistan', 1),
(169, 'PW', 'Palau', 1),
(170, 'PS', 'Palestine', 1),
(171, 'PA', 'Panama', 1),
(172, 'PG', 'Papua New Guinea', 1),
(173, 'PY', 'Paraguay', 1),
(174, 'PE', 'Peru', 1),
(175, 'PH', 'Philippines', 1),
(176, 'PN', 'Pitcairn', 1),
(177, 'PL', 'Poland', 1),
(178, 'PT', 'Portugal', 1),
(179, 'PR', 'Puerto Rico', 1),
(180, 'QA', 'Qatar', 1),
(181, 'RE', 'Reunion', 1),
(182, 'RO', 'Romania', 1),
(183, 'RU', 'Russian Federation', 1),
(184, 'RW', 'Rwanda', 1),
(185, 'KN', 'Saint Kitts and Nevis', 1),
(186, 'LC', 'Saint Lucia', 1),
(187, 'VC', 'Saint Vincent and the Grenadines', 1),
(188, 'WS', 'Samoa', 1),
(189, 'SM', 'San Marino', 1),
(190, 'ST', 'Sao Tome and Principe', 1),
(191, 'SA', 'Saudi Arabia', 1),
(192, 'SN', 'Senegal', 1),
(193, 'RS', 'Serbia', 1),
(194, 'SC', 'Seychelles', 1),
(195, 'SL', 'Sierra Leone', 1),
(196, 'SG', 'Singapore', 1),
(197, 'SK', 'Slovakia', 1),
(198, 'SI', 'Slovenia', 1),
(199, 'SB', 'Solomon Islands', 1),
(200, 'SO', 'Somalia', 1),
(201, 'ZA', 'South Africa', 1),
(202, 'GS', 'South Georgia South Sandwich Islands', 1),
(203, 'SS', 'South Sudan', 1),
(204, 'ES', 'Spain', 1),
(205, 'LK', 'Sri Lanka', 1),
(206, 'SH', 'St. Helena', 1),
(207, 'PM', 'St. Pierre and Miquelon', 1),
(208, 'SD', 'Sudan', 1),
(209, 'SR', 'Suriname', 1),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1),
(211, 'SZ', 'Swaziland', 1),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 1),
(214, 'SY', 'Syrian Arab Republic', 1),
(215, 'TW', 'Taiwan', 1),
(216, 'TJ', 'Tajikistan', 1),
(217, 'TZ', 'Tanzania, United Republic of', 1),
(218, 'TH', 'Thailand', 1),
(219, 'TG', 'Togo', 1),
(220, 'TK', 'Tokelau', 1),
(221, 'TO', 'Tonga', 1),
(222, 'TT', 'Trinidad and Tobago', 1),
(223, 'TN', 'Tunisia', 1),
(224, 'TR', 'Turkey', 1),
(225, 'TM', 'Turkmenistan', 1),
(226, 'TC', 'Turks and Caicos Islands', 1),
(227, 'TV', 'Tuvalu', 1),
(228, 'UG', 'Uganda', 1),
(229, 'UA', 'Ukraine', 1),
(230, 'AE', 'United Arab Emirates', 1),
(231, 'GB', 'United Kingdom', 1),
(232, 'US', 'United States', 1),
(233, 'UM', 'United States minor outlying islands', 1),
(234, 'UY', 'Uruguay', 1),
(235, 'UZ', 'Uzbekistan', 1),
(236, 'VU', 'Vanuatu', 1),
(237, 'VA', 'Vatican City State', 1),
(238, 'VE', 'Venezuela', 1),
(239, 'VN', 'Vietnam', 1),
(240, 'VG', 'Virgin Islands (British)', 1),
(241, 'VI', 'Virgin Islands (U.S.)', 1),
(242, 'WF', 'Wallis and Futuna Islands', 1),
(243, 'EH', 'Western Sahara', 1),
(244, 'YE', 'Yemen', 1),
(245, 'ZM', 'Zambia', 1),
(246, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'test', '1,2,3', '', 'Multiple Time', 'Percentage', 5.00, '2022-06-15', 1, '2022-05-25 23:23:55', '2022-06-14 03:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `custom_tailors`
--

CREATE TABLE `custom_tailors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'kamal khan', 'H#13,R#7,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1258', '01838322523', 1, '2022-05-25 23:24:52', '2022-05-25 23:24:52'),
(2, 6, 'Md Hossain Bhat', 'H#1,R#19,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1257', '04238480204', 1, '2022-05-26 10:00:53', '2022-05-26 10:00:53'),
(3, 12, 'kamal', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-01 02:25:34', '2022-06-07 02:29:44'),
(4, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-06 09:10:24', '2022-06-06 09:10:24'),
(5, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-06 09:10:39', '2022-06-06 09:10:39'),
(6, 12, 'Roja Khanom', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Albania', '1228', '089457489', 1, '2022-06-07 02:30:27', '2022-06-07 02:30:27'),
(7, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 1, '2022-06-14 03:44:06', '2022-06-14 03:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_21_041321_create_admins_table', 1),
(6, '2021_10_09_130546_create_sections_table', 1),
(7, '2021_10_10_015436_create_brands_table', 1),
(8, '2021_10_10_041531_create_categories_table', 1),
(9, '2021_10_11_032207_create_products_table', 1),
(10, '2021_10_12_005616_create_banners_table', 1),
(11, '2021_10_12_093240_create_products_attributes_table', 1),
(12, '2021_10_12_093308_create_products_images_table', 1),
(13, '2021_10_14_040311_create_carts_table', 1),
(16, '2022_01_13_052241_add_columns_to_users', 2),
(17, '2022_03_08_180930_create_coupons_table', 3),
(18, '2022_05_23_164337_create_delivery_addresses_table', 3),
(19, '2022_05_26_075520_create_orders_table', 4),
(20, '2022_05_26_080158_create_orders_products_table', 5),
(21, '2022_05_31_062802_create_order_statuses_table', 6),
(22, '2022_06_05_090854_create_orders_logs_table', 7),
(23, '2022_06_05_095109_update_orders_table', 8),
(25, '2022_06_07_053602_create_shipping_charges_table', 9),
(26, '2022_06_08_221227_create_cms_pages_table', 10),
(27, '2022_06_09_122817_create_wishlists_table', 11),
(28, '2022_06_10_230835_create_site_settings_table', 12),
(29, '2022_06_11_114408_create_ratings_table', 12),
(30, '2022_06_12_111045_create_custom_tailors_table', 13),
(31, '2022_06_13_121711_create_admins_roles_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` double NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double(8,2) DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_getwaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `courier_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `traking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `shipping_charge`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `payment_getwaya`, `grand_total`, `courier_name`, `traking_number`, `created_at`, `updated_at`) VALUES
(1, 6, 'Md Hossain Bhat', 'H#1,R#19,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1257', '04238480204', 'roja100@yopmail.com', 0, 'test', 52.00, 'Shipped', 'COD', 'COD', 988.00, 'Apex', '95534755', '2022-05-26 10:01:09', '2022-06-05 11:46:47'),
(2, 6, 'kamal khan', 'H#13,R#7,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1258', '01838322523', 'roja100@yopmail.com', 0, 'test', 52.00, 'Shipped', 'COD', 'COD', 280.50, 'Apex', '50534724', '2022-05-26 10:04:29', '2022-06-05 11:55:24'),
(3, 6, 'kamal khan', 'H#13,R#7,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1258', '01838322523', 'roja100@yopmail.com', 0, 'test', 38.00, 'New', 'COD', 'COD', 712.00, '', '', '2022-05-30 01:36:20', '2022-05-30 01:36:20'),
(4, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, 'test', 49.00, 'New', 'COD', 'COD', 922.20, '', '', '2022-06-01 02:26:11', '2022-06-02 01:53:18'),
(5, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'New', 'COD', 'COD', 640.00, '', '', '2022-06-02 22:38:15', '2022-06-02 22:38:15'),
(6, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'New', 'COD', 'COD', 640.00, '', '', '2022-06-02 23:32:14', '2022-06-02 23:32:14'),
(7, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'New', 'COD', 'COD', 540.00, '', '', '2022-06-02 23:36:15', '2022-06-02 23:36:15'),
(8, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'New', 'COD', 'COD', 997.50, '', '', '2022-06-02 23:39:36', '2022-06-02 23:39:36'),
(9, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'New', 'COD', 'COD', 540.00, '', '', '2022-06-02 23:45:23', '2022-06-02 23:45:23'),
(10, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, NULL, NULL, 'Shipped', 'COD', 'COD', 665.00, 'Apex', '95534724', '2022-06-02 23:47:26', '2022-06-06 09:15:00'),
(11, 6, 'kamal khan', 'H#13,R#7,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1258', '01838322523', 'roja100@yopmail.com', 0, 'test', 17.00, 'Delivered', 'COD', 'COD', 319.00, 'Apex', '95534724', '2022-06-04 03:27:25', '2022-06-05 11:45:57'),
(12, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'bishal@yopmail.com', 0, 'test', 46.00, 'Shipped', 'COD', 'COD', 866.00, 'Apex', '95534755', '2022-06-06 09:11:57', '2022-06-06 09:21:26'),
(13, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 0, 'test', 18.00, 'New', 'COD', 'COD', 342.00, NULL, NULL, '2022-06-06 23:20:14', '2022-06-06 23:20:14'),
(14, 12, 'Roja Khanom', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Albania', '1228', '089457489', 'demotest@yopmail.com', 500, 'test', 15.00, 'New', 'COD', 'COD', 804.00, NULL, NULL, '2022-06-07 04:38:50', '2022-06-07 04:38:50'),
(15, 12, 'kamal', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 100, 'test', 27.00, 'New', 'COD', 'COD', 640.00, NULL, NULL, '2022-06-07 04:39:46', '2022-06-07 04:39:46'),
(16, 12, 'Roja Khanom', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Albania', '1228', '089457489', 'demotest@yopmail.com', 500, 'test', 61.00, 'New', 'COD', 'COD', 1728.80, NULL, NULL, '2022-06-07 04:41:00', '2022-06-07 04:41:00'),
(17, 12, 'kamal', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 100, 'test', 36.00, 'New', 'COD', 'COD', 784.00, NULL, NULL, '2022-06-07 04:45:37', '2022-06-07 04:45:37'),
(18, 12, 'kamal', 'H#13,R#7,Nikunja-2', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'demotest@yopmail.com', 100, 'test', 15.00, 'Shipped', 'COD', 'COD', 389.00, 'Apex', '95534755', '2022-06-07 04:46:39', '2022-06-07 04:49:42'),
(19, 6, 'Md Hossain Bhat', 'H#1,R#19,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1257', '04238480204', 'roja100@yopmail.com', 200, NULL, NULL, 'New', 'COD', 'COD', 920.00, NULL, NULL, '2022-06-07 13:18:45', '2022-06-07 13:18:45'),
(20, 6, 'Md Hossain Bhat', 'H#1,R#19,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1257', '04238480204', 'roja100@yopmail.com', 300, 'test', 46.00, 'New', 'COD', 'COD', 1166.00, NULL, NULL, '2022-06-07 13:19:52', '2022-06-07 13:19:52'),
(21, 6, 'kamal khan', 'H#13,R#7,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1258', '01838322523', 'roja100@yopmail.com', 300, NULL, NULL, 'New', 'COD', 'COD', 1962.50, NULL, NULL, '2022-06-07 23:35:34', '2022-06-07 23:35:34'),
(22, 6, 'Md Hossain Bhat', 'H#1,R#19,Nikunja-2', 'dhaka', 'khilkhet', 'Bangladesh', '1257', '04238480204', 'roja100@yopmail.com', 200, NULL, NULL, 'New', 'COD', 'COD', 560.00, NULL, NULL, '2022-06-10 09:12:26', '2022-06-10 09:12:26'),
(23, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 'abdulahad@yopmail.com', 200, 'test', 36.00, 'New', 'COD', 'COD', 884.00, NULL, NULL, '2022-06-14 03:46:12', '2022-06-14 03:46:12'),
(24, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 'abdulahad@yopmail.com', 200, 'test', 57.00, 'New', 'COD', 'COD', 1583.00, NULL, NULL, '2022-06-14 06:15:31', '2022-06-14 06:15:31'),
(25, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 'abdulahad@yopmail.com', 200, NULL, NULL, 'New', 'COD', 'COD', 3080.00, NULL, NULL, '2022-06-14 06:16:59', '2022-06-14 06:16:59'),
(26, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 'abdulahad@yopmail.com', 120, NULL, NULL, 'New', 'COD', 'COD', 1200.00, NULL, NULL, '2022-06-14 08:39:22', '2022-06-14 08:39:22'),
(27, 16, 'Abdul Ahad', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01802911098', 'abdulahad@yopmail.com', 120, 'test', 30.00, 'Delivered', 'COD', 'COD', 698.00, 'Apex', '95534755', '2022-06-14 19:34:08', '2022-06-14 19:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders_logs`
--

CREATE TABLE `orders_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_logs`
--

INSERT INTO `orders_logs` (`id`, `order_id`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 11, 'Hold', '2022-06-05 03:17:46', '2022-06-05 03:17:46'),
(2, 11, 'Cancelled', '2022-06-05 03:28:41', '2022-06-05 03:28:41'),
(3, 11, 'Shipped', '2022-06-05 04:36:39', '2022-06-05 04:36:39'),
(4, 11, 'Delivered', '2022-06-05 11:46:03', '2022-06-05 11:46:03'),
(5, 1, 'Shipped', '2022-06-05 11:46:50', '2022-06-05 11:46:50'),
(6, 2, 'Shipped', '2022-06-05 11:55:28', '2022-06-05 11:55:28'),
(7, 10, 'In Process', '2022-06-06 09:14:00', '2022-06-06 09:14:00'),
(8, 10, 'Shipped', '2022-06-06 09:15:08', '2022-06-06 09:15:08'),
(9, 12, 'In Process', '2022-06-06 09:21:05', '2022-06-06 09:21:05'),
(10, 12, 'Shipped', '2022-06-06 09:21:34', '2022-06-06 09:21:34'),
(11, 18, 'Shipped', '2022-06-07 04:49:52', '2022-06-07 04:49:52'),
(12, 27, 'In Process', '2022-06-14 19:38:27', '2022-06-14 19:38:27'),
(13, 27, 'Shipped', '2022-06-14 19:39:41', '2022-06-14 19:39:41'),
(14, 27, 'Delivered', '2022-06-14 19:40:14', '2022-06-14 19:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_size` varchar(244) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_price`, `product_size`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 2, '2022-05-26 10:01:09', '2022-05-26 10:01:09'),
(2, 1, 6, 9, 'B0021', 'Royal Blue T-Shirt', 'Blue', 320.00, 'Medium', 1, '2022-05-26 10:01:09', '2022-05-26 10:01:09'),
(3, 2, 6, 5, 'BLU202', 'Blue Easy T-Shirt', 'Blue', 332.50, 'Large', 1, '2022-05-26 10:04:29', '2022-05-26 10:04:29'),
(4, 3, 6, 10, 'R001', 'red color', 'red', 250.00, 'Small', 3, '2022-05-30 01:36:20', '2022-05-30 01:36:20'),
(5, 4, 12, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 1, '2022-06-01 02:26:11', '2022-06-01 02:26:11'),
(6, 4, 12, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Medium', 1, '2022-06-01 02:26:11', '2022-06-01 02:26:11'),
(7, 4, 12, 8, 'CT001', 'Casual  t-shirt', 'white', 307.20, 'Medium', 1, '2022-06-01 02:26:11', '2022-06-01 02:26:11'),
(8, 5, 12, 9, 'B0021', 'Royal Blue T-Shirt', 'Blue', 320.00, 'Medium', 2, '2022-06-02 22:38:15', '2022-06-02 22:38:15'),
(9, 6, 12, 9, 'B0021', 'Royal Blue T-Shirt', 'Blue', 320.00, 'Medium', 2, '2022-06-02 23:32:14', '2022-06-02 23:32:14'),
(10, 7, 12, 10, 'R001', 'red color', 'red', 270.00, 'Medium', 2, '2022-06-02 23:36:15', '2022-06-02 23:36:15'),
(11, 8, 12, 7, 'GRN202', 'Green Casual T-Shirt', 'Green', 332.50, 'Medium', 3, '2022-06-02 23:39:36', '2022-06-02 23:39:36'),
(12, 9, 12, 10, 'R001', 'red color', 'red', 270.00, 'Medium', 2, '2022-06-02 23:45:23', '2022-06-02 23:45:23'),
(13, 10, 12, 7, 'GRN202', 'Green Casual T-Shirt', 'Green', 332.50, 'Medium', 2, '2022-06-02 23:47:26', '2022-06-02 23:47:26'),
(14, 11, 6, 8, 'CT001', 'Casual  t-shirt', 'white', 336.00, 'Large', 1, '2022-06-04 03:27:25', '2022-06-04 03:27:25'),
(15, 12, 13, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Large', 3, '2022-06-06 09:11:57', '2022-06-06 09:11:57'),
(16, 13, 12, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 1, '2022-06-06 23:20:14', '2022-06-06 23:20:14'),
(17, 14, 12, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Medium', 1, '2022-06-07 04:38:50', '2022-06-07 04:38:50'),
(18, 15, 12, 10, 'R001', 'red color', 'red', 270.00, 'Medium', 2, '2022-06-07 04:39:46', '2022-06-07 04:39:46'),
(19, 16, 12, 8, 'CT001', 'Casual  t-shirt', 'white', 307.20, 'Medium', 4, '2022-06-07 04:41:00', '2022-06-07 04:41:00'),
(20, 17, 12, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 2, '2022-06-07 04:45:37', '2022-06-07 04:45:37'),
(21, 18, 12, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Large', 1, '2022-06-07 04:46:39', '2022-06-07 04:46:39'),
(22, 19, 6, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 2, '2022-06-07 13:18:45', '2022-06-07 13:18:45'),
(23, 20, 6, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Medium', 3, '2022-06-07 13:19:52', '2022-06-07 13:19:52'),
(24, 21, 6, 5, 'BLU202', 'Blue Easy T-Shirt', 'Blue', 332.50, 'Medium', 5, '2022-06-07 23:35:34', '2022-06-07 23:35:34'),
(25, 22, 6, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 1, '2022-06-10 09:12:26', '2022-06-10 09:12:26'),
(26, 23, 16, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 2, '2022-06-14 03:46:12', '2022-06-14 03:46:12'),
(27, 24, 16, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 4, '2022-06-14 06:15:31', '2022-06-14 06:15:31'),
(28, 25, 16, 4, 'BLK202', 'Black T-Shirt', 'Black', 360.00, 'Medium', 8, '2022-06-14 06:16:59', '2022-06-14 06:16:59'),
(29, 26, 16, 10, 'R001', 'red color', 'red', 270.00, 'Medium', 4, '2022-06-14 08:39:22', '2022-06-14 08:39:22'),
(30, 27, 16, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Medium', 2, '2022-06-14 19:34:08', '2022-06-14 19:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New', 1, NULL, NULL),
(2, 'Panding', 1, NULL, NULL),
(3, 'Hold', 1, NULL, NULL),
(4, 'Cancelled', 1, NULL, NULL),
(5, 'In Process', 1, NULL, NULL),
(6, 'Piad', 1, NULL, NULL),
(7, 'Shipped', 1, NULL, NULL),
(8, 'Delivered', 1, NULL, NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_weight` double(8,2) DEFAULT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `section_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(4, 13, 2, 1, 'Black T-Shirt', 'BLK202', 'Black', 350.00, NULL, 2000.00, NULL, '9991f01930b731deb883107cffebf081.jpg-52212.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Black T-Shirt', 'Cotton', 'Checked', 'Full Sleve', 'Regular', 'Casual', 'Black T-Shirt', 'Black T-Shirt', 'Black, T-Shirt', 'Yes', 1, '2020-07-01 16:04:49', '2022-06-14 06:14:21'),
(5, 13, 2, 1, 'Blue Easy T-Shirt', 'BLU202', 'Blue', 350.00, 5.00, 100.00, NULL, 'front_medium_extended.png-18413.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Blue Easy T-Shirt', 'Polyster', 'Plain', 'Half Slave', 'Regular', 'Formal', 'Blue Easy T-Shirt', 'Blue Easy T-Shirt', 'Blue, Easy-T-Shirt', 'Yes', 1, '2020-07-01 17:15:28', '2022-06-07 12:20:46'),
(6, 15, 3, 1, 'Red Casual T-Shirt', 'RED202', 'Red', 350.00, 5.00, 500.00, NULL, '61a794e179a32-square.jpg-2399.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Red Casual T-Shirt', 'Wool', 'Printed', 'Short Slave', 'Regular', 'Casual', 'Red Casual T-Shirt', 'Red Casual T-Shirt', 'Red, Casual-T-Shirt', 'No', 1, '2020-07-01 21:26:02', '2022-06-07 12:21:06'),
(7, 13, 3, 1, 'Green Casual T-Shirt', 'GRN202', 'Green', 350.00, 5.00, 1000.00, NULL, '1-600-5-600x600.jpg-81790.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Green Casual T-Shirt', 'Polyster', 'Self', 'Sleeveless', 'Regular', 'Casual', 'Green Casual T-Shirt', 'Green Casual T-Shirt', 'Green, Casual-T-Shirt', 'Yes', 1, '2020-07-01 21:47:42', '2022-06-07 12:21:24'),
(8, 13, 3, 1, 'Casual  t-shirt', 'CT001', 'white', 1000.00, NULL, NULL, NULL, 'images.jpg-5562.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Cotton', 'Solid', 'Half Slave', 'Slim', 'Casual', NULL, NULL, NULL, 'No', 1, '2020-07-15 16:15:46', '2022-03-04 21:25:23'),
(9, 13, 2, 1, 'Royal Blue T-Shirt', 'B0021', 'Blue', 200.00, 5.00, 200.00, 'SampleVideo_720x480_2mb.mp4-1293902101.mp4', 'download.jpg-91953.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', NULL, 'Cotton', 'Printed', 'Full Sleve', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-04 23:49:49', '2022-06-11 15:10:42'),
(10, 14, 1, 1, 'red color', 'R001', 'red', 250.00, NULL, 250.00, NULL, 'l-t312-cgblwh-new-eyebogler-original-imafzs5hrjgzsfpr.jpeg-14863.jpeg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', NULL, 'Wool', 'Plain', 'Half Slave', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-23 15:52:54', '2022-06-14 08:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Small', 320.00, 10, 'RED202-S', 1, '2020-07-03 16:28:36', '2020-07-15 16:45:41'),
(2, 6, 'Medium', 320.00, 13, 'RED202-M', 1, '2020-07-03 16:28:36', '2022-06-14 19:34:08'),
(3, 6, 'Large', 320.00, 15, 'RED202-L', 1, '2020-07-03 16:28:36', '2020-07-03 16:28:36'),
(4, 3, 'Small', 350.00, 15, 'ORG202-S', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(5, 3, 'Medium', 350.00, 15, 'ORG202-M', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(6, 3, 'Large', 350.00, 10, 'ORG202-L', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(7, 4, 'Small', 350.00, 0, 'BLK202-S', 1, '2020-07-07 05:05:24', '2022-06-14 07:07:05'),
(8, 4, 'Medium', 360.00, 2, 'BLK202-M', 0, '2020-07-07 05:05:24', '2022-06-14 07:07:05'),
(9, 4, 'Large', 370.00, 10, 'BLK202-L', 1, '2020-07-07 05:05:24', '2022-06-14 07:07:05'),
(10, 5, 'Small', 350.00, 10, 'BLU202-S', 1, '2020-07-07 05:06:41', '2020-07-07 05:06:41'),
(11, 5, 'Medium', 350.00, 5, 'BLU202-M', 1, '2020-07-07 05:06:41', '2022-06-07 23:35:34'),
(12, 5, 'Large', 350.00, 10, 'BLU202-L', 1, '2020-07-07 05:06:41', '2020-07-07 05:06:41'),
(13, 7, 'Small', 350.00, 15, 'GRN202-S', 1, '2020-07-07 05:08:08', '2020-07-12 17:04:58'),
(14, 7, 'Medium', 350.00, 15, 'GRN202-M', 1, '2020-07-07 05:08:08', '2020-07-07 07:20:53'),
(15, 7, 'Large', 350.00, 10, 'GRN202-L', 1, '2020-07-07 05:08:08', '2020-07-07 07:20:54'),
(16, 10, 'Small', 250.00, 8, 'R001-s', 1, '2020-10-28 01:33:53', '2020-10-28 01:33:53'),
(17, 10, 'Medium', 270.00, 8, 'R001-m', 1, '2020-10-28 01:33:53', '2022-06-14 08:39:22'),
(18, 10, 'Large', 300.00, 10, 'R001-l', 1, '2020-10-28 01:33:53', '2020-10-28 01:33:53'),
(19, 9, 'Small', 300.00, 5, 'B0021-s', 1, '2020-10-28 01:35:21', '2020-10-28 01:35:26'),
(20, 9, 'Medium', 320.00, 6, 'B0021-m', 1, '2020-10-28 01:35:21', '2020-10-28 01:35:26'),
(21, 9, 'Large', 330.00, 4, 'B0021-l', 1, '2020-10-28 01:35:21', '2020-10-28 01:35:26'),
(22, 8, 'Small', 300.00, 10, 'CT001-s', 1, '2020-10-28 01:37:20', '2020-10-28 01:37:20'),
(23, 8, 'Medium', 320.00, 13, 'CT001-m', 1, '2020-10-28 01:37:20', '2020-10-28 01:37:20'),
(24, 8, 'Large', 350.00, 5, 'CT001-l', 1, '2020-10-28 01:37:20', '2020-10-28 01:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, '542231594924865.jpg', 1, '2020-07-16 06:41:05', '2020-08-04 07:20:53'),
(12, 8, '111161653996269.jpg', 1, '2022-05-31 05:24:29', '2022-05-31 05:24:29'),
(13, 4, '913851654091401.jpg', 1, '2022-06-01 07:50:01', '2022-06-01 07:50:01'),
(14, 9, '208431654527827.jpg', 1, '2022-06-06 09:03:48', '2022-06-06 09:03:48'),
(15, 4, '668861655234689.png', 1, '2022-06-14 19:24:49', '2022-06-14 19:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `review`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(5, 6, 8, 'This Product and Quality is Very Good', 5, 1, '2022-06-11 09:09:16', '2022-06-11 09:12:34'),
(6, 13, 8, 'Not So Bad', 4, 1, '2022-06-11 09:37:24', '2022-06-11 09:37:42'),
(7, 16, 9, 'tghy', 5, 1, '2022-06-14 19:41:22', '2022-06-14 19:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mean', 1, NULL, '2022-06-13 16:21:21'),
(2, 'Women', 1, NULL, '2020-08-05 19:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `0_500g` double(8,2) NOT NULL,
  `501g_1000g` double(8,2) NOT NULL,
  `1001g_2000g` double(8,2) NOT NULL,
  `2001g_3000g` double(8,2) NOT NULL,
  `3001g_4000g` double(8,2) NOT NULL,
  `above_5000g` double(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `0_500g`, `501g_1000g`, `1001g_2000g`, `2001g_3000g`, `3001g_4000g`, `above_5000g`, `status`, `created_at`, `updated_at`) VALUES
(1, 'country', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 0, '0000-00-00 00:00:00', '2022-06-07 11:25:54'),
(2, 'Algeria', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-08 18:00:00', '2022-06-10 09:38:48'),
(3, 'American Samoa', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-09 18:00:00', '2022-06-09 18:00:00'),
(4, 'Andorra', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-10 18:00:00', '2022-06-10 18:00:00'),
(5, 'Angola', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-11 18:00:00', '2022-06-11 18:00:00'),
(6, 'Anguilla', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-12 18:00:00', '2022-06-12 18:00:00'),
(7, 'Antarctica', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-13 18:00:00', '2022-06-13 18:00:00'),
(8, 'Antigua and Barbuda', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-14 18:00:00', '2022-06-14 18:00:00'),
(9, 'Argentina', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-15 18:00:00', '2022-06-15 18:00:00'),
(10, 'Armenia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-16 18:00:00', '2022-06-16 18:00:00'),
(11, 'Aruba', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-17 18:00:00', '2022-06-17 18:00:00'),
(12, 'Australia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-18 18:00:00', '2022-06-18 18:00:00'),
(13, 'Austria', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-19 18:00:00', '2022-06-19 18:00:00'),
(14, 'Azerbaijan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-20 18:00:00', '2022-06-20 18:00:00'),
(15, 'Bahamas', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-21 18:00:00', '2022-06-21 18:00:00'),
(16, 'Bahrain', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-22 18:00:00', '2022-06-22 18:00:00'),
(17, 'Bangladesh', 45.00, 100.00, 120.00, 200.00, 220.00, 250.00, 1, '2022-06-23 18:00:00', '2022-06-14 08:35:47'),
(18, 'Barbados', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-24 18:00:00', '2022-06-24 18:00:00'),
(19, 'Belarus', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-25 18:00:00', '2022-06-25 18:00:00'),
(20, 'Belgium', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-26 18:00:00', '2022-06-26 18:00:00'),
(21, 'Belize', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-27 18:00:00', '2022-06-27 18:00:00'),
(22, 'Benin', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-28 18:00:00', '2022-06-28 18:00:00'),
(23, 'Bermuda', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-29 18:00:00', '2022-06-29 18:00:00'),
(24, 'Bhutan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-06-30 18:00:00', '2022-06-30 18:00:00'),
(25, 'Bolivia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-01 18:00:00', '2022-07-01 18:00:00'),
(26, 'Bosnia and Herzegovina', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-02 18:00:00', '2022-07-02 18:00:00'),
(27, 'Botswana', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-03 18:00:00', '2022-07-03 18:00:00'),
(28, 'Bouvet Island', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-04 18:00:00', '2022-07-04 18:00:00'),
(29, 'Brazil', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-05 18:00:00', '2022-07-05 18:00:00'),
(30, 'British Indian Ocean Territory', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-06 18:00:00', '2022-07-06 18:00:00'),
(31, 'Brunei Darussalam', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-07 18:00:00', '2022-07-07 18:00:00'),
(32, 'Bulgaria', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-08 18:00:00', '2022-07-08 18:00:00'),
(33, 'Burkina Faso', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-09 18:00:00', '2022-07-09 18:00:00'),
(34, 'Burundi', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-10 18:00:00', '2022-07-10 18:00:00'),
(35, 'Cambodia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-11 18:00:00', '2022-07-11 18:00:00'),
(36, 'Cameroon', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-12 18:00:00', '2022-07-12 18:00:00'),
(37, 'Canada', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-13 18:00:00', '2022-07-13 18:00:00'),
(38, 'Cape Verde', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-14 18:00:00', '2022-07-14 18:00:00'),
(39, 'Cayman Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-15 18:00:00', '2022-07-15 18:00:00'),
(40, 'Central African Republic', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-16 18:00:00', '2022-07-16 18:00:00'),
(41, 'Chad', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-17 18:00:00', '2022-07-17 18:00:00'),
(42, 'Chile', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-18 18:00:00', '2022-07-18 18:00:00'),
(43, 'China', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-19 18:00:00', '2022-07-19 18:00:00'),
(44, 'Christmas Island', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-20 18:00:00', '2022-07-20 18:00:00'),
(45, 'Cocos (Keeling) Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-21 18:00:00', '2022-07-21 18:00:00'),
(46, 'Colombia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-22 18:00:00', '2022-07-22 18:00:00'),
(47, 'Comoros', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-23 18:00:00', '2022-07-23 18:00:00'),
(48, 'Democratic Republic of the Congo', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-24 18:00:00', '2022-07-24 18:00:00'),
(49, 'Republic of Congo', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-25 18:00:00', '2022-07-25 18:00:00'),
(50, 'Cook Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-26 18:00:00', '2022-07-26 18:00:00'),
(51, 'Costa Rica', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-27 18:00:00', '2022-07-27 18:00:00'),
(52, 'Croatia (Hrvatska)', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-28 18:00:00', '2022-07-28 18:00:00'),
(53, 'Cuba', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-29 18:00:00', '2022-07-29 18:00:00'),
(54, 'Cyprus', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-30 18:00:00', '2022-07-30 18:00:00'),
(55, 'Czech Republic', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-07-31 18:00:00', '2022-07-31 18:00:00'),
(56, 'Denmark', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-01 18:00:00', '2022-08-01 18:00:00'),
(57, 'Djibouti', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-02 18:00:00', '2022-08-02 18:00:00'),
(58, 'Dominica', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-03 18:00:00', '2022-08-03 18:00:00'),
(59, 'Dominican Republic', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-04 18:00:00', '2022-08-04 18:00:00'),
(60, 'East Timor', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-05 18:00:00', '2022-08-05 18:00:00'),
(61, 'Ecuador', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-06 18:00:00', '2022-08-06 18:00:00'),
(62, 'Egypt', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-07 18:00:00', '2022-08-07 18:00:00'),
(63, 'El Salvador', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-08 18:00:00', '2022-08-08 18:00:00'),
(64, 'Equatorial Guinea', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-09 18:00:00', '2022-08-09 18:00:00'),
(65, 'Eritrea', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-10 18:00:00', '2022-08-10 18:00:00'),
(66, 'Estonia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-11 18:00:00', '2022-08-11 18:00:00'),
(67, 'Ethiopia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-12 18:00:00', '2022-08-12 18:00:00'),
(68, 'Falkland Islands (Malvinas)', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-13 18:00:00', '2022-08-13 18:00:00'),
(69, 'Faroe Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-14 18:00:00', '2022-08-14 18:00:00'),
(70, 'Fiji', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-15 18:00:00', '2022-08-15 18:00:00'),
(71, 'Finland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-16 18:00:00', '2022-08-16 18:00:00'),
(72, 'France', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-17 18:00:00', '2022-08-17 18:00:00'),
(73, 'France, Metropolitan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-18 18:00:00', '2022-08-18 18:00:00'),
(74, 'French Guiana', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-19 18:00:00', '2022-08-19 18:00:00'),
(75, 'French Polynesia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-20 18:00:00', '2022-08-20 18:00:00'),
(76, 'French Southern Territories', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-21 18:00:00', '2022-08-21 18:00:00'),
(77, 'Gabon', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-22 18:00:00', '2022-08-22 18:00:00'),
(78, 'Gambia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-23 18:00:00', '2022-08-23 18:00:00'),
(79, 'Georgia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-24 18:00:00', '2022-08-24 18:00:00'),
(80, 'Germany', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-25 18:00:00', '2022-08-25 18:00:00'),
(81, 'Ghana', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-26 18:00:00', '2022-08-26 18:00:00'),
(82, 'Gibraltar', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-27 18:00:00', '2022-08-27 18:00:00'),
(83, 'Guernsey', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-28 18:00:00', '2022-08-28 18:00:00'),
(84, 'Greece', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-29 18:00:00', '2022-08-29 18:00:00'),
(85, 'Greenland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-30 18:00:00', '2022-08-30 18:00:00'),
(86, 'Grenada', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-08-31 18:00:00', '2022-08-31 18:00:00'),
(87, 'Guadeloupe', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-01 18:00:00', '2022-09-01 18:00:00'),
(88, 'Guam', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-02 18:00:00', '2022-09-02 18:00:00'),
(89, 'Guatemala', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-03 18:00:00', '2022-09-03 18:00:00'),
(90, 'Guinea', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-04 18:00:00', '2022-09-04 18:00:00'),
(91, 'Guinea-Bissau', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-05 18:00:00', '2022-09-05 18:00:00'),
(92, 'Guyana', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-06 18:00:00', '2022-09-06 18:00:00'),
(93, 'Haiti', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-07 18:00:00', '2022-09-07 18:00:00'),
(94, 'Heard and Mc Donald Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-08 18:00:00', '2022-09-08 18:00:00'),
(95, 'Honduras', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-09 18:00:00', '2022-09-09 18:00:00'),
(96, 'Hong Kong', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-10 18:00:00', '2022-09-10 18:00:00'),
(97, 'Hungary', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-11 18:00:00', '2022-09-11 18:00:00'),
(98, 'Iceland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-12 18:00:00', '2022-09-12 18:00:00'),
(99, 'India', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-13 18:00:00', '2022-09-13 18:00:00'),
(100, 'Isle of Man', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-14 18:00:00', '2022-09-14 18:00:00'),
(101, 'Indonesia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-15 18:00:00', '2022-09-15 18:00:00'),
(102, 'Iran (Islamic Republic of)', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-16 18:00:00', '2022-09-16 18:00:00'),
(103, 'Iraq', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-17 18:00:00', '2022-09-17 18:00:00'),
(104, 'Ireland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-18 18:00:00', '2022-09-18 18:00:00'),
(105, 'Israel', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-19 18:00:00', '2022-09-19 18:00:00'),
(106, 'Italy', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-20 18:00:00', '2022-09-20 18:00:00'),
(107, 'Ivory Coast', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-21 18:00:00', '2022-09-21 18:00:00'),
(108, 'Jersey', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-22 18:00:00', '2022-09-22 18:00:00'),
(109, 'Jamaica', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-23 18:00:00', '2022-09-23 18:00:00'),
(110, 'Japan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-24 18:00:00', '2022-09-24 18:00:00'),
(111, 'Jordan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-25 18:00:00', '2022-09-25 18:00:00'),
(112, 'Kazakhstan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-26 18:00:00', '2022-09-26 18:00:00'),
(113, 'Kenya', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-27 18:00:00', '2022-09-27 18:00:00'),
(114, 'Kiribati', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-28 18:00:00', '2022-09-28 18:00:00'),
(115, 'Korea, Democratic People\'s Republic of', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-29 18:00:00', '2022-09-29 18:00:00'),
(116, 'Korea, Republic of', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-09-30 18:00:00', '2022-09-30 18:00:00'),
(117, 'Kosovo', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-01 18:00:00', '2022-10-01 18:00:00'),
(118, 'Kuwait', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-02 18:00:00', '2022-10-02 18:00:00'),
(119, 'Kyrgyzstan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-03 18:00:00', '2022-10-03 18:00:00'),
(120, 'Lao People\'s Democratic Republic', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-04 18:00:00', '2022-10-04 18:00:00'),
(121, 'Latvia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-05 18:00:00', '2022-10-05 18:00:00'),
(122, 'Lebanon', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-06 18:00:00', '2022-10-06 18:00:00'),
(123, 'Lesotho', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-07 18:00:00', '2022-10-07 18:00:00'),
(124, 'Liberia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-08 18:00:00', '2022-10-08 18:00:00'),
(125, 'Libyan Arab Jamahiriya', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-09 18:00:00', '2022-10-09 18:00:00'),
(126, 'Liechtenstein', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-10 18:00:00', '2022-10-10 18:00:00'),
(127, 'Lithuania', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-11 18:00:00', '2022-10-11 18:00:00'),
(128, 'Luxembourg', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-12 18:00:00', '2022-10-12 18:00:00'),
(129, 'Macau', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-13 18:00:00', '2022-10-13 18:00:00'),
(130, 'North Macedonia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-14 18:00:00', '2022-10-14 18:00:00'),
(131, 'Madagascar', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-15 18:00:00', '2022-10-15 18:00:00'),
(132, 'Malawi', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-16 18:00:00', '2022-10-16 18:00:00'),
(133, 'Malaysia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-17 18:00:00', '2022-10-17 18:00:00'),
(134, 'Maldives', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-18 18:00:00', '2022-10-18 18:00:00'),
(135, 'Mali', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-19 18:00:00', '2022-10-19 18:00:00'),
(136, 'Malta', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-20 18:00:00', '2022-10-20 18:00:00'),
(137, 'Marshall Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-21 18:00:00', '2022-10-21 18:00:00'),
(138, 'Martinique', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-22 18:00:00', '2022-10-22 18:00:00'),
(139, 'Mauritania', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-23 18:00:00', '2022-10-23 18:00:00'),
(140, 'Mauritius', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-24 18:00:00', '2022-10-24 18:00:00'),
(141, 'Mayotte', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-25 18:00:00', '2022-10-25 18:00:00'),
(142, 'Mexico', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-26 18:00:00', '2022-10-26 18:00:00'),
(143, 'Micronesia, Federated States of', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-27 18:00:00', '2022-10-27 18:00:00'),
(144, 'Moldova, Republic of', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-28 18:00:00', '2022-10-28 18:00:00'),
(145, 'Monaco', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-29 18:00:00', '2022-10-29 18:00:00'),
(146, 'Mongolia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-30 18:00:00', '2022-10-30 18:00:00'),
(147, 'Montenegro', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-10-31 18:00:00', '2022-10-31 18:00:00'),
(148, 'Montserrat', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-01 18:00:00', '2022-11-01 18:00:00'),
(149, 'Morocco', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-02 18:00:00', '2022-11-02 18:00:00'),
(150, 'Mozambique', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-03 18:00:00', '2022-11-03 18:00:00'),
(151, 'Myanmar', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-04 18:00:00', '2022-11-04 18:00:00'),
(152, 'Namibia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-05 18:00:00', '2022-11-05 18:00:00'),
(153, 'Nauru', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-06 18:00:00', '2022-11-06 18:00:00'),
(154, 'Nepal', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-07 18:00:00', '2022-11-07 18:00:00'),
(155, 'Netherlands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-08 18:00:00', '2022-11-08 18:00:00'),
(156, 'Netherlands Antilles', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-09 18:00:00', '2022-11-09 18:00:00'),
(157, 'New Caledonia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-10 18:00:00', '2022-11-10 18:00:00'),
(158, 'New Zealand', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-11 18:00:00', '2022-11-11 18:00:00'),
(159, 'Nicaragua', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-12 18:00:00', '2022-11-12 18:00:00'),
(160, 'Niger', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-13 18:00:00', '2022-11-13 18:00:00'),
(161, 'Nigeria', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-14 18:00:00', '2022-11-14 18:00:00'),
(162, 'Niue', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-15 18:00:00', '2022-11-15 18:00:00'),
(163, 'Norfolk Island', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-16 18:00:00', '2022-11-16 18:00:00'),
(164, 'Northern Mariana Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-17 18:00:00', '2022-11-17 18:00:00'),
(165, 'Norway', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-18 18:00:00', '2022-11-18 18:00:00'),
(166, 'Oman', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-19 18:00:00', '2022-11-19 18:00:00'),
(167, 'Pakistan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-20 18:00:00', '2022-11-20 18:00:00'),
(168, 'Palau', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-21 18:00:00', '2022-11-21 18:00:00'),
(169, 'Palestine', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-22 18:00:00', '2022-11-22 18:00:00'),
(170, 'Panama', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-23 18:00:00', '2022-11-23 18:00:00'),
(171, 'Papua New Guinea', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-24 18:00:00', '2022-11-24 18:00:00'),
(172, 'Paraguay', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-25 18:00:00', '2022-11-25 18:00:00'),
(173, 'Peru', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-26 18:00:00', '2022-11-26 18:00:00'),
(174, 'Philippines', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-27 18:00:00', '2022-11-27 18:00:00'),
(175, 'Pitcairn', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-28 18:00:00', '2022-11-28 18:00:00'),
(176, 'Poland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-29 18:00:00', '2022-11-29 18:00:00'),
(177, 'Portugal', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-11-30 18:00:00', '2022-11-30 18:00:00'),
(178, 'Puerto Rico', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-01 18:00:00', '2022-12-01 18:00:00'),
(179, 'Qatar', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-02 18:00:00', '2022-12-02 18:00:00'),
(180, 'Reunion', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-03 18:00:00', '2022-12-03 18:00:00'),
(181, 'Romania', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-04 18:00:00', '2022-12-04 18:00:00'),
(182, 'Russian Federation', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-05 18:00:00', '2022-12-05 18:00:00'),
(183, 'Rwanda', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-06 18:00:00', '2022-12-06 18:00:00'),
(184, 'Saint Kitts and Nevis', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-07 18:00:00', '2022-12-07 18:00:00'),
(185, 'Saint Lucia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-08 18:00:00', '2022-12-08 18:00:00'),
(186, 'Saint Vincent and the Grenadines', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-09 18:00:00', '2022-12-09 18:00:00'),
(187, 'Samoa', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-10 18:00:00', '2022-12-10 18:00:00'),
(188, 'San Marino', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-11 18:00:00', '2022-12-11 18:00:00'),
(189, 'Sao Tome and Principe', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-12 18:00:00', '2022-12-12 18:00:00'),
(190, 'Saudi Arabia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-13 18:00:00', '2022-12-13 18:00:00'),
(191, 'Senegal', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-14 18:00:00', '2022-12-14 18:00:00'),
(192, 'Serbia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-15 18:00:00', '2022-12-15 18:00:00'),
(193, 'Seychelles', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-16 18:00:00', '2022-12-16 18:00:00'),
(194, 'Sierra Leone', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-17 18:00:00', '2022-12-17 18:00:00'),
(195, 'Singapore', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-18 18:00:00', '2022-12-18 18:00:00'),
(196, 'Slovakia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-19 18:00:00', '2022-12-19 18:00:00'),
(197, 'Slovenia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-20 18:00:00', '2022-12-20 18:00:00'),
(198, 'Solomon Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-21 18:00:00', '2022-12-21 18:00:00'),
(199, 'Somalia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-22 18:00:00', '2022-12-22 18:00:00'),
(200, 'South Africa', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-23 18:00:00', '2022-12-23 18:00:00'),
(201, 'South Georgia South Sandwich Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-24 18:00:00', '2022-12-24 18:00:00'),
(202, 'South Sudan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-25 18:00:00', '2022-12-25 18:00:00'),
(203, 'Spain', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-26 18:00:00', '2022-12-26 18:00:00'),
(204, 'Sri Lanka', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-27 18:00:00', '2022-12-27 18:00:00'),
(205, 'St. Helena', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-28 18:00:00', '2022-12-28 18:00:00'),
(206, 'St. Pierre and Miquelon', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-29 18:00:00', '2022-12-29 18:00:00'),
(207, 'Sudan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-30 18:00:00', '2022-12-30 18:00:00'),
(208, 'Suriname', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2022-12-31 18:00:00', '2022-12-31 18:00:00'),
(209, 'Svalbard and Jan Mayen Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-01 18:00:00', '2023-01-01 18:00:00'),
(210, 'Swaziland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-02 18:00:00', '2023-01-02 18:00:00'),
(211, 'Sweden', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-03 18:00:00', '2023-01-03 18:00:00'),
(212, 'Switzerland', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-04 18:00:00', '2023-01-04 18:00:00'),
(213, 'Syrian Arab Republic', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-05 18:00:00', '2023-01-05 18:00:00'),
(214, 'Taiwan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-06 18:00:00', '2023-01-06 18:00:00'),
(215, 'Tajikistan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-07 18:00:00', '2023-01-07 18:00:00'),
(216, 'Tanzania, United Republic of', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-08 18:00:00', '2023-01-08 18:00:00'),
(217, 'Thailand', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-09 18:00:00', '2023-01-09 18:00:00'),
(218, 'Togo', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-10 18:00:00', '2023-01-10 18:00:00'),
(219, 'Tokelau', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-11 18:00:00', '2023-01-11 18:00:00'),
(220, 'Tonga', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-12 18:00:00', '2023-01-12 18:00:00'),
(221, 'Trinidad and Tobago', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-13 18:00:00', '2023-01-13 18:00:00'),
(222, 'Tunisia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-14 18:00:00', '2023-01-14 18:00:00'),
(223, 'Turkey', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-15 18:00:00', '2023-01-15 18:00:00'),
(224, 'Turkmenistan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-16 18:00:00', '2023-01-16 18:00:00'),
(225, 'Turks and Caicos Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-17 18:00:00', '2023-01-17 18:00:00'),
(226, 'Tuvalu', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-18 18:00:00', '2023-01-18 18:00:00'),
(227, 'Uganda', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-19 18:00:00', '2023-01-19 18:00:00'),
(228, 'Ukraine', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-20 18:00:00', '2023-01-20 18:00:00'),
(229, 'United Arab Emirates', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-21 18:00:00', '2023-01-21 18:00:00'),
(230, 'United Kingdom', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-22 18:00:00', '2023-01-22 18:00:00'),
(231, 'United States', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-23 18:00:00', '2023-01-23 18:00:00'),
(232, 'United States minor outlying islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-24 18:00:00', '2023-01-24 18:00:00'),
(233, 'Uruguay', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-25 18:00:00', '2023-01-25 18:00:00'),
(234, 'Uzbekistan', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-26 18:00:00', '2023-01-26 18:00:00'),
(235, 'Vanuatu', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-27 18:00:00', '2023-01-27 18:00:00'),
(236, 'Vatican City State', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-28 18:00:00', '2023-01-28 18:00:00'),
(237, 'Venezuela', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-29 18:00:00', '2023-01-29 18:00:00'),
(238, 'Vietnam', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-30 18:00:00', '2023-01-30 18:00:00'),
(239, 'Virgin Islands (British)', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-01-31 18:00:00', '2023-01-31 18:00:00'),
(240, 'Virgin Islands (U.S.)', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-01 18:00:00', '2023-02-01 18:00:00'),
(241, 'Wallis and Futuna Islands', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-02 18:00:00', '2023-02-02 18:00:00'),
(242, 'Western Sahara', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-03 18:00:00', '2023-02-03 18:00:00'),
(243, 'Yemen', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-04 18:00:00', '2023-02-04 18:00:00'),
(244, 'Zambia', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-05 18:00:00', '2023-02-05 18:00:00'),
(245, 'Zimbabwe', 100.00, 120.00, 150.00, 200.00, 220.00, 250.00, 1, '2023-02-06 18:00:00', '2023-02-06 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', '', '', '', '', '', 'admin@gmail.com', NULL, '$2y$10$5pIIXRQ.Jpco.Hla1pyn3.kRy4ITO1mI/ZUJrAmuSBs72QulOtGu2', 0, NULL, '2020-08-12 13:39:12', '2020-08-12 13:39:12'),
(3, 'MD Hossain Bhat', '', '', '', '', '', '', 'hossainbhatcse@gmail.com', NULL, '$2y$10$zKzFfYBDuqnDywRUT0OmUOr9UBUkrImxfADdLnkv24r.p7..1VkLe', 1, NULL, '2022-03-04 20:40:06', '2022-06-09 19:35:03'),
(4, 'MD Hossain Bhat', '', '', '', '', '', '', 'demo_user@gmail.com', NULL, '$2y$10$Kx8XeLr21Io0/w3huUpOjOaNnB1tGZBKwjRWDGFwHAsSQCgr.t0zS', 0, NULL, '2022-03-04 20:42:27', '2022-03-04 20:42:27'),
(5, 'kamal khan', '', '', '', '', '', '', 'kamal8080@yopmail.com', NULL, '$2y$10$SB7Z/E2YJsb6xOuSF1Nmw.U3hy7jxwpMs5NlG7HNpazfrF1fxX/VC', 1, NULL, '2022-03-04 20:47:23', '2022-06-13 05:12:43'),
(6, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01838322523', 'roja100@yopmail.com', NULL, '$2y$10$gXwiqIvWiheyCq.BbrBlvuDt.A6rDQflJ2szz9/dIbpU.ysu9YI2C', 1, NULL, '2022-03-05 16:21:27', '2022-06-11 17:55:30'),
(8, 'Kobir', NULL, NULL, NULL, NULL, NULL, '01838322523', 'kobir@yopmail.com', NULL, '$2y$10$2SrA6/hkFKapFhdnFFxKqOD8ONSS3jqa62/CtX.qUfhYrDlYzi1l2', 0, NULL, '2022-06-01 01:44:55', '2022-06-01 01:44:55'),
(9, 'Laboni', NULL, NULL, NULL, NULL, NULL, '08945748900', 'laboni001@yopmail.com', NULL, '$2y$10$WZ7CUFwn//rZIDpVSTk6reE5dmtMl4Xigx5oTSC0NRMfvQHci1nYa', 0, NULL, '2022-06-01 01:48:30', '2022-06-01 01:48:30'),
(10, 'testtab', NULL, NULL, NULL, NULL, NULL, '01838322523', 'testtab@yopmail.com', NULL, '$2y$10$pwsJhWpAMSt6eu5YDt5F3.vKAc2cD.kKvmSlP9dVTnQyOVyixhbjW', 0, NULL, '2022-06-01 01:58:01', '2022-06-01 01:58:01'),
(11, 'look', NULL, NULL, NULL, NULL, NULL, '01838322523', 'look@yopmail.com', NULL, '$2y$10$6Pvlp976i6iqCXi4dnWsc.MUfbZbshz0zzTS8bKzizmIFfNcKAHF6', 0, NULL, '2022-06-01 02:01:23', '2022-06-01 02:01:23'),
(12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '08945748900', 'demotest@yopmail.com', NULL, '$2y$10$njzXHsssWMdh6BAL3XGUDufwJhqHZtM7OXhqaojgLuNYVRauiGb/S', 1, NULL, '2022-06-01 02:20:59', '2022-06-01 02:25:55'),
(13, 'Bishal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '08945748988', 'bishal@yopmail.com', NULL, '$2y$10$hIDVulKGDM5VDFeBdoOAIOvbQs0a9WTqpxL0qYbECrp6d3.CX4QDS', 1, NULL, '2022-06-06 09:06:52', '2022-06-11 09:38:15'),
(14, 'Rubel Hossain', NULL, NULL, NULL, NULL, NULL, '01808756347', 'rubel@yopmail.com', NULL, '$2y$10$ZGiqDW86MIUgRl2PNSlBR.ha6Ip3g89cKxDbK0LyRl4rdsSYB3zgK', 0, NULL, '2022-06-08 14:56:07', '2022-06-09 18:08:11'),
(15, 'Babul Khan', NULL, NULL, NULL, NULL, NULL, '01747343284', 'babul@yopmail.com', NULL, '$2y$10$E54ul0/rUrvEi8Fl/zGaT.Jm3mAlLz21hTRBZ7HJ2t1iNDgFS5twO', 0, NULL, '2022-06-08 15:00:39', '2022-06-09 18:08:05'),
(16, 'Abdul Ahad', NULL, NULL, NULL, NULL, NULL, '01808811309', 'abdulahad@yopmail.com', NULL, '$2y$10$gIDsvzag1ytD.K38jpjfue4HDJ0NsT69gnTeuHzSkDAzUvkqQZ8x6', 1, NULL, '2022-06-14 03:41:20', '2022-06-14 03:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 6, 4, '2022-06-11 10:43:02', '2022-06-11 10:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_roles`
--
ALTER TABLE `admins_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_tailors`
--
ALTER TABLE `custom_tailors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_logs`
--
ALTER TABLE `orders_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins_roles`
--
ALTER TABLE `admins_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_tailors`
--
ALTER TABLE `custom_tailors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_logs`
--
ALTER TABLE `orders_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
