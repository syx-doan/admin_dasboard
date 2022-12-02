-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2022 lúc 01:36 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `do_an_tot_nghiep`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL COMMENT 'id hóa đơn',
  `id_user` int(11) NOT NULL COMMENT 'mã khách hàng',
  `status` varchar(500) NOT NULL COMMENT 'tình  trạng',
  `note` varchar(500) NOT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_dentail`
--

CREATE TABLE `bill_dentail` (
  `id_bill_dentail` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `price` float NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `image_brand` varchar(250) NOT NULL,
  `id_brand` int(20) NOT NULL,
  `name_brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`image_brand`, `id_brand`, `name_brand`) VALUES
('toshiba.png', 1, 'Toshiba'),
('Dell_Logo_v_2021.webp', 2, 'Dell'),
('Xiaomi_logo.svg.png', 3, 'Xiaomi'),
('logo-lg-vector-inkythuatso-01-30-13-53-58.jpg', 4, 'LG'),
('logo-apple.jpg', 5, 'Apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL COMMENT 'MÃ LOẠI HÀNG',
  `name_category` varchar(255) NOT NULL COMMENT 'tên Hàng hóa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Tivi'),
(2, 'Điện thoại'),
(3, 'Tủ lạnh'),
(4, 'Laptop'),
(5, 'Tai nghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_product`, `id_user`, `comment`, `ngaybinhluan`) VALUES
(2, 1, 1, 'sản phẩm này lỗi shop ơi ><', '2022-11-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `title`, `image`, `content`) VALUES
(8, 'abc 1', 'tivi2.jpg', 'acscacsca'),
(9, 'câcscascasc', 'dell2-2.jpg', 'Đồ Gia Đình luôn đảm bảo nguồn gốc xuất xứ rõ ràng, chính sách bán hàng linh hoạt, thanh toán nhanh chóng, tiện lợi. Các chính sách hậu mãi, bảo hành đầy đủ đúng như khẩu hiệu của hệ thống \"Chất lượng, Giá trị đích thực'),
(10, 'abc 1', 'tivi2-4.jpg', 'cccasascsczxczxc'),
(11, 'abc', 'tn1.jpg', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz'),
(12, 'sdasdsad', 'dell1-4.jpg', 'đâsdsadsadsada'),
(13, 'ssdasd', 'realme-c30s-2gb637993682645604060.png', 'Đồ Gia Đình luôn đảm bảo nguồn gốc xuất xứ rõ ràng, chính sách bán hàng linh hoạt, thanh toán nhanh chóng, tiện lợi. Các chính sách hậu mãi, bảo hành đầy đủ đúng như khẩu hiệu của hệ thống \"Chất lượng, Giá trị đích thực'),
(14, 'tin tưc mới nè', '279033558_1639047689794650_410538072194343684_n.jpg', 'Đồ Gia Đình luôn đảm bảo nguồn gốc xuất xứ rõ ràng, chính sách bán hàng linh hoạt, thanh toán nhanh chóng, tiện lợi. Các chính sách hậu mãi, bảo hành đầy đủ đúng như khẩu hiệu của hệ thống \"Chất lượng, Giá trị đích thực');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(10) NOT NULL COMMENT 'mã sản phẩm',
  `name` varchar(100) NOT NULL COMMENT 'tên sản phảm',
  `image` varchar(100) NOT NULL COMMENT 'ảnh sản phẩm',
  `description` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tình trạng',
  `category_id` int(10) NOT NULL COMMENT 'mã loại san rphamr',
  `brand_id` int(11) NOT NULL,
  `price` double NOT NULL COMMENT 'giá ',
  `quantity` int(10) NOT NULL COMMENT 'số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `name`, `image`, `description`, `category_id`, `brand_id`, `price`, `quantity`) VALUES
(1, 'Điện thoại Realme C30s (2GB/32GB)', 'realme-c30s-xanh-2gb-1.jpg', ' Realme C30s (2GB/32GB) vừa được ra mắt vào tháng 09/2022 với mức giá dễ tiếp cận nhưng lại được trang bị bộ thông số khá ấn tượng, sở hữu trong mình một màn hình có kích thước lớn và viên pin dung lượng cao giúp bạn thỏa sức trải nghiệm dài lâu.', 2, 3, 2190000, 10),
(2, 'Điện thoại Xiaomi Redmi Note 11 (4GB/64GB)', 'xiaomi-redmi-note-11-1-3.jpg', 'Xiaomi Redmi Note 11 (4GB/64GB) thực sự là 1 tuyệt tác của phân khúc điện thoại có mức giá dễ tiếp cận với cụm 4 camera sau chụp ảnh chuyên nghiệp, tích hợp con chip Snapdragon đáp ứng đa tác vụ, dung lượng pin lớn cho bạn thỏa sức giải trí cả ngày.', 2, 3, 4290000, 10),
(3, 'Tủ lạnh Toshiba Inverter 180 lít GR-B22VU UKG', 'toshiba-gr-b22vu-ukg-1-2-org.jpg', ' Với kiểu tủ ngăn đá trên, chiếc tủ lạnh Toshiba Inverter 180 lít GR-B22VU UKG được thiết kế nhỏ gọn nhưng vẫn toát lên vẻ đẹp hiện đại bởi tông màu đen tuyền sang trọng. Dễ dàng đặt ở bất kì vị trí nào trong nhà, từ phòng khách đến phòng bếp.', 3, 1, 5890000, 10),
(4, 'ủ lạnh Toshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG', 'toshiba-gr-rs682we-pmv-06-mg-1-3-org.jpg', 'Thiết kế sang trọng, bảng điều khiển cảm ứng hiện đại bên ngoài \r\nToshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG thuộc mẫu tủ lạnh side by side, gam màu xám tinh tế, cùng với bảng điều khiển cảm ứng hiện đại được thiết kế bên ngoài, ắt hẳn sẽ trở thành nội thất sang trọng cho không gian nhà bạn.  ', 3, 1, 17370000, 10),
(5, 'Laptop Dell Gaming G15 5515 R5 5600H/16GB/512GB/4GB RTX3050/120Hz/OfficeHS/Win11 (P105F004DGR) ', 'dell.jpg', 'Mang đến sức mạnh của chiến binh, laptop Dell Gaming G15 5515 R5 5600H (P105F004DGR) không những sở hữu thiết kế góc cạnh đầy mạnh mẽ, mà còn được trang bị cấu hình vượt trội, luôn trong tư thế sẵn sàng chiến đấu ở mọi đấu trường.', 4, 2, 23490000, 10),
(6, 'Laptop Dell Vostro 3510 i5 1135G7/8GB/512GB/2GB MX350/OfficeHS/Win11 (P112F002BBL)', 'dell2.jpg', ' Laptop Dell Inspiron 15 3511 i3 (P112F001CBL) sở hữu ngôn ngữ thiết kế vô cùng quen thuộc từ nhà Dell, kết hợp giữa sự đơn giản nhưng không kém phần tinh tế và mạnh mẽ. Cùng với việc sở hữu con chip Intel Core i3 thế hệ 11 mang đến một trải nghiệm khá tốt cho dòng máy giá rẻ dành cho học tập - văn phòng.', 4, 2, 12390000, 10),
(7, 'Smart Tivi LG 4K 55 inch 55UP7550PTC', 'tivi1.jpg', ' Thiết kế thanh lịch, sang trọng\r\nSmart tivi LG 4K 55 inch 55UP7550PTC được thiết kế với kiểu dáng vô cùng đơn giản nhưng không kém phần sang trọng.\r\n\r\nTivi LG 55 inch góp phần tạo điểm nhấn cho không gian nơi bạn trưng bày nên tinh tế và thu hút dù là phòng khách hay phòng ngủ hoặc bất cứ nơi nào bạn muốn đặt tivi.', 1, 4, 12900000, 10),
(8, 'Smart Tivi LG 4K 43 inch 43UQ8000PSC', 'tivi2.jpg', 'Smart Tivi LG 4K 43 inch 43UQ8000PSC thanh mảnh, sang trọng, mang đến trải nghiệm nghe nhìn ấn tượng nhờ màn hình 4K sắc nét tương phản HDR10 Pro, âm thanh mạnh mẽ sống động được tối ưu với AI Sound và AI Acoustic Tuning cùng kho ứng dụng webOS 6.0 phong phú, thỏa mãn người dùng.', 1, 4, 11360000, 10),
(9, 'Tai nghe Bluetooth AirPods Pro (2nd Gen) MagSafe Charge Apple MQD83 Trắng', 'tn1.jpg', ' AirPods Pro 2 là một trong những sản phẩm được Apple ra mắt trong năm 2022, với nhiều nâng cấp ấn tượng, chip H2 mạnh mẽ, âm thanh phong phú hơn, khả năng khử tiếng ồn chủ động,... hứa hẹn sẽ mang lại trải nghiệm tuyệt vời cho người dùng.', 5, 5, 6490000, 20),
(10, 'Tai nghe Bluetooth AirPods 3 Lightning Charge Apple MPNY3 Trắng ', 'tn2.jpg', 'Chiếc tai nghe Bluetooth AirPods 3 Lightning Charge Apple MPNY3 Trắng mang đến một thiết kế tối giản, kiểu dáng hiện đại, màu sắc tinh tế và nhiều công nghệ âm thanh vượt trội như: Adaptive EQ, Chip Apple H1, Spatial Audio.', 5, 5, 5390000, 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id_product` int(20) NOT NULL COMMENT 'mã sản phẩm',
  `image` varchar(250) NOT NULL COMMENT 'ảnh sp',
  `id_product_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id_product`, `image`, `id_product_img`) VALUES
(29, 'Capture.PNG', 5),
(29, 'Capture1.PNG', 6),
(29, 'erdlv1.PNG', 7),
(29, 'erdlv2.PNG', 8),
(31, '', 13),
(30, '1.PNG', 19),
(1, 'realme-c30s-2gb637993682645604060.png', 20),
(1, 'realme-c30s-2gb637993682648144092.jpg', 21),
(1, 'realme-c30s-2gb637993682650394089.jpg', 22),
(1, 'realme-c30s-tong-quan-1-1020x570.jpg', 23),
(2, 'note-11-1020x570.jpeg', 24),
(2, 'note-110-1020x570.jpeg', 25),
(2, 'SLIDE2-1020x570.jpg', 26),
(2, 'xiaomi-redmi-note-11-thumb-video-1020x570.jpg', 27),
(3, '4-1020x570.jpg', 28),
(3, 'toshiba-gr-b22vu-ukg-050821-1121262.jpg', 29),
(3, 'toshiba-gr-b22vu-ukg-210821-0606200.jpg', 30),
(3, 'toshiba-gr-b22vu-ukg-260821-0517160.jpg', 31),
(4, 'toshiba-gr-rs682we-pmv-06-mg-1-3-org.jpg', 32),
(4, 'toshiba-gr-rs682we-pmv-06-mg-050821-1145453.jpg', 33),
(4, 'toshiba-gr-rs682we-pmv-06-mg-190821-1105100.jpg', 34),
(4, 'toshiba-gr-rs682we-pmv-06-mg-210821-0617000.jpg', 35),
(5, 'dell1-1.jpg', 36),
(5, 'dell1-2.jpg', 37),
(5, 'dell1-3.jpg', 38),
(5, 'dell1-4.jpg', 39),
(6, 'dell2-1.jpg', 40),
(6, 'dell2-2.jpg', 41),
(6, 'dell2-3.jpg', 42),
(6, 'dell2-4.jpg', 43),
(7, 'tivi1-1.jpg', 44),
(7, 'tivi1-2.jpg', 45),
(7, 'tivi1-3.jpg', 46),
(7, 'tivi1-4.jpg', 47),
(8, 'tivi2-1.jpg', 48),
(8, 'tivi2-2.jpg', 49),
(8, 'tivi2-3.jpg', 50),
(8, 'tivi2-4.jpg', 51),
(9, 'tn1-1.jpg', 52),
(9, 'tn1-2.jpg', 53),
(9, 'tn1-3.jpg', 54),
(9, 'tn1-4.jpg', 55),
(10, 'tn2-1.jpg', 56),
(10, 'tn2-2.jpg', 57),
(10, 'tn2-3.jpg', 58),
(10, 'tn2-4.jpg', 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL COMMENT 'mã khách hàng',
  `fullname` varchar(100) NOT NULL COMMENT 'họ và tên',
  `username` varchar(50) NOT NULL COMMENT 'tài khoản',
  `password` varchar(20) NOT NULL COMMENT 'mật khẩu',
  `phone` varchar(10) NOT NULL COMMENT 'số điện thoại',
  `email` varchar(200) NOT NULL COMMENT 'email',
  `address` varchar(2000) NOT NULL COMMENT 'địa chỉ',
  `role` int(1) NOT NULL DEFAULT 0 COMMENT 'vai trò'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bảng use';

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `username`, `password`, `phone`, `email`, `address`, `role`) VALUES
(1, 'Nguyễn Thái Quang Hà ', 'quangha05270', '123123', '0123456678', 'quangha05270@gmail.com', 'Quảng Nam', 1),
(2, 'Đoàn Viết Sỹ ', 'sydoan123', '123123', '1234566789', 'sydoan123@gmail.com', 'Quảng Bình', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `bill_dentail`
--
ALTER TABLE `bill_dentail`
  ADD PRIMARY KEY (`id_bill_dentail`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_ủe` (`id_user`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id_product_img`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id hóa đơn';

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT COMMENT 'MÃ LOẠI HÀNG', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT COMMENT 'mã sản phẩm', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id_product_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã khách hàng', AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
