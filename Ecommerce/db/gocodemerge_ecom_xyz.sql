-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2020 at 12:14 PM
-- Server version: 10.3.9-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocodemerge_ecom_xyz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD Hossain Bhat', 'admin', '01838322523', 'admin@gmail.com', NULL, '$2y$10$Zgo0Y4aLlDEZ9/Qi48E86uDoJSSCq4iNlWtten1QoxAv0V7CM7bES', '15527.jpg', 1, NULL, NULL, '2020-06-14 13:33:09'),
(2, 'hossain', 'admin', '59709', 'hossain@gmail.com', NULL, '$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy', '', 1, NULL, NULL, NULL),
(3, 'tanni', 'subadmin', '04238480204', 'tanni@gmail.com', NULL, '$2y$10$NRsnPZ0Qo8Oulj0bV9TPxeMtflatKrnGrUtgswGy7c0cWg3FonMLy', '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'image1.png', 'banner1', 'Black Jacket', 'black jacket', 1, NULL, '2020-10-08 21:10:35'),
(2, 'image2.png', '', 'Black Jacket', 'black jacket', 1, NULL, NULL),
(3, 'image3.png', '', 'Black Jacket', 'black jacket', 1, NULL, NULL),
(4, '18139.png', 'www.facebook.com', 'Web Developer', 'dsdf', 1, '2020-08-24 06:18:21', '2020-08-24 06:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Dorji Bari', 1, '2020-08-05 08:36:38', '2020-10-08 20:21:23'),
(14, 'Easy', 1, '2020-08-05 08:36:53', '2020-09-17 20:35:37'),
(15, 'D-Smart', 1, '2020-10-08 21:02:56', '2020-10-08 21:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
(17, 'TbE3DsJtmthpG0CAA1gTCXmQmdPDbkER1tPuyVJM', 0, '4', 'Large', 2, '2020-10-29 10:21:50', '2020-10-29 10:21:50'),
(18, 'UiShjRxsmUiKTgX3aF4TwK6FEzGRDUChMQXohMLW', 0, '9', 'Medium', 2, '2020-10-30 02:46:35', '2020-10-30 02:46:35'),
(19, 'RZTOlTHoNlZbABDNEvkD3XwhGhJQsb3WPcABJXuv', 0, '5', 'Medium', 1, '2020-10-30 12:38:57', '2020-10-30 12:38:57'),
(20, 'KRT6GCn4kUmfKep5nAlT9QbW7CeFbhJrHtY9U0qH', 0, '9', 'Medium', 1, '2020-11-29 07:52:26', '2020-11-29 07:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `discount` double(8,2) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `name`, `image`, `discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 'T-Shirt', '15247.jpg', 10.00, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less norma', 't-shirt', 't-shirt', 't-shirt', 't-shirt', 1, '2020-06-26 23:05:26', '2020-10-08 20:39:31'),
(2, 1, 1, 'Easy Shirt', '79850.jpg', 4.00, 't-shirt', 'easy', 't-shirt', 't-shirt', 't-shirt', 1, '2020-06-26 23:06:09', '2020-09-17 07:16:26'),
(3, 1, 1, 'Casual T-Shirt', '29744.jpg', 4.00, 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 'casual-t-shirt', 1, '2020-06-26 23:07:06', '2020-06-26 23:07:06'),
(4, 0, 2, 'test', '90891.jpg', 0.00, 'test', 'test_url', 'test', 'test', 'test', 1, '2020-08-06 01:01:41', '2020-08-06 01:01:41'),
(5, 4, 2, 'test2', '39848.jpg', 0.00, 'test2', 'test2_url', 'test2', 'test2', 'test2', 1, '2020-08-06 01:05:55', '2020-08-06 01:05:55'),
(6, 0, 3, 'test', '0', 0.00, '', 'test', '', '', '', 1, '2020-08-23 21:36:16', '2020-08-23 21:36:16'),
(7, 0, 3, 'test2', '0', 0.00, '', 'test2', '', '', '', 1, '2020-08-23 21:36:49', '2020-08-23 21:36:49'),
(8, 0, 3, 'test3', '0', 0.00, '', 'test3', '', '', '', 1, '2020-08-23 21:37:23', '2020-08-23 21:37:23'),
(9, 0, 3, 'test4', '0', 0.00, '', 'test4', '', '', '', 1, '2020-08-23 21:37:50', '2020-08-23 21:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_11_103506_create_admins_table', 2),
(5, '2020_06_21_053118_create_sections_table', 3),
(6, '2020_06_22_034440_create_categories_table', 4),
(9, '2020_06_27_043551_create_products_table', 5),
(10, '2020_07_02_185139_create_products_attributes_table', 6),
(12, '2020_07_13_062821_create_products_images_table', 7),
(13, '2020_08_05_032331_create_brands_table', 8),
(14, '2020_08_05_110801_add_column_to_products', 9),
(15, '2020_08_24_090549_create_banners_table', 10),
(16, '2020_10_21_064258_create_carts_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `product_weight` double(8,2) DEFAULT NULL,
  `product_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wash_care` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabric` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sleeve` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occasion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 13, 'Black T-Shirt', 'BLK202', 'Black', 350.00, 5.00, 250.00, NULL, '170g-Barron-Combed-Cotton-T-Shirt-yellow.jpg-59253.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Black T-Shirt', 'Cotton', 'Checked', 'Full Sleve', 'Regular', 'Casual', 'Black T-Shirt', 'Black T-Shirt', 'Black, T-Shirt', 'Yes', 1, '2020-07-01 22:04:49', '2020-10-08 20:53:36'),
(5, 2, 1, 13, 'Blue Easy T-Shirt', 'BLU202', 'Blue', 350.00, 5.00, 250.00, NULL, '59200401_l.webp-25777.webp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Blue Easy T-Shirt', 'Polyster', 'Plain', 'Half Slave', 'Regular', 'Formal', 'Blue Easy T-Shirt', 'Blue Easy T-Shirt', 'Blue, Easy-T-Shirt', 'Yes', 1, '2020-07-01 23:15:28', '2020-10-04 08:58:30'),
(6, 3, 1, 15, 'Red Casual T-Shirt', 'RED202', 'Red', 350.00, 5.00, 250.00, NULL, '660241270_1_720x928.jpg-39033.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Red Casual T-Shirt', 'Wool', 'Printed', 'Short Slave', 'Regular', 'Casual', 'Red Casual T-Shirt', 'Red Casual T-Shirt', 'Red, Casual-T-Shirt', 'No', 1, '2020-07-02 03:26:02', '2020-10-10 06:01:19'),
(7, 3, 1, 13, 'Green Casual T-Shirt', 'GRN202', 'Green', 350.00, 5.00, 250.00, NULL, '334801001301_pp_01_image.jpg-47179.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Green Casual T-Shirt', 'Polyster', 'Self', 'Sleeveless', 'Regular', 'Casual', 'Green Casual T-Shirt', 'Green Casual T-Shirt', 'Green, Casual-T-Shirt', 'Yes', 1, '2020-07-02 03:47:42', '2020-10-04 08:59:30'),
(8, 3, 1, 13, 'Casual  t-shirt', 'CT001', 'white', 1000.00, NULL, NULL, NULL, 'Covid.jpg-57460.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Cotton', 'Solid', 'Half Slave', 'Slim', 'Casual', NULL, NULL, NULL, 'No', 1, '2020-07-15 22:15:46', '2020-10-04 09:00:06'),
(9, 2, 1, 13, 'Royal Blue T-Shirt', 'B0021', 'Blue', 200.00, NULL, 200.00, NULL, 'images (1).jpg-94245.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Cotton', 'Printed', 'Full Sleve', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-05 05:49:49', '2020-10-10 06:01:38'),
(10, 1, 1, 14, 'red color', 'R001', 'red', 250.00, NULL, 250.00, NULL, 'images (2).jpg-30682.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 'Wool', 'Plain', 'Half Slave', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 1, '2020-08-23 21:52:54', '2020-10-10 06:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'Small', 320.00, 10, 'RED202-S', 1, '2020-07-03 22:28:36', '2020-07-15 22:45:41'),
(2, 6, 'Medium', 320.00, 15, 'RED202-M', 1, '2020-07-03 22:28:36', '2020-07-03 22:28:36'),
(3, 6, 'Large', 320.00, 15, 'RED202-L', 1, '2020-07-03 22:28:36', '2020-07-03 22:28:36'),
(4, 3, 'Small', 350.00, 15, 'ORG202-S', 1, '2020-07-07 11:03:40', '2020-07-07 13:06:25'),
(5, 3, 'Medium', 350.00, 15, 'ORG202-M', 1, '2020-07-07 11:03:40', '2020-07-07 13:06:25'),
(6, 3, 'Large', 350.00, 10, 'ORG202-L', 1, '2020-07-07 11:03:40', '2020-07-07 13:06:25'),
(7, 4, 'Small', 350.00, 0, 'BLK202-S', 1, '2020-07-07 11:05:24', '2020-10-27 18:58:56'),
(8, 4, 'Medium', 360.00, 15, 'BLK202-M', 1, '2020-07-07 11:05:24', '2020-10-27 18:58:56'),
(9, 4, 'Large', 370.00, 10, 'BLK202-L', 1, '2020-07-07 11:05:24', '2020-10-27 18:58:56'),
(10, 5, 'Small', 350.00, 10, 'BLU202-S', 1, '2020-07-07 11:06:41', '2020-07-07 11:06:41'),
(11, 5, 'Medium', 350.00, 10, 'BLU202-M', 1, '2020-07-07 11:06:41', '2020-07-07 11:06:41'),
(12, 5, 'Large', 350.00, 10, 'BLU202-L', 1, '2020-07-07 11:06:41', '2020-07-07 11:06:41'),
(13, 7, 'Small', 350.00, 15, 'GRN202-S', 1, '2020-07-07 11:08:08', '2020-07-12 23:04:58'),
(14, 7, 'Medium', 350.00, 15, 'GRN202-M', 1, '2020-07-07 11:08:08', '2020-07-07 13:20:53'),
(15, 7, 'Large', 350.00, 10, 'GRN202-L', 1, '2020-07-07 11:08:08', '2020-07-07 13:20:54'),
(16, 10, 'Small', 250.00, 8, 'R001-s', 1, '2020-10-28 07:33:53', '2020-10-28 07:33:53'),
(17, 10, 'Medium', 270.00, 12, 'R001-m', 1, '2020-10-28 07:33:53', '2020-10-28 07:33:53'),
(18, 10, 'Large', 300.00, 10, 'R001-l', 1, '2020-10-28 07:33:53', '2020-10-28 07:33:53'),
(19, 9, 'Small', 300.00, 5, 'B0021-s', 1, '2020-10-28 07:35:21', '2020-10-28 07:35:26'),
(20, 9, 'Medium', 320.00, 6, 'B0021-m', 1, '2020-10-28 07:35:21', '2020-10-28 07:35:26'),
(21, 9, 'Large', 330.00, 4, 'B0021-l', 1, '2020-10-28 07:35:21', '2020-10-28 07:35:26'),
(22, 8, 'Small', 300.00, 10, 'CT001-s', 1, '2020-10-28 07:37:20', '2020-10-28 07:37:20'),
(23, 8, 'Medium', 320.00, 13, 'CT001-m', 1, '2020-10-28 07:37:20', '2020-10-28 07:37:20'),
(24, 8, 'Large', 350.00, 5, 'CT001-l', 1, '2020-10-28 07:37:20', '2020-10-28 07:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, '542231594924865.jpg', 1, '2020-07-16 12:41:05', '2020-08-04 13:20:53'),
(9, 4, '539981602687479.jpg', 1, '2020-10-14 08:57:59', '2020-10-14 08:57:59'),
(10, 4, '716881602691745.jpg', 1, '2020-10-14 10:09:05', '2020-10-14 10:09:05'),
(11, 4, '566201602691772.jpeg', 1, '2020-10-14 10:09:32', '2020-10-14 10:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mean', 1, NULL, '2020-08-05 06:07:37'),
(2, 'Women', 1, NULL, '2020-08-06 01:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$5pIIXRQ.Jpco.Hla1pyn3.kRy4ITO1mI/ZUJrAmuSBs72QulOtGu2', NULL, '2020-08-12 19:39:12', '2020-08-12 19:39:12');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
