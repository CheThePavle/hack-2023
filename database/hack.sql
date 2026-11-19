-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2023 г., 03:41
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hack`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Искусство'),
(2, 'Концерты'),
(3, 'Музыка'),
(7, 'Для детей');

-- --------------------------------------------------------

--
-- Структура таблицы `event`
--

CREATE TABLE `event` (
  `id_event` int NOT NULL,
  `id_status` int NOT NULL,
  `id_category` int NOT NULL,
  `id_user` int NOT NULL,
  `name_event` varchar(255) NOT NULL,
  `address_event` varchar(255) NOT NULL,
  `description_event` text NOT NULL,
  `url_event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `beg_date_event` datetime NOT NULL,
  `end_date_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `event`
--

INSERT INTO `event` (`id_event`, `id_status`, `id_category`, `id_user`, `name_event`, `address_event`, `description_event`, `url_event`, `beg_date_event`, `end_date_event`) VALUES
(16, 3, 2, 2, 'Концерт Максим', 'г. Москва, ул. Апельсиновая 18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.', 'storage/events/SjGSHchFBBGodVdU.jpg', '2023-04-28 15:00:00', '2023-04-28 16:00:00'),
(17, 3, 1, 2, 'Концерт Руки Вверх', 'г. Санкт-Петербург, ул. Лимонная 13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/i12DxqcMvyGuE47w.jpg', '2023-05-05 21:00:00', '2023-05-05 23:00:00'),
(18, 3, 2, 2, 'Концерт BTS', 'г. Москва, ул. Ананасовая 23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/mqCTnf3qo0jDhSuD.jpg', '2023-04-26 06:03:00', '2023-04-26 07:03:00'),
(19, 3, 1, 2, 'Керамика мастер-класс', 'г. Киров, ул. Квартетная 27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/XYWrShqaRaBVzvdG.jpg', '2023-04-06 06:06:00', '2023-04-06 07:06:00'),
(20, 3, 1, 2, 'Мастер-класс по керамике', 'г. Великий Новгород, ул. Чистая 17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/V1d0xfi844kNrop6.jpg', '2023-04-30 07:08:00', '2023-04-30 08:08:00'),
(21, 3, 1, 2, 'Керамика мастер-класс', 'Адрес: г. Киров, ул. Квартетная 27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/95oXxvzaCHAo61BE.jpg', '2023-04-28 07:10:00', '2023-04-28 08:10:00'),
(22, 3, 7, 2, 'Фиксики танцуют', 'г. Омск, ул. Стенная 47', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/Z4sPzw2tDBdj7is5.jpg', '2023-04-25 08:12:00', '2023-04-25 09:13:00'),
(23, 3, 7, 2, 'Деревяшки', 'г. Уфа, ул. Сенная 20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/rJbrjGtU4jQK5Q4M.jpg', '2023-04-27 08:15:00', '2023-04-27 09:15:00'),
(24, 3, 1, 2, 'Керамика мастер-класс', 'г. Москва, ул. Апельсиновая 18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat purus. Suspendisse eleifend cursus porta. Aliquam mollis velit velit, quis viverra libero dignissim eget. Donec a commodo ex. Fusce non nunc id ligula tincidunt sagittis a non tellus. Nam ante risus, viverra et lorem at, porttitor pretium orci. Nullam placerat lacus et ipsum pretium venenatis at in nibh. Maecenas accumsan mauris et nunc euismod varius. Curabitur luctus aliquet condimentum. Morbi eu tincidunt metus, sed pretium dui.\r\n\r\nVivamus suscipit eros vel ante rutrum sagittis. Sed sit amet risus id lorem mollis auctor vitae quis metus. Nulla vel velit eros. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam tristique mauris non efficitur. Phasellus fermentum hendrerit consequat. Sed ac ullamcorper eros. Fusce a massa velit. Sed lorem risus, gravida vitae semper quis, aliquam in sem. Ut pellentesque turpis sem, ut ultricies ipsum mollis in. Cras quis venenatis dui. Duis gravida interdum eleifend. Donec blandit cursus libero, sit amet mattis urna porttitor ut.\r\n\r\nSuspendisse potenti. Nam porta eget sapien sagittis auctor. Donec vel nisl est. Nulla quis sapien justo. Aliquam erat volutpat. Pellentesque consectetur vehicula ultrices. In id leo maximus, bibendum sem et, pharetra diam. Sed dapibus lorem ut metus pellentesque gravida. Phasellus pretium venenatis odio vel sagittis.', 'storage/events/6c3NRdtgtZhdhnzo.jpg', '2023-04-20 03:40:00', '2023-04-20 03:45:00');

-- --------------------------------------------------------

--
-- Структура таблицы `permission`
--

CREATE TABLE `permission` (
  `id_permission` int NOT NULL,
  `name_permission` varchar(255) NOT NULL,
  `code_permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `permission`
--

INSERT INTO `permission` (`id_permission`, `name_permission`, `code_permission`) VALUES
(1, 'Добавлять админа', 'ADD_ADMIN'),
(2, 'Удалять админа ', 'DELETE_ADMIN'),
(3, 'Удалять мероприятие', 'DELETE_EVENT'),
(4, 'Добавлять категорию', 'ADD_CATEGORY'),
(5, 'Удалять категорию', 'DELETE_CATEGORY');

-- --------------------------------------------------------

--
-- Структура таблицы `question`
--

CREATE TABLE `question` (
  `id_question` int NOT NULL,
  `id_event` int NOT NULL,
  `id_user` int NOT NULL,
  `name_question` varchar(255) NOT NULL,
  `reply_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_question` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `question`
--

INSERT INTO `question` (`id_question`, `id_event`, `id_user`, `name_question`, `reply_question`, `date_question`) VALUES
(9, 17, 3, 'Концерт будет на стадионе?', 'Да', '2023-04-21 00:26:52');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `name_role` varchar(255) NOT NULL,
  `code_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `name_role`, `code_role`) VALUES
(1, 'Оператор', 'OPERATOR'),
(2, 'Администратор', 'ADMIN'),
(3, 'Организатор', 'ORGANIZER'),
(4, 'Пользователь', 'USER');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name_status` varchar(255) NOT NULL,
  `code_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name_status`, `code_status`) VALUES
(1, 'Отправлено', 'SENT'),
(2, 'Отклонено', 'REJECTED'),
(3, 'Опубликовано', 'PUBLISHED');

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int NOT NULL,
  `id_type_ticket` int NOT NULL,
  `id_user` int NOT NULL,
  `code_ticket` varchar(255) NOT NULL,
  `date_ticket` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_type_ticket`, `id_user`, `code_ticket`, `date_ticket`) VALUES
(75, 23, 3, 'mfbQ5W7qcKcglu7u', '2023-04-21 00:33:26'),
(76, 24, 3, 'h8AGrmqJMRKJgur5', '2023-04-21 00:33:26'),
(77, 32, 3, 'xJjclUJisqsXnmoH', '2023-04-21 00:36:48'),
(78, 32, 3, 'XMTijE9hBkXSHlsf', '2023-04-21 00:36:48');

-- --------------------------------------------------------

--
-- Структура таблицы `type_ticket`
--

CREATE TABLE `type_ticket` (
  `id_type_ticket` int NOT NULL,
  `id_event` int NOT NULL,
  `name_type_ticket` varchar(255) NOT NULL,
  `price_type_ticket` int NOT NULL,
  `size_type_ticket` int NOT NULL,
  `url_type_ticket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `type_ticket`
--

INSERT INTO `type_ticket` (`id_type_ticket`, `id_event`, `name_type_ticket`, `price_type_ticket`, `size_type_ticket`, `url_type_ticket`) VALUES
(20, 16, 'Входной билет', 3000, 2000, 'storage/tickets/vxOj7ao0W1APpE2G.png'),
(21, 16, 'VIP', 6000, 300, 'storage/tickets/VGrHpNjoM3q9rbbk.png'),
(22, 17, 'Входной билет', 4000, 2000, 'storage/tickets/kQahMJSNn1KlClBJ.png'),
(23, 17, 'Входной билет + мерчендайз', 6000, 300, 'storage/tickets/LJ1WvAQ692dB9VA8.png'),
(24, 17, 'VIP', 8000, 300, 'storage/tickets/K0J7a0wYwZTMVvAG.png'),
(25, 18, 'Входной билет', 5000, 10000, 'storage/tickets/7M1sToR4MjDxFaKr.png'),
(26, 19, 'Входной билет', 500, 30, 'storage/tickets/aUBtbSsLW08D979P.png'),
(27, 20, 'Входной билет', 300, 40, 'storage/tickets/qRbQ1wHksEwd493G.png'),
(28, 21, 'Входной билет', 700, 40, 'storage/tickets/alWF1xUnnjFHJEbw.png'),
(29, 22, 'Входной билет', 1000, 100, 'storage/tickets/O056enUCBtVQXNNK.png'),
(30, 22, 'VIP', 2000, 30, 'storage/tickets/GC0RYOTC8qB9IFtW.png'),
(31, 23, 'Входной билет', 1000, 300, 'storage/tickets/12wsJnGKq0E7hcwR.png'),
(32, 24, 'Входной билет', 200, 20, 'storage/tickets/s4xnQJ42SeEYVGfk.png');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `id_role` int NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `last_name`, `name`, `patronymic`, `phone`, `email`, `password`) VALUES
(2, 3, 'Иванов', 'Иван', 'Иванович', '88005553535', 'ctepanova.2010@yandex.ru', '$2y$10$45XWDGJQMMO5IiqLN0jABu1L5h1rJ5V1sxPdWkbTMY/Mxq.gREaPu'),
(3, 4, 'Сидоров', 'Сидор', 'Сидорович', '88005555555', 'pashatchikurov2@yandex.ru', '$2y$10$IkqtVcPCtkbPCBQiPDwDxuZRqqtDIDhyTEl5xq4cnINhnzobx7LtC'),
(4, 2, 'Админов', 'Админ', 'Админовиич', '88005555511', 'admin@mail.ru', '$2y$10$MWXDD04pWqbxbvF4wyaDtOAmQhyj2XulYOAd4hUJylItREE6MztpW'),
(6, 1, 'Оператов', 'Оператор', 'Оператович', '87777777777', 'operator@mail.ru', '$2y$10$5lFoDdqA.Z/1aTki6L873uJai/WV5WYu4S.TuwzehhuxepSD45dN.');

-- --------------------------------------------------------

--
-- Структура таблицы `user_permission`
--

CREATE TABLE `user_permission` (
  `id_user_permission` int NOT NULL,
  `id_user` int NOT NULL,
  `id_permission` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_permission`
--

INSERT INTO `user_permission` (`id_user_permission`, `id_user`, `id_permission`) VALUES
(33, 4, 3),
(34, 4, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_status` (`id_status`);

--
-- Индексы таблицы `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id_permission`),
  ADD UNIQUE KEY `code_permission` (`code_permission`);

--
-- Индексы таблицы `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_event` (`id_event`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `code_role` (`code_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `code_status` (`code_status`);

--
-- Индексы таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD UNIQUE KEY `code_ticket` (`code_ticket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_type_ticket` (`id_type_ticket`);

--
-- Индексы таблицы `type_ticket`
--
ALTER TABLE `type_ticket`
  ADD PRIMARY KEY (`id_type_ticket`),
  ADD KEY `id_event` (`id_event`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id_user_permission`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_permission` (`id_permission`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `permission`
--
ALTER TABLE `permission`
  MODIFY `id_permission` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `type_ticket`
--
ALTER TABLE `type_ticket`
  MODIFY `id_type_ticket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id_user_permission` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_type_ticket`) REFERENCES `type_ticket` (`id_type_ticket`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `type_ticket`
--
ALTER TABLE `type_ticket`
  ADD CONSTRAINT `type_ticket_ibfk_1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `user_permission`
--
ALTER TABLE `user_permission`
  ADD CONSTRAINT `user_permission_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_permission_ibfk_2` FOREIGN KEY (`id_permission`) REFERENCES `permission` (`id_permission`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
