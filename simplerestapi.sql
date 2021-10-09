-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2021 at 02:53 AM
-- Server version: 5.7.35-cll-lve
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjaliby_simplerestapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `rate`) VALUES
(1, 'Австралийский доллар', '52,8009'),
(2, 'Азербайджанский мана', '42,7125'),
(3, 'Фунт стерлингов Соед', '98,8021'),
(4, 'Армянских драмов', '14,7873'),
(5, 'Белорусский рубль', '28,9892'),
(6, 'Болгарский лев', '43,0444'),
(7, 'Бразильский реал', '13,3029'),
(8, 'Венгерских форинтов', '23,5877'),
(9, 'Гонконгских долларов', '93,2315'),
(10, 'Датская крона', '11,3192'),
(11, 'Доллар США', '72,5686'),
(12, 'Евро', '84,1723'),
(13, 'Индийских рупий', '97,4631'),
(14, 'Казахстанских тенге', '17,0770'),
(15, 'Канадский доллар', '57,6124'),
(16, 'Киргизских сомов', '85,5488'),
(17, 'Китайский юань', '11,2567'),
(18, 'Молдавских леев', '41,3614'),
(19, 'Норвежских крон', '84,5620'),
(20, 'Польский злотый', '18,3037'),
(21, 'Румынский лей', '17,0089'),
(22, 'СДР (специальные пра', '102,5605'),
(23, 'Сингапурский доллар', '53,4772'),
(24, 'Таджикских сомони', '64,0782'),
(25, 'Турецких лир', '81,9308'),
(26, 'Новый туркменский ма', '20,7635'),
(27, 'Узбекских сумов', '67,9630'),
(28, 'Украинских гривен', '27,4522'),
(29, 'Чешских крон', '33,2091'),
(30, 'Шведских крон', '83,0799'),
(31, 'Швейцарский франк', '78,3255'),
(32, 'Южноафриканских рэнд', '48,2831'),
(33, 'Вон Республики Корея', '61,1663'),
(34, 'Японских иен', '65,2977');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `log_info` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_attempted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `currency_id`, `log_info`, `date_attempted`) VALUES
(1, 0, 'Currency Updated', '2021-10-06 04:54:22'),
(2, 0, 'Currency Updated', '2021-10-06 04:57:09'),
(3, 0, 'Currency Updated', '2021-10-06 05:03:18'),
(4, 0, 'Currency Updated', '2021-10-06 05:03:35'),
(5, 0, 'Currency Updated', '2021-10-06 05:04:03'),
(6, 0, 'Currency Updated', '2021-10-06 05:04:38'),
(7, 0, 'Currency Updated', '2021-10-06 05:06:24'),
(8, 0, 'Currency Updated', '2021-10-06 05:07:36'),
(9, 0, 'Currency Updated', '2021-10-06 05:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `expire_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `fullname`, `email`, `token`, `expire_at`) VALUES
(4, 'Amit', 'user@email.com', '6565393035326565323132646265333665313030336234616266346339333333', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
