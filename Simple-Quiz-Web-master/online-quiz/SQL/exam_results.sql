-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 21, 2023 lúc 07:41 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `exam_type` varchar(100) NOT NULL,
  `total_question` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(80, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(81, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(82, 's4154', 'Excel', '0', '0', '0', '03/04/2023'),
(83, 's4154', 'Word', '1', '0', '1', '03/04/2023'),
(84, 's4154', 'Word', '1', '1', '0', '03/04/2023'),
(85, 's4154', 'Word', '20', '16', '4', '03/04/2023'),
(86, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(87, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(88, 's4154', 'Word', '20', '17', '3', '03/04/2023'),
(89, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(90, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(91, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(92, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(93, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(94, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(95, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(96, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(97, 's4154', 'Word', '21', '19', '2', '03/04/2023'),
(98, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(99, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(100, 's4154', 'Word', '20', '18', '2', '03/04/2023'),
(101, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(102, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(103, 's4154', 'Word', '20', '19', '1', '03/04/2023'),
(104, 's4154', 'Word', '20', '20', '0', '03/04/2023'),
(105, 's4154', 'Word', '20', '20', '0', '03/04/2023'),
(106, 's4154', 'Excel', '20', '17', '3', '03/04/2023'),
(107, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(108, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(109, 's4154', 'Excel', '19', '18', '1', '03/04/2023'),
(110, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(111, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(112, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(113, 's4154', 'Excel', '19', '5', '14', '03/04/2023'),
(114, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(115, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(116, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(117, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(118, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(119, 's4154', 'Excel', '19', '0', '19', '03/04/2023'),
(120, 's4154', 'Excel', '20', '19', '1', '03/04/2023'),
(121, 's4154', 'Excel', '20', '20', '0', '03/04/2023'),
(122, 's4154', 'Powerpoint', '20', '20', '0', '03/04/2023'),
(123, 's4154', 'Powerpoint', '20', '19', '1', '03/04/2023'),
(124, 's4154', 'Word', '20', '1', '19', '05/04/2023'),
(125, 'camly', 'Word', '20', '0', '20', '06/04/2023'),
(126, 'camly', 'Word', '20', '1', '19', '07/04/2023'),
(127, 'camly', 'Word', '20', '1', '19', '07/04/2023'),
(128, 'camly12', 'Word', '20', '0', '20', '07/04/2023'),
(129, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(130, 'camly12', 'Word', '20', '2', '18', '10/04/2023'),
(131, 'camly12', 'pp', '2', '2', '0', '10/04/2023'),
(132, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(133, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(134, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(135, 'camly12', 'Excel', '20', '1', '19', '10/04/2023'),
(136, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(137, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(138, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(139, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(140, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(141, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(142, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(143, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(144, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(145, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(146, 'camly12', 'Word', '20', '0', '20', '10/04/2023'),
(147, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(148, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(149, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(150, 'camly12', 'Word', '20', '1', '19', '10/04/2023'),
(151, 'camly12', 'Excel', '20', '0', '20', '10/04/2023'),
(152, 'camly12', 'Word', '18', '12', '6', '10/04/2023'),
(153, 'camly12', 'Word', '20', '20', '0', '10/04/2023'),
(154, 'camly12', 'Excel', '20', '1', '19', '10/04/2023'),
(155, 'camly12', 'Powerpoint', '20', '2', '18', '10/04/2023'),
(156, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(157, 'camly1235', 'Word', '20', '1', '19', '11/04/2023'),
(158, 'camly1235', 'Word', '20', '1', '19', '11/04/2023'),
(159, 'camly1235', 'Word', '20', '1', '19', '11/04/2023'),
(160, 'camly1235', 'Word', '20', '1', '19', '11/04/2023'),
(161, 'camly1235', 'Excel', '20', '1', '19', '11/04/2023'),
(162, 'camly1235', 'Word', '20', '1', '19', '11/04/2023'),
(163, 'camly1235', 'Excel', '20', '1', '19', '11/04/2023'),
(164, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(165, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(166, 'camly12', 'Word', '20', '0', '20', '11/04/2023'),
(167, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(168, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(169, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(170, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(171, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(172, 'camly1235', 'Word', '20', '0', '20', '11/04/2023'),
(173, 'camly1235', 'Word', '20', '20', '0', '11/04/2023'),
(174, 'camly1235', 'Excel', '20', '1', '19', '11/04/2023'),
(175, 'camly12', 'Word', '20', '20', '0', '12/04/2023'),
(176, 'camly1235', 'Word', '20', '19', '1', '12/04/2023'),
(177, 'camly12', 'Word', '20', '20', '0', '13/04/2023'),
(178, 'camly12', 'Excel', '20', '1', '19', '13/04/2023'),
(179, 'camly1235', 'Word', '20', '0', '20', '13/04/2023'),
(180, 'camly1235', 'Word', '20', '2', '18', '13/04/2023'),
(181, 'camly1235', 'Word', '20', '19', '1', '13/04/2023'),
(182, 'camly1235', 'Word', '20', '0', '20', '14/04/2023'),
(183, 'camly1235', 'S', '0', '0', '0', '14/04/2023'),
(184, 'camly1235', 'S', '0', '0', '0', '14/04/2023'),
(185, 'camly1235', 'E', '0', '0', '0', '14/04/2023'),
(186, 'camly1235', 'S', '0', '0', '0', '14/04/2023'),
(187, 'camly1235', 'Word', '20', '20', '0', '14/04/2023'),
(188, 'camly1235', 'pp', '0', '0', '0', '14/04/2023'),
(189, 'camly1235', 'Word', '20', '19', '1', '14/04/2023'),
(190, 'camly1235', 'Word', '20', '0', '20', '14/04/2023'),
(191, 'camly1235', 'Word', '20', '0', '20', '14/04/2023'),
(192, 'camly1235', 'Word', '20', '0', '20', '14/04/2023 21:45:15'),
(193, 'camly1235', 'Excel', '20', '0', '20', '02:47 15/04/2023'),
(194, 'camly1235', 'Word', '20', '20', '0', '02:48 15/04/2023'),
(195, 'camly1235', 'pp', '0', '0', '0', '18:51 15/04/2023'),
(196, 'camly1235', 'Word', '20', '20', '0', '18:51 15/04/2023'),
(197, 'camly1235', 'PowerPoint', '20', '0', '20', '21:17 15/04/2023'),
(198, 'camly1235', 'Word', '21', '21', '0', '21:25 15/04/2023'),
(199, 'camly1235', 'Máy tính', '10', '10', '0', '23:23 16/04/2023'),
(200, 'camly1235', 'Máy tính', '10', '9', '1', '23:31 16/04/2023');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
create trigger Quanli
on exam_results for
after insert
as
begin
	declare @madung varchar(10)
	declare @soluong int
	select @madung= username * from inserted
	Select @soluong=count(*) from exam_results  WHERE username=@madung
	IF(@soluong>3)
	BEGIN
		RAISERROR ('QUA SO LAN THI',15,1)
		rollback transaction
	END
end

