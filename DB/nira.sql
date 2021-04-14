-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 02:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nira`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone1`, `phone2`, `email`, `register`, `image`, `owner`, `tin`, `balance`, `free2`, `created_at`, `updated_at`) VALUES
(1, 'Nira Computers', 'Nohakhali', '+8801318712782', '01745262400', 'abu.sayeed.diu@gmail.com', '2021', 'public/image/logo-demo3.png', 'Emran Hosen', '2021', '20000', NULL, NULL, '2021-03-17 12:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `created`, `name`, `mobile`, `address`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '2', 'Hello World', '01318712782', 'Khan', NULL, NULL, '2021-03-07', '2021-03-09 02:21:55'),
(2, '2', 'Hello World', '01318712782', 'Dhaka', NULL, NULL, '2021-03-07', '2021-03-07 06:44:34'),
(3, '3', 'Sayeed Islam', '01318712782', 'Dhaka,Bangladesh', NULL, NULL, '2021-03-08', '2021-03-08 00:20:03'),
(4, '2', 'Abu Sayeed', '01318712782', 'Uttara,Dhaka', NULL, NULL, '2021-03-09', '2021-03-09 02:09:22'),
(5, '2', 'Abu Sayeed', '0', 'Mulbon', NULL, NULL, '2021-03-09', '2021-03-09 03:03:17'),
(6, '2', 'Sayeed', '01318', 'Dhaka Bangladesh', NULL, NULL, '2021-03-09', '2021-03-09 07:51:55'),
(7, '3', 'Abu Sayeed', '01723345678', 'dd', NULL, NULL, '2021-03-10', '2021-03-10 01:08:21'),
(8, '3', 'Hello World', '2134567890', '3sdfghjkl', NULL, NULL, '2021-03-11', '2021-03-11 04:57:20'),
(9, '2', 'Hello Sayuee', '2134567890', '1234567yughcfxdfgh', NULL, NULL, '2021-03-11', '2021-03-11 05:36:48'),
(10, '3', 'Sayeed Ali', '01318712782', '345678', NULL, NULL, '2021-03-14', '2021-03-14 03:46:24'),
(11, '3', 'Sayeed Ali', '01318712782', '345678', NULL, NULL, '2021-03-14', '2021-03-14 03:46:46'),
(12, '3', '213456rtrtrt', '546789', '567890-', NULL, NULL, '2021-03-14', '2021-03-14 03:47:43'),
(13, '2', 'Sayeed Islam', '01318712782', 'Dhaka,Bangladesh', NULL, NULL, '2021-03-14', '2021-03-14 04:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `due_receives`
--

CREATE TABLE `due_receives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `due_receives`
--

INSERT INTO `due_receives` (`id`, `user`, `amount`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '2', '90', '7', NULL, '2021-03-11', '2021-03-10 01:47:35'),
(2, '2', '5', '12', NULL, '2021-03-10', '2021-03-10 01:49:05'),
(3, '3', '50', '8', NULL, '2021-03-10', '2021-03-10 01:53:14'),
(4, '2', '50', '3', NULL, '2021-03-10', '2021-03-10 02:53:47'),
(5, '2', '4', '12', NULL, '2021-03-10', '2021-03-10 03:11:06'),
(6, '2', '600', '7', NULL, '2021-03-10', '2021-03-10 03:17:53'),
(7, '3', '100', '4', NULL, '2021-03-10', '2021-03-10 07:03:05'),
(8, '2', '100', '3', NULL, '2021-03-11', '2021-03-11 05:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `user`, `type`, `purpose`, `note`, `amount`, `status`, `expense`, `free2`, `created_at`, `updated_at`) VALUES
(1, '2', 'Daily', 'Bank-Transfer', 'Hello Note', '6000', '0', NULL, NULL, '2021-03-08', '2021-03-08 01:29:08'),
(2, '2', 'Salary', 'Salary', 'Hello Note', '20000', '1', NULL, NULL, '2021-03-07', '2021-03-08 01:29:39'),
(4, '3', 'Daily', 'Clothing', NULL, '10000', '1', NULL, NULL, '2021-03-08', '2021-03-08 01:09:00'),
(5, '3', 'Salary', 'Salary', NULL, '40000', '0', NULL, NULL, '2021-03-06', '2021-03-07 23:48:14'),
(6, '2', 'Daily', 'Rent', NULL, '90', '1', NULL, NULL, '2021-03-09', '2021-03-09 06:14:37'),
(7, '3', 'Daily', 'Salary', '55', '55', '1', NULL, NULL, '2021-03-11', '2021-03-11 05:35:40'),
(8, '2', 'Daily', 'Rent', NULL, '67', '1', NULL, NULL, '2021-03-11', '2021-03-11 05:37:14');

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
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `name`, `mobile`, `address`, `amount`, `status`, `user`, `free1`, `created_at`, `updated_at`) VALUES
(1, 'Abu Sayeed', '01318712782', 'Uttara,Dhaka', '300', NULL, '10', NULL, '2021-03-17 09:08:12', '2021-03-17 12:08:58'),
(2, 'Hello World', '1324567890', 'Uttara,Dhaka', '4000', NULL, '10', NULL, '2021-03-17 11:10:14', '2021-03-17 12:08:51');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_02_060015_create_sessions_table', 1),
(7, '2021_03_01_093748_create_companies_table', 2),
(8, '2021_03_06_121521_create_services_table', 3),
(9, '2021_03_07_063011_create_products_table', 4),
(10, '2021_03_07_073549_create_stocks_table', 5),
(11, '2021_03_07_115756_create_service_sales_table', 6),
(12, '2021_03_07_115817_create_customers_table', 6),
(13, '2021_03_08_045500_create_expenses_table', 7),
(14, '2017_06_26_000000_create_shopping_cart_table', 8),
(15, '2021_03_08_130125_create_product_sales_table', 9),
(16, '2021_03_08_130228_create_order_details_table', 9),
(17, '2021_03_10_071405_create_due_receives_table', 10),
(18, '2021_03_17_141251_create_loans_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `customer`, `order`, `name`, `price`, `qty`, `total`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 'Pen', '5', '10', '50', NULL, NULL, '2021-03-09', '2021-03-09 02:09:22'),
(2, '4', '1', 'Scale', '30', '10', '300', NULL, NULL, '2021-03-09', '2021-03-09 02:09:22'),
(3, '4', '1', 'Dairy Book', '200', '3', '600', NULL, NULL, '2021-03-09', '2021-03-09 02:09:22'),
(4, '1', '2', 'Pen', '5', '1', '5', NULL, NULL, '2021-03-09', '2021-03-09 02:21:55'),
(5, '1', '2', 'File', '30', '1', '30', NULL, NULL, '2021-03-09', '2021-03-09 02:21:55'),
(6, '5', '3', 'Jamiti Box', '120', '3', '360', NULL, NULL, '2021-03-09', '2021-03-09 03:03:17'),
(7, '5', '3', 'Color Pencil', '230', '3', '690', NULL, NULL, '2021-03-09', '2021-03-09 03:03:17'),
(8, '7', '4', 'File', '30', '1', '30', NULL, NULL, '2021-03-10', '2021-03-10 01:08:21'),
(9, '7', '4', 'Scale', '30', '1', '30', NULL, NULL, '2021-03-10', '2021-03-10 01:08:21'),
(10, '7', '4', 'Dairy Book', '200', '1', '200', NULL, NULL, '2021-03-10', '2021-03-10 01:08:21'),
(11, '8', '5', 'Pen', '5', '1', '5', NULL, NULL, '2021-03-11', '2021-03-11 04:57:20'),
(12, '8', '5', 'File', '30', '1', '30', NULL, NULL, '2021-03-11', '2021-03-11 04:57:20'),
(13, '8', '5', 'Scale', '30', '1', '30', NULL, NULL, '2021-03-11', '2021-03-11 04:57:20'),
(14, '9', '6', 'File', '30', '1', '30', NULL, NULL, '2021-03-11', '2021-03-11 05:36:48'),
(15, '9', '6', 'Scale', '30', '1', '30', NULL, NULL, '2021-03-11', '2021-03-11 05:36:48'),
(16, '10', '7', 'Pencil', '15', '1', '15', NULL, NULL, '2021-03-14', '2021-03-14 03:46:24'),
(17, '10', '7', 'Pen', '5', '1', '5', NULL, NULL, '2021-03-14', '2021-03-14 03:46:24'),
(18, '10', '7', 'File', '30', '1', '30', NULL, NULL, '2021-03-14', '2021-03-14 03:46:24'),
(19, '11', '8', 'Pencil', '15', '1', '15', NULL, NULL, '2021-03-14', '2021-03-14 03:46:46'),
(20, '11', '8', 'Pen', '5', '1', '5', NULL, NULL, '2021-03-14', '2021-03-14 03:46:46'),
(21, '11', '8', 'File', '30', '1', '30', NULL, NULL, '2021-03-14', '2021-03-14 03:46:46'),
(22, '12', '9', 'File', '30', '1', '30', NULL, NULL, '2021-03-14', '2021-03-14 03:47:43'),
(23, '12', '9', 'Scale', '30', '1', '30', NULL, NULL, '2021-03-14', '2021-03-14 03:47:43'),
(24, '13', '10', 'Pen', '5', '8', '40', NULL, NULL, '2021-03-14', '2021-03-14 04:29:15'),
(25, '13', '10', 'File', '30', '12', '360', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16'),
(26, '13', '10', 'Scale', '30', '7', '210', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16'),
(27, '13', '10', 'Dairy Book', '200', '8', '1600', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16'),
(28, '13', '10', 'Note Book', '300', '5', '1500', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16'),
(29, '13', '10', 'Color Pencil', '230', '1', '230', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16'),
(30, '13', '10', 'Pencil', '15', '1', '15', NULL, NULL, '2021-03-14', '2021-03-14 04:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$NM5OfH6qPIOEnT8pzAI0uunaffh1Y2MVTNs0zibXDqX1DbZoKKor.', '2020-12-02 06:29:37');

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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `qty`, `price`, `image`, `free`, `free1`, `free2`, `free3`, `created_at`, `updated_at`) VALUES
(1, 'Pencil', '3406', '37', '15', 'public/image/product/number-2-pencils.jpg', NULL, NULL, NULL, NULL, '2021-03-07 00:37:38', '2021-03-14 04:29:16'),
(2, 'Pen', '4022', '178', '5', 'public/image/product/81A+bhs4jkL._AC_SL1500_.jpg', NULL, NULL, NULL, NULL, '2021-03-07 01:02:04', '2021-03-14 04:29:16'),
(3, 'File', '8637', '51', '30', 'public/image/product/pvc-file-500x500.jpg', NULL, NULL, NULL, NULL, '2021-03-07 01:02:32', '2021-03-14 04:29:16'),
(4, 'Scale', '5664', '29', '30', 'public/image/product/12_inch100cm_stainless_steel_scale_sind_tk_35_pic2_1_1.jpg', NULL, NULL, NULL, NULL, '2021-03-07 01:03:01', '2021-03-14 04:29:16'),
(5, 'Dairy Book', '1177', '8', '200', 'public/image/product/new-year-diaries-500x500.jpg', NULL, NULL, NULL, NULL, '2021-03-09 01:36:40', '2021-03-14 04:29:16'),
(6, 'Note Book', '7416', '7', '300', 'public/image/product/school-exercise-note-book-500x500.jpg', NULL, NULL, NULL, NULL, '2021-03-09 01:37:01', '2021-03-14 04:29:16'),
(7, 'Jamiti Box', '1074', '0', '120', 'public/image/product/71ayPEizw5L._SL1500_.jpg', NULL, NULL, NULL, NULL, '2021-03-09 01:37:24', '2021-03-09 03:03:17'),
(8, 'Color Pencil', '3368', '6', '230', 'public/image/product/0019013_camel-gel-crayons-metallic-shades-6-colours.jpeg', NULL, NULL, NULL, NULL, '2021-03-09 01:37:50', '2021-03-14 04:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

CREATE TABLE `product_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`id`, `user`, `customer`, `orderid`, `qty`, `total`, `payment`, `due`, `status`, `free`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, '2', '4', '73263', '23', '950', '950', '0', '0', NULL, NULL, NULL, '2021-03-09', '2021-03-09 02:09:22'),
(2, '2', '1', '75477', '2', '35', '10', '25', '25', NULL, NULL, NULL, '2021-03-09', '2021-03-10 02:52:45'),
(3, '2', '5', '98328', '6', '1050', '150', '900', '900', NULL, NULL, NULL, '2021-03-09', '2021-03-11 05:52:24'),
(4, '3', '7', '49266', '3', '260', '100', '160', '160', NULL, NULL, NULL, '2021-03-10', '2021-03-10 07:03:05'),
(5, '3', '8', '82523', '3', '65', '60', '5', '5', NULL, NULL, NULL, '2021-03-11', '2021-03-11 04:57:20'),
(6, '2', '9', '31065', '2', '60', '30', '30', '30', NULL, NULL, NULL, '2021-03-11', '2021-03-11 05:36:48'),
(7, '3', '10', '6281', '3', '50', '50', '0', '0', NULL, NULL, NULL, '2021-03-14', '2021-03-14 03:46:24'),
(8, '3', '11', '53094', '3', '50', '50', '0', '0', NULL, NULL, NULL, '2021-03-14', '2021-03-14 03:46:46'),
(9, '3', '12', '66892', '2', '60', '54', '6', '6', NULL, NULL, NULL, '2021-03-14', '2021-03-14 03:47:43'),
(10, '2', '13', '12304', '42', '3955', '3000', '955', '955', NULL, NULL, NULL, '2021-03-14', '2021-03-14 04:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servicecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `servicecode`, `com`, `free2`, `free3`, `created_at`, `updated_at`) VALUES
(3, 'Photo Copy', '424', '4', NULL, NULL, '2021-03-06 23:35:44', '2021-03-13 09:25:38'),
(4, 'Print Ok', '380', '3', NULL, NULL, '2021-03-06 23:35:55', '2021-03-13 09:25:25'),
(5, 'Photo Print', '782', '2', NULL, NULL, '2021-03-06 23:41:22', '2021-03-13 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `service_sales`
--

CREATE TABLE `service_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paidby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_sales`
--

INSERT INTO `service_sales` (`id`, `user`, `service`, `total`, `payment`, `paidby`, `due`, `status`, `customer`, `com`, `free2`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '600', '600', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-07', '2021-03-07 06:28:28'),
(2, '3', '3', '500', '400', 'Cash', '100', '100', NULL, NULL, NULL, '2021-03-07', '2021-03-07 06:29:25'),
(3, '2', '3', '55', '55', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-07', '2021-03-07 06:37:24'),
(5, '2', '4', '50', '50', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-07', '2021-03-07 06:38:27'),
(6, '2', '4', '78', '78', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-07', '2021-03-07 06:43:46'),
(7, '2', '3', '788', '788', 'Bkash', '0', '0', '2', NULL, NULL, '2021-03-07', '2021-03-10 03:17:53'),
(8, '3', '5', '800', '130', 'Cash', '670', '670', '3', NULL, NULL, '2021-03-08', '2021-03-10 01:53:14'),
(10, '2', '3', '55', '55', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-09', '2021-03-09 05:11:05'),
(11, '2', '4', '78', '78', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-09', '2021-03-09 07:22:01'),
(12, '2', '4', '400', '314', 'Cash', '86', '86', '6', NULL, NULL, '2021-03-09', '2021-03-10 03:11:06'),
(14, '3', '3', '89', '89', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-10', '2021-03-10 06:18:35'),
(15, '3', '4', '56', '56', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-11', '2021-03-11 04:55:31'),
(16, '2', '3', '44', '44', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-11', '2021-03-11 05:36:12'),
(17, '2', '4', '400', '400', 'Cash', '0', '0', NULL, NULL, NULL, '2021-03-11', '2021-03-11 05:36:24'),
(18, '2', '4', '45', '30', 'Cash', '15', '15', NULL, NULL, NULL, '2021-03-11', '2021-03-11 05:42:42'),
(19, '2', '3', '100', '100', 'Cash', '0', '0', NULL, '4', NULL, '2021-03-13', '2021-03-13 10:05:22'),
(20, '2', '5', '50', '50', 'Cash', '0', '0', NULL, '1', NULL, '2021-03-13', '2021-03-13 10:02:25'),
(21, '2', '4', '100', '100', 'Cash', '0', '0', NULL, '3', NULL, '2021-03-13', '2021-03-13 10:05:59'),
(22, '2', '5', '56', '56', 'Cash', '0', '0', NULL, '1.12', NULL, '2021-03-14', '2021-03-14 04:47:28'),
(23, '2', '5', '500', '500', 'Cash', '0', '0', NULL, '10', NULL, '2021-03-14', '2021-03-14 04:47:35'),
(24, '3', '3', '455', '455', 'Cash', '0', '0', NULL, '18.2', NULL, '2021-03-17', '2021-03-17 12:59:20'),
(25, '3', '5', '100', '100', 'Cash', '0', '0', NULL, '2', NULL, '2021-03-17', '2021-03-17 13:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5SP9OhV3aH8Vnx4xqeOx1NAd2tWl9rlVSUE07Rvs', 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiSFh2NTh1SnJ1VUpSMEplTklNRXJrN200QTMyYXVnWTFTQlZTa3JrbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovL2xvY2FsaG9zdC9uaXJhL2FkbWluL3BlbmRpbmciO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozOToiaHR0cDovL2xvY2FsaG9zdC9uaXJhL2FkbWluL3NhbGV2aWV3LzEwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7czo0OiJ0eXBlIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRRTDE1TFlNLkJwaUg4Wkt4L0EyVmJlSjZKY1Btc1RjUlZrU2NUbTVqQ3lIWEJCaUUwR3VhLiI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkUUwxNUxZTS5CcGlIOFpLeC9BMlZiZUo2SmNQbXNUY1JWa1NjVG01akN5SFhCQmlFMEd1YS4iO30=', 1615988148),
('ooNs2mI33DOY45tSLKEAgH3ttQXHWFta4ADJBGQj', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', 'YTo4OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCR4QjJSbE4xQmEwLjczV3dqUklCRlZ1eGcuMy5MaG5PbDZ5ZnJlY2hRQmkwWlJUcXljcGQ4UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3QvbmlyYS9yZXBvcnQiO31zOjY6Il90b2tlbiI7czo0MDoiWkpNblg1RWdjbU1rU3R0VTN1WTUwcWlyY01VcW9yQ2VhRXhVckF6ciI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC9uaXJhL2xvYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoidHlwZSI7aToyO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkeEIyUmxOMUJhMC43M1d3alJJQkZWdXhnLjMuTGhuT2w2eWZyZWNoUUJpMFpSVHF5Y3BkOFMiO30=', 1615986614);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `qty`, `supplier`, `invoice`, `amount`, `free`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, '1', '20', 'Abu Sayeed', '1234', '200', NULL, NULL, NULL, '2021-03-07', '2021-03-07 02:43:42'),
(2, '3', '20', 'Mr. Selim', '12klty', '2500', NULL, NULL, NULL, '2021-03-07', '2021-03-07 02:40:44');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT 'admin=1 and User=2',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `com` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `loan` int(11) DEFAULT NULL,
  `free` int(11) DEFAULT NULL,
  `free2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `type`, `status`, `created_at`, `mobile`, `address`, `updated_at`, `com`, `sale`, `loan`, `free`, `free2`) VALUES
(1, 'Abu Sayeed', 'abu.sayeed.diu@gmail.com', NULL, '$2y$10$917Q25D1oLhXU/fek5qb0.JgQFH57iOlieT2hn/C8erB3OsVxs9rC', NULL, NULL, NULL, NULL, 'public/image/user/icon.png', '1', '1', '2021-03-13 18:12:49', '01318712782', 'Mirpur -13,Road-4 Dhaka', '2021-03-13 12:12:49', NULL, NULL, NULL, NULL, NULL),
(2, 'Shop', 'shop@shop.com', NULL, '$2y$10$zuGbXU0KC0NtizGIyHnSKuU1YX9htUB3zRefUp1DUMzN6.Jll6gui', NULL, NULL, NULL, NULL, 'public/image/user/e2295f7b9b470f873d0cc4b088ac0726.jpg', '2', '1', '2020-12-02 00:00:00', '01798493172', 'Pangsha,Cadet College,Air port, Barisal', '2021-03-11 03:02:58', NULL, NULL, NULL, NULL, NULL),
(3, 'sayeed khan', 'shop2@shop.com', NULL, '$2y$10$xB2RlN1Ba0.73WwjRIBFVuxg.3.LhnOl6yfrechQBi0ZRTqycpd8S', NULL, NULL, NULL, NULL, 'public/image/user/602a3d4d982c84ertftyu.jpg', '2', '1', '2021-03-06 00:00:00', '01318712782', 'Dhaka', '2021-03-17 13:09:48', 0, 0, 0, NULL, NULL),
(10, 'Sayeed Islam', 'admin@admin.com', NULL, '$2y$10$QL15LYM.BpiH8ZKx/A2VbeJ6JcPmsTcRVkScTm5jCyHXBBiE0Gua.', NULL, NULL, NULL, NULL, 'public/image/user/d958ea13928499.5627a60f7fbc2.png', '1', '1', '2020-12-02 00:00:00', '01318712782', 'Dhaka,Bangladesh', '2021-03-17 13:15:26', 1, 1, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `due_receives`
--
ALTER TABLE `due_receives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sales`
--
ALTER TABLE `service_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`,`instance`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `due_receives`
--
ALTER TABLE `due_receives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_sales`
--
ALTER TABLE `service_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
