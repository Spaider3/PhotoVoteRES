-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 08 2011 г., 08:22
-- Версия сервера: 5.1.52
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `user437_photovote`
--

-- --------------------------------------------------------

--
-- Структура таблицы `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `Number` int(250) NOT NULL AUTO_INCREMENT,
  `NS` tinytext NOT NULL,
  `Photo` text NOT NULL,
  `Rating` int(12) NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `profiles`
--

INSERT INTO `profiles` (`Number`, `NS`, `Photo`, `Rating`) VALUES
(1, 'Ð’Ð¸ÐºÑƒÑÑ ÐšÐ°Ð½Ñ‚Ñ€', 'images/upload_profiles/1.jpg', 618),
(2, 'Ð•Ð»ÐµÐ½Ð°  ÐœÐ¸Ñ…ÐµÐ´Ð¾Ð²Ð°', 'images/upload_profiles/2.jpg', 532),
(3, 'ÐœÐ°Ñ€Ð¸Ð½Ð° ÐŸÑ€Ð¾ÐºÐ¾Ð¿ÐµÐ½ÐºÐ¾', 'images/upload_profiles/3.jpg', 809),
(4, 'Ð”Ð°Ñ€ÑŒÑ  ÐÑ€Ñ‚Ð°Ð¼Ð¾Ð½Ð¾Ð²Ð°', 'images/upload_profiles/4.jpg', 329),
(5, 'Ð›ÐµÐ½Ð° Ð©ÐµÑ‚Ð¸Ð½Ð¸Ð½Ð°', 'images/upload_profiles/5.jpg', 61),
(6, 'ÐœÐ°Ñ€Ð¸Ð½Ð° Ð“Ð¾Ñ€Ð¾Ð´ÐµÑ†ÐºÐ¾Ð³Ð¾', 'images/upload_profiles/6.jpg', 32),
(7, 'Ð’Ð¸ÐºÐ° sexy Ð¡Ð°Ð¼Ð¾Ð¹Ð»Ð¾Ð²Ð°', 'images/upload_profiles/7.jpg', 38),
(8, 'Ð’Ð¸ÐºÐ°  ÐœÐ°Ð»ÑŽÑ‚Ð¸Ð½Ð°', 'images/upload_profiles/8.jpg', 66),
(9, 'ÐšÑ€Ð¸ÑÑ‚Ð¸Ð½Ð° Ð›ÐµÐºÐ¾Ð½Ñ†ÐµÐ²Ð°', 'images/upload_profiles/9.jpg', 360),
(10, 'Ð›ÐµÐ½ÐºÐ° Ð¯ÐºÑƒÐ±Ñ‹ÑˆÐ¸Ð½Ð°', 'images/upload_profiles/10.jpg', 1227),
(11, 'Ð¯ÑÑŽÐ½Ñ ÐÐ¾Ð²Ð¸ÐºÐ¾Ð²Ð°', 'images/upload_profiles/11.jpg', 946),
(12, 'Ð’Ð¸ÐºÑƒÑÑŒÐºÐ°  Ð•Ñ„Ñ€ÐµÐ¼Ð¾Ð²Ð°', 'images/upload_profiles/12.jpg', 73),
(13, 'ÐœÐ°Ñ€Ð¸Ð°Ð¼ Ð®Ñ€Ñ‡ÐµÐ½ÐºÐ¾Ð²Ð°', 'images/upload_profiles/13.jpg', 60),
(14, 'ÐÐ»Ñ‘Ð½Ñ‡Ð¸Ðº Ð—ÑƒÐ±Ð°ÐºÐ¾Ð²Ð°', 'images/upload_profiles/14.jpg', 203),
(15, 'ÐÐ°ÑÑ‚Ñ  Ð‘ÑƒÐ»Ð°Ñ‚Ð¾Ð²Ð°', 'images/upload_profiles/15.jpg', 169),
(16, 'ÐšÑÐµÐ½Ð¸Ñ  Ð£Ð»ÐµÑÐ¾Ð²Ð°', 'images/upload_profiles/16.jpg', 145),
(17, 'ÐžÐ»ÑŒÐ³Ð°  ÐœÐ¾ÐºÑ€Ð¸Ð´ÐµÐ½ÐºÐ¾', 'images/upload_profiles/17.jpg', 155),
(18, 'Ð®Ð»Ñ ÐšÐ¾Ñ‡ÐµÐ³Ð°Ñ€Ð¾Ð²Ð°', 'images/upload_profiles/18.jpg', 793),
(19, 'Ð¢Ð¾Ð¼Ð° ÐœÐ¸Ñ€Ð¾Ð½Ñ‡Ð¸Ðº', 'images/upload_profiles/19.jpg', 51),
(20, 'Ð’Ð°Ð»ÐµÑ€Ð¸Ñ Ð›ÐµÐ³Ð°', 'images/upload_profiles/20.jpg', 346),
(21, 'Ð®Ð»Ð¸Ñ  ÐÐ´Ð°ÑˆÐµÐ²Ð°', 'images/upload_profiles/21.jpg', 302),
(22, 'Ð”Ð°ÑˆÐ°  Ð¡Ð¾Ð»Ð¾Ð²ÑŒÐµÐ²Ð°', 'images/upload_profiles/22.jpg', 268),
(23, 'ÐÐ½ÑŽÑ‚ÐºÐ° Ð˜Ð»ÑŒÐ¸Ð½Ð°', 'images/upload_profiles/23.jpg', 119),
(24, 'Ð•Ð²Ð³ÐµÐ½Ð¸Ñ Ð•Ð²Ð´Ð¾ÐºÐ¸Ð¼Ð¾Ð²Ð°', 'images/upload_profiles/24.jpg', 194),
(25, 'ÐšÐ°Ñ‚Ñ Ð¡Ð°Ð¼Ð±ÑƒÐºÐ°', 'images/upload_profiles/25.jpg', 456),
(26, 'ÐœÐ¸Ð»Ð° ÐÐ»Ñ‹ÐºÐµÐµÐ²Ð°', 'images/upload_profiles/26.jpg', 163),
(27, 'Ð ÐµÐ³Ð¸Ð½Ð° ÐœÐ°Ñ€Ñ‚Ðµ', 'images/upload_profiles/27.jpg', 283),
(28, 'ÐÐ°Ñ‚Ð°Ð»ÑŒÑ Lisica', 'images/upload_profiles/28.jpg', 272),
(29, 'Ð˜Ñ€Ð°  Ð¢Ð¸Ñ…Ð¾Ð¼Ð¸Ñ€Ð¾Ð²Ð°', 'images/upload_profiles/29.jpg', 262),
(30, 'ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€Ð°  ÐŸÐ°Ð²Ð»Ð¸Ð¹', 'images/upload_profiles/30.jpg', 145),
(31, 'Ð•Ð»ÐµÐ½Ð°  Ð£ÑÐ°ÐµÐ²Ð¸Ñ‡ ', 'images/upload_profiles/31.jpg', 312),
(32, 'Maria  Chemyakina', 'images/upload_profiles/32.jpg', 262),
(33, 'ÐšÑ€Ð¸ÑÑ‚Ð¸Ð½ÐºÐ° Ð¨Ð°Ñ€Ð°Ð½ÐºÐµÐ²Ð¸Ñ‡', 'images/upload_profiles/33.jpg', 242),
(34, 'Sanda Sudzumia', 'images/upload_profiles/34.jpg', 199),
(35, 'Ð¡Ð²ÐµÑ‚Ð»Ð°Ð½Ð°  Ð’Ð°ÑÐ¸Ð»ÑŒÐµÐ²Ð½Ð°', 'images/upload_profiles/35.jpg', 284),
(36, 'ÐžÐ»ÐµÐ½ÑŒÐºÐ° (Ð“Ð¾Ñ€Ð¾Ð´ÐµÑ†ÐºÐ¾Ð²Ð°)', 'images/upload_profiles/36.jpg', 166),
(37, 'Lyuba  Popova', 'images/upload_profiles/37.jpg', 415),
(38, 'ÐœÐ°Ñ€Ð¸Ð½Ð° ÐœÐ¸Ð»ÐµÐ½ÑŒÐºÐ°Ñ ÐšÐ¾Ð²Ð°Ð»ÑŒÑ‡ÑƒÐº', 'images/upload_profiles/38.jpg', 307),
(39, 'MaRiNkA  (Ð“Ñ€ÑÐ´Ð¾Ð²ÐºÐ¸Ð½Ð°)', 'images/upload_profiles/39.jpg', 208),
(40, 'Ð’ÐµÑ€Ð° Ð“Ð°Ñ€Ð±Ð°Ñ€ÐµÐ½ÐºÐ¾', 'images/upload_profiles/40.jpg', 310),
(41, 'Ð•ÐºÐ°Ñ‚ÐµÑ€Ð¸Ð½Ð°  Ð¨ÑƒÐ±Ð¸Ð½Ð°', 'images/upload_profiles/41.jpg', 113),
(42, 'ÐšÐ°Ñ€Ð¸Ð½Ð°  ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€Ð¾Ð²Ð½Ð°', 'images/upload_profiles/42.jpg', 118),
(43, 'Ð†Ñ€Ñ‡Ð¸Ðº ÐšÑ–Ð±ÐµÐ»ÑŒ', 'images/upload_profiles/43.jpg', 109),
(44, 'ÐÐ»Ð¸Ð½Ð° (Ð¢Ð°Ñ€Ð°ÐºÐ°ÑˆÐºÐ°)', 'images/upload_profiles/44.jpg', 437),
(45, 'Anna Krasnova', 'images/upload_profiles/45.jpg', 322),
(46, 'ÐÐ°ÑÑ‚ÑŽÑˆÐ°  Ð•Ð»Ð¸ÑÐµÐµÐ²Ð°', 'images/upload_profiles/46.jpg', 329),
(47, 'ÐÐ»Ñ‘Ð½Ð°  Ð›ÐµÐ¼ÐµÑˆÐ¾Ð½Ð¾Ðº', 'images/upload_profiles/47.jpg', 172),
(48, 'ÐŸÐ¾Ð»Ð¸Ð½Ð°  ÐÑ€Ñ‚Ñ‘Ð¼ÐµÐ½ÐºÐ¾', 'images/upload_profiles/48.jpg', 265),
(49, 'ÐšÐ°Ñ‚Ñ  (ÐšÐ¾Ð¼Ð¾Ð²Ð°)', 'images/upload_profiles/49.jpg', 316),
(50, 'Ð•ÐºÐ°Ñ‚ÐµÑ€Ð¸Ð½Ð° Ð•Ñ€ÑˆÐ°ÐºÐ¾Ð²Ð°', 'images/upload_profiles/50.jpg', 213),
(51, 'Kristusha  Fortynatova', 'images/upload_profiles/51.jpg', 167),
(52, 'Darya Dmitrieva', 'images/upload_profiles/52.jpg', 257),
(53, 'Ð•Ð»ÐµÐ½Ð° Ð“Ð°Ð»ÐºÐ¸Ð½Ð°', 'images/upload_profiles/53.jpg', 336),
(54, 'Ð¢Ð°Ñ‚ÑŒÑÐ½Ð° Ð¡Ñ‹Ñ‡Ñ‘Ð²Ð°', 'images/upload_profiles/54.jpg', 305),
(55, '|_P_Ð¾_Z_i_T_i_F_|', 'images/upload_profiles/23145-gbpics.eu.jpg', 254),
(57, 'balvanka', 'images/nophoto.jpg', 55),
(56, 'ÐÐ½Ñ ÐŸÑ€Ð¾Ñ…Ð¾Ñ€Ð¾Ð²Ð°', 'images/upload_profiles/56.jpg', 688),
(58, 'Ð¡Ð²ÐµÑ‚ÑƒÐ»Ñ Ð•Ð»Ð¸ÑÐµÐµÐ²Ð°', 'images/upload_profiles/58.jpg', 141),
(59, 'ÐÐ½Ñ ÐšÑ€ÑŽÐºÐ¾Ð²Ð°', 'images/upload_profiles/59.jpg', 377);
