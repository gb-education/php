-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2018 г., 14:07
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`, `alias`) VALUES
(1, 'DJI', 'dji'),
(5, 'Xiaomi Mi', 'xiaomi');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `alias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `alias`) VALUES
(1, 'Квадрокоптеры', 'quadcopters'),
(2, 'Комплектующие', 'parts');

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `text` text,
  `price` decimal(9,2) DEFAULT NULL,
  `price_sale` decimal(9,2) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` varchar(50) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `alias` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `title`, `description`, `img`, `text`, `price`, `price_sale`, `cat_id`, `brand_id`, `view_count`, `pubdate`, `visible`, `alias`) VALUES
(1, 'Квадрокоптер DJI Spark Fly More Combo', NULL, 'Описание 1', '/template/images/DJI-Mavic-drone-small.jpg', 'Текст 1', '1000.00', '950.00', 1, '1', 2, '2018-03-22 00:14:45', 1, 'drone1'),
(2, 'Квадрокоптер DJI Phantom 4 Pro', NULL, 'Описание 2', '/template/images/DJI-Mavic-drone-small.jpg', 'Текс 2', '2500.00', '1500.00', 1, '1', 3, '2018-03-22 00:14:45', 1, 'drone2'),
(3, 'Квадрокоптер RC Quadcopter Gimbal', NULL, 'Описание 3', '/template/images/DJI-Phantom-4-drone-small.jpg', 'Текс 3', '3000.00', NULL, 1, '2', 5, '2018-03-22 00:14:45', 1, 'drone3'),
(4, 'Запчасть для кварокоптера', NULL, NULL, '/template/images/DJI-Phantom-4-drone-small.jpg', NULL, NULL, NULL, 2, '1', 10, '2018-03-22 00:19:45', 10, 'drone4'),
(6, 'Квадрокоптер DJI Phantom 4 Pro', NULL, 'Описание 2', '/template/images/DJI-Mavic-drone-small.jpg', 'Текс 2', '2500.00', '1500.00', 1, '1', 9, '2018-03-22 00:50:55', 1, 'drone5');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `text`, `prod_id`) VALUES
(1, '', 'Очень классный дрон. Все нравится.', 1),
(2, '', 'Для начала сойдет.', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
