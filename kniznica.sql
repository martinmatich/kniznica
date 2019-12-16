-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 16.Dec 2019, 11:00
-- Verzia serveru: 5.7.17
-- Verzia PHP: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `kniznica`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `autori`
--

CREATE TABLE `autori` (
  `id_autora` int(11) NOT NULL,
  `meno` varchar(500) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `autori`
--

INSERT INTO `autori` (`id_autora`, `meno`) VALUES
(1, 'Agatha Christie'),
(2, 'Sascha Arango'),
(3, 'Jo Nesbo'),
(4, 'Daniel Hevier'),
(5, 'Dominik Dán'),
(6, 'Ján Smrek'),
(7, 'Ľudmila Podjavorinská'),
(8, 'J. K. Rowling'),
(9, 'Josef Čapek'),
(10, 'Jon Lier Horst'),
(11, 'Michal Hvorecký'),
(12, 'Jakub Vrána'),
(13, 'Karel Čapek'),
(14, 'Miloslav Ponkrác');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie`
--

CREATE TABLE `kategorie` (
  `id_kategorie` int(11) NOT NULL,
  `kategoria` varchar(50) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `kategorie`
--

INSERT INTO `kategorie` (`id_kategorie`, `kategoria`) VALUES
(1, 'Sci-fi'),
(2, 'Triler'),
(3, 'Román'),
(4, 'Fantasy'),
(5, 'Ženská literatúra'),
(6, 'Časopis');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `knihy`
--

CREATE TABLE `knihy` (
  `id` int(11) NOT NULL,
  `nazov` varchar(500) COLLATE utf8_slovak_ci NOT NULL,
  `isbn` varchar(13) COLLATE utf8_slovak_ci NOT NULL,
  `cena` decimal(15,2) NOT NULL,
  `id_autora` int(11) NOT NULL,
  `id_kategorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `knihy`
--

INSERT INTO `knihy` (`id`, `nazov`, `isbn`, `cena`, `id_autora`, `id_kategorie`) VALUES
(1, 'Hercule Poirot: Poviedky', '1234567890123', '14.75', 1, 3),
(2, 'Pravda a iné klamstvá', '1234567890123', '7.99', 2, 2),
(3, 'Pancierové srdce', '1234567890123', '8.99', 3, 2),
(4, 'Čin-čin', '1234567890', '1.99', 7, 6),
(6, 'Harry Potter a kameň mudrcov', '1234567890123', '5.99', 8, 4),
(7, 'Povídání o pejskovi a kočičce', '1234567890', '6.99', 9, 3),
(8, 'Snehuliak', '1234567890', '5.00', 3, 2),
(9, 'Súmrak', '1234567890', '6.15', 10, 2),
(10, 'Plyš', '1234567890123', '1.15', 11, 1),
(11, 'PHP 1001 Tipov a trikov', '1234567890', '7.00', 12, 6),
(12, 'Schôdzka so smrťou', '1234567890', '10.00', 1, 3),
(13, 'Válka s mloky', '1234567890123', '5.55', 13, 1),
(14, 'Opona', '1234567890', '9.99', 1, 6),
(15, 'Borowski', '1234567890123', '1.99', 2, 2),
(16, 'Skúška', '1234567890', '4.99', 3, 3),
(17, 'PHP a MySQL bez předchozích znalostí', '1234567890123', '0.05', 14, 6);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `autori`
--
ALTER TABLE `autori`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indexy pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id_kategorie`);

--
-- Indexy pre tabuľku `knihy`
--
ALTER TABLE `knihy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `autori`
--
ALTER TABLE `autori`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id_kategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pre tabuľku `knihy`
--
ALTER TABLE `knihy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
