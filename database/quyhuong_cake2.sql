-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 03:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quyhuong_cake2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `id_cus` int(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `total_money` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `id_cus`, `date`, `total_money`, `updated_at`, `created_at`) VALUES
(1, 1, '0000-00-00', 200000, '2021-03-27 09:41:01', '2021-03-27 09:41:01'),
(2, 1, '0000-00-00', 20000, '2021-03-27 09:44:59', '2021-03-27 09:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total_price` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 NOT NULL,
  `permission` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `address`, `phone`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'an', '12', 'Nguyễn An', 'Trại Cau', '051645873', 0, '2021-03-15 19:33:31', '2021-03-15 19:33:31'),
(2, 'binh', '23', 'Hoàng Văn Bình', 'Đường CMT8', '015845216', 0, '2021-03-15 19:33:31', '2021-03-15 19:33:31'),
(3, 'ngoc123', '12', 'Trịnh Ngọc', 'Chùa Hang', '0254336', 0, '2021-03-28 02:23:25', '2021-03-28 02:23:25'),
(4, 'thanh', '1', 'Nguyễn Thành', 'Đồng Hỷ', '05162453', 0, '2021-03-27 09:57:53', '2021-03-27 09:57:53'),
(20, 'ss', '1', 'Nguyễn Thanh Tùng', 'Trại Cau', '123456889', 0, '2021-03-28 03:01:48', '2021-03-28 03:01:48'),
(22, 'trinhngoc00', '1', 'Trịnh Hồng Ngọc', '162 Đường Phan Đình Phùng', '03258315', 0, '2021-03-28 03:16:51', '2021-03-28 03:16:51'),
(26, 'trinhngoc000', '1', 'Trịnh Hồng Ngọc', '162 Đường Phan Đình Phùng', '1234567889', 0, '2021-04-01 13:21:40', '2021-04-01 13:21:40'),
(27, 'admin', 'admin', '', '', '', 10, '2021-04-02 02:59:34', '2021-04-02 02:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `id_type` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `amount` int(10) DEFAULT 0,
  `price` int(10) DEFAULT NULL,
  `price_sale` int(10) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_type`, `name`, `amount`, `price`, `price_sale`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chocolate & Strawberry charlotte', 5, 300000, 280000, 'gato1.jpg', 'Đây là loại bánh ngọt được làm chủ yếu từ phô mai, tạo vị béo ngậy. Phía trên người ta có thể phủ thêm mứt. Chiếc bánh pho mát kem được làm từ những năm 1800 và trở thành một trong những món bánh quen thuộc của người dân New York.', '2021-03-17 01:15:47', '2021-03-17 01:15:47'),
(2, 1, 'AMERICAN CHEESE cake', 4, 300000, 0, 'gato2.jpg', 'Bánh gồm các lớp bánh quy Savoiardi nhúng cà phê xen kẽ với hỗn hợp trứng, đường, phô mai mascarpone đánh bông, bột cacao. ', '2021-03-17 01:15:47', '2021-03-17 01:15:47'),
(3, 1, 'Cheese trà xanh', 5, 250000, 200000, 'gato4.jpg', 'Đây là một kiểu bánh có nguồn gốc từ Đức với tên gốc là Schwarzwälder Kirschtorte. Nó bao gồm nhiều lớp bánh chocolate sponge, phủ váng sữa đánh tơi, maraschino cherry và chocolate bào mỏng.', '2021-03-17 01:17:26', '2021-03-17 01:17:26'),
(4, 1, 'Dark chocolate cake', 4, 300000, 0, 'gato2.jpg', 'Một chiếc Victoria Sponge truyền thống gồm mứt và lượng kem nhiều gấp đôi. Bánh thường được dùng trong tiệc trà chiều của người Anh.', '2021-03-17 01:17:26', '2021-03-17 01:17:26'),
(5, 1, 'Bitter chocolate mouse', 4, 300000, 0, 'gato3.jpg', 'banhSinhNhat', '2021-03-17 01:17:26', '2021-03-17 01:17:26'),
(6, 2, 'Bánh sinh nhật trẻ em', 5, 250000, 230000, 'kid1.jpg', 'treEm', '2021-03-17 01:23:14', '2021-03-17 01:23:14'),
(7, 2, 'Bánh sinh nhật trẻ em', 3, 220000, 0, 'kid2.jpg', 'treEm', '2021-03-17 01:23:14', '2021-03-17 01:23:14'),
(8, 2, 'Bánh sinh nhật trẻ em', 5, 250000, 0, 'kid3.jpg', 'treEm', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(9, 2, 'Bánh sinh nhật trẻ em', 3, 220000, 0, 'kid4.jpg', 'treEm', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(10, 2, 'Bánh sinh nhật trẻ em', 3, 220000, 0, 'kid5.jpg', 'treEm', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(11, 3, 'Bánh sinh nhật 2 tầng', 3, 320000, 290000, '2tang1.jpg', 'haiTang', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(12, 3, 'Bánh sinh nhật 2 tầng', 3, 220000, 0, '2tang2.jpg', 'haiTang', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(13, 4, 'Socola trái tim', 3, 100000, 90000, 'socola1.jpg', 'socola', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(14, 4, 'Socola trái tim', 3, 220000, 0, 'socola2.jpg', 'socola', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(15, 4, 'Socola chữ nhật', 3, 220000, 0, 'socola3.jpg', 'socola', '2021-03-17 01:23:40', '2021-03-17 01:23:40'),
(16, 4, 'Socola 4', 4, 10000, 0, 'socola4.jpg', 'socola', '2021-03-18 02:35:00', '2021-03-18 02:35:00'),
(17, 4, 'Socola 5', 5, 10000, 0, 'socola5.jpg', 'socola', '2021-03-18 02:36:13', '2021-03-18 02:36:13'),
(18, 4, 'Socola 6', 2, 10000, 0, 'socola6.jpg', 'socola', '2021-03-18 02:36:29', '2021-03-18 02:36:29'),
(19, 7, 'BÁNH BIG PALMIER', 10, 20000, 0, 'ngot1.jpg', 'Lớp bông lan thêm mềm bên dưới kèm theo chà bông và trứng muối bên trên vừa tạo độ ngọt vừa phải vừa tạo độ mặn mà cho bánh.', '2021-03-18 20:08:51', '2021-03-18 20:08:51'),
(20, 7, 'BÁNH BUTTER RAISINS', 20, 22000, 0, 'ngot2.jpg', 'Bánh mì được xem là đặc sản, một trong các loại bánh ngon Việt Nam. Ngoài bánh mì thịt, bánh mì bơ thì các loại bánh mì ngọt cũng được ưa chuộng và bày bán tại các cửa hàng bán bánh ngọt.', '2021-03-18 20:08:56', '2021-03-18 20:08:56'),
(21, 7, 'BÁNH CAKE CHUỐI', 25, 25000, 0, 'ngot3.jpg', 'Bánh quy với đủ loại nhân có thể được tìm thấy trong các tiệm bánh trên khắp Nam Mỹ.', '2021-03-18 20:09:21', '2021-03-18 20:09:21'),
(22, 7, 'BÁNH CAKE DỨA', 15, 8000, 0, 'ngot4.jpg', 'Bột strudel truyền thống bọc xung quanh nhân táo ngọt với vụn bánh mì nướng bơ, nho khô và đôi khi cả hạt óc chó', '2021-03-18 20:09:24', '2021-03-18 20:09:24'),
(23, 7, 'BÁNH DELICACY COCONUT CAKE', 14, 10000, 0, 'ngot5.jpg', 'Bánh nhân sirô mật ong và lạc xay, cắt thành miếng hình quả trám và đặt trong các khay lớn. Đây là một di sản ngọt ngào', '2021-03-18 20:09:38', '2021-03-18 20:09:38'),
(24, 7, 'BÁNH DONUT CHOCOLATE', 31, 35000, 30000, 'ngot6.jpg', 'Bánh chocolate tròn phủ sirô anh đào, thêm rượu anh đào chua và xếp lớp với kem tươi và anh đào tươi', '2021-03-18 20:09:54', '2021-03-18 20:09:54'),
(25, 7, 'BÁNH DONUT ĐƯỜNG', 3, 5000, 0, 'ngot7.jpg', 'Bột crafeh vàng, giòn, bọc xung quanh nhân hạt baklava.', '2021-03-18 20:10:00', '2021-03-18 20:10:00'),
(26, 6, 'BLUEBERRY CAKE', 2, 300000, 0, 'gato8.png', 'Bánh có vị ngọt dịu nhẹ, gồm nhiều lớp bánh được làm từ bánh mì và bánh sữa chocolate, xen lẫn giữa các lớp bánh là mứt mơ. ', '2021-03-18 21:07:54', '2021-03-18 21:07:54'),
(27, 6, 'COCO LOVE CAKE', 0, 270000, 250000, 'qua2.jpg', 'Món bánh chocolate này nổi tiếng và thành phố Vienna đã ấn định tổ chức một ngày Sachertorte quốc gia, vào ngày 5/12 hàng năm.', '2021-03-18 21:07:58', '2021-03-18 21:07:58'),
(28, 6, 'COCONUT & STRAWBERRY CHARLOTTE', 0, 250000, 0, 'qua3.jpg', 'Vẻ ngoài của Swedish Princess ngọt ngào như chính tên gọi của mình. Đây là món bánh ngọt truyền thống của Thụy Điển được rất nhiều người yêu thích. Ban đầu, bánh được làm để phục vụ hoàng gia, được làm từ mứt, trứng, sữa, kem và cốt bánh bông lan, bao phủ', '2021-03-18 21:08:04', '2021-03-18 21:08:04'),
(29, 6, 'FRUIT DELICACY CAKE', 0, 230000, 200000, 'qua4.jpg', 'Bánh bao gồm lớp ruột tơi xốp, mềm mịn làm từ bột và trứng, được phủ chocolate bóng bẩy bên ngoài và rắc dừa xung quanh.', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(30, 6, 'GREEN TEA CAKE', 0, 320000, 0, 'qua5.jpg', 'Đây là món ăn đơn giản, quen thuộc nhưng rất được yêu thích của người Pháp và thường được gọi với tên bánh con sò, được làm từ bột, đường, bơ và sữa. ', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(31, 6, 'HAPPY ANGEL CAKE', 0, 250000, 0, 'qua6.jpg', 'Là món ăn truyền thống trong ngày Tết được người Nhật yêu thích, món bánh này tượng trưng cho sự may mắn và thịnh vượng trong năm mới. Nhân bánh có thể được làm từ đậu đổ, đậu trắng hoặc dâu tây hay một số loại hoa quả khác kết hợp với đậu đỏ. Lớp vỏ bên ', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(32, 7, 'HAWAII MOUSSE CAKE PIECE', 10, 20000, 0, 'small1.jpg', 'Dorayaki nghe có vẻ khá lạ lẫm nhưng nếu nói Bánh rán thì đây lại là món bánh vô cùng quen thuộc với các fan truyện tranh tại Việt Nam. Món bánh rán này đã trở thành huyền thoại đối với các fan của chú mèo máy Doraemon trên toàn thế giới.', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(33, 7, 'MANGO CHEESE CAKE PIECE', 10, 15000, 12000, 'small6.jpg', 'Bánh rán là loại bánh cổ truyền của Nhật Bản. Nó có hình dáng giống như bánh bao, bao gồm 2 lớp vỏ bánh tròn dẹt làm từ bột, phết mật ong, được nướng lên và bao lấy nhân thường làm từ bột nhão đậu đỏ. ', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(34, 7, 'TIRAMISSU CAKE PIECE', 8, 22000, 0, 'small2.jpg', 'Ngày nay người ta có thể làm nhiều loại nhân (chocolate, chuối, đậu đen...) nhưng nhân đậu đỏ là loại nhân đặc trưng nhất. Một số nơi tại Nhật bản như ở vùng Kansai, Osaka hay Nara, loại bánh này thường được gọi là Mikasa.', '2021-03-18 21:08:54', '2021-03-18 21:08:54'),
(35, 7, 'PASSION & VANILLA CAKE PIECE', 5, 25000, 0, 'small3.jpg', 'Đây là một loại bánh ngọt của Pháp, bánh được làm từ lòng trắng trứng, đường bột, đường cát, bột hạnh nhân và một ít phẩm màu tự nhiên.', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(36, 7, 'STRAWBERRY & MANGO CAKE PIECE', 8, 11000, 0, 'small4.jpg', 'Nhân bánh thường là mứt, chocolate hoặc kem bơ kẹp ở giữa.Bánh macaron nổi bật với những hương vị truyền thống như mâm xôi, chocolate và những hương vị mới như nấm và trà xanh.', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(37, 7, 'CHOUX CREAM DÀI', 15, 8000, 7000, 'small5.jpg', 'Bánh Pandan còn có tên gọi khác là bánh bông lan lá dứa. Bánh có màu xanh tự nhiên đẹp mắt, mùi thơm của lá dứa và mềm mịn, tơi xốp nhưng cũng không quá ngọt.', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(38, 1, 'MOKA CAKE', 0, 150000, 0, 'sinhnhat1.jpg', 'Đây là món bánh rất nổi tiếng ở Singapore, thường được nhiều du khách mua về làm quà.   ', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(39, 1, 'BITTER CHOCOLATE MOUSSE', 0, 170000, 0, 'sinhnhat2.jpg', 'Đây là một món ăn có mặt khắp phố phường của Brazil. Bánh được làm với lớp bột mì cán mỏng nướng giòn, khi ăn sẽ kẹp với kem, chuối, pho mát, chocolate.', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(40, 1, 'OPERA MATCHA CAKE', 0, 200000, 170000, 'sinhnhat3.jpg', 'Khi cho một miếng Tapioca vào miệng, bạn sẽ cảm nhận được một hương vị rất lạ với phần nhân bánh rất mềm, vỏ bánh cùng vị chocolate dịu nhẹ.', '2021-03-18 21:08:57', '2021-03-18 21:08:57'),
(41, 1, 'TROPICAL FOREST CAKE', 0, 190000, 0, 'sinhnhat4.jpg', 'Loại bánh này được làm từ lòng trắng trứng đánh bông với đường, bên ngoài là lớp vỏ cứng nhưng xốp, bên trong là lớp kẹo dẻo. Bánh hay được ăn kèm với kem tươi đánh bông và hoa quả tươi, các loại quả dâu, kiwi...', '2021-03-18 21:09:21', '2021-03-18 21:09:21'),
(50, 1, 'BITTER CHOCOLATE MOUSSE', 0, 250000, NULL, 'sinhnhat4.jpg', 'Bánh gồm 3 lớp bánh chocolate và 3 lớp kem tươi phomai.', '2021-03-24 16:18:35', '2021-03-24 16:18:35'),
(52, 1, 'Chocolate & Strawberry charlotte', 2, 200000, 180000, 'gato4.jpg', 'Bánh táo với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', '2021-04-07 13:32:39', '2021-04-07 13:32:39'),
(53, 1, 'Chocolate & Strawberry charlotte', 2, 200000, 180000, 'gato4.jpg', 'Món bánh ngọt tráng miệng nhẹ nhàng này được làm từ những chiếc bánh giống như bánh choux nhúng chocolate được phủ đầy kem tươi đánh và caramel.', '2021-04-07 13:33:13', '2021-04-07 13:33:13'),
(54, 1, 'BÁNH PHÚC BỒN TỬ & SỮA CHUA', 0, 220000, NULL, 'gato6.png', 'Gateau St. Honore được đặt theo tên một vị thánh nghề bánh và có xuất sứ từ Pháp nhưng bạn hãy thử loại bánh này ở Bỉ vì nó rất ngon.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(55, 1, 'BLUEBERRY CAKE', 1, 250000, NULL, 'gato7.png', 'Những chiếc bánh nhân trái cây đến từ miền Nam Hà Lan này có kết cấu mềm, đơn giản và thường làm từ hỗn hợp trứng, sữa và một ít bánh quy.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(56, 1, 'COCO LOVE CAKE', 2, 280000, NULL, 'gato8.png', 'Vỏ bánh Limburg Pie không giòn. Nó hơi giống với bánh mì nhưng vẫn cho ta một hương vị rất cao cấp”. ', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(57, 1, 'COCONUT & CARAMEL MOUSE', 1, 260000, NULL, 'gato9.png', 'Vỏ của chiếc bánh tart nhỏ bé này được làm từ chocolate ganache đen, hạt hạnh nhân nghiền nhuyễn trong khi bề mặt của chiếc bánh được phủ một lớp đường đông lạnh màu xanh ngọc rất bắt mắt.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(58, 1, 'COCONUT & STRAWBERRY CHARLOTTE', 2, 240000, NULL, 'gato10.png', 'Bọc ngoài là lớp vỏ bánh mỏng, bên trong đa dạng các loại nhân từ phô mai, chocolate, trà xanh,... Bạn có thể tận hưởng hương vị giòn tan, béo ngậy từ miếng đầu tiên.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(59, 1, 'CRISPYNUTS CHEESE CAKE', 0, 300000, NULL, 'gato11.png', 'Nhân bánh phô mai béo ngậy rất thích hợp với người thích ngọt và thích béo.Bánh nhân trà xanh thì thơm và có vị đắng nhẹ. Bạn có thể dễ dàng chọn loại nhân mình yêu thích để nếm thử.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(60, 1, 'DARK CHOCOLATE CAKE', 1, 200000, NULL, 'gato12.png', 'Một chiếc bánh cupcake là một chiếc bánh nhỏ được thiết kế để phục vụ một người. Bên dưới lót giấy hoặc cốc nhôm dùng để nướng bánh và được trang trí bằng kem tươi, mứt hoặc trái cây. ', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(61, 1, 'DOUBLE CHEESE CAKE', 1, 220000, 200000, 'gato13.png', 'Lớp bánh mềm xốp bên dưới hòa quyện với độ ngọt của mứt bên trên hòa quyện ra mùi vị tuyệt vời.', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(62, 1, 'FANCY NUTS CHOCOLATE CAKE\r\n', 0, 225000, NULL, 'gato14.png', 'Nguyên liệu làm bánh từ bột, trứng, sữa và kẹp nhân bên trong đậu đỏ hoặc các loại đậu khác tùy theo sở thích người dùng. ', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(63, 1, 'GREEN TEA CAKE', 1, 180000, NULL, 'gato15.png', 'Vỏ ngoài mềm mịn kèm thêm nhân đậu đỏ dụ hoặc rất được nhiều người ưa chuộng. ', '2021-04-09 02:11:03', '2021-04-09 02:11:03'),
(64, 9, 'Bánh sự kiện 1', 0, 270000, NULL, 'event1.jpg', 'Hay còn được gọi là bánh mì nhanh. Nhiều người thường nhầm lẫn bánh Muffin với bánh cupcake vì kích thước và hình dáng bên ngoài giống nhau.', '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(65, 9, 'Bánh sự kiện 2', 0, 280000, NULL, 'event2.jpg', 'Sự hòa quyên độc đáo của lớp bông lan mềm mại, kem tươi béo ngậy và hoa quả tráng miệng hoặc kẹo ngọt làm nhiều người mê mẩn và đắm chìm trong sự ngọt ngào của nó.', '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(66, 9, 'Bánh sự kiện 3', 0, 300000, NULL, 'event3.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(67, 9, 'Bánh sự kiện 4', 0, 320000, NULL, 'event4.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(68, 9, 'Bánh sự kiện 5', 0, 330000, NULL, 'event5.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(69, 9, 'Bánh sự kiện 6', 0, 350000, NULL, 'event6.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(70, 9, 'Bánh sự kiện 7', 0, 270000, NULL, 'event7.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(71, 9, 'Bánh sự kiện 8', 0, 230000, NULL, 'event8.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(72, 3, 'Bánh nhiều tầng 1', 0, 400000, NULL, '2tang3.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(73, 3, 'Bánh nhiều tầng 2', 0, 300000, NULL, '2tang4.jpg', NULL, '2021-04-09 02:44:46', '2021-04-09 02:44:46'),
(74, 3, 'Bánh nhiều tầng 3', 0, 300000, NULL, '2tang5.jpg', NULL, '2021-04-09 02:47:48', '2021-04-09 02:47:48'),
(75, 7, 'BÁNH GATO CUỘN', 10, 30000, NULL, 'small7.jpg', 'Tuy nhiên, muffin bản chất nó được làm giống bánh mì nên nguyên liệu bột làm bánh khác với cupcake. Bột bánh muffin không cần ủ mà có thể chế biến trực tiếp nên không có độ mềm và bồng bềnh như bánh cupcake.  ', '2021-04-09 02:47:48', '2021-04-09 02:47:48'),
(76, 7, 'MILLEFEUILLE FONDANT', 20, 35000, NULL, 'small8.jpg', 'bánh muffin dễ ăn dễ làm điểm tâm, bữa sáng hoặc quà tặng cho người thân.', '2021-04-09 02:47:48', '2021-04-09 02:47:48'),
(77, 7, 'MILLEFEUILLE TÁO', 16, 34000, NULL, 'small9.jpg', 'Hay còn được gọi là bánh kếp tầng. Nguyên liệu làm bánh được làm từ bột, trứng, sữa và bơ được nướng hoặc rán trên chảo. Chính vì vậy, bánh còn giữ được mùi đặc trưng của bơ sữa. ', '2021-04-09 02:47:48', '2021-04-09 02:47:48'),
(78, 7, 'TART HẠNH NHÂN', 11, 30000, NULL, 'small10.jpg', 'Đặc biệt, loại bánh này thường được xếp tầng rồi phủ sốt caramel, chocolate,mứt hoa quả... cắt tầng và nếm được hương vị hòa quyện giữa tầng tầng lớp bánh.', '2021-04-09 02:47:48', '2021-04-09 02:47:48'),
(79, 7, 'bánh ngọt', 1, 20000, 0, 'brand_img1.PNG', 'Nguyên liệu làm bánh bao gồm các lớp bánh quy Savoiardi, nhúng cà phê xen kẽ với hỗn hợp trứng, đường, phô mai mascarpone đánh bông, thêm một ít bột cacao. ', '2021-04-12 03:24:04', '2021-04-12 03:24:04'),
(80, 7, 'bánh ngọt 1', 10, 30000, 0, 'small5.jpg', 'Công thức bánh này được biến tấu thành nhiều món bánh và món tráng miệng khác nhau.', '2021-04-12 16:11:18', '2021-04-12 16:11:18'),
(81, 7, 'bánh ngọt 2', 10, 30000, 0, 'small5.jpg', 'Nhâm nhi tách cafe buổi chiều thêm miếng điểm tâm tiramisu làm cho buổi trà chiều của bạn thêm hoàn hảo.', '2021-04-12 16:12:33', '2021-04-12 16:12:33'),
(82, 7, 'bánh ngọt 3', 10, 30000, 0, 'small5.jpg', 'Được biến tấu từ kem tươi, phô mai và lớp mứt hoa quả chua ngọt, bánh cheesecake khá thích hợp với những người béo. ', '2021-04-12 16:13:41', '2021-04-12 16:13:41'),
(83, 7, 'bánh ngọt 5', 1, 10000, 0, 'gato21.png', 'Đặc biệt loại bánh này có rất nhiều lớp,  lớp chính, cũng là lớp dày nhất, bao gồm một hỗn hợp gồm pho mát tươi và mềm, trứng, và đường. ', '2021-04-12 16:22:35', '2021-04-12 16:22:35'),
(84, 7, 'bánh ngọt 10', 1, 10000, 0, 'event3.jpg', 'Nếu bánh có lớp đế thì lớp này thường bao gồm một lớp vỏ hoặc bánh vụn, graham crackers, pastry, hoặc sponge cake.', '2021-04-12 16:44:37', '2021-04-12 16:44:37'),
(85, 7, 'bánh ngọt 44', 1, 10000, 0, '2tang1.jpg', 'Chiếc bánh rán tròn tròn được bọc sốt bên trên tạo cảm giác thèm ăn. Bên cạnh đó, donut có rất nhiều topping đi kèm.', '2021-04-12 16:48:18', '2021-04-12 16:48:18'),
(86, 7, 'bánh ngọt 45', 1, 10000, 0, 'donut2.jpg', 'Bạn có thể lựa chọn loại topping mình yêu thích để ăn kèm chung với bánh. Giá thành không cao thường bán theo khẩu phần 4-6 cái, bạn có thể mua để ăn vặt hoặc làm quà tặng biếu khách.', '2021-04-12 17:33:41', '2021-04-12 17:33:41'),
(87, 2, 'bánh ngọt 11111', 1, 200000, 0, 'donut2.jpg', '', '2021-04-17 08:53:06', '2021-04-17 08:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(10) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bánh gato', '2021-03-27 09:22:14', '2021-03-27 09:22:14'),
(2, 'Bánh gato trẻ em', '2021-03-27 09:23:13', '2021-03-27 09:23:13'),
(3, 'Bánh gato nhiều tầng', '2021-03-27 09:23:13', '2021-03-27 09:23:13'),
(4, 'Socola', '2021-03-27 09:23:47', '2021-03-27 09:23:47'),
(6, 'Bánh gato hoa quả', '2021-03-27 09:24:46', '2021-03-27 09:24:46'),
(7, 'Bánh miếng nhỏ', '2021-03-27 09:24:46', '2021-03-27 09:24:46'),
(8, 'Bánh tiramisu', '2021-03-27 09:59:02', '2021-03-27 09:59:02'),
(9, 'Bánh sự kiện', '2021-04-09 02:35:01', '2021-04-09 02:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cus` (`id_cus`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f4` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `f1` FOREIGN KEY (`id_cus`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
