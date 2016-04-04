-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 04 2016 г., 12:43
-- Версия сервера: 5.5.47-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.14

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` enum('lineage_free','lineage_classic','lineage_ruoff') NOT NULL,
  `server` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `characters`
--

INSERT INTO `characters` (`id`, `game`, `server`, `description`, `price`) VALUES
(3, 'lineage_ruoff', 'ruoff xx500', 'Очень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, да', 55550),
(4, 'lineage_ruoff', 'satan x666', 'Satan, oro te, appare te rosto! Veni, Satano! Ter oro te! Veni, Satano! Oro te pro arte! Veni, Satano! A te spero! Veni, Satano! Opera praestro, ater oro! Veni, Satano! Satan, oro te, appare te rosto! Veni, Satano! Amen.', 2300),
(5, 'lineage_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666),
(6, 'lineage_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666);

-- --------------------------------------------------------

--
-- Структура таблицы `cs_go_items`
--

CREATE TABLE IF NOT EXISTS `cs_go_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Структура таблицы `dota2_items`
--

CREATE TABLE IF NOT EXISTS `dota2_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Структура таблицы `items_lin`
--

CREATE TABLE IF NOT EXISTS `items_lin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` enum('lineage_classic','lineage_free','lineage_ruoff') NOT NULL,
  `server` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` enum('lineage_ruoff','lineage_classic','lineage_free','tera','arche_age') NOT NULL,
  `server` varchar(128) NOT NULL,
  `money` int(11) NOT NULL,
  `adena` int(11) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('new','done') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `game`, `server`, `money`, `adena`, `nickname`, `contact`, `comment`, `status`, `date`) VALUES
(1, 'lineage_ruoff', 'asdasd', 666, 1111111, 'valear', 'qwe', 'asdasdas ads asdasd asdasdasd', 'new', '2016-04-01 12:54:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
