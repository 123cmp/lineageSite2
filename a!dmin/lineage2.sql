-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 24 2016 г., 22:03
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `boost`
--

CREATE TABLE IF NOT EXISTS `boost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(128) NOT NULL,
  `desc_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `boost`
--

INSERT INTO `boost` (`id`, `game`, `desc_text`) VALUES
(2, 'lineage_ii_free', 'assdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdas');

-- --------------------------------------------------------

--
-- Структура таблицы `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `characters`
--

INSERT INTO `characters` (`id`, `game`, `server`, `description`, `price`) VALUES
(3, 'lineage_ii_ruoff', 'ruoff xx500', 'Очень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, да', 55550),
(4, 'lineage_ii_ruoff', 'satan x666', 'Satan, oro te, appare te rosto! Veni, Satano! Ter oro te! Veni, Satano! Oro te pro arte! Veni, Satano! A te spero! Veni, Satano! Opera praestro, ater oro! Veni, Satano! Satan, oro te, appare te rosto! Veni, Satano! Amen.', 2300),
(5, 'lineage_ii_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666),
(6, 'lineage_ii_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666),
(7, 'lineage_ii_free', 'satan x666', 'Satan, oro te, appare te rosto! Veni, Satano! Ter oro te! Veni, Satano! Oro te pro arte! Veni, Satano! A te spero! Veni, Satano! Opera praestro, ater oro! Veni, Satano! Satan, oro te, appare te rosto! Veni, Satano! Amen.', 666);

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(128) NOT NULL,
  `currency_name` varchar(48) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `game_name`, `currency_name`) VALUES
(1, 'lineage_ii_free', 'adena'),
(2, 'lineage_ii_free', 'col'),
(3, 'lineage_ii_classic', 'adena'),
(4, 'lineage_ii_ruoff', 'adena'),
(5, 'tera', 'gold'),
(6, 'archeage', 'gold');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(48) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `pages` set('gold','items','characters','boost') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `game_name`, `alias`, `pages`) VALUES
(1, 'Lineage II free', 'lineage_ii_free', 'gold,items,characters,boost'),
(3, 'Lineage II Ruoff', 'lineage_ii_ruoff', 'gold,items,characters,boost'),
(4, 'Lineage II Classic', 'lineage_ii_classic', 'gold,items,characters,boost'),
(5, 'ArcheAge', 'archeage', 'gold'),
(6, 'Tera', 'tera', 'gold'),
(7, 'CS GO', 'cs_go', 'items'),
(8, 'dota2', 'dota2', 'items');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(64) NOT NULL,
  `server` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `game`, `server`, `name`, `price`) VALUES
(2, 'dota2', NULL, 'qwe', 123),
(8, 'lineage_ii_ruoff', 'satan x666', 'кольцо баюма', 1212.5),
(9, 'lineage_ii_free', 'qwe', '123123', 222);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `money` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `currency` varchar(24) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('new','done') NOT NULL DEFAULT 'new',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `count` bigint(11) NOT NULL,
  `price` float NOT NULL,
  `currency_name` varchar(48) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `rates`
--

INSERT INTO `rates` (`id`, `game`, `server`, `count`, `price`, `currency_name`) VALUES
(11, 'lineage_ii_free', 'класик х 800', 2147483647, 0.000000000000974649, 'adena'),
(12, 'lineage_ii_free', 'ruoff xx500', 2147483647, 0.00000000097457, 'adena'),
(13, 'lineage_ii_free', 'satan x666', 1000, 0.015, 'col'),
(14, 'lineage_ii_free', 'daemon x666', 2147483647, 0.0000000014, 'adena'),
(15, 'lineage_ii_free', 'averia.ws x500', 100000000000, 0.0000000002, 'adena');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_id` int(11) NOT NULL,
  `count` bigint(20) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `rate_id`, `count`, `value`) VALUES
(11, 1, 100000000, 12),
(13, 1, 100000000000, 15),
(14, 1, 10000000000000, 20),
(15, 2, 1000000000, 10),
(16, 2, 10000000000, 12),
(17, 3, 10000, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
