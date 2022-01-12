-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 01:51 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10041508_mm`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmember`
--

CREATE TABLE `addmember` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'NOT NULL',
  `phone` varchar(20) DEFAULT NULL,
  `blood` varchar(100) NOT NULL,
  `address` varchar(80) NOT NULL,
  `email` text NOT NULL,
  `rent` float NOT NULL DEFAULT 0,
  `net` float DEFAULT 0,
  `gass` float NOT NULL DEFAULT 0,
  `khala` float NOT NULL DEFAULT 0,
  `water` float NOT NULL DEFAULT 0,
  `current1` float NOT NULL DEFAULT 0,
  `others` float NOT NULL DEFAULT 0,
  `fine` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmember`
--

INSERT INTO `addmember` (`id`, `name`, `phone`, `blood`, `address`, `email`, `rent`, `net`, `gass`, `khala`, `water`, `current1`, `others`, `fine`) VALUES
(11, 'Ismayel Hossen', '01952152883', 'ismayelhossen123@gmail.com', 'Comilla', 'black@gmail.com', 1712, 112, 100, 322, 0, 0, 0, 0),
(12, 'Ismayel Hossen', '01831426198', '0+', 'Comilla', 'kawsar@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Zahid Hasan', '01952152884', 'AB+', 'Dhaka', 'kawsar@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Khaled Hasan Manna', '01755260752', 'khaledhasanmanna011@gmail.com', 'Rangpur', 'black@gmail.com', 1512, 112, 100, 322, 0, 0, 0, 0),
(15, 'Abdullah Al Mamun', '01626311400', '', 'Tangail', 'black@gmail.com', 1046, 112, 100, 322, 0, 0, 0, 0),
(17, 'Wahidul Hasan Pial', '01777208881', '', 'Mymensingh', 'black@gmail.com', 1046, 112, 100, 322, 0, 0, 0, 0),
(18, 'Azharul Islam Sajeeb', '01631268680', '', 'Mymensingh', 'black@gmail.com', 1046, 112, 100, 322, 0, 0, 0, 0),
(19, 'Zahid Hasan', '01517140368', '', 'Dhaka', 'black@gmail.com', 1046, 112, 100, 322, 0, 0, 0, 0),
(20, 'Pritom Saha', '01714230981', '', 'Rangpur', 'black@gmail.com', 1046, 112, 100, 322, 0, 0, 0, 50),
(21, 'Ismayel Hossen', '01952152880', '0+', 'Comilla', 'ismayelhossen123@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Zahid Hasan', '01952152881', 'A+', 'Dhaka', 'ismayelhossen123@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'Tuhin', '01952152887', 'golamkibriatuhin4@gmail.com', '', 'golamkibriatuhin4@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Al Amin Complain boy', '01952152885', 'salman131515@gmail.com', 'abcdef fghd', 'black@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'Shanto Joy', '01761155089', '', '', 'shantobd.joy@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Abdullah Al Mamun', '01313363653', 'abdullah.mamun@dsinnovators.com', 'Dhaka, Bangladesh', 'wazidullahmurad@gmail.com', 2500, 0, 0, 850, 0, 0, 0, 0),
(31, 'AL AMIN', '01558996238', '', 'Phulpur, Mymensingh', 'wazidullahmurad@gmail.com', 2500, 0, 0, 300, 0, 0, 0, 0),
(32, 'Wazid Ullah Murad', '01313363649', '', 'Mymensingh', 'wazidullahmurad@gmail.com', 2500, 0, 0, 850, 0, 0, 0, 0),
(52, 'Wazid Ullah Murad', '01685222158', '', '', 'black@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0),
(53, 'MI Rony', '01521710356', '', '', 'ronyismayel@gmail.com', 1000, 0, 488, 500, 0, 0, 0, 0),
(54, 'ISMAYEL HOSSEN', '01323673048', '', '', 'ronyismayel@gmail.com', 1000, 0, 488, 500, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user`, `password`, `id`) VALUES
('ismayelhossen123@gmail.com', 'ismayel45012', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bazarcost`
--

CREATE TABLE `bazarcost` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `email` varchar(200) NOT NULL,
  `date1` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bazarcost`
--

INSERT INTO `bazarcost` (`id`, `amount`, `email`, `date1`, `name`, `phone`) VALUES
(340, 10000, 'black@gmail.com', '08/20/2021', 'Khaled Hasan Manna', '01755260752'),
(358, 870, 'wazidullahmurad@gmail.com', '10/07/2021', 'Wazid Ullah Murad', '01313363649'),
(359, 131, 'wazidullahmurad@gmail.com', '10/07/2021', 'Wazid Ullah Murad', '01313363649'),
(360, 200, 'wazidullahmurad@gmail.com', '10/08/2021', 'AL AMIN', '01558996238'),
(361, 440, 'wazidullahmurad@gmail.com', '10/13/2021', 'Abdullah Al Mamun', '01313363653'),
(363, 480, 'ronyismayel@gmail.com', '10/18/2021', 'ISMAYEL HOSSEN', '01323673048'),
(364, 170, 'ronyismayel@gmail.com', '10/19/2021', 'ISMAYEL HOSSEN', '01323673048'),
(365, 100, 'ronyismayel@gmail.com', '10/20/2021', 'ISMAYEL HOSSEN', '01323673048'),
(366, 130, 'ronyismayel@gmail.com', '10/20/2021', 'MI Rony', '01521710356'),
(367, 215, 'ronyismayel@gmail.com', '11/21/2021', 'MI Rony', '01521710356'),
(368, 160, 'ronyismayel@gmail.com', '10/22/2021', 'MI Rony', '01521710356'),
(369, 35, 'ronyismayel@gmail.com', '10/23/2021', 'ISMAYEL HOSSEN', '01323673048'),
(370, 340, 'wazidullahmurad@gmail.com', '10/24/2021', 'Abdullah Al Mamun', '01313363653'),
(371, 75, 'ronyismayel@gmail.com', '10/24/2021', 'ISMAYEL HOSSEN', '01323673048'),
(372, 290, 'wazidullahmurad@gmail.com', '10/26/2021', 'Wazid Ullah Murad', '01313363649'),
(373, 215, 'ronyismayel@gmail.com', '10/22/2021', 'MI Rony', '01521710356'),
(374, 430, 'ronyismayel@gmail.com', '10/23/2021', 'MI Rony', '01521710356'),
(375, 200, 'wazidullahmurad@gmail.com', '10/29/2021', 'Wazid Ullah Murad', '01313363649'),
(376, 230, 'wazidullahmurad@gmail.com', '10/31/2021', 'Abdullah Al Mamun', '01313363653');

-- --------------------------------------------------------

--
-- Table structure for table `bazardate`
--

CREATE TABLE `bazardate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `date1` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `text1` text NOT NULL,
  `identiy` varchar(200) NOT NULL,
  `time1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `email`, `phone`, `text1`, `identiy`, `time1`) VALUES
(112, 'black@gmail.com', '01952152883', 'hi', 'member', '2019-07-16 03:52:17'),
(113, 'black@gmail.com', '01952152883', 'jklkljl', 'Manager', '2019-07-16 03:52:53'),
(114, 'black@gmail.com', 'true', '######@@@@@@@@@@#222222', 'Manager', '2019-11-18 19:22:28'),
(115, 'black@gmail.com', ' 964345334', '###########$$$$$$$$$$^^^^^^^^^^^^^^^^^^^^^^', 'Manager', '2019-11-18 19:23:10'),
(116, 'black@gmail.com', '01952152883', 'fuck off', 'Manager', '2019-12-28 17:36:50'),
(117, 'black@gmail.com', '01685222158', 'hi\r\n', 'Manager', '2020-02-06 20:25:04'),
(118, 'black@gmail.com', '01952152883', 'ggfgh', 'member', '2020-10-30 04:40:23'),
(119, 'black@gmail.com', '01952152883', 'vjfhgfhg', 'Manager', '2021-03-13 04:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `chat1`
--

CREATE TABLE `chat1` (
  `id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text1` text COLLATE utf8_unicode_ci NOT NULL,
  `identiy` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time1` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat1`
--

INSERT INTO `chat1` (`id`, `email`, `phone`, `text1`, `identiy`, `time1`) VALUES
(4, 'black@gmail.com', NULL, 'Fuck Off', 'user', '2019-10-05 15:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `it` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `meal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `phone` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `date1` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`phone`, `name`, `amount`, `date1`, `id`, `email`) VALUES
('01755260752', 'Khaled Hasan Manna', 10000, '08/20/2021', 322, 'black@gmail.com'),
('01313363649', 'Wazid Ullah Murad', 870, '10/07/2021', 340, 'wazidullahmurad@gmail.com'),
('01313363649', 'Wazid Ullah Murad', 131, '10/07/2021', 341, 'wazidullahmurad@gmail.com'),
('01558996238', 'AL AMIN', 200, '10/08/2021', 342, 'wazidullahmurad@gmail.com'),
('01313363653', 'Abdullah Al Mamun', 440, '10/13/2021', 343, 'wazidullahmurad@gmail.com'),
('01323673048', 'ISMAYEL HOSSEN', 480, '10/18/2021', 345, 'ronyismayel@gmail.com'),
('01323673048', 'ISMAYEL HOSSEN', 170, '10/19/2021', 346, 'ronyismayel@gmail.com'),
('01323673048', 'ISMAYEL HOSSEN', 100, '10/20/2021', 347, 'ronyismayel@gmail.com'),
('01521710356', 'MI Rony', 130, '10/20/2021', 348, 'ronyismayel@gmail.com'),
('01521710356', 'MI Rony', 215, '11/21/2021', 349, 'ronyismayel@gmail.com'),
('01521710356', 'MI Rony', 160, '10/22/2021', 350, 'ronyismayel@gmail.com'),
('01323673048', 'ISMAYEL HOSSEN', 35, '10/23/2021', 351, 'ronyismayel@gmail.com'),
('01313363653', 'Abdullah Al Mamun', 340, '10/24/2021', 352, 'wazidullahmurad@gmail.com'),
('01323673048', 'ISMAYEL HOSSEN', 75, '10/24/2021', 353, 'ronyismayel@gmail.com'),
('01313363649', 'Wazid Ullah Murad', 290, '10/26/2021', 354, 'wazidullahmurad@gmail.com'),
('01521710356', 'MI Rony', 215, '10/22/2021', 355, 'ronyismayel@gmail.com'),
('01521710356', 'MI Rony', 430, '10/23/2021', 356, 'ronyismayel@gmail.com'),
('01313363649', 'Wazid Ullah Murad', 200, '10/29/2021', 357, 'wazidullahmurad@gmail.com'),
('01313363653', 'Abdullah Al Mamun', 230, '10/31/2021', 358, 'wazidullahmurad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `duepaid`
--

CREATE TABLE `duepaid` (
  `id` int(11) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `due` float DEFAULT NULL,
  `date1` varchar(255) DEFAULT NULL,
  `paid` float DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duepaid`
--

INSERT INTO `duepaid` (`id`, `phone`, `name`, `due`, `date1`, `paid`, `comment`, `email`) VALUES
(54, '01631268680', 'Azharul Islam Sajeeb', 90, '17/10/20', 0, '90   Tk Due .', 'black@gmail.com'),
(55, '01777208881', 'Wahidul Hasan Pial', 770, '16/11/20', 0, '770   Tk Due .', 'black@gmail.com'),
(56, '01626311400', 'Abdullah Al Mamun', 352, '17/10/20', 0, '352   Tk Due .', 'black@gmail.com'),
(57, '01777208881', 'Wahidul Hasan Pial', 0, '10/12/20', 770, '770   Tk Paid Thanks .New Due is:0', 'black@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mealcount`
--

CREATE TABLE `mealcount` (
  `phone` varchar(200) NOT NULL,
  `meal` float NOT NULL,
  `date1` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealcount`
--

INSERT INTO `mealcount` (`phone`, `meal`, `date1`, `email`, `id`) VALUES
('01761155089', 3, '02/06/2021', 'shantobd.joy@gmail.com', 3328),
('01952152883', 6, '08/20/2021', 'black@gmail.com', 4368),
('01755260752', 3, '08/20/2021', 'black@gmail.com', 4369),
('01626311400', 2.5, '08/20/2021', 'black@gmail.com', 4370),
('01777208881', 2.5, '08/20/2021', 'black@gmail.com', 4371),
('01631268680', 3, '08/20/2021', 'black@gmail.com', 4372),
('01517140368', 3, '08/20/2021', 'black@gmail.com', 4373),
('01714230981', 3, '08/20/2021', 'black@gmail.com', 4374),
('01952152885', 2, '08/20/2021', 'black@gmail.com', 4375),
('01685222158', 2, '08/20/2021', 'black@gmail.com', 4376),
('01313363653', 2, '10/07/2021', 'wazidullahmurad@gmail.com', 4377),
('01558996238', 2, '10/07/2021', 'wazidullahmurad@gmail.com', 4378),
('01313363649', 4, '10/07/2021', 'wazidullahmurad@gmail.com', 4379),
('01313363653', 1, '10/08/2021', 'wazidullahmurad@gmail.com', 4380),
('01558996238', 3, '10/08/2021', 'wazidullahmurad@gmail.com', 4381),
('01313363649', 2, '10/08/2021', 'wazidullahmurad@gmail.com', 4382),
('01313363653', 2, '10/09/2021', 'wazidullahmurad@gmail.com', 4383),
('01558996238', 0, '10/09/2021', 'wazidullahmurad@gmail.com', 4384),
('01313363649', 0, '10/09/2021', 'wazidullahmurad@gmail.com', 4385),
('01313363653', 2, '10/10/2021', 'wazidullahmurad@gmail.com', 4386),
('01558996238', 1, '10/10/2021', 'wazidullahmurad@gmail.com', 4387),
('01313363649', 0, '10/10/2021', 'wazidullahmurad@gmail.com', 4388),
('01313363653', 2, '10/13/2021', 'wazidullahmurad@gmail.com', 4389),
('01558996238', 0, '10/13/2021', 'wazidullahmurad@gmail.com', 4390),
('01313363649', 2, '10/13/2021', 'wazidullahmurad@gmail.com', 4391),
('01521710356', 0, '10/18/2021', 'ronyismayel@gmail.com', 4392),
('01323673048', 2, '10/18/2021', 'ronyismayel@gmail.com', 4393),
('01521710356', 1, '10/19/2021', 'ronyismayel@gmail.com', 4394),
('01323673048', 2.5, '10/19/2021', 'ronyismayel@gmail.com', 4395),
('01313363653', 2, '10/23/2021', 'wazidullahmurad@gmail.com', 4396),
('01558996238', 2, '10/23/2021', 'wazidullahmurad@gmail.com', 4397),
('01313363649', 0, '10/23/2021', 'wazidullahmurad@gmail.com', 4398),
('01313363653', 1, '10/25/2021', 'wazidullahmurad@gmail.com', 4399),
('01558996238', 1, '10/25/2021', 'wazidullahmurad@gmail.com', 4400),
('01313363649', 1, '10/25/2021', 'wazidullahmurad@gmail.com', 4401),
('01313363653', 1, '10/26/2021', 'wazidullahmurad@gmail.com', 4402),
('01558996238', 0, '10/26/2021', 'wazidullahmurad@gmail.com', 4403),
('01313363649', 2, '10/26/2021', 'wazidullahmurad@gmail.com', 4404),
('01313363653', 1, '10/27/2021', 'wazidullahmurad@gmail.com', 4405),
('01558996238', 0, '10/27/2021', 'wazidullahmurad@gmail.com', 4406),
('01313363649', 2, '10/27/2021', 'wazidullahmurad@gmail.com', 4407),
('01313363653', 1, '10/28/2021', 'wazidullahmurad@gmail.com', 4408),
('01558996238', 1, '10/28/2021', 'wazidullahmurad@gmail.com', 4409),
('01313363649', 1, '10/28/2021', 'wazidullahmurad@gmail.com', 4410),
('01313363653', 2, '10/29/2021', 'wazidullahmurad@gmail.com', 4411),
('01558996238', 2, '10/29/2021', 'wazidullahmurad@gmail.com', 4412),
('01313363649', 2, '10/29/2021', 'wazidullahmurad@gmail.com', 4413),
('01313363653', 2, '10/30/2021', 'wazidullahmurad@gmail.com', 4414),
('01558996238', 0, '10/30/2021', 'wazidullahmurad@gmail.com', 4415),
('01313363649', 0, '10/30/2021', 'wazidullahmurad@gmail.com', 4416),
('01313363653', 1, '11/01/2021', 'wazidullahmurad@gmail.com', 4417),
('01558996238', 1, '11/01/2021', 'wazidullahmurad@gmail.com', 4418),
('01313363649', 0, '11/01/2021', 'wazidullahmurad@gmail.com', 4419),
('01313363653', 0, '11/02/2021', 'wazidullahmurad@gmail.com', 4420),
('01558996238', 0, '11/02/2021', 'wazidullahmurad@gmail.com', 4421),
('01313363649', 0, '11/02/2021', 'wazidullahmurad@gmail.com', 4422),
('01313363653', 1, '11/03/2021', 'wazidullahmurad@gmail.com', 4423),
('01558996238', 1, '11/03/2021', 'wazidullahmurad@gmail.com', 4424),
('01313363649', 0, '11/03/2021', 'wazidullahmurad@gmail.com', 4425),
('01313363653', 0, '11/04/2021', 'wazidullahmurad@gmail.com', 4426),
('01558996238', 0, '11/04/2021', 'wazidullahmurad@gmail.com', 4427),
('01313363649', 1.5, '11/04/2021', 'wazidullahmurad@gmail.com', 4428);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `messname` varchar(200) NOT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `email`, `password`, `messname`, `mname`, `code`, `active`) VALUES
(2, 'black@gmail.com', 'ict12345', 'Black lock', 'Manna Ismayel', NULL, 1),
(17, 'ismayelhossen123@gmail.com', '12345678', 'ismayel', 'Rahim', '38457', 1),
(18, 'bbb@gmail.com', '12345678', 'bbbb', NULL, '41000', 0),
(19, 'hello@gmail.com', '12345678', 'hello', NULL, '33837', 0),
(20, 'ppp@gmail.com', '12345678', 'ppp', NULL, '27902', 0),
(21, 'oo@gmail.com', '12345678', 'ooo', NULL, '37366', 0),
(22, 'jjj@gmail.com', '12345678', 'jjjj', NULL, '26188', 0),
(24, 'azharulislam1613@gmail.com', '12345678', 'Rokeya eye care center', NULL, '59349', 1),
(25, 'ismayelhossen124@gmail.com', '12345678', 'Ismayel Hossen', NULL, '74659', 0),
(26, 'golamkibriatuhin4@gmail.com', '12345678', 'ABC', NULL, '69769', 1),
(27, 'abc@gmail.com', '12345678', 'abc', NULL, '95938', 0),
(28, 'abc@gmail.com', '12345678', 'abc', NULL, '81775', 0),
(29, 'ismayelhossen12334@gmail.com', '12345678', 'opn', NULL, '52884', 0),
(30, 'shantobd.joy@gmail.com', '12345678', 'Lulu', NULL, '27870', 1),
(31, 'wazidullahmurad@gmail.com', '12345678', 'McubeS Mohakhali DOHS', NULL, '13339', 1),
(32, 'wazidullahmurad123@gmail.com', '12345678', 'xyz', NULL, '61884', 1),
(33, 'ronyismayel@gmail.com', '12345678', 'RonyIsmayel Mess', NULL, '92394', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmember`
--
ALTER TABLE `addmember`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bazarcost`
--
ALTER TABLE `bazarcost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bazardate`
--
ALTER TABLE `bazardate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat1`
--
ALTER TABLE `chat1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`it`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duepaid`
--
ALTER TABLE `duepaid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mealcount`
--
ALTER TABLE `mealcount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmember`
--
ALTER TABLE `addmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bazarcost`
--
ALTER TABLE `bazarcost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=377;

--
-- AUTO_INCREMENT for table `bazardate`
--
ALTER TABLE `bazardate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `chat1`
--
ALTER TABLE `chat1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `count`
--
ALTER TABLE `count`
  MODIFY `it` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT for table `duepaid`
--
ALTER TABLE `duepaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `mealcount`
--
ALTER TABLE `mealcount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4429;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
