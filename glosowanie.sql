-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Paź 2022, 20:26
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
-- Baza danych: `glosowanie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `do usunięcia`
--

CREATE TABLE `do usunięcia` (
  `id` int(11) DEFAULT NULL,
  `id_uzyt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glosy`
--

CREATE TABLE `glosy` (
  `id` int(11) NOT NULL,
  `id_uzyt` int(11) NOT NULL,
  `polubienia` int(11) NOT NULL,
  `temat` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `opis` text COLLATE utf8mb4_polish_ci NOT NULL,
  `data_dodania` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `glosy`
--

INSERT INTO `glosy` (`id`, `id_uzyt`, `polubienia`, `temat`, `opis`, `data_dodania`) VALUES
(1, 10, 0, 'Stardew Valley', 'Oj tak tak bedzie grane bez żadnej kappy', '2022-10-17 20:25:38');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `polubienia`
--

CREATE TABLE `polubienia` (
  `id` int(11) NOT NULL,
  `id_uzyt` int(11) NOT NULL,
  `id_glosy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `hasło` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `nick` varchar(255) COLLATE utf8mb4_polish_ci NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `prof_img` varchar(255) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `hasło`, `nick`, `data_utworzenia`, `prof_img`) VALUES
(7, 'Pedał jebany co się włamuje', 'jd', 'Pedał jebany co się włamuje', '2022-10-14 13:46:44', 'img/anonym.png'),
(8, 'fenix', 'fexni', 'Bogdan Bik', '2022-10-14 13:51:43', 'img/fenix.svg'),
(9, 'asd', 'asd', 'asd', '2022-10-14 19:50:28', 'img/2asd2asd.png'),
(10, 'jano', 'jano', 'jano', '2022-10-14 22:03:09', 'img/asdasd2.png'),
(11, 'dsa', 'dsa', 'dsa', '2022-10-17 18:57:26', 'img/unknown (4).png'),
(12, 'maciek', 'bik', '123', '2022-10-17 20:23:11', 'img/apt.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `do usunięcia`
--
ALTER TABLE `do usunięcia`
  ADD KEY `Do usunięcia_fk0` (`id_uzyt`);

--
-- Indeksy dla tabeli `glosy`
--
ALTER TABLE `glosy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `glosy_fk0` (`id_uzyt`);

--
-- Indeksy dla tabeli `polubienia`
--
ALTER TABLE `polubienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polubienia_fk0` (`id_uzyt`),
  ADD KEY `polubienia_fk1` (`id_glosy`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `glosy`
--
ALTER TABLE `glosy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
