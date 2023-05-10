-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2023 lúc 06:57 AM
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
  `addinfo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reference` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(27, 'Tran Gia Bao', 'bao@gmail.com', '0123456', '12345', 0, '2023-05-10 04:49:33', '2023-05-10 04:49:56', 'avt1.jpg'),
(28, 'Nguyen Hoang Nhat Duy', 'duy@gmail.com', '07738599090', '12345', 0, '2023-05-10 04:52:20', '2023-05-10 04:52:20', 'avt2.jpg'),
(30, 'Nguyen Quang Huy', 'huy@gmail.com', '012345678', '12345', 0, '2023-05-10 04:55:41', '2023-05-10 04:55:41', 'avt3.jpg');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
