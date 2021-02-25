-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2021 at 02:40 PM
-- Server version: 5.7.33-0ubuntu0.18.04.1
-- PHP Version: 7.3.26-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shez`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT 'ex. uploads/langs/ar.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `title`, `alt`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', '', 'uploads/categories/8c2b15996ae36e20b88ea40de36b60ec.jpg', '2019-11-18 09:46:00', '2019-11-18 09:54:24', NULL),
(2, '', '', 'uploads/categories/1e3b503babf7187d0114b5304d2e6d6f.jpg', '2019-11-18 09:58:55', '2019-11-18 09:58:55', NULL),
(3, '', '', 'uploads/categories/1a52a4563450124638df0eb364bb2185.jpg', '2019-11-18 09:59:21', '2019-11-18 09:59:21', NULL),
(4, '', '', 'uploads/categories/4449d57178d7bda9996dee01121ec037.jpg', '2019-11-18 10:00:10', '2019-11-18 10:00:10', NULL),
(5, '', '', 'uploads/categories/5985ab09a98e53cda8c0ed2ed94185c8.jpg', '2019-11-18 10:39:27', '2019-11-18 10:39:27', NULL),
(6, '', '', 'uploads/categories/015924beaf5297467300feb23f621648.jpg', '2019-11-18 10:44:32', '2019-11-18 10:44:32', NULL),
(7, '', '', 'uploads/categories/b23e5bd2ad0d1b675c60795bb55642fe.jpg', '2019-11-18 10:53:20', '2019-11-18 10:53:20', NULL),
(8, '', '', 'uploads/categories/b56b2e9308c15e30a451d2611e85fe39.jpeg', '2019-11-18 11:00:39', '2019-11-18 11:00:39', NULL),
(9, '', '', 'uploads/categories/e91a0351b8d6b43c187008f31bd49471.jpeg', '2019-11-18 11:01:15', '2019-11-18 11:01:15', NULL),
(10, '', '', 'uploads/categories/07e769369b9844f5777a9c1826c6ab84.jpeg', '2019-11-18 11:08:21', '2019-11-18 11:08:21', NULL),
(11, '', '', 'uploads/categories/c7f065c032a5f447386b30f41e9febcf.jpeg', '2019-11-18 11:12:49', '2019-11-18 11:12:49', NULL),
(12, '', '', 'uploads/categories/2bf921cd9a242924a5d73af82fa458d7.jpeg', '2019-11-18 11:15:40', '2019-11-18 11:15:40', NULL),
(13, '', '', 'uploads/categories/858f7be299944f5d19e93ec7d5f6e001.jpeg', '2019-11-18 11:16:14', '2019-11-18 11:16:14', NULL),
(14, '', '', 'uploads/categories/9746b3426c127d94f18386305c2f2254.png', '2019-11-18 11:20:12', '2019-11-18 11:20:12', NULL),
(15, '', '', 'uploads/categories/c16ad8218f8b20a48aa2776272af3ee2.jpeg', '2019-11-18 11:21:49', '2019-11-18 11:21:49', NULL),
(16, '', '', 'uploads/categories/893878f253b032dab18aa7c5a6214a0a.jpeg', '2019-11-18 11:24:48', '2019-11-18 11:24:48', NULL),
(17, '', '', 'uploads/categories/25602b412fb236d48b84e2ab676f3efd.png', '2019-11-18 11:25:00', '2019-12-02 12:31:13', NULL),
(18, '', '', 'uploads/plans/c7ac526aeb6f31151de74534f5b01189.png', '2019-11-18 13:08:06', '2019-12-30 08:43:48', NULL),
(19, '', '', 'uploads/plans/98f117d308e52baea50ef20bf48fc635.png', '2019-11-18 13:11:43', '2019-12-30 08:32:18', NULL),
(20, '', '', 'uploads/settings/logo/8b130455e42ad6f45e30c4fe3f9da74d.jpeg', '2019-11-18 13:40:24', '2021-02-25 10:55:49', NULL),
(21, '', '', 'uploads/settings/icon/eeeddde20ffb46db1c9d55736696cda4.jpeg', '2019-11-18 13:40:24', '2021-02-25 10:55:49', NULL),
(22, '', '', 'uploads/categories/c364076b12f0be35a0fd0a1c0801dfba.png', '2019-11-18 13:48:29', '2019-12-24 14:39:09', NULL),
(23, '', '', 'uploads/brands/images/370166a5dc84ab80e37d6c2e26fa2da7.jpeg', '2019-11-18 16:02:13', '2019-11-18 16:02:13', NULL),
(24, '', '', 'uploads/brands/covers/0a1599a258928936fed7c15a02c0a509.jpeg', '2019-11-18 16:02:13', '2019-11-18 16:02:13', NULL),
(25, '', '', 'uploads/brands/gallery/eea8c97d1cf16e7ab9ae2eb37a927d8d.jpeg', '2019-11-18 16:02:13', '2019-11-18 16:02:13', NULL),
(26, '', '', 'uploads/brands/gallery/9c97fa2b334696826be1b81c609a6b07.jpeg', '2019-11-18 16:02:13', '2019-11-18 16:02:13', NULL),
(27, '', '', 'uploads/brands/gallery/85c6b29357dbbb8c5d98d99266d6156d.jpg', '2019-11-18 16:02:13', '2019-11-18 16:02:13', NULL),
(28, '', '', 'uploads/brands/images/8ac8077e68e67256cba61bc133cdd6df.jpeg', '2019-11-18 16:02:47', '2019-11-18 16:02:47', NULL),
(29, '', '', 'uploads/brands/covers/466ad2f06ceb93c5fdab208b342d6318.jpeg', '2019-11-18 16:02:47', '2019-11-18 16:02:47', NULL),
(30, '', '', 'uploads/brands/gallery/554177ec10ee5b3d5f157344d75ff240.jpeg', '2019-11-18 16:02:47', '2019-11-18 16:02:47', NULL),
(31, '', '', 'uploads/brands/gallery/69f32e9566989de6155245db5d4ec203.jpeg', '2019-11-18 16:02:47', '2019-11-18 16:02:47', NULL),
(32, '', '', 'uploads/brands/gallery/18130fef2fec083cfb417a49fbb05ef9.jpg', '2019-11-18 16:02:47', '2019-11-18 16:02:47', NULL),
(33, '', '', 'uploads/brands/images/e28cacef248cc7bb66a455a92d224762.jpeg', '2019-11-18 16:04:31', '2019-11-18 16:04:31', NULL),
(34, '', '', 'uploads/brands/covers/6985838e5bec748453a1d4274ce2b841.jpeg', '2019-11-18 16:04:31', '2019-11-18 16:04:31', NULL),
(35, '', '', 'uploads/brands/gallery/b52abdef6d2da55cf30ba60a7eee2f64.jpeg', '2019-11-18 16:04:31', '2019-11-18 16:04:31', NULL),
(36, '', '', 'uploads/brands/gallery/8ecc6a659f1e6a2a94f4a5f531e96e71.jpeg', '2019-11-18 16:04:31', '2019-11-18 16:04:31', NULL),
(37, '', '', 'uploads/brands/gallery/fddd55e9278f55fb9b80c8dacb44b2b6.jpg', '2019-11-18 16:04:31', '2019-11-18 16:04:31', NULL),
(38, '', '', 'uploads/brands/images/addb99cbea001ead0e0320ee457d592e.jpeg', '2019-11-18 16:05:56', '2019-11-18 16:05:56', NULL),
(39, '', '', 'uploads/brands/covers/d7e73e03ff6c230a97f74ff0f714fdb8.jpeg', '2019-11-18 16:05:56', '2019-11-18 16:05:56', NULL),
(40, '', '', 'uploads/brands/gallery/a87b92392b7f7fbd459abbd3e45995a4.jpeg', '2019-11-18 16:05:56', '2019-11-18 16:05:56', NULL),
(41, '', '', 'uploads/brands/gallery/356fe2f552ea6b0eade4574c29d5b261.jpeg', '2019-11-18 16:05:56', '2019-11-18 16:05:56', NULL),
(42, '', '', 'uploads/brands/images/e796afc344dd21141fadffa72ad1f37a.jpeg', '2019-11-18 16:15:01', '2021-01-13 13:27:53', NULL),
(43, '', '', 'uploads/brands/covers/2e9fe45f4848e775035902a0fc52245f.png', '2019-11-18 16:15:01', '2021-01-13 13:27:53', NULL),
(44, '', '', 'uploads/new_slider_items/21b8b03da442ef91b078cefd56f8dd98.jpg', '2019-11-18 16:15:01', '2019-12-02 12:07:02', NULL),
(45, '', '', 'uploads/new_slider_items/adbd4520075fd302561d2f02ec592c21.jpg', '2019-11-18 16:15:01', '2019-11-23 08:53:54', NULL),
(46, '', '', 'uploads/brands/images/d324d43153e71406a3b605e61c70abfa.png', '2019-11-18 16:20:32', '2020-01-13 08:12:56', NULL),
(47, '', '', 'uploads/brands/covers/893c323228d6445ddadff94a2c098709.png', '2019-11-18 16:20:32', '2020-01-13 08:12:56', NULL),
(48, '', '', 'uploads/new_slider_items/2b27ae4451f69699f98617f7505ddd37.png', '2019-11-18 16:20:32', '2020-01-13 08:12:56', NULL),
(49, '', '', 'uploads/brands/images/b88c03c197790197c39979346373c275.jpeg', '2019-11-19 11:42:43', '2019-11-19 11:42:43', NULL),
(50, '', '', 'uploads/offers/gallery/f6a94f94d96233d49879c5d9ddabd84d.jpeg', '2019-11-19 14:38:09', '2019-11-19 14:38:09', NULL),
(51, '', '', 'uploads/offers/gallery/2efd68f685aaf53e9573e5b25b457108.jpeg', '2019-11-19 14:38:09', '2019-11-19 14:38:09', NULL),
(52, '', '', 'uploads/offers/gallery/f6435a5614f1c23d3b4b12717b093217.jpeg', '2019-11-19 14:59:03', '2019-11-19 15:25:28', NULL),
(53, '', '', 'uploads/offers/gallery/bbf2c94354fa048ecf3e34e5b15e063d.jpeg', '2019-11-19 15:06:00', '2019-11-19 15:25:09', NULL),
(54, '', '', 'uploads/brands/branches/offers/76c634818558314802d490d933c918fd.jpeg', '2019-11-19 15:25:09', '2019-11-19 15:25:09', NULL),
(55, '', '', 'uploads/brands/branches/offers/d32f92898d4786799f00ed86a1d66798.jpeg', '2019-11-19 15:25:28', '2019-11-19 15:25:28', NULL),
(56, '', '', 'uploads/brands/branches/offers/4c3996bd6cf87035d45bf90e0dfff345.jpeg', '2019-11-20 10:47:27', '2019-11-20 10:49:50', NULL),
(57, '', '', 'uploads/brands/branches/offers/32407b7bab6b24d6aec46484378a1751.jpeg', '2019-11-20 10:50:17', '2019-11-20 10:50:17', NULL),
(58, '', '', 'uploads/categories/385def0d53df377710d2fffd032ad925.png', '2019-11-20 13:05:13', '2019-12-24 14:41:16', NULL),
(59, '', '', 'uploads/brands/branches/offers/4556322d38ca343b6572c2ab90898370.jpeg', '2019-11-23 11:39:13', '2019-11-23 11:39:13', NULL),
(60, '', '', 'uploads/brands/branches/offers/9e159b1ed94f6e9b2bc157b465007455.jpeg', '2019-11-23 11:51:09', '2019-11-23 12:00:17', NULL),
(61, '', '', 'uploads/offers/gallery/e1b8a241c30ae3a60c0878a51b9c2f40.jpeg', '2019-11-23 11:51:09', '2019-11-23 12:00:17', NULL),
(62, '', '', 'uploads/brands/branches/offers/8b5f8cb1efce6031f1c8783bb74ea353.jpeg', '2019-11-23 13:06:29', '2019-11-23 13:06:29', NULL),
(63, '', '', 'uploads/offers/gallery/b90891fcb723141b98fb1d6ff81c2617.jpeg', '2019-11-23 13:06:29', '2019-11-23 13:06:29', NULL),
(64, '', '', 'uploads/brands/branches/offers/5fcae34e60fec2861da152f26711aee4.png', '2019-11-25 09:06:06', '2019-12-02 12:08:40', NULL),
(65, '', '', 'uploads/new_slider_items/f3cce5737a0b6f4e90cdfff2665c7a68.png', '2019-11-25 09:06:06', '2019-12-02 12:08:40', NULL),
(66, '', '', 'uploads/brands/branches/offers/d9d07007eacc84feba4c134564d16e13.jpeg', '2019-11-25 09:29:54', '2019-11-25 09:29:54', NULL),
(67, '', '', 'uploads/admins/f855c5c3a596e3ef34a7aa6166e9a3b0.jpeg', '2019-11-25 12:11:32', '2019-11-25 12:11:48', NULL),
(68, '', '', 'uploads/brands/branches/offers/55687ff7da48fe7acffc7c8258650c07.jpeg', '2019-11-26 09:51:35', '2019-11-26 09:51:35', NULL),
(69, '', '', 'uploads/offers/gallery/fe7cfb730014f7f0a614b42eb103942b.jpg', '2019-11-26 09:51:35', '2019-11-26 09:51:35', NULL),
(70, '', '', 'uploads/brands/branches/offers/65686a5941acf05840a60f50e971a36b.jpeg', '2019-11-26 10:57:35', '2019-11-26 10:57:35', NULL),
(71, '', '', 'uploads/langs/33c06be1ad6b06f384a15c993857a8d0.jpeg', '2019-12-01 11:53:33', '2021-02-24 12:47:53', NULL),
(72, '', '', 'uploads/langs/998cd58ba45859adae5b8e1253961718.jpeg', '2019-12-01 11:53:42', '2021-01-16 15:31:38', NULL),
(73, '', '', 'uploads/pages/6d1d31039fa3d8a9a5fcbf6d5f196174.png', '2019-12-01 11:55:36', '2021-02-24 12:50:33', NULL),
(74, '', '', 'uploads/pages/c54ba1d277650fe8897ee0928e834ee0.png', '2019-12-01 11:56:25', '2019-12-24 14:27:40', NULL),
(75, '', '', 'uploads/payment_methods/fac42cd3cb48b25e7567065910b52dcc.png', '2019-12-01 12:03:55', '2021-01-22 11:15:10', NULL),
(76, '', '', 'uploads/new_slider_items/60404d2ba3f4ae655772244b4502bd28.jpeg', '2019-12-02 12:07:02', '2021-01-13 13:27:53', NULL),
(77, '', '', 'uploads/brands/branches/offers/09ffc5c00723b4063ac7e5ff7ffc6e56.png', '2019-12-02 12:33:03', '2019-12-02 12:33:03', NULL),
(78, '', '', 'uploads/offers/gallery/567b00f0cf9c36c6fe8900b5601b2d05.png', '2019-12-02 12:33:03', '2019-12-02 12:33:03', NULL),
(79, '', '', 'uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png', '2019-12-03 11:14:14', '2020-01-21 12:56:18', NULL),
(80, '', '', 'uploads/new_slider_items/9dadf8e4abd8994bcfdd45504add25e3.png', '2019-12-03 11:14:14', '2020-01-21 12:56:18', NULL),
(81, '', '', 'uploads/new_slider_items/df0753823b3d820f3bbf02c5e75937f6.png', '2019-12-04 14:16:12', '2020-01-21 12:56:18', NULL),
(82, '', '', 'uploads/users/a6b5d081b3c5e49cd92379957fc2ed9c.png', '2019-12-08 15:22:18', '2020-01-14 11:55:57', NULL),
(83, '', '', 'uploads/new_slider_items/c2fcd297e124faaa5ee01685509f5d99.png', '2019-12-14 12:04:54', '2020-01-21 12:56:18', NULL),
(84, '', '', 'uploads/brands/branches/offers/f3c86fb1afd7957dd3c8d2d7c7a29814.png', '2019-12-14 12:06:45', '2020-01-04 09:31:45', NULL),
(85, '', '', 'uploads/new_slider_items/3e44577df10deed347761d0da7b03586.png', '2019-12-14 12:07:04', '2020-01-04 09:31:45', NULL),
(86, '', '', 'uploads/brands/branches/offers/ca43919ca713983dc49d5b87b3808680.png', '2019-12-14 12:11:39', '2020-01-04 09:32:31', NULL),
(87, '', '', 'uploads/new_slider_items/b79e363aed2387e1609a57ff3e260a58.png', '2019-12-14 12:11:39', '2020-01-04 09:32:31', NULL),
(88, '', '', 'uploads/social_list/a8ac196fba9e887cb7b9a16d4b05e0e8.png', '2019-12-24 14:14:58', '2021-02-24 12:51:55', NULL),
(89, '', '', 'uploads/social_list/f2b185fba01c595d1c7c4ff82b7c54d6.png', '2019-12-24 14:15:15', '2021-01-22 10:56:24', NULL),
(90, '', '', 'uploads/brands/branches/offers/6741ac1f6523415624a0cf081ee577a4.png', '2019-12-24 14:46:05', '2020-01-04 09:32:00', NULL),
(91, '', '', 'uploads/brands/images/1cb6170d850b6abf320205e79b55085e.jpeg', '2019-12-24 14:52:36', '2020-01-20 12:04:35', NULL),
(92, '', '', 'uploads/social_list/ab4549caf0cecf5684989681228a3a13.png', '2019-12-25 11:15:17', '2020-01-04 12:40:48', NULL),
(93, '', '', 'uploads/social_list/ee0d4a7a081b28c2656c5b75bde93844.png', '2019-12-25 11:15:47', '2021-01-22 10:56:40', NULL),
(94, '', '', 'uploads/users/0fa78acb8d780134ddb66adddc4e0e59.png', '2020-01-01 09:35:51', '2020-01-01 09:35:51', NULL),
(95, '', '', 'uploads/users/11e0f4b036bd7b7e10640dbf3415e336.png', '2020-01-05 11:25:51', '2020-01-06 14:58:36', NULL),
(96, '', '', 'uploads/users/739d35855ad82733578a5dbe742b211a.png', '2020-01-05 11:41:23', '2020-01-05 13:42:34', NULL),
(97, '', '', 'uploads/users/d51db1644375ee84ba41420e0b39db85.png', '2020-01-11 13:33:18', '2020-01-11 13:33:18', NULL),
(98, '', '', 'uploads/users/ddb5cb85f4a161cf39713eb41615d2f2.png', '2020-01-11 14:13:05', '2020-01-11 14:13:05', NULL),
(99, '', '', 'uploads/users/91a0ad6074a9820f1328613af85b0ab7.jpg', '2020-01-12 09:36:27', '2020-01-12 09:36:27', NULL),
(100, '', '', 'uploads/users/04441e896994110aa2e5149e91ec8c77.png', '2020-01-13 10:32:32', '2020-01-13 10:32:32', NULL),
(101, '', '', 'uploads/users/7d176cae4db35dbba8e6aba1627a61c3.png', '2020-01-14 12:15:30', '2020-01-14 12:15:30', NULL),
(102, '', '', 'uploads/users/f9b227151fe5261e452ff18f4350ee7e.png', '2020-01-14 12:43:06', '2020-01-14 14:11:46', NULL),
(103, '', '', 'uploads/brands/branches/offers/51872ae7b38b586d3c512cfb7f4edeba.png', '2020-01-15 08:27:37', '2020-01-15 08:30:03', NULL),
(104, '', '', 'uploads/users/2291b4cbb5ae6d19c235445f8db43cd2.png', '2020-01-15 15:48:22', '2020-01-15 15:48:22', NULL),
(105, '', '', 'uploads/brands/images/65061833734d9486ae0528b41cd6ff36.png', '2020-01-18 15:44:19', '2020-01-18 15:44:19', NULL),
(106, '', '', 'uploads/new_slider_items/3c5ec1a5619a182b80db7f30cae0ae91.png', '2021-01-13 13:27:54', '2021-01-13 13:28:20', NULL),
(107, '', '', 'uploads/doctors/382541d346d896a5fa4a9ea75497520a.jpeg', '2021-01-17 06:31:34', '2021-01-17 06:31:34', NULL),
(108, '', '', 'uploads/doctors/0655aa2c1497b3e62ec17047a1706f17.jpeg', '2021-01-17 06:37:34', '2021-01-17 06:37:34', NULL),
(109, '', '', 'uploads/doctors/44e8dde564bb845f822292e99a78b078.jpeg', '2021-01-17 06:42:39', '2021-01-17 06:42:39', NULL),
(110, '', '', 'uploads/doctors/0f3afbb4008ec990740e75cc1f72e81e.jpeg', '2021-01-17 06:48:14', '2021-01-17 06:48:14', NULL),
(111, '', '', 'uploads/doctors/671cab49ecdb9aa42e8537f202c3000e.jpeg', '2021-01-17 06:50:02', '2021-01-17 07:01:21', NULL),
(112, '', '', 'uploads/doctors/27addc0a3932b69419668c9fc2c13a55.jpeg', '2021-01-17 07:29:23', '2021-01-18 11:10:24', NULL),
(113, '', '', 'uploads/doctors/9e1bff11e665cfbebe035b9cf0cc3bd9.jpeg', '2021-01-17 07:51:13', '2021-01-17 07:51:13', NULL),
(114, '', '', 'uploads/doctors/7f1644de0f98fdc60f4d02981c196126.png', '2021-01-17 10:30:04', '2021-01-18 11:08:55', NULL),
(115, '', '', 'uploads/doctors/d3f1123df8f965f0b729fcb2c3952cab.png', '2021-01-18 11:23:57', '2021-01-18 11:23:57', NULL),
(116, '', '', 'uploads/doctors/97103bc119eed76d23c48535d1775be8.png', '2021-01-18 11:25:36', '2021-01-18 11:25:36', NULL),
(117, '', '', 'uploads/doctors/b417c893cc5a683614db3186f49009df.png', '2021-01-18 11:25:57', '2021-01-18 11:25:57', NULL),
(118, '', '', 'uploads/doctors/6fb7eef911b74235e2ebe2be83e5fea7.png', '2021-01-18 11:26:43', '2021-01-18 11:26:43', NULL),
(119, '', '', 'uploads/doctors/db19355ba70c51ef4b2bdf0f4cae4575.png', '2021-01-18 11:30:25', '2021-01-18 11:30:25', NULL),
(120, '', '', 'uploads/doctors/c714bc6ee474e4fccf70a11cb576fbfd.png', '2021-01-18 11:31:00', '2021-01-18 11:31:00', NULL),
(121, '', '', 'uploads/doctors/93131f01a7fe0abe133806d6f7fcf92c.jpeg', '2021-01-18 11:54:12', '2021-01-18 11:54:12', NULL),
(122, '', '', 'uploads/doctors/0d1a5dc17b9e725dfbd164b4459714e4.png', '2021-01-18 11:54:41', '2021-01-18 11:54:41', NULL),
(123, '', '', 'uploads/doctors/72a813718b38288c9c8d8c838dcda3be.png', '2021-01-18 11:54:55', '2021-01-18 11:54:55', NULL),
(124, '', '', 'uploads/users/41ab691ce52b1b0246907a6d3208ec51.png', '2021-01-18 11:55:28', '2021-02-24 13:17:00', NULL),
(125, '', '', 'uploads/doctors/ab4fcb8181204f7b4a644f809b227c2d.jpeg', '2021-01-18 11:56:19', '2021-02-18 10:04:03', NULL),
(126, '', '', 'uploads/doctors/certificates/0aae70afd530e8a5c9a2563933670f9b.png', '2021-01-19 06:07:07', '2021-01-19 06:07:07', NULL),
(127, '', '', 'uploads/doctors/certificates/445876db43a828505564562c8c620568.jpg', '2021-01-19 06:07:08', '2021-01-19 06:07:08', NULL),
(128, '', '', 'uploads/doctors/certificates/b37273428086c1d78d33c42a6d29819d.jpeg', '2021-01-19 06:27:45', '2021-01-19 06:27:45', NULL),
(129, '', '', 'uploads/users/595024d9d6ef175c0bc27c9845615149.png', '2021-01-20 07:28:04', '2021-01-20 07:28:04', NULL),
(130, '', '', 'uploads/doctors/certificates/5af66304cec7ac23cde309731427ce21.png', '2021-01-20 16:28:23', '2021-01-20 16:28:23', NULL),
(131, '', '', 'uploads/doctors/certificates/4b93f226271cc2f114f6e5e934a3ae46.png', '2021-01-20 16:28:23', '2021-01-20 16:28:23', NULL),
(132, '', '', 'uploads/doctors/certificates/e78f7e17bd86d1e08a4beb3bc7cd4df5.png', '2021-01-20 16:28:45', '2021-01-20 16:28:45', NULL),
(133, '', '', 'uploads/doctors/certificates/1b2f0d5942f1e3ad5e9f867f94b1e55d.jpeg', '2021-01-20 16:45:22', '2021-01-20 16:45:22', NULL),
(134, '', '', 'uploads/doctors/certificates/0447c694ba36b5aafa52335be4fc7e45.jpeg', '2021-01-20 16:47:17', '2021-01-21 10:16:33', NULL),
(135, '', '', 'uploads/doctors/certificates/9e83b8875808f7cde80a40f6d395c396.png', '2021-01-20 16:54:46', '2021-01-21 10:16:33', NULL),
(136, '', '', 'uploads/doctors/certificates/214d90a767a7683c0694ed89b3568ee0.png', '2021-01-20 19:00:30', '2021-02-18 10:04:03', NULL),
(137, '', '', 'uploads/doctors/db6f03378b2f9ae94c8707c700fa0d90.mp4', '2021-02-14 11:14:14', '2021-02-14 11:14:14', NULL),
(138, '', '', 'uploads/doctors/certificates/81392e3b5392e0fcc38eb0cb955ccda0.png', '2021-02-14 11:14:15', '2021-02-14 11:14:15', NULL),
(139, '', '', 'uploads/doctors/d077a52bfa04401eb69ffae918b8fac7.mp4', '2021-02-14 11:15:04', '2021-02-14 11:15:04', NULL),
(140, '', '', 'uploads/doctors/certificates/06617c419cd78ecbb5856b43dbc041c5.png', '2021-02-14 11:15:04', '2021-02-14 11:15:04', NULL),
(141, '', '', 'uploads/doctors/7095a0698935335393c4b72593c596a8.png', '2021-02-14 11:17:29', '2021-02-14 11:17:29', NULL),
(142, '', '', 'uploads/doctors/d8d69f16277b49b201a8090183f08f6c.png', '2021-02-14 11:18:31', '2021-02-14 11:18:31', NULL),
(143, '', '', 'uploads/doctors/84be26efb56a74c0c8495abb1782036a.png', '2021-02-14 11:19:43', '2021-02-14 11:19:43', NULL),
(144, '', '', 'uploads/doctors/05acceee859754158c09ef1d29434401.png', '2021-02-14 11:21:59', '2021-02-14 11:21:59', NULL),
(145, '', '', 'uploads/doctors/certificates/b5c9e97dbca214541050cde9cea5c2e9.png', '2021-02-14 13:51:29', '2021-02-14 13:51:29', NULL),
(146, '', '', 'uploads/doctors/a78562563f84b5b2a4a8777d6414775c.png', '2021-02-14 13:57:53', '2021-02-14 13:57:53', NULL),
(147, '', '', 'uploads/doctors/0c7f5257247d910be4a0577966805116.png', '2021-02-14 13:58:45', '2021-02-14 13:58:45', NULL),
(148, '', '', 'uploads/doctors/83defb313297b5bd3921fb920265f6e6.png', '2021-02-14 13:59:26', '2021-02-14 13:59:26', NULL),
(149, '', '', 'uploads/doctors/72d6c99487d1d9567c22ce73ac7c9058.png', '2021-02-14 14:00:58', '2021-02-14 14:00:58', NULL),
(150, '', '', 'uploads/doctors/147e9fbfa1f3e757ea421ff0a71da630.png', '2021-02-14 14:03:38', '2021-02-14 14:03:38', NULL),
(151, '', '', 'uploads/doctors/a5aac26ef8b300ad47462141e0d5444d.png', '2021-02-14 14:04:04', '2021-02-14 14:04:04', NULL),
(152, '', '', 'uploads/doctors/e1a8cdeaf1d1b3aef9a14f02afc46257.png', '2021-02-14 14:13:49', '2021-02-14 14:13:49', NULL),
(153, '', '', 'uploads/doctors/slider/a33502869c9d30ad237b10bee72517b3.png', '2021-02-15 08:30:47', '2021-02-15 08:30:47', NULL),
(154, '', '', 'uploads/doctors/slider/931153754b14a66f4dc1c194b6dab84c.png', '2021-02-15 08:31:15', '2021-02-15 08:31:15', NULL),
(155, '', '', 'uploads/doctors/slider/fe5226a545035684d0273907bd04a58d.png', '2021-02-15 08:31:46', '2021-02-15 08:31:46', NULL),
(156, '', '', 'uploads/doctors/slider/7b28c88710d4905e8215bfa809e145db.png', '2021-02-15 08:32:17', '2021-02-15 08:32:17', NULL),
(157, '', '', 'uploads/doctors/slider/16a52b60decee8824eeaf9fa0948c373.png', '2021-02-15 08:32:48', '2021-02-15 08:32:48', NULL),
(158, '', '', 'uploads/doctors/cfa521475a46a79d61de4dddb3368d49.png', '2021-02-15 08:35:31', '2021-02-15 08:35:31', NULL),
(159, '', '', 'uploads/doctors/a46a9bd1d8e57b79eace3db08a42ceb3.png', '2021-02-15 08:36:34', '2021-02-15 08:36:34', NULL),
(160, '', '', 'uploads/doctors/3c451862260cfa6f70dbed4412bc81ed.png', '2021-02-15 08:37:13', '2021-02-15 08:37:13', NULL),
(161, '', '', 'uploads/doctors/ae4ed45a1fc6c51e594f9f7e487acdb1.png', '2021-02-15 08:40:20', '2021-02-15 08:40:20', NULL),
(162, '', '', 'uploads/doctors/2510108f4a4034ff8db171c06f2c1a15.png', '2021-02-15 08:42:03', '2021-02-15 08:42:03', NULL),
(163, '', '', 'uploads/doctors/c3c911365b949bfcc27cd5fb7ad159dc.png', '2021-02-15 08:43:59', '2021-02-15 08:43:59', NULL),
(164, '', '', 'uploads/doctors/31db7bc444f60cf952401b3720ac87f6.mp4', '2021-02-15 08:44:49', '2021-02-15 08:44:49', NULL),
(165, '', '', 'uploads/doctors/bedf49877229b80dc57894077d7f4957.png', '2021-02-15 08:57:02', '2021-02-15 08:57:02', NULL),
(166, '', '', 'uploads/doctors/04771c4958cd70141093c8ad0bbeb44f.mp4', '2021-02-15 09:08:13', '2021-02-15 09:08:13', NULL),
(167, '', '', 'uploads/doctors/0896d01d691528a869ccf4d78317eb1e.mp4', '2021-02-15 09:12:29', '2021-02-15 09:12:29', NULL),
(168, '', '', 'uploads/doctors/certificates/df311ae6af1d3c77fb7b845d631385ad.png', '2021-02-15 09:12:29', '2021-02-15 09:12:29', NULL),
(169, '', '', 'uploads/doctors/b0b4045051ed778444702715423db546.mp4', '2021-02-15 09:13:08', '2021-02-15 09:13:08', NULL),
(170, '', '', 'uploads/doctors/certificates/fd4bb25553dde28b46f9548a31612692.png', '2021-02-15 09:13:08', '2021-02-15 12:50:20', NULL),
(171, '', '', 'uploads/doctors/certificates/343f038d85d73bf89255c8e620f6a1a8.png', '2021-02-15 09:13:08', '2021-02-15 12:50:20', NULL),
(172, '', '', 'uploads/doctors/1ccbf742fb843644078ddff4b866b6e5.mp4', '2021-02-17 08:09:43', '2021-02-17 08:09:43', NULL),
(173, '', '', 'uploads/doctors/certificates/caa7951bb0ea3f813d665fedbda14f06.png', '2021-02-17 08:09:43', '2021-02-17 08:09:43', NULL),
(174, '', '', 'uploads/doctors/certificates/188953b6d1c350806c65304558b7ddfa.png', '2021-02-17 08:09:43', '2021-02-17 08:09:43', NULL),
(175, '', '', 'uploads/doctors/certificates/7b1e7fff09deefbfeacc7d6cd41662d5.png', '2021-02-17 08:09:43', '2021-02-17 08:09:43', NULL),
(176, '', '', 'uploads/doctors/08b7dd2510a96c618577af054c1fc11a.mp4', '2021-02-17 08:14:23', '2021-02-17 08:14:23', NULL),
(177, '', '', 'uploads/doctors/certificates/a4e628987e8bfe32a6d6f676ecf8fdd9.png', '2021-02-17 08:14:24', '2021-02-17 08:14:24', NULL),
(178, '', '', 'uploads/doctors/certificates/cf9b1f2881f512faa60e79ae50544475.png', '2021-02-17 08:14:24', '2021-02-17 08:14:24', NULL),
(179, '', '', 'uploads/doctors/certificates/217103970438d81a33b2dc02c40ecf15.png', '2021-02-17 08:14:24', '2021-02-17 08:14:24', NULL),
(180, '', '', 'uploads/doctors/e61246a21613e4cba9bff5e04eb36358.mp4', '2021-02-17 08:15:16', '2021-02-17 08:15:16', NULL),
(181, '', '', 'uploads/doctors/certificates/c47ed8f3dbbcc85ea6ed255aebdfd85a.png', '2021-02-17 08:15:16', '2021-02-17 08:15:16', NULL),
(182, '', '', 'uploads/doctors/certificates/7458f94c35a89beef78e279ec1adbcbb.png', '2021-02-17 08:15:16', '2021-02-17 08:15:16', NULL),
(183, '', '', 'uploads/doctors/certificates/65866b321e70d3bb4175c428bc6446a8.png', '2021-02-17 08:15:16', '2021-02-17 08:15:16', NULL),
(184, '', '', 'uploads/doctors/275ad77c2d21653f8866fdd82743356e.mp4', '2021-02-17 08:44:43', '2021-02-17 08:44:43', NULL),
(185, '', '', 'uploads/doctors/certificates/77214ee1fe476d5eacb1b1f2296907bc.png', '2021-02-17 08:44:43', '2021-02-24 13:17:01', NULL),
(186, '', '', 'uploads/doctors/certificates/0fa6d956edd5be7852bedebe53c1d1ab.png', '2021-02-17 08:44:43', '2021-02-24 13:17:01', NULL),
(187, '', '', 'uploads/doctors/certificates/4ce57412166c4577681c69661d4cbd2f.png', '2021-02-17 08:44:43', '2021-02-24 13:17:01', NULL),
(188, '', '', 'uploads/wallet/e0c26c9cbb596e58182295b354aa6d0e.png', '2021-02-21 05:41:53', '2021-02-21 05:41:53', NULL),
(189, '', '', 'uploads/wallet/ffca921c3057dacfb82b7f8447038297.png', '2021-02-21 05:45:24', '2021-02-21 05:45:24', NULL),
(190, '', '', 'uploads/wallet/ce0e396be1c28178ba1f07bd25a76a40.png', '2021-02-21 05:46:36', '2021-02-21 05:46:36', NULL),
(191, '', '', 'uploads/wallet/f3a62a6e720e4b72ddc450f32194415e.jpg', '2021-02-21 06:06:28', '2021-02-21 06:06:28', NULL),
(192, '', '', 'uploads/wallet/34e64b9c7410eaa19c6d1db8fb282f77.png', '2021-02-21 06:09:46', '2021-02-21 06:16:17', NULL),
(193, '', '', 'uploads/wallet/9be500cfa7c071c02f8f1290f148d8d0.png', '2021-02-21 06:15:45', '2021-02-21 06:15:45', NULL),
(194, '', '', 'uploads/wallet/36850a79a4baeb51bd83d7066a039320.png', '2021-02-21 06:15:46', '2021-02-21 06:15:46', NULL),
(195, '', '', 'uploads/wallet/2e5908666adc418c5ed439ade985f867.jpg', '2021-02-21 06:18:26', '2021-02-21 06:18:26', NULL),
(196, '', '', 'uploads/doctors/149ea09dde16601da64008bda82aea31.jpg', '2021-02-24 13:22:23', '2021-02-25 12:26:34', NULL),
(197, '', '', 'uploads/doctors/certificates/a883acb2951a5a0ebf26465471bde74d.png', '2021-02-24 13:22:23', '2021-02-25 12:26:34', NULL),
(198, '', '', 'uploads/users/7b58251e99479e3d0574bf0c1372da18.jpg', '2021-02-24 15:12:17', '2021-02-24 15:12:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `is_paid` int(11) NOT NULL,
  `is_done` int(11) NOT NULL,
  `canceled_by_doctor` int(11) NOT NULL,
  `price_after_discount` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `session_token` text NOT NULL,
  `channel_name` text NOT NULL,
  `user_join` int(11) NOT NULL,
  `doctor_join` int(11) NOT NULL,
  `is_canceled` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `user_id`, `session_id`, `is_paid`, `is_done`, `canceled_by_doctor`, `price_after_discount`, `rate`, `session_token`, `channel_name`, `user_join`, `doctor_join`, `is_canceled`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 105, 110, 1, 0, 0, '65.61', '0.00', '', '', 0, 0, 1, '2021-01-20 09:46:04', '2021-02-22 07:02:18', NULL),
(2, 112, 109, 1, 0, 0, '90.00', '0.00', '', '', 0, 0, 0, '2021-01-20 09:46:04', '2021-02-21 13:10:07', NULL),
(9, 108, 4, 0, 0, 0, '100.00', '0.00', '', '', 0, 0, 0, '2021-01-21 12:43:45', '2021-01-21 12:43:45', NULL),
(10, 108, 110, 0, 0, 0, '40.00', '0.00', '', '', 0, 0, 0, '2021-01-21 12:43:55', '2021-02-21 13:09:48', NULL),
(11, 108, 2, 1, 0, 0, '65.61', '0.00', '', '', 0, 0, 0, '2021-01-20 09:46:04', '2021-01-20 12:18:12', NULL),
(12, 105, 1, 1, 0, 0, '250.00', '0.00', '0060e03caa49a7c4594b60ad8178b1d9880IADO70aHGhk6gScK6UqPHBSwNxOy5Kupk/wryn6WWua0wF4ZtHIAAAAAIgCtLLwD+uo4YAQAAQBo8DdgAwBo8DdgAgBo8DdgBABo8Ddg', '81d280095fd1157ab02d8421b04434f5', 0, 0, 0, '2021-02-16 13:28:10', '2021-02-25 12:35:06', NULL),
(13, 108, 108, 1, 0, 0, '250.00', '0.00', '006565e8fe5f9834c5a976ea6c06b2503abIAAcAileIThSQTaYFToRVyNX4aMpT+n1QxhvUoZpIvsuzOxmqWjwAAAAAIgCmh5UFNxotYAQAAQDH1itgAwDH1itgAgDH1itgBADH1itg', '4eae1e8475576dm880a79416a79040b32', 0, 0, 0, '2021-02-16 13:29:27', '2021-02-21 13:06:51', NULL),
(14, 108, 107, 0, 0, 0, '700.00', '0.00', '0060e03caa49a7c4594b60ad8178b1d9880IAC63iH43w3R2KDIutiHlpX3RGiaxpVEUhRS8XxFZeqft3AYAJMAAAAAIgBCxYIB7YouYAQAAQCoYC1gAwCoYC1gAgCoYC1gBACoYC1g', 'eecfdda8d8160df30dad92cb98ccc649', 0, 1, 0, '2021-02-17 15:42:37', '2021-02-22 11:36:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('forsa_tanya_cache424f74a6a7ed4d4ed4761507ebcd209a6ef0937b', 'i:5;', 1614256539),
('forsa_tanya_cache424f74a6a7ed4d4ed4761507ebcd209a6ef0937b:timer', 'i:1614256539;', 1614256539);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `small_img_id` int(11) NOT NULL,
  `cat_type` varchar(200) NOT NULL COMMENT 'article||something else',
  `parent_id` int(11) NOT NULL,
  `cat_order` int(11) NOT NULL,
  `hide_cat` tinyint(1) NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `cat_icon` varchar(200) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `small_img_id`, `cat_type`, `parent_id`, `cat_order`, `hide_cat`, `show_in_menu`, `cat_icon`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 'default', 0, 2, 0, 0, '', '#000000', '2019-11-18 11:00:39', '2019-12-03 12:55:56', NULL),
(2, 16, 'default', 0, 0, 0, 0, '', '', '2019-11-18 11:16:14', '2019-11-18 11:25:09', '2019-11-18 11:25:09'),
(3, 22, 'default', 0, 1, 0, 0, '', '#8080ff', '2019-11-18 13:48:29', '2019-12-03 12:55:56', NULL),
(4, 58, 'default', 0, 0, 0, 0, '', '#760505', '2019-11-20 13:04:54', '2019-11-26 11:05:02', NULL),
(5, 0, 'default', 0, 0, 0, 0, '', '', '2019-11-20 13:06:57', '2019-11-20 13:07:05', '2019-11-20 13:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `category_translate`
--

CREATE TABLE `category_translate` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(300) NOT NULL,
  `cat_slug` varchar(300) NOT NULL,
  `cat_short_desc` varchar(400) NOT NULL,
  `cat_body` text NOT NULL,
  `cat_meta_title` varchar(300) NOT NULL,
  `cat_meta_desc` text NOT NULL,
  `cat_meta_keywords` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_translate`
--

INSERT INTO `category_translate` (`id`, `cat_id`, `cat_name`, `cat_slug`, `cat_short_desc`, `cat_body`, `cat_meta_title`, `cat_meta_desc`, `cat_meta_keywords`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Electronincs', '', '', '', '', '', '', 1, '2019-11-18 11:00:39', '2019-12-02 12:31:13', NULL),
(2, 1, 'الكترونيات', '', '', '', '', '', '', 2, '2019-11-18 11:00:39', '2019-12-02 12:31:13', NULL),
(3, 2, 'sdfgsdf', '', 'sdfsdf', '', '', '', '', 1, '2019-11-18 11:16:14', '2019-11-18 11:25:09', '2019-11-18 11:25:09'),
(4, 2, 'aaaaaaaaaaaas', '', 'sadfsdfqwer', '', '', '', '', 2, '2019-11-18 11:16:14', '2019-11-18 11:25:09', '2019-11-18 11:25:09'),
(5, 3, 'Clothes', '', '', '', '', '', '', 1, '2019-11-18 13:48:29', '2019-12-24 14:39:09', NULL),
(6, 3, 'ملابس', '', '', '', '', '', '', 2, '2019-11-18 13:48:29', '2019-12-24 14:39:09', NULL),
(7, 4, 'Restaurants', '', '', '', '', '', '', 1, '2019-11-20 13:04:54', '2019-12-24 14:41:16', NULL),
(8, 4, 'مطاعم', '', '', '', '', '', '', 2, '2019-11-20 13:04:54', '2019-12-24 14:41:16', NULL),
(9, 5, 'صضثضصث', '', '', '', '', '', '', 1, '2019-11-20 13:06:57', '2019-11-20 13:07:05', '2019-11-20 13:07:05'),
(10, 5, 'سشيبسشيب', '', '', '', '', '', '', 2, '2019-11-20 13:06:57', '2019-11-20 13:07:05', '2019-11-20 13:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `charge_wallet_codes`
--

CREATE TABLE `charge_wallet_codes` (
  `code_id` int(10) UNSIGNED NOT NULL,
  `code_text` varchar(255) NOT NULL COMMENT 'code itself',
  `expire_at` datetime NOT NULL,
  `code_value` decimal(12,2) NOT NULL,
  `is_used` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `number_of_uses` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `charge_wallet_codes_used`
--

CREATE TABLE `charge_wallet_codes_used` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `old_code_value` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `city_id` int(10) UNSIGNED NOT NULL,
  `map_lat` varchar(255) NOT NULL,
  `map_lng` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`city_id`, `map_lat`, `map_lng`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '29.980292744809574', '31.317995304754618', '2019-11-17 16:10:24', '2019-11-17 16:10:24', NULL),
(2, '31.2000924', '29.9187387', '2020-01-18 14:04:35', '2020-01-18 14:04:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city_translate`
--

CREATE TABLE `city_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `city_meta_title` varchar(255) NOT NULL,
  `city_meta_description` text NOT NULL,
  `city_meta_keywords` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city_translate`
--

INSERT INTO `city_translate` (`id`, `city_id`, `city_name`, `city_meta_title`, `city_meta_description`, `city_meta_keywords`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Cairo', '', '', '', 1, '2019-11-17 16:10:24', '2019-11-17 16:10:24', NULL),
(2, 1, 'القاهرة', '', '', '', 2, '2019-11-17 16:10:24', '2019-11-17 16:10:24', NULL),
(3, 2, 'alexandria', '', '', '', 1, '2020-01-18 14:04:35', '2020-01-18 14:04:51', NULL),
(4, 2, 'الاسكندرية', '', '', '', 2, '2020-01-18 14:04:35', '2020-01-18 14:04:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `day_id` int(10) UNSIGNED NOT NULL,
  `day_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`day_id`, `day_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '2019-11-25 13:01:06', '2019-11-25 13:01:06', NULL),
(2, 1, '2019-11-25 13:01:29', '2019-12-01 11:50:24', NULL),
(3, 2, '2019-11-25 13:01:45', '2019-12-01 11:50:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `days_translate`
--

CREATE TABLE `days_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `day_name` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `days_translate`
--

INSERT INTO `days_translate` (`id`, `day_id`, `day_name`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 0, '', 1, '2021-01-16 16:11:29', '2021-01-16 16:11:29', NULL),
(1, 1, 'Saturday', 1, '2019-11-25 13:01:06', '2019-11-25 13:01:06', NULL),
(2, 1, 'السبت', 2, '2019-11-25 13:01:06', '2019-11-25 13:01:06', NULL),
(3, 2, 'Sunday', 1, '2019-11-25 13:01:29', '2019-11-25 13:01:29', NULL),
(4, 2, 'الاحد', 2, '2019-11-25 13:01:29', '2019-11-25 13:01:29', NULL),
(5, 3, 'Monday', 1, '2019-11-25 13:01:45', '2019-11-25 13:01:45', NULL),
(6, 3, 'الاثنين', 2, '2019-11-25 13:01:45', '2019-11-25 13:01:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district_list`
--

CREATE TABLE `district_list` (
  `district_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(11) NOT NULL,
  `map_lat` varchar(255) NOT NULL,
  `map_lng` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district_list`
--

INSERT INTO `district_list` (`district_id`, `city_id`, `map_lat`, `map_lng`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '29.981017618718564', '31.319368595770243', '2019-11-17 16:11:10', '2019-11-17 16:11:10', NULL),
(2, 1, '29.979214717416816', '31.319862122228987', '2020-01-18 14:03:47', '2020-01-18 14:03:47', NULL),
(3, 2, '29.980013945743526', '31.320591683081037', '2020-01-18 14:05:59', '2020-01-18 14:05:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district_translate`
--

CREATE TABLE `district_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `district_meta_title` varchar(255) NOT NULL,
  `district_meta_description` text NOT NULL,
  `district_meta_keywords` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district_translate`
--

INSERT INTO `district_translate` (`id`, `district_id`, `district_name`, `district_meta_title`, `district_meta_description`, `district_meta_keywords`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Nasr City', '', '', '', 1, '2019-11-17 16:11:10', '2019-11-17 16:11:10', NULL),
(2, 1, 'مدينة نصر', '', '', '', 2, '2019-11-17 16:11:10', '2019-11-17 16:11:10', NULL),
(3, 2, 'masr elgdeda', '', '', '', 1, '2020-01-18 14:03:47', '2020-01-18 14:03:47', NULL),
(4, 2, 'مصر الجديدة', '', '', '', 2, '2020-01-18 14:03:47', '2020-01-18 14:03:47', NULL),
(5, 3, 'alex', '', '', '', 1, '2020-01-18 14:05:59', '2020-01-18 14:05:59', NULL),
(6, 3, 'اسكندرية', '', '', '', 2, '2020-01-18 14:05:59', '2020-01-18 14:05:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `temp_price` decimal(10,2) NOT NULL,
  `price_for_thirty` decimal(10,2) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `temp_years_of_experience` int(11) NOT NULL,
  `certificates_ids` text NOT NULL,
  `temp_certificates_ids` text NOT NULL,
  `video_id` int(11) NOT NULL,
  `temp_video_id` int(11) NOT NULL,
  `sessions_count` int(11) NOT NULL,
  `rating` decimal(10,2) NOT NULL,
  `session_duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `user_id`, `price`, `temp_price`, `price_for_thirty`, `years_of_experience`, `temp_years_of_experience`, `certificates_ids`, `temp_certificates_ids`, `video_id`, `temp_video_id`, `sessions_count`, `rating`, `session_duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 98, '100.00', '0.00', '40.00', 4, 0, '[185,186,187]', '', 184, 0, 2, '3.25', 30, '2021-01-17 07:29:24', '2021-02-18 10:25:13', NULL),
(2, 99, '30.00', '0.00', '0.00', 0, 0, '', '', 0, 0, 0, '0.00', 0, '2021-01-17 07:51:14', '2021-01-17 07:54:13', '2021-01-17 07:54:13'),
(3, 100, '500.00', '0.00', '0.00', 0, 0, '[136]', '', 0, 0, 0, '5.00', 0, '2021-01-17 10:30:05', '2021-01-20 19:00:31', NULL),
(4, 114, '200.00', '0.00', '0.00', 10, 0, '[197]', '', 0, 0, 0, '0.00', 30, '2021-02-24 13:22:24', '2021-02-24 13:22:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_certificates`
--

CREATE TABLE `doctors_certificates` (
  `cer_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_certificates`
--

INSERT INTO `doctors_certificates` (`cer_id`, `doctor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2021-01-18 09:16:52', '2021-01-18 09:16:52', NULL),
(2, 1, '2021-01-18 09:17:28', '2021-01-18 09:17:28', NULL),
(3, 3, '2021-01-18 09:21:43', '2021-01-18 09:21:43', NULL),
(4, 3, '2021-01-18 09:22:27', '2021-01-18 09:22:41', '2021-01-18 09:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_certificates_translate`
--

CREATE TABLE `doctors_certificates_translate` (
  `id` int(11) NOT NULL,
  `cer_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_certificates_translate`
--

INSERT INTO `doctors_certificates_translate` (`id`, `cer_id`, `title`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ph.D. in Mental Health and Psychological Counseling, Ain Shams University, Cairo, Egypt, 2018.', 1, '2021-01-18 09:16:52', '2021-01-18 09:16:52', NULL),
(2, 1, 'دكتوراه في الصحة النفسية، جامعة عين شمس، القاهرة، 2018', 2, '2021-01-18 09:16:53', '2021-01-18 09:16:53', NULL),
(3, 2, 'Master Degree in Mental Health, Arab Research and Studies Institute, Cairo, Egypt, 2015.', 1, '2021-01-18 09:17:28', '2021-01-18 09:17:28', NULL),
(4, 2, 'ماجستير في الصحة النفسية، جامعة الدول العربية، القاهرة، 2015', 2, '2021-01-18 09:17:29', '2021-01-18 09:17:29', NULL),
(5, 3, 'BA. in Psychology, Aleppo University, Syria, 2010', 1, '2021-01-18 09:21:44', '2021-01-18 09:21:44', NULL),
(6, 3, 'إجازة في علم النفس، جامعة حلب، سوريا، 2012', 2, '2021-01-18 09:21:44', '2021-01-18 09:21:44', NULL),
(7, 4, '14', 1, '2021-01-18 09:22:27', '2021-01-18 09:22:41', '2021-01-18 09:22:41'),
(8, 4, 'qwkenqwe', 2, '2021-01-18 09:22:27', '2021-01-18 09:22:41', '2021-01-18 09:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `doctors_sessions`
--

CREATE TABLE `doctors_sessions` (
  `session_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `is_booked` int(11) NOT NULL,
  `is_done` int(11) NOT NULL,
  `is_verified_by_admin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_sessions`
--

INSERT INTO `doctors_sessions` (`session_id`, `doctor_id`, `session_date`, `time_from`, `time_to`, `is_booked`, `is_done`, `is_verified_by_admin`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2021-02-25', '14:34:00', '20:46:00', 1, 0, 1, '2021-01-20 18:42:02', '2021-02-24 13:16:33', NULL),
(2, 1, '2021-01-22', '08:00:00', '09:00:00', 1, 1, 1, '2021-01-20 18:46:08', '2021-01-20 18:46:08', NULL),
(3, 1, '2021-02-24', '05:00:00', '05:30:00', 0, 0, 1, '2021-01-20 18:50:25', '2021-02-21 13:09:48', NULL),
(4, 1, '2021-02-25', '17:00:00', '18:00:00', 0, 0, 1, '2021-01-21 07:36:32', '2021-02-21 13:10:07', NULL),
(5, 1, '2021-01-30', '07:00:00', '08:00:00', 1, 1, 1, '2021-01-21 08:24:39', '2021-01-21 08:24:39', NULL),
(105, 1, '2021-02-18', '12:00:00', '12:30:00', 0, 0, 1, '2021-02-16 07:14:19', '2021-02-21 13:05:29', NULL),
(106, 1, '2021-02-20', '16:51:00', '18:30:00', 0, 0, 1, '2021-02-16 07:14:19', '2021-02-21 13:06:51', NULL),
(107, 1, '2021-02-19', '14:00:00', '14:30:00', 0, 0, 1, '2021-02-16 07:14:19', '2021-02-22 07:02:18', NULL),
(108, 1, '2021-02-17', '17:00:00', '20:30:00', 1, 0, 1, '2021-02-16 07:14:19', '2021-02-17 15:42:37', NULL),
(109, 1, '2021-02-20', '17:00:00', '11:30:00', 1, 0, 1, '2021-02-16 07:14:20', '2021-02-16 07:14:20', NULL),
(110, 1, '2021-02-24', '17:00:00', '09:30:00', 1, 0, 1, '2021-02-16 07:14:20', '2021-02-22 07:02:18', NULL),
(111, 4, '2021-02-25', '12:00:00', '12:30:00', 0, 0, 1, '2021-02-24 15:18:53', '2021-02-24 15:18:53', NULL),
(112, 4, '2021-02-25', '13:00:00', '13:30:00', 0, 0, 1, '2021-02-24 15:18:53', '2021-02-24 15:18:53', NULL),
(113, 4, '2021-02-25', '14:00:00', '14:30:00', 0, 0, 1, '2021-02-24 15:18:53', '2021-02-24 15:18:53', NULL),
(114, 4, '2021-02-25', '15:00:00', '15:30:00', 0, 0, 1, '2021-02-24 15:18:54', '2021-02-24 15:18:54', NULL),
(115, 4, '2021-02-25', '11:00:00', '11:30:00', 1, 0, 1, '2021-02-24 15:18:54', '2021-02-24 15:18:54', NULL),
(116, 4, '2021-02-25', '09:00:00', '09:30:00', 1, 0, 1, '2021-02-24 15:18:54', '2021-02-24 15:18:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_specialites`
--

CREATE TABLE `doctors_specialites` (
  `doc_spe_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_specialites`
--

INSERT INTO `doctors_specialites` (`doc_spe_id`, `doctor_id`, `spe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2021-01-17 09:04:55', '2021-01-17 09:04:55', NULL),
(2, 1, 3, '2021-01-17 09:05:06', '2021-01-17 09:05:06', NULL),
(3, 1, 2, '2021-01-17 09:05:18', '2021-01-17 09:09:25', '2021-01-17 09:09:25'),
(4, 1, 4, '2021-01-17 09:10:43', '2021-01-17 09:11:42', '2021-01-17 09:11:42'),
(5, 3, 4, '2021-01-17 10:30:37', '2021-01-17 10:30:37', NULL),
(6, 3, 2, '2021-01-17 10:31:13', '2021-01-17 10:31:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors_translate`
--

CREATE TABLE `doctors_translate` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `brief_bio` text NOT NULL,
  `specialties` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors_translate`
--

INSERT INTO `doctors_translate` (`id`, `doctor_id`, `full_name`, `job_title`, `country`, `brief_bio`, `specialties`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Ahmed Fathi', 'Psychotherapist', 'Egypt', 'Researcher in the field of mental health and psychotherapy, and a certified psychiatrist from the Egyptian Society for Behavioral Cognitive Therapy, previous experience as a psychotherapist and trainee in many mental health and addiction treatment hospitals, including: Abbassia Mental Health Hospital, Malaz Hospital for Psychiatry and Addiction Treatment and Hussein University Hospital and also in previous experience as a specialist I myself am in international organizations, including the Swiss Terre des Hoome organization, and I work in psychiatric clinics, including Care Clinic Clinics, and a member of several societies: Psychologists, the Egyptian Society for Psychological Analysis, the Arab Association for Positive Psychology, the General Syndicate for Special Education Workers, and the Egyptian Red Crescent Society.', 'Adolescence disorders,\r\nDepression,\r\nAnxiety disorders and obsessions,\r\nMarriage Counselling/Relationship Disorders,\r\nAddiction', 1, '2021-01-17 07:29:24', '2021-02-24 13:17:02', NULL),
(2, 1, 'احمد فتحى', 'معالج نفسي', 'مصر', 'باحث في مجال الصحة النفسية والعلاج النفسي، ومعالج نفسي معتمد من الجمعية المصرية للعلاج المعرفي السلوكي، وخبرة سابقة كمعالج نفسي ومتدرب في العديد من مستشفيات الصحة النفسية وعلاج الادمان منها: مستشفى العباسية للصحة النفسية ومستشفى ملاذ للطب النفسي وعلاج الإدمان ومستشفى الحسين الجامعي، وأيضا خبرة سابقة كأخصائي نفسي في المنظمات الدولية ومنها هيئة تير دي زوم السويسرية، وأعمل في العيادات النفسية ومنها عيادات كير كلينيك التخصصية وعضو في العديد من الجمعيات وهي: الجمعية المصرية للعلاج المعرفي السلوكي، والجمعية المصرية للمعالجين النفسيين، ورابطة الاخصائيين النفسيين، والجمعية المصرية للتحليل النفسي، والرابطة العربية لعلم النفس الايجابي، والنقابة العامة للعاملين في التربية الخاصة، وجمعية الهلال الأحمر المصري.', 'مشاكل المراهقة,\r\nالاكتئاب,\r\nالقلق والوسواس,\r\nاستشارات الزواج / مشاكل العلاقات,\r\nالإدمان', 2, '2021-01-17 07:29:24', '2021-02-24 13:17:02', NULL),
(3, 2, 'jasbdj', 'jnbakhsdvgh', 'bajvsd', '', '', 1, '2021-01-17 07:51:14', '2021-01-17 07:54:12', '2021-01-17 07:54:12'),
(4, 2, 'askndbkahj', 'najksbhjd', 'mnabksdbhfj', '', '', 2, '2021-01-17 07:51:14', '2021-01-17 07:54:12', '2021-01-17 07:54:12'),
(5, 3, 'Adham', 'Psychotherapist', 'Egypt', 'jbdsvhgshdf', 'absdasdvas', 1, '2021-01-17 10:30:06', '2021-02-18 10:04:03', NULL),
(6, 3, 'ادهم', 'طبيب نفسى', 'مصر', 'asnkjasbkda', 'asjdbsahd', 2, '2021-01-17 10:30:06', '2021-02-18 10:04:04', NULL),
(7, 4, 'nskjbda', 'knajksbdj', 'nsakjdb', 'jbdjsda', 'mnvvvcbv', 1, '2021-02-24 13:22:24', '2021-02-25 12:26:35', NULL),
(8, 4, 'ةىثﻻنبﻻاصت', 'ﻻاسﻻبيتر', 'ىﻻايسﻻشاي', 'نستيﻻبت', 'نتﻻثاﻻتبرصثش', 2, '2021-02-24 13:22:24', '2021-02-25 12:26:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `lang_id` int(10) UNSIGNED NOT NULL,
  `lang_img_id` int(11) NOT NULL,
  `lang_symbole` varchar(2) NOT NULL,
  `lang_text` varchar(100) NOT NULL,
  `lang_direction` varchar(255) NOT NULL COMMENT 'ltr or rtl',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`lang_id`, `lang_img_id`, `lang_symbole`, `lang_text`, `lang_direction`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 71, 'en', 'English', 'ltr', '2019-11-19 08:40:03', '2021-02-24 12:47:53', NULL),
(2, 72, 'ar', 'اللغة العربية', 'rtl', '2019-11-19 08:40:10', '2019-12-01 11:53:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_05_26_124026_create_transactions_table', 1),
(9, '2019_05_26_125450_create_orders_table', 1),
(10, '2019_05_26_130608_create_attachments_table', 1),
(11, '2019_05_26_130821_create_sessions_table', 1),
(12, '2019_05_26_130938_create_jobs_table', 1),
(13, '2019_05_26_131018_create_cache_table', 1),
(14, '2019_05_26_131411_create_langs_table', 1),
(15, '2019_05_26_132255_create_orders_products_table', 1),
(16, '2019_05_26_133504_create_orders_reviews_table', 1),
(17, '2019_05_26_134044_create_products_table', 1),
(18, '2019_05_26_134833_create_products_translate_table', 1),
(19, '2019_05_26_135358_create_product_options_table', 1),
(20, '2019_05_26_135839_create_product_options_translate_table', 1),
(21, '2019_05_26_140153_create_store_offers_table', 1),
(22, '2019_05_26_140802_create_settings_table', 1),
(23, '2019_05_26_140812_create_store_offers_translate_table', 1),
(24, '2019_05_26_141402_create_stores_table', 1),
(25, '2019_05_26_142502_create_stores_translate_table', 1),
(26, '2019_05_26_143012_create_store_categories_table', 1),
(27, '2019_05_26_143328_create_store_categories_translate_table', 1),
(28, '2019_05_26_143717_create_store_working_days_table', 1),
(29, '2019_05_26_144133_create_store_favorites_table', 1),
(30, '2019_05_26_144344_create_store_tags_table', 1),
(31, '2019_05_26_144557_create_store_payment_methods_table', 1),
(32, '2019_05_26_144759_create_store_reviews_table', 1),
(33, '2019_05_27_083927_create_notifications_table', 1),
(34, '2019_05_27_084731_create_support_messages_table', 1),
(35, '2019_05_27_085543_create_charge_wallet_codes_table', 1),
(36, '2019_05_27_090002_create_charge_wallet_codes_used_table', 1),
(37, '2019_05_27_090511_create_promo_code_table', 1),
(38, '2019_05_27_091314_create_promo_code_used_table', 1),
(39, '2019_05_27_091739_create_city_list_table', 1),
(40, '2019_05_27_091819_create_tags_table', 1),
(41, '2019_05_27_091824_create_city_translate_table', 1),
(42, '2019_05_27_091948_create_tags_translate_table', 1),
(43, '2019_05_27_092524_create_payment_method_table', 1),
(44, '2019_05_27_092551_create_district_list_table', 1),
(45, '2019_05_27_092653_create_district_translate_table', 1),
(46, '2019_05_27_092907_create_payment_method_translate_table', 1),
(47, '2019_05_27_092925_create_user_address_table', 1),
(48, '2019_05_27_093202_create_push_tokens_table', 1),
(49, '2019_05_27_093411_create_social_list_table', 1),
(50, '2019_05_27_093731_create_social_list_translate_table', 1),
(51, '2019_05_27_093957_create_days_table', 1),
(52, '2019_05_27_094136_create_days_translate_table', 1),
(53, '2019_05_27_094430_create_pages_table', 1),
(54, '2019_05_27_095141_create_pages_translate_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` int(10) UNSIGNED NOT NULL,
  `from_user_id` int(11) NOT NULL COMMENT 'who fire the notification',
  `to_user_type` varchar(20) NOT NULL COMMENT '(all or specific) admin',
  `to_user_id` int(11) NOT NULL COMMENT 'if to_user_type is specific',
  `not_type` varchar(255) NOT NULL COMMENT 'based on action like order or review or ...',
  `target_id` int(11) NOT NULL COMMENT 'based on action like order_id or review_id or ...',
  `not_title` varchar(255) NOT NULL COMMENT 'notification itself',
  `not_priority` varchar(255) NOT NULL COMMENT 'low or medium or high',
  `is_seen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`not_id`, `from_user_id`, `to_user_type`, `to_user_id`, `not_type`, `target_id`, `not_title`, `not_priority`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 08:00:00 2021-02-19', '', 0, '2021-02-15 09:44:47', '2021-02-15 09:44:47', NULL),
(2, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 05:00:00 2021-02-19', '', 0, '2021-02-15 09:44:47', '2021-02-15 09:44:47', NULL),
(3, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-19', '', 0, '2021-02-15 09:44:48', '2021-02-15 09:44:48', NULL),
(4, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 05:00:00 2021-02-19', '', 0, '2021-02-15 09:44:48', '2021-02-15 09:44:48', NULL),
(5, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 08:00:00 2021-02-19', '', 0, '2021-02-15 09:45:18', '2021-02-15 09:45:18', NULL),
(6, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 05:00:00 2021-02-19', '', 0, '2021-02-15 09:45:18', '2021-02-15 09:45:18', NULL),
(7, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-19', '', 0, '2021-02-15 09:45:19', '2021-02-15 09:45:19', NULL),
(8, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 05:00:00 2021-02-19', '', 0, '2021-02-15 09:45:19', '2021-02-15 09:45:19', NULL),
(9, 0, 'doctor', 98, 'update_profile', 0, 'You request to update your profile is approved', '', 0, '2021-02-17 08:44:55', '2021-02-17 08:44:55', NULL),
(10, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 17:30:00 2021-02-17is canceled', '', 0, '2021-02-18 12:28:11', '2021-02-18 12:28:11', NULL),
(11, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 17:30:00 2021-02-17 is canceled', '', 0, '2021-02-18 12:29:02', '2021-02-18 12:29:02', NULL),
(12, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 17:30:00 2021-02-17 is canceled', '', 0, '2021-02-18 12:29:57', '2021-02-18 12:29:57', NULL),
(13, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr ahmedfathi3 at 17:30:00 2021-02-17 is canceled', '', 0, '2021-02-18 12:34:14', '2021-02-18 12:34:14', NULL),
(14, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 17:30:00 2021-02-17 is canceled', '', 0, '2021-02-18 12:36:09', '2021-02-18 12:36:09', NULL),
(15, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 17:30:00 2021-02-18 is canceled By Doctor', '', 0, '2021-02-18 13:04:26', '2021-02-18 13:04:26', NULL),
(16, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:35:34', '2021-02-20 09:35:34', NULL),
(17, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:35:34', '2021-02-20 09:35:34', NULL),
(18, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:38:29', '2021-02-20 09:38:29', NULL),
(19, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:38:29', '2021-02-20 09:38:29', NULL),
(20, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:38:49', '2021-02-20 09:38:49', NULL),
(21, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:38:49', '2021-02-20 09:38:49', NULL),
(22, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:38:52', '2021-02-20 09:38:52', NULL),
(23, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:38:52', '2021-02-20 09:38:52', NULL),
(24, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:50:00', '2021-02-20 09:50:00', NULL),
(25, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:50:01', '2021-02-20 09:50:01', NULL),
(26, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 09:59:00', '2021-02-20 09:59:00', NULL),
(27, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 09:59:00', '2021-02-20 09:59:00', NULL),
(28, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:05:56', '2021-02-20 10:05:56', NULL),
(29, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:05:56', '2021-02-20 10:05:56', NULL),
(30, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:09:14', '2021-02-20 10:09:14', NULL),
(31, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:09:14', '2021-02-20 10:09:14', NULL),
(32, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:09:50', '2021-02-20 10:09:50', NULL),
(33, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:09:51', '2021-02-20 10:09:51', NULL),
(34, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:11:06', '2021-02-20 10:11:06', NULL),
(35, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:11:06', '2021-02-20 10:11:06', NULL),
(36, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:20:28', '2021-02-20 10:20:28', NULL),
(37, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:20:28', '2021-02-20 10:20:28', NULL),
(38, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:21:28', '2021-02-20 10:21:28', NULL),
(39, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:21:28', '2021-02-20 10:21:28', NULL),
(40, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:22:17', '2021-02-20 10:22:17', NULL),
(41, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:22:18', '2021-02-20 10:22:18', NULL),
(42, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:22:41', '2021-02-20 10:22:41', NULL),
(43, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:22:41', '2021-02-20 10:22:41', NULL),
(44, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:23:55', '2021-02-20 10:23:55', NULL),
(45, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:23:55', '2021-02-20 10:23:55', NULL),
(46, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:30:04', '2021-02-20 10:30:04', NULL),
(47, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:30:05', '2021-02-20 10:30:05', NULL),
(48, 0, 'user', 105, 'cancel_session', 0, 'Your Session with Dr Ahmed Fathi at 15:13:00 2021-02-20 is canceled By Doctor', '', 0, '2021-02-20 10:30:33', '2021-02-20 10:30:33', NULL),
(49, 0, 'doctor', 98, 'cancel_session', 0, 'Your Session with ahmedfathi3 at 15:13:00 2021-02-20 is canceled By You', '', 0, '2021-02-20 10:30:33', '2021-02-20 10:30:33', NULL),
(50, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 15:13:00 2021-02-20', '', 0, '2021-02-20 08:40:05', '2021-02-20 08:40:05', NULL),
(51, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 13:00:00 2021-02-25', '', 0, '2021-02-20 08:40:05', '2021-02-20 08:40:05', NULL),
(52, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 08:40:05', '2021-02-20 08:40:05', NULL),
(53, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 08:40:06', '2021-02-20 08:40:06', NULL),
(54, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 08:40:06', '2021-02-20 08:40:06', NULL),
(55, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 08:40:06', '2021-02-20 08:40:06', NULL),
(56, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:12:40', '2021-02-20 09:12:40', NULL),
(57, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 15:13:00 2021-02-20', '', 0, '2021-02-20 09:12:41', '2021-02-20 09:12:41', NULL),
(58, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:12:41', '2021-02-20 09:12:41', NULL),
(59, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:12:41', '2021-02-20 09:12:41', NULL),
(60, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 15:13:00 2021-02-20', '', 0, '2021-02-20 09:16:41', '2021-02-20 09:16:41', NULL),
(61, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:16:41', '2021-02-20 09:16:41', NULL),
(62, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:16:41', '2021-02-20 09:16:41', NULL),
(63, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:18:31', '2021-02-20 09:18:31', NULL),
(64, 0, 'doctor', 1, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:41:23', '2021-02-20 09:41:23', NULL),
(65, 0, 'doctor', 1, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 09:41:23', '2021-02-20 09:41:23', NULL),
(66, 0, 'doctor', 1, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:41:24', '2021-02-20 09:41:24', NULL),
(67, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:45:07', '2021-02-20 09:45:07', NULL),
(68, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 09:45:07', '2021-02-20 09:45:07', NULL),
(69, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:45:07', '2021-02-20 09:45:07', NULL),
(70, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:45:35', '2021-02-20 09:45:35', NULL),
(71, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 09:45:35', '2021-02-20 09:45:35', NULL),
(72, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:45:36', '2021-02-20 09:45:36', NULL),
(73, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:45:36', '2021-02-20 09:45:36', NULL),
(74, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:45:36', '2021-02-20 09:45:36', NULL),
(75, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:48:37', '2021-02-20 09:48:37', NULL),
(76, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 09:48:38', '2021-02-20 09:48:38', NULL),
(77, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:48:38', '2021-02-20 09:48:38', NULL),
(78, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 13:00:00 2021-02-25', '', 0, '2021-02-20 09:48:38', '2021-02-20 09:48:38', NULL),
(79, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 09:48:39', '2021-02-20 09:48:39', NULL),
(80, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:43:00 2021-02-20', '', 0, '2021-02-20 11:59:27', '2021-02-20 11:59:27', NULL),
(81, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:43:00 2021-02-20', '', 0, '2021-02-20 12:28:48', '2021-02-20 12:28:48', NULL),
(82, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:43:00 2021-02-20', '', 0, '2021-02-20 10:40:27', '2021-02-20 10:40:27', NULL),
(83, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:40:28', '2021-02-20 10:40:28', NULL),
(84, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:43:00 2021-02-20', '', 0, '2021-02-20 10:40:28', '2021-02-20 10:40:28', NULL),
(85, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:40:29', '2021-02-20 10:40:29', NULL),
(86, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:40:29', '2021-02-20 10:40:29', NULL),
(87, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:43:00 2021-02-20', '', 0, '2021-02-20 10:42:03', '2021-02-20 10:42:03', NULL),
(88, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:42:03', '2021-02-20 10:42:03', NULL),
(89, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:43:49', '2021-02-20 10:43:49', NULL),
(90, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:43:49', '2021-02-20 10:43:49', NULL),
(91, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:48:25', '2021-02-20 10:48:25', NULL),
(92, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:48:25', '2021-02-20 10:48:25', NULL),
(93, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:48:26', '2021-02-20 10:48:26', NULL),
(94, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:48:27', '2021-02-20 10:48:27', NULL),
(95, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:48:27', '2021-02-20 10:48:27', NULL),
(96, 0, 'doctor', 105, 'fathi test', 0, 'You have session at ', '', 0, '2021-02-20 10:50:24', '2021-02-20 10:50:24', NULL),
(97, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:50:24', '2021-02-20 10:50:24', NULL),
(98, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:50:24', '2021-02-20 10:50:24', NULL),
(99, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:50:25', '2021-02-20 10:50:25', NULL),
(100, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:50:25', '2021-02-20 10:50:25', NULL),
(101, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:50:26', '2021-02-20 10:50:26', NULL),
(102, 0, 'doctor', 105, 'test test', 0, 'You have session at ', '', 0, '2021-02-20 10:52:23', '2021-02-20 10:52:23', NULL),
(103, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:52:24', '2021-02-20 10:52:24', NULL),
(104, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:52:24', '2021-02-20 10:52:24', NULL),
(105, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:52:25', '2021-02-20 10:52:25', NULL),
(106, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:52:25', '2021-02-20 10:52:25', NULL),
(107, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:52:26', '2021-02-20 10:52:26', NULL),
(108, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:56:43', '2021-02-20 10:56:43', NULL),
(109, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:56:43', '2021-02-20 10:56:43', NULL),
(110, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:56:44', '2021-02-20 10:56:44', NULL),
(111, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:56:44', '2021-02-20 10:56:44', NULL),
(112, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:56:44', '2021-02-20 10:56:44', NULL),
(113, 0, 'doctor', 98, 'tttttttttt', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:59:57', '2021-02-20 10:59:57', NULL),
(114, 0, 'doctor', 98, 'tttttttttt', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:59:57', '2021-02-20 10:59:57', NULL),
(115, 0, 'doctor', 98, 'tttttttttt', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:59:57', '2021-02-20 10:59:57', NULL),
(116, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:59:58', '2021-02-20 10:59:58', NULL),
(117, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:59:58', '2021-02-20 10:59:58', NULL),
(118, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 14:51:00 2021-02-20', '', 0, '2021-02-20 10:59:59', '2021-02-20 10:59:59', NULL),
(119, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 10:59:59', '2021-02-20 10:59:59', NULL),
(120, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 10:59:59', '2021-02-20 10:59:59', NULL),
(121, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 16:51:00 2021-02-20', '', 0, '2021-02-20 11:58:29', '2021-02-20 11:58:29', NULL),
(122, 0, 'user', 105, 'session_reminder', 0, 'You have session with Dr. Ahmed Fathi at 09:00:00 2021-02-22', '', 0, '2021-02-20 11:58:29', '2021-02-20 11:58:29', NULL),
(123, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:51:00 2021-02-20', '', 0, '2021-02-20 11:58:30', '2021-02-20 11:58:30', NULL),
(124, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 11:58:30', '2021-02-20 11:58:30', NULL),
(125, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 11:58:30', '2021-02-20 11:58:30', NULL),
(126, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:51:00 2021-02-20', '', 0, '2021-02-20 12:03:00', '2021-02-20 12:03:00', NULL),
(127, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 11:00:00 2021-02-21', '', 0, '2021-02-20 12:03:01', '2021-02-20 12:03:01', NULL),
(128, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-20 12:03:01', '2021-02-20 12:03:01', NULL),
(129, 0, '', 1, 'support', 0, ' لقد تم إرسال رسالة إلي الدعم الفني من doctor253', '', 0, '2021-02-21 03:47:13', NULL, NULL),
(130, 0, '', 1, 'support', 1, ' لقد تم إرسال رسالة إلي الدعم الفني من doctor253', '', 0, '2021-02-21 03:48:46', NULL, NULL),
(131, 0, '', 1, 'support', 2, ' لقد تم إرسال رسالة إلي الدعم الفني من ahmed fathi', '', 0, '2021-02-21 03:49:26', NULL, NULL),
(132, 0, 'doctor', 98, 'Your Wallet', 0, 'You received 200 EG In your wallet for the session with fathi at2021-02-22 ', '', 0, '2021-02-22 11:41:01', '2021-02-22 11:41:01', NULL),
(133, 0, 'doctor', 98, 'Your Wallet', 0, 'You received 200 EG In your wallet for the session with fathi at 2021-02-22 13:56:00', '', 0, '2021-02-22 11:58:01', '2021-02-22 11:58:01', NULL),
(134, 0, 'doctor', 98, 'Your Wallet', 0, 'You received 200 EG In your wallet for the session with fathi at 2021-02-22 14:38:00', '', 0, '2021-02-22 12:40:01', '2021-02-22 12:40:01', NULL),
(135, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:20:00 2021-02-22', '', 0, '2021-02-22 12:00:21', '2021-02-22 12:00:21', NULL),
(136, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-22 12:00:21', '2021-02-22 12:00:21', NULL),
(137, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:20:00 2021-02-22', '', 0, '2021-02-22 12:00:22', '2021-02-22 12:00:22', NULL),
(138, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:20:00 2021-02-22', '', 0, '2021-02-22 12:01:56', '2021-02-22 12:01:56', NULL),
(139, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-22 12:01:56', '2021-02-22 12:01:56', NULL),
(140, 0, 'doctor', 500, 'session_reminder', 0, 'You have session at 16:20:00 2021-02-22', '', 0, '2021-02-22 13:01:00', '2021-02-22 13:01:00', NULL),
(141, 0, 'doctor', 500, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-22 13:01:00', '2021-02-22 13:01:00', NULL),
(142, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:20:00 2021-02-22', '', 0, '2021-02-22 13:04:20', '2021-02-22 13:04:20', NULL),
(143, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 09:00:00 2021-02-22', '', 0, '2021-02-22 13:04:21', '2021-02-22 13:04:21', NULL),
(144, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 07:29:00 2021-02-23', '', 0, '2021-02-23 05:33:07', '2021-02-23 05:33:07', NULL),
(145, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 07:29:00 2021-02-23', '', 0, '2021-02-23 05:35:34', '2021-02-23 05:35:34', NULL),
(146, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:40:36', '2021-02-23 05:40:36', NULL),
(147, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:41:24', '2021-02-23 05:41:24', NULL),
(148, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:44:26', '2021-02-23 05:44:26', NULL),
(149, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:47:11', '2021-02-23 05:47:11', NULL),
(150, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:47:11', '2021-02-23 05:47:11', NULL),
(151, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:51:41', '2021-02-23 05:51:41', NULL),
(152, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-23', '', 0, '2021-02-23 05:51:42', '2021-02-23 05:51:42', NULL),
(153, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:51:42', '2021-02-23 05:51:42', NULL),
(154, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:52:35', '2021-02-23 05:52:35', NULL),
(155, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-23', '', 0, '2021-02-23 05:52:35', '2021-02-23 05:52:35', NULL),
(156, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:56:01', '2021-02-23 05:56:01', NULL),
(157, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-23', '', 0, '2021-02-23 05:56:02', '2021-02-23 05:56:02', NULL),
(158, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 05:58:57', '2021-02-23 05:58:57', NULL),
(159, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:00:00 2021-02-23', '', 0, '2021-02-23 05:58:57', '2021-02-23 05:58:57', NULL),
(160, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 06:08:01', '2021-02-23 06:08:01', NULL),
(161, 0, 'user', 105, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 06:08:01', '2021-02-23 06:08:01', NULL),
(162, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 06:08:43', '2021-02-23 06:08:43', NULL),
(163, 0, 'user', 105, 'session_reminder', 0, 'You have session at 08:29:00 2021-02-23', '', 0, '2021-02-23 06:08:44', '2021-02-23 06:08:44', NULL),
(164, 0, 'user', 105, 'session_reminder', 0, 'Your Doctor Started The Session 2021-02-23 1614105960 please join him', '', 0, '2021-02-23 06:24:08', '2021-02-23 06:24:08', NULL),
(165, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:42:43', '2021-02-24 13:42:43', NULL),
(166, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:42:43', '2021-02-24 13:42:43', NULL),
(167, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:42:44', '2021-02-24 13:42:44', NULL),
(168, 0, 'user', 108, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:42:44', '2021-02-24 13:42:44', NULL),
(169, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:42:44', '2021-02-24 13:42:44', NULL),
(170, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:43:01', '2021-02-24 13:43:01', NULL),
(171, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:43:02', '2021-02-24 13:43:02', NULL),
(172, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:43:02', '2021-02-24 13:43:02', NULL),
(173, 0, 'user', 108, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:43:03', '2021-02-24 13:43:03', NULL),
(174, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:43:03', '2021-02-24 13:43:03', NULL),
(175, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:59:30', '2021-02-24 13:59:30', NULL),
(176, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:59:31', '2021-02-24 13:59:31', NULL),
(177, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:59:31', '2021-02-24 13:59:31', NULL),
(178, 0, 'user', 108, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:59:32', '2021-02-24 13:59:32', NULL),
(179, 0, 'user', 105, 'session_reminder', 0, 'You have session at 16:00:00 2021-02-24', '', 0, '2021-02-24 13:59:32', '2021-02-24 13:59:32', NULL),
(180, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:03:39', '2021-02-24 14:03:39', NULL),
(181, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:03:39', '2021-02-24 14:03:39', NULL),
(182, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:03:40', '2021-02-24 14:03:40', NULL),
(183, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:03:40', '2021-02-24 14:03:40', NULL),
(184, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:03:40', '2021-02-24 14:03:40', NULL),
(185, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:06:13', '2021-02-24 14:06:13', NULL),
(186, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:06:13', '2021-02-24 14:06:13', NULL),
(187, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:06:14', '2021-02-24 14:06:14', NULL),
(188, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:06:14', '2021-02-24 14:06:14', NULL),
(189, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:06:14', '2021-02-24 14:06:14', NULL),
(190, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:23:34', '2021-02-24 14:23:34', NULL),
(191, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:23:34', '2021-02-24 14:23:34', NULL),
(192, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:23:35', '2021-02-24 14:23:35', NULL),
(193, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:23:35', '2021-02-24 14:23:35', NULL),
(194, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:23:35', '2021-02-24 14:23:35', NULL),
(195, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:24:39', '2021-02-24 14:24:39', NULL),
(196, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:24:39', '2021-02-24 14:24:39', NULL),
(197, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:24:40', '2021-02-24 14:24:40', NULL),
(198, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:24:40', '2021-02-24 14:24:40', NULL),
(199, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:24:40', '2021-02-24 14:24:40', NULL),
(200, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:25:59', '2021-02-24 14:25:59', NULL),
(201, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:26:00', '2021-02-24 14:26:00', NULL),
(202, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:26:00', '2021-02-24 14:26:00', NULL),
(203, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:26:00', '2021-02-24 14:26:00', NULL),
(204, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:26:01', '2021-02-24 14:26:01', NULL),
(205, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:27:30', '2021-02-24 14:27:30', NULL),
(206, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:27:30', '2021-02-24 14:27:30', NULL),
(207, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:27:30', '2021-02-24 14:27:30', NULL),
(208, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:27:30', '2021-02-24 14:27:30', NULL),
(209, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:27:31', '2021-02-24 14:27:31', NULL),
(210, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:46:25', '2021-02-24 14:46:25', NULL),
(211, 0, 'doctor', 98, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:46:25', '2021-02-24 14:46:25', NULL),
(212, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:46:26', '2021-02-24 14:46:26', NULL),
(213, 0, 'user', 108, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:46:26', '2021-02-24 14:46:26', NULL),
(214, 0, 'user', 105, 'session_reminder', 0, 'You have session at 17:00:00 2021-02-24', '', 0, '2021-02-24 14:46:26', '2021-02-24 14:46:26', NULL),
(215, 0, 'doctor', 114, 'update_profile', 0, 'You request to update your profile is approved', '', 0, '2021-02-24 15:18:06', '2021-02-24 15:18:06', NULL),
(216, 0, 'user', 105, 'session_reminder', 0, 'Your Doctor Started The Session 2021-02-24 17:00:00 please join him', '', 0, '2021-02-24 15:19:23', '2021-02-24 15:19:23', NULL),
(217, 0, 'user', 105, 'session_reminder', 0, 'Your Doctor Started The Session 2021-02-25 14:34:00 please join him', '', 0, '2021-02-25 12:35:06', '2021-02-25 12:35:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('021d1b775c8b7fcec8bd215688134305465c8337de5d75742149eb766a463a0d05c51433d266d059', 56, 1, 'MyApp', '[]', 0, '2019-12-23 09:30:58', '2019-12-23 09:30:58', '2020-12-23 11:30:58'),
('02258922b86c2871426d3ccb8979f86d74bf34d75fea28278214ef8a3c88205ae022b64f27593e88', 87, 1, 'MyApp', '[]', 0, '2020-01-18 10:01:26', '2020-01-18 10:01:26', '2021-01-18 12:01:26'),
('02900cd60691c1c08bf84c726b4a700d240575c67872951f51f65098c311a077e2822874bb6d01a7', 31, 1, 'MyApp', '[]', 0, '2019-12-15 10:32:08', '2019-12-15 10:32:08', '2020-12-15 12:32:08'),
('03d6c9605c2f8ff4129f66c8c6507bc6dcddb44658ee003b4dcd9949b3e70a171e907c3b35a3a7bb', 20, 1, 'MyApp', '[]', 1, '2020-01-04 12:13:15', '2020-01-04 12:13:15', '2021-01-04 14:13:15'),
('04326a27dd220701a7007baa7cea4d5f514e3c5463c1aee2f5a7efb00c0e70225dfe1b9a6390eebe', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:30:16', '2020-01-14 14:30:16', '2021-01-14 16:30:16'),
('06b97a1055419c01930fa1a1bbd329385f5168fbe37e8a76098d248da9581053bd6a0d4bfe166a2f', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:37:45', '2021-01-18 11:37:45', '2022-01-18 13:37:45'),
('081cfb95e6f9e785b85af74ca6ae91b1a90f8fb1901d291b939c2a4cb0dbcd1e2df9b0162ba14932', 20, 1, 'MyApp', '[]', 1, '2019-12-31 13:11:20', '2019-12-31 13:11:20', '2020-12-31 15:11:20'),
('0856d6de35ee2e04909bcf9eb613f6c34eee0d375c180380f1e437dc57c1c5ca88151708729d2043', 20, 1, 'MyApp', '[]', 1, '2019-12-29 16:27:39', '2019-12-29 16:27:39', '2020-12-29 18:27:39'),
('089d3a9c497cf537a36f13dac223509b2c4e14da10dc9bdc07fccba8d4e3c7928ea6553a64cd163c', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:38:40', '2021-01-18 11:38:40', '2022-01-18 13:38:40'),
('091faa50e6900896a82f3838c560b32abe361553fbbc7ea4b25badc17eaf292aadd258af1b621321', 105, 1, 'MyApp', '[]', 1, '2021-02-17 15:42:20', '2021-02-17 15:42:20', '2022-02-17 17:42:20'),
('09d7ced0bcaf3d8825c49c646d829fe8e369fe443010a54350d73d5d16e1a35c108ea5c3c1fafeca', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:06:52', '2019-12-08 08:06:52', '2020-12-08 10:06:52'),
('0a09c26015a390a1481497979fef0850c6d98fbca24d83d49bbd6f14232e7117db0accec54b72492', 20, 1, 'MyApp', '[]', 1, '2019-12-15 15:05:03', '2019-12-15 15:05:03', '2020-12-15 17:05:03'),
('0aaae8e0b8f06c8ce7dc0edbc0aafcef20946d45abbd6efb0592c23a95850f6512aa2b6c880b0757', 98, 1, 'MyApp', '[]', 1, '2021-01-18 12:05:40', '2021-01-18 12:05:40', '2022-01-18 14:05:40'),
('0aba5fa302c8841f13b33b5828841ff1cac39e61270cf74ba23737acb87f6634be13ab2c71647914', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:11:36', '2019-12-30 09:11:36', '2020-12-30 11:11:36'),
('0ac02080a9cd59a96761c8cef699b4918f89e78d7a4ef57c77312954cc0edb679644a51ff53e7dba', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:15:42', '2019-12-23 11:15:42', '2020-12-23 13:15:42'),
('0b1159d310143e1848a6d6bba8570f64fe503f74b807c03150b6de5fa28ae91eb7a4aa4b0e3ebdf5', 89, 1, 'MyApp', '[]', 0, '2020-01-14 14:31:57', '2020-01-14 14:31:57', '2021-01-14 16:31:57'),
('0c042f522040e3070f47eb9376e10a338e20d5160d0010497bda1327465c68bb437a3b0be7dab02f', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:17:21', '2019-12-23 11:17:21', '2020-12-23 13:17:21'),
('0d84d2ef3cecd5306a78ee7b40d2e9f65c00229b0e81e10c13d16a8b605481fb3f44e5b5e7ecf469', 91, 1, 'MyApp', '[]', 0, '2020-01-18 09:55:27', '2020-01-18 09:55:27', '2021-01-18 11:55:27'),
('0e34e3fd393c875d84c0d67bd1db39f8a2bb0852d211f573c8e7f2992b84eccccf604a7549a73cfa', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:37:02', '2019-12-18 10:37:02', '2020-12-18 12:37:02'),
('0eaaf07d47b361218b1e626582b29cafa2bde82c6b9ed737a87293405a5262434b06e22fb24dbdb9', 34, 1, 'MyApp', '[]', 0, '2019-12-17 11:27:26', '2019-12-17 11:27:26', '2020-12-17 13:27:26'),
('0f416fcbce102aa839da080ee552103e913992084d12dc7f08f67a487e67b8ae59d010017d26984d', 20, 1, 'MyApp', '[]', 1, '2020-01-12 12:23:27', '2020-01-12 12:23:27', '2021-01-12 14:23:27'),
('0f8a56e063757bcd392c776b47930b4e682e8c8b4aa25c1ebacea6cd6d3dd23db85c9d3bc4087176', 70, 1, 'MyApp', '[]', 0, '2020-01-14 16:13:18', '2020-01-14 16:13:18', '2021-01-14 18:13:18'),
('0fe9271fd6a7a499a34e93196956e6b43df0875b3483ce134f6befb0d57e933c7e10ba278f447fcd', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:14:38', '2019-12-30 09:14:38', '2020-12-30 11:14:38'),
('106f6478d911cb6a0220efc1a28162c3366e5b9ae608ecedaffc08d5a228b90fe76a5ebd8c211f5f', 55, 1, 'MyApp', '[]', 0, '2020-01-06 11:22:28', '2020-01-06 11:22:28', '2021-01-06 13:22:28'),
('10b18fbe5e16cc348dbcbdd7cd6d390f56eb7a7f8910c5af5dcd8d81c2303836f12ba39cf6d3ff87', 20, 1, 'MyApp', '[]', 1, '2019-12-29 14:47:06', '2019-12-29 14:47:06', '2020-12-29 16:47:06'),
('1203631cacccbeaa5016f641fc3a48b9aa856905b37aeb08c8335aeee96c72663d7f91dfaab234f7', 114, 1, 'MyApp', '[]', 1, '2021-02-24 15:14:23', '2021-02-24 15:14:23', '2022-02-24 17:14:23'),
('128f2d5b6a377958f15245d30d1c4304c73c5d7fb143eced6f6d990908804b9227ec945475770db2', 105, 1, 'MyApp', '[]', 1, '2021-02-18 12:18:41', '2021-02-18 12:18:41', '2022-02-18 14:18:41'),
('131e0ef2236b1a6de6bd907dd29a5dc3f876f8f4ca05bee8afc4e2fd0c1720caa8846a6e0af10f5a', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:30:38', '2019-12-29 10:30:38', '2020-12-29 12:30:38'),
('13654aae691473a69c03b7de4e1b7b90a17a5f5d1429b9e3948daca1795a2e814e8cc1c2495bc9aa', 20, 1, 'MyApp', '[]', 1, '2019-12-25 08:26:04', '2019-12-25 08:26:04', '2020-12-25 10:26:04'),
('1379d4b0dfb5d2df4fd9f1203a93c34a60eb89d87d25c93c3a736e2f5352c77ec28dfb8f77a136ec', 72, 1, 'MyApp', '[]', 1, '2020-01-11 14:03:48', '2020-01-11 14:03:48', '2021-01-11 16:03:48'),
('1384d45d086f742330c03a11b38e93d35c5fe98af544b457e2d3128e606b857e48bdc89fd7cc773a', 20, 1, 'MyApp', '[]', 1, '2020-01-12 12:22:30', '2020-01-12 12:22:30', '2021-01-12 14:22:30'),
('13a1ff0d4c5c6ad27265e4492ab87a7a7a776b173691f1df1572af6ff568f6a95937b8a3a490b444', 31, 1, 'MyApp', '[]', 0, '2019-12-18 10:52:43', '2019-12-18 10:52:43', '2020-12-18 12:52:43'),
('13c9e599c5515aec079404cd4974c4be811fc2df95b56680f45398793c4f06e43a7a9fcc7200330b', 20, 1, 'MyApp', '[]', 1, '2019-12-18 08:30:02', '2019-12-18 08:30:02', '2020-12-18 10:30:02'),
('146ebcaca4c43aad6a391d13582434bc128c316c765f494a0f68dc435829ff1b412c42b1d3fd543e', 55, 1, 'MyApp', '[]', 0, '2020-01-06 13:54:52', '2020-01-06 13:54:52', '2021-01-06 15:54:52'),
('14ff21a9d634d2bee2ce3ae8d1678a6925554bae5643c699f4a7a9e828db62e062754120ed583f91', 20, 1, 'MyApp', '[]', 1, '2019-12-15 10:54:56', '2019-12-15 10:54:56', '2020-12-15 12:54:56'),
('154f6530a547cb7979d61aff8fee25acd1657e0af062c55dc2438d4e9af42f9728e886abb1f0989d', 20, 1, 'MyApp', '[]', 1, '2019-12-28 16:49:02', '2019-12-28 16:49:02', '2020-12-28 18:49:02'),
('1632e7639478dcd75864270a5b7fa5f4361c5dc364ac98c2c1b794736a8c555e0eec420e08857fa4', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:20:35', '2019-12-23 11:20:35', '2020-12-23 13:20:35'),
('168587f3181e4c5bbd28eb90338caa2ad571ee34ace6822c4f4d58cb728968d5da6cf681ed7e2a69', 60, 1, 'MyApp', '[]', 1, '2019-12-25 10:25:14', '2019-12-25 10:25:14', '2020-12-25 12:25:14'),
('16868c49c330460d758197c5f940344dae6486cdffbdfc09add62f4122cae51605325957a7787c85', 20, 1, 'MyApp', '[]', 1, '2020-01-13 12:38:53', '2020-01-13 12:38:53', '2021-01-13 14:38:53'),
('168c340853cc6b97dfeb4498f7bcbd11dc0db3b4a8450a8cb27785123991881a154ed814f1a355ab', 20, 1, 'MyApp', '[]', 1, '2019-12-30 14:31:25', '2019-12-30 14:31:25', '2020-12-30 16:31:25'),
('171cb2118d50fc2267d15087b13744da965f3a2d7ff816aceac165490ca8d8ea90439207c6b77ba9', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:36:21', '2020-01-12 08:36:21', '2021-01-12 10:36:21'),
('17e3f02eaaeadc3477dfd24b2178b5e81ce811cbc57e992c826de60edee9bf6a743d099211948f26', 60, 1, 'MyApp', '[]', 1, '2019-12-30 13:01:57', '2019-12-30 13:01:57', '2020-12-30 15:01:57'),
('17fbf0e94a3f21e180fb50301b58b164b2220f509c634f11590569f721496103767119219e672b6b', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:11:05', '2020-01-14 14:11:05', '2021-01-14 16:11:05'),
('18395b815114c604baf753f3693aa9f74f7b73e82d5334111c31190d1d7cc3b886d3c436faa8c2b5', 58, 1, 'MyApp', '[]', 0, '2019-12-23 10:01:57', '2019-12-23 10:01:57', '2020-12-23 12:01:57'),
('186955e3d2c168cc9fc0d823951a908161a87afa57706ad89cc4d4d3349326b9a8b590d86d5831d0', 90, 1, 'MyApp', '[]', 0, '2020-01-15 15:49:08', '2020-01-15 15:49:08', '2021-01-15 17:49:08'),
('18dee9cc7d101ab5d082089082534df84e4eece266ce670b601afec170eee963de496fe8772835c9', 55, 1, 'MyApp', '[]', 0, '2020-01-06 11:32:13', '2020-01-06 11:32:13', '2021-01-06 13:32:13'),
('19c0221b323130d60c2eac7086b454976ae8209ed52a3c3917cd0388a47ae35fe83b8873c266a927', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:58:42', '2019-12-23 11:58:42', '2020-12-23 13:58:42'),
('19d87294127527d9d895592643c3aababe2430b15745f865c262db0834e65d075799633bd6d93be4', 20, 1, 'MyApp', '[]', 1, '2019-12-30 09:10:35', '2019-12-30 09:10:35', '2020-12-30 11:10:35'),
('1ae9937bb2aacff2dc88572f87a2364f8c602973e2663b13368a8d7c9c7302dad0edeb13036e3ef3', 98, 1, 'MyApp', '[]', 1, '2021-02-14 09:51:54', '2021-02-14 09:51:54', '2022-02-14 11:51:54'),
('1b3cba0c95293b947a5a7b4933d4abc9e656197d676b3fee55cc1e4e594fc5c3fd8d295a46fa5ba7', 20, 1, 'MyApp', '[]', 1, '2019-12-23 15:10:30', '2019-12-23 15:10:30', '2020-12-23 17:10:30'),
('1b6a079ac6dca9b0cbe72cfaac2eb38c54099586c2d49b0aa81a0a0067a9815bedf66e965e9d5a44', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:04:40', '2019-12-08 08:04:40', '2020-12-08 10:04:40'),
('1bbccb6d7494c35bed810766c4598efe5573e5566f929ebdb6c3802361e68179f8a51964895c584a', 20, 1, 'MyApp', '[]', 1, '2019-12-28 16:58:39', '2019-12-28 16:58:39', '2020-12-28 18:58:39'),
('1c325dc8aa479e0873867f03a9006927b2d1fb194c1adad2b9fe4037f31784db125d750f28a07765', 20, 1, 'MyApp', '[]', 1, '2019-12-22 11:18:04', '2019-12-22 11:18:04', '2020-12-22 13:18:04'),
('1cba3ffd99cd2652a6828b86b87cb98fe122ccf0a7b6972bf0130fd8bb4401ea68e07505b0bfd84d', 20, 1, 'MyApp', '[]', 1, '2019-12-21 08:09:59', '2019-12-21 08:09:59', '2020-12-21 10:09:59'),
('1d17f8d760d36c981d8b1e31bb278791cb72d6606e3e47d33171265007d9dc19492467ba1ec942bf', 20, 1, 'MyApp', '[]', 1, '2019-12-29 09:17:58', '2019-12-29 09:17:58', '2020-12-29 11:17:58'),
('1ddfae21319cd6a44ade79635e21ddfbfa3e94ec94957dad2b922774f930df6ccab50fe37f14c12e', 20, 1, 'MyApp', '[]', 1, '2019-12-09 10:46:29', '2019-12-09 10:46:29', '2020-12-09 12:46:29'),
('1e681821fd7fa0db0308f785ab1e2d1dbed1447628984decff5ad0862f24e27d51159f6548df6a7f', 20, 1, 'MyApp', '[]', 1, '2019-12-25 11:34:44', '2019-12-25 11:34:44', '2020-12-25 13:34:44'),
('1f10baeff384fdb8b7e859283a75ba2628b881fc664d014650c28a30a7fdb23cf2f85570e91bd4b1', 66, 1, 'MyApp', '[]', 0, '2019-12-23 16:15:25', '2019-12-23 16:15:25', '2020-12-23 18:15:25'),
('1f319ca420d42a536be79004b7568516dec5459a131b6cbd291fe61431ba2845b2ba8447c88090d0', 105, 1, 'MyApp', '[]', 1, '2021-02-14 08:24:48', '2021-02-14 08:24:48', '2022-02-14 10:24:48'),
('1f3f8c1f5ee614eb14f92981edfc16cb2a1902e44c9e1b79e2b0d05875fa03fcf38ce3a8794efe51', 111, 1, 'MyApp', '[]', 0, '2021-01-20 07:19:48', '2021-01-20 07:19:48', '2022-01-20 09:19:48'),
('215819ffca091b6aeeb010ebe916718fc464639a6435a91e088ae4c10513292d4d9ee9afdfd21d0a', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:44:38', '2019-12-18 10:44:38', '2020-12-18 12:44:38'),
('215dd81e223cbd656e23da5fccd33fc698f738b1284f272013b7001329ec33cb0aa09b2d6b39066b', 78, 1, 'MyApp', '[]', 0, '2020-01-12 09:35:00', '2020-01-12 09:35:00', '2021-01-12 11:35:00'),
('21990402916b8e8b24e4717948a16dcaf3e6c5d13cd95da18679d8bf6f5c5f3aaead6904acd31d19', 91, 1, 'MyApp', '[]', 0, '2020-01-18 09:55:14', '2020-01-18 09:55:14', '2021-01-18 11:55:14'),
('223db4a5a625f8ee37ca1025afc871ead847ee5fde23f047d454b7b5dd90646a27298019f1bf5f04', 72, 1, 'MyApp', '[]', 1, '2020-01-11 14:29:22', '2020-01-11 14:29:22', '2021-01-11 16:29:22'),
('224f9c528a506e761c627768ffa4c1f59b73f6cad243a394b15610d359475ca9b60eee43bfebd287', 64, 1, 'MyApp', '[]', 0, '2019-12-23 15:03:03', '2019-12-23 15:03:03', '2020-12-23 17:03:03'),
('226f59b88144e61a0598979df0575a7d040408c2bb3242a1631c8b3906622752427bf3fd2b6e5474', 83, 1, 'MyApp', '[]', 0, '2020-01-13 10:39:03', '2020-01-13 10:39:03', '2021-01-13 12:39:03'),
('2409345af8d49b243ca52f6603c76b7e576c7f128d005e2739ac3f31be3d7974e548d4458bf16794', 31, 1, 'MyApp', '[]', 0, '2019-12-23 08:01:05', '2019-12-23 08:01:05', '2020-12-23 10:01:05'),
('240e1892db633af622de6778130fcb7d59a7e996924bf6ecc951b147a64e08540089c65bf6dd1e0d', 73, 1, 'MyApp', '[]', 0, '2020-01-05 10:52:56', '2020-01-05 10:52:56', '2021-01-05 12:52:56'),
('242e4b89726896c6479616137aa804983513cdb91dc48ad8c8109b47c616db2146ca8226f8a303da', 71, 1, 'MyApp', '[]', 0, '2020-01-01 12:44:33', '2020-01-01 12:44:33', '2021-01-01 14:44:33'),
('24fb98690258985e46208397880788eeefebf21c59e6372ed8ebb54fab74a2f78b94e88b682baaa2', 51, 1, 'MyApp', '[]', 1, '2019-12-22 12:39:40', '2019-12-22 12:39:40', '2020-12-22 14:39:40'),
('254160ea84a930e4895d1f326b5bc539f88c35b001bb3820336d951794db3bc456150dcdb5480b44', 20, 1, 'MyApp', '[]', 1, '2019-12-09 10:45:47', '2019-12-09 10:45:47', '2020-12-09 12:45:47'),
('25d7d6ec063fe7adabc841f64639a387e10fc1eb32d9f0a24604a2f71d042555fb3585819b90c3b1', 31, 1, 'MyApp', '[]', 0, '2019-12-25 09:49:51', '2019-12-25 09:49:51', '2020-12-25 11:49:51'),
('26037baac743f176045c0c95555514fadfa103d6ac5a9037068d12abd73a3d51a7d74ebfba404c7f', 20, 1, 'MyApp', '[]', 1, '2019-12-23 15:11:11', '2019-12-23 15:11:11', '2020-12-23 17:11:11'),
('270a32df92c64bca15556dcff45349cfa12df1066794b6beb2f7388b3adcba77111af0bdd9fe083f', 31, 1, 'MyApp', '[]', 0, '2020-01-13 13:36:58', '2020-01-13 13:36:58', '2021-01-13 15:36:58'),
('27afc9b5b342f5540e6cc45aa802721d4b83144d294d55612cc50f7302f02cfaf85a9cc42b4a251d', 70, 1, 'MyApp', '[]', 1, '2020-01-04 12:12:04', '2020-01-04 12:12:04', '2021-01-04 14:12:04'),
('2874b71ac728209ae94b87f1329007d383b9f03feaee1a82fd80b4ac2b066939e8bddba7fffec461', 72, 1, 'MyApp', '[]', 1, '2020-01-05 10:38:22', '2020-01-05 10:38:22', '2021-01-05 12:38:22'),
('2971ae8e37bbbb878a5403959c05e8c5737e9b57f69e5b46df9650e192a5b74552b43794853fc250', 72, 1, 'MyApp', '[]', 1, '2020-01-11 14:38:15', '2020-01-11 14:38:15', '2021-01-11 16:38:15'),
('2a10680339cb32e29947efb81dbe75be96692972de2fb739d08a9c2be253dde3fc0f0de35607cfa9', 98, 1, 'MyApp', '[]', 1, '2021-02-14 10:24:12', '2021-02-14 10:24:12', '2022-02-14 12:24:12'),
('2b70bbe66ba628d1948b7801c9d9d34b16df0f95d6f880a8eec9640fbff2b7922be19c9f7a30d071', 98, 1, 'MyApp', '[]', 1, '2021-02-14 11:52:05', '2021-02-14 11:52:05', '2022-02-14 13:52:05'),
('2bbda5c1d6e51ccca7f8102e7b1ebd54b0bdfd2834efc88e84a18c8b947a11e09ddb7ce114720c13', 20, 1, 'MyApp', '[]', 1, '2019-12-30 12:27:48', '2019-12-30 12:27:48', '2020-12-30 14:27:48'),
('2bf47a973393be5aa6d46e7039aebc027614b9b0cba914c224702ce882504503f3917724f82f3215', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:39:18', '2021-01-18 11:39:18', '2022-01-18 13:39:18'),
('2c77f735ffc1ba01182b153d4594140afb63d213b61d9ff7d8bc9f3496e9cb6381521cbcea20974c', 53, 1, 'MyApp', '[]', 0, '2019-12-22 12:49:19', '2019-12-22 12:49:19', '2020-12-22 14:49:19'),
('2ceaf6cc106d5b4348c9b5260578087066b17c399b765390052913959ac906a12b14b74ac39fc2ef', 55, 1, 'MyApp', '[]', 0, '2020-01-11 08:25:37', '2020-01-11 08:25:37', '2021-01-11 10:25:37'),
('2e132f71344052735d8994744e36e880e2ab01158f1f8c8eda8f81ad37d4f872688d3befab34ced0', 86, 1, 'MyApp', '[]', 0, '2020-01-14 12:35:29', '2020-01-14 12:35:29', '2021-01-14 14:35:29'),
('2f15ecb880fc8e849b1742aaf678af14e155f2669da7577af53bc38925d9483aa5d5aa5a5bdafb9d', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:31:53', '2019-12-23 11:31:53', '2020-12-23 13:31:53'),
('2f59f9d470e00acd0425fb0d5c836ee35b430a3076cbf51dd6b43dfa85c00a02dd01416db7ed4cc6', 31, 1, 'MyApp', '[]', 0, '2019-12-22 11:18:13', '2019-12-22 11:18:13', '2020-12-22 13:18:13'),
('315543df5694e475bc346cbb4f2109483e92daf9def914739df96a031127d23af42415b30d9c8b64', 112, 1, 'MyApp', '[]', 0, '2021-01-21 11:08:46', '2021-01-21 11:08:46', '2022-01-21 13:08:46'),
('31a48bec232cdefabf65e09994452ed46cd9a486d20229a555a8af09cc25ecf2a093422d2d3e8da2', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:57:06', '2019-12-29 10:57:06', '2020-12-29 12:57:06'),
('31fd24839b82ae3c6b367d1a6b4347af7466f6621c31dc476154ee6159ce2d7cb7252853fd06c812', 55, 1, 'MyApp', '[]', 0, '2020-01-11 09:57:23', '2020-01-11 09:57:23', '2021-01-11 11:57:23'),
('32066ce6d05d9f6893e211ffcb63463473ccf4e5d5fa559c21a97f0d18c1b9d1d5762afe4b135f09', 86, 1, 'MyApp', '[]', 0, '2020-01-14 12:30:18', '2020-01-14 12:30:18', '2021-01-14 14:30:18'),
('324fb012562a8f84d10f063e7de6907f59898c117b30348adaac983d785d0115b8282501d4ce5e5d', 70, 1, 'MyApp', '[]', 1, '2020-01-05 10:47:46', '2020-01-05 10:47:46', '2021-01-05 12:47:46'),
('3342a6a05cfd32f650b1ffd95db8811191940e49888f93debb4ea711c14760f3277a9dd843925b8f', 98, 1, 'MyApp', '[]', 1, '2021-02-15 11:56:12', '2021-02-15 11:56:12', '2022-02-15 13:56:12'),
('341af4047b753a6b1a1c7c00ac116550f84719e1dd9a2b832165d6184de76a759c896d39718f68f9', 68, 1, 'MyApp', '[]', 0, '2019-12-25 11:59:26', '2019-12-25 11:59:26', '2020-12-25 13:59:26'),
('343625df598e367bfbfdf539c9a2e07c15a9ce3797d80202e15ea8bce2e8f8a44d569b9bc53ed99a', 20, 1, 'MyApp', '[]', 1, '2019-12-25 09:51:40', '2019-12-25 09:51:40', '2020-12-25 11:51:40'),
('34c0778a0f712259905381d96b758912cac88705675fb8626e9dcc9c956c983594e7c6d39fc078c5', 125, 1, 'MyApp', '[]', 0, '2021-02-24 15:09:16', '2021-02-24 15:09:16', '2022-02-24 17:09:16'),
('35690c2c1cf9e950d8b1206293230e66f25de47ccca54c31e270301bf963cbefb044c8ba382d1788', 87, 1, 'MyApp', '[]', 0, '2020-01-18 09:57:42', '2020-01-18 09:57:42', '2021-01-18 11:57:42'),
('359c4f9c8cf25eb135763ee85ef5c10bd7f387dc87e3f78309c2b8d8acbd4737e00b5c2678e237e1', 31, 1, 'MyApp', '[]', 0, '2019-12-09 13:43:51', '2019-12-09 13:43:51', '2020-12-09 15:43:51'),
('3674544698e30399288c183c17e8b13816688f5aa6df1b1f3bf3a701fb033e97be0a4bd383a9ca42', 98, 1, 'MyApp', '[]', 1, '2021-01-18 12:05:55', '2021-01-18 12:05:55', '2022-01-18 14:05:55'),
('378343ad3e410774238a89532e8f2d1f0415b572503603ba816f7b94a96bea153afb5c3eb7c76832', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:38:14', '2021-01-18 11:38:14', '2022-01-18 13:38:14'),
('37fa63fea2ac9bbe60381d6f0336525017951e5a6f229b26943136709068ab170947e2b892ebc5af', 26, 1, 'MyApp', '[]', 1, '2019-12-07 14:55:02', '2019-12-07 14:55:02', '2020-12-07 16:55:02'),
('37ff67fb6490a7c66bfa9ebb8928363b444d17319face7ca697dfd399c0e6bc786606fe01952755a', 70, 1, 'MyApp', '[]', 1, '2020-01-04 12:32:13', '2020-01-04 12:32:13', '2021-01-04 14:32:13'),
('39079d37c5ccc624a8dcac52748235c2672d9b8c81ba9481eaa192e175526e4283de13bb587c971d', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:56:38', '2019-12-29 10:56:38', '2020-12-29 12:56:38'),
('3a540c6da01fa1b8c5db5d37d4c20ed6c3b7c58a48a541b6727bfaeffc047f8d20df9b6c0a13a9ee', 20, 1, 'MyApp', '[]', 1, '2019-12-30 14:13:12', '2019-12-30 14:13:12', '2020-12-30 16:13:12'),
('3b6a77a3f2acab68c469350a166bb8ef16d0b50460bba2bc58e5118b2834e0996db7ba3431f1abae', 81, 1, 'MyApp', '[]', 0, '2020-01-12 13:03:16', '2020-01-12 13:03:16', '2021-01-12 15:03:16'),
('3ba39e87a3b2ccc3e4d58ca0cd81fb971dc070861c4a4b960991fedc7227307e7a1948575ae85b5c', 60, 1, 'MyApp', '[]', 1, '2019-12-28 15:45:13', '2019-12-28 15:45:13', '2020-12-28 17:45:13'),
('3c8cf79f032f0ccb3a1c53877619c9282f2a01ea032cde22e943023eae77e65cde2583fc1750330b', 20, 1, 'MyApp', '[]', 1, '2019-12-28 17:02:15', '2019-12-28 17:02:15', '2020-12-28 19:02:15'),
('3ce3af2a399f69aefcc6276fe2ce41dc2418a976f878770a35482f0492ce2c3950dbe66aac71d56e', 20, 1, 'MyApp', '[]', 1, '2019-12-31 13:29:49', '2019-12-31 13:29:49', '2020-12-31 15:29:49'),
('3d35797c8d90d98e211e48d15543fb2387b802e9c1abadb70a933ab531c540fb9ab595a24465f5a5', 105, 1, 'MyApp', '[]', 1, '2021-01-22 09:14:57', '2021-01-22 09:14:57', '2022-01-22 11:14:57'),
('3d451631222afc9242df4f85d7fd1d10691c6c3da87215be0ca3c49eae2240376b1ab3d52a295ce1', 20, 1, 'MyApp', '[]', 1, '2020-01-05 08:32:51', '2020-01-05 08:32:51', '2021-01-05 10:32:51'),
('3dd05bf8192504c5c415a119752569989f31cc3d4be5923d00083a47daff5d85203f6ad5e56d6b61', 20, 1, 'MyApp', '[]', 1, '2019-12-21 15:41:45', '2019-12-21 15:41:45', '2020-12-21 17:41:45'),
('3e36777b1078b2cad7fce9228d06759d82a1778636d9f825c28f52cd2a55d111662e83daa09d83da', 113, 1, 'MyApp', '[]', 0, '2021-02-14 07:39:54', '2021-02-14 07:39:54', '2022-02-14 09:39:54'),
('401cff38d57aaaefffe07e6d0597095586b177de2d01089eb7cf5e3a6de58cfb780af0db9518eca6', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:16:01', '2021-01-18 11:16:01', '2022-01-18 13:16:01'),
('4045271f8385114d588e9069f565b62a715dbf35b2e6a2218733e3e7a3d40b18bc76827aec0deac0', 20, 1, 'MyApp', '[]', 1, '2019-12-09 08:17:03', '2019-12-09 08:17:03', '2020-12-09 10:17:03'),
('406a039c0b2eaab6a69c6e9e83ca6b7202bcc0b3cba15f38cc6fd3a9a1f16d5679b80e0d5ba3714c', 26, 1, 'MyApp', '[]', 1, '2019-12-07 15:25:15', '2019-12-07 15:25:15', '2020-12-07 17:25:15'),
('40d2d9bcd62680e95fa9381facaa166e932b3be803850f22ecba5f20f693e8358794bbb2aa70ea95', 55, 1, 'MyApp', '[]', 0, '2020-01-06 10:48:32', '2020-01-06 10:48:32', '2021-01-06 12:48:32'),
('4285346e870cf946acffa9033aa1e8cfdaf906365eb96df80d54d55f5fea615ce573aa1ccbcd5ce6', 87, 1, 'MyApp', '[]', 0, '2020-01-18 09:55:05', '2020-01-18 09:55:05', '2021-01-18 11:55:05'),
('432723d920725c8ef565ccf94bba84345bda642ae249a3cb9d2db06e3a4cbb600e623bc3a2d867af', 20, 1, 'MyApp', '[]', 1, '2019-12-10 13:15:42', '2019-12-10 13:15:42', '2020-12-10 15:15:42'),
('443d52f7cb3cea4106ac5ca11ae10f02e13a9c5aabf9d15c33b22fb2d6493b7219bcdd864ba6176c', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:58:24', '2021-01-18 11:58:24', '2022-01-18 13:58:24'),
('44452ef4e358d7d043c4bb6a5415988c3f9442b6fe7e61c8649cf0cc19d869c34c9d289b8aa5cf25', 105, 1, 'MyApp', '[]', 1, '2021-01-19 07:36:42', '2021-01-19 07:36:42', '2022-01-19 09:36:42'),
('44aff00ceef1599f0ebb06dad713c32d0e2d1b51c36d3983cbad8aec3581314fbede6914288f2900', 20, 1, 'MyApp', '[]', 1, '2019-12-29 09:17:29', '2019-12-29 09:17:29', '2020-12-29 11:17:29'),
('450d297b230b2f15b81d2de94a7ee2650cceeaf22f0a8838fad4fff174a7b6ed4e6806efd3325aeb', 20, 1, 'MyApp', '[]', 1, '2019-12-24 08:20:48', '2019-12-24 08:20:48', '2020-12-24 10:20:48'),
('451ca384158b95ca68543c1d851592f480fdf88d8ce6461446e924c2f70a6b1f9348be0858a5a22e', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:58:07', '2021-01-18 11:58:07', '2022-01-18 13:58:07'),
('455cf0943de77764fcb54fd6e8ed993f7cf5aceb0c5096dd8e96a7dafc8bc98ac4e82684e34f79a9', 70, 1, 'MyApp', '[]', 1, '2020-01-11 15:27:23', '2020-01-11 15:27:23', '2021-01-11 17:27:23'),
('456b43502e93788f48d2e29a55437413e492d4c17939ee0d4805b2e88225ddab74906affcd8d9907', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:25:00', '2020-01-12 08:25:00', '2021-01-12 10:25:00'),
('4637d5dbae3b6633c34257fb2138691d0ca6a1eb2d17d0237d2b30bf0b1aabf2917835db91331162', 98, 1, 'MyApp', '[]', 1, '2021-02-14 09:07:09', '2021-02-14 09:07:09', '2022-02-14 11:07:09'),
('47643ccb9d325193af3b716c708bd9a4b879b33b6d9530bbdc829ff86bb0a4a3d9d54a17e665cc36', 20, 1, 'MyApp', '[]', 1, '2019-12-30 08:25:18', '2019-12-30 08:25:18', '2020-12-30 10:25:18'),
('47b278d3ed33aecbbe3bd568b2e751e50658c04ae01be32888d886b8fcbe69b7c19f69f8e8b6982b', 67, 1, 'MyApp', '[]', 0, '2019-12-24 15:23:58', '2019-12-24 15:23:58', '2020-12-24 17:23:58'),
('48101ca111fa1dbfa7ad9a804e87cbb2ae3648c5cb408063a2c13bcebd92df8d9a179b8596521a63', 98, 1, 'MyApp', '[]', 1, '2021-02-21 03:49:43', '2021-02-21 03:49:43', '2022-02-21 05:49:43'),
('4843801cc45aad598cdc4f3b734f283628c61ba40906079735aa42d822f2a63781bdf86986de25a0', 31, 1, 'MyApp', '[]', 0, '2019-12-09 13:35:20', '2019-12-09 13:35:20', '2020-12-09 15:35:20'),
('48efc1b495422a3597b73af35a4fccecd690078b54b3dba87d47afacfd30b63e831bfe87a231c023', 87, 1, 'MyApp', '[]', 0, '2020-01-14 12:37:49', '2020-01-14 12:37:49', '2021-01-14 14:37:49'),
('4940aa14b48338eddc8633cf8d7113e07c2c51c782b67131ee44748282b332718b8bfb9a1fc54385', 60, 1, 'MyApp', '[]', 1, '2019-12-25 09:56:33', '2019-12-25 09:56:33', '2020-12-25 11:56:33'),
('49c87450d5f708f436f7f3e84f7ea236bf736227be0ed17702b7dec0a9cd74f049b932989127f955', 72, 1, 'MyApp', '[]', 1, '2020-01-05 11:24:55', '2020-01-05 11:24:55', '2021-01-05 13:24:55'),
('4b14dd3780acec94403c7407ce86218fae28dd57d7fd0949792d01f7e2e6747f3f35e3052ef1391d', 72, 1, 'MyApp', '[]', 0, '2020-01-12 13:28:51', '2020-01-12 13:28:51', '2021-01-12 15:28:51'),
('4b7346e90501ed01b62e88fbab78b3011c0394d63d0ded6aa4ae527e907be2e144b8865ba46d300b', 20, 1, 'MyApp', '[]', 1, '2019-12-23 15:09:28', '2019-12-23 15:09:28', '2020-12-23 17:09:28'),
('4bc70a3824a9782ccd8eebdceb29128e1e1c2a128337d707937282812ac49f252e572d79f46eff86', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:22:07', '2020-01-12 08:22:07', '2021-01-12 10:22:07'),
('4cd9732e729ce0a69c0c6af7e01745dba99937054abcf09b9cbe29ca446131cba237de3a4628abe2', 20, 1, 'MyApp', '[]', 1, '2020-01-12 12:22:27', '2020-01-12 12:22:27', '2021-01-12 14:22:27'),
('4cf1e9372bd80a612706a5ffe8c3116012ff8feda2126ebcd9786ad04f2b7cc4b07fc398827fc220', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:52:19', '2019-12-29 10:52:19', '2020-12-29 12:52:19'),
('4d218f8d6841d1cda6142899f64898ae9d5267ea84a7dd862a2097ff74ecadeb8a57443d55af3159', 20, 1, 'MyApp', '[]', 0, '2020-01-21 08:12:18', '2020-01-21 08:12:18', '2021-01-21 10:12:18'),
('4d69f095d5071443459bc65c06d2dc5a1e85fb0b610943315db06aa0e15b06be7054303e49e8c1b0', 20, 1, 'MyApp', '[]', 1, '2019-12-08 09:23:31', '2019-12-08 09:23:31', '2020-12-08 11:23:31'),
('4e5458e16676b0505e8e5a4dc135f7dd67d3f533f056af6f12fa600229539a9e3f096f3e80cda25a', 114, 1, 'MyApp', '[]', 1, '2021-02-25 10:35:26', '2021-02-25 10:35:26', '2022-02-25 12:35:26'),
('4ec2e6aa5d54e74e64caf30ac81024a5c482c1c2a06b0a0d4d10bf387558f48caf8aa57b787cf3e9', 20, 1, 'MyApp', '[]', 1, '2020-01-06 09:33:29', '2020-01-06 09:33:29', '2021-01-06 11:33:29'),
('4f32e139aa32e26cd8b897bca9bdbef00120dcc5040b3871873cf29ab3e9ac850ab7c47af026deec', 98, 1, 'MyApp', '[]', 1, '2021-02-14 09:51:23', '2021-02-14 09:51:23', '2022-02-14 11:51:23'),
('4f3667ce9befea7407e3954bd37fe971249d5d6e6710e8774432aa8f9119b5a6acaa4d051a4b02ad', 20, 1, 'MyApp', '[]', 1, '2020-01-14 11:55:14', '2020-01-14 11:55:14', '2021-01-14 13:55:14'),
('500c0f98d5817bf611d0eeba00bf14b2a06081f3cf3776f83a987aac5d7775e0c5583583c324b03e', 20, 1, 'MyApp', '[]', 1, '2019-12-17 11:29:33', '2019-12-17 11:29:33', '2020-12-17 13:29:33'),
('507cb94d7860bc0d333fe10ff167af9e6c96ead67f3104c13532d2244c8e9a4edda9028f6b0d8860', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:52:47', '2019-12-18 10:52:47', '2020-12-18 12:52:47'),
('50a90f0e5d863682dd73905ba354401f1aab8d5414d3041e3695f146abfab8f0bc876c47f226f645', 31, 1, 'MyApp', '[]', 0, '2019-12-23 08:13:45', '2019-12-23 08:13:45', '2020-12-23 10:13:45'),
('52553efe6974cbde55005e08f4a44bba2c79b023dfb09173025702e1bed6027876f741c78caaba3a', 98, 1, 'MyApp', '[]', 1, '2021-02-17 15:43:00', '2021-02-17 15:43:00', '2022-02-17 17:43:00'),
('52581e883e894e7b08aa7041f04bd95bf50afb3868fbf8d76b07d97bdda06e1c06b1d2e83812ca04', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:53:12', '2019-12-18 10:53:12', '2020-12-18 12:53:12'),
('529341b473788bc08d10017e0a5f1cb5a5eacab331040beb47723043852ff0bff3224db04d711b13', 20, 1, 'MyApp', '[]', 1, '2019-12-25 12:11:02', '2019-12-25 12:11:02', '2020-12-25 14:11:02'),
('538dd8be026d4a41f5d63c33dc35c781eb0915b3b0e935c94caee82c08219b62efc5707aef0e0f07', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:31:01', '2020-01-14 14:31:01', '2021-01-14 16:31:01'),
('5398f82e78893e510cee503633501a8ec2936e5013d7e3b7d1be9db510012fcacf1481c3f79c36a1', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:01:25', '2019-12-23 12:01:25', '2020-12-23 14:01:25'),
('54b3774ba25fd0bcddd906b7c42cbd8ce6a296d144a67f6c5fd2cc2b98fd78c9b170aa0e79fb5ddf', 20, 1, 'MyApp', '[]', 1, '2019-12-30 12:34:35', '2019-12-30 12:34:35', '2020-12-30 14:34:35'),
('55676d2152dd7502bae9e0b0e173ec16da6a5765ade3e7416b0ea9fc99d8933b2d412ebd99b5ad08', 105, 1, 'MyApp', '[]', 1, '2021-01-21 11:11:20', '2021-01-21 11:11:20', '2022-01-21 13:11:20'),
('573b136799661dc2431e2d9e54eab5421d3f10cfcae65d5c2c8ae93af553a49492718353bdb55030', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:10:49', '2020-01-14 14:10:49', '2021-01-14 16:10:49'),
('57576710062aa2705e6bf7b2689d038c70429244299c696331ad45db77e950e8052bf194f3865355', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:21:44', '2019-12-23 11:21:44', '2020-12-23 13:21:44'),
('5772627b62b90c3a05701200485d43c551fd9d75c1e2f0f628dcd53f0d0a8fe8c56d281d9c5994c8', 60, 1, 'MyApp', '[]', 1, '2019-12-28 15:45:47', '2019-12-28 15:45:47', '2020-12-28 17:45:47'),
('5791387ed71284c6deb5f53ddc115db2391225efc541ec06422f04fe3946a12c612118df640e77c3', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:09:03', '2019-12-29 15:09:03', '2020-12-29 17:09:03'),
('57a4b7c7522ac4f9074f44e79e4041d6557ce3e0ecb20da994e63f7795daa7904f75e6a17f316419', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:57:36', '2021-01-18 11:57:36', '2022-01-18 13:57:36'),
('57d30b5d7b06440ad17e3e4b512e467cdc26d7d3997647c6328fee4d603b7f0756879bfd34c57f09', 58, 1, 'MyApp', '[]', 0, '2019-12-23 10:05:20', '2019-12-23 10:05:20', '2020-12-23 12:05:20'),
('5829d374965c07c43b759233d604c46b5b44141e6f7eb356ee5eeb1675d3432ee847ede703fe8577', 112, 1, 'MyApp', '[]', 1, '2021-01-20 07:26:45', '2021-01-20 07:26:45', '2022-01-20 09:26:45'),
('584b463ab2dde4d1fd912c81035778b030c80881d862cc4e20378d3de8189257b3c229ffcf9abf5f', 55, 1, 'MyApp', '[]', 0, '2020-01-11 08:35:24', '2020-01-11 08:35:24', '2021-01-11 10:35:24'),
('58610a5935d8505e0137d85840f0cade60fd6b914994676837f9db74beccf5a2bcb1a91776b8cfbe', 20, 1, 'MyApp', '[]', 1, '2020-01-13 09:13:04', '2020-01-13 09:13:04', '2021-01-13 11:13:04'),
('59a3955580db668f17a45633037b95a560a634ac35fc6469259dc2a2feb480acdf1eb316aa6e2038', 125, 1, 'MyApp', '[]', 1, '2021-02-24 15:07:08', '2021-02-24 15:07:08', '2022-02-24 17:07:08'),
('5b146063acf725cdcbea5f177c6e62479db3974ebfa95423338c515d44dccc7e679829eb73dc35fe', 20, 1, 'MyApp', '[]', 1, '2019-12-18 08:48:50', '2019-12-18 08:48:50', '2020-12-18 10:48:50'),
('5b7be05e5eeb3d36ee67286e777c1583f67c9d50e433c9ce2acc691e0a46e5975792d357331d038c', 88, 1, 'MyApp', '[]', 0, '2020-01-14 12:37:30', '2020-01-14 12:37:30', '2021-01-14 14:37:30'),
('5b90cd19706109ab28c89556b5978adf482b2714ead7237d159b563800a2272ff7ece82946fa5f32', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:13:32', '2020-01-12 08:13:32', '2021-01-12 10:13:32'),
('5ba3ab082ad20c5fb73eecf420c95f303abb67045b0221b5d5202b13ea74ffc05241cf30e5dd5c39', 60, 1, 'MyApp', '[]', 1, '2019-12-28 14:39:17', '2019-12-28 14:39:17', '2020-12-28 16:39:17'),
('5bbc2674a0386467b779af6f07dc0a0f535b5bd3652802b3eb20193787e321083df1f089fdfecd82', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:40:47', '2021-01-18 11:40:47', '2022-01-18 13:40:47'),
('5bd7c165546c7edd7c331a5a30363ba38115365ffda46b9dfd6e35d849730ded6df3145c47f3c279', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:21:59', '2020-01-12 08:21:59', '2021-01-12 10:21:59'),
('5bf7b52685b4d93101a62d46df99230f997e632a6e34f377d72a145df929f7e243be937cf6af3175', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:09:36', '2019-12-29 15:09:36', '2020-12-29 17:09:36'),
('5c0b131f5b3dc2d43634c620c80870b305358f4fa9817a1ee2268f4191e8c5bbedc3d805786809cb', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:59:46', '2021-01-18 11:59:46', '2022-01-18 13:59:46'),
('5c2c906bff0c6e63682dba5be4f5bf0085ff184491d810cb7f286df0ab97322dd518c8cd6157f6a3', 98, 1, 'MyApp', '[]', 1, '2021-02-21 10:33:57', '2021-02-21 10:33:57', '2022-02-21 12:33:57'),
('5c33549eb115a4bbb70b92868cd4c4a4db2b23eae63419f6429894ab86bbc58a184ce9a7f7a10fb7', 70, 1, 'MyApp', '[]', 1, '2019-12-30 14:22:06', '2019-12-30 14:22:06', '2020-12-30 16:22:06'),
('5c41b12235b0709f7389e11323ae1dee076efc44d335b9ec2c962ab9cf02dceff679f9e3716056d2', 31, 1, 'MyApp', '[]', 0, '2019-12-23 12:06:18', '2019-12-23 12:06:18', '2020-12-23 14:06:18'),
('5c5344fa776d79572b7c1e2ea48298a40e5e6993d7ea28d5671ed462fefa58f11d336e8e723e0c64', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:12:55', '2019-12-08 08:12:55', '2020-12-08 10:12:55'),
('5e579ad6360eb8b97077770180b589d8496ee2dda7a7a1b7765d3865b1e4d29e202d29c48010d35f', 20, 1, 'MyApp', '[]', 1, '2019-12-10 08:32:00', '2019-12-10 08:32:00', '2020-12-10 10:32:00'),
('5e8c183abf3033fef704eb95792505f13d3c6a47e6c2dd2195c924aa22052b56c9c55d029e91fb07', 20, 1, 'MyApp', '[]', 1, '2020-01-13 08:17:05', '2020-01-13 08:17:05', '2021-01-13 10:17:05'),
('5f1303830d990c88c0685704ce7eeba929b2df84c5d526f2cf2622bc49042a7c02ae97458e694bb4', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:07:52', '2019-12-23 12:07:52', '2020-12-23 14:07:52'),
('5f494c0f084a4677256ec58c23529fc63df145a5d6dff8d0811efe45f26fab6a0837de44473cef09', 31, 1, 'MyApp', '[]', 0, '2019-12-23 12:00:52', '2019-12-23 12:00:52', '2020-12-23 14:00:52'),
('5fd83b475109d6c33857626db74b9b94fa37c7a65f5d890da9a8c9ffac1ed89bfaa0e8069690ad72', 20, 1, 'MyApp', '[]', 1, '2019-12-17 15:41:53', '2019-12-17 15:41:53', '2020-12-17 17:41:53'),
('621d926e235be4c788cc2e4869d57a285481aa037fdfaf06d50a9f62ad8a75b224b920b77d8bd359', 105, 1, 'MyApp', '[]', 1, '2021-01-20 07:14:28', '2021-01-20 07:14:28', '2022-01-20 09:14:28'),
('6471b0d076b94d21edd1326be3de555ecbac9dcd5e4ea533dbcb546cc7c85e502d5775a7d336d704', 20, 1, 'MyApp', '[]', 1, '2019-12-15 09:36:27', '2019-12-15 09:36:27', '2020-12-15 11:36:27'),
('65a454c2a7281bc5666b4ef174c1e58b16b1564868842629bfb40883c80cc7e8e575fc6cfde498ad', 20, 1, 'MyApp', '[]', 1, '2019-12-21 09:04:04', '2019-12-21 09:04:04', '2020-12-21 11:04:04'),
('6613e505484e4c5530fa8016e5d5f65ab5acd1cd47a62d9273a63c594141ae5a6d6a53edefe28e92', 20, 1, 'MyApp', '[]', 1, '2019-12-23 15:09:17', '2019-12-23 15:09:17', '2020-12-23 17:09:17'),
('66c2b99c9517d87d392162d401813c19786091fd38e5fde82d06360abf04b8db3432e569206933c9', 105, 1, 'MyApp', '[]', 1, '2021-01-21 09:35:37', '2021-01-21 09:35:37', '2022-01-21 11:35:37'),
('66cd42171b5c31a47f81d4f998b2e6f50189c3503aabc10fa5c7f684d4c84b133f8c7baa7dccaabb', 60, 1, 'MyApp', '[]', 1, '2020-01-06 11:22:38', '2020-01-06 11:22:38', '2021-01-06 13:22:38'),
('66dd86ce6290afbbbb93547d263867b9acbfd4b5f97bb4a6c5344c2988fd6fd49ad85e673cb29371', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:05:45', '2019-12-23 12:05:45', '2020-12-23 14:05:45'),
('66e7f0ead749784d09db5bcd90c1649787df8b2d005e0744f462f0cb8b2f0dcdd02ff3e03d70ae8a', 87, 1, 'MyApp', '[]', 0, '2020-01-18 10:01:44', '2020-01-18 10:01:44', '2021-01-18 12:01:44'),
('677071aaaf80f5e2071527dce94bee6315bd922d1fd5e87b62c2d382b3ec50921205313d5423de6a', 26, 1, 'MyApp', '[]', 1, '2019-12-07 14:53:33', '2019-12-07 14:53:33', '2020-12-07 16:53:33'),
('677ac90c4630f13b4a0e431266d81713e5603fcde87757094952da4957b5c6c511cc17e344dfa1a7', 20, 1, 'MyApp', '[]', 1, '2019-12-28 16:59:30', '2019-12-28 16:59:30', '2020-12-28 18:59:30'),
('681bceff9ede535450e7ba73c214a428104ba27303096eb67ae5298a14d91039c3c46f35820258ac', 105, 1, 'MyApp', '[]', 1, '2021-02-14 11:35:26', '2021-02-14 11:35:26', '2022-02-14 13:35:26'),
('68e7c8e011f3e2e52f8b80163f9d24bcbdeb1137dfbef5a0d7d7d4bea08cc0f52dbd933ef47233e7', 86, 1, 'MyApp', '[]', 0, '2020-01-14 12:34:16', '2020-01-14 12:34:16', '2021-01-14 14:34:16'),
('6a4ff23b714b9b54ca9589da441e299532c057289293c7213cf99bf9c82ff2dd709932503cf44f44', 20, 1, 'MyApp', '[]', 1, '2019-12-28 15:51:32', '2019-12-28 15:51:32', '2020-12-28 17:51:32'),
('6c11f9585b51d71ea4881e40c3b46399a556b048b6dec709f3a8e83b68cb3925519f743cd557ceda', 54, 1, 'MyApp', '[]', 0, '2019-12-22 13:17:10', '2019-12-22 13:17:10', '2020-12-22 15:17:10'),
('6c48452c494b0b37b366595a7fb2028e3dd09e48057927e02943e636d21ec322f797d750184a7cd4', 20, 1, 'MyApp', '[]', 1, '2019-12-09 13:49:18', '2019-12-09 13:49:18', '2020-12-09 15:49:18'),
('6cb9812311bd8dc1c0eaf1169ffa1eac6c6cb3ebe45591742c37d670099c9fa2444f778813beafb1', 20, 1, 'MyApp', '[]', 1, '2019-12-23 10:55:38', '2019-12-23 10:55:38', '2020-12-23 12:55:38'),
('6db0e95ab3978650d86ad1be06d6a83dd3933400b70c04963776e408177b8e8eeb7e1854884fef31', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:03:14', '2019-12-23 12:03:14', '2020-12-23 14:03:14'),
('6e61cefc1ccb0ea1effda4c1d77a7e06444f67b1d13347c85c4a3a3cbbacd072b415c2661ea7b17f', 20, 1, 'MyApp', '[]', 1, '2019-12-29 09:14:17', '2019-12-29 09:14:17', '2020-12-29 11:14:17'),
('6f87c035200e197506456e1b14f0195bd807e3af98def9755245691cf1f132ee1864074a62bca755', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:28:37', '2019-12-23 11:28:37', '2020-12-23 13:28:37'),
('6fc9c49f1f3c09aca86cf2b38b8b97a593b8ae38667a12be0ea20bb723b5111cc027ee4f56386dc4', 20, 1, 'MyApp', '[]', 1, '2019-12-25 10:13:23', '2019-12-25 10:13:23', '2020-12-25 12:13:23'),
('707497d18c81d6f37583157821d8b249fc4a4e1c14bc6a36ab124ca4cbacd9af0e36ec89356d9480', 20, 1, 'MyApp', '[]', 1, '2019-12-18 08:11:58', '2019-12-18 08:11:58', '2020-12-18 10:11:58'),
('709c17b83e989a2bf4bb64e5a386349136641b2be649df93f1a0c19c9b1399878b17f60057ad6040', 105, 1, 'MyApp', '[]', 1, '2021-01-20 11:23:43', '2021-01-20 11:23:43', '2022-01-20 13:23:43'),
('70c0e9812f5520101ee9395b91dd926f82c5e9dffb75d7c12f3e8befb8f30684b3752f5a03858da8', 31, 1, 'MyApp', '[]', 0, '2020-01-13 10:49:47', '2020-01-13 10:49:47', '2021-01-13 12:49:47'),
('7133691328dbc72b5513b374ac2b1e71d9c8f0b9640faf7acba1d78194390f0d942f574cac514423', 70, 1, 'MyApp', '[]', 1, '2020-01-13 12:37:50', '2020-01-13 12:37:50', '2021-01-13 14:37:50'),
('72c83fed9c8634fa7096df4bbe61ab841763d3b15d17ca660049ae2bfcb3aa6e11313794318c73b5', 20, 1, 'MyApp', '[]', 1, '2019-12-09 08:15:42', '2019-12-09 08:15:42', '2020-12-09 10:15:42'),
('7426ecad4506b4203338d7e7dc1fc5310d2b7aeaf30a6efec1bafa306622b69269166a3c26a3e266', 20, 1, 'MyApp', '[]', 1, '2019-12-15 15:15:50', '2019-12-15 15:15:50', '2020-12-15 17:15:50'),
('742b4d52568b25e7d8153b04eca9c4be88e3767e0b7b6a553326844e8c7a63ab573cce7fa0c555d6', 70, 1, 'MyApp', '[]', 1, '2020-01-13 13:07:17', '2020-01-13 13:07:17', '2021-01-13 15:07:17'),
('74e31b2f74b788c25bfefa0a807c944739c3dc6a4b082a8a7227bbe664bfb862491008509038afa2', 55, 1, 'MyApp', '[]', 0, '2019-12-24 13:52:36', '2019-12-24 13:52:36', '2020-12-24 15:52:36'),
('74e7f112ccb87060fcdf04a42664a4ce916900c279618254ba2de7bea529a42d5312cf4f41ea6ae7', 26, 1, 'MyApp', '[]', 1, '2019-12-07 15:12:53', '2019-12-07 15:12:53', '2020-12-07 17:12:53'),
('755a3b6d4f4510543f41fa03241d12af6a014165f3ba3be31c971b01fece30f539bd91a9b0d4ce1e', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:09:56', '2020-01-14 14:09:56', '2021-01-14 16:09:56'),
('759b5de3df0a3fc2390cedba6aeb2a2cc38b37466debee280dcab741141e641a3cfa8f4e626f432d', 20, 1, 'MyApp', '[]', 1, '2020-01-12 12:22:29', '2020-01-12 12:22:29', '2021-01-12 14:22:29'),
('75b0ef8e4b7ac772a6439eff79eef5c344cf96a9900bc5c3b55c9d17d58298bebff9d750b9e29a33', 26, 1, 'MyApp', '[]', 1, '2019-12-07 14:59:33', '2019-12-07 14:59:33', '2020-12-07 16:59:33'),
('75bc75292994a4fd5101537a5ea06340b5386c1050dc51a5b99abdfb6f5217cc2e415dc9a8ace248', 20, 1, 'MyApp', '[]', 1, '2019-12-22 14:46:44', '2019-12-22 14:46:44', '2020-12-22 16:46:44'),
('75f3d14db3cf7136eb247199c9a0b6379ea29f3fc3b0e87738bdeb8a14ecfb4168062c57c49cfc19', 20, 1, 'MyApp', '[]', 1, '2020-01-04 12:22:58', '2020-01-04 12:22:58', '2021-01-04 14:22:58'),
('7662b7171e6be70b6ac937c16a85a8fd97166cd4158cf2cba1b7b83ed71203c40eddb8f0d516b6de', 55, 1, 'MyApp', '[]', 0, '2019-12-23 08:18:13', '2019-12-23 08:18:13', '2020-12-23 10:18:13'),
('76e37fd31382abb968ea54d077ab343d2635380dcb840d7aaf8992f6a13d5c60a1529ec84c50cb9b', 20, 1, 'MyApp', '[]', 1, '2019-12-31 13:11:02', '2019-12-31 13:11:02', '2020-12-31 15:11:02'),
('76eba06ebe32e5cdab8b630059b1b6342036dbd93b9c2b7dc43466f39729d6e2d2069594894d02a2', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:49:33', '2019-12-18 10:49:33', '2020-12-18 12:49:33'),
('784a770fd4c09eb9d74c39c47f27bfd7852efbccf4beb708e019b5c7fb51c7bc87d9b9672e574a1a', 20, 1, 'MyApp', '[]', 1, '2019-12-30 15:12:03', '2019-12-30 15:12:03', '2020-12-30 17:12:03'),
('793cd8b188472aafa1217caf5917934dcf5505501fdc691c1fc64e209bd845755fd81b0f66802949', 86, 1, 'MyApp', '[]', 0, '2020-01-14 12:31:11', '2020-01-14 12:31:11', '2021-01-14 14:31:11'),
('796640a4f18f53e85a28ac2f4089c3065dd9d4bddbc922c9e4bdf23e5b0d69de56052a2dde8430b2', 20, 1, 'MyApp', '[]', 1, '2019-12-21 15:36:55', '2019-12-21 15:36:55', '2020-12-21 17:36:55'),
('7971c4e0faf6afb2e3f76bf3baa21bb0a85bb892bbb4c21f5f2dabb3a7a41952a1c5a42f8577b9ba', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:18:06', '2019-12-23 11:18:06', '2020-12-23 13:18:06'),
('79836e086f8d3cccf907adafe9a1fb99194286c179826d395aac23a7faf5be3c4f8bd44e8ae2712e', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:45:59', '2019-12-23 11:45:59', '2020-12-23 13:45:59'),
('79c4d6cb8ab826e2c8b0a81a53f6276e9ba7d72cf15713f38f22dd73e5b42fd55842c403e69391ed', 20, 1, 'MyApp', '[]', 1, '2019-12-30 12:28:00', '2019-12-30 12:28:00', '2020-12-30 14:28:00'),
('7a6ed448b98e4e0771c68d40a4aaec75620eb454417910c84800de7aae556b2e6880b2c1d44e451f', 20, 1, 'MyApp', '[]', 1, '2019-12-23 10:52:32', '2019-12-23 10:52:32', '2020-12-23 12:52:32'),
('7aaf5708841172ee5a86dfa9f38dac7d39e4a2a43dea1ea4fc2923a7271749297d48deba58d54aa7', 72, 1, 'MyApp', '[]', 1, '2020-01-05 09:49:34', '2020-01-05 09:49:34', '2021-01-05 11:49:34'),
('7aee4479d3db62a5996e4f61f2287afaeb66e5e6d140277fba1a9957a883ff745c84e07ae82a8c92', 20, 1, 'MyApp', '[]', 1, '2019-12-23 08:56:59', '2019-12-23 08:56:59', '2020-12-23 10:56:59'),
('7b97d26d36be6dc39f21cc0f3538639b9f2568894151917d3b015fba72859c278d77632118ca40d6', 20, 1, 'MyApp', '[]', 1, '2020-01-12 11:49:14', '2020-01-12 11:49:14', '2021-01-12 13:49:14'),
('7bf7b970b4f4de6d272259aae9a93303102d6f4cb7e13288c90ac886f886751d9f167a1585748f47', 56, 1, 'MyApp', '[]', 0, '2019-12-23 10:09:59', '2019-12-23 10:09:59', '2020-12-23 12:09:59'),
('7d5e1abd37afe753777911a55513ffc62f310707023a4411ab948bd26960bba8857eef252e1f06b4', 20, 1, 'MyApp', '[]', 1, '2020-01-18 15:01:06', '2020-01-18 15:01:06', '2021-01-18 17:01:06'),
('7d921e181e1fcda3e3e05e3dd5377b7d33e911b5247650a8bd48c6c59f4b50a53b0b6962a53051ec', 77, 1, 'MyApp', '[]', 0, '2020-01-12 08:39:57', '2020-01-12 08:39:57', '2021-01-12 10:39:57'),
('7d98534a7167c8ddcf5b7458dbd843b5da0f2a9c6638a577907d4e4618c602d8aa6a91072ca78785', 31, 1, 'MyApp', '[]', 0, '2019-12-18 08:48:32', '2019-12-18 08:48:32', '2020-12-18 10:48:32'),
('7df2b70788cbb3124c7be4202665688258b47d2a96e53bb75266f7dc7eafe81404e786ff0e2ef171', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:19:50', '2019-12-23 11:19:50', '2020-12-23 13:19:50'),
('7e8a7f66f57060895d63a0e6c8854068e4118309f57b638093e34a4aebb6cb5c75dc76fe756f2f8d', 105, 1, 'MyApp', '[]', 1, '2021-02-14 09:06:40', '2021-02-14 09:06:40', '2022-02-14 11:06:40'),
('7eb4e5d681ee647fdcc60f35284440030018e93369b0aabc0c9ab8be902dfe03058534129d196936', 98, 1, 'MyApp', '[]', 1, '2021-02-17 12:24:45', '2021-02-17 12:24:45', '2022-02-17 14:24:45'),
('7fd63422bd114356a8a83216a2c15c683b5bd6f4db75979e67b3bade0330707063cdc6906a74d88b', 31, 1, 'MyApp', '[]', 0, '2019-12-09 13:34:54', '2019-12-09 13:34:54', '2020-12-09 15:34:54'),
('810adb989a604334d5e2e306755b35f440a11d271bc1288ea7f6310a352eaac24223604476eb650e', 98, 1, 'MyApp', '[]', 1, '2021-01-21 08:20:11', '2021-01-21 08:20:11', '2022-01-21 10:20:11'),
('811befd889c1b12e67b8ae8adcd3f74cd316f116ffaf7fac4f042feea724b6b16bfa08ce5e3439c6', 20, 1, 'MyApp', '[]', 1, '2019-12-28 15:42:52', '2019-12-28 15:42:52', '2020-12-28 17:42:52'),
('82204b549558dc57c7b59121f71dce4fffc0aaedfe868602737592197abc81e01e0438e3ca3cd196', 105, 1, 'MyApp', '[]', 1, '2021-02-13 07:55:37', '2021-02-13 07:55:37', '2022-02-13 09:55:37'),
('82843a382515f89a942a99df094a478bdbcd99cc3e82cf553ef1099205fbb319598f90a8d5f54875', 20, 1, 'MyApp', '[]', 1, '2019-12-21 09:04:44', '2019-12-21 09:04:44', '2020-12-21 11:04:44'),
('8363e3307d40b9b2cf8748da9176a7650d460d2dbf65d776d871706c6c8c7c4f0cd3fc86a309b92c', 20, 1, 'MyApp', '[]', 1, '2019-12-08 09:23:45', '2019-12-08 09:23:45', '2020-12-08 11:23:45'),
('83b6b7201eee40082cfbf66b154078d166c1087f60aaed3c951dbd9d0dcd3b4f5b8d318a7843f169', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:04:10', '2019-12-23 12:04:10', '2020-12-23 14:04:10'),
('83db91f2d55b4f29eea91b6717988ffe7b38aedacff71e1693e83bdd847db7f214db7f24396d4a6d', 87, 1, 'MyApp', '[]', 0, '2020-01-18 09:55:47', '2020-01-18 09:55:47', '2021-01-18 11:55:47'),
('83f4e0dfd692b79f4bb0f0ccb73e911cba8836d0c8e4ad3ac6d607533841705e53fcad62ba805f25', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:09:51', '2019-12-23 12:09:51', '2020-12-23 14:09:51'),
('84288af3788d7b0389300915c97e6c958997f846fd473824c0771bf3f2e9d6929ffc7a362431dd7a', 98, 1, 'MyApp', '[]', 1, '2021-02-25 10:40:14', '2021-02-25 10:40:14', '2022-02-25 12:40:14'),
('844afc9c8dd1762edf4050d3307da0718fc6484d8e75bc72f97148fb0c285aae09c3ad620a28d2ef', 70, 1, 'MyApp', '[]', 1, '2020-01-04 12:33:21', '2020-01-04 12:33:21', '2021-01-04 14:33:21'),
('847a39241119e23f36a6268e92480e178efac51d15b1bcea00f11493cd3e6a040415e1ce826f04cd', 98, 1, 'MyApp', '[]', 1, '2021-02-18 12:34:10', '2021-02-18 12:34:10', '2022-02-18 14:34:10'),
('84892df95e677f4da9c55d1eebe42823f62103750093750a092d856b3989b7e6974ab15e8d321e72', 90, 1, 'MyApp', '[]', 0, '2020-01-15 12:06:39', '2020-01-15 12:06:39', '2021-01-15 14:06:39'),
('865f1fae4e0591bde0474ca4af9beb90b6ffa63f4453560e593a464ca3da420459a0832569fc87d2', 51, 1, 'MyApp', '[]', 0, '2019-12-25 08:49:28', '2019-12-25 08:49:28', '2020-12-25 10:49:28'),
('86cc54904ffa53cd00a511967e300600b38e741ca44900f31c5fb73146152da0f1d1e08fc47722bf', 20, 1, 'MyApp', '[]', 1, '2020-01-13 12:38:00', '2020-01-13 12:38:00', '2021-01-13 14:38:00'),
('87386ec1af11c4692b381c75b6308e0cc2c5f75c820dd5272431f909f440b106ed17a48f5c08fd7c', 70, 1, 'MyApp', '[]', 1, '2020-01-11 15:39:36', '2020-01-11 15:39:36', '2021-01-11 17:39:36'),
('878ba70cd29d7526fbdc1860f08c33898c7217e0833561280a8640e425ecbb0963ba25745a07ba64', 87, 1, 'MyApp', '[]', 0, '2020-01-18 12:10:33', '2020-01-18 12:10:33', '2021-01-18 14:10:33'),
('87930e1c93ce850023e76dc74c90332f76f4301f6903e43470f87d48264281f95ba510b756402b4e', 70, 1, 'MyApp', '[]', 1, '2020-01-11 15:56:13', '2020-01-11 15:56:13', '2021-01-11 17:56:13'),
('88bed3473c219b6bef2af253bc6264148062700c63e822d3e1619324fc864db3434cb9265c0b3595', 105, 1, 'MyApp', '[]', 1, '2021-01-20 11:12:14', '2021-01-20 11:12:14', '2022-01-20 13:12:14'),
('89bc083cdec6e61e17dda972838eb92019250cf4cf95c3947214354589ed77b10861da86d86f6335', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:12:32', '2019-12-29 15:12:32', '2020-12-29 17:12:32'),
('8a13dcd27342f10d1a02ffdf305da609312fe13a01e246a0bb96b13b49ec74d77ad01cf5aa19e8ac', 20, 1, 'MyApp', '[]', 1, '2019-12-17 09:46:11', '2019-12-17 09:46:11', '2020-12-17 11:46:11'),
('8aac4db999eb610e1c04bb278abda4da78080a901a4a39b47b935b311165f10bf044bac997d29911', 20, 1, 'MyApp', '[]', 1, '2020-01-20 09:44:56', '2020-01-20 09:44:56', '2021-01-20 11:44:56'),
('8afc9860e104709ffa99077fe245649edb311e71874b6d8d50b103dbbc30dc170ea06f6253087150', 105, 1, 'MyApp', '[]', 1, '2021-01-21 11:38:55', '2021-01-21 11:38:55', '2022-01-21 13:38:55'),
('8bb5879c27bc8a6ef2cdbc90ed8cf47b7684edf58f80a7ebffed489b450b3d1a0db1edc786122533', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:11:56', '2020-01-14 14:11:56', '2021-01-14 16:11:56'),
('8bd7172d0a372003cafa8c337f0b994a26fa7e1104df693d5af94d5a88a4b0c9235c85558dccd2b0', 20, 1, 'MyApp', '[]', 1, '2019-12-31 14:03:03', '2019-12-31 14:03:03', '2020-12-31 16:03:03'),
('8c1c9f1f01872994c68604163d26cea5eda1d7507921956fb80661092873169c6a20eed9c09c04d6', 98, 1, 'MyApp', '[]', 1, '2021-02-18 10:42:42', '2021-02-18 10:42:42', '2022-02-18 12:42:42'),
('8c3241219bfd1e1c8c4d4a0e1771e494d8452302b3f9e794d1288b334020265fce20d170fc0929a1', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:14:26', '2019-12-23 12:14:26', '2020-12-23 14:14:26'),
('8cd0463143fc2198cf35cc28ebae5fe8a52a5e299728948ffc9ba6b65bb5ac7f6825141c28ecad15', 72, 1, 'MyApp', '[]', 1, '2020-01-06 14:28:48', '2020-01-06 14:28:48', '2021-01-06 16:28:48'),
('8cfb8187f6ea7fdbefcd138a2078c73e0cae9efd875745a12151cf20aee56c534a5b844f08fd170d', 20, 1, 'MyApp', '[]', 1, '2019-12-28 16:53:38', '2019-12-28 16:53:38', '2020-12-28 18:53:38'),
('8d7b558a58f8c4df7eba98f95354dc6d4a33e72d0849e7155929f8a40ce3996f5b1ac84b65d46fad', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:41:07', '2019-12-29 15:41:07', '2020-12-29 17:41:07'),
('8df908a86e063109d4559d756f6c9645295ad98a1737286d2ce96a99e5296c0fa89c6fa4a0261375', 105, 1, 'MyApp', '[]', 0, '2021-02-24 13:36:05', '2021-02-24 13:36:05', '2022-02-24 15:36:05'),
('8e58ae94fbef3fc8b85515a7b46e2c667793888348cc813ec600b94be99cd5db979c4e52ef983731', 20, 1, 'MyApp', '[]', 1, '2020-01-20 11:34:21', '2020-01-20 11:34:21', '2021-01-20 13:34:21'),
('8e8ed12dba13315430a8335a8f7f1fcc376d8870e5ee60ec7858ce3bb99ebae48479fd922bb5ff4c', 20, 1, 'MyApp', '[]', 1, '2019-12-15 15:04:47', '2019-12-15 15:04:47', '2020-12-15 17:04:47'),
('8f4ecc6b88589b59fd2a0e5622a3a898f4ac27fda06606cfc7677f2c86e53d4b673efb1f283d42a7', 74, 1, 'MyApp', '[]', 0, '2020-01-05 11:13:52', '2020-01-05 11:13:52', '2021-01-05 13:13:52'),
('908525fe051cfc4f199f535d51fbc7f8f68a9a3813952b2ae1bcca332a9286321f2fe3652c78a635', 20, 1, 'MyApp', '[]', 1, '2020-01-05 08:51:41', '2020-01-05 08:51:41', '2021-01-05 10:51:41'),
('909033a1a0796ecd70bf84bd8d5349c0ca2ddf7fb0cd2ee6c3456030294de2cac9588cefcad4fd71', 26, 1, 'MyApp', '[]', 1, '2019-12-07 15:06:22', '2019-12-07 15:06:22', '2020-12-07 17:06:22'),
('93ae9b4a622e1bcd46b734380e4c695f2cad347b5efdbb9cc8cf7c2b9a4c1646c96bb8fe72f5748b', 20, 1, 'MyApp', '[]', 1, '2019-12-15 10:32:14', '2019-12-15 10:32:14', '2020-12-15 12:32:14'),
('93b8512fabfb60b27a338fb3451c14440cf6d920ef491c651486d76fc8cd15a70c686e634fa5abdb', 64, 1, 'MyApp', '[]', 0, '2019-12-23 15:03:21', '2019-12-23 15:03:21', '2020-12-23 17:03:21'),
('957655ae4cc76ca65927faa8a41db67acaea7df8117328c5ccfee1fd8613d180b2e2b350d2aec0a0', 20, 1, 'MyApp', '[]', 1, '2019-12-08 11:39:34', '2019-12-08 11:39:34', '2020-12-08 13:39:34'),
('95dab4d1610af906b280aceef32a4a04547ea981d85cdd7f6de65fd9c794380ae7eaf8f1036122a5', 80, 1, 'MyApp', '[]', 0, '2020-01-12 12:33:49', '2020-01-12 12:33:49', '2021-01-12 14:33:49'),
('968b3f53674de9b1633911fcf8079944c620f6a121a05f791f35de5c106bbec0b2f858dc02b0394d', 31, 1, 'MyApp', '[]', 0, '2020-01-13 13:21:23', '2020-01-13 13:21:23', '2021-01-13 15:21:23'),
('9992c23b70bacc4bd5c81aad6a87626c9c1c956904486b3d3c7e09206a07ba67a6ec1423e092452e', 20, 1, 'MyApp', '[]', 1, '2019-12-24 10:15:48', '2019-12-24 10:15:48', '2020-12-24 12:15:48'),
('99ad4fec61ce52835e6b883ee76fcd7c95419ccc27910a4bfca0d0e329d24418654b6e60251e8ea9', 20, 1, 'MyApp', '[]', 1, '2019-12-07 14:35:46', '2019-12-07 14:35:46', '2020-12-07 16:35:46'),
('99b172223ac6712dec5a5349964dc828c71692c29029c7bd08c905af214d5740de6cf00145e366a0', 31, 1, 'MyApp', '[]', 0, '2019-12-30 08:28:20', '2019-12-30 08:28:20', '2020-12-30 10:28:20'),
('99cf9dea0f07123053bf2aa76fa643b2635510aa8e9e128dee264b633fc47ae6925161b4c60b6263', 20, 1, 'MyApp', '[]', 1, '2019-12-22 07:56:20', '2019-12-22 07:56:20', '2020-12-22 09:56:20');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('9a8c55b5c17af5faf5e4d39a53ac33328476b0873d957f38764dd48807a8e381d5d8cc0b132f7173', 20, 1, 'MyApp', '[]', 1, '2019-12-22 08:53:37', '2019-12-22 08:53:37', '2020-12-22 10:53:37'),
('9aa325bd0c127495fd4d2c8529161aa44c4ecba6474b8da49ecb121e77928ab2e25a0785772cc81a', 105, 1, 'MyApp', '[]', 1, '2021-01-20 07:15:52', '2021-01-20 07:15:52', '2022-01-20 09:15:52'),
('9b488dbdf10e8f60dde2219397ad342fda720d5ce6940a9ffea45c89c6b30b34c362dcb77dd1161d', 98, 1, 'MyApp', '[]', 1, '2021-02-25 10:38:56', '2021-02-25 10:38:56', '2022-02-25 12:38:56'),
('9b62ec4e6be84a028154a60f7afd84deafd3559447a21b37ad4b1e97a24664bf368600170781a216', 56, 1, 'MyApp', '[]', 0, '2019-12-23 10:09:30', '2019-12-23 10:09:30', '2020-12-23 12:09:30'),
('9b9f1b00235557675625dc598800252564ff69cb23f66959af832cd470e61290883cbc24814a553d', 20, 1, 'MyApp', '[]', 1, '2019-12-28 17:02:17', '2019-12-28 17:02:17', '2020-12-28 19:02:17'),
('9becf0f1d59920dd3785afce619cf8c1582223142c80c70f000068345d65b7dbe9e1fa9bc3312724', 20, 1, 'MyApp', '[]', 1, '2019-12-30 15:02:26', '2019-12-30 15:02:26', '2020-12-30 17:02:26'),
('9c387c254c0f913695bc7b7afecf113daf0bd419f7cad3e88210e6c1c79ccb0e0f11bdab062d6574', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:44:59', '2019-12-29 10:44:59', '2020-12-29 12:44:59'),
('9ce1ce9fdcbfa4cf8a0223d1005e1bc187db46131321d8747161e895cb2e3dd1b2eb1987a33efdb1', 82, 1, 'MyApp', '[]', 1, '2020-01-14 14:33:21', '2020-01-14 14:33:21', '2021-01-14 16:33:21'),
('9d5b51478833d15bd821f430a6888a664273079d0b9fc5c1b1fc01d69b6114005907df4b76f094a9', 35, 1, 'MyApp', '[]', 0, '2019-12-17 11:28:41', '2019-12-17 11:28:41', '2020-12-17 13:28:41'),
('9e64ea75707cb7c901be5cbe3e73442286b6111fe2d056be35a04634d5f140b898ee49cf271c63ac', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:04:44', '2019-12-23 12:04:44', '2020-12-23 14:04:44'),
('9f2a3a36d8a0c09d17837a691b91487d30dbd471890e469bb5f013ba9710dd5dc68e57da4bb0bbae', 31, 1, 'MyApp', '[]', 0, '2019-12-24 15:22:46', '2019-12-24 15:22:46', '2020-12-24 17:22:46'),
('a09deb36ef9f2d75def03f5cdc21bb9a17fd46a76a9f4812a1c6ac5d536b8d6940b09a31e3e24720', 20, 1, 'MyApp', '[]', 1, '2019-12-24 09:30:44', '2019-12-24 09:30:44', '2020-12-24 11:30:44'),
('a0cdf90befe9eaba4dc94dfb35e06ad3f15492529718e9e59e7f86aff3337acaa9f032c57ab7b790', 105, 1, 'MyApp', '[]', 1, '2021-02-14 11:38:25', '2021-02-14 11:38:25', '2022-02-14 13:38:25'),
('a177f9b0538b380946e93699e0bab879733b08f9848e5cd363f29d5b67afd3be474426d76ccb5e4a', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:18:32', '2021-01-18 11:18:32', '2022-01-18 13:18:32'),
('a18d3662ed81c6d15bc1f07feff1de36bef5b20233b5747f46e68284dea42234b7817b8883681d34', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:28:24', '2019-12-08 08:28:24', '2020-12-08 10:28:24'),
('a1c4814e18265c88e853187f15daa7567044d62016dc407b7f91431fcc182c275ccca6d50079d71b', 20, 1, 'MyApp', '[]', 1, '2019-12-28 16:58:49', '2019-12-28 16:58:49', '2020-12-28 18:58:49'),
('a1d4ca61b49bcc880d88f82d72b1497de28ae3cc6f01e10d64b28b070df9f5acfcf8e01ae44bb397', 70, 1, 'MyApp', '[]', 1, '2020-01-05 10:57:56', '2020-01-05 10:57:56', '2021-01-05 12:57:56'),
('a228db39fc628f960bfbffbb80be55e9a2969159fba65ea6b4a02ae48cad85133226591e82c64fc5', 105, 1, 'MyApp', '[]', 1, '2021-02-14 11:53:18', '2021-02-14 11:53:18', '2022-02-14 13:53:18'),
('a29d2a38804e32b19ba61e2a10b883a2eb75d23193bee13938b4681c187b3430dba7f776cb1bc298', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:16:40', '2019-12-23 11:16:40', '2020-12-23 13:16:40'),
('a33d7b26064e66f3f9af7b4028f041d68dbfdbad466567a858bab59485107022015c303762d935ef', 60, 1, 'MyApp', '[]', 0, '2020-01-13 10:56:46', '2020-01-13 10:56:46', '2021-01-13 12:56:46'),
('a343b9342d0827de9f4c6f87da38a89ed51accea3b8b4eaad5cdf2ea90117766aa9f25830bb31733', 55, 1, 'MyApp', '[]', 0, '2020-01-11 14:28:59', '2020-01-11 14:28:59', '2021-01-11 16:28:59'),
('a3bc55c6bcd340999d76b64d97892826c8af948b6ed8689d7d999ea506668b057f12f4031f378f47', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:23:10', '2019-12-30 09:23:10', '2020-12-30 11:23:10'),
('a41c42c4d27054df91610a31820f6e8eff23dcaf3a46f9702cc67ec64651d2a092c75a07908ba9e7', 72, 1, 'MyApp', '[]', 1, '2020-01-12 10:42:52', '2020-01-12 10:42:52', '2021-01-12 12:42:52'),
('a444236794db93d74724effa073268bc7b5944a648178e0f038f9d747cddc63cba013cb6590e0432', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:01:43', '2019-12-23 12:01:43', '2020-12-23 14:01:43'),
('a48ee437450a4e59cc7dfece5abce8c3ed1486e991eccd3a1d4dcd799cc317d23532ddd84065aa87', 70, 1, 'MyApp', '[]', 1, '2020-01-13 13:00:39', '2020-01-13 13:00:39', '2021-01-13 15:00:39'),
('a50b200f932c395fb27c3e7def6ba69a8a5b9afbf74a1edb18cc8c3cfd3013dead943180ebaf41a2', 105, 1, 'MyApp', '[]', 1, '2021-01-20 11:55:49', '2021-01-20 11:55:49', '2022-01-20 13:55:49'),
('a5d879de22062a154b1b6d45d422e520a6838130edd11e1c73209c19bc884066aae4b364e7e30945', 20, 1, 'MyApp', '[]', 1, '2019-12-23 12:09:25', '2019-12-23 12:09:25', '2020-12-23 14:09:25'),
('a60f5cae639135c9debe74cd29c31403f389a721d40efc65d021c60709667c9d4c5a4edd996b55fb', 84, 1, 'MyApp', '[]', 0, '2020-01-13 10:41:06', '2020-01-13 10:41:06', '2021-01-13 12:41:06'),
('a67f5f5b7fd19db0bc1ac0a326387d28172c07be30815249d72decb40d6828f7c7a8212c1b40b3a4', 65, 1, 'MyApp', '[]', 0, '2019-12-23 15:13:28', '2019-12-23 15:13:28', '2020-12-23 17:13:28'),
('a6894c8ed0af22199155d66c327055994755313ce3341c142f2cb454516078557a3f7dc78df7418e', 20, 1, 'MyApp', '[]', 1, '2019-12-30 09:10:35', '2019-12-30 09:10:35', '2020-12-30 11:10:35'),
('a7c65697cac65d2c57f31d5236da2b16eba61b149909a346059ecdb5b1123176fdfc2340e6bf8dfc', 31, 1, 'MyApp', '[]', 0, '2020-01-14 12:19:21', '2020-01-14 12:19:21', '2021-01-14 14:19:21'),
('a8ea5eb823f803ed910a54a5805f2d76930ab44a7d91a44032b776d262fdd169702c0d738a4c094c', 87, 1, 'MyApp', '[]', 0, '2020-01-18 12:10:35', '2020-01-18 12:10:35', '2021-01-18 14:10:35'),
('a9eec90a21e95234628543b8ddd2fe72c1b4a539187cd495cb4e72db70d795674a5900ffef0a94bd', 105, 1, 'MyApp', '[]', 1, '2021-02-18 10:01:50', '2021-02-18 10:01:50', '2022-02-18 12:01:50'),
('aa4451eedae686bec24bb1261dd7f03d8dd54c3d5da543d2c7cbaa220e6989ca958138923611fd4e', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:31:35', '2019-12-29 15:31:35', '2020-12-29 17:31:35'),
('aac3ba3a0fc380c7ab8c3fddd89e2fc43966d1d9eb9fb2b5e73ba8d3bf7e44051f8d300943a25eed', 20, 1, 'MyApp', '[]', 1, '2019-12-21 15:40:23', '2019-12-21 15:40:23', '2020-12-21 17:40:23'),
('ab8c5c2eb789d21b7575e4dff357fec92dd9ce271821bc4d6ab4bb8d1a4c49dd644d039f9efe19dd', 87, 1, 'MyApp', '[]', 0, '2020-01-14 15:27:36', '2020-01-14 15:27:36', '2021-01-14 17:27:36'),
('abd61821b07eabaeac4100b5a31ed53a19b99ea8d31d6528bdae50440496c25097c5aa81356863e8', 20, 1, 'MyApp', '[]', 1, '2019-12-29 16:27:46', '2019-12-29 16:27:46', '2020-12-29 18:27:46'),
('acdf7eacbae1d0883f176dd3e8dedc4cb856a848474fb835ef8de3830dbbab29829e24916aef3ac4', 20, 1, 'MyApp', '[]', 1, '2019-12-24 10:15:59', '2019-12-24 10:15:59', '2020-12-24 12:15:59'),
('acf23ef6a9a76af99f40594e521327ee871a52cd857755666dd7426240d1b25748d7fc8f45447b28', 20, 1, 'MyApp', '[]', 1, '2019-12-30 15:04:37', '2019-12-30 15:04:37', '2020-12-30 17:04:37'),
('ae929d4a1e3e907a21d9ffa9936477987ec9e883f1c35582c95f33bb2b5b3dccb798fdbbcd78345d', 70, 1, 'MyApp', '[]', 1, '2020-01-11 16:02:31', '2020-01-11 16:02:31', '2021-01-11 18:02:31'),
('aedb444129d3f7ca16d763bbfa381ef7a6e703b4db5898129dcf2689513afa4fd4d695777b5612d4', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:24:04', '2019-12-23 11:24:04', '2020-12-23 13:24:04'),
('af1ec1a2336c2ba4bc1310da1a386048bd07ac7a00eecc68c1e806902a5574fc8af1c4077cd2289f', 105, 1, 'MyApp', '[]', 1, '2021-01-19 06:58:34', '2021-01-19 06:58:34', '2022-01-19 08:58:34'),
('b172cce202f9905ccf2646947e1a9442426ad86d91f385312f6c41539b1a6335b945cff53bd6fd59', 31, 1, 'MyApp', '[]', 0, '2019-12-18 08:29:56', '2019-12-18 08:29:56', '2020-12-18 10:29:56'),
('b213dd4ec8ab15d29098523c81212d5570a0a0bcf3bf0c97f60a1635824e5dc73c76968bc611b780', 86, 1, 'MyApp', '[]', 0, '2020-01-14 12:32:48', '2020-01-14 12:32:48', '2021-01-14 14:32:48'),
('b23a661733063d3874cd6dcb6cd483df68fed6435f03e330fc05e1127d7f7aaee7fccb450728b0d8', 55, 1, 'MyApp', '[]', 0, '2020-01-06 11:08:02', '2020-01-06 11:08:02', '2021-01-06 13:08:02'),
('b24e8d11a91dc3aade23102234fda771d2c86fe2390cf5129c1d98098cc3cac1f5c263e40ebb8a52', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:14:10', '2019-12-30 09:14:10', '2020-12-30 11:14:10'),
('b26f4db68d06b6f8d02dba5c14192b4242e86a9838acc3af4949c0898ea7939f56ce6e07fe68a982', 32, 1, 'MyApp', '[]', 0, '2019-12-09 13:50:39', '2019-12-09 13:50:39', '2020-12-09 15:50:39'),
('b2b29b501ab4c186741164b96f2d12e9a0b07bfc59441de95f8f9dd933d5bcb33c70316c4b773447', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:15:09', '2019-12-30 09:15:09', '2020-12-30 11:15:09'),
('b2c373c1d334c3bbfb097bd2f3dafda2d0786d44961d3249df62b24a5f81e5786fb6149f393ee43b', 20, 1, 'MyApp', '[]', 1, '2019-12-18 08:44:40', '2019-12-18 08:44:40', '2020-12-18 10:44:40'),
('b3804d6e157d8fc710212408a77e34bb9c8fbfb9f97e8f27f4c6b2884ea5e81618cac0dc970a863c', 56, 1, 'MyApp', '[]', 0, '2019-12-23 09:22:52', '2019-12-23 09:22:52', '2020-12-23 11:22:52'),
('b54beabd3b7bc0eedd6a3218f271adcecac906ac66ecf885b9a98344f5649e31e9d669636fa726f5', 20, 1, 'MyApp', '[]', 1, '2019-12-18 10:07:25', '2019-12-18 10:07:25', '2020-12-18 12:07:25'),
('b59cd4b84c0359da3492fa56e34ed00e8d7ad7308b105b532935cc177f1226387d6af2ebb5935130', 31, 1, 'MyApp', '[]', 0, '2019-12-23 12:09:43', '2019-12-23 12:09:43', '2020-12-23 14:09:43'),
('b705c0a5490b6bb0d1032b332ba8e977e5f6f1708a7f8335f1bf11ef1f2a5262e6ca07335d0d11a8', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:13:35', '2019-12-08 08:13:35', '2020-12-08 10:13:35'),
('b8fd9d0eaee20db7305206fd09644d4b53f5ab6e68bc53f6e0209ca790294d79b16a474ed1f97d65', 20, 1, 'MyApp', '[]', 1, '2019-12-29 10:48:02', '2019-12-29 10:48:02', '2020-12-29 12:48:02'),
('b93dce13b687802a91e9d1d39ee26532aa4472395ab2d274bae8e428a66dceef9d818c0f4f78d792', 70, 1, 'MyApp', '[]', 1, '2020-01-11 16:08:58', '2020-01-11 16:08:58', '2021-01-11 18:08:58'),
('ba8f48c9002a6e8d2883c0a3b8c7e168f34764c830e4616544521aa7b5cedad9df201c282b203aae', 47, 1, 'MyApp', '[]', 0, '2019-12-22 10:33:01', '2019-12-22 10:33:01', '2020-12-22 12:33:01'),
('bb47048d36e635b8725d9da9c6a50fb46c2332e51ab8c96aeb538085f62d3888bdc586529a310438', 105, 1, 'MyApp', '[]', 1, '2021-01-20 07:17:33', '2021-01-20 07:17:33', '2022-01-20 09:17:33'),
('bc9b2c1f7ff449fe2f76c20ba8f0207f49180959f0da08eb2cef04f9c5e6c3134bee9941aa329e4b', 87, 1, 'MyApp', '[]', 0, '2020-01-14 14:12:32', '2020-01-14 14:12:32', '2021-01-14 16:12:32'),
('bca17c28045d1e4c10ff48941c56dd2318c1fb5b8ecdab1f482acc321a66638161d1ac240c1dd7b6', 26, 1, 'MyApp', '[]', 1, '2019-12-08 08:09:32', '2019-12-08 08:09:32', '2020-12-08 10:09:32'),
('bd266af835f0a79870a8df74f04f343e9e7c032701ceae5c323aa3717c437a2736a02d2af968c27f', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:16:24', '2019-12-30 09:16:24', '2020-12-30 11:16:24'),
('bd8f8946d1fd8a855489cd0c10de8e3a018b6dc29a48849a11e06a366242f4f4aa3c410ebf61b824', 20, 1, 'MyApp', '[]', 1, '2019-12-17 11:26:17', '2019-12-17 11:26:17', '2020-12-17 13:26:17'),
('be0c1019a0719521dce22c9ac0bfc0640afaa3cb7aefa5962a81d322756a1f14df1eee748cda6cb2', 91, 1, 'MyApp', '[]', 0, '2020-01-18 10:01:36', '2020-01-18 10:01:36', '2021-01-18 12:01:36'),
('beb184a267e798abc0f4e0a0a54413ec1208552b9e7eb25ef72c524a245b6948a13239b5d1fe0f9b', 56, 1, 'MyApp', '[]', 0, '2019-12-23 09:37:50', '2019-12-23 09:37:50', '2020-12-23 11:37:50'),
('bed9688fc6e8bf6367441d430939c3b15d9ce670f4d3f66c634c9833f364539247a68baa56a31de6', 105, 1, 'MyApp', '[]', 1, '2021-02-14 13:47:11', '2021-02-14 13:47:11', '2022-02-14 15:47:11'),
('bfaf71880542c85a31103494828b5a0273dec7884e202486299e2c1cb3db29729a6bb5a93f296f04', 90, 1, 'MyApp', '[]', 0, '2020-01-15 12:06:20', '2020-01-15 12:06:20', '2021-01-15 14:06:20'),
('bfb57d60a729e30873c72c77c4811ce76eea1c72d10be4863efcc08f341a0acb704ced704eed2cb0', 98, 1, 'MyApp', '[]', 1, '2021-02-14 11:35:49', '2021-02-14 11:35:49', '2022-02-14 13:35:49'),
('c04a4827600c13b2f1275ed68a29b18e41d3257472ce3fbb81fdc64c9fcca148e20731d0fcb0ec6a', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:37:10', '2020-01-12 08:37:10', '2021-01-12 10:37:10'),
('c0c749721f0ffff2e1d0bfde9ef0dabb9417ac5db482fe28d86afe5003fe38899318c24c2eda7e6e', 20, 1, 'MyApp', '[]', 1, '2019-12-30 08:28:42', '2019-12-30 08:28:42', '2020-12-30 10:28:42'),
('c0fce662c6bb9018d42689180eed0f7bf231cbc3aa73afefb31031e2da9589f8e3db21fb29a7a68f', 79, 1, 'MyApp', '[]', 0, '2020-01-12 10:41:12', '2020-01-12 10:41:12', '2021-01-12 12:41:12'),
('c120ea2592d38c6c419695f853e7a6b98340d376529fd86398ae2c5d23b5441ee0b18c3bdde734cb', 20, 1, 'MyApp', '[]', 1, '2019-12-31 13:25:47', '2019-12-31 13:25:47', '2020-12-31 15:25:47'),
('c13e1cc3c44efd4c475414af5dc98b22e287cb07e83c38767780f20ee2ffcccd06a2031334ff4e65', 98, 1, 'MyApp', '[]', 1, '2021-02-14 12:34:41', '2021-02-14 12:34:41', '2022-02-14 14:34:41'),
('c1538743d35088ad30955de4b7e301476b3ba6ec25f3d958cf8f462690c150483b45d11231f34b31', 60, 1, 'MyApp', '[]', 1, '2019-12-28 15:44:17', '2019-12-28 15:44:17', '2020-12-28 17:44:17'),
('c2300eb03c9dd33ef157f7a2ed88deffed2cb8f1a0b49500151df3870ce21a753509f6cee25db80f', 98, 1, 'MyApp', '[]', 1, '2021-02-25 10:40:31', '2021-02-25 10:40:31', '2022-02-25 12:40:31'),
('c2b5f412e10d1f1aceacdcceebc2e823c7ea5172d3dc9271ce19832d2b4acf0998352470e80a2589', 20, 1, 'MyApp', '[]', 1, '2020-01-04 12:05:53', '2020-01-04 12:05:53', '2021-01-04 14:05:53'),
('c2d4fc019febecc2924a0222b8a50ac64cdad592539d273a812b71cfcad564118e916952a3eb8a84', 98, 1, 'MyApp', '[]', 1, '2021-02-16 13:33:25', '2021-02-16 13:33:25', '2022-02-16 15:33:25'),
('c3fbd9effc3c2548ef4ad5a4cf962de88e9cdc2089cd2a94af529da7a6b46076487ac81318903382', 98, 1, 'MyApp', '[]', 1, '2021-02-14 13:57:49', '2021-02-14 13:57:49', '2022-02-14 15:57:49'),
('c609e58ed06d6e14430e2da1c90ad0d9f7941b6f6653f6d6e47c10e745b70cd49ab34bfe8e578822', 31, 1, 'MyApp', '[]', 0, '2019-12-18 08:44:34', '2019-12-18 08:44:34', '2020-12-18 10:44:34'),
('c66c32753fa03904f83f7b6f08fca2cf893526b39d8a5a3ad4e1fa78d766401f87cdc2a5629945f0', 20, 1, 'MyApp', '[]', 1, '2020-01-12 12:22:26', '2020-01-12 12:22:26', '2021-01-12 14:22:26'),
('c714418a9a464fc9a477b0e6592ab9515c293ed39c80f1550e60e6bfc0b9be7da1c8fe3e6fd5e755', 20, 1, 'MyApp', '[]', 1, '2019-12-29 11:00:24', '2019-12-29 11:00:24', '2020-12-29 13:00:24'),
('c717f6f6f730f769ddeee45cf5e6ba97b4df93216da917fc93b4bfb1799b7924004dfab69873558b', 26, 1, 'MyApp', '[]', 1, '2019-12-07 14:54:34', '2019-12-07 14:54:34', '2020-12-07 16:54:34'),
('c7afb20830a54e4e3bbd1e8665697a321d60ee67c068540d1b55b7387ccba8528b2abbee2447c5c7', 20, 1, 'MyApp', '[]', 1, '2019-12-28 15:31:21', '2019-12-28 15:31:21', '2020-12-28 17:31:21'),
('c7f3ae2c3be4c08613af0534dcba268d19b2b201900f5815d58ea06aab85c5eb838a3c0270fdbcc2', 31, 1, 'MyApp', '[]', 0, '2019-12-23 15:10:34', '2019-12-23 15:10:34', '2020-12-23 17:10:34'),
('c83744ef81592fa851b28a8231eaef7afdb211133b9ff50d400e7f345d2968a359a383f65a406e2e', 105, 1, 'MyApp', '[]', 1, '2021-02-16 13:27:31', '2021-02-16 13:27:31', '2022-02-16 15:27:31'),
('c9c03cf7bce8a1558cbc0b2beb05d020ac36586211f1269b117de83ca0cba8cf5f79ba7265c9166b', 60, 1, 'MyApp', '[]', 1, '2019-12-23 11:20:32', '2019-12-23 11:20:32', '2020-12-23 13:20:32'),
('ca5564d830fb4d87d5c38cbc34b5c69fe22b9c6f4f9c088aa48924b2bd50070caf38a568564c6add', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:37:14', '2019-12-23 11:37:14', '2020-12-23 13:37:14'),
('cbb2536490b0de86506316fb236e70eb8ab6b9fa250c0b46faf0d3629b1c1d4caf92542036609e78', 66, 1, 'MyApp', '[]', 0, '2019-12-23 16:12:56', '2019-12-23 16:12:56', '2020-12-23 18:12:56'),
('cc42df78dc9bc7aecfd11cf637a1b2cc996e9ca1416759f3b68ca9be690b953ed08835c9463c7cbc', 20, 1, 'MyApp', '[]', 1, '2019-12-24 15:25:34', '2019-12-24 15:25:34', '2020-12-24 17:25:34'),
('cd656f41e86858025e14c6e1b24e61456b5e3d86925a46d315df80811ea974ae337afb7a6b6b87fc', 82, 1, 'MyApp', '[]', 1, '2020-01-13 10:23:59', '2020-01-13 10:23:59', '2021-01-13 12:23:59'),
('cec0250f6f1913614465e34764bea06bbb1691ac4dcd28084ce5b1f7d7e038867c3c3696daa77222', 20, 1, 'MyApp', '[]', 1, '2019-12-30 10:47:24', '2019-12-30 10:47:24', '2020-12-30 12:47:24'),
('cf1ac99e6361698821f0fdf9dc2d20abb9aa7392f1a5dca97c03f99f2ce643c4e712218df50eb114', 98, 1, 'MyApp', '[]', 0, '2021-02-25 10:45:39', '2021-02-25 10:45:39', '2022-02-25 12:45:39'),
('cf2344f0bd686dc289987a811ec38cf4a79b60736a16a673f915199b2e750679f1709e5b468f3cc9', 20, 1, 'MyApp', '[]', 1, '2019-12-22 07:55:43', '2019-12-22 07:55:43', '2020-12-22 09:55:43'),
('d0248a6216d10d9a1bb7e303ebb1c3f937a66043f32d1b7594e0e0c6d5e9786640815cdbf3288ef7', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:24:21', '2019-12-23 11:24:21', '2020-12-23 13:24:21'),
('d07ccc928be3977a72c27357849aba8df06e843d35d08ff078d3e54e680faaef765883617cb9daf5', 20, 1, 'MyApp', '[]', 1, '2019-12-24 10:28:02', '2019-12-24 10:28:02', '2020-12-24 12:28:02'),
('d0ad83cfd98093eda5cbf81aea06e60fca123537e2fbba125a10e5442a1bbdb11a66238dd7ee9012', 20, 1, 'MyApp', '[]', 1, '2020-01-18 10:40:05', '2020-01-18 10:40:05', '2021-01-18 12:40:05'),
('d164b936f62eff3175b9d77c9e5a4b17af5d8f0ca5f03c0915412aeebed373ca4e02d5357889f3e0', 73, 1, 'MyApp', '[]', 0, '2020-01-05 11:47:54', '2020-01-05 11:47:54', '2021-01-05 13:47:54'),
('d1e936d27f3c333fc335271eeae80299c99efb009683f0f7d5c2546961112cb949ef8f4a3746de93', 20, 1, 'MyApp', '[]', 1, '2019-12-21 12:18:18', '2019-12-21 12:18:18', '2020-12-21 14:18:18'),
('d2de5c4d0c9ba68452f1beccee2e17444bf519d28dd8cf95e5bbf4b43ba526539c39bd19f77593ff', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:32:05', '2019-12-23 11:32:05', '2020-12-23 13:32:05'),
('d3bf2ac9ecd9ad99f35ba35231d27f0190f6fdafec1f7988f8cee3c5a81e9e255b9c476163bef540', 98, 1, 'MyApp', '[]', 1, '2021-02-14 11:42:22', '2021-02-14 11:42:22', '2022-02-14 13:42:22'),
('d4f367deccbdfdf24dd05543911072e7390a42fdb0a185e396cd79a26963f9394c12bd4a323394fe', 20, 1, 'MyApp', '[]', 1, '2019-12-29 15:18:56', '2019-12-29 15:18:56', '2020-12-29 17:18:56'),
('d553e6996af43e1fef2d8f3b45224d8fef3b6492e9ba79b2df4342947dbb4091b58c6f0220468dbf', 72, 1, 'MyApp', '[]', 1, '2020-01-11 15:31:35', '2020-01-11 15:31:35', '2021-01-11 17:31:35'),
('d5ba333ce8ff6037e01ffc6cc1ad72b760b9a57d87b8940a882592d2fc8a6098b05a9dc268b3180d', 20, 1, 'MyApp', '[]', 1, '2019-12-29 11:53:20', '2019-12-29 11:53:20', '2020-12-29 13:53:20'),
('d6528f13bd7398ce2ed850bad325ffe258bfbcd4b7d6aba7db26acf547b15afdb34566b976770b7a', 31, 1, 'MyApp', '[]', 0, '2019-12-09 13:50:31', '2019-12-09 13:50:31', '2020-12-09 15:50:31'),
('d6615d8d48611d613e9d170f6d496f84a82d31462d872cd9b10afa0b8a790b9cc93485769976087f', 31, 1, 'MyApp', '[]', 0, '2019-12-23 12:01:15', '2019-12-23 12:01:15', '2020-12-23 14:01:15'),
('d7c3add5cd9a4274537f2e57216e2314ebcc7f60f1c93d4477b95288a13956ea592074cc379b4ed2', 66, 1, 'MyApp', '[]', 0, '2020-01-11 15:54:12', '2020-01-11 15:54:12', '2021-01-11 17:54:12'),
('d9c0ea07bbc9b27691fd2340b4409ff55fc4ed2676febc018be3d5e70b960b075cf38d5028ab7591', 20, 1, 'MyApp', '[]', 1, '2020-01-04 08:27:49', '2020-01-04 08:27:49', '2021-01-04 10:27:49'),
('da62fe689aa181ea04b9723e4ad93dfd7c99c421deecb7f62336445b220f7e74996c0aa69a30ef56', 20, 1, 'MyApp', '[]', 1, '2019-12-30 09:51:53', '2019-12-30 09:51:53', '2020-12-30 11:51:53'),
('dafb9fdc8bad1d621f78ff4306e61f69bf16fbce49440fcf1f7637ccba3062a6831a4fb4bdf817c1', 31, 1, 'MyApp', '[]', 0, '2019-12-29 09:17:49', '2019-12-29 09:17:49', '2020-12-29 11:17:49'),
('db105059687ad59acb882c37aacadafc15a095355f41f528022a9a1be2066a2428c895e048665591', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:40:26', '2021-01-18 11:40:26', '2022-01-18 13:40:26'),
('db3a8b061dbeb72e939e9a0f8887bf5e26197d6bed2a8762cd947b5c0f632f507be0082720c7bc0e', 20, 1, 'MyApp', '[]', 1, '2019-12-22 11:18:19', '2019-12-22 11:18:19', '2020-12-22 13:18:19'),
('dca4a5e93822b586e813e572c7d9d79df0ad3127842b3fa2ae2bedf313d7779e4015250579cb078e', 31, 1, 'MyApp', '[]', 0, '2020-01-05 08:46:05', '2020-01-05 08:46:05', '2021-01-05 10:46:05'),
('dca591c54dea91045d559d7a231f8efb71e061b62c2303879f8b436cee2c518f5ef07dbe5d8ee2a4', 98, 1, 'MyApp', '[]', 1, '2021-01-20 11:44:56', '2021-01-20 11:44:56', '2022-01-20 13:44:56'),
('dd946496739a1783fd13a90838cb5eeeb10c0e5d8174dce4571ee6418d6b49600c2b34b5728a1e00', 68, 1, 'MyApp', '[]', 0, '2019-12-25 12:06:33', '2019-12-25 12:06:33', '2020-12-25 14:06:33'),
('de588cac1d8a1cc18d9d13b726fe219e1ec795f6aab410f48522a85209f4101b6982aa685b678d25', 56, 1, 'MyApp', '[]', 0, '2019-12-23 09:50:05', '2019-12-23 09:50:05', '2020-12-23 11:50:05'),
('de742af0efa508897b20215d24df5c62a042986e38ca471ca6db67279243b12bbf703a55f6327041', 72, 1, 'MyApp', '[]', 1, '2020-01-06 11:44:30', '2020-01-06 11:44:30', '2021-01-06 13:44:30'),
('e0169b610e91b4398c4d10cfce844d1a41458f2bc997b2e370700e84085a8456fee22ae237ffcc7c', 98, 1, 'MyApp', '[]', 1, '2021-01-22 06:18:36', '2021-01-22 06:18:36', '2022-01-22 08:18:36'),
('e04218d65119c8485c1b2fcd12cea6426142b1e19c1b4b7ea9125e6489c55b847d009adb8daab9af', 20, 1, 'MyApp', '[]', 1, '2019-12-23 10:53:27', '2019-12-23 10:53:27', '2020-12-23 12:53:27'),
('e0907b2f4634f906fd05d1670c2c3b0fda4e18a5e4047e074d21c661df3c55a3f14f1e294b1ff468', 20, 1, 'MyApp', '[]', 1, '2019-12-23 15:10:57', '2019-12-23 15:10:57', '2020-12-23 17:10:57'),
('e0c50d8654c65be2baf0130e1f6a2c4023c6995ec445c88b4ca8d9c04da01861fb042d10479a252b', 55, 1, 'MyApp', '[]', 0, '2019-12-23 10:36:40', '2019-12-23 10:36:40', '2020-12-23 12:36:40'),
('e1a52ffb0e753ad0312a2a1de32332ef466792758e8f911ae1ced7753b3b372b109312dbc70f7d86', 105, 1, 'MyApp', '[]', 1, '2021-01-21 11:29:21', '2021-01-21 11:29:21', '2022-01-21 13:29:21'),
('e1bde140a30961aa81e205f951db45e63fc2db649bf5c33b0e20cafca557f08e5f16f3b67630d07a', 105, 1, 'MyApp', '[]', 1, '2021-02-14 10:21:35', '2021-02-14 10:21:35', '2022-02-14 12:21:35'),
('e1fd58a2043b6fe6c46ab0b6691cfe00ea5c9dfaa8ee26a3279199a8c1e263fb28b8af6014f3532c', 41, 1, 'MyApp', '[]', 0, '2019-12-22 09:14:55', '2019-12-22 09:14:55', '2020-12-22 11:14:55'),
('e2b099ef0b20859e84832e20227f9c3d137aa426d4d8994d9e4c95da139d628d9133e043b956aa9e', 31, 1, 'MyApp', '[]', 0, '2019-12-24 10:15:54', '2019-12-24 10:15:54', '2020-12-24 12:15:54'),
('e2f7acce8498b9abd884728eb4e7c10bfe532712ce7ef2e91d7f632e99a2eddab9978fe693b2e5e8', 98, 1, 'MyApp', '[]', 1, '2021-01-18 11:57:29', '2021-01-18 11:57:29', '2022-01-18 13:57:29'),
('e4d4a6331169f7f9e8cefc660ea10eff58d824ef96eb9d466a6073a2abc0cbca4e633127e6aee515', 70, 1, 'MyApp', '[]', 1, '2020-01-11 15:27:08', '2020-01-11 15:27:08', '2021-01-11 17:27:08'),
('e4ec06773d562ace8141f78d35d65e579280dc7dfb4d3804fc7e7b3661336861d9509e9174d26913', 114, 1, 'MyApp', '[]', 0, '2021-02-25 10:37:56', '2021-02-25 10:37:56', '2022-02-25 12:37:56'),
('e6233e56f3ddf8b667ef56d630f668627024cc615a2e6d9fd5e32ba52985a458ff809522bba9e4d8', 20, 1, 'MyApp', '[]', 1, '2020-01-19 09:16:48', '2020-01-19 09:16:48', '2021-01-19 11:16:48'),
('e6992b70f682cb0480c5e3184155a82cb857112d43fc1c5c917523945528ac9c7fd5c483d7be152f', 20, 1, 'MyApp', '[]', 1, '2019-12-21 15:36:12', '2019-12-21 15:36:12', '2020-12-21 17:36:12'),
('e6e8af484fa350fcd6140eb877488e852308a134666c44aeab9161604ea75835517316a7617e21fc', 55, 1, 'MyApp', '[]', 0, '2020-01-12 08:23:35', '2020-01-12 08:23:35', '2021-01-12 10:23:35'),
('e749d520434ebe5844e2ee0ac798ec0c80315654bda504cdc9b880c9376df30c43e898be368e8a85', 20, 1, 'MyApp', '[]', 1, '2019-12-21 12:37:28', '2019-12-21 12:37:28', '2020-12-21 14:37:28'),
('e88952fcf90bde6d7bb8ff469dcf971655ced5fe70412447b4c9f876d31b7719f2d7bda1f6824314', 20, 1, 'MyApp', '[]', 1, '2020-01-14 14:11:01', '2020-01-14 14:11:01', '2021-01-14 16:11:01'),
('e89bbc61923c7ac7fd269c2c1b0bbee66e0cb969cda7dddee044916cf53d6d9f479b95a1f2ebc81b', 20, 1, 'MyApp', '[]', 1, '2019-12-30 11:20:42', '2019-12-30 11:20:42', '2020-12-30 13:20:42'),
('e8c2db3a03c69c047c1bf9490fa0ddf5b1084d98b2f41559c3a4b18a034b02d7a8078dd0f032a59f', 105, 1, 'MyApp', '[]', 1, '2021-02-14 11:46:58', '2021-02-14 11:46:58', '2022-02-14 13:46:58'),
('e91722bd5f6150a8f743feaf6b0d41572f0bdeb5bd65709a05412d71a4021d91f9f45502e4424ec5', 31, 1, 'MyApp', '[]', 0, '2019-12-23 11:45:54', '2019-12-23 11:45:54', '2020-12-23 13:45:54'),
('eac93baa4de62c22cb0a5df5d615b55add43ab444a30a1e55e3d370da4ef194d4ed536dabb8c9b03', 20, 1, 'MyApp', '[]', 1, '2019-12-29 13:49:13', '2019-12-29 13:49:13', '2020-12-29 15:49:13'),
('eb39ee66a5b93b4100b316f07664131613337ba5a5c743637d6fecb34d9cc7327bfb4d5d04414518', 20, 1, 'MyApp', '[]', 1, '2020-01-04 12:20:57', '2020-01-04 12:20:57', '2021-01-04 14:20:57'),
('ec162c4ef21505f607ac5e5ef6e14406cd87eecf38caf956cd680d435e43697cbd432579b6aca114', 105, 1, 'MyApp', '[]', 1, '2021-01-20 11:35:39', '2021-01-20 11:35:39', '2022-01-20 13:35:39'),
('ec49851a244ed6c83bc89a0d58a4e74537ab7813a0a5af673d28578d8ff8f809fcd5d887a818007a', 105, 1, 'MyApp', '[]', 1, '2021-01-20 07:12:56', '2021-01-20 07:12:56', '2022-01-20 09:12:56'),
('ed370554889a8e23437962404f03dcc5f6e7f7c61abf9dee20e8f3ddd1d837adf7db7cdda6c24d67', 74, 1, 'MyApp', '[]', 0, '2020-01-11 14:08:59', '2020-01-11 14:08:59', '2021-01-11 16:08:59'),
('ed51cab7e7e8d8155cbd15471aa5a9e2ae5ea6ec50b4b15ffb506ba6c2f01a8829f652d93dde4949', 105, 1, 'MyApp', '[]', 1, '2021-02-23 09:39:54', '2021-02-23 09:39:54', '2022-02-23 11:39:54'),
('ef21e715472d102e9f8baad6107daf83c059343ee2b224c4302887b6da387b92b55a816aa3f73f8f', 105, 1, 'MyApp', '[]', 1, '2021-02-15 09:18:32', '2021-02-15 09:18:32', '2022-02-15 11:18:32'),
('ef44ceb47795faf0aeec0f84c32bc527ae3d985673a60c456eda9c1e779f29c73fb79855464e82b8', 98, 1, 'MyApp', '[]', 1, '2021-02-14 08:51:22', '2021-02-14 08:51:22', '2022-02-14 10:51:22'),
('ef4e1748fab3d4f853a1302db1388c11fcea15c9f2e03416d28373ab55795803b03784da28bfc98a', 20, 1, 'MyApp', '[]', 1, '2019-12-08 10:08:24', '2019-12-08 10:08:24', '2020-12-08 12:08:24'),
('efd7070d91b64d91dfaa112dea8f133c7e724d7222bd7062a03606b01546dc9cd6c737b82ac75352', 87, 1, 'MyApp', '[]', 0, '2020-01-14 12:36:23', '2020-01-14 12:36:23', '2021-01-14 14:36:23'),
('f0082b9a7bcf8d358882883a6bcbf1ebe25e0236e9bf8e490d16cecc1b512caca7ecb02b3965dcf9', 105, 1, 'MyApp', '[]', 1, '2021-01-21 11:38:41', '2021-01-21 11:38:41', '2022-01-21 13:38:41'),
('f17c4c32b85e684a46674aa732a6665e6d1e4caab3d3d6c6ff26c6b5dec88aeecaa7b4ebbd429620', 112, 1, 'MyApp', '[]', 1, '2021-01-20 07:40:31', '2021-01-20 07:40:31', '2022-01-20 09:40:31'),
('f3cbbb8bd8dce4ff800d90848b134f3646f6992fdebd96b1cd0016e4c0d9f387900862fff5b02005', 20, 1, 'MyApp', '[]', 1, '2019-12-09 10:46:44', '2019-12-09 10:46:44', '2020-12-09 12:46:44'),
('f3f2d803e6db81afcbe8ed0555382bd93958cf5d27394c652552631d641f363dec703a815e52160c', 20, 1, 'MyApp', '[]', 1, '2020-01-04 12:13:59', '2020-01-04 12:13:59', '2021-01-04 14:13:59'),
('f4c420b71e36acf622f3c263a7acf9a5938f0ee8b89c58d9c8ac131bd0f24601211085fda033c5d7', 70, 1, 'MyApp', '[]', 1, '2019-12-30 09:34:19', '2019-12-30 09:34:19', '2020-12-30 11:34:19'),
('f4fb6df837b06083c467818c2b797cdd7e7dceccc489043b65b20413ec54b5ffe58af5ce33488c99', 20, 1, 'MyApp', '[]', 1, '2019-12-31 13:21:48', '2019-12-31 13:21:48', '2020-12-31 15:21:48'),
('f53b17ba6788a8c31edc6c8ba9014a203476bdc5b266f28b21db9723a869b54318511cf8a4c6ba10', 20, 1, 'MyApp', '[]', 1, '2019-12-30 12:34:45', '2019-12-30 12:34:45', '2020-12-30 14:34:45'),
('f556f30ea20e3160876aef0cfa3066668f8ac5e4f5cab85fcbc7c0dc95dfdc49c9adec0bd14faf06', 60, 1, 'MyApp', '[]', 1, '2019-12-23 11:21:19', '2019-12-23 11:21:19', '2020-12-23 13:21:19'),
('f56e3c002ff0d86fa9f17776374bcda7b3eb172bc1e298e06658deb98990577d4f30a00ee87f7981', 20, 1, 'MyApp', '[]', 1, '2019-12-30 15:03:41', '2019-12-30 15:03:41', '2020-12-30 17:03:41'),
('f6861aa257aee0f61aa57e0170fdf41b335b565f83fb517056dd4e09fc0f6a196f1b967027f34c31', 20, 1, 'MyApp', '[]', 1, '2019-12-18 09:30:00', '2019-12-18 09:30:00', '2020-12-18 11:30:00'),
('f7951eaa586c898e6f9f4f61e64985150a94e29a4190835e423900fcc6afcf308d32b503db8b0334', 66, 1, 'MyApp', '[]', 0, '2019-12-23 16:12:25', '2019-12-23 16:12:25', '2020-12-23 18:12:25'),
('f8243630bae69dc2adda3f0f7fb820d18f556cb33c6c331b801d919f7edddf5c25cc5a5add10867d', 20, 1, 'MyApp', '[]', 1, '2019-12-15 10:55:01', '2019-12-15 10:55:01', '2020-12-15 12:55:01'),
('f9f67608a188c1b83adca805211e11c70057aba2720efbfa537690b3013a7e058d4c823cebefa9b3', 105, 1, 'MyApp', '[]', 1, '2021-01-20 07:18:27', '2021-01-20 07:18:27', '2022-01-20 09:18:27'),
('faafb7af72ab859b156fd60311ab6ff393bb87eff6bb8115e7d8d4350c067ae20264e0d512faa6ca', 31, 1, 'MyApp', '[]', 0, '2020-01-12 12:23:42', '2020-01-12 12:23:42', '2021-01-12 14:23:42'),
('faf82fec0c1c880b873b05d706fe130c5ff20bbfc9bf58881137e24e1a61f65c0cc2d80130c05e3f', 82, 1, 'MyApp', '[]', 1, '2020-01-15 07:43:53', '2020-01-15 07:43:53', '2021-01-15 09:43:53'),
('fb08e6f2185c12f672f2f7ebd51c0378fcd591867aad05736c6b30f82eceeca001f20f67ab90c48c', 20, 1, 'MyApp', '[]', 1, '2019-12-18 08:44:19', '2019-12-18 08:44:19', '2020-12-18 10:44:19'),
('fb3549074cb2ba824e78d550c91cb4d92dd62dcd05f2b766239ee4cbe35248f987837ae5f88a1b23', 20, 1, 'MyApp', '[]', 1, '2019-12-21 11:46:04', '2019-12-21 11:46:04', '2020-12-21 13:46:04'),
('fbc6d289e65062f0c5c7da710f3533df3228bed69ed8c75bc01b1e56a084a87ddf969a2be068e8fa', 20, 1, 'MyApp', '[]', 1, '2019-12-28 15:31:44', '2019-12-28 15:31:44', '2020-12-28 17:31:44'),
('fe3db994ac65a0022b19baf33c31ff228063ed2abd9859780f641ae343c31789513c1ee156f03d94', 20, 1, 'MyApp', '[]', 1, '2019-12-21 09:03:41', '2019-12-21 09:03:41', '2020-12-21 11:03:41'),
('ff038e4ce8892b4134104f9783e3990e51797f8554a9a620cf6699459005dcf2d10e0c66344080fa', 20, 1, 'MyApp', '[]', 1, '2019-12-23 11:25:08', '2019-12-23 11:25:08', '2020-12-23 13:25:08'),
('ffc734d251d0d53b32044d3e4b6eb002f36577d6e17cb664c5de76d803271ac3419ae5fab74aff93', 85, 1, 'MyApp', '[]', 0, '2020-01-14 12:15:30', '2020-01-14 12:15:30', '2021-01-14 14:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'WinWin Personal Access Client', 'JN54EZQ3GCZgDJ96a1S4v0oP7e39WrUlMMdgf7Ne', 'http://localhost', 1, 0, 0, '2019-11-17 12:58:22', '2019-11-17 12:58:22'),
(2, NULL, 'WinWin Password Grant Client', 'Aw0xPZVBzjqoT1ETfgzIi9TmoInzpSLcyqGfSToX', 'http://localhost', 0, 1, 0, '2019-11-17 12:58:22', '2019-11-17 12:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-11-17 12:58:22', '2019-11-17 12:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `small_img_id` int(11) NOT NULL COMMENT 'for preview',
  `big_img_id` int(11) NOT NULL COMMENT 'for entire page',
  `page_slider` text NOT NULL COMMENT 'json slider imgs',
  `page_type` varchar(255) NOT NULL COMMENT 'default or article',
  `hide_page` tinyint(1) NOT NULL,
  `page_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `small_img_id`, `big_img_id`, `page_slider`, `page_type`, `hide_page`, `page_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 73, 0, '', 'default', 0, 0, '2019-12-01 11:55:36', '2019-12-01 11:55:36', NULL),
(2, 74, 0, '', 'default', 0, 1, '2019-12-01 11:56:25', '2019-12-01 11:56:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages_translate`
--

CREATE TABLE `pages_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_body` longtext NOT NULL,
  `page_meta_title` varchar(255) NOT NULL,
  `page_meta_description` text NOT NULL,
  `page_meta_keywords` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages_translate`
--

INSERT INTO `pages_translate` (`id`, `page_id`, `page_title`, `page_slug`, `page_body`, `page_meta_title`, `page_meta_description`, `page_meta_keywords`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'About Us', 'About-Us', '<p><b>About Us&nbsp;About Us&nbsp;About UsAbout Us&nbsp;About Us</b><br></p>', '', '', '', 1, '2019-12-01 11:55:36', '2021-02-24 12:50:33', NULL),
(2, 1, 'تعرف علينا', 'تعرف-علينا', '<p><span style=\"font-weight: 700;\">تعرف علينا&nbsp;تعرف علينا&nbsp;&nbsp;تعرف علينا&nbsp;تعرف علينا&nbsp;</span><br></p>', '', '', '', 2, '2019-12-01 11:55:36', '2021-02-24 12:50:33', NULL),
(3, 2, 'Terms and condition', 'Terms-and-condition', '<p><b>Terms and condition&nbsp;Terms and condition&nbsp;Terms and condition&nbsp;Terms and condition</b><br></p>', '', '', '', 1, '2019-12-01 11:56:25', '2019-12-24 14:27:40', NULL),
(4, 2, 'سياسة الإستخدام', 'سياسة-الإستخدام', '<p><b>سياسة الإستخدام&nbsp;سياسة الإستخدام&nbsp;سياسة الإستخدام&nbsp;سياسة الإستخدام</b><br></p>', '', '', '', 2, '2019-12-01 11:56:25', '2019-12-24 14:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(10) UNSIGNED NOT NULL,
  `img_id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL COMMENT 'cash or paypal',
  `payment_credentials` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `img_id`, `payment_type`, `payment_credentials`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 75, 'paypal', '', 1, '2019-11-17 12:58:22', '2019-12-01 12:03:55', NULL),
(3, 75, 'fawry', '', 1, '2019-11-17 12:58:22', '2019-12-01 12:03:55', NULL),
(4, 75, 'mastercard', '', 1, '2019-11-17 12:58:22', '2019-12-01 12:03:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_translate`
--

CREATE TABLE `payment_method_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `payment_method_name` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method_translate`
--

INSERT INTO `payment_method_translate` (`id`, `payment_method_id`, `payment_method_name`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 'Visa', 1, '2019-11-17 12:58:22', '2021-01-22 11:06:11', NULL),
(3, 2, 'فيزا', 2, '2019-12-01 12:03:55', '2021-01-22 11:06:12', NULL),
(4, 3, 'Fawry', 1, '2019-11-17 12:58:22', '2021-01-22 11:14:20', NULL),
(5, 3, 'فورى', 2, '2019-12-01 12:03:55', '2021-01-22 11:14:21', NULL),
(6, 4, 'Mastercard', 1, '2019-11-17 12:58:22', '2021-01-22 11:15:10', NULL),
(7, 4, 'ماستر كارد', 2, '2019-12-01 12:03:55', '2021-01-22 11:15:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `code_id` int(10) UNSIGNED NOT NULL,
  `code_text` varchar(255) NOT NULL COMMENT 'code itself',
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `code_value` decimal(12,2) NOT NULL,
  `is_used` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`code_id`, `code_text`, `start_date`, `end_date`, `code_value`, `is_used`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ahmedfathi', '2021-01-19 15:50:00', '2021-01-22 14:50:00', '10.00', 0, '2021-01-19 11:45:52', '2021-02-24 13:22:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `push_tokens`
--

CREATE TABLE `push_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `push_token` text NOT NULL,
  `UDID` varchar(255) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL COMMENT 'from IP',
  `device_type` varchar(20) NOT NULL COMMENT 'android or ios',
  `device_name` varchar(255) NOT NULL COMMENT 'samsung galaxy note 8 or iphone x or ...',
  `os_version` varchar(255) NOT NULL COMMENT 'ios 11 or android 9',
  `app_version` varchar(20) NOT NULL COMMENT '1.0.0',
  `last_login_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `push_tokens`
--

INSERT INTO `push_tokens` (`id`, `user_id`, `push_token`, `UDID`, `ip_address`, `country`, `device_type`, `device_name`, `os_version`, `app_version`, `last_login_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'sdjashgdgashgd', 'asjhfdasgf', 'sdfsd', 'dsfsad', 'android', 'android s6', '11', 'khkg', NULL, '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(2, 26, 'sdjashgdgashgd', 'asjhfdasgf', 'sdfsd', 'dsfsad', 'android', 'ios11', '11', 'khkg', NULL, '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(3, 26, 'asdao', '', '', '', 'ios', '', '', '', NULL, '2019-12-07 14:59:33', '2019-12-08 08:28:48', NULL),
(4, 20, 'aaaaaaaaaaa', '', '', '', 'ios', '', '', '', NULL, '2019-12-08 09:23:31', '2020-01-21 08:12:18', NULL),
(5, 31, 'aaaaaaaaaaa', '', '', '', 'ios', '', '', '', NULL, '2019-12-18 10:52:43', '2020-01-14 12:19:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rate_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rate_id`, `doctor_id`, `user_id`, `session_id`, `rate`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 105, 1, '2.00', 'rating doctor', '2021-02-14 12:09:51', '2021-02-14 12:09:51', NULL),
(2, 1, 105, 4, '3.00', 'rating doctor', '2021-02-18 10:17:15', '2021-02-18 10:17:15', NULL),
(3, 1, 105, 3, '3.00', 'rating doctor', '2021-02-18 10:18:11', '2021-02-18 10:18:11', NULL),
(4, 1, 105, 5, '5.00', 'rating doctor', '2021-02-18 10:25:13', '2021-02-18 10:25:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('C5M4gdFt0NuZgmu0oUbh4Z7GcRQDI7qDypU6jLhm', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieVY5SFZoVGd1Tjh1bjV2aWkxOERMakZRaDNZNjJjYUxDZDc0RWFZTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHA6Ly9sb2NhbGhvc3Qvd29yay9zaGV6L3VwbG9hZHMvc2V0dGluZ3MvbG9nby84YjEzMDQ1NWU0MmFkNmY0NWUzMGM0ZmUzZjlkYTc0ZC5qcGVnLTY0LDY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1614237166),
('mnn4jXTDNErwWsDkM2tBM8xf4ZGx3Uwf7QfhB7dd', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiakt4NTQ2ZnNLbU1XMWhjOXdTekQ3dzlqb2EzN2lkQzVEVzVGeFZpRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHA6Ly9sb2NhbGhvc3Qvd29yay9zaGV6L3VwbG9hZHMvc2V0dGluZ3MvbG9nby84YjEzMDQ1NWU0MmFkNmY0NWUzMGM0ZmUzZjlkYTc0ZC5qcGVnLTY0LDY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1613811648),
('ou5QKl0nkAbpaZ0LOXxx28XaH9cmeLcVolWl1sf8', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRzE4OXlCcDFsdTFWbmR5Q0VLcmZKOGcwa09SMTBKMkQzYmg3dXZQYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTAxOiJodHRwOi8vbG9jYWxob3N0L3dvcmsvc2hlejIvdXBsb2Fkcy9kb2N0b3JzL2NlcnRpZmljYXRlcy9hODgzYWNiMjk1MWE1YTBlYmYyNjQ2NTQ3MWJkZTc0ZC5wbmctMjAwLDEwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1614255996),
('xOu3poIWzxj6Ze7o0ToUuckxeUAgwzdycotNAGkP', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoienRiMUpFVEQ0Z0xFNmtzQXQ2OHhrY01xYTRCNXdLUmFpenlLOFg0cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHA6Ly9sb2NhbGhvc3Qvd29yay9zaGV6L3VwbG9hZHMvc2V0dGluZ3MvbG9nby84YjEzMDQ1NWU0MmFkNmY0NWUzMGM0ZmUzZjlkYTc0ZC5qcGVnLTY0LDY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1614172985),
('Zem1BNVqo8TffypTb5Xogr2S7rYgsU52r83KeSPn', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieGRVRmFVMjI2aFZlUGhnVk5OUXlVb2FyN2kzT1FtbDRzTXFXTEY1WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTI6Imh0dHA6Ly9sb2NhbGhvc3Qvd29yay9zaGV6L3VwbG9hZHMvc2V0dGluZ3MvbG9nby84YjEzMDQ1NWU0MmFkNmY0NWUzMGM0ZmUzZjlkYTc0ZC5qcGVnLTY0LDY0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1614169031),
('zQqb5G7KJKZjD6QK2vKLginzxzlWziFpCKikaaBL', 1, '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYVRwSVVOblVma0tNeWhPVVVmNjNGNTU3ZGFzUkRpVU9HZjhrYm5DYiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovL2xvY2FsaG9zdC93b3JrL3NoZXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1613816954);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(10) UNSIGNED NOT NULL,
  `setting_group` varchar(255) NOT NULL COMMENT 'app or system or push_notification',
  `setting_key` varchar(255) NOT NULL COMMENT 'type or version or mail_type',
  `setting_type` varchar(255) NOT NULL COMMENT 'text or image',
  `setting_value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `setting_group`, `setting_key`, `setting_type`, `setting_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'app', 'name', 'text', 'Shezlong', NULL, '2021-01-16 09:14:21', NULL),
(2, 'app', 'type', 'text', 'other', NULL, '2019-11-26 10:24:38', NULL),
(3, 'app', 'version', 'text', '1.0.0', NULL, NULL, NULL),
(4, 'app', 'logo', 'image', '20', NULL, '2019-11-18 13:40:24', NULL),
(5, 'app', 'icon', 'image', '21', NULL, '2019-11-18 13:40:24', NULL),
(6, 'app', 'timezone', 'text', 'Africa/Cairo', NULL, '2019-11-26 11:23:31', NULL),
(7, 'app', 'currency', 'text', 'EGP', NULL, '2019-11-27 11:55:02', NULL),
(8, 'app', 'currency_rate', 'decimal', '0.2723', NULL, NULL, NULL),
(9, 'app', 'active_stock', 'bool', '1', NULL, NULL, NULL),
(10, 'app', 'products_include_tax', 'bool', '0', NULL, NULL, NULL),
(11, 'app', 'shipping_type', 'text', 'none', NULL, NULL, NULL),
(12, 'app', 'order_taxes', 'decimal', '0', NULL, NULL, NULL),
(13, 'app', 'allowed_countries', 'text', '[]', NULL, '2021-02-21 04:03:41', NULL),
(14, 'system', 'verification_type', 'text', 'email', NULL, NULL, NULL),
(15, 'system', 'sms_username', 'text', '', NULL, NULL, NULL),
(16, 'system', 'sms_sender_name', 'text', '', NULL, NULL, NULL),
(17, 'system', 'sms_password', 'text', '', NULL, NULL, NULL),
(18, 'system', 'mail_type', 'text', 'mail', NULL, NULL, NULL),
(19, 'system', 'smtp_port', 'text', '', NULL, NULL, NULL),
(20, 'system', 'smtp_host', 'text', '', NULL, NULL, NULL),
(21, 'system', 'smtp_user', 'text', '', NULL, NULL, NULL),
(22, 'system', 'smtp_pass', 'text', '', NULL, NULL, NULL),
(23, 'system', 'smtp_ssl', 'text', '', NULL, NULL, NULL),
(24, 'system', 'email', 'text', 'from@example.com', NULL, NULL, NULL),
(25, 'push_notification', 'dry_run', 'bool', '1', NULL, NULL, NULL),
(26, 'push_notification', 'android_key', 'text', 'djhfsfhsdghfhgsadhfgsahdgfjhgsajfgjasdgf', NULL, '2019-11-17 16:05:39', NULL),
(27, 'push_notification', 'pem_file', 'file', '', NULL, NULL, NULL),
(28, 'app', 'referral_points', 'int', '20', NULL, '2019-12-07 10:47:47', NULL),
(29, 'app', 'website_percentage', 'int', '20', NULL, '2021-02-24 12:49:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_list`
--

CREATE TABLE `social_list` (
  `social_list_id` int(10) UNSIGNED NOT NULL,
  `img_id` int(11) NOT NULL,
  `social_url` text NOT NULL,
  `social_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_list`
--

INSERT INTO `social_list` (`social_list_id`, `img_id`, `social_url`, `social_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 88, 'http://twitter.com/home', 0, '2019-09-14 10:32:02', '2021-01-22 10:56:09', NULL),
(2, 89, 'https://www.facebook.com', 1, '2019-09-14 10:32:02', '2021-01-22 10:56:24', NULL),
(3, 92, 'https://instagram.com', 2, '2019-12-25 11:15:17', '2020-01-13 11:37:25', NULL),
(4, 93, 'https://www.youtube.com', 3, '2019-12-25 11:15:47', '2021-01-22 10:56:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_list_translate`
--

CREATE TABLE `social_list_translate` (
  `id` int(10) UNSIGNED NOT NULL,
  `social_list_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_list_translate`
--

INSERT INTO `social_list_translate` (`id`, `social_list_id`, `name`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'twitter', 1, '2019-09-14 10:32:02', '2021-02-24 12:52:04', '2021-02-24 12:52:04'),
(2, 1, 'تويتر', 2, '2019-12-07 22:00:00', '2021-02-24 12:52:04', '2021-02-24 12:52:04'),
(3, 2, 'facebook', 1, '2019-09-14 10:32:02', '2021-01-22 10:56:24', NULL),
(4, 2, 'فيسبوك', 2, '2019-12-07 22:00:00', '2021-01-22 10:56:24', NULL),
(5, 3, 'instagram', 1, '2019-12-25 11:15:17', '2020-01-04 12:40:48', NULL),
(6, 3, 'انتستجرام', 2, '2019-12-25 11:15:17', '2020-01-04 12:40:48', NULL),
(7, 4, 'youtube', 1, '2019-12-25 11:15:47', '2021-01-22 10:56:40', NULL),
(8, 4, 'يوتيوب', 2, '2019-12-25 11:15:47', '2021-01-22 10:56:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialites`
--

CREATE TABLE `specialites` (
  `spe_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialites`
--

INSERT INTO `specialites` (`spe_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-01-16 16:13:31', '2021-01-16 16:13:31', NULL),
(2, '2021-01-16 16:14:58', '2021-01-16 16:14:58', NULL),
(3, '2021-01-16 16:15:29', '2021-01-16 16:15:29', NULL),
(4, '2021-01-16 16:16:01', '2021-01-16 16:16:01', NULL),
(5, '2021-01-16 16:16:12', '2021-01-18 08:32:42', '2021-01-18 08:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `specialites_translate`
--

CREATE TABLE `specialites_translate` (
  `id` int(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialites_translate`
--

INSERT INTO `specialites_translate` (`id`, `spe_id`, `title`, `lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Depression', 1, '2021-01-16 16:13:31', '2021-01-16 16:14:12', NULL),
(2, 1, 'الاكتئاب', 2, '2021-01-16 16:13:31', '2021-01-16 16:14:13', NULL),
(3, 2, 'Marriage Counselling', 1, '2021-01-16 16:14:58', '2021-01-16 16:14:58', NULL),
(4, 2, 'استشارات الزواج', 2, '2021-01-16 16:14:58', '2021-01-16 16:14:58', NULL),
(5, 3, 'Relationship Disorders', 1, '2021-01-16 16:15:29', '2021-01-16 16:15:29', NULL),
(6, 3, 'مشاكل العلاقات', 2, '2021-01-16 16:15:29', '2021-01-16 16:15:29', NULL),
(7, 4, 'Addiction', 1, '2021-01-16 16:16:02', '2021-01-16 16:16:02', NULL),
(8, 4, 'الإدمان', 2, '2021-01-16 16:16:02', '2021-01-16 16:16:02', NULL),
(9, 5, 'asd', 1, '2021-01-16 16:16:13', '2021-01-18 08:32:42', '2021-01-18 08:32:42'),
(10, 5, 'qwe', 2, '2021-01-16 16:16:13', '2021-01-18 08:32:42', '2021-01-18 08:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'if he logged in',
  `msg_type` varchar(20) NOT NULL COMMENT 'support or bug',
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL COMMENT 'with code',
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_seen` tinyint(1) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `timezone` varchar(20) NOT NULL,
  `UDID` varchar(255) NOT NULL,
  `device_type` varchar(20) NOT NULL COMMENT 'samsung or iphone or oppo or ...',
  `device_name` varchar(255) NOT NULL COMMENT 'samsung galaxy note 8 or iphone x or ...',
  `os_version` varchar(20) NOT NULL COMMENT 'ios 11 or andriod ',
  `app_version` varchar(20) NOT NULL COMMENT '1.0.0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `user_id`, `msg_type`, `full_name`, `phone`, `email`, `message`, `is_seen`, `ip_address`, `country`, `timezone`, `UDID`, `device_type`, `device_name`, `os_version`, `app_version`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 98, 'support', 'doctor253', '147258309', 'doctor@doctor.com', 'support message here1', 1, '', '', '', '', '', '', '', '', '2021-02-21 03:48:46', '2021-02-21 03:53:40', NULL),
(2, 0, 'support', 'ahmed fathi', '', 'ahmed@ahmed.com', 'support message here1', 1, '', '', '', '', '', '', '', '', '2021-02-21 03:49:26', '2021-02-21 03:53:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'who made the transaction',
  `order_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `transaction_type` varchar(40) NOT NULL COMMENT 'paid or refund',
  `amount` decimal(12,2) NOT NULL,
  `request_json` text NOT NULL,
  `response_json` text NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_code` varchar(500) NOT NULL,
  `user_type` varchar(50) NOT NULL COMMENT 'dev or admin or user',
  `user_provider` enum('default','facebook','twitter','apple','google') NOT NULL DEFAULT 'default',
  `social_id` text NOT NULL,
  `logo_id` int(10) UNSIGNED NOT NULL,
  `profile_path` text NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `temp_username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `temp_email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone_code` varchar(10) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `temp_mobile_number` varchar(255) NOT NULL,
  `verification_code` varchar(4) NOT NULL,
  `verification_code_expiration` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `user_wallet` decimal(12,2) UNSIGNED NOT NULL COMMENT 'his wallet on system that can pay from it or receive money on it',
  `user_points` int(11) NOT NULL COMMENT 'his points on system that can convert it to money added to wallet',
  `serial_number` varchar(255) NOT NULL,
  `referral_code` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL DEFAULT '1',
  `plan_expire_date` datetime NOT NULL,
  `offers_count` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL COMMENT 'from registration',
  `country` varchar(20) NOT NULL COMMENT 'from IP',
  `age` int(11) NOT NULL,
  `temp_age` int(11) NOT NULL,
  `is_treated_before` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `diagnosis` text NOT NULL,
  `forsa_tanya_knowing` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `temp_gender` varchar(100) NOT NULL,
  `timezone` varchar(100) NOT NULL COMMENT 'from IP',
  `last_login_date` timestamp NULL DEFAULT NULL,
  `display_lang_id` int(10) UNSIGNED NOT NULL COMMENT 'for admin control and display language',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_code`, `user_type`, `user_provider`, `social_id`, `logo_id`, `profile_path`, `first_name`, `last_name`, `username`, `temp_username`, `email`, `temp_email`, `email_verified_at`, `password`, `remember_token`, `phone_code`, `mobile_number`, `temp_mobile_number`, `verification_code`, `verification_code_expiration`, `is_verified`, `is_active`, `user_wallet`, `user_points`, `serial_number`, `referral_code`, `plan_id`, `plan_expire_date`, `offers_count`, `ip_address`, `country`, `age`, `temp_age`, `is_treated_before`, `city`, `diagnosis`, `forsa_tanya_knowing`, `gender`, `temp_gender`, `timezone`, `last_login_date`, `display_lang_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '', 'dev', 'default', '', 0, '', '', '', 'Administrator', '', 'admin@admin.com', '', NULL, '$2y$10$k4j/Wfj0FZ/PmQTxofXMWeXp0VnmRex/hFsKhuKkzL156NQMj/3X6', 'qShnnT77HJoVStYGRhPKNWW0ko3LJDALUv1cf6LeDbd7hBblgWlAKql8UsaF', '', '', '', '', NULL, 1, 1, '0.00', 0, '', '', 1, '2019-12-31 00:00:00', 0, '', '', 0, 0, 0, '', '', '', '', '', '', NULL, 1, '2019-09-14 10:32:02', '2020-01-12 09:47:33', NULL),
(98, '', 'doctor', 'default', '', 124, '', '', '', 'doctor253', '', 'doctor@doctor.com', '', NULL, '$2y$10$gK.LBvEGkb6FBEMbeMpB6.4ZHWboClwvaLRgmWAfOxvILfTVfMsny', NULL, '', '147258309', '', '9572', '2021-02-25 13:45:39', 0, 1, '600.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 37, 0, 0, '', '', '', 'male', '', '', NULL, 0, '2021-01-17 07:29:24', '2021-02-25 10:45:39', NULL),
(100, '', 'doctor', 'default', '', 125, '', '', '', 'doctor2', '', 'doctor2@doctor.com', '', NULL, '$2y$10$Ic9/37pKJfwYEJ0dE5mIkeP7qo0A.RgNMxLj0AcSKBaHIpSa6I/Iu', NULL, '', '', '', '', NULL, 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 0, 0, 0, '', '', '', '', '', '', NULL, 0, '2021-01-17 10:30:05', '2021-02-18 10:04:03', NULL),
(101, '9bfe1df407ba82e18a61e81098c6abfa', 'user', 'default', '', 0, '', '', '', 'ahmedfathi2', '', 'test@user.com', '', NULL, '$2y$10$v.oB3EgWVqdrCV4wFT3YnuFrEdOWqgY63aUwjax/iUvyUV53L.JXS', NULL, '', '', '', '5176', '2021-01-18 14:00:48', 0, 0, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 0, 0, 0, '', '', '', '', '', '', NULL, 0, '2021-01-18 11:00:48', '2021-01-18 11:00:48', NULL),
(105, 'b51c2e258bf8e100bebb26ddeb3e04c3', 'user', 'default', '', 125, '', '', '', 'ahmedfathi3', '', 'test@user2.com', '', NULL, '$2y$10$wHXjI8uojnbMq2m6mlb0h.WgZ4EnH5WlPkFA4uZZA39H2yOFJV33S', NULL, '', '01243598038', '', '8991', '2021-02-24 16:36:04', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 23, 0, 1, 'cairo', 'test test test', 'facebook and my friends', '', '', '', NULL, 0, '2021-01-19 06:56:45', '2021-02-24 13:36:04', NULL),
(108, '350dac8022cfdd2182c879a398eb1acd', 'user', 'default', '', 0, '', '', '', 'fathi', '', 'ahmedfathimamdouh25996@gmail.com', '', NULL, '$2y$10$AqbFqk8z8QkqvZVslnVqMOoQZJgBSihleMOhMrih1fR2pe6UN7R/K', NULL, '', '', '', '3174', '2021-01-19 10:33:27', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 20, 0, 1, 'cairo', 'test test test', 'facebook and my friends', '', '', '', NULL, 0, '2021-01-19 07:33:27', '2021-01-19 07:33:27', NULL),
(112, '868fd86e39d85309d316cee0ee0376ec', 'user', 'default', '', 129, '', '', '', 'fathi22', '', 'ahmedfathimamdouh25996@yahoo.com', '', NULL, '$2y$10$a8dIbHdm3Y1Hfza1CmCN7eDigrdBch9CBd9d7JCV88wDCqLOpauUu', NULL, '20', '01243598038', '', '8266', '2021-01-21 14:08:46', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 24, 0, 1, 'cairo', 'test test test', 'facebook and my friends', '', '', '', NULL, 0, '2021-01-20 07:26:16', '2021-01-22 06:08:39', NULL),
(113, '30d12f8bde5e517ae4290af0829a3a8b', 'user', 'default', '', 0, '', '', '', 'ahmed147', '', 'ahmedfathimamdouh96@yahoo.com', '', NULL, '$2y$10$q43aXYOy4PzGt/LQ90BAQOogchHeNV8Jl4eta.ftopoxGyK9/GIai', NULL, '20', '1243328048', '', '5159', '2021-02-14 10:39:53', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 20, 0, 1, 'alex', 'test', 'facebook', 'male', '', '', NULL, 0, '2021-02-14 07:32:08', '2021-02-14 08:22:46', NULL),
(114, '', 'doctor', 'default', '', 196, '', '', '', 'doctot', '', 'doc@doc.com', '', NULL, '$2y$10$4hkNsUixqxQDYQL/Nlv15.nJDaxJGgFc4pNZTZYuSti93XOeUEpAm', NULL, '', '147038309', '', '5890', '2021-02-25 13:37:56', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 37, 0, 0, '', '', '', 'male', '', '', NULL, 0, '2021-02-24 13:22:23', '2021-02-25 12:26:34', NULL),
(115, '78b08534291ba0ea799c822210350715', 'user', 'default', '', 0, '', '', '', 'userfathi', '', 'userfathi@yahoo.com', '', NULL, '$2y$10$/VlFNawt9JOsEchy/wyKAOUzAMwxn00s9ml02iP.eXNcrBdzl/DOy', NULL, '20', '01240028038', '', '5160', '2021-02-24 16:37:46', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 24, 0, 1, 'cairo', 'test test test', 'facebook and my friends', '', '', '', NULL, 0, '2021-02-24 13:37:46', '2021-02-24 13:37:46', NULL),
(125, '9c6fd47a38d17b2b029623c79317396d', 'user', 'default', '', 198, '', '', '', 'fathiuser2', '', 'fathiuser2@yahoo.com', '', NULL, '$2y$10$mZUi0ZZ4JG2mY7IPiOhRL.9iJ48Emf3R7H0ADrnUPeKFUsvLuavPW', NULL, '20', '01243322238', '', '4183', '2021-02-24 18:09:15', 0, 1, '0.00', 0, '', '', 1, '0000-00-00 00:00:00', 0, '', '', 24, 0, 1, 'cairo', 'test test test', 'facebook and my friends', '', '', '', NULL, 0, '2021-02-24 15:01:23', '2021-02-24 15:12:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_push_notifications`
--

CREATE TABLE `user_push_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `not_big_image` int(11) NOT NULL,
  `not_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `not_body` text CHARACTER SET utf8 NOT NULL,
  `additional_data` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_push_notifications`
--

INSERT INTO `user_push_notifications` (`id`, `user_id`, `not_big_image`, `not_title`, `not_body`, `additional_data`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 20, 0, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(2, 20, 0, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(3, 51, 0, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(4, 51, 79, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(5, 51, 84, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(6, 51, 90, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(7, 51, 0, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(8, 51, 0, 'user notification', 'user notification', '{\"not_type\":\"take offer\",\"offer_id\":1}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(9, 31, 90, 'user notification', 'A test page for HTML5 Web Notifications - small boxes that pop-up to notify you of activity even if you don\'t have your web browser as the active window.', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(10, 84, 79, 'offer 60% El Ezaby', 'El Ezaby Pharmacy', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/public/images/no_image.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(11, 84, 84, 'Pizza Hot Offers', 'The best pizza offers with Pizza Hut Egypt. Now At EGP88.50. Super Supreme. Now At EGP75.50. Classic Pepperoni. Now At EGP88.50. Chicken Supreme. Now At EGP113.16. Spicy Chicken Ranch. Now At EGP62.49. Margherita. Now At EGP102.00. Cheese Lovers. Now At EGP75.50. Vegetarian. Now At EGP75.50. Hot n Spicy.', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/public/images/no_image.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(12, 84, 90, 'Pizza Hot Offers', 'The best pizza offers with Pizza Hut Egypt. Now At EGP88.50. Super Supreme. Now At EGP75.50. Classic Pepperoni. Now At EGP88.50. Chicken Supreme. Now At EGP113.16. Spicy Chicken Ranch. Now At EGP62.49. Margherita. Now At EGP102.00. Cheese Lovers. Now At EGP75.50. Vegetarian. Now At EGP75.50. Hot n Spicy.', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/public/images/no_image.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(13, 84, 79, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/public/images/no_image.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(14, 84, 84, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/f3c86fb1afd7957dd3c8d2d7c7a29814.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(15, 84, 90, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(16, 84, 79, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(17, 60, 79, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/public/images/no_image.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(18, 60, 84, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/f3c86fb1afd7957dd3c8d2d7c7a29814.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(19, 60, 90, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL),
(20, 60, 79, 'Offer 50% elazby pharmacies ', 'El Ezaby Pharmacy. 2211021 likes · 15405 talking about this · 3900 were here. Providing excellent health care services to the public , hospitals and...', '{\"not_type\":\"take_offer\",\"offer_id\":1,\"not_image\":\"http://192.168.0.88/winwin_php/uploads/brands/branches/offers/c5971dfd6e1bec3bdc7d07e1b8683341.png\"}', '2019-09-14 10:32:02', '2019-09-14 10:32:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE `wallet_history` (
  `wallet_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `is_done` int(11) NOT NULL,
  `value_for` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_history`
--

INSERT INTO `wallet_history` (`wallet_id`, `doctor_id`, `value`, `is_done`, `value_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '100.00', 1, 'test', '2021-02-20 22:00:00', '2021-02-21 06:18:26', NULL),
(2, 1, '200.00', 1, 'test', '2021-01-12 22:00:00', '2021-02-21 06:18:26', NULL),
(3, 1, '200.00', 1, 'test', '2021-01-13 22:00:00', '2021-02-21 06:18:26', NULL),
(4, 1, '100.00', 1, 'test', '2021-02-20 22:00:00', '2021-02-21 06:18:26', NULL),
(5, 1, '100.00', 1, 'test', '2021-02-20 22:00:00', '2021-02-21 06:18:26', NULL),
(6, 1, '300.00', 1, 'test', '2021-02-20 22:00:00', '2021-02-21 06:18:26', NULL),
(7, 0, '200.00', 0, 'You received 200 EG In your wallet for the session with fathi at2021-02-22 ', '2021-02-22 11:41:01', '2021-02-22 11:41:01', NULL),
(8, 0, '200.00', 0, 'You received 200 EG In your wallet for the session with fathi at 2021-02-22 13:56:00', '2021-02-22 11:58:01', '2021-02-22 11:58:01', NULL),
(9, 0, '200.00', 0, 'You received 200 EG In your wallet for the session with fathi at 2021-02-22 14:38:00', '2021-02-22 12:40:01', '2021-02-22 12:40:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `wallet_trans_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `value_for` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallet_transactions`
--

INSERT INTO `wallet_transactions` (`wallet_trans_id`, `img_id`, `from_date`, `to_date`, `doctor_id`, `value`, `value_for`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 192, '2021-01-13', '2021-02-21', 1, 500, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', '2021-02-21 06:09:46', '2021-02-21 06:09:46', NULL),
(2, 193, '2021-02-21', '2021-02-21', 1, 100, 'bshdvasvdgvasvdavS AGVSDGHVAHGSdacs', '2021-02-21 06:15:46', '2021-02-21 06:15:46', NULL),
(4, 195, '2021-02-21', '2021-02-21', 1, 300, 'bhavdhaGVSHDGAD', '2021-02-21 06:18:26', '2021-02-21 06:18:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `cat_type` (`cat_type`);

--
-- Indexes for table `category_translate`
--
ALTER TABLE `category_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `cat_name` (`cat_name`(255));

--
-- Indexes for table `charge_wallet_codes`
--
ALTER TABLE `charge_wallet_codes`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `charge_wallet_codes_code_text_index` (`code_text`);

--
-- Indexes for table `charge_wallet_codes_used`
--
ALTER TABLE `charge_wallet_codes_used`
  ADD PRIMARY KEY (`id`),
  ADD KEY `charge_wallet_codes_used_code_id_index` (`code_id`),
  ADD KEY `charge_wallet_codes_used_user_id_index` (`user_id`);

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `city_translate`
--
ALTER TABLE `city_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_translate_city_id_index` (`city_id`),
  ADD KEY `city_translate_lang_id_index` (`lang_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `days_translate`
--
ALTER TABLE `days_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `days_translate_day_id_index` (`day_id`),
  ADD KEY `days_translate_lang_id_index` (`lang_id`);

--
-- Indexes for table `district_list`
--
ALTER TABLE `district_list`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `district_list_city_id_index` (`city_id`);

--
-- Indexes for table `district_translate`
--
ALTER TABLE `district_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district_translate_district_id_index` (`district_id`),
  ADD KEY `district_translate_lang_id_index` (`lang_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctors_certificates`
--
ALTER TABLE `doctors_certificates`
  ADD PRIMARY KEY (`cer_id`);

--
-- Indexes for table `doctors_certificates_translate`
--
ALTER TABLE `doctors_certificates_translate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors_sessions`
--
ALTER TABLE `doctors_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `doctors_specialites`
--
ALTER TABLE `doctors_specialites`
  ADD PRIMARY KEY (`doc_spe_id`);

--
-- Indexes for table `doctors_translate`
--
ALTER TABLE `doctors_translate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `langs_lang_img_id_index` (`lang_img_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`not_id`),
  ADD KEY `notifications_to_user_id_index` (`to_user_id`),
  ADD KEY `notifications_not_type_index` (`not_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `pages_page_type_index` (`page_type`);

--
-- Indexes for table `pages_translate`
--
ALTER TABLE `pages_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_translate_page_id_index` (`page_id`),
  ADD KEY `pages_translate_lang_id_index` (`lang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD KEY `payment_method_payment_type_index` (`payment_type`);

--
-- Indexes for table `payment_method_translate`
--
ALTER TABLE `payment_method_translate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_translate_payment_method_id_index` (`payment_method_id`),
  ADD KEY `payment_method_translate_lang_id_index` (`lang_id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`code_id`),
  ADD KEY `promo_code_code_text_index` (`code_text`);

--
-- Indexes for table `push_tokens`
--
ALTER TABLE `push_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `push_tokens_user_id_index` (`user_id`),
  ADD KEY `push_tokens_device_type_index` (`device_type`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`),
  ADD KEY `settings_setting_group_index` (`setting_group`),
  ADD KEY `settings_setting_key_index` (`setting_key`);

--
-- Indexes for table `specialites`
--
ALTER TABLE `specialites`
  ADD PRIMARY KEY (`spe_id`);

--
-- Indexes for table `specialites_translate`
--
ALTER TABLE `specialites_translate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_messages_user_id_index` (`user_id`),
  ADD KEY `support_messages_msg_type_index` (`msg_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_user_code_index` (`user_code`(255)),
  ADD KEY `users_user_type_index` (`user_type`),
  ADD KEY `users_email_index` (`email`),
  ADD KEY `users_phone_index` (`mobile_number`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`wallet_trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctors_certificates`
--
ALTER TABLE `doctors_certificates`
  MODIFY `cer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doctors_certificates_translate`
--
ALTER TABLE `doctors_certificates_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `doctors_sessions`
--
ALTER TABLE `doctors_sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `doctors_specialites`
--
ALTER TABLE `doctors_specialites`
  MODIFY `doc_spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doctors_translate`
--
ALTER TABLE `doctors_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `not_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;
--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `code_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `specialites`
--
ALTER TABLE `specialites`
  MODIFY `spe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `specialites_translate`
--
ALTER TABLE `specialites_translate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `wallet_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
