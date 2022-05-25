-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for shop
DROP DATABASE IF EXISTS `shop`;
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `shop`;

-- Dumping structure for table shop.tbl_brand
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table shop.tbl_brand: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` (`id`, `name`) VALUES
	(1, 'Nike'),
	(2, 'Adidas');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_category
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '2',
  `create_at` int(10) NOT NULL,
  `create_by` int(1) NOT NULL,
  `modify_at` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `create_by` (`create_by`),
  KEY `modify_by` (`modify_by`),
  CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`modify_by`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `tbl_category_ibfk_2` FOREIGN KEY (`create_by`) REFERENCES `tbl_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_category: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `title`, `slug`, `parent_id`, `type`, `active`, `create_at`, `create_by`, `modify_at`, `modify_by`) VALUES
	(16, 'Giày', 'giay', 0, 2, 1, 0, 1, 0, 1);
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_customer
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `buy` int(1) NOT NULL DEFAULT '0',
  `code_active` varchar(32) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_vietnamese_ci,
  `subcribe` int(1) NOT NULL DEFAULT '0',
  `create_at` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_customer: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_customer` DISABLE KEYS */;
INSERT INTO `tbl_customer` (`customer_id`, `fullname`, `email`, `address`, `phone`, `buy`, `code_active`, `note`, `subcribe`, `create_at`) VALUES
	(1, 'MONGODB_URL', 'huulongduong@gmail.com', 'abc', '0926290721', 0, NULL, '', 0, 1653310308);
/*!40000 ALTER TABLE `tbl_customer` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_detail_order
DROP TABLE IF EXISTS `tbl_detail_order`;
CREATE TABLE IF NOT EXISTS `tbl_detail_order` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `connect_product` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `oreder_id` (`order_id`),
  CONSTRAINT `tbl_detail_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_detail_order: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_detail_order` DISABLE KEYS */;
INSERT INTO `tbl_detail_order` (`detail_id`, `name`, `price`, `qty`, `total_price`, `connect_product`, `order_id`) VALUES
	(1, 'Giày Retropy F2', 699000, 5, 3495000, 19, 1),
	(2, 'Giày Adidas F2', 699000, 1, 699000, 23, 2),
	(3, 'Giày Retropy F2', 699000, 1, 699000, 20, 2),
	(4, 'Giày Retropy F2', 699000, 1, 699000, 19, 3),
	(5, 'Giày Retropy F2', 699000, 2, 1398000, 19, 4),
	(6, 'Giày Retropy F2', 699000, 1, 699000, 21, 4);
/*!40000 ALTER TABLE `tbl_detail_order` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_discount
DROP TABLE IF EXISTS `tbl_discount`;
CREATE TABLE IF NOT EXISTS `tbl_discount` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code` tinytext NOT NULL,
  `Percent` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table shop.tbl_discount: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_discount` DISABLE KEYS */;
INSERT INTO `tbl_discount` (`ID`, `Code`, `Percent`) VALUES
	(1, 'DC001', 5),
	(2, 'DC002', 10);
/*!40000 ALTER TABLE `tbl_discount` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_filter
DROP TABLE IF EXISTS `tbl_filter`;
CREATE TABLE IF NOT EXISTS `tbl_filter` (
  `filter_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` int(1) NOT NULL COMMENT '1=>filter by price .2=> filter by category',
  `max_price` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT '0',
  `cat_id` int(11) DEFAULT NULL,
  `create_at` int(12) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '2',
  `create_by` int(11) NOT NULL,
  `modify_at` int(12) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `brand` int(11) DEFAULT NULL,
  PRIMARY KEY (`filter_id`),
  KEY `cat_id` (`cat_id`),
  KEY `create_by` (`create_by`),
  KEY `modify_by` (`modify_by`),
  KEY `tbl_filter_brand` (`brand`),
  CONSTRAINT `tbl_filter_brand` FOREIGN KEY (`brand`) REFERENCES `tbl_brand` (`id`),
  CONSTRAINT `tbl_filter_ibfk_1` FOREIGN KEY (`modify_by`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `tbl_filter_ibfk_2` FOREIGN KEY (`create_by`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `tbl_filter_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_filter: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_filter` DISABLE KEYS */;
INSERT INTO `tbl_filter` (`filter_id`, `title`, `type`, `max_price`, `min_price`, `cat_id`, `create_at`, `active`, `create_by`, `modify_at`, `modify_by`, `brand`) VALUES
	(11, 'Từ 1.000.000đ đến 5.000.000đ', 1, 5000000, 1000000, NULL, 1512573657, 1, 1, 1515631537, 1, NULL),
	(22, 'Từ 5.000.000 đến 10.000.000', 1, 10000000, 5000000, NULL, 1515631367, 1, 1, 1515631367, 1, NULL),
	(23, 'Từ 10.000.000 đến 15.000.000', 1, 15000000, 10000000, NULL, 1515631491, 1, 1, 1515631491, 1, NULL),
	(26, 'Nike', 2, NULL, 0, 16, 0, 1, 1, 0, 1, 1),
	(27, 'Adidas', 2, NULL, 0, 16, 0, 1, 1, 0, 1, 2),
	(29, 'Nhỏ hơn 1.000.000đ', 1, 1000000, 0, NULL, 1512573657, 1, 1, 1515631537, 1, NULL);
/*!40000 ALTER TABLE `tbl_filter` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_media
DROP TABLE IF EXISTS `tbl_media`;
CREATE TABLE IF NOT EXISTS `tbl_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `caption` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `id_connect` int(11) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '2',
  `type` int(1) NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`media_id`),
  KEY `id_connect` (`id_connect`),
  KEY `create_by` (`create_by`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_media: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_media` DISABLE KEYS */;
INSERT INTO `tbl_media` (`media_id`, `url`, `title`, `caption`, `id_connect`, `active`, `type`, `create_at`, `create_by`) VALUES
	(326, 'public/images/clothes/9.png', '', 'undefined', 0, 1, 0, 1512844286, 1),
	(327, 'public/images/clothes/10.png', '', 'undefined', 0, 1, 0, 1512844286, 1),
	(328, 'public/images/clothes/11.png', '', 'undefined', 0, 1, 0, 1512844286, 1),
	(329, 'public/images/clothes/12.png', '', 'undefined', 0, 1, 0, 1512844286, 1);
/*!40000 ALTER TABLE `tbl_media` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_order
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `code_order` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `buyer` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '3',
  `payment_method` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code_active` varchar(33) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `create_at` int(12) NOT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `code_order` (`code_order`),
  KEY `buyer` (`buyer`),
  CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`buyer`) REFERENCES `tbl_customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_order: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` (`order_id`, `code_order`, `buyer`, `active`, `payment_method`, `code_active`, `total_price`, `total_qty`, `create_at`) VALUES
	(1, 'VSZ-1', 1, 3, 'direct-payment', '31326edf0f1a5e1e686d7af59792315d', 3495000, 5, 1653215383),
	(2, 'VSZ-2', 1, 3, 'direct-payment', '907fd724ba751b92ce253fcb329bfb02', 1398000, 2, 1653309519),
	(3, 'VSZ-3', 1, 3, 'direct-payment', 'cd6b911e57cf859f8493dda80a225247', 699000, 1, 1653309546),
	(4, 'VSZ-4', 1, 3, 'direct-payment', '001edc6ee5d2b1a5385ac54a4f00ff59', 2097000, 3, 1653310308);
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_product
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `favorite` int(1) NOT NULL DEFAULT '0',
  `name` varchar(220) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `percen` int(11) DEFAULT '0',
  `thumb` int(11) NOT NULL,
  `img_involve` varchar(220) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `depict` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `info` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `create_at` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '2',
  `discount` int(11) DEFAULT NULL,
  `create_by` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `modify_at` int(11) NOT NULL,
  `brand` int(11) DEFAULT NULL,
  `size` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `thumb` (`thumb`),
  KEY `cat_id` (`cat_id`),
  KEY `create_by` (`create_by`),
  KEY `modify_by` (`modify_by`),
  KEY `brand` (`brand`),
  CONSTRAINT `tbl_product_brand` FOREIGN KEY (`brand`) REFERENCES `tbl_brand` (`id`),
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`modify_by`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`create_by`) REFERENCES `tbl_user` (`user_id`),
  CONSTRAINT `tbl_product_ibfk_3` FOREIGN KEY (`thumb`) REFERENCES `tbl_media` (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_product: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_product` DISABLE KEYS */;
INSERT INTO `tbl_product` (`product_id`, `favorite`, `name`, `slug`, `percen`, `thumb`, `img_involve`, `depict`, `price`, `cat_id`, `info`, `create_at`, `total_product`, `active`, `discount`, `create_by`, `modify_by`, `modify_at`, `brand`, `size`) VALUES
	(18, 1, 'Giày Retropy F2', 'nike-retropy-f2', 12, 326, '[326, 328, 329]', 'test depect', 895000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 0, 12, 1, 699000, 1, 1, 0, 1, '[36, 37, 38, 39]'),
	(19, 1, 'Giày Retropy F2', 'nike-retropy-f2', 12, 327, '[326, 328, 329]', 'test depect', 895000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 0, 12, 1, 699000, 1, 1, 0, 1, '[36, 37, 38, 39]'),
	(20, 1, 'Giày Retropy F2', 'nike-retropy-f2', 12, 328, '[326, 328, 329]', 'test depect', 895000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 0, 12, 1, 699000, 1, 1, 0, 1, '[36, 37, 38, 39]'),
	(21, 1, 'Giày Retropy F2', 'nike-retropy-f2', 12, 329, '[326, 328, 329]', 'test depect', 895000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 0, 12, 1, 699000, 1, 1, 0, 1, '[36, 37, 38, 39]'),
	(22, 1, 'Giày Retropy F2', 'nike-retropy-f2', 12, 326, '[326, 328, 329]', 'test depect', 1500000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 0, 12, 1, 1200000, 1, 1, 0, 1, '[36, 37, 38, 39]'),
	(23, 1, 'Giày Adidas F2', 'adidas-f2', 12, 329, '[326, 328, 329]', 'test depect', 895000, 16, 'Bạn luôn thích đi trước một bước. Hòa trộn phong cách retro với thiết kế hiện đại, đôi giày adidas Retropy F2 này sẽ đồng hành cùng bạn. Mang đậm phong cách giày chạy bộ thập niên 80, đôi giày này có thân giày kết hợp nhiều lớp chất liệu khác nhau. Với kiểu dáng thanh thoát và đế giữa dày dặn bằng nhựa EVA, đôi giày này là lựa chọn lý tưởng dành cho ngày nay.!', 1, 12, 1, 699000, 1, 1, 0, 2, '[36, 37, 38, 39]');
/*!40000 ALTER TABLE `tbl_product` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_sytem
DROP TABLE IF EXISTS `tbl_sytem`;
CREATE TABLE IF NOT EXISTS `tbl_sytem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `describe` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tel` varchar(13) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `per_page` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_sytem: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sytem` DISABLE KEYS */;
INSERT INTO `tbl_sytem` (`id`, `title`, `describe`, `tel`, `address`, `email`, `per_page`) VALUES
	(1, 'Sneaker Shop', 'Sneaker shop luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng, chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.', '0947234117', '279 Nguyễn Tri Phương', 'huulongduong@gmail.com', 10);
/*!40000 ALTER TABLE `tbl_sytem` ENABLE KEYS */;

-- Dumping structure for table shop.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(32) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `level` int(1) NOT NULL DEFAULT '3',
  `salt` varchar(40) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `fullname` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` text COLLATE utf8mb4_vietnamese_ci,
  `tel` varchar(13) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `facebook` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `modify_at` int(12) DEFAULT NULL,
  `code_confirm` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '{}',
  `create_at` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- Dumping data for table shop.tbl_user: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `password`, `email`, `level`, `salt`, `active`, `fullname`, `address`, `tel`, `facebook`, `modify_at`, `code_confirm`, `create_at`) VALUES
	(1, '23737df6fce285b2eac4c728937a1977', 'huulongduong@gmail.com', 1, 'f5f7e1c69d39eeab514bb22e9da42313', 1, 'Dương Hữu Long', '', '0926290721', '', 1519976075, '[]', 1511658087);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
