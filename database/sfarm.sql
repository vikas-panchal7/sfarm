-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 11:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_commisons`
--

CREATE TABLE `agent_commisons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agid` bigint(20) UNSIGNED NOT NULL,
  `commison` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_commisons`
--

INSERT INTO `agent_commisons` (`id`, `agid`, `commison`, `created_at`, `updated_at`) VALUES
(1, 4, 12, '2024-03-14 13:52:33', '2024-03-14 14:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `agent_products`
--

CREATE TABLE `agent_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` bigint(20) UNSIGNED NOT NULL,
  `spid` bigint(20) UNSIGNED NOT NULL,
  `agid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_products`
--

INSERT INTO `agent_products` (`id`, `pid`, `spid`, `agid`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 4, '2024-03-13 13:52:57', '2024-03-13 13:52:57'),
(2, 4, 7, 4, '2024-03-13 13:53:18', '2024-03-13 13:53:18'),
(3, 3, 4, 4, '2024-03-13 13:59:42', '2024-03-13 13:59:42'),
(6, 3, 5, 4, '2024-03-14 14:10:23', '2024-03-14 14:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `agent_product_prices`
--

CREATE TABLE `agent_product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `sub_product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_product_prices`
--

INSERT INTO `agent_product_prices` (`id`, `products_id`, `sub_product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '500.00', NULL, NULL),
(2, 3, 4, '200.00', NULL, NULL),
(3, 3, 5, '200.00', NULL, NULL),
(4, 4, 7, '500.00', NULL, NULL),
(5, 5, 8, '500.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` bigint(20) UNSIGNED NOT NULL,
  `spid` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `uid`, `spid`, `price`, `qty`, `total_price`, `created_at`, `updated_at`) VALUES
(14, 5, 6, '25.00', 1, '25.00', '2024-04-02 15:19:21', '2024-04-02 15:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `contact`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', '9797979779', 'sfs@gmail.com', 'nlnl', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_product_prices`
--

CREATE TABLE `customer_product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `sub_product_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_product_prices`
--

INSERT INTO `customer_product_prices` (`id`, `products_id`, `sub_product_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '25.00', NULL, NULL),
(2, 5, 8, '20.00', NULL, NULL),
(3, 4, 7, '25.00', NULL, NULL),
(4, 3, 4, '80.00', NULL, NULL),
(5, 3, 5, '25.00', NULL, NULL),
(6, 3, 10, '50.00', NULL, NULL),
(7, 4, 11, '10.00', NULL, NULL),
(8, 5, 9, '45.00', NULL, NULL);

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
(5, '2024_02_03_100205_create_register_table', 1),
(6, '2024_02_06_111728_create_products_table', 2),
(7, '2024_02_27_153510_create_subproducts_table', 3),
(8, '2024_02_27_163618_create_pincode_table', 4),
(9, '2024_03_01_043020_agent_products', 5),
(10, '2024_03_02_112426_customer_product_price', 6),
(11, '2024_03_02_112555_agent_product_price', 7),
(12, '2024_03_02_153751_contacts', 8),
(13, '2024_03_14_180614_create_table_agent_commisons', 9),
(14, '2024_03_14_182634_create__agent_commisons', 10),
(15, '2024_03_14_184006_create_table_agent_commisons', 11),
(16, '2024_03_15_184359_create_purchase_bills_table', 12),
(18, '2024_03_15_180515_create_purchases_table', 13),
(19, '2024_03_26_182629_create_sales_bills_table', 14),
(20, '2024_03_26_183000_create_sales_table', 14),
(21, '2024_03_28_191341_create_carts_table', 15),
(25, '2024_04_02_191426_create_orders_table', 16),
(26, '2024_04_02_192420_create_order_products_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `first_name`, `last_name`, `street_address`, `town_city`, `postcode_zip`, `phone`, `email_address`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'Aditi', 'Sharma', 'Valod', 'Valod', '394640', '9797979797', 'v@gmail.com', 150, 'pending', '2024-04-02 15:17:25', '2024-04-02 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `oid` bigint(20) UNSIGNED NOT NULL,
  `spid` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`oid`, `spid`, `price`, `qty`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 11, '10.00', 10, '100.00', '2024-04-02 15:17:25', '2024-04-02 15:17:25'),
(1, 10, '50.00', 1, '50.00', '2024-04-02 15:17:25', '2024-04-02 15:17:25');

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
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `pincode`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '394650', 1, '2024-02-27 11:34:41', '2024-02-27 11:34:41'),
(3, '369652', 1, '2024-02-27 11:40:44', '2024-02-27 11:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `created_at`, `updated_at`) VALUES
(2, 'Flower', '2024-02-26 22:51:07', '2024-02-26 22:51:07'),
(3, 'Vegetable', '2024-02-26 22:52:21', '2024-02-26 22:52:21'),
(4, 'Fertilizer', '2024-02-26 22:55:34', '2024-02-26 22:55:34'),
(5, 'Fruit', '2024-02-27 10:03:03', '2024-02-27 10:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_bill_id` bigint(20) UNSIGNED NOT NULL,
  `sproduct_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_bill_id`, `sproduct_id`, `price`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '500.00', 25, '625.00', '2024-03-24 05:24:07', '2024-03-24 05:24:07'),
(2, 2, 6, '500.00', 10, '250.00', '2024-03-24 05:24:20', '2024-03-24 05:24:20'),
(3, 2, 7, '500.00', 25, '625.00', '2024-03-24 05:24:20', '2024-03-24 05:24:20'),
(4, 3, 6, '500.00', 10, '250.00', '2024-03-26 13:25:24', '2024-03-26 13:25:24'),
(5, 3, 7, '500.00', 10, '250.00', '2024-03-26 13:25:24', '2024-03-26 13:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_bills`
--

CREATE TABLE `purchase_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `farmer_id` bigint(20) UNSIGNED NOT NULL,
  `commission` bigint(20) UNSIGNED NOT NULL,
  `bill_amount` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_bills`
--

INSERT INTO `purchase_bills` (`id`, `agent_id`, `farmer_id`, `commission`, `bill_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 12, 550, '625.00', '2024-03-24 05:24:07', '2024-03-24 05:24:07'),
(2, 4, 6, 12, 770, '875.00', '2024-03-24 05:24:20', '2024-03-24 05:24:20'),
(3, 4, 8, 12, 440, '500.00', '2024-03-26 13:25:24', '2024-03-26 13:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `user_type`, `first_name`, `middle_name`, `last_name`, `address`, `contact`, `gender`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, '0', 'Vikas', 'kanubhai', 'panchal', 'valodasdas', '7987987895', 'Male', 'admin@gmail.com', 'admin', '2024-02-03 05:17:52', '2024-03-06 12:37:18'),
(3, '1', 'Vikas', 'k', 'Panchal', 'valod', '9797972010', 'Male', 'farmer@gmail.com', 'admin', '2024-02-03 05:31:38', '2024-02-03 05:31:38'),
(4, '3', 'Vinod', 'K', 'Panchal', 'valod', '9915296330', 'Female', 'agent@gmail.com', 'admin', '2024-02-03 05:33:36', '2024-03-26 13:58:33'),
(5, '2', 'Aditi', 'k', 'va', 'vjhb', '9687158401', 'Male', 'user@gmail.com', 'admin', '2024-02-03 05:38:39', '2024-03-27 15:21:15'),
(6, '1', 'Arjun', 'k', 'Panchal', 'valod', '9797979797', 'Male', 'vkp@gmail.com', 'admin', '2024-02-04 00:48:09', '2024-02-04 00:48:09'),
(7, '1', 'Ankit', 'k', 'Patel', NULL, NULL, NULL, NULL, NULL, '2024-03-24 05:22:03', '2024-03-24 05:22:03'),
(8, '2', 'Ankit', 'K', 'patel', NULL, NULL, NULL, NULL, NULL, '2024-03-26 13:16:27', '2024-03-26 13:16:27'),
(9, '2', 'Jaymeen', 'V', 'Patel', NULL, NULL, NULL, NULL, NULL, '2024-03-26 13:18:05', '2024-03-26 13:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_bill_id` bigint(20) UNSIGNED NOT NULL,
  `sproduct_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_bill_id`, `sproduct_id`, `price`, `quantity`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '500.00', 10, '250.00', '2024-03-26 13:40:05', '2024-03-26 13:40:05'),
(2, 1, 4, '200.00', 2, '20.00', '2024-03-26 13:40:05', '2024-03-26 13:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `sales_bills`
--

CREATE TABLE `sales_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` bigint(20) UNSIGNED NOT NULL,
  `farmer_id` bigint(20) UNSIGNED NOT NULL,
  `commission` bigint(20) UNSIGNED NOT NULL,
  `bill_amount` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_bills`
--

INSERT INTO `sales_bills` (`id`, `agent_id`, `farmer_id`, `commission`, `bill_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 4, 9, 12, 302, '270.00', '2024-03-26 13:40:04', '2024-03-26 13:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `sub_products`
--

CREATE TABLE `sub_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subproduct_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subproduct_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_crop_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_products`
--

INSERT INTO `sub_products` (`id`, `subproduct_name`, `subproduct_description`, `product_crop_details`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(4, 'Oninons', 'nohblj', 'njlnn', 'product-9.jpg', 3, '2024-02-29 23:31:43', '2024-02-29 23:31:43'),
(5, 'PURPLE CABBAGE', 'gdfbdf', 'sdfsdg', 'product-4.jpg', 3, '2024-02-29 23:32:28', '2024-02-29 23:32:28'),
(6, 'Carrot', 'asfasf', 'sfsaf', 'product-7.jpg', 2, '2024-02-29 23:33:18', '2024-03-27 14:21:53'),
(7, 'Ferti', 'asfas', 'sdfsd', 'image_6.jpg', 4, '2024-02-29 23:33:41', '2024-02-29 23:33:41'),
(8, 'Strwaberry', 'sdfsd', 'sdfds', 'product-2.jpg', 5, '2024-02-29 23:34:04', '2024-02-29 23:34:04'),
(9, 'Apple', 'sbadbasbnlb', 'asbdobasj', 'product-10.jpg', 5, '2024-03-27 13:12:48', '2024-03-27 13:12:48'),
(10, 'Tomato', 'safsadaf', 'lmnlnl', 'product-5.jpg', 3, '2024-03-27 13:13:21', '2024-03-27 13:13:21'),
(11, 'GREEN BEANS', 'dsgrd', 'shdhjrw', 'product-3.jpg', 4, '2024-03-27 13:18:40', '2024-03-27 13:18:40'),
(12, 'BROCOLLI', 'bnijbojb', 'bbhibvhb', 'product-6.jpg', 2, '2024-03-27 13:24:06', '2024-03-27 13:24:06');

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
(1, 'Vikas', 'admin@gmail.com', NULL, '12345', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_commisons`
--
ALTER TABLE `agent_commisons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_products`
--
ALTER TABLE `agent_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_products_pid_foreign` (`pid`),
  ADD KEY `agent_products_spid_foreign` (`spid`),
  ADD KEY `agent_products_agid_foreign` (`agid`);

--
-- Indexes for table `agent_product_prices`
--
ALTER TABLE `agent_product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_product_prices_products_id_foreign` (`products_id`),
  ADD KEY `agent_product_prices_sub_product_id_foreign` (`sub_product_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_uid_foreign` (`uid`),
  ADD KEY `carts_spid_foreign` (`spid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_product_prices`
--
ALTER TABLE `customer_product_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_product_prices_products_id_foreign` (`products_id`),
  ADD KEY `customer_product_prices_sub_product_id_foreign` (`sub_product_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD KEY `order_products_oid_foreign` (`oid`),
  ADD KEY `order_products_spid_foreign` (`spid`);

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
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_purchase_bill_id_foreign` (`purchase_bill_id`),
  ADD KEY `purchases_sproduct_id_foreign` (`sproduct_id`);

--
-- Indexes for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_bills_agent_id_foreign` (`agent_id`),
  ADD KEY `purchase_bills_farmer_id_foreign` (`farmer_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `register_email_unique` (`email`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_sale_bill_id_foreign` (`sale_bill_id`),
  ADD KEY `sales_sproduct_id_foreign` (`sproduct_id`);

--
-- Indexes for table `sales_bills`
--
ALTER TABLE `sales_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_bills_agent_id_foreign` (`agent_id`),
  ADD KEY `sales_bills_farmer_id_foreign` (`farmer_id`);

--
-- Indexes for table `sub_products`
--
ALTER TABLE `sub_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subproducts_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `agent_commisons`
--
ALTER TABLE `agent_commisons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_products`
--
ALTER TABLE `agent_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agent_product_prices`
--
ALTER TABLE `agent_product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_product_prices`
--
ALTER TABLE `customer_product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_bills`
--
ALTER TABLE `sales_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_products`
--
ALTER TABLE `sub_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent_products`
--
ALTER TABLE `agent_products`
  ADD CONSTRAINT `agent_products_agid_foreign` FOREIGN KEY (`agid`) REFERENCES `registers` (`id`),
  ADD CONSTRAINT `agent_products_pid_foreign` FOREIGN KEY (`pid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `agent_products_spid_foreign` FOREIGN KEY (`spid`) REFERENCES `sub_products` (`id`);

--
-- Constraints for table `agent_product_prices`
--
ALTER TABLE `agent_product_prices`
  ADD CONSTRAINT `agent_product_prices_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `agent_product_prices_sub_product_id_foreign` FOREIGN KEY (`sub_product_id`) REFERENCES `sub_products` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_spid_foreign` FOREIGN KEY (`spid`) REFERENCES `sub_products` (`id`),
  ADD CONSTRAINT `carts_uid_foreign` FOREIGN KEY (`uid`) REFERENCES `registers` (`id`);

--
-- Constraints for table `customer_product_prices`
--
ALTER TABLE `customer_product_prices`
  ADD CONSTRAINT `customer_product_prices_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `customer_product_prices_sub_product_id_foreign` FOREIGN KEY (`sub_product_id`) REFERENCES `sub_products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `registers` (`id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_oid_foreign` FOREIGN KEY (`oid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_spid_foreign` FOREIGN KEY (`spid`) REFERENCES `sub_products` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_purchase_bill_id_foreign` FOREIGN KEY (`purchase_bill_id`) REFERENCES `purchase_bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_sproduct_id_foreign` FOREIGN KEY (`sproduct_id`) REFERENCES `sub_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_bills`
--
ALTER TABLE `purchase_bills`
  ADD CONSTRAINT `purchase_bills_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_bills_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_sale_bill_id_foreign` FOREIGN KEY (`sale_bill_id`) REFERENCES `sales_bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_sproduct_id_foreign` FOREIGN KEY (`sproduct_id`) REFERENCES `sub_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_bills`
--
ALTER TABLE `sales_bills`
  ADD CONSTRAINT `sales_bills_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_bills_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `registers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_products`
--
ALTER TABLE `sub_products`
  ADD CONSTRAINT `subproducts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
