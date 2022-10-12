-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Paź 2022, 23:51
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `glosowania`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glos`
--

CREATE TABLE `glos` (
  `id_glos` int(11) NOT NULL,
  `id_uzyt` int(11) NOT NULL,
  `temat` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `opis` longtext COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `polubienia` int(11) DEFAULT NULL,
  `dodanie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `glos`
--

INSERT INTO `glos` (`id_glos`, `id_uzyt`, `temat`, `opis`, `polubienia`, `dodanie`) VALUES
(5, 1, 'asdasdasd', 'asdawsdasd', 0, '2022-10-11 10:24:36'),
(6, 1, 'asdasda', 'sdasdasdaasdas', 0, '2022-10-11 10:25:50');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzyt` int(11) DEFAULT NULL,
  `nick` varchar(30) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `prof_img` varchar(40) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzyt`, `nick`, `prof_img`) VALUES
(1, 'maciejbik', NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `glos`
--
ALTER TABLE `glos`
  ADD PRIMARY KEY (`id_glos`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `glos`
--
ALTER TABLE `glos`
  MODIFY `id_glos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
