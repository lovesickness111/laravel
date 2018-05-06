-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2018 lúc 04:58 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(4, 4, '2018-05-06', 1500000, 'COD', 'lời nhắn:\r\ngiao hàng cho tôi tại:\r\nvào lúc:  6h chiều\r\nsize giầy là 37', '2018-05-06 13:46:08', '2018-05-06 13:46:08'),
(5, 5, '2018-05-06', 550000, 'COD', 'lời nhắn:\r\ngiao hàng cho tôi tại: ktx\r\nvào lúc:  16h', '2018-05-06 14:41:32', '2018-05-06 14:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit`, `unit_price`, `created_at`, `updated_at`) VALUES
(5, 4, 65, 1, 43, 750000, '2018-05-06 13:46:08', '2018-05-06 13:46:08'),
(6, 4, 66, 1, 43, 750000, '2018-05-06 13:46:08', '2018-05-06 13:46:08'),
(7, 5, 67, 1, 38, 550000, '2018-05-06 14:41:32', '2018-05-06 14:41:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(4, 'nguyen viet cuong', 'nam', 'vietcuong.uet@gmail.com', 'Street Address', '016664447', 'lời nhắn:\r\ngiao hàng cho tôi tại:\r\nvào lúc:  6h chiều\r\nsize giầy là 37', '2018-05-06 13:46:08', '2018-05-06 13:46:08'),
(5, 'viet cuong', 'nam', 'vietcuong.uet@gmail.com', 'xuan thuy', '19001009', 'lời nhắn:\r\ngiao hàng cho tôi tại: ktx\r\nvào lúc:  16h', '2018-05-06 14:41:32', '2018-05-06 14:41:32'),
(6, 'nguyen viet cuong', 'nam', 'vietcuong.uet@gmail.com', 'Street Address', '016664447', 'lời nhắn:\r\ngiao hàng cho tôi tại:\r\nvào lúc:', '2018-05-06 14:43:28', '2018-05-06 14:43:28'),
(7, 'nguyen viet cuong', 'nam', 'vietcuong.uet@gmail.com', 'Street Address', '016664447', 'lời nhắn:\r\ngiao hàng cho tôi tại:\r\nvào lúc:', '2018-05-06 14:50:45', '2018-05-06 14:50:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`) VALUES
(64, 'PROPHERE XÁM', 6, '<p>MÀU XÁM LÔNG CHUỘT THANH LỊCH, ĐẾ GIÀY MÀU TRẮNG&nbsp;</p>', 800000, 750000, 'ZNQH-31318283_1953062335006913_5979578782371367240_n.jpg', NULL, 1, '2018-05-06 12:53:00', '2018-05-06 12:53:00'),
(65, 'PROPHERE ĐEN-XÁM', 6, '<p>SỰ KẾT HỢP HOÀN HẢO CỦA 2 GAM MÀU TỒI&nbsp;</p>', 800000, 750000, 'jord-31416895_1953062251673588_4542859203231536246_n.jpg', NULL, 1, '2018-05-06 12:54:11', '2018-05-06 12:54:11'),
(66, 'PROPHERE TRẮNG(FULL)', 6, '<p>MÀU TRẮNG TOÀN BỘ TẠO SỰ SANG TRỌNG -LỊCH LÃM</p>', 800000, 750000, 'BtXi-31948868_1958329131146900_8706829175001972736_n.jpg', NULL, 1, '2018-05-06 12:55:25', '2018-05-06 12:55:25'),
(67, 'STAN SMITH ĐÉ VÀNG-GÓT ĐEN', 7, '<p>SỐ LƯỢNG CÓ HẠN</p>', 600000, 550000, 'EHvk-31138124_1951831188463361_3981424716480832325_n.jpg', NULL, 1, '2018-05-06 12:59:51', '2018-05-06 12:59:51'),
(68, 'STAN SMITH ĐÉ TRẮNG-GÓT HỒNG', 6, '<p>STAN SMITH GÓT HỒNG LÀ LỰA DÀNH CHO NHỮNG BẠN NỮ TRẺ TRUNG VÀ THANH LỊCH</p>', 600000, 550000, '3SMv-31531014_1958328667813613_4475690886931415040_n.jpg', NULL, 1, '2018-05-06 13:01:21', '2018-05-06 13:01:21'),
(69, 'STAN SMITH MŨI BẠC-GÓT ĐEN', 7, '<p>TẠO ĐIỂM NHÁN VỚI MŨI GIÀY ĐƯỢC PHỦ LỚP MÀU BẠC NANO SIÊU NHỎ</p>', 650000, 0, 'fwE9-31947155_1958328617813618_5742856000466059264_n.jpg', NULL, 1, '2018-05-06 13:02:59', '2018-05-06 13:02:59'),
(71, 'BALENCIAGIA TRIP S ĐẾ KÉP', 8, '<p>ĐÔI GIÀY GIÚP BẠN NỔI TRỘI TRƯỚC ĐÁM ĐÔNG</p>', 1100000, NULL, 'InsF-TRIP S.png', NULL, 1, '2018-05-06 13:09:50', '2018-05-06 13:10:38'),
(72, 'BALENCIAGIA TRIP S ĐẾ ĐƠN', 8, '<p>CHỈ CÓ THỂ NÓI:\" QUÁ CHÂT ! \"</p>', 1000000, 890000, 'fpAm-DEDON.png', NULL, 1, '2018-05-06 13:17:56', '2018-05-06 13:17:56'),
(73, 'SPEED STRAINER TRẮNG', 9, '<p>HIỆN SHOP CÓ ĐỦ MỌI KÍCH CỠ</p>', 800000, NULL, 'FGBF-BLACK.png', NULL, 1, '2018-05-06 13:20:16', '2018-05-06 13:22:52'),
(74, 'SPEED STRAINER ĐEN', 9, '<p>MÀU ĐEN VỚI ĐẾ TRẮNG , CÁC CHI TIẾT HOÀN THIỆN -CHẮC CHẮN</p>', 900000, NULL, 'XuMj-WHITE.png', NULL, 1, '2018-05-06 13:21:17', '2018-05-06 13:22:28'),
(75, 'NIKE AIR FORCE TRẮNG', 10, '<p>MÀU TRẮNG TINH KHÔI CỰC CHẤT</p>', 700000, 600000, 'L3lv-AIR.png', NULL, 1, '2018-05-06 13:26:11', '2018-05-06 13:26:11'),
(76, 'NIKE AIR FORCE VÀNG  MẬT', 10, '<p>SỐ LƯỢNG CÓ GIÓI HẠN</p>', 700000, NULL, 'upTh-GOLD.png', NULL, 1, '2018-05-06 13:27:32', '2018-05-06 13:27:32'),
(77, 'SUPREME', 11, '<p>VỚI 2 GAM MÀU CHỦ ĐẠO TRẮNG VÀ ĐỔ , VỚI ĐIỂM NHẤN LÀ CỤM HỌA TIẾT CHỮ \"SUP\" DỌC THEO THÂN GIÀY</p>', 1200000, NULL, 'CTjT-SUP.png', NULL, 1, '2018-05-06 13:32:04', '2018-05-06 13:32:04'),
(78, 'NIKE UPTEMPO ĐEN', 11, '<p>CỰC CHẤT</p>', 1500000, 1300000, 'I05h-UP.png', NULL, 1, '2018-05-06 13:32:43', '2018-05-06 13:32:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`, `updated_at`, `created_at`) VALUES
(7, '<p>ltstore</p>', 'sTSR-493151.jpg', '2018-05-06 09:56:32', '2018-05-06 09:56:32'),
(8, '<p>Ltstore</p>', 'euuJ-shoes-30665-31386-hd-wallpapers.jpg', '2018-05-06 09:56:55', '2018-05-06 09:56:55'),
(10, '<p>muagiay</p>', 'wFgm-aa5ac2852f9ccadee24160e34698666e.jpg', '2018-05-06 09:58:37', '2018-05-06 09:58:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(6, 'ADIDAS PROPHERE', '<p>Dòng sản phẩm mới nhất, thích hợp cho các hoạt động thể thao.</p>', 'WgVf-31416895_1953062251673588_4542859203231536246_n.jpg', '2018-05-06 12:51:20', '2018-05-06 12:51:20'),
(7, 'ADIDAS STAN SMITH', '<p>MẪU GIÀY CỔ ĐIỂN NHƯNG LUÔN LÀ LỰA CHỌN TUYỆT VỜI CHO CÁC BẠN TRẺ NĂNG ĐỘNG</p>', 'I7Rt-31947155_1958328617813618_5742856000466059264_n.jpg', '2018-05-06 12:58:33', '2018-05-06 12:58:33'),
(8, 'BALENCIAGIA TRIPLE S', '<p>NHỮNG DÔI GIÀY CỰC CHẤT VỚI GIÁ SIÊU HỢP LÝ</p>', '6CfS-Ảnh chụp Màn hình 2018-05-06 lúc 7.34.57 CH.png', '2018-05-06 13:04:56', '2018-05-06 13:04:56'),
(9, 'SPEED STRAINER', '<p>THIẾT KẾ ĐỘC ĐÁO CHỈ CÓ Ở BALENCIAGIA</p>', 'wRz2-Ảnh chụp Màn hình 2018-05-06 lúc 7.35.37 CH.png', '2018-05-06 13:19:19', '2018-05-06 13:19:19'),
(10, 'NIKE AIR FORCE', '<p>ĐÔI&nbsp; GIÀY KHÔNG BAO GIỜ LỖI THỜI!</p>', '9XAJ-AIR.png', '2018-05-06 13:25:15', '2018-05-06 13:25:15'),
(11, 'NIKE UPTEMPO', '<p>NHỮNG ĐÔI GIÀY CỰC KÌ CHẤT VỚI GIÁ HẠT RẺ CHỈ CÓ Ở LT STORE</p>', 'JAY3-UP.png', '2018-05-06 13:29:50', '2018-05-06 13:29:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(6, 'Hương Hương', 'huonghuong08.php@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2018-05-06 14:38:04', 1),
(7, 'nguyen viet cuong', 'vietcuong.uet@gmail.com', '$2y$10$tIFxZ3hIAojVDzDCIxEO2OB1nkKT8NJYucc1N5omrflIGRQaad9WO', '016664447', 'Street Address', 'zk962Z9sXfoYbQyVQZfy5VrgLQ1xLOd4VNbHDa1QaNWMfKrLuop4F2mhUZmt', '2018-05-05 14:54:36', '2018-05-06 14:36:08', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`),
  ADD KEY `fk_1_idx` (`id_bill`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_4` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
