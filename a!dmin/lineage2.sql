-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 06, 2016 at 02:36 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `lineage2`
--

-- --------------------------------------------------------

--
-- Table structure for table `boost`
--

CREATE TABLE `boost` (
  `id` int(11) NOT NULL,
  `game` varchar(128) NOT NULL,
  `desc_text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boost`
--

INSERT INTO `boost` (`id`, `game`, `desc_text`) VALUES
(2, 'lineage_ii_free', 'assdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdasassdaasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `game`, `server`, `description`, `price`) VALUES
(3, 'lineage_ii_ruoff', 'ruoff xx500', 'Очень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, даОчень хороший песонаж, да', 55550),
(4, 'lineage_ii_ruoff', 'satan x666', 'Satan, oro te, appare te rosto! Veni, Satano! Ter oro te! Veni, Satano! Oro te pro arte! Veni, Satano! A te spero! Veni, Satano! Opera praestro, ater oro! Veni, Satano! Satan, oro te, appare te rosto! Veni, Satano! Amen.', 2300),
(5, 'lineage_ii_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666),
(6, 'lineage_ii_free', 'daemon x666', 'Exorcizo te, immundissime spiritus, omnis incursio adversarii, omne phantasma, omnis legio, in nomine Domini nostri Jesu Christi eradicare, et effugare ab hoc plasmate Dei. Ipse tibi imperat, qui te de supernis caelorum in inferiora terrae demergi praecepit. Ipse tibi imperat, qui mari, ventis, et tempestatibus impersvit. Audi ergo, et time, satana, inimice fidei, hostis generis humani, mortis adductor, vitae raptor, justitiae declinator, malorum radix, fomes vitiorum, seductor hominum, proditor gentium, incitator invidiae, origo avaritiae, causa discordiae, excitator dolorum: quid stas, et resistis, cum scias. Christum Dominum vias tuas perdere? Illum metue, qui in Isaac immolatus est, in joseph venumdatus, in sgno occisus, in homine cruci- fixus, deinde inferni triumphator fuit. Sequentes cruces fiant in fronte obsessi. Recede ergo in nomine Patris et Filii, et Spiritus Sancti: da locum Spiritui Sancto, per hoc signum sanctae Cruci Jesu Christi Domini nostri: Qui cum Patre et eodem Spiritu Sancto vivit et regnat Deus, Per omnia saecula saeculorum. Et cum spiritu tuo. Amen.', 666),
(7, 'lineage_ii_free', 'satan x666', 'Satan, oro te, appare te rosto! Veni, Satano! Ter oro te! Veni, Satano! Oro te pro arte! Veni, Satano! A te spero! Veni, Satano! Opera praestro, ater oro! Veni, Satano! Satan, oro te, appare te rosto! Veni, Satano! Amen.', 666);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `game_name` varchar(128) NOT NULL,
  `currency_name` varchar(48) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `game_name`, `currency_name`) VALUES
(1, 'lineage_ii_free', 'adena'),
(2, 'lineage_ii_free', 'col'),
(3, 'lineage_ii_classic', 'adena'),
(4, 'lineage_ii_ruoff', 'adena'),
(5, 'tera', 'gold'),
(6, 'archeage', 'gold'),
(7, 'blade_and_soul', 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(48) NOT NULL,
  `alias` varchar(128) NOT NULL,
  `pages` set('gold','items','characters','boost') NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `alias`, `pages`, `img`) VALUES
(1, 'Lineage II free', 'lineage_ii_free', 'gold,items,characters,boost', '/img/games/lineage_ii_free.jpg'),
(3, 'Lineage II Ruoff', 'lineage_ii_ruoff', 'gold,items,characters,boost', '/img/games/lineage_ii_ruoff.jpg'),
(4, 'Lineage II Classic', 'lineage_ii_classic', 'gold,items,characters,boost', '/img/games/lineage_ii_classic.jpg'),
(5, 'Blade and Soul', 'blade_and_soul', 'gold,characters', '/img/games/blade_and_soul.jpg'),
(6, 'ArcheAge', 'archeage', 'gold', '/img/games/archeage.jpg'),
(7, 'Tera', 'tera', 'gold', '/img/games/tera.jpg'),
(8, 'CS GO', 'cs_go', 'items,boost', '/img/games/cs_go.jpg'),
(9, 'dota2', 'dota2', 'items,boost', '/img/games/dota2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `game` varchar(64) NOT NULL,
  `server` varchar(128) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `game`, `server`, `name`, `price`) VALUES
(2, 'dota2', NULL, 'qwe', 123),
(8, 'lineage_ii_ruoff', 'satan x666', 'кольцо баюма', 1212.5),
(9, 'lineage_ii_free', 'qwe', '123123', 222);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `money` float NOT NULL,
  `number` int(11) NOT NULL,
  `currency` varchar(24) NOT NULL,
  `nickname` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('new','done') NOT NULL DEFAULT 'new',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `game` varchar(128) NOT NULL,
  `server` varchar(128) NOT NULL,
  `count` bigint(11) NOT NULL,
  `price` float NOT NULL,
  `currency_name` varchar(48) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `game`, `server`, `count`, `price`, `currency_name`) VALUES
(13, 'lineage_ii_free', 'satan x666', 1000, 0.015, 'col'),
(15, 'lineage_ii_free', 'averia.ws x500', 100000000000, 0.0000000002, 'adena');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `count` bigint(20) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `rate_id`, `count`, `value`) VALUES
(11, 15, 100000000, 12),
(13, 1, 100000000000, 15),
(14, 1, 10000000000000, 20),
(15, 2, 1000000000, 10),
(16, 2, 10000000000, 12),
(17, 15, 10000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `id` int(11) NOT NULL,
  `game` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`id`, `game`, `type`, `file`) VALUES
(1, 'archeage', 'gold', 'aa_gold.html'),
(2, 'blade_and_soul', 'gold', 'bas_gold.html'),
(3, 'blade_and_soul', 'accounts', 'bas_accounts.html'),
(4, 'cs_go', 'items', 'cs_items.html'),
(5, 'dota2', 'items', 'd2_items.html'),
(6, 'tera', 'gold', 'tera_gold.html'),
(7, 'lineage_ii_free', 'accounts', 'l2free_acounts.html'),
(8, 'lineage_ii_free', 'adena', 'l2free_adena.html'),
(9, 'lineage_ii_free', 'col', 'l2free_col.html'),
(11, 'lineage_ii_free', 'items', 'l2free_items.html'),
(12, 'lineage_ii_ruoff', 'items', 'l2free_items.html'),
(13, 'lineage_ii_ruoff', 'col', 'l2free_col.html'),
(14, 'lineage_ii_ruoff', 'adena', 'l2free_adena.html'),
(15, 'lineage_ii_ruoff', 'accounts', 'l2free_acounts.html'),
(16, 'lineage_ii_classic', 'accounts', 'l2free_acounts.html'),
(17, 'lineage_ii_classic', 'adena', 'l2free_adena.html'),
(18, 'lineage_ii_classic', 'col', 'l2free_col.html'),
(19, 'lineage_ii_classic', 'items', 'l2free_items.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boost`
--
ALTER TABLE `boost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boost`
--
ALTER TABLE `boost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;