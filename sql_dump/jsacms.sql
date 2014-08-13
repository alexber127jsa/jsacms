-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 13 2014 г., 19:42
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `jsacms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `in_published` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `params1` text NOT NULL,
  `params2` text NOT NULL,
  `params3` text NOT NULL,
  `params4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `keywords`, `summary`, `content`, `in_published`, `created`, `view`, `params1`, `params2`, `params3`, `params4`) VALUES
(2, 'Статья 1', 'Статья 1', 'Статья 1', 'Статья 1', 'Статья 1', 1, '2014-08-13 14:39:26', 0, '', '', '', ''),
(3, 'Статья 2', 'Статья 2', 'Статья 2', 'Статья 2', 'Статья 2', 1, '2014-08-13 14:40:15', 0, '', '', '', ''),
(4, 'Статья 3', 'Статья 3', 'Статья 3', 'Статья 3', 'Статья 3', 1, '2014-08-13 14:40:23', 0, '', '', '', ''),
(5, 'Статья 4', 'Статья 4', 'Статья 4', 'Статья 4', 'Статья 4', 1, '2014-08-13 14:40:32', 0, '', '', '', ''),
(6, 'Статья 5', 'Статья 5', 'Статья 5', 'Статья 5', 'Статья 5', 1, '2014-08-13 14:40:40', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `in_published` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `params1` text NOT NULL,
  `params2` text NOT NULL,
  `params3` text NOT NULL,
  `params4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `in_published` int(11) NOT NULL,
  `in_new` int(11) NOT NULL,
  `in_action` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price_current` float NOT NULL,
  `price_old` float NOT NULL,
  `params1` text NOT NULL,
  `params2` text NOT NULL,
  `params3` text NOT NULL,
  `params4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `in_published` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL,
  `params1` text NOT NULL,
  `params2` text NOT NULL,
  `params3` text NOT NULL,
  `params4` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `keywords`, `summary`, `content`, `in_published`, `created`, `view`, `params1`, `params2`, `params3`, `params4`) VALUES
(1, 'Первая новость', 'Первая новость', 'Первая новость', 'Первая новость короткое описание', 'Первая новость полное описание', 1, '2014-08-09 07:09:05', 0, '', '', '', ''),
(2, 'Вторая новость', 'Вторая новость', 'Вторая новость', 'Вторая новость короткое описание', 'Вторая новость полное описание', 1, '2014-08-09 07:09:05', 0, '', '', '', ''),
(3, 'Третья новость', 'Третья новость', 'Третья новость', 'Третья новость короткое описание', 'Третья новость полное описание', 1, '2014-08-09 07:12:20', 0, '', '', '', ''),
(4, 'Четвертая новость', 'Четвертая новость', 'Четвертая новость', 'Четвертая новость короткое описание', 'Четвертая новость полное описание', 1, '2014-08-09 07:12:20', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(1000) NOT NULL DEFAULT 'pages',
  `slug` text NOT NULL,
  `name_menu` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `in_published` enum('0','1') NOT NULL,
  `in_menu` enum('0','1') NOT NULL,
  `view` int(11) NOT NULL,
  `params1` text NOT NULL,
  `params2` text NOT NULL,
  `params3` text NOT NULL,
  `params4` text NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `type`, `slug`, `name_menu`, `title`, `description`, `keywords`, `summary`, `content`, `created`, `in_published`, `in_menu`, `view`, `params1`, `params2`, `params3`, `params4`, `position`) VALUES
(1, 'pages', 'main', 'Главная', 'Основная страница сайта', 'Основная страница сайта', 'Основная страница сайта', 'Основная страница сайта короткое описание', 'Основная страница сайта полное описание', '2014-08-09 06:29:08', '1', '1', 0, '', '', '', '', 1),
(2, 'pages', 'main2', 'Страница 2', 'Вторая страница сайта', 'Вторая страница сайта', 'Вторая страница сайта', 'Вторая страница сайта короткое описание', 'Вторая страница сайта полное описание', '2014-08-09 06:29:08', '1', '1', 0, '', '', '', '', 2),
(3, 'pages', 'main3', 'Страница 3', 'Третья страница', 'Третья страница', 'Третья страница', 'Третья страница короткое описание', 'Третья страница полное описание', '2014-08-09 06:32:28', '1', '1', 0, '', '', '', '', 3),
(4, 'pages', 'main4', 'Страница 4', 'Четвертая страница', 'Четвертая страница', 'Четвертая страница', 'Четвертая страница короткое описание', 'Четвертая страница полное описание ', '2014-08-09 06:32:28', '1', '1', 0, '', '', '', '', 4),
(5, 'pages', 'main5', 'Страница 5', 'Пятая страница', 'Пятая страница', 'Пятая страница', 'Пятая страница', 'Пятая страница', '2014-08-09 06:35:18', '1', '1', 0, '', '', '', '', 5),
(6, 'pages', 'main6', 'Страница 6', 'Шестая страница', 'Шестая страница', 'Шестая страница', 'Шестая страница короткое описание', 'Шестая страница полное описание', '2014-08-09 06:35:18', '1', '1', 0, '', '', '', '', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `sess`
--

CREATE TABLE IF NOT EXISTS `sess` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sess`
--

INSERT INTO `sess` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ad32636b95df86240f89aeef076b3606', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.125 Safari/537.36', 1407939434, 'a:1:{s:9:"user_data";a:7:{s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:32:"202cb962ac59075b964b07152d234b70";s:5:"email";s:14:"admin@admin.ru";s:6:"status";s:1:"0";s:7:"comment";s:37:"Администратор сайта";s:4:"auth";b:1;}}');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `status`, `comment`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin@admin.ru', 0, 'Администратор сайта');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
