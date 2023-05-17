-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2023 lúc 06:16 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, NULL),
(5, 5, NULL, NULL),
(6, 6, '2022-08-16 09:50:10', '2022-08-16 09:50:10'),
(7, 7, NULL, NULL),
(8, 8, NULL, NULL),
(13, 13, '2023-05-06 11:28:23', '2023-05-06 11:28:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_product`
--

CREATE TABLE `cart_product` (
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_product`
--

INSERT INTO `cart_product` (`cart_id`, `product_id`, `product_amount`, `created_at`, `updated_at`) VALUES
(2, 44, 1, NULL, NULL),
(7, 38, 1, NULL, '2023-05-03 17:00:00'),
(7, 39, 1, NULL, NULL),
(7, 44, 1, NULL, NULL),
(8, 38, 3, NULL, NULL),
(8, 44, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Chống nắng', 1, NULL, '2023-05-05 17:00:00'),
(2, 'Trang điểm', 1, NULL, '2023-04-29 17:00:00'),
(3, 'Dưỡng da', 1, NULL, '2023-04-29 17:00:00'),
(4, 'Chăm sóc tóc và cơ thể', 1, NULL, '2023-04-29 17:00:00'),
(5, 'Mặt nạ', 1, NULL, '2023-04-29 17:00:00'),
(6, 'Khác', 0, NULL, '2023-04-29 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_notifies`
--

CREATE TABLE `email_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email_notifies`
--

INSERT INTO `email_notifies` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Thông báo chương trình giảm giá nhân dịp ngày 20/5 dành cho mọi quý khách', 'Chương trình giảm giá đặc biệt trong năm 2023 cho mọi khách hàng có hóa đơn mua hàng từ 200000', '2023-05-05 17:00:00', NULL),
(2, 'Thông báo Innisfree', 'Innisfree mới khai trương thêm một chi nhánh tại Vincom Ha Dong', '2023-05-05 17:00:00', NULL),
(3, 'Thông báo bảo trì trang web', '<p>Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận Email này xác nhận thành công</p>', '2023-05-05 17:00:00', NULL),
(4, 'Những lưu ý cho quý khách sử dụng sản phẩm B5', '<p>Vitamin B5 (gọi tắt là B5) với dạng phổ biến là Panthenol và được đánh giá là một thành phần chăm sóc và phục hồi da toàn diện. Bài viết hôm nay sẽ giúp bạn hiểu rõ hơn về Vitamin B5 cũng như&nbsp;<a href=\"https://paulaschoice.vn/cac-thanh-phan-ket-hop-voi-b5.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"các thành phần kết hợp với B5\"><strong>các thành phần kết hợp với B5</strong></a>&nbsp;cho làn da sáng khỏe, mịn màng.</p>', '2023-05-06 17:00:00', NULL),
(5, '', '<p>Vitamin B5 (gọi tắt là B5) với dạng phổ biến là Panthenol và được đánh giá là một thành phần chăm sóc và phục hồi da toàn diện. Bài viết hôm nay sẽ giúp bạn hiểu rõ hơn về Vitamin B5 cũng như&nbsp;<a href=\"https://paulaschoice.vn/cac-thanh-phan-ket-hop-voi-b5.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"các thành phần kết hợp với B5\"><strong>các thành phần kết hợp với B5</strong></a>&nbsp;cho làn da sáng khỏe, mịn màng.</p>', '2023-05-06 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 7, NULL, NULL),
(13, 13, '2023-05-06 11:28:23', '2023-05-06 11:28:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite_product`
--

CREATE TABLE `favorite_product` (
  `favorite_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite_product`
--

INSERT INTO `favorite_product` (`favorite_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 27, NULL, NULL),
(7, 28, NULL, NULL),
(7, 44, NULL, NULL),
(7, 39, NULL, NULL),
(7, 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_07_13_185200_create_authors_table', 1),
(5, '2022_07_13_185320_create_orders_table', 1),
(6, '2022_07_13_185347_create_suppliers_table', 1),
(7, '2022_07_13_185448_create_news_table', 1),
(8, '2022_07_20_160414_create_categories_table', 1),
(9, '2022_07_20_160547_create_carts_table', 1),
(10, '2022_07_20_161203_create_products_table', 1),
(11, '2022_07_20_162552_create_order_product_table', 1),
(12, '2022_07_20_162734_create_cart_product_table', 1),
(13, '2022_08_02_143023_add_user_phone_to_users', 2),
(14, '2023_04_16_101915_create_favorites_table', 3),
(15, '2023_04_30_150242_add_product_manual_to_products', 4),
(16, '2023_04_30_153311_create_favorites_table', 5),
(17, '2023_04_30_174137_add_product_origin_to_products', 6),
(18, '2023_04_30_174607_add_product_use_note_to_products', 7),
(19, '2023_05_01_133731_add_product_expiry_table', 8),
(20, '2023_05_06_091506_create_email_notifies_table', 9),
(21, '2023_05_07_091441_add_news_image_to_news_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `news_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_description`, `news_content`, `active`, `created_at`, `updated_at`, `news_image`) VALUES
(1, 'Giải đáp: Da nhạy cảm có nên dùng Vitamin C không?', 'Nhắc tới các hoạt chất làm sáng và đồng đều màu da, Vitamin C là một ứng cử viên sáng giá. Thế nhưng không ít người lại cho rằng đây là một thành phần khá “kén da” bởi vẫn xảy ra tình trạng mẩn đỏ, kích ứng trên da khi sử dụng thành phần này. Vậy da nhạy cảm có nên dùng Vitamin C không? Cách chăm sóc da với Vitamin C thế nào là khoa học nhất?', '', 1, '2023-05-07 13:00:28', NULL, 'da-nhay-cam-co-nen-dung-vitamin-c-1.png'),
(2, 'Độ pH là gì? Độ pH trong sản phẩm chăm sóc da quan trọng như thế nào?', 'Bạn có biết, độ pH của công thức mỹ phẩm cần đảm bảo tương thích với độ pH tự nhiên của da thì mới có thể phát huy tối đa hiệu quả mà không ảnh hưởng đến sức khỏe làn da? Mặc dù vấn đề về độ pH không thường xuyên được đề cập nhưng hiểu rõ và hiểu đúng về yếu tố này là điều không thể bỏ qua nếu muốn sở hữu diện mạo làn da rạng rỡ. Hãy cùng Paula’s Choice tìm hiểu độ pH là gì và những thông tin liên quan trong bài viết sau đây nhé!', '1. Độ pH là gì?\r\nĐộ pH – Potential of Hydrogen là thuật ngữ liên quan đến hoạt động của các ion hydro (trong đó, ion là các phân tử mang điện tích âm hoặc dương) trong dung dịch gốc nước. Trên phương diện hóa học, hydro chiếm 2/3 phân tử nước, tức là một phân tử nước bao gồm hai phân tử hydro và một phân tử oxy, tạo thành công thức H2O.\r\n\r\nĐộ pH của một loại dung dịch được quy ước theo thang số chạy từ 0 đến 14. Những loại dung dịch có độ pH dưới 7 – độ pH trung tính được gọi là có tính acid còn những dung dịch có độ pH lớn hơn 7 được gọi là có tính kiềm. Chẳng hạn nước chanh với độ pH là 2 sẽ có tính acid, trong khi Amoniac có độ pH là 12 sẽ mang tính kiềm.\r\n\r\nMột lưu ý Paula’s Choice muốn nhấn mạnh là mặc dù sự khác biệt giữa các mức pH bạn nhìn thấy có vẻ không đáng kể nhưng do thang pH được đo theo công thức logarit với mức tăng gấp 10 lần so với thông thường. Ví dụ, dung dịch có độ pH bằng 3 sẽ lớn gấp 100 lần so với độ pH bằng 5. Chính vì vậy, chỉ một sự chênh lệch nhỏ trong mức pH của sản phẩm cũng sẽ ảnh hưởng rất lớn đến làn da của bạn.', 1, '2023-05-07 13:00:23', NULL, 'news_do_ph.jpg'),
(3, 'Vitamin B5 là gì? Công thức chăm sóc da kết hợp với B5 cho làn da sáng khỏe, mịn màng', '<p>Vitamin B5 (gọi tắt là B5) với dạng phổ biến là Panthenol và được đánh giá là một thành phần chăm sóc và phục hồi da toàn diện. Bài viết hôm nay sẽ giúp bạn hiểu rõ hơn về Vitamin B5 cũng như&nbsp;<a href=\"https://paulaschoice.vn/cac-thanh-phan-ket-hop-voi-b5.html\" rel=\"noopener noreferrer\" target=\"_blank\" title=\"các thành phần kết hợp với B5\"><strong>các thành phần kết hợp với B5</strong></a>&nbsp;cho làn da sáng khỏe, mịn màng.</p>', '<h2><strong>Vitamin B5 là gì?</strong></h2>\r\n\r\n<p><a href=\"https://vi.wikipedia.org/wiki/Acid_pantothenic\" rel=\"nofollow noopener\" target=\"_blank\" title=\"Vitamin B5\"><strong>Vitamin B5</strong></a>&nbsp;(Pantothenic Acid) là một loại Vitamin tan trong nước tham gia điều chỉnh nhiều quá trình chuyển hóa bên trong cơ thể cũng như góp phần cải thiện vẻ đẹp của làn da.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"https://paulaschoice.vn/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2021/11/cac-thanh-phan-ket-hop-voi-B5-1.jpg.webp\" /></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p>Nhờ những lợi ích to lớn, Vitamin B5 thường được ưu ái có mặt trong bảng thành phần của các sản phẩm chăm sóc da và tóc với dạng thông dụng là Pro – Vitamin B5 hay Panthenol. Không chỉ bổ sung độ ẩm, ngăn ngừa lão hóa, thành phần này còn là cánh tay đắc lực giúp phục hồi làn da suy yếu và giải quyết các vấn đề về da hiệu quả.</p>\r\n\r\n<p>Pro – Vitamin B5 là hợp chất có nguồn gốc từ Vitamin B5, hoạt động hiệu quả với mọi thành phần chăm sóc da và là một thành phần vô hại cho bất cứ làn da nào. Do vậy, Pro-Vitamin B5 thường xuyên đóng vai trò như chất cấp ẩm, làm dịu, tái tạo và phục hồi da. Cụ thể, hãy cùng chúng tôi tìm hiểu công dụng của Pro-Vitamin B5 nhé.</p>\r\n\r\n<h2><strong>Pro – Vitamin B5 có tác dụng gì với da?</strong></h2>\r\n\r\n<p>Nhắc đến Pro-Vitamin B5 hay Panthenol, chắc chắn sẽ không thể bỏ lỡ những công dụng tuyệt vời sau đây:</p>\r\n\r\n<h3>Dưỡng ẩm</h3>\r\n\r\n<p>Pro – Vitamin B5 là một chất dưỡng ẩm tự nhiên, được biết đến với công dụng tăng khả năng giữ nước và củng cố hàng rào bảo vệ của da. Trong mỹ phẩm chăm sóc da, vitamin B5 thường được liệt kê dưới tên có thể dễ dàng nhận biết như panthenol, d-panthenol, dl-panthenol hoặc dexpanthenol.</p>\r\n\r\n<p>Nếu bạn sở hữu làn da khô, kết cấu không mịn màng có thể sử dụng serum B5 để cấp nước, dưỡng ẩm để duy trì sự mềm mại và độ đàn hồi của làn da.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"https://paulaschoice.vn/wp-content/webp-express/webp-images/doc-root/wp-content/uploads/2021/11/cac-thanh-phan-ket-hop-voi-B5-2.jpg.webp\" /></p>\r\n\r\n<p>Đối với làn da dầu, vitamin B5 bổ sung lượng nước còn thiếu, giúp điều tiết sự hoạt động của tuyến bã nhờn và ngăn ngừa mụn hình thành trên da.</p>\r\n\r\n<h3>Tăng cường tái tạo và hồi phục da</h3>\r\n\r\n<p>Pro-Vitamin B5 tham gia mạnh mẽ vào quá trình tái tạo cũng như phục hồi những tổn thương trên da. Các liên kết collagen bị tổn thương do đứt gãy sẽ nhanh chóng được tái tạo trả lại làn da tươi trẻ và căng mịn.</p>\r\n\r\n<p>Hơn thế nữa, B5 còn là thành phần làm dịu và chống viêm và điều trị tăng sắc tố sau viêm PIH một cách hiệu quả. Vì thế, B5 luôn là sự lựa chọn hàng đầu nếu bạn muốn tìm một sản phẩm trị mụn thích hợp.</p>\r\n\r\n<h3>Cho da mịn màng, săn chắc</h3>\r\n\r\n<p>Axit pantothenic hoặc Pro – Vitamin B5 cũng góp phần không nhỏ trong việc thúc đẩy và sản xuất các nguyên bào sợi ở lớp trung bì (lớp có nếp nhăn hình thành); kích thích sản sinh collagen và elastin, chống lại các dấu hiệu lão hóa cho da săn chắc và tươi trẻ.</p>\r\n\r\n<p>Bên cạnh đó, D-Panthenol còn giúp tăng tính di động của một số phân đoạn lipid và protein trong các lớp bề mặt của da, giúp da duy trì độ ẩm phù hợp.</p>\r\n\r\n<p>Đặc biệt ở nồng độ tối ưu 5%, Pro-Vitamin B5 hay dạng D – Panthenol sẽ giúp cải thiện khuyết điểm trên da như vết thâm, tổn thương do cạo, tẩy lông hay bề mặt da thô ráp, kém săn chắc rõ rệt sau một thời gian sử dụng. Nếu bạn đang tò mò “tác dụng D-Panthenol trong mỹ phẩm” thì những thông tin kể trên đã giải đáp rõ ràng cho câu hỏi này.</p>\r\n\r\n<p>D-Panthenol trong mỹ phẩm còn được nghiên cứu và đánh giá là an toàn khi sử dụng cho mẹ bầu hoặc phụ nữ đang cho con bú.</p>', 1, '2023-05-06 17:00:00', NULL, 'ket-hop-vitamin-c-va-b5-0.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` date NOT NULL,
  `total_money` double NOT NULL,
  `order_status` int(11) NOT NULL,
  `delivery_money` double NOT NULL,
  `order_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `email`, `order_date`, `total_money`, `order_status`, `delivery_money`, `order_note`, `payment_method`, `payment_status`, `user_id`, `created_at`, `updated_at`) VALUES
(126, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-04-01', 750000, 1, 25000, 'Gửi hàng vào sáng CN', 1, 0, 7, '2023-04-01 09:01:13', NULL),
(127, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-03-01', 525000, 2, 25000, '', 1, 0, 7, '2023-03-01 09:01:42', NULL),
(128, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-01-01', 275000, 3, 25000, '', 1, 0, 7, '2023-02-01 09:02:01', NULL),
(129, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-01-01', 275000, 3, 25000, '', 1, 0, 7, '2023-02-01 09:03:48', NULL),
(130, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-03-01', 75000, 1, 25000, '', 1, 0, 7, '2023-02-01 09:04:01', NULL),
(131, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-04-01', 375000, 3, 25000, '', 1, 0, 7, '2023-03-01 09:27:50', NULL),
(132, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-02-01', 375000, 0, 25000, '', 1, 0, 7, '2023-05-01 09:30:55', NULL),
(133, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-03-01', 2500000, 3, 0, '', 1, 0, 7, '2023-05-01 09:32:42', NULL),
(134, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-01-01', 2500000, 3, 0, '', 1, 0, 7, '2023-05-01 09:32:50', NULL),
(135, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-02-01', 2750000, 3, 0, '', 1, 0, 7, '2023-02-01 09:33:13', NULL),
(136, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-05-01', 275000, 3, 25000, '', 1, 0, 7, '2023-01-01 09:34:38', NULL),
(137, 'Hoan Pham Thi', 338901535, 'Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-05-01', 750000, 0, 25000, '', 1, 0, 7, '2023-05-01 10:08:21', NULL),
(138, 'Pham Thi Hoan', 338901535, 'Số 04, ngõ 143, Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội', 'phamhoan0407@gmail.com', '2023-05-07', 487000, 0, 25000, 'Giao hàng sáng chủ nhật', 1, 0, 2, '2023-05-07 08:59:34', NULL),
(139, 'Hoan Pham Thi', 338901535, 'a', 'phamhoan0407@gmail.com', '2023-05-07', 375000, 0, 25000, '', 1, 0, 2, '2023-05-07 11:25:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_amount` bigint(20) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `product_amount`, `product_price`, `created_at`, `updated_at`) VALUES
(126, 38, 2, 350000.00, '2023-03-01 09:01:13', NULL),
(126, 39, 1, 25000.00, '2023-05-01 09:01:13', NULL),
(127, 40, 1, 500000.00, '2023-03-01 09:01:42', NULL),
(128, 43, 1, 250000.00, '2023-04-01 09:02:01', NULL),
(129, 42, 1, 250000.00, '2023-04-01 09:03:48', NULL),
(130, 45, 1, 50000.00, '2023-05-01 09:04:01', NULL),
(131, 38, 1, 350000.00, '2023-03-01 09:27:50', NULL),
(132, 41, 1, 350000.00, '2023-03-01 09:30:55', NULL),
(135, 42, 1, 250000.00, '2023-04-01 09:33:13', NULL),
(136, 42, 1, 250000.00, '2023-04-01 09:34:38', NULL),
(137, 38, 2, 350000.00, '2023-05-01 10:08:21', NULL),
(137, 39, 1, 25000.00, '2023-05-01 10:08:21', NULL),
(138, 8, 2, 56000.00, '2023-05-07 08:59:34', NULL),
(138, 41, 1, 350000.00, '2023-05-07 08:59:34', NULL),
(139, 38, 1, 350000.00, '2023-05-07 11:25:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_year` date NOT NULL,
  `product_price` double NOT NULL,
  `product_price_pre` double NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_detail` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_manual` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` double NOT NULL,
  `active` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_ingredient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_useNote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_expiry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_year`, `product_price`, `product_price_pre`, `product_image`, `product_detail`, `product_manual`, `product_quantity`, `active`, `category_id`, `supplier_id`, `created_at`, `updated_at`, `product_capacity`, `product_ingredient`, `product_useNote`, `product_expiry`) VALUES
(7, 'Kem chống nắng dưỡng ẩm & cải thiện nếp nhăn innisfree Hyaluron Moist Sunscreen Essence Texture SPF50+ PA++++ 50 mL', '2022-07-13', 56000, 60000, 'kemcn3.png', '', '', 1000, 1, 3, 2, NULL, '2023-04-30 17:00:00', '', '', '', '2024-12-01'),
(8, 'Kem chống nắng dưỡng ẩm & cải thiện nếp nhăn innisfree Hyaluron Moist Sunscreen Essence Texture SPF50+ PA++++ 35 mL', '2022-08-09', 56000, 60000, 'kemcn3.png', '<p>Th&aacute;ng Ba. Lớp học đ&oacute;n ch&agrave;o Otonashi Aya, học sinh mới chuyển tới v&agrave;o một thời điểm hết sức nửa vời. Trong khi cả lớp c&ograve;n đang sửng sốt kh&ocirc;ng thốt n&ecirc;n lời trước dung nhan xinh đẹp của bạn học mới, c&ocirc; b</p>', '<p>Thoa đều sản phẩm l&ecirc;n những v&ugrave;ng da c&oacute; khả năng tiếp x&uacute;c với tia UV như mặt v&agrave; cơ thể. Thoa lại sản phẩm sau khi bơi hoặc tham gia c&aacute;c hoạt động tiết nhiều mồ h&ocirc;i.</p>', 18, 1, 3, 1, NULL, '2023-04-29 17:00:00', '', '', '', '0000-00-00'),
(36, 'Bảng phấn mắt các màu cơ bản innisfree Essential Shadow Palette 8.3 ~ 8.7 g', '2023-04-01', 2500000, 3000000, 'bangphanmat.jpg', '', '<p>ưd</p>', 100, 1, 2, 1, '2023-04-29 17:00:00', '2023-04-29 17:00:00', '', '', '', '0000-00-00'),
(37, 'Kem dưỡng da tay hương thiên nhiên innisfree Jeju Life Perfumed Hand Cream 30 mL', '2023-04-01', 250000, 400000, 'duongdatay.jpg', '<p>czvz</p>', '<p>vzzx</p>', 100, 1, 4, 1, '2023-04-29 17:00:00', '2023-04-29 17:00:00', '', '', '', '0000-00-00'),
(38, 'Kem chống nắng nâng tông kiềm dầu innisfree Tone Up No Sebum Sunscreen EX SPF 50+ PA++++ 50 mL', '2023-05-01', 350000, 540000, 'kemchongnang.jpg', '<p>1. Bảo vệ da mạnh mẽ Kem chống nắng, với chỉ số<strong> SPF 50+ PA++++</strong>, giúp bảo vệ da mạnh mẽ. Kết cấu kem mỏng nhẹ, nhanh thấm vào da. Phù hợp cho mọi loại da, từ da khô, da hỗn hợp, đến da dầu.</p>\r\n\r\n<p>2. Nâng tông tự nhiên và dưỡng sáng từ bên trong Kem chống nắng có kết cấu mỏng nhẹ và tiệp vào da, mang đến hiệu ứng nâng tông tự nhiên, có thể thay thế kem nền để có lớp trang điểm tự nhiên. Đồng thời, kem giúp dưỡng sáng từ bên trong và làm đều màu da nhờ dẫn xuất vitamin C.</p>\r\n\r\n<p>3. Tạo lớp nền sáng trong và mọng nước Để tối giản hóa quy trình trang điểm, có thể dùng kem chống nắng làm lớp nền trang điểm, đặc biệt vào mùa hè hay khi phải mang khẩu trang thường xuyên. Kem chống nắng mang đến lớp nền sáng trong, mỏng nhẹ và vô cùng ẩm mượt.</p>', '<p>Sản phẩm được sử dụng ở bước cuối cùng của chu trình chăm sóc da cơ bản.</p>\r\n\r\n<p>Lấy một lượng thích hợp và thoa đều lên vùng da mặt, cổ, tay, chân,<em>… là những nơi dễ tiếp xúc với tia UV.</em></p>', 94, 1, 1, 1, '2023-04-29 17:00:00', '2023-04-30 17:00:00', '50ml', 'WATER / AQUA / EAU, DIBUTYL ADIPATE, PROPANEDIOL, ALCOHOL, ETHYLHEXYL TRIAZONE, TEREPHTHALYLIDENE DICAMPHOR SULFONIC ACID, GLYCERIN, NIACINAMIDE, TROMETHAMINE, POLYGLYCERYL-3 DISTEARATE, 1,2-HEXANEDIOL,', 'Có dấu hiệu bất thường nên ngưng sử dụng', '2023-06-11'),
(39, 'Mặt nạ lột mụn đầu đen innisfree Jeju Volcanic Nose Pack 1 sht', '2023-05-01', 25000, 30000, 'matnalotmun.jpg', '<p>1. Đ&aacute; tro n&uacute;i lửa l&agrave;m sạch s&acirc;u b&atilde; nhờn mạnh mẽ Cấu tr&uacute;c xốp khiến đ&aacute; tro n&uacute;i lửa Jeju c&oacute; khả năng h&uacute;t sạch b&atilde; nhờn, dầu thừa v&agrave; c&aacute;c tế b&agrave;o chết tr&ecirc;n da một c&aacute;ch mạnh mẽ. C&aacute;c kho&aacute;ng chất trong nguy&ecirc;n liệu chăm s&oacute;c l&agrave;n da s&aacute;ng khỏe. Nguy&ecirc;n liệu qu&yacute; n&agrave;y được loại bỏ tạp chất ở nhiệt độ cao tr&ecirc;n 150 độ v&agrave; nghiền th&agrave;nh bột mịn để dưỡng da.</p>\r\n\r\n<p>2. Loại bỏ mụn đầu đen, b&atilde; nhờn v&agrave; tạp chất kh&ocirc;ng mong muốn một c&aacute;ch hiệu quả. Mặt nạ với chiết xuất đ&aacute; tro n&uacute;i lửa, hấp thụ hiệu quả mụn đầu đen, b&atilde; nhờn v&agrave; bụi bẩn b&aacute;m s&acirc;u trong lỗ ch&acirc;n l&ocirc;ng, cải thiện bề mặt da.</p>\r\n\r\n<p>3. Thiết kế ho&agrave;n hảo Thiết kế b&aacute;m d&iacute;nh kh&ocirc;ng khoảng trống, gi&uacute;p l&agrave;m sạch tận s&acirc;u b&ecirc;n trong lỗ ch&acirc;n l&ocirc;ng.</p>', '<p>1. Đ&aacute; tro n&uacute;i lửa l&agrave;m sạch s&acirc;u b&atilde; nhờn mạnh mẽ Cấu tr&uacute;c xốp khiến đ&aacute; tro n&uacute;i lửa Jeju c&oacute; khả năng h&uacute;t sạch b&atilde; nhờn, dầu thừa v&agrave; c&aacute;c tế b&agrave;o chết tr&ecirc;n da một c&aacute;ch mạnh mẽ. C&aacute;c kho&aacute;ng chất trong nguy&ecirc;n liệu chăm s&oacute;c l&agrave;n da s&aacute;ng khỏe. Nguy&ecirc;n liệu qu&yacute; n&agrave;y được loại bỏ tạp chất ở nhiệt độ cao tr&ecirc;n 150 độ v&agrave; nghiền th&agrave;nh bột mịn để dưỡng da.</p>\r\n\r\n<p>2. Loại bỏ mụn đầu đen, b&atilde; nhờn v&agrave; tạp chất kh&ocirc;ng mong muốn một c&aacute;ch hiệu quả. Mặt nạ với chiết xuất đ&aacute; tro n&uacute;i lửa, hấp thụ hiệu quả mụn đầu đen, b&atilde; nhờn v&agrave; bụi bẩn b&aacute;m s&acirc;u trong lỗ ch&acirc;n l&ocirc;ng, cải thiện bề mặt da.</p>\r\n\r\n<p>3. Thiết kế ho&agrave;n hảo Thiết kế b&aacute;m d&iacute;nh kh&ocirc;ng khoảng trống, gi&uacute;p l&agrave;m sạch tận s&acirc;u b&ecirc;n trong lỗ ch&acirc;n l&ocirc;ng.</p>', 98, 1, 5, 1, '2023-04-29 17:00:00', '2023-04-29 17:00:00', '', '', '', '0000-00-00'),
(40, 'Bảng phấn mắt các màu cơ bản innisfree', '2023-05-01', 500000, 700000, 'phanmat.jpg', '', '', 99, 1, 2, 1, '2023-04-29 17:00:00', NULL, '', '', '', '0000-00-00'),
(41, 'Phấn phủ bột kiềm dầu innisfree No Sebum Mineral Powder 5 g', '2023-05-01', 350000, 500000, 'phanphu.jpg', '', '', 98, 1, 2, 1, '2023-04-29 17:00:00', NULL, '', '', '', '0000-00-00'),
(42, 'Kem dưỡng ẩm nâng tông làm sáng da và chống nắng innisfree Cherry Blossom Skin-Fit Tone-up Cream SPF50+ PA++++ 50 mL', '2023-05-01', 250000, 300000, 'kemduongam.jpg', '', '', 97, 1, 3, 1, '2023-04-29 17:00:00', NULL, '', '', '', '0000-00-00'),
(43, 'Set cấp ẩm cho da innisfree Green Tea Hydrating Amino Acid Cleansing Foam & Green Tea Seed Serum & Triple Shield Sunscreen Combo', '2023-05-01', 250000, 300000, 'setdm.jpg', '', '', 99, 1, 3, 1, '2023-04-29 17:00:00', NULL, '', '', '', '0000-00-00'),
(44, 'Kem dưỡng ẩm nâng tông làm sáng dvdfva và chống nắng innisfree Cherry Blossom Skin-Fit Tone-up Cream SPF50+ PA++++ 50 mL', '2023-05-02', 2500000, 3000000, 'kemcn4.jpg', '<p>ẻvrgf</p>', '<p>dver</p>', 97, 1, 1, 1, '2023-04-30 17:00:00', '2023-04-30 17:00:00', '50ml', 'WATER / AQUA / EAU, DIBUTYL ADIPATE, PROPANEDIOL, ALCOHOL, ETHYLHEXYL TRIAZONE, TEREPHTHALYLIDENE DICAMPHOR SULFONIC ACID, GLYCERIN, NIACINAMIDE, TROMETHAMINE, POLYGLYCERYL-3 DISTEARATE, 1,2-HEXANEDIOL,', 'Có dấu hiệu bất thường nên ngưng sử dụng', '0000-00-00'),
(45, 'Chì kẻ lông mày lâu trôi innisfree Simple Label Lasting Pencil Brow 0.15 g', '2023-05-01', 50000, 70000, 'CHIKELONGMAY.jpg', '<p>1. Định hình lông mày với đầu chì được dát 3D Đầu chì kẻ được dát 3D cho thao tác vẽ dễ dàng và nhanh chóng, đường kẻ nét và tinh tế, tạo hiệu ứng trang điểm lông mày tự nhiên và thanh lịch.</p>\r\n\r\n<p>2. Chất chì cứng cáp và bền màu Kết cấu chì chắc chắn giúp hạn chế đứt gãy khi vẽ. Công thức màu tự nhiên và bám lâu, chống thấm nước và dầu, mang lại hiệu ứng lông mày sắc nét và lâu trôi.</p>\r\n\r\n<p>3. Simple Label - Dòng trang điểm thuần chay đạt chuẩn EVE VEGAN® certification Simple Label chiết xuất hoàn toàn từ nguyên liệu thiên nhiên thuần chay như Tú Cầu và bộ khoáng vô cơ đạt chuẩn EVE Vegan Certified (*), an toàn và lành tính với cả làn da nhạy cảm và mắt đã trải qua phẫu thuật tật khúc xạ. Simple Label sinh ra để theo đuổi vẻ đẹp, khỏe mạnh tự nhiên, làm dịu và đồng thời giảm căng thẳng cho làn da phải trang điểm mỗi ngày. (*) EVE Vegan là chứng nhận thuần chay chính thức từ Pháp. Sản phẩm không chứa thành phần từ động vật, hương liệu và màu hóa học.</p>', '<p>Vẽ phác thảo khung chân mày sau đó tô đầy phần bên trong chân mày.</p>', 39, 1, 1, 1, '2023-04-30 17:00:00', NULL, '15g', 'IRON OXIDES (CI 77499), ORYZA SATIVA (RICE) BRAN WAX, IRON OXIDES (CI 77492), IRON OXIDES (CI 77491), RHUS SUCCEDANEA FRUIT WAX, PALMITIC ACID, STEARIC ACID, EUPHORBIA CERIFERA (CANDELILLA) WAX / CANDELILLA CERA HYDROCARBONS / CIRE DE CANDELILLA', '1. Chỉ sử dụng ngoài da', '2024-12-31'),
(46, 'Khác', '2023-05-04', 300000, 3000000, 'setdm.jpg', '', '', 50, 1, 6, 1, '2023-05-03 17:00:00', '2023-05-03 17:00:00', '50ml', 'WATER / AQUA / EAU, DIBUTYL ADIPATE, PROPANEDIOL, ALCOHOL, ETHYLHEXYL TRIAZONE, TEREPHTHALYLIDENE DICAMPHOR SULFONIC ACID, GLYCERIN, NIACINAMIDE, TROMETHAMINE, POLYGLYCERYL-3 DISTEARATE, 1,2-HEXANEDIOL,', 'Có dấu hiệu bất thường nên ngưng sử dụng', '2024-06-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_address`, `supplier_phone`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Công ty mỹ phẩm Innisfree', 'Số 126, Đường Phú Nhuận, Quận 12, HCM', 987986754, 1, NULL, '2023-04-29 17:00:00'),
(2, 'Công ty dược phẩm Astrolim', 'Số 5 ngõ 621, Quận Cầu Giấy, Hà Nội', 332451657, 1, NULL, '2023-04-29 17:00:00'),
(3, 'Công ty mỹ phẩm thiên nhiên Wonder', 'Số 423, Quận KiongWon, Seoul, Korea', 987986754, 1, '2022-07-31 17:00:00', '2023-04-29 17:00:00'),
(6, 'Nhà phân phối độc quyền Premi', 'Quận 10, HCM', 332451657, 1, '2022-08-15 17:00:00', '2023-04-29 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `user_password`, `user_type`, `user_image`, `active`, `remember_token`, `created_at`, `updated_at`, `user_phone`) VALUES
(1, 'Hoan', '', 'phamhoan7401@gmail.com', NULL, '$2y$10$nG4M9zj9TU5tczIeFXMPKOdcF17T8xd1Sz8c7Fqo2RaqOZTBHsmAG', 0, '', 1, NULL, NULL, NULL, 0),
(2, 'Hoan', 'PhamHoan', 'phamhoan@gmail.com', NULL, '$2y$10$nG4M9zj9TU5tczIeFXMPKOdcF17T8xd1Sz8c7Fqo2RaqOZTBHsmAG', 1, '', 1, NULL, NULL, NULL, 338798453),
(5, 'Hoan456', 'Hoan456', 'phamhoan456@gmail.com', NULL, '$2y$10$vsDchJUIptV5Kp2HmcYdPu1JEjV48XjwoYxQTjoSan.w.9kt57xZ2', 1, '', 1, NULL, NULL, NULL, 338901535),
(6, NULL, 'Hoan789', 'phamhoan0404@gmail.com', NULL, '$2y$10$MoWJAj/nBl7Xrkj4NLkd7OSpV6lsHGOCglQ0sC/EEf8M6bpRdON.m', 1, NULL, 1, NULL, '2022-08-16 09:50:10', '2022-08-16 09:50:10', 98377234),
(7, NULL, 'Admin1', 'phamhoan0407@gmail.com', NULL, '$2y$10$hCnBLYmSfbKF2n7w/qeqFOzs/vCsuaI2z21BtdoYDjJO2mNSkqI.C', 0, NULL, 1, NULL, '2023-03-20 17:00:00', NULL, 338901535),
(8, NULL, 'AuthAdmin', 'phamhoan0307@gmail.com', NULL, '$2y$10$VM1juQpwWJEgdXMWOr4mceEGWmJneDjdxsc425vb2X363Ntjrqzlq', 0, NULL, 1, NULL, '2023-05-05 17:00:00', NULL, 338901535),
(9, NULL, 'PhamHoan', 'phamhoan0907@gmail.com', NULL, '$2y$10$cHbyLIUT3n4GtrJVX58y4.DdIwlp8FmieO8Pk7YO.J2mak5v3jgjS', 1, NULL, 1, NULL, '2023-05-05 17:00:00', NULL, 338901535),
(10, NULL, 'NVTrang', 'trang@gmail.com', NULL, '$2y$10$QCvtndbnwuiWWH2zqkUTTe.prBMNb.JrkRSQrMfz.aD3yaPbEldEe', 2, NULL, 1, NULL, '2023-05-05 17:00:00', NULL, 338901535),
(11, NULL, 'Người dùng 2', 'nguoidung2@gmail.com', NULL, '$2y$10$3wQ9975cIjFdFlBtxRwYx.flrInagfXZ8aJkHlXb2v8i7G.Ob2Tza', 1, NULL, 1, NULL, '2023-05-06 11:25:42', '2023-05-06 11:25:42', 338901122),
(12, NULL, 'Người dùng 2', 'nguoidung21@gmail.com', NULL, '$2y$10$zo5qJXJBwmowxBjaA5n9J.xdGCwPJthdaep6IvzrjLG1Hf5yKz.ZK', 1, NULL, 1, NULL, '2023-05-06 11:27:50', '2023-05-06 11:27:50', 338901535),
(13, NULL, 'Người dùng 2', 'nguoidung221@gmail.com', NULL, '$2y$10$INRKaqHHpefjmbIlhTEhP.uYSL0ziPe63DU.mj4dgk950UUxSlVZ6', 1, NULL, 1, NULL, '2023-05-06 11:28:23', '2023-05-06 11:28:23', 338901535);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `carts_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `cart_product_cart_id_index` (`cart_id`),
  ADD KEY `cart_product_product_id_index` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `email_notifies`
--
ALTER TABLE `email_notifies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `order_product_product_id_index` (`product_id`),
  ADD KEY `order_product_order_id_index` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_supplier_id_index` (`supplier_id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `email_notifies`
--
ALTER TABLE `email_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
