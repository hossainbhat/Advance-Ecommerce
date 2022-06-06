-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 05:35 PM
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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD Hossain Bhat', 'admin', '01838322523', 'admin@gmail.com', NULL, '$2y$10$Zgo0Y4aLlDEZ9/Qi48E86uDoJSSCq4iNlWtten1QoxAv0V7CM7bES', '75782.png', 'Nikunja-2, Khilkhet, Dhaka', 1, NULL, NULL, '2022-03-04 21:14:09'),
(2, 'hossain', 'admin', '59709', 'hossain@gmail.com', NULL, '$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy', '', '', 1, NULL, NULL, NULL),
(3, 'tanni', 'subadmin', '04238480204', 'tanni@gmail.com', NULL, '$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy', '', '', 1, NULL, NULL, NULL);

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
(1, '10376.png', 'banner1', 'Black Jacket', 'black jacket', 1, NULL, '2022-03-04 21:18:10'),
(2, '351.png', 'jakaet', 'Black Jacket', 'black jacket', 1, NULL, '2022-03-04 21:18:50'),
(3, '47514.png', 'jakaet3', 'Black Jacket', 'black jacket', 1, NULL, '2022-03-04 21:19:12'),
(4, '79219.png', 'www.facebook.com', 'Web Developer', 'dsdf', 1, '2020-08-24 00:18:21', '2022-03-04 21:19:36');

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
(13, 'Dorji Bari', 1, '2020-08-05 02:36:38', '2022-05-26 00:08:39'),
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
(42, 'LTWT27VE8wWj7FF2mDQwREXrM5mjNehwy7ByurfQ', 0, '10', 'Medium', 1, '2022-06-01 01:28:06', '2022-06-01 01:28:06'),
(53, 'V2zSxbut7ReR61eZcsB3Pp1FpOzPmn8R1OYkZhmD', 6, '7', 'Medium', 1, '2022-06-06 00:17:45', '2022-06-06 00:17:45');

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
(1, 0, 1, 'T-Shirt', '15247.jpg', 0.00, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less norma', 't-shirt', 't-shirt', 't-shirt', 't-shirt', 1, '2020-06-26 17:05:26', '2021-07-02 21:25:47'),
(2, 1, 1, 'Easy Shirt', '65715.jpg', 0.00, 't-shirt', 'easy', 't-shirt', 't-shirt', 't-shirt', 1, '2020-06-26 17:06:09', '2022-03-04 21:21:42'),
(3, 1, 1, 'Casual T-Shirt', '29744.jpg', 4.00, 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 1, '2020-06-26 17:07:06', '2020-06-26 17:07:06'),
(4, 0, 2, 'test', '90891.jpg', 0.00, 'test', 'test_url', 'test', 'test', 'test', 1, '2020-08-05 19:01:41', '2020-08-05 19:01:41'),
(5, 4, 2, 'test2', '39848.jpg', 0.00, 'test2', 'test2_url', 'test2', 'test2', 'test2', 1, '2020-08-05 19:05:55', '2020-08-05 19:05:55'),
(6, 0, 3, 'test', '0', 0.00, '', 'test', '', '', '', 1, '2020-08-23 15:36:16', '2020-08-23 15:36:16'),
(7, 0, 3, 'test2', '0', 0.00, '', 'test2', '', '', '', 1, '2020-08-23 15:36:49', '2020-08-23 15:36:49'),
(8, 0, 3, 'test3', '0', 0.00, '', 'test3', '', '', '', 1, '2020-08-23 15:37:23', '2020-08-23 15:37:23'),
(9, 0, 3, 'test4', '0', 0.00, '', 'test4', '', '', '', 1, '2020-08-23 15:37:50', '2020-08-23 15:37:50');

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
(1, 'Manual', 'test', '1,2,3', '', 'Single Time', 'Percentage', 5.00, '2022-06-08', 1, '2022-05-25 23:23:55', '2022-06-06 09:09:23');

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
(3, 12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-01 02:25:34', '2022-06-01 02:25:34'),
(4, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-06 09:10:24', '2022-06-06 09:10:24'),
(5, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 1, '2022-06-06 09:10:39', '2022-06-06 09:10:39');

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
(23, '2022_06_05_095109_update_orders_table', 8);

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
(12, 13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '089457489', 'bishal@yopmail.com', 0, 'test', 46.00, 'Shipped', 'COD', 'COD', 866.00, 'Apex', '95534755', '2022-06-06 09:11:57', '2022-06-06 09:21:26');

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
(10, 12, 'Shipped', '2022-06-06 09:21:34', '2022-06-06 09:21:34');

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
(15, 12, 13, 6, 'RED202', 'Red Casual T-Shirt', 'Red', 304.00, 'Large', 3, '2022-06-06 09:11:57', '2022-06-06 09:11:57');

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
(4, 13, 2, 1, 'Black T-Shirt', 'BLK202', 'Black', 350.00, NULL, 250.00, NULL, '9991f01930b731deb883107cffebf081.jpg-52212.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Black T-Shirt', 'Cotton', 'Checked', 'Full Sleve', 'Regular', 'Casual', 'Black T-Shirt', 'Black T-Shirt', 'Black, T-Shirt', 'Yes', 1, '2020-07-01 16:04:49', '2022-03-04 21:24:03'),
(5, 13, 2, 1, 'Blue Easy T-Shirt', 'BLU202', 'Blue', 350.00, 5.00, 250.00, NULL, 'front_medium_extended.png-18413.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Blue Easy T-Shirt', 'Polyster', 'Plain', 'Half Slave', 'Regular', 'Formal', 'Blue Easy T-Shirt', 'Blue Easy T-Shirt', 'Blue, Easy-T-Shirt', 'Yes', 1, '2020-07-01 17:15:28', '2022-03-04 21:24:23'),
(6, 15, 3, 1, 'Red Casual T-Shirt', 'RED202', 'Red', 350.00, 5.00, 250.00, NULL, '61a794e179a32-square.jpg-2399.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Red Casual T-Shirt', 'Wool', 'Printed', 'Short Slave', 'Regular', 'Casual', 'Red Casual T-Shirt', 'Red Casual T-Shirt', 'Red, Casual-T-Shirt', 'No', 1, '2020-07-01 21:26:02', '2022-03-04 21:24:43'),
(7, 13, 3, 1, 'Green Casual T-Shirt', 'GRN202', 'Green', 350.00, 5.00, 250.00, NULL, '1-600-5-600x600.jpg-81790.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Green Casual T-Shirt', 'Polyster', 'Self', 'Sleeveless', 'Regular', 'Casual', 'Green Casual T-Shirt', 'Green Casual T-Shirt', 'Green, Casual-T-Shirt', 'Yes', 1, '2020-07-01 21:47:42', '2022-03-04 21:25:02'),
(8, 13, 3, 1, 'Casual  t-shirt', 'CT001', 'white', 1000.00, NULL, NULL, NULL, 'images.jpg-5562.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Cotton', 'Solid', 'Half Slave', 'Slim', 'Casual', NULL, NULL, NULL, 'No', 1, '2020-07-15 16:15:46', '2022-03-04 21:25:23'),
(9, 13, 2, 1, 'Royal Blue T-Shirt', 'B0021', 'Blue', 200.00, 5.00, 200.00, NULL, 'download.jpg-91953.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Cotton', 'Printed', 'Full Sleve', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-04 23:49:49', '2022-06-06 09:04:42'),
(10, 14, 1, 1, 'red color', 'R001', 'red', 250.00, NULL, 250.00, NULL, 'l-t312-cgblwh-new-eyebogler-original-imafzs5hrjgzsfpr.jpeg-14863.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Wool', 'Plain', 'Half Slave', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-23 15:52:54', '2022-03-04 21:26:24');

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
(2, 6, 'Medium', 320.00, 15, 'RED202-M', 1, '2020-07-03 16:28:36', '2020-07-03 16:28:36'),
(3, 6, 'Large', 320.00, 15, 'RED202-L', 1, '2020-07-03 16:28:36', '2020-07-03 16:28:36'),
(4, 3, 'Small', 350.00, 15, 'ORG202-S', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(5, 3, 'Medium', 350.00, 15, 'ORG202-M', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(6, 3, 'Large', 350.00, 10, 'ORG202-L', 1, '2020-07-07 05:03:40', '2020-07-07 07:06:25'),
(7, 4, 'Small', 350.00, 0, 'BLK202-S', 1, '2020-07-07 05:05:24', '2022-03-07 15:43:46'),
(8, 4, 'Medium', 360.00, 15, 'BLK202-M', 1, '2020-07-07 05:05:24', '2020-10-27 12:58:56'),
(9, 4, 'Large', 370.00, 10, 'BLK202-L', 1, '2020-07-07 05:05:24', '2020-10-27 12:58:56'),
(10, 5, 'Small', 350.00, 10, 'BLU202-S', 1, '2020-07-07 05:06:41', '2020-07-07 05:06:41'),
(11, 5, 'Medium', 350.00, 10, 'BLU202-M', 1, '2020-07-07 05:06:41', '2020-07-07 05:06:41'),
(12, 5, 'Large', 350.00, 10, 'BLU202-L', 1, '2020-07-07 05:06:41', '2020-07-07 05:06:41'),
(13, 7, 'Small', 350.00, 15, 'GRN202-S', 1, '2020-07-07 05:08:08', '2020-07-12 17:04:58'),
(14, 7, 'Medium', 350.00, 15, 'GRN202-M', 1, '2020-07-07 05:08:08', '2020-07-07 07:20:53'),
(15, 7, 'Large', 350.00, 10, 'GRN202-L', 1, '2020-07-07 05:08:08', '2020-07-07 07:20:54'),
(16, 10, 'Small', 250.00, 8, 'R001-s', 1, '2020-10-28 01:33:53', '2020-10-28 01:33:53'),
(17, 10, 'Medium', 270.00, 12, 'R001-m', 1, '2020-10-28 01:33:53', '2020-10-28 01:33:53'),
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
(14, 9, '208431654527827.jpg', 1, '2022-06-06 09:03:48', '2022-06-06 09:03:48');

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
(1, 'Mean', 1, NULL, '2020-08-05 00:07:37'),
(2, 'Women', 1, NULL, '2020-08-05 19:15:05');

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
(3, 'MD Hossain Bhat', '', '', '', '', '', '', 'hossainbhatcse@gmail.com', NULL, '$2y$10$zKzFfYBDuqnDywRUT0OmUOr9UBUkrImxfADdLnkv24r.p7..1VkLe', 0, NULL, '2022-03-04 20:40:06', '2022-03-04 20:40:06'),
(4, 'MD Hossain Bhat', '', '', '', '', '', '', 'demo_user@gmail.com', NULL, '$2y$10$Kx8XeLr21Io0/w3huUpOjOaNnB1tGZBKwjRWDGFwHAsSQCgr.t0zS', 0, NULL, '2022-03-04 20:42:27', '2022-03-04 20:42:27'),
(5, 'kamal khan', '', '', '', '', '', '', 'kamal8080@yopmail.com', NULL, '$2y$10$SB7Z/E2YJsb6xOuSF1Nmw.U3hy7jxwpMs5NlG7HNpazfrF1fxX/VC', 0, NULL, '2022-03-04 20:47:23', '2022-03-04 23:09:15'),
(6, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '01838322523', 'roja100@yopmail.com', NULL, '$2y$10$p0P9pl1biF1G.Hrh..dw/uMPsh8HgbHDuDlsWWZdNndA9fyUEVvV2', 1, NULL, '2022-03-05 16:21:27', '2022-05-30 23:48:03'),
(8, 'Kobir', NULL, NULL, NULL, NULL, NULL, '01838322523', 'kobir@yopmail.com', NULL, '$2y$10$2SrA6/hkFKapFhdnFFxKqOD8ONSS3jqa62/CtX.qUfhYrDlYzi1l2', 0, NULL, '2022-06-01 01:44:55', '2022-06-01 01:44:55'),
(9, 'Laboni', NULL, NULL, NULL, NULL, NULL, '08945748900', 'laboni001@yopmail.com', NULL, '$2y$10$WZ7CUFwn//rZIDpVSTk6reE5dmtMl4Xigx5oTSC0NRMfvQHci1nYa', 0, NULL, '2022-06-01 01:48:30', '2022-06-01 01:48:30'),
(10, 'testtab', NULL, NULL, NULL, NULL, NULL, '01838322523', 'testtab@yopmail.com', NULL, '$2y$10$pwsJhWpAMSt6eu5YDt5F3.vKAc2cD.kKvmSlP9dVTnQyOVyixhbjW', 0, NULL, '2022-06-01 01:58:01', '2022-06-01 01:58:01'),
(11, 'look', NULL, NULL, NULL, NULL, NULL, '01838322523', 'look@yopmail.com', NULL, '$2y$10$6Pvlp976i6iqCXi4dnWsc.MUfbZbshz0zzTS8bKzizmIFfNcKAHF6', 0, NULL, '2022-06-01 02:01:23', '2022-06-01 02:01:23'),
(12, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '08945748900', 'demotest@yopmail.com', NULL, '$2y$10$njzXHsssWMdh6BAL3XGUDufwJhqHZtM7OXhqaojgLuNYVRauiGb/S', 1, NULL, '2022-06-01 02:20:59', '2022-06-01 02:25:55'),
(13, 'kamal', 'H#13,R#7,Nikunja-2,Khilkhet,Dhaka', 'Dhaka', 'Khilkhet', 'Bangladesh', '1228', '08945748988', 'bishal@yopmail.com', NULL, '$2y$10$hIDVulKGDM5VDFeBdoOAIOvbQs0a9WTqpxL0qYbECrp6d3.CX4QDS', 1, NULL, '2022-06-06 09:06:52', '2022-06-06 09:17:51');

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
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders_logs`
--
ALTER TABLE `orders_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
