-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 01, 2021 lúc 08:24 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `team6_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comment_id`, `email`, `username`, `content`, `rating`, `product_id`, `created_at`) VALUES
(5, 'admin@gmail.com', 'admin', 'xin chào', 1, 9, '2020-12-16 12:54:15'),
(6, 'admin@gmail.com', 'admin', 'Tai nghe rất hay', 4, 5, '2020-12-30 04:50:53'),
(7, 'admin@gmail.com', 'admin', 'nghe chan, am bash cui bap', 2, 5, '2020-12-30 04:54:07'),
(8, 'admin@gmail.com', 'admin', 'ahihi', 5, 5, '2020-12-30 04:56:50'),
(9, 'admin@gmail.com', 'admin', 'tốt', 5, 17, '2020-12-30 11:20:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(3, 'LG'),
(5, 'Kanen'),
(6, 'Apple'),
(7, 'HP'),
(8, 'Samsung'),
(9, 'Huawei'),
(10, 'Asus'),
(14, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `pro_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Đồng hồ Nam Citizen BI5000-87L', 1, 3, 1548000, 'dong-ho-nam-citizen-bi5000-87l-trang-600x600.jpg', 'Xu hướng thiết kế chính của đồng hồ Citizen là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\nSở hữu thiết kế sang trọng và tinh tế, chiếc đồng hồ quartz này phù hợp với các quý ông mạnh mẽ và thời thượng\r\n\r\nĐồng hồ Citizen BI5000-87L mang thương hiệu đồng hồ Citizen đến từ Nhật Bản, nổi tiếng với nhiều chiếc đồng hồ hiện đại và sang trọng.\r\n\r\nLớp vỏ ngoài bền chắc giúp đồng hồ có khả năng chịu va đập tốt\r\n\r\n- Mặt kính của mẫu đồng hồ Citizen nam này có độ trong suốt tốt, cứng cáp, hạn chế nứt vỡ khi rơi ở độ cao vừa phải.\r\n\r\n- Bộ khung chắc chắn, khả năng chống oxi hóa và ăn mòn tốt, bảo vệ an toàn cho các chi tiết máy bên trong.\r\n\r\nHệ số chống nước 5 ATM, chiếc đồng hồ nam này vẫn an toàn khi bạn đeo đi mưa và tắm, không mang khi bơi lội hay lặn\r\n\r\nNgười dùng nắm bắt thông tin ngày trong tháng dễ dàng hơn khi chiếc đồng hồ kim này được trang bị lịch ngày\r\n\r\nDây đồng hồ có độ bền cao, chịu được mọi điều kiện thời tiết, dễ dàng đánh bóng như mới sau một thời gian sử dụng', 1, '2020-11-17 07:46:13'),
(2, 'Laptop Lenovo IdeaPad S145 15IIL i3 1005G1/4GB/256GB/Win10 (81W8001XVN)', 14, 4, 1149000, '1609296039lenovo-ideapad-s145-207798-2-600x600.jpg', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Thiết kế đơn giản, thời trang và tinh tế\r\nLaptop  mang thiết kế cơ bản của dòng Lenovo IdeaPad S145 có ngoại hình đẹp mắt, lớp vỏ được làm bằng nhựa phủ sơn màu xám sang trọng với logo Lenovo được đặt gọn gàng sang một bên trên nắp lưng. Độ dày 17.9 mm, cân nặng 1.79 kg phù hợp với các bạn học sinh sinh viên, người thường xuyên di chuyển.\r\nĐáp ứng tốt nhu cầu học tập, văn phòng\r\nMáy được trang bị con chip Intel Core i3 Ice Lake thế hệ 10 và RAM 4 GB. Với cấu hình này, dân văn phòng hay các bạn học sinh, sinh viên có thể yên tâm xử lí các tác vụ thường ngày như soạn thảo Word, soạn bài thuyết trình trên PowerPoint, lướt web, nghe nhạc, ... mượt mà.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', 1, '2020-11-17 07:49:36'),
(3, 'Laptop Lenovo IdeaPad C340 14IML i5 10210U/8GB/512GB/2GB MX230/Touch/Win10 (81TK007RVN)', 2, 4, 13920000, 'lenovo-ideapad-c340-14iml-i5-81tk007rvn-kg-213526-600x600.jpg', 'Máy tính nhỏ gọn, siêu linh hoạt\r\nLenovo IdeaPad C340 có trọng lượng 1.65 kg, không quá nặng nề khi mang laptop trên vai suốt ngày dài.\r\nNhà sản xuất Lenovo còn trang bị cho chiếc máy tính xách tay này bộ đèn bàn phím tiện lợi, hỗ trợ bạn tối đa trong trường hợp bạn phải làm việc ban đêm nhưng ngại bật đèn làm phiền người khác.\r\n\r\nĐặc biệt laptop Lenovo IdeaPad C340 là dòng laptop lai, có khả năng gập xoay 360 độ với màn hình cảm ứng mượt mà. Điều này giúp bạn tự do làm việc với mọi tư thế thoải mái nhất.\r\n\r\nViệc trang bị màn hình cảm ứng còn giúp ích rất nhiều đối với dân thiết kế, vẽ AI, những người cần chỉnh sửa bài thuyết trình thường xuyên.\r\n\r\nKích thước màn hình 14 inch cân bằng với trọng lượng giúp tổng thể máy trông gọn gàng. Với độ phân giải Full HD (1920 x 1080), IdeaPad C340 cho hình ảnh sắc nét, đẹp mắt. ', 1, '2020-11-17 07:49:36'),
(4, 'Loa Bluetooth LG Xboom Go PL5 Xanh Đen\r\n', 3, 1, 2690000, 'loa-bluetooth-lg-xboom-go-pl5-xanh-den-600x600-1-600x600.jpg', 'Thiết kế đơn giản, phong cách năng động\r\nLoa Bluetooth LG Xboom Go PL5 Xanh Đen có thiết kế hình trụ nằm ngang tạo cảm giác vừa vặn khi cầm trên tay, màu xanh đen trẻ trung năng động.\r\n\r\nThoải mái mang chiếc loa Bluetooth này tham gia vào các bữa tiệc tại bể bơi hay ngoài trời mà không cần lo lắng bị ướt nước với chuẩn kháng nước IPX5.', 1, '2020-11-17 07:51:47'),
(5, 'Tai nghe Bluetooth Kanen K6', 5, 2, 600000, 'tai-nghe-bluetooth-kanen-k6-avatar-600x600.jpg', 'Cách sử dụng tai nghe\r\n- Nút tròn ấn giữ: Bật/tắt nguồn.\r\n\r\n- Nút tròn ấn 1 lần: Dừng/ phát nhạc, nhận/ngắt cuộc gọi.\r\n\r\n- Nút tròn ấn 2 lần: Kích hoạt Siri, Bixby,...\r\nCách kết nối tai nghe Bluetooth\r\n- Bạn ấn nút nguồn (hình tròn), lúc này tai nghe sẽ chớp xanh đỏ liên tục để chờ kết nối.\r\n\r\n- Mở Bluetooth trong điện thoại và dò tìm tên K6 để kết nối.\r\n\r\n- Tai nghe sẽ tự động kết nối với điện thoại ở những lần sau.', 0, '2020-11-17 07:53:04'),
(6, 'Loa kéo karaoke LG RL2 50W', 3, 1, 3090000, 'loa-keo-lg-rl2-10-600x600.jpg', 'Âm thanh trung thực, mạnh mẽ, cuốn hút bất tận với công suất 50 W, loa trầm 6.5\"\r\nLoa trầm phát âm trầm tinh tế tái hiện từng nốt nhạc rõ ràng, sắc sảo, cho bạn cảm nhận âm thanh chân thật, quyến rũ.\r\n\r\nLoa kéo sử dụng liên tục trong thời gian từ 13 - 16 tiếng, sạc đầy trong 8 - 10 tiếng cho bạn ca hát, nghe nhạc thoải mái, dài lâu.', 1, '2020-11-17 08:04:33'),
(7, 'Điện thoại iPhone 11 64GB', 6, 5, 19990000, 'iphone-11-red-2-400x460-400x460.png', 'Nâng cấp mạnh mẽ về camera\r\nNói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới.\r\nNgoài camera chính vẫn có độ phân giải 12 MP thì chúng ta sẽ có thêm một camera góc siêu rộng và cũng với độ phân giải tương tự.', 0, '2020-11-17 08:10:49'),
(8, 'Điện thoại iPhone 8 Plus 128GB', 6, 5, 14190000, 'iphone-8-plus-128gb-082720-052722-400x460.png', 'Thiết kế sang trọng, bóng bẩy\r\niPhone 8 Plus giữ nguyên thiết kế đã hoàn thiện từ thế hệ đàn em iPhone 7 Plus, bên cạnh đó iPhone 8 Plus được bo tròn góc cạnh mềm mại giúp cho máy tăng độ sang trọng, thêm bắt mắt. Máy được trang bị khung nhôm cao cấp chắc chắn, và mặt kính cường lực ở mặt trước và phần lưng cùng với logo táo khuyết quen thuộc.', 1, '2020-11-17 08:24:57'),
(9, 'Máy tính bảng iPad Mini 7.9 inch Wifi 64GB (2019)', 6, 4, 899000, 'ipad-mini-79-inch-wifi-2019-gold-400x460.png', 'Tất cả nâng cấp đều ở bên trong\r\nIPad mini 4 và iPad Mini 7.9 inch Wifi 2019 là bước nhảy vọt về hiệu năng từ bộ xử lý A8 sang A12 Bionic mới nhất mang lại \"hiệu năng gấp 3 lần và đồ họa nhanh hơn 9 lần\". Đồng thời, dung lượng RAM đã có sự nâng cấp nhẹ so với thế hệ thứ 4, tăng từ 2 GB lên RAM 3 GB giúp bạn chạy đa nhiệm nhiều ứng dụng tốt hơn.', 0, '2020-11-17 08:31:57'),
(10, 'Laptop HP 15s fq1111TU i3 1005G1/4GB/256GB/Win10 (193R0PA)', 7, 4, 11390000, 'hp-15s-fq1111tu-i3-193r0pa-224012-224012-600x600.jpg', 'Vi xử lý mới nhất\r\nVi xử lý Intel Core i3 Gen 10 mới nhất giúp nâng cấp hiệu suất với khả năng đáp ứng hệ thống mượt mà và khả năng kết nối nhanh, đáp ứng nhu cầu học tập, giải trí hằng ngày. \r\n\r\nRAM 4 GB đa nhiệm khá mượt, đủ dùng khi mở khoảng 15 - 20 tab Chrome. Máy có hỗ trợ nâng cấp RAM lên tối đa 16 GB.', 0, '2020-11-17 08:35:41'),
(11, 'Apple Watch S5 44mm viền nhôm dây cao su đen', 6, 3, 11691000, 'apple-watch-s5-44mm-vien-nhom-day-cao-su-ava-1-600x600.jpg', 'Tính năng màn hình luôn hiển thị (Always-on) giúp bạn xem giờ và thông báo tiện lợi bất cứ lúc nào. Khi không quan sát, đồng hồ sẽ tự giảm độ sáng xuống để tiết kiệm pin. Màn hình trên Apple Watch S5 44mm sử dụng tấm nền OLED cao cấp, tiết kiệm pin hơn, độ sắc nét đạt chuẩn Retina - nghĩa là bạn rất khó để nhận biết các điểm ảnh, rỗ hạt bằng mắt thường.', 1, '2020-11-17 08:39:56'),
(12, 'Laptop Apple MacBook Air 2017 i5 1.8GHz/8GB/128GB (MQD32SA/A)', 6, 4, 20990000, 'apple-macbook-air-mqd32sa-a-i5-5350u-600x600s.jpg', 'Thiết kế siêu mỏng và nhẹ \r\nMacbook Air 2017 mang những đặc trưng thiết kế của dòng MacBook Air với trọng lượng và độ dày của laptop lần lượt là 1.7 cm và 1.35 kg rất tiện lợi và dễ dàng giúp người dùng không cảm thấy bất tiện khi mang trên vai thường xuyên khi đi học hay đi làm. \r\n\r\nĐây cũng là chiếc MacBook chính hãng có giá rẻ nhất hiện tại, phù hợp với mọi người tiêu dùng. ', 1, '2020-11-17 08:44:30'),
(13, 'Đồng hồ Nam Citizen AW1598-70X', 1, 3, 4980000, 'citizen-aw1598-70x-nam-avatar-1-600x600.jpg', 'Đơn giản và thanh lịch \r\nXu hướng thiết kế chính của đồng hồ Citizen là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\nTìm hiểu thêm\r\n\r\nThiết kế nam tính, hiện đại, phù hợp với các chàng trai năng động, trẻ trung.\r\n\r\nĐồng hồ nam Citizen AW1598-70X là chiếc đồng hồ mang thương hiệu Citizen nổi tiếng và chất lượng của Nhật Bản.\r\n\r\nĐược tích hợp công nghệ Eco-Drive, hoạt động bằng nguồn năng lượng được chuyển hóa từ ánh sáng (mặt trời, đèn, ...).\r\n\r\nXem thêm: Công nghệ Eco-Drive là gì?\r\n\r\nBảo vệ an toàn phần lõi bên trong nhờ bộ khung bền bỉ, chịu lực tốt.\r\n\r\n- Mặt kính đồng hồ Citizen có độ trong suốt cao, không lóa mắt khi xem giờ dưới nắng.\r\n\r\n- Khung viền cứng cáp, chắc chắn, chống oxi hóa, chịu được mọi thời tiết khắc nghiệt.\r\n\r\nThoải mái đeo khi tắm, bơi vì có hệ số chống nước 100m, không mang đồng hồ nam khi lặn.\r\n\r\nLưu ý: Không vặn các núm điều khiển khi bơi.\r\n\r\nDễ dàng kiểm soát thời gian khi đồng hồ được trang bị lịch ngày hữu dụng.\r\n\r\nDây đồng hồ Citizen nam bền chắc, chống ăn mòn, cho cảm giác mát tay khi đeo.', 1, '2020-11-17 08:45:55'),
(14, 'Laptop LG Gram 17 i7 1065G7/8GB/512GB/Win10 (17Z90N-V.AH75A5)', 3, 4, 38490000, 'lg-gram-17-i7-17z90n-vah75a5-142120-022156-600x600.jpg', 'Tự tin đồng hành cùng LG Gram 17 i7 (17Z90N-V.AH75A5) - chiếc máy tính xách tay 17 inch đến từ nhà LG. Siêu mỏng nhẹ, pin cực trâu và màn hình tràn viền rộng lớn là những điểm nổi bật của chiếc máy tính này. \r\nThiết kế gọn nhẹ, siêu di động\r\nLG Gram đem đến thiết kế siêu mỏng nhẹ chỉ 1.35 kg với một chiếc laptop 17 inch.\r\n\r\nThân máy được hoàn thiện từ chất liệu hợp kim Nano Carbon - Magie sang trọng và bền bỉ, tự tin đồng hành cùng bạn trong mọi tình huống.', 1, '2020-11-17 08:51:25'),
(15, 'Điện thoại Samsung Galaxy S20+', 8, 5, 23990000, 'samsung-galaxy-s20-plus-400x460-fix-400x460.png', 'Chiếc điện thoại Samsung Galaxy S20 Plus - Siêu phẩm với thiết kế màn hình tràn viền, hiệu năng đỉnh cao kết hợp cùng nhiều đột phá về công nghệ dẫn đầu thế giới smartphone.\r\nThiết kế màn hình tràn viền, siêu mượt 120 Hz\r\nThiết kế của chiếc điện thoại Samsung Galaxy S20 Plus là kính kết hợp độc đáo giữa với khung kim loại cùng mặt lưng kính cường lực Gorilla Glass 6 thế hệ mới nhất cho khả năng chống chịu trầy xước và va đập tốt. \r\n\r\nSamsung Galaxy S20 Plus | Thiết kế siêu tràn viền\r\n\r\nMàn hình Galaxy S20+ có kích thước 6.7 inch độ phân giải 2K (1440 x 3200 Pixels) sử dụng tấm nền Dynamic AMOLED 2X với khả năng hiển thị màu sắc sắc nét, độ chi tiết cao và sống động.\r\n\r\nKhung máy được hoàn thiện một cách tỉ mỉ, độ chính xác cao với viền màn hình đã được thiết kế cong nhẹ cho cảm giác dễ dàng cầm nắm, không bị cấn tay hay vô tình chạm vào màn hình.\r\n\r\nSamsung Galaxy S20 Plus | Viền màn kim loại\r\n\r\nĐiểm nổi bật trên chiếc điện thoại Samsung Galaxy S20 Plus chính là việc trang bị màn hình Infinity O tràn viền ra bốn cạnh với tỷ lệ diện tích hiển thị lên tới 90.5%.\r\n\r\nTần số quét màn hình lên đến 120 Hz cho cảm giác phản hồi nhanh, dường như không có độ trễ. Người dùng có thể điều chỉnh giữa 60 và 120 Hz để tiết kiệm năng lượng pin cho máy.\r\n\r\nSamsung Galaxy S20 Plus | Thiết kế màn hình 120 Hz\r\n\r\nBên cạnh đó màn hình của máy còn hỗ trợ công nghệ hiển thị HDR10+ mang đến những thước phim giải trí hay những pha hành động combat được tái hiện một cách sống động, chân thực cùng trải nghiệm thao tác siêu mượt mà.\r\n\r\nĐột phá camera sau \r\nGalaxy S20+ được trang bị hệ thống 4 camera sau bao gồm: camera tele 64 MP, camera góc rộng và camera góc siêu rộng 12 MP và cuối cùng cảm biến TOF với chức năng hỗ trợ đo chiều sâu.\r\n\r\nSamsung Galaxy S20 Plus | Đột phá camera sau\r\n\r\nCụm camera sau được thiết kế hơi lồi so với mặt lưng, hỗ trợ các tính năng độc đáo mới được trang bị trên dòng sản phẩm Galaxy S20 như quay video 8K, Space Zoom, Single Take,... người dùng thỏa thích sáng tạo nên nhiều kiệt tác nghệ thuật.\r\n\r\nSamsung Galaxy S20 Plus | Chụp đêm \r\n\r\nĐây cũng là lần đầu tiên Samsung trang bị tính năng quay video chất lượng điện ảnh 8K lên chiếc điện thoại, mang đến những thước phim với độ phân giải đáng kinh ngạc, độ sắc nét sẽ cũng được duy trì ở mức tối đa ngay cả khi video được trình chiếu trên những màn hình lớn.\r\n\r\n\r\nVới độ phân giải lên đến 64MP, việc giữ được độ rõ nét và màu sắc tươi mới cho bức ảnh không thể làm khó được Samsung Galaxy S20+.\r\n\r\nSamsung Galaxy S20+ | 64 MP\r\n\r\nNgoài những công nghệ nổi bật như chúng ta đã nhắc ở trên, Galaxy S20 series còn sở hữu nhiều chế độ và tính năng ấn tượng khác hỗ trợ tối đa khả năng chụp ảnh nâng cao như điều chỉnh ISO, tốc độ màn trập, phơi sáng,... chất lượng hình ảnh sẽ trở nên ấn tượng hơn, đúng ý người dùng hơn.\r\n\r\nSamsung Galaxy S20 Plus | Giao diện chụp ảnh\r\n\r\nTrải nghiệm camera trên chiếc điện thoại cho chuyển chế độ mượt mà giữa các chế độ góc thường, góc siêu rộng. Chất lượng hình ảnh được chụp bằng Samsung Galaxy S20 Plus với màu sắc nét, độ chi tiết cao kết hợp cùng bộ công cụ chỉnh sửa được tích hợp sẵn ngay trên điện thoại, dễ dàng chỉnh sửa ảnh và video để tạo nên những thước phim ấn tượng nhất.\r\n\r\nẢnh chụp góc thường trên Samsung Galaxy S20+\r\nSamsung Galaxy S20+ zoom tối đa 30X\r\nTính năng Single Take của Samsung Galaxy S20+ với khả năng ghi lại nhiều tấm hình trong một lần chụp, điện thoại sẽ sử dụng 3 camera sau để chụp được 14 hình ảnh hoặc quay những video khác nhau, từ đó gợi ý cho người dùng những tấm hình đẹp nhất hay các video vui vẻ với chất lượng cao, có thể chia sẻ ngay mà không cần edit thêm. \r\n\r\n\r\nCamera trước của máy có độ phân giải 10 MP hứa hẹn sẽ cho ra những tấm hình chụp selfie ấn tượng cho bạn tự tin khoe ảnh cùng người thân và gia đình.\r\n\r\nSamsung Galaxy S20 Plus | Camera selfie\r\n\r\nHiệu năng mạnh mẽ, chơi game đỉnh cao\r\nChiếc điện thoại Samsung Galaxy được trang bị con cây nhà lá vườn Samsung mang tên Exynos 990 8 nhân mới nhất, được thiết kế trên quy trình 7 nm hiện đại với xung nhịp cao nhất có thể đạt tới 2.73 GHz.\r\n\r\nSamsung Galaxy S20 Plus | Hiệu năng đỉnh cao\r\n\r\nĐi kèm theo máy mà dung lượng RAM lớn 8 GB cho sự mượt mà hoàn hảo khi chuyển đổi giữa các ứng dụng, bộ nhớ trong của máy cũng không kém phần nổi trội khi được trang bị bộ nhớ trong 128 GB có hỗ trợ thẻ nhớ ngoài lên đến 1T.\r\n\r\nSamsung Galaxy S20 Plus | Khay sim\r\n\r\nHiệu năng mạnh mẽ của máy dễ dàng giúp cho điện thoại chơi game tốt, mượt mà ở mức cấu hình cao nhất cũng như đáp ứng tốt các tác vụ từ cơ bản đến nâng cao, kể cả những hoạt động thực tế ảo VR hay các tựa game 3D yêu cầu mức đồ họa cao.\r\n\r\nSamsung Galaxy S20 Plus | Hiệu năng mạnh mẽ trên Android 10\r\n\r\nMáy được cài đặt sẵn hệ điều hành Android 10 mới nhất tùy biến trên giao diện OneUI 2.0 đẹp mắt, dễ dàng với các thao tác, nâng cao trải nghiệm sử dụng của người dùng.\r\n\r\nJack tai nghe 3.5 mm được loại bỏ hoàn toàn trên Samsung Galaxy S20+, chúng ta sẽ có thể kết nối tai nghe qua cổng USB Type C hiện đại. \r\n\r\nSamsung Galaxy S20 Plus | Trải nghiệm thực tế\r\n\r\nLoa thoại của máy cũng được Samsung làm gần như ẩn bên trong cạnh trên màn hình, cho một thiết kế liền mạnh. Máy có tính năng chống nước, bụi chuẩn IP68, hạn chế hư hỏng do nước và bụi gây ra.\r\n\r\nDung lượng pin lớn, thoải mái trải nghiệm\r\nGalaxy S20 Plus được trang bị viên pin lớn với dung lượng 4.500 mAh cho bạn thỏa sức trải nghiệm suốt ngày dài chỉ với một lần sạc duy nhất, ngoài ra máy còn được hỗ trợ sạc nhanh 25W cho người dùng thêm nhiều giờ trải nghiệm, chỉ trong vài phút sạc.\r\n\r\nSamsung Galaxy S20 Plus | Dung lượng pin lớn\r\n\r\nBên cạnh chức năng sạc truyền thống bằng cổng USB Type C máy còn được trang bị chức năng sạc không dây 15W hay chế độ sạc ngược không dây 9W dễ dàng sạc pin cho các phụ kiện mà không cần phải sử dụng tới sạc dự phòng.\r\n\r\nSamsung Galaxy S20 Plus | Cảm biến vân tay\r\n\r\nMáy còn được trang bị cảm biến vân tay trong màn hình tốc độ nhận diện nhanh và chính xác, bên cạnh đó người dùng có thể mở khóa bằng tính năng nhận diện khuôn mặt với tốc độ mở khóa cũng nhanh không kém.\r\n\r\n\r\nBài viết này có hữu ích cho Bạn không ?\r\n\r\nHữu ích \r\nKhông Hữu ích\r\n', 1, '2020-11-17 08:52:46'),
(16, 'Máy tính bảng iPad Pro 11 inch Wifi Cellular 128GB (2020)', 6, 5, 25490000, 'ipad-pro-11-inch-wifi-cellular-128gb-2020-bac-400x460-400x460.png', 'Đã 2 năm kể từ khi mẫu iPad Pro 2018 ra mắt, mới đây, mẫu iPad Pro mới nhất - iPad Pro 11 inch (2020) vừa được Apple trình làng với nhiều sự cải tiến đáng giá lẫn về tính năng và sức mạnh xử lý, hứa hẹn đây sẽ là mẫu máy tính bảng được săn đón nhiều nhất trong năm 2020.\r\nThiết kế “bình cũ rượu mới” sang trọng đậm chất “Táo”\r\nCó thể thấy rằng, mẫu iPad Pro 2020 11 inch hầu như không có sự khác biệt nhiều so với thế hệ iPad trước đó về mặt thiết kế. ', 1, '2020-11-17 08:54:07'),
(17, 'Máy tính bảng Huawei MediaPad T3 10 (2017)', 9, 4, 3740000, 'huawei-mediapad-t3-10-1-33397-chitiet-400x460.png', 'Huawei MediaPad T3 10 (2017) là chiếc máy tính bảng với màn hình kích thước lớn cùng khe cắm sim tiện lợi giúp người dùng có thể nghe gọi như một chiếc smartphone.\r\nThiết kế mỏng, đẹp\r\nVề tổng thể, máy nổi bật với phần khung viền kim loại sang trọng, kết hợp màu sắc hiện đại cho cảm giác khá thanh lịch, nhẹ nhàng.', 1, '2020-11-17 08:55:26'),
(18, 'Điện thoại Samsung Galaxy A51 (6GB/128GB)', 8, 5, 7490000, 'samsung-galaxy-a51-400x460-new-400x460.png', 'Thiết kế thời thượng, bật cá tính\r\nMáy có thiết kế mỏng nhẹ thuộc hàng top trong phân khúc, chỉ 7.9 mm. Mặt lưng với họa tiết cắt kim cương đa sắc nổi bật, đi kèm là 3 tùy chọn màu sắc sành điệu: Xanh Crush Đa Sắc, Trắng Crush Lấp Lánh, Đen Crush Kim Cương.', 0, '2020-11-17 08:57:08'),
(19, 'Laptop Asus VivoBook X441MA N5000/4GB/1TB/Win10 (GA024T)', 10, 4, 6690000, 'asus-x441ma-ga024t11-191993-600x600.jpg', 'Laptop Asus Vivobook X441MA N5000 là chiếc máy tính xách tay nhỏ gọn được Asus ưu ái trang bị một hệ thống các cổng kết nối đồ sộ cùng một hiệu năng ổn định với CPU Intel Pentium thế hệ 7.\r\nThiết kế nhỏ gọn\r\nDù sở hữu lối thiết kế đơn giản nhưng Asus Vivobook X441MA vẫn mang lại sự sang trọng nhất định đến cho người dùng nhờ việc kết hợp hài hòa giữa 2 màu sắc đen và trắng. Tuy được hoàn thiện từ chất liệu nhựa nhưng máy vẫn đảm bảo độ cứng cáp và đặc biệt trọng lượng máy chỉ là 1.7 kg sẽ khá phù hợp cho những người thường xuyên di chuyển.', 0, '2020-11-17 08:58:08'),
(20, 'Laptop Lenovo IdeaPad S340 14IIL i3 1005G1/8GB/512GB/Win10 (81VV003VVN)', 2, 4, 12990000, 'lenovo-ideapad-s340-14iil-i3-1005g1-8gb-512gb-win1-20-600x600.jpg', 'Lenovo IdeaPad S340 14IIL (81VV003VVN) sở hữu cấu hình khá, hiệu năng ổn định và thiết kế tinh tế đẹp mắt. Đây sẽ là chiếc laptop văn phòng phù hợp với đối tượng sinh viên, dân văn phòng thường xuyên xử lý các tác vụ văn phòng, học tập và chỉnh sửa hình ảnh cơ bản. \r\nHiệu năng ổn định đáp ứng nhu cầu văn phòng và thiết kế cơ bản \r\nLenovo IdeaPad S340 14IIL (81VV003VVN) được trang bị bộ vi xử lý Intel Core i3 Ice Lake thế hệ 10 mới ra mắt với những cải tiến về hiệu năng và tốc độ xử lý so với thế hệ trước cùng với RAM 8 GB mang đến sức mạnh xử lý tốt các tác vụ học tập, văn phòng cơ bản và xử lý hình ảnh vừa phải trên các ứng dụng Photoshop, AI,... ', 1, '2020-11-17 08:59:03'),
(21, 'Điện thoại Samsung Galaxy A51 (8GB/128GB)', 8, 5, 8390000, 'samsung-galaxy-a51-8gb-blue-400x460-1-400x460.png', 'Galaxy A51 8GB là phiên bản nâng cấp RAM của smartphone tầm trung đình đám Galaxy A51 từ Samsung. Sản phẩm nổi bật với thiết kế sang trọng, màn hình Infinity-O cùng cụm 4 camera đột phá. sản phẩm cũng là Smartphone Android Bán Chạy Nhất Thế Giới Quý 1/2020 (theo báo cáo từ Strategy Analytics).\r\nMàn hình tràn viền Infinity-O thời thượng\r\nMặt trước của Galaxy A51 8GB nổi bật với màn hình tràn viền vô cực Infinity-O kế thừa từ series S, Note cao cấp. ', 1, '2020-11-17 09:00:04'),
(22, 'Điện thoại iPhone 11 Pro Max 64GB', 6, 5, 29990000, 'iphone-11-pro-max-black-400x460s.png', 'Trong năm 2019 thì chiếc smartphone được nhiều người mong muốn sở hữu trên tay và sử dụng nhất không ai khác chính là iPhone 11 Pro Max 64GB tới từ nhà Apple.\r\nCamera được cải tiến mạnh mẽ\r\nChắc chắn lý do lớn nhất mà bạn muốn nâng cấp lên iPhone 11 Pro Max chính là cụm camera mới được Apple nâng cấp rất nhiều.', 1, '2020-11-17 09:01:00'),
(23, 'Apple Watch S6 LTE 40mm viền nhôm dây cao su\r\n', 6, 3, 14391000, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-ava-600x600.jpg', 'Kiểu dáng năng động, cá tính\r\nApple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu màn hình 1.57 inch giúp hiển thị đầy đủ thông tin và hình ảnh sắc nét. Dây đeo được làm từ chất liệu cao su dẻo dai và êm ái, cho cảm giác dễ chịu khi mang. Thêm vào đó, mặt kính cường lực Sapphire giúp chống trầy, tăng độ bền cho thiết bị. Các đường nét được thiết kế tinh xảo làm nên sự đẳng cấp của Apple Watch.\r\n\r\nApple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu thiết kế hiện đại\r\n\r\nĐồng hồ thông minh Apple sở hữu chip S6 cho hiệu năng vượt bậc\r\nNhờ có bộ xử lý S6 hoàn toàn mới, đồng hồ đạt hiệu năng cao hơn 20% so với dòng chip S5 thế hệ trước, đây được coi là bước nhảy vọt về phần cứng của dòng Apple Watch.\r\n\r\nApple Watch S6 LTE 40mm viền nhôm dây cao su sở hữu bộ chip xử lý cho hiệu năng cao\r\n\r\nHệ điều hành watchOS 7.0 đem đến nhiều tính năng mới\r\nVới các tính năng mới như: Family Setup, nhận biết rửa tay, chia sẻ màn hình qua iMessages, Siri dịch nhanh 10 ngôn ngữ, 7 loại mặt đồng hồ mới, fitness ... nhờ đó, hệ điều hành WatchOS 7.0 này sẽ giúp Apple Watch S6 trở nên hoàn hảo hơn.\r\n\r\nApple Watch S6 LTE 40mm viền nhôm dây cao su sử dụng hệ điều hành watchOS 7\r\n\r\nCảm biến SpO2 giúp theo dõi nồng độ oxy trong máu\r\nApple Watch 2020 được trang bị cảm biến SpO2 hỗ trợ người dùng theo dõi nồng độ oxy trong máu định kỳ, ngay cả khi bạn đang ngủ. Bên cạnh đó, thiết bị này còn được hỗ trợ đo điện tâm đồ ECG giúp bạn chăm sóc sức khỏe của mình tốt hơn.', 0, '2020-11-17 09:01:41'),
(259, 'Điện thoại Xiaomi Redmi Note 9', 14, 5, 4790000, '1608133484xiaomi-redmi-note-9-den-600x600-600x600.jpg', 'Xiaomi Redmi Note 9 là mẫu smartphone tầm trung, cân bằng giữa các yếu tố thiết kế, camera và hiệu năng, đáp ứng mượt mà hầu hết các nhu cầu từ cơ bản đến nâng cao của người dùng.\r\nMàn hình nốt ruồi tràn viền thời thượng\r\nChiếc điện thoại tầm trung Xiaomi Redmi Note 9 sở hữu thiết kế bo cong mềm mại ở các cạnh, cho trải nghiệm dễ cầm nắm và đằm tay hơn. Mặt sau vẫn được làm nổi bật và dễ nhận biết từ xa với cụm camera nổi bật, đặc trưng của dòng Redmi Note năm nay.', 1, '2020-12-16 15:44:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prototypes`
--

CREATE TABLE `prototypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prototypes`
--

INSERT INTO `prototypes` (`type_id`, `type_name`) VALUES
(1, 'Loa'),
(2, 'Tai nghe'),
(3, 'Đồng hồ'),
(4, 'Laptop'),
(5, 'Điện Thoại'),
(6, 'Máy Tính Bảng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `permission`) VALUES
(6, 'admin', '$2y$10$oCyMN1.Tiozw6v6VufSaBeMyfwkEt64FAJVnhNh34k.tg/MMh82Iy', 9),
(17, 'user', '$2y$10$QVUeLR2UTqG2dqtKwQ/y3.uDFy8yRBq/9hwBWoxcB43D2321We17K', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK01` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_products` (`manu_id`),
  ADD KEY `FK02_Products` (`type_id`);

--
-- Chỉ mục cho bảng `prototypes`
--
ALTER TABLE `prototypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT cho bảng `prototypes`
--
ALTER TABLE `prototypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK01` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
