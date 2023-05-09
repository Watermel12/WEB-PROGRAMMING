-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2023 lúc 08:56 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cv2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `resumes`
--

CREATE TABLE `resumes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `headline` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `objective` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `skills` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `experience` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `certificate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `created_at`, `updated_at`, `headline`, `contact`, `objective`, `skills`, `experience`, `education`, `certificate`, `reference`, `url`) VALUES
(22, 23, '2023-05-09 05:32:58', '2023-05-09 06:36:28', 'PHP Developer', '{\"address\":\"HCM\"}', 'sdasdad', '[\"HTML\",\"CSS\",\"C\"]', '[{\"company\":\"apple\",\"jobrole\":\"Graphic Design\",\"w_duration\":\"2020-2024\",\"work_desc\":\" sdada\"}]', '[{\"college\":\"Bach Khoa\",\"course\":\"Bachelor\",\"e_duration\":\"2020-2024\"}]', '[{\"titles\":\"IELTS\",\"or_name\":\"British council\",\"cert_duration\":\"2020-2024\"}]', '[{\"re_name\":\"Dua hau\",\"re_email\":\"thang@adgmail.com\",\"re_number\":\"12345\",\"re_relate\":\"sister\"}]', '6tzx8y07w31618yqu3'),
(23, 22, '2023-05-09 05:45:03', '2023-05-09 05:45:03', 'Software', '{\"address\":\"Da Nang\"}', 'sdasda', '[\"HTML\",\"python\"]', '[{\"company\":\"Apple\",\"jobrole\":\"Graphic Design\",\"w_duration\":\"2020-2024\",\"work_desc\":\" sdasdasd\"}]', '[{\"college\":\"Bach Khoa\",\"course\":\"Bachelor\",\"e_duration\":\"2020-2024\"}]', '[{\"titles\":\"IELTS 6.0\",\"or_name\":\"British Council\",\"cert_duration\":\"2020-2024\"}]', '[{\"re_name\":\"sadasd\",\"re_email\":\"thang@gmail.com\",\"re_number\":\"12345\",\"re_relate\":\"sister\"}]', 'z136x1u1803ywy6t1q'),
(24, 22, '2023-05-09 05:55:17', '2023-05-09 05:55:17', 'PHP Developer', '{\"address\":\"Ha Noi\"}', 'asdsasdasd', '[\"HTML\",\"C++\",\"java\",\"React\"]', '[{\"company\":\"Apple\",\"jobrole\":\"Graphic Design\",\"w_duration\":\"2020-2024\",\"work_desc\":\" sdasd\"}]', '[{\"college\":\"KHTN\",\"course\":\"Master\",\"e_duration\":\"2020-2024\"}]', '[{\"titles\":\"IELTS 6.0\",\"or_name\":\"British Council\",\"cert_duration\":\"2020-2024\"}]', '[{\"re_name\":\"Dua Hau\",\"re_email\":\"thang@gmail.com\",\"re_number\":\"1233456\",\"re_relate\":\"sister\"}]', '3w1u761t8y161xqyz7'),
(25, 22, '2023-05-09 06:16:35', '2023-05-09 06:16:35', 'dasdas', '{\"address\":\"dasdasd\"}', 'dasdas', '[\"CSS\"]', '[{\"company\":\"dasdas\",\"jobrole\":\"dasdasdsa\",\"w_duration\":\"2020-2024\",\"work_desc\":\" dasda\"}]', '[{\"college\":\"dasdas\",\"course\":\"dadad\",\"e_duration\":\"2020-2024\"}]', '[{\"titles\":\"dasdasdasd\",\"or_name\":\"asdasdad\",\"cert_duration\":\"2020-2024\"}]', '[{\"re_name\":\"adasd\",\"re_email\":\"asdada@gmail.com\",\"re_number\":\"12345\",\"re_relate\":\"sister\"}]', 'y9x2y9uw68z16315qt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone_num` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `account_status` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email_id`, `phone_num`, `password`, `account_status`, `created_at`, `updated_at`, `img`) VALUES
(22, 'Nguyen Viet Thang', 'thang@gmail.com', '12345', '12345', 0, '2023-05-09 03:02:05', '2023-05-09 03:02:05', 'profile1.jpg'),
(23, 'Tran Gia Bao', 'bao@gmail.com', '12345', '12345', 0, '2023-05-09 04:24:36', '2023-05-09 04:24:36', 'profile3.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
