-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 23 2022 г., 10:48
-- Версия сервера: 8.0.29
-- Версия PHP: 8.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online-books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `surname`) VALUES
(1, 'Клайв', 'Баркер'),
(2, 'Дмитрий', 'Емец'),
(3, 'Джоан', 'Роулинг');

-- --------------------------------------------------------

--
-- Структура таблицы `author and book`
--

CREATE TABLE `author and book` (
  `id_a` int NOT NULL,
  `id_b` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author and book`
--

INSERT INTO `author and book` (`id_a`, `id_b`) VALUES
(1, 2),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `namebook` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `namebook`, `description`) VALUES
(1, 'Глоток Огня', 'Предводитель ведьмарей Гай выглядит как обычный ничем не примечательный человек, но это лишь на первый взгляд. На самом деле, Гаю пятьсот лет, когда-то он предал Шныр, заключил договор с могущественным эльбом и с тех пор ищет способ прорваться в параллельный мир, двушку, чтобы захватить его, присвоить, поработить. И кажется, Гай уже очень близок к своей цели, недаром все силы ведьмарей стянуты в Екатеринбург к геологическому музею. Значит Сашке, Улу и Родиону во что бы то ни стало нужно узнать, что же такого нашел там Гай.'),
(2, 'Каньон Холодных Сердец', 'Тодд Пикетт, один из самых популярных актеров Голливуда, после неудачной пластической операции ищет место, где бы он мог на время укрыться от всего мира. Его верный агент подыскивает ему заброшенное поместье в ущелье под названием Каньон холодных сердец. Тодд еще не знает, что у этого дома очень зловещая история. Все началось, когда сюда перевезли древние изразцовые интерьеры, купленные у монашеского ордена в Румынии, странную мозаику, с которой связано средневековое проклятие и которая способна толкнуть людей на чудовищные поступки. В каньоне Холодных Сердец до сих пор живут настоящие призраки и монстры, здесь ничто не забыто, здесь возможно все и ваши самые страшные кошмары могут обрести плоть и кровь.'),
(3, 'Гарри Поттер и Дары смерти', 'Книга, покорившая мир, эталон литературы, синоним успеха. Книга, ставшая культовой уже для нескольких поколений. \"Гарри Поттер и Дары Смерти\" - финал истории.');

-- --------------------------------------------------------

--
-- Структура таблицы `book and janr`
--

CREATE TABLE `book and janr` (
  `id_b` int NOT NULL,
  `id_j` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book and janr`
--

INSERT INTO `book and janr` (`id_b`, `id_j`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id_b` int NOT NULL,
  `id_u` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `janr`
--

CREATE TABLE `janr` (
  `id` int NOT NULL,
  `namejanr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `janr`
--

INSERT INTO `janr` (`id`, `namejanr`) VALUES
(1, 'Фэнтези'),
(2, 'Ужасы'),
(3, 'Приключение');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `img`, `full_name`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'img/16691785371669124484Warface_sample.jpg', 'JO', 'user'),
(2, 'admin1', '202cb962ac59075b964b07152d234b70', 'img/16691785671669124557Warface_sample.jpg', 'fewr', 'user'),
(3, 'user1', '202cb962ac59075b964b07152d234b70', 'img/16691792891669124906Warface_sample.jpg', 'lol', 'user'),
(4, 'Test', '202cb962ac59075b964b07152d234b70', 'img/166917943316691785671669124557Warface_sample.jpg', 'Ded', 'user'),
(5, 'lol', '202cb962ac59075b964b07152d234b70', 'img/1669180054166917943316691785671669124557Warface_sample.jpg', 'lols', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `author and book`
--
ALTER TABLE `author and book`
  ADD KEY `id_a` (`id_a`),
  ADD KEY `id_b` (`id_b`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book and janr`
--
ALTER TABLE `book and janr`
  ADD KEY `id_b` (`id_b`),
  ADD KEY `id_j` (`id_j`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD KEY `id_b` (`id_b`),
  ADD KEY `id_u` (`id_u`);

--
-- Индексы таблицы `janr`
--
ALTER TABLE `janr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `janr`
--
ALTER TABLE `janr`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author and book`
--
ALTER TABLE `author and book`
  ADD CONSTRAINT `author and book_ibfk_1` FOREIGN KEY (`id_a`) REFERENCES `author` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `author and book_ibfk_2` FOREIGN KEY (`id_b`) REFERENCES `book` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `book and janr`
--
ALTER TABLE `book and janr`
  ADD CONSTRAINT `book and janr_ibfk_1` FOREIGN KEY (`id_b`) REFERENCES `book` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `book and janr_ibfk_2` FOREIGN KEY (`id_j`) REFERENCES `janr` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_b`) REFERENCES `book` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
