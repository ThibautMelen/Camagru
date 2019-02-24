-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 24, 2019 at 12:43 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camagru`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `email`, `pass`, `avatar`) VALUES
(1, 'test1', 'test@test.com', 'qwerty', ''),
(2, 'ttt', 'ttt@ttt.com', 'ed70c57d7564e994e7d5f6fd6967cea8b347efbc', ''),
(3, 'ttt', 'ttt@ttt.com', '22d98cb2f3b8c01f352ea9c61709191039f9bd91', ''),
(4, 'tttll', 'ttt@ttllt.com', '890a492c4fc7a01e4582fc6774ffb8a9e01f14d5', ''),
(5, 'ttt@ttllt.com', 'tttll', '890a492c4fc7a01e4582fc6774ffb8a9e01f14d5', ''),
(6, 'mail@mail.mail', 'pseudo', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', ''),
(7, 'pseudo', 'mail@mail.mail', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', ''),
(8, 'monpseudo', 'aaa@aaa.com', '1848d36b88fec26bf621b0ede27c8086a6db120b', ''),
(9, 'monpseudo', 'aaa@aaa.com', '1848d36b88fec26bf621b0ede27c8086a6db120b', ''),
(10, 'a', 'aa@aa.com', '128c484ff69fcdc1f82cd3781595cac5185e688f', ''),
(11, 'pseudo', 'aaa@aaaaaaaa.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', ''),
(12, 'pseudoq', 'mail@mail.maidl', '33a9e269dd782e92489a8e547b7ed582e0e1d42b', ''),
(13, 'jo', 'jo@jo.com', 'bd73d35759d75cc215150d1bbc94f1b1078bee01', ''),
(14, 'tamere', 'tamere@estunepute.com', '1848d36b88fec26bf621b0ede27c8086a6db120b', ''),
(15, 'tibox', 'tibo@tibo.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', ''),
(16, 'jame', 'james@james.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '16.jpg'),
(17, 'bART', 'Bart@bart.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '17.gif'),
(18, 'dede', 'dede@dede.com', '8e65e20d4b7140a2e6ed067933d596228e46d380', '18.gif'),
(19, 'jean', 'jean@jean.com', '51f8b1fa9b424745378826727452997ee2a7c3d7', '19.gif'),
(20, 'emma', 'emma@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '20.gif'),
(21, 'canada', 'canada@gmail.com', '1848d36b88fec26bf621b0ede27c8086a6db120b', 'default.jpg'),
(22, 'odin', 'odin@din.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'data/avatar_member/22.gif'),
(23, 'spider', 'spider@man.com', '1848d36b88fec26bf621b0ede27c8086a6db120b', 'data/avatar_member/default.jpg'),
(24, 'ichigo', 'ichigo@gsfd.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '24.gif'),
(25, 'ben', 'bn@ca.c', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '25.jpg'),
(26, 'booba', 'booba@g.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'data/avatar_member/26.gif'),
(27, 'prime', 'prim@f.c', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'data/avatar_member/default.jpg'),
(28, 'qwerty', 'qwerty@e.c', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'data/avatar_member/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `like_nb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `member_id`, `picture`, `like_nb`) VALUES
(1, 22, 'data/post/post_22_1550858714.png', 0),
(2, 22, 'data/post/post_22_1550859228.png', 0),
(3, 22, 'data/post/post_22_1550859581.png', 0),
(4, 22, 'data/post/post_22_1550864950.png', 0),
(5, 21, 'data/post/post_21_1550864987.png', 0),
(6, 21, 'data/post/post_21_1550864991.png', 0),
(7, 26, 'data/post/post_26_1550865712.png', 0),
(8, 26, 'data/post/post_26_1550865714.png', 0),
(9, 26, 'data/post/post_26_1550865717.png', 0),
(10, 26, 'data/post/post_26_1550865720.png', 0),
(11, 26, 'data/post/post_26_1550865724.png', 0),
(12, 26, 'data/post/post_26_1550865725.png', 0),
(13, 26, 'data/post/post_26_1550865727.png', 0),
(14, 26, 'data/post/post_26_1550865730.png', 0),
(15, 26, 'data/post/post_26_1550865733.png', 0),
(16, 26, 'data/post/post_26_1550865737.png', 0),
(17, 26, 'data/post/post_26_1550865783.png', 0),
(18, 26, 'data/post/post_26_1550866075.png', 0),
(19, 26, 'data/post/post_26_1550866078.png', 0),
(20, 26, 'data/post/post_26_1550866094.png', 0),
(21, 26, 'data/post/post_26_1550866095.png', 0),
(22, 26, 'data/post/post_26_1550866099.png', 0),
(23, 26, 'data/post/post_26_1550866103.png', 0),
(24, 26, 'data/post/post_26_1550866284.png', 0),
(25, 26, 'data/post/post_26_1550866311.png', 0),
(26, 26, 'data/post/post_26_1550866312.png', 0),
(27, 26, 'data/post/post_26_1550866313.png', 0),
(28, 26, 'data/post/post_26_1550866313.png', 0),
(29, 26, 'data/post/post_26_1550866319.png', 0),
(30, 26, 'data/post/post_26_1550867233.png', 0),
(31, 26, 'data/post/post_26_1550867352.png', 0),
(32, 26, 'data/post/post_26_1550867355.png', 0),
(33, 26, 'data/post/post_26_1550867356.png', 0),
(34, 26, 'data/post/post_26_1550867356.png', 0),
(35, 26, 'data/post/post_26_1550867357.png', 0),
(36, 26, 'data/post/post_26_1550867359.png', 0),
(37, 26, 'data/post/post_26_1550867361.png', 0),
(38, 26, 'data/post/post_26_1550867377.png', 0),
(39, 26, 'data/post/post_26_1550867439.png', 0),
(40, 26, 'data/post/post_26_1550867440.png', 0),
(41, 26, 'data/post/post_26_1550867443.png', 0),
(42, 26, 'data/post/post_26_1550867501.png', 0),
(43, 26, 'data/post/post_26_1550867522.png', 0),
(44, 26, 'data/post/post_26_1550867599.png', 0),
(45, 26, 'data/post/post_26_1550867602.png', 0),
(46, 26, 'data/post/post_26_1550867606.png', 0),
(47, 26, 'data/post/post_26_1550867608.png', 0),
(48, 26, 'data/post/post_26_1550867677.png', 0),
(49, 26, 'data/post/post_26_1550867681.png', 0),
(50, 26, 'data/post/post_26_1550867737.png', 0),
(51, 26, 'data/post/post_26_1550867737.png', 0),
(52, 26, 'data/post/post_26_1550867737.png', 0),
(53, 26, 'data/post/post_26_1550867737.png', 0),
(54, 26, 'data/post/post_26_1550867737.png', 0),
(55, 26, 'data/post/post_26_1550867737.png', 0),
(56, 26, 'data/post/post_26_1550867737.png', 0),
(57, 26, 'data/post/post_26_1550867737.png', 0),
(58, 26, 'data/post/post_26_1550867737.png', 0),
(59, 26, 'data/post/post_26_1550867737.png', 0),
(60, 26, 'data/post/post_26_1550867737.png', 0),
(61, 26, 'data/post/post_26_1550867737.png', 0),
(62, 26, 'data/post/post_26_1550867737.png', 0),
(63, 26, 'data/post/post_26_1550867737.png', 0),
(64, 26, 'data/post/post_26_1550867738.png', 0),
(65, 26, 'data/post/post_26_1550867738.png', 0),
(66, 26, 'data/post/post_26_1550867738.png', 0),
(67, 26, 'data/post/post_26_1550867738.png', 0),
(68, 26, 'data/post/post_26_1550867738.png', 0),
(69, 26, 'data/post/post_26_1550867738.png', 0),
(70, 26, 'data/post/post_26_1550867738.png', 0),
(71, 26, 'data/post/post_26_1550867742.png', 0),
(72, 26, 'data/post/post_26_1550867742.png', 0),
(73, 26, 'data/post/post_26_1550867742.png', 0),
(74, 26, 'data/post/post_26_1550867742.png', 0),
(75, 26, 'data/post/post_26_1550867742.png', 0),
(76, 26, 'data/post/post_26_1550867742.png', 0),
(77, 26, 'data/post/post_26_1550867742.png', 0),
(78, 26, 'data/post/post_26_1550867742.png', 0),
(79, 26, 'data/post/post_26_1550867742.png', 0),
(80, 26, 'data/post/post_26_1550867742.png', 0),
(81, 26, 'data/post/post_26_1550867742.png', 0),
(82, 26, 'data/post/post_26_1550867742.png', 0),
(83, 26, 'data/post/post_26_1550867742.png', 0),
(84, 26, 'data/post/post_26_1550867742.png', 0),
(85, 26, 'data/post/post_26_1550867742.png', 0),
(86, 26, 'data/post/post_26_1550867742.png', 0),
(87, 26, 'data/post/post_26_1550867742.png', 0),
(88, 26, 'data/post/post_26_1550867742.png', 0),
(89, 26, 'data/post/post_26_1550867742.png', 0),
(90, 26, 'data/post/post_26_1550867742.png', 0),
(91, 26, 'data/post/post_26_1550867742.png', 0),
(92, 26, 'data/post/post_26_1550867744.png', 0),
(93, 26, 'data/post/post_26_1550867744.png', 0),
(94, 26, 'data/post/post_26_1550867744.png', 0),
(95, 26, 'data/post/post_26_1550867744.png', 0),
(96, 26, 'data/post/post_26_1550867744.png', 0),
(97, 26, 'data/post/post_26_1550867744.png', 0),
(98, 26, 'data/post/post_26_1550867744.png', 0),
(99, 26, 'data/post/post_26_1550867744.png', 0),
(100, 26, 'data/post/post_26_1550867744.png', 0),
(101, 26, 'data/post/post_26_1550867744.png', 0),
(102, 26, 'data/post/post_26_1550867744.png', 0),
(103, 26, 'data/post/post_26_1550867744.png', 0),
(104, 26, 'data/post/post_26_1550867744.png', 0),
(105, 26, 'data/post/post_26_1550867744.png', 0),
(106, 26, 'data/post/post_26_1550867744.png', 0),
(107, 26, 'data/post/post_26_1550867744.png', 0),
(108, 26, 'data/post/post_26_1550867744.png', 0),
(109, 26, 'data/post/post_26_1550867744.png', 0),
(110, 26, 'data/post/post_26_1550867744.png', 0),
(111, 26, 'data/post/post_26_1550867744.png', 0),
(112, 26, 'data/post/post_26_1550867744.png', 0),
(113, 26, 'data/post/post_26_1550867937.png', 0),
(114, 26, 'data/post/post_26_1550867938.png', 0),
(115, 26, 'data/post/post_26_1550867938.png', 0),
(116, 26, 'data/post/post_26_1550867938.png', 0),
(117, 26, 'data/post/post_26_1550867938.png', 0),
(118, 26, 'data/post/post_26_1550867938.png', 0),
(119, 26, 'data/post/post_26_1550867938.png', 0),
(120, 26, 'data/post/post_26_1550867938.png', 0),
(121, 26, 'data/post/post_26_1550867938.png', 0),
(122, 26, 'data/post/post_26_1550867938.png', 0),
(123, 26, 'data/post/post_26_1550867938.png', 0),
(124, 26, 'data/post/post_26_1550867938.png', 0),
(125, 26, 'data/post/post_26_1550867938.png', 0),
(126, 26, 'data/post/post_26_1550867938.png', 0),
(127, 26, 'data/post/post_26_1550867938.png', 0),
(128, 26, 'data/post/post_26_1550867938.png', 0),
(129, 26, 'data/post/post_26_1550867938.png', 0),
(130, 26, 'data/post/post_26_1550867938.png', 0),
(131, 26, 'data/post/post_26_1550867938.png', 0),
(132, 26, 'data/post/post_26_1550867938.png', 0),
(133, 26, 'data/post/post_26_1550867938.png', 0),
(134, 26, 'data/post/post_26_1550867964.png', 0),
(135, 26, 'data/post/post_26_1550867983.png', 0),
(136, 26, 'data/post/post_26_1550867987.png', 0),
(137, 26, 'data/post/post_26_1550868079.png', 0),
(138, 26, 'data/post/post_26_1550868103.png', 0),
(139, 27, 'data/post/post_27_1550868229.png', 0),
(140, 27, 'data/post/post_27_1550868233.png', 0),
(141, 27, 'data/post/post_27_1550868245.png', 0),
(142, 27, 'data/post/post_27_1550868298.png', 0),
(143, 27, 'data/post/post_27_1550868309.png', 0),
(144, 27, 'data/post/post_27_1550868430.png', 0),
(145, 22, 'data/post/post_22_1550942119.png', 0),
(146, 22, 'data/post/post_22_1550942129.png', 0),
(147, 22, 'data/post/post_22_1550942133.png', 0),
(148, 22, 'data/post/post_22_1550942135.png', 0),
(149, 22, 'data/post/post_22_1550942151.png', 0),
(150, 22, 'data/post/post_22_1550942164.png', 0),
(151, 22, 'data/post/post_22_1550942173.png', 0),
(152, 22, 'data/post/post_22_1550942180.png', 0),
(153, 22, 'data/post/post_22_1550942187.png', 0),
(154, 22, 'data/post/post_22_1550942192.png', 0),
(155, 22, 'data/post/post_22_1550945922.png', 0),
(156, 22, 'data/post/post_22_1550945925.png', 0),
(157, 28, 'data/post/post_28_1550946009.png', 0),
(158, 28, 'data/post/post_28_1550946013.png', 0),
(159, 28, 'data/post/post_28_1550946018.png', 0),
(160, 28, 'data/post/post_28_1550946022.png', 0),
(161, 22, 'data/post/post_22_1550946270.png', 0),
(162, 22, 'data/post/post_22_1550946275.png', 0),
(163, 22, 'data/post/post_22_1550946279.png', 0),
(164, 22, 'data/post/post_22_1550946285.png', 0),
(165, 22, 'data/post/post_22_1550946291.png', 0),
(166, 22, 'data/post/post_22_1550946297.png', 0),
(167, 22, 'data/post/post_22_1550946301.png', 0),
(168, 22, 'data/post/post_22_1550948955.png', 0),
(169, 22, 'data/post/post_22_1550948960.png', 0),
(170, 22, 'data/post/post_22_1550948967.png', 0),
(171, 22, 'data/post/post_22_1550948973.png', 0),
(172, 22, 'data/post/post_22_1550949004.png', 0),
(173, 22, 'data/post/post_22_1550949290.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
