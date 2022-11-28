-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 27, 2022 at 06:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `printbarcode`
--

CREATE TABLE `printbarcode` (
  `id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `margintop` varchar(10) NOT NULL,
  `marginleft` varchar(10) NOT NULL,
  `textalign` varchar(10) NOT NULL,
  `border` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printbarcode`
--

INSERT INTO `printbarcode` (`id`, `type`, `margintop`, `marginleft`, `textalign`, `border`) VALUES
(1, 'default', '400px', '0px', 'center', '2px'),
(2, 'manual', '300', '140', 'unset', '3');

-- --------------------------------------------------------

--
-- Table structure for table `printcred`
--

CREATE TABLE `printcred` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fontsizen` varchar(5) NOT NULL,
  `colorn` varchar(30) NOT NULL,
  `margintopn` varchar(10) NOT NULL,
  `marginleftn` varchar(10) NOT NULL,
  `texttransformn` varchar(15) NOT NULL,
  `textalignn` varchar(10) NOT NULL,
  `fontsized` varchar(5) NOT NULL,
  `colord` varchar(15) NOT NULL,
  `margintopd` varchar(10) NOT NULL,
  `marginleftd` varchar(10) NOT NULL,
  `texttransformd` varchar(10) NOT NULL,
  `textalignd` varchar(10) NOT NULL,
  `fontsizec` varchar(5) NOT NULL,
  `colorc` varchar(15) NOT NULL,
  `margintopc` varchar(10) NOT NULL,
  `marginleftc` varchar(10) NOT NULL,
  `texttransformc` varchar(10) NOT NULL,
  `textalignc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printcred`
--

INSERT INTO `printcred` (`id`, `type`, `fontsizen`, `colorn`, `margintopn`, `marginleftn`, `texttransformn`, `textalignn`, `fontsized`, `colord`, `margintopd`, `marginleftd`, `texttransformd`, `textalignd`, `fontsizec`, `colorc`, `margintopc`, `marginleftc`, `texttransformc`, `textalignc`) VALUES
(1, 'default', '16px', 'black', '1px', '140px', 'capitalize', 'unset', '16px', 'black', '1px', '140px', 'capitalize', 'unset', '16px', 'black', '1px', '140px', 'capitalize', 'unset'),
(2, 'manual', '20', 'black', '2', '140', 'uppercase', 'unset', '20', 'black', '2', '140', 'uppercase', 'unset', '16', 'red', '2', '140', 'uppercase', 'unset');

-- --------------------------------------------------------

--
-- Table structure for table `printpagesize`
--

CREATE TABLE `printpagesize` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `pagewidth` varchar(50) NOT NULL,
  `pageheight` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `printpagesize`
--

INSERT INTO `printpagesize` (`id`, `type`, `pagewidth`, `pageheight`) VALUES
(1, 'default', '101.6mm', '152.4mm'),
(2, 'manual', '101.6', '154');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date`) VALUES
(10, 'raj', 'raj@r.com', 'raj@123', '2022-10-11 00:00:00'),
(11, 'push', 'push@p.com', 'push@123', '2022-10-11 00:00:00'),
(12, 'q', 'q@q.com', '1234', '2022-10-11 00:00:00'),
(13, 'u', 'u@u.com', '1234', '2022-10-15 00:00:00'),
(14, 't', 't@t.com', '122345', '2022-10-15 00:00:00'),
(15, '77', 'rtyf@l.com', '4654sdggsdf', '2022-10-15 00:00:00'),
(16, 'dfxgsd', 'sdf@sf', 'sdgsdag', '2022-10-15 00:00:00'),
(17, 'jj', 'j@jj', '12345', '2022-10-16 00:00:00'),
(18, 'kamal', 'kamal@k.com', '12345', '2022-10-17 10:58:00'),
(19, 'pk', 'pk@k.com', '12345', '2022-10-21 20:55:00'),
(20, 'lala', 'lala@l.com', '1234', '2022-11-18 12:15:00'),
(21, 'lulu', 'lala@l.com', '1234', '2022-11-18 12:16:00'),
(22, 'lulu', 'lala@l.com', '1234', '2022-11-18 12:17:00'),
(23, 'a', 'a@gmail.com', '1234', '2022-11-21 14:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(4) NOT NULL,
  `barcode` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL,
  `type` varchar(15) NOT NULL,
  `creator_name` varchar(30) NOT NULL,
  `systemname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `barcode`, `name`, `designation`, `company`, `date`, `type`, `creator_name`, `systemname`) VALUES
(191, 'Or00191', 'O', 'O', 'O', '2022-10-28 19:44:00', 'Organiser', 'Q', 'o'),
(192, 'De00192', 'P', 'P', 'P', '2022-10-28 19:53:00', 'Delegate', 'Q', 'p'),
(193, 'De00193', 'K', 'K', 'K', '2022-10-28 19:55:00', 'Delegate', 'Q', 'k'),
(194, 'Vi00194', 'P', 'P', 'P', '2022-10-28 20:00:00', 'Visitor', 'Q', 'p'),
(195, 'Vi00195', 'K', 'K', 'K', '2022-10-28 20:01:00', 'Visitor', 'Q', 'k'),
(196, 'Vi00196', 'J', 'J', 'J', '2022-10-28 20:02:00', 'Visitor', 'Q', 'h'),
(197, 'Vi00197', 'L', 'L', 'Looooo', '2022-10-28 20:20:00', 'Visitor', 'Q', 'l'),
(198, 'Vi00198', 'J', 'J', 'Jiiii', '2022-10-28 20:22:00', 'Visitor', 'Q', 'h'),
(199, 'Vi00199', 'Kk', 'Kkk', 'Kk', '2022-10-28 20:24:00', 'Visitor', 'Q', 'jjj'),
(200, 'Vi00200', 'J', 'J', 'J', '2022-10-28 20:27:00', 'Visitor', 'Q', 'j'),
(201, 'Vi00201', 'S', 'S', 'S', '2022-10-28 22:20:00', 'Visitor', 'Q', 's'),
(202, 'De00202', 'A', 'A', 'A', '2022-10-28 22:36:00', 'Delegate', 'Q', 'a'),
(203, 'Vi00203', 'T', 'T', 'T', '2022-10-28 22:52:00', 'Visitor', 'Q', 't'),
(204, 'Vi00204', 'L', 'L', 'L', '2022-10-28 22:54:00', 'Visitor', 'Q', 'l'),
(205, 'Vi00205', 'W', 'W', 'W', '2022-10-28 22:55:00', 'Visitor', 'Q', 'w'),
(206, 'Vi00206', 'K', 'K', 'K', '2022-10-28 22:57:00', 'Visitor', 'Q', 'k'),
(207, 'De00207', 'Dd', 'Dd', 'Dd', '2022-10-28 22:59:00', 'Delegate', 'Q', 'dd'),
(208, 'Vi00208', 'A', 'A', 'A', '2022-10-28 23:00:00', 'Visitor', 'Q', 's'),
(510, 'Ex00209', 'Raman', 'CEO', 'Hindustan Petrol', '2022-11-07 10:45:00', 'Exhibitor', 'Q', 'sys1'),
(511, 'Ex00511', 'Raman Kumar', 'Asst.professor', 'Hindu College', '2022-11-07 10:45:00', 'Exhibitor', 'Q', 'sys1'),
(512, 'De00512', 'Kama Singh Raja', 'Asst. Eng.', 'Indu Engineer College', '2022-11-07 12:54:00', 'Delegate', 'Q', 'hekki'),
(513, 'Vi00513', 'Helo ', 'Ha', 'Hi', '2022-11-16 14:45:00', 'Visitor', 'Pk', 'sysy'),
(514, 'Vi00514', 'Asd', 'Sad', 'Sad', '2022-11-16 14:45:00', 'Visitor', 'Pk', 'sysy'),
(515, 'Vi00515', 'Sa', 'Sad', 'Ad', '2022-11-16 14:50:00', 'Visitor', 'Pk', 'd'),
(516, 'De00516', 'Ds', 'D', 'D', '2022-11-16 14:52:00', 'Delegate', 'Pk', 's'),
(517, 'Vi00517', 'D', 'D', 'D', '2022-11-16 14:54:00', 'Visitor', 'Pk', 'd'),
(518, 'Vi00518', 'D', '', 'G', '2022-11-16 14:56:00', 'Visitor', 'Pk', 'd'),
(519, 'Vi00519', 'L', 'L', 'L', '2022-11-16 14:57:00', 'Visitor', 'Pk', 's'),
(520, 'De00520', 'C', '', '', '2022-11-16 14:58:00', 'Delegate', 'Pk', 'c'),
(521, 'De00521', 'S', 'H', 'H', '2022-11-16 14:59:00', 'Delegate', 'Pk', 's'),
(522, 'Vi00522', 'S', 'C', 'C', '2022-11-16 15:01:00', 'Visitor', 'Pk', 's'),
(523, 'Vi00523', 'AS', '', '', '2022-11-16 15:04:00', 'Visitor', 'Pk', 'a'),
(524, 'Vi00524', 'SS', '', '', '2022-11-16 15:04:00', 'Visitor', 'Q', 'D'),
(525, 'De00525', 'L', 'L', 'L', '2022-11-16 15:18:00', 'Delegate', 'Q', 'd'),
(526, 'De00526', 'L', 'L', 'L', '2022-11-16 15:18:00', 'Delegate', 'Q', 'd'),
(527, 'De00527', 'L', 'L', 'L', '2022-11-16 15:18:00', 'Delegate', 'Q', 'd'),
(528, 'Vi00528', 'K', 'K', 'K', '2022-11-16 15:20:00', 'Visitor', 'Q', 'l'),
(529, 'De00529', 'L', 'L', 'L', '2022-11-16 15:22:00', 'Delegate', 'Q', 'o'),
(530, 'Vi00530', 'L', 'L', 'L', '2022-11-16 15:23:00', 'Visitor', 'Q', 'k'),
(531, 'Vi00531', 'P', 'P', 'P', '2022-11-16 15:25:00', 'Visitor', 'Q', 'l'),
(532, 'De00532', 'J', 'J', 'J', '2022-11-16 15:29:00', 'Delegate', 'Q', 'k'),
(533, 'Vi00533', 'Asdas', 'Adas', 'Asda', '2022-11-16 19:11:00', 'Visitor', 'Q', 'asd'),
(534, 'Vi00534', '', '', '', '2022-11-16 19:11:00', 'Visitor', 'Q', 'asd'),
(535, 'Vi00535', 'Dsd', 'Asd', 'Asd', '2022-11-16 19:12:00', 'Visitor', 'Q', 'sf'),
(536, 'Vi00536', 'Asdada', 'Asdas', 'Asd', '2022-11-16 19:12:00', 'Visitor', 'Q', 'sf'),
(537, 'De00537', 'K', 'K', 'K', '2022-11-16 21:08:00', 'Delegate', 'Q', 'ds'),
(538, 'De00538', 'K', 'K', 'K', '2022-11-16 21:08:00', 'Delegate', 'Q', 'ds'),
(539, 'De00539', 'K', 'K', 'K', '2022-11-16 21:08:00', 'Delegate', 'Q', 'ds'),
(540, 'De00540', 'K', 'K', 'K', '2022-11-16 21:08:00', 'Delegate', 'Q', 'ds'),
(541, 'De00541', 'K', 'K', 'K', '2022-11-16 21:08:00', 'Delegate', 'Q', 'ds'),
(542, 'Vi00542', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(543, 'Vi00543', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(544, 'Vi00544', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(545, 'Vi00545', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(546, 'Vi00546', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(547, 'Vi00547', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(548, 'Vi00548', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(549, 'Vi00549', 'Fg', 'V', 'V', '2022-11-16 21:11:00', 'Visitor', 'Q', ''),
(550, '00550', '', '', '', '2022-11-16 21:12:00', '', 'Q', ''),
(551, 'Vi00551', 'Qqqqqq', 'Qqqqqqq', 'Dddd', '2022-11-16 21:12:00', 'Visitor', 'Q', ''),
(552, 'Vi00552', 'Hhhhhhhh', '', '', '2022-11-16 21:14:00', 'Visitor', 'Q', ''),
(553, 'De00553', 'G', '', '', '2022-11-16 21:19:00', 'Delegate', 'Q', ''),
(554, 'Ex00554', 'D', '', '', '2022-11-16 21:20:00', 'Exhibitor', 'Q', ''),
(555, 'De00555', 'L', '', '', '2022-11-16 21:21:00', 'Delegate', 'Q', ''),
(556, 'Vi00556', 'G', '', '', '2022-11-16 21:22:00', 'Visitor', 'Q', ''),
(557, 'Vi00557', 'K', '', '', '2022-11-16 21:26:00', 'Visitor', 'Q', ''),
(558, 'Vi00558', 'P', '', '', '2022-11-16 21:27:00', 'Visitor', 'Q', ''),
(559, 'De00559', 'K', '', '', '2022-11-16 21:31:00', 'Delegate', 'Q', ''),
(560, 'Vi00560', 'L', '', '', '2022-11-16 21:32:00', 'Visitor', 'Q', ''),
(561, 'Vi00561', 'M', '', '', '2022-11-16 21:33:00', 'Visitor', 'Q', ''),
(562, 'De00562', 'P', '', '', '2022-11-16 21:35:00', 'Delegate', 'Q', ''),
(563, 'De00563', 'A', '', '', '2022-11-16 21:37:00', 'Delegate', 'Q', ''),
(564, 'De00564', 'A', '', '', '2022-11-16 21:37:00', 'Delegate', 'Q', ''),
(565, 'De00565', 'X', '', '', '2022-11-16 21:38:00', 'Delegate', 'Q', ''),
(566, 'Vi00566', 'Nn', '', '', '2022-11-16 21:39:00', 'Visitor', 'Q', ''),
(567, 'De00567', 'Kkkkkkk', '', '', '2022-11-16 21:40:00', 'Delegate', 'Q', ''),
(568, 'Vi00568', 'Rrrrrrrrrrrrrr', '', '', '2022-11-16 21:41:00', 'Visitor', 'Q', ''),
(569, 'Ex00569', 'Sdddd', 'G', 'G', '2022-11-16 21:42:00', 'Exhibitor', 'Q', ''),
(570, 'De00570', 'Jjjjjjjj', '', '', '2022-11-16 21:43:00', 'Delegate', 'Q', ''),
(571, 'Vi00571', 'Jjjjjjjjj', '', '', '2022-11-16 21:48:00', 'Visitor', 'Q', ''),
(572, 'De00572', 'Kkkkkkkkkk', '', '', '2022-11-16 21:53:00', 'Delegate', 'Q', ''),
(573, 'Vi00573', 'Bbbbbbbbbb', '', '', '2022-11-16 21:54:00', 'Visitor', 'Q', ''),
(574, 'Vi00574', 'Kkkkk', '', '', '2022-11-16 21:55:00', 'Visitor', 'Q', ''),
(575, 'Vi00575', 'Jjjjj', '', '', '2022-11-16 21:57:00', 'Visitor', 'Q', ''),
(576, 'De00576', 'D', '', '', '2022-11-16 22:07:00', 'Delegate', 'Q', ''),
(577, 'Vi00577', 'S', '', '', '2022-11-16 22:09:00', 'Visitor', 'Q', ''),
(578, 'Vi00578', 'S', '', '', '2022-11-16 22:10:00', 'Visitor', 'Q', ''),
(579, 'Vi00579', 'Ssssssss', '', '', '2022-11-16 22:12:00', 'Visitor', 'Q', ''),
(580, 'Vi00580', 'Eeeeeee', '', '', '2022-11-16 22:13:00', 'Visitor', 'Q', ''),
(581, 'Vi00581', 'Dd', 'D', 'D', '2022-11-16 22:14:00', 'Visitor', 'Q', ''),
(582, 'Vi00582', 'Ee', 'Ee', 'Ee', '2022-11-16 22:15:00', 'Visitor', 'Q', ''),
(583, 'Vi00583', 'Dd', 'Dd', 'D', '2022-11-16 22:16:00', 'Visitor', 'Q', ''),
(584, 'Vi00584', 'D', 'D', 'D', '2022-11-16 22:17:00', 'Visitor', 'Q', ''),
(585, 'Vi00585', 'D', 'D', 'D', '2022-11-16 22:18:00', 'Visitor', 'Q', ''),
(586, 'Vi00586', 'S', 'S', 'S', '2022-11-16 22:19:00', 'Visitor', 'Q', ''),
(587, 'Vi00587', 'D', 'D', 'D', '2022-11-16 22:20:00', 'Visitor', 'Q', ''),
(588, 'De00588', 'Ddd', 'Ffff', 'Hhhh', '2022-11-16 22:24:00', 'Delegate', 'Q', ''),
(589, 'Vi00589', 'Name', 'Designation', 'Company', '2022-11-16 22:28:00', 'Visitor', 'Q', ''),
(590, 'Vi00590', 'Ddddd', 'Dddddd', 'Ddddd', '2022-11-16 22:29:00', 'Visitor', 'Q', ''),
(591, 'De00591', 'Nnnnnn', 'Dddddd', 'Ccccccccccc', '2022-11-16 22:30:00', 'Delegate', 'Q', ''),
(592, 'Vi00592', 'Fff', 'Fff', 'Ff', '2022-11-16 22:33:00', 'Visitor', 'Q', ''),
(593, 'Vi00593', 'Nnnnn', 'Ddddd', 'Ccccc', '2022-11-16 22:33:00', 'Visitor', 'Q', ''),
(594, 'Vi00594', 'Nn', 'Dd', 'Cc', '2022-11-16 22:34:00', 'Visitor', 'Q', ''),
(595, 'Vi00595', 'N', 'D', 'C', '2022-11-16 22:34:00', 'Visitor', 'Q', ''),
(596, 'Vi00596', 'Nn', 'Dd', 'Cc', '2022-11-16 22:37:00', 'Visitor', 'Q', ''),
(597, 'De00597', 'Nnn', 'Dd', 'Cc', '2022-11-16 22:56:00', 'Delegate', 'Pk', ''),
(598, 'Vi00598', 'N', 'D', 'C', '2022-11-16 23:02:00', 'Visitor', 'Pk', ''),
(599, 'Vi00599', 'Name', 'Designation', 'Comapany', '2022-11-16 23:13:00', 'Visitor', 'Pk', ''),
(600, 'Vi00600', 'N', 'D', 'C', '2022-11-16 23:14:00', 'Visitor', 'Pk', ''),
(601, '00601', 'Name Anme', 'Des Des Des ', 'Com  Com Com', '2022-11-16 23:14:00', '', 'Pk', ''),
(602, '00602', 'V', 'V', 'V', '2022-11-16 23:15:00', '', 'Pk', ''),
(603, '00603', '', '', '', '2022-11-16 23:15:00', '', 'Pk', ''),
(604, 'Vi00604', 'Nn', 'Dd', 'Cc', '2022-11-16 23:24:00', 'Visitor', 'Pk', ''),
(605, '00605', 'Nn', 'Dd', 'Cc', '2022-11-16 23:25:00', '', 'Pk', ''),
(606, 'Vi00606', 'N', 'N', 'N', '2022-11-16 23:26:00', 'Visitor', 'Pk', ''),
(607, 'Vi00607', 'N', 'N', 'N', '2022-11-16 23:27:00', 'Visitor', 'Pk', ''),
(608, '00608', 'B', 'B', 'B', '2022-11-16 23:29:00', '', 'Pk', ''),
(609, '00609', 'B', 'B', '', '2022-11-16 23:32:00', '', 'Pk', ''),
(610, 'Vi00610', 'D', 'D', 'D', '2022-11-16 23:33:00', 'Visitor', 'Pk', ''),
(611, 'Vi00611', 'J', 'J', 'J', '2022-11-17 14:23:00', 'Visitor', 'Q', ''),
(612, '00612', 'K', 'K', 'K', '2022-11-17 14:24:00', '', 'Q', ''),
(613, '00613', 'N', 'N', 'N', '2022-11-17 14:25:00', '', 'Q', ''),
(614, '00614', 'N', 'N', 'N', '2022-11-17 14:25:00', '', 'Q', ''),
(615, '00615', 'L', 'L', 'L', '2022-11-17 14:26:00', '', 'Q', ''),
(616, '00616', 'K', 'K', 'K', '2022-11-17 14:28:00', '', 'Q', ''),
(617, 'Vi00617', 'O', 'O', 'O', '2022-11-17 14:29:00', 'Visitor', 'Q', ''),
(618, '00618', 'K', 'K', 'K', '2022-11-17 14:30:00', '', 'Q', ''),
(619, '00619', 'L', 'L', 'L', '2022-11-17 14:31:00', '', 'Q', ''),
(620, '00620', 'E', 'E', 'E', '2022-11-17 14:32:00', '', 'Q', ''),
(621, '00621', 'Jjjjjjjjjjj', 'Jjjjjjjjjj', 'Jjjjjjjjjjj', '2022-11-17 14:48:00', '', 'Q', ''),
(622, '00622', '', '', '', '2022-11-17 14:50:00', '', 'Q', ''),
(623, '00623', '', '', '', '2022-11-17 14:50:00', '', 'Q', ''),
(624, '00624', 'Jjjjjjj', 'J', 'Kk', '2022-11-17 14:50:00', '', 'Q', ''),
(625, '00625', 'Kkkkkkkk', 'Kkkkkkkkk', 'Kkkkkkkkk', '2022-11-17 14:52:00', '', 'Q', ''),
(626, '00626', 'Kkk', 'Kkkkkkkkk', 'Kkkkkkkkk', '2022-11-17 14:52:00', '', 'Q', ''),
(627, '00627', 'Kkk', 'Iiiiiiiiiiiiiii', 'O', '2022-11-17 14:53:00', '', 'Q', ''),
(628, '00628', 'Lllllllllllllllllllllll Lllllllll', 'Ll ', 'Lllllll L L', '2022-11-17 14:54:00', '', 'Q', ''),
(629, '00629', 'Kkkkkkkkkkkkk', 'Kk', 'Kkkkkk', '2022-11-17 14:55:00', '', 'Q', ''),
(630, '00630', 'Oooooooooooo', 'O', 'Ooooooo', '2022-11-17 14:56:00', '', 'Q', ''),
(631, '00631', '', '', '', '2022-11-17 14:57:00', '', 'Q', ''),
(632, '00632', '', '', '', '2022-11-17 14:57:00', '', 'Q', ''),
(633, '00633', '', '', '', '2022-11-17 14:58:00', '', 'Q', ''),
(634, '00634', '', '', '', '2022-11-17 15:01:00', '', 'Q', ''),
(635, '00635', '', '', '', '2022-11-17 15:01:00', '', 'Q', ''),
(636, '00636', '', '', '', '2022-11-17 15:03:00', '', 'Q', ''),
(637, '00637', '', '', '', '2022-11-17 15:03:00', '', 'Q', ''),
(638, '00638', '', '', '', '2022-11-17 15:04:00', '', 'Q', ''),
(639, '00639', 'Kkkkkkk Kkkkkkkk', 'Kkkkkko Ooooooooooooooo', 'Oo Iiiiiiiiiiiiii', '2022-11-17 15:05:00', '', 'Q', ''),
(640, '00640', 'Ooooooooooooooo', 'Ollllllllllllllllll', ';;;;;;;;;;;;;;;;;;;;;;;', '2022-11-17 15:06:00', '', 'Q', ''),
(641, 'De00641', 'Del Del ', 'Des Des', 'DFL Dde', '2022-11-18 23:01:00', 'Delegate', 'Pk', 'sys1'),
(642, '00642', 'D', 'D', 'D', '2022-11-18 23:07:00', '', 'Pk', ''),
(643, '00643', 'N', 'D', 'C', '2022-11-18 23:07:00', '', 'Pk', ''),
(644, 'Vi00644', 'N', 'D', 'C', '2022-11-18 23:08:00', 'Visitor', 'Pk', ''),
(645, '00645', 'N', 'D', 'C', '2022-11-18 23:09:00', '', 'Pk', ''),
(646, '00646', 'N', 'D', 'C', '2022-11-18 23:09:00', '', 'Pk', ''),
(647, '00647', 'N', 'D', 'C', '2022-11-18 23:10:00', '', 'Pk', ''),
(648, 'Ex00648', 'N', 'D', 'C', '2022-11-18 23:10:00', 'Exhibitor', 'Pk', ''),
(649, '00649', 'N', 'Dd', 'Cc', '2022-11-18 23:11:00', '', 'Pk', ''),
(650, 'Vi00650', 'Nnnnnnn', 'Dddddddddd', 'Ccccccccccc', '2022-11-18 23:19:00', 'Visitor', 'Pk', ''),
(651, '00651', 'N', 'D', 'C', '2022-11-18 23:20:00', '', 'Q', ''),
(652, 'Vi00652', 'Namw', 'Des', 'Com', '2022-11-21 21:06:00', 'Visitor', 'Pk', ''),
(653, 'Vi00653', 'Nnn', 'Ddd', 'Ccc', '2022-11-21 21:38:00', 'Visitor', 'Pk', ''),
(654, 'Or00654', 'Nnnnnnnnnnn', 'Dddddddddddddd', 'Ccccccccccccccc', '2022-11-21 21:40:00', 'Organiser', 'Pk', ''),
(655, 'Vi00655', 'Ff', 'Dd', 'Ff', '2022-11-21 21:40:00', 'Visitor', 'Pk', ''),
(656, '00656', 'Dd', 'Dd', 'Dd', '2022-11-21 21:41:00', '', 'Pk', ''),
(657, 'Vi00657', 'Ee', 'Dd', 'Ss', '2022-11-21 21:41:00', 'Visitor', 'Pk', ''),
(658, 'De00658', 'Dd', 'Ss', 'Cc', '2022-11-22 21:21:00', 'Delegate', 'Q', 'sys 1'),
(659, 'In00659', 'Dddddd', 'Sssssssss', 'Ccccccccc', '2022-11-22 21:23:00', 'Invitee', 'Q', 'dd'),
(660, 'De00660', '', '', '', '2022-11-22 21:25:00', 'Delegate', 'Q', ''),
(661, 'De00661', '', '', '', '2022-11-22 21:25:00', 'Delegate', 'A', ''),
(662, 'In00662', '', '', '', '2022-11-22 21:27:00', 'Invitee', 'Q', ''),
(663, 'In00663', 'As', 'Sa', 'A', '2022-11-22 21:28:00', 'Invitee', 'A', ''),
(664, 'In00664', 'As', 'Sa', 'A', '2022-11-22 21:28:00', 'Invitee', 'A', ''),
(665, 'In00665', 'As', 'Sa', 'A', '2022-11-22 21:28:00', 'Invitee', 'A', ''),
(666, 'In00666', 'As', 'Sa', 'A', '2022-11-22 21:28:00', 'Invitee', 'A', ''),
(667, 'In00667', 'As', 'Sa', 'A', '2022-11-22 21:28:00', 'Invitee', 'A', ''),
(668, 'Vi00668', 'S', 'S', 'S', '2022-11-22 21:28:00', 'Visitor', 'A', ''),
(669, 'Vi00669', '', '', '', '2022-11-22 21:29:00', 'Visitor', 'A', ''),
(670, 'Ex00670', '', '', '', '2022-11-22 21:29:00', 'Exhibitor', 'A', ''),
(671, 'Ex00671', '', '', '', '2022-11-22 21:32:00', 'Exhibitor', 'A', ''),
(672, 'Vi00672', 'Sss', 'Ss', 'Ss', '2022-11-22 21:32:00', 'Visitor', 'A', ''),
(673, 'In00673', 'S', 'S', 'S', '2022-11-22 21:33:00', 'Invitee', 'Q', ''),
(674, 'Or00674', '', '', '', '2022-11-22 21:34:00', 'Organiser', 'Q', ''),
(675, 'De00675', 'W', 'W', 'W', '2022-11-22 21:35:00', 'Delegate', 'Q', ''),
(676, 'De00676', 'W', 'W', 'W', '2022-11-22 21:35:00', 'Delegate', 'Q', ''),
(677, 'Ex00677', '', '', '', '2022-11-22 21:36:00', 'Exhibitor', 'Q', ''),
(678, 'Ex00678', 'Fas', 'Asfsa', 'Asd', '2022-11-22 21:36:00', 'Exhibitor', 'Q', ''),
(679, 'Ex00679', 'Fas', 'Asfsa', 'Asd', '2022-11-22 21:36:00', 'Exhibitor', 'Q', ''),
(680, 'De00680', 'W', 'W', 'W', '2022-11-22 21:39:00', 'Delegate', 'Q', ''),
(681, 'Vi00681', 'Asaksfba', 'Asd', 'Asd', '2022-11-22 21:41:00', 'Visitor', 'Q', ''),
(682, 'Vi00682', 'S', 'D', 'F', '2022-11-22 21:46:00', 'Visitor', 'Q', ''),
(683, 'Vi00683', '', '', '', '2022-11-22 21:47:00', 'Visitor', 'Q', ''),
(684, 'De00684', 'Q', 'W', 'S', '2022-11-22 21:48:00', 'Delegate', 'Q', ''),
(685, 'Vi00685', '', '', '', '2022-11-22 21:54:00', 'Visitor', 'Q', ''),
(686, 'Vi00686', '', '', '', '2022-11-22 21:56:00', 'Visitor', 'Q', ''),
(687, 'De00687', 'S', 'S', 'S', '2022-11-22 21:56:00', 'Delegate', 'Q', ''),
(688, 'Vi00688', 'D', 'D', 'D', '2022-11-22 21:57:00', 'Visitor', 'Q', ''),
(689, 'Ex00689', 'A', 'A', 'A', '2022-11-22 21:57:00', 'Exhibitor', 'Q', ''),
(690, 'Vi00690', 'DA', 'Ad', 'AD', '2022-11-22 22:00:00', 'Visitor', 'Q', ''),
(691, 'Vi00691', 'W', 'W', 'W', '2022-11-22 22:01:00', 'Visitor', 'Q', ''),
(692, 'Vi00692', 'W', 'W', 'W', '2022-11-22 22:01:00', 'Visitor', 'Q', ''),
(693, 'Vi00693', 'W', 'F', 'G', '2022-11-22 22:02:00', 'Visitor', 'Q', ''),
(694, 'De00694', '', '', '', '2022-11-22 22:02:00', 'Delegate', 'Q', ''),
(695, 'De00695', '', '', '', '2022-11-22 22:02:00', 'Delegate', 'Q', ''),
(696, 'Ex00696', '', '', '', '2022-11-22 22:03:00', 'Exhibitor', 'Q', ''),
(697, 'Ex00697', 'AS', 'ASD', 'AD', '2022-11-22 22:03:00', 'Exhibitor', 'Q', ''),
(698, 'Vi00698', 'SAD', 'FAFS', 'SADF', '2022-11-22 22:04:00', 'Visitor', 'Q', ''),
(699, 'De00699', 'SA', 'AS', 'AS', '2022-11-22 22:05:00', 'Delegate', 'Q', ''),
(700, 'Vi00700', 'AS', 'ASD', 'ASD', '2022-11-22 22:06:00', 'Visitor', 'Q', ''),
(701, 'De00701', 'Kamm Singh Raja', 'Dee Jsd ', 'Sdan Asjn', '2022-11-24 22:27:00', 'Delegate', 'Pk', 'h'),
(702, 'Vi00702', 'As', 'As', 'As', '2022-11-25 23:31:00', 'Visitor', 'Q', ''),
(703, 'De00703', 'XczZ', 'ZC', 'Zxc', '2022-11-26 12:20:00', 'Delegate', 'Pk', 'zxc'),
(704, 'De00704', 'XczZ', 'ZC', 'Zxc', '2022-11-26 12:20:00', 'Delegate', 'Pk', 'zxc'),
(705, 'De00705', 'XczZ', 'ZC', 'Zxc', '2022-11-26 12:20:00', 'Delegate', 'Pk', 'zxc'),
(706, 'De00706', 'Sa', 'As', '', '2022-11-26 12:21:00', 'Delegate', 'Pk', 'sad'),
(707, 'Ex00707', 'Sad', 'Asd', 'Asd', '2022-11-26 12:22:00', 'Exhibitor', 'Pk', ''),
(708, 'De00708', 'K', 'Kk', 'Kkk', '2022-11-26 12:26:00', 'Delegate', 'Pk', 'ss'),
(709, 'De00709', 'K', 'Kk', 'Kkk', '2022-11-26 12:26:00', 'Delegate', 'Pk', 'ss'),
(710, 'Vi00710', 'Sa', 'A', 'A', '2022-11-26 12:27:00', 'Visitor', 'Pk', 's'),
(711, 'Vi00711', 'Sa', 'Sa', 'Das', '2022-11-26 12:27:00', 'Visitor', 'Pk', ''),
(712, 'Vi00712', 'As', 'DA', 'DA', '2022-11-26 12:31:00', 'Visitor', 'Pk', 'asd'),
(713, 'Vi00713', 'AD', 'AD', 'DA', '2022-11-26 12:33:00', 'Visitor', 'Pk', 'SDA'),
(714, 'Vi00714', 'Aaa', 'Aaa', 'Aaa', '2022-11-26 22:47:00', 'Visitor', 'Q', 'sss'),
(715, 'Vi00715', 'Aaa', 'Aaa', 'Aaa', '2022-11-26 22:47:00', 'Visitor', 'Q', 'sss'),
(716, 'Ex00716', 'As', 'A', 'A', '2022-11-26 22:49:00', 'Exhibitor', 'Q', 'sa'),
(717, 'Vi00717', 'S', 'Ss', '', '2022-11-27 19:05:00', 'Visitor', 'Q', 'ss');

-- --------------------------------------------------------

--
-- Table structure for table `visitplace`
--

CREATE TABLE `visitplace` (
  `id` int(11) NOT NULL,
  `barcode` varchar(15) NOT NULL,
  `date` datetime DEFAULT NULL,
  `scanby` varchar(30) DEFAULT NULL,
  `scanarea` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitplace`
--

INSERT INTO `visitplace` (`id`, `barcode`, `date`, `scanby`, `scanarea`) VALUES
(46, 'vi0093', '2022-10-23 20:12:00', 'Pk', 'Sys1'),
(47, 'vi0093', '2022-10-23 20:14:00', 'Pk', 'Vi0093'),
(48, 'vi0096', '2022-10-23 20:26:00', 'Pk', 'Hfs Sdkjfk'),
(49, 'de00136', '2022-10-24 12:46:00', 'Pk', 'Sys1'),
(50, 'de00137', '2022-10-24 12:47:00', 'Pk', 'Sys1'),
(51, 'de00136', '2022-10-24 14:19:00', 'PK', 'Room 1 In Hall'),
(52, 'vi00200', '2022-10-29 19:11:00', 'Q', 'Vi0093'),
(53, 'vi00200', '2022-10-29 19:12:00', 'Q', 'Sdfs'),
(54, 'vi00204', '2022-11-26 10:57:00', 'Pk', 'Fill'),
(55, 'vi00204', '2022-11-26 10:58:00', 'Pk', 'Fill'),
(56, 'vi00204 ', '2022-11-26 11:14:00', 'Pk', 'Fill'),
(57, 'vi00204', '2022-11-26 11:15:00', 'Pk', 'Fill'),
(58, 'vi00204', '2022-11-26 11:16:00', 'Pk', 'Fill'),
(59, 'vi00204 ', '2022-11-26 11:26:00', 'Pk', ''),
(60, 'vi00204', '2022-11-26 11:27:00', 'Pk', ''),
(61, 'vi00204', '2022-11-26 11:27:00', 'Pk', ''),
(62, 'vi00204 ', '2022-11-26 11:28:00', 'Pk', ''),
(63, 'vi00204', '2022-11-26 11:30:00', 'Pk', 'Uuuu'),
(64, 'vi00204', '2022-11-26 11:31:00', 'Pk', 'Uuuu'),
(65, 'vi00204', '2022-11-26 11:31:00', 'Pk', 'Uuuu'),
(66, 'De00193', '2022-11-26 12:14:00', 'Pk', 'Asda'),
(67, 'De00193 ', '2022-11-26 12:15:00', 'Pk', 'Ooo'),
(68, 'De00193 ', '2022-11-26 12:16:00', 'Pk', 'Ooo'),
(69, 'De00193 ', '2022-11-26 12:16:00', 'Pk', 'Ooo'),
(70, 'De00193', '2022-11-26 12:17:00', 'Pk', 'Ooo'),
(71, 'Vi00201', '2022-11-27 23:12:00', 'Q', 'Asa'),
(72, 'Vi00201', '2022-11-27 23:12:00', 'Q', 'Asa'),
(73, 'Vi00201', '2022-11-27 23:12:00', 'Q', 'Asa'),
(74, 'Vi00201', '2022-11-27 23:14:00', 'Q', 'Ss'),
(75, 'Vi00201', '2022-11-27 23:14:00', 'Q', 'Ss'),
(76, 'Vi00201', '2022-11-27 23:15:00', 'Q', 'Ss'),
(77, 'De00202', '2022-11-27 23:15:00', 'Q', 'Ss'),
(78, 'De00202', '2022-11-27 23:15:00', 'Q', 'Ss'),
(79, 'Vi00201', '2022-11-27 23:15:00', 'Q', 'Ss'),
(80, 'Ex00209', '2022-11-27 23:15:00', 'Q', 'Ss'),
(81, 'De00512', '2022-11-27 23:17:00', 'Q', 'Aa'),
(82, 'Or00191', '2022-11-27 23:18:00', 'Q', 'Aa'),
(83, 'Vi00195', '2022-11-27 23:18:00', 'Q', 'Aa'),
(84, 'De00207', '2022-11-27 23:18:00', 'Q', 'Aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `printbarcode`
--
ALTER TABLE `printbarcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printcred`
--
ALTER TABLE `printcred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printpagesize`
--
ALTER TABLE `printpagesize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitplace`
--
ALTER TABLE `visitplace`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `printbarcode`
--
ALTER TABLE `printbarcode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `printcred`
--
ALTER TABLE `printcred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `printpagesize`
--
ALTER TABLE `printpagesize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- AUTO_INCREMENT for table `visitplace`
--
ALTER TABLE `visitplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
