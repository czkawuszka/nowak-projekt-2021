-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 07 Gru 2021, 20:36
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `productdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gaming`
--

CREATE TABLE `gaming` (
  `id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_category` varchar(32) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `gaming`
--

INSERT INTO `gaming` (`id`, `product_name`, `product_category`, `product_price`, `product_image`) VALUES
(1, 'Klawiatura', 'Gaming', 6.7, './upload/klawa.jpg'),
(2, 'Słuchawki', 'Gaming', 2.3, './upload/słuch.jpg'),
(3, 'Fotel Gamingowy', 'Gaming', 6.7, './upload/fotel.jpg'),
(4, 'Kamerka', 'Gaming', 11, './upload/kam.jpg'),
(5, 'Podkładka', 'Gaming', 6.5, './upload/podk.jpg'),
(6, 'Głośnik', 'Gaming', 5.6, './upload/glos.jpg'),
(7, 'Monitor', 'Gaming', 11, './upload/moni.jpg'),
(9, 'Myszka', 'Gaming', 5.8, './upload/mysz.jpg'),
(10, 'Komputer', 'Gaming', 6.9, './upload/kom.jpg'),
(11, 'LEDy', 'Gaming', 6.9, './upload/led.jpg'),
(12, 'Laptop', 'Gaming', 7, './upload/lap.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
