-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 08:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_dong_ho`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ma_loai` varchar(10) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ma_loai`, `ten_loai`) VALUES
('AU', 'Cơ - Automatic'),
('CR', 'Chronograph'),
('DT', 'Điện tử'),
('HW', 'Lai - Hybrid'),
('QM', 'Thạch Anh - Quartz Movement'),
('SL', 'Solar'),
('TM', 'Thông Minh');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id_chi_tiet_hd` bigint(10) NOT NULL,
  `id_hd` bigint(20) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` double NOT NULL,
  `thanh_tien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_hd` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `dien_thoai` int(11) NOT NULL,
  `dia_chi` varchar(250) NOT NULL,
  `ngay_giao` date NOT NULL,
  `hinh_thuc` varchar(100) NOT NULL,
  `thanh_tien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_hd`, `email`, `ten_kh`, `dien_thoai`, `dia_chi`, `ngay_giao`, `hinh_thuc`, `thanh_tien`) VALUES
(1, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(2, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(3, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(4, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(5, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(6, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(7, 'dung@gmail.com', '', 0, '', '2024-04-17', 'ATM', 0),
(8, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0),
(9, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0),
(10, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0),
(11, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0),
(12, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0),
(13, 'dung@gmail.com', '', 902064702, 'Sky9', '2024-04-17', 'ATM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(100) DEFAULT NULL,
  `ma_loai` varchar(10) NOT NULL,
  `hinh` varchar(50) DEFAULT NULL,
  `don_gia` double NOT NULL DEFAULT 0,
  `nha_san_xuat` varchar(100) DEFAULT NULL,
  `mo_ta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ma_sp`, `ten_sp`, `ma_loai`, `hinh`, `don_gia`, `nha_san_xuat`, `mo_ta`) VALUES
(1, 'ĐỒNG HỒ NAM CITIZEN AN8201-57L', 'QM', 'citizen_an8201_57l.png', 3670000, 'Citizen Watch Co.', 'Mỗi hãng đồng hồ đều khẳng định mình qua những nét nổi bật riêng biệt để có thể cạnh tranh trong thị trường đồng hồ đầy sự khốc liệt. Châu Âu và Châu Á là hai khu vực nổi tên những cái tên “sừng sỏ” về đồng hồ mà giới mộ điệu luôn vô cùng quan tâm. Thương hiệu đồng hồ Citizen cũng nằm trong danh sách đó với những công nghệ chế tác hàng đầu, đỉnh cao là dòng sản phẩm của Eco-Drive năng lượng ánh sáng độc quyền.'),
(2, 'Casio Vintage 36mm Nam MW-59-1EVDF', 'DT', 'casio_vintage.png', 622000, 'Casio', 'Vật liệu vỏ / vành bezel: Nhựa, Dây đeo bằng nhựa, Mặt kính nhựa, Khả năng chống nước ở độ sâu 50 mét, Hiển thị ngày, Giờ hiện hành thông thường, Đồng hồ kim: 3 kim (Giờ, phút, giây), Độ chính xác: ±20 giây một tháng, Tuổi thọ pin xấp xỉ: 3 năm với pin SR626SW'),
(3, 'SRWATCH SG3004.4101CV', 'HW', 'srwatch.png', 1050000, 'SRWatch', 'Đồng hồ nam SRWATCH SG3004.4101CV đen đơn giản, mặt tròn, dây da đen cao cấp, vỏ máy, cọc số thanh mãnh, sắc nét, 2 kim, nút điều chỉnh giờ đều bằng thép không gỉ được mạ sáng bóng nổi bật trên nền đen tăng phần lịch lãm cho người đeo, mặt kính đồng hồbằng sapphire cao cấp chống trầy, chống nước 5 ATM.'),
(4, 'CASIO MTP-VD03B-1A', 'HW', 'vb03b.png', 1900000, 'Casio', 'Lựa chọn phong cách đơn giản mà vẫn sành điệu với một mẫu đồng hồ kim cổ điển có thiết kế kim giờ, phút và giây đơn giản. Những chiếc đồng hồ này sở hữu khả năng chống nước, giúp bạn sử dụng hàng ngày mà không phải lo lắng khi đi ngoài trời mưa hoặc khi rửa dưới vòi nước. Với thiết kế đơn giản mà đa năng, chiếc đồng hồ này sẽ đưa bạn đến mọi nơi bạn muốn, cả trong lẫn ngoài giờ làm việc.'),
(5, 'Casio - Nam MTP-B100MB-1EVDF Size 43mm', 'CR', 'mtp.png', 3343000, 'Casio', 'Là 1 sản phẩm Đồng hồ Casio Nam Nhật Bản, thương hiệu đã được khẳng định về chất lượng với giá thành vô cùng hợp lý. Bello là đối tác chính thức của Casio tại Việt Nam từ 2009.'),
(6, 'SEIKO SOLAR DIVER SNE533', 'SL', 'seiko.png', 3670000, 'Seiko', 'Seiko Solar SNE533 có đường kính 46.7 mm. Hướng dẫn chọn size phù hợp khi đặt mua trực tuyến đồng hồ dành cho nam: Đầu tiên bạn cần đo chu vi cổ tay với sai số đo cho phép chỉ 0.5 cm. Chu vi cổ tay 15 cm thông thường sẽ phù hợp với đồng hồ có đường kính 39 mm. Chu vi cổ tay 16 cm phù hợp với đồng hồ có đường kính 40 mm. Chu vi cổ tay 17 cm phù hợp với đồng hồ có đường kính 41 mm. Chu vi cổ tay 18 cm phù hợp với đồng hồ có đường kính 42 mm. Một số trường hợp đặc biệt nếu các bạn đã thích rồi thì '),
(7, 'Orient - Nữ RA-AG0018L10B Size 36mm', 'QM', 'orient.png', 8500000, 'Orient', 'Được trang bị cổ máy cơ khí được vận hành bởi các bánh răng chuyển động theo nguyên lý cơ học kết hợp với các bộ phận cơ khí và được cung cấp năng lượng bởi cuộn lò xo chính (mainspring). Một chiếc đồng hồ cơ được điều khiển bởi mainspring và phải được lên cót bằng tay theo định kỳ, các cổ máy cơ khí hiện đại được phát triển thêm tính năng lên cót tự động (automatic) dựa vào chuyển động hàng ngày của cổ tay giúp chúng ta không cần phải lên cót bằng tay định kỳ.'),
(8, 'Đồng hồ Garmin Venu 2S', 'TM', 'garmin.png', 10490000, 'Garmin', 'Đồng hồ thông minh Garmin Venu 2S sở hữu mặt đồng hồ tròn với viền kim loại bằng gờ thép không gỉ hắt sáng. Màn hình AMOLED giúp mọi hình ảnh, con chữ hiển thị trên mặt đồng hồ đều sắc nét, lung linh đẹp mắt.'),
(24, 'G-Shock', 'AU', 'arrow.png', 700000, 'CASIO', '<p>xin chao hehehehe</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `roleuser`
--

CREATE TABLE `roleuser` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `tai_khoan` varchar(30) NOT NULL,
  `mat_khau` varchar(30) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sdt` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `tai_khoan`, `mat_khau`, `ho_ten`, `email`, `sdt`, `role`) VALUES
(1, 'admin', 'Admin@123', 'Nguyen Ba Nhan', 'admin@gmail.com', 906425395, 'admin'),
(2, 'dung', '123', 'Huynh Quang Dung', 'dung@gmail.com', 902064702, 'user'),
(8, 'test', '123', 'Nguyen Van A', 'nguyenvana@gmail.com', 906929915, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id_chi_tiet_hd`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_hd`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `roleuser`
--
ALTER TABLE `roleuser`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id_chi_tiet_hd` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_hd` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `id_hd` FOREIGN KEY (`id_hd`) REFERENCES `orders` (`id_hd`),
  ADD CONSTRAINT `ma_sp` FOREIGN KEY (`ma_sp`) REFERENCES `product` (`ma_sp`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `category` (`ma_loai`);

--
-- Constraints for table `roleuser`
--
ALTER TABLE `roleuser`
  ADD CONSTRAINT `roleuser_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `roleuser_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
