-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 31 2021 г., 00:46
-- Версия сервера: 8.0.26-0ubuntu0.20.04.2
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvcshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(1, 'category_name1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1),
(2, 'category_name2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1),
(3, 'category_name3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1),
(4, 'category_name4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `total`, `created_at`) VALUES
(28, 'www ', 'www@www.www', '3323323322', 'mkghjdkxyhmkyhkyikl', 100, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `SKU` int NOT NULL,
  `price` float NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `brand` varchar(255) NOT NULL,
  `img` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text NOT NULL,
  `is_new` int NOT NULL,
  `is_recommended` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `SKU`, `price`, `quantity`, `brand`, `img`, `description`, `is_new`, `is_recommended`) VALUES
(1, 'product_name1', 1, 123, 100, 10, 'jvhj', '1628442704-caroline-attwood-bpPTlXWTOvg-unsplash.jpg\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(2, 'product_name2', 2, 124, 110, 10, 'jvhj', '1628448625-andres-medina-Rm1Ca_g5Wck-unsplash.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(3, 'product_name3', 3, 125, 150, 10, 'jvhj', '1628448641-caroline-attwood-kC9KUtSiflw-unsplash.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(4, 'product_name4', 4, 126, 150, 10, 'jvhj', '1630020417-stories-8b8k6AsNY6c-unsplash (2).jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(5, 'product_name5', 4, 128, 150, 10, 'jvhj', '1630021669-vinitha-v-LPnJ146r9Mg-unsplash (1).jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(6, 'product_name6', 3, 130, 150, 10, 'jvhj', '1630022677-bermix-studio-KoJgcvbQVNI-unsplash (1).jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 1, 1),
(7, 'product_name7', 2, 222, 200, 5, 'ghjghj', '1630073420-augustine-fou-UnjSrcuf8aE-unsplash (1).jpg', 'cvghnchnb h gfhxfgh sfhsfgh', 1, 1),
(8, 'product_name8', 1, 252, 250, 5, 'ghjghj', '1630072585-jepsoy-sarmiento-_o5mOJ3lOCA-unsplash (1).jpg', 'cvghnchnb h gfhxfgh sfhsfgh', 1, 1),
(9, 'product_name9', 1, 4414, 300, 5, 'ghjghj', '1630072606-jonas-allert-MZ0U0g6RQpQ-unsplash (1).jpg', 'cvghnchnb h gfhxfgh sfhsfgh', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(155) NOT NULL,
  `pass` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Admin', 'admin@admin.com', '12345678'),
(37, 'bbb', 'bbb@bbb.bbb', '$2y$10$CWQD9lA8iVIkEMfqX1A5mu/zgD4aDkq4w/uybqDJ0ihAwSbESUjSi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`SKU`),
  ADD KEY `products_category_id_foreign` (`category_id`) USING BTREE;

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
