-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 07:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riseup`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `Id` int(3) NOT NULL,
  `Achievement_Name` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Logical_Part` text NOT NULL,
  `Date` date NOT NULL,
  `Points` int(5) NOT NULL,
  `Achievement_Icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`Id`, `Achievement_Name`, `Description`, `Logical_Part`, `Date`, `Points`, `Achievement_Icon`) VALUES
(10, 'V1', 'complete 10 views to get V1 achievement (10 points)', '$this->db->query(\'SELECT Id FROM views WHERE Channel_Url = :Url\');\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\nif (count($this->db->resultSet()) >= 10) {\n		$Enable = 1;\n}', '0000-00-00', 10, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0V0z\" fill=\"none\"/><path d=\"M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6h-6z\"/></svg>'),
(11, 'V2', 'complete 100 views to get V2 achievement (20 points)', '$this->db->query(\'SELECT Id FROM views WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 100) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 20, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0V0z\" fill=\"none\"/><path d=\"M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6h-6z\"/></svg>'),
(12, 'V3', 'complete 1k views to get V3 achievement (50 points)', '$this->db->query(\'SELECT Id FROM views WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 1000) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 50, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0V0z\" fill=\"none\"/><path d=\"M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6h-6z\"/></svg>'),
(13, 'J1', 'complete 10 joiner to get J1 achievement (10 points)', '$this->db->query(\'SELECT Id FROM joiner WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 10) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 10, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M11.99 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm3.61 6.34c1.07 0 1.93.86 1.93 1.93 0 1.07-.86 1.93-1.93 1.93-1.07 0-1.93-.86-1.93-1.93-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36 0 1.3-1.06 2.36-2.36 2.36s-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM11.99 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15-1.17 2.97-4.06 5.09-7.45 5.09z\"></path></svg>'),
(14, 'J2', 'complete 100 joiner to get J2 achievement (20 points)', '//joiner\r\n$this->db->query(\'SELECT Id FROM joiner WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 100) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 20, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M11.99 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm3.61 6.34c1.07 0 1.93.86 1.93 1.93 0 1.07-.86 1.93-1.93 1.93-1.07 0-1.93-.86-1.93-1.93-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36 0 1.3-1.06 2.36-2.36 2.36s-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM11.99 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15-1.17 2.97-4.06 5.09-7.45 5.09z\"></path></svg>'),
(15, 'J3', 'complete 1K joiner to get J3 achievement (50 points)', '//joiner\r\n$this->db->query(\'SELECT Id FROM joiner WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 1000) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 50, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M11.99 2c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10zm3.61 6.34c1.07 0 1.93.86 1.93 1.93 0 1.07-.86 1.93-1.93 1.93-1.07 0-1.93-.86-1.93-1.93-.01-1.07.86-1.93 1.93-1.93zm-6-1.58c1.3 0 2.36 1.06 2.36 2.36 0 1.3-1.06 2.36-2.36 2.36s-2.36-1.06-2.36-2.36c0-1.31 1.05-2.36 2.36-2.36zm0 9.13v3.75c-2.4-.75-4.3-2.6-5.14-4.96 1.05-1.12 3.67-1.69 5.14-1.69.53 0 1.2.08 1.9.22-1.64.87-1.9 2.02-1.9 2.68zM11.99 20c-.27 0-.53-.01-.79-.04v-4.07c0-1.42 2.94-2.13 4.4-2.13 1.07 0 2.92.39 3.84 1.15-1.17 2.97-4.06 5.09-7.45 5.09z\"></path></svg>'),
(16, 'A1', 'complete 1 Article to get A1 achievement (10 points)', '$this->db->query(\'SELECT Url FROM post WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 1) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 10, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z\"></path></svg>'),
(17, 'A2', 'complete 10 Article to get A2 achievement (20 points)', '$this->db->query(\'SELECT Url FROM post WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 10) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 20, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z\"></path></svg>'),
(18, 'A3', 'complete 50 Article to get A3 achievement (50 points)', '$this->db->query(\'SELECT Url FROM post WHERE Channel_Url = :Url\');\r\n$this->db->bind(\':Url\',$_SESSION[\'User_Id\']);\r\nif (count($this->db->resultSet()) >= 10) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 50, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z\"></path></svg>'),
(19, 'P1', 'complete 100 Popularity to get P1 achievement (10 points)', '$this->db->query(\'SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url\');\r\n$this->db->bind(\':Channel_Url\', $_SESSION[\'User_Id\']);\r\n$_AD_Achievement_Points = $this->db->single();\r\nif ($_AD_Achievement_Points->Points_sum >= 100) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 10, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"></path></svg>'),
(20, 'P2', 'complete 500 Popularity to get P2 achievement (20 points)', '$this->db->query(\'SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url\');\r\n$this->db->bind(\':Channel_Url\', $_SESSION[\'User_Id\']);\r\n$_AD_Achievement_Points = $this->db->single();\r\nif ($_AD_Achievement_Points->Points_sum >= 500) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 20, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"></path></svg>'),
(21, 'P3', 'complete 1k Popularity to get P3 achievement (50 points)', '$this->db->query(\'SELECT SUM(achievement.Points) as Points_sum FROM achievement INNER JOIN achievement_data ON achievement_data.Achievement_Id = achievement.Id WHERE achievement_data.Channel_Url = :Channel_Url\');\r\n$this->db->bind(\':Channel_Url\', $_SESSION[\'User_Id\']);\r\n$_AD_Achievement_Points = $this->db->single();\r\nif ($_AD_Achievement_Points->Points_sum >= 1000) {\r\n		$Enable = 1;\r\n}', '0000-00-00', 50, '<svg xmlns=\"http://www.w3.org/2000/svg\" height=\"24px\" viewBox=\"0 0 24 24\" width=\"24px\" fill=\"#000000\"><path d=\"M0 0h24v24H0z\" fill=\"none\"></path><path d=\"M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z\"></path></svg>');

-- --------------------------------------------------------

--
-- Table structure for table `achievement_data`
--

CREATE TABLE `achievement_data` (
  `Id` int(10) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `Achievement_Id` int(3) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievement_data`
--

INSERT INTO `achievement_data` (`Id`, `Channel_Url`, `Achievement_Id`, `C_Date`) VALUES
(26, 'djUVyj9T19634', 10, '2022-03-02 15:04:29'),
(27, 'djUVyj9T19634', 16, '2022-03-03 10:41:21'),
(28, 'djUVyj9T19634', 18, '2022-03-23 14:02:37'),
(29, 'djUVyj9T19634', 17, '2022-03-23 14:02:51'),
(30, 'djUVyj9T19634', 11, '2022-04-04 16:35:47'),
(31, 'djUVyj9T19634', 19, '2022-04-04 16:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `Admin_Id` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`Admin_Id`, `Password`) VALUES
('176477', 'uttams35');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `Id` int(10) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `User_Url` varchar(13) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`Id`, `Post_Url`, `User_Url`, `C_Date`) VALUES
(42, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-02 16:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(2) NOT NULL,
  `Category_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `Category_Name`) VALUES
(10, 'PHP'),
(11, 'Android Java'),
(12, 'C Programming');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Id` int(10) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `User_Url` varchar(13) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Id`, `Channel_Url`, `Post_Url`, `User_Url`, `C_Date`, `Comments`) VALUES
(36, 'djUVyj9T19634', 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-08 03:57:48', 'hi'),
(37, 'djUVyj9T19634', 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-08 03:57:50', 'hi'),
(38, 'djUVyj9T19634', 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-08 04:03:41', 'helo'),
(39, 'YiDQYr2LE37UK', 'yPElsKNRdZBWnP7', 'djUVyj9T19634', '2022-04-08 04:09:37', 'hello'),
(40, 'djUVyj9T19634', '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 04:43:20', 'hi'),
(41, 'djUVyj9T19634', '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 05:03:39', 'i am uttam nath'),
(42, 'djUVyj9T19634', '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 06:37:03', 'demo comments'),
(43, 'djUVyj9T19634', 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-09 04:08:11', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `Id` int(3) NOT NULL,
  `country_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bonaire, Sint Eustatius and Saba'),
(29, 'Bosnia and Herzegovina'),
(30, 'Botswana'),
(31, 'Bouvet Island'),
(32, 'Brazil'),
(33, 'British Indian Ocean Territory'),
(34, 'Brunei Darussalam'),
(35, 'Bulgaria'),
(36, 'Burkina Faso'),
(37, 'Burundi'),
(38, 'Cambodia'),
(39, 'Cameroon'),
(40, 'Canada'),
(41, 'Cape Verde'),
(42, 'Cayman Islands'),
(43, 'Central African Republic'),
(44, 'Chad'),
(45, 'Chile'),
(46, 'China'),
(47, 'Christmas Island'),
(48, 'Cocos (Keeling) Islands'),
(49, 'Colombia'),
(50, 'Comoros'),
(51, 'Congo'),
(52, 'Congo, Democratic Republic of the Congo'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Cote D\'Ivoire'),
(56, 'Croatia'),
(57, 'Cuba'),
(58, 'Curacao'),
(59, 'Cyprus'),
(60, 'Czech Republic'),
(61, 'Denmark'),
(62, 'Djibouti'),
(63, 'Dominica'),
(64, 'Dominican Republic'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands (Malvinas)'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guernsey'),
(93, 'Guinea'),
(94, 'Guinea-Bissau'),
(95, 'Guyana'),
(96, 'Haiti'),
(97, 'Heard Island and Mcdonald Islands'),
(98, 'Holy See (Vatican City State)'),
(99, 'Honduras'),
(100, 'Hong Kong'),
(101, 'Hungary'),
(102, 'Iceland'),
(103, 'India'),
(104, 'Indonesia'),
(105, 'Iran, Islamic Republic of'),
(106, 'Iraq'),
(107, 'Ireland'),
(108, 'Isle of Man'),
(109, 'Israel'),
(110, 'Italy'),
(111, 'Jamaica'),
(112, 'Japan'),
(113, 'Jersey'),
(114, 'Jordan'),
(115, 'Kazakhstan'),
(116, 'Kenya'),
(117, 'Kiribati'),
(118, 'Korea, Democratic People\'s Republic of'),
(119, 'Korea, Republic of'),
(120, 'Kosovo'),
(121, 'Kuwait'),
(122, 'Kyrgyzstan'),
(123, 'Lao People\'s Democratic Republic'),
(124, 'Latvia'),
(125, 'Lebanon'),
(126, 'Lesotho'),
(127, 'Liberia'),
(128, 'Libyan Arab Jamahiriya'),
(129, 'Liechtenstein'),
(130, 'Lithuania'),
(131, 'Luxembourg'),
(132, 'Macao'),
(133, 'Macedonia, the Former Yugoslav Republic '),
(134, 'Madagascar'),
(135, 'Malawi'),
(136, 'Malaysia'),
(137, 'Maldives'),
(138, 'Mali'),
(139, 'Malta'),
(140, 'Marshall Islands'),
(141, 'Martinique'),
(142, 'Mauritania'),
(143, 'Mauritius'),
(144, 'Mayotte'),
(145, 'Mexico'),
(146, 'Micronesia, Federated States of'),
(147, 'Moldova, Republic of'),
(148, 'Monaco'),
(149, 'Mongolia'),
(150, 'Montenegro'),
(151, 'Montserrat'),
(152, 'Morocco'),
(153, 'Mozambique'),
(154, 'Myanmar'),
(155, 'Namibia'),
(156, 'Nauru'),
(157, 'Nepal'),
(158, 'Netherlands'),
(159, 'Netherlands Antilles'),
(160, 'New Caledonia'),
(161, 'New Zealand'),
(162, 'Nicaragua'),
(163, 'Niger'),
(164, 'Nigeria'),
(165, 'Niue'),
(166, 'Norfolk Island'),
(167, 'Northern Mariana Islands'),
(168, 'Norway'),
(169, 'Oman'),
(170, 'Pakistan'),
(171, 'Palau'),
(172, 'Palestinian Territory, Occupied'),
(173, 'Panama'),
(174, 'Papua New Guinea'),
(175, 'Paraguay'),
(176, 'Peru'),
(177, 'Philippines'),
(178, 'Pitcairn'),
(179, 'Poland'),
(180, 'Portugal'),
(181, 'Puerto Rico'),
(182, 'Qatar'),
(183, 'Reunion'),
(184, 'Romania'),
(185, 'Russian Federation'),
(186, 'Rwanda'),
(187, 'Saint Barthelemy'),
(188, 'Saint Helena'),
(189, 'Saint Kitts and Nevis'),
(190, 'Saint Lucia'),
(191, 'Saint Martin'),
(192, 'Saint Pierre and Miquelon'),
(193, 'Saint Vincent and the Grenadines'),
(194, 'Samoa'),
(195, 'San Marino'),
(196, 'Sao Tome and Principe'),
(197, 'Saudi Arabia'),
(198, 'Senegal'),
(199, 'Serbia'),
(200, 'Serbia and Montenegro'),
(201, 'Seychelles'),
(202, 'Sierra Leone'),
(203, 'Singapore'),
(204, 'Sint Maarten'),
(205, 'Slovakia'),
(206, 'Slovenia'),
(207, 'Solomon Islands'),
(208, 'Somalia'),
(209, 'South Africa'),
(210, 'South Georgia and the South Sandwich Isl'),
(211, 'South Sudan'),
(212, 'Spain'),
(213, 'Sri Lanka'),
(214, 'Sudan'),
(215, 'Suriname'),
(216, 'Svalbard and Jan Mayen'),
(217, 'Swaziland'),
(218, 'Sweden'),
(219, 'Switzerland'),
(220, 'Syrian Arab Republic'),
(221, 'Taiwan, Province of China'),
(222, 'Tajikistan'),
(223, 'Tanzania, United Republic of'),
(224, 'Thailand'),
(225, 'Timor-Leste'),
(226, 'Togo'),
(227, 'Tokelau'),
(228, 'Tonga'),
(229, 'Trinidad and Tobago'),
(230, 'Tunisia'),
(231, 'Turkey'),
(232, 'Turkmenistan'),
(233, 'Turks and Caicos Islands'),
(234, 'Tuvalu'),
(235, 'Uganda'),
(236, 'Ukraine'),
(237, 'United Arab Emirates'),
(238, 'United Kingdom'),
(239, 'United States'),
(240, 'United States Minor Outlying Islands'),
(241, 'Uruguay'),
(242, 'Uzbekistan'),
(243, 'Vanuatu'),
(244, 'Venezuela'),
(245, 'Viet Nam'),
(246, 'Virgin Islands, British'),
(247, 'Virgin Islands, U.s.'),
(248, 'Wallis and Futuna'),
(249, 'Western Sahara'),
(250, 'Yemen'),
(251, 'Zambia'),
(252, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `joiner`
--

CREATE TABLE `joiner` (
  `Id` int(5) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `User_Url` varchar(13) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joiner`
--

INSERT INTO `joiner` (`Id`, `Channel_Url`, `User_Url`, `C_Date`) VALUES
(98, 'YiDQYr2LE37UK', 'djUVyj9T19634', '2022-03-02 15:05:34'),
(103, 'djUVyj9T19634', 'djUVyj9T19634', '2022-04-02 16:10:48'),
(104, 'djUVyj9T19634', '4z4mXD2set_c1', '2022-06-11 14:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike`
--

CREATE TABLE `like_dislike` (
  `Id` int(10) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Like_Dislike` int(1) NOT NULL,
  `User_Url` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`Id`, `Post_Url`, `Channel_Url`, `C_Date`, `Like_Dislike`, `User_Url`) VALUES
(153, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 14:35:50', 1, 'djUVyj9T19634'),
(159, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-03 06:28:00', 1, '6s6kBVMbnBZHv'),
(160, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-03 08:50:13', 1, 'djUVyj9T19634'),
(161, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-06 15:54:32', 1, 'djUVyj9T19634'),
(162, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-03 10:38:45', 1, 'djUVyj9T19634'),
(163, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-08 08:22:36', 1, 'djUVyj9T19634'),
(168, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:05:29', 1, 'djUVyj9T19634'),
(169, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-06 15:56:18', 1, 'djUVyj9T19634'),
(170, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-10 08:30:53', 1, 'djUVyj9T19634'),
(171, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-06-11 14:01:34', 1, '4z4mXD2set_c1');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Id` int(10) NOT NULL,
  `Post_Url` varchar(16) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`Id`, `Post_Url`, `Channel_Url`, `Date_Time`) VALUES
(32, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-02 14:16:18'),
(33, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-03-02 14:20:47'),
(34, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 14:26:25'),
(35, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-02 14:31:11'),
(36, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 14:35:10'),
(37, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-02 14:45:25'),
(38, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-02 14:49:42'),
(40, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-03 06:11:13'),
(41, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-03 06:18:57'),
(42, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-03 06:24:37'),
(43, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-03 08:49:49'),
(44, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-03-03 16:18:48'),
(45, '-pRbCQSvn5LrRd6', 'djUVyj9T19634', '2022-03-03 16:23:09'),
(46, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-08 07:32:40'),
(47, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-03-23 13:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Url` varchar(15) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Article` text NOT NULL,
  `Visibility` varchar(2) NOT NULL,
  `Image` varchar(20) NOT NULL,
  `Comments` int(1) NOT NULL,
  `Paid_Promotion` varchar(100) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `Category_Id` int(3) NOT NULL,
  `Date_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Url`, `Title`, `Article`, `Visibility`, `Image`, `Comments`, `Paid_Promotion`, `Channel_Url`, `Category_Id`, `Date_Time`) VALUES
('-pRbCQSvn5LrRd6', 'RUSSIA AND UKRAINE SITUATION: THREAT TO WORLD LIFE & SIMPLICITY', 'Russia is at the verdge of a WW:3 IGNITION & World Leaders will have to guide and help each other to delay this to the maximum limit', 'PU', '-pRbCQSvn5LrRd6.jpg', 1, '', 'djUVyj9T19634', 12, '2022-03-03 21:53:09'),
('0NeBb8NgEVkwjb4', 'Array- #5 C Programming By Archana Rao', 'An ** array** is a variable that can store multiple values. \r\nFor example, if you want to store 100 integers, you can create an array for it.\r\n\r\n```\r\nint data[100];\r\n```\r\n** How to declare an array? **\r\n\r\n```\r\ndataType arrayName[arraySize];\r\n```', 'PU', '0NeBb8NgEVkwjb4.jpg', 1, '', 'YiDQYr2LE37UK', 12, '2022-03-03 11:54:37'),
('2q_3sxC0nIkfuSt', 'What is Android (Java) - #1 Android Studio By Uttam Nath', '**Android** is a software package and linux based operating system for mobile devices such as tablet computers and smartphones.\r\n\r\n**Features of Android**\r\nAfter learning what is android, let&#39;s see the features of android. The important features of android are given below:\r\n\r\n1) It is open-source.\r\n\r\n2) Anyone can customize the Android Platform.\r\n\r\n3) There are a lot of mobile applications that can be chosen by the consumer.\r\n\r\n4) It provides many interesting features like weather details, opening screen, live RSS (Really Simple Syndication) feeds etc.', 'PU', '2q_3sxC0nIkfuSt.jpg', 1, '', 'djUVyj9T19634', 11, '2022-03-02 19:46:18'),
('CoeGpel2I7TFUak', 'AndroidManifest.xml file in android (Java) - #3 Android Studio By Uttam Nath', 'The **AndroidManifest.xml** file contains information of your package, including components of the application such as activities, services, broadcast receivers, content providers etc.\r\n\r\nIt performs some other tasks also:\r\n\r\nIt is **responsible to protect the application** to access any protected parts by providing the permissions.\r\nIt also **declares the android api** that the application is going to use.\r\nIt lists the **instrumentation classes**. The instrumentation classes provides profiling and other informations. These informations are removed just before the application is published etc.\r\nThis is the required xml file for all the android application and located inside the root directory.\r\n\r\nA simple AndroidManifest.xml file looks like this:\r\n\r\n```  <manifest xmlns:android=\"http://schemas.android.com/apk/res/android\"  \r\n    package=\"com.javatpoint.hello\"  \r\n    android:versionCode=\"1\"  \r\n    android:versionName=\"1.0\" >  \r\n  \r\n    <uses-sdk  \r\n        android:minSdkVersion=\"8\"  \r\n        android:targetSdkVersion=\"15\" />  \r\n  \r\n    <application  \r\n        android:icon=\"@drawable/ic_launcher\"  \r\n        android:label=\"@string/app_name\"  \r\n        android:theme=\"@style/AppTheme\" >  \r\n        <activity  \r\n            android:name=\".MainActivity\"  \r\n            android:label=\"@string/title_activity_main\" >  \r\n            <intent-filter>  \r\n                <action android:name=\"android.intent.action.MAIN\" />  \r\n  \r\n                <category android:name=\"android.intent.category.LAUNCHER\" />  \r\n            </intent-filter>  \r\n        </activity>  \r\n    </application>  \r\n  \r\n</manifest>  \r\n  \r\n```', 'PU', 'CoeGpel2I7TFUak.jpg', 1, '', 'djUVyj9T19634', 11, '2022-03-02 20:31:29'),
('ddr0D4PRxhm_r_N', 'Android Toast Example (Java) - #5 Android Studio By Uttam Nath', '**Android Toast Example**\r\nandroid toast\r\nAndorid Toast can be used to display information for the short period of time. A toast contains message to be displayed quickly and disappears after sometime.\r\n\r\nThe **android.widget.Toast** class is the subclass of java.lang.Object class.\r\n\r\nYou can also create custom toast as well for example toast displaying image. You can visit next page to see the code for custom toast.\r\n\r\n**Android Toast Example**\r\n```\r\nToast.makeText(getApplicationContext(),&#34;Hello Javatpoint&#34;,Toast.LENGTH_SHORT).show();  \r\n```\r\n**Another code:**\r\n```\r\nToast toast=Toast.makeText(getApplicationContext(),&#34;Hello Javatpoint&#34;,Toast.LENGTH_SHORT);  \r\ntoast.setMargin(50,50);  \r\ntoast.show();  \r\n```', 'PU', 'ddr0D4PRxhm_r_N.jpg', 1, '', 'djUVyj9T19634', 11, '2022-03-02 20:05:10'),
('FQJhqkiVB_XYAUZ', 'Android Architecture (Java) - #2 Android Studio By Uttam Nath', '**1) Linux kernel**\r\nIt is the heart of android architecture that exists at the root of android architecture. Linux kernel is responsible for device drivers, power management, memory management, device management and resource access.\r\n\r\n**2) Native Libraries**\r\nOn the top of linux kernel, their are Native libraries such as WebKit, OpenGL, FreeType, SQLite, Media, C runtime library (libc) etc.\r\nThe WebKit library is responsible for browser support, SQLite is for database, FreeType for font support, Media for playing and recording audio and video formats.\r\n\r\n**3) Android Runtime**\r\nIn android runtime, there are core libraries and DVM (Dalvik Virtual Machine) which is responsible to run android application. DVM is like JVM but it is optimized for mobile devices. It consumes less memory and provides fast performance.\r\n\r\n**4) Android Framework**\r\nOn the top of Native libraries and android runtime, there is android framework. Android framework includes Android API&#39;s such as UI (User Interface), telephony, resources, locations, Content Providers (data) and package managers. It provides a lot of classes and interfaces for android application development.\r\n\r\n**5) Applications**\r\nOn the top of android framework, there are applications. All applications such as home, contact, settings, games, browsers are using android framework that uses android runtime and libraries. Android runtime and native libraries are using linux kernal.', 'PU', 'FQJhqkiVB_XYAUZ.jpg', 1, '', 'djUVyj9T19634', 11, '2022-03-02 19:50:47'),
('gr0oRIYkfVJlPAC', 'testing article #1', 'testing article #1\r\n**testing article #1**\r\nhttps://YouTube.com\r\n```testing article #1```', 'PU', 'gr0oRIYkfVJlPAC.jpg', 1, 'sdnf', 'djUVyj9T19634', 10, '2022-04-03 13:13:11'),
('GZUpzRNThwCiit5', 'Features of C Language - #2 C Programming Language By Archana Rao', '**Features of C Language**\r\nC is the widely used language. It provides many **features** that are given below.\r\n\r\n**1) Simple**\r\nC is a simple language in the sense that it provides a structured approach (to break the problem into parts), the rich set of library functions, data types, etc.\r\n\r\n**2) Machine Independent or Portable**\r\nUnlike assembly language, c programs can be executed on different machines with some machine specific changes. Therefore, C is a machine independent language.\r\n\r\n**3) Mid-level programming language**\r\nAlthough, C is intended to do low-level programming. It is used to develop system applications such as kernel, driver, etc. It also supports the features of a high-level language. That is why it is known as mid-level language.\r\n\r\n**4) Structured programming language**\r\nC is a structured programming language in the sense that we can break the program into parts using functions. So, it is easy to understand and modify. Functions also provide code reusability.\r\n\r\n**5) Rich Library**\r\nC provides a lot of inbuilt functions that make the development fast.\r\n\r\n**6) Memory Management**\r\nIt supports the feature of dynamic memory allocation. In C language, we can free the allocated memory at any time by calling the free() function.\r\n\r\n**7) Speed**\r\nThe compilation and execution time of C language is fast since there are lesser inbuilt functions and hence the lesser overhead.\r\n\r\n**8) Pointer**\r\nC provides the feature of pointers. We can directly interact with the memory by using the pointers. We can use pointers for memory, structures, functions, array, etc.\r\n\r\n**9) Recursion**\r\nIn C, we can call the function within the function. It provides code reusability for every function. Recursion enables us to use the approach of backtracking.\r\n\r\n**10) Extensible**\r\nC language is extensible because it can easily adopt new features.', 'PU', 'GZUpzRNThwCiit5.jpg', 1, '', 'YiDQYr2LE37UK', 12, '2022-03-02 20:19:42'),
('hn_iVdvN0H8qj4u', 'demo article #2', 'demo article in Android', 'PU', 'hn_iVdvN0H8qj4u.jpg', 1, '', 'djUVyj9T19634', 10, '2022-03-08 13:02:40'),
('nniVjpXws-TIjXc', 'Android Button Example (Java) - #4 Android Studio By Uttam Nath', '**Android Button Example**\r\nandroid button\r\nAndroid Button represents a push-button. The android.widget.Button is subclass of TextView class and CompoundButton is the subclass of Button class.\r\n\r\nThere are different types of buttons in android such as RadioButton, ToggleButton, CompoundButton etc.\r\n\r\n**Android Button Example with Listener**\r\nHere, we are going to create two textfields and one button for sum of two numbers. If user clicks button, sum of two input values is displayed on the Toast.\r\n\r\nWe can perform action on button using different types such as calling listener on button or adding onClick property of button in activity&#39;s xml file.\r\n\r\n**activity_main.xml**\r\n```\r\n  \r\n```\r\n\r\n**MainActivity.java**\r\n```\r\nbutton.setOnClickListener(new View.OnClickListener() {  \r\n            @Override  \r\n            public void onClick(View view) {  \r\n               //code  \r\n            }  \r\n});  \r\n```', 'PU', 'nniVjpXws-TIjXc.jpg', 1, '', 'djUVyj9T19634', 11, '2022-03-02 20:01:11'),
('oi1hbfYQb1rpfjx', 'Structure- #4 C Programming By Archana Rao', 'To define a ** structure**, you must use the struct statement. The struct statement defines a new data type, with more than one member. The format of the struct statement is as follows −\r\n\r\n```\r\nstruct [structure tag] {\r\n\r\n   member definition;\r\n   member definition;\r\n   ...\r\n   member definition;\r\n} [one or more structure variables];  \r\n```\r\n\r\nThe structure tag is optional and each member definition is a normal variable definition, such as int i; or float f; or any other valid variable definition. At the end of the structure&#39;s definition, before the final semicolon, you can specify one or more structure variables but it is optional. Here is the way you would declare the Book structure −\r\n\r\n```\r\nstruct Books {\r\n   char  title[50];\r\n   char  author[50];\r\n   char  subject[100];\r\n   int   book_id;\r\n} book;  \r\n```', 'PU', 'oi1hbfYQb1rpfjx.jpg', 1, '', 'YiDQYr2LE37UK', 12, '2022-03-03 11:48:57'),
('pcoMwOKt3OSlTpb', 'Recursion- #3 C Programming By Archana Rao', '**Recursion** is the process of repeating items in a self-similar way. In programming languages, if a program allows you to call a function inside the same function, then it is called a recursive call of the function.\r\n\r\nThe **C programming language** supports recursion, i.e., a function to call itself. But while using recursion, programmers need to be careful to define an exit condition from the function, otherwise it will go into an infinite loop.\r\n\r\n**Recursive functions** are very useful to solve many mathematical problems, such as calculating the factorial of a number, generating Fibonacci series, etc.\r\n\r\n```\r\nvoid recursion() {\r\n   recursion(); /* function calls itself */\r\n}\r\n\r\nint main() {\r\n   recursion();\r\n}\r\n```', 'PU', 'pcoMwOKt3OSlTpb.jpg', 1, '', 'YiDQYr2LE37UK', 12, '2022-03-03 11:41:12'),
('rouIAdoXlxjw5mH', 'RUSSIA AND UKRAINE SITUATION: THREAT TO WORLD LIFE & SIMPLICITY', 'RUSSIA AND UKRAINE SITUATION: THREAT TO WORLD LIFE & SIMPLICITY', 'PU', 'rouIAdoXlxjw5mH.jpg', 1, '', 'djUVyj9T19634', 12, '2022-03-03 21:48:48'),
('SpbPkSEekY4v5tW', 'demo article 1 Android', 'demo article 1 Android', 'PU', 'SpbPkSEekY4v5tW.jpg', 1, '', 'djUVyj9T19634', 10, '2022-03-03 14:19:49'),
('yPElsKNRdZBWnP7', 'C Programming Language Tutorial - #1 C Programming Language By Archana Rao', '**C language** Tutorial with programming approach for beginners and professionals, helps you to understand the C language tutorial easily. Our C tutorial explains each topic with programs.\r\n\r\nThe C Language is developed by Dennis Ritchie for creating system applications that directly interact with the hardware devices such as drivers, kernels, etc.\r\n\r\nC programming is considered as the base for other programming languages, that is why it is known as mother language.\r\n\r\n**C Program**\r\nIn this tutorial, all C programs are given with C compiler so that you can quickly change the C program code.\r\n```#include   \r\nint main() {  \r\nprintf(&#34;Hello C Programming\\n&#34;);  \r\nreturn 0;  \r\n}  \r\n```', 'PU', 'yPElsKNRdZBWnP7.jpg', 1, '', 'YiDQYr2LE37UK', 12, '2022-03-02 20:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Id` int(10) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `User_Url` varchar(13) NOT NULL,
  `Report` varchar(2) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Id`, `Channel_Url`, `Post_Url`, `User_Url`, `Report`, `C_Date`) VALUES
(1, 'djUVyj9T19634', 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', 'R2', '2022-04-03 07:38:47'),
(2, 'djUVyj9T19634', 'SpbPkSEekY4v5tW', 'djUVyj9T19634', 'R1', '2022-04-05 09:26:12'),
(3, 'djUVyj9T19634', 'SpbPkSEekY4v5tW', 'djUVyj9T19634', 'R4', '2022-04-05 09:26:27'),
(4, 'djUVyj9T19634', 'SpbPkSEekY4v5tW', 'djUVyj9T19634', 'R4', '2022-04-05 09:26:27'),
(5, 'YiDQYr2LE37UK', '0NeBb8NgEVkwjb4', 'djUVyj9T19634', 'R3', '2022-04-05 09:27:42'),
(6, 'djUVyj9T19634', 'nniVjpXws-TIjXc', 'djUVyj9T19634', 'R1', '2022-04-06 15:54:53'),
(7, 'YiDQYr2LE37UK', '0NeBb8NgEVkwjb4', 'djUVyj9T19634', 'R1', '2022-04-06 15:55:17'),
(8, 'djUVyj9T19634', '2q_3sxC0nIkfuSt', 'djUVyj9T19634', 'R2', '2022-04-08 04:43:31'),
(9, 'djUVyj9T19634', 'CoeGpel2I7TFUak', 'djUVyj9T19634', 'R2', '2022-04-09 04:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `Id` int(10) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `Tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`Id`, `Post_Url`, `Tag`) VALUES
(152, '2q_3sxC0nIkfuSt', 'androidstudio'),
(153, '2q_3sxC0nIkfuSt', 'android'),
(154, '2q_3sxC0nIkfuSt', 'uttamnath'),
(155, '2q_3sxC0nIkfuSt', 'java'),
(156, 'FQJhqkiVB_XYAUZ', 'Androidstudio'),
(157, 'FQJhqkiVB_XYAUZ', 'java'),
(158, 'FQJhqkiVB_XYAUZ', 'android'),
(161, 'nniVjpXws-TIjXc', 'android'),
(162, 'nniVjpXws-TIjXc', 'java'),
(163, 'nniVjpXws-TIjXc', 'button'),
(164, 'ddr0D4PRxhm_r_N', 'android'),
(165, 'ddr0D4PRxhm_r_N', 'java'),
(166, 'ddr0D4PRxhm_r_N', 'toast'),
(167, 'yPElsKNRdZBWnP7', 'c'),
(168, 'yPElsKNRdZBWnP7', 'cprogram'),
(169, 'yPElsKNRdZBWnP7', 'programming'),
(170, 'yPElsKNRdZBWnP7', 'archanarao'),
(171, 'GZUpzRNThwCiit5', 'cprogramming'),
(172, 'GZUpzRNThwCiit5', 'c'),
(173, 'GZUpzRNThwCiit5', 'program'),
(178, 'CoeGpel2I7TFUak', 'androidstudio'),
(179, 'CoeGpel2I7TFUak', 'javaandroidmanifest.xml'),
(183, 'pcoMwOKt3OSlTpb', 'C'),
(184, 'pcoMwOKt3OSlTpb', 'Recursion'),
(185, 'pcoMwOKt3OSlTpb', 'Archana'),
(186, 'oi1hbfYQb1rpfjx', 'C'),
(187, 'oi1hbfYQb1rpfjx', 'Structure'),
(188, 'oi1hbfYQb1rpfjx', 'Archana'),
(189, '0NeBb8NgEVkwjb4', 'C'),
(190, '0NeBb8NgEVkwjb4', 'Array'),
(191, '0NeBb8NgEVkwjb4', 'Archana'),
(192, 'SpbPkSEekY4v5tW', 'demo'),
(193, 'rouIAdoXlxjw5mH', 'Russia'),
(194, '-pRbCQSvn5LrRd6', 'russie'),
(195, 'hn_iVdvN0H8qj4u', 'Android'),
(197, 'gr0oRIYkfVJlPAC', 'testingarticle#1');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(5) NOT NULL,
  `test` text NOT NULL,
  `time` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`, `time`) VALUES
(1, 'gujkjha gha uttamgoswami422@gmail.com 666999 F -1 18,11 2022 fgjyyh566Dld@', '0000-00-00'),
(2, 'datf ff uttamgoswami422@gmail.com 554555 M 26 040,11 2022 refd2S@', '2022-01-09'),
(3, 'ttph hah uttamgoswami422@gmail.com 12345678 F -1 Jan,13 2022 uij45R@', '2022-01-09'),
(4, 'ttph hah uttamgoswami422@gmail.com 12345678 F -1 Jan,13 2022 uij4', '2022-01-09'),
(5, 'jsjjs hhsh uttamgoswami422@gmail.com 6376 M -1 Jan,09 2022 g5G', '2022-01-09'),
(6, 'fffh hfhhyty hhas@hhr.y 555655 F 171 Jan,09 2022 gguuu3T@', '2022-01-09'),
(7, 'fffh hfhhyty hhas@hhr.y 555655 M 112 Jan,09 2022 gguuu3T@', '2022-01-09'),
(8, 'fffh hfhhyty hhas@hhr.y 5556553 M 101 Jan,09 2022 gguuu3T@', '2022-01-09'),
(9, 'hsh bb uttamgoswami422@gmail.com 9929311040 M 1 Jan,14 2022 yF5@tfg', '2022-01-09'),
(10, 'fyh g uttamgoswami422@gmail.com 6376981347 F 11 Jan,11 2022 tgg24F@', '2022-01-09'),
(11, 'fyh y uttamgoswami422@gmail.com 1236547890 M 34 Sep 11, 2001 upttam123S@', '2022-01-09'),
(12, 'chh vv uttamgoswami422@gmail.com 1234567890 F 3 Jan 10, 2022 fhh46Df@', '2022-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `Url` varchar(13) NOT NULL,
  `F_Name` varchar(20) NOT NULL,
  `L_Name` varchar(20) NOT NULL,
  `Country_Id` int(3) NOT NULL,
  `Mobile_Number` bigint(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `DOB` date NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Password` varchar(40) NOT NULL,
  `Channel_Logo` varchar(18) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`Url`, `F_Name`, `L_Name`, `Country_Id`, `Mobile_Number`, `Email`, `Gender`, `DOB`, `C_Date`, `Password`, `Channel_Logo`, `Description`) VALUES
('4z4mXD2set_c1', 'jop', 'ghj', 1, 8824504931, 'xfghjgh@gmail.com', 'M', '2022-07-06', '2022-06-11 14:01:03', 'fb228ab6b0de74784ac9c2e58314cd64', '4z4mXD2set_c1.jpeg', ''),
('6s6kBVMbnBZHv', 'Shailesh', 'Sharma', 103, 7041026469, 'raoarchana840@gmail.com', 'M', '2000-12-03', '2022-03-03 06:27:48', 'dd0375f700ddee14a553fa28a46f9b28', '6s6kBVMbnBZHv.jpg', ''),
('djUVyj9T19634', 'Uttam', 'Nath', 103, 6376981347, 'uttamnath1764@gmail.com', 'M', '2001-09-11', '2022-03-02 14:06:23', '3635d90a3edbbde5f264b025f906cc1a', 'djUVyj9T19634.jpg', 'hello, this channel content mobile application development (Android Studio). Android Studio with Java'),
('YiDQYr2LE37UK', 'Archana', 'Rao', 103, 9537514377, '190510101131@paruluniversity.a', 'F', '2000-10-10', '2022-03-02 14:38:58', 'ed6d87673b698e8aec03a3c744eb3012', 'YiDQYr2LE37UK.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `Id` int(10) NOT NULL,
  `Post_Url` varchar(15) NOT NULL,
  `Channel_Url` varchar(13) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Source_Type` varchar(20) NOT NULL,
  `User_Url` varchar(13) NOT NULL,
  `IP_Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`Id`, `Post_Url`, `Channel_Url`, `C_Date`, `Source_Type`, `User_Url`, `IP_Address`) VALUES
(1274, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-02 14:16:26', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1275, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-02 14:16:54', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1276, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 14:35:37', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1277, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 14:51:38', 'Android Application', 'L_8mQ0xnyDltO', '0'),
(1278, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 14:52:17', 'Android Application', 'djUVyj9T19634', '0'),
(1279, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 14:54:54', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1280, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:00:29', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1281, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:01:10', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1282, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:01:34', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1283, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:02:57', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1284, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:04:42', 'Android Application', 'djUVyj9T19634', '0'),
(1285, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 15:05:16', 'Android Application', 'djUVyj9T19634', '0'),
(1286, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-02 15:05:28', 'Android Application', 'djUVyj9T19634', '0'),
(1287, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 15:06:11', 'Android Application', 'djUVyj9T19634', '0'),
(1288, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-02 15:06:13', 'Android Application', 'djUVyj9T19634', '0'),
(1289, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-02 15:06:24', 'Android Application', 'djUVyj9T19634', '0'),
(1290, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-02 15:07:02', 'Android Application', 'djUVyj9T19634', '0'),
(1291, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-02 15:07:14', 'Android Application', 'djUVyj9T19634', '0'),
(1292, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-02 15:07:25', 'Android Application', 'djUVyj9T19634', '0'),
(1293, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-03 05:48:07', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1297, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-03 06:11:16', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1298, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-03 06:11:16', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1299, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-03 06:19:00', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1300, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-03 06:19:00', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1301, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-03 06:24:48', 'UNKNOWN', 'YiDQYr2LE37UK', '127.0.0.1'),
(1303, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-03 06:27:56', 'UNKNOWN', '6s6kBVMbnBZHv', '127.0.0.1'),
(1304, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-03 08:50:07', 'Android Application', 'djUVyj9T19634', '0'),
(1305, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-03 10:35:03', 'UNKNOWN', '', '127.0.0.1'),
(1306, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-03-03 10:37:39', 'Android Application', 'djUVyj9T19634', '0'),
(1307, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-03 10:38:30', 'Android Application', 'djUVyj9T19634', '0'),
(1308, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-03 10:39:09', 'Android Application', 'djUVyj9T19634', '0'),
(1309, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-03 10:39:13', 'Android Application', 'djUVyj9T19634', '0'),
(1310, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-03-03 16:10:11', 'Android Application', 'djUVyj9T19634', '0'),
(1311, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-03 16:10:26', 'Android Application', 'djUVyj9T19634', '0'),
(1312, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-03-03 16:13:24', 'Android Application', 'djUVyj9T19634', '0'),
(1313, '-pRbCQSvn5LrRd6', 'djUVyj9T19634', '2022-03-03 16:23:57', 'Android Application', 'djUVyj9T19634', '0'),
(1314, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-03-04 15:22:17', 'Android Application', 'djUVyj9T19634', '0'),
(1315, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-05 09:17:55', 'Android Application', 'djUVyj9T19634', '0'),
(1316, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-05 09:18:12', 'Android Application', 'djUVyj9T19634', '0'),
(1317, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-08 07:32:58', 'Android Application', 'djUVyj9T19634', '0'),
(1318, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-08 07:47:38', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1319, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-08 08:21:25', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1320, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-08 08:22:25', 'Android Application', 'djUVyj9T19634', '0'),
(1321, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-08 08:23:32', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1322, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-08 08:23:53', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1323, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-08 08:23:59', 'Android Application', 'djUVyj9T19634', '0'),
(1324, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-12 05:08:31', 'Android Application', 'djUVyj9T19634', '0'),
(1325, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-12 05:08:35', 'Android Application', 'djUVyj9T19634', '0'),
(1326, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-12 06:01:08', 'Android Application', 'djUVyj9T19634', '0'),
(1327, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-12 06:01:19', 'Android Application', 'djUVyj9T19634', '0'),
(1328, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-12 06:01:48', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1329, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-15 15:45:48', 'Android Application', 'djUVyj9T19634', '0'),
(1330, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:39:19', 'Android Application', 'djUVyj9T19634', '0'),
(1331, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-23 06:40:50', 'Android Application', 'djUVyj9T19634', '0'),
(1332, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:41:11', 'Android Application', 'djUVyj9T19634', '0'),
(1333, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:42:20', 'Android Application', 'djUVyj9T19634', '0'),
(1334, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-23 06:42:25', 'Android Application', 'djUVyj9T19634', '0'),
(1335, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 06:42:28', 'Android Application', 'djUVyj9T19634', '0'),
(1336, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-23 06:42:31', 'Android Application', 'djUVyj9T19634', '0'),
(1337, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 06:42:34', 'Android Application', 'djUVyj9T19634', '0'),
(1338, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 06:43:07', 'Android Application', 'djUVyj9T19634', '0'),
(1339, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:43:10', 'Android Application', 'djUVyj9T19634', '0'),
(1340, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-23 06:43:12', 'Android Application', 'djUVyj9T19634', '0'),
(1341, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-23 06:43:15', 'Android Application', 'djUVyj9T19634', '0'),
(1342, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-23 06:43:25', 'Android Application', 'djUVyj9T19634', '0'),
(1343, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 06:43:29', 'Android Application', 'djUVyj9T19634', '0'),
(1344, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-23 06:43:32', 'Android Application', 'djUVyj9T19634', '0'),
(1345, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:43:35', 'Android Application', 'djUVyj9T19634', '0'),
(1346, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:43:48', 'Android Application', 'djUVyj9T19634', '0'),
(1347, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:44:48', 'Android Application', 'djUVyj9T19634', '0'),
(1348, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:44:57', 'Android Application', 'djUVyj9T19634', '0'),
(1349, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:45:23', 'Android Application', 'djUVyj9T19634', '0'),
(1350, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-23 06:45:42', 'Android Application', 'djUVyj9T19634', '0'),
(1351, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:45:44', 'Android Application', 'djUVyj9T19634', '0'),
(1352, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-23 06:46:10', 'Android Application', 'djUVyj9T19634', '0'),
(1353, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-03-23 06:46:33', 'Android Application', 'djUVyj9T19634', '0'),
(1354, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-23 06:46:36', 'Android Application', 'djUVyj9T19634', '0'),
(1355, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-03-23 06:46:41', 'Android Application', 'djUVyj9T19634', '0'),
(1356, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-23 06:47:00', 'Android Application', 'djUVyj9T19634', '0'),
(1357, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:47:26', 'Android Application', 'djUVyj9T19634', '0'),
(1358, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:47:34', 'Android Application', 'djUVyj9T19634', '0'),
(1359, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 06:47:39', 'Android Application', 'djUVyj9T19634', '0'),
(1360, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 06:47:57', 'Android Application', 'djUVyj9T19634', '0'),
(1361, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 06:48:01', 'Android Application', 'djUVyj9T19634', '0'),
(1362, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 06:48:10', 'Android Application', 'djUVyj9T19634', '0'),
(1363, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:55:40', 'Android Application', 'djUVyj9T19634', '0'),
(1364, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-23 06:57:17', 'Android Application', 'djUVyj9T19634', '0'),
(1365, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 06:57:19', 'Android Application', 'djUVyj9T19634', '0'),
(1366, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 07:19:34', 'Android Application', 'djUVyj9T19634', '0'),
(1367, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 07:20:24', 'Android Application', 'djUVyj9T19634', '0'),
(1368, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-03-23 07:32:59', 'Android Application', 'djUVyj9T19634', '0'),
(1369, '-pRbCQSvn5LrRd6', 'djUVyj9T19634', '2022-03-23 12:53:47', 'Android Application', 'djUVyj9T19634', '0'),
(1370, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-03-23 13:30:39', 'Android Application', 'djUVyj9T19634', '0'),
(1371, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-03-23 13:30:42', 'Android Application', 'djUVyj9T19634', '0'),
(1372, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-03-23 13:47:09', 'Android Application', 'djUVyj9T19634', '0'),
(1373, '-pRbCQSvn5LrRd6', 'djUVyj9T19634', '2022-03-23 13:47:26', 'Android Application', 'djUVyj9T19634', '0'),
(1374, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-03-23 13:47:30', 'Android Application', 'djUVyj9T19634', '0'),
(1375, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-23 13:47:34', 'Android Application', 'djUVyj9T19634', '0'),
(1376, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:47:37', 'Android Application', 'djUVyj9T19634', '0'),
(1377, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:48:02', 'UNKNOWN', '', '127.0.0.1'),
(1378, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:48:04', 'Android Application', 'djUVyj9T19634', '0'),
(1379, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:48:31', 'UNKNOWN', '', '127.0.0.1'),
(1380, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:48:57', 'Android Application', 'djUVyj9T19634', '0'),
(1381, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:48:59', 'Android Application', 'djUVyj9T19634', '0'),
(1382, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:49:24', 'Android Application', 'djUVyj9T19634', '0'),
(1383, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:49:27', 'Android Application', 'djUVyj9T19634', '0'),
(1384, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:49:30', 'Android Application', 'djUVyj9T19634', '0'),
(1385, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:50:14', 'Android Application', 'djUVyj9T19634', '0'),
(1386, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:50:18', 'Android Application', 'djUVyj9T19634', '0'),
(1387, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-03-23 13:50:25', 'Android Application', 'djUVyj9T19634', '0'),
(1388, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 13:50:30', 'Android Application', 'djUVyj9T19634', '0'),
(1389, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-03-23 13:50:33', 'Android Application', 'djUVyj9T19634', '0'),
(1390, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-03-23 13:50:42', 'Android Application', 'djUVyj9T19634', '0'),
(1391, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-23 13:50:44', 'Android Application', 'djUVyj9T19634', '0'),
(1392, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-03-23 13:50:50', 'Android Application', 'djUVyj9T19634', '0'),
(1393, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:51:03', 'Android Application', 'djUVyj9T19634', '0'),
(1394, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 13:51:19', 'Android Application', 'djUVyj9T19634', '0'),
(1395, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-23 13:51:31', 'Android Application', 'djUVyj9T19634', '0'),
(1396, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-03-23 13:51:33', 'Android Application', 'djUVyj9T19634', '0'),
(1397, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-23 14:04:38', 'Android Application', 'djUVyj9T19634', '0'),
(1398, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-03-23 14:08:41', 'Android Application', 'djUVyj9T19634', '0'),
(1399, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-23 14:08:49', 'Android Application', 'djUVyj9T19634', '0'),
(1400, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-03-23 14:09:04', 'Android Application', 'djUVyj9T19634', '0'),
(1401, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-01 15:16:03', 'Android Application', 'djUVyj9T19634', '0'),
(1402, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-04-02 14:14:54', 'Android Application', 'djUVyj9T19634', '0'),
(1403, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-04-02 14:19:21', 'Android Application', 'djUVyj9T19634', '0'),
(1404, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-02 16:10:45', 'Android Application', 'djUVyj9T19634', '0'),
(1405, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:18:31', 'UNKNOWN', '', '127.0.0.1'),
(1406, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:19:01', 'UNKNOWN', '', '127.0.0.1'),
(1407, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:19:15', 'UNKNOWN', '', '127.0.0.1'),
(1408, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:22:11', 'UNKNOWN', '', '127.0.0.1'),
(1409, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:27:16', 'UNKNOWN', '', '127.0.0.1'),
(1410, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:29:39', 'UNKNOWN', '', '127.0.0.1'),
(1411, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:38:48', 'UNKNOWN', '', '127.0.0.1'),
(1412, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:38:56', 'UNKNOWN', '', '127.0.0.1'),
(1413, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:39:11', 'UNKNOWN', '', '127.0.0.1'),
(1414, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:39:48', 'UNKNOWN', '', '127.0.0.1'),
(1415, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:41:13', 'UNKNOWN', '', '127.0.0.1'),
(1416, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:42:04', 'UNKNOWN', '', '127.0.0.1'),
(1417, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:42:58', 'UNKNOWN', '', '127.0.0.1'),
(1418, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:44:52', 'UNKNOWN', '', '127.0.0.1'),
(1419, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:45:40', 'UNKNOWN', '', '127.0.0.1'),
(1420, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:45:58', 'UNKNOWN', '', '127.0.0.1'),
(1421, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:46:31', 'UNKNOWN', '', '127.0.0.1'),
(1422, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:46:56', 'UNKNOWN', '', '127.0.0.1'),
(1423, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:47:47', 'UNKNOWN', '', '127.0.0.1'),
(1424, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:48:00', 'UNKNOWN', '', '127.0.0.1'),
(1425, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:48:40', 'UNKNOWN', '', '127.0.0.1'),
(1426, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:48:58', 'UNKNOWN', '', '127.0.0.1'),
(1427, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:49:13', 'UNKNOWN', '', '127.0.0.1'),
(1428, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:49:35', 'UNKNOWN', '', '127.0.0.1'),
(1429, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:58:03', 'UNKNOWN', '', '127.0.0.1'),
(1430, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 06:58:39', 'UNKNOWN', '', '127.0.0.1'),
(1431, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 07:01:04', 'UNKNOWN', '', '127.0.0.1'),
(1432, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 07:04:47', 'UNKNOWN', '', '127.0.0.1'),
(1433, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-03 07:38:18', 'UNKNOWN', '', '127.0.0.1'),
(1434, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-03 07:38:40', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1435, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-03 07:40:32', 'Android Application', 'djUVyj9T19634', '0'),
(1436, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-03 07:43:17', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1437, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-03 07:49:59', 'Android Application', 'djUVyj9T19634', '0'),
(1438, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-03 07:58:16', 'Android Application', 'djUVyj9T19634', '0'),
(1439, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-03 07:59:14', 'Android Application', 'djUVyj9T19634', '0'),
(1440, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-03 08:00:02', 'Android Application', 'djUVyj9T19634', '0'),
(1441, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-03 08:01:03', 'Android Application', 'djUVyj9T19634', '0'),
(1442, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-03 08:01:53', 'Android Application', 'djUVyj9T19634', '0'),
(1443, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-03 08:02:01', 'Android Application', 'djUVyj9T19634', '0'),
(1444, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-03 08:02:05', 'Android Application', 'djUVyj9T19634', '0'),
(1445, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-03 08:02:06', 'Android Application', 'djUVyj9T19634', '0'),
(1446, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-03 08:02:09', 'Android Application', 'djUVyj9T19634', '0'),
(1447, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-03 08:02:11', 'Android Application', 'djUVyj9T19634', '0'),
(1448, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-03 08:02:14', 'Android Application', 'djUVyj9T19634', '0'),
(1449, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-03 08:02:17', 'Android Application', 'djUVyj9T19634', '0'),
(1450, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-03 08:41:40', 'Android Application', 'djUVyj9T19634', '0'),
(1451, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-04 16:30:14', 'Android Application', 'djUVyj9T19634', '0'),
(1452, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-04 16:30:24', 'Android Application', 'djUVyj9T19634', '0'),
(1453, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-04-04 16:33:08', 'Android Application', 'djUVyj9T19634', '0'),
(1454, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-04 16:33:36', 'Android Application', 'djUVyj9T19634', '0'),
(1455, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-04 16:33:49', 'Android Application', 'djUVyj9T19634', '0'),
(1456, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-04 16:35:01', 'Android Application', 'djUVyj9T19634', '0'),
(1457, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-04 16:35:06', 'Android Application', 'djUVyj9T19634', '0'),
(1458, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-04 16:35:13', 'Android Application', 'djUVyj9T19634', '0'),
(1459, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-04 16:35:30', 'Android Application', 'djUVyj9T19634', '0'),
(1460, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-04 16:39:36', 'Android Application', 'djUVyj9T19634', '0'),
(1461, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-05 06:37:48', 'Android Application', 'djUVyj9T19634', '0'),
(1462, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-04-05 06:44:27', 'Android Application', 'djUVyj9T19634', '0'),
(1463, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-05 06:47:16', 'Android Application', 'djUVyj9T19634', '0'),
(1464, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-05 06:51:15', 'Android Application', 'djUVyj9T19634', '0'),
(1465, 'hn_iVdvN0H8qj4u', 'djUVyj9T19634', '2022-04-05 06:51:18', 'Android Application', 'djUVyj9T19634', '0'),
(1466, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-05 07:21:00', 'Android Application', 'djUVyj9T19634', '0'),
(1467, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-05 07:22:17', 'Android Application', 'djUVyj9T19634', '0'),
(1468, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-05 07:23:49', 'Android Application', 'djUVyj9T19634', '0'),
(1469, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-05 07:27:58', 'Android Application', 'djUVyj9T19634', '0'),
(1470, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 07:29:13', 'Android Application', 'djUVyj9T19634', '0'),
(1471, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-04-05 07:29:55', 'Android Application', 'djUVyj9T19634', '0'),
(1472, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 07:38:10', 'Android Application', 'djUVyj9T19634', '0'),
(1473, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-05 07:49:20', 'Android Application', 'djUVyj9T19634', '0'),
(1474, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-05 07:49:23', 'Android Application', 'djUVyj9T19634', '0'),
(1475, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-05 07:50:09', 'Android Application', 'djUVyj9T19634', '0'),
(1476, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-05 08:01:57', 'Android Application', 'djUVyj9T19634', '0'),
(1477, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-05 09:00:30', 'Android Application', 'djUVyj9T19634', '0'),
(1478, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 09:01:06', 'Android Application', 'djUVyj9T19634', '0'),
(1479, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-05 09:02:17', 'Android Application', 'djUVyj9T19634', '0'),
(1480, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 09:02:19', 'Android Application', 'djUVyj9T19634', '0'),
(1481, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 09:02:27', 'Android Application', 'djUVyj9T19634', '0'),
(1482, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-05 09:23:55', 'Android Application', 'djUVyj9T19634', '0'),
(1483, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-05 09:24:07', 'Android Application', 'djUVyj9T19634', '0'),
(1484, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-05 09:27:38', 'Android Application', 'djUVyj9T19634', '0'),
(1485, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-05 09:28:09', 'Android Application', 'djUVyj9T19634', '0'),
(1486, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-04-06 05:05:20', 'Android Application', 'djUVyj9T19634', '0'),
(1487, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-06 05:23:45', 'Android Application', 'djUVyj9T19634', '0'),
(1488, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-06 05:23:50', 'Android Application', 'djUVyj9T19634', '0'),
(1489, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-06 05:27:29', 'Android Application', 'djUVyj9T19634', '0'),
(1490, '-pRbCQSvn5LrRd6', 'djUVyj9T19634', '2022-04-06 05:28:45', 'Android Application', 'djUVyj9T19634', '0'),
(1491, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-06 05:28:50', 'Android Application', 'djUVyj9T19634', '0'),
(1492, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-04-06 05:41:52', 'Android Application', 'djUVyj9T19634', '0'),
(1493, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-06 05:42:35', 'Android Application', 'djUVyj9T19634', '0'),
(1494, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-06 06:03:31', 'Android Application', 'djUVyj9T19634', '0'),
(1495, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-04-06 06:03:55', 'Android Application', 'djUVyj9T19634', '0'),
(1496, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-06 06:03:57', 'Android Application', 'djUVyj9T19634', '0'),
(1497, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-06 06:04:11', 'Android Application', 'djUVyj9T19634', '0'),
(1498, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-06 06:04:14', 'Android Application', 'djUVyj9T19634', '0'),
(1499, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-06 06:04:15', 'Android Application', 'djUVyj9T19634', '0'),
(1500, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:04:19', 'Android Application', 'djUVyj9T19634', '0'),
(1501, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-06 06:05:13', 'Android Application', 'djUVyj9T19634', '0'),
(1502, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-06 06:05:16', 'Android Application', 'djUVyj9T19634', '0'),
(1503, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:05:19', 'Android Application', 'djUVyj9T19634', '0'),
(1504, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:05:35', 'Android Application', 'djUVyj9T19634', '0'),
(1505, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:06:35', 'Android Application', 'djUVyj9T19634', '0'),
(1506, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-06 06:06:41', 'Android Application', 'djUVyj9T19634', '0'),
(1507, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-06 06:06:47', 'Android Application', 'djUVyj9T19634', '0'),
(1508, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-06 06:06:52', 'Android Application', 'djUVyj9T19634', '0'),
(1509, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:07:04', 'Android Application', 'djUVyj9T19634', '0'),
(1510, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-06 06:07:09', 'Android Application', 'djUVyj9T19634', '0'),
(1511, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 06:08:03', 'Android Application', 'djUVyj9T19634', '0'),
(1512, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-06 06:08:06', 'Android Application', 'djUVyj9T19634', '0'),
(1513, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-06 06:09:19', 'Android Application', 'djUVyj9T19634', '0'),
(1514, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-06 06:09:23', 'Android Application', 'djUVyj9T19634', '0'),
(1515, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-04-06 06:09:25', 'Android Application', 'djUVyj9T19634', '0'),
(1516, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-06 06:09:31', 'Android Application', 'djUVyj9T19634', '0'),
(1517, 'ddr0D4PRxhm_r_N', 'djUVyj9T19634', '2022-04-06 06:09:32', 'Android Application', 'djUVyj9T19634', '0'),
(1518, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-04-06 09:31:07', 'Android Application', 'djUVyj9T19634', '0'),
(1519, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-06 09:34:23', 'Android Application', 'djUVyj9T19634', '0'),
(1520, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-06 09:36:13', 'Android Application', 'djUVyj9T19634', '0'),
(1521, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-06 09:38:41', 'Android Application', 'djUVyj9T19634', '0'),
(1522, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-06 15:54:10', 'Android Application', 'djUVyj9T19634', '0'),
(1523, 'FQJhqkiVB_XYAUZ', 'djUVyj9T19634', '2022-04-06 15:54:28', 'Android Application', 'djUVyj9T19634', '0'),
(1524, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-04-06 15:54:37', 'Android Application', 'djUVyj9T19634', '0'),
(1525, '0NeBb8NgEVkwjb4', 'YiDQYr2LE37UK', '2022-04-06 15:55:13', 'Android Application', 'djUVyj9T19634', '0'),
(1526, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-06 15:57:14', 'Android Application', 'djUVyj9T19634', '0'),
(1527, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-06 16:15:34', 'Android Application', 'djUVyj9T19634', '0'),
(1528, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-06 16:15:37', 'Android Application', 'djUVyj9T19634', '0'),
(1529, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-08 03:37:33', 'Android Application', 'djUVyj9T19634', '0'),
(1530, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-04-08 03:43:12', 'Android Application', 'djUVyj9T19634', '0'),
(1531, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-08 04:03:56', 'Android Application', 'djUVyj9T19634', '0'),
(1532, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:05:16', 'Android Application', 'djUVyj9T19634', '0'),
(1533, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:06:03', 'Android Application', 'djUVyj9T19634', '0'),
(1534, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:07:12', 'Android Application', 'djUVyj9T19634', '0'),
(1535, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:10:09', 'Android Application', 'djUVyj9T19634', '0'),
(1536, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 04:10:28', 'UNKNOWN', '', '127.0.0.1'),
(1537, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:10:53', 'UNKNOWN', '', '127.0.0.1'),
(1538, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-04-08 04:41:09', 'Android Application', 'djUVyj9T19634', '0'),
(1539, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:41:17', 'Android Application', 'djUVyj9T19634', '0'),
(1540, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 04:42:39', 'Android Application', 'djUVyj9T19634', '0'),
(1541, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 04:42:57', 'Android Application', 'djUVyj9T19634', '0'),
(1542, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-08 04:44:15', 'Android Application', 'djUVyj9T19634', '0'),
(1543, 'yPElsKNRdZBWnP7', 'YiDQYr2LE37UK', '2022-04-08 04:44:27', 'Android Application', 'djUVyj9T19634', '0'),
(1544, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 05:02:43', 'UNKNOWN', '', '127.0.0.1'),
(1545, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 05:03:26', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1546, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 05:04:24', 'Android Application', 'djUVyj9T19634', '0'),
(1547, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 05:04:35', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1548, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 06:14:59', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1549, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-08 06:27:26', 'Android Application', 'djUVyj9T19634', '0'),
(1550, 'GZUpzRNThwCiit5', 'YiDQYr2LE37UK', '2022-04-08 06:27:38', 'Android Application', 'djUVyj9T19634', '0'),
(1551, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-08 06:27:40', 'Android Application', 'djUVyj9T19634', '0'),
(1552, 'gr0oRIYkfVJlPAC', 'djUVyj9T19634', '2022-04-08 06:27:57', 'Android Application', 'djUVyj9T19634', '0'),
(1553, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-08 06:36:48', 'Android Application', 'djUVyj9T19634', '0'),
(1554, 'CoeGpel2I7TFUak', 'djUVyj9T19634', '2022-04-09 04:07:46', 'Android Application', 'djUVyj9T19634', '0'),
(1555, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-10 08:30:50', 'Android Application', 'djUVyj9T19634', '0'),
(1556, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-10 08:30:58', 'Android Application', 'djUVyj9T19634', '0'),
(1557, '2q_3sxC0nIkfuSt', 'djUVyj9T19634', '2022-04-10 08:31:10', 'Android Application', 'djUVyj9T19634', '0'),
(1558, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-05-02 11:06:22', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1559, 'nniVjpXws-TIjXc', 'djUVyj9T19634', '2022-05-02 14:36:50', 'UNKNOWN', 'djUVyj9T19634', '127.0.0.1'),
(1560, 'rouIAdoXlxjw5mH', 'djUVyj9T19634', '2022-06-11 13:58:20', 'UNKNOWN', '', '127.0.0.1'),
(1561, 'SpbPkSEekY4v5tW', 'djUVyj9T19634', '2022-06-11 14:01:33', 'UNKNOWN', '4z4mXD2set_c1', '127.0.0.1'),
(1562, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-06-25 10:56:56', 'UNKNOWN', '', '127.0.0.1'),
(1563, 'pcoMwOKt3OSlTpb', 'YiDQYr2LE37UK', '2022-06-25 10:57:09', 'UNKNOWN', '', '127.0.0.1'),
(1564, 'oi1hbfYQb1rpfjx', 'YiDQYr2LE37UK', '2022-10-01 04:43:55', 'UNKNOWN', '', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `achievement_data`
--
ALTER TABLE `achievement_data`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `achievement_data_ibfk_1` (`Achievement_Id`),
  ADD KEY `achievement_data_ibfk_2` (`Channel_Url`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `User_Url` (`User_Url`),
  ADD KEY `Post_Url` (`Post_Url`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `comments_ibfk_1` (`User_Url`),
  ADD KEY `comments_ibfk_2` (`Channel_Url`),
  ADD KEY `comments_ibfk_3` (`Post_Url`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `joiner`
--
ALTER TABLE `joiner`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `joiner_ibfk_1` (`Channel_Url`),
  ADD KEY `joiner_ibfk_2` (`User_Url`);

--
-- Indexes for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `like_dislike_ibfk_2` (`Post_Url`),
  ADD KEY `like_dislike_ibfk_3` (`Channel_Url`),
  ADD KEY `like_dislike_ibfk_4` (`User_Url`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `notification_ibfk_2` (`Post_Url`),
  ADD KEY `notification_ibfk_1` (`Channel_Url`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Url`),
  ADD KEY `post_ibfk_1` (`Channel_Url`),
  ADD KEY `post_ibfk_2` (`Category_Id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `tags_ibfk_1` (`Post_Url`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`Url`),
  ADD KEY `user_account_ibfk_1` (`Country_Id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `views_ibfk_1` (`Post_Url`),
  ADD KEY `views_ibfk_2` (`Channel_Url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `achievement_data`
--
ALTER TABLE `achievement_data`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `joiner`
--
ALTER TABLE `joiner`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `like_dislike`
--
ALTER TABLE `like_dislike`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1565;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement_data`
--
ALTER TABLE `achievement_data`
  ADD CONSTRAINT `achievement_data_ibfk_1` FOREIGN KEY (`Achievement_Id`) REFERENCES `achievement` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `achievement_data_ibfk_2` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`User_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookmark_ibfk_3` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`User_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `joiner`
--
ALTER TABLE `joiner`
  ADD CONSTRAINT `joiner_ibfk_1` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `joiner_ibfk_2` FOREIGN KEY (`User_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `like_dislike`
--
ALTER TABLE `like_dislike`
  ADD CONSTRAINT `like_dislike_ibfk_2` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_dislike_ibfk_3` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `like_dislike_ibfk_4` FOREIGN KEY (`User_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`Country_Id`) REFERENCES `countries` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_ibfk_1` FOREIGN KEY (`Post_Url`) REFERENCES `post` (`Url`) ON DELETE CASCADE,
  ADD CONSTRAINT `views_ibfk_2` FOREIGN KEY (`Channel_Url`) REFERENCES `user_account` (`Url`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
