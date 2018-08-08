-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sie 2018, 22:37
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `warcaby`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mecze`
--

CREATE TABLE `mecze` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `GraczBialy` text COLLATE utf8_polish_ci NOT NULL,
  `GraczCzarny` text COLLATE utf8_polish_ci NOT NULL,
  `wynikBialych` text COLLATE utf8_polish_ci NOT NULL,
  `wynikCzarnych` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mecze`
--

INSERT INTO `mecze` (`id`, `data`, `GraczBialy`, `GraczCzarny`, `wynikBialych`, `wynikCzarnych`) VALUES
(1, '2017-11-15', 'Joker', 'morfa65', 'win', 'lose'),
(2, '2017-11-18', 'Joker', 'morfa65', 'win', 'lose'),
(3, '2017-11-25', 'morfa65', 'Joker', 'lose', 'win'),
(4, '2017-11-10', 'kokoli', 'Joker', 'lose', 'win'),
(5, '2017-11-30', 'dudus', 'morfa65', 'lose', 'win'),
(6, '2017-11-15', 'Ruda', 'Joker', 'lose', 'win'),
(7, '2017-11-16', 'Gruby', 'morfa65', 'lose', 'lose'),
(8, '2017-11-16', 'morfa65', 'dudus', 'win', 'lose'),
(9, '2017-11-20', 'Joker', 'monia', 'lose', 'win'),
(10, '2017-11-25', 'morfa65', 'monia', 'lose', 'win'),
(11, '2017-11-27', 'monia', 'dudus', 'win', 'lose'),
(12, '2017-11-24', 'kokoli', 'Gruby', 'lose', 'win'),
(13, '2017-11-29', 'Gruby', 'kokoli', 'lose', 'win'),
(14, '2017-11-15', 'dudus', 'morfa65', 'win', 'lose'),
(15, '2017-11-18', 'Joker', 'haslo', 'win', 'lose'),
(16, '2017-11-25', 'kokoli', 'Joker', 'lose', 'win'),
(17, '2017-11-10', 'kokoli', 'Joker', 'lose', 'win'),
(18, '2017-11-30', 'dudus', 'kyle', 'lose', 'win'),
(19, '2017-11-15', 'monia', 'Joker', 'lose', 'win'),
(20, '2017-11-16', 'monia', 'morfa65', 'lose', 'lose'),
(21, '2017-11-16', 'morfa65', 'Ruda', 'win', 'lose'),
(22, '2017-11-20', 'morfa65', 'monia', 'lose', 'win'),
(23, '2017-11-25', 'morfa65', 'haslo', 'lose', 'win'),
(24, '2017-11-27', 'monia', 'Gruby', 'win', 'lose'),
(25, '2017-11-24', 'dudus', 'Gruby', 'lose', 'win'),
(26, '2017-11-29', 'Gruby', 'dudus', 'lose', 'win');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `mail` text COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`imie`, `nazwisko`, `mail`, `login`, `haslo`) VALUES
('Bartosz', 'Figurski', 'figur@gmail.com', 'bartek', '$2y$10$tEcHjVE24ClmbqL6yaTR5eXq6n6iT/uJsNwdPpuZq8Pc3m3zO9kUK'),
('Roman', 'Dudkiewicz', 'duda@onet.pl', 'dudus', '$2y$10$MQhsz3AquZ/jUFwjRnK7BeZrtOFynELO7BE3G4pokUM2Vx88RW73K'),
('Bartosz', 'Tlusty', 'tlusty@wp.pl', 'Gruby', '$2y$10$2YbEgy9BPmg7PV4lB2B6k.8xMjUvY8hSeK/93sPBj0W3jzxrl1A8i'),
('Radoslaw', 'Burak', 'cwiklowy@o2.pl', 'haslo', '$2y$10$N9hm/w6xoKK03ZwzkUdPB.4qaOWfBFxdfYcyGTrNxcz58CHEsO2eS'),
('Jack', 'Nicholson', 'nicco@gmail.com', 'Joker', '$2y$10$i93E/V31WjMEzwqUnNVOQe1p5cqCuxNhf7wUBNZY2FYuPT1RfQbZi'),
('Daniel', 'Formela', 'formel@wp.pl', 'kokoli', '$2y$10$7GALZorEhVnbNVHLxLv23OVdwsLiVnV45N01hHcRoAa2qs/Yavquu'),
('Kyle', 'Simmons', 'kyle@gmail.com', 'kyle', 'new'),
('Monika', 'Krzak', 'monia@onet.pl', 'monia', '$2y$10$JGnW0os2qwcPkGpcc.LaJeHvoMOw2/NGrIxd9YjoEq5Q4.pmODry6'),
('Morgan', 'Freeman', 'mor@onet.pl', 'morfa65', '$2y$10$6Xv/6OkvNzG6Uob0rJz5OuTCm0DTA/S2YUtqoOKvhVC0qcBTIXRte'),
('Edyta', 'Mroz', 'mrozna@wp.pl', 'Ruda', '$2y$10$TdJIE58kAUKSlntWLT34C.xKsvQzH7q/I9s7fKHYYByr9J/CDTpfu');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `mecze`
--
ALTER TABLE `mecze`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `mecze`
--
ALTER TABLE `mecze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
