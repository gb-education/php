-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2018 г., 01:28
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
-- База данных: `gallery_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url_img` varchar(100) NOT NULL,
  `url_img_cropped` varchar(100) NOT NULL,
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `name`, `url_img`, `url_img_cropped`, `view_count`) VALUES
(55, 'gallery_img_01-1.jpg', 'gallery_img/gallery_img_01-1.jpg', 'gallery_img_cache/resize_gallery_img_01-1.jpg', 0),
(56, 'gallery_img_02.jpg', 'gallery_img/gallery_img_02.jpg', 'gallery_img_cache/resize_gallery_img_02.jpg', 1),
(57, 'gallery_img_03.jpg', 'gallery_img/gallery_img_03.jpg', 'gallery_img_cache/resize_gallery_img_03.jpg', 0),
(58, 'gallery_img_12.jpg', 'gallery_img/gallery_img_12.jpg', 'gallery_img_cache/resize_gallery_img_12.jpg', 0),
(59, 'gallery_img_13.jpg', 'gallery_img/gallery_img_13.jpg', 'gallery_img_cache/resize_gallery_img_13.jpg', 0),
(60, 'gallery_img_14.jpg', 'gallery_img/gallery_img_14.jpg', 'gallery_img_cache/resize_gallery_img_14.jpg', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
