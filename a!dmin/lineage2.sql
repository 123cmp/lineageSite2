-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 29 2016 г., 22:25
-- Версия сервера: 5.6.28-0ubuntu0.15.04.1
-- Версия PHP: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `lineage2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
`id` int(11) NOT NULL,
  `game` varchar(48) NOT NULL,
  `server` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `dota2_items`
--

CREATE TABLE IF NOT EXISTS `dota2_items` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `items_lin`
--

CREATE TABLE IF NOT EXISTS `items_lin` (
`id` int(11) NOT NULL,
  `game` varchar(48) NOT NULL,
  `server` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `game` varchar(48) NOT NULL,
  `server` varchar(128) NOT NULL,
  `money` int(11) NOT NULL,
  `adena` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('new','done') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `сs_go_items`
--

CREATE TABLE IF NOT EXISTS `сs_go_items` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `сs_go_items`
--

INSERT INTO `сs_go_items` (`id`, `name`, `price`) VALUES
(1, 'digl', 500),
(2, 'awp', 100500);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `characters`
--
ALTER TABLE `characters`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dota2_items`
--
ALTER TABLE `dota2_items`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items_lin`
--
ALTER TABLE `items_lin`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `сs_go_items`
--
ALTER TABLE `сs_go_items`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `characters`
--
ALTER TABLE `characters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `dota2_items`
--
ALTER TABLE `dota2_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `items_lin`
--
ALTER TABLE `items_lin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `сs_go_items`
--
ALTER TABLE `сs_go_items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
